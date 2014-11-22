<?php namespace Components\Memorials\Controllers;

use View;
use Components\Memorials\Models\Memorial;
use Components\Memorials\Models\Media;
use Components\Memorials\Models\Guestbook;
use Components\Memorials\Models\User;

class MemorialsController extends \BaseController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index() {
        $this->layout->title = 'Memorial';
        $this->layout->content = View::make('Memorials::public.memorials.index')->with('memorials', Memorial::paginate(10));
    }
    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function show($id) {
        $memorial = Memorial::findOrFail($id);
        if(!$memorial) App::abort('401');
        $has_access = User::hasAccess($memorial->id, current_user()->id);
        $this->layout->title = 'Memorial';
        $this->layout->content = View::make('Memorials::public.memorials.show')
                ->with('memorial', $memorial)->with('has_access', $has_access);
    }
    
    /**
     * Ajax create guestbook, media
     */
    public function ajax() {
        if(\Request::ajax()) {
            return \Response::json($_POST);
        } else {
            echo 1;
        }
        exit;
    }
    

}
