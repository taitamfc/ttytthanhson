<!-- BEGIN: main -->
<!-- Page-header start -->
    <!-- Page-header end -->
	
	<div class="col-sm-12">
        <!-- Tooltips on textbox card start -->
        <div class="card">
            <div class="card-header">
                <h5 class="m-b-10">KHỞI TẠO BỘ CHỈ TIÊU THEO NĂM</h5>
            </div>			
			<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frmnhucau(this);">
			<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
			<input type="hidden" name="sta" id="sta" value="{sta}" />
			<input type="hidden" name="id" id="id" value="{ROW.id}" />
			<div class="table-responsive">
                    <table class="table" >
                        <tbody>

                            <tr>
                                <th scope="row">
								<div class="input-group">
										<span class="input-group-addon" id="nam" style="width: auto;min-width:100px;" >Chọn năm:</span>
										<select name="nam" class="form-control" placeholder="" title="Năm khởi tạo" data-toggle="tooltip">
											<!-- BEGIN: nam -->
											<option value="{r.id}" {r.select}>{r.name}</option>
											<!-- END: nam -->
										</select>
								</div>
								</th>
                                
                                <td><div class="input-group">
									<button type="submit" class="btn btn-out-dashed btn-info btn-square" data-toggle="tooltip" data-placement="right" title="Khởi tạo bộ chỉ tiêu áp dụng cho năm"> 
									<i class="icofont icofont-check-circled"></i> Khởi tạo bộ chỉ tiêu</button>	
								</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
		</form>
        <!-- Tooltips on textbox card end -->
    </div>	
    </div>
	<div class="col-sm-12">
	<!-- Tooltips on textbox card start -->
        <div class="card">
		<!-- BEGIN: dschitieu -->
            <div class="card-header">
                <h5 class="m-b-10">DANH SÁCH BỘ CHỈ TIÊU ĐÃ KHỞI TẠO CÁC NĂM</h5>
            </div>			
			<div class="card-block icon-btn">
			<!-- BEGIN: loop -->
			<a href="{ROW.link}" class="btn btn-success {ROW.color}">{ROW.nam}</a>
			<!-- END: loop -->
			</div>	
	<!-- END: dschitieu -->
	
	<!-- BEGIN: item -->
	<div class="table-responsive" style="padding-bottom: 100px;">
        <table class="table table-hover" >
            <thead>
				<tr>
                    <th colspan="8" class="text-center">PHÂN BỐ CẬP NHẬT BỘ CHỈ TIÊU NĂM {namapdung}</th>
                </tr>
				<!-- BEGIN: default -->
				<tr>
                    <th colspan="8" class="text-center" style="color:#ff0000" >
					Lưu ý: Bộ chỉ tiêu {namapdung} chưa được áp dụng mặc định.
					<a onclick="setdefault_item('{ACT.link}','{ACT.token}')" class="label label-success">Chọn áp dụng mặc định</a>

					</th>
                </tr>
				<!-- END: default -->
                <tr>
                    <th>#</th>
                    <th>Chỉ tiêu</th>
                    <th>Thành tố</th>
                    <th>Phạm vi áp dụng</th>
                    <th>Khoa/phòng cung cấp</th>
                    <th>Thời gian cung cấp</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
			<!-- BEGIN: row -->
                <tr >
                    <th scope="row">{ROW.stt}</th>
                    <td>{ROW.chi_so}</td>
                    <td><label class="label label-inverse-primary"><b>{ROW.thanh_to}</b></label> </td>
					<td> <!-- BEGIN: phamvi -->
					<label class="label label-inverse-primary"><b>{tenkhoa}</b></label>
					<!-- END: phamvi --> </td>
                    <td>
					<!-- BEGIN: khoacungcap -->
					<label class="label label-inverse-primary"><b>{tenkhoa}</b></label>
					<!-- END: khoacungcap -->
					
					</td>
                    <td><label class="label label-inverse-danger"><b>{ROW.tansuatgui}</b></label> </td>
                    <td><label class="label label-success">Đã khởi tạo</label>  </td>                                
                    <td> 
					<div class="dropdown-success dropdown">
						<button class="btn btn-mini btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Thao tác</button>
						<div class="dropdown-menu" aria-labelledby="dropdown-3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<a class="dropdown-item waves-light waves-effect" href="{ROW.link_edit}"><i class="ti-pencil-alt"></i> Sửa</a>
							<a onclick="del_item('{ROW.link_del}','{ROW.token}')" class="dropdown-item waves-light waves-effect" href="#"><i class="ti-trash"></i> Xóa</a>
							<a class="dropdown-item waves-light waves-effect" href="#"><i class="ti-settings"></i> Cài đặt khác</a>
						</div>
					</div>
					</td>                                
                </tr>
            <!-- END: row -->
            </tbody>
        </table>
    </div>
	<!-- END: item -->
	</div>
	<!-- Tooltips on textbox card end -->
    </div>	
	{JS}
<script>
	function setdefault_item(url,a){
		if (confirm('Bạn có chắc chắn áp dụng mặc định?')) {//link_del
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
</script>
<!-- END: main -->