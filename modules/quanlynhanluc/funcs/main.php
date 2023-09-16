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
 //show info

	$sta =$nv_Request->get_title('sta', 'get,post', '');
	if($sta=='get_info')
	{
		if($nv_Request->get_title('act', 'get,post', '')=='get_bn'){
			$limit=$nv_Request->get_title('limit', 'get,post', '');
		$sql = "SELECT left(ngaygio,10) as ngay,sum(bn_tong) as tongbn FROM " . TABLE . '_khamchuabenh 
		group by ngay  order by ngay desc Limit '.$limit;
		$kq = $db->query($sql)->fetchAll();} //DATE_FORMAT(ngaygio,'%d/%m/%y') as ngay left(ngaygio,10) order by thoigian desc
		
		
		if($nv_Request->get_title('act', 'get,post', '')=='get_dscanbo'){
		$sql = "SELECT khoa.account as label, count(cb.id) as value 
		FROM " . TABLE . '_canbo cb inner join '  . TABLE . '_khoaphong khoa on cb.id_khoaphong=khoa.id
		group by label ';
		
		$list = $db->query($sql);
			while ($r = $list->fetch()) {
				
				$item['label']=$r['label'];//nv_clean60(str_replace('Khoa','K.',$r['label']),15);
				$item['value']=$r['value'];
				$kq[]=$item;
			}
		
		}
		
		if($nv_Request->get_title('act', 'get,post', '')=='get_dieudong'){
		$sql = "SELECT khoa.tenkhoa, count(cb.id) as soluong 
		FROM " . TABLE . '_canbo cb inner join '  . TABLE . '_khoaphong khoa on cb.id_khoaphong=khoa.id
		where cb.tangcuong_tungay>0 group by khoa.tenkhoa ';
		$kq = $db->query($sql)->fetchAll();}
		if($nv_Request->get_title('act', 'get,post', '')=='get_gender'){
			$sql = "SELECT  sum(IF(gioitinh='nam',1,0)) as nam, sum(if(gioitinh='nam',0,1)) as nu FROM " . TABLE . '_canbo ';
			$item = $db->query($sql)->fetch();
			/*$list = $db->query($sql);
			while ($r = $list->fetch()) {
				
				$item['label']=$r['label'];//nv_clean60(str_replace('Khoa','K.',$r['label']),15);
				$item['value']=$r['value'];
				$kq[]=$item;
			}*/
			$kq['label']="['Nam','Nữ']";
			$kq['value']="[".$item['nam'].','.$item['nu']."]";
			
		}
		
		if($nv_Request->get_title('act', 'get,post', '')=='get_tl_dieuduong_bn'){
			$data=getdata();	//$l=$data[6];//$kq=$data[6];
			foreach ($data[6] as $item) $l=$item;
			$item=array();//("lable"=> '', "value1"=> 0, "value2"=>0);
			$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_groupuser WHERE id_nhomquyen=4 order by id";
			$list = $db->query($sql);
			while ($r = $list->fetch()) {
				$item['tenkhoa']=$r['account'];
				$chiso=explode('/',$l[$r['account']]);
				$item['value1']=(empty($chiso[0]))?0:$chiso[0];
				$item['value2']=(empty($chiso[1]))?0:$chiso[1];
				$kq[]=$item;
			}					
		}
		if($nv_Request->get_title('act', 'get,post', '')=='get_tl_bacsi_bn'){
			$data=getdata();	
			foreach ($data[4] as $item) $bs=$item;
			foreach ($data[6] as $item) $bn=$item;
			$item=array();
			$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_groupuser WHERE id_nhomquyen=4 order by id";
			$list = $db->query($sql);
			while ($r = $list->fetch()) {
				$item['tenkhoa']=$r['account'];				
				$cs_bacsi=explode('/',$bs[$r['account']]);
				$item['value1']=(empty($cs_bacsi[0]))?0:$cs_bacsi[0];				
				$cs_benhnhan=explode('/',$bn[$r['account']]);
				$item['value2']=(empty($cs_benhnhan[1]))?0:$cs_benhnhan[1];				
				$kq[]=$item;
			}					
		}
		if($nv_Request->get_title('act', 'get,post', '')=='tbl_tongquan'){
			$data=getdata();	
			$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
			
			foreach ($data[4] as $item) $bs=$item;
			foreach ($data[6] as $item) $bn=$item;
			$item=array();
			$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_groupuser WHERE id_nhomquyen=4 order by id";
			$list = $db->query($sql);$stt=0;
			while ($r = $list->fetch()) {
				$item['stt']=++$stt;
				$item['tenkhoa']=$r['account'];
				
				$cs_bacsi=explode('/',$bs[$r['account']]);
				$item['bs']=(empty($cs_bacsi[0]))?0:$cs_bacsi[0];
				
				$cs_benhnhan=explode('/',$bn[$r['account']]);
				$item['dd']=(empty($cs_benhnhan[0]))?0:$cs_benhnhan[0];
				$item['bn']=(empty($cs_benhnhan[1]))?0:$cs_benhnhan[1];
				$xtpl->assign('ROW', $item);
				$xtpl->parse('tbl_tongquan.row');
			}
			
			$xtpl->parse('tbl_tongquan');
			$kq = $xtpl->text('tbl_tongquan');
			echo $kq; exit();
		}
		
		
	nv_jsonOutput($kq);
	exit;
	}
