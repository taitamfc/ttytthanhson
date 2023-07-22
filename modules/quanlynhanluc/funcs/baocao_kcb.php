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
		$data['sobn_bhyt'] = $nv_Request->get_title('sobn_bhyt', 'get,post',0);
		$data['bn_noitinh'] = $nv_Request->get_title('bn_noitinh', 'get,post',0);
		$data['bn_ngoaitinh'] = $nv_Request->get_title('bn_ngoaitinh', 'get,post',0);
		$data['bnkham'] = $nv_Request->get_title('bnkham', 'get,post',0);
		$data['account'] = $user_info['username'];
		
		$sql = "INSERT INTO ".TABLE . "_baocaokcb (id, sobn_bhyt, bn_noitinh, bn_ngoaitinh, bnkham, account, thoigian, ngaygio) 
		VALUES (NULL, :sobn_bhyt, :bn_noitinh, :bn_ngoaitinh, :bnkham, :account,".intval(NV_CURRENTTIME).",now())";
		$data_insert = array();
		$data_insert['sobn_bhyt'] = $data['bn_noitinh']+$data['bn_ngoaitinh'];
		$data_insert['bn_noitinh'] = $data['bn_noitinh'];
		$data_insert['bn_ngoaitinh'] = $data['bn_ngoaitinh'];
		$data_insert['bnkham'] = $data['bnkham'];	
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
    $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);
    $xtpl->assign('token', nv_md5safe($user_info['username']));
	$thongtin = $db->query('select * from '.TABLE."_khoaphong where account like '".$user_info['username']."'")->fetch();
	$xtpl->assign('F', $f);
	$xtpl->assign('THONGTIN', $thongtin);
	$xtpl->assign('DATA', $data);
	$xtpl->assign('lang', $lang_module);
	$khoa=array();
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_groupuser WHERE id_nhomquyen=5";
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
	
	$ds = $db->query('select id from '.TABLE."_baocaokcb where account like '".$user_info['username']."'
	and thoigian>=".$tg)->fetch();$quyen=check_quyen($user_info);$tt=0;
	 if ($ds['id']>0 or $quyen>100) 
	 {
		 if ($quyen<100) $cri .=" and (account like '".$user_info['username']."')";
		 $sum=array();
		 $ds = $db->query('select * from '.TABLE."_baocaokcb where 1 ".$cri." order by thoigian DESC ".($sta=='find_item'?'':' Limit 0,7'));
		while ($r = $ds->fetch()) {
			$r['stt']=++$tt; $r['color']='';
			$r['thoigian']=date('d/m/Y',$r['thoigian']);
			$xtpl->assign('ROW', $r);
			
			/*if ($quyen>100) {				
				$xtpl->assign('tenkhoa', $khoa[$r['account']]);
				$xtpl->parse('main.lichsunhap.row.khoaphong');
				}*/
			$xtpl->parse('main.lichsunhap.row');
        }
		
		/*if ($quyen>100) {
				$xtpl->assign('SUM', $sum);
				$xtpl->parse('main.lichsunhap.khoaphong');
				$xtpl->parse('main.lichsunhap.total');
				}*/
		 $xtpl->parse('main.lichsunhap');
	 }
	 else $xtpl->parse('main.nhapdulieu');
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';