<?php namespace Components\Products\Controllers;

use View, App, Str;
use Components\Products\Models\Product;
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
    public function show($alias) {
        $product = Product::whereAlias($alias)->first();
        if (!$product) App::abort('404');
        
        $this->layout->title = $product->name;
        $this->layout->content = View::make('Products::public.products.show')->with('product', $product);
    }
}


