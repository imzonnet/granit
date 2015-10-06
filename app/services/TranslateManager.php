<?php namespace Services;
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
use Exception;
use File;
use Image;
use Input;
use Sentry;
use Str;
use URL;


class TranslateManager {

    private $model;
    public function __construct(\Translate $translate) {
        $this->model = $translate;
    }

    /**
     * Create new Translate
     * @param array $input
     */
    public function create($input = array()) {
        \Translate::create($input);
    }

    /**
     * Get all translated record
     * @param $object
     * @param null $language
     * @param string $field
     * @return bool
     */
    public function all($object, $language = NULL, $field = NULL) {
        $module = get_class($object);
        if(!$module) return false;
        $query = $this->model->where('module', '=', $module)
            ->where('ref_id', '=', $object->id);
        if($language) {
            $query->where('language', '=', $language);
        }
        if($field) {
            $query->where('field', '=', $field);
        }
        return $query->get();
    }

    /**
     * Get list languages
     * @return array
     */
    public function languages() {
        return $this->model->languages();
    }

    /**
     * Get translated record
     * @param $object
     * @param null $language
     * @param string $field
     * @return bool
     */
    public function find($object, $language = NULL, $field = NULL) {
        $module = get_class($object);
        if(!$module) return false;
        $query = $this->model->where('module', '=', $module)
            ->where('ref_id', '=', $object->id);
        if($language) {
            $query->where('language', '=', $language);
        }
        if($field) {
            $query->where('field', '=', $field);
        }
        return $query->first();
    }

    public function save($object, $language, $field, $value) {
        return $this->model->create([
            'module' => get_class($object),
            'ref_id' => $object->id,
            'field' => $field,
            'content' => $value,
            'language' => $language
        ]);
    }

}