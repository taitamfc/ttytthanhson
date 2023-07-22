<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2018 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 04 Oct 2018 08:19:19 GMT
 */
 

if( $nv_Request->isset_request( 'logout', 'post' ) )
{

	session_destroy();
	die();

}


if( $nv_Request->isset_request( 'ketqua_chupphim', 'post' ) )
{
	$ketqua_chupphim = $nv_Request->get_int( 'ketqua_chupphim', 'post', 0 );
	$malankham = $nv_Request->get_title( 'malankham', 'post', '' );
	$ngaykham = $nv_Request->get_title( 'ngaykham', 'post', '' );

	
	if(($ketqua_chupphim) and !empty($malankham) and !empty($ngaykham))
	{
		
		$xtpl = new XTemplate( 'ketqua_chupphim.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
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
		
		
		// LẤY KẾT QUẢ XÉT NGHIỆM
		$url = $domain ."/api/phim/get-all/". $malankham;
		
		$data = get_data($url);
		$stt = 1;
		foreach($data as $dt)
		{
			$xtpl->assign( 'data', $dt);
			$xtpl->assign( 'stt', $stt);
			$stt++;
			$xtpl->parse( 'main.data' );
		}
		
			
		$xtpl->parse( 'main' );
		$contents = $xtpl->text( 'main' );

		echo $contents;
		die();
	
	}
	
}

if( $nv_Request->isset_request( 'cdha_tdcn', 'post' ) )
{
	$cdha_tdcn = $nv_Request->get_int( 'cdha_tdcn', 'post', 0 );
	$malankham = $nv_Request->get_title( 'malankham', 'post', '' );
	$ngaykham = $nv_Request->get_title( 'ngaykham', 'post', '' );

	
	if(($cdha_tdcn) and !empty($malankham) and !empty($ngaykham))
	{
		
		$xtpl = new XTemplate( 'cdha_tdcn.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
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
		
		
		// LẤY KẾT QUẢ XÉT NGHIỆM
		$url = $domain ."/api/lich-su-kham-benh/get-ket-qua-cdha-tdcn/". $malankham;
		
		$data = get_data($url);
		$stt = 1;
		foreach($data as $dt)
		{
			
			$dt['maChiSo'] = $_SESSION['giatri_bt'][$dt['maChiSo']]['ten'];
			$xtpl->assign( 'data', $dt);
			$xtpl->assign( 'stt', $stt);
			$stt++;
			$xtpl->parse( 'main.data' );
		}
		
			
		$xtpl->parse( 'main' );
		$contents = $xtpl->text( 'main' );

		echo $contents;
		die();
	
	}
	
}


if( $nv_Request->isset_request( 'ketquaxetnghiem', 'post' ) )
{
	$ketquaxetnghiem = $nv_Request->get_int( 'ketquaxetnghiem', 'post', 0 );
	$malankham = $nv_Request->get_title( 'malankham', 'post', '' );
	$ngaykham = $nv_Request->get_title( 'ngaykham', 'post', '' );

	
	if(($ketquaxetnghiem) and !empty($malankham) and !empty($ngaykham))
	{
		
		$xtpl = new XTemplate( 'ketquaxetnghiem.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
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
		
		
		// LẤY KẾT QUẢ XÉT NGHIỆM
		$url = $domain ."/api/lich-su-kham-benh/get-ket-qua-xet-nghiem/". $malankham;
		
		$data = get_data($url);
		$stt = 1;
		foreach($data as $dt)
		{
			// LẤY GIÁ TRỊ BÌNH THƯỜNG
			/*
			$url = $domain ."/api/danh-muc/get-all-gia-tri-tbt";
			$machiso = get_data($url);
			foreach($machiso as $chiso)
			{
				if($chiso['ma'] == $dt['maChiSo'])
				{
					$dt['maChiSo'] = $chiso['ten'];
					break;
				}
			}
			*/
			$dt['maChiSo'] = $_SESSION['giatri_bt'][$dt['maChiSo']]['ten'];
			$dt['ngayKq'] = date('d/m/Y',$dt['ngayKq']/1000);
			$xtpl->assign( 'data', $dt);
			$xtpl->assign( 'stt', $stt);
			$stt++;
			$xtpl->parse( 'main.data' );
		}
		
			
		$xtpl->parse( 'main' );
		$contents = $xtpl->text( 'main' );

		echo $contents;
		die();
	
	}
	
}

if( $nv_Request->isset_request( 'donthuoc', 'post' ) )
{
	$donthuoc = $nv_Request->get_int( 'donthuoc', 'post', 0 );
	$malankham = $nv_Request->get_title( 'malankham', 'post', '' );
	$ngaykham = $nv_Request->get_title( 'ngaykham', 'post', '' );

	
	if(($donthuoc) and !empty($malankham) and !empty($ngaykham))
	{
		
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
			if($thongtin_benhnhan['ngaySinh'] <= 0)
			$thongtin_benhnhan['ngaySinh'] = '';
			else
			$thongtin_benhnhan['ngaySinh'] = date('d/m/Y',$thongtin_benhnhan['ngaySinh']/1000);
			
			$thongtin_benhnhan['gioiTinh'] = $thongtin_benhnhan[$data['gioiTinh']];
			
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

		echo $contents;
		die();
	
	}
	
}


if( $nv_Request->isset_request( 'thongtinkham', 'post' ) )
{
	$thongtinkham = $nv_Request->get_int( 'thongtinkham', 'post', 0 );
	$malankham = $nv_Request->get_title( 'malankham', 'post', '' );
	$ngaykham = $nv_Request->get_title( 'ngaykham', 'post', '' );

	
	if(($thongtinkham) and !empty($malankham) and !empty($ngaykham))
	{
		
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
			
			// LẤY TẤT CẢ CÁC KHOA RA
			/*
			$url = $domain ."/api/danh-muc/get-all-khoa";
		
			$khoa_array = get_data($url);
			
			foreach($khoa_array as $khoa)
			{
				if($khoa['ma'] == $data['maKhoa'])
				{
					$data['maKhoa'] = $khoa['ten'];
					break;
				}
			}
			*/
			
			$data['maKhoa'] = $_SESSION['khoa'][$data['maKhoa']]['ten'];
			$xtpl->assign( 'data', $data );
		}
			
		$xtpl->parse( 'main' );
		$contents = $xtpl->text( 'main' );

		echo $contents;
		die();
	
	}
	
}


if( $nv_Request->isset_request( 'thongtinhanhchinh', 'post' ) )
{
	$thongtinhanhchinh = $nv_Request->get_int( 'thongtinhanhchinh', 'post', 0 );
	$ngaykham = $nv_Request->get_title( 'ngaykham', 'post', '' );
	
	if($thongtinhanhchinh)
	{
		
		$xtpl = new XTemplate( 'thongtinhanhchinh.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
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
		
		$xtpl->assign( 'ngaykham', date('d/m/Y - H:i',$ngaykham));
		// LẤY THÔNG TIN LỊCH KHÁM CHỮA BỆNH
		$url = $domain ."/api/benh-nhan/get-one/". $_SESSION['user'];
		
		$data = get_data($url);
		
		if(!empty($data['maBn']))
		{
			if($data['ngaySinh'] <= 0)
			$data['ngaySinh'] = '';
			else
			$data['ngaySinh'] = date('d/m/Y',$data['ngaySinh']/1000);
			
			$data['gioiTinh'] = $gioitinh[$data['gioiTinh']];
			
			$xtpl->assign( 'data', $data );
		}
			
		$xtpl->parse( 'main' );
		$contents = $xtpl->text( 'main' );

		echo $contents;
		die();
	
	}
	
}


if( $nv_Request->isset_request( 'malankham', 'post' ) )
{
	$malankham = $nv_Request->get_title( 'malankham', 'post', '' );
	$ngaykham = $nv_Request->get_title( 'ngaykham', 'post', '' );
	
	if(!empty($malankham) and !empty($ngaykham))
	{
		
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
			
		$xtpl->parse( 'main' );
		$contents = $xtpl->text( 'main' );

		echo $contents;
		die();
	
	}
	
}


if( $nv_Request->isset_request( 'ma_bn_ajax', 'post' ) )
{
	$ma_bn = $nv_Request->get_title( 'ma_bn_ajax', 'post', '' );
	
	// xử lý lại mã bệnh nhân
	$bn = substr( $ma_bn,  0, 2);
	
	if($bn == 'BN')
	{
		// XỬ LÝ THÊM CHO ĐỦ 9 KÝ TỰ VÀO MÃ BỆNH NHÂN
		$mang_bn = explode('BN',$ma_bn);
		if(!empty($mang_bn[1]))
		{
			// THÊM ĐỦ 9 KÝ TỰ VÀO
			$lenght = strlen($mang_bn[1]);
			if($lenght < 9)
			{
				$conlai = 9 - $lenght;
				$chuoi = '';
				
				for($i = 0 ; $i < $conlai; $i ++)
				{
					$chuoi = $chuoi . '0';
				}
				
				$ma_bn = 'BN' . $chuoi . $mang_bn[1];
			}
		}
	}
	
	print($ma_bn);die;
	
}


if( $nv_Request->isset_request( 'ma_bn', 'post' ) )
{
	$ma_bn = $nv_Request->get_title( 'ma_bn', 'post', '' );
	$password = $nv_Request->get_title( 'password', 'post', '' );
	
	// xử lý lại mã bệnh nhân
	$bn = substr( $ma_bn,  0, 2);
	
	if($bn == 'BN')
	{
		// XỬ LÝ THÊM CHO ĐỦ 9 KÝ TỰ VÀO MÃ BỆNH NHÂN
		$mang_bn = explode('BN',$ma_bn);
		if(!empty($mang_bn[1]))
		{
			// THÊM ĐỦ 9 KÝ TỰ VÀO
			$lenght = strlen($mang_bn[1]);
			if($lenght < 9)
			{
				$conlai = 9 - $lenght;
				$chuoi = '';
				
				for($i = 0 ; $i < $conlai; $i ++)
				{
					$chuoi = $chuoi . '0';
				}
				
				$ma_bn = 'BN' . $chuoi . $mang_bn[1];
			}
		}
	}
	
	//print($ma_bn);die;
	
	if(!empty($ma_bn) and !empty($password))
	{
		
		$param = array(
		'active' => 0,
		'maBn' => $ma_bn,
		'matKhau' => $password,
		'matKhauMoi' => ''
		);
		
		$url = $domain .'/api/tai-khoan/login';
		$data = post_data($url, $param);
		
		//print_r($data);die;
		if($data['active'] == 1 and isset($data['active']))
		{
			// GÁN SESSION LOGIN ĐĂNG NHẬP THÀNH CÔNG
			$_SESSION['login'] = true;
			$_SESSION['user'] = $ma_bn;
			$_SESSION['password'] = $password;
			echo 1;
			die();
		}
		elseif($data['active'] == 0 and isset($data['active']))
		{
			// chưa kích hoạt, đổi mật khẩu
			$_SESSION['user'] = $ma_bn;
			$_SESSION['password'] = $password;
			echo 2;
			die();
		}
	
	}
	
	echo 0;
	die();
	
}

// THAY ĐỔI PASSWORD

if( $nv_Request->isset_request( 'ma_bn_active', 'post' ) )
{
	$ma_bn = $nv_Request->get_title( 'ma_bn_active', 'post', '' );
	$password = $nv_Request->get_title( 'password', 'post', '' );
	$password_new = $nv_Request->get_title( 'password_new', 'post', '' );
	$password_new_nhaplai = $nv_Request->get_title( 'password_new_nhaplai', 'post', '' );
	
	
	if(!empty($ma_bn) and !empty($password) and !empty($password_new) and $password_new == $password_new_nhaplai )
	{
		
		$param = array(
		'active' => 0,
		'maBn' => $ma_bn,
		'matKhau' => $password,
		'matKhauMoi' => $password_new
		);
		
		$url = $domain .'/api/tai-khoan/change-pwd';
		$data = post_data($url, $param);
		
		//print_r($data);die;
		if($data['active'])
		{
			// GÁN SESSION LOGIN ĐĂNG NHẬP THÀNH CÔNG
			$_SESSION['login'] = true;
			$_SESSION['user'] = $ma_bn;
			$_SESSION['password'] = $password;
			echo 1;
			die();
		}
	}
	
	echo 0;
	die();
	
}
    
	
 
die();