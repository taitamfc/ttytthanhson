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
$xtpl->assign('THEME_URL', THEME_URL);


$post = array();
$get = array();
//lay dữ liệu loạibc, header, footer BC trong bảng vote_config
$st = "SELECT * FROM " . TABLE . "_vote_config where status =1";
$row_op = $db->query($st)->fetch();

//
$arrs = $row_op['bc_header1'];
$arrs = explode(';', $arrs);
foreach ($arrs as $arr) {
}



$xtpl->assign('BCHEAD', array(
    'header1' => $row_op['bc_header1'],
    'header2' => $row_op['bc_header2'],


));
$xtpl->parse('main.BC');




// kiem tra link chọn lần đánh giá


$st = "SELECT masobc_a,kpbc,mota,thoigian,status,note FROM " . TABLE . "_voted_result_a
WHERE status >= 1
Order by thoigian desc";
//var_dump($st);

//kiểm tra bấm nút find-tìm kiếm

$xtpl -> assign('hienbieumau','hidden');
if (isset($_POST['btn_xem'])) { //cách này thường dùng khi bấm submit form ko dùng ajax

    $tg_tungay = $nv_Request->get_title('from_date', 'get,post', 0);
    $datef = strtotime($tg_tungay);
    $fromdate = date("Y/m/d",  $datef);
    $tg_denngay = $nv_Request->get_title('to_date', 'get,post', 0);
    $datet = strtotime($tg_denngay);
    $todate = date("Y/m/d",  $datet);
    $xtpl->assign('BC', array(
        'tungay' =>  $tg_tungay,
        'denngay' => $tg_denngay        

    ));

    //echo "To Date value: " . htmlspecialchars($todate);

    $st = "SELECT masobc_a,kpbc,mota,thoigian,status,note FROM " . TABLE . "_voted_result_a
	WHERE DATE(thoigian) BETWEEN " . "'" . $fromdate . "'" . " and " . "'" . $todate . "'" . " 
	Order by thoigian desc";


    $rows = $db->query($st)->fetchAll();
    if (count($rows)) $xtpl -> assign('hienbieumau','');
    foreach ($rows as $row) {
        $trangthai = '';
        switch ($row['status']) {
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

        ));
        $xtpl->parse('main.DSBC');
    }
}

//Danh sách thành viên phân tích

$st = "Select * FROM " . TABLE . "_voted_member";
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
    $xtpl->assign('DSTV', $row);
    $xtpl->parse('main.DSTV');

    $xtpl->assign('TEAM', $row);
    $xtpl->parse('main.TEAM');
}

/*End Code for Here*/
//truyền biến vào form action
$xtpl->assign('POST', $post);
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $get['year'] . '_' . $get['id_report']);



$xtpl->parse('main');
$contents = $xtpl->text('main');


include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

//Function update evaluation details
