<?php

/**
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
if (isset($_POST['addRow'])) {
	$row = $_POST['addRow'];
	//lưu ý giá trị trả về là mảng 2 chiều
	$name = $row['name'];
	$postion = $row['position'];
	$id =  $row['id'];
	$st = "INSERT INTO " . TABLE . "_evaluation_member (id_evaluation_member, full_name, position) VALUES (NULL, :full_name, :position)";
	$data_insert = array();
	$data_insert['full_name'] = $name;
	$data_insert['position'] = $postion;
	$res = ($db->insert_id($st, 'id_evaluation_member', $data_insert));    
	// print_r($res);
}



// cập nhật thành viên
if (isset($_POST['saveRow'])) {
	$row = $_POST['saveRow'];
	$name = $row['name'];
	$postion = $row['position'];
	$id =  $row['id'];
	// Update to database
	$st = "UPDATE " . TABLE . "_evaluation_member SET full_name='" . $name . "',  position ='" . $postion . "' WHERE id_evaluation_member= " . $id . "";
	$count = $db->exec($st);
}

//xóa thành viên 
if (isset($_POST['deleteRow'])) {
	$row = $_POST['deleteRow'];
	$id =  $row['id'];
	$st = "Delete FROM " . TABLE . "_evaluation_member WHERE id_evaluation_member= " . $id . "";
	$count = $db->exec($st);
	// print($st);
}

$sta = $nv_Request->get_title('sta', 'get,post', '');
if ($sta == 'khoitaochitieu') {
	$checkss = $nv_Request->get_title('checkss', 'get,post', '');
	$key = md5($client_info['session_id'] . $global_config['sitekey']);
	//if ($checkss!=$key) {die('Stop!!!');}

	$data = array();
	$ketqua = array();
	$err = 0;
	$step = 0;
	$namkhoitao = $nv_Request->get_int('nam', 'get,post', 0);
	if ($namkhoitao == 0) {
		$ketqua['status'] = 'err';
		$ketqua['mess'] = ++$err . '.' . $lang_module['error'];
		nv_jsonOutput($ketqua);
		exit;
	} else //Check đã có tồn tại?
	{
		$sql = 'SELECT * FROM ' . TABLE . '_setup where year=' . $namkhoitao;
		$kq = $db->query($sql)->fetch();
		if (!empty($kq)) {
			$ketqua['status'] = 'err';
			$ketqua['mess'] = ++$err . '.' . $lang_module['error_apdung'];
			nv_jsonOutput($ketqua);
			exit;
		}
	}
	if ($err == 0) {
		/* 	_question_2022 	  		
				_question_type_2022 	
				_report_2022 	  		
				_report_details_2022 */

		$st = "CREATE TABLE IF NOT EXISTS  " . TABLE . "_question_type_" . $namkhoitao . " LIKE " . TABLE . "_question_type_y;    
			INSERT IGNORE INTO " . TABLE . "_question_type_" . $namkhoitao . " SELECT * FROM " . TABLE . "_question_type_y";
		// print($st);
		$count = $db->exec($st);
		// // Tạo bảng câu hỏi theo năm        
		$st = "CREATE TABLE IF NOT EXISTS " . TABLE . "_question_" . $namkhoitao . " LIKE " . TABLE . "_question_y;    
			INSERT IGNORE INTO " . TABLE . "_question_" . $namkhoitao . " SELECT * FROM " . TABLE . "_question_y";
		// print($st);
		$count = $db->exec($st);

		// // Tạo bảng kỳ đánh giá theo năm
		$st = "CREATE TABLE IF NOT EXISTS " . TABLE . "_evaluation_" . $namkhoitao . " LIKE " . TABLE . "_evaluation_y";

		// print($st);
		$count = $db->exec($st);


		// Tạo bảng biểu mẫu báo cáo theo năm
		$st = "CREATE TABLE IF NOT EXISTS " . TABLE . "_report_" . $namkhoitao . " LIKE " . TABLE . "_report_y;    
			INSERT IGNORE INTO " . TABLE . "_report_" . $namkhoitao . " SELECT * FROM " . TABLE . "_report_y";
		// print($st);
		$count = $db->exec($st);

		// Tạo bảng biểu mẫu báo cáo chi tiet theo năm
		$st = "CREATE TABLE IF NOT EXISTS " . TABLE . "_report_details_" . $namkhoitao . " LIKE " . TABLE . "_report_details_y";
		$count = $db->exec($st);

		$stmt = $db->prepare("Update " . TABLE . "_setup set set_default=0")->execute();

		$sql = "INSERT INTO " . TABLE . "_setup (id_setup,year,set_default,is_locked) VALUES (NULL, " . $namkhoitao . ", '1', '1');";
		$stmt = $db->prepare($sql)->execute();

		//if ($row_id>0) nv_redirect_location(MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=content');
		$ketqua['status'] = 'OK';
		$ketqua['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
		$ketqua['mess'] = ($stmt > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err'];
		//	
	}



	nv_jsonOutput($ketqua);
	exit;
}

