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
    Header('Location: ' . nv_url_rewrite($url, true));
    exit();
}
$thongke = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);
$xtpl->assign('THEME_URL', THEME_URL);


$post = array();
$get = array();
// kiem tra link chọn lần đánh giá
$get['idd'] = $nv_Request->get_title('idd', 'get,post', '');
if (!empty($get['idd'])) {
    // $get['idd'] = $nv_Request->get_title('idd', 'get,post', '');
    $arr = explode('_', $get['idd']);
    $get['account_view'] = $arr[0];
    $get['count_report'] = $arr[1];

    $xtpl->assign('hien_bieumau', '');

    $xtpl->assign('hien_nutexcel', '');
    //echo 'ok';

    // print('account_view=' .$get['count_report'] .'----');
} else {$xtpl->assign('hien_bieumau', 'hidden');
        $xtpl->assign('hien_nutexcel', 'hidden');
    //echo 'not ok';

    }
// Lấy thông tin năm mặc định
$st = "Select year FROM " . TABLE . "_setup WHERE set_default = 1";
$row_default = $db->query($st)->fetch();
$get['year']  =  $row_default['year'];
$xtpl->assign('nam', $get['year']);
// // Lấy id báo cáo truyền vào từ link
$get['view_id'] = $nv_Request->get_title('view_id', 'get,post', '');
$arr = explode('_', $get['view_id']);
$get['id_report'] = $arr[1];

// Show dữ liệu hình ảnh
if (!empty($get['idd'])) {
    $st = "SELECT * FROM " . TABLE . "_report_details_" .  $get['year'] . " Where account_report ='" .  $get['account_view'] . "'
 AND count ="  . $get['count_report'] . " AND status =1  AND id_report=".$get['id_report'];
    //    print($st);
    $stmt = $db->prepare($st);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $imageData = unserialize($row['images']);


    // Display each image using HTML's <img> tag
    foreach ($imageData as $image) {

        // echo '<td>' .
        // '<img src = "data:image/jpg;base64,' .base64_encode($image['content']) . '" width = "50px" height = "50px"/>'
        // . '</td>';
        // echo '</tr>';
        // $t='<img src="' + base64String + '" class="img-thumbnail border-dark p-2 h-100 w-100" >';

        $xtpl->assign('images', '<img src = "data:image/jpg;base64,' . base64_encode($image['content']) . '" class="img-thumbnail border-dark p-2 h-100 w-100"/>');
        $xtpl->parse('main.images');
    }
}
//end show


// Lấy các thông tin trong bản optiopn
$st = "SELECT * FROM " . TABLE . "_option where status =1";
$rows_op = $db->query($st)->fetch();

// đưa vào bảng câu hỏi
//Lay thong tin nhom cau hoi trong bang baocao
$st = "SELECT * FROM " . TABLE . "_report_" .  $get['year'] . " Where id = " . $get['id_report'] . "";
// print($st);
$rs = $db->query($st)->fetch();
// print('nhomcauhoi='.$st);
$arr = $rs['arr_question_type'];
$arr = explode(';', $arr);
$imploded_arr = implode(',', $arr);
// foreach ($imploded_arr as $ip)
// print($ip);;
// Lấy thông tin hình thức đánh giá trong bảng option
// Lấy thông tin mảng câu hỏi trang bảng report_details_Y
if (!empty($get['idd'])) {

    $st = "SELECT * FROM " . TABLE . "_report_details_" .  $get['year'] . " Where account_report ='" .  $get['account_view'] . "'
AND count ="  . $get['count_report'] . " AND status >0  AND id_report =".$get['id_report'];

    // print($st);

    $ds = $db->query($st)->fetch();
}


$st1 = "SELECT * FROM " . TABLE . "_question_type_" .  $get['year'] . " Where id_question_type IN ($imploded_arr)";
$num = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'];
// print($st1);

$groups = $db->query($st1)->fetchAll();
// $id_question_details = array();
// $id_question_type = array();
// $id_question_type = $arr;


// Đưa dữ liệu vào combo chọn khoa phòng đánh giá
if (empty($get['account_view'])) $get['account_view'] = $nv_Request->get_title('kp', 'get,post', '');
// edit_id=2021_1&acc=quantri
$st1 = "Select * FROM " . TABLE . "_report_" . $get['year'] . " WHERE id =" . $get['id_report'];
// print($st1);
$department = array();
$rows = $db->query($st1)->fetch();
$items = explode(";", $rows['view_report']);
// $rows['name_report'] = strtoupper($rows['name_report']);
$xtpl->assign('DATA', $rows);


