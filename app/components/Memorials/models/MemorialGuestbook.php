<?php namespace Components\Memorials\Models;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;

class MemorialGuestbook extends \Eloquent 
{
    protected $table = 'granit_memorial_guestbooks';
    protected $fillable = array('name', 'avatar', 'birthday', 'death', 'biography', 'obituary', 'status', 'ordering', 'created_by');
    protected $guarded = array('id');
}