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

/*Code for Here*/

$post = array();
$get = array();
$get['id_year'] = $nv_Request->get_title('year', 'get');
// print('id_year=' . $get['id_year']);
// get năm mặc định khi bấm chọn mặc định
$get['default'] = $nv_Request->get_title('default', 'get');
// print('default=' . $get['default']);
// Cập nhật trường mặc định trong database
if (!empty($get['default'])) {
    // $count = $db->exec("UPDATE nv4_vi_fives_setup SET set_default=1 WHERE year=". $get['default']."");
    $count = $db->exec("UPDATE nv4_vi_fives_setup SET set_default=0 WHERE year!=" . $get['default'] . "");
    $st = "UPDATE nv4_vi_fives_setup 
SET set_default = (CASE WHEN year = " . $get['default'] . " THEN 1 ELSE 0 END)
WHERE year = " . $get['default'] . " OR year != " . $get['default'] . "";
    $count = $db->exec($st);
    // print("update $count rows");
}


if (isset($_POST['submit_button'])) {
    $post['submit'] = $_POST['submit_button'];
}

// Kiem tra submit
if (isset($post['submit'])) {
    // Get giá trị trong các control form
    $post['year'] = $nv_Request->get_title('cbo_year', 'post');
    // print('year_submit=' . $post['year']);
    // khởi tạo dữ liệu theo năm được chọn
    // Create_setup($post['year']);

    // test tạo dữ liệu theo năm 12 lần
    // for ($i = 1; $i <= 12; $i++) {
    //     $st = "CREATE TABLE if not exists nv4_vi_fives_evaluation_" . $post['year'] . '_M' . $i . "(
    //         id_evaluation  INT NOT NULL AUTO_INCREMENT,
    //         count_evaluation INT, 
    //         name_evaluation VARCHAR(255),
    //         start_year INT(11) ,
    //         start_time DATETIME,
    //         end_time DATETIME,
    //         note TEXT,
    //         evaluation_member JSON, 
    //         id_department INT,
    //         id_room INT,
    //         status INT,
    //         locked INT,
    //         id_evaluation_type INT,
    //         PRIMARY KEY (id_evaluation))";
    //     print($st);
    //     $count = $db->exec($st);
    //     print("Success, $count rows");
    // }
}

// add vào combox chọn danh sách năm khởi tạo
$rs = array();
for ($i = 2021; $i <= 2025; $i++) {
    $rs['vl'] = $i;
    $xtpl->assign('setcbo', $rs);
    $xtpl->parse('main.setcbo');
    // print('rs='.$rs['vl']);
}





// add vào danh sách các lần đánh giá

for ($i = 1; $i <= 12; $i++) {
    //truyền biến vào vòng lặp
    // check năm mặc định
    $row['class'] = ($i == 1) ? 'btn btn-success' : 'btn btn-success btn-outline-success';
    $row['stt'] = $i;
    //$xtpl->assign('link_evaluation', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&year=' . $row['year']);
    $xtpl->assign('setup', $row);
    $xtpl->parse('main.setup');
}
// Check dữ liệu năm mặc định khi load form
$sql = "Select  * FROM " . TABLE . "_setup 
    WHERE set_default = 1 LIMIT 1";
