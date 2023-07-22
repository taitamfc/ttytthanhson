<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_QLCL')) {
    die('Stop_main!!!');
}

$sta =$nv_Request->get_title('sta', 'get,post', '');
$kq=array();
	if($sta=='get_info')
	{
		$namapdung=2022;
		/*if($nv_Request->get_title('act', 'get,post', '')=='get_kehoach_chitieu'){
		$sql = "SELECT id_chiso, sum(if(chuky=99, giatri,0)) as kehoach,sum(if(chuky=100, giatri,0)) as nam
		FROM " . TABLE . "_baocao_".$namapdung." where chuky>98 group by id_chiso order by id_chiso, chuky";
		$bc = $db->query($sql)->fetchAll();
		foreach ($bc as $item)
			{
				$r=array();	
				$sql = "SELECT * FROM " . TABLE . "_chitieu where id=".$item['id_chiso'];
				$ct = $db->query($sql)->fetch();
				$r['chitieu']=nv_clean60($ct['chi_so'],15);
				$r['kehoach']=$item['kehoach']."%";
				$r['nam']=$item['nam']."%";
				$kq[]=$r;
			}
		}*/
		
		
		
		
		
		
	nv_jsonOutput($kq);
	exit;
	}



if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';nv_redirect_location($url); exit();}
	$thongke=array();
	$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$xtpl->assign('URL_THEMES', NV_BASE_SITEURL.'themes/cpanel');
	$xtpl->assign('thoigian', date('H:i d/m/Y'));
	
	$xtpl->assign('link', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op. '&sta=get_info');
	$namapdung=2022;
	$xtpl->assign('namapdung', 'Năm '.$namapdung);
	
	//Show chart
	$sql = "SELECT * FROM " . TABLE . "_chitieu where id in (1,2,3,4,7,8,9,10)";
	$ct = $db->query($sql)->fetchAll(); $stt=0;
		foreach ($ct as $r)
		{
			$solan=$r['tansuatgui'];
			$r['stt']=++$stt;
			$sql = "SELECT * FROM " . TABLE . "_baocao_".$namapdung." 
			where chuky>0 and id_chiso=".$r['id']." order by id";//chuky";
			$bc = $db->query($sql)->fetchAll();$i=0;$cuoinam=0;
			$datachart='';
			foreach ($bc as $item)
			{
				$item['title']=$lang_module['bc'.$solan.'_'.$item['chuky']];				
				$item['no']=++$i;
				if (empty($item['giatri'])) $item['giatri']=0;
				
				$xtpl->assign('TS', $item);
				if ($item['chuky']==100){$cuoinam=$item['giatri'];}
				else
				if ($item['chuky']==99)	{$xtpl->parse('main.group.kehoach');$xtpl->parse('main.group.kehoachnhap');}
				else 
				{
				$xtpl->parse('main.group.solan');
				$xtpl->parse('main.group.solannhap');
				
				$datachart .="{Quy: '".$item['title']."',giatri: ".$item['giatri']."}";
				if ($item['chuky']<4) $datachart .=",";
				$xtpl->assign('datachart', $datachart);
				}
				
			}
			$xtpl->assign('ROW', $r);
			$xtpl->parse('main.group');
		}
	//show table
	$sql = "SELECT * FROM " . TABLE . "_chitieu where id in (5,6)";
	$ct = $db->query($sql)->fetchAll(); 
		foreach ($ct as $r)
		{
			$sql = "SELECT * FROM " . TABLE . "_baocao_".$namapdung." 
			where id_chiso=".$r['id']." order by id";
			$bc = $db->query($sql)->fetchAll();$stt=0;
			foreach ($bc as $item)
			{
				$item['stt']=++$stt;
				if (empty($item['giatri'])) $item['giatri']=0;
				$xtpl->assign('ITEM', $item);
				$xtpl->parse('main.list_table.chitieu.loop');
			}
			$xtpl->assign('ROW', $r);
			$xtpl->parse('main.list_table.chitieu');
		}
			
	$xtpl->parse('main.list_table');
	$xtpl->parse('main');
    $contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
