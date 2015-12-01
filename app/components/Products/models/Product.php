<?php

namespace Components\Products\Models;

use App,
    Str;
use Robbo\Presenter\PresentableInterface;
use Components\Products\Presenters\ProductPresenter;
use Components\Products\Models\ProductColor;
use Components\Products\Models\Category;

class Product extends \Eloquent implements PresentableInterface {

    protected $table = 'granit_products';
    protected $fillable = array('product_code', 'name', 'alias', 'width', 'height', 'cat_id', 'status', 'ordering', 'created_by');
    protected $guarded = array('id');

    /**
     * Relationship
     */
    public function category() {
        return $this->belongsTo('Components\Products\Models\Category', 'cat_id', 'id');
    }

    /**
     * Relationship
     */
    public function productColor() {
        return $this->hasMany('Components\Products\Models\ProductColor', 'product_id', 'id');
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Products\\Validation\\ProductValidator')->validateForCreation($attributes);
        $attributes['created_by'] = current_user()->id;

        return parent::create($attributes);
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Products\\Validation\\ProductValidator')->validateForUpdate($attributes);
        $attributes['created_by'] = current_user()->id;

        return parent::update($attributes);
    }

    /**
     * Automatically set the alias, if one is not provided
     * @param string $alias
     */
    public function setAliasAttribute($alias) {
        if ($alias == '') {
	        $slug = Str::slug($this->attributes['name']);
	        $slugCount = count( Product::whereRaw("alias REGEXP '^{$slug}(-[0-9]*)?$'")->get() );
	        $this->attributes['alias'] = ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
        } else {
	        $this->attributes['alias'] = $alias;
        }
    }

    /**
     * Get all the published posts that are within the publish date range
     * @return query
     */
    public function scopePublished($query) {
        return $query->where('status', '=', 'published');
    }

    /**
     * Get the recently created posts
     * @return query
     */
    public function scopeRecent($query) {
        return $query->orderBy('created_at', 'DESC');
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
     * Get thumbnail image
     * @return string
     */

    /**
     * Implement presenter
     */
    public function getPresenter() {
        return new ProductPresenter($this);
    }

}
