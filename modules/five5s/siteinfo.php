<?php

/**
 * @Project BCB SOLUTIONS
 * @Author Mr Duy <vuduy1502@gmail.com>
 * @Copyright (C) 2023 Mr Duy. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 19 Mar 2023 05:56:44 GMT
 */

if (!defined('NV_IS_FILE_SITEINFO'))
    die('Stop!!!');

$lang_siteinfo = nv_get_lang_module($mod);

/*
// Tổng số bài viết
$number = $db->query('SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $mod_data . '_rows where status= 1 AND publtime < ' . NV_CURRENTTIME . ' AND (exptime=0 OR exptime>' . NV_CURRENTTIME . ')')->fetchColumn();
if ($number > 0) {
    $siteinfo[] = array(
        'key' => $lang_siteinfo['siteinfo_publtime'],
        'value' => $number
    );
}
*/
