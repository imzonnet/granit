<?php
namespace App\Components\Stones;

class ServiceProvider extends \App\Components\ServiceProvider {

    public function register()
    {
        parent::register('stones');
    }

    public function boot()
    {
        parent::boot('stones');
    }

}