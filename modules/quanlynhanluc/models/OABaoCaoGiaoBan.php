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
}