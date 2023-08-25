<?php

/**
 * WAN LY BAO CAO SU CO Y KHOA
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (!defined('NV_IS_MOD_FIVES')) {
	die('Stop_main!!!');
}

// create_evaluation();
if (empty($user_info)) {
	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';
	Header('Location: ' . nv_url_rewrite($url, true));
	exit();
}
$post = array();
$get = array();
$update = False;

//test modal response
// thêm mới thành viên



$thongke = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);

/*Code for Here*/

$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
$xtpl->assign('CHECKSESS', md5($client_info['session_id'] . $global_config['sitekey']));

$post = array();
$get = array();
$id = 0;




//kiểm tra loại báo cáo
//mặc định 1 là tiếp nhận
$st = '';
$loaibc = $nv_Request->get_title('idd', 'get,post', 1); //trả về 1 nếu ko có giá trị 
if ($loaibc >= 1) {
	//đưa vào list chọn danh sách loại báo cáo
	switch (intval($loaibc)) {
		case 1:
			$trangthai = 'ĐÃ TIẾP NHẬN';
			break;

		case 2:
			$trangthai = 'ĐÃ DUYỆT';
			break;

		case 3:
			$trangthai = 'ĐANG PHÂN TÍCH';
			break;

		case 4:
			$trangthai = 'ĐÃ PHẢN HỒI';
			break;

		default:
			break;
	}

	$xtpl->assign('TENBC', $trangthai);


	$st = "SELECT * FROM " . TABLE . "_vote_config where status =1";
	$row_op = $db->query($st)->fetch();
	//var_dump($st);
	// Đưa dữ liệu vào kỳ đánh giá
	$items = $row_op['loaibc'];
	$items = explode(';', $items);
	foreach ($items as $item) {
		switch (intval($item)) {
			case 1:
				$trangthai = 'Đã tiếp nhận';
				break;

			case 2:
				$trangthai = 'Đã duyệt';
				break;

			case 3:
				$trangthai = 'Đang phân tích';
				break;

			case 4:
				$trangthai = 'Đã phản hồi';
				break;

			default:
				break;
		}
		($loaibc == intval($item)) ? $check = 'selected' : $check = '';

		$xtpl->assign('LOAIBC', array(
			'trangthai' => $trangthai,
			'value' => $item,
			'check' => $check
		));
		$xtpl->parse('main.LOAIBC');
	}



	if ($loaibc == 1)
		$st = "SELECT masobc_a,kpbc,mota,thoigian,status,note FROM " . TABLE . "_voted_result_a
	Order by status asc,thoigian asc";
	else
		$st = "SELECT masobc_a,kpbc,mota,thoigian,status,note FROM " . TABLE . "_voted_result_a
	WHERE status= $loaibc
	Order by status asc,thoigian asc";
	//var_dump($st);

	//kiểm tra bấm nút find-tìm kiếm

	if (isset($_POST['btn_find'])) { //cách này thường dùng khi bấm submit form ko dùng ajax
		
		$tg_tungay = $nv_Request->get_title('tg_tungay', 'get,post', 0);
		$datef = strtotime($tg_tungay);
		$fromdate = date("Y/m/d",  $datef);
		$tg_denngay = $nv_Request->get_title('tg_denngay', 'get,post', 0);
		$datet = strtotime($tg_denngay);
		$todate = date("Y/m/d",  $datet);

		$st = "SELECT masobc_a,kpbc,mota,thoigian,status,note FROM " . TABLE . "_voted_result_a
	WHERE DATE(thoigian) BETWEEN "."'". $fromdate."'"." and "."'".$todate."'"." AND status= $loaibc
	Order by status asc,thoigian asc";

	
	}


	$rows = $db->query($st)->fetchAll();
	foreach ($rows as $row) {
		$trangthai = '';
		switch ($row['status']) {
			case 1:
				$trangthai = 'Đã tiếp nhận';
				break;

			case 2:
				$trangthai = 'Đã duyệt';
				break;

			case 3:
				$trangthai = 'Đang phân tích';
				break;

			case 4:
				$trangthai = 'Đã phản hồi';
				break;

			default:
				break;
		}
		$id = $id + 1;
		$input = $row['thoigian'];
		$date = strtotime($input);
		//$newDate = date("d/m/Y H:s:i",  $date);
		$newDate = date("d/m/Y H:s:i",  $date);
		$xtpl->assign('DSBC', array(
			'stt' => $id,
			'masobc' => $row['masobc_a'],
			'khoaphong' => $row['kpbc'],
			'ngaygio' => $newDate,
			'tomtatnd' => $row['mota'],
			'trangthai' => $trangthai,
			'note' => $row['note'],

		));
		$xtpl->parse('main.DSBC');
	}
}
//check kiểm tra thông tin khi lưu duyệt thông tin báo cáo
//insert to db
/*
    $stt = "UPDATE " . TABLE . "_voted_result_a " . $tencot . ' ' . $values;
       echo '<br>'.$stt;
    $stmt = $db->prepare($stt);
    //var_dump( $stmt);
    foreach ($rows as $row) {
        $stmt->bindParam(':' . $row['controlname'], $post[$row['controlname']]);
    }
    $row_id = $stmt->execute();
    $ketqua['status'] = ($row_id > 0) ? 'OK' : 'ERR';
    echo '<br>'.$ketqua['status'];
	*/
