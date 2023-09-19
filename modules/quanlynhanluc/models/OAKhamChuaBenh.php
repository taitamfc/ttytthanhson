<?php
class OAKhamChuaBenh extends OAModel{
    protected $table;
    protected $primaryKey = 'id';
    protected $fields = [];
    public $khoas = [
        'khoa_ngoai_th' => 'khoangoai',
        'khoa_cc_hstc'  => 'khoahstc',
        'khoa_phu_san'  => 'csskss',
        'khoa_noi_tn'   => 'khoanoi',
        'khoa_nhi'      => 'khoanhi',
        'khu_yhct'      => 'yhct',
        0              => 'khoagayme',
        'khoa_covid19'  => 0,
        ''  => 'khoakb',
    ];
    public function __construct(){
        parent::__construct();
        $this->table = $this->table_prefix . 'khamchuabenh';
    }

    public function getDataByKhoaAndDate($khoa,$date){
        $item = $this->all([
            'limit' => 1,
            'search' => [
                'account' => $khoa,
                // 'DATE(ngaygio)' =>$date,
            ]
        ]);
        return $item;
    }

    public function getDataReportGiaoBan($date){
        $items = [];
        foreach( $this->khoas as $khoa_k => $khoa ){
            if($khoa_k && $khoa){
                $items[$khoa_k] = $this->getDataByKhoaAndDate($khoa,$date);
            }
        }
        return $items;
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