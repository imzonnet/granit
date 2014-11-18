<?php namespace Components\MyGalleries\Models;
use App, Input, Post, Redirect, Request, Sentry, Str, View, File;

class MyGallery extends \Eloquent
{
	protected $table = 'mygalleries';
	protected $filable = array('name', 'alias', 'description', 'images', 'status', 'ordering', 'created_by');
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
}