//tạo câu lệnh lấy nội dung trong form theo tên cột và giá trị tự động





//kiểm tra msbc khi đúp vào dòng trong bảng chi tiết
if ($nv_Request->get_title('act', 'get,post', '') == 'hienmodal') {
	$num = $nv_Request->get_title('msbc', 'get,post', ''); //trả về rỗng nếu ko có giá trị 
	//kiểm tra khi submit form

	//dua vao danh sach khoa phong
	$st = "SELECT * FROM " . TABLE . "_groupuser";
	// print($st2);
	$rows = $db->query($st)->fetchAll();
	foreach ($rows as $row) {
		// kiểm tra khoa phòng đã chọn có trong danh sách nhóm người dùng thì set thuộc tính selected   
		//(in_array($row['account'], $str2)) ? $row['selected'] = 'selected' : $row['selected'] = '';
		$xtpl->assign('department', $row);
		$xtpl->parse('main.department');
	}

	//kiểm tra khi bấm vào nút duyệt báo cáo
	if ($act = $nv_Request->get_title('sta2', 'get,post', '')) {
		//lấy các control tự động 
		$data = array();
		$st = "Select rows_numv,controlname,type_control FROM " . TABLE . "_voting_rows_a 
		Where status = 1 
		group by   rows_numv,controlname,type_control
		order by rows_numv asc ";
		$data = creat_st_table($st);
		$tencot = $data['tencot'];
		$values = $data['values'];
		$data['capnhat'] = date("Y-m-d H:i:s", time());
		$data['log'] = $user_info['username'] . ' cập nhật lúc ' . date("Y-m-d H:i:s", time());
		$data['status'] = 2; //duyệt báo cáo
		$values .= ',capnhat=' . "'" . $data['capnhat'] . "'";
		$values .= ',log=' . "'" . $data['log'] . "'";
		$values .= ',status=' . "'" . $data['status'] . "'";

		//cập nhật dữ liệu cho bảng thông tin báo cáo
		$st = "UPDATE " . TABLE . "_voted_result_a " . $values . ' WHERE masobc_a =' . "'" . $num . "'";
		//var_dump($st);
		$row_id = $db->exec($st);


		$ketqua['status'] = 'OK';
		$ketqua['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
		$ketqua['mess'] = ($row_id > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err'];
		//nv_jsonOutput($ketqua);
		//exit;

	}

	//kiểm tra khi bấm vào nút phân tích báo cáo
	if ($act = $nv_Request->get_title('sta3', 'get,post', '')) {
		//var_dump('act='.$act);
		//lấy các control tự động 
		$data = array();
		$st = "Select rows_numv,controlname,type_control FROM " . TABLE . "_voting_rows_b 
		Where status = 1 
		group by   rows_numv,controlname,type_control
		order by rows_numv asc ";
		$data = creat_st_table($st);
		$tencot = $data['tencot'];
		$values = $data['values'];
		$data['capnhat'] = date("Y-m-d H:i:s", time());
		$data['log'] = $user_info['username'] . ' cập nhật lúc ' . date("Y-m-d H:i:s", time());
		$data['status'] = 3; //phân tích báo cáo
		$values .= 'capnhat=' . "'" . $data['capnhat'] . "'";
		$values .= ',log=' . "'" . $data['log'] . "'";
		$values .= ',status=' . "'" . $data['status'] . "'";

		//cập nhật dữ liệu cho bảng phản hồi thông tin báo cáo B
		$st = "UPDATE " . TABLE . "_voted_result_b " . $values . " WHERE masobc_b =" . "'" . $num . "'";
		//var_dump($st);
		$row_id1 = $db->exec($st);
			
		//cập nhật dữ liệu cho bảng thông tin báo cáo A
		$st = "UPDATE " . TABLE . "_voted_result_a  SET status ='" . $data['status'] . "' 
		WHERE masobc_a='" . $num . "'";
		$row_id2 = $db->exec($st);
		$ketqua['status'] = 'OK';
		$ketqua['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
		$ketqua['mess'] = ($row_id1 > 0 && $row_id2 > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err'];
		//nv_jsonOutput($ketqua);
		//exit;

	}

	//kiểm tra khi bấm nút phản hồi báo cáo
	if ($act = $nv_Request->get_title('sta4', 'get,post', '')) {

		$st = "SELECT * FROM " . TABLE . "_groupuser";
		// print($st2);
		$rows = $db->query($st)->fetchAll();
		foreach ($rows as $row) {
			// kiểm tra khoa phòng đã chọn có trong danh sách nhóm người dùng thì set thuộc tính selected   
			//(in_array($row['account'], $str2)) ? $row['selected'] = 'selected' : $row['selected'] = '';
			$xtpl->assign('department', $row);
			$xtpl->parse('main.department');
		}
		$departments = $nv_Request->get_array('department', 'post');
		$str_dp =  implode(";", $departments);
		//var_dump($str_dp);
		$data_insert = array();
		$tencot = "(masobc,khoaphong,capnhat,log)";
		$values = " VALUES(:masobc,:khoaphong,:capnhat,:log)";

		$data_insert['masobc'] = $num;
		$data_insert['khoaphong'] = $str_dp;
		$data_insert['capnhat'] = date("Y-m-d H:i:s", time());
		$data_insert['log'] = $user_info['username'] . ' cập nhật lúc ' . date("Y-m-d H:i:s", time());
		$data['status'] = 4; //trạng thái đã gửi phản hồi
		$st = "INSERT INTO " . TABLE . "_voted_total " . $tencot . ' ' . $values;
		//var_dump($data_insert);
		$row_id = $db->insert_id($st, 'id', $data_insert);

		//cập nhật trạng thái cho 2 bảng kia....
		//update trạng thái cho bảng vote_result a
		//cập nhật dữ liệu cho bảng thông tin báo cáo A
		$st = "UPDATE " . TABLE . "_voted_result_a  SET status ='" . $data['status'] . "' 
		WHERE masobc_a='" . $num . "'";
		$row_id = $db->exec($st);

		//cập nhật dữ liệu cho bảng thông tin báo cáo B
		$st = "UPDATE " . TABLE . "_voted_result_b  SET status ='" . $data['status'] . "' 
		WHERE masobc_b='" . $num . "'";
		$row_id = $db->exec($st);




	}




	//tạo câu lệnh lấy nội dung trong form theo tên cột và giá trị tự động



	// ds BC phản hồi
	$st = "Select * FROM " . TABLE . "_voted_result_b where status >= 1 
and masobc_b = '$num'";
	//echo $st;
	$value = $db->query($st)->fetch();

	$st1 = "Select * FROM " . TABLE . "_voting_b where status = 1 order by numv asc  ";

	$id = 0; //lưu lại số lượng các câu hỏi trong 1 lần khảo 
	$stt = 0;
	$groups = $db->query($st1)->fetchAll();
	foreach ($groups as $group) {
		$stt = $stt + 1;


		//echo 'modal=' . $group['numv'] . '----p=' . $stt0 . '---n=' . $stt1 . '<br>';
		//lấy ra cau hoi tương ứng vs nhóm câu hỏi
		$st2 = "Select * FROM " . TABLE . "_voting_rows_b
    WHERE status = 1 and rows_numv =" . $group['numv'] . "
    ";
		$rows = $db->query($st2)->fetchAll();
		$xtpl->assign(
			'NHOMCAUHOI2',
			array(
				'tennhom' => $group['question'],
				'stt' => $stt,
				'stt0' => $stt0,
				'stt1' => $stt1,
				'vid' => $group['vid']
			)
		);

		//echo $group['numv'].'. '.$group['question'].':';
		foreach ($rows as $row) {
			//kiểm tra loại control để tạo tự động trong modal form
			//echo '<br>';
			//echo '----'.$row['v_id'].'. '.$row['title'].':';
			$id++;
			//tao control trên form
			$form_control = create_control($row, $id, $group, $value);


			$xtpl->assign('CAUHOI2', array(
				'title' => $row['title'],
				'type_control' => $row['type_control'],
				'form_control' => $form_control,
				'value' => $row['value']

			));
			$xtpl->parse('main.NHOMCAUHOI2.CAUHOI2');

			//echo $row['type_control'].'|';
		}
		$xtpl->parse('main.NHOMCAUHOI2');
		$xtpl->parse('main.DS2');
		//echo '<br>';
	}




	//đưa danh sách BC gửi đến


	$st = "Select * FROM " . TABLE . "_voted_result_a where status >= 1 
and masobc_a ='$num'";
	//echo $st;
	$value = $db->query($st)->fetch();
	//echo $value['hotenbn'];

	$st1 = "Select * FROM " . TABLE . "_voting_a where status = 1 order by numv asc  ";
	//lấy ra danh sách tên cột
	//echo $st;
	$id = 0; //lưu lại số lượng các câu hỏi trong 1 lần khảo sát

	$groups = $db->query($st1)->fetchAll();
	$stt0 = 0; //pre idmodal
	$stt1 = 2; //next idmodal

	foreach ($groups as $group) {



		$xtpl->parse('main.DSA');

		if (intval($group['numv']) == 1) {
			$stt0 = count($groups); //pre idmodal
			$stt1 = 2;
			$xtpl->assign('hiennut', '');
		} else if (intval($group['numv']) == count($groups)) {
			$stt0 = $stt1 - 1;
			$stt1 = 1;
			//hien thi nut submit
			$nutsubmit = '<button type="submit" class="btn  btn-warning " id="modal_submit" name="submit_button"
        
        ><i class=""></i>Gửi báo cáo</button>';
			$xtpl->assign('HIENTHI', $nutsubmit);
			$xtpl->assign('hiennut', 'hidden');
		} else {
			//$xtpl->assign('hiennut', '');
			$stt0 = $stt1 - 1;
			$stt1 = $stt1 + 1;
		}


		//echo 'modal=' . $group['numv'] . '----p=' . $stt0 . '---n=' . $stt1 . '<br>';
		//lấy ra cau hoi tương ứng vs nhóm câu hỏi
		$st2 = "Select * FROM " . TABLE . "_voting_rows_a
    WHERE status = 1 and rows_numv =" . $group['numv'] . "
    ";
		$rows = $db->query($st2)->fetchAll();
		$xtpl->assign(
			'NHOMCAUHOI',
			array(
				'tennhom' => $group['question'],
				'stt' => $group['numv'],
				'stt0' => $stt0,
				'stt1' => $stt1,
				'vid' => $group['vid'],
				'display' => 'display: none'
			)
		);

		//echo $group['numv'].'. '.$group['question'].':';
		foreach ($rows as $row) {
			//kiểm tra loại control để tạo tự động trong modal form
			//echo '<br>';
			//echo '----'.$row['v_id'].'. '.$row['title'].':';
			$id++;
			//tao control trên form
			$form_control = create_control($row, $id, $group, $value);


			$xtpl->assign('CAUHOI', array(
				'title' => $row['title'],
				'type_control' => $row['type_control'],
				'form_control' => $form_control,
				'value' => $row['value']

			));
			$xtpl->parse('main.NHOMCAUHOI.CAUHOI');

			//echo $row['type_control'].'|';
		}
		$xtpl->parse('main.NHOMCAUHOI');
		$xtpl->parse('main.DS');
		//echo '<br>';
	}


	$xtpl->assign('MABC', $num);
	$xtpl->assign('TRANGTHAI2', ''); //duyet
	$xtpl->assign('TRANGTHAI3', ''); //phan tich
	$xtpl->assign('TRANGTHAI4', ''); //gưi phan hoi
	$test = '';
	//kiểm tra trạng thái báo cáo //duyệt, tiếp nhận, phân tích....
	switch ($value['status']) {
		case 1: //tiep nhan			
			$xtpl->assign('TRANGTHAI3', 'disabled');
			$xtpl->assign('TRANGTHAI4', 'disabled');
			break;
		case 2: //duyet
			$xtpl->assign('TRANGTHAI2', 'disabled');
			$xtpl->assign('TRANGTHAI4', 'disabled');
			break;
		case 3: //phan tich
			$xtpl->assign('TRANGTHAI2', 'disabled');
			break;
		case 4: //gui bao cao
			$xtpl->assign('TRANGTHAI2', 'disabled');
			$xtpl->assign('TRANGTHAI3', 'disabled');
			$xtpl->assign('TRANGTHAI4', 'disabled');
			break;
		default:
			$test = '';
	}
}
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
$xtpl->assign('THEME_URL', THEME_URL);
$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

//tạo câu lệnh dữ liệu tự động theo tên cột và giá trị


//tạo controls trên form
function create_control($row, $id, $group, $value)
{
	global $db;
	switch ($row['type_control']) {
		case 'text':
			$form_control = '<tr><td><div class="mb-3">
		  <label class="form-label">' . $row['title'] . '</label>
		  <input type="text" class="form-control" id="idtext' . $id . '" name="' . $row['controlname'] . '" value="' . $value[$row['controlname']] . '" />
		 
		 
		</div></td></tr>';
			break;

		case 'radio':
			//lấy các giá trị trong cột value đưa vào radio
			$arr = $row['value'];
			$arr = explode(';', $arr);
			$form_control = '<td>
			<label class="form-label">' . $row['title'] . '</label>
			</td><td>
			';
			//echo count($arr);

			foreach ($arr as $r) {
				//.=  in ra nhiều control trên form
				//kiểm tra giá trị radio trong bảng két wả
				($value[$row['controlname']] == $r) ? $check = 'checked="checked"' : $check = '';

				$form_control .= '                    
				<div class="form-check form-check-inline">                     
				<input class="form-check-input" type="radio" name="' . $row['controlname'] . '" id="idradio' . $id . '" value="' . $r . '" ' . $check . '
				>
				<label class="form-check-label" for="radio' . $id . '" >' . $r . '</label>
			  </div>';
			}
			$form_control .= '</td>';

			break;

		case 'radiol':
			//lấy các giá trị trong cột value đưa vào radio
			$arr = $row['value'];
			$arr = explode(';', $arr);
			$form_control = '<tr><td>
			<label class="form-label">' . $row['title'] . '</label>
			</td></tr>
			';


			//echo count($arr);

			foreach ($arr as $r) {
				//.=  in ra nhiều control trên form
				//kiểm tra giá trị radio trong bảng két wả
				($value[$row['controlname']] == $r) ? $check = 'checked="checked"' : $check = '';

				$form_control .= '<tr><td>                    
				<div class="form-check form-check-inline">                     
				<input class="form-check-input" type="radio" name="' . $row['controlname'] . '" id="idradio' . $id . '" value="' . $r . '" ' . $check . '
				>
				<label class="form-check-label" for="radio' . $id . '" >' . $r . '</label>
			  </div></td></tr>';
			}


			break;

		case 'radiog':
			($value[$row['controlname']] == $row['title']) ? $check = 'checked="checked"' : $check = '';
			//echo '<br>'. $check;
			$form_control = '<td>                     
				<div class="flex form-check ">                     
				<input  class="form-check-input" type="radio" name="' . $row['controlname'] . '" id="idradiog' . $id . '" 
				onchange="handleRadioChange(event)" value="' . $row['title'] . '" ' . $check . '
				data-next-button="#nextbutton' . $group['numv'] . '">
				<label class="form-check-label" for="radiog' . $id . '" >' . $row['title'] . '</label>
			  </div>
			  </td>';
			break;

		case 'textarea':
			$form_control = ' <td><textarea id="idtextarea' . $id . '" name="' . $row['controlname'] . '" rows="3" 
				class="form-control">' . $value[$row['controlname']] . '</textarea></td>';
			break;


		case 'listkp':
			//tạo list danh sách khoa phòng
			$st1 = "SELECT * FROM " . TABLE . "_groupuser where status = 1 order by tenkhoa";
			//print $st1;
			$rows = $db->query($st1)->fetchAll();
			$form_control = '<td><select id="khoaphong"  name="' . $row['controlname'] . 'class="form-control" placeholder="Chọn Khoa/Phòng"
			title="" data-toggle="tooltip" data-original-title="Chọn Khoa/Phòng">
			<option value="" disabled selected>Chọn Khoa/Phòng</option>';


			foreach ($rows as $r) {
				//echo $value[$row['controlname']].'<br>';
				($value[$row['controlname']] == $r['tenkhoa']) ? $select = 'selected' : $select = '';
				$form_control .= '<option value="' . $r['tenkhoa'] . '"' . $select . '>' . $r['tenkhoa'] . '</option>';
			}
			$form_control .= '</select></td>';
			break;

		case 'check':
			($value[$row['controlname']] == $row['title']) ? $check = 'checked' : $check = '';
			$form_control = '<td>
		   
			<div class="form-check">
			<label class="form-check-label" for="idcheck' . $id . '">'
				. $row['title'] . '
			</label>
			<input class="form-check-input" type="checkbox" name="' . $row['controlname'] . '" id="idcheck' . $id . '" value="' . $row['title'] . '"  >
			
		  </div></td>';
			break;

		case 'checkg':

			$id_checkbut = "'" . 'idcheckbut' . $group['numv'] . "'";
			$ctrname = "'" . $row['controlname'] . "'";
			$form_control = '';
			$arr = $value[$row['controlname']];
			$arr = explode(';', $arr);

			if (in_array($row['title'], $arr)) {
				//echo $group['numv'].$group['question'].'-------'. $row['title'].'<br>';
				$form_control = '<td>                   
				<div class="form-check">
				<input  class="form-check-input" type="checkbox" onchange="change_checkbox(' . $ctrname . ',' . $id_checkbut . ')"
				 name="' . $row['controlname'] . $id . '" id="idcheck' . $id . '" value="' . $row['title'] . '" checked   >
				<label class="form-check-label" for="idcheck' . $id . '">'
					. $row['title'] . '
				</label>
			  </div></td>';
			} else {
				$form_control = ' <td>                   
				<div class="form-check">
				<input  class="form-check-input" type="checkbox" onchange="change_checkbox(' . $ctrname . ',' . $id_checkbut . ')"
				 name="' . $row['controlname'] . $id . '" id="idcheck' . $id . '" value="' . $row['title'] . '"    >
				<label class="form-check-label" for="idcheck' . $id . '">'
					. $row['title'] . '
				</label>
			  </div></td>';
			}

			break;

		case 'datetime':
			$form_control = '<td> 
		
			<div class="mb-3"> 
			<label class="form-label">' . $row['title'] . '</label>
				<input class="form-control" type="text" id="datetimepicker" name="' . $row['controlname'] . '" value="' . $value[$row['controlname']] . '"
				placeholder="Thời gian báo cáo" />
				</div></td>';
			break;

		case 'date':
			$form_control = '
			<div class="mb-3"> 
			<label class="form-label">' . $row['title'] . '</label>             
						
			<input class="form-control" type="text" name="' . $row['controlname'] . '" id="datepicker" placeholder="Chọn ngày sinh" />
			</div>';
			break;

		default:
			$form_control = '';
	}
	return $form_control;
}


//function tạo tự động dữ liệu từ control form theo tên cột 
function creat_st_table($st)
{
	global $db, $nv_Request;
	$rows = $db->query($st)->fetchAll();
	$tencot = "(";
	$values = "SET ";
	$data_insert = array();
	foreach ($rows as $row) {
		//dua vào mảng control
		//kiểm tra mảng checkg

		$post[$row['controlname']] = $nv_Request->get_title($row['controlname'], 'post');
		if ($row['type_control'] == 'checkg') {
			$post[$row['controlname']] = $nv_Request->get_title('checkbut' . $row['rows_numv'], 'post');
		}

		empty($post[$row['controlname']]) ?  $post[$row['controlname']] = NULL : '';
		empty($post[$row['controlname']]) ?  $data_insert[$row['controlname']] = NULL : $data_insert[$row['controlname']] = $post[$row['controlname']];


		//echo $row['controlname'] . '=' . $post[$row['controlname']] . '<br>';
		$tencot = $row['controlname'];
		empty($post[$row['controlname']]) ? '' : $values .= $tencot . '=' . "'" . $post[$row['controlname']] . "',";
	}
	//$tencot = rtrim($tencot, ',') . ")";
	$values = rtrim($values, ',');
	return ['tencot' => $tencot, 'values' => $values, 'data' => $data_insert];
}
