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
        $ngay = date('Y-m-d',strtotime($data['ngaygio']));
        $check = $this->all([
            'search' => [
                'DATE(ngaygio)' => $ngay,
                'account' => 'khoakb'
            ],
            'limit' => 1
        ]);

        if($check){
            $this->update($check['id'],$data);
        }else{
            $this->save($data);
        }
    }
}