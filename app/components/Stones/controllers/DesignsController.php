<?php namespace Components\Stones\Controllers;

use View, App, Str;
use Components\Products\Models\Category;
use Components\Products\Models\Product;
use Components\Products\Models\ProductColor;
use Components\Stones\Models\Color;
use Components\Stones\Models\Font;
use Components\Stones\Models\Icon;
use Components\Stones\Models\IconCategory;
use Components\Stones\Models\Design;

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
        ->with('productCategories', Category::all())
        ->with('colors', Color::all())
        ->with('fonts', Font::all_fonts())
        ->with('fonts_include', Font::all())
        ->with('icons', Icon::all())
        ->with('iconcategories', IconCategory::all());
    }

    public function ajax() {
        extract($_POST);
        $layout = null;

        switch ($handle) {
            case 'getProductsById':
                $layout = View::make('Stones::public.design.layouts.products')
                ->with('products', Product::whereRaw("cat_id = {$id} and status = 'published'")->get())
                ->render();
                break;
            case 'getIconsById':
                $layout = View::make('Stones::public.design.layouts.icons')
                ->with('icons', Icon::whereRaw("cat_id = {$id} and status = 'published'")->get())
                ->render();
                break;
            case 'getLayoutProductDesign':
                $layout = View::make('Stones::public.design.layouts.productdesign')
                ->with('product', Product::findOrFail($id))
                ->render();
                break;
            case 'getProductByCatId':
                $layout = View::make('Stones::public.design.layouts.products')
                ->with('products', Product::whereRaw("cat_id = {$id} and status = 'published'")->get())
                ->render();
                break;
            case 'getProductColorByProductid':
                $layout = View::make('Stones::public.design.layouts.productcolors')
                ->with('productcolors', ProductColor::whereRaw("product_id = {$id} and status = 'published'")->get())
                ->render();
                break;
            case 'saveData':
                $_data = array("data" => json_encode($data), "status" => "published");
                Design::create($_data);
                break;
            // case 'getIconByCatId':
            //     $layout = View::make('Stones::public.design.layouts.productcolors')
            //     ->with('productcolors', ProductColor::whereRaw("product_id = {$id} and status = 'published'")->get())
            //     ->render();
            //     break;
        }
        echo json_encode( array('layout' => $layout) );exit;
    }

    public function store(){
        $this->layout->title = 'Store';
    }

    public function show(){
        $this->layout->title = 'Show';
    }
}


