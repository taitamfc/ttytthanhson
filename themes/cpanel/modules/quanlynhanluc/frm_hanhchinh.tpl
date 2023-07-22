<!-- BEGIN: main -->
	<!-- Page-header start -->
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">THÔNG TIN HÀNH CHÍNH</h5>
            <p class="text-muted m-b-10">{ROW.tencoso}</p>
        </div>
    </div>
<!-- BEGIN: admin -->		
    <!-- Page-header end -->
	<div class="col-sm-12">
	
        <!-- Tooltips on textbox card start -->
        <div class="card">
            <div class="card-header">
                <h5 class="m-b-10">CHI TIẾT THÔNG TIN HÀNH CHÍNH</h5>
                <div class="card-header-right">
					<ul class="list-unstyled card-option">
						<li><i class="fa fa-chevron-left"></i></li>
						<li><i class="fa fa-window-maximize full-card"></i></li>
						<li><i class="fa fa-minus minimize-card"></i></li>
						<li><i class="fa fa-refresh reload-card"></i></li>
						<li><i class="fa fa-times close-card"></i></li>
					</ul>
				</div>
            </div>
			
			<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frm(this);">
			<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
			<input type="hidden" name="sta" id="sta" value="{sta}" />
			<input type="hidden" name="id" id="id" value="{ROW.id}" />
			
            <div class="card-block tooltip-icon button-list">
                <div class="input-group">
                    <span class="input-group-addon" id="tencoso" style="width: auto;min-width:100px;">Tên cơ sở:</span>
                    <input name="tencoso" value="{ROW.tencoso}" type="text" class="form-control" placeholder="Tên cơ sở" title="Tên cơ sở" data-toggle="tooltip">
                </div>
				<div class="input-group">
					<span class="input-group-addon" id="id_loaihinh" style="width: auto;min-width:100px;" >Loại hình:</span>
                    <select name="id_loaihinh" class="form-control" placeholder="Loại hình cơ sở" title="Loại hình cơ sở" data-toggle="tooltip">
                        <!-- BEGIN: loaihinh -->
						<option value="{r.id}" {r.select}>{r.name}</option>
						<!-- END: loaihinh -->
                    </select>
                </div>
				<div class="input-group">
                    <span class="input-group-addon" id="diachi" style="width: auto;min-width:100px;">Địa chỉ:</span>
                    <input name="diachi"  value="{ROW.diachi}" type="text" class="form-control" placeholder="Địa chỉ" title="Địa chỉ" data-toggle="tooltip">
                </div>
				<div class="input-group">
                    <span class="input-group-addon" id="dienthoai" style="width: auto;min-width:100px;"> Điện thoại:</span>
                    <input name="dienthoai"  value="{ROW.dienthoai}" type="text" class="form-control" placeholder="Điện thoại" title="Điện thoại" data-toggle="tooltip">
                </div>
				<div class="input-group">
                    <span class="input-group-addon" id="giamdoc" style="width: auto;min-width:100px;"> Giám đốc:</span>
                    <input name="giamdoc"  value="{ROW.giamdoc}" type="text" class="form-control" placeholder="Giám đốc" title="Giám đốc" data-toggle="tooltip">
                </div>
				<div class="input-group">
                    <span class="input-group-addon" id="tp_tchc" style="width: auto;min-width:100px;"> Trưởng phòng TCHC:</span>
                    <input name="tp_tchc"  value="{ROW.tp_tchc}" type="text" class="form-control" placeholder="+Trưởng phòng Tổ chức - Hành chính/ Tổ chức cán bộ" title="+	Trưởng phòng Tổ chức - Hành chính/ Tổ chức cán bộ" data-toggle="tooltip">
                </div>
				
				<div class="input-group">
                    <span class="input-group-addon" id="tp_kehoach" style="width: auto;min-width:100px;"> TP Kế hoạch-NV:</span>
                    <input name="tp_kehoach" value="{ROW.tp_kehoach}" type="text" class="form-control" placeholder="+Trưởng phòng Kế hoạch - Nghiệp vụ/Kế hoạch Tổng hợp" title="+Trưởng phòng Kế hoạch - Nghiệp vụ/Kế hoạch Tổng hợp" data-toggle="tooltip">
                </div>
				
				<div class="input-group">
                    <span class="input-group-addon" id="tp_taichinh" style="width: auto;min-width:100px;"> TP Tài chính:</span>
                    <input name="tp_taichinh" value="{ROW.tp_taichinh}" type="text" class="form-control" placeholder="+Trưởng phòng Tài chính - kế toán" title="+Trưởng phòng Tài chính - kế toán" data-toggle="tooltip">
                </div>
				
				<div class="input-group">
                    <span class="input-group-addon" id="tp_dieuduong" style="width: auto;min-width:100px;"> TP Điều dưỡng:</span>
                    <input name="tp_dieuduong" value="{ROW.tp_dieuduong}" type="text" class="form-control" placeholder="+Trưởng phòng Điều dưỡng" title="+Trưởng phòng Điều dưỡng" data-toggle="tooltip">
                </div>
				
                <button type="submit" class="btn btn-out-dashed btn-info btn-square" data-toggle="tooltip" data-placement="right" title="Cập nhật thông tin"> 
				<i class="icofont icofont-check-circled"></i> Cập Nhật</button>	
				
            </div>
        </div>
		</form>
        <!-- Tooltips on textbox card end -->
    </div>
<!-- END: admin -->	
	
	
	
	
<!-- BEGIN: info -->
<div class="card-block">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<!-- Authentication card start -->
				<div class="signup-card card-block auth-body mr-auto ml-auto">
					<div class="md-float-material">
						<div class="auth-box">
							<div class="row">
								<div class="col-md-10">
									<p class="text-inverse text-left m-b-0">Thông tin hành chính.</p>
								</div>
								
							</div>
						
							<hr/>
							<dl class="dl-horizontal row">
								<dt class="col-sm-3">Tên cơ sở:</dt>
								<dd class="col-sm-9">{ROW.tencoso}</dd>
								<dt class="col-sm-3">Loại hình:</dt>
								<dd class="col-sm-9">{ROW.tenloaihinh}</dd>
								<dt class="col-sm-3">Địa chỉ:</dt>
								<dd class="col-sm-9">{ROW.diachi}</dd>
								<dt class="col-sm-3">Điện thoại:</dt>
								<dd class="col-sm-9">{ROW.dienthoai}</dd>
								<dt class="col-sm-3">Giám đốc:</dt>
								<dd class="col-sm-9">{ROW.giamdoc}</dd>
								<dt class="col-sm-3">T.P TCHC:</dt>
								<dd class="col-sm-9">{ROW.tp_tchc}</dd>
								<dt class="col-sm-3">T.P KHNV:</dt>
								<dd class="col-sm-9">{ROW.tp_kehoach}</dd>
								<dt class="col-sm-3">T.P Tài chính:</dt>
								<dd class="col-sm-9">{ROW.tp_taichinh}</dd>
								<dt class="col-sm-3">T.P Điều dưỡng:</dt>
								<dd class="col-sm-9">{ROW.tp_dieuduong}</dd>
							</dl>													
							<hr/>
																		
							<div class="row" >
								<div class="col-md-12 text-center">
									
								</div>
							</div>
							
						</div>
					</div>
					<!-- end of form -->
				</div>
				<!-- Authentication card end -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</div>
<!-- END: info -->
<!-- END: main -->