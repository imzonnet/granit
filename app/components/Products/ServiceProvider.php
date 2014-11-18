<?php 
namespace App\Components\Products;

class ServiceProvider extends \App\Components\ServiceProvider {

    public function register()
    {
        parent::register('products');
    }

    public function boot()
    {
        parent::boot('products');
    }

}