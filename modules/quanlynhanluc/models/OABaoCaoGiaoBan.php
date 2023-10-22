<?php
class OABaoCaoGiaoBan extends OAModel{
    protected $table;
    protected $primaryKey = 'id';
    protected $fields = [];
    protected $rooms = [
        'phong_kham_mat'        => 'PK Mắt',
        'phong_kham_so7'        => 'PK số 7',
        'phong_kham_rhm'        => 'PK RHM',
        'phong_cap_cuu_101'     => 'PK Cấp cứu 101',
        'phong_kham_noi_106'    => 'PK nội 106',
        'phong_kham_noi_107'    => 'PK nội 107',
        'phong_kham_noi_108'    => 'PK nội 108',
        'phong_kham_san_105'    => 'PK Sản 105',
        'phong_kham_nhi_104'    => 'PK Nhi 104',
        'phong_kham_ngoai_103'  => 'PK Ngoại 103',
        'phong_kham_yeu_cau'    => 'PK Yêu cầu',
        'phong_kham_dong_y'     => 'PK Đông Y',
        'phong_kham_tmh_210'    => 'PK TMH 210',
        'phong_kham_so13'       => 'Phòng Khám Số 13',
        'phong_kham_phuthu'     => 'Phòng Khám Đa Khoa Phú Thứ',
    ];
    protected $khoas = [
        'khoa_cc_hstc'  => 'Khoa CC-HSTC-CĐ',
        'khoa_ngoai_th' => 'Khoa Ngoại-TH',
        'khoa_phu_san'  => 'Khoa Phụ Sản',
        'khoa_nhi'      => 'Khoa Nhi',
        'khoa_noi_tn'   => 'Khoa Nội-Tn',
        'khu_yhct'      => 'Khu YHCT&PHCN',
    ];
    public function __construct(){
        parent::__construct();
        $this->table = $this->table_prefix . 'baocaogiaoban';
    }
    public function paginate($limit = 20,$options = []){
        $search = [];
        $operators = [];
        if( isset($_REQUEST['txt_find']) ){
            $txt_find = $_REQUEST['txt_find'];
            $search['title'] = "%$txt_find%";
            $operators['title'] = "LIKE";
        }
        if(isset($_REQUEST['tg_tungay'])  && isset($_REQUEST['tg_denngay']) ){
            $search['created_date'] = [$_REQUEST['tg_tungay'],$_REQUEST['tg_denngay']];
            $operators['created_date'] = "BETWEEN";
        }
        elseif( isset($_REQUEST['tg_tungay']) ){
            $search['created_date'] = $_REQUEST['tg_tungay'];
            $operators['created_date'] = ">=";
        }elseif( isset($_REQUEST['tg_denngay']) ){
            $search['created_date'] = $_REQUEST['tg_denngay'];
            $operators['created_date'] = "<=";
        }
        $options['search'] = $search;
        $options['operators'] = $operators;

        return parent::paginate($limit,$options);
    }
    public function format_items($items){
        global $user_info;
        $group_id = $user_info['group_id'];
        $username = $user_info['username'];
        
        $url = MODULE_LINK;
        foreach( $items as $k => $item ){
            $id = $item['id'];
            $items[$k]['key'] = $k + 1;
            $items[$k]['title'] = date('d/m/Y',strtotime($item['title'])); 
            $items[$k]['created_date'] = date('d/m/Y H:i:s',strtotime($item['created_date'])); 
            $items[$k]['updated_date'] = date('d/m/Y H:i:s',strtotime($item['updated_date'])); 
            $items[$k]['link_edit'] = $url.'&op=baocaogiaoban_add&id='.$item['id'];
            $items[$k]['link_view'] = $url.'&op=baocaogiaoban_add&layout=show&id='.$item['id'];
            $items[$k]['link_show'] = $url.'&op=baocaogiaoban_add&layout=slide&id='.$item['id'];
            if($item['block']){
                $items[$k]['link_edit'] = '#';
            }
            
            $items[$k]['link_export'] = '#';
            if($group_id == 1 || $username == 'khambenh' || $username == 'admin'){
                if($item['block']){
                    $link_block_html = '| <a href="javascript:;" onclick="blockBaoCaoGiaoBan('.$id.',0)">Mở khóa</a>';
                }else{
                    $link_block_html = '| <a href="javascript:;" onclick="blockBaoCaoGiaoBan('.$id.',1)">Khóa</a>';
                }

                $link_export =  $url.'&op=baocaogiaoban&task=export&id='.$item['id'];
                $items[$k]['link_export'] = $link_export;
            }
            $items[$k]['link_block_html'] = $link_block_html;
        }
        return $items;
    }
    public function format_item($item){
        $item['sgb'] = json_decode($item['sgb'],true);
        $item['tinh_hinh_benh_nhan'] = json_decode($item['tinh_hinh_benh_nhan'],true);
        $item['hoat_dong_dieu_tri'] = json_decode($item['hoat_dong_dieu_tri'],true);
        $item['benh_nhan_theo_doi'] = json_decode($item['benh_nhan_theo_doi'],true);
        $item['benh_nhan_mo_cap_cuu'] = json_decode($item['benh_nhan_mo_cap_cuu'],true);
        $item['benh_nhan_mo_phien'] = json_decode($item['benh_nhan_mo_phien'],true);
        $item['benh_nhan_chuyen_tuyen'] = json_decode($item['benh_nhan_chuyen_tuyen'],true);

        $benh_nhan_theo_dois = [];
        foreach( $item['benh_nhan_theo_doi'] as $khoa => $khoa_data ){
            foreach( $khoa_data['tieude'] as $k => $value ){
                $benh_nhan_theo_dois[$khoa][] = [
                    'tieude' => $value,
                    'noidung' => $khoa_data['noidung'][$k],
                ];
            }
        }
        $item['benh_nhan_theo_doi'] = $benh_nhan_theo_dois;

        $benh_nhan_chuyen_tuyens = [];
        foreach( $item['benh_nhan_chuyen_tuyen']['benh_nhan'] as $k => $value ){
            $benh_nhan_chuyen_tuyens[$k] = [
                'benh_nhan' => $value,
                'chuan_doan' => $item['benh_nhan_chuyen_tuyen']['chuan_doan'][$k],
                'noi_chuyen_den' => $item['benh_nhan_chuyen_tuyen']['noi_chuyen_den'][$k],
            ];
        }
        $item['benh_nhan_chuyen_tuyen'] = $benh_nhan_chuyen_tuyens;


        $item['created_date'] = date('d/m/Y H:i:s',strtotime($item['created_date'])); 
        $item['updated_date'] = date('d/m/Y H:i:s',strtotime($item['updated_date'])); 
        $item['link_edit'] = str_replace('op=baocaogiaoban','op=baocaogiaoban_add&id='.$item['id'],$this->home_url);
        $item['link_view'] = str_replace('op=baocaogiaoban','op=baocaogiaoban_add&layout=show&id='.$item['id'],$this->home_url);
        return $item;
    }

