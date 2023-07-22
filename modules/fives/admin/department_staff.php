<?php

/**
 * TMS cms Management System
 * @version 4.x
 * @author Tập Đoàn TMS Holdings <contact@tms.vn>
 * @copyright (C) 2009-2022 Tập Đoàn TMS Holdings. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://tms.vn
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');
$department_id = $nv_Request->get_title( 'department_id', 'post,get' ,0);

$where=' AND id IN (SELECT staff_id FROM '.NV_PREFIXLANG.'_'.$module_name.'_department_staff where department_id='.$department_id.')';
$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op.'&department_id='.$department_id;
$q = $nv_Request->get_title( 'q', 'post,get' );


if ( !empty( $q ) ) {
    $where .= ' AND (name_staff LIKE "%" "'.$q. '" "%" OR phone LIKE "%" "'.$q. '" "%" OR email LIKE "%" "'.$q. '" "%")';
    $base_url .= '&q=' . $q;
}

// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
    $show_view = true;
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
    ->select('COUNT(*)')
    ->from(''.NV_PREFIXLANG.'_'.$module_name.'_staff')
    ->where('1=1'.$where);


    $sth = $db->prepare($db->sql());

    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
    ->order('weight ASC')
    ->limit($per_page)
    ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    $sth->execute();
}

$xtpl = new XTemplate('department_staff.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('Q', $q);
$xtpl->assign('department_id', $department_id);

if ($show_view) {
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.view.generate_page');
    }
    $number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
    while ($view = $sth->fetch()) {
        $view['stt']=$number++;
        $view['birthday'] = (empty($view['birthday'])) ? '' : nv_date('d/m/Y', $view['birthday']);
        $view['user_add']=get_info_user($view['user_add'])['first_name'];
        $view['time_add']=date('d/m/Y H:i',$view['time_add']);
        if(empty($view['user_edit'])){
            $view['user_edit']='Chưa cập nhật';
            $view['time_edit']='Chưa cập nhật';
        }else{
            $view['user_edit']=get_info_user($view['user_edit'])['first_name'];
            $view['time_edit']=date('d/m/Y H:i',$view['time_edit']);
        }
        $view['position']=$position[$view['position_id']];
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.view.loop');
    }
    $xtpl->parse('main.view');
}


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['deparment_staff'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
