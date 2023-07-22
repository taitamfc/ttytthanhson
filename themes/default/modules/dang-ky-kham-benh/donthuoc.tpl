<!-- BEGIN: main -->
<div class="tms_box">
	<div class="tms_box_heading">
{LANG.donthuoc} 
	</div>
	<div class="tms_box_body">
<div class="ngay_kham">{LANG.ngaykham}: {ngaykham} </div>	
<div class="donthuoc_content">
<div class="thongtin_benhnhan">

	<div class="form-group row">
		<label class="col-sm-5 col-md-5 control-label">{LANG.hoten_nguoibenh}</label>
		<div class="col-sm-19 col-md-19">
			{thongtin_benhnhan.hoTen} ({thongtin_benhnhan.maBn})
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-5 col-md-5 control-label">{LANG.ngaysinh}</label>
		<div class="col-sm-19 col-md-19">
			{thongtin_benhnhan.ngaySinh}
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-5 col-md-5 control-label">{LANG.diachi}</label>
		<div class="col-sm-19 col-md-19">
			{thongtin_benhnhan.diaChi}
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-sm-5 col-md-5 control-label">{LANG.chuandoan}</label>
		<div class="col-sm-19 col-md-19">
			{chuandoan}
		</div>
	</div>
</div>

<table class="table table-striped table-bordered table-hover">
	<thead>
				<tr >
					<th class="tms_info">{LANG.stt}</th>
					<th class="tms_info">{LANG.tenthuoc}</th>
					<th class="tms_info">{LANG.donvitinh}</th>
					<th class="tms_info">{LANG.soluong}</th>
					<th class="tms_info">{LANG.duongdung}</th>
					<th class="tms_info">{LANG.lieudung}</th>
				</tr>
	</thead>
	<!-- BEGIN: donthuoc -->
	<tr>
		<td>{stt}</td>
		<td>{donthuoc.tenThuoc}</td>
		<td>{donthuoc.donViTinh}</td>
		<td>{donthuoc.soLuong}</td>
		<td>{donthuoc.duongDung}</td>
		<td>{donthuoc.lieuDung}</td>
	</tr>
	<!-- END: donthuoc -->
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