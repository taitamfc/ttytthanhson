<?php
global $module_info;
include_once NV_ROOTDIR . '/modules/' . $module_info['module_file'].'/models/MysqliDb.php';
class OAModel {
    protected $db;
    protected $app_db;
    protected $table;
    protected $table_prefix;
    protected $db_prefix;
    protected $itemPerPage = 20;
    protected $fields = [];
    protected $primaryKey = 'id';
    public $home_url;
    public $admin_url;
    public function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        
        global $db, $db_config, $module_data,$module_name,$op;
        $this->db = $db;
        $this->table_prefix = $db_config['prefix'] . '_vi_quanlynhanluc_';
        $this->db_prefix    = $db_config['prefix'];
        $this->home_url     = 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op;
        $this->admin_url    = NV_BASE_ADMINURL . $this->home_url;
        
        // $mysqli = new mysqli ($db_config['dbhost'], $db_config['dbuname'], $db_config['dbpass'], $db_config['dbname']);
        
        $this->app_db = new MysqliDb (Array (
            'host' => $db_config['dbhost'],
            'username' => $db_config['dbuname'], 
            'password' => $db_config['mydbpass'],
            'db'=> $db_config['dbname'],
            'port' => 3306,
            'prefix' => '',
            'charset' => 'utf8'));
        // $this->app_db = new MysqliDb ($mysqli);

    }
    public function all($options = []){
        $limit = isset( $options['limit'] ) ? $options['limit'] : null;
        $search = isset( $options['search'] ) ? $options['search'] : [];
        $joins = isset( $options['join'] ) ? $options['join'] : [];
        $operators = isset( $options['operators'] ) ? $options['operators'] : [];
        $order = isset( $options['order'] ) ? $options['order'] : [
            'orderBy' => $this->primaryKey,
            'orderDir' => 'desc'
        ];
        $fields = isset( $options['fields'] ) && is_array($options['fields']) && count($options['fields']) ? implode(',',$options['fields']) : [];
        
        if( count($joins) ){
            foreach( $joins as $join ){
                $this->app_db->join($join[0], $join[1]);
            }
        }
        if( count($search) ){
            foreach( $search as $field => $value ){
                $this->app_db->where (
                    $field, 
                    $value,
                    isset($operators[$field]) ? $operators[$field] : '='
                );
            }
        }
        $this->app_db->orderBy($order['orderBy'],$order['orderDir']);
        try {
            if( $limit == 1 ){
                return $this->app_db->getOne($this->table,$fields);
            }
            $items = $this->app_db->get($this->table,$limit,$fields);
            return $items;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        
    }
    public function paginate($limit = 20,$options = []){
        $this->itemPerPage = $limit;
        global $nv_Request;
        $page = $nv_Request->get_int('page', 'post,get', 1);
        $search = isset( $options['search'] ) ? $options['search'] : [];
        $joins = isset( $options['join'] ) ? $options['join'] : [];
        $fields = isset( $options['fields'] ) && is_array($options['fields']) && count($options['fields']) ? implode(',',$options['fields']) : [];
        $operators = isset( $options['operators'] ) ? $options['operators'] : [];
        $order = isset( $options['order'] ) ? $options['order'] : [
            'orderBy' => $this->primaryKey,
            'orderDir' => 'desc'
        ];
        if( count($joins) ){
            foreach( $joins as $join ){
                $this->app_db->join($join[0], $join[1]);
            }
        }
        if( count($search) ){
            foreach( $search as $field => $value ){
                if($value){
                    $this->app_db->where (
                        $field, 
                        $value,
                        isset($operators[$field]) ? $operators[$field] : '='
                    );
                }
            }
        }
        
        $limit = isset( $options['limit'] ) ? $options['limit'] : $limit;
        // $page = isset( $options['page'] ) ? $options['page'] : 1;
        $this->app_db->pageLimit = $limit;
        $this->app_db->orderBy($order['orderBy'],$order['orderDir']);
        $items = $this->app_db->arraybuilder()->paginate($this->table, $page);
        $return = [
            'items' => $items,
            'totalPages' => $this->app_db->totalPages,
            'totalCount' => $this->app_db->totalCount,
            'pageLimit' => $this->app_db->pageLimit,
        ];
        return $return;
    }
    public function findByField($field,$value){
        $this->app_db->where ($field, $value);
        $item = $this->app_db->getOne ($this->table);
        return $item;
    }
    public function find($id,$options = []){
        $this->app_db->where ($this->primaryKey, $id);
        $search = isset( $options['search'] ) ? $options['search'] : [];
        $joins = isset( $options['join'] ) ? $options['join'] : [];
        // $fields = isset( $options['fields'] ) && is_array($options['fields']) && count($options['fields']) ? implode(',',$options['fields']) : [];
        $fields = isset( $options['fields'] ) ? $options['fields'] : [];

        if( count($search) ){
            foreach( $search as $field => $value ){
                $this->app_db->where ($field, $value);
            }
        }

        $item = $this->app_db->getOne ($this->table,$options['fields']);
        return $item;
    }

    public function save($data,$options = []){
        $id = $this->app_db->insert ($this->table, $data);
        if($id){
            return $id;
        }else{
            die(__METHOD__.':'.$this->app_db->getLastError());
        }
    }
    public function update($id,$data,$options = []){
        $this->app_db->where ($this->primaryKey,$id);
        $updated = $this->app_db->update  ($this->table, $data);
        if($updated){
            return $updated;
        }else{
            die(__METHOD__.':'.$this->app_db->getLastError());
        }
    }
    public function delete($id,$options = []){
        $this->app_db->where ($this->primaryKey,$id);
        $deleted = $this->app_db->delete($this->table);
        if($deleted){
            return $deleted;
        }else{
            die(__METHOD__.':'.$this->app_db->getLastError());
        }
    }

    // Helpers
    public function pluck($array,$key,$value){
        $data = [];
        foreach( $array as $index => $v ){
            $data[$v[$key]] = $v[$value]; 
        }
        return $data;
    }
    public function pluckOptions($array,$key,$value,$selected = ''){
        $data = [];
        foreach( $array as $index => $v ){
            $data[] = [
                'key' => $v[$key],
                'value' => $v[$value],
                'selected' => $selected == $v[$key] ? 'selected' : ''
            ];
        }
        return $data;
    }
    
    public function responseSucess($data,$json = true){
        $data['reload'] = isset($data['reload']) ? $data['reload'] : 0;
        $data['msg'] = isset($data['msg']) ? $data['msg'] : 'Cập nhật thành công !';
        $return =  [
            'data' => $data,
            'success' => true
        ];
        if( $json ){
            echo json_encode($return);die();
        }else{
            return $return;
        }
    }
    public function responseError($msg,$json = true){
        $return = [
            'msg'   => $msg,
            'success' => false
        ];
        if( $json ){
            echo json_encode($return);die();
        }else{
            return $return;
        }
    }

    
    
}