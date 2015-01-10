<?php 
namespace App\Components\Testimonials;

class TestimonialsServiceProvider extends \App\Components\ServiceProvider {

    public function register()
    {
        parent::register('Testimonials');
    }

    public function boot()
    {
        parent::boot('Testimonials');
    }

}