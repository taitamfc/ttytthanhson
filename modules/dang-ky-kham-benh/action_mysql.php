<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)
 * @Copyright (C) 2014 VIETNAM DIGITAL TRADING TECHNOLOGY . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (! defined('NV_IS_FILE_MODULES')) {
    die('Stop!!!');
}

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_send";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (
 id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
 full_name varchar(250) NOT NULL,
 alias varchar(250) NOT NULL,
 note text NOT NULL,
 time_book text NOT NULL,
 doctor text NOT NULL,
 admins text NOT NULL,
 act tinyint(1) unsigned NOT NULL DEFAULT '0',
 weight smallint(5) NOT NULl,
 is_default tinyint(1) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (id),
 UNIQUE KEY full_name (full_name),
 UNIQUE KEY alias (alias)
) ENGINE=MyISAM";
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (
  id int(11) NOT NULL AUTO_INCREMENT,
  weight int(11) NOT NULL,
  title varchar(250) NOT NULL,
  note text COMMENT 'mô tả',
  status int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_send (
 id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
 cid smallint(5) unsigned NOT NULL DEFAULT '0',
 title varchar(255) NOT NULL,
 content text NOT NULL,
 days text NOT NULL,
 time_book text NOT NULL, 
 doctor text NOT NULL,
 send_time int(11) unsigned NOT NULL DEFAULT '0',
 sender_id mediumint(8) unsigned NOT NULL DEFAULT '0',
 sender_name varchar(100) NOT NULL, 
 sender_birthday varchar(100) NOT NULL,
 sender_address varchar(250) NOT NULL,
 sender_email varchar(100) NOT NULL,
 sender_phone varchar(20) DEFAULT '',
 sender_ip varchar(15) NOT NULL,
 is_read tinyint(1) unsigned NOT NULL DEFAULT '0',
 is_reply tinyint(1) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (id),
 KEY sender_name (sender_name)
) ENGINE=MyISAM";


$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (id, weight, title, note, status) VALUES (1, 1, '27.72.76.115:8181', '', 1)";

$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'sendcopymode', '0')";
