<?php namespace Components\Stones\Models;

class IconCategory extends \BaseController {
	protected $table = 'granit_icon_categories';
	
	public function icon() {
		return $this->hasMany('Icon', 'cat_id', 'id', 'granit_icon_categories');
	}
}