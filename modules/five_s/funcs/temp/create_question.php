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
//check gia trị ở form submit
//Test tạo bảng mới ok
// $count = $db->exec("CREATE TABLE nv4_vi_fives_department_2023 (
//     id_department INT AUTO_INCREMENT PRIMARY KEY,
//     name_department VARCHAR(255) NOT NULL,
//     description VARCHAR(255)
//   )");
//  print("update $count rows");  
//copy vào bảng mới ok luôn

//    //Import the data from the old table into the new table.
//    $count = $db->exec("INSERT nv4_vi_fives_department_2023 SELECT * FROM nv4_vi_fives_department");
//    print("update $count rows");  

$post = array();
$get = array();
//lấy giá trị id của link li
// $id = $_GET['id'];
// print('test id='.$id);
$get['id_link'] = $nv_Request->get_title('id', 'get');
// print('test id='.$get['id_link']);

$post['submit'] = $nv_Request->get_title('submit', 'post');
// Tạo nhóm câu hỏi đưa vào bảng
$sql = "SELECT * FROM " . TABLE . "_question_type ";
$groups = $db->query($sql)->fetchAll();
$id_question_details = array();
// Kiem tra submit
if (!empty($post['submit'])) {
    // Get giá trị trong các control form
    // $post['t'] = $nv_Request->get_title('list_selected_team', 'post');
    //lấy giá trị id của link li
}

// load các tiêu chuẩn đánh giá question_type
$sql = "Select * FROM " . TABLE . "_question_type ORDER BY id_question_type ASC";
$rows = $db->query($sql)->fetchAll();
$i = 0;
$stt = array();
$stt = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII'];
foreach ($rows as $row) {
    //truyền biến vào vòng lặp
    // lưu ý luôn để parse ở cuối vòng lặp
    $row['stt'] = $stt[$i];
    $i = $i + 1;
    print('Stt=' . $row['stt'] . '|');
    // print('row id='.$row['id_question_type'].'|');
    $xtpl->assign('question_type', $row);
    //truyền biến id vào link li
    $xtpl->assign('link_id', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&id=' . $row['id_question_type']);
    $xtpl->parse('main.question_type');
}
//Gán các giá trị vào form chi tiết tiêu chuẩn = id link
if (!empty($get['id_link'])) {
    
    $j=0;
    $sql = "Select * FROM " . TABLE . "_question_type 
    WHERE id_question_type = " . $get['id_link'] . "";
    $groups = $db->query($sql)->fetchAll();
    foreach ($groups as $group) { //show các giá trị thuộc nhóm	       
        $sql = "Select * FROM " . TABLE . "_question 
        WHERE id_question_type = " . $get['id_link'] . "";
        $rows = $db->query($sql)->fetchAll();
        foreach ($rows as $row) {
            $row['stt']=$j+1;
            $j=$j+1;
            $xtpl->assign('question', $row);
            $xtpl->parse('main.group.question');
            print($row['stt'] . '|');
        }
        $xtpl->assign('group',$group);
        $xtpl->parse('main.group');        
    }
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
