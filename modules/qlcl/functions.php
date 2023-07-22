<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 10 April 2017 17:00
 */

if (! defined('NV_SYSTEM')) {
    die('Stop__func!!!');
}




define('MODULE_LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_data);
define('TABLE', NV_PREFIXLANG . '_' . $module_data);
define('KHOAPHONG', NV_PREFIXLANG . '_quanlynhanluc_khoaphong');
define('NV_STATIC_URL', NV_BASE_SITEURL);
define('THEME_URL', NV_BASE_SITEURL . 'themes/cpanel');
$page_title = $module_info['site_title'];

define('NV_IS_MOD_QLCL', true);
//require_once(NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php');


function userinfo($id)
{
	global $db,$module_data,$lang_module;
	$user=array();
	$sql="SELECT * from ".NV_USERS_GLOBALTABLE. " where userid =".$id." and active=1";
	$user=$db->query($sql)->fetch();
	if (!empty($user))return $user;
	return null; // trả lại giá trị không thực hiện được 
}

function select($id)
{
	global $db,$module_data,$lang_module;
	$sql = 'SELECT * FROM ' . TABLE. "_select where select_group like '".$id."'";
	$ds = $db->query($sql)->fetchAll();
	if (!empty($ds))return $ds;
	return null; // trả lại giá trị không thực hiện được 
}

function select_item($id)
{
	global $db,$module_data,$lang_module;
	$sql = 'SELECT * FROM ' . TABLE. "_select where select_code like '".$id."'";
	$ds = $db->query($sql)->fetch();
	if (!empty($ds))return $ds;
	return null; // trả lại giá trị không thực hiện được 
}

function select_khoaphong($listid)
{
	global $db,$module_data,$lang_module;
	$cri='';$dskhoa='';
	for ($i=0; $i<count($listid);$i++)
	{
		$cri .="'".$listid[$i]."'";	if($i<(count($listid)-1)) $cri .=","; 
	}
	//return $cri;
	$sql = 'SELECT tenkhoa FROM ' . TABLE. "_groupuser where account in (".$cri.")";
	$ds = $db->query($sql)->fetchAll();
	//foreach ($ds as $item)$dskhoa .=$item['tenkhoa'].";";
	return $ds;
	return $sql; // trả lại giá trị không thực hiện được 
}

function nv_redirect_location($url) // Version cũ ko có hàm này
{
	 Header('Location: ' . nv_url_rewrite($url, true));
     exit();
}

function check_khoaphong($user)
{
	global $db,$module_data,$lang_module;
	$list=array();
	$sql="SELECT id from ".NV_PREFIXLANG . '_' . $module_data . "_khoaphong where account ='".$user."'";
	$list=$db->query($sql)->fetch();
	if (!empty($list))return $list['id'];
	return 0; // trả lại giá trị không thực hiện được 
}

function send_notification($ds)
{
	global $db,$module_data,$lang_module;
	$dsnhan=explode(';',$ds['nguoinhan']);
	$kq=0;
	foreach ($dsnhan as $item)
	{
		if (!empty($item))
		{
		$sql = "INSERT INTO ".TABLE. "_notification(id, code_pro, nguoigui, nguoinhan, tieude, id_yeucau, tg_gui)
			value (NULL,:code_pro,:nguoigui,:nguoinhan,:tieude,:id_yeucau,:tg_gui)";
			$data_insert = array();
			$data_insert['code_pro'] = $ds['code_pro'];
			$data_insert['nguoigui'] = $ds['nguoigui'];
			$data_insert['nguoinhan'] = $item;
			$data_insert['tieude'] =$ds['tieude'];
			$data_insert['id_yeucau'] =$ds['id_yeucau'];
			$data_insert['tg_gui'] = intval(NV_CURRENTTIME);	
		 $kq +=($db->insert_id($sql, 'id', $data_insert)>0)?1:0;
		 }
	}
	return $kq; // trả lại giá trị không thực hiện được 
}

function menu_phanquyen($user='')
{
	global $db,$module_data,$lang_module;
	$listnm=array();
	
	$sql = "SELECT * FROM " . TABLE . "_groupmenu where id_nhom in";
	$sql .= "(SELECT id_nhomquyen FROM " . TABLE . "_groupuser where account like '".$user."')";
	$ds = $db->query($sql)->fetch();
	if (!empty($ds)){		
		$sql = 'SELECT * FROM ' . TABLE . '_menu WHERE status = 1 and mnid in ('.$ds['menu_truycap'].') ORDER BY stt asc';
		$listnm= $db->query($sql)->fetchAll();
	}
	return $listnm; // trả KQ 
}

/**
 * adminlink()
 *
 * @param mixed $id
 * @return
 */
function adminlink($id)
{
    global $lang_module, $module_name;
    $link = '<em class="fa fa-trash-o fa-lg">&nbsp;</em><a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=del_link&amp;id=' . $id . '">' . $lang_module['delete'] . '</a>&nbsp;&nbsp;';
    $link .= '<em class="fa fa-edit fa-lg">&nbsp;</em><a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=content&amp;id=' . $id . '">' . $lang_module['edit'] . '</a>';
    return $link;
}
