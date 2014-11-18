<?php namespace Components\MyGalleries\Controllers\Backend;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;
use Services\Validation\ValidationException as ValidationException;

use Components\MyGalleries\Models\Category; 

class Categories extends \BaseController {

	public function __construct() {
		//add hint for views
		View::addLocation(app_path() . '/components/MyGalleries/views');
		View::addNamespace('Categories', app_path() . '/components/MyGalleries/views');

		parent::__construct();
	}

	public function index() {
		$this->layout->title = 'All Categories';
		$this->layout->content = View::make('Categories::backend.categories.index')
		->with('categories', Category::all());
	}

	public function create() {
		$this->layout->title = 'New Category';
		$this->layout->content = View::make('Categories::backend.categories.create')->with('status', Category::all_status());
	}

	public function show($id)
    {
        $category = Category::findOrFail($id);

        if (!$category) App::abort('401');

        $this->layout->title = $category->name;
        $this->layout->content = View::make('Categories::backend.categories.show')
                                        ->with('category', $category);
    }

	public function store() {
		$input = Input::all();
        
        if (isset($input['form_close']))
            return Redirect::to("backend/mygallery-categories");

        try {
            
            $redirect = (isset($input['form_save'])) ? "backend/mygallery-categories" : "backend/mygallery-categories/create";

            unset($input['form_save']);
        	unset($input['form_save_new']);
        	Category::create($input);

            return Redirect::to($redirect)
                                ->with('success_message', 'The category was created.');
        } catch(ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

	}

	public function edit($id)
    {
        $this->layout->title = 'Edit Product Category';
        $this->layout->content = View::make('Categories::backend.categories.create')
        						->with('category', Category::findOrFail($id))
        						->with('status', Category::all_status());
    }

    public function update($id)
    {
    	$input = Input::all();
        if (isset($input['form_close']))
            return Redirect::to("backend/mygallery-categories");

        try
        {
        	unset($input['form_save']);
        	unset($input['form_save_new']);
        	if(empty($input['image'])){ unset($input['image']); }

            Category::findOrFail($id)->update($input);

            $redirect = (isset($input['form_save'])) ? "backend/mygallery-categories" : "backend/mygallery-categories/create";

            return Redirect::to($redirect)
                                ->with('success_message', 'The post category was updated.');
        }

        catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

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
            $category = Category::findOrFail($id);

            $category->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The product category' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/mygallery-categories")
                            ->with('success_message', $message);
    }
}