<?php
class OAKhoa extends OAModel{
    protected $table;
    protected $primaryKey = 'id';
    protected $fields = [];
    
    public function __construct(){
        global $db_config;
        parent::__construct();
        $this->db_prefix    = $db_config['prefix'];
        $this->table = $this->db_prefix . '_users_groups';
    }

    public function all(){
        $items = $this->app_db->get($this->table);
        return $items;
    }
    public function khoas(){
        $this->app_db->where('group_id',7,'>');
        $items = $this->app_db->get($this->table);
        return $items;
    }
}