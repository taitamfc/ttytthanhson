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

// L?y th�ng tin nam m?c d?nh
$st = "Select year FROM " . TABLE . "_setup WHERE set_default = 1";
$row_default = $db->query($st)->fetch();
$get['year']  =  $row_default['year'];

//l?y ra c�c l?n d�nh gi� d� t?o
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

     if (count($rows) <=0 )

     {

        $item['LAN_KP']=$khoaphong;  

        //$item['count']=count($data);

        $data[]= $item;

 

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

    $item['RAND_KP']=$kp;  

    //$item['count']=count($data);

    $data_rand[]= $item;

    

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

    

    count($rows) > 0 ?  nv_jsonOutput($data):nv_jsonOutput($data_rand);

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



//Biểu đồ tỷ lệ xếp loại của khoa phòng

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









//echo  $rs[0]['status'];

//var_dump($rs);





/*END Code for Here*/

$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $get['year']);

$xtpl->parse('main');

$contents = $xtpl->text('main');



include NV_ROOTDIR . '/includes/header.php';

echo nv_site_theme($contents);

include NV_ROOTDIR . '/includes/footer.php';

