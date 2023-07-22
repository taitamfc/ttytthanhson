<!-- BEGIN: main -->
<div class="tms_box">
	<div class="tms_box_heading">{LANG.ketquaxetnghiem}</div>
	<div class="tms_box_body">
<div class="donthuoc_cdha_tdcn">
<div class="ngay_kham">{LANG.ngaykham}: {ngaykham} </div>

<table class="table table-striped table-bordered table-hover">
	<thead>
				<tr>
					<th class="tms_info">{LANG.stt}</th>
					<th class="tms_info">{LANG.tendichvu}</th>
					<th class="tms_info">{LANG.ketqua}</th>
					<th class="tms_info">{LANG.gt_binhthuong}</th>
					<th class="tms_info">{LANG.ngay_kq}</th>
				</tr>
	</thead>
	<!-- BEGIN: data -->
	<tr>
		<td>{stt}</td>
		<td>{data.tenChiSo}</td>
		<td>{data.giaTri}</td>
		<td>{data.maChiSo}</td>
		<td>{data.ngayKq}</td>
		
	</tr>
	<!-- END: data -->
</table>

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