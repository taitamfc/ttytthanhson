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

//test json

// start output buffering
//ob_start();
// Lấy thông tin năm mặc định
$st = "Select year FROM " . TABLE . "_setup WHERE set_default = 1";
$row_default = $db->query($st)->fetch();
$get['year']  =  $row_default['year'];
if (isset($get['year'])) {
    // Đưa dữ liệu vào combo chọn khoa phòng đánh giá
    // edit_id=2021_1&acc=quantri
    $st = "Select * FROM " . TABLE . "_report_details_" . $get['year'] . " as rp
    JOIN " . TABLE . "_groupuser as kp
    ON rp.account_report = kp.account    
    WHERE rp.status >0 and rp.id_report <=5 
    GROUP BY kp.tenkhoa
    ORDER BY kp.tenkhoa DESC";

    $items = $db->query($st)->fetchAll();
    foreach ($items as $item) {

        $department['name'] = $item['tenkhoa'];
        $department['account'] = $item['account'];

        // if ($department['account'] == $get['acc']) {
        //     $department['selected'] = 'selected';
        // } else $department['selected'] = '';


        $xtpl->assign('KHOAPHONG1', $department);
        $xtpl->assign('KHOAPHONG2', $department);
        $xtpl->parse('main.KHOAPHONG1');
        $xtpl->parse('main.KHOAPHONG2');

        // print_r('dp=' . $department['name'] . "|");
        // $i = $i + 1;
    }
}
//chart_khuvuc(1,$get['year']);
// retrieve the count value from the GET request

$dt = chart1('tochuc', $get['year']);
//nv_jsonOutput($dt);
$mydata = $_GET['mydata'];
if (isset($mydata)) {
    // do some processing with the count value
    // ...
    if (is_numeric($mydata)) $data_json = chart2($mydata, $get['year']);
    //check

    nv_jsonOutput($data_json);






}




// kiem tra link chọn lần đánh giá
$get['idd'] = $nv_Request->get_title('idd', 'get,post', '');

if (!empty($get['idd'])) {
    $get['idd'] = $nv_Request->get_title('idd', 'get,post', '');
    $arr = explode('_', $get['idd']);
    // var_dump($get['idd']);
    //$get['account_view'] = $arr[0];
    $get['count_report'] = $arr[0];
    $xtpl->assign('hien_bieumau', '');
    $xtpl->assign('hien_nutexcel', '');

    // Lấy thông tin id_report
    // $st= 

    // print('account_view=' .$get['count_report'] .'----');
} else {
    $xtpl->assign('hien_bieumau', 'hidden');
    $xtpl->assign('hien_nutexcel', 'hidden');
}


// Lấy user đăng nhập
$get['account_view'] = $user_info['username'];
// Lấy tên khoa phòng
// $st = "SELECT * FROM " . TABLE . "_groupuser where account like '" . $get['account_view'] . "'";
// // $row = $db->query($st)->fetch();
// $tenkhoaphong = $row['tenkhoa'];
// $xtpl->assign('tenkhoa', strtoupper($tenkhoaphong));
$xtpl->assign('nam', $get['year']);

$st = "Select  account_report,count, from_date, to_date, arr_team, evaluation_type FROM " . TABLE . "_report_details_" . $get['year'] . "
 WHERE status >0 and id_report <=5 
 group by count
 order by count asc";
// print($st);
$i =1;
$ds = $db->query($st)->fetchAll();

if ($ds) {

    $xtpl->assign('hien_danhgia', '');
    // print('Hien danh gia');
    foreach ($ds as $row) {
        $token = $get['year'] . '_' . '&idd=' . $row['count'] . '_' . md5($client_info['session_id'] . $user_info['username']);
        $row['link_landanhgia'] =  MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $token;
        $row['stt']= $i;
        $row['lbl'] = $row['from_date'];
        $row['kp'] = $row['account_report'];
        $i++;
        $xtpl->assign('list_count', $row);
        $xtpl->parse('main.list_count');
    }
} else {
    $xtpl->assign('hien_landanhgia', 'hidden'); //an lan danh gia

}


