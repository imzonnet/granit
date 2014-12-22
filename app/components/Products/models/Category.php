<?php

namespace Components\Products\Models;

use App,
    Str;
use Robbo\Presenter\PresentableInterface;
use Components\Products\Presenters\CategoryPresenter;

class Category extends \Eloquent implements PresentableInterface {

    protected $table = 'granit_product_categories';
    protected $fillable = array('name', 'alias', 'image', 'description', 'state', 'ordering', 'created_by');
    protected $guarded = array('id');

    /**
     * Relationship
     */
    public function product() {
        return $this->hasMany('Product', 'cat_id', 'id');
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Products\\Validation\\CategoryValidator')->validateForCreation($attributes);
        $attributes['created_by'] = current_user()->id;

        return parent::create($attributes);
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Products\\Validation\\CategoryValidator')->validateForUpdate($attributes);
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

            if (Category::where('alias', '=', $this->attributes['alias'])->first()) {
                $this->attributes['alias'] = Str::slug($this->attributes['name'], '-') . '-1';
            }
        }
    }

    /**
     * Get all product categories
     * @return array
     */
    public static function all_categories() {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        return $categories;
    }
    
    /**
     * Render HTML List menu
     * @return string
     */
    public static function menu($class = "list list-ok alt") {
        $html = '<ul class="menu '.$class.'">';
        $html .= '<li><a href="'.url('category/all').'">All Gravestones</a></li>';
        foreach( Category::all() as $cat  ) {
            $html .= '<li class="list-child"><a href="'.url('category/'.$cat->alias).'">'.$cat->name.'</a></li>';
        }
        $html .= '</ul>';
        return $html;
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
        return new CategoryPresenter($this);
    }

}
