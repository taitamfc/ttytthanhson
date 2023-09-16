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
			
				<table class="table table-hover" >
                        <thead>
                            <tr>
                                <th style="width:40%"></th>
								<th class="col-1"><button onclick="setValue('{ROW.link_edit}','panel')" class="btn btn-success">
								<i class="fa fa-edit" aria-hidden="true"></i>Sửa</button> </th>
								
                                <th class="col-1"><button onclick="setValue('{ROW.link_congtac}','panel')" class="btn btn-success">
								<i class="fa fa-search" aria-hidden="true"></i>Công tác</button> </th>
								
                                <th class="col-1"><button onclick="setValue('{ROW.link_chucvu}','panel')" class="btn btn-success">
								<i class="fa fa-search" aria-hidden="true"></i>Chức vụ</button> </th>
								
                                <th class="col-1"><button onclick="setValue('{ROW.link_dieudong}','panel')" class="btn btn-success">
								<i class="fa fa-user-plus" aria-hidden="true"></i>Lịch sử Điều động</button> </th>
								
                                <th class="col-1"><button onclick="setValue('{ROW.link_lichnghi}','panel')" class="btn btn-success">
								<i class="fa fa-user-plus" aria-hidden="true"></i>Lịch nghỉ</button> </th>								
								
								<th class="col-1"><a href="{LINK_CLOSE}" class="btn btn-danger">
								<i class="fa fa-sign-out" aria-hidden="true"></i>Thoát</a> </th>
								
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
<!-- END: edit_profile -->
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
			 <td><button type="submit" class="btn bnt-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn bnt-mini btn-danger">
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
			 <td><button type="submit" class="btn bnt-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn bnt-mini btn-danger">
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
			 <td><button type="submit" class="btn bnt-mini btn-warning">
					<i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
				</button>
				<a href="{link_close}" class="btn bnt-mini btn-danger">
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






<!-- BEGIN: no_history -->
	<table class="table table-hover table-border">				  
		<tbody>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">{thongbao}!</th>
			</tr>
		</tbody>				
	</table>
	
<!-- END: no_history -->