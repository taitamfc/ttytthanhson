<?php

/**
 * @Project BCB SOLUTIONS
 * @Author Mr Duy <vuduy1502@gmail.com>
 * @Copyright (C) 2023 Mr Duy. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 19 Mar 2023 05:56:44 GMT
 */

use Com\Tecnick\Barcode\Type;

if (!defined('NV_IS_MOD_FIVES'))
    die('Stop!!!');

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

// create_evaluation();
if (empty($user_info)) {
    $url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';
    Header('Location: ' . nv_url_rewrite($url, true));
    exit();
}

$array_data = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);


//code here
// Hiển thị thông tin 12 lần đánh giá
$get = array();
$post = array();

//Get data from form

// Lấy thông tin năm mặc định
$st = "Select year FROM " . TABLE . "_setup WHERE set_default = 1";
$row_default = $db->query($st)->fetch();
$get['year']  =  $row_default['year'];
//cho $get['year'];
$xtpl->assign('nam', $get['year']);
$xtpl->assign('hien_bieumau', 'hidden');
$xtpl->assign('hien_nutexcel', 'hidden');

// Lấy dữ liệu từ bảng kì đánh giá để cập nhật vào bảng
$st2 = "SELECT count_evaluation,status FROM " . TABLE . "_evaluation_" . $get['year'];

// ẩn nút lưu nếu chưa khởi tạo đánh giá
$rows2 =  $db->query($st2)->fetchAll();
$arr1 = array();
$status_evaluation = array();
$i = 0;
foreach ($rows2 as $row2) {

    $arr1[$i] = $row2['count_evaluation'];
    $status_evaluation[$i] = $row2['status'];
    $i++;
}

// Lấy các thông tin trong bản optiopn
$st = "SELECT * FROM " . TABLE . "_option where status =1";
$row_op = $db->query($st)->fetch();
if (count($row_op) > 0) {
    $arr_op = array();
    $arr_op = $row_op['count'];
    $arr_op = explode(";", $arr_op);
    //var_dump($arr_score);
    //Lấy thông tin các lần đánh giá

}

//Đưa dữ liệu vào thông tin các lần đánh giá
$j = 0;
foreach ($arr_op as $arr_count) {
    //nv_jsonOutput ($get['idd']);
    // Lấy dữ liệu từ bảng kì đánh giá để cập nhật vào bảng
    $st2 = "SELECT count_evaluation,status FROM " . TABLE . "_evaluation_" . $get['year'];

    $rows = $db->query($st)->fetchALL();
    if (in_array($arr_count, $arr1)) {
        //check status
        $status = $status_evaluation[$j];
        //echo( 'status = '.$status. '<br>');
        $class = ($status == 2) ?  'btn btn-info' : 'btn btn-warning';
    } else
        $class = 'btn btn-success btn-outline-success';
    $j++;

    //$class = (in_array($arr_count, $arr1)) ?  'btn btn-info' : 'btn btn-success btn-outline-success';
    $xtpl->assign('ds', $arr_c = array(
        'count' => $arr_count,
        'link_danhgia' => MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&idd=',
        'class' => $class
    ));
    $xtpl->parse('main.LIST_COUNT');
}
//lấy dữ liệu từ khoa, kỳ đánh giá

// Lấy thông tin năm mặc định

// Lấy tên khoa phòng
// kiem tra link chọn lần đánh giá
$get['idd'] = $nv_Request->get_title('idd', 'get,post', '');
if (!empty($get['idd']) && !empty($get['year'])) {

    $get['count_report'] = $get['idd'];
    //Lấy ra các kỳ đánh giá trong bảng details
    $st = "SELECT * FROM " . TABLE . "_report_details_" . $get['year'] . "  
        where id_report < 5 and status > 0   
        and count =" .  $get['count_report'] . "        
        ORDER BY count asc";
    //echo $st;
    //$ds_arr=array();
    $rows =  $db->query($st)->fetchALL();
    foreach ($rows as $rs) {
        
        //danh sách đề xuất ,kiến nghị
        $limit = get_line($rs, 'limitation');
        $re = get_line($rs, 'recommendation');
        $per = get_line($rs, 'personnel');
        $ass = get_line($rs, 'assignment');
        $res = get_line($rs, 'main_responsibility');
        $completion =$rs['completion_time'];
        $note = get_line($rs, 'note');

        //echo $limit;
        //lấy ra recomend đầu tiên

        $xtpl->assign('DS_ARR', $ds_arr = array(
            'acc' => $rs['account_report'],
            'limit' => $limit,
            're' => $re,
            'per' => $per,
            'ass' => $ass,
            'res' => $res,
            'completion' => $completion,
            'note' =>  $note


        ));
        $xtpl->parse('main.DS_ARR');

        //kiểm tra thông tin cập nhật theo từng hàng trong bảng phân công
        if (isset($_GET['data'])) {
            $arr_data = $_GET['data'];
            $arr_data= ltrim($arr_data,'[');
            $arr_data= rtrim($arr_data,']');
            $arr_data= trim($arr_data,' ');
            //$arr_data= trim($arr_data,'\n');
            $arr_data = str_replace('\n','',$arr_data);

            $arr_data = explode(',', $arr_data);          
          

            $type_data = gettype($arr_data);
            //echo ('type='.$type_data);
            //echo ('data[0]='.$arr_data[0]);

                $st = "SELECT * FROM " . TABLE . "_report_details_" . $get['year'] . "  
            where id_report < 5 and status > 0 and account_report=". $arr_data[0] ."   
            and count =" .  $get['count_report'] . "        
            ORDER BY count asc";           


            $st= "UPDATE ". TABLE . "_report_details_" . $get['year'] . 
            " SET personnel=". $arr_data[1].",
            assignment =". $arr_data[2].",
            main_responsibility =". $arr_data[3].",
            note =". $arr_data[4]. "
            WHERE account_report=". $arr_data[0] ." and count =" .  $get['count_report'] . "";
            //$count = $db->exec($st);           
            nv_jsonOutput( $arr_data);
           

            
        }
    }
   

}

// kiem tra link chọn lần đánh giá
function get_line($rs, $col)
{
    $st = '- ';
    $ds_st =  explode('-',  $rs[$col]);
    unset($ds_st[0]);
    foreach ($ds_st as $r)
        $st = $st . $r . '<BR>' . '-';
    if (count($ds_st) > 0)
        return rtrim($st, '-');
    else return $rs[$col];
}



//$xtpl->assign('token', $token);
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&year=' . $get['year']);
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
