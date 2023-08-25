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
$department = array();

//lấy giá trị id của link edit__question_type

$get['edit_id'] = $nv_Request->get_title('edit_id', 'get');
$arr = explode('_', $get['edit_id']);
$get['year'] = $arr[0];
$get['id_questiontype'] = $arr[1];
// print('year=' . $arr[0]); //Get before character
// print('id=' . $arr[1]); //get after character

$post['questiontype_txt'] = $nv_Request->get_title('questiontype_txt', 'post');
if (isset($_POST['submit_button'])) {
    $post['submit'] = $_POST['submit_button'];
}

// Kiem tra submit
if (isset($post['submit'])) {
    //update data in questiontype table
    //get department in array
    $departments = $nv_Request->get_array('department', 'post');
    // var_dump($departments);
    foreach ($departments as $dp) {
        print('dp='.$dp);
    }
    
    
    $st = "UPDATE nv4_vi_fives_question_type_2021 
    SET id_department = JSON_ARRAY('" . implode("','", $departments,) . "') ,
    name_question_type = '" . $post['questiontype_txt'] . "'
    WHERE id_question_type = " . $get['id_questiontype'] . "";
    
    $count = $db->exec($st);
    $result = ($count > 0) ? print('Đã cập nhật dữ liệu') : print('Chưa cập nhật dữ liệu');
}
// load các tiêu chuẩn đánh giá question_type vào menu
$sql = "Select * FROM " . TABLE . "_question_type_" . $get['year'] . " 
ORDER BY id_question_type ASC";
$rows = $db->query($sql)->fetchAll();
$i = 0;
$stt = array();
$stt = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII'];
foreach ($rows as $row) {
    //truyền biến vào vòng lặp
    // lưu ý luôn để parse ở cuối vòng lặp
    $row['stt'] = $stt[$i];
    $i = $i + 1;
    $xtpl->assign('question_type', $row);
    //truyền biến id vào link li
    $xtpl->assign('link_id', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&id=' . $row['id_question_type']);
    $xtpl->parse('main.question_type');
}



if (!empty($get['id_questiontype'])) {
    //show các tiêu chuẩn và chi tiết tiêu chuẩn theo năm và loại
    $j = 0;
    $sql = "Select * FROM " . TABLE . "_question_type_" . $get['year'] . " 
    WHERE id_question_type = " . $get['id_questiontype'] . "";
    $groups = $db->query($sql)->fetchAll();
    foreach ($groups as $group) { //show các giá trị thuộc nhóm	       
        $sql = "Select * FROM " . TABLE . "_question_" .  $get['year'] . " 
        WHERE id_question_type = " . $get['id_questiontype'] . "";
        $rows = $db->query($sql)->fetchAll();
        foreach ($rows as $row) {
            $row['stt'] = $j + 1;
            $j = $j + 1;
            $xtpl->assign('question', $row);
            $xtpl->parse('main.group.question');
        }
        $xtpl->assign('group', $group);
        $xtpl->parse('main.group');
    }

    // đưa các giá trị vào combobox chọn khoa phòng
    $sql = "Select * FROM " . TABLE . "_department ORDER BY id_department ASC ";
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row) {
        //truyền biến vào vòng lặp
        // lưu ý luôn để parse ở cuối vòng lặp        
        $xtpl->assign('department', $row);
        //truyền biến id vào link li        
        $xtpl->parse('main.department');
    }
}


$xtpl->parse('main.buttons');
/*End Code for Here*/
//truyền biến vào form action
$xtpl->assign('POST', $post);
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&edit_id=' . $get['year'] . '_' . $get['id_questiontype']);
// edit_id=2021_1
$xtpl->parse('main');
$contents = $xtpl->text('main');


include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';


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
