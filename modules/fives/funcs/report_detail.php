<?php

/**
 * @Project BCB SOLUTIONS
 * @Author Mr Duy <vuduy1502@gmail.com>
 * @Copyright (C) 2023 Mr Duy. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 19 Mar 2023 05:56:44 GMT
 */

if (!defined('NV_IS_MOD_FIVES'))
    die('Stop!!!');

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

// create_evaluation();
if (empty($user_info)) {
    $url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';
    Header('Location: ' . nv_url_rewrite($url, true));
    exit();
}

$array_data = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);


//code here
// Hiển thị thông tin 12 lần đánh giá
$get = array();
$post = array();
// Lấy thông tin năm mặc định
$st = "Select year FROM " . TABLE . "_setup WHERE set_default = 1";
$row_default = $db->query($st)->fetch();
$get['year']  =  $row_default['year'];
//cho $get['year'];
$xtpl->assign('nam', $get['year']);
$xtpl->assign('hien_bieumau', 'hidden');
$xtpl->assign('hien_nutexcel', 'hidden');

// Lấy các thông tin trong bản optiopn
$st = "SELECT * FROM " . TABLE . "_option where status =1";
$row_op = $db->query($st)->fetch();
if (count($row_op) > 0) {
    $arr_op = array();
    $arr_op = $row_op['count'];
    $arr_op = explode(";", $arr_op);


    // // lấy mảng điểm mặc định (0,1,2)
    $arr_score = array();
    $arr_score = $row_op['score'];
    $arr_score = explode(';', $arr_score);
    //var_dump($arr_score);
}
//lấy dữ liệu từ khoa, kỳ đánh giá


// Lấy thông tin năm mặc định

// Lấy tên khoa phòng
$st = "SELECT tenkhoa,account FROM " . TABLE . "_groupuser WHERE id_nhomquyen !=101 ORDER BY tenkhoa DESC ";
$dskhoa = $db->query($st)->fetchALL();
foreach ($dskhoa as $ds) {

    //Lấy ra các kỳ đánh giá trong bảng details
    $st = "SELECT count,status FROM " . TABLE . "_report_details_" . $get['year'] . "  
    where id_report < 5 and status > 0 and account_report= '" . $ds['account'] . "'
    GROUP BY count, status
    ORDER BY count asc";

    $rows =  $db->query($st)->fetchALL();
    for ($i = 0; $i < count($arr_op); $i++) {

        $dscount[$i] = $rows[$i]['count'];
        $dsstatus[$i] =  $rows[$i]['status'];

       

    }

    //echo $st;
    // Đưa vào danh sách các lần đánh giá
    // var_dump($arr);
    $j = 0;
    foreach ($arr_op as $r) {
        //print($r);
        if (in_array($r, $dscount))
            //check status
            ($dsstatus[$j] == 2) ? $ds2['class'] = "btn btn-success" : $ds2['class'] = "btn btn-warning";
        else
            $ds2['class'] = "btn btn-outline-success";
         


        $token = $get['year'] . '_' . $r . '_' . md5($client_info['session_id'] . $user_info['username']);
        $ds2['link_landanhgia'] =  MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&view_id=' . $token;
        $ds2['count'] = $r;
        //print($ds2['count']);

        $ds2['account'] = $ds['account'];
        $j++;
        $xtpl->assign('LIST', $ds2);
        $xtpl->parse('main.DSKHOA.LIST');
    }
    $xtpl->assign('DSKHOA', $ds);
    $xtpl->parse('main.DSKHOA');
}

