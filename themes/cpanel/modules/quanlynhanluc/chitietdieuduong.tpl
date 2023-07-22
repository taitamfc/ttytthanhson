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
                <h5>BỐ SUNG THÔNG TIN CÁN BỘ</h5>
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

            <div class="card-block table-border-style">
                	
                <div class="table-responsive" >
				
				<table class="table table-hover table-border">				  
				<tbody>
					<tr style="background-color: #2ed8b6;" >
						<th colspan="10" class="text-center">CHI TIẾT THÔNG TIN CÁN BỘ</th>
					</tr>
					<tr><th class="align-middle col-1">Mã BV:</th><th class="align-middle">{ROW.maso_bv}</th></tr>
					<tr><th class='align-middle'>Họ tên:</th><th class='align-middle'>{ROW.hovaten}</th></tr>
					<tr><th class='align-middle'>Ngày sinh:</th><th class='align-middle'>{ROW.ngaysinh}</th></tr>
					<tr><th class='align-middle'>Giới tính:</th><th class='align-middle'>{ROW.gioitinh}</th></tr>
					<tr><th class='align-middle'>Địa chỉ:</th><th class='align-middle'>{ROW.diachi}</th></tr>
					<tr><th class='align-middle'>Điện thoại:</th><th class='align-middle'>{ROW.dienthoai}</th></tr>
					<tr><th class='align-middle'>Khoa/Phòng:</th><th class='align-middle'>{ROW.tenkhoa}</th></tr>
					<tr><th class='align-middle'>Chức vụ:</th><th class='align-middle'>{ROW.chucvu}</th></tr>
					<tr><th class='align-middle'>Số hiệu VC:</th><th class='align-middle'>{ROW.sohieu_vc}</th></tr>
					<tr><th class='align-middle'>Phân loại:</th><th class='align-middle'>{ROW.phanloai_cb}</th></tr>
					<tr><th class='align-middle'>Hình thức làm việc:</th><th class='align-middle'>{ROW.hinhthuclamviec}</th></tr>
					<tr><th class='align-middle'>Điều động:</th><th class='align-middle'>{ROW.ghichu_dd}</th></tr>
				</tbody>				
			</table>
				<table class="table" >
                        <thead>
                            <tr >
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_edit}','panel')">
								<i class="fa fa-edit" aria-hidden="true"></i>Sửa</a>
								</td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_congtac}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>Công tác</a>
								</td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_nghenghiep}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>Nghề nghiệp
								</a></td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_tochuc}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>TG tổ chức
								</a></td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_chucvu}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>Chức vụ
								</a></td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_dieudong}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>Điều động
								</a></td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_lichnghi}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>Lịch nghỉ
								</a></td>
								
								<td class="text-center btn-danger" style="width:10%; border:2px solid #59e0c5">
								<a href="{LINK_CLOSE}" class="btn btn-out-dotted btn-danger btn-square">
								<i class="fa fa-sign-out" aria-hidden="true"></i>Thoát
								</a></td>
							</tr>
							<tr >
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_daotao}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>Đào tạo</a>
								</td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_llct}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>LL Chính trị</a>
								</td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_khenthuong}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>Khen thưởng
								</a></td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_kyluat}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>Kỷ luật
								</a></td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								<a class="btn btn-out-dotted btn-primary btn-square" onclick="setValue('{ROW.link_danhgia}','panel')">
								<i class="fa fa-search" aria-hidden="true"></i>Đánh giá
								</a></td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								</td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								</td>
								
								<td class="text-center btn-primary" style="width:10%; border:2px solid #59e0c5">
								</td>
							</tr>
                        </thead>
				</table>
				<span id="panel"> </span>
				
				
			</div>
                </div>
            </div>
        </div>
        <!-- Basic table card end -->
	</div>
	<script type="text/javascript"></script>
<!-- END: main -->

