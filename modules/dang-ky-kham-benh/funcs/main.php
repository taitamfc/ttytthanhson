<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)
 * @Copyright (C) 2014 VIETNAM DIGITAL TRADING TECHNOLOGY . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (!defined('NV_IS_MOD_CONTACT')) {
    die('Stop!!!');
}

//Danh sach cac bo phan
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_department WHERE act>0 ORDER BY weight';
$array_department = $nv_Cache->db($sql, 'id', $module_name);

$alias_url = isset($array_op[0]) ? $array_op[0] : '';
$alias_department = '';

$time_book = array();
$time_book[] = array(0, '');
$time_bookName = array();
$time_bookName[] = $lang_module['selecttime'];



$doctor = array();
$doctor[] = array(0, '');
$doctorName = array();
$doctorName[] = $lang_module['selectdoctor'];

$dpDefault = 0;
if (!empty($array_department)) {
    foreach ($array_department as $k => $department) {
        if ($department['alias'] == $alias_url) {
            $alias_department = $department['alias'];
            $dpDefault = $department['id'];
            $array_department = array($department['id'] => $department);
           
		   $time_book = array();
            $time_bookName = array_map('trim', explode('|', $department['time_book']));
            foreach ($time_bookName as $_time_book2) {
                $time_book[] = array($department['id'], $_time_book2);
            }
            break;
			
			
			
			$doctor = array();
            $doctorName = array_map('trim', explode('|', $department['doctor']));
            foreach ($time_bookName as $_doctor2) {
                $doctor[] = array($department['id'], $_doctor2);
            }
            break;
			
			
        }

        if (!empty($department['time_book'])) {
            $_time_book = array_map('trim', explode('|', $department['time_book']));
            foreach ($_time_book as $_time_book2) {
                $time_book[] = array($department['id'], $_time_book2);
                $time_bookName[] = in_array($_time_book2, $time_bookName) ? $_time_book2 . ', ' . $department['full_name'] : $_time_book2;
            }
        } 
		
		if (!empty($department['doctor'])) {
            $_doctor = array_map('trim', explode('|', $department['doctor']));
            foreach ($_doctor as $_doctor2) {
                $doctor[] = array($department['id'], $_doctor2);
                $doctorName[] = in_array($_doctor2, $doctorName) ? $_doctor2 . ', ' . $department['full_name'] : $_doctor2;
            }
        }

        if ($department['is_default']) {
            $dpDefault = $department['id'];
        }
    }
}

if (empty($dpDefault) and !empty($array_department)) {
    $key_department = array_keys($array_department);
    $dpDefault = $key_department[0];
}

$fname = '';
$fdays = '';
$fbirthday = '';
$femail = '';
$fphone = '';
$faddress = '';
$sendcopy = true;
if (!defined('NV_IS_MODADMIN') and empty($module_config[$module_name]['sendcopymode']) and (!defined('NV_IS_USER') or $user_info['email_verification_time'] == 0 or $user_info['email_verification_time'] == -1)) {
    $sendcopy = false;
}



/**
 * Nhan thong tin va gui den admin
 */
