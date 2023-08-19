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
$page_title = 'Chấm công';
$OAKhoa = oa_load_model('OAKhoa');
$OAUser = oa_load_model('OAUser');
$OAChamCong = oa_load_model('OAChamCong');
$OAThemeHelper = oa_load_model('OAThemeHelper');
$khoas = $OAKhoa->khoas();
$khoas = $OAKhoa->pluck($khoas,'group_id','title');

$groups = $OAKhoa->all();
$groups = $OAKhoa->pluck($groups,'group_id','title');

$users = [];
$options = [];
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $khoa_id = $_REQUEST['khoa_id'];
    $tg_tungay = $_REQUEST['tg_tungay'];
    $tg_denngay = $_REQUEST['tg_denngay'];

    if( isset($_REQUEST['search']) ){
        $options = [
            'search' => [
                'in_groups' => $khoa_id
            ]
        ];
    }
    if( isset($_REQUEST['save']) ){
        $OAChamCong->save_log($_REQUEST);
    }
}
$users = $OAUser->all($options);
$all_users = [];
foreach( $users as $user ){
    $all_users[$user['group_id']][] = $user;
}
$tableHtml = $OAUser->tableHtml($all_users);

// VIEW
$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$OAThemeHelper->renderOptions($xtpl,$khoas,'khoa','main.khoas',[
    'selected' => $_REQUEST['khoa_id']
]);
$OAThemeHelper->renderItemsFromArray($xtpl,$users,'user','main.users');
$xtpl->assign('tableHtml', $tableHtml);
$xtpl->assign('F', $_REQUEST);
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
