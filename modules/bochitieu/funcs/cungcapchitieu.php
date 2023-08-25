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
	$token=$nv_Request->get_title('token', 'get,post', '');
	$key=explode('_',$token); //56052b7123097f4f1d4a72f1b8aeccba_D2.1_202306_4 
	if ($sta=='setdiemkehoach')
	{
		//ad3dfe5494dfc034e487eba73c2f0f77_A1.3_202306_1_5
		$k=$key[3].'_'.$key[1];//.'_'.$key[3];
		$sql = 'Update ' . TABLE. '_ketqua_'.$key[2]. " SET diem_kehoach=".$key[4]."  WHERE dinhdanh ='".$k."'";
		$stmt = $db->prepare($sql);
		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua='OK_'.$lang_module['update_ok'];
		else $ketqua='ERR_'.$lang_module['update_err'];
		echo $ketqua; exit();
	}
	if ($sta=='updateghichu')
	{
		//631ce8d71764da9dd2cccc656d415005_202306_1_A1.1
		$k=$key[1].'_'.$key[2];//.'_'.$key[3];
		$ghichu=$nv_Request->get_title('ghichu', 'get,post', '');
		//if (!empty($ghichu))
		{
		$sql = 'Update ' . TABLE. '_ketqua_'.$global_apdung['nam']. " SET ghichu='".$ghichu."'  WHERE dinhdanh ='".$k."'";
		$stmt = $db->prepare($sql);
		$row_id=$stmt->execute();
		if ($row_id>0) {$ketqua['status']='OK';$ketqua['mess']=$lang_module['update_ok'];}
		else
		{$ketqua['status']='ERR';$ketqua['mess']=$lang_module['update_err'];}
		$ketqua['url']=MODULE_LINK . '&' . NV_OP_VARIABLE .'='.$op.'&token='.$checkss.'_'.$key[1].'_'.$key[2];
		
		}//else	{$ketqua['status']='ERR';$ketqua['mess']= 'Lỗi, bạn chưa nhập ghi chú';}	
		nv_jsonOutput($ketqua); exit;
	}	
	if ($sta=='getvalue')
	{
		$code =$nv_Request->get_title('code', 'get,post', '');
		$key=explode('_',$code);
		//if ($checkss!=md5($client_info['session_id'] . $global_config['sitekey'])) {die('Stop!!!');}
		$quyen=check_quyen($user_info);
		$data=array();
		$data['token']=$key[0];
		$ketqua='';
		$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
		$xtpl->assign('BASE_URL', NV_BASE_SITEURL);
		$xtpl->assign('checkss', md5($client_info['session_id'] . $global_config['sitekey']));
		$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);
		$apdung=$global_apdung;
		$sql = 'SELECT * FROM ' . TABLE. "_question where code='".$key[1]."'";
		$q = $db->query($sql)->fetch();
		$xtpl->assign('CH', $q);
		for ($i=2; $i<=5;$i++)
		{
			$xtpl->assign('lev', $i);
			$xtpl->parse($sta.'.select');
		}
		
		$namapdung=$apdung['nam']; 
		$dinhdanh=$key[3].'_'.$key[1];//năm_nhóm câu hỏi_ tiểu mục
		//check trong csdl có tồn tại câu hỏi chưa? nếu chưa thì tiến hành lưu để xử lý sự kiện tiếp theo
		$sql = 'SELECT * FROM ' . TABLE. "_ketqua_".$namapdung." where dinhdanh ='".$dinhdanh."' and status=1";
		$kq = $db->query($sql)->fetch();
		$bv_danhgia=array(); $bv_danhgia=array();
		if (!empty($kq))
		{
			$bv_danhgia=explode(";",$kq['t'.$apdung['thangapdung'].'_bv_danhgia']);
			$doan_danhgia=explode(";",$kq['t'.$apdung['thangapdung'].'_doan_danhgia']);
			$xtpl->assign('KQ', $kq);
		}
		
		$sql = 'SELECT * FROM ' . TABLE. "_detail_question where status=1 and parent='".$key[1]."' order by code,tm asc";
		$list = $db->query($sql)->fetchAll();
		$color=array();
		$color[1]="#000";$color[2]="#9fe9bf";$color[3]="#add6f1";$color[4]="#f9e596";$color[5]="#f7c1bb";
		$listid='';$tt=0;
		foreach($list as $cs)
		{
			$cs['color']=$color[$cs['code']];
			$cs['bv_check']=$bv_danhgia[$tt]==1?" Checked ":"";
			$cs['doan_check']=$doan_danhgia[$tt]==1?" Checked ":"";
			$listid .=$cs['id'].';';$tt++;
			$cs['showfile']="display:none;";
			//Check đính kèm
			$sql = 'SELECT * FROM ' . TABLE. "_file where 
			account ='".$user_info['username']."' and token ='".$dinhdanh."' and status=1 and id_tm=".$cs['id'];
			$list_file = $db->query($sql)->fetch();
			if (!empty($list_file)) $cs['showfile']=" ";
			$xtpl->assign('link_viewfile', MODULE_LINK . '&' . NV_OP_VARIABLE . '=getthongtin&sta=dsdinhkem&token='.$dinhdanh.'_'.$cs['id']);

			$xtpl->assign('CS', $cs);
			if ($quyen==102) $xtpl->parse($sta.'.loop.qlcl');
			$xtpl->parse($sta.'.loop');			
		}
		

		//check trong csdl có tồn tại câu hỏi chưa? nếu chưa thì tiến hành lưu để xử lý sự kiện tiếp theo
		/*$sql = 'SELECT * FROM ' . TABLE. "_ketqua_".$namapdung." where dinhdanh ='".$dinhdanh."' and status=1";
		$kq = $db->query($sql)->fetch();*/
		$xtpl->assign('listid', $listid);
		$token=md5($listid);
		$xtpl->assign('dinhdanh', $token.'_'.$dinhdanh);
		$bv_danhgia=array(); $bv_danhgia=array();
		if (empty($kq))
		{
			$sql="INSERT INTO ".TABLE."_ketqua_".$namapdung."(id, token, account,dinhdanh, ds_cauhoi,ngaygio) VALUES 
			(NULL, :token,:account,:dinhdanh,:ds_cauhoi, now())";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':token', $token, PDO::PARAM_STR);
			$stmt->bindParam(':account', $user_info['username'], PDO::PARAM_STR);
			$stmt->bindParam(':dinhdanh', $dinhdanh, PDO::PARAM_STR);
			$stmt->bindParam(':ds_cauhoi',$listid, PDO::PARAM_STR);
			$row_id=$stmt->execute();
		}
		else
		{
			$bv_danhgia=explode(";",$kq['t'.$apdung['thangapdung'].'_bv_danhgia']);
			$doan_danhgia=explode(";",$kq['t'.$apdung['thangapdung'].'_doan_danhgia']);
		}
		/*else
		{
			$xtpl->assign('KQ', $kq);
		}*/
		
		$xtpl->parse($sta);
		$ketqua = $xtpl->text($sta);
		echo $ketqua; exit;
	
	}
	if ($sta=='savedanhgia')
	{
		//1;1;1;1;1;1;1;1;1;1;1;1;1;1;_873620ea40d06ed53992405f987955fe_2023_2_B1.1_1_5
		/*if (($key[5]==2) and (check_quyen($user_info)<>102))
		{
			$ketqua='ERR_Thao tác không được lưu. Chức năng này chỉ áp dụng cho phòng QLCL';	
			echo $ketqua; exit();
		}*/
		//0;0;0;1;1;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;_3af623de708f8dcf19ef5f5147675af2_3_C2.1_1_2
		//string new: 
		/*
		d35fe46f6e8f5709073e22d3ba8a19d7_
		1_ câu hỏi cha
		A1.1_ code
		0;0;0;0;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;_
		1_ đối tượng BV-KT
		5 điểm
		*/
		
		$id =$nv_Request->get_int('id', 'get,post', 0);
		$diem=($key[5]>0)?$key[5]:0;
		$thang=$global_apdung['thangapdung'];
		if (($key[4]==1))
			$update="t".$thang."_bv_danhgia='".$key[3]."',t".$thang."_diem_bvdg=".$diem;
		else
			$update="t".$thang."_doan_danhgia='".$key[3]."',t".$thang."_diem_doandg=".$diem;
		
		//$dinhdanh=$key[2].'_'.$key[3];//.'_'.$key[4];
		$desc=$user_info['username']." update ".date('d/m/Y h:i');
		//$sql = 'Update ' . TABLE. '_ketqua_'.$key[2]. " SET ".$update." , description='".$desc."'  WHERE dinhdanh ='".$dinhdanh."'";
		$sql = 'Update ' . TABLE. '_ketqua_'.$global_apdung['nam']. " SET ".$update." , description='".$desc.
		"'  WHERE dinhdanh ='".$key[1].'_'.$key[2]."'";
		$stmt = $db->prepare($sql);
		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua='OK_'.$lang_module['update_ok'];
		else $ketqua='ERR_'.$lang_module['update_err'];
		
		//$ketqua='ERR_'.$dinhdanh;
		echo $token; exit();
		
	}
	if ($sta=='delfile')
	{
		//Del file
		$sql = 'SELECT * FROM ' . TABLE. "_file where  id=".$key[1];
		$list = $db->query($sql)->fetch();$row_id=0;
		if (!empty($list)) 
		{
			// xóa file
			@nv_deletefile( NV_ROOTDIR . '/' .$list['url_file']);
			//xóa row
			$sql = 'Delete from ' . TABLE. "_file where id=".$key[1];
			$stmt = $db->prepare($sql);
			$row_id=$stmt->execute();
		}
		if ($row_id>0) $ketqua='OK_'.$lang_module['update_ok'];
		else $ketqua='ERR_Xóa không thành công!';
		echo $ketqua; exit();
	}
	if ($sta=='saveimage')
	{
		//token: 
		//d35fe46f6e8f5709073e22d3ba8a19d7_1_A1.1
		$id=$nv_Request->get_title('id', 'get,post', '');
		if (isset($_FILES, $_FILES['file'], $_FILES['file']['tmp_name'])) {
		$token=$key[1].'_'.$key[2];
		$filename=$_FILES["file"]["name"];
		
		$target_dir = "uploads/".$module_data."/";
		//$target_file = $filename.date("_ymdHi").".".$imageFileType;
		//$target_file = $target_dir . basename($_FILES["file"]["name"]);//$_FILES["file"]["name"]
		
		$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
		$target_file = $target_dir . $user_info['username'].'_'.basename($filename);
		$tb="";$uploadOk = 1;
		// Check file size
			if ($_FILES["file"]["size"] > 5000000) {
			$tb="ERR_Tập tin quá lớn.";$uploadOk = 0;
			}
			// Allow certain file formats
			$ext=array("jpg","png","jpeg","pdf","doc","docx");
			if(!in_array($imageFileType,$ext )) 
			{$tb="ERR_Chỉ cho phép đính kèm hình ảnh hoặc văn bản, pdf.";$uploadOk = 0;}
		if ($uploadOk == 1)
		{
			if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
				$tb="ERR_Lỗi khi gắn file đính kèm!.";
			else 
			{
				$sql="INSERT INTO ".TABLE."_file(id, token, account,namapdung, id_tm,url_file,file_name,file_type,ngaygio) VALUES 
				(NULL, :token,:account,:namapdung,:id_tm,:url_file,:file_name,:file_type, now())";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':token', $token, PDO::PARAM_STR);
				$stmt->bindParam(':account', $user_info['username'], PDO::PARAM_STR);
				$stmt->bindParam(':namapdung', $global_apdung['nam'], PDO::PARAM_STR);
				$stmt->bindParam(':id_tm',$id, PDO::PARAM_STR);
				$stmt->bindParam(':url_file',$target_file, PDO::PARAM_STR);
				$stmt->bindParam(':file_name',$filename, PDO::PARAM_STR);
				$stmt->bindParam(':file_type',$imageFileType, PDO::PARAM_STR);
				$row_id=$stmt->execute();
				$tb=$target_file;
			}
		}
		}
		echo $tb;  exit(); //NV_UPLOADS_REAL_DIR
	}
	if ($sta=='copydanhgia')
	{
		//1;1;1;1;1;1;1;1;1;1;1;1;1;1;_873620ea40d06ed53992405f987955fe_202306_2_B1.1_1_5
		if (check_quyen($user_info)<>102)
		{
			$ketqua='ERR_Thao tác không được lưu. Chức năng này chỉ áp dụng cho phòng QLCL';		
		}
		else{
			
		$desc=$user_info['username']." update copy ".date('d/m/Y h:i');
		$sql = 'Update ' . TABLE. '_ketqua_'.$global_apdung['nam']. " 
		SET t".$global_apdung['thangapdung']."_doan_danhgia=t".$global_apdung['thangapdung']."_bv_danhgia, 
		t".$global_apdung['thangapdung']."_diem_doandg=t".$global_apdung['thangapdung']."_diem_bvdg , 
		description='".$desc."'  WHERE token ='".$key[1]."'";
		$stmt = $db->prepare($sql);
		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua='OK_'.$lang_module['update_ok'];
		else $ketqua='ERR_'.$lang_module['update_err'];
		}
		echo $ketqua; exit();
		//echo $sql; exit();
		
	}
	if ($sta=='phanloaiphong')
	{
		//6f4922f45568161a8cdf4ad2299f6d23_18_tchc;
		if ( md5($key[1])<> $key[0]) die('Stop!!!');
		if (check_quyen($user_info)<100)
		{
			$ketqua='ERR_'.$lang_module['phanquyen_err'];		
		}
		else{
		//$account =$nv_Request->get_title('account', 'get,post', '');
		//$desc=$user_info['username']." update copy ".date('d/m/Y h:i');
		$sql = 'Update ' . TABLE. "_question SET phongxuly='".$key[2]."'  WHERE id ='".$key[1]."'";
		$stmt = $db->prepare($sql);
		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua='OK_'.$lang_module['update_ok'];
		else $ketqua='ERR_'.$lang_module['update_err'];
		}
		echo $ketqua; exit();
		
	}
	
	if ($sta=='lockvalue')
	{
		$desc=$user_info['username']." lock at ".date('d/m/Y h:i');
		$sql = 'Update ' . TABLE. '_ketqua_'.$key[1]. " SET trangthai=100 , description='".$desc."'  WHERE token ='".$key[0]."'";
		$stmt = $db->prepare($sql);
		$row_id=$stmt->execute();
		if ($row_id>0) $ketqua='OK_'.$lang_module['update_ok'];
		else $ketqua='ERR_'.$lang_module['update_err'];
		echo $ketqua; exit();
		
	}
	if ($sta=='updatechiso')
	{
		$checkss =$nv_Request->get_title('checkss', 'get,post', '');
		if ($checkss!=md5($client_info['session_id'] . $global_config['sitekey'])) {die('Stop!!!');}
		
		$data=array();
		$data['token']=$token;
		$data['ngaynhap']=$nv_Request->get_title('ngaynhap', 'get,post', '');
		//$data['thanh_to']=$nv_Request->get_title('thanh_to', 'get,post', '');
		$data['ketqua']=$nv_Request->get_array('ketqua', 'get,post', '');
		$err=0;$mess='';
		if (empty($data['ngaynhap'])) $mess=++$err.'.Ngày nhập '.$lang_module['error_empty'];
		if (!empty($data['ngaynhap']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $data['ngaynhap'], $m))
            $data['ngaynhap'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		
		
		if ($err==0)
		{
			$sql = 'Select ID from ' . TABLE. '_ketqua_'.$key[1]. " WHERE token ='".$key[0]."'";
			$kq = $db->query($sql)->fetch();
			if (empty($kq)){		
				$sql="INSERT INTO ".TABLE."_ketqua_".$key[1]."(id, token, account, ngaynhap,code,id_chiso,lannhap, ketqua,ngaygio) 
				VALUES (NULL, :token,:account,:ngaynhap,:code,:id_chiso,:lannhap,:ketqua, now())";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':token', $key[0], PDO::PARAM_STR);
				$stmt->bindParam(':account', $user_info['username'], PDO::PARAM_STR);
				$stmt->bindParam(':ngaynhap', $data['ngaynhap'], PDO::PARAM_STR);
				$stmt->bindParam(':code',$data['token'], PDO::PARAM_STR);
				$stmt->bindParam(':id_chiso',$key[2], PDO::PARAM_STR);
				$stmt->bindParam(':lannhap', $key[3], PDO::PARAM_STR);
				$stmt->bindParam(':ketqua', serialize($data['ketqua']), PDO::PARAM_STR);
				$row_id=$stmt->execute();
			}else
			{
				$desc=$user_info['username']." edit at ".date('d/m/Y h:i');
				$sql = 'Update ' . TABLE. '_ketqua_'.$key[1]. " SET ngaynhap=:ngaynhap, ketqua=:ketqua, 
				description=:note  
				WHERE trangthai<100  and token like '".$key[0]."'";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':ngaynhap', $data['ngaynhap'], PDO::PARAM_STR);
				$stmt->bindParam(':ketqua', serialize($data['ketqua']), PDO::PARAM_STR);
				$stmt->bindParam(':note',$desc, PDO::PARAM_STR);
				$row_id=$stmt->execute();
			}
			
			if ($row_id>0) {$ketqua['status']='OK';$ketqua['mess']=$lang_module['update_ok'];}
			else
			{$ketqua['status']='ERR';$ketqua['mess']=$lang_module['update_err'];}
			$ketqua['url']=MODULE_LINK . '&' . NV_OP_VARIABLE .'='.$op.'&token='.$checkss.'_'.$key[1].'_'.$key[2];
		}
		else	{$ketqua['status']='ERR';$ketqua['mess']= $mess;}	
		nv_jsonOutput($ketqua); exit;
	
	}
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$opt=md5($client_info['session_id'] . $global_config['sitekey']);
	$xtpl->assign('KY', $global_apdung);
	$xtpl->assign('checkss', $opt);
	$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);	
	$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$key[1]. ' where status=1 and id='.$key[2];
	$r = $db->query($sql)->fetch();
	$solan=1;//$r['tansuatgui'];
	
	/*$sql = 'SELECT * FROM ' . TABLE. '_cacchiso where status=1 and id_chiso='.$key[2].' order by tt';
	$list = $db->query($sql)->fetchAll();*/
	$cri='';$quyen=check_quyen($user_info);
	if ($quyen<100) {
		$cri=" and phongxuly in ('".$user_info['username']."','ALL')";
	}
	else {
		$sql = 'SELECT * FROM ' . TABLE. "_groupuser where status=1";
		$ds_khoa = $db->query($sql)->fetchAll(); $ar=array(); $ar['account']='ALL';$ar['tenkhoa']='Toàn viện';$ds_khoa[]=$ar;
	}
		
	$sql = 'SELECT * FROM ' . TABLE. "_question where status=1 and giatri=0 and parent='".$r['code']."' ".$cri." order by id";
	$list = $db->query($sql)->fetchAll();
	$ts['title']=$i;
	$apdung=array();
	/*$sql = 'SELECT * FROM ' . TABLE. "_apdung where nam='".$key[1]."'";	
	$apdung = $db->query($sql)->fetch();*/
	$apdung=$global_apdung;
	
	$log=$key[1]-1;$log1=$key[1]-2;
	$xtpl->assign('log', 'Năm '.$log);
	$xtpl->assign('log1', 'Năm '.$log1);

	foreach($list as $cs)
	{
		$cs['stt']=++$stt;
		$cs['tong_bvdg']=0;$cs['tong_doandg']=0;$cs['tong_kehoach']=0;
		
		$sql = 'SELECT * FROM ' . TABLE. "_question 
			where status=1 and giatri>0 and parent like '".$cs['code']."' order by code";
			$Q = $db->query($sql)->fetchAll();
			
			foreach($Q as $q)
			{
				$q['token']=$opt.'_'.$q['code'].'_'.$key[1].'_'.$key[2] ;//.$user_info['username']
				$xtpl->assign('Q', $q);	
				
				$kq=array(); 
				$sql = 'SELECT * FROM ' .TABLE. "_ketqua_".$apdung['nam']." where status=1 
				and dinhdanh like '".$key[2].'_'.$q['code']."'";
				
				//and account like '".$user_info['username']."'
				$kq = $db->query($sql)->fetch();
				if (empty($kq)) {$kq['diem_bvdg']=0;$kq['diem_doandg']=0;}
				else {$kq['diem_bvdg']=$kq['t'.$apdung['thangapdung'].'_diem_bvdg'];
				$kq['diem_doandg']=$kq['t'.$apdung['thangapdung'].'_diem_doandg'];}
				if ($kq['diem_doandg']>0)
					$kq['color']=($kq['diem_bvdg']<$kq['diem_doandg'])?" btn-danger":" btn-primary";
				else $kq['color']=($kq['diem_bvdg']<$kq['diem_namngoai'])?" btn-danger":" btn-primary";
				
				$cs['tong_bvdg'] +=$kq['diem_bvdg'];$cs['tong_doandg']+=$kq['diem_doandg'];
				$cs['tong_kehoach'] +=$kq['diem_kehoach'];
				$xtpl->assign('KQ', $kq);	
				
				if ($quyen>100) {
					for ($d=1;$d<=5;$d++){
						$xtpl->assign('r', array('id' => $d,'name' => $d,
					'select' => ($d==$kq['diem_kehoach'])? ' selected="selected"' : ''));
						$xtpl->parse('main.solan.chiso.loop.qlchatluong.diem');
					}
					$xtpl->parse('main.solan.chiso.loop.qlchatluong');
				}
				else $xtpl->parse('main.solan.chiso.loop.user');
				
				if (!empty($kq['ghichu']))  $xtpl->parse('main.solan.chiso.loop.ghichu');
				
				$xtpl->parse('main.solan.chiso.loop');
			}
			if ($quyen>100)
			{
				
				foreach ($ds_khoa as $item)
				{
					$xtpl->assign('token_phong', md5($cs['id']).'_'.$cs['id'] );
					$xtpl->assign('r', array('id' => $item['account'],'name' => $item['tenkhoa'],
					'select' => ($item['account']==$cs['phongxuly'])? ' selected="selected"' : ''));//(in_array($item['account'], unserialize($r['list_khoacungcap']))) 
					$xtpl->parse('main.solan.chiso.khoaphong.khoacungcap');
				}
				
				$xtpl->parse('main.solan.chiso.khoaphong');
			}
			
			$cs['tong_bvdg'] =round($cs['tong_bvdg']/count($Q),2);
			$cs['tong_doandg']=round($cs['tong_doandg']/count($Q),2);
			$cs['tong_kehoach']=round($cs['tong_kehoach']/count($Q),2);
			
			$xtpl->assign('CS', $cs);	
			$xtpl->parse('main.solan.chiso');
	}
		
		$xtpl->assign('token',md5($code).'_'.$code );//md5($key[1].$key[2].$i).'_'.$key[1].'_'.$key[2]);
		$xtpl->assign('sohang', ++$stt);
		$xtpl->parse('main.solan');	
		

	
	$sql = 'SELECT * FROM ' . TABLE. '_apdung where nam='.$key[1];	
	$kq = $db->query($sql)->fetch(); 
	
	$xtpl->assign('namapdung', $kq['tieude']);
	$xtpl->assign('ROW', $r);
	
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';