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

/**
 * Note:
 * 	- Module var is: $lang, $module_file, $module_data, $module_upload, $module_theme, $module_name
 * 	- Accept global var: $db, $db_config, $global_config
 */

$sth = $db->prepare("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (full_name, alias, note, time_book,  doctor, admins, act, weight, is_default) VALUES (:full_name, :alias,  :note, :time_book, :doctor, '1/1/1/0;', 1, :weight, :is_default)");

$full_name = 'Đăng ký khám bệnh';
$alias = 'Dang-ky-kham-benh';
$note = 'Bộ phận tiếp nhận và giải quyết các yêu cầu, đề nghị, ý kiến liên quan đến hoạt động chính của doanh nghiệp';
$time_book = 'Sáng 8h - 11h|Chiều 13h - 17h|Tối 19h -  21h';
$doctor = 'Phan Anh|Tuyết nhi';
$weight = 1;
$is_default = 1;
$sth->bindParam(':full_name', $full_name, PDO::PARAM_STR, strlen($full_name));
$sth->bindParam(':alias', $alias, PDO::PARAM_STR, strlen($alias));
$sth->bindParam(':note', $note, PDO::PARAM_STR, strlen($note));
$sth->bindParam(':time_book', $time_book, PDO::PARAM_STR, strlen($time_book));
$sth->bindParam(':doctor', $doctor, PDO::PARAM_STR, strlen($doctor));
$sth->bindValue(':weight', $weight, PDO::PARAM_INT);
$sth->bindValue(':is_default', $is_default, PDO::PARAM_INT);
$sth->execute();


