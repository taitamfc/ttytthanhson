<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_QLNL')) {
    die('Stop!!!');
}

if (empty($user_info)){	echo 'Truy cập không hợp lệ!'; exit;}

	$ketqua ='0000';
	/*
	$xtpl = new XTemplate('getthongtin.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);*/
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$token =$nv_Request->get_title('token', 'get,post', '');	
	$key=explode("_",$token);
	$today=mktime(0, 0, 0, date('m'), date('d'), date('Y'));
if ($sta=='remove_tochuc')	
{
	if (md5($key[1])!= $key[0]) { die('Stop!!!');}

	$id =$key[1];
	$sql = 'Update ' . TABLE. "_tttochuc SET denngay=".$today. ' where denngay=0 and id='.$id;
	$stmt = $db->prepare($sql);$row_id=$stmt->execute();
	$ketqua=($row_id>0)? 'OK_'.$lang_module['update_ok']: $ketqua='ERR_'.$lang_module['update_err'];
	//$ketqua= ($row_id>0)?$lang_module['update_ok']:$lang_module['update_err'];
	//nv_jsonOutput($ketqua); exit;
	echo $ketqua; exit;
}
if ($sta=='remove_taichinh')	
{
	if (md5($key[1])!= $key[0]) { die('Stop!!!');}

	$id =$key[1]; $ghichu=$user_info['username'].'_del at_'.date('d/m/Y H:i');
	$sql = 'Update ' . TABLE. "_tttaichinh_".$key[2]."_".$key[3]." SET status=0, ghichu='$ghichu' where id=".$id;
	$stmt = $db->prepare($sql);$row_id=$stmt->execute();
	$ketqua=($row_id>0)? 'OK_'.$lang_module['update_ok']: $ketqua='ERR_'.$lang_module['update_err'];
	echo $ketqua; exit;
}

if ($sta=='save_taichinh')	
{
	//if (md5($key[1])!= $key[0]) { die('Stop!!!');}
	$tbl =$nv_Request->get_title('table', 'get,post', '');

	$data=array();$ketqua=array();
	$data['ngayghi'] =$nv_Request->get_title('ngayghi', 'get,post', ''); 
	$data['diengiai'] =$nv_Request->get_title('diengiai', 'get,post', ''); 
	$data['thu'] =$nv_Request->get_int('thu', 'get,post', 0); 
	$data['chi'] =$nv_Request->get_int('chi', 'get,post', 0); 
	$data['nguoinop'] =$nv_Request->get_title('nguoinop', 'get,post', ''); 
	
	$err=0;$mes=$sql.'Lỗi code:'.$sta;
	if (!empty($data['ngayghi']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['ngayghi'], $m))
        $data['ngayghi'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
	else
		$mes=++$err.'.Lỗi, Xin vui lòng chọn ngày';

	if ($data['diengiai']=='') $mes =++$err.'Lỗi, vui lòng nhập diễn giải';
	if ($data['thu']==0 and $data['chi']==0) $mes =++$err.'Lỗi, vui lòng số tiền thu hoặc chi';
	if ($data['nguoinop']=='') $mes =++$err.'Lỗi, Chưa nhập thông tin người nộp';
	if ($err==0){
			$data['ghichu']=$user_info['username'].'_'.date('d/m/Y H:i');
			
			$sql = "INSERT INTO ".TABLE . "_tttaichinh_".$tbl." (id,ngayghi,diengiai,thu,chi,nguoinop,ghichu) VALUES(NULL,
			:ngayghi,:diengiai,:thu,:chi,:nguoinop,:ghichu)";
			$data_insert = array();
			$data_insert['ngayghi'] = $data['ngayghi'];
			$data_insert['diengiai'] = $data['diengiai'];
			$data_insert['thu'] = $data['thu'];
			$data_insert['chi'] = $data['chi'];
			$data_insert['nguoinop'] = $data['nguoinop'];				
			$data_insert['ghichu'] = $data['ghichu'];
			$row_id = $db->insert_id($sql, 'id', $data_insert);				
			$ketqua['status']=($row_id>0)?'OK':'ERR';
			
			$ketqua['mess']= ($row_id>0)?$lang_module['update_ok']:$lang_module['update_err'];
	}		
	else 
	{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	//echo $ketqua; exit;
}




echo $ketqua; exit;
