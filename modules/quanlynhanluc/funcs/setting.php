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

	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$tbl=NV_PREFIXLANG . '_' . $module_data . '_hanhchinh';
	$xtpl = new XTemplate('setting.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	/*if ($sta=='edit_item')
	{
		$checkss =$nv_Request->get_title('checkss', 'get,post', '');$key=md5($client_info['session_id'] . $global_config['sitekey']);
		if ($checkss!=$key) {die('Stop!!!');}
		$data=array();
		$err=0;
		$data['id']=$nv_Request->get_int('id', 'get,post', '');
		$data['tencoso']=$nv_Request->get_title('tencoso', 'get,post', '');
		//$data['loaihinh']=$nv_Request->get_title('loaihinh', 'get,post', '');
		$data['diachi']=$nv_Request->get_title('diachi', 'get,post', '');
		$data['dienthoai']=$nv_Request->get_title('dienthoai', 'get,post', '');
		$data['id_loaihinh']=$nv_Request->get_int('id_loaihinh', 'get,post', '');
		$data['giamdoc']=$nv_Request->get_title('giamdoc', 'get,post', '');
		$data['tp_tchc']=$nv_Request->get_title('tp_tchc', 'get,post', '');
		$data['tp_kehoach']=$nv_Request->get_title('tp_kehoach', 'get,post', '');
		$data['tp_taichinh']=$nv_Request->get_title('tp_taichinh', 'get,post', '');
		$data['tp_dieuduong']=$nv_Request->get_title('tp_dieuduong', 'get,post', '');
		
		if (empty($data['tencoso']) or empty($data['diachi']) or empty($data['dienthoai']) or empty($data['giamdoc']) 
			or empty($data['tp_tchc']) or empty($data['tp_kehoach']) or empty($data['tp_taichinh']) or empty($data['tp_dieuduong']) )
		$ketqua=++$err.'.'.$lang_module['error'];
		
		
		if ($err==0)
		{
			$stmt = $db->prepare('Update ' . $tbl. ' SET tencoso=:tencoso, diachi=:diachi, dienthoai=:dienthoai, 
			id_loaihinh=:id_loaihinh, giamdoc=:giamdoc, tp_tchc=:tp_tchc, tp_kehoach=:tp_kehoach, tp_taichinh=:tp_taichinh, tp_dieuduong=:tp_dieuduong 
			WHERE id ='.$data['id']);
			
			$stmt->bindParam(':tencoso', $data['tencoso'], PDO::PARAM_STR);
			$stmt->bindParam(':diachi', $data['diachi'], PDO::PARAM_STR);
			$stmt->bindParam(':dienthoai', $data['dienthoai'], PDO::PARAM_STR);
			$stmt->bindParam(':id_loaihinh', $data['id_loaihinh'], PDO::PARAM_STR);
			$stmt->bindParam(':giamdoc', $data['giamdoc'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_tchc', $data['tp_tchc'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_kehoach', $data['tp_kehoach'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_taichinh', $data['tp_taichinh'], PDO::PARAM_STR);
			$stmt->bindParam(':tp_dieuduong', $data['tp_dieuduong'], PDO::PARAM_STR);
			//$stmt->bindParam(':ghichu',  strtotime(date('d/m/Y h:i:s')), PDO::PARAM_STR);
			$row_id=$stmt->execute();
			$ketqua= $row_id==1?$lang_module['update_ok']:$lang_module['update_err'];
			
			//$ketqua='Test nhận data'; 
		}
		
		echo $ketqua; exit;
	
	}
	*/
	
$path=$_FILES["file"]["tmp_name"];
$thongbao=$path;

if (!empty($path))
{
	require NV_ROOTDIR . '/modules/' . $module_file . '/PHPExcel.php';
	require NV_ROOTDIR . '/modules/' . $module_file . '/PHPExcel/IOFactory.php';
	
	$objPHPExcel = PHPExcel_IOFactory::load($path);
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		$nrColumns = ord($highestColumn) - 64;
		
		/*for ($row = 1; $row <= $highestRow; ++ $row) {
			
			for ($col = 0; $col < $highestColumnIndex; ++ $col) {
				$cell = $worksheet->getCellByColumnAndRow($col, $row);
				$val = $cell->getValue();
				$xtpl->assign('item',$val);
				$xtpl->parse('main.data.row.item');
			}
			$xtpl->parse('main.data.row');
		}
		$xtpl->parse('main.data');*/
	}
	//Tiến hành xác thực file
	$objFile = PHPExcel_IOFactory::identify($path);
	$objData = PHPExcel_IOFactory::createReader($objFile);
	//Chỉ đọc dữ liệu
	$objData->setReadDataOnly(true);
	// Load dữ liệu sang dạng đối tượng
	$objPHPExcel = $objData->load($path);
	//Lấy ra số trang sử dụng phương thức getSheetCount();
	// Lấy Ra tên trang sử dụng getSheetNames();
	//Chọn trang cần truy xuất
	$sheet = $objPHPExcel->setActiveSheetIndex(0);
	//Lấy ra số dòng cuối cùng
	$Totalrow = $sheet->getHighestRow();
	//Lấy ra tên cột cuối cùng
	$LastColumn = $sheet->getHighestColumn();

	//Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
	$TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
	//Tạo mảng chứa dữ liệu
	$data = [];
	//Tiến hành lặp qua từng ô dữ liệu
	//----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
	for ($i = 1; $i <= $Totalrow; $i++) {
		//----Lặp cột
		for ($j = 0; $j < $TotalCol; $j++) {
			// Tiến hành lấy giá trị của từng ô đổ vào mảng
			$data[$i][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
		}
	}

	if (!empty($data))
	{
		//$tbhtml=NV_PREFIXLANG . '_' . $module_data . '_canbo';	
		//$tbhtml=NV_PREFIXLANG . '_' . $module_data . '_groupuser';	
		//$tbhtml=NV_PREFIXLANG . '_' . $module_data . '_khoaphong';	
		$tbhtml=NV_PREFIXLANG . '_' . $module_data . $nv_Request->get_title('table', 'get,post', '');	
		$field='';$val='';$add = 0;
		for ($j = 0; $j < $TotalCol; $j++) { 
		$field .=','.$data[1][$j];
		$val .=',:'.$data[1][$j];
		}
		$sql = "INSERT INTO " .  $tbhtml ." (id".$field.") 	VALUES(NULL".$val." )";
		for ($i = 2; $i <= $Totalrow; $i++) {
			$data_insert = array();$val='(Null';
			for ($j = 0; $j < $TotalCol; $j++) {
				if(empty($data[$i][$j])) $data[$i][$j]='';
				$xtpl->assign('item',$data[$i][$j]);				
				$data_insert[$data[1][$j]] =$data[$i][$j];
				$xtpl->parse('main.data.row.item');
			}
			
		
		$kq= $db->insert_id($sql, 'id', $data_insert)>0?1:0;$add +=$kq;
		$mau=($kq==0)?'style="color: red;"':'';
		$xtpl->assign('color',$mau);
		$xtpl->parse('main.data.row');
		}
		//var_dump($sql);
		$thongbao= 'Dữ liệu đã thêm vào được '.$add . ' Dòng';
		$xtpl->assign('JS',"<script>alert('".$thongbao."');</script>");
		$xtpl->parse('main.data');
	}

}

if ($sta=='update_account')
{
	
	$tbhtml=NV_PREFIXLANG . '_' . $module_data . '_khoaphong';	
	$sql = 'SELECT * From '.$tbhtml;
	$list = $db->query($sql);
	var_dump($list);
	$stt=0;
	$sql1 = 'INSERT INTO '.NV_USERS_GLOBALTABLE.' (group_id, username, md5username, password, email, first_name,last_name, active, regdate) VALUES
				 (' . intval(0) . ',
				 :username,
				 :md5username,
				 :password,
				 :email,
				 :firstname,
				 :last_name,
				 ' . intval(1) . ',
				 ' . intval(NV_CURRENTTIME) . ')';
	//var_dump($sql);
	if (!empty($list)){
        while ($data = $list->fetch()) {
			
				$data_insert = array();
				$data_insert['username'] = $data['account'];
				$data_insert['md5username'] =nv_md5safe($data['account']);
				$data_insert['password'] =$crypt->hash_password($data['account'],$global_config['hashprefix']);
				$data_insert['email'] = $data['account'].'@trungtamytedoanhung.vn';
				$data_insert['firstname'] = $data['account'];
				$data_insert['last_name'] = $data['tenkhoa'];
		$kq= $db->insert_id($sql1, 'userid', $data_insert)>0?1:0;$add +=$kq;
		
		$mau=($kq==0)?'style="color: red;"':'';
		$xtpl->assign('item',$data['account']);
		$xtpl->assign('color',$mau);
		$xtpl->parse('main.phong.row');
		}
		//var_dump($data_insert);
	}
		//$sql = 'INSERT INTO '.$tbluser.' (group_id, username, md5username, password, email, first_name,last_name, active, regdate)'//var_dump($sql);
		$thongbao= 'Dữ liệu đã thêm vào được '.$add . ' Dòng';
		$xtpl->assign('JS',"<script>alert('".$thongbao."');</script>");
		$xtpl->parse('main.phong');

}
	
if ($sta=='update_demokcb')
{
	/*$r['thoigian']=date('Y/m/d','2023/02/'.$i);
		if (!empty($r['thoigian']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $r['thoigian'], $m))
        $thoigian = mktime(0, 0, 0, $m[2], $m[1], $m[3]);*/
	
	$ds = $db->query('select * from '.TABLE."_khamchuabenh order by thoigian ASC Limit 7");
	while ($r = $ds->fetch())
	{
		for ($i=1;$i<10;$i++)
		{
            $thoigian = mktime(0, 0, 0,3,$i,2023);
		$sql = "INSERT INTO ".TABLE . "_khamchuabenh (id,bn_cu,bn_vaovien,bn_ravien,bn_chuyenkhoa,bn_tuvong,bn_chuyenvien,
		bn_xinve,bn_noitru,bn_ngoaitru,bn_namyc,bn_tong,account,thoigian,ngaygio) VALUES(NULL,
		:bn_cu,:bn_vaovien,:bn_ravien,:bn_chuyenkhoa,:bn_tuvong,:bn_chuyenvien,:bn_xinve,:bn_noitru,:bn_ngoaitru,:bn_namyc,:bn_tong,
		:account,".intval($thoigian).",now())";
		$data_insert = array();
		$a0=$r['bn_cu']+rand(5, 20); $a1=$r['bn_vaovien']+rand(5, 20);
		$a2=$r['bn_ravien']+rand(1, 5);$a3=$r['bn_chuyenkhoa']+rand(1, 5);
		$a4=$r['bn_tuvong']+rand(0, 1);$a5=$r['bn_chuyenvien']+rand(1, 5);
		$a6=$r['bn_xinve']+rand(1, 5);$a7=$r['bn_noitru']+rand(1, 15);
		$a8=$r['bn_ngoaitru']+rand(1, 15);$a9=$r['bn_namyc']+rand(1, 15);
		
		$data_insert['bn_cu'] = $a0;
		$data_insert['bn_vaovien'] = $a1;
		$data_insert['bn_ravien'] = $a2;
		$data_insert['bn_chuyenkhoa'] = $a3;
		$data_insert['bn_tuvong'] = $a4;
		$data_insert['bn_chuyenvien'] = $a5;
		$data_insert['bn_xinve'] = $a6;
		$data_insert['bn_noitru'] = $a7;
		$data_insert['bn_ngoaitru'] = $a8;
		$data_insert['bn_namyc'] = $a9;
		$bn_tong = $a0+$a1-$a2-$a3-$a4-$a5-$a6;
		$data_insert['bn_tong'] = $bn_tong;
		$data_insert['account'] = $r['account'];		
		$row_id = $db->insert_id($sql, 'id', $data_insert)>0?1:0; $add +=$row_id;
		}
			
	}
	//$thongbao= 'Dữ liệu đã thêm vào được '.$add . ' Dòng';
	
	$ds = $db->query('select * from '.TABLE."_khamchuabenh order by thoigian");
	while ($r = $ds->fetch())
	{
		$sql = 'Update ' . TABLE. "_khamchuabenh SET  
		ngaygio=:ngaygio  WHERE id =".$r['id'];
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':ngaygio', nv_date('Y-m-d H:m',$r['thoigian']), PDO::PARAM_STR);
		$add +=$row_id=$stmt->execute();
	}
	$thongbao= 'Dữ liệu đã thêm vào được '.$add . ' Dòng';
	
	$thongbao= 'Dữ liệu đã update '.$add . ' Dòng';
	$xtpl->assign('JS',"<script>alert('".$thongbao."');</script>");
	$xtpl->parse('main.phong');

}

if ($sta=='update_ctkcb')
{
	/*$r['thoigian']=date('Y/m/d','2023/02/'.$i);
		if (!empty($r['thoigian']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $r['thoigian'], $m))
        $thoigian = mktime(0, 0, 0, $m[2], $m[1], $m[3]);*/
	
	$ds = $db->query('select * from '.TABLE."_chitietkcb order by thoigian ASC Limit 7");
	while ($r = $ds->fetch())
	{
		for ($i=1;$i<10;$i++)
		{
        $thoigian = mktime(0, 0, 0,3,$i,2023);
		$sql = "INSERT INTO ".TABLE . "_chitietkcb (id, bs_lamsang, so_giuong, bn_c1, c1_toandien, bn_c2, c2_toandien, bn_c3, c3_toandien, goi_dau, tam_kho, xong_hoi, tam_be, massage, xoay, vo_rung, ca_de, phau_thuat, bn_loet, bn_viem, account, thoigian, ngaygio) 
VALUES (NULL,:bs_lamsang,:so_giuong,:bn_c1,:c1_toandien,:bn_c2,:c2_toandien,:bn_c3,:c3_toandien,:goi_dau,:tam_kho,:xong_hoi,:tam_be,:massage,:xoay,:vo_rung,:ca_de,:phau_thuat,:bn_loet,:bn_viem,:account,".intval($thoigian).",now())";
		$data_insert = array();
		/*$a0=$r['bn_cu']+rand(5, 20); $a1=$r['bn_vaovien']+rand(5, 20);
		$a2=$r['bn_ravien']+rand(1, 5);$a3=$r['bn_chuyenkhoa']+rand(1, 5);
		$a4=$r['bn_tuvong']+rand(0, 1);$a5=$r['bn_chuyenvien']+rand(1, 5);
		$a6=$r['bn_xinve']+rand(1, 5);$a7=$r['bn_noitru']+rand(1, 15);
		$a8=$r['bn_ngoaitru']+rand(1, 15);$a9=$r['bn_namyc']+rand(1, 15);*/
		$data_insert['bs_lamsang']=$r['bs_lamsang']+rand(3, 10);
		$data_insert['so_giuong']=$r['so_giuong']+rand(20, 50);
		$data_insert['bn_c1']=$r['bn_c1']+rand(0, 10);
		$data_insert['c1_toandien']=$r['c1_toandien']+rand(10, 20);
		$data_insert['bn_c2']=$r['bn_c2']+rand(0, 20);
		$data_insert['c2_toandien']=$r['c2_toandien']+rand(5, 20);
		$data_insert['bn_c3']=$r['bn_c3']+rand(5, 20);
		$data_insert['c3_toandien']=$r['c3_toandien']+rand(5, 20);
		$data_insert['goi_dau']=$r['goi_dau']+rand(5, 20);
		$data_insert['tam_kho']=$r['tam_kho']+rand(5, 20);
		$data_insert['xong_hoi']=$r['xong_hoi']+rand(5, 20);
		$data_insert['tam_be']=$r['tam_be']+rand(5, 20);
		$data_insert['massage']=$r['massage']+rand(5, 20);
		$data_insert['xoay']=$r['xoay']+rand(5, 20);
		$data_insert['vo_rung']=$r['vo_rung']+rand(5, 20);
		$data_insert['ca_de']=$r['ca_de']+rand(5, 20);
		$data_insert['phau_thuat']=$r['phau_thuat']+rand(5, 20);
		$data_insert['bn_loet']=$r['bn_loet']+rand(5, 20);
		$data_insert['bn_viem']=$r['bn_viem']+rand(5, 20);
		$data_insert['account'] = $r['account'];		
		$row_id = $db->insert_id($sql, 'id', $data_insert)>0?1:0; $add +=$row_id;
		}
			
	}
	//$thongbao= 'Dữ liệu đã thêm vào được '.$add . ' Dòng';
	
	$ds = $db->query('select * from '.TABLE."_khamchuabenh order by thoigian");
	while ($r = $ds->fetch())
	{
		$sql = 'Update ' . TABLE. "_chitietkcb SET  
		ngaygio=:ngaygio  WHERE id =".$r['id'];
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':ngaygio', nv_date('Y-m-d H:m',$r['thoigian']), PDO::PARAM_STR);
		$id =$row_id=$stmt->execute();
	}
	$thongbao= 'Dữ liệu đã thêm vào được '.$add . ' Dòng';
	
	$thongbao= 'Dữ liệu đã update '.$add . ' Dòng';
	$xtpl->assign('JS',"<script>alert('".$thongbao."');</script>");
	$xtpl->parse('main.phong');

}


	
	$base_url =NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_name;

    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	$sql = 'SELECT * FROM ' . $tbl;
	$result = $db->query($sql)->fetch();
	$xtpl->assign('link_frm',$base_url. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('sta', 'exp');	
	$xtpl->assign('ROW', $result);
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';