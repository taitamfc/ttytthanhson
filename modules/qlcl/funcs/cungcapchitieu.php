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
	$key=explode('_',$token);
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
	$xtpl->assign('checkss', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op);
	
	
	$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$key[1]. ' where status=1 and id='.$key[2];
	$r = $db->query($sql)->fetch();
	$solan=$r['tansuatgui'];
	
	$sql = 'SELECT * FROM ' . TABLE. '_cacchiso where status=1 and id_chiso='.$key[2].' order by tt';
	$list = $db->query($sql)->fetchAll();
	$ts['title']=$i;
	for ($i=1;$i<=$solan;$i++)
	{
		$ts['title']=$lang_module['tansuat'.$solan.'_'.$i];
		$ts['no']=$i;
		
		$xtpl->assign('TS', $ts);
		$stt=0;
		$code=$key[1].'_'.$key[2].'_'.$i;
		
		//check chỉ tiêu đã nhập/khóa chưa?
		$kq=array();
		$sql = 'SELECT * FROM ' .TABLE. "_ketqua_".$key[1]." where status=1 and account like '".$user_info['username']."'and token like '".md5($code.$user_info['username'])."'";
		$kq = $db->query($sql)->fetch();$tl=0;
		if (!empty($kq))
		{
			$kq['lock']="";
			$kq['ngaynhap'] =date('d/m/Y',$kq['ngaynhap']);
			$kq['ketqua']=unserialize($kq['ketqua']);
			if ($kq['trangthai']>99) $kq['lock']=" disabled ";
		}
		$xtpl->assign('ROW', $kq);
		if (!empty($kq) and $kq['trangthai']<100) {$xtpl->parse('main.solan.lock');}
		if (empty($kq) or $kq['trangthai']<100) $xtpl->parse('main.solan.capnhat');
		if (!empty($kq) and $kq['trangthai']==100) $xtpl->parse('main.solan.finish');
		
		foreach($list as $cs)
		{
			if (!empty($kq)) $cs['kq']=$kq['ketqua'][$stt];	
			else  $cs['kq']=0;			
			$cs['stt']=++$stt;
			if ($cs['check']>0)  
				$cs['onchange']="checktile($(this),".$ts['no'].",".$ts['no'].$cs['check'].");";
			else $cs['onchange']="checkValue($(this));";
			$xtpl->assign('CS', $cs);		
			if ($cs['check']==$stt) 
				{
				$tile=($kq['ketqua'][1]>0)?round($kq['ketqua'][0]*100/$kq['ketqua'][1],1):0;
				$xtpl->assign('tile',$tile);	
				$xtpl->parse('main.solan.chiso.tile');
				}
			else $xtpl->parse('main.solan.chiso.input');
			$xtpl->parse('main.solan.chiso');
		}
		
		
		$xtpl->assign('token',md5($code.$user_info['username']).'_'.$code );//md5($key[1].$key[2].$i).'_'.$key[1].'_'.$key[2]);
		$xtpl->assign('sohang', ++$stt);
		$xtpl->parse('main.solan');		
	}
	
	$xtpl->assign('namapdung', $key[1]);
	$xtpl->assign('ROW', $r);
	
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';