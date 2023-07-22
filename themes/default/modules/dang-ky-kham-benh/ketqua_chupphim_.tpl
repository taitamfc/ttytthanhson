<!-- BEGIN: main -->
<div class="tms_box">
	<div class="tms_box_heading">{LANG.ketqua_chupphim_list}</div>
	<div class="tms_box_body">
<div class="ketqua_chupphim_content">
<div class="ngay_kham">{LANG.ngaykham}: {ngaykham} </div>

<ul>
	
		<!-- BEGIN: data -->
		<li>
		<a href="{data.link}" target="_blank" class="content_li" >
		<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/dang-ky-kham-benh/ket_qua_phim.png" style="height:40px;width:80px"class=" pull-left"> 
				<div class="icon_calender">
					<div class="date_calender">{LANG.phim}</div>
					<div class="gio_calender">{data.ngay}</div>
				</div>
				
		
		</a>
		</li>
		<!-- END: data -->
	
</ul>

</div>
<div class="tms_box_botom" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> {LANG.back}</div>
<div class="tms_box_thoat"><i class="fa fa-sign-out" aria-hidden="true"></i> {LANG.exit_tms}</div>
</div>
</div>



<script>
function goBack() {
    window.history.back();
}
$('.tms_box_thoat').click(function(){
		var logout = 1;
		$.ajax({
				type : 'POST',
				url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
				data : { logout : logout},
				success : function(res){
				window.location = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name;	
				}			
		});
		
	
	});
</script>
<!-- END: main -->