<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2018 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 04 Oct 2018 08:19:19 GMT
 */
 

	
		
		$xtpl = new XTemplate( 'donthuoc.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
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
		
		// THÔNG TIN BỆNH NHÂN
		$url = $domain ."/api/benh-nhan/get-one/". $_SESSION['user'];
		
		$thongtin_benhnhan = get_data($url);
		
		if(!empty($thongtin_benhnhan['maBn']))
		{
			
			$thongtin_benhnhan['ngaySinh'] = date('d/m/Y',$thongtin_benhnhan['ngaySinh']/1000);
			
			$thongtin_benhnhan['gioiTinh'] = $thongtin_benhnhan['gioiTinh'];
			
			$xtpl->assign( 'thongtin_benhnhan', $thongtin_benhnhan );
		}

		// CHUẨN ĐOÁN
		$url = $domain ."/api/lich-su-kham-benh/get-one/". $malankham;
		
		$chuandoan = get_data($url);
		
		if(!empty($chuandoan['maLk']))
		{
			$xtpl->assign( 'chuandoan', $chuandoan['tenBenh'] );
		}
		
		
		// LẤY DANH SÁCH ĐƠN THUỐC 
		$url = $domain ."/api/lich-su-kham-benh/get-chi-dinh-thuoc/". $malankham;
		
		$donthuoc = get_data($url);
		$stt = 1;
		foreach($donthuoc as $dt)
		{
			$xtpl->assign( 'donthuoc', $dt);
			$xtpl->assign( 'stt', $stt);
			$stt++;
			$xtpl->parse( 'main.donthuoc' );
		}
	
		$xtpl->parse( 'main' );
		$contents = $xtpl->text( 'main' );
		
		include NV_ROOTDIR . '/includes/header.php';
		echo nv_site_theme($contents);
		include NV_ROOTDIR . '/includes/footer.php';
