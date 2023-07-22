/**
* @Project TMS HOLDINGS
* @Author Tập Đoàn TMS Holdings <contact@tms.vn>
* @Copyright (C) 2022 Tập Đoàn TMS Holdings. All rights reserved
* @License GNU/GPL version 2 or any later version
* @Createdate Tue, 19 Jul 2022 05:40:28 GMT
*/
function click_vote_2(row_id,catsid){
    var department_id=$('#department_id').val()  
    var note=$('.note_'+catsid).val()
    var data='&mod=click_vote2&catsid='+catsid+'&row_id='+row_id+'&department_id='+department_id+'&note='+note
    $.post(nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
        }
    })       
}
function click_vote(row_id,catsid,contentid,rankid){
    var department_id=$('#department_id').val()
    var note=$('.note_'+catsid).val()
    var data='&mod=click_vote&catsid='+catsid+'&contentid='+contentid+'&rankid='+rankid+'&row_id='+row_id+'&department_id='+department_id+'&note='+note
    $.post(nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            $('.trungbinh_'+catsid).html(res.avg)
        }
    })     
}
function load_static_department(row_id){
    var department_id=$('#department_id').val()    
    var data='&mod=load_static_department&department_id='+department_id+'&row_id='+row_id
    loading()
    $.post(nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            removeloading()
            $('#load_data').html(res.html)
        }
    })     
}



function load_static_donvi_chitiet(){
    var department_id=$('#department_id').val()    
    var data='&mod=load_static_donvi_chitiet&department_id='+department_id
    loading()
    $.post(nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            removeloading()
            $('#load_data').html(res.html)
        }
    })     
}

function load_static_donvi(){
    var department_id=$('#department_id').val()   
    var row_id=$('#row_id').val()  
    var data='&mod=load_static_donvi&department_id='+department_id+'&row_id='+row_id
    loading()
    loading()
    $.post(nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            removeloading()
            $('#load_data').html(res.html)
        }
    })     
}

function load_static_nhieudonvi(){
    var row_id=$('#row_id').val()    
    var data='&mod=load_static_nhieudonvi&row_id='+row_id
    loading()
    $.post(nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            removeloading()
            $('#load_data').html(res.html)
        }
    })     
}