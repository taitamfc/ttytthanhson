<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

if (!nv_function_exists('nv_slide_homepage')) {
    /**
     * nv_block_config_page_list()
     *
     * @param string $module
     * @param array  $data_block
     * @param array  $lang_block
     * @return string
     */
    function nv_block_config_page_list($module, $data_block, $lang_block)
    {
		global $nv_Cache, $global_config, $site_mods, $db;
		$db->sqlreset()->select('*')->from(NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'].'_cat')->where('inhome = 1')->order('weight ASC');
        $list = $nv_Cache->db($db->sql(), 'catid', $module);
		
		
        $html = '';
        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['title_length'] . ':</label>';
        $html .= '<select class="form-control w500" name="config_title_length">';
		foreach ($list as $l) {
				$html .= '<option value="'.$l['catid'].'">'.$l['title'].'</option>';
		}
		$html .= '</select>';
		$html .= '</div>';
		
        $html .= '<div class="form-group">';
        $html .= '	<label class="control-label col-sm-6">' . $lang_block['numrow'] . ':</label>';

        $html .= '	<div class="col-sm-9"><input type="text" name="config_numrow" class="form-control" value="' . $data_block['numrow'] . '"/></div>';
        
		$html .= '</div>';

        return $html;
    }

    /**
     * nv_block_config_page_list_submit()
     *
     * @param string $module
     * @param array  $lang_block
     * @return array
     */
    function nv_block_config_page_list_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = [];
        $return['error'] = [];
        $return['config'] = [];
        $return['config']['catid'] = $nv_Request->get_int('config_title_length', 'post', 24);
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 5);

        return $return;
    }

    /**
     * nv_slide_homepage()
     *
     * @param array $block_config
     * @return string
     */
    function nv_slide_homepage($block_config)
    {
        global $lang_module, $nv_Cache, $global_config, $site_mods, $db,$module_info;
        $module = $block_config['module'];

        if (!isset($site_mods[$module])) {
            return '';
        }
        $db->sqlreset()->select('*')->from(NV_PREFIXLANG . '_' . $site_mods[$module]['module_data'].'_rows')->where('status = 1 and catid='.$block_config['catid'] )->order('add_time DESC')->limit($block_config['numrow']);
        $list = $nv_Cache->db($db->sql(), 'id', $module);

        if (!empty($list)) {
            if (file_exists(NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/weblinks/block_homepage.tpl')) {
                $block_theme = $global_config['module_theme'];
            } elseif (file_exists(NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/weblinks/block_homepage.tpl')) {
                $block_theme = $global_config['site_theme'];
            } else {
                $block_theme = 'default';
            }

            $xtpl = new XTemplate('block_homepage.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/weblinks' );
			$xtpl->assign('THEMES_URL', NV_BASE_SITEURL. '/themes/' . $block_theme.'/css/slide');
			$xtpl->assign('detail', $lang_module['detail']);
			$stt=0;
            foreach ($list as $l) {
                $l['url_img'] = NV_BASE_SITEURL . 'uploads/' . $l['urlimg'];
				$l['active']=$stt==0?" block ":"none";
				$l['stt']=++$stt;
				$l['tieude']=!empty($l['description'])?$l['description']:$l['title'];
				$xtpl->assign('ROW', $l);
                $xtpl->parse('main.row');
                //$xtpl->parse('main.dot');
            }
            $xtpl->parse('main');
            return $xtpl->text('main');
        }

        return '';
    }
}

if (defined('NV_SYSTEM')) {
    $content = nv_slide_homepage($block_config);
}
