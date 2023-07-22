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

/*Code for Here*/




$post = array();
$get = array();
$get['edit_id'] = $nv_Request->get_title('edit_id', 'get');
$get['id_del'] = $nv_Request->get_title('id_del', 'get');
// print('id_del='. $get['id_del']);
$arr = explode('_', $get['edit_id']);
$get['year'] = $arr[0];
// $get['account_input'] = $nv_Request->get_title('acc', 'get');
$id_report = $get['id_report'] = $arr[1];


// check idd báo cáo đã có
$get['idd'] = $nv_Request->get_title('idd', 'get');
$arr = explode('_', $get['idd']);
$get['acc'] = $arr[0];
$get['count_report'] =  $arr[1];

$xtpl->assign('type_button', 'None');
$xtpl->parse('main.type_button');

// Lấy các thông tin cài đặt trong bảng option
$st = "Select * FROM " . TABLE . "_option";
$rows_op = $db->query($st)->fetchAll();

// Kiem tra dư lieu trong 2 combox khoa phong va count
$update = False;
if (!empty($get['acc']) && !empty($get['count_report'])) {


    // Hiển thị nút Lưu khi đã chọn Khoa phòng (có thông tin khởi tạo hoặc thông tin đã lưu)
    $xtpl->assign('save_button', 'inline');
    // $xtpl->parse('main.type_button');

    // Lay dư lieu trong bang chi tiet bao cao
    $st1 = "Select * FROM " . TABLE . "_report_details_" . $get['year'] .
        " WHERE account_report ='" . $get['acc'] . "' AND count =" . $get['count_report'] . " AND status > 0";
    // print($st1);
    // lấy toàn bộ dữ liệu có trong bảng chi tiết
    $rows_update = $db->query($st1)->fetchAll();
    if ($rows_update) {
        $update = True;
        // Tạo thông tin nút cập nhật
        // Gán dữ liệu vào textbox action: để check update hay insert
        $xtpl->assign('action', 'update');
        // Gán dữ liệu vào textbox id_report: để lưu giá trị id report
        $xtpl->assign('id_rp_detail', $rows_update[0]['id']);

        // Gán link vào nút Xóa        
        if (!empty($rows_update[0]['id'])) {



            //    set thuộc tính hiện thị nút xóa trong form
            $xtpl->assign('link_del', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&edit_id=' . $get['year'] . '_' . $get['id_report'] . '&id_del=' . $rows_update[0]['id']);
            $xtpl->assign('type_button', 'inline');
            // $xtpl->parse('main.type_button');
            // Thực hiện xóa lần đánh giá, cập nhật trạng thái =0: ẩn dữ liệu


        } else {
            // Ẩn nút xóa
            $xtpl->assign('type_button', 'none');
            // $xtpl->parse('main.type_button');
        }

        // 


        //  Dua vao cac du lieu ngay batdau, kethuc, hientai

        // print('frdate='.$from_date);
        $from_date = $rows_update[0]['from_date'];
        $xtpl->assign('from_date', $from_date);
        $xtpl->parse('main.from_date');

        $to_date = $rows_update[0]['to_date'];
        $xtpl->assign('to_date', $to_date);
        $xtpl->parse('main.to_date');

        $created_date = $rows_update[0]['created_date'];
        $xtpl->assign('created_date', $created_date);
        $xtpl->parse('main.created_date');

        // Dua dư liệu vào tổng điểm
        $xtpl->assign('total_score', $rows_update[0]['total_score']);
        $xtpl->parse('main.total_score');

        // Dua dư liệu vào khuyen nghi, de xuat
        $xtpl->assign('recommendation', $rows_update[0]['recommendation']);
        $xtpl->parse('main.recommendation');
        // Dua dư liệu vào hạn chế, nguyên nhân
        $xtpl->assign('limitation', $rows_update[0]['limitation']);
        $xtpl->parse('main.limitation');
    } else
    // load mới dữ liệu
    {
        $xtpl->assign('action', 'insert');
        // Lấy thông tin từ ngày đến ngày trong bảng option      
        
        $range = $rows_op[0]['date_range'];
        $range = explode(";", $range);
        $d1 = $range[0]; $d2 = $range[1];
        // print('t1=' . $d1 . '|' . $d2);

        
        // set các ngày mặc định vào form
        $cdate = date('d-m-Y');
        $fdate = date('d-m-Y', strtotime('-'.$d1 .'days', strtotime($cdate)));
        $tdate = date('d-m-Y', strtotime('+'.$d2.'days', strtotime($cdate)));
        $xtpl->assign('from_date', $fdate);
        $xtpl->assign('to_date', $tdate);
        $xtpl->assign('created_date', date('d-m-Y'));
    }
} else { //Chưa chọn thông tin khoa phòng đánh thì ẩn nút lưu


    $xtpl->assign('save_button', 'none');
}



// Kiểm tra link del tồn tại thì set trạng thái về 0 ( xóa lần đánh giá)
if (!empty($get['id_del'])) {
    $st = "Update " . TABLE . "_report_details_" . $get['year'] .
        " SET status = 0
             WHERE id = " .  $get['id_del'];
    // Execute the SQL statement
    // print($st);
    $count = $db->exec($st);
}


if (isset($_POST['submit_button'])) {
    $post['submit'] = $_POST['submit_button'];
}


// Đưa dữ liệu vào combo chọn khoa phòng đánh giá
// edit_id=2021_1&acc=quantri
$st1 = "Select * FROM " . TABLE . "_report_" . $get['year'] . " WHERE id =" . $get['id_report'];
// print($st1);
$department = array();
$rows = $db->query($st1)->fetch();
$items = explode(";", $rows['view_report']);
$xtpl->assign('DATA', $rows );
// print_r($items);
// $i = 1;


foreach ($items as $item) {
    $st2 = "Select * FROM " . TABLE . "_groupuser
            WHERE account = '$item'";
    // print($st2);
    $rs = $db->query($st2)->fetchAll();
    $department['name'] = $rs[0]['tenkhoa'];
    $department['account'] = $rs[0]['account'];

    if ($department['account'] == $get['acc']) {
        $department['selected'] = 'selected';
    } else $department['selected'] = '';


    $xtpl->assign('report', $department);
    $xtpl->parse('main.report');
    // print_r('dp=' . $department['name'] . "|");
    // $i = $i + 1;
}




// Dua cac thong tin lan danh gia vao cbox
$t1 = $rows_op[0]['count'];
$t2 = explode(';',$t1);
//$t2 = str_word_count($t1, 1, '1..9ü');
$c = array();
foreach ($t2 as $t) 

{
    $c['count'] = $t;
    ($t == $get['count_report']) ? $c['selected'] = 'selected' : $c['selected'] = '';
    $xtpl->assign('setcount', $c);
    $xtpl->parse('main.setcount');
}

// Dua vao bang hinh thuc danh gia
// Lấy thông tin hình thức đánh giá trong bảng option
$items = $rows_op[0]['evaluation_type'];
$items = explode(';', $items);
$row=array();
foreach ($items as $item) {
    // Check update
    // Print('item='.$item);
    if ($update) ($rows_update[0]['evaluation_type'] == $item) ? $row['selected'] = 'selected' : $row['selected'] = '';
    $row['name_evaluation_type'] = $item;
    $xtpl->assign('evaluation_type', $row);
    $xtpl->parse('main.evaluation_type');
}


// Dua du lieu vao thanh phan danh gia
$st = "Select * FROM " . TABLE . "_evaluation_member";
$rows = $db->query($st)->fetchAll();
$teams = $rows_update[0]['arr_team'];
// $teams = str_word_count($teams, 1, '1..9ü');
$teams = explode(";", $teams);
// $items = str_word_count($teams, 1, '1..9ü');
foreach ($rows as $row) {
    // Kiem tra update

    if ($update) {
        $team =  $row['full_name'] . '-' . $row['position'];
        // print('team=' . $team);
        (in_array($team, $teams)) ? $row['selected'] = 'selected' : $row['selected'] = '';
    }


    $xtpl->assign('evaluation_member', $row);
    $xtpl->parse('main.evaluation_member');
}


// đưa vào bảng câu hỏi
// Lay thong tin nhom cau hoi trong bang baocao
$st = "SELECT * FROM " . TABLE . "_report_" .  $get['year'] . " Where id = $id_report";
$rs = $db->query($st)->fetchAll();

$arr = $rs[0]['arr_question_type'];
$arr = str_word_count($arr, 1, '1..9ü');
$imploded_arr = implode(',', $arr);


$st1 = "SELECT * FROM " . TABLE . "_question_type_" .  $get['year'] . " Where id_question_type IN ($imploded_arr)";
$num = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'];


$groups = $db->query($st1)->fetchAll();
$id_question_details = array();
$id_question_type = array();
$id_question_type = $arr;


// Kiem tra update =True
if ($update == True) {
    // Lấy mảng câu trả lời
    $arr_result =  $rows_update[0]['arr_result_question'];
    $arr_result = str_word_count($arr_result, 1, '0..|');
}


// lấy mảng điểm mặc định (0,1,2)
$score = array();
$arr_score = $rows_op[0]['score'];
$arr_score = str_word_count($arr_score, 1, '0..2');
// print('arr_score= ' . $arr_score);

$k = 0;
$i = 0;
$j = 0;
foreach ($groups as $group) { //lặp nhóm

    $st2 = "SELECT * FROM " . TABLE . "_question_" . $get['year'] . " 
            WHERE id_question_type = " . $group['id_question_type'] . "
            ";
    $rows2 = $db->query($st2)->fetchAll();

    foreach ($rows2 as $row) {
        // Lay thong tin ket wa tư bang report_detail đã có
		$stt=1;
        foreach ($arr_score as $t) {
            //kiểm tra update thì show đáp án
            if ($update) {
                ($arr_result[0][$j] == $t) ? $score['checked'] = 'checked' : $score['checked'] = '';
            }

            $score['score'] = $t;
            $xtpl->assign('stt', $stt);
            $xtpl->assign('score', $score);
            $xtpl->parse('main.group.question.score');
        }

        $j = $j + 1;


        // show thông tin cho bảng cau hỏi
        $j = $j + 1;
        $row['stt'] = $i + 1;
        $i = $i + 1;
        $id_question_details[$i] = $row['id_question'];
        $xtpl->assign('question', $row);
        $xtpl->parse('main.group.question'); // show các giá trị trong nhóm

    }

    // var_dump($group);
    // kiem tra nhom trong bang

    $group['stt'] = $num[$k];
    $k = $k + 1;
    $xtpl->assign('group', $group);
    $xtpl->parse('main.group'); // kết thúc 1 nhóm để lặp qua giá trị nhóm khác

}


// Kiem tra submit
if (isset($post['submit'])) {
    // Get giá trị trong các control form 
    // Giữ lại link_frm vừa cập nhật
    $post['name_recommendation'] = $nv_Request->get_title('name_recommendation', 'post');
    $post['name_limitation'] = $nv_Request->get_title('name_limitation', 'post');

    $post['account_report'] = $nv_Request->get_title('cbo_account', 'post');
    $post['count'] = $nv_Request->get_title('cbo_count', 'post');
    $post['evaluation_type'] = $nv_Request->get_title('cbo_evaluation_type', 'post');
    $post['teams'] = $nv_Request->get_array('teams', 'post');
    $teams =  implode(";", $post['teams']);
    $post['from_date'] = $nv_Request->get_title('from_date', 'post');
    $post['to_date'] = $nv_Request->get_title('to_date', 'post');
    $post['created_date'] = $nv_Request->get_title('created_date', 'post');
    // Kiểm tra update từ txt_action
    $post['action'] = $nv_Request->get_title('txt_action', 'post');
    ($post['action'] == 'update') ? $update = True : $update = False;
    $post['id_rp_detail'] = $nv_Request->get_title('txt_id_rp', 'post');
    (!empty($post['id_rp_detail'])) ? $id_report_detail = $post['id_rp_detail'] : $id_report_detail = 0;

    // $result = $nv_Request->get_title('a1','post');
    // print('a1= '. $result." | ");
    $arr_result = '';
    $total_score = 0;
    foreach ($id_question_details as $r) {

        // In ra dap an gan vơi id cau hoi chi tiet
        $result = $nv_Request->get_title('a' . $r, 'post');
        if (!empty($result)) {
            $total_score = $total_score + $result;
            // print('a' . $r . '= ' . $result . " | ");
            $arr_result .= $result . ';';
        } else {
            $arr_result .= '|' . ';';
        }
    }


    // Kiểm tra thêm mới hay cập nhật
    // print('update='.$update);
    $imploded_question = implode(';', $id_question_details);

    // Lấy tên báo cáo 
    $st2 = "SELECT * FROM " . TABLE . "_report_" . $get['year'] . "
        WHERE id = $id_report";

    $rs = $db->query($st2)->fetchAll();
    ($rs) ? $name_report = $rs[0]['name_report'] : $name_report = '';
    // print('name='.$name_report);
    if ($update) {

        $st = "UPDATE " . TABLE . "_report_details_" . $get['year'] .
            " SET evaluation_type ='" . $post['evaluation_type'] . "',
             arr_question_type= '" . $imploded_arr . "',
             arr_result_question= '" . $arr_result . "',
             total_score = " . $total_score . ",
             arr_team = '" . $teams . "',
             from_date= '" . $post['from_date'] . "',
             to_date= '" . $post['to_date'] . "',
             created_date = '" . $post['created_date'] . "',
             arr_question = '" . $imploded_question . "',
             name_report ='" . $name_report . "',
            recommendation ='" . $post['name_recommendation'] . "',
            limitation ='" . $post['name_limitation'] . "',
            status = 1

         WHERE id = $id_report_detail";
        $count = $db->exec($st);
        // print("update $st rows");
    } else {
        // them vao lan danh gia trong bang chi tiet
        $st = "INSERT INTO " . TABLE . "_report_details_" . $get['year'] . " 
        (id, id_report, name_report, account_report, count, evaluation_type, arr_question_type, arr_result_question,
        total_score, arr_team, account_input, from_date, to_date, created_date, arr_question, recommendation, status, limitation
        
        )
    VALUES (NULL,:id_report,:name_report,:account_report,:count,:evaluation_type,:arr_question_type,:arr_result_question,
    :total_score, :arr_team, :account_input, :from_date, :to_date, :created_date, :arr_question, :recommendation, :status, :limitation
    
    )";

        // Lấy dữ liệu loại câu hỏi  



        $data_insert = array();
        $data_insert['id_report'] = $id_report;
        $data_insert['name_report'] = $name_report;
        $data_insert['account_report'] =  $post['account_report'];
        $data_insert['count'] = $post['count'];
        $data_insert['evaluation_type'] = $post['evaluation_type'];
        $data_insert['arr_question_type'] = $imploded_arr;
        $data_insert['arr_result_question'] = $arr_result;
        $data_insert['arr_question'] = $imploded_question;
        $data_insert['total_score'] = $total_score;
        $data_insert['arr_team'] = $teams;
        $data_insert['account_input'] = $user_info['full_name'];;
        $data_insert['from_date'] = $post['from_date'];
        $data_insert['to_date'] = $post['to_date'];
        $data_insert['created_date'] = $post['created_date'];
        $data_insert['recommendation'] = $post['name_recommendation'];
        $data_insert['limitation'] = $post['name_limitation'];
        $data_insert['status'] = '1';
        // print_r($data_insert);

        $result = ($db->insert_id($st, 'id', $data_insert));
    }
}


$xtpl->parse('main.buttons');
/*End Code for Here*/
//truyền biến vào form action
$xtpl->assign('POST', $post);
// Check submit, nếu submit thì giữ lại thông tin đang cập nhật
if (!isset($post['submit']))
    $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&edit_id=' . $get['year'] . '_' . $get['id_report']);
else
    $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&edit_id=' . $get['year'] . '_' . $get['id_report'] . '&idd=' . $get['idd']);


$func = 'evaluation_form';
$xtpl->assign('link_back', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func);

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
    $count = $db->exec("UPDATE nv4_vi_fives_question_details SET score=$score WHERE id_question_details= $id_question_details");
    // print("update $count rows");
}
//PDO
// xóa tất cả các bảng theo điều kiện
function delete_tables($y)
{
    // Define the prefix of the tables you want to delete
    global $db;
    $pre = "nv4_vi_fives_evaluation_" . $y;

    // Construct the SQL statement with a wildcard to match all tables with the prefix
    $sql = "DROP TABLE IF EXISTS " . $pre . "%";

    // Execute the SQL statement
    $count = $db->exec($sql);

    print("All tables with prefix " . $pre . " have been deleted successfully");
}
