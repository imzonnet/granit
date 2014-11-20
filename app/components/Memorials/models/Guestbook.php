<?php namespace Components\Memorials\Models;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;
use Robbo\Presenter\PresentableInterface;
use Components\Memorials\Presenters\GuestbookPresenter;

class Guestbook extends \Eloquent implements PresentableInterface
{
    protected $table = 'granit_memorial_guestbooks';
    protected $fillable = array('title', 'content', 'memorial_id', 'created_by');
    protected $guarded = array('id');
    
    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\GuestbookValidator')->validateForCreation($attributes);
        $attributes['created_by'] = current_user()->id;
        return parent::create($attributes);
    }

    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\GuestbookValidator')->validateForUpdate($attributes);
        $attributes['created_by'] = current_user()->id;
        return parent::update($attributes);
    }

    /**
     * Get thumbnail image
     * @return string
     */
    
    /**
    * Implement presenter
    */
    public function getPresenter() {
        return new GuestbookPresenter($this);
    }
    
}