<!-- BEGIN: edit_profile -->
<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_profile" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="4">SỬA THÔNG TIN CÁN BỘ</th>	
			</tr>
		</thead>
		<tbody>
			<tr><td class="col-1">Mã BV</td><td><input name='maso_bv' value='{DATA.maso_bv}' type='text' class='form-control'></td> 
			<td class="col-1">Họ tên</td><td><input name='hovaten' value='{DATA.hovaten}' type='text' class='form-control'></td> </tr>
			
			<tr><td>Nam/Nữ</td>
			<td><select name="gioitinh" class="form-control">							
				<!-- BEGIN: gioitinh -->
				<option value="{r.id}" {r.select}>{r.name}</option>
				<!-- END: gioitinh -->
				</select>
			</td> 
			<td>Ngày sinh</td><td><input id="datetime" name='ngaysinh' value='{DATA.ngaysinh}' type='text' class='form-control'></td> </tr>
			
			<tr><td>Điện thoại</td><td><input name='dienthoai' value='{DATA.dienthoai}' type='text' class='form-control'></td> 
			<td>Số hiệu Viên chức</td><td><input name='sohieu_vc' value='{DATA.sohieu_vc}' type='text' class='form-control'></td>
			</tr>
			
			<tr><td>Địa chỉ</td><td colspan="3"><input name='diachi' value='{DATA.diachi}' type='text' class='form-control'></td> </tr>
			
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
			<td >Trạng thái</td><td><input name='ghichu' value='{DATA.ghichu}' type='text' class='form-control'></td>
			 </tr>
			
			<tr> </tr>
							
		</tbody>
		<tfoot>
		<tr>
			<td class="text-center" colspan="4">
			<button type="submit" class="btn btn-warning">
				<i class="icofont icofont-location-arrow"></i><strong>Cập nhật thông tin</strong>
			</button>
			<a href="{link_close}" class="btn btn-danger">
			<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			</td>
		</tr>
		</tfoot>
	</table>
</form>	

<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>
<!-- END: edit_profile -->
<!-- BEGIN: edit_profile1 -->
<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_profile" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="4">SỬA THÔNG TIN CÁN BỘ</th>	
			</tr>
		</thead>
		<tbody>
			<tr><td class='text-center col-1'>1</td>
			 <td class='col-1'>Mã BV:</td>
			 <td class='col-3'><input name='maso_bv' value='{DATA.maso_bv}' type='text'  class='dataValue form-control' ></td>
			 <td class='col-8'></td>
			</tr>
			<tr><td class='text-center'>2</td>
			 <td>Họ tên:</td>
			 <td><input name='hovaten' value='{DATA.hovaten}' type='text'  class='dataValue form-control' ></td>
			</tr>
			<tr><td class='text-center'>3</td>
			 <td>Ngày sinh:</td>
			 <td><input id="datetime" name='ngaysinh' value='{DATA.ngaysinh}' type='text'  class='dataValue form-control' ></td>
			</tr>
			<tr><td class='text-center'>4</td>
			 <td>Giới tính:</td>
			 <td><select name="gioitinh" class="dataValue form-control">							
				<!-- BEGIN: gioitinh -->
				<option value="{r.id}" {r.select}>{r.name}</option>
				<!-- END: gioitinh -->
				</select>
				</td>	
			</tr>
			<tr><td class='text-center'>5</td>
			 <td>Địa chỉ:</td>
			 <td><input name='diachi' value='{DATA.diachi}' type='text'  class='dataValue form-control' ></td>
			</tr>
			<tr><td class='text-center'>6</td>
			 <td>Điện thoại:</td>
			 <td><input name='dienthoai' value='{DATA.dienthoai}' type='text'  class='dataValue form-control' ></td>
			</tr>
			
			<tr><td class='text-center'>9</td>
			 <td>Số hiệu VC:</td>
			 <td><input name='sohieu_vc' value='{DATA.sohieu_vc}' type='text'  class='dataValue form-control' ></td>
			</tr>
			<tr><td class='text-center'>10</td>
			 <td>Phân loại:</td>
			 <td><input name='phanloai_cb' value='{DATA.phanloai_cb}' type='text'  class='dataValue form-control' ></td>
			</tr>
		</tbody>
		<tfoot>
		<tr>
			<td class="text-center" colspan="3">
			<button type="submit" class="btn btn-warning">
				<i class="icofont icofont-location-arrow"></i><strong>Cập nhật thông tin</strong>
			</button>
			<a href="{link_close}" class="btn btn-danger">
			<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			</td>
		</tr>
		</tfoot>
	</table>
</form>	

