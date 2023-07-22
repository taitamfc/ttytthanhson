<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)
 * @Copyright (C) 2014 VIETNAM DIGITAL TRADING TECHNOLOGY . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

if (defined('NV_IS_SPADMIN')) {
    $allow_func = array(
        'main',
        'reply',
        'send',
        'del',
        'department',
        'row',
        'del_department',
        'config',
        'view',
        'change_status',
        'change_weight',
        'alias',
        'change_default',
        'forward',
        'export-excel'
    );
} else {
    $allow_func = array(
        'main',
        'reply',
        'del',
        'view',
        'send',
        'forward'
    );
}



/**
 * nv_getAllowed()
 *
 * @return
 */
function nv_getAllowed()
{
    global $module_data, $db, $admin_info, $lang_module;

    $contact_allowed = array(
        'view' => array(),
        'reply' => array(),
        'obt' => array()
    );

    if (defined('NV_IS_SPADMIN')) {
        $contact_allowed['view'][0] = $lang_module['is_default'];
        $contact_allowed['reply'][0] = $lang_module['is_default'];
        $contact_allowed['obt'][0] = $lang_module['is_default'];
    }

    $sql = 'SELECT id,full_name,admins FROM ' . NV_PREFIXLANG . '_' . $module_data . '_department';
    $result = $db->query($sql);
    while ($row = $result->fetch()) {
        $id = intval($row['id']);

        if (defined('NV_IS_SPADMIN')) {
            $contact_allowed['view'][$id] = $row['full_name'];
            $contact_allowed['reply'][$id] = $row['full_name'];
        }

        $admins = $row['admins'];
        $admins = array_map('trim', explode(';', $admins));

        foreach ($admins as $a) {
            if (preg_match('/^([0-9]+)\/([0-1]{1})\/([0-1]{1})\/([0-1]{1})$/i', $a)) {
                $admins2 = array_map('intval', explode('/', $a));

                if ($admins2[0] == $admin_info['admin_id']) {
                    if ($admins2[1] == 1 and !isset($contact_allowed['view'][$id])) {
                        $contact_allowed['view'][$id] = $row['full_name'];
                    }
                    if ($admins2[2] == 1 and !isset($contact_allowed['reply'][$id])) {
                        $contact_allowed['reply'][$id] = $row['full_name'];
                    }
                    if ($admins2[3] == 1 and !isset($contact_allowed['obt'][$id])) {
                        $contact_allowed['obt'][$id] = $row['full_name'];
                    }
                }
            }
        }
    }

    return $contact_allowed;
}

define('NV_IS_FILE_ADMIN', true);