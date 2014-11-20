<?php namespace Components\Memorials\Models;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;

class MemorialUser extends \Eloquent 
{
    protected $table = 'granit_memorial_users';
    protected $fillable = array('name', 'avatar', 'birthday', 'death', 'biography', 'obituary', 'status', 'ordering', 'created_by');
    protected $guarded = array('id');
}