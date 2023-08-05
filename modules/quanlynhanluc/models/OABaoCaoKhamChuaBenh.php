<?php
class OABaoCaoKhamChuaBenh extends OAModel{
    protected $table;
    protected $primaryKey = 'id';
    protected $fields = [];
    
    public function __construct(){
        parent::__construct();
        $this->table = $this->table_prefix . 'baocaokcb';
    }
}