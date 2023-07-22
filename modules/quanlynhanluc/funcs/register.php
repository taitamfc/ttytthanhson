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
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$token =$nv_Request->get_title('token', 'get,post', ''); $key=explode("_",$token); $data=array();
	if ($sta=='save_canbo')	
	{
		$data=array();
		$data['maso_bv'] =$nv_Request->get_title('maso_bv', 'get,post', '');
		$data['hovaten'] =$nv_Request->get_title('hovaten', 'get,post', '');
		$data['ngaysinh'] =$nv_Request->get_title('ngaysinh', 'get,post', '');
		$data['gioitinh'] =$nv_Request->get_title('gioitinh', 'get,post', '');
		$data['diachi'] =$nv_Request->get_title('diachi', 'get,post', '');
		$data['dienthoai'] =$nv_Request->get_title('dienthoai', 'get,post', '');
		$data['id_khoaphong'] =$nv_Request->get_title('id_khoaphong', 'get,post', '');
		$data['chucvu'] =$nv_Request->get_title('chucvu', 'get,post', '');
		$data['sohieu_vc'] =$nv_Request->get_title('sohieu_vc', 'get,post', '');
		$data['phanloai_cb'] =$nv_Request->get_title('phanloai_cb', 'get,post', '');
		$data['hinhthuclamviec'] =$nv_Request->get_title('hinhthuclamviec', 'get,post', '');
		$data['nghe_nghiep'] =$nv_Request->get_title('nghe_nghiep', 'get,post', '');
		$data['trinhdo'] =$nv_Request->get_title('trinhdo', 'get,post', '');
		$data['chungchi_daotao'] =$nv_Request->get_title('chungchi_daotao', 'get,post', '');
		$data['thoigiancap_chungchi'] =$nv_Request->get_title('thoigiancap_chungchi', 'get,post', '');
		$data['noicap_chungchi'] =$nv_Request->get_title('noicap_chungchi', 'get,post', '');
		$data['chungchi_qldd'] =$nv_Request->get_title('chungchi_qldd', 'get,post', '');
		$data['thoigiancap_qldd'] =$nv_Request->get_title('thoigiancap_qldd', 'get,post', '');
		$data['noicap_qldd'] =$nv_Request->get_title('noicap_qldd', 'get,post', '');
		$data['chungchi_khac'] =$nv_Request->get_title('chungchi_khac', 'get,post', '');
		$data['thamgia_tochuc'] =$nv_Request->get_title('thamgia_tochuc', 'get,post', '');
		$data['chucvu_tochuc'] =$nv_Request->get_title('chucvu_tochuc', 'get,post', '');
		$data['congviec_hientai'] =$nv_Request->get_title('congviec_hientai', 'get,post', '');
		$data['nghi_lydo'] =$nv_Request->get_title('nghi_lydo', 'get,post', '');
		$data['tangcuong_khoa'] =$nv_Request->get_title('tangcuong_khoa', 'get,post', '');
		$data['tangcuong_tungay'] =$nv_Request->get_title('tangcuong_tungay', 'get,post', '');
		$data['tangcuong_denngay'] =$nv_Request->get_title('tangcuong_denngay', 'get,post', '');
		$data['tangcuong_thoigian'] =$nv_Request->get_title('tangcuong_thoigian', 'get,post', '');
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', '');
		
		//$user_info['username'].' edit by '.date('d/m/y h:i:s');
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (empty($data['maso_bv'])) $mes=++$err.' Mã số BV '.$lang_module['error_empty'];
		if (empty($data['hovaten'])) $mes=++$err.' Họ tên '.$lang_module['error_empty'];
		if (empty($data['ngaysinh'])) $mes=++$err.' Ngày sinh '.$lang_module['error_empty'];
		if (empty($data['diachi'])) $mes=++$err.' Địa chỉ '.$lang_module['error_empty'];
		//if (empty($data['phanloai_cb'])) $mes=++$err.' Điện thoại '.$lang_module['error_empty'];
		//if (empty($data['dienthoai'])) $mes=++$err.' Điện thoại '.$lang_module['error_empty'];
		if ($err>1) $mes=' Lưu ý: '.$lang_module['error'];
		
		if ($err==0){
				$sql = 'INSERT INTO ' . TABLE. "_canbo 
				(id,maso_bv,hovaten,ngaysinh,gioitinh,diachi,dienthoai,id_khoaphong,chucvu,sohieu_vc,phanloai_cb,trinhdo,ghichu)
				VALUES(NULL,:maso_bv,:hovaten,:ngaysinh,:gioitinh,:diachi,:dienthoai,:id_khoaphong,:chucvu,:sohieu_vc,:phanloai_cb,:trinhdo,:ghichu)";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':maso_bv', $data['maso_bv'], PDO::PARAM_STR);
				$stmt->bindParam(':hovaten', $data['hovaten'], PDO::PARAM_STR);
				$stmt->bindParam(':ngaysinh', $data['ngaysinh'], PDO::PARAM_STR);
				$stmt->bindParam(':gioitinh', $data['gioitinh'], PDO::PARAM_STR);
				$stmt->bindParam(':diachi', $data['diachi'], PDO::PARAM_STR);
				$stmt->bindParam(':dienthoai', $data['dienthoai'], PDO::PARAM_STR);
				$stmt->bindParam(':id_khoaphong', $data['id_khoaphong'], PDO::PARAM_STR);
				$stmt->bindParam(':chucvu', $data['chucvu'], PDO::PARAM_STR);
				$stmt->bindParam(':sohieu_vc', $data['sohieu_vc'], PDO::PARAM_STR);
				$stmt->bindParam(':phanloai_cb', $data['phanloai_cb'], PDO::PARAM_STR);
				$stmt->bindParam(':trinhdo', $data['trinhdo'], PDO::PARAM_STR);
				$stmt->bindParam(':ghichu', $data['ghichu'], PDO::PARAM_STR);				
				$row_id=$stmt->execute();
				if ($row_id>0) $ketqua['status']='OK';
				$ketqua['mess']= ($row_id==1)?$lang_module['update_ok']:$lang_module['update_err'];
		}
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
     $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$xtpl->assign('link_frm', MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('LINK_CLOSE', MODULE_LINK. '&' . NV_OP_VARIABLE . '=thongtindieuduong');
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$today=mktime(0, 0, 0, date('m'), date('d'), date('Y'));
	$quyen=check_quyen($user_info); $cri_khoa='';$tk_khoa=check_khoaphong($user_info['username']);
	if ($quyen<100) { $cri_khoa=' and id='.$tk_khoa;}
	
	$sql = 'SELECT * FROM ' . TABLE . '_khoaphong WHERE status = 1 '.$cri_khoa.' ORDER BY tenkhoa asc';
	$list = $db->query($sql);
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['id'],
					'name' => ++$tt.' - '.$r['tenkhoa'],
					'select' => ($tk_khoa == $r['id']) ? ' selected="selected"' : ''
				));
				$xtpl->parse('main.khoaphong');
			}
	$sql = 'SELECT * FROM ' . TABLE . "_select WHERE status = 1 and select_group like 'Sex'";
	$list = $db->query($sql);
		while ($r = $list->fetch()) {
			$xtpl->assign('r', array(
				'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['gioitinh'] == $r['select_name']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.gioitinh');
		}
		
	$sql = 'SELECT * FROM ' . TABLE . "_select WHERE status = 1 and select_group like 'phanloaicb'";
	$list = $db->query($sql);
		while ($r = $list->fetch()) {
			$xtpl->assign('r', array(
				'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['phanloai_cb'] == $r['select_name']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.phanloai');
		}
		
	$sql = 'SELECT * FROM ' . TABLE . "_select WHERE status = 1 and select_group like 'trinhdo'";
	$list = $db->query($sql);
		while ($r = $list->fetch()) {
			$xtpl->assign('r', array(
				'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['phanloai_cb'] == $r['select_name']) ? ' selected="selected"' : ''
			));
			$xtpl->parse('main.trinhdo');
		}

	$xtpl->assign('DATA', $data);
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';