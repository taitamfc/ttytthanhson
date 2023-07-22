<?php
$mod = $nv_Request->get_string( 'mod', 'get,post', '' );


if($mod=='get_row_id'){
$q = $nv_Request->get_string( 'q', 'post,get', '' );
$list_gia_tien = get_row_id_select2($q);
foreach ( $list_gia_tien as $result ) {
	$json[] = ['id'=>$result['id'], 'text'=>$result['title']];
}
print_r( json_encode( $json ) );
die();
}

if($mod=='get_row_id_search'){
$q = $nv_Request->get_string( 'q', 'post,get', '' );
$list_gia_tien = get_row_id_select2($q);
$json[] = ['id'=>0, 'text'=>'Chọn tất cả'];
foreach ( $list_gia_tien as $result ) {
	$json[] = ['id'=>$result['id'], 'text'=>$result['title']];
}
print_r( json_encode( $json ) );
die();
}
if($mod=='click_vote2'){
	$row_id = $nv_Request->get_int( 'row_id', 'post,get', 0);
	$catsid = $nv_Request->get_int( 'catsid', 'post,get', 0);
	$department_id = $nv_Request->get_int( 'department_id', 'post,get', 0);
	$note = $nv_Request->get_string( 'note', 'post,get', '' );
	$check=$db->query('SELECT count(*) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote where row_id='.$row_id.' and department_id='.$department_id.' and userid='.$user_info['userid'])->fetchColumn();
	if($check==0){
		$db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_data.'_vote (row_id,department_id,userid,time_add) VALUES ('.$row_id.','.$department_id.','.$user_info['userid'].','.NV_CURRENTTIME.')');
		$vote_id=$db->lastInsertId();
		$db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote (vote_id,catsid,trungbinh,note) VALUES ('.$vote_id.','.$catsid.',0,'.$db->quote($note).')');
	}else{
		$vote_id=$db->query('SELECT id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote where row_id='.$row_id.' and department_id='.$department_id.' and userid='.$user_info['userid'])->fetchColumn();
		$db->query('UPDATE '.NV_PREFIXLANG.'_'.$module_data.'_vote SET time_edit='.NV_CURRENTTIME.' where id='.$vote_id);
		$check=$db->query('SELECT count(*) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote where vote_id='.$vote_id.' and catsid='.$catsid)->fetchColumn();
		if($check==0){
			$db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote (vote_id,catsid,trungbinh,note) VALUES ('.$vote_id.','.$catsid.',0,'.$db->quote($note).')');
		}else{
			$vote_vote_id=$db->query('SELECT id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote where vote_id='.$vote_id.' and catsid='.$catsid)->fetchColumn();
			$db->query('UPDATE '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote SET note='.$db->quote($note).' where id='.$vote_vote_id);
		}
	}
	print_r( json_encode( array('status'=>'OK') ) );
	die();
}
if($mod=='click_vote'){
	$row_id = $nv_Request->get_int( 'row_id', 'post,get', 0);
	$catsid = $nv_Request->get_int( 'catsid', 'post,get', 0);
	$contentid = $nv_Request->get_int( 'contentid', 'post,get', 0);
	$rankid = $nv_Request->get_int( 'rankid', 'post,get', 0);
	$department_id = $nv_Request->get_int( 'department_id', 'post,get', 0);
	$note = $nv_Request->get_string( 'note', 'post,get', '' );
	$number_rank=$db->query('SELECT numer_rank FROM '.NV_PREFIXLANG.'_'.$module_data.'_rank where id='.$rankid)->fetchColumn();
	$check=$db->query('SELECT count(*) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote where row_id='.$row_id.' and department_id='.$department_id.' and userid='.$user_info['userid'])->fetchColumn();
	if($check==0){
		$db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_data.'_vote (row_id,department_id,userid,time_add) VALUES ('.$row_id.','.$department_id.','.$user_info['userid'].','.NV_CURRENTTIME.')');
		$vote_id=$db->lastInsertId();
		$db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote (vote_id,catsid,trungbinh,note) VALUES ('.$vote_id.','.$catsid.',0,'.$db->quote($note).')');
		$vote_vote_id=$db->lastInsertId();
		$db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_data.'_vote_item (vote_vote_id,contentid,rankid,number_rank) VALUES ('.$vote_vote_id.','.$contentid.','.$rankid.','.$number_rank.')');
		$avg=$db->query('SELECT avg(number_rank) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_item where vote_vote_id='.$vote_vote_id)->fetchColumn();
		$avg=round($avg,2);
		$db->query('UPDATE '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote SET trungbinh='.$db->quote($avg).' where id='.$vote_vote_id);
	}else{
		$vote_id=$db->query('SELECT id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote where row_id='.$row_id.' and department_id='.$department_id.' and userid='.$user_info['userid'])->fetchColumn();
		$db->query('UPDATE '.NV_PREFIXLANG.'_'.$module_data.'_vote SET time_edit='.NV_CURRENTTIME.' where id='.$vote_id);
		$check=$db->query('SELECT count(*) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote where vote_id='.$vote_id.' and catsid='.$catsid)->fetchColumn();
		if($check==0){
			$db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote (vote_id,catsid,trungbinh,note) VALUES ('.$vote_id.','.$catsid.',0,'.$db->quote($note).')');
			$vote_vote_id=$db->lastInsertId();
			$db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_data.'_vote_item (vote_vote_id,contentid,rankid,number_rank) VALUES ('.$vote_vote_id.','.$contentid.','.$rankid.','.$number_rank.')');
			$avg=$db->query('SELECT avg(number_rank) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_item where vote_vote_id='.$vote_vote_id)->fetchColumn();
			$avg=round($avg,2);
			$db->query('UPDATE '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote SET trungbinh='.$db->quote($avg).' where vote_vote_id='.$vote_vote_id);
		}else{
			$vote_vote_id=$db->query('SELECT id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote where vote_id='.$vote_id.' and catsid='.$catsid)->fetchColumn();
			$db->query('UPDATE '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote SET note='.$db->quote($note).' where id='.$vote_vote_id);
			$check=$db->query('SELECT count(*) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_item where vote_vote_id='.$vote_vote_id.' and contentid='.$contentid)->fetchColumn();
			if($check==0){
				$db->query('INSERT INTO '.NV_PREFIXLANG.'_'.$module_data.'_vote_item (vote_vote_id,contentid,rankid,number_rank) VALUES ('.$vote_vote_id.','.$contentid.','.$rankid.','.$number_rank.')');
			}else{
				$db->query('UPDATE '.NV_PREFIXLANG.'_'.$module_data.'_vote_item SET rankid='.$rankid.', number_rank='.$number_rank.' where vote_vote_id='.$vote_vote_id.' and contentid='.$contentid);
			}
			$avg=$db->query('SELECT avg(number_rank) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_item where vote_vote_id='.$vote_vote_id)->fetchColumn();
			$avg=round($avg,2);
			$db->query('UPDATE '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote SET trungbinh='.$db->quote($avg).' where id='.$vote_vote_id);
		}
	}
	print_r( json_encode( array('status'=>'OK','avg'=>$avg) ) );
	die();
}


if($mod=='load_static_donvi_chitiet'){
	$department_id = $nv_Request->get_string( 'department_id', 'get,post', '' );	
	
	$vote = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data.'_vote WHERE department_id='.$department_id.' ORDER by time_add ASC')->fetchAll();
	$number_vote = $db->query('SELECT COUNT(id) FROM '.NV_PREFIXLANG . '_' . $module_data.'_vote  where   department_id='.$department_id)->fetchColumn();
	$cats = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cats WHERE status=1 ORDER by weight ASC')->fetchAll();

	$rank = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rank WHERE status=1 ORDER by weight ASC')->fetchAll();

	$xtpl = new XTemplate('baocao_chitiet.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('OP', $op);
	$xtpl->assign('CONFIG', $config_setting);
	$xtpl->assign('NUMBER_VOTE', number_format($number_vote) );
	$xtpl->assign('DONVI_VOTE', get_info_department($department_id)['name_department']);

	foreach ($cats as $key => $value) {
		$xtpl->assign('CATS', $value);
		$xtpl->parse('main.cats');
	}

	$i=1;
	foreach ($vote as $key => $value) {
		

		foreach ($cats as $key => $value2) {
		$value2['tongdiem']=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t1.catsid='.$value2['id'].' AND t1.vote_id='.$value['id'].' AND t2.department_id='.$department_id)->fetchColumn();
			$value2['tongdiem']=number_format($value2['tongdiem'],2);
			$xtpl->assign('CATS2', $value2);
			$xtpl->parse('main.loop.cats');
		}


	$note = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data.'_vote_vote WHERE vote_id='.$value['id'])->fetchAll();
		foreach ($note as $key => $noteloop) {
			$noteloop['catsid']=get_info_cats($noteloop['catsid'])['title'];
			$xtpl->assign('NOTE', $noteloop);
			$xtpl->parse('main.loop.note.loop');
		}
		if(!empty($noteloop['note']))
	{
		$xtpl->parse('main.loop.note');
		}

	$value['trungbinh']= $db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where  t1.vote_id='.$value['id'].' AND t2.department_id='.$department_id)->fetchColumn();
	$value['trungbinh']=number_format($value['trungbinh'],2);
 	$value['userid']=get_info_user($value['userid'])['first_name'];
	$value['time_add']=date('d/m/Y',$value['time_add']);	
	$value['stt']=$i;
	$xtpl->assign('VOTE', $value);
	$xtpl->parse('main.loop');
	++$i;
	}

	foreach ($cats as $key => $valuecats) {
		$tongtrungbinh=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t1.catsid='.$valuecats['id'].' AND t2.department_id='.$department_id)->fetchColumn();
			$xtpl->assign('CAT_TONG', number_format($tongtrungbinh,2));
			$xtpl->parse('main.cat_tong');
		}

	$tongtrungbinh=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where  t2.department_id='.$department_id)->fetchColumn();

	$xtpl->assign('TONGTRUNGBINH', number_format($tongtrungbinh,2));

	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	print_r( json_encode( array('status'=>'OK','html'=>$contents) ) );
	die();
}


