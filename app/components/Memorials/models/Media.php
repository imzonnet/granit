<?php namespace Components\Memorials\Models;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;
use Robbo\Presenter\PresentableInterface;
use Components\Memorials\Presenters\MediaPresenter;

class Media extends \Eloquent implements PresentableInterface
{
    protected $table = 'granit_memorial_media';
    protected $fillable = array('title', 'media_type', 'image', 'url', 'memorial_id', 'created_by');
    protected $guarded = array('id');
    
    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\MediaValidator')->validateForCreation($attributes);
        $attributes['created_by'] = current_user()->id;
        return parent::create($attributes);
    }

    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\MediaValidator')->validateForUpdate($attributes);
        $attributes['created_by'] = current_user()->id;
        return parent::update($attributes);
    }
    
    /**
     * Get list media type
     * @return array
     */
    public function scopeType() {
        return [
            'image' => 'Image',
            'video' => 'Video'
        ];
    }
    
    /**
    * Implement presenter
    */
    public function getPresenter() {
        return new MediaPresenter($this);
    }
    
}