if ($sta == 'del_item') {
	$token = $nv_Request->get_title('token', 'get,post', '');
	$key = explode('_', $token);
	if ($key[0] != md5($client_info['session_id'] . $user_info['username'])) die('Stop!!!');
	$note = $user_info['username'] . ' Delete by ' . date('d/m/Y H:i');
	$sql = 'Update ' . TABLE . '_report_' . $key[1] . " set status=0, note='$note' where status=1 and id=" . $key[2];
	$stmt = $db->prepare($sql);

	$row_id = $stmt->execute();
	if ($row_id > 0) $ketqua = 'OK_' . $row_id;
	else $ketqua = 'ERR_' . $lang_module['update_err'];
	echo $ketqua;
	exit;
}

if ($sta == 'default_item') {
	$token = $nv_Request->get_title('token', 'get,post', '');
	$key = explode('_', $token);
	if ($key[0] != md5($client_info['session_id'] . $user_info['username'])) die('Stop!!!');
	$stmt = $db->prepare("Update " . TABLE . "_setup set set_default=0")->execute();

	$sql = 'Update ' . TABLE . '_setup set set_default=1 where year=' . $key[1];
	$stmt = $db->prepare($sql);
	$row_id = $stmt->execute();
	if ($row_id > 0) $ketqua = 'OK_' . $row_id;
	else $ketqua = 'ERR_' . $lang_module['update_err'];
	echo $ketqua;
	exit;
}



// Kiểm tra thông tin cập nhật lần đánh giá
// $url= $_SERVER['REQUEST_URI'];
// print($url);


