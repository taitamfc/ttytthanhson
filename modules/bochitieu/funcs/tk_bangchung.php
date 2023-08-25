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

	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$token=$nv_Request->get_title('token', 'get,post', '');
	//cefe8b0f8971088bce7bdac501435fbe_202306_bv
	$key=explode('_',$token);
	//if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) {die('Stop!!!');}

	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$key[0]);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL.'themes/' . $global_config['module_theme']);
	$sql = 'SELECT * FROM ' . TABLE. '_config';
	$list = $db->query($sql)->fetchAll();
	$chart=array();	
	$config=array();
	foreach ($list as $l )	$config[$l['name']]=$l['value'];
	$xtpl->assign('CF', $config);
	$quyen=check_quyen($user_info);
	$apdung=array();
	$apdung=$global_apdung;
	$dothi=array();	
	$select_month = $key[1]>0? $key[1]: $apdung['thangapdung'];	
	$apdung['tieude']=($select_month%3==0)?$lang_module['t'.$select_month]:sprintf($lang_module['thang'],$select_month);
	$apdung['namngoai']=$apdung['nam']-1;
	$apdung['namkia']=$apdung['nam']-2;
	$xtpl->assign('BC', $apdung);
		for ($i=1;$i<=12;$i++)
		{
			$thang=($i%3==0)?$lang_module['t'.$i]:sprintf($lang_module['thang'],$i); 
			$xtpl->assign('r', array('id' => $i,'name' => $thang,
					'select' => ($i==$select_month)? ' selected="selected"' : ''));
			$xtpl->parse('main.thang');
		}
	//Show header
	$sql = 'SELECT * FROM ' .TABLE. "_ketqua_".$apdung['nam']." where status=1";
	$kq = $db->query($sql)->fetchAll();
	$bc1= array(); 
	$bc1['ct_dadg']=0;
	$bc1['tongdiem_dadg']=0;
	$bc1['sotc_tang']=0;
	$bc1['sotc_giam']=0;
	$bc1['sotc_nguyen']=0;
	$bc1['dtb_dadg']=0;
	$bc1['ds_tang']='';
	$bc1['ds_giam']='';	
	$col="t".$select_month."_";
	foreach ($kq as $r)
	{
		$bc1['ct_dadg'] +=$r[$col.'diem_bvdg']>0?1:0;
		$bc1['tongdiem_dadg'] +=$r[$col.'diem_bvdg']>0?$r[$col.'diem_bvdg']:0;
		if ($r[$col.'diem_bvdg']>$r['diem_namngoai'])
		{ 	
			$bc1['sotc_tang'] +=1;
			$bc1['ds_tang'] .=explode('_',$r['dinhdanh'])[1].";";
		}
		if ($r[$col.'diem_bvdg']<$r['diem_namngoai'])
		{ 	
			$bc1['sotc_giam'] +=1;
			$bc1['ds_giam'] .=explode('_',$r['dinhdanh'])[1].";";
		}
		
		$bc1['sotc_nguyen'] +=$r[$col.'diem_bvdg']==$r['diem_namngoai']?1:0;
	}
	
	$bc1['tile']=round($bc1['ct_dadg']*100/83,1);
	//check hệ số 2
	$sql = 'SELECT sum('.$col.'diem_bvdg) as tong_hs FROM ' .TABLE. "_ketqua_".$apdung['nam']." where status=1 and (dinhdanh like '%_C3%' or dinhdanh like '%_C5%')";
	$kq = $db->query($sql)->fetch(); $bc1['diem2x']=$kq['tong_hs'];
	//check tháng TK đã có điểm của đoàn?
	$sql = 'SELECT sum('.$col.'diem_doandg) as tong FROM ' .TABLE. "_ketqua_".$apdung['nam']." where status=1";
	$kq = $db->query($sql)->fetch(); 
	$check_doandg=$kq['tong']>0?true:false;
	
	//End header
	//show chi tieu
	$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$apdung['nam']. ' where status=1 order by code asc';
	$list_chitieu = $db->query($sql)->fetchAll();
	foreach ($list_chitieu as $r)
	{
		$r['sl_chitieu']=0;
		$sql = 'SELECT * FROM ' . TABLE. "_question 
		where status=1 and giatri>0 and parent like '".$r['code']."%' order by ID";
		$Q = $db->query($sql)->fetchAll();		
		foreach($Q as $q)
		{
			//$q['token']=md5($q['code'].$user_info['username']).'_'.$q['code'].'_'.$key[1].'_'.$key[2] ;
			$xtpl->assign('Q', $q);	
			$kq=array(); 
			$sql = 'SELECT * FROM ' .TABLE. "_ketqua_".$apdung['nam']." where status=1 
			and dinhdanh like '".$r['id'].'_'.$q['code']."'";
			$kq = $db->query($sql)->fetch();
			//$kq['ghichu']=$key[1].'_'.$r['id'].'_'.$q['code'];
			
			if (empty($kq)) {$kq['diem_bvdg']=0;$kq['diem_doandg']=0;}
			else {$kq['diem_bvdg']=$kq[$col.'diem_bvdg'];$kq['diem_doandg']=$kq[$col.'diem_doandg'];}
			
				
			$r['sl_chitieu']++;
			//show BẰNG CHỨNG
			$sql = 'SELECT COUNT(id) as tong_bc FROM ' .TABLE. "_file where status=1 
			and token like '%_".$q['code']."%' and namapdung=".$apdung['nam'];
			$res = $db->query($sql)->fetch(); //$check_doandg=$res['tong']>0?true:false;
			if($res['tong_bc']>0)
			{
				$xtpl->assign('link_viewfile', MODULE_LINK . '&' . NV_OP_VARIABLE . '=getthongtin&sta=tkbangchung&token='.$apdung['nam'].'_'.$q['code']);				
				$kq['tong_bc']=$res['tong_bc'];
				$xtpl->assign('KQ', $kq);
				$xtpl->parse('main.chitieu.loop');
			}
		}
		$xtpl->assign('R', $r);
		$xtpl->parse('main.chitieu');
	}

		
	
	$xtpl->assign('filename', "bao_cao_thang_".$select_month.'.doc');
	$xtpl->assign('BC1', $bc1);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

function check_level($dinhdanh, $diem=0, $tbl="")
{
	global $db,$module_data,$lang_module,$global_apdung;
	$list=array();
	$sql="SELECT count(id) as sl from ".$tbl . " where t".$global_apdung['thangapdung']."_diem_bvdg =".$diem." and dinhdanh like '%".$dinhdanh.".%'";
	$list=$db->query($sql)->fetch();
	if (!empty($list))return $list['sl'];
	return 0; // trả lại giá trị ko thực hiện được 
}
