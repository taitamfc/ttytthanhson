<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

//assignment 2 Thực hiện nhiệm vụ



$thongke = array();
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
$xtpl->assign('BASE_URL', NV_BASE_SITEURL);

/*Code for Here*/
$post = array();
$get = array();

if (isset($_POST['submit_button'])) {
    $post['submit'] = $_POST['submit_button'];
}

// Kiem tra submit
if (isset($post['submit'])) {
    // Get giá trị trong các control form
    //lấy các giá trị tên control trong bảng voting_row_a
    $st = "Select rows_numv,controlname FROM " . TABLE . "_voting_rows_a 
    Where status = 1
    group by rows_numv,controlname
    order by rows_numv asc ";
    $rows = $db->query($st)->fetchAll();
    $tencot = "(masobc_a,";
    $values = "VALUES(:masobc_a,";
    $data_insert = array();
    foreach ($rows as $row) {
        //dua vào mảng control
        $post[$row['controlname']] = $nv_Request->get_title($row['controlname'], 'post');
        empty($post[$row['controlname']]) ?  $post[$row['controlname']] = NULL : '';
        empty($post[$row['controlname']]) ?  $data_insert[$row['controlname']] = NULL :
            $data_insert[$row['controlname']] = $post[$row['controlname']];
        //echo $row['controlname'] . '=' . $post[$row['controlname']] . '<br>';
        $tencot .= $row['controlname'] . ',';
        $values .= ':' . $row['controlname'] . ',';
    }
    $tencot = rtrim($tencot, ',') . ")";
    $values = rtrim($values, ',') . ")";


    //cách 2
    //kiểm tra bảng dữ liệu rỗng hay có dữ liệu
    $st = "SELECT max(id) as count_v FROM " . TABLE . "_voted_result_a ";
    $result = $db->query($st)->fetch();
    //tạo mã báo cáo tự động
    (empty($result['count_v'])) ? $data_insert['masobc_a'] = Generate_Maso('1') : $data_insert['masobc_a'] = Generate_Maso($result['count_v'] + 1);
    // cập nhật thời gian update
    $capnhat = date('Y-m-d H:i:s');
    echo $capnhat;
    // $date_insert['capnhat'] = $capnhat;
    $st = "INSERT INTO " . TABLE . "_voted_result_a " . $tencot . ' ' . $values;
    $row_id = $db->insert_id($st, 'id', $data_insert);
    $ketqua['status'] = ($row_id > 0) ? 'OK' : 'ERR';
    echo '<br>' . $ketqua['status'];
}


//đưa danh sách số lượng thông tin khảo sát
$st1 = "Select * FROM " . TABLE . "_voting_a where status = 1 and numv <=21 order by numv asc  ";
//echo $st;
$id = 0; //lưu lại số lượng các câu hỏi trong 1 lần khảo sát

$groups = $db->query($st1)->fetchAll();
$stt0 = 0; //pre idmodal
$stt1 = 2; //next idmodal

