<?php

namespace Components\Testimonials\Controllers\Backend;

use App,
    Input,
    Redirect,
    Request,
    Sentry,
    Str,
    View,
    File;
use Services\Validation\ValidationException as ValidationException;
use Components\Testimonials\Models\Testimonial;

class TestimonialsController extends \BaseController {

    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Testimonials/views');
        View::addNamespace('Testimonials', app_path() . '/components/Testimonials/views');

        parent::__construct();
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index() {
        $this->layout->title = 'All Testimonials';
        $this->layout->content = View::make('Testimonials::backend.testimonials.index')
                ->with('testimonials', Testimonial::all());
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create() {
        $this->layout->title = 'New Testimonial';
        $this->layout->content = View::make('Testimonials::backend.testimonials.create')
                ->with('list_rate', Testimonial::listRate());
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/testimonials");
        }
        try {
            $redirect = (isset($input['form_save'])) ? "backend/testimonials" : "backend/testimonials/create";
            Testimonial::create($input);

            return Redirect::to($redirect)
                            ->with('success_message', 'The testimonial was created.');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $testimonial = Testimonial::findOrFail($id);

        if (!$testimonial)
            App::abort('401');

        $this->layout->title = $testimonial->name;
        $this->layout->content = View::make('Testimonials::backend.testimonials.show')
                ->with('testimonial', $testimonial);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $this->layout->title = 'Edit Testimonial';
        $this->layout->content = View::make('Testimonials::backend.testimonials.create')
                ->with('testimonial', Testimonial::findOrFail($id))
                ->with('list_rate', Testimonial::listRate());
    }

    /**
     * Update the specified post Testimonial in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/testimonials");
        }
        try {
            Testimonial::findOrFail($id)->update($input);

            return Redirect::to("backend/testimonials")
                            ->with('success_message', 'The testimonial was updated.');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified post Testimonial from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id = null) {


        // If multiple ids are specified
        if ($id == 'multiple') {
            $selected_ids = trim(Input::get('selected_ids'));
            if ($selected_ids == '') {
                return Redirect::back()
                                ->with('error_message', "Nothing was selected to delete");
            }
            $selected_ids = explode(' ', $selected_ids);
        } else {
            $selected_ids = array($id);
        }

        foreach ($selected_ids as $id) {
            $Testimonial = Testimonial::findOrFail($id);

            $Testimonial->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The testimonial' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/testimonials")
                        ->with('success_message', $message);
    }

}
