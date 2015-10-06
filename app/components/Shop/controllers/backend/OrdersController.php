<?php 
namespace Components\Shop\Controllers\Backend;
use App, Input, Redirect, Request, Sentry, Str, View, File;
use Components\Shop\Models\Order;

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
   	 	$this->layout->content = View::make('Shop::backend.orders.index')
   	 	->with('orders', Order::get());
	}

	/**
	* create
	*/
	public function create() {

	}

	/**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
 	public function edit( $id ) {

        $order = Order::find( $id );
        $this->layout->title = 'Edit ' . $order->order_code;
        $this->layout->content = View::make( 'Shop::backend.orders.create' )
        ->with( 'status', Order::all_status() )
        ->with( 'order', $order );
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
 	public function show( $id ) { 

 	}
}
?>