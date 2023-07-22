<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-9-2010 14:43
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$mark = $nv_Request->get_title('mark', 'post', '');

if (!empty($mark) and ($mark == 'read' or $mark == 'unread')) {
    $mark = $mark == 'read' ? 1 : 0;
    $sends = $nv_Request->get_array('sends', 'post', array());
    if (empty($sends)) {
        nv_jsonOutput(array( 'status' => 'error', 'mess' => $lang_module['please_choose'] ));
    }

    foreach ($sends as $id) {
        nv_status_notification(NV_LANG_DATA, $module_name, 'contact_new', $id, $mark);
    }

    $sends = implode(',', $sends);
    $db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_send SET is_read=' . $mark . ' WHERE id IN (' . $sends . ')');
    nv_jsonOutput(array( 'status' => 'ok', 'mess' => '' ));
}

$page_title = $module_info['custom_title'];

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op); 

$where = '';
$ftime_book = $nv_Request->get_title('ftime_book', 'get,post', '');
if(!empty($ftime_book))
{
	$where .= ' AND time_book = "'. $ftime_book .'"';
}


$fdoctor = $nv_Request->get_title('fdoctor', 'get,post', '');
if(!empty($fdoctor))
{
	$where .= ' AND doctor = "'. $fdoctor .'"';
}


$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );

if( preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $ngay_tu, $m ) )
	{
		$_hour = $nv_Request->get_int( 'add_date_hour', 'post', 0 );
		$_min = $nv_Request->get_int( 'add_date_min', 'post', 0 );
		$ngay_tu = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
		
		$where .= ' AND days >='. $ngay_tu ;
	}

	
if( preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $ngay_den, $m ) )
	{
		$_hour = $nv_Request->get_int( 'add_date_hour', 'post', 23 );
		$_min = $nv_Request->get_int( 'add_date_min', 'post', 59 );
		$ngay_den = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
		
		$where .= ' AND days <='. $ngay_den ;
	}
	
	
// XUẤT FILE EXCEL
$excel = $nv_Request->get_int('export_word', 'get', 0);

if($excel)
{
		// XUáº¤T THÃ”NG TIN RA FILE EXCEL
		
		
		$db->sqlreset()
		->from( '' . NV_PREFIXLANG . '_' . $module_data . '_send' );
	
		$db->select('*')
			->order( 'id DESC' )
			->where('id > 0 ' . $where);
		$sth_excel = $db->prepare( $db->sql() );
		$sth_excel->execute();
		
		require_once NV_ROOTDIR . '/modules/'. $module_file .'/Classes/PHPExcel.php';

	$excel = new PHPExcel();
	
	$excel->setActiveSheetIndex(0);
		
	$excel->getActiveSheet()->setTitle('Danh sách khách hàng');

	$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
	$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
	$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
	$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
	$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
	$excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
	$excel->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);
		
		$excel->getActiveSheet()->setCellValue('A1', 'STT');
		$excel->getActiveSheet()->setCellValue('B1', $lang_module['ngaygui']);
		$excel->getActiveSheet()->setCellValue('C1', $lang_module['sender_name']);
		$excel->getActiveSheet()->setCellValue('D1', $lang_module['sender_birthday']);
		$excel->getActiveSheet()->setCellValue('E1', $lang_module['sender_address']);
		$excel->getActiveSheet()->setCellValue('F1', $lang_module['sender_phone']);
		$excel->getActiveSheet()->setCellValue('G1', $lang_module['sender_email']);
		$excel->getActiveSheet()->setCellValue('H1', $lang_module['ngaykham']);
		$excel->getActiveSheet()->setCellValue('I1', $lang_module['buoikham']);
		$excel->getActiveSheet()->setCellValue('J1', $lang_module['doctor']);
		$excel->getActiveSheet()->setCellValue('K1', $lang_module['noidung']);
		
	
		$stt = 1;
		$numRow = 2;
		
		while( $view = $sth_excel->fetch() )
		{
					
			$excel->getActiveSheet()->setCellValue('A'.$numRow, $stt);
			$excel->getActiveSheet()->setCellValue('B'.$numRow, date('d/m/Y',$view['send_time']));
			$excel->getActiveSheet()->setCellValue('C'.$numRow, $view['sender_name']);
			$excel->getActiveSheet()->setCellValue('D'.$numRow, date('d/m/Y',$view['sender_birthday']));
			$excel->getActiveSheet()->setCellValue('E'.$numRow, $view['sender_address']);
			$excel->getActiveSheet()->setCellValue('F'.$numRow, $view['sender_phone']);
			$excel->getActiveSheet()->setCellValue('G'.$numRow, $view['sender_email']);
			$excel->getActiveSheet()->setCellValue('H'.$numRow, date('d/m/Y',$view['days']));
			$excel->getActiveSheet()->setCellValue('I'.$numRow, $view['time_book']);
			$excel->getActiveSheet()->setCellValue('J'.$numRow, $view['doctor']);
			$excel->getActiveSheet()->setCellValue('K'.$numRow, $view['content']);
			$numRow++;
			$stt++;
		
		}
		

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="data.xls"');
		PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
		
		die();
}


