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

//Lấy ra thông tin BC
//lấy ra ngày đầu tiên và cuối cùng trong năm hiện tại
$year = date('y'); // Specify the desired year

// Create a DateTime object for the first day of the year
$firstDayOfYear = new DateTime("$year-01-01");

// Create a DateTime object for the last day of the year
$lastDayOfYear = new DateTime("$year-12-31");

$tg_tungay=$firstDayOfYear->format('d-m-Y');
$tg_denngay=$lastDayOfYear->format('d-m-Y');

$xtpl->assign('BC', array(
    'tungay' =>  $tg_tungay,
    'denngay' => $tg_denngay
));
show_chart();

//kiểm tra bấm nút find-tìm kiếm

if (isset($_POST['btn_find'])) { //cách này thường dùng khi bấm submit form ko dùng ajax

    $st = "SELECT * FROM " . TABLE . "_vote_config where status =1";
    $row_op = $db->query($st)->fetch();
    //var_dump($st);
    // Đưa dữ liệu vào kỳ đánh giá
    $items = $row_op['loaibc'];
    $items = explode(';', $items);
    //var_dump($items);  

    $tg_tungay = $nv_Request->get_title('tg_tungay', 'get,post', 0);
    $datef = strtotime($tg_tungay);
    $fromdate = date("Y/m/d",  $datef);
    $tg_denngay = $nv_Request->get_title('tg_denngay', 'get,post', 0);
    $datet = strtotime($tg_denngay);
    $todate = date("Y/m/d",  $datet);
    (!empty($fromdate) && !empty($todate)) ?
        $check = "WHERE  status >0 AND DATE(thoigian) BETWEEN " . "'" . $fromdate . "'" . " and " . "'" . $todate . "' "
        : $check = '';

    $xtpl->assign('BC', array(
        'tungay' =>  $tg_tungay,
        'denngay' => $tg_denngay

    ));
    //echo  $check;

    show_chart();
}



//Biểu đồ khoa phòng theo từng lần đánh giá (Biểu đồ 2)-SCYK
function show_chart()
{

    global $db, $nv_Request;
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_dskhoaphong') {
        $check = filter_chart();

        $st = "Select kpbc,count(id) as value FROM " . TABLE . "_voted_result_a 
    " . $check . "
    group by kpbc order by value desc ";

        $rows = $db->query($st)->fetchALL();


        foreach ($rows as $r) {

            if ($r['kpbc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['kpbc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value']; //format(ROUND(total_score/50, 2),2)        
                $data[] = $item;
            }
        }
        nv_jsonOutput($data);

        //test xuất biến ra form
        //$xtpl->assign('link_test', $data);
    }
//----------------------------------------------------------------------------------------------------
    //Biểu đồ số 1b:
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_plnhomsuco') {
        global $xtpl;
        $check = filter_chart();       
        $st = "SELECT
        SUM(CASE WHEN qtkt IS NOT NULL THEN 1  END) as 'Thực hiện quy trình kỹ thuật, thủ thuật chuyên môn' ,
        SUM(CASE WHEN nkbv IS NOT NULL THEN 1  END) AS 'Nhiễm khuẩn bệnh viện',
        SUM(CASE WHEN thuocdt IS NOT NULL THEN 1   END) AS 'Thuốc và dịch truyền' ,
        SUM(CASE WHEN maucp IS NOT NULL THEN 1   END) AS 'Máu và chế phẩm' ,
        SUM(CASE WHEN tbyt IS NOT NULL THEN 1  END) AS 'Trang thiết bị y tế' ,
        SUM(CASE WHEN hanhvi IS NOT NULL THEN 1  END) AS 'Hành vi',  
        SUM(CASE WHEN tenga IS NOT NULL THEN 1   END) AS 'Tai nạn đối với người bệnh' ,
        SUM(CASE WHEN hatangcs IS NOT NULL THEN 1   END) AS 'Hạ tầng cơ sở',   
        SUM(CASE WHEN nguonluctc IS NOT NULL THEN 1   END) AS 'Quản lý nguồn lực, tổ chức' ,
        SUM(CASE WHEN hosotl IS NOT NULL THEN 1   END) AS 'Hồ sơ tài liệu, thủ tục hành chính', 
        SUM(CASE WHEN sckdc IS NOT NULL THEN 1   END) AS 'Khác'         

        FROM  " . TABLE . "_voted_result_a
        " . $check . "


        ";

       
        // Execute the query
        $stmt = $db->query($st);

        // Fetch column names
        $columns = [];
        for ($i = 0; $i < $stmt->columnCount(); $i++) {
            $col = $stmt->getColumnMeta($i);         
            $columns[] = $col['name'];
        }

        // Fetch data
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display column names and data
        foreach ($columns as $column) {
            //echo "$column: " . $data[$column] . "<br>";

            if ($column !== null && $data[$column] !== NULL) {

            $item['label'] = ucfirst($column); //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
            $item['value'] = $data[$column];
            $data_chart[] = $item;
            }

        }
       
        nv_jsonOutput($data_chart);

        //test xuất biến ra link_testform
        //$xtpl->assign('TEST_DATA', $data);
    }
