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
$arr = array();
// kiem tra link chọn lần đánh giá
$get['idd'] = $nv_Request->get_title('idd', 'get,post', '');
if (!empty($get['idd'])) {
    $get['idd'] = $nv_Request->get_title('idd', 'get,post', '');
    $arr = explode('_', $get['idd']);
    //$get['account_view'] = $arr[0];
    $get['count_report'] = $arr[0];
    $xtpl->assign('hien_bieumau', '');

    $xtpl->assign('hien_nutexcel', '');

    //var_dump( $get['idd']);


    //$xtpl->assign('loi', $get['idd']);

    // print('account_view=' .$get['count_report'] .'----');
} else {
    $xtpl->assign('hien_bieumau', 'hidden');
    $xtpl->assign('hien_nutexcel', 'hidden');
}
// Lấy thông tin năm mặc định
$st = "Select year FROM " . TABLE . "_setup WHERE set_default = 1";
$row_default = $db->query($st)->fetch();
$get['year']  =  $row_default['year'];
// Lấy user đăng nhập
$get['account_view'] = $user_info['username'];
// Lấy tên khoa phòng

$st = "SELECT * FROM " . TABLE . "_groupuser where account like '" . $get['account_view'] . "'";
$row = $db->query($st)->fetch();


$tenkhoaphong = $row['tenkhoa'];
$xtpl->assign('tenkhoa', strtoupper($tenkhoaphong));
$xtpl->assign('nam', $get['year']);

//newcode-----------------------------------------------------------
$st = "Select  * FROM " . TABLE . "_evaluation_" . $get['year'] . "
 WHERE status >0 order by count_evaluation asc";
//print($st);
//var_dump($st);
$ds = $db->query($st)->fetchAll();

if (count($ds) > 0) {

    $xtpl->assign('hien_danhgia', '');
    // print('Hien danh gia');
    foreach ($ds as $row) {
        $token = $get['year'] . '&idd=' . $row['count_evaluation'] . '_' . md5($client_info['session_id'] . $user_info['username']);
        $row['link_landanhgia'] =  MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $token;
        $xtpl->assign('list_count', $row);
        $xtpl->parse('main.list_count');
    }
} else {
    $xtpl->assign('hien_landanhgia', 'hidden'); //an lan danh gia

}