<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>
<!-- END: edit_profile1 -->
<!-- BEGIN: lichsudieudong -->
	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<th class="text-center">Từ ngày</th>
				<th class="text-center">Đến ngày</th>
				<th class="text-center">Khoa/Phòng điều động</th>
				<th class="text-center">Trạng thái</th>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th class="text-center">{ROW.stt}</th>
				<th class="text-center">{ROW.tungay}</th>
				<th class="text-center">{ROW.denngay}</th>
				<th >{ROW.tangcuong_khoaphong}</th>
				<th class="text-center">{ROW.status}</th>
			</tr>
		<!-- END: row -->	
		</thead>
		
	</table>
	
<!-- END: lichsudieudong -->

<!-- BEGIN: edit_khoaphong -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_khoaphong" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="4">CẬP NHẬT QUÁ TRÌNH CÔNG TÁC GIỮA CÁC KHOA</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
			 <td class="text-center col-1" >Ngày QĐ</td>			 
			 <td>Chọn khoa phòng sẽ chuyển công tác</td>			 
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
			<td><input id="datetime" name='tungay' type='text'  class=' form-control' ></td>
			 <td>
			 <select name="id_khoaphong" class=" form-control">							
				<!-- BEGIN: khoaphong -->
				<option value="{r.id}" {r.select}>{r.name}</option>
				<!-- END: khoaphong -->
			</select>
			</td>
			 <td><input name='ghichu' type='text'  class=' form-control' ></td>
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
			
		</tbody>
		
	</table>
</form>	

	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #2ed8b6; color: #fff;" >
				<th class="text-center" colspan="5">LỊCH SỬ CHUYỂN ĐỔI GIỮA CÁC KHOA PHÒNG CỦA CÁN BỘ NÀY</th>
			</tr>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<th class="text-center">Từ ngày</th>
				<th class="text-center">Đến ngày</th>
				<th class="text-center">Khoa/Phòng công tác</th>
				<th class="text-center">Ghi chú</th>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th class="text-center">{ROW.stt}</th>
				<th class="text-center">{ROW.tungay}</th>
				<th class="text-center">{ROW.denngay}</th>
				<th >{ROW.tenkhoa}</th>
				<th class="text-center">{ROW.ghichu}</th>
			</tr>
		<!-- END: row -->	
		</thead>
		
	</table>
<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>
<!-- END: edit_khoaphong -->


<!-- BEGIN: edit_chucvu -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_chucvu" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="4">CẬP NHẬT QUÁ TRÌNH CHỨC VỤ ĐẢM NHẬN CỦA CÁN BỘ</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
			 <td class="text-center col-1" >Ngày QĐ</td>			 
			 <td>Chức Vụ mới</td>			 
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
			<td><input id="datetime" name='tungay' type='text'  class=' form-control' ></td>
			 <td><input name='chucvu' type='text'  class=' form-control' ></td>
			</td>
			 <td><input name='ghichu' type='text'  class=' form-control' ></td>
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
			
		</tbody>
		
	</table>
</form>	

	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #2ed8b6; color: #fff;" >
				<th class="text-center" colspan="5">LỊCH SỬ ĐẢM NHẬN CHỨC VỤ CỦA CÁN BỘ NÀY</th>
			</tr>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<th class="text-center">Từ ngày</th>
				<th class="text-center">Đến ngày</th>
				<th class="text-center">Chức vụ</th>
				<th class="text-center">Ghi chú</th>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th class="text-center">{ROW.stt}</th>
				<th class="text-center">{ROW.tungay}</th>
				<th class="text-center">{ROW.denngay}</th>
				<th >{ROW.chucvu}</th>
				<th class="text-center">{ROW.ghichu}</th>
			</tr>
		<!-- END: row -->	
		</thead>
		
	</table>
<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>
<!-- END: edit_chucvu -->

<!-- BEGIN: edit_lichnghi -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_lichnghi" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="5">CẬP NHẬT QUÁ TRÌNH NGHỈ PHÉP CỦA CÁN BỘ</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
			 <td class="text-center col-1" >Từ ngày</td>			 
			 <td class="text-center col-1" >Đến ngày</td>			 
			 <td>Lý do nghỉ</td>			 
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
			<td><input id="datetime" name='tungay' type='text'  class=' form-control' ></td>
			<td><input id="datetime1" name='denngay' type='text'  class=' form-control' ></td>
			 <td>
			 <select name="lydo" class=" form-control">							
				<!-- BEGIN: luachonnghi -->
				<option value="{r.id}" {r.select}>{r.name}</option>
				<!-- END: luachonnghi -->
			</select>			 
			 </td>
			</td>
			 <td><input name='ghichu' type='text'  class=' form-control' ></td>
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
			
		</tbody>
		
	</table>
