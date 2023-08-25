<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_FIVES')) {
    die('Stop_main!!!');
}
//function insert evalution
// function Create_evaluation(){
    // $sql = "INSERT INTO ".TABLE."_evaluation(id_evaluation,count_evaluation, start_year, note)
    // VALUES (NULL,:count_evaluation,:start_year,:note)";
    // $data_insert = array();    
    // $data_insert['count_evaluation'] = 1;	
    // $data_insert['start_year'] = 2023;
    // $data_insert['note'] = 'Khởi tạo dữ liệu năm 2023';	
//     // $result=($db->insert_id($sql, 'id_evaluation', $data_insert));

// }
function create_evaluation(){
$sql = "INSERT INTO ".TABLE."_evaluation(id_evaluation,count_evaluation, start_year, note)
VALUES (NULL,:count_evaluation,:start_year,:note)";
$data_insert = array();    
$data_insert['count_evaluation'] = 1;	
$data_insert['start_year'] = 2023;
$data_insert['note'] = 'Khởi tạo dữ liệu năm 2023';	
// var_dump($data_insert);
$result=($db->insert_id($sql, 'id_evaluation', $data_insert));
}
//PDO

// create_evaluation();
if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';nv_redirect_location($url); exit();}
	$thongke=array();
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	
	/*Code for Here*/
    //check gia trị ở form submit
    $post = [];
    $post['content_text'] = $nv_Request->get_title('content_text', 'post');
    $post['submit'] = $nv_Request->get_title('submit', 'post');
    if (!isset($post['submit']))
    {
        $post['content_text'] = $nv_Request->get_title('content_text', 'post');
        //Insert data
        
       var_dump($post['content_text']);
    }
    $value = $nv_Request->get_title('input_name', 'post');
	// add vào combobox Khoa
	$sql = "Select * FROM " . TABLE. "_department" ;
	$rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row){
        //truyền biến vào vòng lặp
        $xtpl->assign('department', $row);
        $xtpl->parse('main.department');
    }

    // add vào combobox Phòng
    $sql = "Select * FROM " . TABLE. "_room" ;
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row){
        //truyền biến vào vòng lặp
        $xtpl->assign('room', $row);
        $xtpl->parse('main.room');
    }

    // add vào combobox Loại đánh giá Thực hành/Chuyên môn
    $sql = "Select * FROM " . TABLE. "_rating_type" ;
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row){
        //truyền biến vào vòng lặp
        $xtpl->assign('rating_type', $row);
        $xtpl->parse('main.rating_type');
    }

    // add vào combobox Đội trưởng đánh giá
    $sql = "Select * FROM " . TABLE. "_evaluation_member WHERE is_team_leader = 1 " ;
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row){
        //truyền biến vào vòng lặp
        $xtpl->assign('evaluation_member', $row);
        $xtpl->parse('main.evaluation_member');
    }
//    var_dump($rows);

//   $xtpl->parse('main.buttons');
     $xtpl->parse('main.buttons');
     /*End Code for Here*/
     //truyền biến vào form action
     $xtpl->assign('POST',$post);
     $xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
     $xtpl->parse('main');
     $contents = $xtpl->text('main');


include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