// // // Hien thi cac thong tin chung cua report : tenkhoa,doitruong,ngaydanhgia...

// // // Lấy tên khoa phòng
    //test vẽ biểu đồ 2

    $mychart2 = $_GET['mychart2'];
    if (isset($mychart2)) {
        //echo 'ok';
    }



    //vẽ biểu đồ crosstable
    $mychart = $_GET['crosstable'];
    if (isset($mychart)) {

        //Lấy dữ liệu từ ngày đến ngày
        $st = "Select  from_date, to_date FROM " . TABLE . "_report_details_" . $get['year'] . " 
        WHERE status >0 and id_report <=5 
        GROUP BY from_date, to_date
        ORDER BY count ASC";
        //echo $st;
        $tencot = ''; // cột dữ liệu lần đánh giá trong bảng crosstable
        $dscot='';
        $from_to = array();
        $r2 = 0;
        $rows = $db->query($st)->fetchALL();
        for ($r = 0; $r < count($rows); $r++) {
            $r2 = $r + 1;
            $dscot=$dscot.'+IFNULL(l'.$r2.',0)';
            $tencot = $tencot . 'MAX(CASE WHEN count =' . $r2 . '  THEN total_score END) AS l' . $r2 . ',';
            $d1 = substr($rows[$r]['from_date'], 0, strlen($rows[$r]['from_date']) - 5);
            // $d1 = DateTime::createFromFormat('d-m-Y', $rows[$r]['from_date']);
            // $d1->format('d/m');
            // $newformat = date('y-m-d',$d1);
            $d2 = substr($rows[$r]['to_date'], 0, strlen($rows[$r]['to_date']) - 5);
            if (empty($d1) || empty($d2))
                $from_to['ngay'] = '';
            else
                $from_to['ngay'] = $d1 . ' : ' . $d2;
            $row['stt'] = $r2;

            $xtpl->assign('LAN', $row);
            $xtpl->parse('main.LAN');
            $xtpl->assign('NGAY',  $from_to);
            $xtpl->parse('main.NGAY');
        }
        //echo $tencot;
        // print($st);

        // Tạo bảng crosstable khu vực


        // Tạo câu lệnh SELECT động với các cột account_report
        $tencot = rtrim($tencot, ',');
        $dscot= ltrim($dscot,'+');
        $st = "
        DROP TABLE IF EXISTS " . TABLE . "_report_crosstable_" . $get['year'] . ";
        CREATE TABLE " . TABLE . "_report_crosstable_" . $get['year'] . " 
        SELECT     
        rp.account_report, kp.tenkhoa, rp.arr_question," . $tencot .
                " FROM " . TABLE . "_report_details_" . $get['year'] . " as rp
        JOIN " . TABLE . "_groupuser as kp
        ON rp.account_report = kp.account
        WHERE rp.status >0 and rp.id_report <=5
        GROUP BY kp.tenkhoa
        ORDER BY kp.tenkhoa DESC";
            //echo ($st);
            $count = $db->exec($st);
            // var_dump($from_to['ngay']);
            //Lấy dữ liệu trong bảng crosstable
        $st = "Select *,".$dscot." as total   FROM " . TABLE . "_report_crosstable_" . $get['year'] . " 
        ORDER BY total DESC";
        // print($st);
        $ds = array();
        $rows = $db->query($st)->fetchALL();
        // var_dump($rows);
        $i = 0;
        foreach ($rows as $r) {
            // print($r['l1']);

            $ds['stt'] = $i+1;
            $arr = $r['arr_question'];
            $arr = explode(';', $r['arr_question']);
            $ds['tenkhoa'] = $r['tenkhoa'];
            for ($j = 0; $j < $r2; $j++) {
                $tencot = 'l' . $j + 1;
                $ds3['tencot'] = $r[$tencot];
                $ds3['dtb'] = round(intval($r[$tencot]) / count($arr), 2);
                $ds3['tongdiem'] = $r[$tencot];
                //($j == 0)? $t1 =  $ds['tenkhoa']: $t1 =$ds3['dtb'];
               
                //echo $ds3['dtb'].'<br>';
                $xtpl->assign('DANHSACH3',  $ds3);
                $xtpl->parse('main.DANHSACH2.DANHSACH3');
                //tạo dữ liệu array cho chart
                $chart[0] = $ds['tenkhoa'];
                $chart[$j+1] = $ds3['tongdiem'];
                //$chart['label'][$j] =$ds['tenkhoa'];
            }
            //var_dump ($chart['dtb']);
            $chart_data[$i] = $chart;
           // $chart_label[$i] =  $ds['tenkhoa'];
           // $chart_data[$i] = $chart['data'];
            //$new = array_push($chart_label[$i],   $chart);         
            $i++;
            $xtpl->assign('DANHSACH2',  $ds);
            $xtpl->parse('main.DANHSACH2');
        }
        //array_push($stack, "apple", "raspberry");
        //$new[0] = $chart_data;
        //$jsonchart = [$chart_label];
        nv_jsonOutput($chart_data);
        //Báo cáo hạn chế, nguyên nhân, kiến nghị

        $st = "Select * FROM " . TABLE . "_report_details_" . $get['year'] . " as rp 
        JOIN " . TABLE . "_groupuser as kp
        ON rp.account_report = kp.account
        WHERE count = " . $get['count_report'] . " AND rp.status >0 and rp.id_report <=5
        ORDER BY kp.tenkhoa DESC";
        //    print($st);
        $j = 0;
        //$from_to =array();
        $rows = $db->query($st)->fetchALL();

        foreach ($rows as $r) {
            $xtpl->assign('BCHANCHE', $r);
            $xtpl->parse('main.BCHANCHE');
        }

        //     $str = '24/12/2013';
        // $date = DateTime::createFromFormat('d/m/Y', $str);
        // echo $date->format('d/m'); // => 2013-12-24


    }


