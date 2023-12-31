<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 10 April 2017 17:00
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

/**
 * _substr()
 *
 * @param mixed $str
 * @param mixed $length
 * @param integer $minword
 * @return
 */
function _substr($str, $length, $minword = 3)
{
    $sub = '';
    $len = 0;

    foreach (explode(' ', $str) as $word) {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);

        if (isset($word{$minword}) && isset($sub{$length - 1})) {
            break;
        }
    }

    return $sub . ((isset($str{$len})) ? '...' : '');
}

$weblinks_config = array();
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_config';
$list = $nv_Cache->db($sql, '', $module_name);
foreach ($list as $l) {
    $weblinks_config[$l['name']] = $l['value'];
}
unset($sql, $list);


// Khái báo các hàm phục vụ chung
if( !function_exists('oa_load_model') ){
    function oa_load_model($modelName){
        // return 123;
        global $module_info   ;
        include_once NV_ROOTDIR . '/modules/' . $module_info['module_file'].'/models/OAModel.php';
        include_once NV_ROOTDIR . '/modules/' . $module_info['module_file'].'/models/'.$modelName.'.php';
        $model = new $modelName;
        return $model;
    }
}
if( !function_exists('pr') ){
    function pr($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if( !function_exists('dd') ){
    function dd($data){
        pr($data);
        die();
    }
}