//$xtpl->assign('loi', $get['count_report']);
if (!empty($get['idd']) && !empty($get['count_report'])) {
    //$arr = array();
    $arr['landanhgia'] = $get['count_report'];
    //$xtpl->assign('loi', 'l='. $get['count_report']);


    //print('lan='.$get['count_report']);
    $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $get['year'] . '_' . $get['id_report'] . '&idd=' . $get['count_report']);
    $xtpl->assign('hien_bieumau', '');

    //Lấy thông tin chi tiết đánh giá trong bảng kỳ đánh giá (evaluation)

    $st = "Select  * FROM " . TABLE . "_evaluation_" . $get['year'] . "
 WHERE status >0 and count_evaluation=" . $get['count_report'] . " order by count_evaluation asc";
    $row = $db->query($st)->fetch();

    $arr['tungay'] =  $row['from_date'];
    $arr['denngay'] =  $row['to_date'];
    $arr['hinhthuc'] =  $row['evaluation_type'];
    // Lấy tên report

    $arr['ten_baocao'] = $row['name_report'];

    // Lấy tên đội trưởng
    $leader = '';
    // var_dump($ds['arr_team']);
    $teams = $row['teams'];
    $teams = explode(';', $teams);
    //var_dump($team);
    // $thanhvien = array();
    for ($i = 0; $i < count($teams); $i++) {
        $team = $teams[$i];
        // Giữ lại thành viên Đội Trưởng

        //print($team[0] . "</br>");
        $xtpl->assign('TEAMS',  $team);
        $xtpl->parse('main.TEAMS');
    }
    //$xtpl->assign('loi', 'l='. $teams[0]);

    // Tính tổng số khoa phòng thực tế
    $st = "Select count(id) FROM " . TABLE . "_groupuser where status = 1";
    $row = $db->query($st)->fetch();
    $arr['tc'] =  $row['count(id)'];

    // Tổng số khoa phòng đã đánh giá
    $st = "Select  count(id) FROM " . TABLE . "_report_details_" . $get['year'] . "
    WHERE status >0 AND id_report <=5 AND count =" . $get['count_report'] . " order by count asc";
    // print($st);
    $row = $db->query($st)->fetch();
    $arr['tt'] =  $row['count(id)'];


    $xtpl->assign('THONGTIN', $arr);
    //$xtpl->assign('loi', 'l='. $arr['tungay']);

    // // Dua du lieu vao xep loai
    $st = "Select  max(total_score),min(total_score) ,avg(total_score),count(rating), rating FROM " . TABLE . "_report_details_" . $get['year'] . "
    WHERE id_report <=5 and status >0 and count =" . $get['count_report'] . " group by rating";
    // print($st);

    // var_dump($st);
    $ds = $db->query($st)->fetchAll();
    $xl = array();
    $xl['xl1'] = 0;
    $xl['xl2'] = 0;
    $xl['xl3'] = 0;
    $xl['xl4'] = 0;

    foreach ($ds as $r) {
        if ($r['rating'] == "Rất tốt") $xl['xl1'] = $r['count(rating)'];
        if ($r['rating'] == "Tốt") $xl['xl2'] = $r['count(rating)'];
        if ($r['rating'] == "Trung bình") $xl['xl3'] = $r['count(rating)'];
        if ($r['rating'] == "Yếu") $xl['xl4'] = $r['count(rating)'];
    }
    $xtpl->assign('XL', $xl);

    //Thong tin dtb
    $st = "Select  avg(total_score),max(total_score),min(total_score),count FROM " . TABLE . "_report_details_" . $get['year'] . "
    WHERE id_report <=5 and count =" . $get['count_report'] . " group by count";
    $ds = $db->query($st)->fetch();

    $avg = round($ds['avg(total_score)'], 2);
    ($arr['tt'] > 0) ? $avgch = round($avg / (int)$arr['tt'], 2) : $avgch = 0;
    $max = $ds['max(total_score)'];
    $min = $ds['min(total_score)'];

    //thong tin diemmax, diemmin
    if ($max > 0) {
        $st = "SELECT kp.tenkhoa,kp.account 
        FROM " . TABLE . "_groupuser as kp
        INNER JOIN " . TABLE . "_report_details_" . $get['year'] . " as ds
        ON ds.account_report = kp.account
        WHERE ds.total_score =" . $max . " 
        GROUP BY kp.tenkhoa,kp.account";

        //$xtpl->assign('loi', 'l='. $st);
        $ds = $db->query($st)->fetchAll();
        foreach ($ds as $r) {
            $max_khoaphong = $max_khoaphong . $r['tenkhoa'] . ', ';
        }
        $max_khoaphong = rtrim($max_khoaphong, ', ');
    }


    if ($min > 0) {
        $st = "SELECT kp.tenkhoa,kp.account 
        FROM " . TABLE . "_groupuser as kp
        INNER JOIN " . TABLE . "_report_details_" . $get['year'] . " as ds
        ON ds.account_report = kp.account
        WHERE ds.total_score =" . $min . " 
        GROUP BY kp.tenkhoa,kp.account";
        $ds = $db->query($st)->fetchAll();
        foreach ($ds as $r) {
            $min_khoaphong = $min_khoaphong . $r['tenkhoa'] . ', ';
        }
        $min_khoaphong = rtrim($min_khoaphong, ', ');
    }


    $xtpl->assign('THONGTIN2', array(
        'dtb' => $avg,
        'cauhoidtb' => $avgch,
        'max_khoaphong' => $max_khoaphong,
        'min_khoaphong' => $min_khoaphong
    ));

    // End bảng báo cáo chung
    // Bắt đầu bảng báo cáo chi tiết va bieu do
    $st = "Select * FROM " . TABLE . "_report_details_" . $get['year'] . " as rp 
    JOIN " . TABLE . "_groupuser as kp
    ON rp.account_report = kp.account    
    WHERE rp.count = " . $get['count_report'] . " AND  rp.status >0 and rp.id_report <=5 ORDER BY total_score DESC";
    //print($st);
    $j = 0;
    $dtb_bcct = 0;
    $bcct = array();
    //$from_to =array();
    $rs = $db->query($st)->fetchALL();
    foreach ($rs as $row) {
        $row['stt'] = $j + 1;
        $k = 0;
        $arr = $row['arr_question'];
        $arr = explode(';', $row['arr_question']);
        $row['dtb'] = round(intval($row['total_score']) / count($arr), 2);
        $bcct['tongdiem'] = $bcct['tongdiem'] + $row['total_score'];
        $bcct['dtb'] = $row['dtb'] + $bcct['dtb'];
        // print('l='. count($arr));     

        // Lấy tên đội trưởng
        $leader = '';
        // var_dump($ds['arr_team']);
        $team = $row['arr_team'];
        $teams = explode(';', $team);
        for ($i = 0; $i < count($teams); $i = $i + 1) {

            $team = explode('-', $teams[$i]);
            // Giữ lại thành viên Đội Trưởng
            if ($team[1] = "Đội Trưởng") {
                $leader = $team[0];
            }
            // print($team[0] . "</br>");
        }
        $row['doitruong'] = $leader;

        $data = array(
            'labels' => [$row['tenkhoa']],
            'data' => [$row['dtb']]
        );
        $data2['label'][$j] = $row['tenkhoa'];
        $data2['data'][$j] = $row['dtb'];
        $j = $j + 1;

        $ds_re =  explode('-',  $row['recommendation']);
        //lấy ra recomend đầu tiên
        $row['re'] = $ds_re[1];
        unset($ds_re[0]);
        unset($ds_re[1]);


        $arr = array();
        foreach ($ds_re as $rs) {
            $k++;
            $arr['re'] = ltrim($rs, ' ');
            if ($k == count($ds_re)) {
                $arr['bottom'] = 'thin';
                $arr['class'] = 'tieumuc3';
            } else {
                $arr['class'] = 'tieumuc4'; //đóng viền khung bên phải
                $xtpl->assign('DSRE', $arr);
            }
            $xtpl->parse('main.DANHSACH.DSRE');
            //echo '$k='.$k. ' bt='.$arr['bottom'];
            $l++;
        }

        $row['sodong'] = count($ds_re) + 1;
        $row['sodonglui'] = 1; //dòng đầu tiên của recommend
        //echo  count($ds_re).'<br>'.$k-1;
        $xtpl->assign('DANHSACH', $row);
        $xtpl->parse('main.DANHSACH');
    }

    //lây dtb toàn viện
    $bcct['dtb'] = round(intval($bcct['dtb']) / $j, 2);
    $bcct['tongdiem'] =   round(intval($bcct['tongdiem']) / $j, 0);
    //xep loai theo dtb toan vien
    if ($bcct['tongdiem'] >= 90 && $bcct['tongdiem'] <= 100)
        $bcct['xl'] = 'Rất tốt';
   
    if ($bcct['tongdiem'] >= 70 && $bcct['tongdiem'] <= 89)
    $bcct['xl'] = 'Tốt';
    
    if ($bcct['tongdiem'] >= 50 && $bcct['tongdiem'] <= 69)
    $bcct['xl'] = 'Trung bình';
  
    if ($bcct['tongdiem'] <= 49)
    $bcct['xl'] = 'Yếu';    
   
    $xtpl->assign('BCCT',  $bcct);


    $data = json_encode($data2['data']);
    $label = json_encode($data2['label']);

    $xtpl->assign('DATA', $data);
    $xtpl->assign('LABEL', $label);
    // End bảng báo cáo chi tiết
    // Bắt đầu bảng báo cáo chung  

    $st = "Select  * FROM " . TABLE . "_evaluation_" . $get['year'] . "
    WHERE status >0 and count_evaluation=" . $get['count_report'] . " order by count_evaluation asc";
    //$xtpl->assign('loi', 'l='. $st);
    //echo $st;
    $tencot = ''; // cột dữ liệu lần đánh giá trong bảng crosstable
    $socot = 0;
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

        $xtpl->assign('LAN', $row);
        $xtpl->parse('main.LAN');
        $xtpl->assign('NGAY',  $from_to);
        $xtpl->parse('main.NGAY');
    }


    // Tạo bảng crosstable khu vực
    // Tạo câu lệnh SELECT động với các cột account_report 
    $socot = $r2 + 3;
    $xtpl->assign('SOCOTBC',  $socot);
    //echo 'sc='.$socot;
    ($socot <= 4) ?  $xtpl->assign('STYLE', 'style="width: 50%;"') : $xtpl->assign('STYLE', 'style="width: 100S%;"');
    $tencot = rtrim($tencot, ',');
    $dscot = ltrim($dscot, '+');
    //echo $dscot;
    $st = "
    DROP TABLE IF EXISTS " . TABLE . "_report_crosstable_" . $get['year'] . ";
    CREATE TABLE " . TABLE . "_report_crosstable_" . $get['year'] . " 
    SELECT     
    rp.count,rp.account_report, kp.tenkhoa, rp.arr_question," . $tencot .
        " FROM " . TABLE . "_report_details_" . $get['year'] . " as rp
    JOIN " . TABLE . "_groupuser as kp
    ON rp.account_report = kp.account
    WHERE rp.status >0 and rp.id_report <=5
    GROUP BY rp.count,kp.tenkhoa, rp.account_report,  rp.arr_question
    ORDER BY kp.tenkhoa DESC";
    //$xtpl->assign('loi', 'l='. $st);
    $count = $db->exec($st);

    //Lấy dữ liệu trong bảng crosstable đưa vào bảng báo cáo chung
    $st = "Select *," . $dscot . " as total  FROM " . TABLE . "_report_crosstable_" . $get['year'] . " 
    WHERE count  =" . $get['count_report'] . " ORDER BY total DESC";
    //$xtpl->assign('loi', 'l='. $st);
    $ds = array();
    $rows = $db->query($st)->fetchALL();
    $i = 1;

    foreach ($rows as $r) {
        $arr_th = array(); //mảng lưu dtb
        // print($r['l1']);
        $ds['stt'] = $i;
        $arr = $r['arr_question'];
        $arr = explode(';', $r['arr_question']);

        $ds['tenkhoa'] = $r['tenkhoa'];
        $tencot = 'test';
        for ($j = 0; $j < $r2; $j++) {
            //lưu ý host ko hieu $j+1
            $tencot = 'l' . ++$j;
            $ds3['tencot'] = $r[$tencot];
            $ds3['dtb'] = round(intval($r[$tencot]) / count($arr), 2);
            $ds3['tongdiem'] = $r[$tencot];
            $arr_th = $ds3['dtb'];
            //$ds3['socot'] = $socot;
            //echo $ds3['dtb'].'<br>';
            $xtpl->assign('DANHSACH3',  $ds3);
            $xtpl->parse('main.DANHSACH2.DANHSACH3');
        }
        //$xtpl->assign('loi', 'l='. $tencot);
        $i++;

        $xtpl->assign('DANHSACH2',  $ds);
        $xtpl->parse('main.DANHSACH2');
        //var_dump (sum($arr_t));
        //print ("</br>");
    }


    //Báo cáo hạn chế, nguyên nhân, kiến nghị
    $st = "Select * FROM " . TABLE . "_report_details_" . $get['year'] . " as rp 
    JOIN " . TABLE . "_groupuser as kp
    ON rp.account_report = kp.account
    WHERE count = " . $get['count_report'] . " AND rp.status >0 and rp.id_report <=5
    ORDER BY total_score DESC";

    $rows = $db->query($st)->fetchALL();

    $k = 0;

    foreach ($rows as $row) {
        $k++;
        $j = 0;
        //danh sách đề xuất ,kiến nghị
        $ds_re =  explode('-',  $row['recommendation']);
        $ds_limit =  explode('-',  $row['limitation']);
        $ds_person =  explode('-',  $row['personnel']);
        $ds_ass =  explode('-',  $row['assignment']);
        $ds_main =  explode('-',  $row['main_responsibility']);
        $ds_note =  explode('-',  $row['note']);
        unset($ds_re[0]);
        unset($ds_limit[0]);
        //unset($ds_person[0]);
        //if (count( $ds_person) > 1) unset($ds_person[0]);
        unset($ds_ass[0]);
        unset($ds_main[0]);
        unset($ds_limit[0]);
        unset($ds_note[0]);

        //danh sach khen thuong, ky luat


        $rowcount = max(count($ds_re), count($ds_limit), count($ds_person), count($ds_ass), count($ds_main), count($ds_note)); //lấy ra số dòng lớn nhất
        $arr = array();
        for ($i = 1; $i <= $rowcount; $i++) {

            ($i <= count($ds_re)) ? $arr['re'] = '- ' . ltrim($ds_re[$i], ' ') : $arr['re'] = ''; // đưa dấu gạch - đầu mỗi hàng, có loại bỏ hàng trống
            ($i <= count($ds_limit)) ? $arr['limit'] = '- ' . ltrim($ds_limit[$i], ' ') : $arr['limit'] = '';
            //($i <= count($ds_person)) ? $arr['person'] = '- ' . ltrim($ds_person[$i], ' ') : $arr['person'] = '';
            $arr['person'] = ltrim($ds_person[$i], ' ');
            ($i <= count($ds_ass)) ? $arr['ass'] = '- ' . ltrim($ds_ass[$i], ' ') : $arr['ass'] = '';
            ($i <= count($ds_main)) ? $arr['main'] = '- ' . ltrim($ds_main[$i], ' ') : $arr['main'] = '';
            ($i <= count($ds_note)) ? $arr['note'] = '- ' . ltrim($ds_note[$i], ' ') : $arr['note'] = '';


            if ($i == 1) {
                $arr['stt'] = '<th class="tieumuc51" data-b-a-s="thin" data-f-bold="true"
                style="vertical-align: middle;"  data-a-h="center" data-t="n"
                data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" rowspan=' . $rowcount . '>' . $k .
                    '</th>';

                $arr['tenkhoa'] = '<td class="tieumuc51" data-b-a-s="thin"
                style="vertical-align: middle;"  
                data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" data-a-wrap="true" colspan ="2" rowspan=' . $rowcount . '>' . $row['tenkhoa'] .
                    '</td>';

                $arr['time'] = '<td class="tieumuc51" data-b-a-s="thin"
                style="vertical-align: middle;"  
                data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" data-a-wrap="true" colspan ="1" rowspan=' . $rowcount . '>' . $row['completion_time'] .
                    '</td>';
            } else {
                $arr['tenkhoa'] = '';
                $arr['stt'] = '';
                $arr['time'] = '';
                //($i ==count($rowcount))?$arr['bottom'] = 'thin':'';
            }
            if ($i == $rowcount) {
                $arr['bottom'] = 'thin';
                $arr['class'] = 'tieumuc54'; //dong cuoi//đóng viền khung bên phải
                $arr['sodong'] = $rowcount;
            } else

                $arr['class'] = 'tieumuc53';
            $xtpl->assign('DSHANCHE', $arr);
            $xtpl->parse('main.BCHANCHE.DSHANCHE');
        }
        //$row['sodong'] = count($ds_re) + 1;
        $row['sodong'] = 3;
        $row['sodonglui'] = 1; //dòng đầu tiên của recommend
        //echo  count($ds_re).'<br>'.$k-1;
        $xtpl->assign('BCHANCHE', $row);
        $xtpl->parse('main.BCHANCHE');
    }
}




//end code------------------------------------------------------------



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
