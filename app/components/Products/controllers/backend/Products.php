<?php namespace Components\Products\Controllers\Backend;

/**
* Product Manager
*/
use View;

class Products extends \BaseController
{
	
	public function __construct()
	{
		// Add location hinting for views
		View::addLocation(app_path() . '/components/Products/views');
        View::addNamespace('Products', app_path() . '/components/Products/views');

        parent::__construct();
	}

    public function index() {
        $this->layout->title = 'All Products';
        $this->layout->conten = View::make('Products::backend.index');
    }
}