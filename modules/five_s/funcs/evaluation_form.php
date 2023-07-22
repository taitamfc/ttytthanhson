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
// get năm khi chọn năm đánh giá
$get['year'] = $nv_Request->get_title('year', 'get');
// lấy id lần đánh giá
$get['id'] = $nv_Request->get_title('id', 'get');
// $get['name_report']
// set mặc định lần đánh giá 1 khi load form
// $get['id']=1;

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

}

// show các báo cáo theo năm mặc định ra bảng
$st1 = "Select * FROM " . TABLE . "_setup 
    WHERE set_default=1";
$rows = $db->query($st1)->fetchAll();   
$get['year_default'] = $rows[0]['year'];
// print('df ='.$get['year_default']  );
$xtpl->assign('set_default', $get['year_default']);
$st2 = "Select * FROM " . TABLE . "_report_" .  $get['year_default'] ;
// print($st2);
$rows = $db->query($st2)->fetchAll();  
$i=0;
$func='edit_evaluation';
// print($user_info['full_name']);
foreach($rows as $row){
    $row['stt'] = $i+1;
    $id = $row['id'];
    $account= $user_info['full_name'];
    $xtpl->assign('report', $row);
    $xtpl->assign('link_edit_id', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func . '&edit_id=' . $get['year_default'] . '_' . $id . '&acc=' .  $account);
    $xtpl->parse('main.report');
    $i = $i +1;
}



//Get giá trị năm mặc định- xử lý ok
if (!empty($get['year'])) {
    $xtpl->assign('default_year', $get['year']);}
    else {
   
    // print($get['year']);
    }

    //Get giá trị id khi bấm vào từng id


    // show_setup($get['id_year']);


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


    // đưa dữ liệu vào khoa phòng khi chọn lần đánh giá
    $sql = "Select * FROM " . TABLE . "_groupuser";
    $rows = $db->query($sql)->fetchAll();
    $i = 0;
    $ids = array();
    $sdata = "";
    var_dump('khoaphòng=' . $rows);

    // $ids =["d1,d2,d3,d4"];

    // $func = 'edit_question_type';
    // foreach ($rows as $row) {
    //     $row['stt'] = $i + 1;
    //     // gán link theo id_question_type vào thao tác sửa 
    //     $xtpl->assign('link_edit_id', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func . '&edit_id=' . $y . '_' . $row['id_question_type']);
    //     // $row['stt2']= $stt[$i];
    //     $i = $i + 1;

    //     // print_r($row['id_department']);
    //     $id_department = json_decode($row['id_department']);
    //     array_push($ids, $id_department);
    //     // $row['d1'] = $ids;
    //     // $sdata = implode(', ', $id_department);        
    //     // $row['d2'] = $sdata;      
    //     $xtpl->assign('question_type', $row);
    //     $xtpl->parse('main.question_type');
    // }
}



//Function creat setup
function create_setup($y)
{
    global $db;
    //Tạo dữ liệu trong bảng năm

    // Lưu dữ liệu khởi tạo vào bảng setup
    // check dữ liệu trùng trước khi lưu

    $sql = "Select  * FROM " . TABLE . "_setup 
    WHERE year = $y LIMIT 1";
    $rows = $db->query($sql)->fetchAll();
    print('r=' . $rows[0]['id_setup']); //get id_setup
    if (!$rows) {
        // print('ok');
        // gán vào select option mặc định của combobox





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
    $count = $db->exec("UPDATE nv4_vi_fives_question_details SET score=$score WHERE id_question_details= $id_question_details");
    print("update $count rows");
}
//PDO
// xóa tất cả các bảng theo điều kiện
function delete_tables($y)
{
    // Define the prefix of the tables you want to delete
    global $db;
    $pre = "nv4_vi_fives_evaluation_" . $y;

    // Construct the SQL statement with a wildcard to match all tables with the prefix
    $sql = "DROP TABLE IF EXISTS " . $pre . "%";

    // Execute the SQL statement
    $count = $db->exec($sql);

    print("All tables with prefix " . $pre . " have been deleted successfully");
}
