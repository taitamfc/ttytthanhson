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
$id = $nv_Request->get_int('id', 'post,get', 0);
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
        'benh_nhan_mo_cap_cuu' => $_REQUEST['benh_nhan_mo_cap_cuu'],
        'benh_nhan_mo_phien' => $_REQUEST['benh_nhan_mo_phien'],
        'benh_nhan_chuyen_tuyen' => $_REQUEST['benh_nhan_chuyen_tuyen'],
    ];
    if($id){
        $OABaoCaoGiaoBan->update($id,$data);
    }else{
        $OABaoCaoGiaoBan->save($data);
    }
    $OAThemeHelper->redirectOp('baocaogiaoban');
}

if($id){
    $item = $OABaoCaoGiaoBan->find($id);
    $item = $OABaoCaoGiaoBan->format_item($item);
}

$page_title = 'Thêm báo cáo giao ban';
// VIEW
$xtpl = $OAThemeHelper->setView($op.'.tpl');

if( isset($item['benh_nhan_theo_doi']) && count($item['benh_nhan_theo_doi']) ){
    foreach( $item['benh_nhan_theo_doi'] as $khoa => $value ){
        $OAThemeHelper->renderItemsFromArray($xtpl,$item['benh_nhan_theo_doi'][$khoa],$khoa.'_item','main.'.$khoa);
    }
}


$item ? $xtpl->assign('item', $item) : null;
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