foreach ($items as $item) {
    $st2 = "Select * FROM " . TABLE . "_groupuser
            WHERE account = '$item'";
    // print($st2);
    $rs = $db->query($st2)->fetchAll();
    $department['name'] = $rs[0]['tenkhoa'];
    $department['account'] = $rs[0]['account'];

    if ($department['account'] == $get['account_view']) {
        $department['selected'] = 'selected';
    } else $department['selected'] = '';


    $xtpl->assign('report', $department);
    $xtpl->parse('main.report');
}




// Kiểm tra thông tin khi bấm vào link_lan danh gia idd

$st = "Select * FROM " . TABLE . "_report_details_" . $get['year'] . "
 WHERE account_report ='" . $get['account_view'] . "' AND status >0  AND id_report=".$get['id_report']."  ORDER BY count asc";
// print($st);
$rows2 = $db->query($st)->fetchAll();

if (!empty($rows2[0]['account_report'])) {
    // Giữ lại thông tin lần đánh giá theo khoa phòng
    // $xtpl->assign('info', $get['account_view']);
    // hien bieu mau
    // $xtpl->assign('hien_bieumau', '');
    $xtpl->assign('hien_danhgia', '');
    // print('Hien danh gia');
    foreach ($rows2 as $row) {
        $token = $get['year'] . '_' . $get['id_report'] . '&idd=' . $get['account_view'] . '_' . $row['count'] . '_' . md5($client_info['session_id'] . $user_info['username']);
        $row['link_landanhgia'] =  MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $token;
        // print($row['link_landanhgia']);
        // $xtpl->assign('link_landanhgia', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $get['year'] . '_' .$get['id_report'] . '&idd=' . $get['account_view'] . '_' . $row['count']);
        // $xtpl->assign('link_landanhgia', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $token);

        $xtpl->assign('list_count', $row);
        $xtpl->parse('main.list_count');
        // print('count=' . $row[0]['count']);
    }
} else {
    $xtpl->assign('hien_landanhgia', 'hidden'); //an lan danh gia
    // $xtpl->assign('hien_bieumau', 'hidden');
}



// Hien thi cac thong tin chung cua report : tenkhoa,doitruong,ngaydanhgia...

// Lấy tên khoa phòng
if (!empty($ds['account_report'])) {
    $st = "SELECT * FROM " . TABLE . "_groupuser where account like '" . $ds['account_report'] . "'";
    $row = $db->query($st)->fetch();
    $arr = array();
    $arr['tenkhoa'] = $row['tenkhoa'];
    $arr['tenkhoabc'] = $ds['account_report'];
    $arr['landanhgia'] = $ds['count'];
    $arr['ngaydanhgia'] =  $ds['created_date'];
    //lấy kiến nghị, đề xuất
    //$arr['recommendation'] = $ds['recommendation'];
    $ds_re = ltrim($ds['recommendation'],'-');
    $ds_re =  explode('-',  $ds['recommendation']);
    for ($j =1; $j < count($ds_re); $j++) {
       //echo $ds_re[$j] . '</br>';
        //$dstv[i] =
        $arr['re'] = $ds_re[$j];
        $xtpl->assign('DS', $arr);
        $xtpl->parse('main.DS');


    }
    // Lấy tên đội trưởng
    $leader = '';
    // var_dump($ds['arr_team']);
    $team = $ds['arr_team'];
    $teams = explode(';', $team);
    for ($i = 0; $i < count($teams); $i = $i + 1) {
        $team = explode('-', $teams[$i]);
        // Giữ lại thành viên Đội Trưởng
        if ($team[1] = "Đội Trưởng") {
            $leader = $team[0];
        }
        //$dstv[i] =
        // print($team[0] . "</br>");
        $arr['tv'] = $teams[$i];
        $xtpl->assign('dstv', $arr);
        $xtpl->parse('main.dstv');

    }
    $arr['doitruong'] = $leader;
    // print($arr['ngaydanhgia']);
    $xtpl->assign('thongtinchung', $arr);

    // Dua dư liệu vào khuyen nghi, de xuat
    $xtpl->assign('recommendation', $ds['recommendation']);
    $xtpl->parse('main.recommendation');
    // Dua dư liệu vào hạn chế, nguyên nhân
    $xtpl->assign('limitation', $ds['limitation']);
    $xtpl->parse('main.limitation');
}
// Dua dư lieu vao form bieu mau
// Dua dư liệu vào tổng điểm
//var_dump('td=',$ds['total_score']);

