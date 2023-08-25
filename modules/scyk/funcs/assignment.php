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




//test submit new
$data_frms = $nv_Request->get_title('sta', 'get,post', '');
if (!empty($data_frms)) {

    // Get giá trị trong các control form
    //lấy các giá trị tên control trong bảng voting_row_a
    //kiểm tra chọn mức độ xảy ra nặng hay chưa    
    $st = "Select rows_numv,controlname FROM " . TABLE . "_voting_rows_a 
        Where status = 1 and rows_numv <=21 and issave = 1
        group by rows_numv,controlname
        order by rows_numv asc ";
    //echo $st;
    $rows = $db->query($st)->fetchAll();
    $tencot = "";

    foreach ($rows as $row) {
        //dua vào mảng control
        $post[$row['controlname']] = $nv_Request->get_title($row['controlname'], 'post,get');
        empty($post[$row['controlname']]) ?  $post[$row['controlname']] = NULL : '';
        empty($post[$row['controlname']]) ?  $data_insert[$row['controlname']] = NULL :
            $data_insert[$row['controlname']] = $post[$row['controlname']];
        //echo $row['controlname'] . '=' . $post[$row['controlname']] . '<br>';
        $tencot = $row['controlname'] . ',' . $tencot;
        $values = ':' . $row['controlname'] . ',' . $values;
    }
    //$tencot.= "masobc_a)";
    $tencot = rtrim($tencot, ',');
    $tencot = '(' . ltrim($tencot, ',') . ",masobc_a)";
    $values = rtrim($values, ',:') . ",:masobc_a)";
    $values = "VALUES(" . $values;

    //cách 2
    //kiểm tra bảng dữ liệu rỗng hay có dữ liệu
    $st = "SELECT max(id) as count_v FROM " . TABLE . "_voted_result_a ";
    $result = $db->query($st)->fetch();
    //tạo mã báo cáo tự động
    (empty($result['count_v'])) ? $data_insert['masobc_a'] = Generate_Maso('1') : $data_insert['masobc_a'] = Generate_Maso($result['count_v'] + 1);

    // cập nhật thời gian update  

    // Create a DateTime object by parsing the input date string
    $dateString = $data_insert['thoigian'];

    // Convert date string to DateTime object
    $dateTime = DateTime::createFromFormat('d/m/Y H:i:s A', $dateString);

    if ($dateTime !== false) {
        // Format DateTime object to MySQL datetime format
        $formattedDate = $dateTime->format('Y-m-d H:i:s'); // Use "H" for 24-hour format

        // Now you can use $formattedDate to insert into your MySQL database
        $data_insert['thoigian'] = $formattedDate;
        //echo 'MASOBC: '.$data_insert['masobc_a'].'---' . $formattedDate;
    } else {
        $data_insert['thoigian'] = date("Y-m-d H:i:s", time());
        //echo 'MASOBC: '.$data_insert['masobc_a'].'---' . $data_insert['thoigian'];
    }

    //$data_insert['thoigian'] = date("Y-m-d H:i:s", time()); 
    $capnhat = $data_insert['thoigian'];
    $st1 = "INSERT INTO " . TABLE . "_voted_result_a " . $tencot . ' ' . $values;
    $row_id = $db->insert_id($st1, 'id', $data_insert);
    //echo $st1;

    //cập nhật masobc sang bảng b
    //echo $data_insert['masobc_a']; 
    $masobc_b = $data_insert['masobc_a'];
    $capnhat =  $data_insert['thoigian'];
    //update 14/08
    $thoigian = $data_insert['thoigian'];
    $st2 = "INSERT INTO " . TABLE . "_voted_result_b (masobc_b,capnhat,thoigian) " . "VALUES('" . $masobc_b . "','" . $capnhat . "'
    ,'" . $thoigian . "')";
    //echo $st2;
    $row_id2 = $db->exec($st2);


    //test kết wả trả về json
    $ketqua['status'] = ($row_id2 > 0) ? 'OK' : 'ERR';
    $lang_module['yeucau_ok'] = $st2;

    $ketqua['status'] = 'ok';
    $ketqua['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
    $ketqua['mess'] = ($row_id2 > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err']; //	
    //nv_jsonOutput($ketqua);
    //exit;    





    $post['sm_btn'] = $_POST['sm_btn'];
    $data['first_name'] = $nv_Request->get_title('first_name', 'get,post', '');
    $data['message'] = $nv_Request->get_title('message', 'get,post', '');

    $data['camket2'] = $nv_Request->get_title('camket2', 'get,post', '');

    $data['kpbn'] = $nv_Request->get_title('kpbn', 'get,post', '');


    $data['label'] = 'Test Submit_report'; //nv_clean60(str_replace('Khoa','K.',$r['label']),15);
    $data['value'] = '1';
    $data['url'] = MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op; //.'&token=edit_'.$namkhoitao;
    $data['status'] = ($row_id2 > 0 && $row_id > 0) ? 'ok' : 'err';
    $data['mess'] = ($row_id2 > 0) ? sprintf($lang_module['yeucau_ok'], $ketqua['url']) : $lang_module['yeucau_err'];

    //var_dump($data);
    //nv_jsonOutput($data);
}






//đưa danh sách số lượng thông tin khảo sát
//kiểm tra bảng dữ liệu rỗng hay có dữ liệu
$st = "SELECT max(id) as count_v FROM " . TABLE . "_voted_result_a WHERE status > 0 ";
$result = $db->query($st)->fetch();
//tạo mã báo cáo tự động
(empty($result['count_v'])) ? $masobc = Generate_Maso('1') : $masobc = Generate_Maso($result['count_v'] + 1);
$xtpl->assign('MABC', $masobc);

$st1 = "Select * FROM " . TABLE . "_voting_a where status = 1 and numv <=22 order by numv asc  ";
//echo $st;
$id = 0; //lưu lại số lượng các câu hỏi trong 1 lần khảo sát

$groups = $db->query($st1)->fetchAll();
$stt0 = 0; //pre idmodal
$stt1 = 2; //next idmodal
$stt_nhom = 0;


foreach ($groups as $group) {

    if (intval($group['numv']) == 1) {
        $stt0 = count($groups); //pre idmodal
        $stt1 = 2;
        $xtpl->assign('hiennut', '');
        $xtpl->assign('hiennut2', 'hidden');
        $xtpl->assign('hiennut_sm', 'hidden');

    } else if (intval($group['numv']) == count($groups)) {
        $stt0 = $stt1 - 1;
        $stt1 = 1;
        //hien thi nut submit
        
        $xtpl->assign('hiennut_sm', '');
        $xtpl->assign('hiennut', 'hidden');
        $xtpl->assign('hiennut2', '');
    } else {
        $xtpl->assign('hiennut2', '');
        $xtpl->assign('hiennut_sm', 'hidden');

        $stt0 = $stt1 - 1;
        $stt1 = $stt1 + 1;
    }


    //echo 'modal=' . $group['numv'] . '----p=' . $stt0 . '---n=' . $stt1 . '<br>';
    //lấy ra cau hoi tương ứng vs nhóm câu hỏi

    $st2 = "Select * FROM " . TABLE . "_voting_rows_a
    WHERE status = 1 and rows_numv =" . $group['numv'] . " 
    ";
    //(intval($group['numv']) == 1) ? $group['numv'] = '' : $group['numv'] = $stt_nhom;
    (intval($group['ask'] == 1)) ? $group['ask'] = ' (<span style="color: red">*</span>)' : $group['ask'] = '';
    $rows = $db->query($st2)->fetchAll();
    $xtpl->assign(
        'NHOMCAUHOI',
        array(
            'tennhom' => $group['question'],
            'ghichu' => $group['comment'],
            'ask' => $group['ask'],
            'stt' => $group['numv'],
            'stt0' => $stt0,
            'stt1' => $stt1,
            'vid' => $group['vid']
        )
    );
    $stt_nhom = $stt_nhom + 1;

    //echo $group['numv'].'. '.$group['question'].':';
    foreach ($rows as $row) {
        //kiểm tra loại control để tạo tự động trong modal form
        //echo '<br>';
        //echo '----'.$row['v_id'].'. '.$row['title'].':';
        $id++;
        switch ($row['type_control']) {
            case 'text':
                //check sô bệnh án để tạo placehold
                //placeholder="Nhập số bệnh án"
                ($row['controlname'] == 'sobenhan') ? $placeholder = "Nhập số bệnh án" : $placeholder = "";
                $form_control = '<div class="mb-3">
              <label class="form-label">' . $row['title'] . '</label>
              <input type="text" class="form-control form-control-lg" id="idtext' . $id . '" name="' . $row['controlname'] . '" 
              placeholder="' . $placeholder . '"
              
              />
             
             
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
                    <input type="radio"  name="' . $row['controlname'] . '" id="idradiog' . $id . '" value="' . $row['title'] . '"
                    onchange="handleRadioChange(event)"
                    data-next-button="#nextbutton' . $group['numv'] . '"/>
                    ' . $row['title'] . '
                    </label>                                                   
                
                </div>           
              
                    </td>';
                break;

            case 'textarea':
                $form_control = ' <td><textarea id="idtextarea' . $id . '" name="' . $row['controlname'] . '" rows="4"
                    class="form-control form-control-lg"></textarea></td>';
                break;

            case 'textareak':
                $form_control = ' <td><textarea id="idtextarea' . $id . '" name="' . $row['controlname'] . '" rows="10"
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
                <select id="khoaphong" name="' . $row['controlname'] . '" class="form-control form-control-lg" placeholder="Chọn Khoa/Phòng"
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
                //$capnhat = date('d-m-Y H:i:s A');
                $form_control = '
            
                <div class="mb-3"> 
                <label class="form-label">' . $row['title'] . '</label>
                    <input readonly  class="form-control form-control-lg" type="text" id="datetimepicker" name="' . $row['controlname'] . '" 
                     value="" >
                    </div>';
                break;

            case 'date':
                $form_control = '
                <div class="mb-3"> 
                <label  class="form-label">' . $row['title'] . '</label>                        
                            
                <input readonly type="text" placeholder="Nhập ngày/tháng/năm sinh"  class="form-control form-control-lg"  name="' . $row['controlname'] . '" id="datepicker" placeholder="Chọn ngày sinh" />
                </div>';
                break;


            case 'phone':
                $form_control = '
                    <div class="mb-3"> 
                    <label  class="form-label">' . $row['title'] . '</label>                        
                                
                    <input  type="text" maxlength="10" oninput="check_number(event)" placeholder="Nhập số điện thoại"  class="form-control form-control-lg"  
                    id="' . $row['controlname'] . '"
                    name="' . $row['controlname'] . '"  />
                    <p>
                    <p id="error-message"  style="color: red;"></p>
                    </div>';
                break;

            case 'textname':
                $form_control = '
                        <div class="mb-3"> 
                        <label  class="form-label">' . $row['title'] . '</label>                                                         
                        <input  type="text" maxlength="50" oninput="check_alpha(event)" placeholder="Nhập họ tên"  class="form-control form-control-lg"  
                        id="' . $row['controlname'] . '" name="' . $row['controlname'] . '"  />                                            
                        </div>';
                break;

            default:
                $form_control = '';
                break;
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
