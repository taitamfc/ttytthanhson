<?php

/**
 * TMS cms Management System
 * @version 4.x
 * @author Tập Đoàn TMS Holdings <contact@tms.vn>
 * @copyright (C) 2009-2022 Tập Đoàn TMS Holdings. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://tms.vn
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');
$error=array();
$success=array();
$mod = $nv_Request->get_string( 'mod', 'get,post', '' );
if($mod == 'download')
{
    $file_name = $nv_Request->get_string( 'file_name', 'get', '' );

    $file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
    
    if( file_exists( $file_path ) )
    {
        header( 'Content-Description: File Transfer' );
        header( 'Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
        header( 'Content-Disposition: attachment; filename=' . $file_name );
        header( 'Content-Transfer-Encoding: binary' );
        header( 'Expires: 0' );
        header( 'Cache-Control: must-revalidate' );
        header( 'Pragma: public' );
        header( 'Content-Length: ' . filesize( $file_path ) );
        readfile( $file_path );
        // ob_clean();
        flush();
        nv_deletefile( $file_path );
        
        exit();
    }else
    {
        die('File not exists !');
    }
}
if($mod=='is_download'){
    $page_title = 'DANH SÁCH NHÂN SỰ';
    $Excel_Cell_Begin = 1; 
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/danhsachnhansu.xlsx');
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->setTitle( $page_title );
    $worksheet->getPageSetup()->setOrientation( phpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE );
    $worksheet->getPageSetup()->setPaperSize( phpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4 );
    $worksheet->getPageSetup()->setHorizontalCentered( true );
    $spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd( 1, $Excel_Cell_Begin );
    $pRow = $Excel_Cell_Begin;
    $dataContent = array();
    $where = '';
    $q = $nv_Request->get_title( 'q', 'post,get' );
    $sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
    $ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
    $ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
    $status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );
    if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m ) )
    {
        $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 0 );
        $_min = $nv_Request->get_int( 'add_date_min', 'post', 0 );
        $ngay_tu = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
    } else {
        $ngay_tu = 0;
    }

    if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m ) )
    {
        $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 23 );
        $_min = $nv_Request->get_int( 'add_date_min', 'post', 59 );
        $ngay_den = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
    } else {
        $ngay_den = 0;
    }

    if ( $sea_flast != 9 ) {
        if ( $ngay_tu > 0 and $ngay_den > 0 )
        {
            $where .= ' AND time_add >= '. $ngay_tu . ' AND time_add <= '. $ngay_den;
        } else if ( $ngay_tu > 0 )
        {
            $where .= ' AND time_add >= '. $ngay_tu;
        } else if ( $ngay_den > 0 )
        {
            $where .= ' AND time_add <= '. $ngay_den;
        }

    }
    if ( $status_ft>-1 ) {
        $where .= ' AND status ='.$status_ft;
    }
    if ( !empty( $q ) ) {
        $where .= ' AND (name_user LIKE "%" "'.$q. '" "%")';
    }

    $db->sqlreset()
    ->select('COUNT(*)')
    ->from('' . NV_PREFIXLANG . '_' . $module_data . '_staff')
    ->where('1=1'.$where);

    $sth = $db->prepare($db->sql());

    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
    ->order('weight ASC');
    $sth = $db->prepare($db->sql());

    $sth->execute();
    while ($view = $sth->fetch()) {

        if($view['position_id']==1){$view['position_id']='Trưởng phòng';}
        else{$view['position_id']='Nhân viên';}

        $stt=$stt+1;
        $data_array['stt']=$stt;
        $data_array['staff_code']=$view['staff_code'];
        $data_array['name_staff']=$view['name_staff'];
        $data_array['position_id']=$view['position_id'];
        $data_array['username']=get_info_user($view['userid'])['username'];
        $check=$crypt->validate_password($view['name_staff'], get_info_user($view['userid'])['password']);
        if($check){
            $data_array['password']=$view['name_staff'];
        }else{
            $data_array['password']='Mật khẩu đã được đổi';
        }
        $dataContent[]=$data_array;
    }
    if(count($dataContent)>0){
        $worksheet->fromArray($dataContent, null, 'A2');
        $file_name = 'danh_sach_nhan_su.xlsx';
        $file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
        header( 'Content-Type: application/vnd.ms-excel' );
        header( 'Content-Disposition: attachment;filename="'. $file_name .'"' );
        header( 'Cache-Control: max-age=0' );
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($file_path);
        $link = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '='.$op.'&mod=download&file_name=' . $file_name;  
        nv_jsonOutput( array('link'=> $link) );     
    }else{
        nv_jsonOutput( array('error'=> 'Không tồn tại nhân sự vào thời gian bạn chọn') );     
    }
}

if ($nv_Request->isset_request('import_excel', 'post,get')) {
    $temp = explode(".", $_FILES["excel"]["name"]);
    $extension = end($temp);
    $allowedExts = array("xlsx");

    if (($_FILES["excel"]["size"] < 200000000000) && in_array($extension, $allowedExts)) {
        if ($_FILES["excel"]["error"] > 0)
            echo "Return Code: " . $_FILES["excel"]["error"] . "<br>";
        else{
            // ki?m tra forder user dã t?n t?i chua
            $filename = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/staff';

            if  (!file_exists($filename)) {
                mkdir(NV_UPLOADS_DIR . '/' . $module_upload .  '/staff', 0777);
            } 


            if (file_exists($filename . '/' . $_FILES["excel"]["name"]))
                unlink($filename .'/'. $_FILES["excel"]["name"]);

            move_uploaded_file($_FILES["excel"]["tmp_name"],$filename .'/'. $_FILES["excel"]["name"]); 
            $file = $filename .'/'. $_FILES["excel"]["name"]; // file du
            require_once NV_ROOTDIR . '/modules/'. $module_file .'/Classes/PHPExcel.php';
            $objFile = PHPExcel_IOFactory::identify($file);
            $objData = PHPExcel_IOFactory::createReader($objFile);
            $objData->setReadDataOnly(true);
            $objPHPExcel = $objData->load($file);
            $sheet  = $objPHPExcel->setActiveSheetIndex(0);
            $Totalrow = $sheet->getHighestRow();
            $LastColumn = $sheet->getHighestColumn();
            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
            $data = [];
            
            for ($i = 2; $i <= $Totalrow; $i++)
            {
                $name_staff=$sheet->getCellByColumnAndRow(0, $i)->getValue();
                $phone=$sheet->getCellByColumnAndRow(1, $i)->getValue();
                $department_id=$sheet->getCellByColumnAndRow(2, $i)->getValue();
                $check=$db->query('SELECT count(*) FROM '.NV_PREFIXLANG.'_'.$module_name.'_department where id='.$department_id)->fetchColumn();
                if($check>0){
                    $row['name_staff'] = $name_staff;
                   
                    $row['birthday'] = 0;
                    $row['phone'] = $phone;
                    $row['id_next']=$db->query('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA  = "'.$db_config['dbsystem'].'" AND TABLE_NAME   = "' . NV_PREFIXLANG . '_' . $module_data . '_staff"')->fetchColumn();
                    $row['staff_code'] = sprintf($config_setting['raw_staff'],$row['id_next']);

                    $row['username'] = $row['staff_code'];
                    $row['email'] = $row['staff_code'].'@gmail.com';
                    $row['password1'] = $row['staff_code'];
                    $row['position_id'] = 0;
                    $row['department_id'] = $department_id;
                    $md5username = nv_md5safe($row['username']);

                    $sql = "INSERT INTO " . NV_USERS_GLOBALTABLE . " (
                    group_id, username, md5username, password, email, first_name, last_name, gender, birthday, sig, regdate,
                    question, answer, passlostkey, view_mail,
                    remember, in_groups, active, checknum, last_login, last_ip, last_agent, last_openid, idsite, email_verification_time,
                    active_obj
                    ) VALUES (
                    0,
                    :username,
                    :md5_username,
                    :password,
                    :email,
                    :first_name,
                    :last_name,
                    :gender,
                    :birthday,
                    :sig,
                    " . NV_CURRENTTIME . ",
                    :question,
                    :answer,
                    '',
                    0,
                    1,
                    '', 1, '', 0, '', '', '', " . $global_config['idsite'] . ",
                    " . ($_user['is_email_verified'] ? '-1' : '0') . ",
                    'SYSTEM'
                )";

                $data_insert = [];
                $data_insert['username'] = $row['username'];
                $data_insert['md5_username'] = $md5username;
                $data_insert['password'] = $crypt->hash_password($row['password1'], $global_config['hashprefix']);
                $data_insert['email'] = $row['email'];
                $data_insert['first_name'] = $row['name_staff'];
                $data_insert['last_name'] = "";
                $data_insert['gender'] = '';
                $data_insert['birthday']=$row['birthday'];
                $data_insert['sig'] = "";
                $data_insert['question'] = "";
                $data_insert['answer'] = "";
                $row['userid'] = $db->insert_id($sql, 'userid', $data_insert);
                $row['time_add'] = NV_CURRENTTIME;
                $row['user_add'] = $admin_info['userid'];
                $stmt = $db->prepare('INSERT INTO '.NV_PREFIXLANG.'_'.$module_name.'_staff (name_staff, email, birthday, phone, userid, time_add, user_add, status, weight,staff_code,position_id) VALUES (:name_staff, :email, :birthday, :phone, :userid, :time_add, :user_add, :status, :weight,:staff_code,:position_id)');

                $stmt->bindParam(':userid', $row['userid'], PDO::PARAM_INT);
                $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
                $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
                $stmt->bindValue(':status', 1, PDO::PARAM_INT);
                $stmt->bindValue(':staff_code', $row['staff_code'], PDO::PARAM_STR);
                $weight = $db->query('SELECT max(weight) FROM '.NV_PREFIXLANG.'_'.$module_name.'_staff')->fetchColumn();
                $weight = intval($weight) + 1;
                $stmt->bindParam(':weight', $weight, PDO::PARAM_INT);
                $stmt->bindParam(':name_staff', $row['name_staff'], PDO::PARAM_STR);
                $stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
                $stmt->bindParam(':birthday', $row['birthday'], PDO::PARAM_INT);
                $stmt->bindParam(':phone', $row['phone'], PDO::PARAM_STR);
                $stmt->bindParam(':position_id', $row['position_id'], PDO::PARAM_STR);

                $exc = $stmt->execute();
                $db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_name.'_department_staff (staff_id,department_id) VALUES ('.$row['id_next'].','.$row['department_id'].')');

                $success[]='Thêm thành công dữ liệu dòng '.$i.' trong file excel';
            }else{
                $error[] = 'Vui lòng kiểm tra lại id phòng ban (thuộc dòng '.$i.' trong file excel). ID này không tồn tại';
            }
        }
    }
}
}



// Change status
if ($nv_Request->isset_request('change_status', 'post, get')) {
    $id = $nv_Request->get_int('id', 'post, get', 0);
    $content = 'NO_' . $id;

    $query = 'SELECT status FROM '.NV_PREFIXLANG.'_'.$module_name.'_staff WHERE id=' . $id;
    $row = $db->query($query)->fetch();
    if (isset($row['status']))     {
        $status = ($row['status']) ? 0 : 1;
        $query = 'UPDATE '.NV_PREFIXLANG.'_'.$module_name.'_staff SET status=' . intval($status) . ' WHERE id=' . $id;
        $userid = $db->query('SELECT userid FROM '.NV_PREFIXLANG.'_'.$module_name.'_staff where id='.$id)->fetchColumn();
        $db->query('UPDATE '.NV_TABLE_USER.' SET active='.$status.' where userid='.$userid);
        $db->query($query);
        $content = 'OK_' . $id;
    }
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
}

if ($nv_Request->isset_request('ajax_action', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_vid = $nv_Request->get_int('new_vid', 'post', 0);
    $content = 'NO_' . $id;
    if ($new_vid > 0)     {
        $sql = 'SELECT id FROM '.NV_PREFIXLANG.'_'.$module_name.'_staff WHERE id!=' . $id . ' ORDER BY weight ASC';
        $result = $db->query($sql);
        $weight = 0;
        while ($row = $result->fetch())
        {
            ++$weight;
            if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE '.NV_PREFIXLANG.'_'.$module_name.'_staff SET weight=' . $weight . ' WHERE id=' . $row['id'];
            $db->query($sql);
        }
        $sql = 'UPDATE '.NV_PREFIXLANG.'_'.$module_name.'_staff SET weight=' . $new_vid . ' WHERE id=' . $id;
        $db->query($sql);
        $content = 'OK_' . $id;
    }
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
}

if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $weight=0;
        $sql = 'SELECT weight FROM '.NV_PREFIXLANG.'_'.$module_name.'_staff WHERE id =' . $db->quote($id);
        $result = $db->query($sql);
        list($weight) = $result->fetch(3);
        
        $db->query('DELETE FROM ' . NV_USERS_GLOBALTABLE . '_groups_users WHERE userid=' . $db->quote($id));
        $db->query('DELETE FROM ' . NV_USERS_GLOBALTABLE . '_openid WHERE userid=' . $db->quote($id));
        $db->query('DELETE FROM ' . NV_USERS_GLOBALTABLE . '_info WHERE userid=' . $db->quote($id));
        $db->query('DELETE FROM ' . NV_USERS_GLOBALTABLE . ' WHERE userid=' . $db->quote($id));  

        $db->query('DELETE FROM '.NV_PREFIXLANG.'_'.$module_name.'_staff  WHERE id = ' . $db->quote($id));
        if ($weight > 0)         {
            $sql = 'SELECT id, weight FROM '.NV_PREFIXLANG.'_'.$module_name.'_staff WHERE weight >' . $weight;
            $result = $db->query($sql);
            while (list($id, $weight) = $result->fetch(3))
            {
                $weight--;
                $db->query('UPDATE '.NV_PREFIXLANG.'_'.$module_name.'_staff SET weight=' . $weight . ' WHERE id=' . intval($id));
            }
        }

        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Staff', 'ID: ' . $id, $admin_info['userid']);
        Header('Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}
$where='';
$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
$q = $nv_Request->get_title( 'q', 'post,get' );
$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
$status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );
$position_ft = $nv_Request->get_title( 'position_id', 'post,get', -1 );
$department_id = $nv_Request->get_title( 'department_id', 'post,get', 0 );

if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m ) )
{
    $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 0 );
    $_min = $nv_Request->get_int( 'add_date_min', 'post', 0 );
    $ngay_tu = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
} else {
    $ngay_tu = 0;
}

if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m ) )
{
    $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 23 );
    $_min = $nv_Request->get_int( 'add_date_min', 'post', 59 );
    $ngay_den = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
} else {
    $ngay_den = 0;
}

if ( $sea_flast != 9 ) {
    if ( $ngay_tu > 0 and $ngay_den > 0 )
    {

        $where .= ' AND t1.time_add >= '. $ngay_tu . ' AND t1.time_add <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_tu > 0 )
    {
        $where .= ' AND t1.time_add >= '. $ngay_tu;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_den > 0 )
    {
        $where .= ' AND t1.time_add <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    }

}
if($department_id>0){
 $where .= ' AND id IN (SELECT staff_id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_department_staff  where department_id='.$department_id.')';
}

if ( !empty( $q ) ) {
    $where .= ' AND (t1.name_staff LIKE "%" "'.$q. '" "%" OR t1.phone LIKE "%" "'.$q. '" "%" OR t1.email LIKE "%" "'.$q. '" "%")';
    $base_url .= '&q=' . $q;
}
if ( $status_ft>-1 ) {
    $where .= ' AND t1.status ='.$status_ft;
    $base_url .= '&status_search=' . $status_ft;
}

if ( $position_ft>-1 ) {
    $where .= ' AND t1.position_id ='.$position_ft;
    $base_url .= '&position_id=' . $position_ft;
}

// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
    $show_view = true;
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
    ->select('COUNT(*)')
    ->from(''.NV_PREFIXLANG.'_'.$module_name.'_staff t1')
    ->join('INNER JOIN ' .NV_USERS_GLOBALTABLE.' t2 ON t1.userid=t2.userid')
    ->where('1=1'.$where);


    $sth = $db->prepare($db->sql());

    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('t1.*')
    ->order('t1.weight ASC')
    ->limit($per_page)
    ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    $sth->execute();
}

$xtpl = new XTemplate('staff.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('Q', $q);
$xtpl->assign('department_id', $department_id);
$xtpl->assign('staff_add',  NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=staff_add');
if ( $ngay_tu > 0 )
    $xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
if ( $ngay_den > 0 )
    $xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );
if($department_id>0){
    $xtpl->assign('department_name', get_info_department($department_id)['name_department']);
}else{
    $xtpl->assign('department_name', 'Chọn tất cả');
}

if ($show_view) {
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.view.generate_page');
    }
    $number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
    $real_week = nv_get_week_from_time( NV_CURRENTTIME );
    $week = $real_week[0];
    $year = $real_week[1];
    $this_year = $real_week[1];
    $time_per_week = 86400 * 7;
    $time_start_year = mktime( 0, 0, 0, 1, 1, $year );
    $time_first_week = $time_start_year - ( 86400 * ( date( 'N', $time_start_year ) - 1 ) );

    $tuannay = array(
        'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week ),
        'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week + $time_per_week - 1 ),
    );
    $tuantruoc = array(
        'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week ),
        'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week + $time_per_week - 2 ),
    );
    $tuankia = array(
        'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week ),
        'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week + $time_per_week - 3 ),
    );

    $thangnay = array(
        'from' => date( 'd-m-Y', strtotime( 'first day of this month' ) ),
        'to' => date( 'd-m-Y', strtotime( 'last day of this month' ) ),
    );
    $thangtruoc = array(
        'from' => date( 'd-m-Y', strtotime( 'first day of last month' ) ),
        'to' => date( 'd-m-Y', strtotime( 'last day of last month' ) ),
    );
    $namnay = array(
        'from' => date( 'd-m-Y', strtotime( 'first day of january this year' ) ),
        'to' => date( 'd-m-Y', strtotime( 'last day of december this year' ) ),
    );
    $namtruoc = array(
        'from' => date( 'd-m-Y', strtotime( 'first day of january last year' ) ),
        'to' => date( 'd-m-Y', strtotime( 'last day of december last year' ) ),
    );
    $xtpl->assign( 'TUANNAY', $tuannay );

    $xtpl->assign( 'TUANTRUOC', $tuantruoc );

    $xtpl->assign( 'TUANKIA', $tuankia );

    $xtpl->assign( 'HOMNAY', date( 'd-m-Y', NV_CURRENTTIME ) );
    $xtpl->assign( 'HOMQUA', date( 'd-m-Y', strtotime( 'yesterday' ) ) );
    $xtpl->assign( 'THANGNAY', $thangnay );

    $xtpl->assign( 'THANGTRUOC', $thangtruoc );

    $xtpl->assign( 'NAMNAY', $namnay );

    $xtpl->assign( 'NAMTRUOC', $namtruoc );

    if ( $sea_flast == '1' ) {
        $xtpl->assign( 'SELECT1', 'selected="selected"' );
    }
    if ( $sea_flast == '2' ) {
        $xtpl->assign( 'SELECT2', 'selected="selected"' );
    }
    if ( $sea_flast == '3' ) {
        $xtpl->assign( 'SELECT3', 'selected="selected"' );
    }
    if ( $sea_flast == '4' ) {
        $xtpl->assign( 'SELECT4', 'selected="selected"' );
    }
    if ( $sea_flast == '5' ) {
        $xtpl->assign( 'SELECT5', 'selected="selected"' );
    }
    if ( $sea_flast == '6' ) {
        $xtpl->assign( 'SELECT6', 'selected="selected"' );
    }
    if ( $sea_flast == '7' ) {
        $xtpl->assign( 'SELECT7', 'selected="selected"' );
    }
    if ( $sea_flast == '8' ) {
        $xtpl->assign( 'SELECT8', 'selected="selected"' );
    }
    if ( $sea_flast == '9' ) {
        $xtpl->assign( 'SELECT9', 'selected="selected"' );
    }
    $status_filt = array();
    $status_filt[] = array( 'id'=>-1, 'text'=>'Tất cả trạng thái' );
    $status_filt[] = array( 'id'=>0, 'text'=>'Ngưng Hoạt động' );
    $status_filt[] = array( 'id'=>1, 'text'=>'Hoạt động' );   
    $position_id = array();
    $position_id[] = array( 'id'=>-1, 'text'=>'Tất cả' );
    $position_id[] = array( 'id'=>0, 'text'=>'Nhân viên' );
    $position_id[] = array( 'id'=>1, 'text'=>'Trưởng phòng' );

    foreach ( $status_filt as $filt_stt ) {
        if ( $filt_stt['id'] == $status_ft ) {
            $filt_stt['selected'] = 'selected';
        }
        $xtpl->assign( 'status_filt', $filt_stt );
        $xtpl->parse( 'main.view.status_filt' );
    }

    foreach ( $position_id as $position_id_stt ) {
        if ( $position_id_stt['id'] == $position_ft ) {
            $position_id_stt['selected'] = 'selected';
        }
        $xtpl->assign( 'position_id', $position_id_stt );
        $xtpl->parse( 'main.view.position_id' );
    }
    while ($view = $sth->fetch()) {
        for($i = 1; $i <= $num_items; ++$i) {
            $xtpl->assign('WEIGHT', array(
                'key' => $i,
                'title' => $i,
                'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
            $xtpl->parse('main.view.loop.weight_loop');
        }
        $xtpl->assign('CHECK', $view['status'] == 1 ? 'checked' : '');
        $view['birthday'] = (empty($view['birthday'])) ? '' : nv_date('d/m/Y', $view['birthday']);
        $view['user_add']=get_info_user($view['user_add'])['first_name'];
        $view['time_add']=date('d/m/Y H:i',$view['time_add']);

        if(empty($view['user_edit'])){
            $view['user_edit']='Chưa cập nhật';
            $view['time_edit']='Chưa cập nhật';
        }else{
            $view['user_edit']=get_info_user($view['user_edit'])['first_name'];
            $view['time_edit']=date('d/m/Y H:i',$view['time_edit']);
        }

        $list_department = $db->query('SELECT t2.* FROM ' . NV_PREFIXLANG . '_' . $module_data . '_department_staff t1 INNER JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_department t2 ON  t1.department_id=t2.id WHERE t1.staff_id=' . $view['id'].' OR t2.userid=' . $view['id'].'')->fetchAll();
        $view['name_department']='';
        foreach ($list_department as $key => $value) {
            if($view['name_department']==''){
                $view['name_department']=$value['name_department'];
            }else{
                $view['name_department']=$value['name_department'];
            }
        }


        $view['position']=$position[$view['position_id']];
        $view['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=staff_add&amp;id=' . $view['id'];
        $view['link_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.view.loop');
    }
    $xtpl->parse('main.view');
}


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}
if (!empty($success)) {
    $xtpl->assign('SUCCESS', implode('<br />', $success));
    $xtpl->parse('main.success');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['staff'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
