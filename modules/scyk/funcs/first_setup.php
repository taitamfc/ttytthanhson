<?php

/**
 * WAN LY BAO CAO SU CO Y KHOA
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (!defined('NV_IS_MOD_FIVES')) {
	die('Stop_main!!!');
}

// create_evaluation();
if (empty($user_info)) {
	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';
	Header('Location: ' . nv_url_rewrite($url, true));
	exit();
}


$post = array();
$get = array();
$update = False;

//test modal response
// thêm mới thành viên

$thongke = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);

/*Code for Here*/

$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));

$post = array();
$get = array();
$id = 0;

$year = date('y'); // Specify the desired year

// Create a DateTime object for the first day of the year
$firstDayOfYear = new DateTime("$year-01-01");

// Create a DateTime object for the last day of the year
$lastDayOfYear = new DateTime("$year-12-31");

$tg_tungay = $firstDayOfYear->format('d-m-Y');
$tg_denngay = $lastDayOfYear->format('d-m-Y');

$xtpl->assign('BC', array(
	'tungay' =>  $tg_tungay,
	'denngay' => $tg_denngay
));


//kiểm tra loại báo cáo
//mặc định 0 là tổng hợp các loại báo cáo
$st = '';
$loaibc = $nv_Request->get_title('idd', 'get,post', 0); //trả về 0 nếu ko có giá trị 
if ($loaibc >= 0) {
	//đưa vào list chọn danh sách loại báo cáo
	switch (intval($loaibc)) {
		case 1:
			$trangthai = 'ĐÃ TIẾP NHẬN';
			break;

		case 2:
			$trangthai = 'ĐÃ DUYỆT';
			break;

		case 3:
			$trangthai = 'ĐANG PHÂN TÍCH';
			break;

		case 4:
			$trangthai = 'ĐÃ PHẢN HỒI';
			break;

		default:
			$trangthai = 'TỔNG HỢP';
			break;
	}

	$xtpl->assign('TENBC', $trangthai);


	$st = "SELECT * FROM " . TABLE . "_vote_config where status =1";
	$row_op = $db->query($st)->fetch();
	//var_dump($st);
	// Đưa dữ liệu vào kỳ đánh giá
	$items = $row_op['loaibc'];
	$items = explode(';', $items);
	//var_dump($items);
	foreach ($items as $item) {
		switch (intval($item)) {
			case '0':
				$trangthai = 'Tổng hợp';
				break;

			case 1:
				$trangthai = 'Đã tiếp nhận';
				break;

			case 2:
				$trangthai = 'Đã duyệt';
				break;

			case 3:
				$trangthai = 'Đang phân tích';
				break;

			case 4:
				$trangthai = 'Đã phản hồi';
				break;

			default:

				break;
		}
		($loaibc == intval($item)) ? $check = 'selected' : $check = '';

		$xtpl->assign('LOAIBC', array(
			'trangthai' => $trangthai,
			'value' => $item,
			'check' => $check
		));
		$xtpl->parse('main.LOAIBC');
	}



	
	//var_dump($st);

	//show dữ liệu I


	//$row = $db->query($st)->fetch();
	//echo $row['mucdott_nb'];
	//($mucdott_nb == $row['mucdott_nb']) ? $check = 'checked="checked"' : $check = '';

	//kiểm tra bấm nút find-tìm kiếm

	if (isset($_POST['btn_find'])) { //cách này thường dùng khi bấm submit form ko dùng ajax

		$tg_tungay = $nv_Request->get_title('tg_tungay', 'get,post', 0);
		$datef = strtotime($tg_tungay);
		$fromdate = date("Y/m/d",  $datef);
		$tg_denngay = $nv_Request->get_title('tg_denngay', 'get,post', 0);
		$datet = strtotime($tg_denngay);
		$todate = date("Y/m/d",  $datet);
		$xtpl->assign('BC', array(
			'tungay' =>  $tg_tungay,
			'denngay' => $tg_denngay

		));

		$st = "SELECT masobc_a,kpbc,mota,thoigian,status,note FROM " . TABLE . "_voted_result_a
	WHERE DATE(thoigian) BETWEEN " . "'" . $fromdate . "'" . " and " . "'" . $todate . "' " . $filter_bc . "
	and status >=1 Order by thoigian desc";
	}
	else {

		if ($loaibc == 0) {
			$st = "SELECT masobc_a,kpbc,mota,thoigian,status,note FROM " . TABLE . "_voted_result_a
		WHERE status > 0 Order by thoigian desc";
			$filter_bc = "";
		} else {
			$st = "SELECT masobc_a,kpbc,mota,thoigian,status,note FROM " . TABLE . "_voted_result_a
		WHERE status= $loaibc
		Order by thoigian desc";
			$filter_bc = "AND status= $loaibc";
		}



	}
	//var_dump($st );
	

	$rows = $db->query($st)->fetchAll();
	foreach ($rows as $row) {
		$trangthai = '';
		switch ($row['status']) {
			case 1:
				$trangthai = 'Đã tiếp nhận';
				$class = 'label-inverse-primary';
				break;

			case 2:
				$trangthai = 'Đã duyệt';
				$class = 'label-inverse-warning';
				break;

			case 3:
				$trangthai = 'Đang phân tích';
				$class = 'label-inverse-success';
				break;

			case 4:
				$trangthai = 'Đã phản hồi';
				$class = 'label-danger';
				break;

			default:
				break;
		}
		$id = $id + 1;
		$input = $row['thoigian'];
		$date = strtotime($input);
		//$newDate = date("d/m/Y H:s:i",  $date);
		$newDate = date("d/m/Y H:s:i",  $date);
		$xtpl->assign('DSBC', array(
			'stt' => $id,
			'masobc' => $row['masobc_a'],
			'khoaphong' => $row['kpbc'],
			'ngaygio' => $newDate,
			'tomtatnd' => $row['mota'],
			'trangthai' => $trangthai,
			'note' => $row['note'],
			'class' => $class,

		));
		$xtpl->parse('main.DSBC');
	}
}


