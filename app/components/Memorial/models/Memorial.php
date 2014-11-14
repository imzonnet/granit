<?php
/*
=================================================
CMS Name  :  DOPTOR
CMS Version :  v1.2
Available at :  www.doptor.org
Copyright : Copyright (coffee) 2011 - 2014 Doptor. All rights reserved.
License : GNU/GPL, visit LICENSE.txt
Description :  Doptor is Opensource CMS.
===================================================
*/
use Robbo\Presenter\PresentableInterface;
use Carbon\Carbon;

class Memorial extends Eloquent {
    protected $table = 'posts';

    /**
     * Relation with the categories table
     * A post can have many categories
     */
    public function categories()
    {
        return $this->belongsToMany('Category');
    }
}