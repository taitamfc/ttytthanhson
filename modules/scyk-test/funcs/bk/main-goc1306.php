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

if (empty($user_info)) {
    $url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';
    Header('Location: ' . nv_url_rewrite($url, true));
    exit();
}
	$thongke=array();
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	
	/*Code for Here*/
	//print('test');
	//var_dump('test');
    $post=array();
    $get=array();
    $get['year']=2023;
    $get['count_report']=1;
    $st = "Select * FROM " . TABLE . "_report_details_" . $get['year'] . " as rp 
    JOIN " . TABLE . "_groupuser as kp
    ON rp.account_report = kp.account    
    WHERE rp.count = " . $get['count_report'] . " AND  rp.status >0 and rp.id_report <=5 ORDER BY total_score DESC";
    //print($st);
    $j = 0;
    //$from_to =array();
    $rs = $db->query($st)->fetchALL();
    //echo  $rs[0]['status'];
	//var_dump($st);
	
	
	/*END Code for Here*/
	$xtpl->parse('main');
    // = $xtpl->text('main').var_dump($rs);
    
    $contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
