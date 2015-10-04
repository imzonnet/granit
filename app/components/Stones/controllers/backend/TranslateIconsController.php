<?php namespace Components\Stones\Controllers\Backend;

use App, Input, Redirect, Request, Sentry, Str, View, File;
use Components\Stones\Models\IconCategory;
use Services\TranslateManager;
use Services\Validation\ValidationException as ValidationException;
use Components\Stones\Models\Icon;

class TranslateIconsController extends \BaseController {

    private $translate;
	public function __construct( TranslateManager $translateManager) {
		View::addLocation(app_path() . '/components/Stones/views');
		View::addNamespace('Stones', app_path() . '/components/Stones/views');

		parent::__construct();
        View::share('languages', $translateManager->languages());
        $this->translate = $translateManager;
	}

    /**
     * Display a listing of the posts.
     *
     * @param $id
     * @return Response
     */
    public function index($id) {
        $category = Icon::findOrFail($id);
        $translates = $this->translate->all($category);
        $this->layout->title = 'All Translate Icon Categories';
        $this->layout->content = View::make('Stones::backend.translates.icons.index')
        ->with('category', $category)->with('translates', $translates)->with('module', get_class($category));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, $lang)
    {
        $category = Icon::find($id);
        $this->layout->title = 'Edit ' . $category->name;
        $this->layout->content = View::make('Stones::backend.translates.icons.create')
            ->with('status', Icon::all_status())
            ->with('type', Icon::all_type())
            ->with('categories', IconCategory::all_categories())
                                ->with('category', $category)
                                ->with('lang', $lang);
    }

    /**
     * Update the specified post Product in storage.
     *
     * @param  int $id
     * @param $lang
     * @return Response
     */
    public function update($id, $lang)
    {
        $category = Icon::findOrFail($id);
        $input = Input::except('_token', '_method', 'form_save');
        if (isset($input['form_close'])) {
            return Redirect::route('backend.stones.icons.translate.index', $id);
        }
        try {
            foreach( $input as $key => $value) {
                $object = $this->translate->find($category, $lang, $key);
                if($object) {
                    $object->content = $value;
                    $object->save();
                } else {
                    $this->translate->save($category, $lang, $key, $value);
                }
            }
            return Redirect::route('backend.stones.icons.translate.index', $id)
                                ->with('success_message', 'The translate was updated.');
        } catch(ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

}

