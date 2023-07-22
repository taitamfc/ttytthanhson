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
if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';nv_redirect_location($url); exit();}

	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$tbl=NV_PREFIXLANG . '_' . $module_data . '_hanhchinh';
	if ($sta=='edit_item')
	{
		$checkss =$nv_Request->get_title('checkss', 'get,post', '');$key=md5($client_info['session_id'] . $global_config['sitekey']);
		if ($checkss!=$key) {die('Stop!!!');}
		$data=array();
		$err=0;
		$data['id']=$nv_Request->get_int('id', 'get,post', '');
		$data['tencoso']=$nv_Request->get_title('tencoso', 'get,post', '');
		//$data['loaihinh']=$nv_Request->get_title('loaihinh', 'get,post', '');
		$data['diachi']=$nv_Request->get_title('diachi', 'get,post', '');
		$data['dienthoai']=$nv_Request->get_title('dienthoai', 'get,post', '');
		$data['id_loaihinh']=$nv_Request->get_int('id_loaihinh', 'get,post', '');
		$data['giamdoc']=$nv_Request->get_title('giamdoc', 'get,post', '');
		$data['tp_tchc']=$nv_Request->get_title('tp_tchc', 'get,post', '');
		$data['tp_kehoach']=$nv_Request->get_title('tp_kehoach', 'get,post', '');
		$data['tp_taichinh']=$nv_Request->get_title('tp_taichinh', 'get,post', '');
		$data['tp_dieuduong']=$nv_Request->get_title('tp_dieuduong', 'get,post', '');
		
		if (empty($data['tencoso']) or empty($data['diachi']) or empty($data['dienthoai']) or empty($data['giamdoc']) 
			or empty($data['tp_tchc']) or empty($data['tp_kehoach']) or empty($data['tp_taichinh']) or empty($data['tp_dieuduong']) )
		$ketqua=++$err.'.'.$lang_module['error'];
		
		
		if ($err==0)
		{
			$stmt = $db->prepare('Update ' . $tbl. ' SET tencoso=:tencoso, diachi=:diachi, dienthoai=:dienthoai, 
			id_loaihinh=:id_loaihinh, giamdoc=:giamdoc, tp_tchc=:tp_tchc, tp_kehoach=:tp_kehoach, tp_taichinh=:tp_taichinh, tp_dieuduong=:tp_dieuduong 
			WHERE id ='.$data['id']);
			
			$stmt->bindParam(':tencoso', $data['tencoso'], PDO::PARAM_STR);
			$stmt->bindParam(':diachi', $data['diachi'], PDO::PARAM_STR);
			$stmt->bindParam(':dienthoai', $data['dienthoai'], PDO::PARAM_STR);
			$stmt->bindParam(':id_loaihinh', $data['id_loaihinh'], PDO::PARAM_STR);
			$stmt->bindParam(':giamdoc', $data['giamdoc'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_tchc', $data['tp_tchc'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_kehoach', $data['tp_kehoach'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_taichinh', $data['tp_taichinh'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_dieuduong', $data['tp_dieuduong'], PDO::PARAM_STR);
			//$stmt->bindParam(':ghichu',  strtotime(date('d/m/Y h:i:s')), PDO::PARAM_STR);
			$row_id=$stmt->execute();
			$ketqua= $row_id==1?$lang_module['update_ok']:$lang_module['update_err'];
			
			//$ketqua='Test nhận data'; 
		}
		
		echo $ketqua; exit;
	
	}
	$base_url =NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_name;

	$xtpl = new XTemplate('frm_tochuc.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$sql = 'SELECT * FROM ' . $tbl;
	$result = $db->query($sql)->fetch();
	$xtpl->assign('link_frm',$base_url. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('sta', 'edit_item');
	/*
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_tochuc	WHERE status = 1 ORDER BY tt asc';
	$list = $db->query($sql);
        while ($r = $list->fetch()) {
			$sql = 'SELECT count(id) as sl FROM ' . NV_PREFIXLANG . '_' . $module_data . '_canbotochuc WHERE id_tochuc='.$r['id_tochuc'];
			$kq = $db->query($sql)->fetch();
			$r['soluong']=$kq['sl'];
			$r['link']=$base_url. '&' . NV_OP_VARIABLE . '=getthongtin&sta=dscanbotochuc&id_tochuc='.$r['id_tochuc'];
			$xtpl->assign('r', $r);
			$xtpl->parse('main.item_tochuc');
        }	*/
		
	$sql = 'SELECT * FROM ' .TABLE . "_tochuc WHERE status = 1 and parent=0 order by tt";
	$list = $db->query($sql);
        while ($r = $list->fetch()) {
			$sql = 'SELECT count(id) as sl FROM ' . TABLE . "_tttochuc WHERE tochuc='".$r['tentochuc']."' and denngay=0";
			$kq = $db->query($sql)->fetch();
			$r['soluong']=$kq['sl'];
			$r['link']=$base_url. '&' . NV_OP_VARIABLE . '=getthongtin&sta=dscanbotochuc&id_tochuc='.$r['tentochuc'];
			$r['link_taichinh']=$base_url. '&' . NV_OP_VARIABLE . '=getthongtin&sta=dstaichinh&id_tochuc='.$r['id_tochuc'];
			$xtpl->assign('r', $r);
			$xtpl->parse('main.item_tochuc');
        }
	
	$xtpl->assign('link_taichinh', $base_url. '&' . NV_OP_VARIABLE . '=getthongtin&sta=dstaichinh');
	$xtpl->assign('ROW', $result);
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';