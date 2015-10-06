<?php

namespace Components\Blocks\Controllers\Backend;

use App,
    Input,
    Redirect,
    Request,
    Sentry,
    Str,
    View,
    File;
use Components\Blocks\Models\BlockTranslate;
use Services\Validation\ValidationException as ValidationException;
use Components\Blocks\Models\Block;

class BlocksController extends \BaseController {

    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Blocks/views');
        View::addNamespace('Blocks', app_path() . '/components/Blocks/views');
        parent::__construct();
        $this->language = 'en';
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index() {
        $this->layout->title = 'All Blocks';
        $this->layout->content = View::make('Blocks::backend.blocks.index')
                ->with('blocks', Block::all());
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create() {
        $this->layout->title = 'New Block';
        $this->layout->content = View::make('Blocks::backend.blocks.create')
            ->with('status', Block::all_status())
            ->with('regions', Block::regions());
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/block");
        }
        try {
            $redirect = (isset($input['form_save'])) ? "backend/block" : "backend/block/create";
            $block = Block::create($input);
            //create block translate
            $input['language'] = $this->language;
            $translate = new BlockTranslate($input);
            $block->translates()->save($translate);

            return Redirect::to($redirect)
                            ->with('success_message', 'The block was created.');
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
        $block = Block::findOrFail($id);

        if (!$block)
            App::abort('401');

        $this->layout->title = $block->name;
        $this->layout->content = View::make('Blocks::backend.blocks.show')->with('block', $block);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $this->layout->title = 'Edit Block';
        $this->layout->content = View::make('Blocks::backend.blocks.create')
            ->with('status', Block::all_status())
            ->with('regions', Block::regions())
            ->with('block', Block::findOrFail($id));
    }

    /**
     * Update the specified post Block in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/block");
        }
        try {
            $block = Block::findOrFail($id);
            $block->update($input);
            //update block translate
            $blockTranslate = BlockTranslate::findOrFail($input['translate_id']);
            $blockTranslate->update($input);

            return Redirect::back()->with('success_message', 'The block was updated.');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified post Block from storage.
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
            $Block = Block::findOrFail($id);

            $Block->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The block' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/block")
                        ->with('success_message', $message);
    }

}
