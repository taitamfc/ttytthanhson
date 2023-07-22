<!-- BEGIN: main -->
<div class="tms_box">
	<div class="tms_box_heading">
	{LANG.thongtinhanhchinh} 
	</div>
	<div class="tms_box_body">
<div class="thongtinhanhchinh">
<div class="ngay_kham">{LANG.ngaykham}: {ngaykham} </div>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<td class="tms_info">{LANG.ma_nguoi_benh}</td>
		<td>{data.maBn}</td>
	</tr>
	<tr>
		<td class="tms_info">{LANG.hoten}</td>
		<td>{data.hoTen}</td>
	</tr>
	<tr>
		<td class="tms_info">{LANG.ngaysinh}</td>
		<td>{data.ngaySinh}</td>
	</tr>
	<tr>
		<td class="tms_info">{LANG.gioitinh}</td>
		<td>{data.gioiTinh}</td>
	</tr>
	<tr>
		<td class="tms_info">{LANG.diachi}</td>
		<td>{data.diaChi}</td>
	</tr>
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