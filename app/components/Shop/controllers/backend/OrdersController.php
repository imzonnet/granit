<?php 
namespace Components\Shop\Controllers\Backend;
use App, Input, Redirect, Request, Sentry, Str, View, File;

class OrdersController extends \BaseController {

	function __construct() {
		View::addLocation(app_path() . '/components/Shop/views');
        View::addNamespace('Shop', app_path() . '/components/Shop/views');

        parent::__construct();
	}

	/**
	* index
	*/
	public function index() {
		$this->layout->title = 'All Orders';
   	 	$this->layout->content = View::make('Shop::backend.orders.index');
	}
}
?>