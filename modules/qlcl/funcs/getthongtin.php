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
	$xtpl = new XTemplate('getthongtin.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	//$xtpl->parse('main');
    //$ketqua = $xtpl->text('main');

$tbl=NV_PREFIXLANG . '_' . $module_data;
//thông tin trangchu
if ($sta=='dscanbotochuc')	
{
	$id_tochuc =$nv_Request->get_int('id_tochuc', 'get,post', 0);
	
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_tochuc WHERE id_tochuc='.$id_tochuc;
	$kq = $db->query($sql)->fetch();
	$xtpl->assign('tc', $kq);
	
	
	
	$sql = 'SELECT cb.*, tc.tentochuc,khoa.tenkhoa , cbtc.noidung,cbtc.chucvuphancong,cbtc.ngaybatdau
	FROM ' . $tbl . '_canbo cb 
	inner join '. $tbl . '_khoaphong khoa on khoa.id=cb.id_khoaphong 
	inner join '. $tbl . '_canbotochuc cbtc on cb.id=cbtc.id_canbo 
	inner join '. $tbl . '_tochuc tc on tc.id_tochuc=cbtc.id_tochuc
	WHERE cb.status = 1 and tc.id_tochuc='.$id_tochuc.' ORDER BY tt asc';
	$list = $db->query($sql);
	$stt=0;
        while ($r = $list->fetch()) {
			$r['stt']=++$stt;
			$xtpl->assign('ROW', $r);
			$xtpl->parse($sta.'.row');
        }	
	
	$xtpl->parse($sta);
	$ketqua = $xtpl->text($sta);
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
