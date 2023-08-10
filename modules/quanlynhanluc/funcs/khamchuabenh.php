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

	if ($sta=='find_item')
	{
		$f['id_khoaphong'] =$id_khoaphong= $nv_Request->get_title('id_khoaphong', 'get,post', '');
		$f['tg_tungay'] = $nv_Request->get_title('tg_tungay', 'get,post', '');
		$f['tg_denngay'] = $nv_Request->get_title('tg_denngay', 'get,post', '');
		if (!empty($f['tg_tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $f['tg_tungay'], $m))
            $tg_tungay = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		if (!empty($f['tg_denngay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $f['tg_denngay'], $m))
				$tg_denngay = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		if (!empty($f['id_khoaphong'])) $cri .=" and (account ='".$id_khoaphong."')";
		if (!empty($f['tg_tungay'])) $cri .=" and (thoigian >=".$tg_tungay.")";
		if (!empty($f['tg_denngay'])) $cri .=" and (thoigian <=".$tg_denngay.")";
	}
	if ($sta=='inputdata' and nv_md5safe($user_info['username'])==$nv_Request->get_title('token', 'get,post', ''))
	{
		$data['bn_cu'] = $nv_Request->get_title('bn_cu', 'get,post',0);
		$data['bn_vaovien'] = $nv_Request->get_title('bn_vaovien', 'get,post',0);
		$data['bn_ravien'] = $nv_Request->get_title('bn_ravien', 'get,post',0);
		$data['bn_chuyenkhoa'] = $nv_Request->get_title('bn_chuyenkhoa', 'get,post',0);
		$data['bn_tuvong'] = $nv_Request->get_title('bn_tuvong', 'get,post',0);
		$data['bn_chuyenvien'] = $nv_Request->get_title('bn_chuyenvien', 'get,post',0);
		$data['bn_xinve'] = $nv_Request->get_title('bn_xinve', 'get,post',0);
		$data['bn_noitru'] = $nv_Request->get_title('bn_noitru', 'get,post',0);
		$data['bn_ngoaitru'] = $nv_Request->get_title('bn_ngoaitru', 'get,post',0);
		$data['bn_namyc'] = $nv_Request->get_title('bn_namyc', 'get,post',0);
		$data['bn_tong'] = $data['bn_cu']+$data['bn_vaovien']-$data['bn_ravien']-$data['bn_chuyenkhoa']-$data['bn_tuvong']-$data['bn_chuyenvien']-$data['bn_xinve'];
		
		//$data['account'] = $user_info['username'];
		$sql = "INSERT INTO ".TABLE . "_khamchuabenh (id,bn_cu,bn_vaovien,bn_ravien,bn_chuyenkhoa,bn_tuvong,bn_chuyenvien,
		bn_xinve,bn_noitru,bn_ngoaitru,bn_namyc,bn_tong,account,thoigian,ngaygio) VALUES(NULL,
		:bn_cu,:bn_vaovien,:bn_ravien,:bn_chuyenkhoa,:bn_tuvong,:bn_chuyenvien,:bn_xinve,:bn_noitru,:bn_ngoaitru,:bn_namyc,:bn_tong,
		:account,".intval(NV_CURRENTTIME).",now())";
		$data_insert = array();
		$data_insert['bn_cu'] = $data['bn_cu'];
		$data_insert['bn_vaovien'] = $data['bn_vaovien'];
		$data_insert['bn_ravien'] = $data['bn_ravien'];
		$data_insert['bn_chuyenkhoa'] = $data['bn_chuyenkhoa'];
		$data_insert['bn_tuvong'] = $data['bn_tuvong'];
		$data_insert['bn_chuyenvien'] = $data['bn_chuyenvien'];
		$data_insert['bn_xinve'] = $data['bn_xinve'];
		$data_insert['bn_noitru'] = $data['bn_noitru'];
		$data_insert['bn_ngoaitru'] = $data['bn_ngoaitru'];
		$data_insert['bn_namyc'] = $data['bn_namyc'];
		$data_insert['bn_tong'] = $data['bn_tong'];
		$data_insert['account'] = $user_info['username'];		
		$row_id = $db->insert_id($sql, 'id', $data_insert)>0?1:0;
		if ($row_id>0)
		{
			$ketqua['status']='ok';
			$ketqua['url']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op;			
			$ketqua['mess']= $lang_module['yeucau_ok'];
		}
		else
		{
			$ketqua['status']='ERR';
			$ketqua['mess']= $lang_module['yeucau_err'];
		}
		nv_jsonOutput($ketqua); exit;	
	}
	
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL . 'themes/cpanel');	
    $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);
    $xtpl->assign('token', nv_md5safe($user_info['username']));
	$thongtin = $db->query('select * from '.TABLE."_khoaphong where account like '".$user_info['username']."'")->fetch();
	$thongtin['ngay_tao'] = date('d/m/Y');
	$xtpl->assign('F', $f);
	$xtpl->assign('THONGTIN', $thongtin);
	$xtpl->assign('DATA', $data);
	$xtpl->assign('lang', $lang_module);
	$khoa=array();
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_groupuser WHERE id_nhomquyen=4";
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
	
	$ds = $db->query('select id from '.TABLE."_khamchuabenh where account like '".$user_info['username']."'
	and thoigian>=".$tg)->fetch();$quyen=check_quyen($user_info);$tt=0;
	 if ($ds['id']>0 or $quyen>100) 
	 {
		 if ($quyen<100) $cri .=" and (account like '".$user_info['username']."')";
		 $sum=array();
		 $sum['bn_cu']=0;$sum['bn_vaovien']=0;$sum['bn_ravien']=0;$sum['bn_chuyenkhoa']=0;$sum['bn_chuyenvien']=0;$sum['bn_xinve']=0;
		 $sum['bn_noitru']=0;$sum['bn_ngoaitru']=0;$sum['bn_namyc']=0;$sum['bn_tuvong']=0;$sum['bn_tong']=0;
		 $ds = $db->query('select * from '.TABLE."_khamchuabenh where 1 ".$cri." order by thoigian DESC ".($sta=='find_item'?'':' Limit 0,7'));
		while ($r = $ds->fetch()) {
			$r['stt']=++$tt; $r['color']='';
			$r['thoigian']=date('d/m/Y',$r['thoigian']);
			$sum['bn_tong'] +=$r['bn_tong'];
			$sum['bn_cu'] +=$r['bn_cu'];
			$sum['bn_vaovien'] +=$r['bn_vaovien'];
			$sum['bn_ravien'] +=$r['bn_ravien'];
			$sum['bn_chuyenkhoa'] +=$r['bn_chuyenkhoa'];
			$sum['bn_chuyenvien'] +=$r['bn_chuyenvien'];
			$sum['bn_xinve'] +=$r['bn_xinve'];
			$sum['bn_noitru'] +=$r['bn_noitru'];
			$sum['bn_ngoaitru'] +=$r['bn_ngoaitru'];
			$sum['bn_namyc'] +=$r['bn_namyc'];
			$sum['bn_tuvong'] +=$r['bn_tuvong'];
			$xtpl->assign('ROW', $r);
			
			if ($quyen>100) {
				//$khoa = $db->query('select tenkhoa from '.TABLE."_khoaphong where account like '".$r['account']."'")->fetch();
				$xtpl->assign('tenkhoa', $khoa[$r['account']]);
				$xtpl->parse('main.lichsunhap.row.khoaphong');
				}
			$xtpl->parse('main.lichsunhap.row');
        }
		
		if ($quyen>100) {
				$xtpl->assign('SUM', $sum);
				$xtpl->parse('main.lichsunhap.khoaphong');
				$xtpl->parse('main.lichsunhap.total');
				}
		 $xtpl->parse('main.lichsunhap');
	 }
	 else $xtpl->parse('main.nhapdulieu');

	
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';