if ($nv_Request->isset_request('checkss', 'post')) {
    $checkss = $nv_Request->get_title('checkss', 'post', '');
    if ($checkss != NV_CHECK_SESSION) {
        die();
    }

    /**
     * Ajax
     */
    if ($nv_Request->isset_request('loadForm', 'post')) {
        $array_content = array(
            'fname' => $fname,
			'fbirthday' => $fbirthday, 
			'fdays' => $fdays,
            'femail' => $femail,
            'fphone' => $fphone,
            'sendcopy' => $sendcopy,
            'bodytext' => ''
        );

        $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name;

        $form = contact_form_theme($array_content, $time_bookName,$specialistName, $doctorName, $base_url, NV_CHECK_SESSION);

        exit($form);
    }
	
	$fdays = $nv_Request->get_title('fdays', 'post', '');
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $fdays, $m)) {
        $phour = $nv_Request->get_int('phour', 'post', 0);
        $pmin = $nv_Request->get_int('pmin', 'post', 0);
        $fdays = mktime($phour, $pmin, 0, $m[2], $m[1], $m[3]);
    } else {
        $fdays = NV_CURRENTTIME;
    }
	
	
	$fbirthday = $nv_Request->get_title('fbirthday', 'post', '');
	if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $fbirthday, $m)) {
        $phour = $nv_Request->get_int('phour', 'post', 0);
        $pmin = $nv_Request->get_int('pmin', 'post', 0);
       $fbirthday = mktime($phour, $pmin, 0, $m[2], $m[1], $m[3]);
    } else {
       $fbirthday = NV_CURRENTTIME;
    }

	
	
	

	
	$fname = $nv_Request->get_title('fname', 'post', 0);
    $femail = $nv_Request->get_title('femail', 'post', 0);
	$fname = $nv_Request->get_title('fname', 'post', 0);
	$ftitle = $nv_Request->get_int('ftitle', 'post', 0);
   
	$ftime_book = $nv_Request->get_int('ftime_book', 'post', 0);
	if (isset($time_book[$ftime_book])) {
        $ftime_book = $time_book[$ftime_book][1];
    } 
	else {

        $ftime_book = $time_book[0][1];
    }
	
	
	
	$fdoctor = $nv_Request->get_int('fdoctor', 'post', 0);
	if (isset($doctor[$fdoctor])) {
        $fdoctor = $doctor[$fdoctor][1];
    } 
	else {

        $fdoctor = $doctor[0][1];
    }
	

    if ($fpart == 0) {
        $fpart = $dpDefault;
    
    }
	  if (empty($ftime_book)) {
        die(json_encode(array(
            'status' => 'error',
            'input' => 'ftime_book',
            'mess' => $lang_module['error_time_book'])));
    }
	
   if (($check_valid_email = nv_check_valid_email($femail)) != '') {
        die(json_encode(array(
            'status' => 'error',
            'input' => 'femail',
            'mess' => $check_valid_email )));
    }

	
	
		if (($fcon = $nv_Request->get_editor('fcon', '', NV_ALLOWED_HTML_TAGS)) == '') {
				 die(json_encode(array(
					'status' => 'error',
					'input' => 'fcon',
					'mess' => $lang_module['error_content'])));
			}
	
    $fcon = nv_nl2br($fcon);
    $fphone = nv_substr($nv_Request->get_title('fphone', 'post', '', 1), 0, 100);
    $faddress = nv_substr($nv_Request->get_title('faddress', 'post', '', 1), 0, 100);
    $fsendcopy = ((int)$nv_Request->get_bool('sendcopy', 'post') and $sendcopy);
    $sender_id = intval(defined('NV_IS_USER') ? $user_info['userid'] : 0);

    $sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_send
    (cid, time_book, doctor, title, content,days, send_time, sender_id, sender_name,sender_birthday, sender_email, sender_phone, sender_address, sender_ip, is_read, is_reply) VALUES
    (' . $fpart . ', :time_book,:doctor, :title, :content,:days, ' . NV_CURRENTTIME . ', ' . $sender_id . ', :sender_name,:sender_birthday, :sender_email, :sender_phone, :sender_address, :sender_ip, 0, 0)';
    $data_insert = array();
    $data_insert['time_book'] = $ftime_book;
	$data_insert['doctor'] = $fdoctor;
    $data_insert['title'] = 'Yêu cầu khám của bệnh nhân '.$fname.' vào lúc  '.$ftime_book.' ngày  '. nv_date('d/m/Y', $fdays) ;
    $data_insert['content'] = $fcon;
	$data_insert['days'] = $fdays;
    $data_insert['sender_name'] = $fname;
	$data_insert['sender_birthday'] = $fbirthday;
    $data_insert['sender_email'] = $femail;
    $data_insert['sender_phone'] = $fphone;
    $data_insert['sender_address'] = $faddress;
    $data_insert['sender_ip'] = $client_info['ip'];
    $row_id = $db->insert_id($sql, 'id', $data_insert);
    if ($row_id > 0) {
        $fcon_mail = contact_sendcontact($row_id, $ftime_book, $fdoctor, $ftitle, $fname,$fbirthday,$fdays, $femail, $fphone, $fcon, $fpart);

        $email_list = array();
        if (!empty($array_department[$fpart]['email'])) {
            $_emails = array_map('trim', explode(',', $array_department[$fpart]['email']));
            $email_list[] = $_emails[0];
        }

        if (!empty($array_department[$fpart]['admins'])) {
            $admins = array_filter(array_map('trim', explode(';', $array_department[$fpart]['admins'])));

            $a_l = array();
            foreach ($admins as $adm) {
                unset($adm2);
                if (preg_match('/^([0-9]+)\/[0-1]{1}\/[0-1]{1}\/1$/', $adm, $adm2)) {
                    $a_l[] = $adm2[1];
                }
            }

            if (!empty($a_l)) {
                $a_l = implode(',', $a_l);

                $sql = 'SELECT t2.email as admin_email FROM ' . NV_AUTHORS_GLOBALTABLE . ' t1 INNER JOIN ' . NV_USERS_GLOBALTABLE . ' t2 ON t1.admin_id = t2.userid WHERE t1.lev!=0 AND t1.is_suspend=0 AND t2.active=1 AND t1.admin_id IN (' . $a_l . ')';
                $result = $db_slave->query($sql);

                while ($row = $result->fetch()) {
                    if (nv_check_valid_email($row['admin_email']) == '') {
                        $email_list[] = $row['admin_email'];
                    }
                }
            }
        }

        if (!empty($email_list)) {
            $from = array($fname, $femail);
            $email_list = array_unique($email_list);
            @nv_sendmail($from, $email_list, $ftitle, $fcon_mail);
        }

        // Gửi bản sao đến hộp thư người gửi
        if ($fsendcopy) {
            $from = array($global_config['site_name'], $global_config['site_email']);
            $fcon_mail = contact_sendcontact($row_id, $ftime_book,$fdoctor, $ftitle, $fname, $fbirthday,$fdays, $fname, $femail, $fphone, $fcon, $fpart, false);
            @nv_sendmail($from, $femail, $ftitle, $fcon_mail);
        }

        
        nv_insert_notification($module_name, 'contact_new', array( 'title' => $ftitle ), $row_id, 0, $sender_id, 1);

        die(json_encode(array(
            'status' => 'ok',
            'input' => '',
            'mess' => $lang_module['sendcontactok'])));
    }

    die(json_encode(array(
        'status' => 'error',
        'input' => '',
        'mess' => $lang_module['sendcontactfailed'])));
}