$xtpl->parse('main.buttons');
/*End Code for Here*/
//truyền biến vào form action
$xtpl->assign('POST', $post);
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $get['year'] . '_' . $get['id_report']);

$func = 'evaluation_form';
$xtpl->assign('link_back', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func);

$xtpl->parse('main');
$contents = $xtpl->text('main');


include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

//Function update evaluation details

//function chart_khuvuc

function chart2($count_report, $year)
{
    global $db;

    $st = "Select * FROM " . TABLE . "_report_details_" . $year . " as rp
    JOIN " . TABLE . "_groupuser as kp
    ON rp.account_report = kp.account    
    WHERE rp.count = " . $count_report . " AND  rp.status >0 and rp.id_report <=5 ORDER BY total_score DESC";
    //echo $st;
    $j = 0;
    //$from_to =array();
    $rows = $db->query($st)->fetchALL();
    // print(count())
    foreach ($rows as $row) {
        $row['stt'] = $j + 1;

        $arr = $row['arr_question'];
        $arr = explode(';', $row['arr_question']);
        $row['dtb'] = round(intval($row['total_score']) / count($arr), 2);

        $data2['label'][$j] = $row['account_report'];
        $data2['data'][$j] = $row['dtb'];
        $j = $j + 1;
    }

    $data_json = array(
        'label' =>  $data2['label'],
        'data' => $data2['data']
    );


    return $data_json;
}

function chart1($account_report, $year)
{
    global $db;

    $st = "Select * FROM " . TABLE . "_report_details_" . $year . " as rp
    JOIN " . TABLE . "_groupuser as kp
    ON rp.account_report = kp.account    
    WHERE account_report = '" . $account_report . "' AND  rp.status >0 and rp.id_report <=5 ORDER BY count asc";
    //echo $st;
    $j = 0;
    //$from_to =array();
    $rows = $db->query($st)->fetchALL();
    // print(count())
    foreach ($rows as $row) {
        $row['stt'] = $j + 1;

        $arr = $row['arr_question'];
        $arr = explode(';', $row['arr_question']);
        $row['dtb'] = round(intval($row['total_score']) / count($arr), 2);

        $data2['label'][$j] = $row['count'];
        $data2['data'][$j] = $row['dtb'];
        $j = $j + 1;
    }

    $data_json = array(
        'label' =>  $data2['label'],
        'data' => $data2['data']
    );


    return $data_json;
}
