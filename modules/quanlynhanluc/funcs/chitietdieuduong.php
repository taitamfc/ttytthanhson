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
	$token =$nv_Request->get_title('token', 'get,post', '');	
	$key=explode("_",$token);
	$base_url =NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_name;

	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
    $xtpl->assign('LINK_CLOSE', MODULE_LINK. '&' . NV_OP_VARIABLE . '=thongtindieuduong');
    $xtpl->assign('token', $token);
	
	$today=mktime(0, 0, 0, date('m'), date('d'), date('Y'));
	if ($sta=='lichsudieudong')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbodieudong WHERE id_canbo='.$id .' order by denngay desc';
		$list = $db->query($sql)->fetchALL();
		/*$xtpl->assign('tc', $kq);
		$sql = 'SELECT cb.*, tc.tentochuc,khoa.tenkhoa , cbtc.noidung,cbtc.chucvuphancong,cbtc.ngaybatdau
		FROM ' . $tbl . '_canbo cb 
		inner join '. $tbl . '_khoaphong khoa on khoa.id=cb.id_khoaphong 
		inner join '. $tbl . '_canbotochuc cbtc on cb.id=cbtc.id_canbo 
		inner join '. $tbl . '_tochuc tc on tc.id_tochuc=cbtc.id_tochuc
		WHERE cb.status = 1 and tc.id_tochuc='.$id_tochuc.' ORDER BY tt asc';
		$list = $db->query($sql);
		$stt=0;
			while ($r = $list->fetch()) {
				$r['stt']=++$stt;
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}	
		*/
		if (empty($list))
		{
			$xtpl->assign('thongbao', 'Không có thông tin về lịch sử điều động cán bộ này');
			$xtpl->parse('no_history');	$ketqua = $xtpl->text('no_history');echo $ketqua; exit();
		}
		$tt=0;
		foreach($list as $r)
		{
			$r['stt']=++$tt; 
			$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
			$r['color']='table-danger';			
			$r['tungay']=date('d/m/Y',$r['tungay']);
			$r['denngay']=date('d/m/Y',$r['denngay']);
			$xtpl->assign('ROW', $r);
			$xtpl->parse($sta.'.row');
		}
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
	
if ($sta=='edit_profile')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);
		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_select WHERE status = 1 and select_group like 'Sex'";
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['gioitinh'] == $r['select_name']) ? ' selected="selected"' : ''
				));
				$xtpl->parse($sta.'.gioitinh');
			}
		
		$sql = 'SELECT * FROM ' . TABLE . "_select WHERE status = 1 and select_group like 'phanloaicb'";
	$list = $db->query($sql);
		while ($r = $list->fetch()) {
			$xtpl->assign('r', array(
				'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['phanloai_cb'] == $r['select_name']) ? ' selected="selected"' : ''
			));
			$xtpl->parse($sta.'.phanloai');
		}
		
	$sql = 'SELECT * FROM ' . TABLE . "_select WHERE status = 1 and select_group like 'trinhdo'";
	$list = $db->query($sql);
		while ($r = $list->fetch()) {
			$xtpl->assign('r', array(
				'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['trinhdo'] == $r['select_name']) ? ' selected="selected"' : ''
			));
			$xtpl->parse($sta.'.trinhdo');
		}

		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
if ($sta=='save_profile')	
	{
		$id =$key[0];	
		$data=array();//Lầm hơn sót!
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
		
		$data['ghichu'] =$user_info['username'].' edit by '.date('d/m/y h:i:s');		
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if ($err==0){
				$sql = 'Update ' . TABLE. "_canbo SET 
				maso_bv=:maso_bv,hovaten=:hovaten,
				ngaysinh=:ngaysinh,	gioitinh=:gioitinh,
				diachi=:diachi,dienthoai=:dienthoai,chucvu=:chucvu,
				sohieu_vc=:sohieu_vc,phanloai_cb=:phanloai_cb,trinhdo=:trinhdo,
				ghichu=:ghichu	WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':maso_bv', $data['maso_bv'], PDO::PARAM_STR);
				$stmt->bindParam(':hovaten', $data['hovaten'], PDO::PARAM_STR);
				$stmt->bindParam(':ngaysinh', $data['ngaysinh'], PDO::PARAM_STR);
				$stmt->bindParam(':gioitinh', $data['gioitinh'], PDO::PARAM_STR);
				$stmt->bindParam(':diachi', $data['diachi'], PDO::PARAM_STR);
				$stmt->bindParam(':dienthoai', $data['dienthoai'], PDO::PARAM_STR);
				//$stmt->bindParam(':id_khoaphong', $data['id_khoaphong'], PDO::PARAM_STR);
				$stmt->bindParam(':chucvu', $data['chucvu'], PDO::PARAM_STR);
				$stmt->bindParam(':sohieu_vc', $data['sohieu_vc'], PDO::PARAM_STR);
				$stmt->bindParam(':phanloai_cb', $data['phanloai_cb'], PDO::PARAM_STR);
				$stmt->bindParam(':trinhdo', $data['trinhdo'], PDO::PARAM_STR);

				$stmt->bindParam(':ghichu',$data['ghichu'] , PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) $ketqua['status']='OK';
				$ketqua['mess']= ($row_id==1)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}

