<?php
/**
 * Created by PhpStorm.
 * User: nguyenhieptn
 * Date: 11/14/14
 * Time: 5:05 PM
 */

class Lop extends \Eloquent {
    protected $table = 'class';

    public function students(){
        return $this->hasMany('Student','class_id','id','students');
    }
}