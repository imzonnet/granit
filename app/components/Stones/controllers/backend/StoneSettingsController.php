<?php namespace Components\Stones\Controllers\Backend;

use App, Input, Redirect, Request, Sentry, Str, View, File;
use Components\Stones\Models\StoneSetting;

class StoneSettingsController extends \BaseController {
    
    public function __construct() {
        View::addLocation( app_path() . '/components/Stones/views' );
        View::addNamespace( 'Stones', app_path() . '/components/Stones/views' );

        parent::__construct();
    } 

    public function index() {
        $getModel = new StoneSetting;
        $settings = $getModel->get_settings();

        $this->layout->title = 'Stone Settings';
        $this->layout->content = View::make( 'Stones::backend.stone_settings.index' )
        ->with('settings', $settings);
    }

    public function store() {
        $input = Input::all();
        
        $getModel = new StoneSetting;
        $getModel->push_settings( $input['stone_setting'] );
        return Redirect::to("backend/stones/stone-settings");
    }
}
?>