</form>	

	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #2ed8b6; color: #fff;" >
				<th class="text-center" colspan="5">LỊCH SỬ NGHỈ VIỆC RIÊNG CỦA CÁN BỘ NÀY</th>
			</tr>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<th class="text-center">Từ ngày</th>
				<th class="text-center">Đến ngày</th>
				<th class="text-center">Lý do nghỉ</th>
				<th class="text-center">Ghi chú</th>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th class="text-center">{ROW.stt}</th>
				<th class="text-center">{ROW.tungay}</th>
				<th class="text-center">{ROW.denngay}</th>
				<th >{ROW.lydo}</th>
				<th class="text-center">{ROW.ghichu}</th>
			</tr>
		<!-- END: row -->	
		</thead>
		
	</table>
<script type="text/javascript">
$(function () {	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
$(function () {	$('#datetime1').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
	
</script>
<!-- END: edit_lichnghi -->

<!-- BEGIN: edit_nghenghiep -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_nghenghiep" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="4">CẬP NHẬT QUÁ TRÌNH NGHỀ NGHIỆP CỦA CÁN BỘ</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
			 <td class="text-center col-1" >Ngày QĐ</td>			 
			 <td>Nghề nghiệp</td>			 
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
			<td><input id="datetime" name='tungay' type='text'  class=' form-control' ></td>
			 <td>
			 <select name="nghenghiep" class=" form-control">							
				<!-- BEGIN: luachonnghe -->
				<option value="{r.id}" {r.select}>{r.name}</option>
				<!-- END: luachonnghe -->
			</select>			 
			 </td>
			</td>
			 <td><input name='ghichu' type='text'  class=' form-control' ></td>
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
			
		</tbody>
		
	</table>
</form>	

	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #2ed8b6; color: #fff;" >
				<th class="text-center" colspan="5">THÔNG TIN NGHỀ NGHIỆP CỦA CÁN BỘ NÀY</th>
			</tr>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<th class="text-center">Từ ngày</th>
				<th class="text-center">Đến ngày</th>
				<th class="text-center">Nghề nghiệp</th>
				<th class="text-center">Ghi chú</th>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th class="text-center">{ROW.stt}</th>
				<th class="text-center">{ROW.tungay}</th>
				<th class="text-center">{ROW.denngay}</th>
				<th >{ROW.nghenghiep}</th>
				<th class="text-center">{ROW.ghichu}</th>
			</tr>
		<!-- END: row -->	
		</thead>
		
	</table>
<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>
<!-- END: edit_nghenghiep -->


<!-- BEGIN: edit_tochuc -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_tochuc" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="4">CẬP NHẬT THAM GIA TỔ CHỨC CỦA CÁN BỘ</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
			 <td class="text-center col-1" >Ngày QĐ</td>			 
			 <td>Tổ chức</td>			 
			<td>Chức vụ tham gia</td>
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
			<td><input id="datetime" name='tungay' type='text'  class='form-control' ></td>
			 <td><select name="tochuc" class=" form-control" onchange="luachon('{getthongtin}',this)">							
				<option value="">Lựa chọn tổ chức tham gia</option>
				<!-- BEGIN: luachon_tc -->
				<option value="{r.id}" {r.select}>{r.name}</option>
				<!-- END: luachon_tc -->
			</select>			
			</td>

			 <td><select id='chucvu' name="chucvu" class=" form-control"></select></td>
			 <td> <input name='ghichu' type='text'  class='form-control' > </td>
			 
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
			
		</tbody>
		
	</table>
</form>	

	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #2ed8b6; color: #fff;" >
				<th class="text-center" colspan="7">LỊCH SỬ THAM GIA TỔ CHỨC CỦA CÁN BỘ NÀY</th>
			</tr>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<th class="text-center">Từ ngày</th>
				<th class="text-center">Đến ngày</th>
				<th class="text-center">Tổ chức</th>
				<th class="text-center">Chức vụ</th>
				<th class="text-center">Ghi chú</th>
				<th class="text-center">Thao tác</th>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th class="text-center">{ROW.stt}</th>
				<th class="text-center">{ROW.tungay}</th>
				<th class="text-center">{ROW.denngay}</th>
				<th class="text-center">{ROW.tochuc}</th>
				<th class="text-center">{ROW.chucvu}</th>
				<th class="text-center">{ROW.ghichu}</th>
				<th class="text-center">
				<a href="#" title="Gỡ thành viên khỏi tổ chức" onclick="update_item('{ROW.link_remove}','{ROW.token}')" class="btn btn-mini btn-danger btn-outline-danger">
				<i class="ti-trash"></i>Rời khỏi</a>
				</th>
			</tr>
		<!-- END: row -->	
		</thead>
		
	</table>
<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
	
	function luachon(links,a)
	{ $.ajax({url : links+'&tochuc='+a.value,type : 'get',dataType : 'text',success : function (result)
			 {$('select#chucvu').html(result);}});
	}
</script>
<!-- END: edit_tochuc -->




<!-- BEGIN: edit_daotao -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_daotao" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="7">CẬP NHẬT QUÁ TRÌNH ĐÀO TẠO CỦA CÁN BỘ</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
			 <td class="text-center col-1" >Từ ngày</td>			 
			 <td class="text-center col-1" >Đến ngày</td>			 
			 <td>Loại chứng chỉ</td>			 
			 <td>Lớp đào tạo</td>			 
			 <td>Đơn vị đào tạo</td>			 
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
			<td><input id="datetime" name='tungay' type='text'  class=' form-control' ></td>
			<td><input id="datetime1" name='denngay' type='text'  class=' form-control' ></td>
			 <td>
			 <select name="loaidaotao" class=" form-control">							
				<!-- BEGIN: loaidaotao -->
				<option value="{r.id}" {r.select}>{r.name}</option>
				<!-- END: loaidaotao -->
			</select>			 
			 </td>
			</td>
			 <td><input name='tenlop' type='text'  class=' form-control' ></td>
			 <td><input name='donvicap' type='text'  class=' form-control' ></td>
			 <td><input name='ghichu' type='text'  class=' form-control' ></td>
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
			
		</tbody>
		
	</table>
</form>	

	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #2ed8b6; color: #fff;" >
				<th class="text-center" colspan="7">LỊCH SỬ ĐÀO TẠO CỦA CÁN BỘ NÀY</th>
			</tr>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<th class="text-center">Từ ngày</th>
				<th class="text-center">Đến ngày</th>
				<th >Loại đào tạo</th>
				<th >Lớp đào tạo</th>
				<th >Đơn vị cấp</th>
				<th >Ghi chú</th>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th class="text-center">{ROW.stt}</th>
				<th class="text-center">{ROW.tungay}</th>
				<th class="text-center">{ROW.denngay}</th>
				<th >{ROW.loaidaotao}</th>
				<th >{ROW.tenlop}</th>
				<th >{ROW.donvicap}</th>
				<th>{ROW.ghichu}</th>
			</tr>
		<!-- END: row -->	
		</thead>
		
	</table>
<script type="text/javascript">
$(function () {	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
$(function () {	$('#datetime1').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
	
</script>
<!-- END: edit_daotao -->

<!-- BEGIN: edit_chinhtri -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_chinhtri" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="5">CẬP NHẬT LÝ LUẬN CHÍNH TRỊ</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
			 <td class="text-center col-1" >Ngày cấp</td>			 
			 <td>Trình độ</td>			 
			<td>Nơi cấp</td>
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
			<td><input id="datetime" name='tungay' type='text'  class=' form-control' ></td>
			 
			 <td><input name='trinhdo' type='text'  class=' form-control' ></td>
			 <td><input name='noicap' type='text'  class=' form-control' ></td>
			 <td><input name='ghichu' type='text'  class=' form-control' ></td>
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
			
		</tbody>
		
	</table>
</form>	

	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #2ed8b6; color: #fff;" >
				<th class="text-center" colspan="5">LỊCH SỬ TRA CỨU</th>
			</tr>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<td class="text-center col-1" >Ngày cấp</td>			 
				 <td>Trình độ</td>			 
				<td>Nơi cấp</td>
				<td>Ghi chú</td>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th >{ROW.stt}</th>
				<th >{ROW.tungay}</th>
				<th >{ROW.trinhdo}</th>
				<th >{ROW.noicap}</th>
				<th >{ROW.ghichu}</th>
			</tr>
		<!-- END: row -->	
		</thead>
		
	</table>
<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>
<!-- END: edit_chinhtri -->

<!-- BEGIN: edit_khenthuong -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_khenthuong" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="7">CẬP NHẬT QUÁ TRÌNH KHEN THƯỞNG</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
				<th class="text-center">#</th>
			 <td class="text-center col-1" >Ngày khen thưởng</td>			 
			 <td>Số QĐ </td>			 
			<td>CQ cấp</td>
			<td>Hình thức</td>
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
				<th class="text-center">#</th>
			<td><input id="datetime" name='ngayqd' type='text'  class=' form-control' ></td>
			 
			 <td><input name='so_qd' type='text'  class=' form-control' ></td>
			 <td><input name='cq_cap' type='text'  class=' form-control' ></td>
			 <td><input name='hinhthuc' type='text'  class=' form-control' ></td>
			 <td><input name='ghichu' type='text'  class=' form-control' ></td>
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
		
		<!-- BEGIN: row -->
			<tr>
				<th >{ROW.stt}</th>
				<th >{ROW.ngayqd}</th>
				<th >{ROW.so_qd}</th>
				<th >{ROW.cq_cap}</th>
				<th >{ROW.hinhthuc}</th>
				<th >{ROW.ghichu}</th>
				<th ></th>
			</tr>
		<!-- END: row -->	
		</tbody>
		
	</table>
</form>	
<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>
<!-- END: edit_khenthuong -->


<!-- BEGIN: edit_kyluat -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_kyluat" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="7">CẬP NHẬT LỊCH SỬ KỶ LUẬT</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
				<th class="text-center">#</th>
			 <td class="text-center col-1" >Ngày qđ</td>			 
			 <td>Số QĐ </td>			 
			<td>CQ/Phòng Ban hành</td>
			<td>Hình thức kỷ luật</td>
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
				<th class="text-center">#</th>
			<td><input id="datetime" name='ngayqd' type='text'  class=' form-control' ></td>
			 
			 <td><input name='so_qd' type='text'  class=' form-control' ></td>
			 <td><input name='cq_qd' type='text'  class=' form-control' ></td>
			 <td><input name='hinhthuc' type='text'  class=' form-control' ></td>
			 <td><input name='ghichu' type='text'  class=' form-control' ></td>
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
		
		<!-- BEGIN: row -->
			<tr>
				<th >{ROW.stt}</th>
				<th >{ROW.ngayqd}</th>
				<th >{ROW.so_qd}</th>
				<th >{ROW.cq_qd}</th>
				<th >{ROW.hinhthuc}</th>
				<th >{ROW.ghichu}</th>
				<th ></th>
			</tr>
		<!-- END: row -->	
		</tbody>
		
	</table>
</form>	
<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>
<!-- END: edit_kyluat -->


<!-- BEGIN: edit_danhgia -->

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
	<input type="hidden" name="sta" id="sta" value="save_danhgia" />
	<input type="hidden" name="token" value="{token}" />
	<table class="table table-hover">	
		<thead>
			<tr style="text-transform: uppercase;background-color: #2ed8b6;">
					<th scope="row" class="text-center" colspan="5">CẬP NHẬT LỊCH SỬ ĐÁNH GIÁ</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
				<th class="text-center">#</th>
			 <td class="text-center col-1" >Năm Đánh giá</td>			 
			 <td>Kết quả đánh giá</td>	
			<td>Ghi chú</td>
			<td>Thao tác</td>
			</tr>
			
			<tr>
				<th class="text-center">#</th>			 
			 <td><input name='nam' type='text'  class=' form-control' ></td>
			 <td><input name='ketqua' type='text'  class=' form-control' ></td>
			 <td><input name='ghichu' type='text'  class=' form-control' ></td>
			 <td><button type="submit" class="btn btn-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn btn-mini btn-danger">
				<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
			 </td>
			</tr>
		
		<!-- BEGIN: row -->
			<tr>
				<th >{ROW.stt}</th>
				<th >{ROW.nam}</th>
				<th >{ROW.ketqua}</th>
				<th >{ROW.ghichu}</th>
				<th ></th>
			</tr>
		<!-- END: row -->	
		</tbody>
		
	</table>
</form>	
<script type="text/javascript">
$(function () {
	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
	});
</script>
<!-- END: edit_danhgia -->


<!-- BEGIN: no_history -->
	<table class="table table-hover table-border">				  
		<tbody>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">{thongbao}!</th>
			</tr>
		</tbody>				
	</table>
	
<!-- END: no_history -->