<!-- BEGIN: main -->	
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
    <script src="{BASE_URL}assets/js/language/jquery.ui.datepicker-vi.js"></script>
	<div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>DANH SÁCH LỊCH NGHỈ CỦA CÁN BỘ</h5>
                        <span></span>
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
                    <div class="card-block">
                        <div class="table-responsive" style="padding-bottom: 100px;">
						<form name="myform" id="myform" method="post" action="{link_frm}">
						<input type="hidden" name="sta" id="sta" value="find_item" />
						<table class="table table-hover" >
								<thead>
									<tr>
										<th>
										<div class="input-group">
											<select name="id_khoaphong" class="form-control" >
												<option value="0">Xem tất cả</option>
												<!-- BEGIN: khoaphong -->
												<option value="{r.id}" {r.select}>{r.name}</option>
												<!-- END: khoaphong -->
											</select>
										</div>
										</th>
										<th>
										<div class="input-group">
											<span class="input-group-addon" id="txt_find" style="width: auto;min-width:120px;">Tìm theo tên:</span>
											<input name="txt_find" value="{F.txt_find}" type="text" class="form-control" >
										</div>
										</th>
										
										<th>
										<div class="input-group">
											<span class="input-group-addon" id="tg_tungay" style="width: auto;min-width:120px;">Từ ngày:</span>
											<input id="datetime" name="tg_tungay" value="{F.tg_tungay}" type="text" class="form-control" >
										</div>
										</th>
										<th>
										<div class="input-group">
											<span class="input-group-addon" id="tg_denngay" style="width: auto;min-width:120px;">Đến ngày:</span>
											<input id="datetime1" name="tg_denngay" value="{F.tg_denngay}" type="text" class="form-control" >
										</div>
										</th>
										<th>
										<div class="input-group">
											<button type="submit" class="btn btn-success">
											<i class="icofont icofont-location-arrow"></i><strong>Tìm</strong></button>
										</div>
										</th>										
									</tr>
									
								</thead>
							</table>
						</form>
						<table id="tbl_danhsach" class="table table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã BV</th>
                                <th>Họ tên</th>
                                <th>Chức vụ</th>
                                <th>Điện thoại</th>
								<th>Khoa/phòng</th>
                                <th>Lý do nghỉ</th>
                                <th>Từ ngày</th>
                                <th>Đến ngày</th>
                                <th>Ghi chú</th> 
								<th>QT Nghỉ</th>
                            </tr>
                        </thead>
                        <tbody>
						<!-- BEGIN: row -->
                            <tr class="{ROW.color}">
                                <th scope="row">{DS.stt}</th>
                                <td>{DS.maso_bv}</td>
                                <td>{DS.hovaten}</td>
								<td>{DS.chucvu}</td>
								<td>{DS.dienthoai}</td>
								<td>{DS.tenkhoa}</td>
								<td>{DS.lydo}</td>
								<td>{DS.tungay}</td>
								<td>{DS.denngay}</td>
                                <td></td>
                                <td> 
								<a style="color: #fff;" onclick="view_info('{DS.link_view}',{DS.id});" class="btn btn-mini btn-info btn-round">
								<i class="fa fa-eye" aria-hidden="true"></i> </a>
								<!-- BEGIN: admin_link -->									
									<a href="#" title="Xóa thông tin này" onclick="del_item('{DS.link_del}','{DS.id}')" class="btn btn-mini btn-danger btn-outline-danger">
									<i class="ti-trash"></i></a>
								<!-- END: admin_link -->
								
								</td>
                            </tr>
                        <!-- END: row -->
						
						</tbody>
						</table>
						<!-- BEGIN: generate_page -->
							
						<!-- END: generate_page -->
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	{FILE "export.tpl"}
 
	<script type="text/javascript">
		$(function () {	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
		$(function () {	$('#datetime1').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
	</script>
	
<!-- END: main -->

<tr class="{ROW.color}">
								<td colspan="11" class="text-center">{GENERATE_PAGE}</td>
							</tr>
							
							
<div class="dropdown-success dropdown">
<button class="btn btn-mini btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Chọn</button>
	<div class="dropdown-menu" aria-labelledby="dropdown-3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
		<a onclick="view_info('{DS.link_view}',{DS.id});" class="dropdown-item waves-light waves-effect">Chi tiết</a>
		
		<!-- BEGIN: admin --> <a onclick="del_msg('{ROW.link_del}','{ROW.code_pro}');" class="dropdown-item waves-light waves-effect" href="#">Xóa bỏ</a><!-- END: admin -->
</div>
<!-- BEGIN: quatrinhnghi -->
	<table class="table table-hover table-border" style="background-color: #fff;color: #000;">				  
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
<!-- END: quatrinhnghi -->

<!-- BEGIN: no_history -->
	<table class="table table-hover table-border">				  
		<tbody>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">{thongbao}!</th>
			</tr>
		</tbody>				
	</table>
	
<!-- END: no_history -->
