<!-- BEGIN: main -->

<div class="tms_box">
	<div class="tms_box_heading">
	{LANG.information}
	</div>
	
	<div class="tms_box_body">
	<ul class="calender_bn">
		<!-- BEGIN: loop -->
		<li malankham ="{row.maLanKham}" ngaykham ="{row.ngayKham}" class="row"> 
			<a href="{row.link}">
				<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/dang-ky-kham-benh/calendar.png" style="height:40px;"class=" pull-left">
				<div class="icon_calender">
					<div class="date_calender">{row.ngay}</div>
					<div class="gio_calender">{row.gio}</div>
				</div>
			</a>
		</li>
		<!-- END: loop -->
	</ul>
	<div class="clear">	</div>
	

<div class="tms_box_botom" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> {LANG.back}</div>

<div class="tms_box_thoat"><i class="fa fa-sign-out" aria-hidden="true"></i> {LANG.exit_tms}</div>
<div class="tms_box_change"><a href="{row.link_change}"><i class="fa fa-sign-out" aria-hidden="true"></i> {LANG.change_password} </a></div>
	</div>
	</div>



<script>
	
	$('.calender_bn ul liaaa').click(function(){
	
		var malankham = $(this).attr('malankham');
		var ngaykham = $(this).attr('ngaykham');
		
		if(malankham != '' && ngaykham != '')
		{
			$.ajax({
					type : 'POST',
					url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
					data : { malankham : malankham, ngaykham : ngaykham},
					success : function(res){
					
						$('.result_search').html(res);
					}			
			});
		}
		
	});
	
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