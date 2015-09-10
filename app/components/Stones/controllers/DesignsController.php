<?php namespace Components\Stones\Controllers;

use Session;
use View, App, Str;
use Components\Products\Models\Category;
use Components\Products\Models\Product;
use Components\Products\Models\ProductColor;
use Components\Stones\Models\Color;
use Components\Stones\Models\Font;
use Components\Stones\Models\Icon;
use Components\Stones\Models\IconCategory;
use Components\Stones\Models\Design;
use Components\Stones\Models\StoneSetting;

class DesignsController extends \BaseController {
    
    public function __construct() {
        //add hint for views
        View::addLocation(app_path() . '/components/Stones/views');
        View::addNamespace('Stones', app_path() . '/components/Stones/views');

        parent::__construct();
    }
    
    public function index() {
        $modelStoneSetting = new StoneSetting;

        // echo $pid, $cid;
        $this->layout->title = 'Design';
        $this->layout->content = View::make('Stones::public.design.index')
        ->with('settings', $modelStoneSetting->get_settings())
        ->with('products', Product::all())
        ->with('productCategories', Category::all())
        ->with('colors', Color::all())
        ->with('fonts', Font::all_fonts())
        ->with('fonts_include', Font::all())
        ->with('icons', Icon::all())
        ->with('iconcategories', IconCategory::all());
    }

    public function loadDesign($pid, $cid) {
       // echo $pid, $cid;
        $modelStoneSetting = new StoneSetting;
        $pdata = Product::findOrFail($pid);
        $cat_data = Category::findOrFail($pdata->cat_id);
        $load_data = array(
            'pid' => $pid,
            'cat' => $cat_data->name,
            'cid' => $cid,
            );
        //echo '<pre>'; print_r($cat_data->name); echo '</pre>';

        $this->layout->title = 'Design';
        $this->layout->content = View::make('Stones::public.design.index')
        ->with('settings', $modelStoneSetting->get_settings())
        ->with('loadData', $load_data)
        ->with('products', Product::all())
        ->with('productCategories', Category::all())
        ->with('colors', Color::all())
        ->with('fonts', Font::all_fonts())
        ->with('fonts_include', Font::all())
        ->with('icons', Icon::all())
        ->with('iconcategories', IconCategory::all());
    }

    public function edit($id = 0){
        $modelStoneSetting = new StoneSetting;
        $designed = $this->getDesigned($id);
        $user = \Sentry::getUser();
        if($designed->created_by != 0){
            if(empty($user->id) || ($user->id != $designed->created_by)){
                //return \Redirect::to('design');
            }
        }

        $this->layout->title = 'Design';
        $this->layout->content = View::make('Stones::public.design.index')
        ->with('settings', $modelStoneSetting->get_settings())
        ->with('d_id', $id)
        ->with('designed', $designed)
        ->with('products', Product::all())
        ->with('productCategories', Category::all())
        ->with('colors', Color::all())
        ->with('fonts', Font::all_fonts())
        ->with('fonts_include', Font::all())
        ->with('icons', Icon::all())
        ->with('iconcategories', IconCategory::all());

        
    }

    function getDesigned($id){
       $data = Design::findOrFail($id);
       return $data;
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
                ->with('products', Product::whereRaw("cat_id = {$id} and status = 'published'")
                ->get())->render();
     
                break;
            case 'getProductColorByProductid':
                $layout = View::make('Stones::public.design.layouts.productcolors')
                ->with('productcolors', ProductColor::whereRaw("product_id = {$id} and status = 'published'")->get())
                ->render();
                break;
            case 'getAccessories':
                $_result = Icon::findOrFail($id);
                $layout = json_encode(array("id" => $_result->id, 
                    "image" => $_result->image, 
                    "filter_image" => $_result->filter_image,
                    "x" => $x, 
                    "y" => $y, 
                    "title" => $_result->name, 
                    "price" => $_result->price, 
                    "itemData" => $itemData));
                break;
            case 'uploadImageAccessories':
                $base64_string = $data;
                $dir = 'uploads/designed/';
                if (!is_dir($dir)) { mkdir($dir); }
                $output_file = $dir.rand(9,999).'_'.date('ymd_his').'.png';

                $ifp = fopen($output_file, "wb"); 
                $dataImage = explode(',', $base64_string);
                fwrite($ifp, base64_decode($dataImage[1])); 
                fclose($ifp); 

                $layout = $rooturl.$output_file;
                break;
            case 'deleteDesignById':
                $Design = Design::findOrFail($id);
                echo $Design->delete(); die;
                break;
            case 'saveData':
                // upload image
                $base64_string = $image;
                $dir = 'uploads/designed/';
                if (!is_dir($dir)) { mkdir($dir); }
                $output_file = $dir.rand(9,999).'_'.date('ymd_his').'.jpg';

                $ifp = fopen($output_file, "wb"); 
                $dataImage = explode(',', $base64_string);
                fwrite($ifp, base64_decode($dataImage[1])); 
                fclose($ifp); 

                // Save data
                $user = \Sentry::getUser();
                $_handle_data = 'create';

                if($user['id']){
                    $_data = array("image" => $output_file, "data" => json_encode($data), "status" => "published", "created_by" => $user['id']);        
                    if( isset($d_id) && $d_id != 0 ) {
                        $designed = $this->getDesigned($d_id);
                        if( $designed->created_by == $user['id'] ) {
                            $_data['id'] = $d_id;
                            $_handle_data = 'update';
                            //Design::findOrFail($d_id)->update($_data);
                        }
                    }
                }else{
                    $_data = array("image" => $output_file, "data" => json_encode($data), "status" => "published");
                }

                if( $_handle_data == 'update' ) {
                    Design::findOrFail($d_id)->update($_data);
                    $result = $this->getDesigned($d_id);
                }else {
                    $result = Design::create($_data);
                }
                
                
                if(isset($link) && $afterFunc == 'login'){
                    $return_url = base64_encode('/design/edit/'.$result->id);
                    $layout = $link.'/'.$return_url;
                }elseif(isset($afterFunc) && $afterFunc == 'formRegister'){
                    $return_url = base64_encode('/design/edit/'.$result->id);
                    $layout = $return_url;
                }elseif(isset($afterFunc) && $afterFunc == 'formLogin'){
                    $return_url = base64_encode('/design/edit/'.$result->id);
                    $layout = $return_url;
                }elseif(isset($afterFunc) && $afterFunc == 'userSaveDesign'){
                    $return_url = '/design/edit/'.$result->id;
                    $layout = $rooturl.$return_url;
                }else{
                    $layout = urlencode($rooturl.$result->image);
                }
                break;
            // case 'getIconByCatId':
            //     $layout = View::make('Stones::public.design.layouts.productcolors')
            //     ->with('productcolors', ProductColor::whereRaw("product_id = {$id} and status = 'published'")->get())
            //     ->render();
            //     break;
        }
        echo json_encode( array('layout' => $layout) );exit;
    }

    public function myDesign() {
        $user = \Sentry::getUser();

        if( isset( $user->id ) ) {
            $this->layout->title = 'My Design';
            $this->layout->content = View::make('Stones::public.design.myDesign.index')
            ->with('design_items', Design::whereRaw("created_by = $user->id")->get());
        }else {
            $this->layout->title = 'My Design';
            $this->layout->content = View::make('Stones::public.design.myDesign.index');
        }
    }

    public function store(){
        $this->layout->title = 'Store';
    }

    public function show(){
        $this->layout->title = 'Show';
    }
}


