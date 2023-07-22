<!-- BEGIN: main -->
	<!-- Page-header start -->
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">DANH SÁCH CÁN BỘ</h5>
            <p class="text-muted m-b-10">{ROW.tencoso}</p>
        </div>
    </div>
    <!-- Page-header end -->
	<!-- Page-body start -->
    <div class="page-body">
        <!-- Basic table card start -->
        <div class="card">
            <div class="card-header">
                <h5>Danh sách cán bộ</h5>
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
			
			<form name="myform" id="myform" method="post" action="{link_frm}">
				<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
				<input type="hidden" name="sta" id="sta" value="{sta}" />
				<div class="form-group  row">
					<div class="col-sm-3">
						<select name="id_khoaphong" class="btn btn-info btn-outline-info" onchange="find_select(this,'{link_frm}');" >
							<option value="0">Xem tất cả</option>
							<!-- BEGIN: khoaphong -->
							<option value="{r.id}" {r.select}>{r.name}</option>
							<!-- END: khoaphong -->
						</select>
					</div>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon" id="find_text" style="width: auto;min-width:100px;">Tìm kiếm:</span>
							<input name="find_text" value="{find_text}" type="text" class="form-control" placeholder="Nhập nội dung cần tìm... nhấn Enter!" title="Nhập nội dung bạn cần tìm như họ tên,ngày sinh,địa chỉ..v.v.." data-toggle="tooltip">
						</div>
					</div>
				</div>
			</form>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã BV</th>
                                <th>Họ tên</th>
                                <th>Nam/Nữ</th>
                                <th>Ngày sinh</th>
                                <th>Điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Chức vụ</th>
                                <th>Số hiệu</th>
                                <th>Khoa/phòng</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
						<!-- BEGIN: row -->
                            <tr class="{ROW.color}">
                                <th scope="row">{ROW.stt}</th>
                                <td>{ROW.maso_bv}</td>
                                <td>{ROW.hovaten}</td>
                                <td>{ROW.gioitinh}</td>
                                <td>{ROW.ngaysinh}</td>
                                <td>{ROW.dienthoai}</td>
                                <td>{ROW.diachi}</td>
                                <td>{ROW.chucvu}</td>
                                <td>{ROW.sohieu_vc}</td>
                                <td>{ROW.tenkhoa}</td>
                                <td>{ROW.ghichu}</td>
                            </tr>
                        <!-- END: row -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Basic table card end -->
	</div>
	
<!-- END: main -->