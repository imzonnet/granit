<?php namespace Components\Memorials\Models;

use App, Str;
use Robbo\Presenter\PresentableInterface;
use Components\Memorials\Presenters\MemorialPresenter;

class Memorial extends \Eloquent implements PresentableInterface
{
    protected $table = 'granit_memorials';
    protected $fillable = array('name', 'avatar', 'birthday', 'death', 'biography', 'obituary', 'created_by');
    protected $guarded = array('id');
    
    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\MemorialValidator')->validateForCreation($attributes);
        $attributes['avatar'] = $attributes['image'];
        $attributes['created_by'] = current_user()->id;
        return parent::create($attributes);
    }

    /**
     * When creating a icon, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        App::make('Components\\Memorials\\Validation\\MemorialValidator')->validateForUpdate($attributes);
        $attributes['avatar'] = $attributes['image'];
        $attributes['created_by'] = current_user()->id;
        return parent::update($attributes);
    }

    /**
     * Get thumbnail image
     * @return string
     */
    
    /**
    * Implement presenter
    */
    public function getPresenter() {
        return new MemorialPresenter($this);
    }
    
}   
