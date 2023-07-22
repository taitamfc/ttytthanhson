<?php

/**
 * @Project BCB SOLUTIONS
 * @Author Mr Duy <vuduy1502@gmail.com>
 * @Copyright (C) 2023 Mr Duy. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 19 Mar 2023 05:56:44 GMT
 */

if (!defined('NV_IS_MOD_FIVES'))
    die('Stop!!!');

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

// create_evaluation();
if (empty($user_info)) {
    $url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';
    nv_redirect_location($url);
    exit();
}

$array_data = array();
$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);
//$xtpl->assign('token', $token);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