//----------------------------------------------------------------------------------------------------

     //Biểu đồ số 2b:
     if ($nv_Request->get_title('act', 'get,post', '') == 'get_plnguyenhan') {
        global $xtpl;
        $check = filter_chart();       
        $st = "SELECT
        SUM(CASE WHEN nhanvien IS NOT NULL THEN 1  END) as 'Nhân viên' ,
        SUM(CASE WHEN nguoibenh IS NOT NULL THEN 1  END) AS 'Người bệnh',
        SUM(CASE WHEN moitruong IS NOT NULL THEN 1   END) AS 'Môi trường' ,
        SUM(CASE WHEN tochucdv IS NOT NULL THEN 1   END) AS 'Tổ chức dịch vụ' ,
        SUM(CASE WHEN tbyt IS NOT NULL THEN 1  END) AS 'Yếu tố bên ngoài' ,      
        SUM(CASE WHEN ytkdc IS NOT NULL THEN 1   END) AS 'Khác'         

        FROM  " . TABLE . "_voted_result_a
        " . $check . "


        ";

       
        // Execute the query
        $stmt = $db->query($st);

        // Fetch column names
        $columns = [];
        for ($i = 0; $i < $stmt->columnCount(); $i++) {
            $col = $stmt->getColumnMeta($i);         
            $columns[] = $col['name'];
        }

        // Fetch data
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display column names and data
        foreach ($columns as $column) {
            //echo "$column: " . $data[$column] . "<br>";

            if ($column !== null && $data[$column] !== NULL) {

            $item['label'] = ucfirst($column); //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
            $item['value'] = $data[$column];
            //$item['bieudo2b'] = 'bieudo2b';
            $data_chart[] = $item;
            }

        }
       
        nv_jsonOutput($data_chart);

        //test xuất biến ra link_testform
        //$xtpl->assign('TEST_DATA', $data);
    }

//----------------------------------------------------------------------------------------------------
    //Biểu đồ tỷ lệ xếp loại của khoa phòng - biẻu đồ 1
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_tlhtbcsuco') {
        $check = filter_chart();


        $st = "Select htbc,count(id) as value FROM " . TABLE . "_voted_result_a             
    " . $check . "
    group by htbc";

        //echo($st);

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['htbc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['htbc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
    }
//----------------------------------------------------------------------------------------------------
    //bieu do 3

    if ($nv_Request->get_title('act', 'get,post', '') == 'get_tldoituong') {
        $check = filter_chart();
        $st = "Select doituongsc,count(id) as value FROM " . TABLE . "_voted_result_a             
    " . $check . " 
    group by doituongsc";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['doituongsc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['doituongsc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
    }
//----------------------------------------------------------------------------------------------------

    //bieu do 4

    if ($nv_Request->get_title('act', 'get,post', '') == 'get_tldgbandau') {
        $check = filter_chart();
        $st = "Select dgbd,count(id) as value FROM " . TABLE . "_voted_result_a             
    " . $check . " 
    group by dgbd";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['dgbd'] !== null && $r['value'] !== null) {

                $item['label'] = $r['dgbd']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
    }