//kiểm tra khi bấm nút xóa
if ($nv_Request->get_title('act', 'get,post', '') == 'deletebc') {
	$num = $nv_Request->get_title('msbc', 'get,post', ''); //trả về rỗng nếu ko có giá trị 
	//kiểm tra khi submit form
	//cập nhật lại status = 0 //ẩn bc bị xóa
	//

	$st = "UPDATE " . TABLE . "_voted_result_a SET status =0 WHERE masobc_a=" . "'" . $num . "'";
	$row_id = $db->exec($st);

	$st = "UPDATE " . TABLE . "_voted_result_b SET status =0 WHERE masobc_b=" . "'" . $num . "'";
	$row_id = $db->exec($st);

	$ketqua['status'] = 'OK';
	$ketqua['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
	$ketqua['mess'] = ($row_id > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err'];
	$data[] = $ketqua;
	nv_jsonOutput($data);
	//die;
}



//kiểm tra msbc khi đúp vào dòng trong bảng chi tiết
if ($nv_Request->get_title('act', 'get,post', '') == 'hienmodal') {
	$num = $nv_Request->get_title('msbc', 'get,post', ''); //trả về rỗng nếu ko có giá trị 
	//kiểm tra khi submit form

	//dua vao danh sach khoa phong bang phan hoi bao cao
	$st = "SELECT * FROM " . TABLE . "_groupuser";
	// print($st2);
	$rows = $db->query($st)->fetchAll();
	foreach ($rows as $row) {
		// kiểm tra khoa phòng đã chọn có trong danh sách nhóm người dùng thì set thuộc tính selected   
		//(in_array($row['account'], $str2)) ? $row['selected'] = 'selected' : $row['selected'] = '';
		$xtpl->assign('department', $row);
		$xtpl->parse('main.department');
	}

	//kiểm tra khi bấm vào nút duyệt báo cáo
	if ($act = $nv_Request->get_title('sta2', 'get,post', '')) {
		//lấy các control tự động 
		$data = array();
		$st = "Select rows_numv,controlname,type_control FROM " . TABLE . "_voting_rows_a 
		Where status = 1 and issave = 1
		group by   rows_numv,controlname,type_control
		order by rows_numv asc ";
		$data = creat_st_table($st);
		$tencot = $data['tencot'];
		$values = $data['values'];
		$data['capnhat'] = date("Y-m-d H:i:s", time());
		$data['note_log'] = $user_info['username'] . ' cập nhật lúc ' . date("Y-m-d H:i:s", time());
		$data['status'] = 2; //duyệt báo cáo
		$values .= ',capnhat=' . "'" . $data['capnhat'] . "'";
		$values .= ',note_log=' . "'" . $data['note_log'] . "'";
		$values .= ',status=' . "'" . $data['status'] . "'";
		//cập nhật dữ liệu cho bảng thông tin báo cáo
		$st = "UPDATE " . TABLE . "_voted_result_a " . $values . " WHERE masobc_a=" . "'" . $num . "'";
		$row_id = $db->exec($st);


		//cập nhật dữ liệu phần B
		//cập nhật I nếu có
		//show data 
		$data = array();
		$mucdott_nb = $nv_Request->get_title('mucdott_nb', 'get,post', '');
		$values = 'SET mucdott_nb=' . "'" . $mucdott_nb . "'";
		$st = "UPDATE " . TABLE . "_voted_result_a " . $values . " WHERE masobc_a=" . "'" . $num . "'";
		//$row_id = $db->exec($st);
		//echo $st;
		//die;
		//----------------------------------------------------------------------------------------------
		//cập nhật II nếu có
		$st = "Select rows_numv,controlname,type_control FROM " . TABLE . "_voting_rows_b 
		Where  (rows_numv BETWEEN 3 AND 13)
		group by   rows_numv,controlname,type_control
		order by rows_numv asc ";
		//echo $st;
		//die;
		//var_dump($values);
		$data = creat_st_table($st);
		$st = "UPDATE " . TABLE . "_voted_result_a " . $values . " WHERE masobc_a=" . "'" . $num . "'";
		$row_id = $db->exec($st);
		//var_dump($data);
		//die;
		//$tencot = $data['tencot'];
		//$values = $data['values'];		

		//-------------------------------------------------------------------------------------------
		$st = "Select rows_numv,controlname,type_control FROM " . TABLE . "_voting_rows_b 
		Where status = 1
		group by   rows_numv,controlname,type_control		
		order by rows_numv asc ";
		//echo $st;
		$data = creat_st_table($st);
		$tencot = $data['tencot'];
		$values = $data['values'];
		//test get data
		//$test = $nv_Request->get_array('qtkt', 'get,post', '');

		$st = "UPDATE " . TABLE . "_voted_result_b " . $values . " WHERE masobc_b=" . "'" . $num . "'";
		//var_dump($st);
		$row_id = $db->exec($st);
		$ketqua['status'] = 'OK';
		$ketqua['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
		$ketqua['mess'] = ($row_id > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err'];
		//nv_jsonOutput($ketqua);
		//exit;

	}

	//kiểm tra khi bấm vào nút phân tích báo cáo
	if ($act = $nv_Request->get_title('sta3', 'get,post', '')) {
		//var_dump('act='.$act);
		//lấy các control tự động 
		$data = array();
		$st = "Select rows_numv,controlname,type_control FROM " . TABLE . "_voting_rows_b 
		Where status = 1		
		order by rows_numv asc ";
		$data = creat_st_table($st);
		$tencot = $data['tencot'];
		$values = $data['values'];
		$data['capnhat'] = date("Y-m-d H:i:s", time());
		$data['note_log'] = $user_info['username'] . ' cập nhật lúc ' . date("Y-m-d H:i:s", time());
		$data['status'] = 3; //phân tích báo cáo
		//convert datetime

		$values .= ',capnhat=' . "'" . $data['capnhat'] . "'";
		$values .= ',note_log=' . "'" . $data['note_log'] . "'";
		$values .= ',status=' . "'" . $data['status'] . "'";

		//cập nhật dữ liệu cho bảng phản hồi thông tin báo cáo B
		$st = "UPDATE " . TABLE . "_voted_result_b " . $values . " WHERE masobc_b =" . "'" . $num . "'";

		$row_id1 = $db->exec($st);

		//cập nhật dữ liệu cho bảng thông tin báo cáo A
		$st = "UPDATE " . TABLE . "_voted_result_a  SET status ='" . $data['status'] . "' 
		WHERE masobc_a='" . $num . "'";
		$row_id2 = $db->exec($st);
		$ketqua['status'] = 'OK';
		$ketqua['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
		$ketqua['mess'] = ($row_id1 > 0 && $row_id2 > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err'];
		//nv_jsonOutput($ketqua);
		//exit;

	}

	//kiểm tra khi bấm nút phản hồi báo cáo
	if ($act = $nv_Request->get_title('sta4', 'get,post', '')) {

		//var_dump ('act='.$act);
		//die;

		$st = "SELECT * FROM " . TABLE . "_groupuser";
		// print($st2);
		$rows = $db->query($st)->fetchAll();
		foreach ($rows as $row) {
			// kiểm tra khoa phòng đã chọn có trong danh sách nhóm người dùng thì set thuộc tính selected   
			//(in_array($row['account'], $str2)) ? $row['selected'] = 'selected' : $row['selected'] = '';
			$xtpl->assign('department', $row);
			$xtpl->parse('main.department');
		}
		$departments = $nv_Request->get_array('department', 'post,get', NULL);
		$noidung = $nv_Request->get_title('note', 'post,get', NULL);
		$str_dp =  implode(";", $departments);
		//var_dump($str_dp);
		$data_insert = array();
		$tencot = "(masobc,khoaphong,capnhat,note_log,noidung)";
		$values = " VALUES(:masobc,:khoaphong,:capnhat,:note_log,:noidung)";

		$data_insert['masobc'] = $num;
		$data_insert['khoaphong'] = $str_dp;
		$data_insert['capnhat'] = date("Y-m-d H:i:s", time());
		$data_insert['noidung'] = $noidung;
		$data_insert['note_log'] = $user_info['username'] . ' cập nhật lúc ' . date("Y-m-d H:i:s", time());
		$st = "INSERT INTO " . TABLE . "_voted_total " . $tencot . ' ' . $values;
		//var_dump($st);
		//die;
		$row_id = $db->insert_id($st, 'id', $data_insert);


		//Thêm dữ liệu vào bảng notification
		$data_insert = array();
		//lấy ra user đăng nhập	
		$tencot = "(masobc,nguoigui,nguoinhan,tg_gui,tg_nhan,tieude,noidung)";
		$values = " VALUES(:masobc,:nguoigui,:nguoinhan,:tg_gui,:tg_nhan,:tieude,:noidung)";
		$data_insert['masobc'] = $num;
		$data_insert['nguoigui'] = $user_info['username'];
		$data_insert['tg_gui'] = $data_insert['tg_nhan']  = date("Y-m-d H:i:s", time());
		$data_insert['noidung'] = $noidung;
		$data_insert['tieude'] = 'Thông báo phản hồi báo cáo mã số ' . $num;
		foreach ($departments as $dp) {

			$data_insert['nguoinhan'] = $dp;
			$st = "INSERT INTO " . TABLE . "_voted_notification " . $tencot . ' ' . $values;
			$row_id = $db->insert_id($st, 'id', $data_insert);
		}

		//cập nhật trạng thái cho 2 bảng kia....
		//update trạng thái cho bảng vote_result a
		//cập nhật dữ liệu cho bảng thông tin báo cáo A
		$data['status'] = 4; //trạng thái đã gửi phản hồi

		$st = "UPDATE " . TABLE . "_voted_result_a  SET status ='" . $data['status'] . "' 
		WHERE masobc_a='" . $num . "'";
		$row_id = $db->exec($st);

		//cập nhật dữ liệu cho bảng thông tin báo cáo B
		$st = "UPDATE " . TABLE . "_voted_result_b  SET status ='" . $data['status'] . "' 
		WHERE masobc_b='" . $num . "'";
		$row_id = $db->exec($st);
	}


	//tạo câu lệnh lấy nội dung trong form theo tên cột và giá trị tự động
	//-----------------------------------------------------------------------------------------------------------------------
	// DS BÁO CÁO PHÂN TÍCH, PHẢN HỒI- BC B
	//PHẦN B:
	//I.


	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b ='$num'";
	$st1 = "Select * FROM " . TABLE . "_voting_b where status = 1 and numv = 1 order by numv asc  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMPHSC1', 'CH_PHSC1');

	//II.
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b ='$num'";
	$st1 = "Select * FROM " . TABLE . "_voting_b where status = 1 and (numv BETWEEN 2 AND 13)  order by numv asc  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMPHSC2', 'CH_PHSC2');

	//III.
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b ='$num'";
	$st1 = "Select * FROM " . TABLE . "_voting_b where status = 1 and numv = 14  order by numv asc  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMPHSC3', 'CH_PHSC3');


	//IV. PHÂN LOẠI THEO NHÓM NGUYÊN NHÂN GÂY RA SỰ CỐ
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b = '$num'";
	$st1 = "SELECT * FROM " . TABLE . "_voting_b WHERE status = 1 
	AND (numv BETWEEN 16 AND 21) 	
	ORDER BY numv ASC  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMPHSC4', 'CH_PHSC4');


	//V. HÀNH ĐỘNG KHẮC PHỤC SỰ CỐ
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b = '$num'";
	$st1 = "SELECT * FROM " . TABLE . "_voting_b WHERE status = 1 
	AND numv = 22 	
	ORDER BY numv ASC  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMPHSC5', 'CH_PHSC5');


	//VI. ĐỀ XUẤT KHUYẾN CÁO ĐÈ PHÒNG SỰ CỐ
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b = '$num'";
	$st1 = "SELECT * FROM " . TABLE . "_voting_b WHERE status = 1 
	AND numv = 23 	
	ORDER BY numv ASC  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMPHSC6', 'CH_PHSC6');


	//PHẦN B:
	//I. ĐÁNH GIÁ CỦA TRƯỞNG NHÓM CHUYÊN GIA
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b = '$num'";
	$st1 = "SELECT * FROM " . TABLE . "_voting_b WHERE status = 1 
	AND (numv BETWEEN 25 AND 28)  	
	ORDER BY numv ASC  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMCGSC1', 'CH_CGSC1');


	//II. ĐÁNH GIÁ MỨC ĐỘ TỔN THƯƠNG
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b = '$num'";
	$st1 = "SELECT * FROM " . TABLE . "_voting_b WHERE status = 1 
	AND numv >= 29  	
	ORDER BY numv ASC  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMCGSC2', 'CH_CGSC2');



	//----------------------------------------------------------------------------------------------------------------------------
	//DANH SÁCH THÔNG TIN BÁO CÁO GỬI ĐẾN-BÁO CÁO A GỒM 2 BẢNG GỘP VS NHAU

	//BẢNG  A1

	//test tạo bảng nhóm câu hỏi tự động  (modalA)
	//PHẦN B: Câu 1-22 của bảng A


	$st = "Select * FROM " . TABLE . "_voted_result_a where status >= 1 
	and masobc_a ='$num'";
	$st1 = "Select * FROM " . TABLE . "_voting_a where status = 1 and numv <=22 order by numv asc  ";
	$tbl_st2 = "voting_rows_a";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMCAUHOI', 'CAUHOI');

	//PHẦN B: Câu 1-22 của bảng A
	//I. Đánh giá mức độ tổn thương nguòi bệnh	
	$mucdott_nb = array();
	//kiểm tra câu trả lời trong bảng resul_a
	$st = "Select * FROM " . TABLE . "_voted_result_a where status >= 1 
	and masobc_a ='$num'";
	$r = $db->query($st)->fetch();
	//var_dump($r['mucdott_nb']);
	$checkA = '';
	$checkB = '';
	$checkC = '';
	$checkD = '';
	$checkE = '';
	$checkF = '';
	$checkG = '';
	$checkH = '';
	$checkI = '';

	switch ($r['mucdott_nb']) {
		case 'A':
			$checkA = 'checked="checked"';
			break;

		case 'B':
			$checkB = 'checked="checked"';
			break;

		case 'B':
			$checkB = 'checked="checked"';
			break;

		case 'C':
			$checkC = 'checked="checked"';
			break;

		case 'D':
			$checkD = 'checked="checked"';
			break;

		case 'E':
			$checkF = 'checked="checked"';
			break;

		case 'G':
			$checkG = 'checked="checked"';
			break;

		case 'H':
			$checkH = 'checked="checked"';
			break;

		case 'I':
			$checkI = 'checked="checked"';
			break;


		default:

			break;
	}

	$xtpl->assign('MUCDOTT_NB', array(
		'CHECKA' => $checkA,
		'CHECKB' => $checkB,
		'CHECKC' => $checkC,
		'CHECKD' => $checkD,
		'CHECKE' => $checkE,
		'CHECKF' => $checkF,
		'CHECKG' => $checkG,
		'CHECKH' => $checkH,
		'CHECKI' => $checkI,


	));


	$st = "Select * FROM " . TABLE . "_voted_result_a where status >= 1 
	and masobc_a = '$num'";
	$st1 = "SELECT * FROM " . TABLE . "_voting_b WHERE status = 1 
	AND numv = 29  	
	ORDER BY numv ASC  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMA1', 'CH_NHOMA1');
	//-------------------------------------------------------------------------

	//II. PHÂN LOẠI THEO NHÓM SỰ CỐ (INCIDENT TYPE)
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b = '$num'";

	$st1 = "SELECT * FROM " . TABLE . "_voting_b WHERE status = 1 
	AND (numv BETWEEN 2 AND 13) 	
	ORDER BY numv ASC  ";
	$tbl_st2 = "voting_rows_b";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMCAUHOI2B', 'CAUHOI2B');

	//III. PHÂN LOẠI THEO NHÓM NGUYÊN NHÂN GÂY RA SỰ CỐ
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
	and masobc_b = '$num'";

	$st1 = "SELECT * FROM " . TABLE . "_voting_b WHERE status = 1 
	AND (numv BETWEEN 16 AND 21) 	
	ORDER BY numv ASC  ";
	$tbl_st2 = "voting_rows_b";

	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMCAUHOI3B', 'CAUHOI3B');

	//IV.

	$st = "Select * FROM " . TABLE . "_voted_result_a where status >= 1 
and masobc_a ='$num'";

	$st1 = "Select * FROM " . TABLE . "_voting_a where status = 1 and numv >23 order by numv asc  ";
	$tbl_st2 = "voting_rows_a";
	$stt = 0;
	create_group_tbl($st, $st1, $tbl_st2, $stt, 'NHOMCAUHOI4B', 'CAUHOI4B');
	//HẾT BẢNG A


	$xtpl->assign('MABC', $num);
	//Khóa các trạng thái của các nút nhấn
	$xtpl->assign('TT', array(
		'DUYET' => '',
		'TTDUYET' => 'Duyệt',
		'TTPHANTICH' => 'Phân tích',
		'TTPHANHOI' => "Phản hồi",
		'PHANTICH' => 'disabled',
		'PHANHOI' => 'disabled'
	));



	$test = '';
	//kiểm tra trạng thái báo cáo //duyệt, tiếp nhận, phân tích....
	switch ($r['status']) {
		case 1: //tiep nhan			
			$xtpl->assign('TT', array(
				'DUYET' => '',
				'TTDUYET' => 'Duyệt BC',
				'TTPHANTICH' => 'Phân tích',
				'TTPHANHOI' => "Phản hồi",
				'PHANTICH' => 'disabled',
				'PHANHOI' => 'disabled'
			));
			break;
		case 2: //duyet, bổ sung thêm dòng trạng thái
			$xtpl->assign('TT', array(
				'DUYET' => '',
				'TTDUYET' => 'Đã Duyệt',
				'TTPHANTICH' => 'Phân tích',
				'TTPHANHOI' => "Phản hồi",
				'PHANHOI' => 'disabled'
			));
			break;
		case 3: //phan tich, bổ sung thêm dòng trạng thái
			$xtpl->assign('TT', array(
				'DUYET' => 'disabled',
				'TTDUYET' => 'Đã Duyệt',
				'TTPHANTICH' => 'Đã phân tích',
				'PHANTICH' => '',
				'TTPHANHOI' => "Phản hồi",
				'PHANHOI' => ''
			));
			break;
		case 4: //gui bao cao
			$xtpl->assign('TT', array(
				'TTDUYET' => 'Đã Duyệt',
				'TTPHANTICH' => 'Đã phân tích',
				'TTPHANHOI' => 'Đã gửi phản hồi',
				'DUYET' => 'disabled',
				'PHANTICH' => 'disabled',
				'PHANHOI' => 'disabled'
			));
			break;
		default:
			$test = '';
			break;
	}
}
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
$xtpl->assign('THEME_URL', THEME_URL);
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

//tạo câu lệnh dữ liệu tự động theo tên cột và giá trị


//tạo controls trên form
function create_control($row, $id, $group, $value)
{
	global $db, $xtpl;
	$row['title'] = trim($row['title']);
	$row['title'] = ltrim($row['title']);
	$row['title'] = rtrim($row['title']);
	switch ($row['type_control']) {
		case 'text':

			$form_control = '
			<div class="mb-3">
		  <label class="form-label">' . $row['title'] . '</label>
		  <input type="text" class="form-control" class="form-control form-control-lg"
		  id="idtext' . $id . '" name="' . $row['controlname'] . '" 
		  value="' . $value[$row['controlname']] . '" />
		 
		 
		</div>';
			break;

		case 'radio':
			//lấy các giá trị trong cột value đưa vào radio
			$arr = $row['value'];
			$arr = explode(';', $arr);
			$form_control = '<td>
			<label class="form-label">' . $row['title'] . '</label>
			</td><td>
			';
			//echo count($arr);

			foreach ($arr as $r) {
				//.=  in ra nhiều control trên form
				//kiểm tra giá trị radio trong bảng két wả
				($value[$row['controlname']] == $r) ? $check = 'checked="checked"' : $check = '';

				$form_control .= '                    
				<div class="form-check form-check-inline">                     
				<input class="form-check-input" type="radio" name="' . $row['controlname'] . '" id="idradio' . $id . '" value="' . $r . '" ' . $check . '
				>
				<label class="form-check-label" for="radio' . $id . '" >' . $r . '</label>
			  </div>';
			}
			$form_control .= '</td>';

			break;

		case 'radiol':

			//lấy các giá trị trong cột value đưa vào radio
			$arr = $row['value'];
			$arr = explode(';', $arr);
			$form_control = '<tr><td>
			<label class="form-label">' . $row['title'] . '</label>
			</td></tr><tr ><td > <div class="container">
			<ul class="radio-list">
			';


			//echo count($arr);

			foreach ($arr as $r) {
				//.=  in ra nhiều control trên form
				//kiểm tra giá trị radio trong bảng két wả
				($value[$row['controlname']] == $r) ? $check = 'checked="checked"' : $check = '';
				$r = trim($r);
				$r = ltrim($r);
				$r = rtrim($r);


				$form_control .= '                    
				
				<li class="radio-item">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="scpt" id="idradiog1" value="">
					<label class="form-check-label" for="radio' . $id . '" >' . trim($r) . '</label>
				</div>
				</li>					
			';
			}
			$form_control .=  '</ul></div></td></tr>';

			break;

		case 'radiog':

			($value[$row['controlname']] == $row['title']) ? $check = 'checked="checked"' : $check = '';
			//echo '<br>'. $check;


			($id = 35) ? $radiochange = "handleRadioChange(event)" : $radiochange = "";
			$form_control = '<td>                     
				<div class="flex form-check ">                     
				<input  class="form-check-input" type="radio" name="' . $row['controlname'] . '" id="idradiog' . $id . '" 
				onchange="' . $radiochange . '" value="' . $row['title'] . '" ' . $check . '
				data-next-button="#nextbutton' . $group['numv'] . '">
				<label class="form-check-label" for="radiog' . $id . '" >' . $row['title'] . '</label>
			  </div>
			  </td>';
			break;

		case 'textarea':
			$form_control = ' <td><textarea id="idtextarea' . $id . '" name="' . $row['controlname'] . '" rows="3" 
				class="form-control">' . $value[$row['controlname']] . '</textarea></td>';
			break;


		case 'listkp':
			//tạo list danh sách khoa phòng
			$st1 = "SELECT * FROM " . TABLE . "_groupuser where status = 1 order by tenkhoa";
			//print $st1;
			$rows = $db->query($st1)->fetchAll();
			$form_control = '<td> <label class="form-label">' . $row['title'] . '</label> </td><td>
			<select id="khoaphong"  name="' . $row['controlname'] . 'class="form-control" style="height: 20px;" placeholder="Chọn Khoa/Phòng"
			title="" data-toggle="tooltip" data-original-title="Chọn Khoa/Phòng">
			<option value="" disabled selected>Chọn Khoa/Phòng</option>';


			foreach ($rows as $r) {
				//echo $value[$row['controlname']].'<br>';
				($value[$row['controlname']] == $r['tenkhoa']) ? $select = 'selected' : $select = '';
				$form_control .= '<option value="' . $r['tenkhoa'] . '"' . $select . '>' . $r['tenkhoa'] . '</option>';
			}
			$form_control .= '</select></td>';
			break;

		case 'check':
			($value[$row['controlname']] == $row['title']) ? $check = 'checked' : $check = '';
			//kiểm tra nút nhấn camkết, và xác nhận tt
			($group['numv'] == '1' || $group['numv'] == '22') ? $check = 'checked' : '';
			$form_control = '<td>
		   
			<div class="form-check2">
			
			<input class="form-check-input2" type="checkbox" name="' . $row['controlname'] . '" id="idcheck' . $id . '" value="' . $row['title'] . '" ' . $check . '  >
			<label class="form-check-label2" for="idcheck' . $id . '">'
				. $row['title'] . '
			</label>
		  </div></td>';
			break;

		case 'checkg':

			$id_checkbut = "'" . 'idcheckbut' . $group['numv'] . "'";
			$ctrname = "'" . $row['controlname'] . "'";
			$name_crt = $row['controlname'] . '[]';
			$form_control = '';
			$arr = $value[$row['controlname']];
			$arr = explode(';', $arr);
			//echo($value[$row['controlname']]).'-------------'.$row['title'].'<br>';

			if (in_array($row['title'], $arr)) {
				//echo $group['numv'].$group['question'].'-------'. $row['title'].'=========='.$value[$row['controlname']].'<br>';

				$form_control = '<td>                   
				<div class="form-check2">
				<input  class="form-check-input2" type="checkbox" 
				 name="' . $name_crt . '" id="idcheck' . $id . '" value="' . $row['title'] . '" checked   >
				<label class="form-check-label2" for="idcheck' . $id . '">'
					. $row['title'] . '
				</label>
			  </div></td>';
			} else {
				$form_control = ' <td>                   
				<div class="form-check2">
				<input  class="form-check-input2" type="checkbox" 
				 name="' . $name_crt  . '" id="idcheck' . $id . '" value="' . $row['title'] . '"    >
				<label class="form-check-label2" for="idcheck' . $id . '">'
					. $row['title'] . '
				</label>
			  </div></td>';
			}

			break;

		case 'datetime':
			$form_control = '<td> 
		
			<div class="mb-3"> 
			<label class="form-label">' . $row['title'] . '</label>
				<input  class="form-control" type="text" id="' . $row['controlname'] . '" name="' . $row['controlname'] . '" 
				value="' . $value[$row['controlname']] . '"
				placeholder="Thời gian báo cáo" />
				</div></td>';
			break;

		case 'date':
			$form_control = '
			<div class="mb-3"> 
			<label class="form-label">' . $row['title'] . '</label>             
						
			<input  class="form-control" type="text" name="' . $row['controlname'] . '" 
			id="datepicker" value="' . $value[$row['controlname']] . '" />
			</div>';
			break;

		case 'phone':
			$form_control = '
                    <div class="mb-3"> 
                    <label  class="form-label">' . $row['title'] . '</label>                        
                                
                    <input   type="text" maxlength="10" oninput="check_number(event)" placeholder="Nhập số điện thoại"  class="form-control form-control-lg"  
                    id="' . $row['controlname'] . '" value="' . $value[$row['controlname']] . '"
                    name="' . $row['controlname'] . '"  />
                    <p>
                    <p id="error-message"  style="color: red;"></p>
                    </div>';
			break;

		case 'textname':
			$form_control = '
                        <div class="mb-3"> 
                        <label  class="form-label">' . $row['title'] . '</label>                                                         
                        <input   type="text" maxlength="50" oninput="check_alpha(event)" 
						value="' . $value[$row['controlname']] . '"  class="form-control form-control-lg"  
                        id="' . $row['controlname'] . '" name="' . $row['controlname'] . '"  />                                            
                        </div>';
			break;




		default:
			$form_control = '';
	}
	return $form_control;
}


//function tạo tự động dữ liệu từ control form theo tên cột 
function creat_st_table($st)
{
	global $db, $nv_Request;
	$rows = $db->query($st)->fetchAll();
	$tencot = "(";
	$values = "SET ";
	$data_insert = array();

	foreach ($rows as $row) {
		//dua vào mảng control
		//kiểm tra mảng checkg

		$post[$row['controlname']] = $nv_Request->get_title($row['controlname'], 'post,get');
		if ($row['type_control'] == 'checkg') {
			$arr = $nv_Request->get_array($row['controlname'], 'post,get');

			$str_checked = implode(';', $arr);


			$post[$row['controlname']] = $str_checked;
		}

		empty($post[$row['controlname']]) ?  $post[$row['controlname']] = NULL : '';
		empty($post[$row['controlname']]) ?  $data_insert[$row['controlname']] = NULL : $data_insert[$row['controlname']] = $post[$row['controlname']];

		//kiểm tra kiểu dữ liệu ngày tháng năm
		if ($row['controlname'] == 'ngaygiott') {
			// Create a DateTime object by parsing the input date string
			$dateString = $post[$row['ngaygiott']];

			// Convert date string to DateTime object
			$dateTime = DateTime::createFromFormat('d/m/Y H:i:s A', $dateString);

			if ($dateTime !== false) {
				// Format DateTime object to MySQL datetime format
				$formattedDate = $dateTime->format('Y-m-d H:i:s'); // Use "H" for 24-hour format

				// Now you can use $formattedDate to insert into your MySQL database
				$post[$row['controlname']] = $formattedDate;
				//echo 'MASOBC: '.$data_insert['masobc_a'].'---' . $formattedDate;
			} else {
				$post[$row['controlname']] = date("Y-m-d H:i:s", time());
				//echo 'MASOBC: '.$data_insert['masobc_a'].'---' . $data_insert['thoigian'];
			}
		}
		//var_dump($data_insert['ngaygiott'].'</br>');

		//echo $row['controlname'] . '=' . $post[$row['controlname']] . '<br>';
		$tencot = $row['controlname'];
		empty($post[$row['controlname']]) ? '' : $values .= $tencot . '=' . "'" . $post[$row['controlname']] . "',";
	}
	//$tencot = rtrim($tencot, ',') . ")";
	$values = rtrim($values, ',');
	return ['tencot' => $tencot, 'values' => $values, 'data' => $data_insert];
}


//function creat nhomcauhoi, cauhoituong ung

function create_group_tbl($st, $st1, $tbl_st2, $stt, $tennhom, $tencauhoi)
{
	global $db, $xtpl;

	//$st = "Select * FROM " . TABLE . "_voted_result_a where status >= 1 
	//and masobc_a ='$num'";
	//echo $st;
	$value = $db->query($st)->fetch();
	//echo $value['hotenbn'];

	//$st1 = "Select * FROM " . TABLE . "_voting_a where status = 1 and numv <=22 order by numv asc  ";
	//lấy ra danh sách tên cột
	//echo $st1;
	$id = 0; //lưu lại số lượng các câu hỏi trong 1 lần khảo sát

	$groups = $db->query($st1)->fetchAll();
	$stt = 0;


	foreach ($groups as $group) {
		$stt = $stt + 1;



		//echo 'modal=' . $group['numv'] . '----p=' . $stt0 . '---n=' . $stt1 . '<br>';
		//lấy ra cau hoi tương ứng vs nhóm câu hỏi
		$st2 = "Select * FROM " . TABLE . "_" . $tbl_st2 . "
		WHERE status = 1 and rows_numv =" . $group['numv'] . "
		";
		$rows = $db->query($st2)->fetchAll();
		$xtpl->assign(
			$tennhom,
			array(
				'tennhom' => $group['question'],
				'stt' => $stt,
				'vid' => $group['vid'],
				'display' => 'display: none'
			)
		);

		//echo $group['numv'].'. '.$group['question'].':';
		foreach ($rows as $row) {
			//kiểm tra loại control để tạo tự động trong modal form
			//echo '<br>';
			//echo '----'.$row['v_id'].'. '.$row['title'].':';
			$id++;
			//tao control trên form
			$form_control = create_control($row, $id, $group, $value);


			$xtpl->assign($tencauhoi, array(
				'title' => $row['title'],
				'type_control' => $row['type_control'],
				'form_control' => $form_control,
				'value' => $row['value']

			));
			$xtpl->parse('main.' . $tennhom . '.' . $tencauhoi);

			//echo $row['type_control'].'|';
		}
		$xtpl->parse('main.' . $tennhom);
		$xtpl->parse('main.DS');
		//echo '<br>';
	}
}
