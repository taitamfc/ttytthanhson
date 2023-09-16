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

if (empty($user_info))
{
		$url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login';
        Header('Location: ' . nv_url_rewrite($url, true));
        exit();
}
	$title='THÊM MỚI ';
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$token =$nv_Request->get_title('token', 'get,post', ''); $key=explode("_",$token); $data=array();
	if ($sta=='luu_vanban')	
	{
		$data['tentailieu'] =$nv_Request->get_title('tentailieu', 'get,post', '');
		$data['sohieu'] =$nv_Request->get_title('sohieu', 'get,post', '');
		$data['loaivanban'] =$nv_Request->get_title('loaivanban', 'get,post', '');
		$data['cq_banhanh'] =$nv_Request->get_title('cq_banhanh', 'get,post', '');
		$data['link_file'] =$nv_Request->get_title('link_file', 'get,post', '');
		$data['trichyeu'] =$nv_Request->get_title('trichyeu', 'get,post', '');
		$data['ngaybanhanh'] =$nv_Request->get_title('ngaybanhanh', 'get,post', '');
		$data['hieuluc'] =$nv_Request->get_title('hieuluc', 'get,post', '');
		//$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', '');
		$data['account'] =$user_info['username'];
		//$data['ngayluu'] =$nv_Request->get_title('ngayluu', 'get,post', '');
		//$data['status'] =$nv_Request->get_title('status', 'get,post', '');
		//$data['add_time'] =$nv_Request->get_title('add_time', 'get,post', '');

		if (!empty($data['ngaybanhanh']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['ngaybanhanh'], $m))
            $data['ngaybanhanh'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		/*if (!empty($data['denngay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['denngay'], $m))
            $data['denngay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);*/
		
		$err=0;$mes='Lỗi code:'.$sta;
		if ($err==0){
			if (md5($key[0])!=$key[1])
			{
				$sql = "INSERT INTO ".TABLE . "_tailieu (id, tentailieu, sohieu, loaivanban, cq_banhanh, link_file, trichyeu, ngaybanhanh, hieuluc, account, ngayluu)
				VALUES(NULL,:tentailieu,:sohieu,:loaivanban,:cq_banhanh,:link_file,:trichyeu,:ngaybanhanh,:hieuluc,:account,now())";
				$data_insert = array();
				$data_insert['tentailieu'] = $data['tentailieu'];
				$data_insert['sohieu'] = $data['sohieu'];
				$data_insert['loaivanban'] = $data['loaivanban'];
				$data_insert['cq_banhanh'] = $data['cq_banhanh'];
				$data_insert['link_file'] = $data['link_file'];
				$data_insert['trichyeu'] = $data['trichyeu'];
				$data_insert['ngaybanhanh'] = $data['ngaybanhanh'];
				$data_insert['hieuluc'] = $data['hieuluc'];
				$data_insert['account'] = $data['account'];	
				$row_id = ($db->insert_id($sql, 'id', $data_insert)>0)?1:0;	
			}
			else
			{
				$data['ghichu']=$data['account'].' Edit '.date('d/m/Y h:i:s');;
				$stmt = $db->prepare('Update ' .TABLE . "_tailieu set 
				tentailieu=:tentailieu,
				sohieu=:sohieu,
				loaivanban=:loaivanban,
				cq_banhanh=:cq_banhanh,
				link_file=:link_file,
				trichyeu=:trichyeu,
				ngaybanhanh=:ngaybanhanh,
				hieuluc=:hieuluc,
				ghichu=:ghichu WHERE id =".$key[0]);
				$stmt->bindParam(':tentailieu', $data['tentailieu'], PDO::PARAM_STR);
				$stmt->bindParam(':sohieu', $data['sohieu'], PDO::PARAM_STR);
				$stmt->bindParam(':loaivanban', $data['loaivanban'], PDO::PARAM_STR);
				$stmt->bindParam(':cq_banhanh', $data['cq_banhanh'], PDO::PARAM_STR);
				$stmt->bindParam(':link_file', $data['link_file'], PDO::PARAM_STR);
				$stmt->bindParam(':trichyeu', $data['trichyeu'], PDO::PARAM_STR);
				$stmt->bindParam(':ngaybanhanh', $data['ngaybanhanh'], PDO::PARAM_STR);
				$stmt->bindParam(':hieuluc', $data['hieuluc'], PDO::PARAM_STR);
				$stmt->bindParam(':ghichu', $data['ghichu'], PDO::PARAM_STR);				
				$row_id=$stmt->execute();
			}

				$ketqua['status']=($row_id>0)?'OK':'ERR';
				$ketqua['mess']= ($row_id>0)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}
	
	
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '=tailieudieuduong');
	
	//$xtpl->assign('sta',$sta);
	if ($sta=='edit_document')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_tailieu WHERE id='.$id;
		$data = $db->query($sql)->fetch();
		$data['ngaybanhanh']=date('d/m/Y',$data['ngaybanhanh']);
		$xtpl->assign('DATA',$data);
		$xtpl->assign('token',$token);
		$title='CẬP NHẬT ';
	}
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_select WHERE status = 1 and select_group like 'loai_vb'";
	$list = $db->query($sql);
	while ($r = $list->fetch()) {
		$xtpl->assign('r', array(
			'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['loaivanban'] == $r['select_name']) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.loaivanban');
	}
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_select WHERE status = 1 
	and select_group like 'loai_vb_hl'";
	$list = $db->query($sql);
	while ($r = $list->fetch()) {
		$xtpl->assign('r', array(
			'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['hieuluc'] == $r['select_name']) ? ' selected="selected"' : ''
		));
		$xtpl->parse('main.hieuluc');
	}
	
	$xtpl->assign('TITLE',$title);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';