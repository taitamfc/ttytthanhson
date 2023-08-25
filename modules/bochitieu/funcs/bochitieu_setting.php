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
	if ($sta=='') $sta='main';
	$tbl=TABLE. '_chitieu';
	$xtpl = new XTemplate('bochitieu_setting.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	if ($sta=='khoitaochitieu')
	{
		$checkss =$nv_Request->get_title('checkss', 'get,post', '');
		$key=md5($client_info['session_id'] . $global_config['sitekey']);
		if ($checkss!=$key) {die('Stop!!!');}
		$data=array();
		$err=0;
		$namkhoitao=$nv_Request->get_title('nam', 'get,post', '');
		
		if ($namkhoitao==''){
			$ketqua['status']='err'; $ketqua['mess']= ++$err.'.'.$lang_module['error'];nv_jsonOutput($ketqua); exit; }
		else //Check đã có tồn tại?
		{
			$sql = 'SELECT * FROM ' . TABLE. "_apdung where nam='".$namkhoitao."'";	
			$kq = $db->query($sql)->fetch();
			if (!empty($kq)) 
				{
					$ketqua['status']='err'; $ketqua['mess']= ++$err.'.'.$lang_module['error_apdung'];nv_jsonOutput($ketqua); exit; 
				}

		}
		if ($err==0)
		{
			//$ketqua='Test nhận data'; */
			$db->exec( 'CREATE TABLE ' . TABLE.'_chitieu_'.$namkhoitao. ' LIKE ' . TABLE.'_chitieu' );
			$db->exec( 'CREATE TABLE ' . TABLE.'_ketqua_'.$namkhoitao. ' LIKE ' . TABLE.'_ketqua' );
			$db->exec( 'CREATE TABLE ' . TABLE.'_baocao_'.$namkhoitao. ' LIKE ' . TABLE.'_baocao' );
			
			$stmt = $db->prepare("Update ".TABLE."_apdung set apdung=0")->execute();
			
			$namdg=substr($namkhoitao,0,4);
			//$loai=substr($namkhoitao,4,2);
			$tieude='Kỳ đánh giá năm '.$namkhoitao;
			$sql="INSERT INTO ".TABLE."_apdung (id,nam,tieude,status,apdung,thangapdung,ngaytao) 
			VALUES (NULL, ".$namkhoitao.",'".$tieude."','1', '1','1', now());";
			//var_dump($sql);
			$stmt = $db->prepare($sql)->execute();
			
			
			$sql='INSERT INTO '.TABLE.'_chitieu_'.$namkhoitao.' SELECT * FROM '.TABLE.'_chitieu';
			$stmt = $db->prepare($sql);
			$row_id=$stmt->execute();
			
			$sql='INSERT INTO '.TABLE.'_ketqua_'.$namkhoitao.' SELECT * FROM '.TABLE.'_ketqua';
			$stmt = $db->prepare($sql);
			$row_id=$stmt->execute();
			
			
			
			
			/*if ($row_id>0) //nv_redirect_location(MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=content');
			{
				Header('Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=config_chitieu');   exit();
			}*/
			//if ($row_id>0) nv_redirect_location(MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=content');
			$ketqua['status']='OK';
			$ketqua['url']=MODULE_LINK . '&' . NV_OP_VARIABLE .'='.$op.'&token=edit_'.$namkhoitao;
			
		}
		
		$ketqua['mess']= $row_id>0?sprintf($lang_module['yeucau_ok'],$ketqua['url']):$lang_module['yeucau_err'];	
		/*$ketqua['mess']="INSERT INTO ".TABLE."_apdung (id,nam,tieude,status,apdung,ngaytao,add_time,edit_time) 
			VALUES (NULL, ".$namkhoitao.",'Khởi tạo','1', '1', now(), '', '');";
			*/
		nv_jsonOutput($ketqua); exit;
	
	}
	
	if ($sta=='doan_gd')
	{
		$ketqua = '';
		$sql = 'SELECT * FROM ' . TABLE. '_apdung where apdung=1';	
		$kq = $db->query($sql)->fetch(); 
		
		$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
		$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
		$editor_doandg = nv_aleditor('doan_dg', '99%', '100px', $kq['doan_dg']);
		$xtpl->assign('editor_doandg', $editor_doandg);
		$xtpl->parse($sta);
		$ketqua =$xtpl->text($sta);
		echo $ketqua; exit();
		
	}
	
	if ($sta=='update_doandg')
	{
		$checkss =$nv_Request->get_title('checkss', 'get,post', '');
		$key=md5($client_info['session_id'] . $global_config['sitekey']);
		if ($checkss!=$key) {die('Stop!!!');}
		$ketqua=array();
		$data['id'] = $nv_Request->get_int('id_kydg', 'post',0);
		$data['doan_dg'] = $nv_Request->get_editor('doan_dg', '', NV_ALLOWED_HTML_TAGS);
		
		$stmt = $db->prepare("Update ".TABLE."_apdung set doan_dg=:doan_dg where id =".$data['id']);
		$stmt->bindParam(':doan_dg', $data['doan_dg'], PDO::PARAM_STR, strlen($data['doan_dg']));
		$row_id=$stmt->execute();
		if ($row_id>0){
			$ketqua['status']='ok'; 
			$ketqua['mess']= $lang_module['update_ok']; 
			}
		else {
			$ketqua['status']='err'; 
			$ketqua['mess']= $lang_module['update_err']; 
			}
			$sta='main';
		//nv_jsonOutput($ketqua); exit;
		$thongbao='<script language="javascript"> alert("'.$ketqua['mess'].'")</script>';
		$xtpl->assign('JS', $thongbao);
		
	}
	
	/*$sql = 'SELECT * FROM ' . $tbl;
	$result = $db->query($sql)->fetch();*/
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('sta', 'khoitaochitieu');	
	$nam=date('Y');
	for ($i=$nam-3; $i<=$nam+1; $i++)
	{
		$xtpl->assign('r', array(
			'id' => $i,
			'name' => 'Kỳ đánh giá năm '.$i,
			'select' => (date('Y') == $i) ? ' selected="selected"' : ''
		));
		$xtpl->parse($sta.'.nam');
		
	}
	
	$sql = 'SELECT * FROM ' . TABLE. '_apdung where status=1 order by nam';
	$list = $db->query($sql)->fetchAll();
	$tt=0;
	foreach ($list as $r) {
       // while ($r = $list->fetch()) {
			//$r['stt']=++$tt; 
			$r['link']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&token=edit_'.$r['nam']; 
			$r['color']=($r['apdung']==1)?'':'btn-outline-success';
			$xtpl->assign('ROW', $r);
			$xtpl->parse($sta.'.dschitieu.loop');
        }
	$xtpl->parse($sta.'.dschitieu');
	$token=$nv_Request->get_title('token', 'get,post', '');//$namapdung=0;
	
	$sql = 'SELECT * FROM ' . TABLE. '_apdung where apdung=1';	
	$kq = $db->query($sql)->fetch(); 
	$namapdung=(!empty($kq))? $kq['nam']:'';
	/*
	update n2023 set n2023.diem_namngoai=n2022.diem_kehoach 
	from nv4_vi_bochitieu_ketqua_2023 n2023 inner join nv4_vi_bochitieu_ketqua_2022 n2022 
	on n2023.id=n2022.id
	*/
	$namngoai=$namapdung-1;
	$sql="update n".$namapdung." set n".$namapdung.".diem_namngoai=n".$namngoai.".diem_kehoach 
	FROM ".TABLE."_ketqua_".$namapdung." n".$namapdung." inner join ".TABLE."_ketqua_".$namngoai." n".$namngoai." on n".$namapdung.".id=n".$namngoai.".id";
	//$stmt = $db->prepare($sql);
	//$row_id=$stmt->execute();
	
	
	if (empty($token)and !empty($namapdung))	$token='edit_'.$kq['nam'];
	$key=explode('_',$token);
	if ($key[0]=='edit' and !empty($namapdung))
	{
		
		//$namdg=substr($namkhoitao,0,4);
		//$loai=substr($namkhoitao,4,2);
		//$tieude=($loai==12)?'Kỳ đánh giá năm '.$namdg:'Kỳ đánh giá '.$loai.' tháng năm '.$namdg;
		$sql = 'SELECT * FROM ' . TABLE. '_apdung where nam='.$key[1];
		$kq = $db->query($sql)->fetch(); 
		$xtpl->assign('namapdung', $kq['tieude']);
		//$xtpl->assign('namapdung', $namapdung);
		if ($namapdung==$key[1])
		for ($i=1;$i<=12;$i++)
		{
			$item=array();
			$item['thang']=$i;
			$item['cls_div']='label-inverse-default';
			$item['color']='color:#000';
			$item['link']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=config_chitieu&sta=default_item_month';
			$item['token']=md5($client_info['session_id'] .$i).'_'.$namapdung.'_'.$i;
			if ($i==$kq ['thangapdung']) {$item['color']='';$item['cls_div']='btn-primary';}
			$xtpl->assign('ITEM', $item);
			$xtpl->parse('main.item.thang');
		}
		
		
		$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$key[1]. ' where status=1';
		$list = $db->query($sql);$tt=0;$stt=0;
        while ($r = $list->fetch()) {
			$r['stt']=++$stt; $r['color']='';$r['status']='';
			$r['link_del']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=config_chitieu&sta=del_item';
			$r['token']=md5($client_info['session_id'] . $global_config['sitekey']).'_'.$key[1].'_'.$r['id'];
			$r['link_edit']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=config_chitieu&sta=edit_item&token='.$r['token'];
			$ds=select_item($r['thanh_to']);
			$r['thanh_to']=$ds['select_name'];
			//$r['pham_vi']=select_khoaphong(unserialize($r['pham_vi']));
			//$r['list_khoacungcap']=select_khoaphong(unserialize($r['list_khoacungcap']));
			
			$dskhoa=select_khoaphong(unserialize($r['pham_vi']));
			$tt=0;
			foreach ($dskhoa as $item) {
				$tenkhoa =++$tt.'.'.$item['tenkhoa'].";";
				if ($tt%2==0) $tenkhoa .='<br/>';
				$xtpl->assign('tenkhoa', $tenkhoa);
				$xtpl->parse('main.item.row.phamvi');
			}
			
			$dskhoa=select_khoaphong(unserialize($r['list_khoacungcap']));
			$tt=0;
			foreach ($dskhoa as $item) {
				$tenkhoa =++$tt.'.'.$item['tenkhoa'].";";
				if ($tt%2==0) $tenkhoa .='<br/>';
				$xtpl->assign('tenkhoa', $tenkhoa);
				$xtpl->parse('main.item.row.khoacungcap');
			}
			$ds=select_item($r['tansuatgui']);
			$r['tansuatgui']=$ds['select_name'];
			
			$xtpl->assign('ROW', $r);
			$xtpl->parse('main.item.row');
        }
		if ($namapdung!=$key[1]) {
			$de['link']=MODULE_LINK. '&' . NV_OP_VARIABLE . '=config_chitieu&sta=default_item';
			$de['token']=md5($client_info['session_id'] . $global_config['sitekey']).'_'.$key[1];
			$xtpl->assign('ACT', $de);
			$xtpl->parse('main.item.default');
		}
		
		$xtpl->assign('link_doandg', MODULE_LINK. '&' . NV_OP_VARIABLE . '=bochitieu_setting&sta=doan_dg&token='.'_'.$key[1]);
		$editor_doandg = nv_aleditor('doan_dg', '99%', '450px', $kq['doan_dg']);
		$xtpl->assign('editor_doandg', $editor_doandg);
		$xtpl->assign('kydg', $kq);
		$xtpl->parse('main.item');
	}
	
	
	$xtpl->parse($sta);
    $contents = $xtpl->text($sta);
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

