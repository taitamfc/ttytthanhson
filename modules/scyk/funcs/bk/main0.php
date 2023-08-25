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





//Biểu đồ khoa phòng theo từng lần đánh giá (Biểu đồ 2)-SCYK

if ($nv_Request->get_title('act', 'get,post', '') == 'get_dskhoaphong') {
   
    $st = "Select kpbc,count(id) as value FROM " . TABLE . "_voted_result_a 
    group by kpbc order by kpbc desc ";

    $rows = $db->query($st)->fetchALL();


    foreach ($rows as $r) {

        $item['label'] = $r['kpbc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
        $item['value'] = $r['value']; //format(ROUND(total_score/50, 2),2)        
        $data[] = $item;
    }
    nv_jsonOutput($data);

    //test xuất biến ra form
    //$xtpl->assign('link_test', $data);
}


//Biểu đồ tỷ lệ xếp loại của khoa phòng - biẻu đồ 1
if ($nv_Request->get_title('act', 'get,post', '') == 'get_tlhtbcsuco') {
    $st = "Select htbc,count(id) as value FROM " . TABLE . "_voted_result_a             
            WHERE  status >0 group by htbc";

    $rows = $db->query($st)->fetchALL();
    foreach ($rows as $r) {

        $item['label'] = $r['htbc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
        $item['value'] = $r['value'];
        $data[] = $item;
    }
    //var_dump($data);
    nv_jsonOutput($data);
}

//bieu do 3

if ($nv_Request->get_title('act', 'get,post', '') == 'get_tldoituong') {
    $st = "Select doituongsc,count(id) as value FROM " . TABLE . "_voted_result_a             
            WHERE  status >0 group by doituongsc";

    $rows = $db->query($st)->fetchALL();
    foreach ($rows as $r) {

        $item['label'] = $r['doituongsc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
        $item['value'] = $r['value'];
        $data[] = $item;
    }
    //var_dump($data);
    nv_jsonOutput($data);
}


//bieu do 4

if ($nv_Request->get_title('act', 'get,post', '') == 'get_tldgbandau') {
    $st = "Select dgbd,count(id) as value FROM " . TABLE . "_voted_result_a             
            WHERE  status >0 group by dgbd";

    $rows = $db->query($st)->fetchALL();
    foreach ($rows as $r) {

        $item['label'] = $r['dgbd']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
        $item['value'] = $r['value'];
        $data[] = $item;
    }
    //var_dump($data);
    nv_jsonOutput($data);
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
