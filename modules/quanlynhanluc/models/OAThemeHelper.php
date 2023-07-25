<?php
class OAThemeHelper extends OAModel{
    public function renderItemsFromArray($xtpl,$items,$key_item = 'item',$key_loop = 'main.view.loop',$options = []){
        global $module_data;
        foreach( $items as $item ){
            if( isset($item['files']) && $item['files'] ){
                $files = $item['files'];
                $files = json_decode($files);
                $the_files = [];
                foreach( $files as $file ){
                    $the_files[] = '<a download target="_blank" href="/'.NV_UPLOADS_DIR.'/'.$module_data.'/'.$file.'">'.$file.'</a>';
                }
                $item['files'] = implode(',',$the_files);

            }
            $xtpl->assign($key_item, $item);
            $xtpl->parse($key_loop);
        }
        return $xtpl;
    }
    public function format_files($files,$implode = false){
        global $module_data;
        $the_files = [];
        if( $files && count($files) ){
            foreach( $files as $file ){
                $the_files[] = '<a download target="_blank" href="/'.NV_UPLOADS_DIR.'/'.$module_data.'/'.$file.'">'.$file.'</a>';
            }
        }
        
        if($implode){
            return implode(' ',$the_files);
        }
        return $the_files;
    }
    public function renderOptions($xtpl,$items,$key_item = 'item',$key_loop = 'main.view.loop',$options = []){
        global $module_data;
        foreach ($items as $key => $value) {
            $xtpl->assign($key_item, [
                'key' => $key,
                'value' => $value,
                'selected' => @($options['selected'] == $key) ? 'selected="selected"' : ''
            ]);
            $xtpl->parse($key_loop);
        }
        return $xtpl;
    }

