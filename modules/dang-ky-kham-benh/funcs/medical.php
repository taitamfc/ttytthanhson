<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2018 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 04 Oct 2018 08:19:19 GMT
 */
 

	
		
		$xtpl = new XTemplate( 'thongtinkham.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
		$xtpl->assign( 'LANG', $lang_module );
		$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
		$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
		$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
		$xtpl->assign( 'MODULE_NAME', $module_name );
		$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
		$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
		$xtpl->assign( 'TEMPLATE', $global_config['module_theme'] );
		$xtpl->assign( 'OP', $op );
		$xtpl->assign( 'ngaykham', date('d/m/Y - H:i',$ngaykham) );

		// LẤY THÔNG TIN LỊCH KHÁM CHỮA BỆNH
		$url = $domain ."/api/lich-su-kham-benh/get-one/". $malankham;
		
		$data = get_data($url);
		
		if(!empty($data['maLk']))
		{
			
			$data['ngayVao'] = date('d/m/Y',$data['ngayVao']/1000);
			$data['ngayRa'] = date('d/m/Y',$data['ngayRa']/1000);
			
			$data['gtTheTu'] = date('d/m/Y',$data['gtTheTu']/1000);
			$data['gtTheDen'] = date('d/m/Y',$data['gtTheDen']/1000);
			
			$data['noidangky'] = $_SESSION['benhvien'][$data['maDkbd']]['ten'];
			
			$data['maKhoa'] = $_SESSION['khoa'][$data['maKhoa']]['ten'];
			$xtpl->assign( 'data', $data );
		}
	
		$xtpl->parse( 'main' );
		$contents = $xtpl->text( 'main' );
		
		include NV_ROOTDIR . '/includes/header.php';
		echo nv_site_theme($contents);
		include NV_ROOTDIR . '/includes/footer.php';
