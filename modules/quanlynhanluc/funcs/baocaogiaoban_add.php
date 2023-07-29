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
global $admin_info;
$id = $nv_Request->get_int('id', 'post,get', 0);
$OAThemeHelper = oa_load_model('OAThemeHelper');
$OABaoCaoGiaoBan = oa_load_model('OABaoCaoGiaoBan');
// CONTROLLER
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $data = [];
    
    if( isset($_REQUEST['title']) ){
        $data['title'] = trim($_REQUEST['title']);
    }
    if( isset($_REQUEST['truc_lanh_dao']) ){
        $data['truc_lanh_dao'] = trim($_REQUEST['truc_lanh_dao']);
    }
    if( isset($_REQUEST['truc_bac_sy']) ){
        $data['truc_bac_sy'] = trim($_REQUEST['truc_bac_sy']);
    }
    if( isset($_REQUEST['tinh_hinh_benh_nhan']) ){
        $data['tinh_hinh_benh_nhan'] = json_encode($_REQUEST['tinh_hinh_benh_nhan']);
    }
    if( isset($_REQUEST['hoat_dong_dieu_tri']) ){
        $data['hoat_dong_dieu_tri'] = json_encode($_REQUEST['hoat_dong_dieu_tri']);
    }
    if( isset($_REQUEST['benh_nhan_theo_doi']) ){
        $data['benh_nhan_theo_doi'] = json_encode($_REQUEST['benh_nhan_theo_doi']);
    }
    if( isset($_REQUEST['benh_nhan_mo_cap_cuu']) ){
        $data['benh_nhan_mo_cap_cuu'] = trim($_REQUEST['benh_nhan_mo_cap_cuu']);
    }
    if( isset($_REQUEST['benh_nhan_mo_phien']) ){
        $data['benh_nhan_mo_phien'] = trim($_REQUEST['benh_nhan_mo_phien']);
    }
    if( isset($_REQUEST['benh_nhan_chuyen_tuyen']) ){
        $data['benh_nhan_chuyen_tuyen'] = trim($_REQUEST['benh_nhan_chuyen_tuyen']);
    }

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
$xtpl->assign('currentGroupId', $admin_info['group_id']);
$xtpl->assign('currentKhoa', $admin_info['username']);
$xtpl->assign('currentKhoa', 'khoakb');

$item ? $xtpl->assign('item', $item) : null;
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
