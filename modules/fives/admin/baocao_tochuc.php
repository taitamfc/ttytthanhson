<?php

/**
 * TMS Content Management System
 * @version 4.x
 * @author Tập Đoàn TMS Holdings <contact@thuongmaiso.vn>
 * @copyright (C) 2009-2022 Tập Đoàn TMS Holdings. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://thuongmaiso.vn
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

$cats = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cats WHERE status=1 ORDER by weight ASC')->fetchAll();
$donvi = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_department WHERE status=1 ORDER by weight ASC')->fetchAll();
$lanrow = $db->query('SELECT t1.* FROM (SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data.'_row WHERE status=1 ORDER by time_from DESC LIMIT 12) t1 order by t1.time_from ASC')->fetchAll();

$xtpl = new XTemplate('baocao_tochuc.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('CONFIG',  getConfig($module_name));

  

foreach ($donvi as $key => $value) {
        foreach ($lanrow as $key => $value2) { 
        $value2['tongdiem']=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t2.row_id='.$value2['id'].' AND t2.department_id='.$value['id'])->fetchColumn();
            $value2['tongdiem']=number_format($value2['tongdiem'],1);
            $xtpl->assign('LAN', $value2);
            $xtpl->parse('main.loop.lan');
        }
    $value['number']= $db->query('SELECT count(id) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote where   department_id='.$value['id'])->fetchColumn();

    $xtpl->assign('DONVI', $value);

    if(!empty($value['number'])){$xtpl->parse('main.loop');}
}


$i=1;
foreach ($lanrow as $key => $valuerow) {
    $tongtrungbinh=$db->query('SELECT avg(t1.trungbinh) FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote_vote t1 INNER JOIN '.NV_PREFIXLANG.'_'.$module_data.'_vote t2 ON t1.vote_id=t2.id where t2.row_id='.$valuerow['id'])->fetchColumn();
    $xtpl->assign('LAN_TONG', number_format($tongtrungbinh,2));
    $valuerow['stt']=$i;
    $xtpl->assign('LAN', $valuerow);
    ++$i;
    $xtpl->parse('main.lan');
    $xtpl->parse('main.lan_tong');    
 } 

foreach ($lanrow as $key => $lan) {
    $ngay=$db->query('SELECT time_add FROM '.NV_PREFIXLANG.'_'.$module_data.'_vote where row_id='.$lan['id'])->fetchColumn();
    if(!empty($ngay)){$xtpl->assign('NGAY', date('d/m/Y',$ngay));}
    else{ $xtpl->assign('NGAY','');}
   
    $xtpl->parse('main.ngay');
 } 

$xtpl->parse('main');
$contents = $xtpl->text('main');
$page_title = $lang_module['baocao_tochuc'];
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
