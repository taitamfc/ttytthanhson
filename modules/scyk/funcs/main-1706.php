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

// Lấy thông tin năm mặc định
$st = "Select year FROM " . TABLE . "_setup WHERE set_default = 1";
$row_default = $db->query($st)->fetch();
$get['year']  =  $row_default['year'];

//lấy ra các lần đánh giá đã tạo
$st = "SELECT count_evaluation FROM " . TABLE . "_evaluation_" . $get['year'];
$rows = $db->query($st)->fetchALL();
foreach ($rows as $row) {
    $xtpl->assign('LANDG', $row);
    $xtpl->parse('main.LANDG');
}

//lấy ra các khoa phòng
$st = "SELECT id,account FROM " . TABLE . "_groupuser 
    WHERE id_nhomquyen <>101 
    ORDER BY id asc ";
//print($st);
$rows = $db->query($st)->fetchALL();
$kp =   array();
$kp1 = array();
$kp2 = array();
$kp3 = array();
foreach ($rows as $row) {
    //kiểm tra id để chia làm 3 hàng
    //print($row['id']);
    $kp[] = $row['account'];
    if ($row['id'] <= 8) {
        $xtpl->assign('KHOAPHONG1', $row);
        $xtpl->parse('main.KHOAPHONG1');
    } elseif ($row['id'] > 8 && $row['id'] <= 15) {
        $xtpl->assign('KHOAPHONG2', $row);
        $xtpl->parse('main.KHOAPHONG2');
    } else {

        $xtpl->assign('KHOAPHONG3', $row);
        $xtpl->parse('main.KHOAPHONG3');
    }
}




//Biểu đồ tổng hợp các lần đánh giá theo  khoa phòng  (Biểu đồ 3)

if ($nv_Request->get_title('act', 'get,post', '') == 'get_khoaphong_lan') {
    $khoaphong = $nv_Request->get_title('kp', 'get,post', ''); //trả về rỗng nếu ko có giá trị

    $st = "Select account_report,count,created_date,total_score,rating FROM " . TABLE . "_report_details_" . $get['year'] . " as rp 
        JOIN " . TABLE . "_groupuser as kp
        ON rp.account_report = kp.account    
        WHERE rp.account_report ='" . $khoaphong . "' and rp.status >0 and rp.id_report <=5 ORDER BY total_score DESC";


    $rows = $db->query($st)->fetchALL();

    //kiểm tra dữ liệu khoa phòng đã có đánh gia
    if (count($rows) <= 0) {
        $item['LAN_KP'] = $khoaphong;
        //$item['count']=count($data);
        $data[] = $item;
    }



    foreach ($rows as $r) {

        $item['y'] = $r['count']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
        $item['dtb'] = $r['total_score'];
        $item['ngay'] = $r['created_date'];
        $item['xl'] = $r['rating'];
        $item['KP'] = $khoaphong;
        $item['LAN_KP'] = $khoaphong;
        $data[] = $item;
    }
    nv_jsonOutput($data);
}
//bieu do 3-random khoa phong
if ($nv_Request->get_title('act', 'get,post', '') == 'get_khoaphong_rand') {
    $k = array_rand($kp);
    $kp = $kp[$k];
    //$kp='ksbt';
    $item['RAND_KP'] = $kp;
    //$item['count']=count($data);
    $data_rand[] = $item;

    $st = "Select account_report,count,created_date,total_score,rating FROM " . TABLE . "_report_details_" . $get['year'] . " as rp 
        JOIN " . TABLE . "_groupuser as kp
        ON rp.account_report = kp.account    
        WHERE rp.account_report ='" . $kp . "' and rp.status >0 and rp.id_report <=5 ORDER BY total_score DESC";
    //lấy random kp để vẽ biểu đồ khi load trang    

    $rows = $db->query($st)->fetchALL();

    //echo count($rows);
    foreach ($rows as $r) {

        $item['y'] = $r['count'];
        $item['dtb'] = $r['total_score'];
        $item['ngay'] = $r['created_date'];
        $item['xl'] = $r['rating'];
        $item['KP'] = $kp;
        $item['RAND_KP'] = $kp;
        $item['count_rs'] = count($rows);
        $data[] = $item;
    }

    count($rows) > 0 ?  nv_jsonOutput($data) : nv_jsonOutput($data_rand);
}


//Biểu đồ khoa phòng theo từng lần đánh giá (Biểu đồ 2)

