<?php namespace Components\Memorial\Models;

use App, Input, Post, Redirect, Request, Sentry, Str, View, File;

class Memorial extends \Eloquent 
{
	protected $table = 'granit_memorials';
	protected $filable = array('name', 'avatar', 'birthday', 'death', 'biography', 'obituary', 'status', 'ordering', 'created_by');
	protected $guarded = array('id');
}