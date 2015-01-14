<?php

namespace Components\Testimonials\Controllers;

use View,
    App,
    Str,
    Input,
    Redirect;
use Components\Testimonials\Models\Testimonial;
use Services\Validation\ValidationException as ValidationException;

class TestimonialsController extends \BaseController {

    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Testimonials/views');
        View::addNamespace('Testimonials', app_path() . '/components/Testimonials/views');
        parent::__construct();
    }

    public function index() {
        if( !\Sentry::check()) {
            return Redirect::guest('login/public');
        }
        $this->layout->title = 'Write Review';
        $this->layout->content = View::make('Testimonials::public.testimonials.index');
    }

    public function store() {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("home");
        }
        try {
            Testimonial::create($input);
            return Redirect::route('testimonial.index')
                            ->with('success_message', 'The testimonial was created.');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

}
