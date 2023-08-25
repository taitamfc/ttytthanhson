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
$thongke = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);

/*Code for Here*/

$post = array();
$get = array();
// edit_setup&edit_id=2023_1
$checks = $post['checks'] =  $nv_Request->get_array('checks', 'post');
$get['edit_id'] = $nv_Request->get_title('edit_id', 'get');
// print('edit_id=' . $get['edit_id']);
$arr = explode('_', $get['edit_id']);
$get['year'] = $arr[0];
$get['id_report'] = $arr[1];

$sta = $nv_Request->get_title('sta', 'get,post', '');
if ($sta == 'update_report') {
    $name_report =  $nv_Request->get_title('name_report', 'post');
    $checks = $post['checks'] =  $nv_Request->get_array('checks', 'post');
    $departments = $nv_Request->get_array('department', 'post');
    $str_check =  implode(";", $checks);
    $str_dp =  implode(";", $departments);
    $st = "UPDATE " . TABLE . "_report_" . $get['year'] . "
    SET name_report = '$name_report', 
        view_report = '$str_dp' ,
        arr_question_type = '$str_check'   
    WHERE id = " . $get['id_report'] . "";
    $count = $db->exec($st);
    $ketqua = array();
    $ketqua['status'] = 'OK';
    $ketqua['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
    $ketqua['mess'] = ($count > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err'];

    nv_jsonOutput($ketqua);
    exit;
}

/*
if (isset($_POST['submit'])) {
    $post['submit'] = $_POST['submit'];
}

// Kiem tra submit
if (isset($post['submit'])) {
    // Get giá trị trong các control form
    // Cập nhật vào table biểu mẫu theo năm và theo biểu mẫu

    $name_report =  $nv_Request->get_title('name_report', 'post');  
    $checks = $post['checks'] =  $nv_Request->get_array('checks', 'post');
    $departments = $nv_Request->get_array('department', 'post');
    $str_check =  implode(";", $checks); 
    $str_dp =  implode(";", $departments);  
    $st = "UPDATE ".TABLE."_report_" . $get['year'] . "
    SET name_report = '$name_report', 
        view_report = '$str_dp' ,
        arr_question_type = '$str_check'   
    WHERE id = " . $get['id_report'] . "";
    //print('st='.$st);
    
    $count = $db->exec($st);
    $result = ($count > 0) ? 'Đã cập nhật dữ liệu' :'Chưa cập nhật dữ liệu';
	echo $result; exit();

}
*/



// Check dữ liệu năm mặc định khi load form

// Đưa các thông tin biếu mẫu đang chọn ra form
$st = "SELECT * FROM " . TABLE . "_report_" . $get['year'] . " WHERE id = " . $get['id_report'] . "";
$rows = $db->query($st)->fetchAll();
$xtpl->assign('name_report', $rows[0]['name_report']);
$xtpl->assign('view_report', $rows[0]['view_report']);
$xtpl->assign('question_type', $rows[0]['view_report']);

// Lấy các thông tin trong bảng report để show ra form


$st2 = "SELECT * FROM " . TABLE . "_report_" . $get['year'] . "  WHERE id = " . $get['id_report'] . "";
$rs = $db->query($st2)->fetchAll();
$ck1 = $rs[0]['arr_question_type'];
// $ck2 = str_word_count($ck1, 1, '1..9ü');
$ck2 = explode(';', $ck1);

// đưa dữ liệu vào các phân bố danh mục tiêu chuẩn theo năm được chọn từ link biểu mẫu
// Kiểm tra tên report, if là biểu mẫu số 5
if ($rows[0]['id_report'] == 5)
    $st = "Select * FROM " . TABLE . "_question_type_" . $get['year'] . " WHERE id_rating_type != 1";
else 
    $st = "Select * FROM " . TABLE . "_question_type_" . $get['year'] . " WHERE id_rating_type = 1";
$rows = $db->query($st)->fetchAll();
$i = 0;
foreach ($rows as $row) {
    $row['stt'] = $i + 1;
    $i = $i + 1;
    // kiểm tra các tiêu chuẩn được lựa chọn
    (in_array($row['id_question_type'], $ck2)) ? $row['check'] = 'checked' : $row['check'] = '';

    $xtpl->assign('question_type', $row);
    $xtpl->parse('main.question_type');
}

// Đưa dữ liệu vào combo chọn khoa phòng đánh giá

$str1 = $rs[0]['view_report'];
// $str2 = str_word_count($str1, 1, '1..9ü');
// print_r($str3);
$str2 = explode(';', $str1);
$st1 = "SELECT * FROM " . TABLE . "_groupuser";
// print($st2);
$rows = $db->query($st1)->fetchAll();
foreach ($rows as $row) {
    // kiểm tra khoa phòng đã chọn có trong danh sách nhóm người dùng thì set thuộc tính selected   
    (in_array($row['account'], $str2)) ? $row['selected'] = 'selected' : $row['selected'] = '';
    $xtpl->assign('department', $row);
    $xtpl->parse('main.department');
}

// Đưa dữ liệu đã chọn vào các tiêu chuẩn đánh giá




$xtpl->parse('main.buttons');
/*End Code for Here*/
//truyền biến vào form action
$xtpl->assign('POST', $post);
// $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
// $func = "first_setup&year=2021";
$func = "first_setup";


$xtpl->assign('THEME_URL', THEME_URL);
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&edit_id=' . $get['year'] . '_' . $get['id_report']);
$xtpl->assign('link_back', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func . '&year=' . $get['year']);
$xtpl->parse('main');
$contents = $xtpl->text('main');


include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';


// Function show_setup



//Function creat setup

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
    $count = $db->exec("UPDATE " . TABLE . "_question_details SET score=$score WHERE id_question_details= $id_question_details");
    print("update $count rows");
}
//PDO
