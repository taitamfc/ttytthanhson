<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_QLCL')) {
    die('Stop_main!!!');
}

$sta =$nv_Request->get_title('sta', 'get,post', '');
$kq=array();
	if($sta=='get_info')
	{
		$apdung=array();
		$apdung=$global_apdung;
		$namngoai=$apdung['nam']-1;
		$namkia=$apdung['nam']-2;
		
		if($nv_Request->get_title('act', 'get,post', '')=='get_bieudo1'){
		$sql = "SELECT avg(diem_kehoach) as kehoach,avg(diem_namngoai) as namngoai,avg(diem_namkia) as namkia
		FROM ". TABLE. "_ketqua_".$apdung['nam'];
		$r = $db->query($sql)->fetch();
			/*
			$item['label']=$apdung['nam'];
			$item['value']=$r['kehoach'];
			$kq[]=$item;
			
			$item['label']=$namngoai;
			$item['value']=$r['namngoai'];
			$kq[]=$item;
		
			$item['label']=$namkia;
			$item['value']=$r['namkia'];
			*/
			
			$kq['label']=sprintf('"%1$s","%2$s","%3$s"',$apdung['nam'],$namngoai,$namkia);
			$kq['value']=sprintf("%1$s,%2$s,%3$s",$r['kehoach'],$r['namngoai'],$r['namkia']); ;
			//$kq[]=$item;
		
		}
		
		
		
		
		
		
	nv_jsonOutput($kq);
	exit;
	}



if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';nv_redirect_location($url); exit();}
	$thongke=array();
	$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL.'themes/cpanel');
	$xtpl->assign('thoigian', date('H:i d/m/Y'));
	
	$xtpl->assign('link', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op. '&sta=get_info');
	
	$sql = 'SELECT * FROM ' .TABLE. '_rows WHERE status=1';
	$kq = $db->query($sql)->fetch();
	$xtpl->assign('ROW', $kq);
	
	$apdung=array();
	$apdung=$global_apdung;
	$namngoai=$apdung['nam']-1;
	$namkia=$apdung['nam']-2;
	$apdung['tieude']=($apdung['thangapdung']%3==0)?$lang_module['t'.$apdung['thangapdung']]:sprintf($lang_module['thang'],$apdung['thangapdung']).' Năm '.$apdung['nam']; 
	//$xtpl->assign('thang', $thang);	
		
	$chart=array();
	$sql = "SELECT avg(diem_kehoach) as kehoach,avg(diem_namngoai) as namngoai,
	avg(diem_namkia) as namkia FROM ". TABLE. "_ketqua_".$apdung['nam'];
	$r = $db->query($sql)->fetch();
	
	$chart['id']='line_1';
	$chart['label']="'','Năm ".$namkia."','Năm ".$namngoai."','Năm ".$apdung['nam']."'";
	$chart['value']="0,".$r['namkia'].",".$r['namngoai'].",".$r['kehoach'];

	$xtpl->assign('CH', $chart);
	$xtpl->parse('main.loopchart');
	
	//Show chart 2 Biểu đồ 2: Phụ lục 3. Bảng theo dõi đánh giá chất lượng bệnh viện theo tháng 
	$col="t".$apdung['thangapdung'];
	$sql = "SELECT avg(diem_kehoach) as kehoach,avg(diem_namngoai) as namngoai,
	avg(".$col."_diem_bvdg) as diem_bvdg,avg(".$col."_diem_doandg) as diem_doandg
	FROM ". TABLE. "_ketqua_".$apdung['nam'];
	$r = $db->query($sql)->fetch();
	$chart['id']='chart_2';
	$chart['label']="'','Năm ".$namngoai."','Điểm kế hoạch','Tự đánh giá','Đoàn đánh giá',''";
	$chart['value']='0,'.$r['namngoai'].",".$r['kehoach'].",".$r['diem_bvdg'].",".$r['diem_doandg'].',0';
	$xtpl->assign('CH', $chart);
	$xtpl->parse('main.chart_2');
	
	//Show chart 3
	$sql = 'SELECT account, tenkhoa FROM ' . TABLE. '_groupuser where status=1 
	and account in (select phongxuly from '.TABLE.'_question) order by account asc';
	$list_khoa = $db->query($sql)->fetchAll();$tt=0;
	$tk=array();
	$chart['id']='chart_3';
	$chart['label']="'',";
	$chart['value']='0,';
	foreach ($list_khoa as $r)
	{
		$tk=checkdanhgia($r['account'],$apdung);
		if ($tk['slgiamdiem']>0){
			$chart['label'] .="'".$r['account']."',";
			$chart['value'] .=$tk['slgiamdiem'].',';
		}
	}
		$chart['label'] .="''";
		$chart['value'] .='0';
	$xtpl->assign('CH', $chart);
	$xtpl->parse('main.chart_3');
	
	//Show chart 4 Biểu đồ GHI CHÚ VÀ FILE 

	$sql = "SELECT count(id) as sl FROM ". TABLE. "_ketqua_".$apdung['nam']." where ghichu is not null";
	$note = $db->query($sql)->fetch();
	
	$sql = "SELECT count(id) as sl FROM ". TABLE. "_file where namapdung=".$apdung['nam'];
	$file = $db->query($sql)->fetch();
	
	
	$chart['id']='chart_4';
	
	$chart['label']="'','Ghi chú','Bằng Chứng',''";
	$chart['value']='0,'.$note['sl'].','.$file['sl'].',0';
	$xtpl->assign('CH', $chart);
	$xtpl->parse('main.chart_4');
	
	//Show chart 5
	$sql = 'SELECT account, tenkhoa FROM ' . TABLE. '_groupuser where status=1 
	and account in (select phongxuly from '.TABLE.'_question) order by account asc';
	$list_khoa = $db->query($sql)->fetchAll();$tt=0;
	$tk=array();
	$chart['id']='chart_5';
	$chart['label']="'',";
	$chart['sltangdiem']='0,';
	$chart['slgiamdiem']='0,';
	$chart['slgiunguyen']='0,';
	foreach ($list_khoa as $r)
	{
		$tk=checkdanhgia($r['account'],$apdung);

		$chart['label'] .='"'.$r['account'].'",';
		$chart['sltangdiem'] .=$tk['sltangdiem'].',';
		$chart['slgiamdiem'] .=$tk['slgiamdiem'].',';
		$chart['slgiunguyen'] .=$tk['slgiunguyen'].',';
	}
		$chart['label'] .="''";
		$chart['sltangdiem'] .='0';
		$chart['slgiamdiem'] .='0';
		$chart['slgiunguyen'] .='0';
		
	$xtpl->assign('CH', $chart);
	$xtpl->parse('main.chart_5');	
	$xtpl->assign('BC', $apdung);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

