<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VIETNAM DIGITAL TRADING TECHNOLOGY  (contact@thuongmaiso.vn)
 * @Copyright (C) 2014 VIETNAM DIGITAL TRADING TECHNOLOGY . All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (! defined('NV_IS_MOD_CONTACT')) {
    die('Stop!!!');
}

/**
 * main_theme()
 *
 * @param mixed $array_content
 * @param mixed $array_department
 * @param mixed $base_url
 * @param mixed $checkss
 * @return
 */
function contact_main_theme($array_content, $array_department,$time_bookName, $doctorName,  $base_url, $checkss)
{
    global $lang_global,$module_file, $lang_module, $module_info, $alias_url;

    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('CHECKSS', $checkss);
    $xtpl->assign('CONTENT', $array_content);

   

    if (! empty($array_department)) {
        foreach ($array_department as $dep) {
            if (empty($alias_url) and $dep['act'] == 2)
            {
                // Không hiển thị các bộ phận theo cấu hình trong quản trị
                continue;
            }

            $xtpl->assign('DEP', $dep);

            if (! empty($dep['note'])) {
                $xtpl->parse('main.dep.note');
            }

      
        

            $xtpl->parse('main.dep');
        }
    }

    $form = contact_form_theme($array_content, $time_bookName, $doctorName, $base_url, $checkss);
    $xtpl->assign('FORM', $form);

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * contact_form_theme()
 *
 * @param mixed $array_content
 * @param mixed $catsName
 * @param mixed $base_url
 * @param mixed $checkss
 * @return
 */
function contact_form_theme($array_content, $time_bookName, $doctorName, $base_url, $checkss)
{
    global $lang_global, $lang_module,$module_file, $module_info, $global_config;

    $xtpl = new XTemplate('form.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' .$module_file);
    $xtpl->assign('CONTENT', $array_content);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('ACTION_FILE', $base_url);
    $xtpl->assign('CHECKSS', $checkss);

    if ($array_content['sendcopy']) {
        $xtpl->parse('main.sendcopy');
    }
    if (! empty($time_bookName)) {
        foreach ($time_bookName as $key => $time_book) {
            $xtpl->assign('SELECTVALUE', $key);
            $xtpl->assign('SELECTNAME', $time_book);
            $xtpl->parse('main.time_book.select_option_loop');
        }
        $xtpl->parse('main.time_book');
    } 
	
	if (! empty($doctorName)) {
        foreach ($doctorName as $key => $doctor) {
            $xtpl->assign('SELECTVALUE', $key);
            $xtpl->assign('SELECTNAME', $doctor);
            $xtpl->parse('main.doctor.select_option_loop');
        }
        $xtpl->parse('main.doctor');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * contact_sendcontact()
 *
 * @param mixed $row_id
 * @param mixed $fcat
 * @param mixed $ftitle
 * @param mixed $fname
 * @param mixed $femail
 * @param mixed $fphone
 * @param mixed $fcon
 * @param mixed $fpart
 * @param bool $sendinfo
 * @return
 */
function contact_sendcontact($row_id, $fcat, $ftitle, $fname, $femail, $fphone, $fcon, $fpart, $sendinfo = true)
{
    global $global_config, $lang_module, $module_info, $array_department,$module_file, $client_info;

    $xtpl = new XTemplate('sendcontact.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' .$module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('SITE_NAME', $global_config['site_name']);
    $xtpl->assign('SITE_URL', $global_config['site_url']);
    $xtpl->assign('FULLNAME', $fname);
    $xtpl->assign('EMAIL', $femail);
	$xtpl->assign('PART', $array_department[$fpart]['full_name']);
    $xtpl->assign('IP', $client_info['ip']);
    $xtpl->assign('TITLE', $ftitle);
    $xtpl->assign('CONTENT', nv_htmlspecialchars($fcon));

	if ($sendinfo) {
		if (!empty($fcat)) {
			$xtpl->assign('CAT', $fcat);
			$xtpl->parse('main.sendinfo.cat');
		}

		if (!empty($fphone)) {
			$xtpl->assign('PHONE', $fphone);
			$xtpl->parse('main.sendinfo.phone');
		}
		$xtpl->parse('main.sendinfo');
	}

    $xtpl->parse('main');
    return $xtpl->text('main');
}