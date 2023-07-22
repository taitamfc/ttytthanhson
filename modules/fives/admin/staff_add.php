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

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['name_staff'] = $nv_Request->get_title('name_staff', 'post', '');
    $row['email'] = $nv_Request->get_title('email', 'post', '');
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('birthday', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['birthday'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['birthday'] = 0;
    }
    $row['phone'] = $nv_Request->get_title('phone', 'post', '');

    if (empty($row['name_staff'])) {
        $error[] = $lang_module['error_required_name_staff'];
    } elseif (empty($row['email'])) {
        $error[] = $lang_module['error_required_email'];
    } elseif (empty($row['birthday'])) {
        $error[] = $lang_module['error_required_birthday'];
    }
    $row['username'] = $nv_Request->get_title('username', 'post,get', '');
    $row['password1'] = $nv_Request->get_title('password1', 'post,get', '');
    $row['password2'] = $nv_Request->get_title('password2', 'post,get', '');
    $row['userid'] = $nv_Request->get_title('userid', 'post,get', 0);
    $row['position_id'] = $nv_Request->get_title('position_id', 'post,get', 0);
    $row['department_id'] = $nv_Request->get_title('department_id', 'post,get', 0);    
    if($row['id']==0){
        if (empty($row['password1'])) {
            $error[] = 'Vui lòng nhập mật khẩu';
        } elseif (empty($row['password2'])) {
            $error[] = 'Vui lòng nhập lại mật khẩu';
        }
        $md5username = nv_md5safe($row['username']);

        $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE md5username= :md5username');
        $stmt->bindParam(':md5username', $md5username, PDO::PARAM_STR);
        $stmt->execute();
        $query_error_username = $stmt->fetchColumn();
        if ($query_error_username) {
            $error[] = 'Tên đăng nhập đã tồn tại';
        }

        if($row['email']!=''){
            $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE email= :email');
            $stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
            $stmt->execute();
            $query_error_email = $stmt->fetchColumn();
            if ($query_error_email) {
                $error[] = 'Email đã tồn tại';
            }

            $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_reg WHERE email= :email');
            $stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
            $stmt->execute();
            $query_error_email_reg = $stmt->fetchColumn();
            if ($query_error_email_reg) {
                $error[] = 'Email đã tồn tại';
            }

            $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_openid WHERE email= :email');
            $stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
            $stmt->execute();
            $query_error_email_openid = $stmt->fetchColumn();
            if ($query_error_email_openid) {
                $error[] = 'Email đã tồn tại';
            }
        }
        if ($row['password1'] != $row['password2']) {
            $error[] = 'Mật khẩu không trùng khớp';
        }
    }else{
        if(!empty($row['password1'])){
            if (empty($row['password2'])) {
                $error[] = 'Vui lòng nhập lại mật khẩu';
            }else if ($row['password1'] != $row['password2']) {
                $error[] = 'Mật khẩu không trùng khớp';
            }
        }
        $md5username = nv_md5safe($row['username']);

        $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE md5username= :md5username and userid !='.$row['userid']);
        $stmt->bindParam(':md5username', $md5username, PDO::PARAM_STR);
        $stmt->execute();
        $query_error_username = $stmt->fetchColumn();
        if ($query_error_username) {
            $error[] = 'Tên đăng nhập đã tồn tại';
        }

        if($row['email']!=''){
            $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE email= :email and userid !='.$row['userid']);
            $stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
            $stmt->execute();
            $query_error_email = $stmt->fetchColumn();
            if ($query_error_email) {
                $error[] = 'Email đã tồn tại';
            }

            $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_reg WHERE email= :email and userid !='.$row['userid']);  
            $stmt->bindParam(':email', $row['email'], PDO::PARAM_STR); 
            $stmt->execute(); 
            $query_error_email_reg = $stmt->fetchColumn();
            if ($query_error_email_reg) {
                $error[] = 'Email đã tồn tại'; 
            }

            $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_openid WHERE email= :email and userid !='.$row['userid']);
            $stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
            $stmt->execute();
            $query_error_email_openid = $stmt->fetchColumn();
            if ($query_error_email_openid) {
                $error[] = 'Email đã tồn tại';
            }
        }
    }
    $row['id_next']=$db->query('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA  = "'.$db_config['dbsystem'].'" AND TABLE_NAME   = "' . NV_PREFIXLANG . '_' . $module_data . '_staff"')->fetchColumn();

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
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
            $row['staff_code'] = sprintf($config_setting['raw_staff'],$row['id_next']);

            $stmt = $db->prepare('INSERT INTO '.NV_PREFIXLANG.'_'.$module_name.'_staff (name_staff, email, birthday, phone, userid, time_add, user_add, status, weight,staff_code,position_id) VALUES (:name_staff, :email, :birthday, :phone, :userid, :time_add, :user_add, :status, :weight,:staff_code,:position_id)');

            $stmt->bindParam(':userid', $row['userid'], PDO::PARAM_INT);
            $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
            $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
            $stmt->bindValue(':status', 1, PDO::PARAM_INT);
            $stmt->bindValue(':staff_code', $row['staff_code'], PDO::PARAM_STR);
            $weight = $db->query('SELECT max(weight) FROM '.NV_PREFIXLANG.'_'.$module_name.'_staff')->fetchColumn();
            $weight = intval($weight) + 1;
            $stmt->bindParam(':weight', $weight, PDO::PARAM_INT);


        } else {
            if(!empty($row['password1'])){
                $db->query("UPDATE " . NV_USERS_GLOBALTABLE . "  SET first_name=".$db->quote($row['name_staff']).",password=".$db->quote( $crypt->hash_password($row['password1'], $global_config['hashprefix'])).",email=".$db->quote($row['email']).",birthday=".$row['birthday']." where userid=".$row['userid']);
            }else{
                $db->query("UPDATE " . NV_USERS_GLOBALTABLE . "  SET first_name=".$db->quote($row['name_staff']).",email=".$db->quote($row['email']).",birthday=".$row['birthday']." where userid=".$row['userid']);
            }
            $stmt = $db->prepare('UPDATE '.NV_PREFIXLANG.'_'.$module_name.'_staff SET name_staff = :name_staff, email = :email, birthday = :birthday, phone = :phone, time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].',position_id=:position_id WHERE id=' . $row['id']);
        }
        $stmt->bindParam(':name_staff', $row['name_staff'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $row['email'], PDO::PARAM_STR);
        $stmt->bindParam(':birthday', $row['birthday'], PDO::PARAM_INT);
        $stmt->bindParam(':phone', $row['phone'], PDO::PARAM_STR);
        $stmt->bindParam(':position_id', $row['position_id'], PDO::PARAM_STR);
        
        $exc = $stmt->execute();
        if ($exc) {
            $nv_Cache->delMod($module_name);
            if (empty($row['id'])) {
                $db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_name.'_department_staff (staff_id,department_id) VALUES ('.$row['id_next'].','.$row['department_id'].')');
                nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Staff', ' ', $admin_info['userid']);
            } else {
                nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Staff', 'ID: ' . $row['id'], $admin_info['userid']);
            }
            Header('Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=staff');
        }
    } catch(PDOException $e) {
        trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM '.NV_PREFIXLANG.'_'.$module_name.'_staff WHERE id=' . $row['id'])->fetch();
    $row['username']=get_info_user($row['userid'])['username'];
    if (empty($row)) {
        Header('Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=staff');
    }
} else {
    $row['id'] = 0;
    $row['name_staff'] = '';
    $row['email'] = '';
    $row['birthday'] = 0;
    $row['phone'] = '';
    $row['userid'] = 0;
    $row['position_id']=0;
}

if (empty($row['birthday'])) {
    $row['birthday'] = '';
}
else
{
    $row['birthday'] = date('d/m/Y',$row['birthday']);
}

$xtpl = new XTemplate('staff_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
$xtpl->assign('ROW', $row);
if($row['id']>0){
    $xtpl->assign('readonly', 'readonly');
    $xtpl->parse('main.edit'); 
}else{
    $xtpl->assign('readonly', '');
    $xtpl->parse('main.no_edit');
    $xtpl->parse('main.insert_department');
}
foreach ($position as $key => $value) {
    $xtpl->assign('key', $key);
    $xtpl->assign('title', $value);
    if($key==$row['position_id']){
        $xtpl->assign('selected', 'selected');
    }else{
        $xtpl->assign('selected', '');
    }
    $xtpl->parse('main.position');
}
if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');
if($row['id']==0){
    $page_title = $lang_module['staff_add'];
}else{
    $page_title = $lang_module['staff_edit'];
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
