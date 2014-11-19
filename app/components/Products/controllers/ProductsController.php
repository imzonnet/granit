<?php namespace Components\Products\Controllers;

use View, App, Str;
use Components\Products\Models\Product;
use Components\Products\Models\Category;

class ProductsController extends \BaseController {
    
    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Products/views');
        View::addNamespace('Products', app_path() . '/components/Products/views');

        parent::__construct();
    }
    
    public function index() {
        $products = Product::published()->recent()->paginate(5);

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


