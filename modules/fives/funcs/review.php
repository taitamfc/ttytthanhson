<?php

/**
 * TMS Content Management System
 * @version 4.x
 * @author Tập Đoàn TMS Holdings <contact@thuongmaiso.vn>
 * @copyright (C) 2009-2021 Tập Đoàn TMS Holdings. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://thuongmaiso.vn
 */


if (!defined('NV_IS_USER')) {
    $url_redirect = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '='.$op,true);
    Header( 'Location: ' . NV_BASE_SITEURL . 'index.php?' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt( $url_redirect ) );
    die( );
}

//$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name;
    $contents = '';
    $page = 1;
    if(!empty($array_op[1]))
    {

     $rowdetail = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_row WHERE id='.$array_op[1])->fetch();
     $contents = nv_page_review($rowdetail);
            
    } 

    else{


        $db_slave->sqlreset()
            ->select('*')
            ->from(NV_PREFIXLANG . '_' . $module_data.'_row')
            ->where('status=1')
            ->order('weight ASC')
            ->limit(1);
        $rowdetail = $db_slave->query($db_slave->sql())
            ->fetch();
     
        
    // Xem theo danh sách
    if ($page > 1) {
        $page_url .= '&amp;' . NV_OP_VARIABLE . '=page-' . $page;
    }

    //$canonicalUrl = getCanonicalUrl($page_url, true, true);

    $page_title = $module_info['site_title'];
    $key_words = $module_info['keywords'];
    $mod_title = isset($lang_module['main_title']) ? $lang_module['main_title'] : $module_info['custom_title'];
    $per_page = $page_config['per_page'];

    $array_data = [];
    $db_slave->sqlreset()
    ->select('COUNT(*)')
    ->from(NV_PREFIXLANG . '_' . $module_data.'_row')
    ->where('status=1');
    $num_items = $db_slave->query($db_slave->sql())
    ->fetchColumn();

    // Không cho tùy ý đánh số page + xác định trang trước, trang sau
    betweenURLs($page, ceil($num_items / $per_page), $base_url, '/page-', $prevPage, $nextPage);

    $db_slave->select('*')
    ->order('time_from DESC')
    ->limit($per_page)
    ->offset(($page - 1) * $per_page);

    $result = $db_slave->query($db_slave->sql());
    while ($row = $result->fetch()) {
        $row['hometext'] = nv_clean60($row['hometext'], 300);
        $row['link'] = $base_url . '&amp;' . NV_OP_VARIABLE . '=review'.'/'. $row['id'] . $global_config['rewrite_exturl'];
        $array_data[$row['id']] = $row;
    }

    $generate_page = nv_alias_page($page_title, $base_url, $num_items, $per_page, $page);

    if ($page > 1) {
        $page_title .= NV_TITLEBAR_DEFIS . $lang_global['page'] . ' ' . $page;
    }

    $contents = nv_page_review_list($array_data, $generate_page);
     }




include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
