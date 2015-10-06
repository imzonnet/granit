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

use Modules\Slideshow\Models\Slideshow;
use Components\Testimonials\Models\Testimonial;

class HomeController extends BaseController {

    public function index() {
        $page = Post::where('permalink', '=', 'welcome')->first();
        $slides = Slideshow::latest()->get();

        $this->layout->title = 'Home';
        $this->layout->content = View::make('public.' . $this->current_theme . '.index')
                ->with('page', $page)
                ->with('slides', $slides)
            ->with('testimonials',Testimonial::all());
    }

    public function wrapper($menu_id) {
        $menu = Menu::findOrFail($menu_id);
        $this->layout->title = $menu->title;

        $this->layout->content = View::make('public.' . $this->current_theme . '.wrapper')
                ->with('menu', $menu);
    }

    /**
     * Contact Page
     */
    public function getContact() {
        $contact = Post::type('page')
                ->where('permalink', 'contact')
                ->first();
        //$contact->extras['contact_coords'] = '57.7973333,12.0502107';
        $this->layout->title = 'Contact Us';

        $this->layout->content = View::make('public.' . $this->current_theme . '.contact')
                ->with('post', $contact);
    }

    /*
     * Send Mail
     */

    public function postContact() {
        $input = Input::all();

        $rules = array(
            'email' => 'required|min:5|email',
            'name' => 'required|min:5',
            'comments' => 'required|min:10',
            'subject' => 'required|min:3',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        }
        try {
            Mail::send('public.' . $this->current_theme . '.email', $input, function($message) use($input) {
                $message->from($input['email'], $input['name']);
                $message->to(get_setting('email_username'), $input['name'])
                        ->subject($input['subject']);
            });
        } catch (Exception $e) {
            return Redirect::back()
                            ->withInput()
                            ->with('error_message', $e->getMessage());
        }

        return Redirect::back()
                        ->with('success_message', 'The mail was sent.');
    }

    /**
     * About Us Page
     */
    public function about() {
        $group = Sentry::findGroupByName('Manager');
        $users = Sentry::findAllUsersInGroup($group)->take(6);
        $this->layout->title = 'About Us';
        $this->layout->content = View::make('public.' . $this->current_theme . '.about')->with('users', $users);
    }

    /**
     * Switch Language
     * @param null $lang
     * @return
     */

    public function language($lang = null)
    {
        if( $lang == null ) {
            \Session::put('lang', \Config::get('app.locale'));
        }
        \Session::put('lang', $lang);
        \Session::put('language', $lang);
        return \Redirect::back();
    }
}
