<?php

namespace Components\Testimonials\Controllers;

use View,
    App,
    Str;
use Components\Testimonials\Models\Testimonial;
use Components\Testimonials\Models\Category;

class TestimonialsController extends \BaseController {

    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Testimonials/views');
        View::addNamespace('Testimonials', app_path() . '/components/Testimonials/views');
        View::share('menu_product_categories', Category::menu());
        View::share('menu_icon_categories', IconCategory::menu());
        parent::__construct();
    }

    public function index() {
        $products = Testimonial::published()->recent()->paginate(9);

        $this->layout->title = 'All products';
        $this->layout->content = View::make('Testimonials::public.products.index')->with('products', $products);
    }

    public function show($alias) {
        $product = Testimonial::whereAlias($alias)->first();
        if (!$product)
            App::abort('404');
        $product_relateds = Testimonial::where('cat_id', '=', $product->cat_id)->whereNotIn('id', [$product->id])->take(4)->get();
        $this->layout->title = $product->name;
        $this->layout->content = View::make('Testimonials::public.products.show')
                ->with('product', $product)
                ->with('product_relateds', $product_relateds);
    }

}
