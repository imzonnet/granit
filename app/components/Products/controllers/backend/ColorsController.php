<?php

namespace Components\Products\Controllers\Backend;

use App,
    Input,
    Redirect,
    Request,
    Sentry,
    Str,
    View,
    File;
use Services\Validation\ValidationException as ValidationException;
use Components\Products\Models\Color;

class ColorsController extends \BaseController {

    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Products/views');
        View::addNamespace('Colors', app_path() . '/components/Products/views');

        parent::__construct();
    }

    public function index() {
        $this->layout->title = 'All Colors';
        $this->layout->content = View::make('Colors::backend.colors.index')->with('colors', Color::all());
    }

    public function create() {
        $this->layout->title = 'New Color';
        $this->layout->content = View::make('Colors::backend.colors.create');
    }

    public function store() {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/product-colors");
        }

        try {
            $redirect = (isset($input['form_save'])) ? "backend/product-colors" : "backend/product-colors/create";
            Color::create($input);

            return Redirect::to($redirect)
                            ->with('success_message', 'The color was created.');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $color = Color::findOrFail($id);

        if (!$color)
            App::abort('401');

        $this->layout->title = $color->name;
        $this->layout->content = View::make('Colors::backend.colors.show')
                ->with('color', $color);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $this->layout->title = 'Edit Product Color';
        $this->layout->content = View::make('Colors::backend.colors.create')
                ->with('color', Color::findOrFail($id));
    }

    /**
     * Update the specified post color in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $input = Input::all();

        if (isset($input['form_close'])) {
            return Redirect::to("backend/product-colors");
        }
        try {
            Color::findOrFail($id)->update($input);

            return Redirect::to("backend/product-colors")
                            ->with('success_message', 'The post color was updated.');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified post color from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id = null) {


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
            $color = Color::findOrFail($id);

            $color->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The product color' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/product-colors")
                        ->with('success_message', $message);
    }

}
