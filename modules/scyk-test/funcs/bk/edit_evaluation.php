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

/*Code for Here*/

//echo 'ol';
// global $imgs_db ;
$post = array();
$get = array();
$status = 0;
$get['edit_id'] = $nv_Request->get_title('edit_id', 'get');
$get['id_del'] = $nv_Request->get_title('id_del', 'get');
// print('id_del='. $get['id_del']);
$arr = explode('_', $get['edit_id']);
$get['year'] = $arr[0];
// $get['account_input'] = $nv_Request->get_title('acc', 'get');
$id_report = $get['id_report'] = $arr[1];
// check idd báo cáo đã có
$get['idd'] = $nv_Request->get_title('idd', 'get');

//print ('idd='. $get['idd']);
$arr = explode('_', $get['idd']);
$get['acc'] = $arr[0];
$get['count_report'] =  $arr[1];

// $xtpl->assign('type_button', 'None');
// $xtpl->parse('main.type_button');

// Lấy các thông tin cài đặt trong bảng option
$st = "Select * FROM " . TABLE . "_option";

//var_dump($st);
$rows_op = $db->query($st)->fetchAll();
//echo $st;
// Kiem tra dư lieu trong 2 combox khoa phong va count
$update = False;
if (!empty($get['acc']) && !empty($get['count_report'])) {
    //print ('idd='. $get['idd']);
    $xtpl->assign('hien_bieumau', '');
    //giữ lại giá trị lần đánh giá
    $xtpl->assign('idcount', $get['count_report']);
    //gán vào id_report
    $xtpl -> assign('id_report',$id_report);




    // Hiển thị nút Lưu khi đã chọn Khoa phòng (có thông tin khởi tạo hoặc thông tin đã lưu)
    $xtpl->assign('show_button', 'inline');
    // $xtpl->parse('main.type_button');

    // Lay dư lieu trong bang chi tiet bao cao
    $st1 = "Select * FROM " . TABLE . "_report_details_" . $get['year'] .
        " WHERE account_report ='" . $get['acc'] . "' AND count =" . $get['count_report'] . " AND status > 0
        AND id_report=" . $id_report;


    // lấy toàn bộ dữ liệu có trong bảng chi tiết
    $rows_update = $db->query($st1)->fetchAll();
    if (!empty($rows_update[0]['id'])) {
        $update = True;
        // Tạo thông tin nút cập nhật
        // Gán dữ liệu vào textbox action: để check update hay insert
        $xtpl->assign('action', 'update');

        // Gán dữ liệu vào textbox id_report: để lưu giá trị id report detail
        //print ('t='.$id_report);

        $xtpl->assign('id_rp_detail', $rows_update[0]['id']);



        // Gán link vào nút Xóa        
        if (!empty($rows_update[0]['id'])) {

            //print('test');



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


        //  Dua vao cac du lieu ngay batdau, kethuc, hientai truong hop update

        // print('frdate='.$from_date);
        $from_date = $rows_update[0]['from_date'];
        $to_date = $rows_update[0]['to_date'];
        $created_date = $rows_update[0]['created_date'];
        $total_score = $rows_update[0]['total_score'];
        $dtb = round($total_score / 50, 2);
        $re = $rows_update[0]['recommendation'];
        $limit = $rows_update[0]['limitation'];
        $bonus = $rows_update[0]['bonus'];
        $discipline = $rows_update[0]['discipline'];
        //03-06 them moi 2 cot khenthuong,kyluat (bonus, discipline) trong bảng detail

        $xtpl->assign(
            'thongtin',
            $ds = array(
                'from_date' =>  $from_date,
                'to_date' =>  $to_date,
                'created_date' =>   $created_date,
                'total_score' =>  $total_score,
                'dtb' =>  $dtb,
                're' => $re,
                'limit' => $limit,
                'bonus' => $bonus,
                'discipline' => $discipline
            )
        );




        //$xtpl->parse('main.thongtin');


        // Show dữ liệu hình ảnh
        $sql = "SELECT * FROM " . TABLE . "_report_details_" . $get['year'] . "  where id= " . $rows_update[0]['id'];
        //print($sql);
        //echo $sql;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $imageData = unserialize($row['images']);
        $imgs_db = $imageData;
        //print('ok');

        // Lấy lại tên của hình ảnh cũ để so sánh
        $imgs = array();

        // Display each image using HTML's <img> tag
        foreach ($imageData as $image) {
            $imgs['name'] = base64_encode($image['name']);

            // echo '<td>' .
            // '<img src = "data:image/jpg;base64,' .base64_encode($image['content']) . '" width = "50px" height = "50px"/>'
            // . '</td>';
            // echo '</tr>';
            // $t='<img src="' + base64String + '" class="img-thumbnail border-dark p-2 h-100 w-100" >';

            $xtpl->assign('images', '<img src = "data:image/jpg;base64,' . base64_encode($image['content']) . '" class="img-thumbnail border-dark p-2 h-100 w-100"/>');
            $xtpl->parse('main.images');
        }

        //print('test123');
    } else
    // load mới dữ liệu
    //print('load');
    {
        //print('load2');
        $xtpl->assign('action', 'insert');
        // Lấy thông tin từ ngày đến ngày trong bảng kỳ đánh giá  
        //print($get['count_report']);
        if (!empty($get['count_report'])) {
            //print('load3');

            $st2 = "SELECT * FROM " . TABLE . "_evaluation_" . $get['year'] . " 
               WHERE count_evaluation = " .  $get['count_report'];
            //    print( 'st1='.$st2);
            //var_dump($st2);

            $row2 =  $db->query($st2)->fetch();
            if (!empty($row2['id'])) {
                // Đưa dữ liệu ngày tháng năm đã có vào
                $from_date = $row2['from_date'];
                $xtpl->assign('from_date', $from_date);
                $xtpl->parse('main.from_date');

                $to_date = $row2['to_date'];
                $xtpl->assign('to_date', $to_date);
                $xtpl->parse('main.to_date');

                //lấy thông tin ngày đánh giá trong bảng kỳ đánh giá
                $xtpl->assign(
                    'thongtin',
                    $ds = array(
                        'from_date' =>  $from_date,
                        'to_date' =>  $to_date,
                        'created_date' =>   $created_date


                    )
                );

                // Đưa vào hình thức đánh giá
            }
        }

        $range = $rows_op[0]['date_range'];
        $range = explode(";", $range);
        $d1 = $range[0];
        $d2 = $range[1];

        $xtpl->assign('created_date', date('d-m-Y'));
    }
} else { //Chưa chọn thông tin khoa phòng đánh thì ẩn nút lưu

    $xtpl->assign('hien_bieumau', 'hidden');
    $xtpl->assign('save_button', 'none');
}

if (!empty($get['count_report'])) {
    // Lấy dữ liệu từ bảng kì đánh giá để cập nhật vào bảng
    $st2 = "SELECT * FROM " . TABLE . "_evaluation_" . $get['year'] . " 
   WHERE count_evaluation = " .  $get['count_report'];

    //print('st2='.$st2);
    // ẩn nút lưu nếu chưa khởi tạo đánh giá
    $row2 =  $db->query($st2)->fetch();
    if (empty($row2['id'])) $xtpl->assign('save_button', 'none');
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
//var_dump($st1);
//print('acc='.$get['acc'].'<br>');
$department = array();
$rows = $db->query($st1)->fetch();
$items = explode(";", $rows['view_report']);
$xtpl->assign('DATA', $rows);
// print_r($items);
// $i = 1;


foreach ($items as $item) {
    $st2 = "Select * FROM " . TABLE . "_groupuser
            WHERE account = '$item'";
    //print($st2.'<br>');
    $rs = $db->query($st2)->fetchAll();
    $department['name'] = $rs[0]['tenkhoa'];
    $department['account'] = $rs[0]['account'];

    if ($department['account'] == $get['acc']) {
        $department['selected'] = 'selected';
    } else $department['selected'] = '';


    $xtpl->assign('report', $department);
    $xtpl->parse('main.report');
    //print_r('dp=' . $department['name'] . "|");
    // $i = $i + 1;
}



// Lấy thông lần đánh giá đã khởi tạo trong bảng evaluation
$st2 = "SELECT * FROM " . TABLE . "_evaluation_" . $get['year'] . "
	WHERE status > 0";

$rows2 =  $db->query($st2)->fetchAll();
//var_dump($rows2);
$arr1 = array();
$i = 0;
foreach ($rows2 as $row2) {

    $arr1[$i] = $row2['count_evaluation'];
    $i = $i + 1;
}
//var_dump($arr1);
//Lấy danh sách kỳ đánh giá theo khoa phòng
if (!empty($get['acc'])) {

    //test lại code here tren host    

    $st = "SELECT * FROM " . TABLE . "_report_details_" . $get['year'] . "  
    where id_report < 5 and status > 0 and account_report= '" . $get['acc'] . "'
   ";
    //var_dump($st);
    $dscount = array();
    $rows =  $db->query($st)->fetchAll();
    //print('t='.count($rows));

    for ($i = 0; $i < count($rows); $i++)
        $dscount[$i] = $rows[$i]['count'];
    //print('test'.$dscount);

    $c = array();
    //print_r($arr1);
    foreach ($arr1 as $t) {
        //print('t='.$t);
        $c['count'] = $t;
        //($t == $get['count_report']) ? $c['selected'] = 'selected' : $c['selected'] = '';
        (in_array($t, $dscount)) ? $c['class'] = "btn btn-success" : $c['class'] = "btn btn-warning";

        ($t == $get['count_report']) ? $c['class'] = 'btn btn-primary' : '';
        $xtpl->assign('setcount', $c);
        $xtpl->parse('main.setcount');
    }
}

//print('test');

// Dua vao bang hinh thuc danh gia
// Lấy thông tin hình thức đánh giá trong bảng option
// $items = $rows_op[0]['evaluation_type'];
// $items = explode(';', $items);
if (!empty($get['count_report'])) {
    $st2 = "SELECT * FROM " . TABLE . "_evaluation_" . $get['year'] . " 
WHERE count_evaluation = " .  $get['count_report'];
    // print('st1=' . $st2);
    $row2 =  $db->query($st2)->fetch();
    $xtpl->assign('evaluation_type', $row2['evaluation_type']);
    // $xtpl->parse('main.evaluation_type');


}

// đưa vào bảng câu hỏi
// Lay thong tin nhom cau hoi trong bang baocao
$st = "SELECT * FROM " . TABLE . "_report_" .  $get['year'] . " Where id = $id_report";
//print($st);
$rs = $db->query($st)->fetchAll();

$arr = $rs[0]['arr_question_type'];
// $arr = str_word_count($arr, 1, '1..9ü');
$arr = explode(';', $arr);
$imploded_arr = implode(',', $arr);

//kiểm tra biểu mẫu số 5
$st1 = "SELECT * FROM " . TABLE . "_question_type_" .  $get['year'] . " 
Where id_question_type IN ($imploded_arr) ";
($id_report != 5) ? $num = ['I.', 'II.', 'III.', 'IV.', 'V.', 'VI.', 'VII.', 'VIII.'] : $num = array();



// print($name_report= $rs[0]['name_report']);
// var_dump($num);

$groups = $db->query($st1)->fetchAll();
$id_question_details = array();
$id_question_type = array();
$id_question_type = $arr;
// $name_report= $rs[0]['name_report'];

// Kiem tra update =True
if ($update == True) {
    // Lấy mảng câu trả lời
    $arr_result =  $rows_update[0]['arr_result_question'];
    //lấy chuỗi câu trả lời thực tế

    $arr_result = explode(';', $arr_result);
    // $arr_result1 = unset($arr1["b"]);
    $arr_result1 = array_diff($arr_result, ["|"]);
}
//print_r($arr_result1);
// print_r($id_question_details);
// lấy mảng điểm mặc định (0,1,2)
$score = array();
$arr_score = $rows_op[0]['score'];
//$arr_score = str_word_count($arr_score, 1, '0..2');
$arr_score = explode(';', $arr_score);
// print('arr_score= ' . $arr_score);

$k = 0; //số thứ tự nhóm
$i = 0; //số thứ câu hỏi
$j = 0; //số câu hỏi mối nhóm
$m = 0; //số câu hỏi tổng
$n = 0; //số lượng câu trả lời mỗi nhóm
$m0 = 0;
$m1 = 0;
$m2 = 0;
$tm_kp = '';
foreach ($groups as $group) { //lặp nhóm
    // kiểm tra biểu mẫu số 5
    $j = 0;
    $n = 0;

    //luu mang nhom cau hoi va muc do

    $group['m0'] = 0;
    $group['m1'] = 0;
    $group['m2'] = 0;

    $st2 = "SELECT * FROM " . TABLE . "_question_" . $get['year'] . " 
            WHERE id_question_type =" . $group['id_question_type'];

    //print($st2)."</br>";
    $rows2 = $db->query($st2)->fetchAll();

    foreach ($rows2 as $row) {
        // Lay thong tin ket wa tư bang report_detail đã có
        $stt = 1;
        foreach ($arr_score as $t) {
            //kiểm tra update thì show đáp án
            if ($update) {
                if ($arr_result[$m] == $t) {
                    $score['checked'] = 'checked';
                    $n++;

                    switch ((int)$arr_result[$m]) {
                        case 0:
                            $m0++;
                            $group['m0']++;
                            //echo $m0;
                            break;
                        case 1:
                            $m1++;
                            $group['m1']++;
                            break;
                        case 2:
                            $m2++;
                            $group['m2']++;
                            break;
                        default:
                            break;
                    }
                } else $score['checked'] = '';
                //lấy thông tin các mức trả lời câu hỏi

            }
            $score['id_group'] = 'N'.$k;

            $score['score'] = $t;
            $score['id_question'] = $row['id_question'];
            $xtpl->assign('stt', $stt);
            $xtpl->assign('score', $score);
            $xtpl->parse('main.group.question.score');
        }

        //$j = $j + 1;


        // show thông tin cho bảng cau hỏi
        //$j = $j + 1;
        $row['stt'] = $i + 1;
        // $i = $i + 1;
        // print($row['id_question'].'<br></br>');


        $id_question_details[$i] = $row['id_question'];
        $xtpl->assign('question', $row);
        $xtpl->parse('main.group.question'); // show các giá trị trong nhóm
        $m++;
        $j++;
        $i++;
    }

    // var_dump($group);
    // kiem tra nhom trong bang
    $group['id_group'] = 'N'.$k;
    $group['stt'] = $num[$k];
    $ctl = $j - $n; //số câu chưa trả lời
    if ($ctl != 0) {
        $group['class'] = "badge badge-danger";
        $group['ctl'] = $ctl;
    } else {
        $group['class'] = '';
        $group['ctl'] = '';
    }

    $group['sch'] = $j;
    $k++;
    //dua vao tieu muc tung khoa phòng tm_kp
    $tm_kp = $tm_kp . $group['id_question_type'] . ':' . $group['m0'] . '-' . $group['m1'] . '-' . $group['m2'] . ',';
    $xtpl->assign('group', $group);
    $xtpl->parse('main.group'); // kết thúc 1 nhóm để lặp qua giá trị nhóm khác

}
//lấy thông tin tổng số câu hỏi và trả lời
//$m tong so cau hoi
//$arr_result1 so cau tra loi
//echo 'm0='.$m0.'---m1='.$m1.'-----m2='.$m2;
$tm_kp = rtrim($tm_kp, ',');
$xtpl->assign('tm_kp', $tm_kp);


// $thongtin=array();
//echo 'up='.$update;
if ($update == true) {
    //echo 'm0='.$m0.'---m1='.$m1.'-----m2='.$m2.'-----count arr='.count($arr_result1).'-----m='.$m;
    $xtpl->assign(
        'tieumuc',
        $ds = array(
            'm0' => $m0,
            'm1' => $m1,
            'm2' => $m2,
            'tongso' => count($arr_result1)

        )

    );
    //Gan vao submit form giữ lại gt của các mức
    $sta = $m0 . ',' . $m1 . ',' . $m2;
    //$xtpl->assign('sta',$sta);
    // $arr_result1 = explode(';',$arr_result1);
    // print(count($arr_result1).'/'.count($id_question_details));
    if (count($arr_result1) < $m) {
        $xtpl->assign('thongtinchung', array(
            'class' => 'label-danger',
            'trangthai' => 'Đang thực hiện'


        ));
    } else {
        $xtpl->assign('thongtinchung', array(
            'class' => 'label-info',
            'trangthai' => 'Đã hoàn thành'

        ));
        //$status =2;

    }
}
// print(count($arr_result).'/'.count($id_question_details));
//echo 't1';
// Kiem tra submit
if (isset($post['submit'])) {
    //print('submit OK');
    // Get giá trị trong các control form 


    $post['name_recommendation'] = $nv_Request->get_title('name_recommendation', 'post');
    $post['name_limitation'] = $nv_Request->get_title('name_limitation', 'post');

    $post['name_bonus'] = $nv_Request->get_title('name_bonus', 'post');
    $post['name_discipline'] = $nv_Request->get_title('name_discipline', 'post');

    //echo $post['name_discipline'];

    $post['account_report'] = $nv_Request->get_title('cbo_account', 'post');
    $post['count'] = $nv_Request->get_title('cbo_count', 'post');
    $post['evaluation_type'] = $nv_Request->get_title('cbo_evaluation_type', 'post');
    // print('ev='. $post['evaluation_type']);
    $post['teams'] = $nv_Request->get_array('teams', 'post');
    $teams =  implode(";", $post['teams']);
    $post['from_date'] = $nv_Request->get_title('from_date', 'post');
    $post['to_date'] = $nv_Request->get_title('to_date', 'post');
    $post['created_date'] = $nv_Request->get_title('created_date', 'post');
    // Kiểm tra update từ txt_action
    $post['action'] = $nv_Request->get_title('txt_action', 'post');
    ($post['action'] == 'update') ? $update = True : $update = False;
    //update fix id_rp_detail 07/07
    $post['id_rp_detail'] = $nv_Request->get_title('txt_id_rp', 'post');
    (!empty($post['id_rp_detail'])) ? $id_report_detail = $post['id_rp_detail'] : $id_report_detail = 0;
    //$status = $nv_Request->get_title('txt_status', 'post');
    $post['tieumuc'] = $nv_Request->get_title('txt_sta', 'post');
    $tieumuc = explode(',', $post['tieumuc']);
    $m0 = $tieumuc[0];
    $m1 = $tieumuc[1];
    $m2 = $tieumuc[2];
    /*
    $post['tm_kp'] = $nv_Request->get_title('txt_tm_kp', 'post');
    //var_dump( $post['tm_kp']);
    //tao mảng nhóm câu hỏi và mức điểm
    $s = $post['tm_kp'];
    $a = array();
    $parts = explode(',', $s);

    foreach ($parts as $part) {
        $values = explode(':', $part);
        $key = $values[0];
        $sub_values = explode('-', $values[1]);

        $sub_array = array_combine(
            array_map(function ($index) {
                return 'm' . $index;
            }, array_keys($sub_values)),
            $sub_values
        );

        $a[$key] = $sub_array;
    }


    //kiểm tra update
    //Đưa tiểu mục vào bảng dữ liệu nv4_vi_five5s_evaluation_depart_y
    if ($update == False) {
        $st = "INSERT INTO " . TABLE . "_evaluation_depart_" . $get['year'] . " 
    (id_report, id_question_type, account_report, count_evaluation, m0, m1, m2, dtb )
    VALUES (:id_report, :id_question_type, :account_report, :count_evaluation, :m0, :m1, :m2, :dtb)";
    } else {
        //Lấy ra ds id của bảng _evaluation_depart_ ứng theo kp/lần dg
        $st = "SELECT id,id_question_type FROM " . TABLE . "_evaluation_depart_" . $get['year'] . "
        WHERE account_report='" . $post['account_report'] . "' and count_evaluation=" . $post['count'] . " ORDER BY id asc ";
        //print($st);
        $id_kps = array();
        $id_type = array();

        $id_kps = $db->query($st)->fetchAll();
        
        
        var_dump($id_kps);


        $st = "UPDATE " . TABLE . "_evaluation_depart_" . $get['year'] . "
        SET m0= :m0, 
        m1= :m1, 
        m2= :m2, 
        dtb= :dtb, 
        id_report= :id_report, 
        id_question_type= :id_question_type,
        account_report= :account_report, 
        count_evaluation= :count_evaluation
        WHERE account_report= :account_report and count_evaluation= :count_evaluation";
    }



    $stmt = $db->prepare($st);

    $keys = array_keys($a);
    foreach ($keys as $key) {

        $stmt->bindParam(':account_report', $post['account_report']);
        $stmt->bindParam(':count_evaluation', $post['count']);
        $stmt->bindParam(':id_report', $id_report);
        $stmt->bindParam(':id_question_type', $key);
        $stmt->bindParam(':m0', $a[$key]['m0']);
        $stmt->bindParam(':m1', $a[$key]['m1']);
        $stmt->bindParam(':m2', $a[$key]['m2']);

        $dtb_tm = round((($a[$key]['m0']) +  ($a[$key]['m1']) + ($a[$key]['m2'])) / 3, 2);
        //var_dump($dtb_tm);
        $stmt->bindParam(':dtb', $dtb_tm);


        //var_dump($data_insert);
        //$count = $stmt->execute();
        if ($update == True) {
            //duyệt wa tất cả id_kp
            foreach($id_kps as $id_kp){
                if (($id_kp['id_question_type']) == $key){
                    $st1 = "UPDATE " . TABLE . "_evaluation_depart_" . $get['year'] . "
                    SET m0=" .  $a[$key]['m0'] . ",
                    m1=" .  $a[$key]['m1'] . ", 
                    m2=" .  $a[$key]['m2'] . ", 
                    dtb=" . $dtb_tm . "         
                    WHERE id=". $id_kp['id']. " AND id_question_type =".$key."
                    ORDER BY id asc";
                    $count = $db->exec($st1);
                    print('test='.$st1 . "/n");
                }
            }
        }
    }
    //var_dump($st);
    */

    //end code


    $l = 0;
    $arr_result = '';
    $arr_test = array();
    $total_score = 0;

    $result = $nv_Request->get_array('a' . $r, 'post');
    //lấy tổng số câu trả lời
    $total_result = count($result);
    //tổng câu hỏi
    $total_question = count($id_question_details);
    //echo 'tch='. $total_question;
    ($total_result >= $total_question) ? $status = 2 : $status = 1;

    //lấy tổng điểm
    $total_score = $nv_Request->get_title('totalsum' . $r, 'post');

    //var_dump($result);
    $arr_result = implode(';', $result);
    // print($s_result);
    // foreach ($id_question_details as $r) {


    // Kiểm tra thêm mới hay cập nhật
    // print('update='.$update);
    $imploded_question = implode(';', $id_question_details);

    // Lấy tên báo cáo 
    $st2 = "SELECT * FROM " . TABLE . "_report_" . $get['year'] . "
        WHERE id = $id_report";

    $rs = $db->query($st2)->fetchAll();
    ($rs) ? $name_report = $rs[0]['name_report'] : $name_report = '';
    //print('name='.$name_report);
    // Kiểm tra xếp loại
    $rating = '';
    if ($total_score < 50) {
        $rating = "Yếu";
    } else if ($total_score >= 50 && $total_score < 70) {
        $rating = "Trung bình";
    } else if ($total_score >= 70 && $total_score < 90) {
        $rating = "Tốt";
    } else {
        $rating = "Rất tốt";
    }


    //end test

    // $blood_type=0;
    $blood_type = $nv_Request->get_title('txt_image', 'post');
    // lấy giá trị ulr base 64 từ form
    // $img_url = $nv_Request->get_title('txt_url', 'post');
    // print($img_url);
    // var_dump($_FILES["imgs"]);
    // foreach ()
    // print('bl=' . $blood_type);
    if (!empty($blood_type)) {

        // $imgContent = file_get_contents($tmp_name);


        // Get file info 
        // $fileNames =   $imgs["imgs"]["name"]; 
        // print( 'name='.$fileNames);
        $fileNames = $_FILES["imgs"]["name"];
        $fileTypes = $_FILES["imgs"]["type"];
        $fileTmps = $_FILES["imgs"]["tmp_name"];
        $fileSizes = $_FILES["imgs"]["size"];

        // // Allow certain file formats 
        // $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        $images = array(); // initialize an empty array to store image data
        // Lưu giữ lại tên của các hình ảnh đã upload


        // test resize img
        foreach ($fileTmps as $key => $tmp_name) {
            $fileName = $fileNames[$key];
            $fileType = $fileTypes[$key];
            $fileSize = $fileSizes[$key];

            // Check if the file is an image and the size is within limits

            $imgContent = file_get_contents($tmp_name);

            // Create a new image from the file content
            $srcImg = imagecreatefromstring($imgContent);

            // Get the current dimensions of the image
            $srcWidth = imagesx($srcImg);
            $srcHeight = imagesy($srcImg);

            // Calculate the new dimensions for the resized image
            $dstWidth = 800;
            $dstHeight = 600;

            // Create a new blank image with the new dimensions
            $dstImg = imagecreatetruecolor($dstWidth, $dstHeight);

            // Copy and resize the original image onto the new image canvas
            imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $dstWidth, $dstHeight, $srcWidth, $srcHeight);

            // Get the binary data of the resized image
            ob_start();
            imagejpeg($dstImg);
            $imgContentResized = ob_get_clean();

            // Add the resized image to the array of images to be inserted into the database
            $images[] = array(
                'name' => $fileName,
                'type' => $fileType,
                'size' => $fileSize,
                'content' => $imgContentResized
            );

            // Clean up memory used by the images
            imagedestroy($srcImg);
            imagedestroy($dstImg);
        }


        $serializedImages = serialize($images); // serialize the array of images
        $blood_type = 1;
    }
    //echo $update;

    if ($update) {


        //echo $update;
        // Lấy dữ liệu từ bảng kì đánh giá để cập nhật vào bảng
        $st2 = "SELECT * FROM " . TABLE . "_evaluation_" . $get['year'] . " 
        WHERE count_evaluation = " .  $post['count'];
        $row2 =  $db->query($st2)->fetch();
        //echo $st2;

        // check blood type
        $ck = '';
        if ($blood_type == 1) {
            // if the blood type is not null, bind it as a string parameter

            $ck = 'images= :images,';
            // $stmt = $db->prepare($st);
            // $stmt->bindParam(':images', $serializedImages);
        }


        // Cách khác: kiểm tra hình ảnh có trong biến txt_url
        //$img_url
        $img_url = $nv_Request->get_title('txt_url', 'post');
        $img_db_arr = explode('|', $img_url);
        // var_dump('db='.$img_db_arr);
        $imgs_new = unserialize($serializedImages);
        // foreach ($imgs_new as $img){
        // print(base64_encode('new img='.$img['content']).'<br>');
        // print('----------------------------------------'.'<br>');
        // }
        // $imgContent = file_get_contents($img);br
        // print($imgContent);

        //Kiểm tra hình ảnh đã có trong db
        $sql = "SELECT * FROM " . TABLE . "_report_details_" . $get['year'] . "  where id= " . $id_report_detail;
        //    print($sql);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $imageData = unserialize($row['images']);

        //imageData biến lưu các hình ảnh 
        // var_dump($imageData);
        // // Lấy mảng images các hình ảnh mới up
        $imgs_new = unserialize($serializedImages);
        // //  Lấy tổng 2 mảng image hợp lại để đưa vào db
        if (is_array($imageData) && is_array($imgs_new)) {
            // print('OK');
            $allImages = array_merge($imageData, $imgs_new);
            $serializedAllImages = serialize($allImages);
        } else {
            // print('NOT OK');
            if (!empty($serializedImages))
                $serializedAllImages = $serializedImages;
            else
                $serializedAllImages = serialize($imageData);
        }

        //kiểm tra trạng thái
        //echo 'status='. $status;
        $st = "UPDATE " . TABLE . "_report_details_" . $get['year'] .
            " SET evaluation_type = :evaluation_type,
             arr_question_type= :arr_question_type,
             arr_result_question= :arr_result_question,
             total_score = :total_score,
             rating = :rating,
             arr_team = :arr_team,
             images= :images,
             from_date= :from_date,
             to_date= :to_date,
             content = :content,
             created_date = :created_date,
             arr_question = :arr_question,
             name_report = :name_report,
            recommendation = :recommendation,
            limitation = :limitation,
            bonus = :bonus,
            discipline = :discipline,
            m0 = :m0,
            m1 = :m1,
            m2 = :m2,


            status = :status
         WHERE id = :id_report_detail";
        //print($st);


        $stmt = $db->prepare($st);
        $stmt->bindParam(':evaluation_type', $post['evaluation_type']);
        $stmt->bindParam(':arr_question_type', $imploded_arr);
        $stmt->bindParam(':arr_result_question', $arr_result);
        $stmt->bindParam(':total_score', $total_score);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':arr_team', $row2['teams']);


        // // check imag có tồn tại       
        if (!empty($serializedAllImages)) {
            // if the blood type is not null, bind it as a string parameter
            $stmt->bindParam(':images', $serializedAllImages);
        } else {
            // if the blood type is null, bind it as a null parameter
            $vl = null;
            $stmt->bindParam(':images', $vl, PDO::PARAM_NULL);
        }
        $stmt->bindParam(':from_date', $row2['from_date']);
        $stmt->bindParam(':to_date', $row2['to_date']);
        $stmt->bindParam(':content', $row2['content']);
        $stmt->bindParam(':created_date', $post['created_date']);
        $stmt->bindParam(':arr_question', $imploded_question);
        $stmt->bindParam(':name_report', $name_report);

        $stmt->bindParam(':recommendation', $post['name_recommendation']);
        $stmt->bindParam(':limitation', $post['name_limitation']);

        $stmt->bindParam(':bonus', $post['name_bonus']);
        $stmt->bindParam(':discipline', $post['name_discipline']);
        


        $stmt->bindParam(':m0', $m0);
        $stmt->bindParam(':m1', $m1);
        $stmt->bindParam(':m2', $m2);
        //$stmt->bindParam(':discipline', $post['name_discipline']);


        $stmt->bindParam(':id_report_detail', $id_report_detail);
        $stmt->bindParam(':status',  $status);

        //echo 'test=' . $id_report_detail;

        $count = $stmt->execute();
        //echo $count;
    } else {


        $st = "INSERT INTO " . TABLE . "_report_details_" . $get['year'] . " 
        ( images ,evaluation_type, arr_question_type, arr_result_question,total_score, rating, arr_team, from_date,to_date,created_date,
        arr_question, recommendation, limitation, bonus, discipline, m0, m1, m2, count, account_report,id_report,name_report,account_input, content,status
        )
        VALUES 
        (:images ,:evaluation_type,:arr_question_type,:arr_result_question,:total_score, :rating,:arr_team, :from_date,:to_date,:created_date,
        :arr_question, :recommendation,:limitation, :bonus, :discipline, :m0, :m1, :m2, :count,:account_report,:id_report,:name_report,:account_input,:content,:status
        )";
                 //print($st);
        $stmt = $db->prepare($st);
        $stmt->bindParam(':evaluation_type', $post['evaluation_type']);
        $stmt->bindParam(':arr_question_type', $imploded_arr);
        $stmt->bindParam(':arr_result_question', $arr_result);
        $stmt->bindParam(':total_score', $total_score);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':arr_team', $row2['teams']);
        //    $blood_type = 'No image';
        //     $stmt->bindParam(':images', $blood_type,PDO::PARAM_STR);
        // $blood_type = null;
        // $stmt->bindParam(':images', $blood_type, PDO::PARAM_NULL);
        if ($blood_type == 1) {
            // if the blood type is not null, bind it as a string parameter
            $stmt->bindParam(':images', $serializedImages);
        } else {
            // if the blood type is null, bind it as a null parameter
            $vl = null;
            $stmt->bindParam(':images', $vl, PDO::PARAM_NULL);
        }

        //         $stmt->bindParam(':images', $serializedImages);
        // //         // $blood_type = 'No image';
        // //         // $stmt->bindParam(':images', $blood_type,PDO::PARAM_STR);
        $stmt->bindParam(':from_date', $row2['from_date']);
        $stmt->bindParam(':to_date', $row2['to_date']);
        //         // $stmt->bindParam(':content', $row2['content']);
        $stmt->bindParam(':created_date', $post['created_date']);
        $stmt->bindParam(':arr_question', $imploded_question);
        $stmt->bindParam(':recommendation', $post['name_recommendation']);
        $stmt->bindParam(':limitation', $post['name_limitation']);

        $stmt->bindParam(':bonus', $post['name_bonus']);
        $discipline_new = $post['name_discipline'];
        $stmt->bindParam(':discipline',  $discipline_new);

        //print ( $post['name_discipline']);


        $stmt->bindParam(':m0', $m0);
        $stmt->bindParam(':m1', $m1);
        $stmt->bindParam(':m2', $m2);


        $stmt->bindParam(':count', $post['count']);
        $stmt->bindParam(':account_report', $post['account_report']);
        $stmt->bindParam(':id_report', $id_report);
        $stmt->bindParam(':name_report', $name_report);
        $stmt->bindParam(':account_input', $user_info['username']);
        $stmt->bindParam(':content', $row2['content']);
        //$status = 1;
        $stmt->bindParam(':status',  $status);
        // $user_info['username']

        $count = $stmt->execute();
    }

    //kiểm tra lần đánh giá để cập nhật trạng thái
    // Tính tổng số khoa phòng thực tế
    $st = "Select count(id) FROM " . TABLE . "_groupuser where status = 1";
    $row = $db->query($st)->fetch();
    $arr['tc'] =  $row['count(id)'];
    //Tổng số khoa phòng đã đánh giá
    // Tổng số khoa phòng đã đánh giá
    $st = "Select  count(id) FROM " . TABLE . "_report_details_" . $get['year'] . "
	WHERE status >0 AND id_report <=5 AND count =" . $post['count'] . " order by count asc";
    $row = $db->query($st)->fetch();
    $arr['tt'] =  (int)$row['count(id)'];
    //$arr['tt'] =18;
    //kiểm tra và cập nhật trạng thái đánh giá trong bảng evaluation
    if ($arr['tt'] >= $arr['tc']) {
        $st2 = "UPDATE " . TABLE . "_evaluation_" . $get['year'] .
            " SET status = 2 WHERE count_evaluation =" . $post['count'];
        //echo $st2;
        $count = $db->exec($st2);
    }

    //else

    //echo 'tt='. $arr['tt'].' | '.'tc='.$arr['tc'] ;
    //else echo '<';
    //echo $arr['tc'];
    //$arr['tc']=100;
}


$xtpl->parse('main.buttons');
/*End Code for Here*/
//truyền biến vào form action
$xtpl->assign('POST', $post);
// Check submit, nếu submit thì giữ lại thông tin đang cập nhật
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&edit_id=' . $get['year'] . '_' . $get['id_report']);

$xtpl->assign('link_submit', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&edit_id=' . $get['year'] . '_' . $get['id_report'] . '&idd=' . $get['idd']);
//if (!isset($post['submit']))

// else
//     $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&edit_id=' . $get['year'] . '_' . $get['id_report'] . '&idd=' . $get['idd']);
// add link to form frm
// $xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&edit_id=' . $get['year'] . '_' . $get['id_report'] . '&idd=' . $get['idd']);


$func = 'first_setup';
$xtpl->assign('link_back', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func);
//check loi
//$xtpl->assign('checkloi',$st);

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
