<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_FIVES')) {
    die('StopLog!!!');
}
$page_title = $module_info['site_title'];
/*
$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];
$mod_title = isset($lang_module['main_title']) ? $lang_module['main_title'] : $module_info['custom_title'];
$array_cat = array();*/
if (!empty($user_info)) {Header('Location: ' . nv_url_rewrite(MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op, true));exit();}
	$url_login = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login';//&nv_redirect=' . MODULE_LINK;
	$url_pass = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=lostpass';//&nv_redirect=' . MODULE_LINK;
	
	$xtpl = new XTemplate('frm_login.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
    $xtpl->assign('lang', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('url_login', $url_login);
    $xtpl->assign('url_pass', $url_pass);
	$xtpl->assign('redirect', MODULE_LINK);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