    public function handleAjax($action,$data = []){
        switch ($action) {
            case 'tong_benh_nhan_kham':
                $this->chart_tong_benh_nhan_kham();
                break;
            case 'ti_le_vao_vien':
                $this->chart_ti_le_vao_vien();
                break;
            case 'tong_benh_nhan_dieu_tri':
                $this->chart_tong_benh_nhan_dieu_tri();
                break;
            case 'tong_benh_nhan_dieu_tri_yeu_cau':
                $this->chart_tong_benh_nhan_dieu_tri_yeu_cau();
                break;
            case 'blockBaoCaoGiaoBan':
                $this->blockBaoCaoGiaoBan($_REQUEST);
                break;
            default:
                # code...
                break;
        }
    }

    public function blockBaoCaoGiaoBan($data){
        $status = $data['status'];
        $id = $data['id'];
        $item = $this->update($id,[
            'block' => $status
        ]);
        return $item;
    }

    public function chart_tong_benh_nhan_dieu_tri(){
        $endDate = strtotime('-1 month');
        $currentDate = time();

        $daysList = [];
        while ($currentDate > $endDate) {
            $daysList[] = date('Y-m-d', $currentDate);
            $currentDate = strtotime('-1 day', $currentDate);
        }
        $data = [];
        $ykeys = ['tong'];
        $labels = ['Tổng'];
        $lineColors = ['tong' => '#FF9F55'];
        foreach($daysList as $key =>  $day){
            $item = $this->findByField('DATE(created_date)',$day);
            if(!$item){
                continue;
            }
            $hddt = $item['hoat_dong_dieu_tri'] ? json_decode($item['hoat_dong_dieu_tri'],true) : [];
            $data[$key] = [
                'ngay' => $day,
                'tong' => $hddt['tong_sobn'],
            ];
            foreach($this->khoas as $room => $room_name){
                $lineColors[$room] = $this->generateRandomColor();
                $ykeys[$room] = $room;
                $labels[$room] = $room_name;
                $data[$key][$room] = !empty($hddt[$room]['bn_tong']) ? (int)$hddt[$room]['bn_tong'] : 0;
            }
        }
        $return = [
            'data' => array_values($data),
            'ykeys' => array_values($ykeys),
            'labels' => array_values($labels),
            'lineColors' => array_values($lineColors),
        ];
        echo json_encode($return);
        die();
    }
    public function chart_tong_benh_nhan_dieu_tri_yeu_cau(){
        $endDate = strtotime('-1 month');
        $currentDate = time();

        $daysList = [];
        while ($currentDate > $endDate) {
            $daysList[] = date('Y-m-d', $currentDate);
            $currentDate = strtotime('-1 day', $currentDate);
        }
        $data = [];
        $ykeys = ['tong'];
        $labels = ['Tổng'];
        $lineColors = ['tong' => '#FF9F55'];
        foreach($daysList as $key =>  $day){
            $item = $this->findByField('DATE(created_date)',$day);
            if(!$item){
                continue;
            }
            $hddt = $item['hoat_dong_dieu_tri'] ? json_decode($item['hoat_dong_dieu_tri'],true) : [];
            $data[$key] = [
                'ngay' => $day,
                'tong' => $hddt['tong_ctyc'],
            ];
            foreach($this->khoas as $room => $room_name){
                $lineColors[$room] = $this->generateRandomColor();
                $ykeys[$room] = $room;
                $labels[$room] = $room_name;
                $data[$key][$room] = !empty($hddt[$room]['bn_namyc']) ? (int)$hddt[$room]['bn_namyc'] : 0;
            }
        }
        $return = [
            'data' => array_values($data),
            'ykeys' => array_values($ykeys),
            'labels' => array_values($labels),
            'lineColors' => array_values($lineColors),
        ];
        echo json_encode($return);
        die();
    }
    public function chart_ti_le_vao_vien(){
        $endDate = strtotime('-1 month');
        $currentDate = time();

        $daysList = [];
        while ($currentDate > $endDate) {
            $daysList[] = date('Y-m-d', $currentDate);
            $currentDate = strtotime('-1 day', $currentDate);
        }
        $data = [];
        $ykeys = ['tong'];
        $labels = ['Tổng'];
        $lineColors = ['tong' => '#FF9F55'];
        foreach($daysList as $key =>  $day){
            $item = $this->findByField('DATE(created_date)',$day);
            if(!$item){
                continue;
            }
            $thbn = $item['tinh_hinh_benh_nhan'] ? json_decode($item['tinh_hinh_benh_nhan'],true) : [];
            $data[$key] = [
                'ngay' => $day,
                'tong'   => !empty($thbn['tsbn']['tong_so_phantram']) ? (int)$thbn['tsbn']['tong_so_phantram'] : 0,
            ];
            foreach($this->rooms as $room => $room_name){
                $lineColors[$room] = $this->generateRandomColor();
                $ykeys[$room] = $room;
                $labels[$room] = $room_name;
                $data[$key][$room] = !empty($thbn['tsbn'][$room]['phantram_vao_vien']) ? (int)$thbn['tsbn'][$room]['phantram_vao_vien'] : 0;
            }
        }
        $return = [
            'data' => array_values($data),
            'ykeys' => array_values($ykeys),
            'labels' => array_values($labels),
            'lineColors' => array_values($lineColors),
        ];
        echo json_encode($return);
        die();
    }
    public function chart_tong_benh_nhan_kham(){
        $endDate = strtotime('-1 month');
        $currentDate = time();

        $daysList = [];
        while ($currentDate > $endDate) {
            $daysList[] = date('Y-m-d', $currentDate);
            $currentDate = strtotime('-1 day', $currentDate);
        }

        $data = [];
        foreach($daysList as $day){
            $item = $this->findByField('DATE(created_date)',$day);
            if(!$item){
                continue;
            }
            $thbn = $item['tinh_hinh_benh_nhan'] ? json_decode($item['tinh_hinh_benh_nhan'],true) : [];
            $data[] = [
                'ngay' => $day,
                'tongbn'    => !empty($thbn['tongbn']) ? $thbn['tongbn'] : 0,
                'noitinh'   => !empty($thbn['noitinh']) ? $thbn['noitinh'] : 0,
                'ngoaitinh' => !empty($thbn['ngoaitinh']) ? $thbn['ngoaitinh'] : 0,
                'vienphi' => !empty($thbn['bn_vienphi']) ? $thbn['bn_vienphi'] : 0,
            ];
        }

        $ykeys = ['tongbn','noitinh','ngoaitinh','vienphi'];
        $labels = ['Tổng BN','Nội Tỉnh','Ngoại Tỉnh','Viện Phí'];
        $lineColors = ['#FF9F55','#5FBEAA', '#5D9CEC', '#cCcCcC'];

        $return = [
            'data' => $data,
            'ykeys' => $ykeys,
            'labels' => $labels,
            'lineColors' => $lineColors,
        ];

        echo json_encode($return);
        die();
    }

