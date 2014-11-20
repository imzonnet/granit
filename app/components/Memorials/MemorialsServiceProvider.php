<?php
namespace App\Components\Memorials;
/**
 * Project EXP Laravel
 * User: nguyenhieptn
 * Date: 11/18/14
 * Time: 10:08 AM
 */
class MemorialsServiceProvider extends \App\Components\ServiceProvider {


    public function register()
    {
        parent::register('Memorials');
    }

    public function boot()
    {
        parent::boot('Memorials');
    }
}