$contact_allowed = nv_getAllowed();

if (!empty($contact_allowed['view'])) {
    $in = implode(',', array_keys($contact_allowed['view']));

    $page = $nv_Request->get_int('page', 'get', 1);
    $per_page = 30;
    $base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name;

    $db->sqlreset()
        ->select('COUNT(*)')
        ->from(NV_PREFIXLANG . '_' . $module_data . '_send')
        ->where('cid IN (' . $in . ')' . $where);
//DIE($db->sql());
    $num_items = $db->query($db->sql())->fetchColumn();

    if ($num_items) {
        $xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=del&amp;t=2');

        $a = 0;
        $currday = mktime(0, 0, 0, date('n'), date('j'), date('Y'));

        $db->select('*')
            ->order('id DESC')
            ->limit($per_page)
            ->offset(($page - 1) * $per_page);

        $result = $db->query($db->sql());

        while ($row = $result->fetch()) {
            $image = array( NV_BASE_SITEURL . NV_ASSETS_DIR . '/images/mail_new.gif', 12, 9 );
            $status = 'New';
            $style = " style=\"font-weight:bold;cursor:pointer;white-space:nowrap;\"";

            if ($row['is_read'] == 1) {
            	$style = " style=\"cursor:pointer;white-space:nowrap;\"";
	            if ($row['is_reply']==1) {
	                $image = array( NV_BASE_SITEURL . NV_ASSETS_DIR . '/images/mail_reply.gif', 13, 14 );
	                $status = $lang_module['tt2_row_title'];
	            }elseif ($row['is_reply']==2) {
	                $image = array( NV_BASE_SITEURL . NV_ASSETS_DIR . '/images/mail_forward.gif', 13, 14 );
	                $status = $lang_module['tt2_row_title'];
	            }else{
	                $image = array( NV_BASE_SITEURL . NV_ASSETS_DIR . '/images/mail_old.gif', 12, 11 );
	                $status = $lang_module['tt1_row_title'];
	            }
            }

            $onclick = "onclick=\"location.href='" . NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=view&amp;id=" . $row['id'] . "'\"";

            $xtpl->assign('ROW', array(
                'id' => $row['id'],
                'sender_name' => $row['sender_name'],
                'path' => $contact_allowed['view'][$row['cid']],
                'time_book' => $row['time_book'],
                'doctor' => $row['doctor'],
                'title' => nv_clean60($row['title'], 100),
                'time' => $row['send_time'] >= $currday ? nv_date('H:i d/m/Y', $row['send_time']) : nv_date('d/m/Y', $row['send_time']),
                'days' => $row['send_time'] >= $currday ? nv_date('H:i d/m/Y', $row['send_time']) : nv_date('d/m/Y', $row['days']),
                'style' => $style,
                'onclick' => $onclick,
                'status' => $status,
                'image' => $image
            ));

            $xtpl->parse('main.data.row');
        }

        $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);

        if (!empty($generate_page)) {
            $xtpl->assign('GENERATE_PAGE', $generate_page);
            $xtpl->parse('main.data.generate_page');
        }
    }
}

