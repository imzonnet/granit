<?php namespace Components\Stones\Controllers;

use View, App, Str;
use Components\Products\Models\Category;
use Components\Products\Models\Product;
use Components\Stones\Models\Color;
use Components\Stones\Models\Font;
use Components\Stones\Models\Icon;
use Components\Stones\Models\IconCategory;

class DesignsController extends \BaseController {
    
    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Stones/views');
        View::addNamespace('Stones', app_path() . '/components/Stones/views');

        parent::__construct();
    }
    
    public function index() {
        $this->layout->title = 'Design';
        $this->layout->content = View::make('Stones::public.design.index')
        ->with('products', Product::all())
        ->with('productCategories', Category::all_categories())
        ->with('colors', Color::all())
        ->with('fonts', Font::all())
        ->with('icons', Icon::all())
        ->with('iconcategories', IconCategory::all());
    }
}


