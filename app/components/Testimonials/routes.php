<?php

//Route For Back-end
Route::resource('/backend/testimonials', 'Components\Testimonials\Controllers\Backend\TestimonialsController');
//Route For Front-end

Route::resource('/testimonial', 'Components\Testimonials\Controllers\TestimonialsController');  
