<?php namespace Components\Stones\Models;

use App, Str;
use Robbo\Presenter\PresentableInterface;
use Components\Products\Presenters\IconCategoryPresenter;

class IconCategory extends \Eloquent implements PresentableInterface {
	protected $table = 'granit_icon_categories';
	
	public function icon() {
		return $this->hasMany('Icon', 'cat_id', 'id', 'granit_icon_categories');
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
        return new IconCategoryPresenter($this);
    }

}