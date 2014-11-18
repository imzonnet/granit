<?php
namespace App\Components\MyGalleries;
/**
 * Project EXP Laravel
 * User: nguyenhieptn
 * Date: 11/18/14
 * Time: 10:08 AM
 */
class ServiceProvider extends \App\Components\ServiceProvider {

    public function register()
    {
        parent::register('mygalleries');
    }

    public function boot()
    {
        parent::boot('mygalleries');
    }

}