<?php

/**
 * TMS Content Management System
 * @version 4.x
 * @author Tập Đoàn TMS Holdings <contact@thuongmaiso.vn>
 * @copyright (C) 2009-2021 Tập Đoàn TMS Holdings. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://thuongmaiso.vn
 */

if (!defined('NV_MAINFILE')) {exit('Stop!!!');}

$config_setting = getConfig($module_name);
$position=array();
$position[]='Nhân viên';
$position[]='Trưởng phòng';

function get_info_vote($id){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG."_".$module_name. "_row where id=".$id)->fetch();
    return $list;
}

function get_row_id($id){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG."_".$module_name. "_row where id=".$id)->fetch();
    return $list;
}

function get_row_id_select2($q){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG."_".$module_name. "_row where (title like '%".str_replace(' ','%',$q)."%') and status=1 ORDER BY weight ASC")->fetchAll();
    return $list;
}

function get_info_cats($cats_id){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG."_".$module_name. "_cats where id=".$cats_id)->fetch();
    return $list;
}

function get_cats_select2($q){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG."_".$module_name. "_cats where (title like '%".str_replace(' ','%',$q)."%') and status=1 ORDER BY weight ASC")->fetchAll();
    return $list;
}

function get_info_user($userid){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_USERS_GLOBALTABLE. " where userid=".$userid)->fetch();
    return $list;
}

function get_info_user_select2($q){
    global $db,$db_config,$module_name;

    $list= $db->query("SELECT * FROM " .NV_USERS_GLOBALTABLE. " where (username like '%".str_replace(' ','%',$q)."%')" )->fetchAll();

    return $list;
}



function get_info_staff($staff_id){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG ."_".$module_name. "_staff where id=".$staff_id)->fetch();
    return $list;
}
function get_info_department($project_id){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG."_".$module_name. "_department where id=".$project_id)->fetch();
    return $list;
}



function get_staff_select2($q){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG."_".$module_name. "_staff where (staff_code like '%".str_replace(' ','%',$q)."%' OR name_staff like '%".str_replace(' ','%',$q)."%') and status=1 ORDER BY weight ASC")->fetchAll();
    return $list;
}

function get_department_select2($q){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG."_".$module_name. "_department where (name_department like '%".str_replace(' ','%',$q)."%') and status=1 ORDER BY weight ASC")->fetchAll();
    return $list;
}


function get_user_staff_department_select2($q,$deparment_id){
    global $db,$db_config,$module_name;
    $list=$db->query("SELECT * FROM " .NV_PREFIXLANG."_".$module_name. "_staff where (staff_code like '%".str_replace(' ','%',$q)."%' OR name_staff like '%".str_replace(' ','%',$q)."%') and status=1 and id NOT IN (SELECT staff_id FROM ".NV_PREFIXLANG."_".$module_name."_department_staff) and position_id=0 ORDER BY weight ASC")->fetchAll();
    return $list;
}

function get_List_User($user_id)
{
    global $db;
    $list = $db->query( 'SELECT * FROM ' . NV_USERS_GLOBALTABLE . ' where userid = ' . $user_id  ) -> fetch();
    return $list;
}

function getConfig( $module )
{
    global $nv_Cache, $site_mods,$db_config;
    
    $list = $nv_Cache->db( 'SELECT config_name, config_value FROM ' . NV_PREFIXLANG . '_' . $module . '_config', '', $module );
    $Config = array();
    foreach( $list as $values )
    {
        $Config[$values['config_name']] = $values['config_value'];
    }
    unset( $list ); 
    
    return $Config;
}
function ag_weekday($agtoday) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $weekday = date('l', $agtoday);

    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
        $weekday = 2;
        break;
        case 'tuesday':
        $weekday = 3;
        break;
        case 'wednesday':
        $weekday = 4;
        break;
        case 'thursday':
        $weekday = 5;
        
        break;
        case 'friday':
        $weekday = 6;

        break;
        case 'saturday':
        $weekday = 7;

        break;
        default:
        $weekday = 8;

        break;
    }

    return $weekday;
}

$agtoday=   ag_weekday(NV_CURRENTTIME);

function nv_get_week_from_time($time)
{
    $week = 1;
    $year = date('Y', $time);
    $real_week = array($week, $year);
    $time_per_week = 86400 * 7;
    $time_start_year = mktime(0, 0, 0, 1, 1, $year);
    $time_first_week = $time_start_year - (86400 * (date('N', $time_start_year) - 1));
    
    $addYear = true;
    $num_week_loop = nv_get_max_week_of_year($year) - 1;
    
    for ($i = 0; $i <= $num_week_loop; $i++) {
        $week_begin = $time_first_week + $i * $time_per_week;
        $week_next = $week_begin + $time_per_week;
        
        if ($week_begin <= $time and $week_next > $time) {
            $real_week[0] = $i + 1;
            $addYear = false;
            break;
        }
    }
    if ($addYear) {
        $real_week[1] = $real_week[1] + 1;
    }
    
    return $real_week;
} 

/**
 * nv_get_max_week_of_year()
 * 
 * @param mixed $year
 * @return
 */
function nv_get_max_week_of_year($year)
{
    $time_per_week = 86400 * 7;
    $time_start_year = mktime(0, 0, 0, 1, 1, $year);
    $time_first_week = $time_start_year - (86400 * (date('N', $time_start_year) - 1));
    
    if (date('Y', $time_first_week + ($time_per_week * 53) - 1) == $year) {
        return 53;
    } else {
        return 52;
    }
}
