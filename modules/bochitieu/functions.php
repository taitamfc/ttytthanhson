<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 10 April 2017 17:00
 */

if (! defined('NV_SYSTEM')) {
    die('Stop__func!!!');
}


define('MODULE_LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '='.$module_data);
define('TABLE', NV_PREFIXLANG . '_' . $module_data);
define('KHOAPHONG', NV_PREFIXLANG . '_quanlynhanluc_khoaphong');
define('NV_STATIC_URL', NV_BASE_SITEURL);
define('THEME_URL', NV_BASE_SITEURL . 'themes/cpanel');
$page_title = $module_info['site_title'];

define('NV_IS_MOD_QLCL', true);
//require_once(NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php');


global  $global_apdung;
$global_apdung=array();
	$db_slave->sqlreset()->select('*')->from(NV_PREFIXLANG . '_' . $module_data . '_apdung')->where('apdung=1');
	$result = $db_slave->query($db_slave->sql());
	$global_apdung = $result->fetch();

function userinfo($id)
{
	global $db,$module_data,$lang_module;
	$user=array();
	$sql="SELECT * from ".NV_USERS_GLOBALTABLE. " where userid =".$id." and active=1";
	$user=$db->query($sql)->fetch();
	if (!empty($user))return $user;
	return null; // trả lại giá trị không thực hiện được 
}

function select($id)
{
	global $db,$module_data,$lang_module;
	$sql = 'SELECT * FROM ' . TABLE. "_select where select_group like '".$id."'";
	$ds = $db->query($sql)->fetchAll();
	if (!empty($ds))return $ds;
	return null; // trả lại giá trị không thực hiện được 
}

function select_item($id)
{
	global $db,$module_data,$lang_module;
	$sql = 'SELECT * FROM ' . TABLE. "_select where select_code like '".$id."'";
	$ds = $db->query($sql)->fetch();
	if (!empty($ds))return $ds;
	return null; // trả lại giá trị không thực hiện được 
}

function select_khoaphong($listid)
{
	global $db,$module_data,$lang_module;
	$cri='';$dskhoa='';
	for ($i=0; $i<count($listid);$i++)
	{
		$cri .="'".$listid[$i]."'";	if($i<(count($listid)-1)) $cri .=","; 
	}
	//return $cri;
	$sql = 'SELECT tenkhoa FROM ' . TABLE. "_groupuser where account in (".$cri.")";
	$ds = $db->query($sql)->fetchAll();
	//foreach ($ds as $item)$dskhoa .=$item['tenkhoa'].";";
	return $ds;
	return $sql; // trả lại giá trị không thực hiện được 
}

function nv_redirect_location($url) // Version cũ ko có hàm này
{
	 Header('Location: ' . nv_url_rewrite($url, true));
     exit();
}


function check_quyen($user)
{
	global $db,$module_data,$lang_module;
	$sql= "SELECT * FROM " . TABLE . "_groupuser where account like '".$user['username']."'";
	$ds = $db->query($sql)->fetch();	
	if (!empty($ds))return $ds[id_nhomquyen];
	return 0; // trả lại giá trị không thực hiện được 
}

function check_khoaphong($user)
{
	global $db,$module_data,$lang_module;
	$list=array();
	$sql="SELECT id from ".NV_PREFIXLANG . '_' . $module_data . "_khoaphong where account ='".$user."'";
	$list=$db->query($sql)->fetch();
	if (!empty($list))return $list['id'];
	return 0; // trả lại giá trị không thực hiện được 
}

function send_notification($ds)
{
	global $db,$module_data,$lang_module;
	$dsnhan=explode(';',$ds['nguoinhan']);
	$kq=0;
	foreach ($dsnhan as $item)
	{
		if (!empty($item))
		{
		$sql = "INSERT INTO ".TABLE. "_notification(id, code_pro, nguoigui, nguoinhan, tieude, id_yeucau, tg_gui)
			value (NULL,:code_pro,:nguoigui,:nguoinhan,:tieude,:id_yeucau,:tg_gui)";
			$data_insert = array();
			$data_insert['code_pro'] = $ds['code_pro'];
			$data_insert['nguoigui'] = $ds['nguoigui'];
			$data_insert['nguoinhan'] = $item;
			$data_insert['tieude'] =$ds['tieude'];
			$data_insert['id_yeucau'] =$ds['id_yeucau'];
			$data_insert['tg_gui'] = intval(NV_CURRENTTIME);	
		 $kq +=($db->insert_id($sql, 'id', $data_insert)>0)?1:0;
		 }
	}
	return $kq; // trả lại giá trị không thực hiện được 
}

function menu_phanquyen($user='')
{
	global $db,$module_data,$lang_module;
	$listnm=array();
	
	$sql = "SELECT * FROM " . TABLE . "_groupmenu where id_nhom in";
	$sql .= "(SELECT id_nhomquyen FROM " . TABLE . "_groupuser where account like '".$user."')";
	$ds = $db->query($sql)->fetch();
	if (!empty($ds)){		
		$sql = 'SELECT * FROM ' . TABLE . '_menu WHERE status = 1 and mnid in ('.$ds['menu_truycap'].') ORDER BY stt asc';
		$listnm= $db->query($sql)->fetchAll();
	}
	return $listnm; // trả KQ 
}

/**
 * adminlink()
 *
 * @param mixed $id
 * @return
 */
function adminlink($id)
{
    global $lang_module, $module_name;
    $link = '<em class="fa fa-trash-o fa-lg">&nbsp;</em><a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=del_link&amp;id=' . $id . '">' . $lang_module['delete'] . '</a>&nbsp;&nbsp;';
    $link .= '<em class="fa fa-edit fa-lg">&nbsp;</em><a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=content&amp;id=' . $id . '">' . $lang_module['edit'] . '</a>';
    return $link;
}

function check_level2($dinhdanh, $diem=0, $tbl="")
{
	global $db,$module_data,$lang_module;
	$list=array();
	$sql="SELECT count(id) as sl from ".$tbl . " where diem_bvdg =".$diem." and dinhdanh like '%".$dinhdanh.".%'";
	$list=$db->query($sql)->fetch();
	if ($diem==5) var_dump($sql);
	if (!empty($list))return 0;
	return $list['sl']; // trả lại giá trị thực hiện được 
}
function nv_aleditor($textareaname, $width = '100%', $height = '650px', $val = '', $customtoolbar = '', $path = '', $currentpath = '')
{
    global $global_config, $module_upload, $module_data, $admin_info;

    $textareaid = preg_replace('/[^a-z0-9\-\_ ]/i', '_', $textareaname);
    $return = '<textarea style="width: ' . $width . '; height:' . $height . ';" id="' . $module_data . '_' . $textareaid . '" name="' . $textareaname . '">' . $val . '</textarea>';
    if (!defined('CKEDITOR')) {
        define('CKEDITOR', true);
        $return .= '<script type="text/javascript" src="' . NV_BASE_SITEURL . NV_EDITORSDIR . '/ckeditor/ckeditor.js?t=' . $global_config['timestamp'] . '"></script>';
        $return .= '<script type="text/javascript">CKEDITOR.timestamp=CKEDITOR.timestamp+' . $global_config['timestamp'] . ';</script>';
        if (defined('NV_IS_ADMIN')) {
            $return .= "<script type=\"text/javascript\">
            CKEDITOR.on('dialogDefinition', function(e) {
                if (e.data.name == 'image2' || e.data.name == 'video' || e.data.name == 'flash' || e.data.name == 'googledocs' || e.data.name == 'link') {
                    var contents;
                    if (e.data.name == 'googledocs') {
                        contents = e.data.definition.getContents('settingsTab');
                    } else {
                        contents = e.data.definition.getContents('info');
                    }
                    var dialogID = e.data.definition.dialog.parts.contents.$.id;
                    var fileButtons = new Array();
                    var textDOMOffset = -1;
                    $.each(contents.elements, function(k, v) {
                        if (v.type == 'text') {
                            textDOMOffset++;
                        } else if (v.type == 'vbox1') {
                            $.each(v.children[0].children, function(sk, sv) {
                                if (sv.type == 'text') {
                                    textDOMOffset++;
                                } else if (sv.type == 'button') {
                                    fileButtons.push([textDOMOffset, sv]);
                                }
                            });
                        } else if (v.type == 'hbox' || v.type == 'vbox') {
                            $.each(v.children, function(sk, sv) {
                                if (sv.type == 'text') {
                                    textDOMOffset++;
                                } else if (sv.type == 'button') {
                                    fileButtons.push([textDOMOffset, sv]);
                                }
                                if (typeof sv.children == 'object') {
                                    $.each(sv.children, function(ssk, ssv) {
                                        if (ssv.type == 'text') {
                                            textDOMOffset++;
                                        } else if (ssv.type == 'button') {
                                            fileButtons.push([textDOMOffset, ssv]);
                                        }
                                    });
                                }
                            });
                        }
                    });
                    $.each(fileButtons, function(k, v) {
                        var btn = v[1];
                        if (typeof btn.filebrowser != 'undefined') {
                            var offset = v[0];
                            var orgclickevent = btn.onClick;
                            btn.onClick = function(type, element) {
                                var textInputs = $('#' + dialogID).find('input[type=text].cke_dialog_ui_input_text');
                                var input = $(textInputs[offset]);
                                if (input.length == 1) {
                                    btn.filebrowser.url = btn.filebrowser.url.replace(/\&currentfile\=.*?$/g, '');
                                    btn.filebrowser.url = btn.filebrowser.url + '&currentfile=' + encodeURIComponent(input.val());
                                }
                                orgclickevent.call(this, type, element);
                            };
                        }
                    });
                }
            });
            </script>";
        }
    }
    $return .= "<script type=\"text/javascript\">CKEDITOR.replace( '" . $module_data . "_" . $textareaid . "', {" . (!empty($customtoolbar) ? 'toolbar : "' . $customtoolbar . '",' : '') . " width: '" . $width . "',height: '" . $height . "',";
    $return .= "contentsCss: '" . NV_BASE_SITEURL . NV_EDITORSDIR . "/ckeditor/nv.css?t=" . $global_config['timestamp'] . "',";

    if (defined('NV_IS_ADMIN')) {
        if (empty($path) and empty($currentpath)) {
            $path = NV_UPLOADS_DIR;
            $currentpath = NV_UPLOADS_DIR;

            if (!empty($module_upload) and file_exists(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . date("Y_m"))) {
                $currentpath = NV_UPLOADS_DIR . '/' . $module_upload . '/' . date('Y_m');
                $path = NV_UPLOADS_DIR . '/' . $module_upload;
            } elseif (!empty($module_upload) and file_exists(NV_UPLOADS_REAL_DIR . '/' . $module_upload)) {
                $currentpath = NV_UPLOADS_DIR . '/' . $module_upload;
            }
        }

        if (!empty($admin_info['allow_files_type'])) {
            $return .= "filebrowserUploadUrl: '" . NV_BASE_SITEURL . NV_ADMINDIR . "/index.php?" . NV_NAME_VARIABLE . "=upload&" . NV_OP_VARIABLE . "=upload&editor=ckeditor&path=" . $currentpath . "',";
        }

        if (in_array('images', $admin_info['allow_files_type'])) {
            $return .= "filebrowserImageUploadUrl: '" . NV_BASE_SITEURL . NV_ADMINDIR . "/index.php?" . NV_NAME_VARIABLE . "=upload&" . NV_OP_VARIABLE . "=upload&editor=ckeditor&path=" . $currentpath . "&type=image',";
        }

        if (in_array('flash', $admin_info['allow_files_type'])) {
            $return .= "filebrowserFlashUploadUrl: '" . NV_BASE_SITEURL . NV_ADMINDIR . "/index.php?" . NV_NAME_VARIABLE . "=upload&" . NV_OP_VARIABLE . "=upload&editor=ckeditor&path=" . $currentpath . "&type=flash',";
        }
        $return .= "filebrowserBrowseUrl: '" . NV_BASE_SITEURL . NV_ADMINDIR . "/index.php?" . NV_NAME_VARIABLE . "=upload&popup=1&path=" . $path . "&currentpath=" . $currentpath . "',
             filebrowserImageBrowseUrl: '" . NV_BASE_SITEURL . NV_ADMINDIR . "/index.php?" . NV_NAME_VARIABLE . "=upload&popup=1&type=image&path=" . $path . "&currentpath=" . $currentpath . "',
             filebrowserFlashBrowseUrl: '" . NV_BASE_SITEURL . NV_ADMINDIR . "/index.php?" . NV_NAME_VARIABLE . "=upload&popup=1&type=flash&path=" . $path . "&currentpath=" . $currentpath . "'
            ";
    } else {
        // Không có quyền admin (upload file) thì gỡ các plugin upload để không bị báo lỗi
        $return .= "removePlugins: 'uploadfile,uploadimage'";
    }

    $return .= "});</script>";
    return $return;
}