foreach ($groups as $group) {

    if (intval($group['numv']) == 1) {
        $stt0 = count($groups); //pre idmodal
        $stt1 = 2;
        $xtpl->assign('hiennut', '');
    } else if (intval($group['numv']) == count($groups)) {
        $stt0 = $stt1 - 1;
        $stt1 = 1;
        //hien thi nut submit
        $nutsubmit = '<button type="submit" class="btn  btn-warning " id="modal_submit" name="submit_button"
        
        ><i class=""></i>Gửi báo cáo</button>';
        $xtpl->assign('HIENTHI', $nutsubmit);
        $xtpl->assign('hiennut', 'hidden');
    } else {
        //$xtpl->assign('hiennut', '');
        $stt0 = $stt1 - 1;
        $stt1 = $stt1 + 1;
    }


    //echo 'modal=' . $group['numv'] . '----p=' . $stt0 . '---n=' . $stt1 . '<br>';
    //lấy ra cau hoi tương ứng vs nhóm câu hỏi
    $st2 = "Select * FROM " . TABLE . "_voting_rows_a
    WHERE status = 1 and rows_numv =" . $group['numv'] . "
    ";
    (intval($group['numv']) == 0) ? $group['numv'] = '' : '';
    $rows = $db->query($st2)->fetchAll();
    $xtpl->assign(
        'NHOMCAUHOI',
        array(
            'tennhom' => $group['question'],
            'ghichu' => $group['comment'],
            'stt' => $group['numv'],
            'stt0' => $stt0,
            'stt1' => $stt1,
            'vid' => $group['vid']
        )
    );

    //echo $group['numv'].'. '.$group['question'].':';
    foreach ($rows as $row) {
        //kiểm tra loại control để tạo tự động trong modal form
        //echo '<br>';
        //echo '----'.$row['v_id'].'. '.$row['title'].':';
        $id++;
        switch ($row['type_control']) {
            case 'text':
                $form_control = '<div class="mb-3">
              <label class="form-label">' . $row['title'] . '</label>
              <input type="text" class="form-control form-control-lg" id="idtext' . $id . '" name="' . $row['controlname'] . '" />
             
             
            </div>';
                break;

            case 'radio':
                //lấy các giá trị trong cột value đưa vào radio
                $arr = $row['value'];
                $arr = explode(';', $arr);
                $form_control = '<td>
                <label class="form-label">' . $row['title'] . '</label>
                </td><td>
                ';

                foreach ($arr as $r) {
                    //.=  in ra nhiều control trên form
                    $form_control .= '                    
                    <div class="form-check form-check-inline">                     
                    <input class="form-check-input" type="radio" name="' . $row['controlname'] . '" id="idradio' . $id . '" value="' . $r . '"
                    >
                    <label class="form-check-label" for="radio' . $id . '" >' . $r . '</label>
                  </div>';
                }
                $form_control .= '</td>';
                break;

            case 'radiog':
                $form_control = '<td >
                <div class="border p-3 rounded">                     
               
                    
                    <label class="w-100">
                    <input type="radio" id="radCreateMode" name="mode" value="create" onchange="handleRadioChange(event)"
                    data-next-button="#nextbutton' . $group['numv'] . '"/>
  <i>' . $row['title'] . '</i>
</label>
                                       
                  
                
                </div>           
              
                    </td>';
                break;

            case 'textarea':
                $form_control = ' <td><textarea id="idtextarea' . $id . '" name="' . $row['controlname'] . '" rows="4"
                    class="form-control form-control-lg"></textarea></td>';
                break;

            case 'textareak':
                $form_control = ' <td><textarea id="idtextarea' . $id . '" name="' . $row['controlname'] . '" rows="4"
                        class="form-control form-control-lg">' . $row['title'] . '
                        </textarea></td>';
                break;


            case 'listkp':
                //tạo list danh sách khoa phòng
                $st1 = "SELECT * FROM " . TABLE . "_groupuser where status = 1 order by tenkhoa";
                // print($st2);
                $rows = $db->query($st1)->fetchAll();
                $form_control = '
                <label class="form-label">' . $row['title'] . '</label>
                <select id="khoaphong" name="kpbc" class="form-control form-control-lg" placeholder="Chọn Khoa/Phòng"
                title="" data-toggle="tooltip" data-original-title="Chọn Khoa/Phòng">
                <option value="" disabled selected>Chọn Khoa/Phòng</option>';

                foreach ($rows as $row) {
                    $form_control .= '<option value="' . $row['tenkhoa'] . '">' . $row['tenkhoa'] . '</option>';
                }
                $form_control .= '</select>';
                break;

            case 'check':
                $form_control = '
                
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="' . $row['controlname'] . '" id="idcheck' . $id . '" value="1">
                <label class="form-label">' . $row['title'] . '</label>
              </div>';
                break;

            case 'datetime':
                $form_control = '
            
                <div class="mb-3"> 
                <label class="form-label">' . $row['title'] . '</label>
                    <input class="form-control form-control-lg" type="text" id="datetimepicker" name="' . $row['controlname'] . '" 
                    placeholder="Thời gian báo cáo" />
                    </div>';
                break;

            case 'date':
                $form_control = '
                <div class="mb-3"> 
                <label class="form-label">' . $row['title'] . '</label>             
                            
                <input class="form-control form-control-lg" type="text" name="' . $row['controlname'] . '" id="datepicker" placeholder="Chọn ngày sinh" />
                </div>';
                break;

            default:
                $form_control = '';
        }


        $xtpl->assign('CAUHOI', array(
            'title' => $row['title'],
            'type_control' => $row['type_control'],
            'form_control' => $form_control,
            'value' => $row['value']

        ));
        $xtpl->parse('main.NHOMCAUHOI.CAUHOI');

        //echo $row['type_control'].'|';
    }
    $xtpl->parse('main.NHOMCAUHOI');
    $xtpl->parse('main.DS');
    //echo '<br>';
}


/*
// Đưa dữ liệu vào combo chọn khoa phòng đánh giá

$str1 = $rs[0]['view_report'];
// $str2 = str_word_count($str1, 1, '1..9ü');
// print_r($str3);
$str2 = explode(';', $str1);
$st1 = "SELECT * FROM " . TABLE . "_groupuser";
// print($st2);
$rows = $db->query($st1)->fetchAll();
foreach ($rows as $row) {
    // kiểm tra khoa phòng đã chọn có trong danh sách nhóm người dùng thì set thuộc tính selected   
    (in_array($row['account'], $str2)) ? $row['selected'] = 'selected' : $row['selected'] = '';
    $xtpl->assign('department', $row);
    $xtpl->parse('main.department');
}


*/
//hàm tạo mã số bc dạng 00000x
function Generate_Maso($number)
{
    $formattedNumber = str_pad($number, 5, "0", STR_PAD_LEFT);
    return date("Y") . ".MSBC." . $formattedNumber;
}

$xtpl->parse('main.buttons');
/*End Code for Here*/
//truyền biến vào form action
$xtpl->assign('POST', $post);


$xtpl->assign('link_frm', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op);
$xtpl->parse('main');
$contents = $xtpl->text('main');


include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
