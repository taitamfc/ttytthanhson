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
	$key=explode('_',$token);
	if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) {die('Stop!!!');}
	$tbl=TABLE. '_chitieu';
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$quyen=check_quyen($user_info);
	
	$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$key[1]. ' where status=1 and id='.$key[2];
	$bc = $db->query($sql)->fetch();
	$solan=$bc['tansuatgui'];
	$sql = 'SELECT * FROM ' .TABLE. "_ketqua_".$key[1]." where status=1 and id_chiso=".$key[2].
	" order by account asc, lannhap asc";
	$kq = $db->query($sql)->fetchAll();$stt=0;
	
	$sql = 'SELECT * FROM ' . TABLE. '_cacchiso where status=1 and id_chiso='.$key[2].' order by tt';
	$list_chiso = $db->query($sql)->fetchAll();
	
	if (!empty($kq))
	{
		foreach($kq as $r)
		{
			//if (!empty($kq)) $cs['kq']=$kq['ketqua'][$stt];			
			$r['stt']=++$stt;
			$r['ngaynhap']=date('d/m/Y',$r['ngaynhap']);
			$r['tt']=($r['trangthai']>99)?"Đã khóa kỳ":"Đang nhập";
			$r['tt_color']=($r['trangthai']>99)?"label-inverse-danger":"label-success";
			$res=array();
			$res=unserialize($r['ketqua']);	$tt=0;
			foreach($list_chiso as $cs)
			{
				$cs['kq']=$res[$tt];$tt++;
				if ($cs['check']==$tt) 
				{
					$cs['kq']=($res[1]>0)?round($res[0]*100/$res[1],1):0;
					$cs['kq'] .='%';
				}
				
				
				$xtpl->assign('CS', $cs);
				$xtpl->parse('main.chitiet.chiso');
				
			}
			$xtpl->assign('ROW', $r);		
			
			$xtpl->parse('main.chitiet');
		}
	}
	
	
	
	
	/*$sql = 'SELECT * FROM ' . TABLE. '_cacchiso where status=1 and id_chiso='.$key[2].' order by tt';
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
			$cs['stt']=++$stt;
			$xtpl->assign('CS', $cs);		
			
			$xtpl->parse('main.solan.chiso');
		}
		
		
		$xtpl->assign('token',md5($code.$user_info['username']).'_'.$code );//md5($key[1].$key[2].$i).'_'.$key[1].'_'.$key[2]);
		$xtpl->assign('sohang', ++$stt);
		$xtpl->parse('main.solan');		
	}
	*/
	
	$xtpl->assign('namapdung', $key[1]);
	$xtpl->assign('BC', $bc);
	
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

/*

	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));

	$sql = 'SELECT * FROM ' . TABLE. '_apdung  where apdung=1';
	$apdung = $db->query($sql)->fetch();
	$namapdung=$apdung['nam'];
	$xtpl->assign('namapdung', $namapdung);	
	$sql = 'SELECT * FROM ' . TABLE. "_groupuser  where account like '".$user_info['username']."'";
	$user = $db->query($sql)->fetch();
	
		$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$namapdung. ' where status=1';
		$list = $db->query($sql);$tt=0;
        while ($r = $list->fetch()) {
			if (($user['id_nhomquyen']>1)or (in_array($user_info['username'],unserialize($r['list_khoacungcap'])))
				or (in_array('ALL',unserialize($r['list_khoacungcap']))))
			{
			$r['stt']=++$tt; 
			
			$r['color']='';$r['status']='';
			//$r['link_del']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=config_chitieu&sta=del_item';
			$r['token']=md5($client_info['session_id'] . $global_config['sitekey']).'_'.$namapdung.'_'.$r['id'];
			//$r['link_edit']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=config_chitieu&sta=edit_item&token='.$r['token'];
			$ds=select_item($r['thanh_to']);
			$r['thanh_to']=$ds['select_name'];
			$r['pham_vi']=select_khoaphong(unserialize($r['pham_vi']));
			$r['list_khoacungcap']=select_khoaphong(unserialize($r['list_khoacungcap']));
			$ds=select_item($r['tansuatgui']);
			$r['tansuatgui']=$ds['select_name'];
			$xtpl->assign('ROW', $r);
			$xtpl->parse('main.item.row');
			}
        }
		$xtpl->parse('main.item');

	*/