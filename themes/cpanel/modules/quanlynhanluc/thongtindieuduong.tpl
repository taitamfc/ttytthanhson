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
                <h5>DANH SÁCH CÁN BỘ</h5>
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
					<div class="col-sm-3 col-3">
						<select name="id_khoaphong" class="form-control" onchange="find_select(this,'{link_frm}');" >
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
                <div class="table-responsive" style="padding-bottom: 100px;">
                    <table id="tbl_danhsach" class="table table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã BV</th>
                                <th>Họ tên</th>
                                <th>Nam/Nữ</th>
                                <th>Ngày sinh</th>
                                <th>Điện thoại</th>
                                <th>Chức vụ</th>
                                <th>Trình độ</th>
								<th>Nghề nghiệp</th>
                                <th>Khoa/phòng</th>
                                
								<th>Thao tác</th>
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
                                <td>{ROW.chucvu}</td>
                                <td>{ROW.trinhdo}</td>
								<td>{ROW.nghe_nghiep}</td>
                                <td>{ROW.tenkhoa}</td>
								
                                <!-- BEGIN: admin --><td>{ROW.ghichu}</td><!-- END: admin -->
                                <td><div class="dropdown-success dropdown">
								<button class="btn btn-mini btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Chọn</button>
									<div class="dropdown-menu" aria-labelledby="dropdown-3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
										<a onclick="view_info('{ROW.link_view}',{ROW.id});" class="dropdown-item waves-light waves-effect">Chi tiết</a>
										<a href="{ROW.link_bosung}" class="dropdown-item waves-light waves-effect">Bổ sung</a>
										
										<!-- BEGIN: admin --> <a onclick="del_msg('{ROW.link_del}','{ROW.code_pro}');" class="dropdown-item waves-light waves-effect" href="#">Xóa bỏ</a><!-- END: admin -->
									</div>
								</div>
								</td>
								
                            </tr>
                        <!-- END: row -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Basic table card end -->
	</div>

	
	<style>.dt-buttons {float:right;}
	.dataTables_length { padding: 10px;}</style>
	<link href="{URL_THEMES}/table/datatables.min.css" rel="stylesheet"/>
	<link href="{URL_THEMES}/table/datatables.css" rel="stylesheet"/>
	 <script src="{URL_THEMES}/table/datatables.js"></script>
	 <script src="{URL_THEMES}/table/datatables.min.js"></script>
	 <script src="{URL_THEMES}/table/button/js/datatables.buttons.min.js"></script>
	 <script src="{URL_THEMES}/table/pdf/pdfmake.js"></script>
	 <script src="{URL_THEMES}/table/pdf/pdfmake.min.js"></script>
	 <script src="{URL_THEMES}/table/pdf/vfs_fonts.js"></script>
	 <script src="{URL_THEMES}/table/jszip/jszip.min.js"></script>
	 <script>	
		$(document).ready(function() {
			$('#tbl_danhsach').DataTable({
				dom: '<"top"B>rt<"bottom"flp><"clear">',searching: false, paging: true, info: false,
				aLengthMenu: [[25, 50, 100, 200, -1],[25, 50, 100, 200, "Tất cả"]],
				language: {"lengthMenu": "Cài đặt  _MENU_  dòng/trang","paginate": {"next": "Trang sau","previous": "Trang trước"}},
				buttons: [{extend: 'print', text: '<i class="fa fa-print"></i> In',className: 'btn btn-success',exportOptions: {modifier: {page: 'current'}}},
					{extend: 'excelHtml5', text: '<i class="fa fa-file-excel-o"></i> EXCEL',className: 'btn btn-warning',exportOptions: {modifier: {page: 'current'}}},
					{extend: 'pdfHtml5', text: '<i class="fa fa-file-pdf-o" ></i> Xuất PDF',className: 'btn  btn-danger',exportOptions: {modifier: {page: 'current'}}},
					{text: '<i class="fa fa-plus" ></i> Thêm mới',className: 'btn btn-primary',
					action: function ( e, dt, node, config ) {window.location='{link_register}';}}
					]
			});});
	</script>
<!-- END: main -->
