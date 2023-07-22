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

if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';Header('Location: ' . nv_url_rewrite($url, true)); exit();}

	//$sta =$nv_Request->get_title('sta', 'get,post', '');
	//if ($sta=='') 
	$sta='main';
	$tbl=TABLE. '_chitieu';
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$quyen=check_quyen($user_info);

	$sql = 'SELECT * FROM ' . TABLE. '_apdung  where apdung=1';
	$apdung = $db->query($sql)->fetch();
	$namapdung=$apdung['nam'];
	$xtpl->assign('DG', $apdung);	
	$link=array();
	$link['token']=md5($client_info['session_id'] . $global_config['sitekey']).'_'.$namapdung;
	$link['link_editbv']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=detail_report&token='.$link['token'].'_bv_edit';
	$link['link_bv']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=detail_report&token='.$link['token'].'_bv';
	$link['link_doandg']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=detail_report&token='.$link['token'].'_doandg';
	$xtpl->assign('LINK', $link);	
	
	
	
	
	$sql="SELECT * from ".KHOAPHONG." where account ='".$user_info['username']."'";
	$khoa=$db->query($sql)->fetch();	
	$donvi=$quyen>100?'':"Đơn vị xử lý:".$khoa['tenkhoa'];	
	$xtpl->assign('donvi', $donvi);
	
	//Show kết quả 
	$cri='';
	$select=array(); $ds=select('tansuatgui');
	foreach ($ds as $item) {$select[$item['select_code']]=$item['select_name'];}
	
	$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$namapdung. ' where status=1';
	$list = $db->query($sql);$tt=0;$active='';
		while ($r = $list->fetch()) {
			
			if (($quyen>100)or (in_array($user_info['username'],unserialize($r['list_khoacungcap'])))
				or (in_array('ALL',unserialize($r['list_khoacungcap']))))
			{
			$r['stt']=++$tt; $r['color']='';$r['status']='';
			$r['tansuatgui']=$select[$r['tansuatgui']];
			$r['title']='Chỉ tiêu số '.$tt; 
			$r['token']=md5($client_info['session_id'] . $global_config['sitekey']).'_'.$namapdung.'_'.$r['id'];
			$r['link_detail']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=detail_report&token='.$r['token'];
			
			$xtpl->assign('ROW', $r);
			$xtpl->parse('main.chitieu');
			}
		}
		
	

	$xtpl->parse($sta);
    $contents = $xtpl->text($sta);
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

/*

	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));

	$sql = 'SELECT * FROM ' . TABLE. '_apdung  where apdung=1';
	$apdung = $db->query($sql)->fetch();
	$namapdung=$apdung['nam'];
	$xtpl->assign('namapdung', $namapdung);	
	$sql = 'SELECT * FROM ' . TABLE. "_groupuser  where account like '".$user_info['username']."'";
	$user = $db->query($sql)->fetch();
	
		$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$namapdung. ' where status=1';
		$list = $db->query($sql);$tt=0;
        while ($r = $list->fetch()) {
			if (($user['id_nhomquyen']>1)or (in_array($user_info['username'],unserialize($r['list_khoacungcap'])))
				or (in_array('ALL',unserialize($r['list_khoacungcap']))))
			{
			$r['stt']=++$tt; 
			
			$r['color']='';$r['status']='';
			//$r['link_del']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=config_chitieu&sta=del_item';
			$r['token']=md5($client_info['session_id'] . $global_config['sitekey']).'_'.$namapdung.'_'.$r['id'];
			//$r['link_edit']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=config_chitieu&sta=edit_item&token='.$r['token'];
			$ds=select_item($r['thanh_to']);
			$r['thanh_to']=$ds['select_name'];
			$r['pham_vi']=select_khoaphong(unserialize($r['pham_vi']));
			$r['list_khoacungcap']=select_khoaphong(unserialize($r['list_khoacungcap']));
			$ds=select_item($r['tansuatgui']);
			$r['tansuatgui']=$ds['select_name'];
			$xtpl->assign('ROW', $r);
			$xtpl->parse('main.item.row');
			}
        }
		$xtpl->parse('main.item');

	*/