    function generateRandomColor() {
        // Generate random RGB values
        $red = rand(0, 255);
        $green = rand(0, 255);
        $blue = rand(0, 255);
    
        // Format the RGB values as a six-character hexadecimal color code
        $colorCode = sprintf("#%02x%02x%02x", $red, $green, $blue);
    
        return strtoupper($colorCode);
    }

    public function export($id){
        global $module_info;
        $libs_path = NV_ROOTDIR . '/modules/' . $module_info['module_file'].'/libs/';
        $templates_path = NV_ROOTDIR . '/modules/' . $module_info['module_file'].'/export_templates/';
        include_once $libs_path.'/tbs_plugin_opentbs/tbs_class.php';
        include_once $libs_path.'/tbs_plugin_opentbs/tbs_plugin_opentbs.php';
        $item = $this->find($id);
        $item = $this->format_item($item);
        
        $TBS = new clsTinyButStrong;
        $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);

        $type = 'mau-bien-ban-bao-cao-giao-ban';

        $item['sgb']['noi_dung_khac'] = explode("\n",$item['sgb']['noi_dung_khac']);

        $params = [
            'bat_dau_ngay'              => $item['sgb']['bat_dau']['ngay'],
            'bat_dau_thang'             => $item['sgb']['bat_dau']['thang'],
            'bat_dau_nam'               => $item['sgb']['bat_dau']['nam'],
            'bat_dau_gio'               => $item['sgb']['bat_dau']['gio'],
            'bat_dau_phut'              => $item['sgb']['bat_dau']['phut'],
            'tham_du_chu_tri'           => $item['sgb']['tham_du']['chu_tri'],
            'tham_du_thu_ky'            => $item['sgb']['tham_du']['thu_ky'],
            'tham_du_thanh_phan_khac'   => $item['sgb']['tham_du']['thanh_phan_khac'],
            'noi_dung_khac'             => $item['sgb']['noi_dung_khac'] ? implode("\n",$item['sgb']['noi_dung_khac']) : '.',
            'ket_thuc_ngay'             => $item['sgb']['ket_thuc']['ngay'],
            'ket_thuc_thang'            => $item['sgb']['ket_thuc']['thang'],
            'ket_thuc_nam'              => $item['sgb']['ket_thuc']['nam'],
            'ket_thuc_gio'              => $item['sgb']['ket_thuc']['gio'],
            'ket_thuc_phut'             => $item['sgb']['ket_thuc']['phut'],
            'tham_du_chu_tri_sign'      => trim( current( explode(',',$item['sgb']['tham_du']['chu_tri']) ) ),
            'tham_du_thu_ky_sign'      => trim( current( explode(',',$item['sgb']['tham_du']['thu_ky']) ) )
        ];
        foreach( $params as $p_key => $p_value ){
            $GLOBALS[$p_key] = $p_value;
        }


        $template = $templates_path.$type.'.docx';
        $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);

        $save_as = '';
        $output_file_name = $type.'.docx';
        $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name);
        exit();
    }
}