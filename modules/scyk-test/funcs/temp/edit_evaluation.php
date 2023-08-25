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
$thongke = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);

/*Code for Here*/

$post = array();
$get = array();
$get['id_year'] = $nv_Request->get_title('year', 'get');
// print('id_year=' . $get['id_year']);
// get năm mặc định khi bấm chọn mặc định
$get['default'] = $nv_Request->get_title('default', 'get');
// print('default=' . $get['default']);
// Cập nhật trường mặc định trong database
if (!empty($get['default'])) {
    // $count = $db->exec("UPDATE nv4_vi_fives_setup SET set_default=1 WHERE year=". $get['default']."");
    $count = $db->exec("UPDATE nv4_vi_fives_setup SET set_default=0 WHERE year!=" . $get['default'] . "");
    $st = "UPDATE nv4_vi_fives_setup 
SET set_default = (CASE WHEN year = " . $get['default'] . " THEN 1 ELSE 0 END)
WHERE year = " . $get['default'] . " OR year != " . $get['default'] . "";
    $count = $db->exec($st);
    // print("update $count rows");
}


if (isset($_POST['submit_button'])) {
    $post['submit'] = $_POST['submit_button'];
}

// Kiem tra submit
if (isset($post['submit'])) {
    // Get giá trị trong các control form
    $post['year'] = $nv_Request->get_title('cbo_year', 'post');
    // print('year_submit=' . $post['year']);
    // khởi tạo dữ liệu theo năm được chọn
    // Create_setup($post['year']);
    //Tạo dữ liệu trong bảng năm

}

// add vào combox chọn danh sách năm khởi tạo
$rs = array();
for ($i = 2021; $i <= 2025; $i++) {
    $rs['vl'] = $i;
    $xtpl->assign('setcbo', $rs);
    $xtpl->parse('main.setcbo');
    // print('rs='.$rs['vl']);
}


// add vào danh sách năm đã khởi tạo
$sql = "Select * FROM " . TABLE . "_setup ORDER BY year ASC";
$rows = $db->query($sql)->fetchAll();
$i = 0;
foreach ($rows as $row) {
    //truyền biến vào vòng lặp
    // check năm mặc định
    $row['class'] = ($row['set_default'] == 1) ? 'btn btn-success' : 'btn btn-success btn-outline-success';
    $xtpl->assign('link_evaluation', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&year=' . $row['year']);
    $xtpl->assign('setup', $row);
    $xtpl->parse('main.setup');
}
// Check dữ liệu năm mặc định khi load form
// nếu dữ liệu có 1 hàng duy nhất, ko cần dùng vòng lặp
$sql = "Select  * FROM " . TABLE . "_setup 
    WHERE set_default = 1 LIMIT 1";
$rows = $db->query($sql)->fetchAll();
print('r=' . $rows[0]['id_setup']); //get id_setup
if ($rows) {
    // print('ok');
    // gán vào select option mặc định của combobox

    show_setup($rows[0]['year']);
} else {
    // print('Not ok');
}
// foreach ($rows as $row) {


// }
//Get giá trị link year khi bấm vào từng năm
if (!empty($get['id_year'])) {
    print('id_y=' . $get['id_year']);

    show_setup($get['id_year']);
}

$xtpl->parse('main.buttons');
/*End Code for Here*/
//truyền biến vào form action
$xtpl->assign('POST', $post);
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
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
    $sql = "Select * FROM " . TABLE . "_setup 
    WHERE year = " . $y . "";
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row) {
        // gán giá trị vào display của thẻ tr
        $row['show'] = ($row['set_default'] == 1) ? 'none' : 'table-row';
        $xtpl->assign('set_default', $row);
        //gán link_default vào nút chọn mặc định
        $xtpl->assign('link_default', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&default=' . $y);
    }


    // đưa dữ liệu vào các phân bố danh mục tiêu chuẩn theo năm được chọn từ link_year
    $sql = "Select * FROM " . TABLE . "_question_type_" . $y . "";
    $rows = $db->query($sql)->fetchAll();
    $i = 0;
    $ids = array();
    $sdata = "";

    // $ids =["d1,d2,d3,d4"];

    $func = 'edit_question_type';
    foreach ($rows as $row) {
        $row['stt'] = $i + 1;
        // gán link theo id_question_type vào thao tác sửa 
        $xtpl->assign('link_edit_id', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func . '&edit_id=' . $y . '_' . $row['id_question_type']);
        // $row['stt2']= $stt[$i];
        $i = $i + 1;

        // print_r($row['id_department']);
        $id_department = json_decode($row['id_department']);
        array_push($ids, $id_department);
        // $row['d1'] = $ids;
        // $sdata = implode(', ', $id_department);        
        // $row['d2'] = $sdata;      
        $xtpl->assign('question_type', $row);
        $xtpl->parse('main.question_type');
    }
}



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
    $count = $db->exec("UPDATE nv4_vi_fives_question_details SET score=$score WHERE id_question_details= $id_question_details");
    print("update $count rows");
}
//PDO
