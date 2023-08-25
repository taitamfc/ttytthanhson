<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Apr 20, 2010 10:47:41 AM
 */
if (! defined('NV_IS_MOD_CONTACT')) {
    die('Stop!!!');
}

if (empty($user_info))
{
		 die('.');
}
/*if (empty($global_user['madv']) and $global_user['phanloai']==1 and $global_user['nhom']==0 )
{
	$msg="<script> alert('".$lang_module['down_err']."');";
	$msg .='window.location = '.NV_BASE_SITEURL.';</script>';
	echo $msg;
	exit();
}*/
error_reporting(E_ALL);
set_time_limit(0);
ini_set('memory_limit', '-1');
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$checkss =$nv_Request->get_title('checkss', 'get,post', '');
$key=md5($client_info['session_id'] . $global_config['sitekey']);

if ($checkss!=$key) {
    die('Stop!!!');
}
	
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	
	$tbhtml=NV_PREFIXLANG . '_' . $module_data . '_dsdangky_'.$global_kythi['id'];
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('GLANG', $lang_global);
	$xtpl->assign('GLANG', $lang_global);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('GLANG', $lang_global);
	
	$col=array('','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ');		
	
	/** Error reporting */
		//error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		//define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		
		require NV_ROOTDIR . '/modules/' . $module_file . '/PHPExcel.php';
		require NV_ROOTDIR . '/modules/' . $module_file . '/PHPExcel/IOFactory.php';
		require NV_ROOTDIR . '/modules/' . $module_file . '/PHPExcel/Writer/Excel2007.php';
		
		$fileType = 'Excel2007';$caidat['fileformat'];
	
	if ($sta=='admin_export_test') 
	{
				
		$fileName = NV_ROOTDIR . '/modules/' . $module_file . '/export/pvkiemtra.xlsx';
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel = PHPExcel_IOFactory::createReader($fileType);
		$objPHPExcel = $objPHPExcel->load($fileName);
		$objPHPExcel->setActiveSheetIndexbyName('Sheet1');
		$objPHPExcel->getActiveSheet();
				
		//formating
				$style_center = array('alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,));
				$style_left = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,));
				$style_jus = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::VERTICAL_JUSTIFY,));
				$style_border= array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
		
		$tbhtml=NV_PREFIXLANG . '_' . $module_data . '_dsdangky_'.$global_kythi['id'];
		$result=array(); 
		$db_slave->sqlreset()->select('*')->from($tbhtml)->where(' (1) ')->order('truongnophs asc');
		$result = $db_slave->query($db_slave->sql());
		$tt=1; $dong=2;
		$kq=array(); 
		foreach ($result as $row) 
		{$kq[]=$row;}
		$dong=count($kq); $i=52;
		$objPHPExcel->getActiveSheet()->fromArray($kq, null, 'A2');
		
		$ran='A2:'.$col[$i].($dong+1);
		$objPHPExcel->getActiveSheet()->getStyle($ran)->applyFromArray($style_border);
			
		if ($caidat['phienban']='2007')	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		else $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="ds_test_'.date('d:m:y').'.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 02 Jan 2017 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter->save('php://output'); exit();
	}
?>