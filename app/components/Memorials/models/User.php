<?php

namespace Components\Memorials\Models;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;
use Robbo\Presenter\PresentableInterface;
use Components\Memorials\Presenters\UserPresenter;

class User extends \Eloquent implements PresentableInterface {

    protected $table = 'granit_memorial_users';
    protected $fillable = array('user_id', 'memorial_id', 'status');
    protected $guarded = array('id');
    
    public function user() {
        return $this->belongsTo('User');
    }
    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\UserValidator')->validateForCreation($attributes);
        //$attributes['created_by'] = current_user()->id;
        $attributes['status'] = 'published';
        return parent::create($attributes);
    }

    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\UserValidator')->validateForUpdate($attributes);
        return parent::update($attributes);
    }
    /**
     * Check permision for create guestbook, media for memorial
     */
    public function scopeHasAccess($query, $mid, $uid) {
        $user = $query->where('memorial_id', $mid)->where('user_id', $uid)->get();
        if( count($user) > 0 ) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Implement presenter
     */
    public function getPresenter() {
        return new UserPresenter($this);
    }

}
