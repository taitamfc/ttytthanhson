<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)
 * @Copyright (C) 2014 VIETNAM DIGITAL TRADING TECHNOLOGY . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (!defined('NV_ADMIN')) {
    die('Stop!!!');
}

if (defined('NV_IS_SPADMIN')) {
    $submenu['department'] = $lang_module['department_title'];
 
}

if (defined('NV_IS_SPADMIN')) {
    $submenu['config'] = $lang_module['config'];
}
