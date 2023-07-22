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
    nv_redirect_location($url);
    exit();
}

$sta =$nv_Request->get_title('sta', 'get,post', '');
if ($sta=='khoitaochitieu')
	{
		$checkss =$nv_Request->get_title('checkss', 'get,post', '');
		$key=md5($client_info['session_id'] . $global_config['sitekey']);
		//if ($checkss!=$key) {die('Stop!!!');}
		
		$data=array();
		$ketqua=array();
		$err=0;$step=0;
		$namkhoitao=$nv_Request->get_int('nam', 'get,post', 0);
		if ($namkhoitao==0){$ketqua['status']='err'; $ketqua['mess']= ++$err.'.'.$lang_module['error'];nv_jsonOutput($ketqua); exit; }
		else //Check đã có tồn tại?
		{
			$sql = 'SELECT * FROM ' . TABLE. '_setup where year='.$namkhoitao;	
			$kq = $db->query($sql)->fetch();
			if (!empty($kq)) 
				{
					$ketqua['status']='err'; $ketqua['mess']= ++$err.'.'.$lang_module['error_apdung'];nv_jsonOutput($ketqua); exit; 
				}
		}
		if ($err==0)
		{
			/* 	_question_2022 	  		
				_question_type_2022 	
				_report_2022 	  		
				_report_details_2022 */
					
			$st = "CREATE TABLE IF NOT EXISTS  ".TABLE."_question_type_" . $namkhoitao . " LIKE ".TABLE."_question_type;    
			INSERT IGNORE INTO ".TABLE."_question_type_" . $namkhoitao . " SELECT * FROM ".TABLE."_question_type";
			// print($st);
			$count = $db->exec($st); 
			// // Tạo bảng câu hỏi theo năm        
			$st = "CREATE TABLE IF NOT EXISTS ".TABLE."_question_" . $namkhoitao . " LIKE ".TABLE."_question;    
			INSERT IGNORE INTO ".TABLE."_question_" . $namkhoitao . " SELECT * FROM ".TABLE."_question";
			// print($st);
			$count = $db->exec($st);

			// Tạo bảng biểu mẫu báo cáo theo năm
			$st = "CREATE TABLE IF NOT EXISTS ".TABLE."_report_" . $namkhoitao . " LIKE ".TABLE."_report_y;    
			INSERT IGNORE INTO ".TABLE."_report_" . $namkhoitao . " SELECT * FROM ".TABLE."_report_y";
			// print($st);
			$count = $db->exec($st); 

			// Tạo bảng biểu mẫu báo cáo chi tiet theo năm
			$st = "CREATE TABLE IF NOT EXISTS ".TABLE."_report_details_" . $namkhoitao . " LIKE ".TABLE."_report_details_y";  
			$count = $db->exec($st); 

			$stmt = $db->prepare("Update ".TABLE."_setup set set_default=0")->execute();
			
			$sql="INSERT INTO ".TABLE."_setup (id_setup,year,set_default,is_locked) VALUES (NULL, ".$namkhoitao.", '1', '1');";
			$stmt = $db->prepare($sql)->execute();

			//if ($row_id>0) nv_redirect_location(MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=content');
			$ketqua['status']='OK';
			$ketqua['url']=MODULE_LINK . '&' . NV_OP_VARIABLE .'='.$op;//.'&token=edit_'.$namkhoitao;
			$ketqua['mess']= ($stmt>0)?sprintf($lang_module['yeucau_ok'],$ketqua['url']):$lang_module['yeucau_err'] ;
			//	
		}
		
		
		
		nv_jsonOutput($ketqua); exit;
	
	}

	if ($sta=='del_item')
	{
		$token=$nv_Request->get_title('token', 'get,post', '');
		$key=explode('_',$token);
		if ($key[0]!=md5($client_info['session_id'] . $user_info['username'])) die('Stop!!!');
		$note=$user_info['username'].' Delete by '.date('d/m/Y H:i');
		$sql = 'Update ' . TABLE. '_report_'.$key[1]. " set status=0, note='$note' where status=1 and id=".$key[2]; 
		$stmt = $db->prepare($sql);

		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua='OK_'.$row_id;
		else $ketqua='ERR_'.$lang_module['update_err'];
		echo $ketqua; exit;
	}
	
	if ($sta=='default_item')
	{
		$token=$nv_Request->get_title('token', 'get,post', '');
		$key=explode('_',$token);
		if ($key[0]!=md5($client_info['session_id'] . $user_info['username'])) die('Stop!!!');
		$stmt = $db->prepare("Update ".TABLE."_setup set set_default=0")->execute();
		
		$sql = 'Update '.TABLE.'_setup set set_default=1 where year='.$key[1]; 
		$stmt = $db->prepare($sql);
		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua='OK_'.$row_id;
		else $ketqua='ERR_'.$lang_module['update_err'];
		echo $ketqua; exit;
	}

