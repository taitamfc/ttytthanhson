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

if (empty($user_info))
{
		$url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login';
        Header('Location: ' . nv_url_rewrite($url, true));
        exit();
}
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$token =$nv_Request->get_title('token', 'get,post', '');	
	$key=explode("_",$token);

    //$xtpl->assign('LINK_CLOSE', MODULE_LINK. '&' . NV_OP_VARIABLE . '='.);
    $xtpl->assign('token', $token);
	
	$today=mktime(0, 0, 0, date('m'), date('d'), date('Y'));
	if ($sta=='chitiettailieu' and md5($key[0])==$key[1])	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_tailieu WHERE id='.$id;
		$list = $db->query($sql)->fetchALL();
		
		if (empty($list))
		{
			$xtpl->assign('thongbao', 'Không có thông tin về tài liệu này');
			$xtpl->parse('no_history');	$ketqua = $xtpl->text('no_history');echo $ketqua; exit();
		}
		$tt=0;
		foreach($list as $r)
		{
			$r['ngaybanhanh']=date('d/m/Y',$r['ngaybanhanh']);
			$xtpl->assign('ROW', $r);
			$xtpl->parse($sta.'.row');
		}
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
	if ($sta=='deletetailieu' and md5($key[0])==$key[1])	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_tailieu WHERE id='.$id;
		$stmt = $db->prepare('Update ' .  TABLE. '_tailieu SET status=0	WHERE id ='.$id);
		$row_id=$stmt->execute();
		$ketqua= $row_id>0?'OK_'.$lang_module['update_ok']:'ERR_'.$lang_module['update_err'];
		echo $ketqua; exit();
	}
	
	
	$cri='';
	$data=array();
	$data['tentailieu'] =$nv_Request->get_title('tentailieu', 'get,post', '');
	$data['sohieu'] =$nv_Request->get_title('sohieu', 'get,post', '');
	$data['loaivanban'] =$nv_Request->get_title('loaivanban', 'get,post', '');
	$data['cq_banhanh'] =$nv_Request->get_title('cq_banhanh', 'get,post', '');
	$data['trichyeu'] =$nv_Request->get_title('trichyeu', 'get,post', '');
	$data['ngaybanhanh'] =$nv_Request->get_title('ngaybanhanh', 'get,post', '');
	$data['hieuluc'] =$nv_Request->get_title('hieuluc', 'get,post', '');
	
	if (!empty($data['tentailieu'])) $cri .=" and (tentailieu like '%" .$data['tentailieu'] ."%')";
	if (!empty($data['sohieu'])) $cri .=" and (sohieu like '%" .$data['sohieu'] ."%')";
	if (!empty($data['loaivanban'])) $cri .=" and (loaivanban like '%" .$data['loaivanban'] ."%')";
	if (!empty($data['cq_banhanh'])) $cri .=" and (cq_banhanh like '%" .$data['cq_banhanh'] ."%')";
	if (!empty($data['hieuluc'])) $cri .=" and (hieuluc like '%" .$data['hieuluc'] ."%')";
	if (!empty($data['ngaybanhanh']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['ngaybanhanh'], $m))
		{$data['ngay_bh'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		$cri .=" and (ngaybanhanh =" .$data['ngay_bh'] .")";}
	
	$all_page = $db->query('SELECT COUNT(*) FROM ' . TABLE . '_tailieu where (status=1)' )->fetchColumn();
	$base_url = MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op;
	$per_page = 10;
	$page = $nv_Request->get_int('page', 'get', 1);		
	$sql = 'SELECT * FROM '. TABLE . '_tailieu	WHERE (status=1) '.$cri.' ORDER BY id DESC LIMIT ' . ($page-1)*$per_page . ', ' . $per_page;
	$list = $db->query($sql);$tt=0;
	$quyen=check_quyen($user_info);
	while ($r = $list->fetch()){
		$r['stt']=++$tt;$token=md5($r['id']);		
		$r['ngaybanhanh']=date('d/m/Y',$r['ngaybanhanh']);
		$r['ghichu']=$quyen;
		$r['link_view']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=chitiettailieu&token='.$r['id'].'_'.$token;
		$r['link_del']='';
		$r['link_edit']='';
		if ($quyen>100 or $user_info['username']==$r['account'])
		{
			$xtpl->assign('link_edit', MODULE_LINK . '&' . NV_OP_VARIABLE . '=adddocument&sta=edit_document&token='.$r['id'].'_'.$token);
			$xtpl->parse('main.row.edit');
		}
		
		if ($quyen>100)
		{
			$xtpl->assign('link_del', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=deletetailieu&token='.$r['id'].'_'.$token);
			$xtpl->parse('main.row.delete');		
		}
		$xtpl->assign('ROW', $r);
		//if ($quyen>100)	$xtpl->parse('main.row.admin_link');
		$xtpl->parse('main.row');
	}
	
	/*
	$base_url = MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op;
	$page = $nv_Request->get_int('page', 'get', 1);
	$per_page_old = $nv_Request->get_int('per_page', 'cookie', 5);
	$per_page = $nv_Request->get_int('per_page', 'get', $per_page_old);
	if ($per_page < 1 and $per_page > 500) {
		$per_page = 5;
	}
	if ($per_page_old != $per_page) {
		$nv_Request->set_Cookie('per_page', $per_page, NV_LIVE_COOKIE_TIME);
	}
	$db->sqlreset()	->select('COUNT(*)')->from(TABLE . '_tailieu' )->where('(1)' . $cri);
	//if (! empty($cri)) $db->where('(1)' . $cri);	
	$sth = $db->prepare($db->sql());
	$sth->execute();
	$all_page = $sth->fetchColumn();
	$db->select('*')->order('id DESC')->limit($per_page)->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());
	$sth->execute();$tt=0;
	while ($r = $sth->fetch()){
		$r['stt']=++$tt;		
		$r['ngaybanhanh']=date('d/m/Y',$r['ngaybanhanh']);
		$r['link_view']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=quatrinhnghi&id='.$r['id'];
		$r['link_bosung']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=chitietdieuduong&token='.$r['id_canbo'].'_'.$token;
		$xtpl->assign('ROW', $r);
		$xtpl->parse('main.row');
	}
	*/
	
	
	
	$generate_page = nv_generate_page($base_url, $all_page, $per_page, $page);
	if (! empty($generate_page)) {
		$xtpl->assign('GENERATE_PAGE', $generate_page);
		$xtpl->parse('main.generate_page');
	}
	
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_select WHERE status = 1 and select_group like 'loai_vb'";
	$list = $db->query($sql);
	while ($r = $list->fetch()) {
		$xtpl->assign('r', array(
			'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['loaivanban'] == $r['select_name']) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.loaivanban');
	}
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_select WHERE status = 1 
	and select_group like 'loai_vb_hl'";
	$list = $db->query($sql);
	while ($r = $list->fetch()) {
		$xtpl->assign('r', array(
			'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['hieuluc'] == $r['select_name']) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.hieuluc');
	}
	$xtpl->assign('DATA', $data);
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';