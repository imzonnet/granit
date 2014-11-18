<?php namespace Components\MyGalleries\Models;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;
use Robbo\Presenter\PresentableInterface;
use Components\MyGalleries\Presenters\CategoryPresenter;

class Category extends \Eloquent implements PresentableInterface
{
	protected $table = 'mygallery_categories';
	protected $filable = array('name', 'alias', 'image', 'description', 'state', 'ordering', 'created_by');
	protected $guarded = array('id');

	public static function all_status()
    {
        return array(
                'published'   => 'Publish',
                'unpublished' => 'Unpublish',
                'drafted'     => 'Draft',
                'archived'    => 'Archive'
            );
    }

    public static function create(array $attributes = array()) {
        App::make('Components\\MyGalleries\\Validation\\CategoryValidator')->validateForCreation($attributes);
        $attributes['created_by'] = current_user()->id;

        return parent::create($attributes);
    }

    public function update(array $attributes = array()) {
        App::make('Components\\MyGalleries\\Validation\\CategoryValidator')->validateForUpdate($attributes);
        $attributes['created_by'] = current_user()->id;

        return parent::update($attributes);
    }

    public function setAliasAttribute($alias)
    {
        if ($alias == '') {
            $this->attributes['alias'] = Str::slug($this->attributes['name'], '-');

            if (Category::where('alias', '=', $this->attributes['alias'])->first()) {
                $this->attributes['alias'] = Str::slug($this->attributes['name'], '-') . '-1';
            }
        }
    }

    public static function all_categories() {
        $categories = array();
        foreach( Category::all() as $category ) {
            $categories[$category->id] = $category->name;
        }
        return $categories;
    }

    public function getPresenter()
    {
        return new CategoryPresenter($this);
    }
}