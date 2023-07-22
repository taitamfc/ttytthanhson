var thongbao="Bạn sẽ không thể thu hồi được thao tác này, hãy xác nhận chắc chắn?";

function loadPopup() {$("#to-popup").fadeIn(200); $("#background-popup").fadeIn(300);}
function disablePopup() {$("#to-popup").fadeOut(300);$("#background-popup").fadeOut(300);}

function logout(a){
		var $this = $(this);
		var c = confirm('Bạn muốn thoát khỏi ứng dụng?');
		   if(c) {window.location.href = a;}
	return false;
}
function insert_row(id_table=''){
	var table = document.getElementById(id_table);
	var row = $(table).parent().parent().children().index($(table).parent());   
    var html = $('#'+id_table+' tbody tr:eq('+row+')').html();   
    $('#'+id_table+' tbody tr:eq('+row+')').after('<tr>'+html+'</tr>');
	return false;
}
var rws;
function RemoveRow(id_table=''){
	var table = document.getElementById(id_table);
	var row = $(table).parent().parent().children().index($(table).parent()); 
    $('#'+id_table+' tbody tr:eq('+row+')').remove();
	return false;
}
function openForm(a, w=650, h=430) {

	if (w==0 ){w=screen.width;}	if (h==0){h=screen.height;}
	if (nv_safemode) return !1;
	nv_open_browse(a, "NVImg", w, h, "resizable=no,scrollbars=yes,toolbar=no,location=no,status=no");
	return !1;
}

function modal(tb='',t='') {
          $('.modal-icon').modal({ keyboard: false,show: true});
		  $('#modal_body').html(tb);
		  $('.modal-dialog').draggable({handle: ".modal-content"});
	return !1;
}
function setValue(links,id='home') {
		//$("#"+id).addClass("loading"); $('#result').html('');
			$.ajax({
                    url : links,
                    type : 'get',
                    dataType : 'text',
                    success : function (result){
						//$("#"+id).removeClass("loading"); 
                        $("#"+id).html(result);
                    }
                });
}
function nv_execute_frm(a) {
		var c = []; 
		c.type = $(a).prop("method"); c.url = $(a).prop("action"); c.data = $(a).serialize();
		$(a).find("input,button,select,textarea, a").removeClass("has-error");
		$(a).find("input,button,select,textarea, a").prop("disabled", !0);
		$.ajax({
				url : c.url,
				cache: !1,
				data:c.data,
				type : c.type,
				dataType : 'json',
				success : function (result){
				modal(result.mess);$(a).find("input,button,select,textarea, a").prop("disabled", !1);
				if(result.status == "OK") setTimeout(function () {window.location =result.url},2000);// setTimeout(function () {window.location =result.url},2000);//window.location =result.url;location.reload();//
				}
			});
		return !1;	
}
function detail(tb='',t='') {
          $('.modal-detail').modal({ keyboard: false,show: true});
		  $('#modal_bodydetail').html(tb);
		  $('.modal-dialogdetail').draggable({handle: ".modal-header"});
	return !1;
}
function checkAllLevel(id=0,a) {
  checkboxes = document.getElementsByClassName('level_'+id+'_1');
  var id_cauhoi = document.getElementById("id_cauhoi").value; 
  for(var i=0,n=checkboxes.length; i<n;i++) {
    checkboxes[i].checked = a.checked;
  }
  var diembv=saveValueBV(1);
	$("#bv"+id_cauhoi).html(diembv);
	sendVal(1,diembv);
	return !1;
}

function checkBV()
{
	var id_cauhoi = document.getElementById("id_cauhoi").value; 
	var diembv=saveValueBV(1);var diemdoan=saveValueBV(2);
	$("#bv"+id_cauhoi).html(diembv);sendVal(1,diembv);
	$("#kt"+id_cauhoi).html(diemdoan);sendVal(2,diemdoan);
	return !1;
}

