<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2018 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 04 Oct 2018 02:30:40 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) )
{
	die( 'Stop!!!' );
}

$db_config['dbhost'] = '127.0.0.1';
$db_config['dbport'] = '';
/*
$db_config['dbname'] = 'bvthanhson_bvts';
$db_config['dbsystem'] = 'bvthanhson_bvts';
$db_config['dbuname'] = 'bvthanhson_bvts';
$db_config['dbpass'] = 'Abcd1234@';
*/
$db_config['dbname'] = 'ttytthanhson';
$db_config['dbsystem'] = 'ttytthanhson';
$db_config['dbuname'] = 'root';
$db_config['dbpass'] = '';

$db_config['dbtype'] = 'mysql';
$db_config['collation'] = 'utf8mb4_unicode_ci';
$db_config['charset'] = 'utf8mb4';
$db_config['persistent'] = false;
$db_config['prefix'] = 'nv4';

$global_config['site_domain'] = 'localhost';
$global_config['name_show'] = 0;
$global_config['idsite'] = 0;
$global_config['sitekey'] = '523a5e0ea5b6d9d0754da9ff426c60f9';// Do not change sitekey!
$global_config['hashprefix'] = '{SSHA512}';
$global_config['cached'] = 'files';
$global_config['session_handler'] = 'files';
$global_config['extension_setup'] = 3; // 0: No, 1: Upload, 2: NukeViet Store, 3: Upload + NukeViet Store