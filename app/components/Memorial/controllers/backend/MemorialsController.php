<?php namespace Components\Memorial\Controllers\Backend;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;
use Services\Validation\ValidationException as ValidationException;

use Components\Memorial\Models\Memorial; 

class MemorialsController extends \BaseController {

	public function __construct() {
		//add hint for views
		View::addLocation(app_path() . '/components/Memorial/views');
		View::addNamespace('Memorials', app_path() . '/components/Memorial/views');

		parent::__construct();
	}

	public function index() {

		$this->layout->title = 'All Memorials';
		$this->layout->content = View::make('Memorials::backend.memorials.index')
		->with('memorials', Memorial::all());
		
	}
}