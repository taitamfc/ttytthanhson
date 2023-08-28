<?php
class OABaoCaoKhamChuaBenh extends OAModel{
    protected $table;
    protected $primaryKey = 'id';
    protected $fields = [];
    
    public function __construct(){
        parent::__construct();
        $this->table = $this->table_prefix . 'baocaokcb';
    }
    public function saveOrUpdate($data){
        $ngaygio = date('Y-m-d',strtotime($data['ngaygio']));
        $check = $this->all([
            'search' => [
                'DATE(ngaygio)' => $ngaygio,
                'account' => $data['account']
            ],
            'limit' => 1
        ]);
        if( $check ){
            $this->update($check['id'],$data);
        }else{
            $this->save($data);
        }
    }
}