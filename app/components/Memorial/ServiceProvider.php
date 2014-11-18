<?php
namespace App\Components\Memorial;
/**
 * Project EXP Laravel
 * User: nguyenhieptn
 * Date: 11/18/14
 * Time: 10:08 AM
 */
class ServiceProvider extends \App\Components\ServiceProvider {

    public function register()
    {
        parent::register('memorial');
    }

    public function boot()
    {
        parent::boot('memorial');
    }

}