$rows = $db->query($sql)->fetchAll();
print('r=' . $rows[0]['id_setup']); //get id_setup
if ($rows) {
    // đưa dữ liệu vào khoa phòng khi chọn lần đánh giá
    $sql = "Select * FROM " . TABLE . "_groupuser";
    $rows = $db->query($sql)->fetchAll();
    $i = 0;
    $ids = array();
    $sdata = "";
    var_dump('khoaphòng=' . $rows);
    foreach ($rows as $row) {
        $row['stt'] = $i + 1;
        // get tên phòng của khoa
        $id_department = $row['id_department'];
        $st = "Select  id_department,name_department FROM " . TABLE . "_department
    WHERE id_department = $id_department LIMIT 1";
        // print ($st);
        $rs = $db->query($st)->fetchAll();
        foreach ($rs as $r) {
            $name_department = $r['name_department'];
        }
        $row['name_department'] = $name_department;
        $xtpl->assign('group_user', $row);
        $xtpl->assign('link_edit_id', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func . '&edit_id=' . $y . '_' . $row['id_question_type']);
        $xtpl->parse('main.group_user');
        $i = $i + 1;
    }
    // gán vào link cập nhật lần đánh giá
    $func = 'edit_question_type';
    foreach ($rows as $row) {
        $row['stt'] = $i + 1;
        // gán link theo id_question_type vào thao tác sửa 

        // $row['stt2']= $stt[$i];
        $i = $i + 1;

        // print_r($row['id_department']);
        // $id_department = json_decode($row['id_department']);
        // array_push($ids, $id_department);
        // $row['d1'] = $ids;
        // $sdata = implode(', ', $id_department);        
        // $row['d2'] = $sdata;      
        $xtpl->assign('question_type', $row);
        $xtpl->parse('main.question_type');
    }



    // show_setup($rows[0]['year']);
} else {
    // print('Not ok');
}
// foreach ($rows as $row) {


// }
//Get giá trị link year khi bấm vào từng năm
if (!empty($get['id_year'])) {
    print('id_y=' . $get['id_year']);

    show_setup($get['id_year']);
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


// Function show_setup
function show_setup($y)
{
    global $db, $op, $xtpl;
    //đưa dữ liệu vào mục set_default các danh mục đã khởi tạo
    $sql = "Select * FROM " . TABLE . "_setup 
    WHERE year = " . $y . "";
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row) {
        // gán giá trị vào display của thẻ tr
        $row['show'] = ($row['set_default'] == 1) ? 'none' : 'table-row';
        $xtpl->assign('set_default', $row);
        //gán link_default vào nút chọn mặc định
        $xtpl->assign('link_default', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $op . '&default=' . $y);
    }


    // đưa dữ liệu vào khoa phòng khi chọn lần đánh giá
    $sql = "Select * FROM " . TABLE . "_groupuser";
    $rows = $db->query($sql)->fetchAll();
    $i = 0;
    $ids = array();
    $sdata = "";
    var_dump('khoaphòng=' . $rows);

    // $ids =["d1,d2,d3,d4"];

    // $func = 'edit_question_type';
    // foreach ($rows as $row) {
    //     $row['stt'] = $i + 1;
    //     // gán link theo id_question_type vào thao tác sửa 
    //     $xtpl->assign('link_edit_id', MODULE_LINK . '&' . NV_OP_VARIABLE . '=' . $func . '&edit_id=' . $y . '_' . $row['id_question_type']);
    //     // $row['stt2']= $stt[$i];
    //     $i = $i + 1;

    //     // print_r($row['id_department']);
    //     $id_department = json_decode($row['id_department']);
    //     array_push($ids, $id_department);
    //     // $row['d1'] = $ids;
    //     // $sdata = implode(', ', $id_department);        
    //     // $row['d2'] = $sdata;      
    //     $xtpl->assign('question_type', $row);
    //     $xtpl->parse('main.question_type');
    // }
}



