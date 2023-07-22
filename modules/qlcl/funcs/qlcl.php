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
	$tbl_name=NV_PREFIXLANG . '_' . $module_data;

	$xtpl = new XTemplate('frm_quanlynhanluc.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
    $xtpl->assign('URL_THEMES', NV_BASE_SITEURL. 'themes/' . $module_info['template']);
	
	$sql="SELECT * from ".NV_PREFIXLANG . '_' . $module_data . "_khoaphong where account ='".$user_info['username']."'";
	$phong=$db->query($sql)->fetch();
	$xtpl->assign('phong', $phong);
	$link=array();
	$link['dscb_di']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=dsdieudongdi';
	$link['dscb_den']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=dsdieudongden';
	$link['tinnhan']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=notification';//MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=tinnhan';
	$link['nhucaunhanluc']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=nhucaunhanluc';
	$xtpl->assign('link', $link);
	
	
	if ($sta=='nhucaunhanluc_step1')	
	{
		$data=array(); $ketqua=array();
		$data['sl_dieuduongco'] =$nv_Request->get_int('sl_dieuduongco', 'get,post', 0);
		$data['sl_hosinhco'] =$nv_Request->get_int('sl_hosinhco', 'get,post', 0);
		$data['sl_ktvco'] =$nv_Request->get_int('sl_ktvco', 'get,post', 0);
		$data['sl_dieuduongcan'] =$nv_Request->get_int('sl_dieuduongcan', 'get,post', 0);
		$data['sl_hosinhcan'] =$nv_Request->get_int('sl_hosinhcan', 'get,post', 0);
		$data['sl_ktvcan'] =$nv_Request->get_int('sl_ktvcan', 'get,post', 0);
		$data['lydo'] =$nv_Request->get_title('lydo', 'get,post', 0);
		$data['tg_tungay'] =$nv_Request->get_title('tg_tungay', 'get,post', 0);
		$data['tg_denngay'] =$nv_Request->get_title('tg_denngay', 'get,post', 0);
		$data['khoaphong'] =$nv_Request->get_title('khoaphong', 'get,post', 0);
		$data['code_pro'] =nv_md5safe(NV_CURRENTTIME);

		
		if (!empty($data['tg_tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tg_tungay'], $m))
            $data['tg_tungay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
	
		if ($data['tg_denngay']!='0')	
		if (!empty($data['tg_denngay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tg_denngay'], $m))
				$data['tg_denngay'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		
		$sql = "INSERT INTO ".NV_PREFIXLANG . '_' . $module_data . "_yeucaunhanluc (id, user_yeucau, khoa_yeucau, sl_dieuduongco, sl_hosinhco, 
		sl_ktvco, sl_dieuduongcan, sl_hosinhcan, sl_ktvcan, lydo, tg_tungay, tg_denngay, tg_ngaygui, code_pro) VALUES(NULL,
		:user_yeucau,:khoa_yeucau,:sl_dieuduongco,:sl_hosinhco,:sl_ktvco,:sl_dieuduongcan,:sl_hosinhcan,:sl_ktvcan,:lydo,:tg_tungay,:tg_denngay,:tg_ngaygui,:code_pro)";
		$data_insert = array();
		$data_insert['user_yeucau'] = $user_info['username'];
		$data_insert['khoa_yeucau'] = $data['khoaphong'];
		$data_insert['sl_dieuduongco'] = $data['sl_dieuduongco'];
		$data_insert['sl_hosinhco'] = $data['sl_hosinhco'];
		$data_insert['sl_ktvco'] = $data['sl_ktvco'];
		$data_insert['sl_dieuduongcan'] = $data['sl_dieuduongcan'];
		$data_insert['sl_hosinhcan'] = $data['sl_hosinhcan'];
		$data_insert['sl_ktvcan'] = $data['sl_ktvcan'];
		$data_insert['lydo'] = $data['lydo'];
		$data_insert['tg_tungay'] = $data['tg_tungay'];
		$data_insert['tg_denngay'] = $data['tg_denngay'];
		$data_insert['tg_ngaygui'] = intval(NV_CURRENTTIME);//date('d/m/y h:i:s');nv_date('d/m/Y',$row['ngaytochuc'])
		$data_insert['code_pro'] =$data['code_pro'];
		$row_id = $db->insert_id($sql, 'id', $data_insert)>0?1:0;
		//send notification Điều dưỡng
		if ($row_id>0)
		{
			//$sql="SELECT k.* from ".TABLE. "_khoaphong k left join ".TABLE. "_tochuc tc on k.id=tc.id_khoaphong";
			$sql="SELECT * from ".TABLE. "_groupuser where id_nhomquyen=2";
			$nguoinhan=$db->query($sql)->fetch();
			
			/*$sql = "INSERT INTO ".TABLE. "_notification(id, code_pro, nguoigui, nguoinhan, tieude, tg_gui)
			value (NULL,:code_pro,:nguoigui,:nguoinhan,:tieude,:tg_gui)";
			$data_insert = array();
			//$data_insert['id_yeucau'] = $data['code_pro'];
			$data_insert['code_pro'] = $data['code_pro'];
			$data_insert['nguoigui'] = $user_info['username'];
			$data_insert['nguoinhan'] = $nguoinhan['account'];
			$data_insert['tieude'] = sprintf($lang_module['yeucau_step1'],$user_info['username'],$phong['tenkhoa']);
			$data_insert['tg_gui'] = NV_CURRENTTIME;	
			$msg_id = $db->insert_id($sql, 'id', $data_insert)>0?1:0;*/
			$ds=array();
			$ds['code_pro']=$data['code_pro'];
			$ds['nguoigui']=$user_info['username'];
			$ds['nguoinhan']=$nguoinhan['account'];
			$ds['id_yeucau']=0;
			$ds['tieude']=sprintf($lang_module['yeucau_step1'],$user_info['username'],$phong['tenkhoa']);
			$msg_id = send_notification($ds);
			
			$ds['code_pro']=$data['code_pro'];
			$ds['nguoigui']=$nguoinhan['account'];
			$ds['nguoinhan']=$user_info['username'];
			$ds['id_yeucau']=0;
			$ds['tieude']=sprintf($lang_module['yeucau_step0']);
			$msg_id = send_notification($ds);
			
			
			$ketqua['status']='ok';
			$ketqua['url']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op;
			
		}
		
		$ketqua['mess']= $row_id==1?$lang_module['yeucau_ok']:$lang_module['yeucau_err'];
		//echo $ketqua; exit;		
		nv_jsonOutput($ketqua); exit;		
	}
	if ($sta=='nhucaunhanluc_step2')	
	{
		$data=array(); $ketqua=array();$err=0;$mes='';
		/*$data['sl_dieuduongduyet'] =$nv_Request->get_title('sl_dieuduongduyet', 'get,post', 0);
		$data['sl_hosinhduyet'] =$nv_Request->get_title('sl_hosinhduyet', 'get,post', 0);
		$data['sl_ktvduyet'] =$nv_Request->get_title('sl_ktvduyet', 'get,post', 0);
		$data['ghichu_duyet'] =$nv_Request->get_title('ghichu_duyet', 'get,post', 0);
		$data['tg_ngaybatdau'] =$nv_Request->get_title('tg_tungay', 'get,post', '');
		$data['tg_ngayketthuc'] =$nv_Request->get_title('tg_denngay', 'get,post', '');
		$data['id_khoachuyen'] =$nv_Request->get_title('id_khoaphong', 'get,post', 0);*/
		$data['id_khoachuyen'] =$nv_Request->get_array('id_khoaphong', 'get,post', 0);
		$data['sl_dieuduongduyet'] =$nv_Request->get_array('sl_dieuduongduyet', 'get,post', 0);
		$data['sl_hosinhduyet'] =$nv_Request->get_array('sl_hosinhduyet', 'get,post', 0);
		$data['sl_ktvduyet'] =$nv_Request->get_array('sl_ktvduyet', 'get,post', 0);
		$data['ghichu_duyet'] =$nv_Request->get_title('ghichu_duyet', 'get,post', 0);
		$data['tg_ngaybatdau'] =$nv_Request->get_title('tg_tungay', 'get,post', '');
		$data['tg_ngayketthuc'] =$nv_Request->get_title('tg_denngay', 'get,post', '');
		
		$data['code_pro'] =$nv_Request->get_title('code_pro', 'get,post', '');
		
		$khoachuyen=array();$khoachuyen['id']='';$khoachuyen['account']='';
		for ($i=0;$i<count($data['id_khoachuyen']);$i++)
		{
			if ($data['id_khoachuyen'][$i]==0 and $err==0) {$mes =++$err.'.Khoa/Phòng nhận yêu cầu chuyển'.$lang_module['error_empty'];}
			
			$khoachuyen['id'] .=$data['id_khoachuyen'][$i];
			if ($i!=(count($data['id_khoachuyen'])-1)) $khoachuyen['id'] .=',';
		}
		if ($err==0)
		{
			$sql="SELECT * from ".TABLE . "_khoaphong where id in(".$khoachuyen['id'].")";
			$phong=$db->query($sql);
			while ($r = $phong->fetch()) {
				$khoachuyen['account'] .=$r['account'].";";
			}
		}
		//else
		//{$mes .=++$err.'.Khoa/Phòng nhận yêu cầu chuyển'.$lang_module['error_empty'].serialize($data['sl_dieuduongduyet']);}
		
		
		if (!empty($data['tg_ngaybatdau']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tg_ngaybatdau'], $m))
            $data['tg_ngaybatdau'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
	
		if ($data['tg_ngayketthuc']!='0')	
		if (!empty($data['tg_ngayketthuc']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['tg_ngayketthuc'], $m))
				$data['tg_ngayketthuc'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		if ($err==0){
				/*sl_dieuduongduyet=:sl_dieuduongduyet,
				sl_hosinhduyet=:sl_hosinhduyet,
				sl_ktvduyet=:sl_ktvduyet,*/
				$sql = 'Update ' . TABLE. "_yeucaunhanluc SET 
				user_duyet=:user_duyet,
				dd_duyet_text=:dd_duyet_text,
				hs_duyet_text=:hs_duyet_text,
				ktv_duyet_text=:ktv_duyet_text,
				ghichu_duyet=:ghichu_duyet,
				tg_ngaybatdau=:tg_ngaybatdau,
				tg_ngayketthuc=:tg_ngayketthuc,
				id_khoachuyen=:id_khoachuyen,
				user_chuyen=:user_chuyen,
				ngayduyet=:ngayduyet
				WHERE code_pro like '".$data['code_pro']."'";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':user_duyet', $user_info['username'], PDO::PARAM_STR);
				$stmt->bindParam(':dd_duyet_text', serialize($data['sl_dieuduongduyet']), PDO::PARAM_STR);
				$stmt->bindParam(':hs_duyet_text', serialize($data['sl_hosinhduyet']), PDO::PARAM_STR);
				$stmt->bindParam(':ktv_duyet_text', serialize($data['sl_ktvduyet']), PDO::PARAM_STR);
				$stmt->bindParam(':ghichu_duyet', $data['ghichu_duyet'], PDO::PARAM_STR);
				$stmt->bindParam(':tg_ngaybatdau', $data['tg_ngaybatdau'], PDO::PARAM_STR);
				$stmt->bindParam(':tg_ngayketthuc', $data['tg_ngayketthuc'], PDO::PARAM_STR);
				$stmt->bindParam(':id_khoachuyen', $khoachuyen['id'], PDO::PARAM_STR);
				$stmt->bindParam(':user_chuyen', $khoachuyen['account'], PDO::PARAM_STR);
				//$stmt->bindParam(':id_khoachuyen', $data['id_khoachuyen'], PDO::PARAM_STR);
				//$stmt->bindParam(':user_chuyen', $phong['account'], PDO::PARAM_STR);
				$stmt->bindParam(':ngayduyet', date('d/m/y h:i:s'), PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) {
					$ketqua['status']='OK';
					$ketqua['url']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=notification';
					
					$sql="SELECT * from ".TABLE . "_yeucaunhanluc where code_pro like '".$data['code_pro']."'";
					$send_list=$db->query($sql)->fetch();
					$ds=array();
					//gui đến khoa nhận yêu cầu --> xử lý điều động
					$ds['code_pro']=$data['code_pro'];
					$ds['nguoigui']=$user_info['username'];
					$ds['nguoinhan']=$send_list['user_chuyen'];
					$ds['id_yeucau']=1;
					$ds['tieude']=sprintf($lang_module['yeucau_step2'],$send_list['khoa_yeucau']);
					$msg_id = send_notification($ds);
					//gui đến khoa đã yêu cầu --> theo dõi
					$ds['code_pro']=$data['code_pro'];
					$ds['nguoigui']=$user_info['username'];
					$ds['nguoinhan']=$send_list['user_yeucau'];$ds['id_yeucau']=0;
					$ds['tieude']=sprintf($lang_module['yeucau_step2a']);
					$msg_id .= send_notification($ds);
					
					
					//chuyển trạng thái xử lý
					$sql = 'Update ' . TABLE. "_notification SET step=2 WHERE step=1 and code_pro like '".$data['code_pro']."'"; $stmt = $db->prepare($sql);$row_id=$stmt->execute();
					
				}
				//var_dump($data);
			
			
			//{$ketqua['status']='ERR';$ketqua['mess']=$sql;}
			$ketqua['mess']= ($row_id==1)?$lang_module['yeucau_ok']:$lang_module['yeucau_err'];
		}
		else {$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;	
	}
	
	if ($sta=='nhucaunhanluc_step3')	
	{
		$data=array(); $ketqua=array();$err=0;$mes='';
		$data['id_canbochuyen'] =$nv_Request->get_array('idcheck', 'get,post', '');
		$data['danhgia_khoachuyen'] =$nv_Request->get_title('danhgia_khoachuyen', 'get,post', 0);
		$data['ghichu_khoachuyen'] =$nv_Request->get_title('ghichu_khoachuyen', 'get,post', 0);
		$data['code_pro'] =$nv_Request->get_title('code_pro', 'get,post', '');
		$list_cb='';
		for ($i=0;$i<count($data['id_canbochuyen']);$i++)
		{
			$list_cb .=$data['id_canbochuyen'][$i].(($i==count($data['id_canbochuyen'])-1)?'':',');
			
		}
		
		if ($list_cb=='')
		{$mes=++$err.'.Cột chọn nhân viên điều động'.$lang_module['error_empty'];}
		
		if ($err==0){
				//check ds đã có chưa?
				$sql="SELECT * from ".TABLE . "_yeucaunhanluc where code_pro like '".$data['code_pro']."'";
				$list=$db->query($sql)->fetch(); $ds_chuyen='';
				if (!empty($list['id_canbochuyen'])) $list_cb =$list['id_canbochuyen'].','.$list_cb;
				
				$sql = 'Update ' . TABLE. "_yeucaunhanluc SET 
				id_canbochuyen=:id_canbochuyen,
				danhgia_khoachuyen=:danhgia_khoachuyen,
				ghichu_khoachuyen=:ghichu_khoachuyen,
				ngayduyet_chuyen=:ngayduyet_chuyen
				WHERE code_pro like '".$data['code_pro']."'";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':danhgia_khoachuyen',  $data['id_canbochuyen'], PDO::PARAM_STR);
				$stmt->bindParam(':id_canbochuyen',$list_cb, PDO::PARAM_STR);
				$stmt->bindParam(':ghichu_khoachuyen', $data['ghichu_khoachuyen'], PDO::PARAM_STR);
				$stmt->bindParam(':ngayduyet_chuyen', date('d/m/y h:i:s'), PDO::PARAM_STR);
				$row_id=$stmt->execute();
				if ($row_id>0) {
					$ketqua['status']='OK';
					$ketqua['url']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=notification';
					
					$sql="SELECT * from ".TABLE . "_yeucaunhanluc where code_pro like '".$data['code_pro']."'";
					$send_list=$db->query($sql)->fetch();
					$ds=array();
					//gui đến khoa nhận yêu cầu --> xử lý điều động
					/*$ds['code_pro']=$data['code_pro'];
					$ds['nguoigui']=$user_info['username'];
					$ds['nguoinhan']=$send_list['user_duyet'];
					$ds['tieude']=sprintf($lang_module['yeucau_step3'],$send_list['khoa_yeucau']);
					$msg_id = send_notification($ds);
					//gui đến khoa đã yêu cầu --> theo dõi
					$ds['code_pro']=$data['code_pro'];
					$ds['nguoigui']=$user_info['username'];
					$ds['nguoinhan']=$send_list['user_yeucau'];
					$ds['tieude']=sprintf($lang_module['yeucau_step3']);
					$msg_id .= send_notification($ds);
					*/
					//cập nhật trạng thái nhân lực
					$sql = 'Update ' . TABLE. "_canbo SET 
					tangcuong_khoa=:tangcuong_khoa,
					tangcuong_tungay=:tangcuong_tungay,
					tangcuong_denngay=:tangcuong_denngay
					WHERE id in (".$list_cb.")";
					$stmt = $db->prepare($sql);
					$stmt->bindParam(':tangcuong_khoa', $send_list['khoa_yeucau'], PDO::PARAM_STR);
					$stmt->bindParam(':tangcuong_tungay', $send_list['tg_ngaybatdau'], PDO::PARAM_STR);
					$stmt->bindParam(':tangcuong_denngay', $send_list['tg_ngayketthuc'], PDO::PARAM_STR);
					$cb=$stmt->execute();
					
					//chuyển trạng thái xử lý
					$sql = 'Update ' . TABLE. "_notification SET step=3 WHERE step=2 and code_pro like '".$data['code_pro']."' and (id_yeucau=0 or nguoinhan like '".$user_info['username']."')"; $stmt = $db->prepare($sql);$row_id=$stmt->execute();
					//lưu lịch sử 
					$sql = 'Insert into ' . TABLE. "_canbodieudong(code_pro,id_canbo,tungay,denngay,tangcuong_khoaphong)
					select  '".$data['code_pro']."' as code_pro, id, tangcuong_tungay, tangcuong_denngay, tangcuong_khoa 
					from ". TABLE. "_canbo WHERE id in (".$list_cb.")"; $stmt = $db->prepare($sql);$row_id=$stmt->execute();
				}
				//var_dump($data);
			
			
			//{$ketqua['status']='ERR';$ketqua['mess']=$sql;}
			$ketqua['mess']= ($row_id==1)?$lang_module['yeucau_ok']:$lang_module['yeucau_err'];
		}
		else {$ketqua['status']='ERR';$ketqua['mess']=$mes;}
		nv_jsonOutput($ketqua); exit;	
	}
	
	if ($sta=='dsdieudongdi')
	{
	$cri=' and (cb.tangcuong_denngay>'.intval(NV_CURRENTTIME).') ';
	//dieuduong hoặc admin show full
	$check=menu_phanquyen($user_info['username']);
	if ($check['id_nhom']<2) $cri .= " and (khoa.account like '".$user_info['username']."') ";
		
	$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . NV_PREFIXLANG . '_' . $module_data . '_canbo cb
	inner join '.NV_PREFIXLANG . '_' . $module_data . '_khoaphong khoa on khoa.id=cb.id_khoaphong WHERE (cb.status = 1) '.$cri.' ORDER BY cb.id_khoaphong, cb.maso_bv asc';
	$list = $db->query($sql);$tt=0;
        while ($r = $list->fetch()) {
			$r['stt']=++$tt; $r['color']='';$r['status']='';
			if ($r['tangcuong_tungay']>0)
			{
				$r['color']='table-danger';
				$r['ghichu']='Tăng cường khoa <b>'.$r['tangcuong_khoa'].'</b> đến ngày '.date('d/m/Y',$r['tangcuong_denngay']);
			}
			$xtpl->assign('ROW', $r);
			$xtpl->parse($sta.'.row');
        }
		$xtpl->assign('DATA', $data);
		$xtpl->assign('phong', $phong);
		$xtpl->assign('link_frm',MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);
		$ketqua ='';
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit;
	}
	if ($sta=='dsdieudongden')
	{
	$cri=' and (cb.tangcuong_denngay>'.intval(NV_CURRENTTIME).') ';
	//dieuduong hoặc admin show full
	$check=menu_phanquyen($user_info['username']);
	if ($check['id_nhom']<2) $cri .= " and (cb.tangcuong_khoa like '".$phong['tenkhoa']."') ";
		
	$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . NV_PREFIXLANG . '_' . $module_data . '_canbo cb
	inner join '.NV_PREFIXLANG . '_' . $module_data . '_khoaphong khoa on khoa.id=cb.id_khoaphong WHERE (cb.status = 1) '.$cri.' ORDER BY cb.id_khoaphong, cb.maso_bv asc';
	$list = $db->query($sql);$tt=0;
        while ($r = $list->fetch()) {
			$r['stt']=++$tt; $r['color']='';$r['status']='';$r['color']='';
			$r['ghichu']='Tăng cường đến ngày <b>'.date('d/m/Y',$r['tangcuong_denngay']).'</b>';
			/*if ($r['tangcuong_tungay']>0)
			{
				//date('d/m/Y',$r['tangcuong_denngay']- intval(NV_CURRENTTIME)
			}*/
			$xtpl->assign('ROW', $r);
			$xtpl->parse($sta.'.row');
        }
		$xtpl->assign('DATA', $data);
		$xtpl->assign('phong', $phong);
		$xtpl->assign('link_frm',MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);
		$ketqua ='';
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit;
	}
	
	if (!empty($sta))
	{
		$data=array();$data['sl_dieuduongco']=0;$data['sl_hosinhco']=0;$data['sl_ktvco']=0;$data['sl_dieuduongcan']=0;$data['sl_hosinhcan']=0;$data['sl_ktvcan']=0;
		$xtpl->assign('DATA', $data);
		$xtpl->assign('phong', $phong);
		$xtpl->assign('link_frm',MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);
		$ketqua ='';
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit;
	}
	
	
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
	
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';