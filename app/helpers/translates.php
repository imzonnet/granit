<?php
/**
 * Check Translate Status
 * @param $module
 * @param $id
 * @param $lang
 * @return string
 */
function trans_status($module, $id, $lang) {
    $trans = Translate::where('language', '=', $lang)
        ->where('module', '=', $module)
        ->where('ref_id', '=', $id);
    if($trans->count() > 0 )
        return 'Translated';
    else
        return 'Not Translate';
}

/**
 * Get Translated
 * @param $module
 * @param $lang
 * @param $field
 * @return mixed
 */
function trans_get($module, $lang, $field) {
    $base_class = get_class($module);
    if( method_exists($module, 'getObject')) {
        $base_class = get_class($module->getObject());
    }
    $trans = Translate::where('language', '=', $lang)
        ->where('module', '=', $base_class)
        ->where('ref_id', '=', $module->id)
        ->where('field', '=', $field);
    if( $trans->count() > 0 )
        return $trans->first()->content;
    return
        $module->$field;
}

function get_trans($module, $field) {
    return trans_get($module, current_language(), $field);
}