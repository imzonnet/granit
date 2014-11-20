<?php namespace Components\Memorials\Controllers\Backend;

use App, Input, Redirect, Request, Sentry, Str, View, File;
use Services\Validation\ValidationException as ValidationException;
use Components\Memorials\Models\Memorial;

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
    public function index() {

        $this->layout->title = 'All Memorials';
        $this->layout->content = View::make('Memorials::backend.memorials.index')->with('memorials', Memorial::all());
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create() {
        $this->layout->title = 'New Memorial';
        $this->layout->content = View::make('Memorials::backend.memorials.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/memorials");
        }
        try {
            $redirect = (isset($input['form_save'])) ? "backend/memorials" : "backend/memorials/create";
            Memorial::create($input);

            return Redirect::to($redirect)
                                ->with('success_message', 'The Memorial was created.');
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
    public function show($id)
    {
        $memorial = Memorial::findOrFail($id);

        if (!$memorial) App::abort('401');

        $this->layout->title = $memorial->name;
        $this->layout->content = View::make('Memorials::backend.memorials.show')
                                        ->with('memorial', $memorial);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $memorial = Memorial::find($id);
        $this->layout->title = 'Edit ' . $memorial->name;
        $this->layout->content = View::make('Memorials::backend.memorials.create')
                                ->with('memorial', $memorial);
    }

    /**
     * Update the specified post Product in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/memorials");
        }
        try {
            Memorial::findOrFail($id)->update($input);

            return Redirect::to("backend/memorials")
                                ->with('success_message', 'The category was updated.');
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
    public function destroy($id=null)
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
            $Product = Product::findOrFail($id);

            $Product->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The memorial' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/memorials")
                            ->with('success_message', $message);
    }

}

