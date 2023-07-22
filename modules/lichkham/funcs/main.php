<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_LICHKHAM')) {
    die('Stop!!!');
}

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];
$mod_title = isset($lang_module['main_title']) ? $lang_module['main_title'] : $module_info['custom_title'];
	
	$sta =$nv_Request->get_title('sta', 'get,post', '');
	if ($sta=='dangkykhambenh')
	{
		//$code=$nv_Request->get_title('code_pro', 'get,post', '');
		$kq=array();
		$data=array();
		$data['hoten']=$nv_Request->get_title('name', 'get,post', '');
		$data['dienthoai']=$nv_Request->get_title('phone', 'get,post', '');
		$data['danhmuckham']=$nv_Request->get_title('danhmuckham', 'get,post', '');
		$data['email']=$nv_Request->get_title('email', 'get,post', '');
		$data['note']=$nv_Request->get_title('note', 'get,post', '');
		$data['ngaydangky']=date('d/m/Y H:i');
		//var_dump($data);
		$sql = 'INSERT INTO '.NV_PREFIXLANG . '_' . $module_data . "_dangky (hoten,dienthoai,danhmuckham,email,note,ngaydangky) VALUES
				 (:hoten,:dienthoai,:danhmuckham,:email,:note,now())";
				 
		if (!empty($data)){				
			$data_insert = array();
			$data_insert['hoten'] = $data['hoten'];
			$data_insert['dienthoai'] =$data['dienthoai'];
			$data_insert['danhmuckham'] =$data['danhmuckham'];
			$data_insert['email'] = $data['email'];
			$data_insert['note'] = $data['note'];
			$kq= $db->insert_id($sql, 'id', $data_insert)>0?1:0;
			$ketqua['sta']=$kq>0?'ok':'ERR';
			$ketqua['url']=NV_BASE_SITEURL;
			
			if ($kq>0){
				$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_config where name='email'";
				$email = $db->query($sql)->fetch();
				
				//$template = (file_exists(NV_ROOTDIR . '/themes/default/modules/appmobile/main_list.tpl')) ? $module_info['template'] : 'default';
				$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
				
				$xtpl->assign('row', $data);
				$xtpl->parse('sendmail');
				$contents =  $xtpl->text('sendmail');
				$list_mail=explode(';',$email['value']);
				for ($i=0;$i<count($list_mail);$i++)
				{
				$from = array('Đăng Ký Khám Bệnh','Lịch khám vừa yêu cầu');
				$femail=$list_mail[$i];
				$ftitle="Bạn có tin nhắn đăng ký khám bệnh vào lúc ".$data['ngaydangky'];
				@nv_sendmail($from, $femail, $ftitle, $contents);}
			}
			$ketqua['mess']= $kq>0?$lang_module['yeucau_ok']:$lang_module['yeucau_err'];nv_jsonOutput($ketqua);
			
		}		
		 exit;
	}
	
	
	
	
	
	
	
	
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
    $xtpl->assign('LINK_FORM', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=lichkham');
	$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_cat where inhome=1";
	$list = $db->query($sql);$tt=0;
        while ($r = $list->fetch()) {
			$xtpl->assign('r', array('id' => $r['title'],'name' => $r['title'],'select' => ($r['title'] == $item['title']) ? ' selected="selected"' : ''));
			$xtpl->parse('main.loop');
		}

$xtpl->assign('DATA', $data);
	
	
	
	
	$xtpl->parse('main');
    $contents= $xtpl->text('main');
	
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

