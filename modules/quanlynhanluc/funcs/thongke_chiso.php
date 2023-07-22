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
		
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL . 'themes/cpanel');	
    $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);
    $xtpl->assign('token', nv_md5safe($user_info['username']));
	$thongtin = $db->query('select * from '.TABLE."_khoaphong where account like '".$user_info['username']."'")->fetch();
	$xtpl->assign('F', $f);
	$xtpl->assign('THONGTIN', $thongtin);
	$xtpl->assign('DATA', $data);
	$xtpl->assign('lang', $lang_module);
	$dskhoa=array();$cb_khoa=array();$bn_khoa=array();$bs_khoa=array();
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_groupuser WHERE id_nhomquyen=4 order by id";
	$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('khoa', $r);
				$cb_khoa[]=check_dilam($r['account']);
				$bn_khoa=thongke_benhnhan($r['account']);
				$bs_khoa=thongke_bacsi($r['account']);
			}
	$tg=date('d/m/Y');
	if (!empty($tg) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $tg, $m))
            $tg = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
	$ds_bc=array();
	for ($chiso=1; $chiso<=7; $chiso++)
	{
		$r=array( "stt"=>0, "title_bc"=> '', "toanvien"=> 0, "khoangoai"=> 0, 
		"csskss"=>0,"khoanoi"=> 0,"yhct"=> 0, "khoagayme"=> 0, "khoahstc"=> 0,"khoanhi"=> 0);
		
		$r['stt']=$chiso;$r['toanvien']=0;
		$r['title_bc']=$lang_module['baocao'.$chiso];
		if ($chiso==1)
		foreach ($cb_khoa as $k => $value)
			foreach ($value as $item) {$r[$item['account']]=$item['dilam']; $r['toanvien'] +=$item['dilam'];}
			
		if ($chiso==2)
		//foreach ($bn_khoa as $k => $value) 
			foreach ($bn_khoa as $item) { $r[$item['account']]=$item['bn_ngoaitru']+$item['bn_noitru'];$r['toanvien'] +=$r[$item['account']];}
		if ($chiso==3)
		//foreach ($bn_khoa as $k => $value) 
			foreach ($bn_khoa as $item) {$r[$item['account']]=$item['bn_noitru'];$r['toanvien'] +=$r[$item['account']];}
		if ($chiso==4)
		{ 
			$ct1=$ds_bc[1][0];$ts =0;$ms=0;
			//foreach ($bs_khoa as $k => $value) 
			foreach ($bs_khoa as $item) {
				$r[$item['account']]=$ct1[$item['account']].'/'.$item['bs_lamsang']; 
				$ts +=$ct1[$item['account']]; 
				$ms +=$item['bs_lamsang']; 
				$r['toanvien'] =$ts.'/'.$ms;
				}
		}
		if ($chiso==5)
		{ 
			$ct1=$ds_bc[1][0];$ts =0;$ms=0;
			//foreach ($bs_khoa as $k => $value) 
			foreach ($bs_khoa as $item) 
			{
			$r[$item['account']]=$ct1[$item['account']].'/'.$item['so_giuong'];
				$ts +=$ct1[$item['account']]; 
				$ms +=$item['so_giuong']; 
				$r['toanvien'] =$ts.'/'.$ms;
			}
		}
		if ($chiso==6)
		{ 
			$ct1=$ds_bc[1][0];$ts =0;$ms=0;
			//foreach ($bn_khoa as $k => $value) 
			foreach ($bn_khoa as $item) 
			{
				$r[$item['account']]=$ct1[$item['account']].'/'.$item['bn_tong'];
				$ts +=$ct1[$item['account']]; 
				$ms +=$item['bn_tong']; 
				$r['toanvien'] =$ts.'/'.$ms;
			}
		}
		if ($chiso==7)
		{ 
			$ct1=$ds_bc[1][0];$ts =0;$ms=0;
			//foreach ($bn_khoa as $k => $value) 
			foreach ($bn_khoa as $item){
				$r[$item['account']]=$ct1[$item['account']].'/'.$item['bn_noitru'];
				$ts +=$ct1[$item['account']]; 
				$ms +=$item['bn_noitru']; 
				$r['toanvien'] =$ts.'/'.$ms;
			}
		}
		$ds_bc[$chiso][]=$r;
	}
	for ($chiso=1; $chiso<=7; $chiso++)
	{
			foreach ($ds_bc[$chiso] as $item)  
			$xtpl->assign('ROW', $item);
			$xtpl->parse('main.row');
	}

	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

