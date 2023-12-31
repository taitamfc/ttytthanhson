<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)
 * @Copyright (C) 2014 VIETNAM DIGITAL TRADING TECHNOLOGY . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (! defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $mod_data . '_department WHERE act = 1 ORDER BY weight ASC';
$result = $db->query($sql);
while ($row = $result->fetch()) {
    $array_item[$row['id']] = array(
        'key' => $row['id'],
        'title' => $row['full_name'],
        'alias' => $row['alias']
    );
}
