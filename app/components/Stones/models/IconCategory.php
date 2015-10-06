<?php

namespace Components\Stones\Models;

use App,
    Str;
use Robbo\Presenter\PresentableInterface;
use Components\Stones\Presenters\IconCategoryPresenter;

class IconCategory extends \Eloquent implements PresentableInterface {

    protected $table = 'granit_icon_categories';
    public $timestamps = false;
    protected $fillable = array('name', 'alias', 'image', 'description', 'status', 'ordering', 'created_by', 'parent_id');
    protected $guarded = array('id');

    public function translate() { return array('name', 'description'); }
    public function table() { return $this->table; }

    public function icon() {
        return $this->hasMany('Components\Stones\Models\Icon', 'cat_id', 'id', 'granit_icon_categories');
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Stones\\Validation\\IconCategoryValidator')->validateForCreation($attributes);
        $attributes['created_by'] = current_user()->id;
        return parent::create($attributes);
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Stones\\Validation\\IconCategoryValidator')->validateForUpdate($attributes);
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

            if (IconCategory::where('alias', '=', $this->attributes['alias'])->first()) {
                $this->attributes['alias'] = Str::slug($this->attributes['name'], '-') . '-1';
            }
        }
    }
    /**
     * Get all the icon categories
     * @return array
     */
    public static function all_categories($id = 0) {
        $categories = array('0' => 'None');
        foreach (IconCategory::all() as $category) {
            if ($category->id != $id)
                $categories[$category->id] = $category->name;
        }
        return $categories;
    }

    /**
     * Get all the icon categories
     * @return array
     */
    public function scopeParentCategories($query, $id = 0) {
        if ($id != 0) {
            return $query->where('id', '=', $id)->all();
        } else {
            return $query->all();
        }
    }

    /**
     * Render HTML List menu
     * @return string
     */
    public static function menu($class = "list list-ok alt") {
        $html = '<ul class="menu ' . $class . '">';
        foreach (IconCategory::all() as $icon) {
            $html .= '<li><a href="' . url('icon-category/' . $icon->alias) . '">' . get_trans($icon, 'name') . '</a></li>';
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
     * Get thumbnail image
     * @return string
     */

    /**
     * Implement presenter
     */
    public function getPresenter() {
        return new IconCategoryPresenter($this);
    }

}
