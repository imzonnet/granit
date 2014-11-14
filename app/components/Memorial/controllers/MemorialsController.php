<?php namespace Components\Memorial\Controllers;

use BaseController;

class MemorialsController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index()
    {
        echo " hello this is memorials";
        $data  = \Memorial::all();
        var_dump($data); exit;
    }

}