if($mod=='load_static_donvi'){
	$department_id = $nv_Request->get_string( 'department_id', 'get,post', 0 );	
	$row_id = $nv_Request->get_string( 'row_id', 'get,post', '' );
	$number_vote = $db->query('SELECT COUNT(id) FROM '.NV_PREFIXLANG . '_' . $module_data.'_vote  where  row_id='.$row_id.' and department_id='.$department_id)->fetchColumn();
	$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_row WHERE id=' . $row_id)->fetch();
	$cats = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cats WHERE status=1 ORDER by weight ASC')->fetchAll();
	$rank = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rank WHERE status=1 ORDER by weight ASC')->fetchAll();
	$xtpl = new XTemplate('donvi_data.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('OP', $op);
	$xtpl->assign('CONFIG', $config_setting);
	$row['time_from']=date('d/m/Y',$row['time_from']);
	$row['time_to']=date('d/m/Y',$row['time_to']);
	$xtpl->assign('LAN', $row);
	$xtpl->assign('NUMBER_VOTE', number_format($number_vote) );
	$xtpl->assign('DONVI_VOTE', get_info_department($department_id)['name_department']);
	$i=0;
	foreach ($cats as $key => $value) {
		
		foreach ($rank as $key => $valuerankloop) {
			if($department_id>0){
				$valuerankloop['hienthi']=$db->query('SELECT count(rankid) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_item where rankid='.$valuerankloop['id'].' and vote_vote_id IN (SELECT t1.id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t1.catsid='.$value['id'].' and t2.row_id='.$row_id.' and t2.department_id='.$department_id.')')->fetchColumn();
			}else{
				$valuerankloop['hienthi']=$db->query('SELECT count(rankid) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_item where rankid='.$valuerankloop['id'].' and vote_vote_id IN (SELECT t1.id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t1.catsid='.$value['id'].' and t2.row_id='.$row_id.')')->fetchColumn();
			}
			$xtpl->assign('RANKLOOP', $valuerankloop);
			$xtpl->parse('main.loop.rank');
		}
		$tongtrungbinh=0;
		if($department_id>0){
			$value['trungbinh']=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t1.catsid='.$value['id'].' AND  t2.row_id='.$row_id.' and t2.department_id='.$department_id)->fetchColumn();
		}else{
			$value['trungbinh']=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t1.catsid='.$value['id'].' AND  t2.row_id='.$row_id)->fetchColumn();
		}
		
		//$tongtrungbinh = $tongtrungbinh + $value['trungbinh'] / $i;

		$xtpl->assign('LOOP', $value);
		++$i;
		$xtpl->parse('main.loop');
	}	

		foreach ($rank as $key => $valuerank) {
			if($department_id>0){
			$valuerank['tong']=$db->query('SELECT count(rankid) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_item where rankid='.$valuerank['id'].' and vote_vote_id IN (SELECT t1.id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where  t2.row_id='.$row_id.' and t2.department_id='.$department_id.')')->fetchColumn();
		} else {
			$valuerank['tong']=$db->query('SELECT count(rankid) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_item where rankid='.$valuerank['id'].' and vote_vote_id IN (SELECT t1.id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where  t2.row_id='.$row_id.')')->fetchColumn();
			
		}
			$xtpl->assign('RANK_TONG', $valuerank['tong']);
			$xtpl->assign('RANK_NHAN', $valuerank['tong'] *$valuerank['id']);
			$xtpl->assign('RANK', $valuerank);
			$xtpl->parse('main.rank');
			$xtpl->parse('main.rank_tong');
			$xtpl->parse('main.rank_nhan');
		}
	
	if($department_id>0){
		$tongtrungbinh=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t2.row_id='.$row_id.' and t2.department_id='.$department_id)->fetchColumn();
	}else{
		$tongtrungbinh=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t2.row_id='.$row_id)->fetchColumn();		
	}

	$xtpl->assign('TONGTRUNGBINH', number_format($tongtrungbinh,2));
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	print_r( json_encode( array('status'=>'OK','html'=>$contents) ) );
	die();
}

if($mod=='load_static_nhieudonvi'){
	$row_id = $nv_Request->get_string( 'row_id', 'get,post', '' );	
	$cats = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cats WHERE status=1 ORDER by weight ASC')->fetchAll();
	$donvi = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_department WHERE status=1 ORDER by weight ASC')->fetchAll();
	$rank = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rank WHERE status=1 ORDER by weight ASC')->fetchAll();

	$xtpl = new XTemplate('tochuc_data.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('OP', $op);
	$xtpl->assign('CONFIG', $config_setting);

	foreach ($cats as $key => $value) {
		$xtpl->assign('CATS', $value);
		$xtpl->parse('main.cats');
	}

	foreach ($donvi as $key => $value) {
		foreach ($cats as $key => $value2) {
		$value2['tongdiem']=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t2.row_id='.$row_id.' AND t1.catsid='.$value2['id'].' AND  t2.department_id='.$value['id'])->fetchColumn();
		$value2['tongdiem']=number_format($value2['tongdiem']);
		$xtpl->assign('CATS', $value2);
		$xtpl->parse('main.loop.cats');
		}
	$value['trungbinh']= $db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t2.row_id='.$row_id.' AND   t2.department_id='.$value['id'])->fetchColumn();
	$value['trungbinh']=number_format($value['trungbinh'],2);
	$value['number']= $db->query('SELECT count(id) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote where row_id='.$row_id.' AND  department_id='.$value['id'])->fetchColumn();
	$xtpl->assign('DONVI', $value);

	if(!empty($value['number'])){	$xtpl->parse('main.loop');}
	}
	foreach ($cats as $key => $valuecat) {
			$tongtrungbinh=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t2.row_id='.$row_id.' AND t1.catsid='.$valuecat['id'])->fetchColumn();
			$xtpl->assign('CAT_TONG', number_format($tongtrungbinh,2));
			$xtpl->parse('main.cat_tong');
		}
	$tongtrungbinh=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where  t2.row_id='.$row_id)->fetchColumn();
	$xtpl->assign('TONGTRUNGBINH', number_format($tongtrungbinh,2) );
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	print_r( json_encode( array('status'=>'OK','html'=>$contents) ) );
	die();
}







if($mod=='get_department_search'){
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_gia_tien = get_department_select2($q);
	$json[] = ['id'=>0, 'text'=>'Chọn tất cả'];
	foreach ( $list_gia_tien as $result ) {
		$json[] = ['id'=>$result['id'], 'text'=>$result['name_department']];
	}
	print_r( json_encode( $json ) );
	die();
}

if($mod=='get_department'){
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_gia_tien = get_department_select2($q);
	foreach ( $list_gia_tien as $result ) {
		$json[] = ['id'=>$result['id'], 'text'=>$result['name_department']];
	}
	print_r( json_encode( $json ) );
	die();
}


if($mod=='get_department_user_buy_search'){
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$department_id = $nv_Request->get_string( 'department_id', 'post,get', '' );
	$list_gia_tien = get_department_user_buy_select2($q,$department_id);
	$json[] = ['id'=>0, 'text'=>'Chọn tất cả'];
	foreach ( $list_gia_tien as $result ) {
		$json[] = ['id'=>$result['id'], 'text'=>$result['staff_code'].' - '.$result['name_staff']];
	}
	print_r( json_encode( $json ) );
	die();	
}
if($mod=='get_user_staff_department'){
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$department_id = $nv_Request->get_string( 'department_id', 'post,get', '' );
	$list_gia_tien = get_user_staff_department_select2($q,$department_id);
	foreach ( $list_gia_tien as $result ) {
		$json[] = ['id'=>$result['id'], 'text'=>$result['staff_code'].' - '.$result['name_staff']];
	}
	print_r( json_encode( $json ) );
	die();	
}
if($mod=='load_static_department'){
	$department_id = $nv_Request->get_string( 'department_id', 'get,post', '' );
	$row_id = $nv_Request->get_string( 'row_id', 'get,post', '' );
	$rank = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rank WHERE status=1 ORDER by weight ASC')->fetchAll();
	$xtpl = new XTemplate('load_vote.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('OP', $op);
	$xtpl->assign('thang_nam', date('m/Y',NV_CURRENTTIME));
	$xtpl->assign('quy_nam', $quy.'/'.date('Y',NV_CURRENTTIME));
	$xtpl->assign('year', date('Y',NV_CURRENTTIME));
	$xtpl->assign('CONFIG', $config_setting);
	$xtpl->assign('row_id', $row_id);
	$cats = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cats WHERE status=1 ORDER by weight ASC')->fetchAll();
	foreach ($cats as $key => $value) {
		$xtpl->assign('CAT', $value);
		$content = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_content WHERE catsid='.$value['id'].' AND status=1 ORDER by weight ASC')->fetchAll();
		$i=1;
		foreach ($content as $key => $row) {
			$row['stt']=$i++;
			$row['avg']=$db->query('SELECT trungbinh FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote where vote_id IN (SELECT id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote where row_id='.$row_id.' and department_id='.$department_id.' and userid='.$user_info['userid'].') and catsid='.$value['id'])->fetchColumn();
			$row['note']=$db->query('SELECT note FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote where vote_id IN (SELECT id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote where row_id='.$row_id.' and department_id='.$department_id.' and userid='.$user_info['userid'].') and catsid='.$value['id'])->fetchColumn();

			if($row['avg']==''){
				$row['avg']=0;
			}
			$xtpl->assign('LOOP', $row);
			$a=1;	
			foreach ($rank as $key => $value_rank) {
				$value_rank['stt']=$a++;
				$xtpl->assign('RANK', $value_rank);
				$check=$db->query('SELECT count(*) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_item where vote_vote_id IN (SELECT t1.id FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t1.catsid='.$value['id'].' and t2.row_id='.$row_id.' and t2.department_id='.$department_id.' and t2.userid='.$user_info['userid'].') and contentid='.$row['id'].' and rankid='.$value_rank['id'])->fetchColumn();
				if($check>0){
					$xtpl->assign('checked', 'checked');
				}else{
					$xtpl->assign('checked', '');
				}
				$xtpl->parse('main.cats.loop.rank');
			}
			$xtpl->parse('main.cats.loop');

		}
		foreach ($rank as $key => $valuerank) {
			$xtpl->assign('RANK', $valuerank);
			$xtpl->parse('main.cats.rank');
		}
		$xtpl->parse('main.cats');
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	print_r( json_encode( array('status'=>'OK','html'=>$contents) ) );
	die();
}



if($mod=='load_static_donvi'){
	$department_id = $nv_Request->get_string( 'department_id', 'get,post', '' );	
	$row_id = $nv_Request->get_string( 'row_id', 'get,post', '' );
	$number_vote = $db->query('SELECT COUNT(id) FROM '.NV_PREFIXLANG . '_' . $module_data.'  where  id_row='.$row_id.' and department_id='.$department_id)->fetchColumn();
	$row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_row WHERE id=' . $row_id)->fetch();
	$cats = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cats WHERE status=1 ORDER by weight ASC')->fetchAll();
	$rank = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rank WHERE status=1 ORDER by weight ASC')->fetchAll();
	$xtpl = new XTemplate('baocao_donvi_data.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('OP', $op);
	$xtpl->assign('CONFIG', $config_setting);
	$row['time_from']=date('d/m/Y',$row['time_from']);
	$row['time_to']=date('d/m/Y',$row['time_to']);
	$xtpl->assign('LAN', $row);
	$xtpl->assign('NUMBER_VOTE', number_format($number_vote) );
	$xtpl->assign('DONVI_VOTE', get_info_department($department_id)['name_department']);
	foreach ($rank as $key => $valuerank) {
		$xtpl->assign('RANK', $valuerank);
		$xtpl->parse('main.rank');
	}
	$tongtrungbinh=0;
	$i=0;
	foreach ($cats as $key => $value) {
		$trungbinh= $db->query('SELECT avg(t2.rank_tb) FROM '.NV_PREFIXLANG . '_' . $module_data.' t1 JOIN '.NV_PREFIXLANG . '_' . $module_data.'_item_note t2 ON t2.id_vote = t1.id where  id_row='.$row_id.' and department_id='.$department_id.' and t2.catsid='.$value['id'])->fetchColumn();
		$tongtrungbinh= $tongtrungbinh+$trungbinh;
		$value['trungbinh']=number_format($trungbinh);
		foreach ($rank as $key => $valuerankloop) {
			$valuerankloop['tongtien']= $db->query('SELECT SUM(t2.rank_number) FROM '.NV_PREFIXLANG . '_' . $module_data.' t1 JOIN '.NV_PREFIXLANG . '_' . $module_data.'_item t2 ON t2.id_vote = t1.id where t2.rank='.$valuerankloop['id'].' AND id_row='.$row_id.' and department_id='.$department_id.' and t2.catsid='.$value['id'])->fetchColumn();
			$xtpl->assign('RANKLOOP', $valuerankloop);
			$xtpl->parse('main.loop.rank');
		}
		$xtpl->assign('LOOP', $value);
		++$i;
		$xtpl->parse('main.loop');
	}	
	
	$xtpl->assign('TONGTRUNGBINH', number_format($tongtrungbinh/$i) );
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	print_r( json_encode( array('status'=>'OK','html'=>$contents) ) );
	die();
}



if($mod=='load_static_donvi_chitiet'){
	$department_id = $nv_Request->get_string( 'department_id', 'get,post', '' );	
	
	$vote = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE department_id='.$department_id.' and status=1 ORDER by weight ASC')->fetchAll();
	$cats = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cats WHERE status=1 ORDER by weight ASC')->fetchAll();

	$rank = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_rank WHERE status=1 ORDER by weight ASC')->fetchAll();

	$xtpl = new XTemplate('baocao_chitiet_data.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('OP', $op);
	$xtpl->assign('CONFIG', $config_setting);


	foreach ($cats as $key => $value) {
		$xtpl->assign('CATS', $value);
		$xtpl->parse('main.cats');
	}
	$i=1;
	foreach ($vote as $key => $value) {
		
		foreach ($cats as $key => $value2) {
			
			$value2['tongdiem']= $db->query('SELECT SUM(t2.rank_number) FROM '.NV_PREFIXLANG . '_' . $module_data.' t1 JOIN '.NV_PREFIXLANG . '_' . $module_data.'_item t2 ON t2.id_vote = t1.id where  t1.id='.$value['id'].' and t2.catsid='.$value2['id'])->fetchColumn();

			$xtpl->assign('CATS2', $value2);
			$xtpl->parse('main.loop.cats');
		}


		$value['time_add']=date('d/m/Y',$value['time_add']);	
		$value['stt']=$i;

		$xtpl->assign('VOTE', $value);
		$xtpl->parse('main.loop');
		++$i;
	}


	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	print_r( json_encode( array('status'=>'OK','html'=>$contents) ) );
	die();
}