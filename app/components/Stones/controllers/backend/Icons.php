<?php namespace Components\Stones\Controllers\Backend;

use View, App;
use Components\Stones\Models\Icon;

class Icons extends \BaseController {

	public function __construct() {
		View::addLocation(app_path() . '/components/Stones/views');
		View::addNamespace('Stones', app_path() . '/components/Stones/views');

		parent::__construct();
	}

	/**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index() {
        $this->layout->title = 'All Icon Categories';
        $this->layout->content = View::make('Stones::backend.icon_categories.index');
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create() {
        $this->layout->title = 'New Product';
        $this->layout->content = View::make('Stones::backend.icon_categories.create')
                                ->with('status', Product::all_status())
                                ->with('categories', Category::all_categories());
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();


        try {
            $redirect = (isset($input['form_save'])) ? "backend/products" : "backend/products/create";
            unset($input['form_save']);
            unset($input['form_save_new']);
            Product::create($input);

            return Redirect::to($redirect)
                                ->with('success_message', 'The product was created.');
        } catch(ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $Product = Product::findOrFail($id);

        if (!$Product) App::abort('401');

        $this->layout->title = $Product->title;
        $this->layout->content = View::make('Stones::backend.products.show')
                                        ->with('Product', $Product);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->layout->title = 'Edit Product Product';
        $this->layout->content = View::make('Stones::backend.products.create')
                                ->with('product', Product::findOrFail($id))
                                ->with('status', Product::all_status())
                                ->with('categories', Category::all_categories());
    }

    /**
     * Update the specified post Product in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        try
        {
            unset($input['form_save']);
            unset($input['form_save_new']);
            Product::findOrFail($id)->update($input);

            return Redirect::to("backend/products")
                                ->with('success_message', 'The product was updated.');
        }

        catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified post Product from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id=null)
    {


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
            $Product = Product::findOrFail($id);

            $Product->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The product' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/products")
                            ->with('success_message', $message);
    }

}

