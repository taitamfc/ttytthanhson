<?php

/**
 * @Project BCB SOLUTIONS
 * @Author Mr Duy <vuduy1502@gmail.com>
 * @Copyright (C) 2023 Mr Duy. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 19 Mar 2023 05:56:44 GMT
 */

if (!defined('NV_SYSTEM'))
    die('Stop!!!');

define('NV_IS_MOD_FIVES', true);


define('MODULE_LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_data);
define('TABLE', NV_PREFIXLANG . '_' . $module_data);
define('NV_STATIC_URL', NV_BASE_SITEURL);
define('THEME_URL', NV_BASE_SITEURL . 'themes/cpanel');
$page_title = $module_info['site_title'];

//require_once(NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php');


function userinfo($id)
{
	global $db,$module_data,$lang_module;
	$user=array();
	$sql="SELECT * from ".NV_USERS_GLOBALTABLE. " where userid =".$id." and active=1";
	$user=$db->query($sql)->fetch();
	if (!empty($user)){
		
		/*$sql= "(SELECT * FROM " . TABLE . "_groupuser where account like '".$user['username']."')";
		$ds = $db->query($sql)->fetch();
		//var_dump($ds['id_nhomquyen']);
		define('QUYEN_SD', $ds['id_nhomquyen']);		*/
		return $user;
		}
	return null; // trả lại giá trị không thực hiện được 
}

function check_quyen($user)
{
	global $db,$module_data,$lang_module;
	$sql= "SELECT * FROM " . TABLE . "_groupuser where account like '".$user['username']."'";
	print($sql);
	$ds = $db->query($sql)->fetch();
	if (!empty($ds))return $ds['id_nhomquyen'];
	return 0; // trả lại giá trị không thực hiện được 
}

/*
function nv_redirect_location($url) // Version cũ ko có hàm này
{
	 Header('Location: ' . nv_url_rewrite($url, true));
     exit();
}*/
function menuinfo($macv)
{
	global $db,$module_data,$lang_module;
	$list=array();
	$sql="SELECT * from ".$lang_module['tbl_menu'] . " where macv like '".$macv."' order by thutu";
	$list=$db->query($sql)->fetchAll();
	if (!empty($list))return $list;
	return null; // trả lại giá trị không thực hiện được 
}

function check_khoaphong($user)
{
	global $db,$module_data,$lang_module;
	$list=array();
	$sql="SELECT id from ".NV_PREFIXLANG . '_' . $module_data . "_khoaphong where account ='".$user."'";
	$list=$db->query($sql)->fetch();
	if (!empty($list))return $list['id'];
	return 0; // trả lại giá trị không thực hiện được 
}

function send_notification($ds)
{
	global $db,$module_data,$lang_module;
	$dsnhan=explode(';',$ds['nguoinhan']);
	$kq=0;
	foreach ($dsnhan as $item)
	{
		if (!empty($item))
		{
		$sql = "INSERT INTO ".TABLE. "_notification(id, code_pro, nguoigui, nguoinhan, tieude, id_yeucau, tg_gui, ngaynhan)
			value (NULL,:code_pro,:nguoigui,:nguoinhan,:tieude,:id_yeucau,:tg_gui,now())";
			$data_insert = array();
			$data_insert['code_pro'] = $ds['code_pro'];
			$data_insert['nguoigui'] = $ds['nguoigui'];
			$data_insert['nguoinhan'] = $item;
			$data_insert['tieude'] =$ds['tieude'];
			$data_insert['id_yeucau'] =$ds['id_yeucau'];
			$data_insert['tg_gui'] = intval(NV_CURRENTTIME);	
		 $kq +=($db->insert_id($sql, 'id', $data_insert)>0)?1:0;
		 }
	}
	return $kq; // trả lại giá trị không thực hiện được 
}

function menu_phanquyen($user='')
{
	global $db,$module_data,$lang_module;
	$listnm=array();
	
	$sql = "SELECT * FROM " . TABLE . "_groupmenu where id_nhom in";
	$sql .= "(SELECT id_nhomquyen FROM " . TABLE . "_groupuser where account like '".$user."')";
	$ds = $db->query($sql)->fetch();
	if (!empty($ds)){		
		$sql = 'SELECT * FROM ' . TABLE . '_menu WHERE status = 1 and mnid in ('.$ds['menu_truycap'].') ORDER BY stt asc';
		$listnm= $db->query($sql)->fetchAll();
		
		//while ($row = $list->fetch()) {}
	}

	return $listnm; // trả KQ 
}

/**
 * adminlink()
 *
 * @param mixed $id
 * @return
 */
function adminlink($id)
{
    global $lang_module, $module_name;
    $link = '<em class="fa fa-trash-o fa-lg">&nbsp;</em><a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=del_link&amp;id=' . $id . '">' . $lang_module['delete'] . '</a>&nbsp;&nbsp;';
    $link .= '<em class="fa fa-edit fa-lg">&nbsp;</em><a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=content&amp;id=' . $id . '">' . $lang_module['edit'] . '</a>';
    return $link;
}

//tạo câu lệnh tự động truy vấn vào các cột trong bảng
function create_st_table2($st){
	global $db, $nv_Request;
	
    $rows = $db->query($st)->fetchAll();
    $tencot = "(";
    $values = "VALUES(";
    $data_insert = array();
    foreach ($rows as $row) {
        //dua vào mảng control
        $post[$row['controlname']] = $nv_Request->get_title($row['controlname'], 'post,get');
        empty($post[$row['controlname']]) ?  $post[$row['controlname']] = NULL : '';
        empty($post[$row['controlname']]) ?  $data_insert[$row['controlname']] = NULL :
            $data_insert[$row['controlname']] = $post[$row['controlname']];
        //echo $row['controlname'] . '=' . $post[$row['controlname']] . '<br>';
        $tencot .= $row['controlname'] . ',';
        $values .= ':' . $row['controlname'] . ',';
    }
    $tencot = rtrim($tencot, ',') . ")";
    $values = rtrim($values, ',') . ")";
	return ['tencot'=>$tencot,'values'=>$values, 'data' => $data_insert];
}


function show_chart2()
{

    global $db, $nv_Request;
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_dskhoaphong') {
        $check = filter_chart2();

        $st = "Select kpbc,count(id) as value FROM " . TABLE . "_voted_result_a 
    " . $check . "
    group by kpbc order by value desc ";

        $rows = $db->query($st)->fetchALL();


        foreach ($rows as $r) {

            if ($r['kpbc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['kpbc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value']; //format(ROUND(total_score/50, 2),2)        
                $data[] = $item;
            }
        }
        nv_jsonOutput($data);

        //test xuất biến ra form
        //$xtpl->assign('link_test', $data);
    }
//----------------------------------------------------------------------------------------------------
    //Biểu đồ số 1b:
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_plnhomsuco') {
        global $xtpl;
        $check = filter_chart2();       
        $st = "SELECT
        SUM(CASE WHEN qtkt IS NOT NULL THEN 1  END) as 'Thực hiện quy trình kỹ thuật, thủ thuật chuyên môn' ,
        SUM(CASE WHEN nkbv IS NOT NULL THEN 1  END) AS 'Nhiễm khuẩn bệnh viện',
        SUM(CASE WHEN thuocdt IS NOT NULL THEN 1   END) AS 'Thuốc và dịch truyền' ,
        SUM(CASE WHEN maucp IS NOT NULL THEN 1   END) AS 'Máu và chế phẩm' ,
        SUM(CASE WHEN tbyt IS NOT NULL THEN 1  END) AS 'Trang thiết bị y tế' ,
        SUM(CASE WHEN hanhvi IS NOT NULL THEN 1  END) AS 'Hành vi',  
        SUM(CASE WHEN tenga IS NOT NULL THEN 1   END) AS 'Tai nạn đối với người bệnh' ,
        SUM(CASE WHEN hatangcs IS NOT NULL THEN 1   END) AS 'Hạ tầng cơ sở',   
        SUM(CASE WHEN nguonluctc IS NOT NULL THEN 1   END) AS 'Quản lý nguồn lực, tổ chức' ,
        SUM(CASE WHEN hosotl IS NOT NULL THEN 1   END) AS 'Hồ sơ tài liệu, thủ tục hành chính', 
        SUM(CASE WHEN sckdc IS NOT NULL THEN 1   END) AS 'Khác'         

        FROM  " . TABLE . "_voted_result_a
        " . $check . "


        ";

       
        // Execute the query
        $stmt = $db->query($st);

        // Fetch column names
        $columns = [];
        for ($i = 0; $i < $stmt->columnCount(); $i++) {
            $col = $stmt->getColumnMeta($i);         
            $columns[] = $col['name'];
        }

        // Fetch data
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display column names and data
        foreach ($columns as $column) {
            //echo "$column: " . $data[$column] . "<br>";

            if ($column !== null && $data[$column] !== NULL) {

            $item['label'] = ucfirst($column); //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
            $item['value'] = $data[$column];
            $data_chart[] = $item;
            }

        }
       
        nv_jsonOutput($data_chart);

        //test xuất biến ra link_testform
        //$xtpl->assign('TEST_DATA', $data);
    }
//----------------------------------------------------------------------------------------------------

     //Biểu đồ số 2b:
     if ($nv_Request->get_title('act', 'get,post', '') == 'get_plnguyenhan') {
        global $xtpl;
        $check = filter_chart2();       
        $st = "SELECT
        SUM(CASE WHEN nhanvien IS NOT NULL THEN 1  END) as 'Nhân viên' ,
        SUM(CASE WHEN nguoibenh IS NOT NULL THEN 1  END) AS 'Người bệnh',
        SUM(CASE WHEN moitruong IS NOT NULL THEN 1   END) AS 'Môi trường' ,
        SUM(CASE WHEN tochucdv IS NOT NULL THEN 1   END) AS 'Tổ chức dịch vụ' ,
        SUM(CASE WHEN tbyt IS NOT NULL THEN 1  END) AS 'Yếu tố bên ngoài' ,      
        SUM(CASE WHEN ytkdc IS NOT NULL THEN 1   END) AS 'Khác'         

        FROM  " . TABLE . "_voted_result_a
        " . $check . "


        ";

       
        // Execute the query
        $stmt = $db->query($st);

        // Fetch column names
        $columns = [];
        for ($i = 0; $i < $stmt->columnCount(); $i++) {
            $col = $stmt->getColumnMeta($i);         
            $columns[] = $col['name'];
        }

        // Fetch data
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display column names and data
        foreach ($columns as $column) {
            //echo "$column: " . $data[$column] . "<br>";

            if ($column !== null && $data[$column] !== NULL) {

            $item['label'] = ucfirst($column); //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
            $item['value'] = $data[$column];
            //$item['bieudo2b'] = 'bieudo2b';
            $data_chart[] = $item;
            }

        }
       
        nv_jsonOutput($data_chart);

        //test xuất biến ra link_testform
        //$xtpl->assign('TEST_DATA', $data);
    }

//----------------------------------------------------------------------------------------------------
    //Biểu đồ tỷ lệ xếp loại của khoa phòng - biẻu đồ 1
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_tlhtbcsuco') {
        $check = filter_chart2();


        $st = "Select htbc,count(id) as value FROM " . TABLE . "_voted_result_a             
    " . $check . "
    group by htbc";

        //echo($st);

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['htbc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['htbc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
    }
//----------------------------------------------------------------------------------------------------
    //bieu do 3

    if ($nv_Request->get_title('act', 'get,post', '') == 'get_tldoituong') {
        $check = filter_chart2();
        $st = "Select doituongsc,count(id) as value FROM " . TABLE . "_voted_result_a             
    " . $check . " 
    group by doituongsc";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['doituongsc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['doituongsc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
    }
//----------------------------------------------------------------------------------------------------

    //bieu do 4

    if ($nv_Request->get_title('act', 'get,post', '') == 'get_tldgbandau') {
        $check = filter_chart2();
        $st = "Select dgbd,count(id) as value FROM " . TABLE . "_voted_result_a             
    " . $check . " 
    group by dgbd";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['dgbd'] !== null && $r['value'] !== null) {

                $item['label'] = $r['dgbd']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
    }
//----------------------------------------------------------------------------------------------------
    //bieu do 5

    if ($nv_Request->get_title('act', 'get,post', '') == 'get_doituongbc') {
        $check = filter_chart2();
        $st = "Select doituongbc,count(id) as value FROM " . TABLE . "_voted_result_a             
    " . $check . " 
    group by doituongbc";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {
            if ($r['doituongbc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['doituongbc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                //$item['test'] = $r['value'];

                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
    }
//----------------------------------------------------------------------------------------------------

    //bieu do 3b

    if ($nv_Request->get_title('act', 'get,post', '') == 'get_mucdott_nb3b') {
        $check = filter_chart2();
    //     $st = "Select mucdott_bn,count(id) as value FROM " . TABLE . "_voted_result_a             
    // " . $check . " 
    // group by mucdott_bn";
    $st= "SELECT
    CASE
        WHEN mucdott_nb IN ('A') THEN 'Chưa xảy ra (NC0)'
        
        WHEN mucdott_nb IN ('B','C', 'D') THEN 'Tổn thương nhẹ (NC1)'

        WHEN mucdott_nb IN ('E', 'F') THEN 'Tổn thương trung bình (NC2)'

        WHEN mucdott_nb IN ('G', 'H', 'I') THEN 'Tổn thương nặng (NC3)'
       
        END AS labels,
        COUNT(id) AS vls
    FROM " . TABLE . "_voted_result_b 
    " . $check . " 
    GROUP BY labels
    HAVING labels IS NOT NULL";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['labels'] !== null && $r['vls'] !== null) {

                $item['label'] = $r['labels']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['vls'];
                //$item['bieudo6'] = $r['values'];
                //$item['st'] = $st;

                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
        //die;
    }
    //----------------------------------------------------------------------------------------------------

    //biểu đồ 4b
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_mucdott_tc4b') {
        $check = filter_chart2();
    //     $st = "Select mucdott_bn,count(id) as value FROM " . TABLE . "_voted_result_a             
    // " . $check . " 
    // group by mucdott_bn";
        $st = "SELECT mucdott_tc, count(id) as value FROM " . TABLE . "_voted_result_b
        " . $check . "
    group by mucdott_tc";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['mucdott_tc'] !== null && $r['value'] !== null) {

                $item['label'] = $r['mucdott_tc']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['value'];
                //$item['bieudo4b'] = $r['value'];
                //$item['st'] = $st;

                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
        //die;
    }

    //biểu đồ 6
    if ($nv_Request->get_title('act', 'get,post', '') == 'get_mucdott_nb') {
        $check = filter_chart2();
    //     $st = "Select mucdott_bn,count(id) as value FROM " . TABLE . "_voted_result_a             
    // " . $check . " 
    // group by mucdott_bn";
    //     $st = "SELECT mucdott_nb, count(id) as value FROM " . TABLE . "_voted_result_a 
    //     " . $check . "
    // group by mucdott_nb";
    $st= "SELECT
    CASE
        WHEN mucdott_nb IN ('A') THEN 'Chưa xảy ra (NC0)'
        
        WHEN mucdott_nb IN ('B','C', 'D') THEN 'Tổn thương nhẹ (NC1)'

        WHEN mucdott_nb IN ('E', 'F') THEN 'Tổn thương trung bình (NC2)'

        WHEN mucdott_nb IN ('G', 'H', 'I') THEN 'Tổn thương nặng (NC3)'
       
        END AS labels,
        COUNT(id) AS vls
    FROM " . TABLE . "_voted_result_a 
    " . $check . " 
    GROUP BY labels
    HAVING labels IS NOT NULL";

        $rows = $db->query($st)->fetchALL();
        foreach ($rows as $r) {

            if ($r['labels'] !== null && $r['vls'] !== null) {

                $item['label'] = $r['labels']; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
                $item['value'] = $r['vls'];
                //$item['bieudo6'] = $r['values'];
                //$item['st'] = $st;

                $data[] = $item;
            }
        }
        //var_dump($data);
        nv_jsonOutput($data);
        //die;
    }
}



function filter_chart2()
{
    global $nv_Request;
    $tg_tungay = $nv_Request->get_title('tungay', 'get,post', '');
    $datef = strtotime($tg_tungay);
    $fromdate = date("Y/m/d",  $datef);
    $tg_denngay = $nv_Request->get_title('denngay', 'get,post');
    $datet = strtotime($tg_denngay);
    $todate = date("Y/m/d",  $datet);
    if (empty($tg_tungay) && empty($tg_denngay))

        $check = "";
    else
        $check = "WHERE  status >0 AND DATE(thoigian) BETWEEN " . "'" . $fromdate . "'" . " and " . "'" . $todate . "' ";

    return  $check;
}