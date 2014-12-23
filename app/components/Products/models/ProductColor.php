<?php

namespace Components\Products\Models;

use App,
    Str;
use Robbo\Presenter\PresentableInterface;
use Components\Products\Presenters\ProductColorPresenter;

class ProductColor extends \Eloquent implements PresentableInterface {

    protected $table = 'granit_product_color_map';
    protected $fillable = array('product_id', 'name', 'color_id', 'image', 'price', 'sale', 'characteristic_price', 'status', 'ordering', 'created_by');
    protected $guarded = array('id');

    /**
     * Relationship
     */
    public function product() {
        return $this->belongsTo('Components\Products\Models\Product', 'product_id', 'id');
    }

    /*
     * Relationship
     */

    public function color() {
        return $this->belongsTo('Components\Products\Models\Color', 'color_id', 'id');
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Products\\Validation\\ProductColorValidator')->validateForCreation($attributes);
        $attributes['created_by'] = current_user()->id;

        return parent::create($attributes);
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Products\\Validation\\ProductColorValidator')->validateForUpdate($attributes);
        $attributes['created_by'] = current_user()->id;

        return parent::update($attributes);
    }

    /**
     * Automatically set the alias, if one is not provided
     * @param string $alias
     */
    public function setAliasAttribute($alias) {
        if ($alias == '') {
            $this->attributes['alias'] = Str::slug($this->attributes['name'], '-');

            if (Product::where('alias', '=', $this->attributes['alias'])->first()) {
                $this->attributes['alias'] = Str::slug($this->attributes['name'], '-') . '-1';
            }
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
        return new ProductColorPresenter($this);
    }

}
