<?php namespace Components\MyGalleries\Controllers\Backend;
use App, Input, Redirect, Request, Sentry, Str, View, File;

use Components\MyGalleries\Models\MyGallery; 
use Components\MyGalleries\Models\Category; 

class MyGalleries extends \BaseController {
	public function __construct() {
		//add hint for views
		View::addLocation(app_path() . '/components/MyGalleries/views');
		View::addNamespace('MyGalleries', app_path() . '/components/MyGalleries/views');

		parent::__construct();
	}

	public function index() {
		$this->layout->title = 'All MyGalleries';
		$this->layout->content = View::make('MyGalleries::backend.mygalleries.index')
		->with('mygallaries', MyGallery::all());
	}

	public function create() {
		$this->layout->title = 'New MyGallery';
		$this->layout->content = View::make('MyGalleries::backend.mygalleries.create')
		->with('status', MyGallery::all_status())
        ->with('categories', Category::all_categories());
	}
}