<?php

namespace Components\Products\Controllers\Backend;

use App,
    Input,
    Redirect,
    Request,
    Sentry,
    Str,
    View,
    File;
use Services\Validation\ValidationException as ValidationException;
use Components\Products\Models\Product;
use Components\Products\Models\ProductColor;
use Components\Products\Models\Category;

class ProductColorsController extends \BaseController {

    public function __construct() {
        View::addLocation(app_path() . '/components/Products/views');
        View::addNamespace('Products', app_path() . '/componentsProductsMemorials/views');

        parent::__construct();
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index($pid) {
        $product = Product::findOrFail($pid);
        if (!$product)
            App::abort('401');
        $colors = ProductColor::where('product_id', '=', $pid)->get();

        $this->layout->title = 'All Color of ' . $product->name;
        $this->layout->content = View::make('Products::backend.colors.index')
                ->with('colors', $colors)
                ->with('product', $product);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create($pid) {
        $product = Product::findOrFail($pid);
        if (!$product)
            App::abort('401');

        $this->layout->title = 'New Color of ' . $product->name;
        $this->layout->content = View::make('Products::backend.colors.create')->with('product', $product);
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store($pid) {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::route('backend.product.colors.index', [$pid]);
        }
        try {
            $redirect = (isset($input['form_save'])) ? "backend.product.colors.index" : "backend.product.colors.create";
            ProductColor::create($input);

            return Redirect::route($redirect, [$pid])
                            ->with('success_message', 'The color was created.');
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
    public function show($pid, $id) {
        $product = Product::findOrFail($pid);
        if (!$product)
            App::abort('401');
        $color = ProductColor::findOrFail($id);
        if (!$color)
            App::abort('401');

        $this->layout->title = $color->title;
        $this->layout->content = View::make('Products::backend.colors.show')
                ->with('product', $product)
                ->with('color', $color);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($pid, $id) {
        $product = Product::find($pid);
        if (!$product)
            App::abort('401');
        $color = ProductColor::find($id);
        if (!$color)
            App::abort('401');

        $this->layout->title = 'Edit ' . $color->name;
        $this->layout->content = View::make('Products::backend.colors.create')
                ->with('product', $product)
                ->with('color', $color)
                ->with('status', ProductColor::all_status());
    }

    /**
     * Update the specified post Product in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($pid, $id) {
        $input = Input::all();
        if (isset($input['form_close'])) {
            return Redirect::route("backend.product.colors.index", [$pid]);
        }
        try {
            ProductColor::findOrFail($id)->update($input);

            return Redirect::route("backend.product.colors.index", $pid)
                            ->with('success_message', 'The color was updated.');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified post Product from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($pid, $id = null) {

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
            $color = ProductColor::findOrFail($id);

            $color->delete();
        }

        $wasOrWere = (count($selected_ids) > 1) ? 's were' : ' was';
        $message = 'The product color' . $wasOrWere . ' deleted.';

        return Redirect::route("backend.product.colors.index", $pid)
                        ->with('success_message', $message);
    }

}
