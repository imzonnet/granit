<?php 
namespace Components\Shop\Controllers\Backend;
use App, Input, Redirect, Request, Sentry, Str, View, File;
use Components\Shop\Models\ShopSetting;

class ShopSettingsController extends \BaseController {

	function __construct() {

		View::addLocation(app_path() . '/components/Shop/views');
        View::addNamespace('Shop', app_path() . '/components/Shop/views');

        parent::__construct();
	}

	/**
	* index
	*/
	public function index() {
		$getModel = new ShopSetting;
        $settings = $getModel->get_settings();

		$this->layout->title = 'Shop Settings';
   	 	$this->layout->content = View::make('Shop::backend.shop_settings.index')
   	 	->with( 'settings', $settings );
	}

	public function store() {
        $input = Input::all();
        
        $getModel = new ShopSetting;
        $getModel->push_settings( $input['shop_setting'] );
        return Redirect::to("backend/shop/settings");
    }
}
?>