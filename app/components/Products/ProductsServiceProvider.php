<?php 
namespace App\Components\Products;

class ProductsServiceProvider extends \App\Components\ServiceProvider {

    public function register()
    {
        parent::register('Products');
    }

    public function boot()
    {
        parent::boot('Products');
    }

}