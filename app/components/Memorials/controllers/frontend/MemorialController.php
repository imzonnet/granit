<?php namespace Components\Memorial\Controllers\frontend;
use App, Input, Post, Redirect, Request, Sentry, Str, View, File;
use BaseController;

class MemorialController extends BaseController {

    public function __construct()
    {
        View::addLocation(app_path() . '/components/Memorial/views');
		View::addNamespace('Memorial', app_path() . '/components/Memorial/views');
        parent::__construct();
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index()
    {
       
    	$this->layout->title = 'Memorial';
        $this->layout->content = View::make('Memorial::frontend.memorial.index');
        
    }

}