if ($sta=='edit_khoaphong')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);
		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_khoaphong WHERE _show=1";
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['id'],	'name' => $r['tenkhoa'],'select' => ($data['id_khoaphong'] == $r['id']) ? ' selected="selected"' : ''
				));
				$xtpl->parse($sta.'.khoaphong');
			}
		
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_ttcongtac WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (empty($list))
		{
			$xtpl->assign('thongbao', 'Không có thông tin về lịch sử quá trình công tác của cán bộ này');
			$xtpl->parse($sta.'.norow');
		}
		else{
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['tungay']=date('d/m/Y',$r['tungay']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
if ($sta=='save_khoaphong')	
	{
		$id =$key[0];	
		$data=array();
		$data['tungay'] =$nv_Request->get_title('tungay', 'get,post', '');		
		$data['id_khoaphong'] =$nv_Request->get_title('id_khoaphong', 'get,post', '');		
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', '');			
		$sql = 'SELECT tenkhoa FROM ' . TABLE. "_khoaphong WHERE status = 1 and id=".$data['id_khoaphong'];
		$khoa = $db->query($sql)->fetch();
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (!empty($data['tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tungay'], $m))
            $data['tungay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'Lỗi chọn ngày';
		if ($err==0){
				$sql = 'Update ' . TABLE. "_canbo SET 
				id_khoaphong=:id_khoaphong WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':id_khoaphong', $data['id_khoaphong'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) {
				
				$sql = 'Update ' . TABLE. "_ttcongtac SET denngay=". $data['tungay']." WHERE denngay=0 and id_canbo=".$id;
				$stmt = $db->prepare($sql)->execute();		
				
				$sql = "INSERT INTO ".TABLE . "_ttcongtac (id,id_canbo,id_khoa,tenkhoa,ghichu,tungay) VALUES(NULL,
				:id_canbo,:id_khoa,:tenkhoa,:ghichu,:tungay)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['id_khoa'] = $data['id_khoaphong'];
				$data_insert['tenkhoa'] = $khoa['tenkhoa'];
				$data_insert['ghichu'] = $data['ghichu'];
				$data_insert['tungay'] = $data['tungay'];
				$_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']='OK';
				}
				$ketqua['mess']= ($row_id==1)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}


if ($sta=='edit_chucvu')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);		
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_ttchucvu WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (empty($list))
		{
			$xtpl->assign('thongbao', 'Không có thông tin về lịch sử quá trình chức vụ của cán bộ này');
			$xtpl->parse($sta.'.norow');
		}
		else{
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['tungay']=date('d/m/Y',$r['tungay']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
if ($sta=='save_chucvu')	
	{
		$id =$key[0];	
		$data=array();
		$data['tungay'] =$nv_Request->get_title('tungay', 'get,post', '');		
		$data['chucvu'] =$nv_Request->get_title('chucvu', 'get,post', '');		
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', '');			
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (!empty($data['tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tungay'], $m))
            $data['tungay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'Lỗi chọn ngày';
		if ($err==0){
				$sql = 'Update ' . TABLE. "_canbo SET 
				chucvu=:chucvu WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':chucvu', $data['chucvu'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) {
				
				$sql = 'Update ' . TABLE. "_ttchucvu SET denngay=". $data['tungay']." WHERE denngay=0 and id_canbo=".$id;
				$stmt = $db->prepare($sql)->execute();		
				
				$sql = "INSERT INTO ".TABLE . "_ttchucvu (id,id_canbo,chucvu,ghichu,tungay) VALUES(NULL,
				:id_canbo,:chucvu,:ghichu,:tungay)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['chucvu'] = $data['chucvu'];
				$data_insert['ghichu'] = $data['ghichu'];
				$data_insert['tungay'] = $data['tungay'];
				$_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']='OK';
				}
				$ketqua['mess']= ($row_id==1)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}


if ($sta=='edit_nghenghiep')	
	{
		
		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_select WHERE status = 1 and select_group like 'nghenghiep'";
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['nghe_nghiep'] == $r['select_name']) ? ' selected="selected"' : ''
				));
				$xtpl->parse($sta.'.luachonnghe');
			}
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);		
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_ttnghenghiep WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (empty($list))
		{
			$xtpl->assign('thongbao', 'Không có thông tin về lịch sử quá trình nghề nghiệp của cán bộ này');
			$xtpl->parse($sta.'.norow');
		}
		else{
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['tungay']=date('d/m/Y',$r['tungay']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
if ($sta=='save_nghenghiep')	
	{
		$id =$key[0];	
		$data=array();
		$data['tungay'] =$nv_Request->get_title('tungay', 'get,post', '');		
		$data['nghenghiep'] =$nv_Request->get_title('nghenghiep', 'get,post', '');		
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', '');			
		
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (!empty($data['tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tungay'], $m))
            $data['tungay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'Lỗi chọn ngày';
		if ($err==0){
				$sql = 'Update ' . TABLE. "_canbo SET 
				nghe_nghiep=:nghenghiep WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':nghenghiep', $data['nghenghiep'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) {
				
				$sql = 'Update ' . TABLE. "_ttnghenghiep SET denngay=". $data['tungay']." WHERE denngay=0 and id_canbo=".$id;
				$stmt = $db->prepare($sql)->execute();		
				
				$sql = "INSERT INTO ".TABLE . "_ttnghenghiep (id,id_canbo,nghenghiep,ghichu,tungay) VALUES(NULL,
				:id_canbo,:nghenghiep,:ghichu,:tungay)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['nghenghiep'] = $data['nghenghiep'];
				$data_insert['ghichu'] = $data['ghichu'];
				$data_insert['tungay'] = $data['tungay'];
				$_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']='OK';
				}
				$ketqua['mess']= ($row_id==1)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}


if ($sta=='edit_tochuc')	
	{
		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_tochuc WHERE status = 1 and parent like '0'";
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['tentochuc'],	'name' => $r['tentochuc'],'select' => ($data['thamgia_tochuc'] == $r['tentochuc']) ? ' selected="selected"' : ''
				));
				$xtpl->parse($sta.'.luachon_tc');
			}
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);		
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_tttochuc WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (empty($list))
		{
			$xtpl->assign('thongbao', 'Không có thông tin về lịch sử quá trình chức vụ của cán bộ này');
			$xtpl->parse($sta.'.norow');
		}
		else{
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['tungay']=date('d/m/Y',$r['tungay']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$r['link_remove']=$base_url. '&' . NV_OP_VARIABLE . '=execute&sta=remove_tochuc';
				$r['token']=md5($r['id']).'_'.$r['id'];
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('getthongtin',MODULE_LINK. '&' . NV_OP_VARIABLE . '=getthongtin&sta=thongtinchucvu');
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
if ($sta=='save_tochuc')	
	{
		$id =$key[0];	
		$data=array();
		$data['tungay'] =$nv_Request->get_title('tungay', 'get,post', '');		
		$data['tochuc'] =$nv_Request->get_title('tochuc', 'get,post', '');		
		$data['chucvu'] =$nv_Request->get_title('chucvu', 'get,post', '');			
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', '');			
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (!empty($data['tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tungay'], $m))
            $data['tungay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'.Lỗi, Xin vui lòng chọn ngày';
		if ($data['tochuc']=='') $mes =++$err.'Lỗi, vui lòng chọn tổ chức tham gia';
		
		if ($err==0){
				$sql = 'Update ' . TABLE. "_canbo SET 
				thamgia_tochuc=:tochuc, chucvu_tochuc=:chucvu WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':tochuc', $data['tochuc'], PDO::PARAM_STR);
				$stmt->bindParam(':chucvu', $data['ghichu'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) {
				
				/*$sql = 'Update ' . TABLE. "_tttochuc SET denngay=". $data['tungay']." WHERE denngay=0 and id_canbo=".$id;
				$stmt = $db->prepare($sql)->execute();*/		
				$data['thaotac'] =$user_info['username'].'_at_'.date('d/m/Y H:i');
				$sql = "INSERT INTO ".TABLE . "_tttochuc (id,id_canbo,tochuc,chucvu,ghichu,tungay,thaotac) VALUES(NULL,
				:id_canbo,:tochuc,:chucvu,:ghichu,:tungay,:thaotac)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['tochuc'] = $data['tochuc'];
				$data_insert['chucvu'] = $data['chucvu'];
				$data_insert['ghichu'] = $data['ghichu'];
				$data_insert['tungay'] = $data['tungay'];
				$data_insert['thaotac'] = $data['thaotac'];
				$_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']='OK';
				}
				$ketqua['mess']= ($row_id==1)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}


if ($sta=='edit_lichnghi')	
	{
		$id =$key[0];		

		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_select WHERE status = 1 and select_group like 'luachon_nghi'";
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['gioitinh'] == $r['select_name']) ? ' selected="selected"' : ''
				));
				$xtpl->parse($sta.'.luachonnghi');
			}
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_ttnghi WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (empty($list))
		{
			$xtpl->assign('thongbao', 'Không có thông tin về lịch sử quá trình nghỉ của cán bộ này');
			$xtpl->parse($sta.'.norow');
		}
		else{
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['tungay']=date('d/m/Y',$r['tungay']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
if ($sta=='save_lichnghi')	
	{
		$id =$key[0];	
		$data=array();
		$data['tungay'] =$nv_Request->get_title('tungay', 'get,post', '');		
		$data['denngay'] =$nv_Request->get_title('denngay', 'get,post', '');		
		$data['lydo'] =$nv_Request->get_title('lydo', 'get,post', '');		
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', '');			
		
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (!empty($data['tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tungay'], $m))
            $data['tungay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'Lỗi chọn ngày';
		
		if (!empty($data['denngay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['denngay'], $m))
            $data['denngay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);

		
		
		if ($err==0){
				$sql = 'Update ' . TABLE. "_canbo SET nghi_lydo=:nghi_lydo WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':nghi_lydo', $data['lydo'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) {
								
				$sql = "INSERT INTO ".TABLE . "_ttnghi (id,id_canbo,lydo,ghichu,tungay,denngay) VALUES(NULL,
				:id_canbo,:lydo,:ghichu,:tungay,:denngay)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['lydo'] = $data['lydo'];
				$data_insert['ghichu'] = $data['ghichu'];
				$data_insert['tungay'] = $data['tungay'];
				$data_insert['denngay'] = $data['denngay'];
				$_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']='OK';
				}
				$ketqua['mess']= ($row_id==1)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}

if ($sta=='edit_daotao')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);		
		
		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_select WHERE status = 1 and select_group like 'loaidaotao'";
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['select_name'],	'name' => $r['select_name'],'select' => ($data['gioitinh'] == $r['select_name']) ? ' selected="selected"' : ''
				));
				$xtpl->parse($sta.'.loaidaotao');
			}

		$sql = 'SELECT * FROM ' . TABLE. '_ttdaotao WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (empty($list))
		{
			$xtpl->assign('thongbao', 'Không có thông tin về lịch sử quá trình đào tạo của cán bộ này');
			$xtpl->parse($sta.'.norow');
		}
		else{
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['tungay']=date('d/m/Y',$r['tungay']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
if ($sta=='save_daotao')	
	{
		$id =$key[0];	
		$data=array();
		$data['loaidaotao'] =$nv_Request->get_title('loaidaotao', 'get,post', ''); 
		$data['tenlop'] =$nv_Request->get_title('tenlop', 'get,post', ''); 
		$data['donvicap'] =$nv_Request->get_title('donvicap', 'get,post', ''); 
		$data['tungay'] =$nv_Request->get_title('tungay', 'get,post', ''); 
		$data['denngay'] =$nv_Request->get_title('denngay', 'get,post', ''); 
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', ''); 
			
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (!empty($data['tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tungay'], $m))
            $data['tungay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'.Lỗi, Xin vui lòng chọn ngày bắt đầu';
		
		if (!empty($data['denngay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['denngay'], $m))
            $data['denngay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'.Lỗi, Xin vui lòng chọn ngày kết thúc';
		
		if ($data['tenlop']=='') $mes =++$err.'Lỗi, vui lòng chọn lớp đào tạo';
		if ($data['donvicap']=='') $mes =++$err.'Lỗi, vui lòng chọn đơn vị tổ chức/(cung cấp) chứng chỉ đào tạo';
		
		
		if ($err==0){
				/*$sql = 'Update ' . TABLE. "_canbo SET 
				thamgia_tochuc=:tochuc, chucvu_tochuc=:chucvu WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':tochuc', $data['tochuc'], PDO::PARAM_STR);
				$stmt->bindParam(':chucvu', $data['ghichu'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) */
				{
				
				/*$sql = 'Update ' . TABLE. "_tttochuc SET denngay=". $data['tungay']." WHERE denngay=0 and id_canbo=".$id;
				$stmt = $db->prepare($sql)->execute();*/		
				
				$sql = "INSERT INTO ".TABLE . "_ttdaotao (id,id_canbo,loaidaotao,tenlop,donvicap,tungay,denngay,ghichu) VALUES(NULL,
				:id_canbo,:loaidaotao,:tenlop,:donvicap,:tungay,:denngay,:ghichu)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['loaidaotao'] = $data['loaidaotao'];
				$data_insert['tenlop'] = $data['tenlop'];
				$data_insert['donvicap'] = $data['donvicap'];
				$data_insert['tungay'] = $data['tungay'];
				$data_insert['denngay'] = $data['denngay'];
				$data_insert['ghichu'] = $data['ghichu'];
				$row_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']=($row_id>0)?'OK':'ERR';
				}
				$ketqua['mess']= ($row_id==1)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}


if ($sta=='edit_chinhtri')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);		
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_ttchinhtri WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (!empty($list)){
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['tungay']=date('d/m/Y',$r['ngaycap']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				//$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
if ($sta=='save_chinhtri')	
	{
		$id =$key[0];	
		$data=array();
		$data['trinhdo'] =$nv_Request->get_title('trinhdo', 'get,post', ''); 
		$data['ngaycap'] =$nv_Request->get_title('tungay', 'get,post', ''); 
		$data['noicap'] =$nv_Request->get_title('noicap', 'get,post', ''); 
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', ''); 
	
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (!empty($data['ngaycap']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['ngaycap'], $m))
            $data['ngaycap'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'Lỗi chọn ngày';
				
		if ($data['trinhdo']=='') $mes =++$err.'Lỗi, vui lòng trình độ';
		if ($data['noicap']=='') $mes =++$err.'Lỗi, vui lòng chọn đơn vị tổ chức/(cung cấp) chứng chỉ đào tạo';
		
		
		
		if ($err==0){
				/*$sql = 'Update ' . TABLE. "_canbo SET 
				chucvu=:chucvu WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':chucvu', $data['chucvu'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) */
				{
				
				/*$sql = 'Update ' . TABLE. "_ttchinhtri SET denngay=". $data['tungay']." WHERE denngay=0 and id_canbo=".$id;
				$stmt = $db->prepare($sql)->execute();		*/
				
				$sql = "INSERT INTO ".TABLE . "_ttchinhtri (id,id_canbo,trinhdo,ngaycap,noicap,ghichu) VALUES(NULL,
				:id_canbo,:trinhdo,:ngaycap,:noicap,:ghichu)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['trinhdo'] = $data['trinhdo'];
				$data_insert['trinhdo'] = $data['trinhdo'];
				$data_insert['ngaycap'] = $data['ngaycap'];
				$data_insert['noicap'] = $data['noicap'];
				$data_insert['ghichu'] = $data['ghichu'];

				$row_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']=($row_id>0)?'OK':'ERR';
				
				}
				//if ()
				
				$ketqua['mess']= ($row_id>0)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}



if ($sta=='edit_khenthuong')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);		
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_ttkhenthuong WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (!empty($list)){
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['ngayqd']=date('d/m/Y',$r['ngayqd']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				//$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
if ($sta=='save_khenthuong')	
	{
		$id =$key[0];	
		$data=array();
		$data['ngayqd'] =$nv_Request->get_title('ngayqd', 'get,post', ''); 
		$data['so_qd'] =$nv_Request->get_title('so_qd', 'get,post', ''); 
		$data['cq_cap'] =$nv_Request->get_title('cq_cap', 'get,post', ''); 
		$data['hinhthuc'] =$nv_Request->get_title('hinhthuc', 'get,post', ''); 
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', ''); 

	
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (!empty($data['ngayqd']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['ngayqd'], $m))
            $data['ngayqd'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'Lỗi chọn ngày';
				
		if ($data['so_qd']=='') $mes =++$err.'Lỗi, vui lòng nhập số QĐ';
		if ($data['cq_cap']=='') $mes =++$err.'Lỗi, vui lòng chọn cơ quan cấp';
		if ($data['hinhthuc']=='') $mes =++$err.'Lỗi, vui lòng chọn hình thức khen thưởng';
		
		
		
		if ($err==0){
				/*$sql = 'Update ' . TABLE. "_canbo SET 
				chucvu=:chucvu WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':chucvu', $data['chucvu'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) */
				{
				
				/*$sql = 'Update ' . TABLE. "_ttchinhtri SET denngay=". $data['tungay']." WHERE denngay=0 and id_canbo=".$id;
				$stmt = $db->prepare($sql)->execute();		*/
				
				$sql = "INSERT INTO ".TABLE . "_ttkhenthuong (id,ngayqd,id_canbo,so_qd,cq_cap,hinhthuc,ghichu) VALUES(NULL,
				:ngayqd,:id_canbo,:so_qd,:cq_cap,:hinhthuc,:ghichu)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['ngayqd'] = $data['ngayqd'];
				$data_insert['so_qd'] = $data['so_qd'];
				$data_insert['cq_cap'] = $data['cq_cap'];
				$data_insert['hinhthuc'] = $data['hinhthuc'];
				$data_insert['ghichu'] = $data['ghichu'];


				$row_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']=($row_id>0)?'OK':'ERR';
				
				}
				//if ()
				
				$ketqua['mess']= ($row_id>0)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}


if ($sta=='edit_kyluat')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);		
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_ttkyluat WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (!empty($list)){
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['ngayqd']=date('d/m/Y',$r['ngayqd']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				//$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
	
if ($sta=='save_kyluat')	
	{
		$id =$key[0];	
		$data=array();
		$data['ngayqd'] =$nv_Request->get_title('ngayqd', 'get,post', ''); 
		$data['so_qd'] =$nv_Request->get_title('so_qd', 'get,post', ''); 
		$data['cq_qd'] =$nv_Request->get_title('cq_qd', 'get,post', ''); 
		$data['hinhthuc'] =$nv_Request->get_title('hinhthuc', 'get,post', ''); 
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', ''); 


	
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		if (!empty($data['ngayqd']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['ngayqd'], $m))
            $data['ngayqd'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'Lỗi chọn ngày';
				
		if ($data['so_qd']=='') $mes =++$err.'Lỗi, vui lòng nhập số QĐ';
		if ($data['cq_qd']=='') $mes =++$err.'Lỗi, vui lòng nhập cơ quan/phòng ra QĐ';
		if ($data['hinhthuc']=='') $mes =++$err.'Lỗi, vui lòng chọn hình thức kỷ luật';
		
		
		
		if ($err==0){
				/*$sql = 'Update ' . TABLE. "_canbo SET 
				chucvu=:chucvu WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':chucvu', $data['chucvu'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) */
				{
				
				/*$sql = 'Update ' . TABLE. "_ttchinhtri SET denngay=". $data['tungay']." WHERE denngay=0 and id_canbo=".$id;
				$stmt = $db->prepare($sql)->execute();		*/
				
				$sql = "INSERT INTO ".TABLE . "_ttkyluat (id,ngayqd,id_canbo,so_qd,cq_qd,hinhthuc,ghichu) VALUES(NULL,
				:ngayqd,:id_canbo,:so_qd,:cq_qd,:hinhthuc,:ghichu)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['ngayqd'] = $data['ngayqd'];
				$data_insert['so_qd'] = $data['so_qd'];
				$data_insert['cq_qd'] = $data['cq_qd'];
				$data_insert['hinhthuc'] = $data['hinhthuc'];
				$data_insert['ghichu'] = $data['ghichu'];


				$row_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']=($row_id>0)?'OK':'ERR';
				}
				$ketqua['mess']= ($row_id>0)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}


if ($sta=='edit_danhgia')	
	{
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_canbo WHERE id='.$id ;
		$data = $db->query($sql)->fetch();		
		$xtpl->assign('DATA', $data);		
		$id =$key[0];		
		$sql = 'SELECT * FROM ' . TABLE. '_ttdanhgia WHERE id_canbo='.$id .' order by id desc';
		$list = $db->query($sql)->fetchALL();
		
		if (!empty($list)){
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 
				//$r['status']=($today<$r['denngay'])?'Đang làm việc':'Đã kết thúc';
				//$r['color']='table-danger';			
				$r['ngayqd']=date('d/m/Y',$r['ngayqd']);
				//$r['denngay']=date('d/m/Y',$r['denngay']);
				//$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
		}
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit();
	}
	
if ($sta=='save_danhgia')	
	{
		$id =$key[0];	
		$data=array();
		$data['nam'] =$nv_Request->get_title('nam', 'get,post', ''); 
		$data['ketqua'] =$nv_Request->get_title('ketqua', 'get,post', ''); 
		$data['ghichu'] =$nv_Request->get_title('ghichu', 'get,post', ''); 


	
		$err=0;$mes=$sql.'Lỗi code:'.$sta;
		/*if (!empty($data['ngayqd']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['ngayqd'], $m))
            $data['ngayqd'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		else
			$mes=++$err.'Lỗi chọn ngày';*/
				
		if ($data['nam']=='') $mes =++$err.'Lỗi, vui lòng nhập năm';
		if ($data['ketqua']=='') $mes =++$err.'Lỗi, vui lòng nhập kết quả đánh giá';
		//if ($data['hinhthuc']=='') $mes =++$err.'Lỗi, vui lòng chọn hình thức kỷ luật';
		
		
		
		if ($err==0){
				/*$sql = 'Update ' . TABLE. "_canbo SET 
				chucvu=:chucvu WHERE id=".$id;
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':chucvu', $data['chucvu'], PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) */
				{
				
				/*$sql = 'Update ' . TABLE. "_ttchinhtri SET denngay=". $data['tungay']." WHERE denngay=0 and id_canbo=".$id;
				$stmt = $db->prepare($sql)->execute();		*/
				
				$sql = "INSERT INTO ".TABLE . "_ttdanhgia (id,nam,id_canbo,ketqua,ghichu) VALUES(NULL,
				:nam,:id_canbo,:ketqua,:ghichu)";
				$data_insert = array();
				$data_insert['id_canbo'] = $id;
				$data_insert['nam'] = $data['nam'];
				$data_insert['ketqua'] = $data['ketqua'];
				$data_insert['ghichu'] = $data['ghichu'];
				$row_id = $db->insert_id($sql, 'id', $data_insert);				
				$ketqua['status']=($row_id>0)?'OK':'ERR';
				}
				$ketqua['mess']= ($row_id>0)?$lang_module['update_ok']:$lang_module['update_err'];
		}		
		else 
		{$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;
	}



	if ($key[1]!=md5($client_info['session_id'] . $global_config['sitekey'])) die('!');
	
	
	
	$id =$key[0];//$nv_Request->get_title('id', 'get,post', '');
	$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . TABLE. "_canbo cb inner join
	". TABLE. "_khoaphong khoa on cb.id_khoaphong=khoa.id
	WHERE cb.status = 1 and cb.id=".$id;
	$r= $db->query($sql)->fetch();
	if ($r['tangcuong_tungay']>0)
	{
		$r['color']='table-danger';
		$r['ghichu']='Tăng cường đến '.$r['tangcuong_khoa'].'('.date('d/m/Y',$r['tangcuong_tungay']).')';
		$r['status']=' disabled="" ';
	}
	$r['link_dieudong']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=lichsudieudong&token='.$token;
	$r['link_edit']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_profile&token='.$token;
	$r['link_congtac']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_khoaphong&token='.$token;
	$r['link_chucvu']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_chucvu&token='.$token;
	$r['link_nghenghiep']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_nghenghiep&token='.$token;
	$r['link_tochuc']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_tochuc&token='.$token;
	$r['link_lichnghi']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_lichnghi&token='.$token;
	$r['link_daotao']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_daotao&token='.$token;
	$r['link_llct']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_chinhtri&token='.$token;
	$r['link_khenthuong']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_khenthuong&token='.$token;
	$r['link_kyluat']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_kyluat&token='.$token;
	$r['link_danhgia']=MODULE_LINK. '&' . NV_OP_VARIABLE .'='. $op.'&sta=edit_danhgia&token='.$token;
	$xtpl->assign('ROW', $r);
	
	
	/*$quyen=check_quyen($user_info);
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
	}*/
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';