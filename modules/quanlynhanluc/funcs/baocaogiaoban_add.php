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
// CONTROLLER
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $data = [
        'title' => trim($_REQUEST['title']), 
        'truc_lanh_dao' => trim($_REQUEST['truc_lanh_dao']),
        'truc_bac_sy' => trim($_REQUEST['truc_bac_sy']),
        'tinh_hinh_benh_nhan' => json_encode($_REQUEST['tinh_hinh_benh_nhan']),
        'hoat_dong_dieu_tri' => json_encode($_REQUEST['hoat_dong_dieu_tri']),
        'benh_nhan_theo_doi' => json_encode($_REQUEST['benh_nhan_theo_doi']),
    ];
    $OABaoCaoGiaoBan->save($data);
    $OAThemeHelper->redirectOp('baocaogiaoban');
}


$page_title = 'Thêm báo cáo giao ban';
// VIEW
$xtpl = $OAThemeHelper->setView($op.'.tpl');
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
