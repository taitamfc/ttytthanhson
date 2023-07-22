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
	
	$sta=$nv_Request->get_title('sta', 'get,post', '');
	$cri='';$f=array();$today = mktime(0, 0, 0, date('m'),  date('d'),  date('Y'));
	
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('link_frm', $base_url);
	
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);	
    $xtpl->assign('URL_THEMES', NV_BASE_SITEURL. 'themes/' . $module_info['template']);
	$quyen=check_quyen($user_info);
	$find_id_khoa=($quyen>100)?0:check_khoaphong($user_info['username']);
	$token =$nv_Request->get_title('token', 'get,post', '');	
	$key=explode("_",$token);
	if ($sta=='find_item')
	{
		$f['id_khoaphong'] = $find_id_khoa= $nv_Request->get_title('id_khoaphong', 'get,post', '');
		$f['txt_find'] = $nv_Request->get_title('txt_find', 'get,post', '');
		$f['tg_tungay'] = $nv_Request->get_title('tg_tungay', 'get,post', '');
		$f['tg_denngay'] = $nv_Request->get_title('tg_denngay', 'get,post', '');
		
		if (!empty($f['tg_tungay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $f['tg_tungay'], $m))
            $tg_tungay = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		if (!empty($f['tg_denngay']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $f['tg_denngay'], $m))
				$tg_denngay = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
		
		if (!empty($f['txt_find']))
			$cri .=" and (cb.hovaten like '%".$f['txt_find']."%' or cb.diachi like '%".$f['txt_find']."%' or 
			cb.dienthoai like '%".$f['txt_find']."%' or cb.ngaysinh like '%".$f['txt_find']."%' or cb.sohieu_vc like '%".$f['txt_find']."%' )";
		
		
		if (!empty($f['id_khoaphong'])) $cri .=" and (cb.id_khoaphong =".$find_id_khoa.")";
		if (!empty($f['tg_tungay'])) $cri .=" and (dsnghi.tungay >=".$tg_tungay.")";
		if (!empty($f['tg_denngay'])) $cri .=" and (dsnghi.denngay <=".$tg_denngay.")";
		$xtpl->assign('F', $f);
	}
	
	if ($sta==='quatrinhnghi')
	{
		$id = $nv_Request->get_title('id', 'get,post', '');
		$sql = 'SELECT * FROM ' . TABLE. '_ttnghi WHERE id_canbo='.$id .' order by tungay desc';
		$list = $db->query($sql)->fetchALL();
		
		if (empty($list))
		{
			$xtpl->assign('thongbao', 'Không có thông tin về lịch sử quá trình nghỉ phép của cán bộ này');
			$xtpl->parse('no_history');
			$ketqua = $xtpl->text('no_history');
		}
		else{
			$tt=0;
			foreach($list as $r)
			{
				$r['stt']=++$tt; 			
				$r['tungay']=date('d/m/Y',$r['tungay']);
				$r['denngay']=$r['denngay']>0? date('d/m/Y',$r['denngay']):' Hiện nay ';
				$xtpl->assign('ROW', $r);
				$xtpl->parse($sta.'.row');
			}
			$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
			$xtpl->assign('link_close',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$token);
			$xtpl->parse($sta);
			$ketqua = $xtpl->text($sta);
		}
		
		echo $ketqua; exit();
	}
	
	if ($sta=='deleteitem' and md5($key[0])==$key[1])	
	{
		$id =$key[0];		
		//$sql = 'SELECT * FROM ' . TABLE. '_tailieu WHERE id='.$id;
		$stmt = $db->prepare('delete from ' .  TABLE. '_ttnghi WHERE id ='.$id);
		$row_id=$stmt->execute();
		$ketqua= $row_id>0?'OK_'.$lang_module['update_ok']:'ERR_'.$lang_module['update_err'];
		echo $ketqua; exit();
	}
	if($quyen>100)
	{
	$sql = 'SELECT * FROM ' . TABLE. '_khoaphong WHERE status=1';
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
		$cri .=" and (cb.id_khoaphong =".$find_id_khoa.")";
	if ($sta!='find_item') $cri .='and (dsnghi.denngay>='.$today.")";
	
	$sql = 'SELECT count(*)
	FROM '. TABLE . '_canbo cb inner join '.TABLE . '_khoaphong khoa on khoa.id=cb.id_khoaphong
	inner join ' . TABLE. '_ttnghi dsnghi on dsnghi.id_canbo=cb.id	WHERE (1) '.$cri;
	$all_page = $db->query($sql)->fetchColumn();	
	//$all_page = $db->query('SELECT COUNT(*) FROM ' . TABLE . '_ttnghi where (1)' )->fetchColumn();
	//$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name;
	$base_url = MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op;
	$per_page = 10;
	$page = $nv_Request->get_int('page', 'get', 1);
		
	$sql = 'SELECT cb.id,cb.maso_bv,cb.hovaten,cb.chucvu,cb.dienthoai,khoa.tenkhoa,dsnghi.*
	FROM '. TABLE . '_canbo cb inner join '.TABLE . '_khoaphong khoa on khoa.id=cb.id_khoaphong
	inner join ' . TABLE. '_ttnghi dsnghi on dsnghi.id_canbo=cb.id	WHERE (1) '.$cri.' 
	ORDER BY cb.id_khoaphong asc, dsnghi.denngay DESC LIMIT ' . ($page-1)*$per_page . ', ' . $per_page;
	$list = $db->query($sql);$tt=0;$id=0;
	while ($r = $list->fetch()){
		$r['stt']=++$tt;		
		$r['tungay']=date('d/m/Y',$r['tungay']);
		$r['denngay']=date('d/m/Y',$r['denngay']);
		$r['link_view']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=quatrinhnghi&id='.$r['id_canbo'];
		$r['link_bosung']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=chitietdieuduong&token='.$r['id_canbo'].'_'.$token;
		
		if ($quyen>100)
		{
			$r['link_edit']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=adddocument&sta=edit_document&token='.$r['id'].'_'.$token;
			$r['link_del']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=deleteitem&token='.$r['id'].'_'.md5($r['id']);
		}
		$xtpl->assign('DS', $r);
		if ($quyen>100)	$xtpl->parse('main.row.admin_link');		
		$xtpl->parse('main.row');
	}
	$xtpl->assign('DATA', $data);
	
	
	
	
	$generate_page = nv_generate_page($base_url, $all_page, $per_page, $page);
	if (! empty($generate_page)) {
		$xtpl->assign('GENERATE_PAGE', $generate_page);
		$xtpl->parse('main.generate_page');
	}
	
	
		
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';


/*

	
	
	
	
	
	
	
	
	
	
	
	
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$xtpl->assign('link_frm',$base_url. '&' . NV_OP_VARIABLE . '='.$op);
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
		$sql = 'SELECT cb.maso_bv,cb.hovaten,cb.chucvu,cb.dienthoai,khoa.tenkhoa FROM ' 
		. TABLE . '_canbo cb
		inner join '.TABLE . '_khoaphong khoa on khoa.id=cb.id_khoaphong 
		WHERE cb.id in (select id_canbo from '.TABLE . '_ttnghi where denngay<='.$today.' group by id_canbo)
		and (cb.status = 1) '.$cri.'	ORDER BY cb.id_khoaphong, cb.maso_bv asc';
		
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$r['stt']=++$tt; $r['color']='';$r['status']='';
				$r['link_view']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=getthongtin&sta=chitietcanbo&id='.$r['id'];
				$r['link_bosung']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=chitietdieuduong&token='.$r['id'].'_'.$token;
				$xtpl->assign('ROW', $r);
				$xtpl->parse('main.row');
			}
		
		$sql = 'SELECT * FROM ' . TABLE . '_khoaphong WHERE status = 1 '.$cri_khoa.'ORDER BY tenkhoa asc';
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
	}
	
	$xtpl->assign('ROW', $result);
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
	
	
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

	
	$sql = 'SELECT * FROM ' . $tbl;
	$result = $db->query($sql)->fetch();
	$xtpl->assign('link_frm',$base_url. '&' . NV_OP_VARIABLE . '='.$op);
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
		$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . TABLE . '_canbo cb
		inner join '.TABLE . '_khoaphong khoa on khoa.id=cb.id_khoaphong WHERE (cb.status = 1) '.$cri.' ORDER BY cb.id_khoaphong, cb.maso_bv asc';
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
		
		$sql = 'SELECT * FROM ' . TABLE . '_khoaphong WHERE status = 1 '.$cri_khoa.'ORDER BY tenkhoa asc';
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
	
	$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . TABLE . '_canbo cb
	inner join '.TABLE . '_khoaphong khoa on khoa.id=cb.id_khoaphong WHERE (cb.status = 1) '.$cri.' ORDER BY cb.id_khoaphong, cb.maso_bv asc';
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
			$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . TABLE . '_canbo cb
			inner join '.TABLE . '_khoaphong khoa on khoa.id=cb.id_khoaphong WHERE 
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
	$sql = 'SELECT * FROM ' . TABLE . '_khoaphong WHERE status = 1 '.$cri_khoa.'ORDER BY tenkhoa asc';
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