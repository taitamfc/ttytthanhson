<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 10 April 2017 17:00
 */

if (! defined('NV_IS_MOD_FIVES')) {
    die('Stop!!!');
}


if (! nv_function_exists('nv_qlnl_menu')) {
    function nv_qlnl_menu()
    {
        global $module_info,$module_data,$db,$op,$user_info;
        $xtpl = new XTemplate('block_menu.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
        $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);

		$sql = 'SELECT * FROM ' . TABLE . '_menu WHERE status = 1 	ORDER BY stt asc';
		$dsmenu = $db->query($sql)->fetchAll();		
        
		foreach ($dsmenu as $row){
			$row['link']='';
			if (!empty($row['func']))
			{
				$row['link']=MODULE_LINK.'&' . NV_OP_VARIABLE . '='. $row['func'];
				$row['active']=($row['func']==$op)?' active ':'';
			}
			$xtpl->assign('ROW', $row);
			$xtpl->parse('main.loop');
        }	
		
		$xtpl->parse('main');
        return $xtpl->text('main');
    }

}

$content = nv_qlnl_menu();
