<?php

namespace Components\Products\Controllers;

use View,
    App,
    Str;
use Components\Products\Models\Product;
use Components\Products\Models\Category;
use Components\Products\Models\Color;
use Components\Stones\Models\IconCategory;
use Components\Stones\Models\Icon;

class CategoriesController extends \BaseController {

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
        $this->layout->content = View::make('Products::public.categories.index')
                ->with('categories', Category::get())
                ->with('icon_categories', IconCategory::get());
    }

    public function show($alias) {
        if ($alias == 'all') {
            $products = Product::paginate(15);
            $title = "Gravestones";
        } else {
            $category = Category::whereAlias($alias)->first();
            $title = $category->name;
            $products = Product::where('cat_id', '=', $category->id)->paginate(15);
        }
        if (!$products)
            App::abort('404');
        $this->layout->title = $title;
        $this->layout->content = View::make('Products::public.categories.show')
                ->with('products', $products)
            ->with('colors', Color::all());
    }

    public function showIcon($alias) {
        if ($alias == 'all') {
            $icons = IconCategory::paginate(9);
            $title = "Accessories";
        } else {
            $category = IconCategory::whereAlias($alias)->first();
            $title = $category->name;
            $icons = Icon::where('cat_id', '=', $category->id)->paginate(9);
        }
        if (!$icons)
            App::abort('404');
        $this->layout->title = $title;
        $this->layout->content = View::make('Products::public.categories.icon')->with('icons', $icons);
    }

}
