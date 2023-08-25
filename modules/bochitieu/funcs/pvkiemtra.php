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
	$key=explode('_',$token);
	$apdung=array();
	$apdung=$global_apdung;
	//if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) {die('Stop!!!');}
	if($sta=='exp_item')
	{
		error_reporting(E_ALL);
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);

		$item = $nv_Request->get_array('item', 'post');
		$cri="(";
		foreach ($item as $id) $cri .=$id.',';
		$cri .='0)';
		
		$group=array(); 
		$sql = "SELECT '*' as tt, code,noidung FROM ". TABLE. "_question where status=1 and id in ".$cri;
		$group = $db->query($sql)->fetchAll();
		
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
		$fileName = NV_ROOTDIR . '/modules/' . $module_file . '/export/pvkiemtra.xlsx';
		
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
		$tieuchi="(TIÊU CHÍ:";
		$d8="Mức đánh giá ".($apdung['nam']-1);
		$e8="Mức tự đánh giá ".($apdung['nam']);
		$f8="Phúc tra năm ".($apdung['nam']);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 'NĂM '.$apdung['nam'])
											->setCellValue('D8', $d8)
											->setCellValue('E8', $e8)
											->setCellValue('F8', $f8);
		$tt=1; $dong=9;
		$start=9; $kq=array(); 
		foreach ($group as $g) 
		{
			$tieuchi .=$g['code'].";";
			$kq[]=$g;
			$sql = "SELECT 0 as stt, code,noidung FROM ". TABLE. "_question where status=1 
			and parent like '".$g['code']."'";
			$result = $db->query($sql)->fetchAll();
			foreach ($result as $row) 
			{
				$row['stt']=$tt++;
				$kq[]=$row;
			}			
		}
		
		$tieuchi .=")";
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5', $tieuchi);
		
		
		$objPHPExcel->getActiveSheet()->fromArray($kq, null, 'A'.$start);
		$dong=count($kq); $i=6;
		$ran='A'.$start.':'.$col[$i].($dong+8);
		
		$objPHPExcel->getActiveSheet()->getStyle($ran)->applyFromArray($style_border);
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('pvKiemTra'.date('d_m_y'));
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="pvKiemTra_'.date('d_m_y').'.xlsx"');
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
	}
	if($sta=='exp_phuluc3')
	{
		error_reporting(E_ALL);
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		
		$data=array();

		$data['hoten'] = $nv_Request->get_title('txt_hoten', 'post','');
		$data['congtac'] = $nv_Request->get_title('txt_congtac', 'post','');
		$data['sdt'] = $nv_Request->get_title('txt_sdt', 'post','');
		$data['tieuchi'] = $nv_Request->get_title('txt_matieuchi', 'post','');
		$data['xeploai'] = $nv_Request->get_title('txt_xeploai', 'post','');
		$data['ngaycham'] = $nv_Request->get_title('txt_ngaycham', 'post','');
		
		$data['mota1'] = $nv_Request->get_title('txt_mota1', 'post','');
		$data['mota2'] = $nv_Request->get_title('txt_mota2', 'post','');
		$data['mota3'] = $nv_Request->get_title('txt_mota3', 'post','');
		$data['mota4'] = $nv_Request->get_title('txt_mota4', 'post','');
				
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
		$fileName = NV_ROOTDIR . '/modules/' . $module_file . '/export/phuluc3.xlsx';
		
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
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6', $data['hoten'])
											->setCellValue('B7', $data['congtac'])
											->setCellValue('D7', $data['sdt'])
											->setCellValue('B8', $data['tieuchi'])
											->setCellValue('D8', $data['xeploai'])
											->setCellValue('B9', $data['ngaycham'])
											->setCellValue('A12', $data['mota1'])
											->setCellValue('A14', $data['mota2'])
											->setCellValue('A16', $data['mota3'])
											->setCellValue('A18', $data['mota4']);
		/*$tt=1; $dong=9;
		$start=9; 
		$dong=count($kq); $i=6;
		$ran='A'.$start.':'.$col[$i].($dong+8);		
		$objPHPExcel->getActiveSheet()->getStyle($ran)->applyFromArray($style_border);
		*/
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('phuluc3');
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="phuluc3_'.date('d_m_y').'.xlsx"');
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
	}
	
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL.'themes/' . $global_config['module_theme']);
	$sql = 'SELECT * FROM ' . TABLE. '_config';
	$list = $db->query($sql)->fetchAll();
	$config=array();
	
	
	$sql = "SELECT id, code FROM ". TABLE. "_question where status=1 and parent in (
	SELECT code FROM ". TABLE. "_question where status=0)";
	$list_chitieu = $db->query($sql)->fetchAll();$tt=0;
	foreach ($list_chitieu as $r)
	{
		$xtpl->assign('ROW', $r);
		$xtpl->parse('main.select');
	}
	
	$xtpl->assign('filename', "phucvukiemtra_".$apdung['thangapdung'].'.doc');
	$xtpl->assign('TK', $tk);
	$xtpl->assign('BC1', $bc1);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