/*
 $sql = "SELECT khoa.account as label, count(cb.id) as value 
		FROM " . TABLE . '_canbo cb inner join '  . TABLE . '_khoaphong khoa on cb.id_khoaphong=khoa.id
		group by khoa.tenkhoa ';
 var_dump($sql);*/

if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';nv_redirect_location($url); exit();}

	$thongke=array();
	$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
    $xtpl->assign('URL_THEMES', NV_BASE_SITEURL.'themes/cpanel');
	
	$sql = 'SELECT count(id) as sl FROM ' . NV_PREFIXLANG . '_' . $module_data . '_khoaphong WHERE status=1';
	$kq = $db->query($sql)->fetch();
	$thongke['sl_khoa']=$kq['sl'];
	
	$sql = 'SELECT count(id) as sl FROM ' . NV_PREFIXLANG . '_' . $module_data . '_canbo WHERE status=1';
	$kq = $db->query($sql)->fetch();
	$thongke['sl_canbo']=$kq['sl'];
	
	$xtpl->assign('link', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op. '&sta=get_info');
	$xtpl->assign('thoigian', date('H:i d/m/Y'));
	$xtpl->assign('TK', $thongke);
	
	$data=getdata();	//$l=$data[6];//$kq=$data[6];
	foreach ($data[6] as $item) $l=$item;
	$item=array();//("lable"=> '', "value1"=> 0, "value2"=>0);
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_groupuser WHERE id_nhomquyen=4 order by id";
	$list = $db->query($sql)->fetchAll(); $xbenh_nhan='';$ybenh_nhan='';
	/*while ($r = $list->fetch()) {
		$item['tenkhoa']=$r['account'];
		$chiso=explode('/',$l[$r['account']]);
		$item['value1']=$chiso[0];
		$item['value2']=$chiso[1];
		$kq[]=$item;
		}*/
	$benhnhan=array(); $tong=explode('/',$l['toanvien']);$tongbn=$tong[1];
	for ($i=0; $i<count($list);$i++)
	{
		
		$chiso=explode('/',$l[$list[$i]['account']]);
		$bn=(empty($chiso[1]))?0:$chiso[1];
		$tile=($tongbn==0)?0:($bn*100/$tongbn);//' ('.($tongbn==0)?0:($bn*100/$tongbn)." %)";
		$benhnhan['x'] .="'".$list[$i]['account'].' ('.round($tile,2)."%)'";
		
		$benhnhan['y'] .=$bn;
		//$tongbn +=(empty($chiso[1]))?0:$chiso[1];
		if ($i<count($list)-1) {
			$benhnhan['x'] .=',';
			$benhnhan['y'] .=',';
		}
		
	}
	
	
	
	$xtpl->assign('BN', $benhnhan);
			
	$xtpl->parse('main');
    $contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

function getdata()
{
	global $module_info,$module_data,$db,$op,$user_info,$client_info,$global_config;
	$dskhoa=array();$cb_khoa=array();$bn_khoa=array();$bs_khoa=array();
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_groupuser WHERE id_nhomquyen=4 order by id";
	$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$cb_khoa[]=check_dilam($r['account']);
				$bn_khoa=thongke_benhnhan($r['account']);
				$bs_khoa=thongke_bacsi($r['account']);
			}
	/*$tg=date('d/m/Y');
	if (!empty($tg) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $tg, $m))
            $tg = mktime(0, 0, 0, $m[2], $m[1], $m[3]);*/
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
	/*for ($chiso=1; $chiso<=7; $chiso++)
	{
			foreach ($ds_bc[$chiso] as $item)  
			$xtpl->assign('ROW', $item);
	}*/
	return $ds_bc;
}
