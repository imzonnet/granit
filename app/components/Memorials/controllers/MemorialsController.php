<?php namespace Components\Memorials\Controllers;

use View;
use Components\Memorials\Models\Memorial;
use Components\Memorials\Models\Media;
use Components\Memorials\Models\Guestbook;

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
        $guestbooks = Guestbook::where('memorial_id',$id)->get();
        $media = Media::where('memorial_id',$id)->get();
        if(!$memorial) App::abort('401');
        $this->layout->title = 'Memorial';
        $this->layout->content = View::make('Memorials::public.memorials.show')
                ->with('memorial', $memorial)
                ->with('guestbooks', $guestbooks)
                ->with('media', $media);
    }

}