function sendVal(item=1,diem=0) //1:BV;2:ĐoànKT
{
  var kq=getVal(item);var dinhdanh = document.getElementById("dinhdanh").value; 
  var url=nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?sta=savedanhgia';
  $.post(url, 'token=' + kq+'_'+dinhdanh+'_'+item+'_'+diem, function(res) 
  {var r_split = res.split("_");if (r_split[0] == 'ERR') {alert(r_split[1]);}});
}
function sendfile(a, id='') //1:BV;2:ĐoànKT
{
	var url=nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?sta=saveimage&id='+id;
	//$(a).action = url;	
	//$(a).submit();
	var file_data = $('#file'+id).prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    var dinhdanh=document.getElementById("dinhdanh").value;    //alert(dinhdanh);                         
    $.ajax({
        url: nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?sta=saveimage&id='+id+'&token='+dinhdanh,
        dataType: 'text', cache: false,contentType: false,processData: false,data: form_data,type: 'post',
        success: function(res){//alert(res); 
            var r_split = res.split("_");
			if (r_split[0] == 'ERR') {alert(r_split[1]);}
			else{$('#view'+id).show();  }
        }
     });
	return true;
}

function nv_sendfile(a) //1:BV;2:ĐoànKT
{
	
	return false;
}


function sendimage(a, id='') //1:BV;2:ĐoànKT
{
	var url=nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?sta=saveimage&id='+id;
	var c = []; 
		c.type = $(a).prop("method"); c.url =$(a).prop("action"); 
		c.data = $(a).serialize();		
		$.ajax({
				url : c.url,
				cache: !1,
				data:c.data,
				type : c.type,
				dataType : 'text',
				success : function (result){
				//modal(result.mess);$(a).find("input,button,select,textarea, a").prop("disabled", !1);
				//if(result.status == "ok") setTimeout(function () {window.location =result.url},30000);
				alert(result);
				}
			});
			return false;
}


function copydanhgia(item=1,diem=0)//1:BV;2:ĐoànKT
{
  var kq=getVal(item);
  var dinhdanh = document.getElementById("dinhdanh").value; 
  var url=nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?sta=copydanhgia';
  $.post(url, 'token=' + kq+'_'+dinhdanh+'_'+item+'_'+diem, function(res) {
	  var r_split = res.split("_");
	  if(r_split[0] == "OK") location.reload();
	  if (r_split[0] == 'ERR') {alert(r_split[1]);}});
}
function getVal(item=1) //1:BV;2:ĐoànKT
{
	var res='';
	for(var i=1;i<=5;i++) {
		checkboxes = document.getElementsByClassName('level_'+i+'_'+item);
		for(var k=0, n=checkboxes.length;k<n;k++)
			res += ((checkboxes[k].checked)?'1':0)+';';
	}
  return res;
}