$thongke = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);

/*Code for Here*/
$post = array();
$get = array();
$get['id_year'] = $nv_Request->get_title('year', 'get');

	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('sta', 'khoitaochitieu');	
	$nam=date('Y');
	for ($i=$nam-2; $i<=$nam+2; $i++)
	{
		$xtpl->assign('r', array(
			'id' => $i,
			'name' => 'Khởi tạo bộ đánh giá năm '.$i,
			'select' => (date('Y') == $i) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.nam');
	}

// add vào danh sách năm đã khởi tạo
$sql = "Select * FROM " . TABLE . "_setup ORDER BY year ASC";
$rows = $db->query($sql)->fetchAll();
$i = 0; $namapdung=0;
foreach ($rows as $row) {
    //truyền biến vào vòng lặp
    // check năm mặc định
	if ($row['set_default'] == 1) $namapdung=$row['year'];
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
	if (!empty($default)) $get['id_year']=$default['year'];
}

if ($get['id_year']>0)
{
	//$sql = "Select * FROM " . TABLE . "_setup WHERE year = " . $get['id_year'] . "";
	$sql = "Select * FROM " . TABLE . "_report_" . $get['id_year']. " where status=1" ;
    $rows = $db->query($sql)->fetchAll();$tt=0;
    foreach ($rows as $row) {
		$row['stt'] = ++$tt;
		$dskhoa=explode(';',$row['view_report']);
		for ($i=0; $i<count($dskhoa); $i++)
		{
			$xtpl->assign('khoa', $dskhoa[$i]);	$xtpl->parse('main.report.view');
		}
		$row['slkhoa']=count($dskhoa);
		$token=$get['id_year'].'_'.$row['id'].'_'.md5($client_info['session_id'] . $user_info['username']);
		$row['link_danhgia']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=edit_evaluation&edit_id='.$token;
		$row['link_del']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=first_setup&sta=del_item';
		$row['token']=md5($client_info['session_id'] . $user_info['username']).'_'.$get['id_year'].'_'.$row['id'];
		$row['link_edit']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=edit_setup&edit_id='.$token;
		$xtpl->assign('ROW', $row);
		
		$xtpl->parse('main.report');
	}
	
	$xtpl->assign('sobieumau', $tt);
	$xtpl->assign('namapdung', $get['id_year']);
	if ($namapdung!=$get['id_year']) {
			$de['link']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=first_setup&sta=default_item';
			$de['token']=md5($client_info['session_id'] . $user_info['username']).'_'.$get['id_year'];
			$xtpl->assign('ACT', $de);
			$xtpl->parse('main.item.default');
		}
		
		$xtpl->parse('main.item');
}



$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
$xtpl->assign('THEME_URL', THEME_URL);
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';


// Function show_setup
function show_setup($y)
{
    global $db, $op, $xtpl;
    //đưa dữ liệu vào mục set_default các danh mục đã khởi tạo
    $sql = "Select * FROM " . TABLE . "_setup WHERE year = " . $y . "";
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row) {
        // gán giá trị vào display của thẻ tr
        $row['show'] = ($row['set_default'] == 1) ? 'none' : 'table-row';
        $xtpl->assign('set_default', $row);
        //gán link_default vào nút chọn mặc định
        $xtpl->assign('link_default', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&default=' . $y);
    }


    // đưa dữ liệu vào các phân bố các biểu mẫu báo cáo
    $sql = "Select * FROM " . TABLE . "_report_" . $y . "";
    $rows = $db->query($sql)->fetchAll();
    $i = 0;
    $ids = array();
    $sdata = "";

    $func = 'edit_setup';
    foreach ($rows as $row) {
        $row['stt'] = $i + 1;
        // gán link theo id_question_type vào thao tác sửa 
        $xtpl->assign('link_edit_id', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func . '&edit_id=' . $y . '_' . $row['id']);
        // $row['stt2']= $stt[$i];
        $i = $i + 1;
        $xtpl->assign('report', $row);
        $xtpl->parse('main.report');
    }
    //print('i=' . $i);
}



//Function creat setup


function create_setup($y)
{
    global $db;

    // Tạo Loại câu hỏi và chèn vào bảng theo năm


    $st = "CREATE TABLE IF NOT EXISTS  ".TABLE."_question_type_" . $y . " LIKE ".TABLE."_question_type;    
    INSERT IGNORE INTO ".TABLE."_question_type_" . $y . " SELECT * FROM ".TABLE."_question_type";
    // print($st);
    $count = $db->exec($st);

    // // Tạo bảng câu hỏi theo năm        
    $st = "CREATE TABLE IF NOT EXISTS ".TABLE."_question_" . $y . " LIKE ".TABLE."_question;    
    INSERT IGNORE INTO ".TABLE."_question_" . $y . " SELECT * FROM ".TABLE."_question";
    // print($st);
    $count = $db->exec($st);

    // Tạo bảng biểu mẫu báo cáo theo năm
    $st = "CREATE TABLE IF NOT EXISTS ".TABLE."_report_" . $y . " LIKE ".TABLE."_report_y;    
    INSERT IGNORE INTO ".TABLE."_report_" . $y . " SELECT * FROM ".TABLE."_report_y";
    // print($st);
    $count = $db->exec($st);

    // Tạo bảng biểu mẫu báo cáo chi tiet theo năm
    $st = "CREATE TABLE IF NOT EXISTS ".TABLE."_report_details_" . $y . " LIKE ".TABLE."_report_details_y";  
    $count = $db->exec($st);


    // // Lưu dữ liệu khởi tạo vào bảng setup
    // // check dữ liệu trùng trước khi lưu

    $sql = "Select  * FROM " . TABLE . "_setup 
    WHERE year = $y LIMIT 1";
    $rows = $db->query($sql)->fetchAll();
    //print('r=' . $rows[0]['id_setup']); //get id_setup
    if (!$rows) {
        // print('ok');
        // gán vào select option mặc định của combobox
        $sql = "INSERT  INTO " . TABLE . "_setup(id_setup, year,set_default,is_locked,note)
        VALUES (NULL,:year,:set_default,:is_locked,:note)";
        // print($sql);
        $data_insert = array();
        $data_insert['year'] = $y;
        $data_insert['set_default'] = 0;
        $data_insert['is_locked'] = 1;
        $data_insert['note'] = 'Khởi tạo dữ liệu năm ' . $y . '';
        // var_dump($data_insert);
        $result = ($db->insert_id($sql, 'id_setup', $data_insert));

        // cập nhật lại các default = 0 cho các hàng còn lại
        $st = "UPDATE ".TABLE."_setup 
        SET set_default = (CASE WHEN year = " . $y . " THEN 1 ELSE 0 END)
        WHERE year = " . $y . " OR year != " . $y . "";
        $count = $db->exec($st);
    }
}

function create_evaluation()
{
    global $db;
    $sql = "INSERT INTO " . TABLE . "_evaluation(id_evaluation,count_evaluation, start_year, note)
    VALUES (NULL,:count_evaluation,:start_year,:note)";
    $data_insert = array();
    $data_insert['count_evaluation'] = 1;
    $data_insert['start_year'] = 2023;
    $data_insert['note'] = 'Khởi tạo dữ liệu năm 2023';
    // var_dump($data_insert);
    $result = ($db->insert_id($sql, 'id_evaluation', $data_insert));
}
//Function update evaluation details
function update_question_details($id_question_details, $score)
{
    //khai bao bien db vao moi ham// luu y
    global $db;
    $count = $db->exec("UPDATE ".TABLE."_question_details SET score=$score WHERE id_question_details= $id_question_details");
    print("update $count rows");
}
//PDO
