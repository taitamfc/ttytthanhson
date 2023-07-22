<?php

/**
 * TMS Content Management System
 * @version 4.x
 * @author Tập Đoàn TMS Holdings <contact@thuongmaiso.vn>
 * @copyright (C) 2009-2022 Tập Đoàn TMS Holdings. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://thuongmaiso.vn
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

// Change status
if ($nv_Request->isset_request('change_status', 'post, get')) {
    $id = $nv_Request->get_int('id', 'post, get', 0);
    $content = 'NO_' . $id;

    $query = 'SELECT status FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id=' . $id;
    $row = $db->query($query)->fetch();
    if (isset($row['status']))     {
        $status = ($row['status']) ? 0 : 1;
        $query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET status=' . intval($status) . ' WHERE id=' . $id;
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
        $sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id!=' . $id . ' ORDER BY weight ASC';
        $result = $db->query($sql);
        $weight = 0;
        while ($row = $result->fetch())
        {
            ++$weight;
            if ($weight == $new_vid) ++$weight;             $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET weight=' . $weight . ' WHERE id=' . $row['id'];
            $db->query($sql);
        }
        $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET weight=' . $new_vid . ' WHERE id=' . $id;
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
        $sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id =' . $db->quote($id);
        $result = $db->query($sql);
        list($weight) = $result->fetch(3);
        
        $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '  WHERE id = ' . $db->quote($id));
        if ($weight > 0)         {
            $sql = 'SELECT id, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE weight >' . $weight;
            $result = $db->query($sql);
            while (list($id, $weight) = $result->fetch(3))
            {
                $weight--;
                $db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET weight=' . $weight . ' WHERE id=' . intval($id));
            }
        }
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Vote', 'ID: ' . $id, $admin_info['userid']);
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['user_id'] = $nv_Request->get_int('user_id', 'post', 0);
    $row['staff_id'] = $nv_Request->get_int('staff_id', 'post', 0);
    $row['department_id'] = $nv_Request->get_int('department_id', 'post', 0);
    $row['tb_lanhdao'] = $nv_Request->get_int('tb_lanhdao', 'post', 0);
    $row['ct_lanhdao'] = $nv_Request->get_textarea('ct_lanhdao', '', NV_ALLOWED_HTML_TAGS);
    $row['tb_tochung'] = $nv_Request->get_int('tb_tochung', 'post', 0);
    $row['ct_tochuc'] = $nv_Request->get_textarea('ct_tochuc', '', NV_ALLOWED_HTML_TAGS);
    $row['tb_sangloc'] = $nv_Request->get_int('tb_sangloc', 'post', 0);
    $row['ct_sangloc'] = $nv_Request->get_textarea('ct_sangloc', '', NV_ALLOWED_HTML_TAGS);
    $row['tb_sapxep'] = $nv_Request->get_int('tb_sapxep', 'post', 0);
    $row['ct_sapxep'] = $nv_Request->get_textarea('ct_sapxep', '', NV_ALLOWED_HTML_TAGS);
    $row['tb_sachse'] = $nv_Request->get_int('tb_sachse', 'post', 0);
    $row['ct_sachse'] = $nv_Request->get_textarea('ct_sachse', '', NV_ALLOWED_HTML_TAGS);
    $row['tb_chamsoc'] = $nv_Request->get_int('tb_chamsoc', 'post', 0);
    $row['ct_chamsoc'] = $nv_Request->get_textarea('ct_chamsoc', '', NV_ALLOWED_HTML_TAGS);
    $row['tb_sansang'] = $nv_Request->get_int('tb_sansang', 'post', 0);
    $row['ct_sansang'] = $nv_Request->get_textarea('ct_sansang', '', NV_ALLOWED_HTML_TAGS);
    $row['tb_antoan'] = $nv_Request->get_int('tb_antoan', 'post', 0);
    $row['ct_antoan'] = $nv_Request->get_textarea('ct_antoan', '', NV_ALLOWED_HTML_TAGS);

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . ' (user_id, staff_id, department_id, tb_lanhdao, ct_lanhdao, tb_tochung, ct_tochuc, tb_sangloc, ct_sangloc, tb_sapxep, ct_sapxep, tb_sachse, ct_sachse, tb_chamsoc, ct_chamsoc, tb_sansang, ct_sansang, tb_antoan, ct_antoan, status, weight) VALUES (:user_id, :staff_id, :department_id, :tb_lanhdao, :ct_lanhdao, :tb_tochung, :ct_tochuc, :tb_sangloc, :ct_sangloc, :tb_sapxep, :ct_sapxep, :tb_sachse, :ct_sachse, :tb_chamsoc, :ct_chamsoc, :tb_sansang, :ct_sansang, :tb_antoan, :ct_antoan, :status, :weight)');

                $stmt->bindValue(':status', 1, PDO::PARAM_INT);

                $weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '')->fetchColumn();
                $weight = intval($weight) + 1;
                $stmt->bindParam(':weight', $weight, PDO::PARAM_INT);


            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET user_id = :user_id, staff_id = :staff_id, department_id = :department_id, tb_lanhdao = :tb_lanhdao, ct_lanhdao = :ct_lanhdao, tb_tochung = :tb_tochung, ct_tochuc = :ct_tochuc, tb_sangloc = :tb_sangloc, ct_sangloc = :ct_sangloc, tb_sapxep = :tb_sapxep, ct_sapxep = :ct_sapxep, tb_sachse = :tb_sachse, ct_sachse = :ct_sachse, tb_chamsoc = :tb_chamsoc, ct_chamsoc = :ct_chamsoc, tb_sansang = :tb_sansang, ct_sansang = :ct_sansang, tb_antoan = :tb_antoan, ct_antoan = :ct_antoan WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':user_id', $row['user_id'], PDO::PARAM_INT);
            $stmt->bindParam(':staff_id', $row['staff_id'], PDO::PARAM_INT);
            $stmt->bindParam(':department_id', $row['department_id'], PDO::PARAM_INT);
            $stmt->bindParam(':tb_lanhdao', $row['tb_lanhdao'], PDO::PARAM_INT);
            $stmt->bindParam(':ct_lanhdao', $row['ct_lanhdao'], PDO::PARAM_STR, strlen($row['ct_lanhdao']));
            $stmt->bindParam(':tb_tochung', $row['tb_tochung'], PDO::PARAM_INT);
            $stmt->bindParam(':ct_tochuc', $row['ct_tochuc'], PDO::PARAM_STR, strlen($row['ct_tochuc']));
            $stmt->bindParam(':tb_sangloc', $row['tb_sangloc'], PDO::PARAM_INT);
            $stmt->bindParam(':ct_sangloc', $row['ct_sangloc'], PDO::PARAM_STR, strlen($row['ct_sangloc']));
            $stmt->bindParam(':tb_sapxep', $row['tb_sapxep'], PDO::PARAM_INT);
            $stmt->bindParam(':ct_sapxep', $row['ct_sapxep'], PDO::PARAM_STR, strlen($row['ct_sapxep']));
            $stmt->bindParam(':tb_sachse', $row['tb_sachse'], PDO::PARAM_INT);
            $stmt->bindParam(':ct_sachse', $row['ct_sachse'], PDO::PARAM_STR, strlen($row['ct_sachse']));
            $stmt->bindParam(':tb_chamsoc', $row['tb_chamsoc'], PDO::PARAM_INT);
            $stmt->bindParam(':ct_chamsoc', $row['ct_chamsoc'], PDO::PARAM_STR, strlen($row['ct_chamsoc']));
            $stmt->bindParam(':tb_sansang', $row['tb_sansang'], PDO::PARAM_INT);
            $stmt->bindParam(':ct_sansang', $row['ct_sansang'], PDO::PARAM_STR, strlen($row['ct_sansang']));
            $stmt->bindParam(':tb_antoan', $row['tb_antoan'], PDO::PARAM_INT);
            $stmt->bindParam(':ct_antoan', $row['ct_antoan'], PDO::PARAM_STR, strlen($row['ct_antoan']));

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Vote', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Vote', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['user_id'] = 0;
    $row['staff_id'] = 0;
    $row['department_id'] = 0;
    $row['tb_lanhdao'] = 0;
    $row['ct_lanhdao'] = '';
    $row['tb_tochung'] = 0;
    $row['ct_tochuc'] = '';
    $row['tb_sangloc'] = 0;
    $row['ct_sangloc'] = '';
    $row['tb_sapxep'] = 0;
    $row['ct_sapxep'] = '';
    $row['tb_sachse'] = 0;
    $row['ct_sachse'] = '';
    $row['tb_chamsoc'] = 0;
    $row['ct_chamsoc'] = '';
    $row['tb_sansang'] = 0;
    $row['ct_sansang'] = '';
    $row['tb_antoan'] = 0;
    $row['ct_antoan'] = '';
}

$row['ct_lanhdao'] = nv_htmlspecialchars(nv_br2nl($row['ct_lanhdao']));
$row['ct_tochuc'] = nv_htmlspecialchars(nv_br2nl($row['ct_tochuc']));
$row['ct_sangloc'] = nv_htmlspecialchars(nv_br2nl($row['ct_sangloc']));
$row['ct_sapxep'] = nv_htmlspecialchars(nv_br2nl($row['ct_sapxep']));
$row['ct_sachse'] = nv_htmlspecialchars(nv_br2nl($row['ct_sachse']));
$row['ct_chamsoc'] = nv_htmlspecialchars(nv_br2nl($row['ct_chamsoc']));
$row['ct_sansang'] = nv_htmlspecialchars(nv_br2nl($row['ct_sansang']));
$row['ct_antoan'] = nv_htmlspecialchars(nv_br2nl($row['ct_antoan']));

$array_user_id_users = array();
$_sql = 'SELECT userid,username FROM tms_users';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_user_id_users[$_row['userid']] = $_row;
}

$array_staff_id_fives = array();
$_sql = 'SELECT id,name_staff FROM tms_vi_fives_staff';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_staff_id_fives[$_row['id']] = $_row;
}

$array_department_id_fives = array();
$_sql = 'SELECT id,name_department FROM tms_vi_fives_department';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_department_id_fives[$_row['id']] = $_row;
}


$q = $nv_Request->get_title('q', 'post,get');

// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
    $show_view = true;
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('COUNT(*)')
        ->from('' . NV_PREFIXLANG . '_' . $module_data . '');

    if (!empty($q)) {
        $db->where('user_id LIKE :q_user_id OR staff_id LIKE :q_staff_id OR department_id LIKE :q_department_id');
    }
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_user_id', '%' . $q . '%');
        $sth->bindValue(':q_staff_id', '%' . $q . '%');
        $sth->bindValue(':q_department_id', '%' . $q . '%');
    }
    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
        ->order('weight ASC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_user_id', '%' . $q . '%');
        $sth->bindValue(':q_staff_id', '%' . $q . '%');
        $sth->bindValue(':q_department_id', '%' . $q . '%');
    }
    $sth->execute();
}

$xtpl = new XTemplate('vote.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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

foreach ($array_user_id_users as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['userid'],
        'title' => $value['username'],
        'selected' => ($value['userid'] == $row['user_id']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_user_id');
}
foreach ($array_staff_id_fives as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['id'],
        'title' => $value['name_staff'],
        'selected' => ($value['id'] == $row['staff_id']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_staff_id');
}
foreach ($array_department_id_fives as $value) {
    $xtpl->assign('OPTION', array(
        'key' => $value['id'],
        'title' => $value['name_department'],
        'selected' => ($value['id'] == $row['department_id']) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.select_department_id');
}
$xtpl->assign('Q', $q);

if ($show_view) {
    $base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
    if (!empty($q)) {
        $base_url .= '&q=' . $q;
    }
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.view.generate_page');
    }
    $number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
    while ($view = $sth->fetch()) {
        for($i = 1; $i <= $num_items; ++$i) {
            $xtpl->assign('WEIGHT', array(
                'key' => $i,
                'title' => $i,
                'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''));
            $xtpl->parse('main.view.loop.weight_loop');
        }
        $xtpl->assign('CHECK', $view['status'] == 1 ? 'checked' : '');
        $view['user_id'] = $array_user_id_users[$view['user_id']]['username'];
        $view['staff_id'] = $array_staff_id_fives[$view['staff_id']]['name_staff'];
        $view['department_id'] = $array_department_id_fives[$view['department_id']]['name_department'];
        $view['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $view['id'];
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

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['vote'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
