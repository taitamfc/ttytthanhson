<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)
 * @Copyright (C) 2014 VIETNAM DIGITAL TRADING TECHNOLOGY . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE')) {
    die('Stop!!!');
}

$module_version = array(
    'name' => 'Đăng ký khám bệnh',
    'modfuncs' => 'main,search,calender,info,login,catalogy,information,detail,fiml,cdha-tdcn,test,prescription,medical,administration,change-password',
	'change_alias' => 'information',
	'submenu' => 'information',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '4.3.03',
    'date' => 'Monday, August 6, 2018 5:00:00 PM GMT+07:00',
    'author' => 'VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)',
    'note' => '',
    'uploads_dir' => array(
        $module_upload
    )
);