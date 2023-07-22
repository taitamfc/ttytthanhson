<?php

/**
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
    nv_redirect_location($url);
    exit();
}
$thongke = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);
$xtpl->assign('THEME_URL', THEME_URL);
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);

/*Code for Here*/
//Exp:token=2022_2_bb26935443ad5edbefcffce347dd72f7
$token=$nv_Request->get_title('token', 'get,post', '');
$key=explode('_',$token);
if ($key[2]!=md5($client_info['session_id'] . $user_info['username'])) die('Stop!!!');
$year=$key[0]; $type=$key[1];

$st1 = "Select * FROM " . TABLE . "_report_" . $year ." WHERE id =" . $type;
$department = array();
$rows = $db->query($st1)->fetch();
$xtpl->assign('DATA', $rows );

$items = explode(";", $rows[0]['view_report']);
foreach ($items as $item) {
    $st2 = "Select * FROM " . TABLE . "_groupuser WHERE account = '$item'";
    $rs = $db->query($st2)->fetchAll();
    $department['name'] = $rs[0]['tenkhoa'];
    $department['account'] = $rs[0]['account'];

    if ($department['account'] == $get['acc']) {
        $department['selected'] = 'selected';
    } else $department['selected'] = '';


    $xtpl->assign('report', $department);
    $xtpl->parse('main.report');
}



		

	

$xtpl->parse('main');
$contents = $xtpl->text('main');


include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

//Function update evaluation details


function create_evaluation()
{
    global $db;
    $sql = "INSERT INTO " . TABLE . "_evaluation(id_report,count_evaluation, start_year, note)
    VALUES (NULL,:count_evaluation,:start_year,:note)";
    $data_insert = array();
    $data_insert['count_evaluation'] = 1;
    $data_insert['start_year'] = 2023;
    $data_insert['note'] = 'Khởi tạo dữ liệu năm 2023';
    // var_dump($data_insert);
    $result = ($db->insert_id($sql, 'id_report', $data_insert));
}
//Function update evaluation details
function update_question_details($id_question_details, $score)
{
    //khai bao bien db vao moi ham// luu y
    global $db;
    $count = $db->exec("UPDATE ".TABLE."_question_details SET score=$score WHERE id_question_details= $id_question_details");
    // print("update $count rows");
}
//PDO
// xóa tất cả các bảng theo điều kiện
function delete_tables($y)
{
    // Define the prefix of the tables you want to delete
    global $db;
    $pre = TABLE."_evaluation_" . $y;

    // Construct the SQL statement with a wildcard to match all tables with the prefix
    $sql = "DROP TABLE IF EXISTS " . $pre . "%";

    // Execute the SQL statement
    $count = $db->exec($sql);

    print("All tables with prefix " . $pre . " have been deleted successfully");
}
