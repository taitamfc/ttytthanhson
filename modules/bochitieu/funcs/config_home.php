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

if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';Header('Location: ' . nv_url_rewrite($url, true)); exit();}

	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$token=$nv_Request->get_title('token', 'get,post', '');
	//cefe8b0f8971088bce7bdac501435fbe_202306_bv
	$key=explode('_',$token);
	//if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) {die('Stop!!!');}
	
	if ($sta=='edit_report')
	{
		//74691a37b603277591e9b416fadcc28d_202306_bv_header
		$sql = 'SELECT * FROM ' . TABLE. '_baocao_'.$key[1]. " where status=1 and token='".$key[2]."' and code='".$key[3]."'";
		$R = $db->query($sql)->fetch();
		$ketqua = nv_aleditor($R['code'], '99%', '450px', $R['value']);
		echo $ketqua; exit();
		
	}
	if ($sta=='updatevalue')
	{
		//74691a37b603277591e9b416fadcc28d_202306_bv_header
		
		$ketqua=array();
		$code = $nv_Request->get_title('code', 'post','');
		$data[$code] = $nv_Request->get_editor($code, '', NV_ALLOWED_HTML_TAGS);
		
		$stmt = $db->prepare("Update ".TABLE."_baocao_".$key[1]." set value=:value where code ='".$code."'");
		$stmt->bindParam(':value', $data[$code], PDO::PARAM_STR, strlen($data[$code]));
		$row_id=$stmt->execute();
		
		if ($row_id>0){
			$ketqua['status']='ok'; 
			$ketqua['mess']= $data[$code];//$lang_module['update_ok']; 
			}
		else {
			$ketqua['status']='err'; 
			$ketqua['mess']= $code;//$lang_module['update_err']; 
			}
		//var_dump($ketqua);
		//nv_jsonOutput($ketqua); exit;
	}
	if ($sta=='quyensudung')
	{
		$ketqua='';
		$stmt = $db->prepare("Update ".TABLE."_groupuser set id_nhomquyen=:id_nhomquyen where id =".$key[1]);
		$stmt->bindParam(':id_nhomquyen', $key[2], PDO::PARAM_STR);
		$row_id=$stmt->execute();
		
		if ($row_id>0) $ketqua= 'OK_'.$lang_module['update_ok']; 
		else $ketqua='ERR_'.$lang_module['update_err'];
		//var_dump($ketqua);
		//nv_jsonOutput
		$ketqua="Update ".TABLE."_groupuser set id_nhomquyen=:id_nhomquyen where id =".$key[1];
		echo($ketqua); exit;
	}
	if ($sta=='updateconfig')
	{
		//74691a37b603277591e9b416fadcc28d_202306_bv_header
		
		$ketqua=array();
		$id = $nv_Request->get_title('id', 'post','');
		$description = $nv_Request->get_editor('description', '', NV_ALLOWED_HTML_TAGS);
		
		$apdung=array();$apdung=$global_apdung;
		$sql="Update ".TABLE."_rows set description=:description where id =".$id;
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':description', $description, PDO::PARAM_STR, strlen($description));
		$row_id=$stmt->execute();
	}
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL.'themes/' . $global_config['module_theme']);
	
	$quyen=check_quyen($user_info);
	$apdung=array();
	$apdung=$global_apdung;
	
	$sql = 'SELECT * FROM ' . TABLE. '_groupmenu where id_nhom <> 101';
	$group = $db->query($sql)->fetchAll();
	
	
	$sql = 'SELECT * FROM ' . TABLE. '_groupuser where id_nhomquyen <> 101';
	$list = $db->query($sql)->fetchAll(); $stt=0;
	
	foreach ($list as $l)
	{
		$l['stt']=++$stt;
		foreach ($group as $g)
		{
			
			$xtpl->assign('token_phong', md5($l['id']).'_'.$l['id']);
			$xtpl->assign('g', array('id' => $g['id_nhom'],'name' => $g['tennhom'],
			'select' => ($g['id_nhom']==$l['id_nhomquyen'])? ' selected="selected"' : ''));
			$xtpl->parse('main.user.group');
		}
		$xtpl->assign('U', $l);
		$xtpl->parse('main.user');
	}
	//Show Content
	//$sql = 'SELECT * FROM ' . TABLE. '_baocao_'.$apdung['nam'].' where thang='.$apdung['thangapdung'].' and nam='.$apdung['nam'];
	$sql = 'SELECT * FROM ' . TABLE. '_rows where id=1';
	$list_content = $db->query($sql)->fetch();
	if (empty($list_content)) //khởi tạo nội dung đánh giá kỳ mới
	{
		$sql="INSERT INTO ".TABLE."_rows (id) 
			VALUES (NULL)";
			$stmt = $db->prepare($sql)->execute();
	}
	$list_content['description']=nv_aleditor('description', '99%', '350px', $list_content['description']);
	$xtpl->assign('COM', $list_content);
	
	
	
	
	
	$xtpl->assign('BC', $apdung);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