if (empty($num_items)) {
    $xtpl->parse('main.empty');
} else {
    $xtpl->parse('main.data');
}


// DANH SÁCH LỰA CHỌN

//Danh sach cac bo phan
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_department WHERE act>0 ORDER BY weight';
$array_department = $nv_Cache->db($sql, 'id', $module_name);

$alias_department = '';


$time_book = array();
$time_book[] = array(0, '');
$time_bookName = array();
$time_bookName[] = $lang_module['selecttime'];


$doctor = array();
$doctor[] = array(0, '');
$doctorName = array();
$doctorName[] = $lang_module['selectdoctor'];

$dpDefault = 0;
if (!empty($array_department)) {
    foreach ($array_department as $k => $department) {
        if (!empty($department['alias'])) {
            $alias_department = $department['alias'];
            $dpDefault = $department['id'];
            $array_department = array($department['id'] => $department);
           
		   $time_book = array();
            $time_bookName = array_map('trim', explode('|', $department['time_book']));
            foreach ($time_bookName as $_time_book2) {
                $time_book[] = array($department['id'], $_time_book2);
            }
            break;
			
			
			
			$doctor = array();
            $doctorName = array_map('trim', explode('|', $department['doctor']));
            foreach ($time_bookName as $_doctor2) {
                $doctor[] = array($department['id'], $_doctor2);
            }
            break;
			
			
        }
		
	
        if (!empty($department['time_book'])) {
            $_time_book = array_map('trim', explode('|', $department['time_book']));
            foreach ($_time_book as $_time_book2) {
				
				
                $time_book[] = array($department['id'], $_time_book2);
                $time_bookName[] = in_array($_time_book2, $time_bookName) ? $_time_book2 . ', ' . $department['full_name'] : $_time_book2;
            }
        } 
		if (!empty($department['specialist'])) {
            $_specialist = array_map('trim', explode('|', $department['specialist']));
            foreach ($_specialist as $_specialist2) {
                $specialist[] = array($department['id'], $_specialist2);
                $specialistName[] = in_array($_specialist2, $specialistName) ? $_specialist2 . ', ' . $department['full_name'] : $_specialist2;
            }
        }
		if (!empty($department['doctor'])) {
            $_doctor = array_map('trim', explode('|', $department['doctor']));
            foreach ($_doctor as $_doctor2) {
                $doctor[] = array($department['id'], $_doctor2);
                $doctorName[] = in_array($_doctor2, $doctorName) ? $_doctor2 . ', ' . $department['full_name'] : $_doctor2;
            }
        }

        if ($department['is_default']) {
            $dpDefault = $department['id'];
        }
    }
}


	$i = 1;

if (! empty($time_bookName)) {
        foreach ($time_bookName as $key => $time_book) {
		
			if($i == 1)
			$key = '';
			else
			$key = $time_book;
			
			$i++;
			
			if($ftime_book == $time_book)
			 $xtpl->assign('selected_time_book', 'selected=selected');
			else
			$xtpl->assign('selected_time_book', '');
			
            $xtpl->assign('SELECTVALUE', $key);
            $xtpl->assign('SELECTNAME', $time_book);
            $xtpl->parse('main.time_book.select_option_loop');
        }
        $xtpl->parse('main.time_book');
    } 
	

	
	$i = 1;
	if (! empty($doctorName)) {
        foreach ($doctorName as $key => $doctor) {
		
			if($i == 1)
			$key = '';
			else
			$key = $doctor;
			
			$i++;
			
			if($fdoctor == $doctor)
			 $xtpl->assign('selected_doctor', 'selected=selected');
			else
			$xtpl->assign('selected_doctor', '');
			
			
            $xtpl->assign('SELECTVALUE', $key);
            $xtpl->assign('SELECTNAME', $doctor);
            $xtpl->parse('main.doctor.select_option_loop');
        }
        $xtpl->parse('main.doctor');
    }

//print_r($time_book);die;

if($ngay_tu > 0)
$xtpl->assign('ngay_tu', date('d/m/Y',$ngay_tu));

if($ngay_den > 0)
$xtpl->assign('ngay_den', date('d/m/Y',$ngay_den));
 
 
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
