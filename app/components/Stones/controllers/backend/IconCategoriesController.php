<?php namespace Components\Stones\Controllers\Backend;

use App, Input, Redirect, Request, Sentry, Str, View, File;
use Services\Validation\ValidationException as ValidationException;
use Components\Stones\Models\IconCategory;

class IconCategoriesController extends \BaseController {

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

        $this->layout->title = 'All Icon Categories';
        $this->layout->content = View::make('Stones::backend.icon_categories.index')->with('categories', IconCategory::all());
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create() {
        $this->layout->title = 'New Icon Category';
        $this->layout->content = View::make('Stones::backend.icon_categories.create')
                                ->with('status', IconCategory::all_status())
                                ->with('parent_id', IconCategory::all_categories());
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/stones/icon-categories");
        }
        try {
            $redirect = (isset($input['form_save'])) ? "backend/stones/icon-categories" : "backend/stones/icon-categories/create";
            IconCategory::create($input);

            return Redirect::to($redirect)
                                ->with('success_message', 'The icon category was created.');
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
        $category = IconCategory::findOrFail($id);

        if (!$category) App::abort('401');

        $this->layout->title = $category->name;
        $this->layout->content = View::make('Stones::backend.icon_categories.show')
                                        ->with('category', $category);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = IconCategory::find($id);
        $this->layout->title = 'Edit ' . $category->name;
        $this->layout->content = View::make('Stones::backend.icon_categories.create')
                                ->with('status', IconCategory::all_status())
                                ->with('parent_id', IconCategory::all_categories($category->id))
                                ->with('category', $category);
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
            return Redirect::to("backend/stones/icon-categories");
        }
        try {
            IconCategory::findOrFail($id)->update($input);

            return Redirect::to("backend/stones/icon-categories")
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
            $category = IconCategory::findOrFail($id);

            $category->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The category' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/stones/icon-categories")
                            ->with('success_message', $message);
    }

}

