<?php
namespace App\Components\Shop;

class ShopServiceProvider extends \App\Components\ServiceProvider {

    public function register()
    {
        parent::register('Shop');
    }

    public function boot()
    {
        parent::boot('Shop');
    }

}