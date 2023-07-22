<!-- BEGIN: main -->
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
	<script type="text/javascript" src="{URL_THEMES}/assets/pages/accordion/accordion.js"></script>

	<div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>BÁO CÁO CÔNG TÁC ĐIỀU DƯỠNG</h5>
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
											<span class="input-group-addon" id="txt_find" style="width: auto;min-width:120px;">Tìm theo tên:</span>
											<input name="txt_find" value="{F.txt_find}" type="text" class="form-control" >
										</div>
										</th>
										
										<th>
										<div class="input-group">
											<span class="input-group-addon" id="tg_tungay" style="width: auto;min-width:120px;">Từ ngày:</span>
											<input id="startDate" name="tg_tungay" value="{F.tg_tungay}" type="text" class="form-control" >
										</div>
										</th>
										<th>
										<div class="input-group">
											<span class="input-group-addon" id="tg_denngay" style="width: auto;min-width:120px;">Đến ngày:</span>
											<input id="endDate" name="tg_denngay" value="{F.tg_denngay}" type="text" class="form-control" >
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
							<table id="tbl_danhsach" class="table table-hover">
							<thead>
								<tr>
									<th colspan="12" class="text-center">DANH SÁCH CÁN BỘ ĐIỀU ĐỘNG</th>
								</tr>
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
									<th>Công tác</th>
									<th>Điều động đến</th>
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
									<td>{ROW.tangcuong_khoaphong}</td>
									<td>{ROW.ghichu}</td>
								</tr>
							<!-- END: row -->
							<!-- BEGIN: generate_page -->
								<tr class="{ROW.color}">
									<td colspan="12" class="text-center">{GENERATE_PAGE}</td>
								</tr>
							<!-- END: generate_page -->
								
							
							
							</tbody>
						</table>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">
$(document).ready(function() {
    $("#startDate,#endDate").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        showOtherMonths : true,
        showOn: 'focus'
    });

    $('#tg_tungay').click(function(){
        $("#publ_date").datepicker('show');
    });

    $('#tg_denngay').click(function(){
        $("#exp_date").datepicker('show');
    });
});
</script>

{FILE "export.tpl"}
<!-- END: main -->