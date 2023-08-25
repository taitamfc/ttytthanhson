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
	/*$data['bs_lamsang']=0;
	$data['so_giuong']=0;
	$data['bn_c1']=0;
	$data['c1_toandien']=0;
	$data['bn_c2']=0;
	$data['c2_toandien']=0;
	$data['bn_c3']=0;
	$data['c3_toandien']=0;
	$data['goi_dau']=0;
	$data['tam_kho']=0;
	$data['xong_hoi']=0;
	$data['tam_be']=0;
	$data['massage']=0;
	$data['xoay']=0;
	$data['vo_rung']=0;
	$data['ca_de']=0;
	$data['phau_thuat']=0;
	$data['bn_loet']=0;
	$data['bn_viem']=0;*/


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
		if (!empty($f['tg_tungay'])) $cri .=" and (thoigian >".$tg_tungay.")";
		if (!empty($f['tg_denngay'])) $cri .=" and (thoigian <=".$tg_denngay.")";
	}
	if ($sta=='inputdata' and nv_md5safe($user_info['username'])==$nv_Request->get_title('token', 'get,post', ''))
	{
		$data['bs_lamsang'] = $nv_Request->get_title('bs_lamsang', 'get,post',0);
		$data['so_giuong'] = $nv_Request->get_title('so_giuong', 'get,post',0);
		$data['bn_c1'] = $nv_Request->get_title('bn_c1', 'get,post',0);
		$data['c1_toandien'] = $nv_Request->get_title('c1_toandien', 'get,post',0);
		$data['bn_c2'] = $nv_Request->get_title('bn_c2', 'get,post',0);
		$data['c2_toandien'] = $nv_Request->get_title('c2_toandien', 'get,post',0);
		$data['bn_c3'] = $nv_Request->get_title('bn_c3', 'get,post',0);
		$data['c3_toandien'] = $nv_Request->get_title('c3_toandien', 'get,post',0);
		$data['goi_dau'] = $nv_Request->get_title('goi_dau', 'get,post',0);
		$data['tam_kho'] = $nv_Request->get_title('tam_kho', 'get,post',0);
		$data['xong_hoi'] = $nv_Request->get_title('xong_hoi', 'get,post',0);
		$data['tam_be'] = $nv_Request->get_title('tam_be', 'get,post',0);
		$data['massage'] = $nv_Request->get_title('massage', 'get,post',0);
		$data['xoay'] = $nv_Request->get_title('xoay', 'get,post',0);
		$data['vo_rung'] = $nv_Request->get_title('vo_rung', 'get,post',0);
		$data['ca_de'] = $nv_Request->get_title('ca_de', 'get,post',0);
		$data['phau_thuat'] = $nv_Request->get_title('phau_thuat', 'get,post',0);
		$data['bn_loet'] = $nv_Request->get_title('bn_loet', 'get,post',0);
		$data['bn_viem'] = $nv_Request->get_title('bn_viem', 'get,post',0);

		
		$data['account'] = $user_info['username'];
		$sql = "INSERT INTO ".TABLE . "_chitietkcb (id, bs_lamsang, so_giuong, bn_c1, c1_toandien, bn_c2, c2_toandien,
		 bn_c3, c3_toandien, goi_dau, tam_kho, xong_hoi, tam_be, massage, xoay, vo_rung, ca_de, phau_thuat,
		 bn_loet, bn_viem, account, thoigian, ngaygio) 
		 VALUES (NULL,:bs_lamsang,:so_giuong,:bn_c1,:c1_toandien,:bn_c2,:c2_toandien,
		 :bn_c3,:c3_toandien,:goi_dau,:tam_kho,:xong_hoi,:tam_be,:massage,:xoay,:vo_rung,:ca_de,:phau_thuat,
		 :bn_loet,:bn_viem,:account,".intval(NV_CURRENTTIME).",now())";
		$data_insert = array();
		$data_insert['bs_lamsang'] = $data['bs_lamsang'];
		$data_insert['so_giuong'] = $data['so_giuong'];
		$data_insert['bn_c1'] = $data['bn_c1'];
		$data_insert['c1_toandien'] = $data['c1_toandien'];
		$data_insert['bn_c2'] = $data['bn_c2'];
		$data_insert['c2_toandien'] = $data['c2_toandien'];
		$data_insert['bn_c3'] = $data['bn_c3'];
		$data_insert['c3_toandien'] = $data['c3_toandien'];
		$data_insert['goi_dau'] = $data['goi_dau'];
		$data_insert['tam_kho'] = $data['tam_kho'];
		$data_insert['xong_hoi'] = $data['xong_hoi'];
		$data_insert['tam_be'] = $data['tam_be'];
		$data_insert['massage'] = $data['massage'];
		$data_insert['xoay'] = $data['xoay'];
		$data_insert['vo_rung'] = $data['vo_rung'];
		$data_insert['ca_de'] = $data['ca_de'];
		$data_insert['phau_thuat'] = $data['phau_thuat'];
		$data_insert['bn_loet'] = $data['bn_loet'];
		$data_insert['bn_viem'] = $data['bn_viem'];
		$data_insert['account'] = $data['account'];		
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
			$ketqua['mess']= $lang_module['yeucau_err'].$sql;
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
	
	$ds = $db->query('select id from '.TABLE."_chitietkcb where account like '".$user_info['username']."'
	and thoigian>=".$tg)->fetch();$quyen=check_quyen($user_info);$tt=0;
	 if ($ds['id']>0 or $quyen>100) 
	 {
		 if ($quyen<100) $cri .=" and (account like '".$user_info['username']."')";
		 $sum=array();
		 $ds = $db->query('select * from '.TABLE."_chitietkcb where 1 ".$cri." order by thoigian DESC ".($sta=='find_item'?'':' Limit 0,7'));
		while ($r = $ds->fetch()) {
			$r['stt']=++$tt; $r['color']='';
			$r['thoigian']=date('d/m/Y',$r['thoigian']);
			$xtpl->assign('ROW', $r);
			
			if ($quyen>100) {				
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