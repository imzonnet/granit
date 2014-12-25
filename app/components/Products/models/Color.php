<?php

namespace Components\Products\Models;

use App,
    Str;
use Robbo\Presenter\PresentableInterface;
use Components\Products\Presenters\ColorPresenter;
use Components\Products\Models\ProductColor;

class Color extends \Eloquent implements PresentableInterface {

    protected $table = 'granit_product_colors';
    protected $fillable = array('name', 'icon');
    protected $guarded = array('id');
    public $timestamps = false;

    /**
     * Relationship
     */
    public function product_color() {
        return $this->hasMany('Components\Products\Models\ProductColor', 'color_id', 'id');
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Products\\Validation\\ColorValidator')->validateForCreation($attributes);

        return parent::create($attributes);
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Products\\Validation\\ColorValidator')->validateForUpdate($attributes);

        return parent::update($attributes);
    }

    /**
     * Get all product categories
     * @return array
     */
    public static function all_colors() {
        $colors = array();
        foreach (Color::all() as $color) {
            $colors[$color->id] = $color->name;
        }
        return $colors;
    }

    /**
     * Get all the statuses available for a post
     * @return array
     */
    public static function all_status() {
        return array(
            'published' => 'Publish',
            'unpublished' => 'Unpublish',
            'drafted' => 'Draft',
            'archived' => 'Archive'
        );
    }

    /**
     * Initiate the presenter class
     */
    public function getPresenter() {
        return new ColorPresenter($this);
    }

}
