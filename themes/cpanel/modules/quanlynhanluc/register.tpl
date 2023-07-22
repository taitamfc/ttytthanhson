<!-- BEGIN: main -->
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
    <script src="{BASE_URL}assets/js/language/jquery.ui.datepicker-vi.js"></script>
	<!-- Page-body start -->
    <div class="page-body">
        <!-- Basic table card start -->
        <div class="card">
            <div class="card-header">
                
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
			
			<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
				<input type="hidden" name="sta" id="sta" value="save_canbo" />
				<input type="hidden" name="token" value="{token}" />
				<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
				<div class="card-block table-border-style">
                <div class="table-responsive" style="padding-bottom: 100px;">
                    <table id="tbl_danhsach" class="table table-hover" >
						<thead>
							<tr><td class="align-middle text-center" colspan="4">
								<h4>THÊM MỚI CÁN BỘ</h4>
								</td>
							</tr>
							<tr><td class="align-middle" colspan="4">
								<code>(*)</code> Vị trí không được để trống!
								</td>
							</tr>
							
						</thead>
                        <tbody>
							<tr><td class="col-1">Mã BV<span style="color: #bd4147;">(*)</span></td><td><input name='maso_bv' value='{DATA.maso_bv}' type='text' class='form-control'></td> 
							<td class="col-1">Họ tên<span style="color: #bd4147;">(*)</span></td><td><input name='hovaten' value='{DATA.hovaten}' type='text' class='form-control'></td> </tr>
							
							<tr><td>Nam/Nữ</td>
							<td><select name="gioitinh" class="form-control">							
								<!-- BEGIN: gioitinh -->
								<option value="{r.id}" {r.select}>{r.name}</option>
								<!-- END: gioitinh -->
								</select>
							</td> 
							<td>Ngày sinh<span style="color: #bd4147;">(*)</span></td><td><input id="datetime" name='ngaysinh' value='{DATA.ngaysinh}' type='text' class='form-control'></td> </tr>
							
							<tr><td>Điện thoại</td><td><input name='dienthoai' value='{DATA.dienthoai}' type='text' class='form-control'></td> 
							<td>Khoa/phòng</td>
							<td>
								<select name="id_khoaphong" class="form-control" >
								<option value="0">Chọn Khoa/phòng</option>
								<!-- BEGIN: khoaphong -->
								<option value="{r.id}" {r.select}>{r.name}</option>
								<!-- END: khoaphong -->
								</select>
							</td>
							</tr>
							
							<tr><td>Địa chỉ<span style="color: #bd4147;">(*)</span></td><td colspan="3"><input name='diachi' value='{DATA.diachi}' type='text' class='form-control'></td> </tr>
							
							<tr><td>Chức vụ</td>
							<td><input name='chucvu' value='{DATA.chucvu}' type='text' class='form-control'></td> 
							<td>Phân loại cán bộ</td>
							<td>
								<select name="phanloai_cb" class="form-control">							
								<!-- BEGIN: phanloai -->
								<option value="{r.id}" {r.select}>{r.name}</option>
								<!-- END: phanloai -->
								</select>
							</td> 
							</tr>
							<tr><td>Trình độ</td>
							<td>
								<select name="trinhdo" class="form-control">							
								<!-- BEGIN: trinhdo -->
								<option value="{r.id}" {r.select}>{r.name}</option>
								<!-- END: trinhdo -->
								</select>
							</td> 
							<td>Số hiệu Viên chức</td><td><input name='sohieu_vc' value='{DATA.sohieu_vc}' type='text' class='form-control'></td> </tr>
							
							<tr><td >Ghi chú</td><td colspan="3"><input name='ghichu' value='{DATA.ghichu}' type='text' class='form-control'></td> </tr>
							
						</tbody>
						<tfoot>
							<tr><td class="align-middle text-center" colspan="4">
								<button class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i>Lưu</button>
								<a href="{LINK_CLOSE}" class="btn btn-danger">
								<i class="fa fa-sign-out" aria-hidden="true"></i>Đóng</a>
								</td>
							</tr>
						</tfoot>
						
					</table>
				</div>
				</div>
			</form>
<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>			
			
<!-- END: main -->
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
                                <th>Địa chỉ</th>
                                <th>Chức vụ</th>
                                <th>Khoa/phòng</th>
                                <th>Ghi chú</th>
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
                                <td>{ROW.diachi}</td>
                                <td>{ROW.chucvu}</td>
                                <td>{ROW.tenkhoa}</td>
                                <td></td>
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

	
	<style>.dt-buttons {float:right;}</style>
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
				language: {
				    "paginate": {
				      "next": "Trang sau",
					  "previous": "Trang trước"
				    }
				  },
				buttons: [{extend: 'print', text: '<i class="fa fa-print"></i> In',className: 'btn btn-success',exportOptions: {modifier: {page: 'current'}}},
					{extend: 'excelHtml5', text: '<i class="fa fa-file-excel-o"></i> EXCEL',className: 'btn btn-warning',exportOptions: {modifier: {page: 'current'}}},
					{extend: 'pdfHtml5', text: '<i class="fa fa-file-pdf-o" ></i> Xuất PDF',className: 'btn  btn-danger',exportOptions: {modifier: {page: 'current'}}},
					{text: '<i class="fa fa-plus" ></i> Thêm mới',className: 'btn btn-primary',
					action: function ( e, dt, node, config ) {window.location=nv_base_siteurl+'/'+nv_module_name;}}
					]
			});});
	</script>