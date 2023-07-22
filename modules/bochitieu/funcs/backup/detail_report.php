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
	//cefe8b0f8971088bce7bdac501435fbe_202306_bv
	$key=explode('_',$token);
	if ($key[0]!=md5($client_info['session_id'] . $global_config['sitekey'])) {die('Stop!!!');}
	
	if ($sta=='edit_report')
	{
		//74691a37b603277591e9b416fadcc28d_202306_bv_header
		$sql = 'SELECT * FROM ' . TABLE. '_baocao_'.$key[1]. " where status=1 and token='".$key[2]."' and code='".$key[3]."'";
		$R = $db->query($sql)->fetch();
		$ketqua = nv_aleditor($R['code'], '99%', '450px', $R['value']);
		echo $ketqua; exit();
		
	}
	if ($sta=='updatevalue')
	{
		//74691a37b603277591e9b416fadcc28d_202306_bv_header
		
		$ketqua=array();
		$code = $nv_Request->get_title('code', 'post','');
		$data[$code] = $nv_Request->get_editor($code, '', NV_ALLOWED_HTML_TAGS);
		
		$stmt = $db->prepare("Update ".TABLE."_baocao_".$key[1]." set value=:value where code ='".$code."'");
		$stmt->bindParam(':value', $data[$code], PDO::PARAM_STR, strlen($data[$code]));
		$row_id=$stmt->execute();
		
		if ($row_id>0){
			$ketqua['status']='ok'; 
			$ketqua['mess']= $data[$code];//$lang_module['update_ok']; 
			}
		else {
			$ketqua['status']='err'; 
			$ketqua['mess']= $code;//$lang_module['update_err']; 
			}
		//var_dump($ketqua);
		//nv_jsonOutput($ketqua); exit;
	}
	
	
	$tbl=TABLE. '_chitieu';
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	//$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&token='.$key[0].'_'.$key[1].'_bv');
	$xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']).'_'.$key[1]);
	$xtpl->assign('LANG', $lang_module);
	$quyen=check_quyen($user_info);
	
	$sql = 'SELECT * FROM ' . TABLE. '_apdung where apdung=1';
	$bc = $db->query($sql)->fetch();
	$bc['tieude']= str_replace("Kỳ đánh giá ","",$bc['tieude']);
	$nam=substr($bc['nam'],0,4);
	$bc['namngoai']=$nam-1;
	$bc['namkia']=$nam-2;
	$xtpl->assign('apdung', $bc);
	
	$sql = 'SELECT * FROM ' .TABLE. "_ketqua_".$key[1]." where status=1";
	$kq = $db->query($sql)->fetchAll();
	$bc1= array(); 
	$bc1['ct_dadg']=0;
	$bc1['tongdiem_dadg']=0;
	$bc1['sotc_tang']=0;
	$bc1['sotc_giam']=0;
	$bc1['sotc_nguyen']=0;
	$bc1['dtb_dadg']=0;
	
	foreach ($kq as $r)
	{
		$bc1['ct_dadg'] +=$r['diem_bvdg']>0?1:0;
		$bc1['tongdiem_dadg'] +=$r['diem_bvdg']>0?$r['diem_bvdg']:0;
		$bc1['sotc_tang'] +=$r['diem_bvdg']>$r['diem_kehoach']?1:0;
		$bc1['sotc_giam'] +=$r['diem_bvdg']<$r['diem_kehoach']?1:0;
		$bc1['sotc_nguyen'] +=$r['diem_bvdg']==$r['diem_kehoach']?1:0;
	}
	
	$bc1['tile']=round($bc1['ct_dadg']*100/83,1);
	
	//show chi tieu
	$sql = 'SELECT * FROM ' . TABLE. '_chitieu_'.$key[1]. ' where status=1 order by code asc';
	$list_chitieu = $db->query($sql)->fetchAll();
	foreach ($list_chitieu as $r)
	{

		$sql = 'SELECT * FROM ' . TABLE. "_question 
		where status=1 and giatri>0 and parent like '".$r['code']."%' order by ID";
		$Q = $db->query($sql)->fetchAll();		
		foreach($Q as $q)
		{
			//$q['token']=md5($q['code'].$user_info['username']).'_'.$q['code'].'_'.$key[1].'_'.$key[2] ;
			$xtpl->assign('Q', $q);	
			$kq=array(); 
			$sql = 'SELECT * FROM ' .TABLE. "_ketqua_".$key[1]." where status=1 
			and dinhdanh like '".$key[1].'_'.$r['id'].'_'.$q['code']."'";
			$kq = $db->query($sql)->fetch();
			//$kq['ct']=$key[1].'_'.$r['id'].'_'.$q['code'];
			if (empty($kq)) {$kq['diem_bvdg']=0;$kq['diem_doandg']=0;}
			$xtpl->assign('KQ', $kq);	
			//show log
						
			$xtpl->parse('main.chitieu.loop');
		}
		$xtpl->assign('R', $r);
		$xtpl->parse('main.chitieu');
		
	}
	
	
	for ($i=1;$i<=5;$i++)  {$bc1['M'.$i]=0;} $bc1['tong_dat']=0;
	$hs2=array('C2','C5');
	foreach ($list_chitieu as $r)
	{
		for ($i=1;$i<=5;$i++)  {$r['M'.$i]=0;} $r['sum']=0;
		$sql = 'SELECT * FROM ' . TABLE. "_question 
		where status=1 and giatri=0 and parent like '".$r['code']."' order by code";
		$Q = $db->query($sql)->fetchAll();		
		foreach($Q as $q)
		{

			$xtpl->assign('Q', $q);	
			$kq=array(); $kq['sum']=0;$kq['dtb']=0; $r['sum']=0;$r['dtb']=0;
			for ($i=1;$i<=5;$i++) 
			{
				$kq['L'.$i]=check_level($q['code'],$i,TABLE. "_ketqua_".$key[1]);
				$r['M'.$i] +=$kq['L'.$i];
				$bc1['M'.$i] +=$kq['L'.$i];
				$kq['dtb'] +=$kq['L'.$i]*$i;				
				$kq['sum'] +=$kq['L'.$i];
				
				$bc1['tong_dat'] +=$kq['L'.$i];
				$bc1['dtb_dadg'] +=$kq['L'.$i]*$i*$q['heso'];
				//if (in_array($r['code'],$hs2)) $bc1['dtb_dadg'] +=$kq['L'.$i]*$i;
				$r['sum'] +=$r['M'.$i];
				$r['dtb'] +=$r['M'.$i]*$i;
			}
			$kq['dtb']=$kq['sum']>0?round($kq['dtb']/$kq['sum'],2):0;
			$xtpl->assign('KQ', $kq);	
			//show log
						
			$xtpl->parse('main.chitieu2.loop');
		}
		$r['dtb']=$r['sum']>0?round($r['dtb']/$r['sum'],2):0;
		$xtpl->assign('R', $r);
		$xtpl->parse('main.chitieu2');
		
	}
	//tỉ lệ
	for ($i=1;$i<=5;$i++)
	{
		$bc1['tl'.$i]=$bc1['tong_dat']>0?round($bc1['M'.$i]*100/$bc1['tong_dat'],2):0;
	}
	$bc1['dtb_dadg'] = ($bc1['tong_dat']>0)?round($bc1['dtb_dadg']/90,2):0;
	$xtpl->assign('BC1', $bc1);
	/*
	$sql = 'SELECT * FROM ' . TABLE. '_baocao_'.$key[1]. " where status=1 and token = '".$key[2]."'";
	$list = $db->query($sql)->fetchAll();
	//$report['header']=sprintf($report['header'], substr($key[1],0,4));
	//$R['header'] = nv_aleditor('header', '99%', '450px', $R['header']);
	
	//$xtpl->assign('editor_doandg', $editor_doandg);
	$R=array();
	foreach ($list as $l)
	{
		$R[$l['code']]=$l['value'];
		$l['link']=MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&sta=edit_report&token='.$key[0].'_'.$key[1].'_bv_'.$l['code'];
		$xtpl->assign('bc', $l);
		$xtpl->assign('R', $R);
		$xtpl->parse('main.'.$l['code']);
	}
		
	$url=array();
	$url['header']=MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op.'&sta=edit_report&token='.$key[0].'_'.$key[1].'_bv_header';
	
	$xtpl->assign('URL', $url);*/
	//$xtpl->assign('R', $R);
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

function check_level($dinhdanh, $diem=0, $tbl="")
{
	global $db,$module_data,$lang_module;
	$list=array();
	$sql="SELECT count(id) as sl from ".$tbl . " where diem_bvdg =".$diem." and dinhdanh like '%".$dinhdanh.".%'";
	$list=$db->query($sql)->fetch();
	if (!empty($list))return $list['sl'];
	return 0; // trả lại giá trị ko thực hiện được 
}


/*

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
			$cs['stt']=++$stt;
			$xtpl->assign('CS', $cs);		
			
			$xtpl->parse('main.solan.chiso');
		}
		
		
		$xtpl->assign('token',md5($code.$user_info['username']).'_'.$code );//md5($key[1].$key[2].$i).'_'.$key[1].'_'.$key[2]);
		$xtpl->assign('sohang', ++$stt);
		$xtpl->parse('main.solan');		
	}
	
	$xtpl->assign('namapdung', $key[1]);
	$xtpl->assign('ROW', $r);
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