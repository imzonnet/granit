<?php 
namespace App\Components\Blocks;

use App\Components\ServiceProvider;

class BlocksServiceProvider extends ServiceProvider {

    public function register()
    {
        parent::register('Blocks');
        // Add routes
        $helper = app_path() . '/components/Blocks/Helpers/Block.php';
        if (file_exists($helper)) require $helper;
    }

    public function boot()
    {
        parent::boot('Blocks');

    }

}