// kiem tra link chọn lần đánh giá
$get['idd'] = $nv_Request->get_title('idd', 'get,post', '');
if (!empty($get['idd']) && !empty($get['year'])) {
    // $get['idd'] = $nv_Request->get_title('idd', 'get,post', '');
    $arr_idd = explode('_', $get['idd']);
    $get['account_view'] = $arr_idd[0];
    $get['count_report'] = $arr_idd[1];

    $xtpl->assign('hien_bieumau', '');
    $xtpl->assign('hien_nutexcel', '');

  

    //bắt đầu xử lý các thông tin trong biểu mẫu
    //Lấy nhóm câu hỏi

    $st = "SELECT * FROM " . TABLE . "_report_details_" .  $get['year'] . " Where account_report ='" .  $get['account_view'] . "'
    AND count ="  . $get['count_report'] . " AND status >0  AND id_report < 5";
    //echo $st;     
    $ds = $db->query($st)->fetch();
    if (!empty($ds['count'])) {

        $func = 'edit_evaluation';
        //gan vào nút đánh giá
        $xtpl->assign('link_dg', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func . '&edit_id=' . $get['year'] . '_' . $ds['id_report'] . '&idd=' . $get['idd']);


        $arr1 = $ds['arr_question_type'];
        $arr1 = explode(';', $arr1);
        $imploded_arr = implode(',', $arr1);
        //echo ('no');

        // Lấy mảng câu trả lời
        $arr_result =  $ds['arr_result_question'];
        $arr_result = explode(';', $arr_result);

        //Lấy ds đề xuất ,kiến nghị

        //Lấy đs hạn chế, nguyên nhân

        //lấy câu hỏi tương tứng với nhóm câu hỏi
        $m = 0;
        $k = 0;
        $i = 0;
        $j = 0;
        $m0 = 0; //mức 0
        $m1 = 0;
        $m2 = 0;

        $st1 = "SELECT * FROM " . TABLE . "_question_type_" .  $get['year'] . " Where id_question_type IN ($imploded_arr)";
        $num = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'];
        //echo $st1;
        $groups = $db->query($st1)->fetchAll();

        foreach ($groups as $group) { //lặp nhóm

            $st2 = "SELECT * FROM " . TABLE . "_question_" . $get['year'] . " 
                    WHERE id_question_type = " . $group['id_question_type'] . "
                    ";
            $rows2 = $db->query($st2)->fetchAll();

            foreach ($rows2 as $row) {
                // Lay thong tin ket wa tư bang report_detail đã có
                $stt = 1;
                foreach ($arr_score as $t) {
                    //echo('score='.$t);
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
                    } else
                        $score['check'] = '';

                    $xtpl->assign('stt', $stt);
                    $xtpl->assign('score', $score);
                    $xtpl->parse('main.group.question.score');
                }

                $row['stt'] = $i + 1;
                $i = $i + 1;
                $id_question_details[$i] = $row['id_question'];
                $xtpl->assign('question', $row);
                $xtpl->parse('main.group.question'); // show các giá trị trong nhóm
                $m++;
            }

            $group['stt'] = $num[$k];
            $k = $k + 1;
            $xtpl->assign('group', $group);
            $xtpl->parse('main.group'); // kết thúc 1 nhóm để lặp qua giá trị nhóm khác

        }

        //echo  'total_score='.$ds2['total_score'];
        //đưa vào mảng  tieumuc
        $xtpl->assign(
            'tieumuc',
            $ds2 = array(
                'm0' => $m0,
                'm1' => $m1,
                'm2' => $m2,
                'tongso' => $n,
                'total_score' => $ds['total_score'],
                'tyle' => ($n / 50) * 100,
                'dtb' => round($n / 50, 2)
            )
        );

        // lấy thông tin chung: thời gian dg, ngày dg, tenkhoa, tvien dg, de xuat
        $st = "SELECT * FROM " . TABLE . "_groupuser where account like '" . $get['account_view'] . "'";
        $row = $db->query($st)->fetch();
        $arr2 = array();
        $arr2['tenkhoa'] = $row['tenkhoa'];
        $arr2['landanhgia'] = $ds['count'];
        $arr2['ngaydanhgia'] =  $ds['created_date'];
        //lấy kiến nghị, đề xuất
        //$arr['recommendation'] = $ds['recommendation'];
        $ds_re = ltrim($ds['recommendation'], '-');
        $ds_re =  explode('-',  $ds['recommendation']);
        for ($j = 1; $j < count($ds_re); $j++) {
            //echo $ds_re[$j] . '</br>';
            //$dstv[i] =
            $arr2['re'] = $ds_re[$j];
            $xtpl->assign('DS', $arr2);
            $xtpl->parse('main.DS');
        }


        $team = $ds['arr_team'];
        $teams = explode(';', $team);
        for ($i = 0; $i < count($teams); $i = $i + 1) {

            $arr2['tv'] = $teams[$i];
            $xtpl->assign('dstv', $arr2);
            $xtpl->parse('main.dstv');
        }

        // print($arr['ngaydanhgia']);
        //echo $ds['name_report'];
        $arr2['khoa_lan'] = $arr2['tenkhoa'] . '_' . $arr2['landanhgia'] . '_' . $get['year'];
        $arr2['tenbaocao'] = $ds['name_report'];
        $xtpl->assign('thongtinchung', $arr2);
        $xtpl->parse('main.thongtinchung');

        // Dua dư liệu vào khuyen nghi, de xuat
        //$xtpl->assign('recommendation', $ds['recommendation']);
        //$xtpl->parse('main.recommendation');

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

        //kết thúc xử lý biểu mẫu
        // print('account_view=' .$get['count_report'] .'----');
    } else { //kỳ đánh giá đã hoặc đang hoàn thành
        //echo 'ẩn';
        $xtpl->assign('hien_bieumau', 'hidden');
        $xtpl->assign('hien_nutexcel', 'hidden');

        //thong bao kỳ dánh giá chưa khởi tạo
        $arr2['khoa_lan'] = 'Lưu ý: Lần đánh giá: '.$get['account_view'].'_'.$get['count_report'].' chưa được đánh giá!';       
        $xtpl->assign('thongtinchung', $arr2);
        $xtpl->parse('main.thongtinchung');

        }
}



//$xtpl->assign('token', $token);
$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&year=' . $get['year']);


$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
