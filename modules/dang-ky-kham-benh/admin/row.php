<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES <contact@thuongmaiso.vn>
 * @Copyright 2014 VINADES. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Apr 22, 2010 3:00:20 PM
 */

if (! defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$id = $nv_Request->get_int('id', 'post,get', 0);

if ($id) {
    $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_department WHERE id=' . $id;
    $frow = $db->query($sql)->fetch();

    if (empty($frow)) {
        Header('Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=department');
        die();
    }

    $page_title = $frow['full_name'];
    $action = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $id;
} else {
    $page_title = $lang_module['add_row_title'];
    $action = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
}

$xtpl = new XTemplate('row.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);
$xtpl->assign('FORM_ACTION', $action);
$xtpl->assign('NV_ADMIN_THEME', $global_config['admin_theme']);
$xtpl->assign('PATH', NV_UPLOADS_DIR . '/' . $module_upload);

$sql = 'SELECT t1.admin_id, t1.lev as level, t1.is_suspend, t2.username, t2.email, t2.first_name, t2.last_name, t2.active
	FROM ' . NV_AUTHORS_GLOBALTABLE . ' t1
	INNER JOIN ' . NV_USERS_GLOBALTABLE . ' t2
	ON t1.admin_id = t2.userid
	WHERE t1.lev!=0';
$result = $db->query($sql);

$adms = array();
while ($row = $result->fetch()) {
    $row['is_suspend'] = ($row['is_suspend'] or empty($row['active'])) ? true : false;
    $adms[$row['admin_id']] = $row;
}

$error = '';

if (defined('NV_EDITOR')) {
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}

if ($nv_Request->get_int('save', 'post') == '1') {
    $full_name = $nv_Request->get_title('full_name', 'post', '', 1);
    $alias = $nv_Request->get_title('alias', 'post', '', 1);
    $time_book = $nv_Request->get_typed_array('time_book', 'post', '', '');
	
	$doctor = $nv_Request->get_typed_array('doctor', 'post', '', '');
    $note = $nv_Request->get_editor('note', '', NV_ALLOWED_HTML_TAGS);
    $view_level = $nv_Request->get_array('view_level', 'post', array());
    $reply_level = $nv_Request->get_array('reply_level', 'post', array());
    $obt_level = $nv_Request->get_array('obt_level', 'post', array());

    if (! empty($email)) {
        $_email = array_map('trim', explode(',', $email));
        $email = array();
        foreach ($_email as $e) {
            $check_valid_email = nv_check_valid_email($e);
            if (empty($check_valid_email)) {
                $email[] = $e;
            }
        }
        $email = implode(', ', $email);
    }

    $admins = array();

    if (! empty($view_level)) {
        foreach ($view_level as $admid) {
            $admins[$admid]['view_level'] = 1;
            $admins[$admid]['reply_level'] = 0;
            $admins[$admid]['obt_level'] = 0;
        }
    }

    if (! empty($reply_level)) {
        foreach ($reply_level as $admid) {
            $admins[$admid]['view_level'] = 1;
            $admins[$admid]['reply_level'] = 1;
            $admins[$admid]['obt_level'] = 0;
        }
    }

    if (! empty($obt_level)) {
        foreach ($obt_level as $admid) {
            $admins[$admid]['view_level'] = 1;
            if (! isset($admins[$admid]['reply_level'])) {
                $admins[$admid]['reply_level'] = 0;
            }
            $admins[$admid]['obt_level'] = 1;
        }
    }

    if (empty($full_name)) {
        $error = $lang_module['err_part_row_title'];
    } elseif (empty($alias)) {
        $error = $lang_module['error_alias'];
    } else {
        $alias = empty($alias) ? change_alias($full_name) : change_alias($alias);
        $admins_list = array();
        foreach ($adms as $admid => $values) {
            if ($values['level'] === 1) {
                $obt_level = (isset($admins[$admid])) ? $admins[$admid]['obt_level'] : 0;
                $admins_list[] = $admid . '/1/1/' . $obt_level;
            } else {
                if (isset($admins[$admid])) {
                    $admins_list[] = $admid . '/' . $admins[$admid]['view_level'] . '/' . $admins[$admid]['reply_level'] . '/' . $admins[$admid]['obt_level'];
                }
            }
        }
        $admins_list = implode(';', $admins_list);

       
        $_time_book = array_filter($time_book);
        $_time_book = array_unique($_time_book);
        $_time_book = ! empty($_time_book) ? implode('|', $_time_book) : ''; 
		
		

		$_doctor = array_filter($doctor);
        $_doctor = array_unique($_doctor);
        $_doctor = ! empty($_doctor) ? implode('|', $_doctor) : '';

        if ($id) {
            $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_department SET full_name=:full_name, alias=:alias, time_book=:time_book, doctor=:doctor, note=:note, admins=:admins WHERE id =' . $id;
            $name_key = 'log_edit_row';
            $note_action = 'id: ' . $id . ' ' . $full_name;
        } else {
            $weight = $db->query('SELECT MAX(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_department')->fetchColumn();
            $weight++;
            $sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_department (full_name, alias, time_book,doctor, note, admins, act, weight, is_default) VALUES (:full_name, :alias, :time_book,:doctor, :note, :admins, 1, :weight, 0)';
            $name_key = 'log_add_row';
            $note_action = $full_name;
        }

        try {
            $sth = $db->prepare($sql);
            $sth->bindParam(':full_name', $full_name, PDO::PARAM_STR);
            $sth->bindParam(':alias', $alias, PDO::PARAM_STR);
            $sth->bindParam(':time_book', $_time_book, PDO::PARAM_STR);
			$sth->bindParam(':doctor', $_doctor, PDO::PARAM_STR);
            $sth->bindParam(':note', $note, PDO::PARAM_STR);
            $sth->bindParam(':admins', $admins_list, PDO::PARAM_STR);
            if (! $id) {
                $sth->bindParam(':weight', $weight, PDO::PARAM_STR);
            }
            $sth->execute();
            if ($sth->rowCount()) {
                nv_insert_logs(NV_LANG_DATA, $module_name, $name_key, $note_action, $admin_info['userid']);
                $nv_Cache->delMod($module_name);
            }
           Header('Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=department');
            die();
        } catch (PDOException $e) {
            $error = $lang_module['duplicate_alias'];
            trigger_error($e->getMessage());
        }
    }
} else {
    if ($id) {
        $full_name = $frow['full_name'];
        $alias = $frow['alias'];
        $time_book = ! empty($frow['time_book']) ? explode('|', $frow['time_book']) : array();
		$doctor = ! empty($frow['doctor']) ? explode('|', $frow['doctor']) : array();
        $note = nv_editor_br2nl($frow['note']);

        $admins_list = $frow['admins'];
        $admins_list = ! empty($admins_list) ? array_map('trim', explode(';', $admins_list)) : array();

        $view_level = $reply_level = $obt_level = array();

        if (! empty($admins_list)) {
            foreach ($admins_list as $l) {
                if (preg_match('/^([0-9]+)\/([0-1]{1})\/([0-1]{1})\/([0-1]{1})$/i', $l)) {
                    $l2 = array_map('intval', explode('/', $l));
                    $admid = intval($l2[0]);

                    if (isset($adms[$admid])) {
                        if ($adms[$admid]['level'] === 1) {
                            $view_level[] = $admid;
                            $reply_level[] = $admid;

                            if (isset($l2[3]) and $l2[3] === 1) {
                                $obt_level[] = $admid;
                            }
                        } else {
                            if (isset($l2[1]) and $l2[1] === 1) {
                                $view_level[] = $admid;
                            }

                            if (isset($l2[2]) and $l2[2] === 1) {
                                $reply_level[] = $admid;
                            }

                            if (isset($l2[3]) and $l2[3] === 1) {
                                $obt_level[] = $admid;
                            }
                        }
                    }
                }
            }
        }
    } else {
        $full_name = $alias = '';
       $time_book =  $doctor = $view_level = $reply_level = $obt_level = array();

        foreach ($adms as $admid => $values) {
            if ($values['level'] === 1) {
                $view_level[] = $admid;
                $reply_level[] = $admid;
            }
        }
    }
}

if (! empty($note)) {
    $note = nv_htmlspecialchars($note);
}

if (empty($id)) {
    $xtpl->parse('main.get_alias');
}

if (! empty($error)) {
    $xtpl->assign('ERROR', $error);
    $xtpl->parse('main.error');
}

if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $note = nv_aleditor('note', '100%', '150px', $note);
} else {
    $note = '<textarea style="width:100%;height:150px" name="note" id="note">' . $note . '</textarea>';
}


$xtpl->assign('DATA', array(
    'full_name' => $full_name,
    'alias' => $alias,
    'note' => $note
));


if (! empty($time_book)) {
    foreach ($time_book as $val) {
        $xtpl->assign('TIME_BOOK', $val);
        $xtpl->parse('main.time_book');
    }
}


if (! empty($doctor)) {
    foreach ($doctor as $val) {
        $xtpl->assign('DOCTOR', $val);
        $xtpl->parse('main.doctor');
    }
}

// list danh sách bộ phận liên hệ
$a = 0;
foreach ($adms as $admid => $values) {
    $xtpl->assign('ADMIN', array(
        'suspend' => ($values['is_suspend']) ? 'class="warning" title="' . $lang_global['admin_suspend'] . '"' : '',
        'username' => $values['username'],
        'full_name' => nv_show_name_user($values['first_name'], $values['last_name'], $values['username']),
        'email' => $values['email'],
        'admid' => $admid,
        'img' => 'admin' . $values['level'],
        'level' => $lang_global['level' . $values['level']],
        'view_level' => ($values['level'] === 1 or (! empty($view_level) and in_array($admid, $view_level))) ? ' checked="checked"' : '',
        'reply_level' => ($values['level'] === 1 or (! empty($reply_level) and in_array($admid, $reply_level))) ? ' checked="checked"' : '',
        'obt_level' => (! empty($obt_level) and in_array($admid, $obt_level)) ? ' checked="checked"' : '',
        'disabled' => $values['level'] === 1 ? ' disabled="disabled"' : ''
    ));

    $xtpl->parse('main.admin');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
