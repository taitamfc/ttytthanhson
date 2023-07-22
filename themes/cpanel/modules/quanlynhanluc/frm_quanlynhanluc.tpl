<!-- BEGIN: main -->
<div class="page-wrapper">
   <div class="row">
        <div class="col-sm-12">
            <!-- Tab variant tab card start -->
            <div class="card">
                <div class="card-header">
				<div class="label-main">
                    <label class="label label-inverse-primary"><strong>Khoa/Phòng:{phong.tenkhoa}</strong></label>
                </div>
				
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
                <div class="card-block tab-icon">
                    <!-- Row start active-->
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs " role="tablist">
                                <li class="nav-item">
                                    <a onclick="setValue('{link.dscb_den}','panel_chitiet');" class="nav-link " data-toggle="tab" role="tab"><i class="icofont icofont-circled-right"></i>DSCB điều động đến</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item" >
                                    <a onclick="setValue('{link.dscb_di}','panel_chitiet');"class="nav-link" data-toggle="tab" role="tab"><i class="icofont icofont-circled-left"></i>DSCB điều động đi</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item" >
                                    <a onclick="setValue('{link.tinnhan}','panel_chitiet');" class="nav-link" data-toggle="tab"  role="tab"><i class="icofont icofont-ui-message"></i>Tin nhắn điều động</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item" >
                                    <a onclick="setValue('{link.nhucaunhanluc}','panel_chitiet');" class="nav-link" data-toggle="tab" role="tab"><i class="icofont icofont-location-arrow"></i>Phiếu yêu cầu</a>
                                    <div class="slide"></div>
                                </li>

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content card-block">
                                <div class="tab-pane active" id="msg" role="tabpanel">
                                    <span class="m-0" id="panel_chitiet">.....</span>
                                </div>
                            </div>
                        </div>
                        
                    <!-- Row end -->
                </div>
            </div>
            <!-- Tab variant tab card start -->
        </div>
   </div>
</div>
<script>setValue('{link.nhucaunhanluc}','panel_chitiet');</script>
<!-- END: main -->

<!-- BEGIN: tinnhan -->
	tin nhắn
<!-- END: tinnhan -->

<!-- BEGIN: dsdieudongdi -->
	<div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
							<tr>
                                <th colspan="11" class="text-center">DANH SÁCH CÁN BỘ ĐIỀU ĐỘNG ĐI KHOA KHÁC</th>
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
                                <th>Khoa/phòng</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
						<!-- BEGIN: row -->
                            <tr >
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
<!-- END: dsdieudongdi -->

<!-- BEGIN: dsdieudongden -->
	<div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="11" class="text-center">DANH SÁCH CÁN BỘ ĐIỀU ĐỘNG ĐẾN KHOA</th>
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
<!-- END: dsdieudongden -->

<!-- BEGIN: nhucaunhanluc -->

	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>

    <script src="/ttytthanhson/assets/js/language/jquery.ui.datepicker-vi.js"></script>

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frmnhucau(this);">
<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
<input type="hidden" name="sta" id="sta" value="nhucaunhanluc_step1" />
<input type="hidden" name="khoaphong" id="khoaphong" value="{phong.tenkhoa}" />
<div class="card-header">
    <h5 class="card-header-text">NHU CẦU BỔ SUNG NHÂN LỰC <label class="label label-inverse-primary"><strong>{phong.tenkhoa}</strong></label></h5>
</div>
<div class="card-block accordion-block color-accordion-block">
    <div class="color-accordion accordion-box" id="color-accordion">
        <a class="accordion-msg"><i class="icofont icofont-location-arrow"></i>1. Nhân lực hiện có tại <strong>{phong.tenkhoa}</strong></a>
        <div class="accordion-desc">
            <div class="input-group">
                <span class="input-group-addon" id="sl_dieuduongco" style="width: auto;min-width:120px;">Điều dưỡng:</span>
                <input name="sl_dieuduongco" value="{DATA.sl_dieuduongco}" type="text" class="form-control" required >
            </div>
			<div class="input-group">
                <span class="input-group-addon" id="sl_hosinhco" style="width: auto;min-width:120px;">Hộ sinh:</span>
                <input name="sl_hosinhco" value="{DATA.sl_hosinhco}" type="text" class="form-control" required >
            </div>
			<div class="input-group">
                <span class="input-group-addon" id="sl_ktvco" style="width: auto;min-width:120px;">Kỹ thuật viên:</span>
                <input name="sl_ktvco" value="{DATA.sl_ktvco}" type="text" class="form-control" required >
            </div>
        </div>
        <a class="accordion-msg success-breadcrumb"><i class="icofont icofont-location-arrow"></i> 2.Nhân lực nhu cầu cho {phong.tenkhoa}</a>
            <div class="accordion-desc">
				<div class="input-group">
					<span class="input-group-addon" id="sl_dieuduongcan" style="width: auto;min-width:120px;">Điều dưỡng:</span>
					<input name="sl_dieuduongcan" value="{DATA.sl_dieuduongcan}" type="text" class="form-control" required >
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="sl_hosinhcan" style="width: auto;min-width:120px;">Hộ sinh:</span>
					<input name="sl_hosinhcan" value="{DATA.sl_hosinhcan}" type="text" class="form-control" required >
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="sl_ktvcan" style="width: auto;min-width:120px;">Kỹ thuật viên:</span>
					<input name="sl_ktvcan" value="{DATA.sl_ktvcan}" type="text" class="form-control" required >
				</div>
			</div>
           <a class="accordion-msg info-breadcrumb"><i class="icofont icofont-location-arrow"></i> 3.Yêu cầu khác</a>
                <div class="accordion-desc">
					<div class="form-group row">
						<div class="col-sm-6 input-group"  >
							<span class="input-group-addon" id="tg_tungay" style="width: auto;min-width:120px;">Từ ngày:</span>
							<input id="startDate" name="tg_tungay" value="{DATA.tg_tungay}" type="text" class="form-control" id="html5-date-input" type="date" >
						</div>
						<div class="col-sm-6 input-group">
							<span class="input-group-addon" id="tg_denngay" style="width: auto;min-width:120px;">Đến ngày:</span>
							<input id="endDate" name="tg_denngay" value="{DATA.tg_denngay}" type="text" class="form-control" type="date" >
						</div>
					</div>
					<div class="form-group row">
						<h5 class="m-b-10">Lý do bổ sung</h5>
						<textarea name="lydo" rows="5" cols="25" class="form-control form-control-success"></textarea>
					</div>
					
					<button type="submit" class="btn btn-success btn-outline-success">
					<i class="icofont icofont-location-arrow"></i><strong>Gửi Yêu Cầu</strong></button>

                </div>
            </div>
    </div>
