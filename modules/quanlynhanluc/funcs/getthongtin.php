<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_QLNL')) {
    die('Stop!!!');
}

if (empty($user_info)){	echo 'Truy cập không hợp lệ!'; exit;}

$ketqua ='0000';
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$xtpl = new XTemplate('getthongtin.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL . 'themes/cpanel');	
	$base_url =NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_name;
	//$xtpl->parse('main');
    //$ketqua = $xtpl->text('main');
$tbl=NV_PREFIXLANG . '_' . $module_data;
//thông tin trangchu
if ($sta=='dscanbotochuc')	
{
	$tochuc =$nv_Request->get_title('id_tochuc', 'get,post', 0);
	$xtpl->assign('tc', $tochuc);
	
	$sql = 'SELECT cb.*,khoa.tenkhoa , tc.chucvu as tencv,tc.tochuc as tentc
	FROM ' . $tbl . "_canbo cb 
	inner join ". $tbl . "_khoaphong khoa on khoa.id=cb.id_khoaphong 
	inner join ". $tbl . "_tttochuc tc on cb.id=tc.id_canbo 
	where tc.denngay=0 and tc.tochuc like '".$tochuc."'";
	$list = $db->query($sql);
	$stt=0;
        while ($r = $list->fetch()) {
			$sql = 'SELECT * FROM ' . TABLE. '_tttochuc WHERE id_canbo='.$r['id'] .' and tungay>0 and denngay=0';
			$tc = $db->query($sql)->fetch();
			$r['tungay']=date('d/m/Y',$tc['tungay']);
			$r['stt']=++$stt;
			//$xtpl->assign('TC', $tc);
			$xtpl->assign('ROW', $r);
			$xtpl->parse($sta.'.row');
        }	
	
	$xtpl->parse($sta);
	$ketqua = $xtpl->text($sta);
}
if ($sta=='thongtinchucvu')	
{
	$tochuc =$nv_Request->get_title('tochuc', 'get,post', '');
	$xtpl->assign('tc', $tochuc);
	
	$sql = 'SELECT id_tochuc FROM ' . $tbl . "_tochuc where tentochuc like '".$tochuc."'";
	$tc = $db->query($sql)->fetch();
	$id=$tc['id_tochuc'];  //var_dump($id);
	$sql = 'SELECT * FROM ' . $tbl . "_select where status=1 and select_group like 'chucvu_".$id."'";
	$list = $db->query($sql);
        while ($r = $list->fetch()) {
			$xtpl->assign('r', array(
					'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ''
				));
			//$xtpl->assign('r', $r);
			$xtpl->parse($sta.'.row');
        }	
	
	$xtpl->parse($sta);
	$ketqua = $xtpl->text($sta);
	//var_dump($sql);
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
if ($sta=='chitietcanbo')
{
	$id =$nv_Request->get_title('id', 'get,post', '');
	$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . TABLE. "_canbo cb inner join
	". TABLE. "_khoaphong khoa on cb.id_khoaphong=khoa.id
	WHERE cb.status = 1 and cb.id=".$id;
	$r= $db->query($sql)->fetch();
	$xtpl->assign('ROW', $r);
	
	$xtpl->parse($sta);
	$ketqua = $xtpl->text($sta);
	
}
if ($sta=='dstaichinh')
{
	
	$id_tochuc =$nv_Request->get_int('id_tochuc', 'get,post', 0);
	$sql = 'SELECT * FROM ' . TABLE. "_tochuc	WHERE id_tochuc=".$id_tochuc;	
	$tc= $db->query($sql)->fetch();
	$xtpl->assign('TC', $tc);	
	$nam=date('Y');
	$table=$tc['code_tc'].'_'.$nam;
	$token=md5($tc['code_tc']).'_'.$tc['code_tc'].'_'.$nam;
	$xtpl->assign('table', $table);	
	$quyen=check_quyen($user_info);
	$sql = 'SELECT * FROM ' . TABLE . "_tttaichinh_".$tc['code_tc']."_".$nam." where status=1 order by ngayghi desc";
	$list = $db->query($sql);$tongthu=0; $tongchi=0; $stt=0;
        while ($r = $list->fetch()) {
			$tongthu +=$r['thu']; $tongchi +=$r['chi'];
			$r['thu']=number_format($r['thu'],0,",",".");
			$r['chi']=number_format($r['chi'],0,",",".");
			$r['ngayghi']=date('d/m/Y',$r['ngayghi']);
			$r['stt']=++$stt;
			$r['link_remove']=$base_url. '&' . NV_OP_VARIABLE . '=execute&sta=remove_taichinh';
			$r['token']=md5($r['id']).'_'.$r['id'].'_'.$table;
			$xtpl->assign('ROW', $r);
			if ($quyen>100) $xtpl->parse($sta.'.row.admin');
			$xtpl->parse($sta.'.row');
        }
	
	$xtpl->assign('ton', number_format($tongthu-$tongchi,0,",","."));	
	
	
	if ($quyen>100) $xtpl->parse($sta.'.admin');
	
	$xtpl->assign('token', $token);	
	$xtpl->assign('link_frm', $base_url. '&' . NV_OP_VARIABLE . '=execute');
	$xtpl->parse($sta);
	$ketqua = $xtpl->text($sta);
	
}

echo $ketqua; exit;
