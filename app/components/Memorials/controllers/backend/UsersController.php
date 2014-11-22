<?php namespace Components\Memorials\Controllers\Backend;

use App, Input, Redirect, Request, Sentry, Str, View, File;
use Services\Validation\ValidationException as ValidationException;
use Components\Memorials\Models\Memorial;
use Components\Memorials\Models\User;

class UsersController extends \BaseController {

    public function __construct() {
        View::addLocation(app_path() . '/components/Memorials/views');
        View::addNamespace('Memorials', app_path() . '/components/Memorials/views');

        parent::__construct();
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index($mid) {
        $memorial = Memorial::findOrFail($mid);
        if (!$memorial) App::abort('401');
        $users = $memorial->user;
        $this->layout->title = 'All users of ' . $memorial->name;
        $this->layout->content = View::make('Memorials::backend.users.index')
                ->with('users', $users)
                ->with('memorial', $memorial);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create($mid) {
        $memorial = Memorial::findOrFail($mid);
        if (!$memorial) App::abort('401');
        $users = \User::all();
        $this->layout->title = 'New user of ' . $memorial->name;
        $this->layout->content = View::make('Memorials::backend.users.create')->with('memorial', $memorial)
            ->with('users', $users);
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store($mid) {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::route('backend.memorial.users.index', [$mid]);
        }
        try {
            $redirect = (isset($input['form_save'])) ? "backend.memorial.users.index" : "backend.memorial.users.create";
            User::create($input);

            return Redirect::route($redirect, [$mid])
                                ->with('success_message', 'The users was added.');
        } catch(ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($mid, $id)
    {
        $memorial = Memorial::findOrFail($mid);
        if (!$memorial) App::abort('401');
        $users = User::findOrFail($id);
        if (!$users) App::abort('401');
        
        $this->layout->title = $users->title;
        $this->layout->content = View::make('Memorials::backend.users.show')
                                        ->with('memorial', $memorial)
                                        ->with('users', $users);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($mid, $id)
    {
        $memorial = Memorial::find($mid);
        if (!$memorial) App::abort('401');
        $users = User::find($id);
        if (!$users) App::abort('401');
        
        $this->layout->title = 'Edit ' . $users->title;
        $this->layout->content = View::make('Memorials::backend.users.create')
                                ->with('memorial', $memorial)
                                ->with('users', $users)->with('type', User::type());
    }

    /**
     * Update the specified post Product in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($mid, $id)
    {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::route("backend.memorial.users.index", [$mid]);
        }
        try {
            User::findOrFail($id)->update($input);

            return Redirect::route("backend.memorial.users.index", $mid)
                                ->with('success_message', 'The users was updated.');
        } catch(ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified post Product from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($mid, $id=null)
    {

        // If multiple ids are specified
        if ($id == 'multiple') {
            $selected_ids = trim(Input::get('selected_ids'));
            if ($selected_ids == '') {
                return Redirect::back()
                                ->with('error_message', "Nothing was selected to delete");
            }
            $selected_ids = explode(' ', $selected_ids);
        } else {
            $selected_ids = array($id);
        }

        foreach ($selected_ids as $id) {
            $users = User::findOrFail($id);

            $users->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The memorial' . $wasOrWere . ' deleted.';

        return Redirect::route("backend.memorial.users.index", $mid)
                            ->with('success_message', $message);
    }

}

