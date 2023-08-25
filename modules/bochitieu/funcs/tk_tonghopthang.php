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
	$config=array();
	$apdung=array();
	$apdung=$global_apdung;
	
	if ($token==md5('export_excel'))
	{
		
		error_reporting(E_ALL);
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);

		
		
		$col=array('','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ');		

		//error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		//define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		require NV_ROOTDIR . '/modules/' . $module_file . '/PHPExcel.php';
		require NV_ROOTDIR . '/modules/' . $module_file . '/PHPExcel/IOFactory.php';
		require NV_ROOTDIR . '/modules/' . $module_file . '/PHPExcel/Writer/Excel2007.php';
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
									 ->setLastModifiedBy("Maarten Balliauw")
									 ->setTitle("Office 2007 XLSX Test Document")
									 ->setSubject("Office 2007 XLSX Test Document")
									 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
									 ->setKeywords("office 2007 openxml php")
									 ->setCategory("Test result file");
		$fileType = 'Excel2007';
		$fileName = NV_ROOTDIR . '/modules/' . $module_file . '/export/thong_ke5.xlsx';
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel = PHPExcel_IOFactory::createReader($fileType);
		$objPHPExcel = $objPHPExcel->load($fileName);
		$objPHPExcel->setActiveSheetIndexbyName('Sheet1');

		//formating
		$style_center = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,));
		$style_left = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,));
		$style_jus = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,));
		$style_border= array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
		
		//set title
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', sprintf($lang_module['thongke5_bc'],$apdung['nam']));
		$tt=0; $dong=8;
		$start=8; $end=43; $result=array();
		
	/*$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$apdung['nam']. ' where status=1 order by code asc';
	$list_chitieu = $db->query($sql)->fetchAll();$tt=0;*/
	$sql = 'SELECT * FROM ' . TABLE. "_question order by id ASC";
	$list_cauhoi = $db->query($sql)->fetchAll();$tt=0;$stt=0;
	
	foreach ($list_cauhoi as $r)
	{
		$kq=array();
		
		if ($r['giatri']==0)
		{
		$kq['stt']='';		
		$kq['noidung']=$r['noidung'];//.'('.$r['sl_chitieu'].')';	
		$kq['noidung2']='';
		$kq['khoaphong']=($r['status']==0)?'':nv_strtoupper($r['phongxuly']);
		$row=($start+$tt);
		$objPHPExcel->getActiveSheet()->fromArray($kq, null, 'B'.$row);
		$objPHPExcel->getActiveSheet()->mergeCells('C'.$row.':D'.$row);
		$objPHPExcel->getActiveSheet()->getStyle('C'.$row.':'.$col[$end].$row)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('C'.$row)->applyFromArray($style_left);
		$objPHPExcel->getActiveSheet()->getStyle('C'.$row.':'.$col[$end].$row)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
		
		$tt++;		
		$result[]=$kq;
		
		}
		else
		{
			$kq['stt']=++$stt;
			$kq['code']=$r['code'];
			$kq['noidung']=$r['noidung'];//.'('.$r['sl_chitieu'].')';	
			$kq['khoaphong']='';
			
			$sql = 'SELECT * FROM ' .TABLE. "_ketqua_".$apdung['nam']." where status=1 and dinhdanh like '%_".$r['code']."'";
			$tk = $db->query($sql)->fetch();
			$kq['diem_kehoach']=$tk['diem_kehoach'];
			$kq['diem_namngoai']=$tk['diem_namngoai'];
			for ($i=1;$i<=12;$i++){
				$kq['t'.$i.'_diem_bvdg']=$tk['t'.$i.'_diem_bvdg'];
				$kq['t'.$i.'_diem_doandg']=$tk['t'.$i.'_diem_doandg'];
	
				$tk['diem_bvdg']=$tk['t'.$i.'_diem_bvdg'];
				$tk['diem_doandg']=$tk['t'.$i.'_diem_doandg'];
				
				if($tk['diem_doandg']>0) $kq['ketqua'.$i]=($tk['diem_doandg']>=$tk['diem_kehoach'])?$lang_module['dat']:$lang_module['khongdat'];
				else $kq['ketqua'.$i]=($tk['diem_bvdg']>=$tk['diem_kehoach'])?$lang_module['dat']:$lang_module['khongdat'];
			} //End for
			
			$row=($start+$tt);
			$objPHPExcel->getActiveSheet()->fromArray($kq, null, 'B'.$row);
			$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->applyFromArray($style_left);
			$tt++;		
			$result[]=$kq;
		}
		
	}
	
		//$objPHPExcel->getActiveSheet()->fromArray($result, null, 'B'.$start);
		$dong=count($result); 
		$ran='B'.$start.':'.$col[$end].($dong+7);
		
		/*$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($dong+8), 'TỔNG CỘNG')
											->setCellValue('G'.($dong+10), 'NGƯỜI LẬP BẢNG')
											->setCellValue('AJ'.($dong+10), 'TRƯỞNG PHÒNG QUẢN LÝ CHẤT LƯỢNG');
		$objPHPExcel->getActiveSheet()->mergeCells('B'.($dong+8).':D'.($dong+8));
		for ($i=4;$i<45;$i++) 
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($col[$i].($dong+8), '=SUM('.$col[$i].$start.':'.$col[$i].($dong+7).')');
		$objPHPExcel->getActiveSheet()->getStyle('B'.($dong+8).':AR'.($dong+10))->getFont()->setBold(true);
				*/
		$objPHPExcel->getActiveSheet()->getStyle($ran)->applyFromArray($style_border);
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('TongHopThang_'.date('d_m_y'));
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="TongHopThang_'.date('d_m_y').'.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		//echo $token;exit;
		
	}
	


	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL.'themes/' . $global_config['module_theme']);
	$xtpl->assign('export_excel', md5('export_excel'));
	$sql = 'SELECT * FROM ' . TABLE. '_config';
	$list = $db->query($sql)->fetchAll();
	$chart=array();		
	foreach ($list as $l )	$config[$l['name']]=$l['value'];
	$xtpl->assign('CF', $config);
	$quyen=check_quyen($user_info);
	
	$dothi=array();	
	$select_month = $key[1]>0? $key[1]: $apdung['thangapdung'];	
	$apdung['tieude']=($select_month%3==0)?$lang_module['t'.$select_month]:sprintf($lang_module['thang'],$select_month);
	$apdung['namngoai']=$apdung['nam']-1;
	$apdung['namkia']=$apdung['nam']-2;
	$xtpl->assign('BC', $apdung);
		
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
	/*for($i=1;$i<=$apdung['thangapdung'];$i++)
	{
		$thang=($i%3==0)?$lang_module['t'.$i]:sprintf($lang_module['thang'],$i); 
		$xtpl->assign('thang', $thang);	
		$xtpl->parse('main.thang1');
		$xtpl->parse('main.thang_title');
	}*/
	$xtpl->assign('THANG', showthang($apdung['thangapdung'],'thang'));
	$xtpl->assign('THANG_TITLE', showthang($apdung['thangapdung'],'thang_title'));
	
	$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$apdung['nam']. ' where status=1 order by code asc';
	$list_chitieu = $db->query($sql)->fetchAll();$tt=0;
	foreach ($list_chitieu as $r)
	{
		$sql = 'SELECT * FROM ' . TABLE. "_question 
		where status=1 and giatri=0 and parent like '".$r['code']."'";
		$chuong = $db->query($sql)->fetchALL();
		$r['sl_chitieu']=0;
	foreach ($chuong as $ch)
		{
			$xtpl->assign('THANG_NULL', showthang($apdung['thangapdung'],'thang_null'));
			$ch['sl_chitieu']=0;
			
			$sql = 'SELECT * FROM ' . TABLE. "_question 
			where status=1 and giatri>0 and parent like '".$ch['code']."' order by ID";
			$Q = $db->query($sql)->fetchAll();		
			foreach($Q as $q)
			{				
				$xtpl->assign('Q', $q);	
				$kq=array(); 
				$sql = 'SELECT * FROM ' .TABLE. "_ketqua_".$apdung['nam']." where status=1 
				and dinhdanh like '".$r['id'].'_'.$q['code']."'";
				$kq = $db->query($sql)->fetch();				
				
				$kq['stt']=++$tt;
				$r['sl_chitieu']++;
				$ch['sl_chitieu']++;
				$xtpl->assign('DANHGIA', showdanhgia($apdung['thangapdung'],$kq,$check_doandg));	
				$xtpl->assign('KQ', $kq);	
				$xtpl->parse('main.chitieu.chuong.loop');
			}
			
			$xtpl->assign('chuong', $ch);	
			$xtpl->parse('main.chitieu.chuong');
		}
		
		
		$xtpl->assign('R', $r);	
		
		$xtpl->parse('main.chitieu');
	}

	
	for ($i=1;$i<=5;$i++)  {$bc1['M'.$i]=0;} $bc1['tong_dat']=0;
	$hs2=array('C3','C5');
	$block_chart=array('Chart_a','Chart_b','Chart_c','Chart_d','Chart_e');$stt_chart=0;
	foreach ($list_chitieu as $r)
	{
		for ($i=1;$i<=5;$i++)  {$r['M'.$i]=0;} $r['sum']=0;
		$sql = 'SELECT * FROM ' . TABLE. "_question 
		where status=1 and giatri=0 and parent like '".$r['code']."' order by id";
		$Q = $db->query($sql)->fetchAll();
		$Ch=array();		
		foreach($Q as $q)
		{

			$xtpl->assign('Q', $q);	
			$kq=array(); $kq['sum']=0;$kq['dtb']=0; $r['sum']=0;$r['dtb']=0;
			for ($i=1;$i<=5;$i++) 
			{
				$kq['L'.$i]=check_level($q['code'],$i,TABLE. "_ketqua_".$apdung['nam']);
				$r['M'.$i] +=$kq['L'.$i];
				$bc1['M'.$i] +=$kq['L'.$i];
				$kq['dtb'] +=$kq['L'.$i]*$i;				
				$kq['sum'] +=$kq['L'.$i];
				
				$bc1['tong_dat'] +=$kq['L'.$i];
				$bc1['dtb_dadg'] +=$kq['L'.$i]*$i*$q['heso'];
				//if (in_array($r['code'],$hs2)) $bc1['dtb_dadg'] +=$kq['L'.$i]*$i;
				$r['sum'] +=$r['M'.$i];
				$r['dtb'] +=$r['M'.$i]*$i;
			}
			
			$kq['dtb']=$kq['sum']>0?round($kq['dtb']/$kq['sum'],2):0;
			
			
			$xtpl->assign('KQ', $kq);	
			//show log
						
			$xtpl->parse('main.chitieu2.loop');
		}

		$r['dtb']=$r['sum']>0?round($r['dtb']/$r['sum'],2):0;
		$xtpl->assign('R', $r);
		$xtpl->parse('main.chitieu2');
		
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

function showthang($m=0,$part='thang')
{
	global $module_data,$lang_module,$global_apdung,$module_info;
	$str='';
	$xtpl = new XTemplate('tk_tonghopthang.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	
	for($i=1;$i<=$m;$i++)
	{
		$thang=($i%3==0)?$lang_module['t'.$i]:sprintf($lang_module['thang'],$i); 
		$xtpl->assign('thang', $thang);	
		$xtpl->parse($part);
	}
	$str=$xtpl->text($part);
	return $str; // 
}
function showdanhgia($m=0,$row,$check_doandg)
{
	global $module_data,$lang_module,$global_apdung,$module_info;
	$str='';
	$xtpl = new XTemplate('tk_tonghopthang.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	
	for($i=1;$i<=$m;$i++)
	{
		$col='t'.$i.'_';
		if (empty($row)) {$row['diem_bvdg']=0;$row['diem_doandg']=0;}
		else {$row['diem_bvdg']=$row[$col.'diem_bvdg'];$row['diem_doandg']=$row[$col.'diem_doandg'];}
		//show log
		if((!$check_doandg and $row['diem_bvdg']>=$row['diem_kehoach']) or ($check_doandg and $row['diem_doandg']>=$row['diem_kehoach']) )
			$row['danhgia']="<strong>Đạt</strong>"; Else $row['danhgia']="<span style='color:#f00'>Không Đạt </span>";

		$xtpl->assign('KQ', $row);	
		$xtpl->parse('thang_danhgia');
	}
	$str=$xtpl->text('thang_danhgia');
	return $str; // 
}
