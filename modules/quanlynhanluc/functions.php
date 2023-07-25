<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 10 April 2017 17:00
 */

if (! defined('NV_SYSTEM')) {
    die('Stop!!!');
}



define('THEME_URL', NV_BASE_SITEURL . 'themes/cpanel');
define('MODULE_LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_data);
define('TABLE', NV_PREFIXLANG . '_' . $module_data);
define('NV_STATIC_URL', NV_BASE_SITEURL);
$page_title = $module_info['site_title'];

define('NV_IS_MOD_QLNL', true);
require_once(NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php');


function userinfo($id)
{
	global $db,$module_data,$lang_module;
	$user=array();
	$sql="SELECT * from ".NV_USERS_GLOBALTABLE. " where userid =".$id." and active=1";
	$user=$db->query($sql)->fetch();
	if (!empty($user)){
		
		/*$sql= "(SELECT * FROM " . TABLE . "_groupuser where account like '".$user['username']."')";
		$ds = $db->query($sql)->fetch();
		//var_dump($ds['id_nhomquyen']);
		define('QUYEN_SD', $ds['id_nhomquyen']);		*/
		return $user;
		}
	return null; // trả lại giá trị không thực hiện được 
}

function check_quyen($user)
{
	global $db,$module_data,$lang_module;
	$sql= "SELECT * FROM " . TABLE . "_groupuser where account like '".$user['username']."'";
	$ds = $db->query($sql)->fetch();
	if (!empty($ds))return $ds[id_nhomquyen];
	return 0; // trả lại giá trị không thực hiện được 
}

function check_dilam($id_khoa)
{
	global $db,$module_data,$lang_module;
	$lydo_nghi =array();
	$sql = 'SELECT * FROM ' . TABLE . "_select WHERE select_group like 'luachon_nghi'";
	$lydo_nghi = $db->query($sql)->fetchAll();
	
	$ds = $db->query('select cb.id_khoaphong, khoa.account, khoa.tenkhoa, count(cb.id) as tongcbkhoa from '.TABLE.'_canbo cb 
	inner join '.TABLE."_khoaphong khoa on cb.id_khoaphong=khoa.id where cb.status=1 and khoa.account like '".$id_khoa."'
	group by khoa.tenkhoa,cb.id_khoaphong,khoa.account");//$tt=0;
	$canbo_khoa=array();
	while ($r = $ds->fetch()) {
		$r['dilam']=$r['tongcbkhoa'];
		foreach ($lydo_nghi as $lydo)
		{
			$r[$lydo['select_code']]=checknghi($r['id_khoaphong'],$lydo['select_code']);
			$r['dilam'] -=$r[$lydo['select_code']];
		}
		$r['dilam'] +=$r['tangcuongden']=check_tangcuongden($r['tenkhoa']);
		$r['dilam'] -=$r['tangcuongdi']=check_tangcuongdi($r['id_khoaphong']);
		$canbo_khoa[] =$r;
	}
	return $canbo_khoa; 
}

function checknghi($idkhoa=0,$lydo='')
{
	global $db;
	$today = mktime(0, 0, 0, date('m'),  date('d'),  date('Y'));
	$sql = 'SELECT count(nghi.id) as soluong FROM ' . TABLE . "_ttnghi nghi
	inner join  ". TABLE . "_canbo cb on nghi.id_canbo=cb.id	
	WHERE cb.id_khoaphong=".$idkhoa. " and nghi.lydo like '".$lydo."' and nghi.denngay>".$today;
	$kq = $db->query($sql)->fetch();
	return $kq['soluong'];	
}
function check_tangcuongden($khoa='')
{
	global $db;
	$today = mktime(0, 0, 0, date('m'),  date('d'),  date('Y'));
	$sql = 'SELECT count(id_canbo) as soluong FROM ' . TABLE . "_canbodieudong WHERE tangcuong_khoaphong like '".$khoa. "' 
	and denngay >=". $today ;
	$kq = $db->query($sql)->fetch();
	return $kq['soluong'];	
}
function check_tangcuongdi($idkhoa=0)
{
	global $db;
	$today = mktime(0, 0, 0, date('m'),  date('d'),  date('Y'));
	$sql = 'SELECT count(id) as soluong FROM ' . TABLE . "_canbo WHERE id_khoaphong =".$idkhoa. " 
	and tangcuong_denngay >=". $today ;
	$kq = $db->query($sql)->fetch();
	return $kq['soluong'];	
}
function thongke_benhnhan($idkhoa='')
{
	global $db;
	$today = mktime(0, 0, 0, date('m'),  date('d'),  date('Y'));
	//$cri="and account in (SELECT account FROM " . TABLE. "_groupuser WHERE id_nhomquyen=4 order by id)";
	$cri="and thoigian>=".$today;
	/*$ds = $db->query('select id from '.TABLE."_khamchuabenh where account like '".$user_info['username']."'
	and thoigian>=".$today)->fetch();$quyen=check_quyen($user_info);$tt=0;*/
	 //if ($ds['id']>0 or $quyen>100) 
	 {
		 //if ($quyen<100) $cri .=" and (account like '".$user_info['username']."')";
		  $kq=array();
		$ds = $db->query('select * from '.TABLE."_khamchuabenh where 1 ".$cri." order by thoigian DESC Limit 7");
		while ($r = $ds->fetch()) {
			$sum=array();
			$r['thoigian']=date('d/m/Y',$r['thoigian']);
			$sum['bn_tong'] =$r['bn_tong'];
			$sum['bn_cu'] =$r['bn_cu'];
			$sum['bn_vaovien'] =$r['bn_vaovien'];
			$sum['bn_ravien'] =$r['bn_ravien'];
			$sum['bn_chuyenkhoa'] =$r['bn_chuyenkhoa'];
			$sum['bn_chuyenvien'] =$r['bn_chuyenvien'];
			$sum['bn_xinve'] =$r['bn_xinve'];
			$sum['bn_noitru'] =$r['bn_noitru'];
			$sum['bn_ngoaitru'] =$r['bn_ngoaitru'];
			$sum['bn_namyc'] =$r['bn_namyc'];
			$sum['bn_tuvong'] =$r['bn_tuvong'];
			$sum['account'] =$r['account'];
			$kq[] =$sum;
			
			/*if ($quyen>100) {
				//$khoa = $db->query('select tenkhoa from '.TABLE."_khoaphong where account like '".$r['account']."'")->fetch();
				$xtpl->assign('tenkhoa', $khoa[$r['account']]);
				$xtpl->parse('main.lichsunhap.row.khoaphong');
				}*/
			
        }
		
		/*if ($quyen>100) {
				$xtpl->assign('SUM', $sum);
				$xtpl->parse('main.lichsunhap.khoaphong');
				$xtpl->parse('main.lichsunhap.total');
				}
		 $xtpl->parse('main.lichsunhap');*/
	 }
	return $kq;	
}

function thongke_bacsi($idkhoa='')
{
	global $db;
	$today = mktime(0, 0, 0, date('m'),  date('d'),  date('Y'));
	$kq=array();$cri="and thoigian>=".$today;
	$ds = $db->query('select id from '.TABLE."_chitietkcb where account like '".$user_info['username']."'
	and thoigian>=".$today)->fetch();$quyen=check_quyen($user_info);$tt=0;
	 //if ($ds['id']>0 or $quyen>100) 
	 {
		 //if ($quyen<100) $cri .=" and (account like '".$user_info['username']."')";
		 $ds = $db->query('select account,bs_lamsang, so_giuong from '.TABLE."_chitietkcb where 1 ".$cri." order by thoigian DESC");
		while ($r = $ds->fetch()) {
			$kq[]=$r;
        }
		
	 }
	
	
	return $kq;	
}

function nv_redirect_location($url) // Version cũ ko có hàm này
{
	 Header('Location: ' . nv_url_rewrite($url, true));
     exit();
}
function menuinfo($macv)
{
	global $db,$module_data,$lang_module;
	$list=array();
	$sql="SELECT * from ".$lang_module['tbl_menu'] . " where macv like '".$macv."' order by thutu";
	$list=$db->query($sql)->fetchAll();
	if (!empty($list))return $list;
	return null; // trả lại giá trị không thực hiện được 
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
		$sql = "INSERT INTO ".TABLE. "_notification(id, code_pro, nguoigui, nguoinhan, tieude, id_yeucau, tg_gui, ngaynhan)
			value (NULL,:code_pro,:nguoigui,:nguoinhan,:tieude,:id_yeucau,:tg_gui,now())";
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
		
		//while ($row = $list->fetch()) {}
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


