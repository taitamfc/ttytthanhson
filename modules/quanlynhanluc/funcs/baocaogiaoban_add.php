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
if (empty($user_info)){	
    nv_redirect_location('index.php?language=vi&nv=users&op=login'); exit();
}

global $admin_info,$user_info,$module_info;
$id = $nv_Request->get_int('id', 'post,get', 0);
$layout = $nv_Request->get_title('layout', 'post,get', 'add');
$OAThemeHelper = oa_load_model('OAThemeHelper');
$OABaoCaoGiaoBan = oa_load_model('OABaoCaoGiaoBan');
$OABaoCaoKhamChuaBenh = oa_load_model('OABaoCaoKhamChuaBenh');
$OAKhamChuaBenh = oa_load_model('OAKhamChuaBenh');

if( $_REQUEST['is_ajax'] ){
    $task = isset($_REQUEST['task']) ? $_REQUEST['task'] : 'index';
    $OABaoCaoGiaoBan->handleAjax($task);
    die();
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
    if( isset($_REQUEST['sgb']) ){
        $data['sgb'] = json_encode($_REQUEST['sgb']);
    }

    
    $tinh_hinh_benh_nhan = $_REQUEST['tinh_hinh_benh_nhan'];
    $dataBaocaoKCB = [
        'sobn_bhyt' => (int)$tinh_hinh_benh_nhan['bhyt']['tong'],
        'bn_noitinh' => (int)$tinh_hinh_benh_nhan['bhyt']['noitinh'],
        'bn_ngoaitinh' => (int)$tinh_hinh_benh_nhan['bhyt']['ngoaitinh'],
        'bnkham' => (int)$tinh_hinh_benh_nhan['bn_vienphi'],
        'account' => 'khoakb',
        'thoigian' => time(),
        'add_time' => 0,
        'edit_time' => 0,
        'ngaygio' => date('Y-m-d H:i:s'),
        'status' => 1,
        'ghichu' => ''
    ];
    
    $OABaoCaoKhamChuaBenh->saveOrUpdate($dataBaocaoKCB);
    
    // Luu vao bang kham chua benh cua cac khoa
    $hoat_dong_dieu_tri = $_REQUEST['hoat_dong_dieu_tri'];
    foreach($hoat_dong_dieu_tri as $khoa => $dataKCB){
        if( is_array($dataKCB) ){
            foreach( $dataKCB as $k => $v ){
                $dataKCB[$k] = (int)$v;
            }
            $dataKCB['ngaygio'] = date('Y-m-d H:i:s');
            $dataKCB['account'] = $OAKhamChuaBenh->khoas[$khoa];
            $dataKCB['thoigian'] = time();
            $dataKCB['add_time'] = 0;
            $dataKCB['edit_time'] = 0;
            $dataKCB['status'] = 1;
            $dataKCB['bn_tuvong'] = 0;
            $dataKCB['ghichu'] = '';
            if($dataKCB){
                //$OAKhamChuaBenh->saveOrUpdate($dataKCB);
            }
        }
    }

    if($id){
        $saved = $OABaoCaoGiaoBan->update($id,$data);
    }else{
        $saved = $OABaoCaoGiaoBan->save($data);
    }
    $OAThemeHelper->redirectOp('baocaogiaoban');
}
if($id){
    $item = $OABaoCaoGiaoBan->find($id);
    $item = $OABaoCaoGiaoBan->format_item($item);
}
$cr_date = date('Y-m-d');
// $cr_date = '2023-04-03';

// $OABaoCaoKhamChuaBenhHomNay = $OABaoCaoKhamChuaBenh->all([
//     'limit' => 1,
//     'search' => [
//         'DATE(ngaygio)' => $cr_date
//     ]
// ]);

// $hoat_dong_dieu_tri = $OAKhamChuaBenh->getDataReportGiaoBan($cr_date);
// if($hoat_dong_dieu_tri){
//     foreach( $hoat_dong_dieu_tri as $khoa => $mucs ){
//         foreach( $mucs as $muc_k => $muc_v ){
//             $item['hoat_dong_dieu_tri'][$khoa][$muc_k] = $muc_v;
//         }
//     }
// }

// if($OABaoCaoKhamChuaBenhHomNay){
//     $item['tinh_hinh_benh_nhan']['bhyt']['ngoaitinh']   = $OABaoCaoKhamChuaBenhHomNay['bn_ngoaitinh'];
//     $item['tinh_hinh_benh_nhan']['bhyt']['noitinh']     = $OABaoCaoKhamChuaBenhHomNay['bn_noitinh'];
//     $item['tinh_hinh_benh_nhan']['bn_vienphi']          = $OABaoCaoKhamChuaBenhHomNay['bnkham'];
//     $item['tinh_hinh_benh_nhan']['bhyt']['tong']          = $OABaoCaoKhamChuaBenhHomNay['sobn_bhyt'];
// }


$page_title = !$id ? 'THÊM BÁO CÁO GIAO BAN' : 'CẬP NHẬT BÁO CÁO GIAO BAN';
// VIEW
if( $layout == 'add' ){
    $xtpl = $OAThemeHelper->setView($op.'.tpl');
}elseif( $layout == 'show' ) {
    $xtpl = $OAThemeHelper->setView('baocaogiaoban_show.tpl');
}elseif( $layout == 'slide' ) {
    $item['title'] = date('d/m/Y',strtotime($item['title']));
    $xtpl = $OAThemeHelper->setView('baocaogiaoban_slide.tpl');
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

$xtpl->assign('URL_THEMES', NV_BASE_SITEURL. 'themes/' . $module_info['template']);
$xtpl->assign('currentGroupId', $admin_info['group_id']);
$xtpl->assign('currentKhoa', $admin_info['username']);
// $xtpl->assign('currentKhoa', 'khoakb');
$xtpl->assign('layout', $layout);

$xtpl->assign('page_title', $page_title);
$xtpl->assign('item', $item);
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
