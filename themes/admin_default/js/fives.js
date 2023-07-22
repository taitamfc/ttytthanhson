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
    var userid=$('#userid').val()
    var time=$('#time').val()
    var data='&mod=click_vote2&catsid='+catsid+'&userid='+userid+'&time='+time+'&row_id='+row_id+'&department_id='+department_id+'&note='+note
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
        }
    })       
}
function click_vote(row_id,catsid,contentid,rankid){
    var department_id=$('#department_id').val()
    var note=$('.note_'+catsid).val()
    var userid=$('#userid').val()
    var time=$('#time').val()
    var data='&mod=click_vote&catsid='+catsid+'&userid='+userid+'&time='+time+'&contentid='+contentid+'&rankid='+rankid+'&row_id='+row_id+'&department_id='+department_id+'&note='+note
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            $('.trungbinh_'+catsid).html(res.avg)
        }
    })     
}


function load_static_department(){
    var row_id=$('#row_id').val()  
    var department_id=$('#department_id').val()  
    var userid=$('#userid').val()     
    var time=$('#time').val()    
    if(row_id!=null&&department_id!=null&&userid!=null){
        var data='&mod=load_static_department&department_id='+department_id+'&row_id='+row_id+'&time='+time+'&userid='+userid
        loading()
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
            var res=JSON.parse(res)
            if(res.status=='OK'){
                removeloading()
                $('#load_data').html(res.html)
            }
        })     
    }
}

function load_static_kiennghi(){
    var department_id=$('#department_id').val()   
    var row_id=$('#row_id').val()  
    if(row_id!=null&&department_id!=null){
    var data='&mod=load_static_kiennghi&department_id='+department_id+'&row_id='+row_id
    loading()
    loading()
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            removeloading()
            $('#load_data').html(res.html)
        }
    }) 
    }    
}


function load_static_nhieudonvi(){
    var row_id=$('#row_id').val()    
    var data='&mod=load_static_nhieudonvi&row_id='+row_id
    loading()
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
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
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
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
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax', data,function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            removeloading()
            $('#load_data').html(res.html)
        }
    })     
}

function get_alias(id) {
    var title = strip_tags(document.getElementById('idtitle').value);
    if (title != '') {
        $.post(script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=alias&nocache=' + new Date().getTime(), 'title=' + encodeURIComponent(title) + '&id=' + id, function(res) {
            if (res != "") {
                document.getElementById('idalias').value = res;
            } else {
                document.getElementById('idalias').value = '';
            }
        });
    }
    return false;
}

 
function change_remaining_amount(){
    var price=$('#price').val()
    var deposit_amount=$('#deposit_amount').val()
    var notarized_amount=$('#notarized_amount').val()
    if(price!=''){
        price=price.replaceAll(',','')
    }else{
        price=0
    }
    if(deposit_amount!=''){
        deposit_amount=deposit_amount.replaceAll(',','')
    }else{
        deposit_amount=0
    }
    if(notarized_amount!=''){
        notarized_amount=notarized_amount.replaceAll(',','')
    }else{
        notarized_amount=0
    }
    var remaining_amount=Number(price)-Number(deposit_amount)-Number(notarized_amount)
    $('#remaining_amount').val(format_number(remaining_amount))
}
function change_department(a){
    var department_id=$(a).val()
    $('.userid_buy').empty()
    $('.userid_buy').select2({
        placeholder:"Vui lòng chọn người bán", 
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=get_department_user_buy',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    q: params.term,
                    department_id:department_id
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}
function change_department_search(a){
    var department_id=$(a).val()
    $('#userid_buy').empty()
    $('#userid_buy').select2({
        placeholder:"Vui lòng chọn người bán", 
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=get_department_user_buy_search',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    q: params.term,
                    department_id:department_id
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}
function change_remaining_commission(){
    var price=$('#commission_buy').val()
    var deposit_amount=$('#advance_staff').val()
    if(price!=''){
        price=price.replaceAll(',','')
    }else{
        price=0
    }
    if(deposit_amount!=''){
        deposit_amount=deposit_amount.replaceAll(',','')
    }else{
        deposit_amount=0
    }
    var remaining_commission=Number(price)-Number(deposit_amount)
    $('#remaining_commission').val(format_number(remaining_commission))
}
function format_number(amount) {
    var delimiter = ",";  
    var i = parseInt(amount);
    if (isNaN(i)) {
        return '';
    }
    var minus = '';
    if (i < 0) {
        minus = '-'; 
    }
    i = Math.abs(i);
    var n = new String(i);
    var a = [];
    while (n.length > 3) {
        var nn = n.substr(n.length - 3);
        a.unshift(nn);
        n = n.substr(0, n.length - 3);
    }
    if (n.length > 0) {
        a.unshift(n);
    }
    amount = a.join(delimiter);
    amount = minus + amount;
    return amount;
}
function FormatNumber(str) {

    var strTemp = GetNumber(str);
    if (strTemp.length <= 3) {
        return strTemp;
    }

    strResult = "";
    for (var i = 0; i < strTemp.length; i++) {
        strTemp = strTemp.replace(",", "");
    }

    var m = strTemp.lastIndexOf(".");
    if (m == -1) {
        for (var i = strTemp.length; i >= 0; i--) {
            if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0) {
                strResult = "," + strResult;
            }
            strResult = strTemp.substring(i, i + 1) + strResult;
        }
    } else {
        var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
        var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."), strTemp.length);
        var tam = 0;
        for (var i = strphannguyen.length; i >= 0; i--) {

            if (strResult.length > 0 && tam == 4) {
                strResult = "," + strResult;
                tam = 1;
            }

            strResult = strphannguyen.substring(i, i + 1) + strResult;
            tam = tam + 1;
        }
        strResult = strResult + strphanthapphan;
    }
    return strResult;
}

function GetNumber(str) {
    var count = 0;
    for (var i = 0; i < str.length; i++) {
        var temp = str.substring(i, i + 1);
        if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
            return str.substring(0, i);
        }
        if (temp == " ") {
            return str.substring(0, i);
        }

        if (temp == ".") {
            if (count > 0) {
                return str.substring(0, ipubl_date);
            }
            count++;
        }
    }
    return str;
}
function IsNumberInt(str) {
    for (var i = 0; i < str.length; i++) {
        var temp = str.substring(i, i + 1);
        if (!(temp == "." || (temp >= 0 && temp <= 9))) {
            alert(inputnumber);
            return str.substring(0, i);
        }
        if (temp == ",") {
            return str.substring(0, i);
        }
    }
    return str;
}
function delete_department_staff(staff_id,department_id){
    var check=confirm('Bạn có chắc là xóa nhân viên này ra khỏi phòng này không?')
    if(check){
        var data='&mod=delete_department_staff&department_id='+department_id+'&staff_id='+staff_id
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax',data, function(res) {
            var res=JSON.parse(res)
            if(res.status=='OK'){
                alert(res.mess)
                location.reload()
            }
        })
    }
}
function add_staff(department_id){
    var userid=$('.userid').val()
    var check=confirm('Bạn có chắc là sẽ thêm các nhân viên này vào phòng này không?')
    if(check){
        var data='&mod=add_staff&department_id='+department_id+'&list_user='+JSON.stringify(userid)
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax',data, function(res) {
            var res=JSON.parse(res)
            if(res.status=='OK'){
                alert(res.mess)
                location.reload()
            }
        })
    }
}