<?php

/*
  =================================================
  CMS Name  :  DOPTOR
  CMS Version :  v1.2
  Available at :  www.doptor.org
  Copyright : Copyright (coffee) 2011 - 2014 Doptor. All rights reserved.
  License : GNU/GPL, visit LICENSE.txt
  Description :  Doptor is Opensource CMS.
  ===================================================
 */

use Services\UserManager;
use Services\UserGroupManager;

class AuthController extends BaseController {

    protected $user_manager;
    protected $usergroup_manager;

    public function __construct(UserManager $user_manager, UserGroupManager $usergroup_manager) {
        $this->user_manager = $user_manager;
        $this->usergroup_manager = $usergroup_manager;

        parent::__construct();
    }

    /**
     * View for the login page
     * @return View
     */
    public function getLogin($target = 'admin') {
        if (Sentry::check()) {
            return Redirect::to($target);
        }
        $this->layout = View::make($target . '.' . $this->current_theme . '._layouts._login');
        $this->layout->title = 'Login';
        $this->layout->content = View::make($target . '.' . $this->current_theme . '.login');
    }

    /**
     * Login action
     * @return Redirect
     */
    public function postLogin($target = 'admin') {
        $input = Input::all();

        $credentials = array(
            'username' => $input['username'],
            'password' => $input['password']
        );

        $remember = (isset($input['remember']) && $input['remember'] == 'checked') ? true : false;

        try {
            $user = Sentry::authenticate($credentials, $remember);

            if ($user) {
                if (isset($input['api'])) {
                    return Response::json(array(), 200);
                } else {
                    if(isset($_POST['return_url'])){
                        $return = $_POST['return_url'];
                        return Redirect::intended(base64_decode($return));
                    }else{
                        return Redirect::intended($target);
                    }
                }
            }
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            if (isset($input['api'])) {
                return Response::json(array(
                            'error' => trans('cms.check_activation_email')
                                ), 200);
            } else {
                return Redirect::back()
                                ->withErrors(trans('cms.check_activation_email'));
            }
        } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            if (isset($input['api'])) {
                return Response::json(array(
                            'error' => trans('cms.account_suspended', array('minutes' => 10))
                                ), 200);
            } else {
                return Redirect::back()
                                ->withErrors(trans('cms.account_suspended', array('minutes' => 10)));
            }
        } catch (Exception $e) {
            if (isset($input['api'])) {
                return Response::json(array(
                            'error' => trans('cms.invalid_username_pw')
                                ), 200);
            } else {
                return Redirect::back()
                                ->withErrors(trans('cms.invalid_username_pw'));
            }
        }
    }

    /**
     * Logout action
     * @return Redirect
     */
    public function getLogout() {
        Sentry::logout();

        return Redirect::to('/');
    }

    public function postForgotPassword() {
        $input = Input::all();

        $validator = User::validate_reset($input);

        if ($validator->passes()) {
            $user = User::whereEmail($input['email'])->first();

            if ($user) {
                $user = Sentry::findUserByLogin($user->username);

                $resetCode = $user->getResetPasswordCode();

                $data = array(
                    'user_id' => $user->id,
                    'resetCode' => $resetCode
                );

                Mail::queue('backend.' . $this->current_theme . '.reset_password_email', $data, function($message) use($input, $user) {
                    $message->from(get_setting('email_username'), Setting::value('website_name'))
                            ->to($input['email'], "{$user->first_name} {$user->last_name}")
                            ->subject('Password reset ');
                });

                return Redirect::back()
                                ->with('success_message', 'Password reset code has been sent to the email address. Follow the instructions in the email to reset your password.');
            } else {
                return Redirect::back()
                                ->with('error_message', 'No user exists with the specified email address');
            }
        } else {
            return Redirect::back()
                            ->withInput()
                            ->with('error_message', implode('<br>', $validator->messages()->get('email')));
        }
    }

    public function getResetPassword($id, $token, $target = 'backend') {
        if (Sentry::check()) {
            return Redirect::to($target);
        }
        try {
            $user = Sentry::findUserById($id);

            $this->layout = View::make($target . '.' . $this->current_theme . '._layouts._login');
            $this->layout->title = 'Reset Password';

            if ($user->checkResetPasswordCode($token)) {
                $this->layout->content = View::make($target . '.' . $this->current_theme . '.reset_password')
                        ->with('id', $id)
                        ->with('token', $token)
                        ->with('target', $target)
                        ->with('user', $user);
            } else {
                $this->layout->content = View::make($target . '.' . $this->current_theme . '.reset_password')
                        ->withErrors(array(
                    'invalid_reset_code' => 'The provided password reset code is invalid'
                ));
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            $this->layout->content = View::make($target . '.' . $this->current_theme . '.reset_password')
                    ->withErrors('The specified user doesn\'t exist');
        }
    }

    public function postResetPassword() {
        $input = Input::all();

        try {
            $user = Sentry::findUserById($input['id']);

            if ($input['username'] != $user->username || $input['security_answer'] != $user->security_answer
            ) {
                return Redirect::back()
                                ->withInput()
                                ->with('error_message', 'Either the username or security answer is incorrect');
            }

            if ($user->checkResetPasswordCode($input['token'])) {
                if ($user->attemptResetPassword($input['token'], $input['password'])) {

                    $data = array(
                        'user_id' => $user->id,
                        'created_at' => strtotime($user->created_at) * 1000
                    );

                    Mail::queue('backend.' . $this->current_theme . '.reset_password_confirm_email', $data, function($message) use($input, $user) {
                        $message->from(get_setting('email_username'), Setting::value('website_name'))
                                ->to($user->email, "{$user->first_name} {$user->last_name}")
                                ->subject('Password Reset Confirmation');
                    });

                    $user->last_pw_changed = date('Y-m-d h:i:s');
                    $user->save();

                    return Redirect::to("login/${input['target']}")
                                    ->with('success_message', 'Password reset is successful. Now you can log in with your new password');
                } else {
                    return Redirect::back()
                                    ->with('error_message', 'Password reset failed');
                }
            } else {
                return Redirect::back()
                                ->withErrors(array(
                                    'invalid_reset_code' => 'The provided password reset code is invalid'
                ));
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::back()
                            ->with('error_message', 'The specified user doesn\'t exist');
        }
    }

    public function suspendUser($user_id, $created_at) {
        $user = Sentry::findUserById($user_id);

        if (strtotime($user->created_at) * 1000 == $created_at) {
            $this->user_manager->deactivateUser($user_id);

            return Redirect::to('login/backend')
                            ->with('success_message', 'The user has been suspended.');
        } else {
            return Redirect::to('login/backend')
                            ->with('error_message', 'The user cannot be suspended.');
        }
    }

    /**
     * Register
     * @return Redirect
     */
    public function getRegister() {
        if (Sentry::check()) {
            return Redirect::to('/home');
        }
        $this->layout = View::make('public.' . $this->current_theme . '._layouts._login');
        $this->layout->title = 'Register';
        $this->layout->content = View::make('public.' . $this->current_theme . '.register');
    }

    public function postRegister() {
        $rules = array(
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        );
        $v = Validator::make(Input::all(), $rules);
        if ($v->fails()) {
            if( Request::ajax()) {
                //print_r($v);
                return Response::json(['status' => 0, 'data' => $v->errors()->toArray()]);
            }
            return Redirect::back()->withInput()->withErrors($v);
        } else {
            $user = Sentry::createUser([
                        'username' => Input::get('username'),
                        'email' => Input::get('email'),
                        'password' => Input::get('password'),
                        'activated' => true,
            ]);

            $userGroup = Sentry::findGroupByName('Members');
            $user->addGroup($userGroup);
            if( Request::ajax() ) {
                return Response::json(['status' => 1, 'data' => $user->toArray()]);
            }
            
            if(isset($_POST['return_url'])){
                $return_url = base64_decode($_POST['return_url']);
                $user = Sentry::findUserById($user->id);
                // Log the user in
                Sentry::login($user);

                return Redirect::to($return_url)->with('success_message', 'Congratulations your account registration has been successful');
            }else{
                return Redirect::to('login/public')->with('success_message', 'Congratulations your account registration has been successful');
            }
        }
    }

    public function registerAjax() {
        $this->layout->title = 'Register';
        $this->layout->content = View::make('public.' . $this->current_theme . '.registerajax');
    }

    public function getSocialLogin($type = "facebook", $return_url = "") {
        if($return_url == ""){
            $return_url = "home";
        }else{
            $return_url = base64_decode($return_url);
        }
        // get data from input
        $code = NULL;
        $prefix = '';
        $social = '';
        $request = NULL;
        $token = NULL;
        $verify = '';
        switch ($type) {
            case 'facebook' :
                $social = OAuth::consumer('Facebook');
                $prefix = 'fb_';
                $request = '/me';
                $code = Input::get('code');
                break;
            case 'google' :
                $social = OAuth::consumer('Google');
                $prefix = 'gg_';
                $request = 'https://www.googleapis.com/oauth2/v1/userinfo';
                $code = Input::get('code');
                break;
            case 'twitter' :
                $token = Input::get('oauth_token');
                $verify = Input::get('oauth_verifier');
                $social = OAuth::consumer('Twitter');
                $prefix = 'tw_';
                $request = 'account/verify_credentials';
                break;
            default:
                return Redirect::intended('home');
                break;
        }
        // get fb service
        if (!empty($code) || (!empty( $token ) && !empty( $verify ))) {
            // This was a callback request from facebook, get the token
            if ($type == 'twitter') {
                $token = $social->requestAccessToken($token, $verify);
            } else {
                $token = $social->requestAccessToken($code);
            }
            // Send a request with it
            $result = json_decode($social->request($request), true);
            try {
                if ($type == 'facebook') {
                    $user = Sentry::createUser(array(
                                'username' => $prefix . $result['id'],
                                'password' => str_random(8),
                                'email' => $result['email'],
                                'first_name' => $result['first_name'],
                                'last_name' => $result['last_name'],
                                'last_pw_changed' => new DateTime,
                                'activated' => 1,
                    ));
                } else if ($type == 'google') {
                    $user = Sentry::createUser(array(
                                'username' => $prefix . $result['id'],
                                'password' => str_random(8),
                                'email' => $result['email'],
                                'first_name' => $result['given_name'],
                                'last_name' => $result['family_name'],
                                'last_pw_changed' => new DateTime,
                                'photo' => $result['picture'],
                                'activated' => 1,
                    ));
                } else if ($type == 'twitter') {
                    dd($result);
                }
                $userGroup = Sentry::findGroupByName('Members');
                $user->addGroup($userGroup);
                Sentry::login($user);
                //return Redirect::intended('home');
                return Redirect::intended($return_url);
            } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                return Redirect::to('login/public')->withErrors('Login field is required.');
            } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                return Redirect::to('login/public')->withErrors('Password field is required.');
            } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
                $users = User::where('username', $prefix . $result['id'])->first();
                $user = Sentry::findUserById($users->id);
                // Log the user in
                Sentry::login($user);
                //return Redirect::intended('home');
                return Redirect::intended($return_url);
            } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
                return Redirect::to('login/public')->withErrors('Group was not found.');
            } catch (Illuminate\Database\QueryException $e) {
                $users = User::where('email', $result['email'])->first();
                $user = Sentry::findUserById($users->id);
                // Log the user in
                Sentry::login($user);
                //return Redirect::intended('home');
                return Redirect::intended($return_url);
            }
        }
        // if not ask for permission first
        else {
            if ($type == "twitter") {
                $reqToken = $social->requestRequestToken();
                // get Authorization Uri sending the request token
                $url = $social->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));
            } else {
                $url = $social->getAuthorizationUri();
            }
            return Redirect::to((string) $url);
        }
    }

}
