<?php
class OAChamCong extends OAModel{
    protected $table;
    protected $primaryKey = 'id';
    protected $fields = [];
    
    public function __construct(){
        parent::__construct();
        $this->table = $this->table_prefix . 'chamcong';
    }

    public function save_log($data){
        $tg_tungay = $data['tg_tungay'];
        $tg_denngay = $data['tg_denngay'];

        foreach( $data['user_logs'] as $user_id => $day ){
            $check = $this->all([
                'search' => [
                    'user_id' => $user_id,
                    'tg_tungay' => $tg_tungay,
                    'tg_denngay' => $tg_denngay
                ],
                'limit' => 1
            ]);
            $dataSave = [
                'user_id' => $user_id,
                'tg_tungay' => $tg_tungay,
                'tg_denngay' => $tg_denngay,
                'user_logs' => json_encode($day)
            ];
            if( $check ){
                $this->update($check['id'],$dataSave);
            }else{
                $this->save($dataSave);
            }
        }
    }
}