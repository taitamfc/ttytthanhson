<?php
class OAUser extends OAModel{
    protected $table;
    protected $primaryKey = 'userid';
    protected $fields = [];
    
    public function __construct(){
        global $db_config;
        parent::__construct();
        $this->db_prefix    = $db_config['prefix'];
        $this->table = $this->db_prefix . '_users';
    }

    public function tableHtml($all_users,$request = []){
        $OAThemeHelper = oa_load_model('OAThemeHelper');
        $OAKhoa = oa_load_model('OAKhoa');
        $OAChamCong = oa_load_model('OAChamCong');

        $groups = $OAKhoa->all();
        $groups = $OAKhoa->pluck($groups,'group_id','title');

        $tg_tungay = $_REQUEST['tg_tungay'];
        $tg_denngay = $_REQUEST['tg_denngay'];

        $options = [
            'search' => [
                'tg_tungay' => '',
                'tg_denngay' => '',
            ],
            'operators' => [
                'tg_tungay' => '>=',
                'tg_denngay' => '<=',
            ]
        ];
        $numberOfDays = 0;
        if($tg_tungay && $tg_denngay){
            $options['search']['tg_tungay'] = $tg_tungay;
            $options['search']['tg_denngay'] = $tg_denngay;

            $date1 = new DateTime($tg_tungay);
            $date2 = new DateTime($tg_denngay);

            $interval = $date1->diff($date2);
            $numberOfDays = $interval->days;
        }
        if($numberOfDays == 0){
            $all_users = [];
        }


        $records = $OAChamCong->all();
        $user_checkeds = $OAChamCong->pluck($records,'user_id','user_logs');
        ob_start();
        ?>
        <div class="d-flex">
            <table style="flex:1;" class="table table-hover table-bordered flex-1">
                <tr>
                    <td>STT</td>
                    <td>Họ và tên</td>
                </tr>
                <?php $index = 1; foreach( $all_users as $group_id => $users ):?>
                    <tr>
                        <th colspan="2"><?= $groups[$group_id];?></th>
                    </tr>
                    <?php foreach( $users as $user ):?>
                        <tr>
                            <td><?= $index;?></td>
                            <td><?= $user['last_name'].' '.$user['first_name'];?></td>
                        </tr> 
                    <?php $index++; endforeach;?>
                <?php endforeach;?>
            </table>
            <div style="flex: 2;" class="table-responsive flex-2">
                <table class="table table-hover table-bordered ">
                    <tr>
                        <td colspan="<?= $numberOfDays; ?>" align="center">Ngày trong tháng</td>
                    </tr>
                    <?php foreach( $all_users as $group_id => $users ):?>
                        <tr>
                            <?php for( $i = date('d',strtotime($tg_tungay)); $i <= date('d',strtotime($tg_denngay)); $i++  ):
                                $n = $OAThemeHelper->getDayNameVietNam($i);    
                            ?>
                            <td><?= $i; ?> (<?= $n; ?>)</td>
                            <?php endfor;?>
                        </tr>
                        <?php foreach( $users as $user ):
                            $checkeds = $user_checkeds[$user['userid']];
                            $checkeds = $checkeds ? json_decode($checkeds,true) : [];
                            ?>
                        <tr>
                            <?php for( $i = date('d',strtotime($tg_tungay)); $i <= date('d',strtotime($tg_denngay)); $i++ ):?>
                            <td> <input value="<?= $checkeds[$i];?>" name="user_logs[<?= $user['userid'];?>][<?= $i;?>]" style="width:50px"/> </td>
                            <?php endfor;?>
                        </tr>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}