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
        $config = \Config::get("memorial::basic");

        echo \Lang::get('memorial::basic.lang');

        var_dump($config); exit;

        $data  = \Lop::with('students')->get();
        var_dump($data->first()->students); exit;

    }

}