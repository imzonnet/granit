<?php 
namespace App\Components\Shop;

use App\Components\ServiceProvider;

class ShopServiceProvider extends ServiceProvider {

    public function register()
    {
        parent::register('Shop');
    }

    public function boot()
    {
        parent::boot('Shop');
    }

}