$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];
$mod_title = isset($lang_module['main_title']) ? $lang_module['main_title'] : $module_info['custom_title'];

$full_theme = true;
$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name;
if (! empty($alias_department)) {
    $base_url .= '&amp;' . NV_OP_VARIABLE . '=' . $alias_department;
    if(isset($array_op[1]) and $array_op[1] == 0)
    {
        $base_url .= '/0';
        $full_theme = false;
    }
}

$base_url_rewrite = nv_url_rewrite($base_url, true);
if ($_SERVER['REQUEST_URI'] == $base_url_rewrite) {
    $canonicalUrl = NV_MAIN_DOMAIN . $base_url_rewrite;
} elseif (NV_MAIN_DOMAIN . $_SERVER['REQUEST_URI'] != $base_url_rewrite) {
    Header('Location: ' . $base_url_rewrite);
    die();
} else {
    $canonicalUrl = $base_url_rewrite;
}


$array_content = array(
    'fname' => $fname,
	'fdays' => $fdays,
	'fbirthday' => $fbirthday,
    'femail' => $femail,
    'fphone' => $fphone,
    'sendcopy' => $sendcopy
);

$contents = contact_main_theme($array_content, $array_department, $time_bookName, $doctorName, $base_url, NV_CHECK_SESSION);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents, $full_theme);
include NV_ROOTDIR . '/includes/footer.php';