$post['sta2'] = $nv_Request->get_title('sta2', 'get,post', '');
if (!empty($post['sta2'])) {
	// print('up=' . $update);
	// print('thông tin='.$sta2);
	// cập nhật dữ liệu vào các bảng khởi tạo lần đánh giá evaluation_y
	$post['from_date'] = $nv_Request->get_title('from_date', 'get,post', '');
	$post['to_date'] = $nv_Request->get_title('to_date', 'get,post', '');
	$post['teams'] = $nv_Request->get_array('teams', 'get,post', '');
	$teams =  implode(";", $post['teams']);
	$post['evaluation_type'] = $nv_Request->get_title('evaluation_type', 'get,post', '');
	$post['name_content'] = $nv_Request->get_title('name_content', 'get,post', '');

	// Lấy thông tin năm và lần đánh giá
	$arr = explode('_', $post['sta2']);
	$get['year'] = $arr[0];
	$get['count_evaluation'] = $arr[1];

	$post['token2'] = $nv_Request->get_title('token2', 'get,post', '');
	if (empty($post['token2'])) {
		// $update = True;

		//Thêm mới dữ  liệu

		$st = "INSERT INTO " . TABLE . "_evaluation_" . $get['year'] . " 
		(id, count_evaluation, from_date, to_date,teams, evaluation_type, content, status)
		VALUES (NULL, :count_evaluation, :from_date, :to_date,:teams, :evaluation_type, :content, :status)";
		$data_insert = array();
		$data_insert['count_evaluation'] = $get['count_evaluation'];
		$data_insert['from_date'] = $post['from_date'];
		$data_insert['to_date'] = $post['to_date'];
		$data_insert['teams'] = $teams;
		$data_insert['content'] = $post['name_content'];
		$data_insert['evaluation_type'] = $post['evaluation_type'];
		$data_insert['status'] = 1;

		$res = ($db->insert_id($st, 'id', $data_insert));

		// Test thông tin xuất ra thông báo ($lang_module['yeucau_ok']  )	
		$yc = implode(",", $data_insert);
		// $lang_module['yeucau_err'] = $st;
		// var_dump($st);
		// $lang_module['yeucau_ok'] = $update;


		// print($get['year']);
	} else {
		// cập nhật dữ liệu
		$st = "UPDATE " . TABLE . "_evaluation_" . $get['year'] .
			" SET evaluation_type ='" . $post['evaluation_type'] . "',		 
		 teams = '" . $teams . "',	
		 from_date= '" . $post['from_date'] . "',
		 to_date= '" . $post['to_date'] . "',		
		content ='" . $post['name_content'] . "'	
	    WHERE count_evaluation =" . $get['count_evaluation'];
		$res = $db->exec($st);


		//cập nhật dữ liệu vào bảng report_details theo năm
		$st2 = "UPDATE " . TABLE . "_report_details_" . $get['year'] .
			" SET evaluation_type ='" . $post['evaluation_type'] . "',		 
		 arr_team = '" . $teams . "',	
		 from_date= '" . $post['from_date'] . "',
		 to_date= '" . $post['to_date'] . "',		
		content ='" . $post['name_content'] . "'	
	    WHERE count =" . $get['count_evaluation'];
		$res2 = $db->exec($st2);

		// $lang_module['yeucau_ok'] = $st2;
		// $lang_module['yeucau_err'] = $st2;



	}

	$ketqua['status'] = 'OK';
	$ketqua['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
	$ketqua['mess'] =  ($res > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err'];
	nv_jsonOutput($ketqua);



	// print($st);
}



$thongke = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);

/*Code for Here*/

$get['id_year'] = $nv_Request->get_title('year', 'get');

$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
$xtpl->assign('sta', 'khoitaochitieu');
$nam = date('Y');
for ($i = $nam - 2; $i <= $nam + 2; $i++) {
	$xtpl->assign('r', array(
		'id' => $i,
		'name' => 'Khởi tạo bộ đánh giá năm ' . $i,
		'select' => (date('Y') == $i) ? ' selected="selected"' : ''
	));
	$xtpl->parse('main.nam');
}

// add vào danh sách năm đã khởi tạo
$sql = "Select * FROM " . TABLE . "_setup ORDER BY year ASC";
$rows = $db->query($sql)->fetchAll();
$i = 0;
$namapdung = 0;
foreach ($rows as $row) {
	//truyền biến vào vòng lặp
	// check năm mặc định
	if ($row['set_default'] == 1) $namapdung = $row['year'];
	$row['class'] = ($row['set_default'] == 1) ? 'btn btn-success' : 'btn btn-success btn-outline-success';

	$xtpl->assign('link_year', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&year=' . $row['year']);
	$xtpl->assign('setup', $row);
	$xtpl->parse('main.dsbieumau.setup');
}

$xtpl->parse('main.dsbieumau');

//Get giá trị link year khi bấm vào từng năm
if (empty($get['id_year'])) {
	$sql = "Select year FROM " . TABLE . "_setup where set_default=1";
	$default = $db->query($sql)->fetch();
	if (!empty($default)) $get['id_year'] = $default['year'];
}

if ($get['id_year'] > 0) {
	//$sql = "Select * FROM " . TABLE . "_setup WHERE year = " . $get['id_year'] . "";

	// kiem tra link chọn lần đánh giá
	$get['view_id'] = $nv_Request->get_title('view_id', 'get,post', '');
	if (!empty($get['view_id'])) {
		$get['view_id'] = $nv_Request->get_title('view_id', 'get,post', '');
		$arr = explode('_', $get['view_id']);
		$get['year'] = $arr[0];
		$get['count_evaluation'] = $arr[1];

		$xtpl->assign('hien_bieumau', '');
		$xtpl->assign('landanhgia', $get['count_evaluation']);
		// Đưa giữ liệu vào biến sta giữ lại năm và lần đánh giá
		$xtpl->assign('sta2', $get['year'] . '_' . $get['count_evaluation']);


		$st = "SELECT * FROM " . TABLE . "_evaluation_" . $get['year'] . " 
		WHERE count_evaluation = " . $get['count_evaluation'];

		$row_update =  $db->query($st)->fetch();
		if (!empty($row_update['id'])) {
			$update = True;
			// Kiểm tra dữ liệu tồn tại kỳ đánh giá gán giá trị là cập nhật cho token2
			$xtpl->assign('token2', 'update');
		}
		// print('up=' . $update);



		// Lấy thông tin id_report
		// $st= 

		// print('account_view=' .$get['count_report'] .'----');
	} else $xtpl->assign('hien_bieumau', 'hidden');

	// if (empty($get['count_evaluation'])) $get['count_evaluation'] =1;
	// $st =  "Select *  FROM " . TABLE . "_report_details_" . $get['id_year'] . " where count =". $get['count_evaluation'];
	// //echo $st;
	// $rs = $db->query($st)->fetchAll();
	// for ($i=0; $i <count($rs);$i++)
	// {
	// 	$account[$i] = $rs[$i]['account_report'];
	// 	$status [$i] = $rs[$i]['status'];

	// }
	//echo 
	//print_r($status);


	$sql = "Select * FROM " . TABLE . "_report_" . $get['id_year'] . " where status = 1";
	$rows = $db->query($sql)->fetchAll();
	$tt = 0;
	
	foreach ($rows as $row) {
		$row['stt'] = ++$tt;
		$dskhoa = explode(';', $row['view_report']);
		for ($i = 0; $i < count($dskhoa); $i++) {
			$j=100;
			//check trạng thái đánh giá của khoa phòng
			$khoaphong['khoa']=$dskhoa[$i];			
			
				//(in_array($dskhoa[$i],$account))? $ds['class'] ="label label-success":  $ds['class'] ="label label-warning";
				// (in_array($dskhoa[$i],$account))? $j= $i:'';
				// if ($j < 100) {
					
				// 	$st2 ="Select * FROM " . TABLE . "_report_details_" .$get['id_year'] .
				// 	" WHERE account_report ='" . $dskhoa[$i] . "' AND count =" . $get['count_evaluation'] . " AND status > 0
				// 	AND id_report=" . $id_report;
				// 	//echo $status[$j];
				// }
				// (in_array(1,$status))?$ds['class'] ="label label-danger":  $ds['class'] ="label label-info";
				$xtpl->assign('dskhoaphong', $ds);
				$xtpl->parse('main.report.view.dskhoaphong');
		
			$khoaphong['class'] ='';
			$xtpl->assign('KHOAPHONG', $khoaphong);
			$xtpl->parse('main.report.view');
		}
		$row['slkhoa'] = count($dskhoa);
		$token = $get['id_year'] . '_' . $row['id'] . '_' . md5($client_info['session_id'] . $user_info['username']);
		$row['link_danhgia'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=edit_evaluation&edit_id=' . $token;
		//kiểm tra mẫu báo cáo số 5
		($row['id']==5) ? $row['link_baocao'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=view_report_medical&view_id=' . $token
		: $row['link_baocao'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=view_report&view_id=' . $token;  ;

		// $row['link_baocao'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=view_report&view_id=' . $token;
		$row['link_del'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=first_setup&sta=del_item';
		$row['token'] = md5($client_info['session_id'] . $user_info['username']) . '_' . $get['id_year'] . '_' . $row['id'];
		$row['link_edit'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=edit_setup&edit_id=' . $token;
		($row['id']==5)? $row['class'] = 'bg-warning':   $row['class'] = 'bg-success';
		$xtpl->assign('ROW', $row);
		$xtpl->parse('main.report');
		
	}

  
	$xtpl->assign('sobieumau', $tt);
	$xtpl->assign('namapdung', $get['id_year']);
	if ($namapdung != $get['id_year']) {
		$de['link'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=first_setup&sta=default_item';
		$de['token'] = md5($client_info['session_id'] . $user_info['username']) . '_' . $get['id_year'];
		$xtpl->assign('ACT', $de);
		$xtpl->parse('main.item.default');
	}


	// Kiểm tra cập nhật

	// $post['token2'] = $nv_Request->get_title('token2', 'get,post', '');
	// if (!empty($post['token2'])) {
	// 	// $update = True;

	// 	// Lấy thông tin liên wan tới kỳ đánh giá đã có
	// 	$arr = explode('_', $post['sta2']);
	// 	$get['year'] = $arr[0];
	// 	$get['count_evaluation'] = $arr[1];


	// 	// print($get['year']);
	// }


	// Lấy các thông tin trong bản optiopn
	$st = "SELECT * FROM " . TABLE . "_option where status =1";
	$row_op = $db->query($st)->fetch();


	// Đưa dữ liệu vào kỳ đánh giá
	$items = $row_op['evaluation_type'];
	$items = explode(';', $items);
	$row = array();

	foreach ($items as $item) {
		// Check update
		// Print('item='.$row_update['evaluation_type']);
		if ($update) ($row_update['evaluation_type'] == $item) ? $row['selected'] = 'selected' : $row['selected'] = '';

		$row['name_evaluation_type'] = $item;
		$xtpl->assign('evaluation_type', $row);
		$xtpl->parse('main.item.evaluation_type');
	}


	// Đưa vào danh sách các lần đánh giá
	// var_dump($arr);
	// Lấy số lần đánh giá tồn tại trong bảng kỳ đánh giá
	// Lấy dữ liệu từ bảng kì đánh giá để cập nhật vào bảng
	$st2 = "SELECT * FROM " . TABLE . "_evaluation_" . $namapdung . "
	WHERE status = 1";
	// ẩn nút lưu nếu chưa khởi tạo đánh giá
	$rows2 =  $db->query($st2)->fetchAll();
	$arr1 = array();
	$i = 0;
	foreach ($rows2 as $row2) {
		$i = $i + 1;
		$arr1[$i] = $row2['count_evaluation'];
	}
	// var_dump($arr1);
	$arr = array();
	$ds = array();

	
	$arr = $row_op['count'];
	$arr = explode(";", $arr);
	foreach ($arr as $r) {
		//    print($r);
		$token = $namapdung . '_' . $r . '_' . md5($client_info['session_id'] . $user_info['username']);
		$ds['link_landanhgia'] =  MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $token;
		$ds['count'] = $r;
		$ds['class']= (in_array($r, $arr1)) ?  '' : 'btn btn-success btn-outline-success';	
		//kiểm tra các lần đánh đã có, hay chưa tạo lập
		$st2 = "SELECT count_evaluation, status FROM " . TABLE . "_evaluation_". $namapdung. 
		" WHERE count_evaluation=".$ds['count'];
		//echo $st2;
		$ds2 =  $db->query($st2)->fetch();
		if (!empty($ds2['status']))
			if($ds2['status'] == 1 )//đang đánh giá				   		
				$ds['class'] ='btn btn-warning' ;//đang đánh giá			
			else 
				if($ds2['status'] == 2 )//đã hoàn thành				
				$ds['class'] ='btn btn-info' ;// đã hoàn thành	
					
	 

		// print($ds['count']);
		//$ds['class'] = (in_array($r, $arr1)) ?  'btn btn-warning' : 'btn btn-success btn-outline-success';

		$xtpl->assign('list_count', $ds);
		$xtpl->parse('main.item.list_count');
	}



	// Dua du lieu vao thanh phan danh gia
	$st = "Select * FROM " . TABLE . "_evaluation_member";
	$rows = $db->query($st)->fetchAll();
	$teams = $row_update['teams'];
	// $teams = str_word_count($teams, 1, '1..9ü');
	$teams = explode(";", $teams);
	// $items = str_word_count($teams, 1, '1..9ü');
	foreach ($rows as $row) {
		// Kiem tra update

		if ($update) {
			$team =  $row['full_name'] . '-' . $row['position'];
			// print('team=' . $team);
			(in_array($team, $teams)) ? $row['selected'] = 'selected' : $row['selected'] = '';
		}

		// add vào cập nhật thành viên đánh giá
		$xtpl->assign('update_team', $row);
		$xtpl->parse('main.item.update_team');

		$xtpl->assign('TEAM', $row);
		$xtpl->parse('main.item.TEAM');
	}



	$xtpl->parse('main.item.hien_bieumau');
	$xtpl->parse('main.item.landanhgia');


	//  Dua vao cac du lieu ngay batdau, kethuc, hientai truong hop update

	// print('frdate='.$from_date);
	$from_date = $row_update['from_date'];
	$xtpl->assign('from_date', $from_date);
	$xtpl->parse('main.item.from_date');

	$to_date = $row_update['to_date'];
	$xtpl->assign('to_date', $to_date);
	$xtpl->parse('main.item.to_date');

	// Dua dư liệu vào khuyen nghi, de xuat
	$xtpl->assign('content', $row_update['content']);
	$xtpl->parse('main.item.content');

	// print('account_view=' .$get['count_report'] .'----');





	$xtpl->parse('main.item');
}




$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
$xtpl->assign('THEME_URL', THEME_URL);
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';



//Function update evaluation details
function update_question_details($id_question_details, $score)
{
	//khai bao bien db vao moi ham// luu y
	global $db;
	$count = $db->exec("UPDATE " . TABLE . "_question_details SET score=$score WHERE id_question_details= $id_question_details");
	print("update $count rows");
}
//PDO