</div>
<form>
<!-- Accordion js -->
<script type="text/javascript" src="{URL_THEMES}/assets/pages/accordion/accordion.js"></script>
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
<!-- END: nhucaunhanluc -->

<!-- BEGIN: nhucaunhanluc_step2 -->

	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>

    <script src="/ttytthanhson/assets/js/language/jquery.ui.datepicker-vi.js"></script>

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frmnhucau(this);">
<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
<input type="hidden" name="sta" id="sta" value="nhucaunhanluc_step1" />
<input type="hidden" name="khoaphong" id="khoaphong" value="{phong.tenkhoa}" />
<div class="card-header">
    <h5 class="card-header-text">NHU CẦU BỔ SUNG NHÂN LỰC <label class="label label-inverse-primary"><strong>{phong.tenkhoa}</strong></label></h5>
</div>
<div class="card-block accordion-block color-accordion-block">
    <div class="color-accordion accordion-box" id="color-accordion">
        <a class="accordion-msg"><i class="icofont icofont-location-arrow"></i>1. Nhân lực hiện có tại <strong>{phong.tenkhoa}</strong></a>
        <div class="accordion-desc">
            <div class="input-group">
                <span class="input-group-addon" id="sl_dieuduongco" style="width: auto;min-width:120px;">Điều dưỡng:</span>
                <input name="sl_dieuduongco" value="{DATA.sl_dieuduongco}" type="number" class="form-control" required >
            </div>
			<div class="input-group">
                <span class="input-group-addon" id="sl_hosinhco" style="width: auto;min-width:120px;">Hộ sinh:</span>
                <input name="sl_hosinhco" value="{DATA.sl_hosinhco}" type="number" class="form-control" required >
            </div>
			<div class="input-group">
                <span class="input-group-addon" id="sl_ktvco" style="width: auto;min-width:120px;">Kỹ thuật viên:</span>
                <input name="sl_ktvco" value="{DATA.sl_ktvco}" type="number" class="form-control" required >
            </div>
        </div>
        <a class="accordion-msg success-breadcrumb"><i class="icofont icofont-location-arrow"></i> 2.Nhân lực nhu cầu cho {phong.tenkhoa}</a>
            <div class="accordion-desc">
				<div class="input-group">
					<span class="input-group-addon" id="sl_dieuduongcan" style="width: auto;min-width:120px;">Điều dưỡng:</span>
					<input name="sl_dieuduongcan" value="{DATA.sl_dieuduongcan}" type="number" class="form-control" required >
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="sl_hosinhcan" style="width: auto;min-width:120px;">Hộ sinh:</span>
					<input name="sl_hosinhcan" value="{DATA.sl_hosinhcan}" type="number" class="form-control" required >
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="sl_ktvcan" style="width: auto;min-width:120px;">Kỹ thuật viên:</span>
					<input name="sl_ktvcan" value="{DATA.sl_ktvcan}" type="number" class="form-control" required >
				</div>
			</div>
           <a class="accordion-msg info-breadcrumb"><i class="icofont icofont-location-arrow"></i> 3.Yêu cầu khác</a>
                <div class="accordion-desc">
					<div class="form-group row">
						<div class="col-sm-6 input-group"  >
							<span class="input-group-addon" id="tg_tungay" style="width: auto;min-width:120px;">Từ ngày:</span>
							<input id="startDate" name="tg_tungay" value="{DATA.tg_tungay}" type="text" class="form-control" type="date" >
						</div>
						<div class="col-sm-6 input-group">
							<span class="input-group-addon" id="tg_denngay" style="width: auto;min-width:120px;">Đến ngày:</span>
							<input id="endDate" name="tg_denngay" value="{DATA.tg_denngay}" type="text" class="form-control" type="date" >
						</div>
					</div>
					<div class="form-group row">
						<h5 class="m-b-10">Lý do bổ sung</h5>
						<textarea name="lydo" rows="5" cols="25" class="form-control form-control-success">{DATA.lydo}</textarea>
					</div>
					
					<button type="submit" class="btn btn-success btn-outline-success">
					<i class="icofont icofont-location-arrow"></i><strong>Gửi Yêu Cầu</strong></button>

                </div>
            </div>
    </div>
