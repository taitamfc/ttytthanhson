<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)
 * @Copyright (C) 2014 VIETNAM DIGITAL TRADING TECHNOLOGY . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (! defined('NV_SYSTEM')) {
    die('Stop!!!');
}

define('NV_IS_MOD_CONTACT', true);


// lấy cấu hình domain api 

$domain = $db->query('SELECT title FROM ' . NV_PREFIXLANG . '_' . $module_data . '_config')->fetchColumn();

$gioitinh = array(
	'1' => $lang_module['gt_nam'],
	'0' => $lang_module['gt_nu']
);


function get_data($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        curl_close($ch);
		
		$data = json_decode($result,true);
        return $data;
    }
	
	
function post_data($url, $param_array) {	
	
	$json = json_encode($param_array);
	
	// URL có chứa hai thông tin name và diachi
	
	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($json))
	);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$result = curl_exec($curl);

	$data = json_decode($result,true);

	curl_close($curl);
	
	 return $data;
	
}

// LẤY DANH BỆNH VIỆN

if(!isset($_SESSION['benhvien']))
{

$url = $domain ."/api/danh-muc/get-all-benh-vien";
$array_benhvien = get_data($url);
foreach($array_benhvien as $bv)
{
	$_SESSION['benhvien'][$bv['ma']] = $bv;	
}

}


// LẤY DANH SÁCH KHOA RA

if(!isset($_SESSION['khoa']))
{

$url = $domain ."/api/danh-muc/get-all-khoa";
$array_khoa = get_data($url);
foreach($array_khoa as $khoa)
{
	$_SESSION['khoa'][$khoa['ma']]	= $khoa;	
}

}


// LẤY DANH SÁCH GIÁ TRỊ BÌNH THƯỜNG

if(!isset($_SESSION['giatri_bt']))
{

$url = $domain ."/api/danh-muc/get-all-gia-tri-tbt";

$machiso = get_data($url);
foreach($machiso as $chiso)
{
	$_SESSION['giatri_bt'][$chiso['ma']]	= $chiso;	
}

}

//print_r($array_op);die($op);

if(count($array_op) == 2)
{

if(!isset($_SESSION['login'])) {
    Header('Location: ' . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=login', true));
    die();
}

$malankham = $array_op[1];

// LẤY NGÀY KHÁM BỆNH RA
$url = $domain ."/api/lich-su-kham-benh/get-all/". $_SESSION['user'];
$data = get_data($url);

$ngaykham = '';

foreach($data as $d)
{
	if($d['maLanKham'] == $malankham )
	{
		$ngaykham = $d['ngayKham']/1000;
		break;
	}
}
	
}



