<?php namespace Components\Stones\Models;

use App, Str;
use Robbo\Presenter\PresentableInterface;
use Components\Stones\Presenters\ColorPresenter;

class Color extends \Eloquent implements PresentableInterface {
    protected $table = 'granit_colors';
    public $timestamps = false;

    protected $fillable = array('name', 'hexcode', 'status', 'ordering', 'created_by');
    protected $guarded = array('id');


    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Stones\\Validation\\ColorValidator')->validateForCreation($attributes);
        $attributes['created_by'] = current_user()->id;
        return parent::create($attributes);
    }

    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Stones\\Validation\\ColorValidator')->validateForUpdate($attributes);
        $attributes['created_by'] = current_user()->id;
        return parent::update($attributes);
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
        return new ColorPresenter($this);
    }

}