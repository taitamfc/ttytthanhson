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
$quyen=check_quyen($user_info);
if ($quyen !=102) {	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=main';Header('Location: ' . nv_url_rewrite($url, true)); exit();}
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$token=$nv_Request->get_title('token', 'get,post', '');
	//cefe8b0f8971088bce7bdac501435fbe_202306_bv
	$key=explode('_',$token);
	//if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) {die('Stop!!!');}
	
	if ($sta=='updatereport')
	{

		$ketqua=array();
		$id = $nv_Request->get_int('id', 'post',0);
		$code = $nv_Request->get_title('code', 'post','');
		$data[$code] = $nv_Request->get_editor($code, '', NV_ALLOWED_HTML_TAGS);
		
		$apdung=array();$apdung=$global_apdung;
		$stmt = $db->prepare("Update ".TABLE."_baocao_".$apdung['nam']." set ".$code."=:value 
		where id =".$id);
		$stmt->bindParam(':value', $data[$code], PDO::PARAM_STR, strlen($data[$code]));
		$row_id=$stmt->execute();
		/*
		if ($row_id>0){
			$ketqua['status']='ok'; 
			$ketqua['mess']= $lang_module['update_ok']; 
			}
		else {
			$ketqua['status']='err'; 
			$ketqua['mess']= $lang_module['update_err']; 
			}
		//var_dump($ketqua);
		nv_jsonOutput($ketqua); exit;*/
	}

	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	//$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$key[0].'_'.$key[1].'_bv');
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL.'themes/' . $global_config['module_theme']);
	
	$sql = 'SELECT * FROM ' . TABLE. '_config';
	$list = $db->query($sql)->fetchAll();
	$config=array();
	foreach ($list as $l )	
	$config[$l['name']]=$l['value'];
	
	$apdung=array();
	$apdung=$global_apdung;
	
	//Show Content
	$sql = 'SELECT * FROM ' . TABLE. '_baocao_'.$apdung['nam']." where token='doankt' and thang=".$apdung['thangapdung'].' and nam='.$apdung['nam'];
	$list_content = $db->query($sql)->fetch();
	if (empty($list_content)) //khởi tạo nội dung đánh giá kỳ mới
	{
		$sql="INSERT INTO ".TABLE."_baocao_".$apdung['nam']." (id,token,thang,nam) 
			VALUES (NULL,'doankt', ".$apdung['thangapdung'].",".$apdung['nam'].")";
			$stmt = $db->prepare($sql)->execute();
	}
	$list_content['content_iii']=nv_aleditor('content_iii', '99%', '450px', $list_content['content_iii']);
	$list_content['content_v']=nv_aleditor('content_v', '99%', '450px', $list_content['content_v']);
	$list_content['content_vi']=nv_aleditor('content_vi', '99%', '450px', $list_content['content_vi']);
	$list_content['content_vii']=nv_aleditor('content_vii', '99%', '450px', $list_content['content_vii']);
	$list_content['content_viii']=nv_aleditor('content_viii', '99%', '450px', $list_content['content_viii']);
	$list_content['content_ix']=nv_aleditor('content_ix', '99%', '450px', $list_content['content_ix']);
	$list_content['content_x']=nv_aleditor('content_x', '99%', '450px', $list_content['content_x']);
	
	$xtpl->assign('COM', $list_content);
	
	$xtpl->assign('BC', $apdung);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
