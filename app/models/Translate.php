<?php

class Translate extends Eloquent
{
    protected $table = 'translates';
    protected $fillable = array('ref_id', 'module', 'content', 'field', 'language');
    protected $guarded = array('id');

    public static $rules = array(
        'ref_id'            => 'integer|required',
        'module'            => 'required',
        'content'           => 'required',
        'field'             => 'required',
        'language'          => 'required'
    );

    /**
     * Languages for translate
     * @return array
     */
    public static function languages() {
        return [
            'icl' => 'IceLand'
        ];
    }
}