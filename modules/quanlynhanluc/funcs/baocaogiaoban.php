<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_QLNL')) {
    die('Stop!!!');
}

$OAThemeHelper = oa_load_model('OAThemeHelper');
$OABaoCaoGiaoBan = oa_load_model('OABaoCaoGiaoBan');
$page_title = 'Báo cáo giao ban';


$data = $OABaoCaoGiaoBan->paginate(10,[
    'layout' => 'admin_index',
]);
$items = $data['items'];
$items = $OABaoCaoGiaoBan->format_items($items);
// VIEW
$xtpl = $OAThemeHelper->setView($op. '.tpl');

// Phan trang
$page = $nv_Request->get_int('page', 'post,get', 1);
$generate_page = nv_generate_page($OAThemeHelper->home_url, $data['totalCount'], $data['pageLimit'], $page);
if (! empty($generate_page)) {
    $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
    $xtpl->parse('main.generate_page');
}
$OAThemeHelper->renderItemsFromArray($xtpl,$items,'item','main.items');
$xtpl->assign('F', $_REQUEST);


$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
