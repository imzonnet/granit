<?php namespace Components\Stones\Models;

use App, Str;
use Robbo\Presenter\PresentableInterface;
use Components\Products\Presenters\IconPresenter;

class Icon extends \Eloquent implements PresentableInterface {
	protected $table = 'granit_icons';
	
	public function category() {
		return $this->belongsTo('IconCategory', 'cat_id', 'id', 'granit_icons');
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
        return new IconPresenter($this);
    }

}