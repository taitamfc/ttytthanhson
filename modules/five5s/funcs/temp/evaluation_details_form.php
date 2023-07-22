<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3-31-2010 0:33
 */

if (! defined('NV_IS_MOD_FIVES')) {
    die('Stop_main!!!');
}

// create_evaluation();
if (empty($user_info)){	$url = MODULE_LINK . '&' . NV_OP_VARIABLE . '=login';nv_redirect_location($url); exit();}
	$thongke=array();
	$xtpl = new XTemplate($op.'.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('BASE_URL', NV_BASE_SITEURL);
	
	/*Code for Here*/
    //check gia trị ở form submit
    $post = array();
    // $data=($_POST['content_text']);
    // $post['content_text'] = $nv_Request->get_title('content_text', 'post');
    $data = $nv_Request->get_title('content_text', 'post','');  
    // var_dump( $data);
    $post['submit'] = $nv_Request->get_title('submit', 'post');    
   
    $value = $nv_Request->get_title('input_name', 'post');
	
    $sql = "SELECT * FROM " . TABLE. "_question_type "; 
   	$groups = $db->query($sql)->fetchAll();
	$id_question_details = array();
    foreach ($groups as $group){ //lặp nhóm
	
		$sql = "SELECT qd.id_question_type, q.content, q.id_question, qd.id_question_details
        FROM " . TABLE. "_question q
	 	JOIN " . TABLE. "_question_details qd ON q.id_question = qd.id_question
	 	wHERE qd.id_question_type = ".$group['id_question_type']."
        ORDER BY RAND()";
        // GROUP BY qd.id_question_type";
    
		$rows = $db->query($sql)->fetchAll();
		
		foreach ($rows as $row){ //show các giá trị thuộc nhóm	
            //truyền biến vào vòng lặp            
            $row['stt']=$j+1;
            $id_question_details[$j]=$row['id_question_details'];
            print($row['id_question_details'].'|');
            $j=$j+1;
            // $row[0]=$i;
            $xtpl->assign('question', $row);
            $xtpl->parse('main.group.question'); // show các giá trị trong nhóm
		}
		// var_dump($group);
		$xtpl->assign('group', $group);
        $xtpl->parse('main.group'); // kết thúc 1 nhóm để lặp qua giá trị nhóm khác
    }
     // Kiem tra submit
     if (!empty($post['submit']))  

     {
         // Get giá trị trong mảng câu hỏi
         print('j='.$j);
        //  var_export($id_question_details);
         foreach($id_question_details as $r){
            print($r);
           
            // In ra dap an gan vơi id cau hoi chi tiet
            $result = $nv_Request->get_title('a'.$r, 'post'); 
            // print($r.'---'.$result.'|');
            //Cap nhat vao db
            if (!empty($result)){
                print($r.'---'.$result.'|');
                // $count = $db->exec("UPDATE nv4_vi_fives_question_details SET score=$result WHERE id_question_details= $r");
                // print("update $count rows");  
                update_question_details($r,$result);    
               
              
            }
            // print($key($id_question_details));
         }
         
        //  print_r($id_question_details);
         $data = $nv_Request->get_title('content_text', 'post');        
             //Insert data
         //$data=($_POST['data']);   
        //  var_dump( $data);
     }

    // var_dump($rows);
    // add vào combobox Phòng
    $sql = "Select * FROM " . TABLE. "_room" ;
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row){
        //truyền biến vào vòng lặp
        $xtpl->assign('room', $row);
        $xtpl->parse('main.room');
    }

    // add vào combobox Loại đánh giá Thực hành/Chuyên môn
    $sql = "Select * FROM " . TABLE. "_rating_type" ;
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row){
        //truyền biến vào vòng lặp
        $xtpl->assign('rating_type', $row);
        $xtpl->parse('main.rating_type');
    }

    // add vào combobox Đội trưởng đánh giá
    $sql = "Select * FROM " . TABLE. "_evaluation_member WHERE is_team_leader = 1 " ;
    $rows = $db->query($sql)->fetchAll();
    foreach ($rows as $row){
        //truyền biến vào vòng lặp
        $xtpl->assign('evaluation_member', $row);
        $xtpl->parse('main.evaluation_member');
    }
//    var_dump($rows);

//   $xtpl->parse('main.buttons');
     $xtpl->parse('main.buttons');
     /*End Code for Here*/
     //truyền biến vào form action
     $xtpl->assign('POST',$post);
     $xtpl->assign('link_frm',MODULE_LINK. '&' . NV_OP_VARIABLE . '='.$op);
     $xtpl->parse('main');
     $contents = $xtpl->text('main');


include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';



// Add funcs
/*
code update- delete
$sql = 'Update ' . TABLE. "_notification SET status=0, deleted=1, delete_by=:delete_by, 
	delete_date=:delete_date  WHERE code_pro like '".$code."'";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':delete_by', $user_info['username'], PDO::PARAM_STR);
	$stmt->bindParam(':delete_date', date('Y/m/d H:m'), PDO::PARAM_STR);
	$row_id=$stmt->execute();
*/

function create_evaluation(){
    global $db;
    $sql = "INSERT INTO ".TABLE."_evaluation(id_evaluation,count_evaluation, start_year, note)
    VALUES (NULL,:count_evaluation,:start_year,:note)";
    $data_insert = array();    
    $data_insert['count_evaluation'] = 1;	
    $data_insert['start_year'] = 2023;
    $data_insert['note'] = 'Khởi tạo dữ liệu năm 2023';	
    // var_dump($data_insert);
    $result=($db->insert_id($sql, 'id_evaluation', $data_insert));
    }
//Function update evaluation details
function update_question_details($id_question_details,$score){
    //khai bao bien db vao moi ham// luu y
    global $db;
    $count = $db->exec("UPDATE nv4_vi_fives_question_details SET score=$score WHERE id_question_details= $id_question_details");
    print("update $count rows");    
    }
//PDO
    