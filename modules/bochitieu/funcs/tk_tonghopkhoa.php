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
		$fileName = NV_ROOTDIR . '/modules/' . $module_file . '/export/thong_ke6.xlsx';
		
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
		
		$tt=1; $dong=8;
		$start=8; $kq=array(); 
		
	$sql = 'SELECT 0 as stt, account, tenkhoa FROM ' . TABLE. '_groupuser where status=1 
	and account in (select phongxuly from '.TABLE.'_question) order by account asc';
	$list_khoa = $db->query($sql)->fetchAll();$tt=0;
	$tk=array();$result=array();
	foreach ($list_khoa as $r)
	{
		$r['stt']=++$tt;
		$sql = "SELECT code FROM ". TABLE. "_question where parent in 
		(SELECT code FROM ". TABLE. "_question  where phongxuly like '".$r['account']."')";
		$slchitieu = $db->query($sql)->fetchALL();
		$r['slchitieu']=0;
		//$r['phutrach']='';
		
		$r['kh_tangdiem']=0;$r['kh_giamdiem']=0;$r['kh_giunguyen']=0;
		for ($i=1;$i<=12;$i++)
		{$r['t'.$i.'_sltangdiem']=0;$r['t'.$i.'_slgiamdiem']=0;$r['t'.$i.'_slgiunguyen']=0;}
		foreach ($slchitieu as $sl)
		{
			$r['slchitieu']++;
			//$r['phutrach'] .=$sl['code'].";";			
			$sql = "SELECT * FROM ". TABLE. "_ketqua_".$apdung['nam']." where dinhdanh like '%_".$sl['code']."'";
			$kq = $db->query($sql)->fetch();
			
			if (!empty($kq))// 
			{	
				
				
				$r['kh_tangdiem'] +=($kq['diem_kehoach']>$kq['diem_namngoai'])?1:0;
				$r['kh_giamdiem']+=($kq['diem_kehoach']<$kq['diem_namngoai'])?1:0;
				$r['kh_giunguyen']+=($kq['diem_kehoach']==$kq['diem_namngoai'])?1:0;
				
				for ($i=1;$i<=12;$i++){
					
					$kq['diem_bvdg']=$kq['t'.$i.'_diem_bvdg'];
					$kq['diem_doandg']=$kq['t'.$i.'_diem_doandg'];
					
					if($kq['diem_doandg']>0){
					$r['t'.$i.'_sltangdiem'] +=($kq['diem_doandg']>$kq['diem_namngoai'])?1:0;
					$r['t'.$i.'_slgiamdiem']+= ($kq['diem_doandg']<$kq['diem_namngoai'])?1:0;
					$r['t'.$i.'_slgiunguyen']+=($kq['diem_doandg']==$kq['diem_namngoai'])?1:0;
					}
					else
					{
						$r['t'.$i.'_sltangdiem'] +=($kq['diem_bvdg']>$kq['diem_namngoai'])?1:0;
						$r['t'.$i.'_slgiamdiem']+= ($kq['diem_bvdg']<$kq['diem_namngoai'])?1:0;
						$r['t'.$i.'_slgiunguyen']+=($kq['diem_bvdg']==$kq['diem_namngoai'])?1:0;
					}
				} //End for
				
			}	
		}
		$result[]=$r;
	}
		
		$objPHPExcel->getActiveSheet()->fromArray($result, null, 'B'.$start);
		$dong=count($result); $i=44;
		$ran='B'.$start.':'.$col[$i].($dong+8);
		
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($dong+8), 'TỔNG CỘNG')
											->setCellValue('G'.($dong+10), 'NGƯỜI LẬP BẢNG')
											->setCellValue('AJ'.($dong+10), 'TRƯỞNG PHÒNG QUẢN LÝ CHẤT LƯỢNG');
		$objPHPExcel->getActiveSheet()->mergeCells('B'.($dong+8).':D'.($dong+8));
		for ($i=4;$i<45;$i++) 
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($col[$i].($dong+8), '=SUM('.$col[$i].$start.':'.$col[$i].($dong+7).')');
		$objPHPExcel->getActiveSheet()->getStyle('B'.($dong+8).':AR'.($dong+10))->getFont()->setBold(true);
				
		$objPHPExcel->getActiveSheet()->getStyle($ran)->applyFromArray($style_border);
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('TongHopKhoa_'.date('d_m_y'));
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="TongHopKhoa_'.date('d_m_y').'.xlsx"');
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
	$xtpl->assign('link_export',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.md5('export_excel'));
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('export_excel', md5('export_excel'));
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL.'themes/' . $global_config['module_theme']);
	$sql = 'SELECT * FROM ' . TABLE. '_config';
	$list = $db->query($sql)->fetchAll();
	
	$sql = 'SELECT account, tenkhoa FROM ' . TABLE. '_groupuser where status=1 
	and account in (select phongxuly from '.TABLE.'_question) order by account asc';
	$list_khoa = $db->query($sql)->fetchAll();$tt=0;
	$tk=array();
	foreach ($list_khoa as $r)
	{
		$r['stt']=++$tt;
		$sql = "SELECT code FROM ". TABLE. "_question where parent in 
		(SELECT code FROM ". TABLE. "_question  where phongxuly like '".$r['account']."')";
		$slchitieu = $db->query($sql)->fetchALL();
		$r['slchitieu']=0;
		$r['phutrach']='';
		
		$r['kh_tangdiem']=0;$r['kh_giamdiem']=0;$r['kh_giunguyen']=0;
		$r['sltangdiem']=0;$r['slgiamdiem']=0;$r['slgiunguyen']=0;
		foreach ($slchitieu as $sl)
		{
			$r['slchitieu']++;
			$r['phutrach'] .=$sl['code'].";";
			
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
		
		
		$xtpl->assign('THANG', showthang($apdung['thangapdung'],'thang'));
		$xtpl->assign('THANG_TITLE', showthang($apdung['thangapdung'],'thang_title'));
		$xtpl->assign('KHOA', $r);
		$xtpl->parse('main.dskhoa');
		
		$tk['slchitieu'] +=$r['slchitieu'];
		$tk['sltangdiem'] +=$r['sltangdiem'];
		$tk['slgiamdiem'] +=$r['slgiamdiem'];
		$tk['slgiunguyen'] +=$r['slgiunguyen'];
		$tk['kh_tangdiem'] +=$r['kh_tangdiem'];
		$tk['kh_giamdiem'] +=$r['kh_giamdiem'];
		$tk['kh_giunguyen'] +=$r['kh_giunguyen'];
	}
	
	
	$xtpl->assign('filename', "bao_cao_thang_".$select_month.'.doc');
	$xtpl->assign('TK', $tk);
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
	$xtpl = new XTemplate('tk_tonghopkhoa.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	
	for($i=$m;$i<=$m;$i++) //show tháng hiện tại
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
	$xtpl = new XTemplate('tk_tonghopkhoa.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	
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
