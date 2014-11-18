<?php 
namespace App\Components\Products;

class ServiceProvider extends \App\Components\ServiceProvider {

    public function register()
    {
        parent::register('Products');
    }

    public function boot()
    {
        parent::boot('Products');
    }

}