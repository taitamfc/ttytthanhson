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
global $admin_info,$user_info;
$id = $nv_Request->get_int('id', 'post,get', 0);
$layout = $nv_Request->get_title('layout', 'post,get', 'add');
$OAThemeHelper = oa_load_model('OAThemeHelper');
$OABaoCaoGiaoBan = oa_load_model('OABaoCaoGiaoBan');
$OABaoCaoKhamChuaBenh = oa_load_model('OABaoCaoKhamChuaBenh');
$OAKhamChuaBenh = oa_load_model('OAKhamChuaBenh');

if($id){
    $item = $OABaoCaoGiaoBan->find($id);
    $item = $OABaoCaoGiaoBan->format_item($item);
}

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
        $data['benh_nhan_mo_cap_cuu'] = json_encode($_REQUEST['benh_nhan_mo_cap_cuu']);
    }
    if( isset($_REQUEST['benh_nhan_mo_phien']) ){
        $data['benh_nhan_mo_phien'] = json_encode($_REQUEST['benh_nhan_mo_phien']);
    }
    if( isset($_REQUEST['benh_nhan_chuyen_tuyen']) ){
        $data['benh_nhan_chuyen_tuyen'] = json_encode($_REQUEST['benh_nhan_chuyen_tuyen']);
    }

    dd($data);

    if($id){
        $saved = $OABaoCaoGiaoBan->update($id,$data);
    }else{
        $saved = $OABaoCaoGiaoBan->save($data);
    }
    $OAThemeHelper->redirectOp('baocaogiaoban');
}

$cr_date = date('Y-m-d');
$cr_date = '2023-04-03';

$OABaoCaoKhamChuaBenhHomNay = $OABaoCaoKhamChuaBenh->all([
    'limit' => 1,
    'search' => [
        'DATE(ngaygio)' => $cr_date,
        'DATE(ngaygio)' => '2023-04-03'
    ]
]);

$hoat_dong_dieu_tri = $OAKhamChuaBenh->getDataReportGiaoBan($cr_date);

if($hoat_dong_dieu_tri){
    foreach( $hoat_dong_dieu_tri as $khoa => $mucs ){
        foreach( $mucs as $muc_k => $muc_v ){
            $item['hoat_dong_dieu_tri'][$khoa][$muc_k] = $muc_v;
        }
    }
}

if($OABaoCaoKhamChuaBenhHomNay){
    $item['tinh_hinh_benh_nhan']['bhyt']['ngoaitinh']   = $OABaoCaoKhamChuaBenhHomNay['bn_ngoaitinh'];
    $item['tinh_hinh_benh_nhan']['bhyt']['noitinh']     = $OABaoCaoKhamChuaBenhHomNay['bn_noitinh'];
    $item['tinh_hinh_benh_nhan']['bn_vienphi']          = $OABaoCaoKhamChuaBenhHomNay['bnkham'];
    $item['tinh_hinh_benh_nhan']['bhyt']['tong']          = $OABaoCaoKhamChuaBenhHomNay['sobn_bhyt'];
}


$page_title = !$id ? 'THÊM BÁO CÁO GIAO BAN' : 'CẬP NHẬT BÁO CÁO GIAO BAN';
// VIEW
if( $layout == 'add' ){
    $xtpl = $OAThemeHelper->setView($op.'.tpl');
}else{
    $xtpl = $OAThemeHelper->setView('baocaogiaoban_show.tpl');
}

$OAThemeHelper->renderItemsFromArray($xtpl,$item['benh_nhan_mo_cap_cuu'],'benh_nhan_mo_cap_cuu_item','main.benh_nhan_mo_cap_cuu');
$OAThemeHelper->renderItemsFromArray($xtpl,$item['benh_nhan_mo_phien'],'benh_nhan_mo_phien_item','main.benh_nhan_mo_phien');
$OAThemeHelper->renderItemsFromArray($xtpl,$item['benh_nhan_chuyen_tuyen'],'benh_nhan_chuyen_tuyen_item','main.benh_nhan_chuyen_tuyen');

if( isset($item['benh_nhan_theo_doi']) && count($item['benh_nhan_theo_doi']) ){
    foreach( $item['benh_nhan_theo_doi'] as $khoa => $value ){
        $OAThemeHelper->renderItemsFromArray($xtpl,$item['benh_nhan_theo_doi'][$khoa],$khoa.'_item','main.'.$khoa);
    }
}
if(!$admin_info){
    $admin_info = $user_info; 
}
$xtpl->assign('currentGroupId', $admin_info['group_id']);
$xtpl->assign('currentKhoa', $admin_info['username']);
// $xtpl->assign('currentKhoa', 'khoakb');

$xtpl->assign('page_title', $page_title);
$xtpl->assign('item', $item);
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