$xtpl->assign('total_score', $ds['total_score']);
// Dua du lieu vao xep loai
$xl = array();

if ($ds['total_score'] >= 90 && $ds['total_score'] <= 100)
    $xl['xl1'] = '&#10004;';
else $xl['xl1'] = '';
if ($ds['total_score'] >= 70 && $ds['total_score'] <= 89)
    $xl['xl2'] = '&#10004;';
else $xl['xl2'] = '';
if ($ds['total_score'] >= 50 && $ds['total_score'] <= 69)
    $xl['xl3'] = '&#10004;';
else $xl['xl3'] = '';
if ($ds['total_score'] <= 49)
    $xl['xl4'] = '&#10004;';
else $xl['xl4'] = '';
$xtpl->assign('xeploai', $xl);



// Lấy mảng câu trả lời
$arr_result =  $ds['arr_result_question'];

// $arr_result = str_word_count($arr_result, 1, '0..|');
$arr_result = explode(';', $arr_result);
// var_dump($arr_result);
// }


// // lấy mảng điểm mặc định (0,1,2)
$score = array();
$arr_score = $rows_op['score'];
$arr_score = explode(';', $arr_score);
$m=0;
$k = 0;
$i = 0;
$j = 0;
$m0=0;
$m1=0;
$m2=0;
foreach ($groups as $group) { //lặp nhóm

    $st2 = "SELECT * FROM " . TABLE . "_question_" . $get['year'] . " 
            WHERE id_question_type = " . $group['id_question_type'] . "
            ";
    $rows2 = $db->query($st2)->fetchAll();

    foreach ($rows2 as $row) {
        // Lay thong tin ket wa tư bang report_detail đã có
        $stt = 1;
        foreach ($arr_score as $t) {
            // print('score='.$t);
            //kiểm tra update thì show đáp án          
            // ($arr_result[0][$j] == $t) ? $score['checked'] = 'checked' : $score['checked'] = '';

            //$score['score'] = $t;
            ($arr_result[$m] == $t) ? $score['check'] = '&#10004;' : $score['check'] = '';
           
            if ($arr_result[$m] == $t) {
                $score['check'] = '&#10004';
                
                $n++;
            
                switch ((int)$arr_result[$m]) {
                    case 0:
                        $m0++;
                        //echo $m0;
                        break;
                    case 1:
                        $m1++;                    
                        break;
                    case 2:
                        $m2++;
                        break;
                    default:
                    break;
                  }
                }
                else
                    $score['check'] = '';

            $xtpl->assign('stt', $stt);
            $xtpl->assign('score', $score);
            $xtpl->parse('main.group.question.score');
        }

        //$j = $j + 1;


        // show thông tin cho bảng cau hỏi
        //$j = $j + 1;
        $row['stt'] = $i + 1;
        $i = $i + 1;
        $id_question_details[$i] = $row['id_question'];
        $xtpl->assign('question', $row);
        $xtpl->parse('main.group.question'); // show các giá trị trong nhóm
        $m++;

    }

    // var_dump($group);
    // kiem tra nhom trong bang

    $group['stt'] = $num[$k];
    $k = $k + 1;
    $xtpl->assign('group', $group);
    $xtpl->parse('main.group'); // kết thúc 1 nhóm để lặp qua giá trị nhóm khác

}


//đưa vào mảng  tieumuc

$xtpl->assign('tieumuc', $ds=array(
    'm0'=>$m0,
    'm1'=>$m1,
    'm2'=>$m2,
    'tongso' => $n,
    'total_score' => $ds['total_score'],
    'tyle' => ($n/50)*100,
    'dtb' => round($ds['total_score']/50,2)
)
);
//echo 'dtb='.round($n/50,2);

// 

$xtpl->parse('main.buttons');
/*End Code for Here*/
//truyền biến vào form action
$xtpl->assign('POST', $post);
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $get['year'] . '_' . $get['id_report']);

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
