<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_QLCL')) {
    die('Stop!!!');
}

	
	
if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';nv_redirect_location($url); exit();}

	$sta =$nv_Request->get_title('sta', 'get,post', '');
	if ($sta=='del_item')
	{
		$token=$nv_Request->get_title('token', 'get,post', '');
		$key=explode('_',$token);
		if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) die('Stop!!!');
		
		$sql = 'Update ' . TABLE. '_chitieu_'.$key[1]. ' set status=0 where status=1 and id='.$key[2]; 
		$stmt = $db->prepare($sql);
		//$stmt->bindParam(':delete_by', $user_info['username'], PDO::PARAM_STR);
		//$stmt->bindParam(':delete_date', date('Y/m/d H:m'), PDO::PARAM_STR);
		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua='OK_'.$row_id;
		else $ketqua='ERR_'.$lang_module['update_err'];
		echo $ketqua; exit;
	}
	
	if ($sta=='default_item')
	{
		$token=$nv_Request->get_title('token', 'get,post', '');
		$key=explode('_',$token);
		if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) die('Stop!!!');
		$stmt = $db->prepare("Update ".TABLE."_apdung set apdung=0")->execute();
		
		$sql = 'Update '.TABLE.'_apdung set apdung=1 where nam='.$key[1]; 
		$stmt = $db->prepare($sql);
		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua='OK_'.$row_id;
		else $ketqua='ERR_'.$lang_module['update_err'];
		echo $ketqua; exit;
	}
	
	
	
	if (empty($sta)) $sta='main';
	$tbl=TABLE. '_chitieu';
	$xtpl = new XTemplate('config_chitieu.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	
	if ($sta=='save_item')
	{
		$token=$nv_Request->get_title('token', 'get,post', '');
		$key=explode('_',$token);
		if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) die('Stop!!!');
		
		$data=array();
		$data['chi_so']=$nv_Request->get_title('chi_so', 'get,post', '');
		$data['thanh_to']=$nv_Request->get_title('thanh_to', 'get,post', '');
		$data['pham_vi']=$nv_Request->get_array('pham_vi', 'get,post', '');
		$data['list_khoacungcap']=$nv_Request->get_array('list_khoacungcap', 'get,post', '');
		$data['tansuatgui']=$nv_Request->get_title('tansuatgui', 'get,post', '');
		$data['chitieu']=$nv_Request->get_title('chitieu', 'get,post', '');
		//var_dump($data['pham_vi']);
		$sql = 'Update ' . TABLE. '_chitieu_'.$key[1]. " SET chi_so=:chi_so, thanh_to=:thanh_to, pham_vi=:pham_vi , 
		list_khoacungcap=:list_khoacungcap, tansuatgui=:tansuatgui , chitieu=:chitieu  WHERE id =".$key[2];
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':chi_so', $data['chi_so'], PDO::PARAM_STR);
		$stmt->bindParam(':thanh_to', $data['thanh_to'], PDO::PARAM_STR);
		$stmt->bindParam(':pham_vi', serialize($data['pham_vi']), PDO::PARAM_STR);
		$stmt->bindParam(':list_khoacungcap', serialize($data['list_khoacungcap']), PDO::PARAM_STR);
		$stmt->bindParam(':tansuatgui', $data['tansuatgui'], PDO::PARAM_STR);
		$stmt->bindParam(':chitieu', $data['chitieu'], PDO::PARAM_STR);
		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua['status']='OK';
		
		$ketqua['url']=MODULE_LINK . '&' . NV_OP_VARIABLE .'=bochitieu_setting&token=edit_'.$key[1];
		$ketqua['mess']= $row_id>0?sprintf($lang_module['yeucau_ok'],$ketqua['url']):$lang_module['yeucau_err'];
		
		nv_jsonOutput($ketqua); exit;
		$sta='edit_item';
	}
	
	if ($sta=='edit_item' or !empty($kq))
	{
		
		$token=$nv_Request->get_title('token', 'get,post', '');
		
		$key=explode('_',$token);
		if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) die('Stop!!!');

		$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$key[1]. ' where status=1 and id='.$key[2];
		$r = $db->query($sql)->fetch();$tt=0;
		$select='thanh_to'; $ds=select($select);
			foreach ($ds as $item)
			{
				$xtpl->assign('r', array('id' => $item['select_code'],'name' => $item['select_name'],'select' => ($r['thanh_to'] == $item['select_code']) ? ' selected="selected"' : ''));
				$xtpl->parse($sta.'.'.$select);
			}
			
			$sql = 'SELECT * FROM ' . KHOAPHONG. " where status=1";
			$ds = $db->query($sql)->fetchAll(); $ar=array(); $ar['account']='ALL';$ar['tenkhoa']='Toàn viện';$ds[]=$ar;
			foreach ($ds as $item)
			{
				$xtpl->assign('r', array('id' => $item['account'],'name' => $item['tenkhoa'],'select' => (in_array($item['account'], unserialize($r['pham_vi']))) ? ' selected="selected"' : ''));
				$xtpl->parse($sta.'.pham_vi');
			}
			foreach ($ds as $item)
			{
				$xtpl->assign('r', array('id' => $item['account'],'name' => $item['tenkhoa'],'select' => (in_array($item['account'], unserialize($r['list_khoacungcap']))) ? ' selected="selected"' : ''));
				$xtpl->parse($sta.'.khoacungcap');
			}
			
			$select='tansuatgui'; $ds=select($select);
			foreach ($ds as $item)
			{
				$xtpl->assign('r', array('id' => $item['select_code'],'name' => $item['select_name'],'select' => ($r['tansuatgui'] == $item['select_code']) ? ' selected="selected"' : ''));
				$xtpl->parse($sta.'.'.$select);
			}
		$xtpl->assign('ROW', $r);
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_back',MODULE_LINK . '&' . NV_OP_VARIABLE .'=bochitieu_setting&token=edit_'.$key[1]);
		$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
		$xtpl->assign('nam', $key[1]);	
		$xtpl->assign('THEME_URL', THEME_URL);
		
		//$xtpl->parse($sta.'.row');
		
	}
	
	
	$xtpl->parse($sta);
    $contents = $xtpl->text($sta);
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';