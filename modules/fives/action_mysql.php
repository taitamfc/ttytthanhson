<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS HOLDINGS <contact@tms.vn>
 * @Copyright (C) 2022 TMS HOLDINGS. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Tue, 26 Jul 2022 08:31:48 GMT
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department_staff";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rank";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_staff";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats(
  id smallint unsigned NOT NULL AUTO_INCREMENT,
  title varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  title_tb varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  note text CHARACTER SET utf8mb4,
  user_add int NOT NULL COMMENT 'Người thêm',
  time_add int NOT NULL COMMENT 'Thời gian thêm',
  weight int NOT NULL COMMENT 'Sắp xếp',
  status int NOT NULL DEFAULT '1' COMMENT 'Trạng thái',
  PRIMARY KEY (id),
  UNIQUE KEY title (title)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config(
  config_name varchar(30) CHARACTER SET utf8mb3 NOT NULL,
  config_value text CHARACTER SET utf8mb4 NOT NULL,
  UNIQUE KEY config_name (config_name)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content(
  id smallint unsigned NOT NULL AUTO_INCREMENT,
  catsid int NOT NULL,
  title varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  hometext text CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tiêu chí',
  user_add int NOT NULL COMMENT 'Người thêm',
  time_add int NOT NULL COMMENT 'Thời gian thêm',
  weight int NOT NULL COMMENT 'Sắp xếp',
  status int NOT NULL DEFAULT '1' COMMENT 'Trạng thái',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department(
  id int NOT NULL AUTO_INCREMENT,
  userid int DEFAULT NULL COMMENT 'Trưởng phòng quản lý',
  department_code varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Mã phòng ban',
  name_department varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  time_add int NOT NULL,
  user_add int NOT NULL,
  time_edit int DEFAULT NULL,
  user_edit int DEFAULT NULL,
  status int NOT NULL,
  weight int NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department_staff(
  id int NOT NULL AUTO_INCREMENT,
  staff_id int NOT NULL,
  department_id int NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rank(
  id smallint unsigned NOT NULL AUTO_INCREMENT,
  title varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  numer_rank int NOT NULL DEFAULT '0',
  user_add int NOT NULL COMMENT 'Người thêm',
  time_add int NOT NULL COMMENT 'Thời gian thêm',
  weight int NOT NULL COMMENT 'Sắp xếp',
  status int NOT NULL DEFAULT '1' COMMENT 'Trạng thái',
  PRIMARY KEY (id),
  UNIQUE KEY title (title)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row(
  id smallint unsigned NOT NULL AUTO_INCREMENT,
  title varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  alias varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  time_from int NOT NULL,
  time_to int NOT NULL,
  hometext text CHARACTER SET utf8mb4 NOT NULL,
  user_add int NOT NULL,
  time_add int NOT NULL,
  status int NOT NULL DEFAULT '1',
  weight int NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY title (title)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_staff(
  id int NOT NULL AUTO_INCREMENT,
  staff_code varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Mẫ nhân viên',
  name_staff varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tên nhân viên',
  email varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Email nhân viên',
  birthday int NOT NULL,
  phone varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Số điện thoại nhân viên',
  userid int NOT NULL,
  time_add int NOT NULL,
  user_add int NOT NULL,
  time_edit int DEFAULT NULL,
  user_edit int DEFAULT NULL,
  position_id int NOT NULL COMMENT 'Chức vụ (0 là nhân viên, 1 là trưởng phòng)',
  status int NOT NULL,
  weight int NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote(
  id int NOT NULL AUTO_INCREMENT,
  row_id int NOT NULL COMMENT 'ID Bài đánh giá',
  department_id int NOT NULL COMMENT 'ID Phòng ban',
  userid int NOT NULL,
  time_add int NOT NULL,
  time_edit int DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item(
  id int NOT NULL AUTO_INCREMENT,
  vote_vote_id int NOT NULL,
  contentid int NOT NULL,
  rankid int NOT NULL,
  number_rank int NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote(
  id int NOT NULL AUTO_INCREMENT,
  vote_id int NOT NULL,
  catsid int NOT NULL,
  trungbinh text CHARACTER SET utf8mb4 NOT NULL COMMENT 'Điểm trung bình',
  note text CHARACTER SET utf8mb4 NOT NULL COMMENT 'Nội dung cải thiện',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('raw_staff', 'TMS%05s')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('raw_department', 'PB%05s')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('tuybien1', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('tuybien2', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('tuybien3', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('dienthoai', '0967247007')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('nguoidaidien', 'Phan Ngọc Anh')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('captai', 'TP.Hồ Chí Minh')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('diachi', 'Số 3 Đường sô 6, KDC Cityland Park Hills, Phường 10, Gò Vấp, TP.Hồ Chí Minh')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('tendonvi', 'Công Ty CP Tập Đoàn TMS Holdings')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('masothue', '0316364596')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (config_name, config_value) VALUES('logo', '/uploads/fives/logo_nored.png')";

$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowattachcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'emailcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'adminscomm', '')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'sortcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'activecomm', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'setcomm', '4')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowed_comm', '-1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'timeoutcomm', '360')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'auto_postcomm', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'captcha', '1')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'view_comm', '6')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'perpagecomm', '5')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'alloweditorcomm', '0')";
