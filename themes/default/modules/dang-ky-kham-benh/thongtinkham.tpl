<!-- BEGIN: main -->
<div class="tms_box">
	<div class="tms_box_heading">
	{LANG.thongtinkham} 
	</div>
	<div class="tms_box_body">

<div class="ngay_kham">{LANG.ngaykham}: {ngaykham} </div>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<td>{LANG.loai_khamchuabenh}</td>
		<td>{data.tenLoaiKcb}</td>
	</tr>
	<tr>
		<td>{LANG.ngayvao}</td>
		<td>{data.ngayVao}</td>
	</tr>
	<tr>
		<td>{LANG.ngayra}</td>
		<td>{data.ngayRa}</td>
	</tr>
	<tr>
		<td>{LANG.songaydieutri}</td>
		<td>{data.soNgayDtri}</td>
	</tr>
	<tr>
		<td>{LANG.ketquadieutri}</td>
		<td>{data.ketQuaDtri}</td>
	</tr>
	<tr>
		<td>{LANG.trinhtrangravien}</td>
		<td>{data.tinhTrangRv}</td>
	</tr>
	<tr>
		<td>{LANG.khoadieutri}</td>
		<td>{data.maKhoa}</td>
	</tr>
	<tr>
		<td>{LANG.mabenhchinh}</td>
		<td>{data.maBenh}</td>
	</tr>
	<tr>
		<td>{LANG.tenbenhchinh}</td>
		<td>{data.tenBenh}</td>
	</tr>
	<tr>
		<td>{LANG.mabenhkhac}</td>
		<td>{data.maBenhkhac}</td>
	</tr>
	<tr>
		<td>{LANG.mathebhyt}</td>
		<td>{data.maThe}</td>
	</tr>
	<tr>
		<td>{LANG.giatritungay}</td>
		<td>{data.gtTheTu}</td>
	</tr>
	<tr>
		<td>{LANG.giatridenngay}</td>
		<td>{data.gtTheDen}</td>
	</tr>
	<tr>
		<td>{LANG.noidangky}</td>
		<td>{data.noidangky}</td>
	</tr>
</table>


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