function checkdanhgia($phong,$apdung)
{
	global $db,$module_data,$lang_module,$module_info;
	$r=array();
		$sql = "SELECT code FROM ". TABLE. "_question where parent in 
		(SELECT code FROM ". TABLE. "_question  where phongxuly like '".$phong."')";
		$slchitieu = $db->query($sql)->fetchALL();
		$r['slchitieu']=0;
		$r['sltangdiem']=0;$r['slgiamdiem']=0;$r['slgiunguyen']=0;
		$r['kh_tangdiem']=0;$r['kh_giamdiem']=0;$r['kh_giunguyen']=0;
		
		foreach ($slchitieu as $sl)
		{
			$r['slchitieu']++;
			
			$sql = "SELECT * FROM ". TABLE. "_ketqua_".$apdung['nam']." where dinhdanh like '%_".$sl['code']."'";
			$kq = $db->query($sql)->fetch();
			
			if (!empty($kq))// 
			{	$kq['diem_bvdg']=$kq['t'.$apdung['thangapdung'].'_diem_bvdg'];
				$kq['diem_doandg']=$kq['t'.$apdung['thangapdung'].'_diem_doandg'];
				
				$r['kh_tangdiem'] +=($kq['diem_kehoach']>$kq['diem_namngoai'])?1:0;
				$r['kh_giamdiem']+=($kq['diem_kehoach']<$kq['diem_namngoai'])?1:0;
				$r['kh_giunguyen']+=($kq['diem_kehoach']==$kq['diem_namngoai'])?1:0;
				
				if($kq['diem_doandg']>0){
				$r['sltangdiem'] +=($kq['diem_doandg']>$kq['diem_namngoai'])?1:0;
				$r['slgiamdiem']+= ($kq['diem_doandg']<$kq['diem_namngoai'])?1:0;
				$r['slgiunguyen']+=($kq['diem_doandg']==$kq['diem_namngoai'])?1:0;
				}
				else
				{
					$r['sltangdiem'] +=($kq['diem_bvdg']>$kq['diem_namngoai'])?1:0;
					$r['slgiamdiem']+= ($kq['diem_bvdg']<$kq['diem_namngoai'])?1:0;
					$r['slgiunguyen']+=($kq['diem_bvdg']==$kq['diem_namngoai'])?1:0;
				}
				
				
			}
			
				
		}
		return $r;
}

