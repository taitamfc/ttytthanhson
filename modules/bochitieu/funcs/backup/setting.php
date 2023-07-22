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

if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';nv_redirect_location($url); exit();}

	$sta =$nv_Request->get_title('sta', 'get,post', '');
	$tbl=TABLE. '_detail_question';
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
		//$tbhtml=TABLE . '_chitieu';	
		//$tbhtml=TABLE . '_cacchiso';	
		$tbhtml=TABLE . '_detail_question';	
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
	$stt=0;
	$sql = 'INSERT INTO '.NV_USERS_GLOBALTABLE.' (group_id, username, md5username, password, email, first_name,last_name, active, regdate) VALUES
				 (' . intval(0) . ',
				 :username,
				 :md5username,
				 :password,
				 :email,
				 :firstname,
				 :last_name,
				 ' . intval(1) . ',
				 ' . intval(NV_CURRENTTIME) . ')';
				 
	if (!empty($list)){
        while ($data = $list->fetch()) {
			
				$data_insert = array();
				$data_insert['username'] = $data['account'];
				$data_insert['md5username'] =nv_md5safe($data['account']);
				$data_insert['password'] =$crypt->hash_password($data['account'],$global_config['hashprefix']);
				$data_insert['email'] = $data['account'].'@ttytthanhson.com';
				$data_insert['firstname'] = $data['account'];
				$data_insert['last_name'] = $data['tenkhoa'];
		$kq= $db->insert_id($sql, 'userid', $data_insert)>0?1:0;$add +=$kq;
		
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
	
	$base_url =NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_name;

    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	/*$sql = 'SELECT * FROM ' . $tbl;
	$result = $db->query($sql)->fetch();*/
	$xtpl->assign('link_frm',$base_url. '&' . NV_OP_VARIABLE . '='.$op);
	$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));
	$xtpl->assign('sta', 'exp');	
	$xtpl->assign('ROW', $result);
	
	$xtpl->parse('main');
    $contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';