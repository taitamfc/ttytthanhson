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



	
	
	$cri='';$f=array();
	if ($nv_Request->get_title('sta', 'get,post', '')=='find_item')
	{
		
		$f['txt_find'] = $nv_Request->get_title('txt_find', 'get,post', '');
		$f['tg_tungay'] = $nv_Request->get_title('tg_tungay', 'get,post', '');
		$f['tg_denngay'] = $nv_Request->get_title('tg_denngay', 'get,post', '');
		
		if (!empty($f['tg_tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $f['tg_tungay'], $m))
            $tg_tungay = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		if (!empty($f['tg_denngay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $f['tg_denngay'], $m))
				$tg_denngay = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		
		if (!empty($f['txt_find']))
			$cri .=" and (cb.hovaten like '%".$f['txt_find']."%' or cb.diachi like '%".$f['txt_find']."%' or 
			cb.dienthoai like '%".$f['txt_find']."%' or cb.ngaysinh like '%".$f['txt_find']."%' or cb.sohieu_vc like '%".$f['txt_find']."%' )";
		
		if (!empty($f['tg_tungay'])) $cri .=" and (cbdd.tungay >=".$tg_tungay.")";
		if (!empty($f['tg_denngay'])) $cri .=" and (cbdd.denngay <=".$tg_denngay.")";
	}
	
	$sql = 'SELECT COUNT(*) FROM ' . TABLE. '_canbo cb
	inner join '.TABLE. '_khoaphong khoa on khoa.id=cb.id_khoaphong 
	inner join '.TABLE. '_canbodieudong cbdd on cb.id=cbdd.id_canbo 
	WHERE (cb.status = 1) '.$cri;
	$all_page = $db->query($sql)->fetchColumn();
	//$all_page = $db->query('SELECT COUNT(*) FROM ' . TABLE . '_canbodieudong where (1)' )->fetchColumn();
	//$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name;
	$base_url = MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op;
	$per_page = 10;
	$page = $nv_Request->get_int('page', 'get', 0);
	
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('link_frm', $base_url);
	$xtpl->assign('F', $f);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	
    $xtpl->assign('URL_THEMES', NV_BASE_SITEURL. 'themes/' . $module_info['template']);
	
	$sql = 'SELECT cb.*, khoa.tenkhoa, cbdd.tungay,cbdd.denngay, cbdd.tangcuong_khoaphong FROM ' . TABLE. '_canbo cb
	inner join '.TABLE. '_khoaphong khoa on khoa.id=cb.id_khoaphong 
	RIGHT join '.TABLE. '_canbodieudong cbdd on cb.id=cbdd.id_canbo 
	WHERE (cb.status = 1) '.$cri.' ORDER BY cb.id_khoaphong, cb.maso_bv asc LIMIT ' . $page . ', ' . $per_page;
	$list = $db->query($sql);$tt=0;
        while ($r = $list->fetch()) {
			$r['stt']=++$tt; $r['color']='';$r['status']='';$r['color']='';
			$r['ghichu']='T.gian:<b>'.date('d/m/Y',$r['tungay']).'</b> - <b>'.date('d/m/Y',$r['denngay']).'</b>';
			/*if ($r['tangcuong_tungay']>0)
			{
				//date('d/m/Y',$r['tangcuong_denngay']- intval(NV_CURRENTTIME)
			}*/
			$xtpl->assign('ROW', $r);
			$xtpl->parse('main.row');
        }
		$xtpl->assign('DATA', $data);
	$generate_page = nv_generate_page($base_url, $all_page, $per_page, $page);
	if (! empty($generate_page)) {
		$xtpl->assign('GENERATE_PAGE', $generate_page);
		$xtpl->parse('main.generate_page');
	}
	
	
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';