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

if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';nv_redirect_location($url); exit();}
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	
	$tbl=TABLE . '_hanhchinh';
	if ($sta=='edit_item')
	{
		$checkss =$nv_Request->get_title('checkss', 'get,post', '');$key=md5($client_info['session_id'] . $global_config['sitekey']);
		if ($checkss!=$key) {die('Stop!!!');}
		$data=array();
		$err=0;
		$data['id']=$nv_Request->get_int('id', 'get,post', '');
		$data['tencoso']=$nv_Request->get_title('tencoso', 'get,post', '');
		//$data['loaihinh']=$nv_Request->get_title('loaihinh', 'get,post', '');
		$data['diachi']=$nv_Request->get_title('diachi', 'get,post', '');
		$data['dienthoai']=$nv_Request->get_title('dienthoai', 'get,post', '');
		$data['id_loaihinh']=$nv_Request->get_int('id_loaihinh', 'get,post', '');
		$data['giamdoc']=$nv_Request->get_title('giamdoc', 'get,post', '');
		$data['tp_tchc']=$nv_Request->get_title('tp_tchc', 'get,post', '');
		$data['tp_kehoach']=$nv_Request->get_title('tp_kehoach', 'get,post', '');
		$data['tp_taichinh']=$nv_Request->get_title('tp_taichinh', 'get,post', '');
		$data['tp_dieuduong']=$nv_Request->get_title('tp_dieuduong', 'get,post', '');
		
		if (empty($data['tencoso']) or empty($data['diachi']) or empty($data['dienthoai']) or empty($data['giamdoc']) 
			or empty($data['tp_tchc']) or empty($data['tp_kehoach']) or empty($data['tp_taichinh']) or empty($data['tp_dieuduong']) )
		$ketqua=++$err.'.'.$lang_module['error'];
		
		
		if ($err==0)
		{
			$stmt = $db->prepare('Update ' . $tbl. ' SET tencoso=:tencoso, diachi=:diachi, dienthoai=:dienthoai, 
			id_loaihinh=:id_loaihinh, giamdoc=:giamdoc, tp_tchc=:tp_tchc, tp_kehoach=:tp_kehoach, tp_taichinh=:tp_taichinh, tp_dieuduong=:tp_dieuduong 
			WHERE id ='.$data['id']);
			
			$stmt->bindParam(':tencoso', $data['tencoso'], PDO::PARAM_STR);
			$stmt->bindParam(':diachi', $data['diachi'], PDO::PARAM_STR);
			$stmt->bindParam(':dienthoai', $data['dienthoai'], PDO::PARAM_STR);
			$stmt->bindParam(':id_loaihinh', $data['id_loaihinh'], PDO::PARAM_STR);
			$stmt->bindParam(':giamdoc', $data['giamdoc'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_tchc', $data['tp_tchc'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_kehoach', $data['tp_kehoach'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_taichinh', $data['tp_taichinh'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_dieuduong', $data['tp_dieuduong'], PDO::PARAM_STR);
			//$stmt->bindParam(':ghichu',  strtotime(date('d/m/Y h:i:s')), PDO::PARAM_STR);
			$row_id=$stmt->execute();
			$ketqua= $row_id==1?$lang_module['update_ok']:$lang_module['update_err'];
			
			//$ketqua='Test nhận data'; 
		}
		
		echo $ketqua; exit;
	
	}
	$base_url =NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_name;

	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
    $xtpl->assign('URL_THEMES', NV_BASE_SITEURL . 'themes/cpanel');
	
	$sql = 'SELECT * FROM ' . $tbl;
	$result = $db->query($sql)->fetch();
	$xtpl->assign('link_frm',$base_url. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('link_register',$base_url. '&' . NV_OP_VARIABLE . '=register');
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('sta', 'find_item');
	$today = mktime(0, 0, 0, date('m'),  date('d'),  date('Y'));
	$token=md5($client_info['session_id'] . $global_config['sitekey']);
	
	$id_khoaphong =$find_id_khoa=$nv_Request->get_int('find_id', 'get,post',0); 
	$find_text =$nv_Request->get_title('find_text', 'get,post',0); $cri='';$cri_dieudong='';
	if(check_quyen($user_info)>100)
	{
		if ($id_khoaphong>0){$cri=" and (cb.id_khoaphong=" .$id_khoaphong .')';}
		if (!empty($find_text)){	
		$xtpl->assign('find_text', $find_text);
		$cri .= $cri_dieudong=" and (cb.hovaten like '%" .$find_text ."%' or cb.diachi like '%" .$find_text ."%' or cb.dienthoai like '%" .$find_text ."%' 
		or  cb.chucvu like '%" .$find_text ."%' or  cb.ngaysinh like '%" .$find_text ."%')";
		}
		$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . NV_PREFIXLANG . '_' . $module_data . '_canbo cb
		inner join '.NV_PREFIXLANG . '_' . $module_data . '_khoaphong khoa on khoa.id=cb.id_khoaphong WHERE (cb.status = 1) '.$cri.' ORDER BY cb.id_khoaphong, cb.maso_bv asc';
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$r['stt']=++$tt; $r['color']='';$r['status']='';
				if ($r['tangcuong_tungay']>0)
				{
					$r['color']='table-danger';
					$r['ghichu']='Tăng cường đến '.$r['tangcuong_khoa'].'('.date('d/m/Y',$r['tangcuong_tungay']).')';
					$r['status']=' disabled="" ';
				}
				$r['link_view']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=getthongtin&sta=chitietcanbo&id='.$r['id'];
				$r['link_bosung']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=chitietdieuduong&token='.$r['id'].'_'.$token;
				$xtpl->assign('ROW', $r);
				$xtpl->parse('main.row');
			}
		
		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_khoaphong WHERE status = 1 '.$cri_khoa.'ORDER BY tenkhoa asc';
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['id'],
					'name' => ++$tt.' - '.$r['tenkhoa'],
					'select' => ($find_id_khoa == $r['id']) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.khoaphong');
			}
			
	}
	else
	{
		//check tài khoản khoa 
	$tk_khoa=0;$cri_khoa='';
	$tk_khoa=check_khoaphong($user_info['username']);
	
	if ($tk_khoa>0) {$id_khoaphong =$tk_khoa;$cri_khoa= ' and (id=' .$id_khoaphong .')';}
	if ($id_khoaphong>0){$cri=" and (cb.id_khoaphong=" .$id_khoaphong .')';}
	if (!empty($find_text)){	
		$xtpl->assign('find_text', $find_text);
		$cri .= $cri_dieudong=" and (cb.hovaten like '%" .$find_text ."%' or cb.diachi like '%" .$find_text ."%' or cb.dienthoai like '%" .$find_text ."%' 
		or  cb.chucvu like '%" .$find_text ."%' or  cb.ngaysinh like '%" .$find_text ."%')";
	}
	
	$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . NV_PREFIXLANG . '_' . $module_data . '_canbo cb
	inner join '.NV_PREFIXLANG . '_' . $module_data . '_khoaphong khoa on khoa.id=cb.id_khoaphong WHERE (cb.status = 1) '.$cri.' ORDER BY cb.id_khoaphong, cb.maso_bv asc';
	$list = $db->query($sql);$tt=0;
        while ($r = $list->fetch()) {
			$r['stt']=++$tt; $r['color']='';$r['status']='';
			if ($r['tangcuong_tungay']>0)
			{
				$r['color']='table-danger';
				$r['ghichu']='Tăng cường đến '.$r['tangcuong_khoa'].'('.date('d/m/Y',$r['tangcuong_tungay']).')';
				$r['status']=' disabled="" ';
			}
			$r['link_view']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=getthongtin&sta=chitietcanbo&id='.$r['id'];
			$r['link_bosung']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=chitietdieuduong&token='.$r['id'].'_'.$token;
			$xtpl->assign('ROW', $r);
			$xtpl->parse('main.row');
        }
		
	//check ds tang cuong
	$sql = 'SELECT * FROM ' . TABLE . "_yeucaunhanluc WHERE status = 1 and user_yeucau like '".$user_info['username']."' and tg_ngayketthuc>=".intval($today);
	$list_yeucau = $db->query($sql);
        while ($ds = $list_yeucau->fetch())
		{
			if(!empty($ds['id_canbochuyen']))
			{
			$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . NV_PREFIXLANG . '_' . $module_data . '_canbo cb
			inner join '.NV_PREFIXLANG . '_' . $module_data . '_khoaphong khoa on khoa.id=cb.id_khoaphong WHERE 
			 (cb.status = 1) '.$cri_dieudong.' and (cb.id in ('.$ds['id_canbochuyen'].')) ORDER BY cb.id_khoaphong, cb.maso_bv asc';
			$list = $db->query($sql);
				while ($r = $list->fetch()) {
					$r['stt']=++$tt; $r['color']='';$r['status']='';
					if ($r['tangcuong_tungay']>0)
					{
						$r['color']='table-success';
						$r['ghichu']='Cán bộ tăng cường('.date('d/m/Y',$r['tangcuong_tungay']).')';
						$r['status']=' disabled="" ';
					}
					$xtpl->assign('ROW', $r);
					$xtpl->parse('main.row');
				}
			}
		}
		
		
	$quyen=check_quyen($user_info);
	if ($quyen>100) $cri_khoa=''; //20.02 dieu duong open full
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_khoaphong WHERE status = 1 '.$cri_khoa.'ORDER BY tenkhoa asc';
	$list = $db->query($sql);$tt=0;
        while ($r = $list->fetch()) {
			$xtpl->assign('r', array(
				'id' => $r['id'],
				'name' => ++$tt.' - '.$r['tenkhoa'],
				'select' => ($find_id_khoa == $r['id']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.khoaphong');
        }
	}
	$xtpl->assign('ROW', $result);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';