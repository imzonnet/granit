<?php
namespace App\Components\Stones;

class StonesServiceProvider extends \App\Components\ServiceProvider {

    public function register()
    {
        parent::register('Stones');
    }

    public function boot()
    {
        parent::boot('Stones');
    }

}