</div>
<form>
<!-- Accordion js -->
<script type="text/javascript" src="{URL_THEMES}/assets/pages/accordion/accordion.js"></script>
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
<!-- END: nhucaunhanluc_step2 -->


<!-- BEGIN: nhucaunhanluc_step3 -->

	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>

    <script src="/ttytthanhson/assets/js/language/jquery.ui.datepicker-vi.js"></script>

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frmnhucau(this);">
<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
<input type="hidden" name="sta" id="sta" value="nhucaunhanluc_step1" />
<input type="hidden" name="khoaphong" id="khoaphong" value="{phong.tenkhoa}" />
<div class="card-header">
    <h5 class="card-header-text">NHU CẦU BỔ SUNG NHÂN LỰC <label class="label label-inverse-primary"><strong>{phong.tenkhoa}</strong></label></h5>
</div>
<div class="card-block accordion-block color-accordion-block">
    <div class="color-accordion accordion-box" id="color-accordion">
        <a class="accordion-msg"><i class="icofont icofont-location-arrow"></i>1. Nhân lực hiện có tại <strong>{phong.tenkhoa}</strong></a>
        <div class="accordion-desc">
            <div class="input-group">
                <span class="input-group-addon" id="sl_dieuduongco" style="width: auto;min-width:120px;">Điều dưỡng:</span>
                <input name="sl_dieuduongco" value="{DATA.sl_dieuduongco}" type="number" class="form-control" required >
            </div>
			<div class="input-group">
                <span class="input-group-addon" id="sl_hosinhco" style="width: auto;min-width:120px;">Hộ sinh:</span>
                <input name="sl_hosinhco" value="{DATA.sl_hosinhco}" type="number" class="form-control" required >
            </div>
			<div class="input-group">
                <span class="input-group-addon" id="sl_ktvco" style="width: auto;min-width:120px;">Kỹ thuật viên:</span>
                <input name="sl_ktvco" value="{DATA.sl_ktvco}" type="number" class="form-control" required >
            </div>
        </div>
        <a class="accordion-msg success-breadcrumb"><i class="icofont icofont-location-arrow"></i> 2.Nhân lực nhu cầu cho {phong.tenkhoa}</a>
            <div class="accordion-desc">
				<div class="input-group">
					<span class="input-group-addon" id="sl_dieuduongcan" style="width: auto;min-width:120px;">Điều dưỡng:</span>
					<input name="sl_dieuduongcan" value="{DATA.sl_dieuduongcan}" type="number" class="form-control" required >
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="sl_hosinhcan" style="width: auto;min-width:120px;">Hộ sinh:</span>
					<input name="sl_hosinhcan" value="{DATA.sl_hosinhcan}" type="number" class="form-control" required >
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="sl_ktvcan" style="width: auto;min-width:120px;">Kỹ thuật viên:</span>
					<input name="sl_ktvcan" value="{DATA.sl_ktvcan}" type="number" class="form-control" required >
				</div>
			</div>
           <a class="accordion-msg info-breadcrumb"><i class="icofont icofont-location-arrow"></i> 3.Yêu cầu khác</a>
                <div class="accordion-desc">
					<div class="form-group row">
						<div class="col-sm-6 input-group"  >
							<span class="input-group-addon" id="tg_tungay" style="width: auto;min-width:120px;">Từ ngày:</span>
							<input id="startDate" name="tg_tungay" value="{DATA.tg_tungay}" type="text" class="form-control" id="html5-date-input" type="date" >
						</div>
						<div class="col-sm-6 input-group">
							<span class="input-group-addon" id="tg_denngay" style="width: auto;min-width:120px;">Đến ngày:</span>
							<input id="endDate" name="tg_denngay" value="{DATA.tg_denngay}" type="text" class="form-control" type="date" >
						</div>
					</div>
					<div class="form-group row">
						<h5 class="m-b-10">Lý do bổ sung</h5>
						<textarea name="lydo" rows="5" cols="25" class="form-control form-control-success">{DATA.lydo}</textarea>
					</div>
					
					<button type="submit" class="btn btn-success btn-outline-success">
					<i class="icofont icofont-location-arrow"></i><strong>Gửi Yêu Cầu</strong></button>

                </div>
            </div>
    </div>
</div>
<form>
<!-- Accordion js -->
<script type="text/javascript" src="{URL_THEMES}/assets/pages/accordion/accordion.js"></script>
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
<!-- END: nhucaunhanluc_step3 -->
