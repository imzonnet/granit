<?php namespace Components\Products\Models;

use App, Str;
use Robbo\Presenter\PresentableInterface;
use Components\Products\Presenters\ProductPresenter;

class Product extends \Eloquent implements PresentableInterface {
	protected $table = 'granit_products';
    
    protected $fillale = array('code', 'name', 'alias', 'cat_id', 'image', 'price', 'state', 'ordering', 'created_by');
    
    protected $guarded = array('id');
    /**
     * Relationship
     */
    public function category() {
        return $this->belongsTo('Category', 'cat_id', 'id');
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
    public function setAliasAttribute($alias)
    {
        if ($alias == '') {
            $this->attributes['alias'] = Str::slug($this->attributes['name'], '-');

            if (Category::where('alias', '=', $this->attributes['alias'])->first()) {
                $this->attributes['alias'] = Str::slug($this->attributes['name'], '-') . '-1';
            }
        }
    }

	/**
     * Get all the statuses available for a post
     * @return array
     */
    public static function all_status()
    {
        return array(
                'published'   => 'Publish',
                'unpublished' => 'Unpublish',
                'drafted'     => 'Draft',
                'archived'    => 'Archive'
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