//Function creat setup
function create_setup($y)
{
    global $db;
    //Tạo dữ liệu trong bảng năm
    // Tạo Loại câu hỏi theo năm        
    $st = "CREATE TABLE if not exists nv4_vi_fives_question_type_" . $y . " (
            id_question_type INT NOT NULL AUTO_INCREMENT,
            name_question_type VARCHAR(255) NOT NULL,
            id_rating_type INT NOT NULL,
            id_department JSON,  
            PRIMARY KEY (id_question_type)
          )
          ";
    $count = $db->exec($st);
    // print("Success, $count rows");

    // //sao chép dữ liệu sang bảng mới
    $st = "INSERT IGNORE INTO nv4_vi_fives_question_type_" . $y . " SELECT * FROM nv4_vi_fives_question_type";
    $count = $db->exec($st);
    // print("Success, $count rows"); 

    // Tạo bảng câu hỏi theo năm        
    $st = "CREATE TABLE if not exists nv4_vi_fives_question_" . $y . " (
            id_question INT AUTO_INCREMENT PRIMARY KEY,
            content TEXT, 
           id_question_type INT
          ) ";
    $count = $db->exec($st);
    // print("Success, $count rows");

    //sao chép dữ liệu sang bảng mới
    $st = "INSERT IGNORE INTO nv4_vi_fives_question_" . $y . " SELECT * FROM nv4_vi_fives_question";
    $count = $db->exec($st);
    // print("Success, $count rows");

    // Tạo bảng thành viên đánh giá theo năm       
    $st = "CREATE TABLE if not exists nv4_vi_fives_evaluation_member_" . $y . " (
            id_evaluation_member INT NOT NULL AUTO_INCREMENT,
            full_name VARCHAR(255) NOT NULL,
            position VARCHAR(255) NOT NULL,
            id_evaluation INT NOT NULL,
            is_team_leader BOOLEAN NOT NULL,
            PRIMARY KEY (id_evaluation_member)
          )";
    $count = $db->exec($st);
    // print("Success, $count rows");

    //sao chép dữ liệu sang bảng mới        
    $st = "INSERT IGNORE INTO nv4_vi_fives_evaluation_member_" . $y . " SELECT * FROM nv4_vi_fives_evaluation_member";
    $count = $db->exec($st);
    // print("Success, $count rows");

    //Nhóm tạo mới không sao chép
    //Tạo bảng khởi tạo kỳ đánh giá            
    $st = "CREATE TABLE if not exists nv4_vi_fives_evaluation_" . $y . " (
        id_evaluation  INT NOT NULL AUTO_INCREMENT,
        count_evaluation INT, 
        name_evaluation VARCHAR(255),
        start_year INT(11) ,
        start_time DATETIME,
        end_time DATETIME,
        note TEXT,
        evaluation_member JSON, 
        id_department INT,
        id_room INT,
        status INT,
        locked INT,
        id_evaluation_type INT,
        PRIMARY KEY (id_evaluation))";
    $count = $db->exec($st);
    // print("Success, $count rows");

    // Tạo bảng chi tiết kỳ đánh giá theo năm
    $st = "CREATE TABLE if not exists nv4_vi_fives_evaluation_details_" . $y . " (
        id_evaluation_detail INT NOT NULL AUTO_INCREMENT,
        id_evaluation INT NOT NULL,
        id_department INT NOT NULL,
        id_team_leader INT NOT NULL,
        evaluation_time DATE,
        id_question_details TEXT,
        total_score FLOAT,
        limitations TEXT,
        recommendations TEXT,
        rating TEXT,
        evidence_image TEXT, 
        PRIMARY KEY (id_evaluation_detail))";
    $count = $db->exec($st);
    // print("Success, $count rows");

    // Tạo bảng chi tiết câu hỏi
    $st = "CREATE TABLE if not exists nv4_vi_fives_question_details_" . $y . " (
        id_question_details INT NOT NULL AUTO_INCREMENT,
        id_question INT NOT NULL,
        id_question_type INT NOT NULL,
        id_department INT NOT NULL,
        score INT,
        PRIMARY KEY (id_question_details)
        )";
    $count = $db->exec($st);
    // print("Success, $count rows");

    // Tạo bảng chi tiết kỳ đánh giá
    $st = "CREATE TABLE if not exists nv4_vi_fives_evaluation_details_" . $y . " (
            id_evaluation_detail INT NOT NULL AUTO_INCREMENT,
            id_evaluation INT NOT NULL,
            id_department INT NOT NULL,
            id_team_leader INT NOT NULL,
            evaluation_time DATE,
            id_question_details TEXT,
            total_score FLOAT,
            limitations TEXT,
            recommendations TEXT,
            rating TEXT,
            evidence_image TEXT, 
            PRIMARY KEY (id_evaluation_detail))
          ";
    // Lưu dữ liệu khởi tạo vào bảng setup
    // check dữ liệu trùng trước khi lưu

    $sql = "Select  * FROM " . TABLE . "_setup 
    WHERE year = $y LIMIT 1";
    $rows = $db->query($sql)->fetchAll();
    print('r=' . $rows[0]['id_setup']); //get id_setup
    if (!$rows) {
        // print('ok');
        // gán vào select option mặc định của combobox
        $sql = "INSERT  INTO " . TABLE . "_setup(id_setup, year,set_default,is_locked,note)
        VALUES (NULL,:year,:set_default,:is_locked,:note)";
        // print($sql);
        $data_insert = array();
        $data_insert['year'] = $y;
        $data_insert['set_default'] = 0;
        $data_insert['is_locked'] = 1;
        $data_insert['note'] = 'Khởi tạo dữ liệu năm ' . $y . '';
        // var_dump($data_insert);
        $result = ($db->insert_id($sql, 'id_setup', $data_insert));


        // Đưa dữ liệu 12 lần/1 năm đánh giá vào bảng evaluation
        // Tạo ra 12 bảng evaluation theo năm tương ứng với 12 lần đánh giá
        delete_tables($y);
        for ($i = 1; $i <=1; $i++) {
            $st = "CREATE TABLE if not exists nv4_vi_fives_evaluation_" . $y . -".$i. (
            id_evaluation  INT NOT NULL AUTO_INCREMENT,
            count_evaluation INT, 
            name_evaluation VARCHAR(255),
            start_year INT(11) ,
            start_time DATETIME,
            end_time DATETIME,
            note TEXT,
            evaluation_member JSON, 
            id_department INT,
            id_room INT,
            status INT,
            locked INT,
            id_evaluation_type INT,
            PRIMARY KEY (id_evaluation))";
            print($st);
            // $count = $db->exec($st);
            print("Successed, $count rows");
        }
        // for ($i=1;$i<=12;$i++){
        //     $st = "INSERT INTO " . TABLE . "_evaluation_" . $year .
        //     "(id_evaluation,count_evaluation,evaluation_member,start_time,end_time, note,id_room,id_evaluation_type,locked)
        //   VALUES (NULL,:count_evaluation,:evaluation_member,:start_time,:end_time,:note,:id_room,:id_evaluation_type,:locked)";

        //     $data_insert = array();
        //     $data_insert['count_evaluation'] = $count;           
        //     $data_insert['note'] = 'Lần đánh giá ' . $i;            
        //     $data_insert['id_room'] = $room;
        //     $data_insert['id_evaluation_type'] = $evaluation_type;
        //     $data_insert['locked'] = 1;

        //     // var_dump($data_insert);
        //     $result = ($db->insert_id($st, 'id_evaluation', $data_insert));

        //     print('Đã khởi tạo thành công lần đánh giá ');
        // }

        // print("Khởi tạo ok");

    }
}

