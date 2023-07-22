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
	
	$sta=$nv_Request->get_title('sta', 'get,post', '');
	$cri='';$f=array();
	$data=array();
	/*$data['bn_cu'] = 0;
	$data['bn_vaovien'] = 0;
	$data['bn_ravien'] = 0;
	$data['bn_chuyenkhoa'] = 0;
	$data['bn_chuyenvien'] = 0;
	$data['bn_xinve'] = 0;
	$data['bn_noitru'] = 0;
	$data['bn_ngoaitru'] = 0;
	$data['bn_namyc'] = 0;
	$data['bn_tuvong'] = 0;*/

	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
    $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);
    $xtpl->assign('token', nv_md5safe($user_info['username']));
	$thongtin = $db->query('select * from '.TABLE."_khoaphong where account like '".$user_info['username']."'")->fetch();
	$xtpl->assign('F', $f);
	$xtpl->assign('THONGTIN', $thongtin);
	$xtpl->assign('DATA', $data);
	$xtpl->assign('lang', $lang_module);
	$khoa=array();
	/*$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_groupuser WHERE id_nhomquyen=4";
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['account'],
					'name' => ++$tt.' - '.$r['tenkhoa'],
					'select' => ($id_khoaphong == $r['account']) ? ' selected="selected"' : ''
				));
				$khoa[$r['account']]=$r['tenkhoa'];
				$xtpl->parse('main.dskhoaphong');
			}
	//check đã gửi?
	$tg=date('d/m/Y');
	if (!empty($tg) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $tg, $m))
            $tg = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
	*/
	
	$lydo_nghi =array();
	$sql = 'SELECT * FROM ' . TABLE . "_select WHERE select_group like 'luachon_nghi'";
	$lydo_nghi = $db->query($sql)->fetchAll();
	
	$ds = $db->query('select cb.id_khoaphong, khoa.tenkhoa, count(cb.id) as tongcbkhoa from '.TABLE.'_canbo cb 
	inner join '.TABLE.'_khoaphong khoa on cb.id_khoaphong=khoa.id where cb.status=1
	group by khoa.tenkhoa,cb.id_khoaphong');
	$quyen=check_quyen($user_info);$tt=0;$tongcb=0;
	while ($r = $ds->fetch()) {
		$r['stt']=++$tt; $r['color']='';
		$r['dilam']=$r['tongcbkhoa'];
		foreach ($lydo_nghi as $lydo)
		{
			$r[$lydo['select_code']]=checknghi($r['id_khoaphong'],$lydo['select_name']);
			$r['dilam'] -=$r[$lydo['select_code']];
		}
		$r['dilam'] +=$r['tangcuongden']=check_tangcuongden($r['tenkhoa']);
		$r['dilam'] -=$r['tangcuongdi']=check_tangcuongdi($r['id_khoaphong']);
		$tongcb +=$r['dilam'];
		$xtpl->assign('ROW', $r);
		$xtpl->parse('main.row');
		
	}
	$xtpl->assign('TONGCB', $tongcb);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL . 'themes/cpanel');
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
