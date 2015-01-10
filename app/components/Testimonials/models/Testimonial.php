<?php

namespace Components\Testimonials\Models;

use App,
    Str;
use Robbo\Presenter\PresentableInterface;
use Components\Testimonials\Presenters\TestimonialPresenter;

class Testimonial extends \Eloquent implements PresentableInterface {

    protected $table = 'granit_testimonials';
    protected $fillable = array('name', 'title', 'description', 'rate', 'ordering');
    protected $guarded = array('id');

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Testimonials\\Validation\\TestimonialValidator')->validateForCreation($attributes);

        return parent::create($attributes);
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Testimonials\\Validation\\TestimonialValidator')->validateForUpdate($attributes);

        return parent::update($attributes);
    }

    /**
     * Get the recently created posts
     * @return query
     */
    public function scopeRecent($query) {
        return $query->orderBy('created_at', 'DESC');
    }
    /**
     * List rating
     */
    public function scopeListRate() {
        return [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5=>5];
    }
    /**
     * Get thumbnail image
     * @return string
     */

    /**
     * Implement presenter
     */
    public function getPresenter() {
        return new TestimonialPresenter($this);
    }

}
