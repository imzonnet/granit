<?php namespace Components\Products\Controllers\Backend;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;
use Services\Validation\ValidationException as ValidationException;

use Components\Products\Models\Product; 
use Components\Products\Models\Category; 

class Products extends \BaseController {

    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/products/views');
        View::addNamespace('products', app_path() . '/components/products/views');

        parent::__construct();
    }

    public function index() {
        $this->layout->title = 'All products';
        $this->layout->content = View::make('products::backend.products.index')
                                ->with('products', Product::all());
    }

    public function create() {
        $this->layout->title = 'New Product';
        $this->layout->content = View::make('products::backend.products.create')
                                ->with('status', Product::all_status())
                                ->with('categories', Category::all_categories());
    }

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
        $this->layout->content = View::make('products::backend.products.show')
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
        $this->layout->content = View::make('products::backend.products.create')
                                ->with('Product', Product::findOrFail($id))
                                ->with('status', Product::all_status());
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

            return Redirect::to("backend/product-products")
                                ->with('success_message', 'The post Product was updated.');
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
        $message = 'The product Product' . $wasOrWere . ' deleted.';

        return Redirect::to("backend/product-products")
                            ->with('success_message', $message);
    }

}