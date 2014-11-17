<?php namespace Components\Stones\Models;

class Icon extends \BaseController {
	protected $table = 'granit_icons';
	
	public function category() {
		return $this->belongsTo('IconCategory', 'cat_id', 'id', 'granit_icons');
	}
}