function saveValueBV(item=1) //1:BV;2:ĐoànKT
{
	var diem=0;
  checkboxes = document.getElementsByClassName('level_1_'+item);
  for(var k=0, n=checkboxes.length;k<n;k++) if (checkboxes[k].checked) return 1;
  if (diem==0){
  for(var i=2;i<=5;i++) {
	checkboxes = document.getElementsByClassName('level_'+i+'_'+item);
	for(var k=0, n=checkboxes.length;k<n;k++) if (!checkboxes[k].checked) return diem;
	diem=i;
  }}
  return diem;
}
/*function nv_danhgia(url,a) {
	
	
}*/
function nv_danhgia(url,a) {
		var c = []; 
		$.ajax({
                    url : url,
                    type : 'get',
                    dataType : 'text',
                    success : function (result){
						detail(result,' ');
                    }
                });
		
		return !1;	
}
function find_select(object,url) {
    var item = $(object).val();
	window.location=url+'&find_id=' + item;
    return;
}
function login_validForm(a) {
    var c = 0, //nv_base_siteurl
        b = [];b.type = $(a).prop("method"); b.url = $(a).prop("action"); b.data = $(a).serialize();
	var redirect=document.getElementById('nv_redirect').value;
	$.ajax({
        type: b.type,
        cache: !1,
        url: b.url,
        data: b.data,
        dataType: "json",
        success: function(d) {
            if (d.status == "error") {modal(d.mess);} 
			else if (d.status == "ok") {
                 window.location = redirect;
            }
        }
    });
    return !1
}
function changeAvatar(a) {
	if (nv_safemode) return !1;
	nv_open_browse(a, "NVImg", 650, 430, "resizable=no,scrollbars=1,toolbar=no,location=no,status=no");
	return !1;
}
function show_change(a='',b='') {
	if (a!='') $("#"+a).fadeIn(500);// setTimeout(function() {$("#"+a).fadeIn()},1000);
	if (b!='') $("#"+b).fadeOut(500);//setTimeout(function() {$("#"+b).fadeOut()},1000);
	return !1;
}
function nv_execute_frmnhucau(a) {
		//$('#result').html('');$('#result').addClass("loading"); 
		if (confirm(thongbao)) 
		{
		var c = []; 
		c.type = $(a).prop("method"); c.url = $(a).prop("action"); c.data = $(a).serialize();
		$(a).find("input,button,select,textarea, a").removeClass("has-error");
		$(a).find("input,button,select,textarea, a").prop("disabled", !0);
		$.ajax({
				url : c.url,
				cache: !1,
				data:c.data,
				type : c.type,
				dataType : 'json',
				success : function (result){
				modal(result.mess);$(a).find("input,button,select,textarea, a").prop("disabled", !1);
				if(result.status == "OK") setTimeout(function () {window.location =result.url;},2000);//window.location =result.url;location.reload();//
				}
			});
		}
		return !1;	
}
function nv_execute_dieudong(a) {
	var fa = a['idcheck[]'];
	var listid = '';
	if (fa.length) {
		for (var i = 0; i < fa.length; i++) {
			if (fa[i].checked) {
				listid = listid + ',' + fa[i].value;
			}
		}
	} else {
		if (fa.checked) {
			listid = listid + ',' + fa.value;
		}
	}
	//alert(listid);
	document.getElementById("id_canbochuyen").value = listid;
		//$("#list_cb").value=listid;
		var c = []; 
		c.type = $(a).prop("method"); c.url = $(a).prop("action"); c.data = $(a).serialize();
		$(a).find("input,button,select,textarea, a").removeClass("has-error");
		$(a).find("input,button,select,textarea, a").prop("disabled", !0);
		$.ajax({
				url : c.url,
				cache: !1,
				data:c.data,
				type : c.type,
				dataType : 'json',
				success : function (result){
				modal(result.mess);$(a).find("input,button,select,textarea, a").prop("disabled", !1);
				if(result.status == "ok") setTimeout(function () {window.location =result.url},30000);
				}
			});
			return false;	
}
function del_item(url,a){
		if (confirm(nv_is_del_confirm[0])) {//link_del
        $.post(url, 'token=' + a, function(res) {
            var r_split = res.split("_");
            if (r_split[0] == 'OK') {
                 location.reload();
            } else if (r_split[0] == 'ERR') {
                alert(r_split[1]);
            } else {
                alert(nv_is_del_confirm[2]);
            }
        });
    }
	return false;
}
function lock_item(url,a){
		if (confirm(thongbao)) {//link_del
        $.post(url, 'token=' + a, function(res) {
            var r_split = res.split("_");
            if (r_split[0] == 'OK') {
                 alert(r_split[1]), location.reload();
            } else  alert(r_split[1]);            
        });
    }
	return false;
}

function checkValue(object)
{
	if(object.val().trim()=='') return false;
	if (isNaN(object.val())) 
	  {
		alert("Vui lòng nhập giá trị là số!");
		object.css("color", "#ff0000");
		return false;
	  }
	 else object.css("color", "#222");
	 return true;
}
function default0(object)
{
	if(object.val().trim()=='') return false;
	if (isNaN(object.val())) 
	  {
		return 0;
	  }
	 return object.val();
}
function nv_execute_update(a) {
		if (confirm('Bạn có chắc chắn sẽ cập nhật?')) 
		{
		var c = []; 
		c.type = $(a).prop("method"); c.url = $(a).prop("action"); c.data = $(a).serialize();
		$(a).find("input,button,select,textarea, a").removeClass("has-error");
		$(a).find("input,button,select,textarea, a").prop("disabled", !0);
		$.ajax({
				url : c.url,
				cache: !1,
				data:c.data,
				type : c.type,
				dataType : 'json',
				success : function (result){
				alert(result.mess);$(a).find("input,button,select,textarea, a").prop("disabled", !1);
				if(result.status == "OK") location.reload();//setTimeout(function () {location.reload()},2000);//window.location =result.url;location.reload();//
				}
			});
		}
		return !1;	
}

function phanloaiphong(a,token=''){
		var url=nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?sta=phanloaiphong';
        $.post(url, 'token=' + token+'_'+a.value, function(res) {
            var r_split = res.split("_");
            if (r_split[0] == 'OK') {location.reload();} else {alert(r_split[1]);} 
        });

	return false;
}