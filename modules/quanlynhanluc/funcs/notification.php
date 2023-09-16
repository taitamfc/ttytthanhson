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

	$thongke=array();
	$xtpl = new XTemplate('frm_notification.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
    $xtpl->assign('URL_THEMES', NV_BASE_SITEURL. 'themes/' . $module_info['template']);
	$xtpl->assign('lang', $lang_module);
	
	$sta =$nv_Request->get_title('sta', 'get,post', '');
if ($sta=='dstinnhan')	
{
	$stt=0;	
	$sql = 'SELECT * FROM ' . TABLE. "_notification WHERE status = 1 and nguoinhan like '".$user_info['username']."' ORDER BY tg_gui desc";
	$result = $db->query($sql);
    while ($row = $result->fetch()) {
		//$row['tg_nhan']=date('d/m/Y h:m',$row['ngaynhan']);
		$row['stt']=++$stt;$row['new']='';
		$row['trangthai']=$lang_module['trangthai'.$row['step']];
		$row['tg_nhan']=$row['ngaynhan'];
		$row['color_tt']=$lang_module['label'.$row['step']];;
		$row['link_view']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=detail_yeucaunhanluc&code_pro='.$row['code_pro'];
		$row['link_del']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=del_msg';
		if ($row['viewed']==0) {++$msg; $row['new']='font-weight: bold;';}

		if ($row['step']==1 and $user_info['username']=='dieuduong')
		{$xtpl->parse($sta.'.loop.admin'); }
		
		$xtpl->assign('ROW', $row);
		$xtpl->parse($sta.'.loop');
    }
	$xtpl->assign('viewall', MODULE_LINK . '&' . NV_OP_VARIABLE . '=notification');
	$xtpl->assign('link_del', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=del_msg');
	$xtpl->parse($sta);
	$ketqua = $xtpl->text($sta);
	echo $ketqua; exit;
	
}

if ($sta=='detail_yeucaunhanluc')	
{
	$code=$nv_Request->get_title('code_pro', 'get,post', '');
	$stt=0;	
	$sql = 'SELECT * FROM ' . TABLE. "_yeucaunhanluc WHERE status = 1 and code_pro like '".$code."'";
	$result = $db->query($sql)->fetch();
	if (!empty($result))
	{
		
		$sql = 'Update ' . TABLE. "_notification SET viewed=viewed+1 WHERE code_pro like '".$code."' and nguoinhan='".$user_info['username']."'";
		$stmt = $db->prepare($sql);$row_id=$stmt->execute();
		if(!empty($result['tg_tungay'])) $result['tg_tungay']=date('d/m/Y',$result['tg_tungay']);
		if(!empty($result['tg_denngay']))  $result['tg_denngay']=date('d/m/Y',$result['tg_denngay']);
		if(!empty($result['tg_ngaybatdau'])) $result['tg_ngaybatdau']=date('d/m/Y',$result['tg_ngaybatdau']);
		if(!empty($result['tg_ngayketthuc']))  $result['tg_ngayketthuc']=date('d/m/Y',$result['tg_ngayketthuc']);

		$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=quanlynhanluc');
		$xtpl->assign('sta','nhucaunhanluc_step');
		$xtpl->assign('viewall', MODULE_LINK . '&' . NV_OP_VARIABLE . '=notification');
		$xtpl->assign('link_del', MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=del_msg');
		$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
		$xtpl->assign('DATA', $result);	
		
		$sql = 'SELECT * FROM ' . TABLE. "_notification WHERE code_pro like '".$code."' and nguoinhan like '".$user_info['username']."'";
		$msg = $db->query($sql)->fetch();$step=$msg['step'];
		
		
		if ($step==1 and $user_info['username']=='dieuduong')
		{
			//if ($user_info['username']=='dieuduong') 
		$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_khoaphong WHERE status = 1 and account not like '".$result['user_yeucau']."' ORDER BY tenkhoa asc";
		$list = $db->query($sql);$tt=0;
			while ($r = $list->fetch()) {
				$xtpl->assign('r', array(
					'id' => $r['id'],
					'name' => ++$tt.' - '.$r['tenkhoa'],
					'select' => ($id_khoaphong == $r['id']) ? ' selected="selected"' : ''
				));
				$xtpl->parse($sta.'.xuly_step1.khoaphong');
			}
			$xtpl->parse($sta.'.xuly_step1'); // xử lý code csdl sau
		}
		if ($step==3)
		{
			$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . TABLE. '_canbo cb 
			inner join '. TABLE. "_khoaphong khoa on cb.id_khoaphong=khoa.id WHERE cb.id in (".$result['id_canbochuyen'].")";
			$canbokhoa = $db->query($sql);$tt=0;
			while ($r = $canbokhoa->fetch()) {
					$r['stt']=++$tt; 
					$xtpl->assign('ROW', $r);
					$xtpl->parse($sta.'.step3.row');
				}
		if ($user_info['username']==$result['user_yeucau'])$xtpl->parse($sta.'.step3.finish');
		}
		//else
		/*{
			$sql = 'SELECT * FROM ' . TABLE. '_khoaphong WHERE status = 1 and id in('.$result['id_khoachuyen'].')';
			$dskhoa = $db->query($sql)->fetch();
			$xtpl->assign('khoachuyen', $dskhoa['tenkhoa']);	
		}*/
		
		//check thong báo cho account yêu cầu
		if ($step>1)
		{
			$sl_dieuduongduyet=unserialize($result['dd_duyet_text']);
			$sl_hosinhduyet=unserialize($result['hs_duyet_text']);
			$sl_ktvduyet=unserialize($result['hs_duyet_text']);
			$sl_ktvduyet=unserialize($result['hs_duyet_text']);
			$sql = 'SELECT * FROM ' . TABLE. '_khoaphong WHERE status = 1 and id in('.$result['id_khoachuyen'].')';
			$dskhoa = $db->query($sql);
			$tt=0;
			while ($r = $dskhoa->fetch()) {
					$r['sl_dieuduongduyet']=$sl_dieuduongduyet[$tt];
					$r['sl_hosinhduyet']=$sl_hosinhduyet[$tt];
					$r['sl_ktvduyet']=$sl_ktvduyet[$tt];
					$r['tg_ngaybatdau']=$result['tg_ngaybatdau'];
					$r['tg_ngayketthuc']=$result['tg_ngayketthuc'];
					$r['stt']=++$tt;	
					$xtpl->assign('r', $r);
					$xtpl->parse($sta.'.step2.loop');
			}
			
		}
		$xtpl->assign('DATA', $result);
		if ($step==0) {$xtpl->parse($sta.'.step1');$xtpl->parse($sta.'.step0');}
		
		for($i=1; $i<=$step; $i++) $xtpl->parse($sta.'.step'.$i);
		
		$ds_userchuyen=explode(";",$result['user_chuyen']);
		
		if ($step==2 and in_array($user_info['username'],$ds_userchuyen))
		{
			$sql = 'SELECT cb.*, khoa.tenkhoa FROM ' . NV_PREFIXLANG . '_' . $module_data . '_canbo cb
			inner join '.NV_PREFIXLANG . '_' . $module_data . "_khoaphong khoa on khoa.id=cb.id_khoaphong WHERE (cb.status = 1) and khoa.account='".$user_info['username']."' ORDER BY cb.tangcuong_tungay desc, cb.maso_bv asc";
			$canbokhoa = $db->query($sql);$tt=0;
				while ($r = $canbokhoa->fetch()) {
					$r['stt']=++$tt; $r['color']='';$r['status']='';
					if ($r['tangcuong_tungay']>0)
					{
						$r['color']='color:#ff0000';
						$r['class']="table-success";
						$r['ghichu']='Tăng cường đến:'.$r['tangcuong_khoa'].'('.date('d/m/Y',$r['tangcuong_tungay']).')';
						$r['status']=' disabled="" ';
					}
					$xtpl->assign('ROW', $r);
					$xtpl->parse($sta.'.xuly_step2.row');
				}
			$xtpl->parse($sta.'.xuly_step2');
		}
	}
	
	$xtpl->parse($sta);
	$ketqua = $xtpl->text($sta);
	echo $ketqua; exit;
}
if ($sta=='del_msg')	
{
	$code=$nv_Request->get_title('code_pro', 'get,post', '');
	$sql = 'Update ' . TABLE. "_notification SET status=0, deleted=1, delete_by=:delete_by, 
	delete_date=:delete_date  WHERE code_pro like '".$code."'";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':delete_by', $user_info['username'], PDO::PARAM_STR);
	$stmt->bindParam(':delete_date', date('Y/m/d H:m'), PDO::PARAM_STR);
	$row_id=$stmt->execute();
	if ($row_id>0) $ketqua='OK_'.$row_id;
	else $ketqua='ERR_'.$lang_module['update_err'];
	echo $ketqua; exit;
}


	$sql="SELECT * from ".TABLE. "_khoaphong where account ='".$user_info['username']."'";
	$phong=$db->query($sql)->fetch();
	$xtpl->assign('phong', $phong);
	$link=array();
	$link['dscb_di']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=dsdieudongdi';
	$link['dscb_den']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=dsdieudongden';
	$link['tinnhan']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=dstinnhan';
	$link['nhucaunhanluc']=MODULE_LINK . '&' . NV_OP_VARIABLE . '=nhucaunhanluc&sta=nhucaunhanluc_step2';
	$link['link_del']=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=del_msg';
	$xtpl->assign('link', $link);
	$js=$link['tinnhan'];
	$code=$nv_Request->get_title('code_pro', 'get,post', '');
	if ($sta=='viewdetail' and !empty($code))	
	{
		$js=MODULE_LINK . '&' . NV_OP_VARIABLE . '='.$op.'&sta=detail_yeucaunhanluc&code_pro='.$code;
	}
	$xtpl->assign('JS',"<script>setValue('".$js."','panel_chitiet');</script>");
	$xtpl->parse('main');
    $contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
