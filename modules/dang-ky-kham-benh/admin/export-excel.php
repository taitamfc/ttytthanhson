<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)
 * @Copyright (C) 2014 VIETNAM DIGITAL TRADING TECHNOLOGY . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 18:49
 */

if (! defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
$xtpl->assign( 'OP', $op );


// XUẤT FILE EXCEL
$excel = $nv_Request->get_int('excel', 'get', 0);

if($excel)
{
		// XUáº¤T THÃ”NG TIN RA FILE EXCEL
		
		
		$db->sqlreset()
		->from( '' . NV_PREFIXLANG . '_' . $module_data . '_send' );
	
		$db->select('*')
			->order( 'id ASC' );
		$sth_excel = $db->prepare( $db->sql() );
		$sth_excel->execute();
		
		require_once NV_ROOTDIR . '/modules/'. $module_file .'/Classes/PHPExcel.php';

	$excel = new PHPExcel();
	
	$excel->setActiveSheetIndex(0);
		
	$excel->getActiveSheet()->setTitle('Danh sách khách hàng');

	$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('F')->setWidth(80);
	$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

		//XÃ©t in Ä‘áº­m cho khoáº£ng cá»™t
	$excel->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);
		//Táº¡o tiÃªu Ä‘á» cho tá»«ng cá»™t
		//Vá»‹ trÃ­ cÃ³ dáº¡ng nhÆ° sau:
		/**
		 * |A1|B1|C1|..|n1|
		 * |A2|B2|C2|..|n1|
		 * |..|..|..|..|..|
		 * |An|Bn|Cn|..|nn|
		 */
		$excel->getActiveSheet()->setCellValue('A1', 'Stt');
		$excel->getActiveSheet()->setCellValue('B1', $lang_module['days']);
		$excel->getActiveSheet()->setCellValue('C1', $lang_module['time_book']);
		$excel->getActiveSheet()->setCellValue('D1', $lang_module['specialist']);
		$excel->getActiveSheet()->setCellValue('E1', $lang_module['doctor']);
		$excel->getActiveSheet()->setCellValue('F1', $lang_module['title']);
		$excel->getActiveSheet()->setCellValue('G1', $lang_module['sender_name']);
		$excel->getActiveSheet()->setCellValue('H1', $lang_module['sender_birthday']);
		$excel->getActiveSheet()->setCellValue('I1', $lang_module['sender_address']);
		$excel->getActiveSheet()->setCellValue('J1', $lang_module['sender_email']);
		$excel->getActiveSheet()->setCellValue('K1', $lang_module['sender_phone']);
		
	
		$stt = 1;
		$numRow = 2;
		
		while( $view = $sth_excel->fetch() )
		{
					
			$excel->getActiveSheet()->setCellValue('A'.$numRow, $stt);
			$excel->getActiveSheet()->setCellValue('B'.$numRow, date('d/m/Y',$view['days']));
			$excel->getActiveSheet()->setCellValue('C'.$numRow, $view['time_book']);
			$excel->getActiveSheet()->setCellValue('D'.$numRow, $view['specialist']);
			$excel->getActiveSheet()->setCellValue('E'.$numRow, $view['doctor']);
			$excel->getActiveSheet()->setCellValue('F'.$numRow, $view['title']);
			$excel->getActiveSheet()->setCellValue('G'.$numRow, $view['sender_name']);
			$excel->getActiveSheet()->setCellValue('H'.$numRow, date('d/m/Y',$view['sender_birthday']));
			$excel->getActiveSheet()->setCellValue('I'.$numRow, $view['sender_address']);
			$excel->getActiveSheet()->setCellValue('J'.$numRow, $view['sender_email']);
			$excel->getActiveSheet()->setCellValue('K'.$numRow, $view['sender_phone']);
			$numRow++;
			$stt++;
		
		}
		

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="data.xls"');
		PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
		
		die();
}


$LINK = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$op.'&amp;excel=1';

$xtpl->assign( 'LINK', $LINK );

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

$page_title = $lang_module['financials'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';

include NV_ROOTDIR . '/includes/header.php';
echo $alias;
include NV_ROOTDIR . '/includes/footer.php';
