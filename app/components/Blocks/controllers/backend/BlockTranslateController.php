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
use Illuminate\Database\QueryException;
use Services\Validation\ValidationException as ValidationException;
use Components\Blocks\Models\Block;
use Whoops\Example\Exception;

class BlockTranslateController extends \BaseController {

    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Blocks/views');
        View::addNamespace('Blocks', app_path() . '/components/Blocks/views');

        parent::__construct();
    }

    /**
     * Display a listing of the posts.
     *
     * @param $bid
     * @return Response
     */
    public function index($bid) {
        $block = Block::findOrFail($bid);
        $this->layout->title = 'All Translates of block: ' . $block->info;
        $this->layout->content = View::make('Blocks::backend.translates.index')
                ->with('block', $block)
                ->with('translates', $block->translates()->get());
    }

    /**
     * Show the form for creating a new post.
     *
     * @param $bid
     * @return Response
     */
    public function create($bid) {
        $block = Block::findOrFail($bid);
        $this->layout->title = 'New Translates for block: ' . $block->info;
        $this->layout->content = View::make('Blocks::backend.translates.create')
            ->with('block_id', $bid)
            ->with('languages', Block::languages());
    }

    /**
     * Store a newly created post in storage.
     *
     * @param $bid
     * @return Response
     */
    public function store($bid) {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/block");
        }
        try {
            $redirect = (isset($input['form_save'])) ? "backend/block/$bid/translate" : "backend/block/$bid/translate/create";
            $block = Block::findOrFail($bid);
            //create block translate
            $translate = new BlockTranslate($input);
            $block->translates()->save($translate);

            return Redirect::to($redirect)
                            ->with('success_message', 'The block was created.');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        } catch ( QueryException $e ) {
            return Redirect::back()->withInput()->withErrors('This language has exists');
        }
    }


    /**
     * Show the form for editing the specified post.
     *
     * @param $bid
     * @param  int $id
     * @return Response
     */
    public function edit($bid, $id) {
        $this->layout->title = 'Edit Block';
        $this->layout->content = View::make('Blocks::backend.translates.create')
            ->with('block', BlockTranslate::findOrFail($id))
            ->with('block_id', $bid);
    }

    /**
     * Update the specified post Block in storage.
     *
     * @param $bid
     * @param param int $id
     * @return Response
     */
    public function update($bid, $id) {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::to("backend/block/$bid/translate");
        }
        try {
            BlockTranslate::findOrFail($id)->update($input);

            return Redirect::route("backend.block.translate.index", $bid)
                            ->with('success_message', 'The block was updated.');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified post Block from storage.
     *
     * @param $bid
     * @param  int $id
     * @return Response
     */
    public function destroy($bid, $id = null) {

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
            $Block = BlockTranslate::findOrFail($id);

            $Block->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The block' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/block/$bid/translate")
                        ->with('success_message', $message);
    }

}
