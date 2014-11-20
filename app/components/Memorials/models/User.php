<?php namespace Components\Memorials\Models;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;

class User extends \Eloquent 
{
    protected $table = 'granit_memorial_users';
    protected $fillable = array('user_id', 'memorial_id', 'status', 'created_by');
    protected $guarded = array('id');
}