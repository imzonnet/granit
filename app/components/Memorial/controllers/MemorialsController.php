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
        $data  = \Lop::with('students')->get();
        var_dump($data->first()->students); exit;

    }

}