    public function setView($viewName,$n_module_file = null){
        global $global_config,$module_file,$lang_module,$module_name,$op;
        if($n_module_file){
            $module_file = $n_module_file;
        }
        $xtpl = new XTemplate($viewName, NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
        $xtpl->assign('LANG', $lang_module);
        $xtpl->assign('MODULE_NAME', $module_name);
        $xtpl->assign('OP', $op);
        $xtpl->assign('ADMIN_URL', $this->admin_url);
        $xtpl->assign('HOME_URL', $this->home_url);
        $xtpl->assign('BASE_URL', $this->home_url);
        return $xtpl;
    }

    public function renderLocation($xtpl,$options = []){
        $default_options = [
            'key' => 'LOCATION',
            'field_prefix' => '',
            'fields' => [
                'NameCountry' => 'countryid',
                'NameProvince' => 'provinceid',
                'NameDistrict' => 'districtid',
                'NameWard' => 'wardid',
            ],
            'values' => [
                'SelectCountryid' => 0,
                'SelectProvinceid' => 0,
                'SelectDistrictid' => 0,
                'SelectWardid' => 0,
            ],
            'attribute' => [
                'ColClass' => 'col-xs-24 col-sm-6 col-md-8'
            ]
        ];
        $options = array_merge($default_options,$options);
        require_once NV_ROOTDIR . '/modules/location/location.class.php';
        $location = new Location();
        foreach( $options['fields'] as $key => $value ){
            $location->set($key,$options['field_prefix'].$value);
        }
        foreach( $options['values'] as $key => $value ){
            $location->set($key,$value);
        }
        $location->set('IsDistrict', 1);
        $location->set('IsWard', 1);
        $location->set('AllowProvince', 0);
        $location->set('BlankTitleProvince', 1);
        $location->set('BlankTitleDistrict', 1);
        $location->set('BlankTitleWard', 1);
        $location->set('ColClass', $options['attribute']['ColClass']);
        $xtpl->assign($options['key'], $location->buildInput());
        return $xtpl;
    }

    public function uploadFile($file,$name = 'file',$prefix = ''){
        global $module_upload,$global_config;
        $upload = new NukeViet\Files\Upload($global_config['file_allowed_ext'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);
        $upload_info = $upload->save_file($file, NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload, false);
        @unlink($file['tmp_name']);
        $uploaded = '';
        if (empty($upload_info['error'])) {
            mt_srand((double) microtime() * 1000000);
            $maxran = 1000000;
            $random_num = mt_rand(0, $maxran);
            $random_num = md5($random_num);
            $nv_pathinfo_filename = nv_pathinfo_filename($upload_info['name']);
            $new_name = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' .$prefix. $nv_pathinfo_filename . '.' . $random_num . '.' . $upload_info['ext'];
            $rename = nv_renamefile($upload_info['name'], $new_name);
            if ($rename[0] == 1) {
                $fileupload = $new_name;
            } else {
                $fileupload = $upload_info['name'];
            }
            @chmod($fileupload, 0644);
            $uploaded = str_replace(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/', '', $fileupload);
        }
        unset($upload, $upload_info);
        return $uploaded;
    }

    public function imageToString($imgData,$newFileName = 'tmp.png'){
        global $module_upload,$global_config;
        // $imgData = base64_decode($imgData);
        $image = imagecreatefrompng($imgData);
        $filePath = '';
        if ($image !== false) {
            $filePath = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload.'/'.$newFileName;
            imagepng($image, $filePath);
            imagedestroy($image);
            $filePath = NV_UPLOADS_DIR . '/' . $module_upload.'/'.$newFileName;
        }
        return $filePath;
    }
    public function uploadMultiFiles($files,$input_name = 'files'){
        $array_files = [];
        $uploadeds = [];
        foreach($files['name'] as $name => $fileuploads){
            foreach( $fileuploads as $k => $fileupload ){
                $array_files[] = [
                    'name' => $files['name'][$name][$k],
                    'type' => $files['type'][$name][$k],
                    'tmp_name' => $files['tmp_name'][$name][$k],
                    'error' => $files['error'][$name][$k],
                    'size' => $files['size'][$name][$k],
                ];
            }
        }
        if( count($array_files) ){
            foreach( $array_files as $file ){
                $uploadeds[] = $this->uploadFile($file);
            }
        }
        return $uploadeds;
    }
    public function uploadFiles($files,$name = 'files'){
        global $module_upload,$global_config;
        $upload_fileupload = $files[$name];
        $array_files = [];
        $uploaded = [];
        if( isset($upload_fileupload['name']) ){
            foreach($upload_fileupload['name'] as $k => $fileuploads){
                $array_files[] = [
                    'name' => $upload_fileupload['name'][$k],
                    'type' => $upload_fileupload['type'][$k],
                    'tmp_name' => $upload_fileupload['tmp_name'][$k],
                    'error' => $upload_fileupload['error'][$k],
                    'size' => $upload_fileupload['size'][$k],
                ];
            }
        }
        if( count($array_files) ){
            foreach ($array_files as $k => $file) {
                if (!empty($file['name'])) {
                    $upload = new NukeViet\Files\Upload($global_config['file_allowed_ext'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);
                    $upload_info = $upload->save_file($file, NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload, false);
                    @unlink($file['tmp_name']);
                    if (empty($upload_info['error'])) {
                        mt_srand((double) microtime() * 1000000);
                        $maxran = 1000000;
                        $random_num = mt_rand(0, $maxran);
                        $random_num = md5($random_num);
                        $nv_pathinfo_filename = nv_pathinfo_filename($upload_info['name']);
                        $new_name = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $nv_pathinfo_filename . '.' . $random_num . '.' . $upload_info['ext'];
                        $rename = nv_renamefile($upload_info['name'], $new_name);
                        if ($rename[0] == 1) {
                            $fileupload = $new_name;
                        } else {
                            $fileupload = $upload_info['name'];
                        }
                        @chmod($fileupload, 0644);
                        
                        $uploaded[$k] = str_replace(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/', '', $fileupload);
                    }
                    unset($upload, $upload_info);
                }
            }
        }
        return $uploaded;
    }
    public function convertPluckArrayToOptions($array,$selected = ''){
        $data = [];
        foreach( $array as $k => $v ){
            $data[] = [
                'key' => $k,
                'value' => $v,
                'selected' => $selected == $k ? 'selected' : ''
            ];
        }
        return $data;
    }

    public function locationString($provinceid = 0, $districtid = 0, $wardid = 0, $caret = ' » ', $module_url = '')
    {
        require_once NV_ROOTDIR . '/modules/location/location.class.php';
        $location = new Location();
        $full_address = $location->locationString($provinceid,$districtid,$wardid,', ');
        return $full_address;
    }

    public function sendEmail($email, $subject, $message){
        global $global_config;
        return nv_sendmail([$global_config['site_name'], $global_config['site_email']], $email, $subject, $message);
    }
    
}