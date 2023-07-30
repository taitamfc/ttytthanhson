<?php
class OABaoCaoGiaoBan extends OAModel{
    protected $table;
    protected $primaryKey = 'id';
    protected $fields = [];
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
        if( isset($_REQUEST['tg_tungay']) ){
            $search['created_date'] = $_REQUEST['tg_tungay'];
            $operators['created_date'] = ">=";
        }
        if( isset($_REQUEST['tg_denngay']) ){
            $search['created_date'] = $_REQUEST['tg_denngay'];
            $operators['created_date'] = "<=";
        }
        $options['search'] = $search;
        $options['operators'] = $operators;
        return parent::paginate($limit,$options);
    }
    public function format_items($items){
        foreach( $items as $k => $item ){
            $items[$k]['created_date'] = date('d/m/Y H:i:s',strtotime($item['created_date'])); 
            $items[$k]['updated_date'] = date('d/m/Y H:i:s',strtotime($item['updated_date'])); 
            $items[$k]['link_edit'] = str_replace('op=baocaogiaoban','op=baocaogiaoban_add&id='.$item['id'],$this->home_url);
            $items[$k]['link_view'] = str_replace('op=baocaogiaoban','op=baocaogiaoban_add&layout=show&id='.$item['id'],$this->home_url);
        }
        return $items;
    }
    public function format_item($item){
        
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
}