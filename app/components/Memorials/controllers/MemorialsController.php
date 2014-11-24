<?php

namespace Components\Memorials\Controllers;

use App,
    Input,
    Redirect,
    Request,
    Sentry,
    Str,
    View,
    File;
use Components\Memorials\Models\Memorial;
use Components\Memorials\Models\Media;
use Components\Memorials\Models\Guestbook;
use Components\Memorials\Models\User;

class MemorialsController extends \BaseController {

    // Path in the public folder to upload image and its corresponding thumbnail
    protected $images_path = 'uploads/memorials/';
    protected $thumbs_path = 'uploads/memorials/thumbs/';

    public function __construct() {
        View::addLocation(app_path() . '/components/Memorials/views');
        View::addNamespace('Memorials', app_path() . '/components/Memorials/views');

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
        if (!$memorial)
            App::abort('401');
        if (\Sentry::check()) {
            $has_access = User::hasAccess($memorial->id, current_user()->id);
        } else {
            $has_access = "false";
        }
        $this->layout->title = 'Memorial';
        $this->layout->content = View::make('Memorials::public.memorials.show')
                ->with('memorial', $memorial)->with('has_access', $has_access)
                ->with('media_type', Media::type());
    }

    /**
     * Ajax create guestbook, media
     */
    public function ajax() {
        if (\Request::ajax()) {
            $input = Input::all();

            switch ($input['type']) {
                case 'guestbook' :
                    try {
                        Guestbook::create($input);
                        return \Response::json(['status' => 'ok']);
                    } catch (ValidationException $e) {
                        return \Response::json(['sss' => $e->getErrors()], 500);
                    }
                    break;
                case 'media' :
                    if ($input['media_type'] == 'image') {
                        $image = $this->uploadImage(Input::file('image'));
                        $input['image'] = $image['thumbail'];
                        $input['url'] = $image['path'];
                    }
                    $media = Media::create($input);
                    //return Full path
                    $input['image'] = \URL::asset($media->image);
                    $input['url'] = \URL::asset($media->url);
                    return \Response::json($input);
                    break;
            }
        } else {
            echo 1;
        }
        exit;
    }

    /**
     * Upload the image while creating/updating records
     * @param File Object $file
     */
    public function uploadImage($file) {
        // Only if a file is selected
        if ($file) {
            // If an actual file is selected
            //dd(public_path() . '/' . $this->images_path);
            !File::exists(public_path() . '/uploads/') ? File::makeDirectory(public_path() . '/uploads/') : '';
            !File::exists(public_path() . '/' . $this->images_path) ? File::makeDirectory(public_path() . '/' . $this->images_path) : '';
            !File::exists(public_path() . '/' . $this->thumbs_path) ? File::makeDirectory(public_path() . '/' . $this->thumbs_path) : '';

            $file_name = $file->getClientOriginalName();

            $file_ext = File::extension($file_name);
            $only_fname = str_replace('.' . $file_ext, '', $file_name);

            $file_name = $only_fname . '_' . str_random(8) . '.' . $file_ext;

            $image = \Image::make($file->getRealPath());

            $image->save($this->images_path . $file_name)
                    ->fit(250, 250)
                    ->save($this->thumbs_path . $file_name);

            $path = $this->images_path . $file_name;
            $thumb = $this->images_path . $file_name;

            return [ 'path' => $path, 'thumbail' => $thumb ];
        }
        return '';
    }
}