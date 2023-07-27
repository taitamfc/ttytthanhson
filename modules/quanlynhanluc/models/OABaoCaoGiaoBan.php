<?php
class OABaoCaoGiaoBan extends OAModel{
    protected $table;
    protected $primaryKey = 'id';
    protected $fields = [];
    public function __construct(){
        parent::__construct();
        $this->table = $this->table_prefix . 'baocaogiaoban';
    }
    public function format_items($items){
        foreach( $items as $k => $item ){
            $items[$k]['created_date'] = date('d/m/Y H:i:s',strtotime($item['created_date'])); 
            $items[$k]['updated_date'] = date('d/m/Y H:i:s',strtotime($item['updated_date'])); 
            $link_view = str_replace('op=baocaogiaoban','op=baocaogiaoban_add&id='.$item['id'],$this->home_url);
            $items[$k]['link_view'] = $link_view;
        }
        return $items;
    }
    public function format_item($item){
        
        $item['tinh_hinh_benh_nhan'] = json_decode($item['tinh_hinh_benh_nhan'],true);
        $item['hoat_dong_dieu_tri'] = json_decode($item['hoat_dong_dieu_tri'],true);
        $item['benh_nhan_theo_doi'] = json_decode($item['benh_nhan_theo_doi'],true);

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


        $item['created_date'] = date('d/m/Y H:i:s',strtotime($item['created_date'])); 
        $item['updated_date'] = date('d/m/Y H:i:s',strtotime($item['updated_date'])); 
        $link_view = str_replace('op=baocaogiaoban','op=baocaogiaoban_add&id='.$item['id'],$this->home_url);
        $item['link_view'] = $link_view;
        return $item;
    }
}