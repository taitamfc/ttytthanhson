<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2018 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 04 Oct 2018 08:19:19 GMT
 */

		$xtpl = new XTemplate( 'info_malankham.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
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

		$xtpl->assign( 'malankham', $malankham );
		$xtpl->assign( 'ngaykham', $ngaykham);
		$xtpl->assign( 'date_kham', date('d/m/Y - H:i',$ngaykham));
		
		$thongtinhanhchinh = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=administration/' . $malankham . $global_config['rewrite_exturl'];
		$xtpl->assign( 'thongtinhanhchinh', $thongtinhanhchinh );
		
		$thongtinkham = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=medical/' . $malankham . $global_config['rewrite_exturl'];
		$xtpl->assign( 'thongtinkham', $thongtinkham );
		
		$donthuoc = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=prescription/' . $malankham . $global_config['rewrite_exturl'];
		$xtpl->assign( 'donthuoc', $donthuoc );
		
		$ketquaxetnghiem = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=test/' . $malankham . $global_config['rewrite_exturl'];
		$xtpl->assign( 'ketquaxetnghiem', $ketquaxetnghiem );
		
		$cdha_tdcn = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=cdha-tdcn/' . $malankham . $global_config['rewrite_exturl'];
		$xtpl->assign( 'cdha_tdcn', $cdha_tdcn );
		
		$ketqua_chupphim = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=fiml/' . $malankham . $global_config['rewrite_exturl'];
		$xtpl->assign( 'ketqua_chupphim', $ketqua_chupphim );
			
		

		

	
	$xtpl->parse( 'main' );
	$contents = $xtpl->text( 'main' );
	
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_site_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
