<?php namespace Components\MyTraining\Controllers\Backend;

/**
* Product Manager
*/
use View;

class MyTrainingsController extends \BaseController
{
    
    public function __construct()
    {
        // Add location hinting for views
        View::addLocation(app_path() . '/components/MyTraining/views');
        View::addNamespace('MyTraining', app_path() . '/components/MyTraining/views');

        parent::__construct();
    }

    public function index() {
        $this->layout->title = 'All MyTraining';
        $this->layout->conten = View::make('MyTraining::backend.index');
    }
}