if ($nv_Request->get_title('act', 'get,post', '') == 'get_dskhoaphong') {
    $num = $nv_Request->get_title('num', 'get,post', ''); //trả về rỗng nếu ko có giá trị 
    //(empty($num))? 1:$num = $nv_Request->get_title('num', 'get,post');
    $st = "Select account_report,total_score FROM " . TABLE . "_report_details_" . $get['year'] . " as rp 
        JOIN " . TABLE . "_groupuser as kp
        ON rp.account_report = kp.account    
        WHERE rp.count = " . $num . " AND  rp.status >0 and rp.id_report <=5 ORDER BY total_score DESC";

    $rows = $db->query($st)->fetchALL();


    foreach ($rows as $r) {

        $item['label'] = $r['account_report']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
        $item['value'] = $r['total_score'];
        $item['LAN_DG'] = $num;
        $data[] = $item;
    }
    nv_jsonOutput($data);

    //test xuất biến ra form
    //$xtpl->assign('link_test', 'test_frm');
}

//Biểu đồ tỷ lệ xếp loại của khoa phòng - biẻu đồ 3
if ($nv_Request->get_title('act', 'get,post', '') == 'get_tlkhoaphong') {
    $st = "Select rating,count(rating) as value FROM " . TABLE . "_report_details_" . $get['year'] . " as rp             
            WHERE  rp.status >0 and rp.id_report <=5 group by rating";

    $rows = $db->query($st)->fetchALL();
    foreach ($rows as $r) {

        $item['label'] = $r['rating']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
        $item['value'] = $r['value'];
        $data[] = $item;
    }
    //var_dump($data);
    nv_jsonOutput($data);
}

//Biểu đồ khoa phòng theo các lần đánh giá khác nhau - biẻu đồ 1
if ($nv_Request->get_title('act', 'get,post', '') == 'get_thkhoaphong') {

    //Lấy dữ liệu từ ngày đến ngày
    $st = "Select  count,from_date, to_date FROM " . TABLE . "_report_details_" . $get['year'] . " 
     WHERE status >0 and id_report <=5 
     GROUP BY count,from_date, to_date
     ORDER BY count ASC";
    //echo $st;
    $tencot = ''; // cột dữ liệu lần đánh giá trong bảng crosstable
    $dscot = '';
    $from_to = array();
    $r2 = 0;
    $rows = $db->query($st)->fetchALL();
    for ($r = 0; $r < count($rows); $r++) {
        $r2 = $r + 1;
        $dscot = $dscot . '+IFNULL(l' . $r2 . ',0)';
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

        //$item['count'] = $rows[$r]['count'];
        //$item['to_date'] = $rows[$r]['to_date'];
        //$item['from_date'] = $rows[$r]['from_date'];
        //$data[] = $item;
    }


    // Tạo bảng crosstable khu vực


    // Tạo câu lệnh SELECT động với các cột account_report
    $tencot = rtrim($tencot, ',');
    $dscot = ltrim($dscot, '+');
    $st = "
        DROP TABLE IF EXISTS " . TABLE . "_report_crosstable_" . $get['year'] . ";
        CREATE TABLE IF NOT EXISTS " . TABLE . "_report_crosstable_" . $get['year'] . " 
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

    //Lấy dữ liệu trong bảng crosstable
    $st = "Select *," . $dscot . " as total   FROM " . TABLE . "_report_crosstable_" . $get['year'] . " 
      ORDER BY total DESC";
    // print($st);
    $ds = array();
    $rows = $db->query($st)->fetchALL();

    $i = 0;
    foreach ($rows as $r) {
        // print($r['l1']);

        $ds['stt'] = $i + 1;
        $arr = $r['arr_question'];
        $arr = explode(';', $r['arr_question']);
        $ds['tenkhoa'] = $r['tenkhoa'];
        for ($j = 0; $j < $r2; $j++) {
            $tencot = 'l' . $j + 1;
            $ds3['tencot'] = $r[$tencot];
            $ds3['dtb'] = round(intval($r[$tencot]) / count($arr), 2);
            $ds3['tongdiem'] = $r[$tencot];

            //tạo dữ liệu array cho chart
            $chart[0] = $ds['tenkhoa'];
            $chart[$j + 1] = $ds3['tongdiem'];


            $item['khoa'] = $r['account_report'];
            $item[$tencot] = $r[$tencot];
            //$item['from_date'] = $rows[$r]['from_date'];
        }



        $data[] = $item;


        $chart_data[$i] = $chart;

        $i++;
    }

    //xuat json ra bieu do
    nv_jsonOutput($data);
}



//echo  $rs[0]['status'];
//var_dump($rs);


/*END Code for Here*/
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $get['year']);
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