//----------------------------------------------------------------------------------------------------
    //bieu do 5

    if ($nv_Request->get_title('act', 'get,post', '') == 'get_doituongbc') {
        $check = filter_chart();
        $st = "Select doituongbc,count(id) as value FROM " . TABLE . "_voted_result_a             
    " . $check . " 
    group by doituongbc";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {
            if ($r['doituongbc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['doituongbc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                //$item['test'] = $r['value'];

                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
    }
//----------------------------------------------------------------------------------------------------

    //bieu do 3b

    if ($nv_Request->get_title('act', 'get,post', '') == 'get_mucdott_nb3b') {
        $check = filter_chart();
    //     $st = "Select mucdott_bn,count(id) as value FROM " . TABLE . "_voted_result_a             
    // " . $check . " 
    // group by mucdott_bn";
    $st= "SELECT
    CASE
        WHEN mucdott_nb IN ('A') THEN 'Chưa xảy ra (NC0)'
        
        WHEN mucdott_nb IN ('B','C', 'D') THEN 'Tổn thương nhẹ[1] (NC1)'

        WHEN mucdott_nb IN ('E', 'F') THEN 'Tổn thương trung bình[2] (NC2)'

        WHEN mucdott_nb IN ('G', 'H', 'I') THEN 'Tổn thương nặng[3] (NC3)'
       
        END AS labels,
        COUNT(id) AS vls
    FROM " . TABLE . "_voted_result_b 
    " . $check . " 
    GROUP BY labels
    HAVING labels IS NOT NULL";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['labels'] !== null && $r['vls'] !== null) {

                $item['label'] = $r['labels']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['vls'];
                //$item['bieudo6'] = $r['values'];
                //$item['st'] = $st;

                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
        //die;
    }
    //----------------------------------------------------------------------------------------------------

    //biểu đồ 4b
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_mucdott_tc4b') {
        $check = filter_chart();
    //     $st = "Select mucdott_bn,count(id) as value FROM " . TABLE . "_voted_result_a             
    // " . $check . " 
    // group by mucdott_bn";
        $st = "SELECT mucdott_tc, count(id) as value FROM " . TABLE . "_voted_result_b
        " . $check . "
    group by mucdott_tc";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['mucdott_tc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['mucdott_tc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                //$item['bieudo4b'] = $r['value'];
                //$item['st'] = $st;

                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
        //die;
    }

    //biểu đồ 6
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_mucdott_nb') {
        $check = filter_chart();
    //     $st = "Select mucdott_bn,count(id) as value FROM " . TABLE . "_voted_result_a             
    // " . $check . " 
    // group by mucdott_bn";
    //     $st = "SELECT mucdott_nb, count(id) as value FROM " . TABLE . "_voted_result_a 
    //     " . $check . "
    // group by mucdott_nb";
    $st= "SELECT
    CASE
        WHEN mucdott_nb IN ('A') THEN 'Chưa xảy ra (NC0)'
        
        WHEN mucdott_nb IN ('B','C', 'D') THEN 'Tổn thương nhẹ[1] (NC1)'

        WHEN mucdott_nb IN ('E', 'F') THEN 'Tổn thương trung bình[2] (NC2)'

        WHEN mucdott_nb IN ('G', 'H', 'I') THEN 'Tổn thương nặng[3] (NC3)'
       
        END AS labels,
        COUNT(id) AS vls
    FROM " . TABLE . "_voted_result_a 
    " . $check . " 
    GROUP BY labels
    HAVING labels IS NOT NULL";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['labels'] !== null && $r['vls'] !== null) {

                $item['label'] = $r['labels']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['vls'];
                //$item['bieudo6'] = $r['values'];
                //$item['st'] = $st;

                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
        //die;
    }
}



function filter_chart()
{
    global $nv_Request;
    $tg_tungay = $nv_Request->get_title('tungay', 'get,post', '');
    $datef = strtotime($tg_tungay);
    $fromdate = date("Y/m/d",  $datef);
    $tg_denngay = $nv_Request->get_title('denngay', 'get,post');
    $datet = strtotime($tg_denngay);
    $todate = date("Y/m/d",  $datet);
    if (empty($tg_tungay) && empty($tg_denngay))

        $check = "";
    else
        $check = "WHERE  status >0 AND DATE(thoigian) BETWEEN " . "'" . $fromdate . "'" . " and " . "'" . $todate . "' ";

    return  $check;
}

//echo  $rs[0]['status'];
//var_dump($rs);


/*END Code for Here*/
//$xtpl->assign('testcode','test');

$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
