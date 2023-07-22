<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 10 April 2017 17:00
 */

if (! defined('NV_IS_MOD_QLCL')) {
    die('Stop!!!');
}


if (! nv_function_exists('nv_qlnl_menu')) {
    function nv_qlnl_menu()
    {
        global $module_info,$module_data,$db,$op,$user_info, $client_info;
        $xtpl = new XTemplate('block_menu.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
        $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
		$xtpl->assign('HOME', MODULE_LINK);
		$dsmenu =menu_phanquyen($user_info['username']);
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
		/*show ds chi tieu*/
		$func='cungcapchitieu';
		$sql = 'SELECT * FROM ' . TABLE. '_apdung  where apdung=1';
		$apdung = $db->query($sql)->fetch();
		$namapdung=(empty($apdung['nam']))?0:$apdung['nam'];
		$xtpl->assign('namapdung', $namapdung);	
		
		if ($namapdung>0){
		$sql = 'SELECT * FROM ' . TABLE. "_groupuser  where account like '".$user_info['username']."'";
		$user = $db->query($sql)->fetch();
		
		$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$namapdung. ' where status=1';
		$list = $db->query($sql);$tt=0;$active='';
			
			while ($r = $list->fetch()) {
				
				if (($user['id_nhomquyen']>100)or (in_array($user_info['username'],unserialize($r['list_khoacungcap'])))
					or (in_array('ALL',unserialize($r['list_khoacungcap']))))
				{
				$r['stt']=++$tt; $r['color']='';$r['status']='';
				$r['title']='Chỉ tiêu số '.$tt; 
				$r['token']=md5($client_info['session_id'] . $global_config['sitekey']).'_'.$namapdung.'_'.$r['id'];
				$r['link_action']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=cungcapchitieu&token='.$r['token'];
				if (strpos($client_info['selfurl'].'sub',$r['token'].'sub')>0) 
				{ $r['active']=' active ';	$active=' active pcoded-trigger';}
				else $r['active']='';
				$xtpl->assign('ITEM', $r);
				$xtpl->parse('main.chitieu.item');
				}
			}
		}
		//$_curr_url = NV_BASE_SITEURL . str_replace($global_config['site_url'] . '/', '', $client_info['selfurl']);
		
		//$active=($op==$func)?' active ':'';
		$xtpl->assign('active', $active);
		$xtpl->parse('main.chitieu');
		$xtpl->parse('main');
        return $xtpl->text('main');
    }

}

$content = nv_qlnl_menu();
