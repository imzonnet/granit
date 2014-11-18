<?php
/**
 * Project EXP Laravel
 * User: nguyenhieptn
 * Date: 11/18/14
 * Time: 10:02 AM
 */
namespace App\Components;

abstract class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function boot()
    {
        if ($module = $this->getModule(func_get_args()))
        {
            $this->package('app/' . $module, $module, app_path() . '/components/' . $module);
        }
    }

    public function register()
    {
        if ($module = $this->getModule(func_get_args()))
        {
            $this->app['config']->package('app/' . $module, app_path() . '/components/' . $module . '/config');

            // Add routes
            $routes = app_path() . '/components/' . $module . '/routes.php';
            if (file_exists($routes)) require $routes;
        }
    }

    public function getModule($args)
    {
        $module = (isset($args[0]) and is_string($args[0])) ? $args[0] : null;

        return $module;
    }

}