function create_evaluation()
{
    global $db;
    $sql = "INSERT INTO " . TABLE . "_evaluation(id_evaluation,count_evaluation, start_year, note)
    VALUES (NULL,:count_evaluation,:start_year,:note)";
    $data_insert = array();
    $data_insert['count_evaluation'] = 1;
    $data_insert['start_year'] = 2023;
    $data_insert['note'] = 'Khởi tạo dữ liệu năm 2023';
    // var_dump($data_insert);
    $result = ($db->insert_id($sql, 'id_evaluation', $data_insert));
}
//Function update evaluation details
function update_question_details($id_question_details, $score)
{
    //khai bao bien db vao moi ham// luu y
    global $db;
    $count = $db->exec("UPDATE nv4_vi_fives_question_details SET score=$score WHERE id_question_details= $id_question_details");
    print("update $count rows");
}
//PDO
// xóa tất cả các bảng theo điều kiện
function delete_tables($y)
{
    // Define the prefix of the tables you want to delete
    global $db;
    $pre = "nv4_vi_fives_evaluation_".$y;

    // Construct the SQL statement with a wildcard to match all tables with the prefix
    $sql = "DROP TABLE IF EXISTS " . $pre . "%";

    // Execute the SQL statement
    $count = $db->exec($sql);

    print("All tables with prefix " . $pre . " have been deleted successfully");
}
