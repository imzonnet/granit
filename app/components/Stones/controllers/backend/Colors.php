<?php namespace Components\Stones\Controllers\Backend;

use App, Input, Redirect, Request, Sentry, Str, View, File;
use Services\Validation\ValidationException as ValidationException;
use Components\Stones\Models\Color;

class Colors extends \BaseController {

    public function __construct() {
        View::addLocation(app_path() . '/components/Stones/views');
        View::addNamespace('Stones', app_path() . '/components/Stones/views');

        parent::__construct();
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index() {

        $this->layout->title = 'All Colors';
        $this->layout->content = View::make('Stones::backend.colors.index')->with('colors', Color::all());
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create() {
        $this->layout->title = 'New Color';
        $this->layout->content = View::make('Stones::backend.colors.create')
                                ->with('status', Color::all_status());
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/stones/colors");
        }
        try {
            $redirect = (isset($input['form_save'])) ? "backend/stones/colors" : "backend/stones/colors/create";
            Color::create($input);

            return Redirect::to($redirect)
                                ->with('success_message', 'The Color was created.');
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
        $color = Color::findOrFail($id);

        if (!$color) App::abort('401');

        $this->layout->title = $color->name;
        $this->layout->content = View::make('Stones::backend.colors.show')
                                        ->with('color', $color);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $color = Color::find($id);
        $this->layout->title = 'Edit ' . $color->name;
        $this->layout->content = View::make('Stones::backend.colors.create')
                                ->with('status', Color::all_status())
                                ->with('color', $color);
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
            return Redirect::to("backend/stones/colors");
        }
        try {
            unset($input['form_save']);
            unset($input['form_save_new']);
            Color::findOrFail($id)->update($input);

            return Redirect::to("backend/stones/colors")
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
        $message = 'The category' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/stones/colors")
                            ->with('success_message', $message);
    }

}

