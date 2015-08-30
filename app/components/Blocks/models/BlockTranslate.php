<?php

namespace Components\Blocks\Models;

use App;

class BlockTranslate extends \Eloquent {

    protected $table = 'exp_block_translates';
    protected $fillable = array('title', 'description', 'language', 'block_id');
    protected $guarded = array('id');
    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public static function create(array $attributes = array()) {
        //App::make('Components\\Blocks\\Validation\\BlockValidator')->validateForCreation($attributes);

        return parent::create($attributes);
    }

    /**
     * When creating a category, run the attributes through a validator first.
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = array()) {
        //App::make('Components\\Blocks\\Validation\\BlockValidator')->validateForUpdate($attributes);

        return parent::update($attributes);
    }

    /**
     * Relationship
     */
    public function block() {
        return $this->belongsTo('Components\Blocks\Models\Block', 'block_id', 'id');
    }

}
