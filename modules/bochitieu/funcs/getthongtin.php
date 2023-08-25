<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_QLCL')) {
    die('Stop!!!');
}

if (empty($user_info)){	echo 'Truy cập không hợp lệ!'; exit;}

$ketqua =='';
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$token =$nv_Request->get_title('token', 'get,post', '');
	$xtpl = new XTemplate('getthongtin.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	//$xtpl->parse('main');
    //$ketqua = $xtpl->text('main');

$tbl=NV_PREFIXLANG . '_' . $module_data;
//thông tin trangchu
if ($sta=='dsdinhkem')	
{
	//token: 1_A1.1_10  Nhóm_IdTieuMuc_id //BV:1
	$key=explode('_',$token);
	$dinhdanh=$key[0].'_'.$key[1];//.'_'.$key[2];
	//Check đính kèm
	$sql = 'SELECT * FROM ' . TABLE. "_file where 
	namapdung =".$global_apdung['nam']." and token ='".$dinhdanh."' and status=1 and id_tm=".$key[2];
	$list = $db->query($sql);//->fetchAll();	
	while ($r = $list->fetch()) {
			$r['stt']=++$stt;
			//$r['ngaygio']=date('H:i d/m/y',$r['ngaygio']);
			$r['url_file']=NV_BASE_SITEURL.$r['url_file'];
			$r['url_del']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=cungcapchitieu&sta=delfile&token='.md5($client_info['session_id'] . $r['id']).'_'.$r['id'];
			$xtpl->assign('ROW', $r);
			$xtpl->parse($sta.'.row');
        }
	
	$xtpl->assign('token', $token);
	$xtpl->parse($sta);
	$contents = $xtpl->text($sta);
	
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}
if ($sta=='tkbangchung')	
{
	//token: năm_itemChill
	$key=explode('_',$token);
	
	//Check đính kèm
	$sql = 'SELECT * FROM ' .TABLE. "_file where status=1 
			and token like '%_".$key[1]."%' and namapdung=".$key[0];
	$list = $db->query($sql);//->fetchAll();
	//$sta='dsdinhkem'; // lấy template
	while ($r = $list->fetch()) {
			$r['stt']=++$stt;
			//$r['ngaygio']=date('H:i d/m/y',$r['ngaygio']);
			$r['url_file']=NV_BASE_SITEURL.$r['url_file'];
			//$r['url_del']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=cungcapchitieu&sta=delfile&token='.md5($client_info['session_id'] . $r['id']).'_'.$r['id'];
			$xtpl->assign('ROW', $r);
			$xtpl->parse($sta.'.row');
        }
	
	$xtpl->assign('token', $token);
	$xtpl->parse($sta);
	$contents = $xtpl->text($sta);
	
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}
if ($sta=='get_notification')	
{
	
	
	$sql = 'SELECT count(id) as sl FROM ' . TABLE. "_notification WHERE status = 1 and nguoinhan like '".$user_info['username']."' and viewed=0 and tg_gui>=".(NV_CURRENTTIME-10);
	$_msg= $db->query($sql)->fetch(); $msg_total =$_msg['sl'];
	
	if ($msg_total==0){echo $msg_total; exit;}
	{	
	$msg=0;	
	$sql = 'SELECT count(id) as sl FROM ' . TABLE. "_notification WHERE status = 1 and nguoinhan like '".$user_info['username']."' and viewed=0";
	$_msg= $db->query($sql)->fetch(); $msg_total =$_msg['sl'];
	
	$sql = 'SELECT * FROM ' . TABLE. "_notification WHERE status = 1 and nguoinhan like '".$user_info['username']."' ORDER BY tg_gui desc limit 0,5";
	$result = $db->query($sql);
    while ($row = $result->fetch()) {
		//$row['tg_nhan']=nv_date('d/m/Y h:m',$row['ngaynhan']);
		$row['tg_nhan']=$row['ngaynhan'];
		if ($row['viewed']==0) ++$msg;
		$xtpl->assign('ROW', $row);
		$xtpl->parse($sta.'.loop');
    }
	$xtpl->assign('viewall', MODULE_LINK . '&' . NV_OP_VARIABLE . '=notification');
	$xtpl->assign('msg_new', $msg_total>0?$msg_total:'');
	
	$xtpl->parse($sta);
	$ketqua = $xtpl->text($sta);}
	
}

echo $ketqua; exit;
