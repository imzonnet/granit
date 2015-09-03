<?php

namespace Components\Blocks\Models;

use App;

class Block extends \Eloquent {

    protected $table = 'exp_blocks';
    protected $fillable = array('info', 'status', 'region', 'pages', 'visibility', 'order');
    protected $guarded = array('id');
    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Blocks\\Validation\\BlockValidator')->validateForCreation($attributes);

        return parent::create($attributes);
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Blocks\\Validation\\BlockValidator')->validateForUpdate($attributes);

        return parent::update($attributes);
    }

    /**
     * Relationship
     * @param null $language
     * @return
     */
    public function translates($language = NULL) {
        if(\Request::is('backend*')) {
            return $this->hasMany('Components\Blocks\Models\BlockTranslate', 'block_id', 'id');
        }
        if( $language == NULL ) {
            $language = current_language();
        }
        return $this->hasMany('Components\Blocks\Models\BlockTranslate', 'block_id', 'id')->where('language', '=', $language);
    }

    /**
     * Get all the statuses available for a post
     * @return array
     */
    public static function all_status() {
        return array(
            '1' => 'Publish',
            '0' => 'Unpublish',
            '-1' => 'Draft',
        );
    }

    /**
     * Register Regions Block for Theme
     * @return array
     */
    public static function regions() {
        return [
            'introduce' => 'Introduce',
            'feature_first' => 'Feature First',
            'feature_second' => 'Feature Second',
            'feature_third' => 'Feature Third',
            'feature_fourth' => 'Feature Fourth',
            'portfolio' => 'Portfolio',
            'testimonials'  =>  'Testimonials',
            'testimonial_quotes'  =>  'Testimonial Quotes',
            'advertisement' => 'Advertisement',
            'team' => 'Teams'
        ];
    }
    /**
     * Register Languages use
     * @return array
     */
    public static function languages() {
        return [
            'en' => 'English',
            'icl' => 'IceLand'
        ];
    }
}
