<?php

namespace Components\Products\Controllers;

use View,
    App,
    Str;
use Components\Products\Models\Product;
use Components\Products\Models\ProductColor;
use Components\Products\Models\Category;
use Components\Stones\Models\IconCategory;

class ProductsController extends \BaseController {

    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Products/views');
        View::addNamespace('Products', app_path() . '/components/Products/views');
        View::share('menu_product_categories', Category::menu());
        View::share('menu_icon_categories', IconCategory::menu());
        parent::__construct();
    }

    public function index() {
        $products = Product::published()->recent()->paginate(9);
        $this->layout->title = 'All products';
        $this->layout->content = View::make('Products::public.products.index')->with('products', $products);
    }

    public function show($alias, $color) {
        $product = Product::whereAlias($alias)->first();
        if (!$product)
            App::abort('404');
        
        $productColor = ProductColor::where('product_id','=',$product->id)->where('color_id','=',$color)->first();
        if (count($productColor) == 0)
            App::abort('404');
        if(\Request::ajax()) {
            return \Response::json(['product' => $product->toJson(), 'productColor' => $productColor->toJson()]);
        }
        $product_relateds = Product::where('cat_id', '=', $product->cat_id)->whereNotIn('id', [$product->id])->take(4)->get();
        $this->layout->title = $product->name;
        $this->layout->content = View::make('Products::public.products.show')
                ->with('product', $product)
                ->with('productColor', $productColor)
                ->with('product_relateds', $product_relateds);
    }

}
