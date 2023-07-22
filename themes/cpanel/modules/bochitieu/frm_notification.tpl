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
								<li class="nav-item" >
                                    <a onclick="setValue('{link.tinnhan}','panel_chitiet');" class="nav-link" data-toggle="tab"  role="tab"><i class="icofont icofont-ui-message"></i>Danh sách thông báo</a>
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
{JS}
<!-- END: main -->

<!-- BEGIN: tinnhan -->
	tin nhắn
<!-- END: tinnhan -->

<!-- BEGIN: dstinnhan -->
	<!-- Basic table card start -->
            <div class="card-block table-border-style">
                <div class="table-responsive" style="padding-bottom: 100px;">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Người gửi</th>
                                <th>Nội dung</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
						<!-- BEGIN: loop -->
                            <tr style="{ROW.new}">
                                <th scope="row" style="padding-top: 15px;">{ROW.stt}</th>
                                <td><div class="label-main">
                                        <label class="label label-primary">{ROW.nguoigui}</label>
                                    </div></td>
                                <td style="padding-top: 15px;">{ROW.tieude}</td>
                                <td style="padding-top: 15px;">{ROW.tg_nhan}</td>
                                <td><div class="label-main">
								<label class="label {ROW.color_tt}">{ROW.trangthai}</label></div>
								</td>
								
                                <td><div class="dropdown-success dropdown">
								<button class="btn-sm btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Chọn</button>
									<div class="dropdown-menu" aria-labelledby="dropdown-3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
										<a onclick="setValue('{ROW.link_view}','panel_chitiet');" class="dropdown-item waves-light waves-effect" href="#">Chi tiết</a>
										<!-- BEGIN: admin --> <a onclick="del_msg('{ROW.link_del}','{ROW.code_pro}');" class="dropdown-item waves-light waves-effect" href="#">Xóa bỏ</a><!-- END: admin -->
									</div>
								</div></td>
                                <td></td>
                            </tr>
                        <!-- END: loop -->
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- Basic table card end -->
<!-- END: dstinnhan -->

<!-- BEGIN: detail_yeucaunhanluc -->
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
    <script src="/ttytthanhson/assets/js/language/jquery.ui.datepicker-vi.js"></script>

<div class="card-header">
    <h5 class="card-header-text"> Nhu cầu bổ sung {DATA.khoa_yeucau}</h5>
</div>
<div class="card-block accordion-block color-accordion-block">
    <div class="color-accordion accordion-box" id="color-accordion">
	
<!-- BEGIN: step1 -->
        <a class="accordion-msg"><i class="icofont icofont-location-arrow"> Chi tiết yêu cầu Khoa/Phòng {DATA.khoa_yeucau}</i></a>
        <div class="accordion-desc">
		<div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
						<tr>
                            <th class="text-center">#</th>
                            <th class="text-center">{lang.dieuduong}</th>
                            <th class="text-center">{lang.hosinh}</th>
                            <th class="text-center">{lang.ktv}</th>
                            <th class="text-center">{lang.ghichu}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-left">1. Nhân lực hiện có</th>
                            <td class="text-center">{DATA.sl_dieuduongco}</td>
                            <td class="text-center">{DATA.sl_hosinhco}</td>
                            <td class="text-center">{DATA.sl_ktvco}</td>
                            <td class="text-center"></td>
                        </tr>			
						<tr class="table-success">
                            <th class="text-left">2. Nhân lực nhu cầu</th>
                            <td class="text-center"><b>{DATA.sl_dieuduongcan}</b></td>
                            <td class="text-center"><b>{DATA.sl_hosinhcan}</b></td>
                            <td class="text-center"><b>{DATA.sl_ktvcan}</td>
                            <td class="text-center"></td>
                        </tr>	
						<tr>
                            <th class="text-left">3. Thời gian:</th>
                            <td class="text-center" colspan="3">Từ ngày:<b>{DATA.tg_tungay}</b> Đến ngày:<b>{DATA.tg_denngay}</b></td>
                            <td class="text-center"></td>
                        </tr>
						<tr class="table-success">
                            <th class="text-left">4. Lý do:</th>
                            <td colspan="4">{DATA.lydo}</td>
                        </tr>
						
                    </tbody>
                </table>
            </div>
        </div>
        </div>
<!-- END: step1 -->	
<!-- BEGIN: step2 -->
        <a class="accordion-msg"><i class="icofont icofont-location-arrow"> Phê duyệt của phòng Điều Dưỡng</i></a>
        <div class="accordion-desc">
		<div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
						<tr>
                            <th colspan="6"><h6> 1.Nội dung được phê duyệt</h6></th>
                        </tr>
						<tr>
                            <th class="text-center">#</th>
                            <th class="text-center">{lang.khoaphong_nhan}</th>
                            <th class="text-center">{lang.dieuduong}</th>
                            <th class="text-center">{lang.hosinh}</th>
                            <th class="text-center">{lang.ktv}</th>
                            <th class="text-center">{lang.ghichu}</th>
                        </tr>
                    </thead>
                    <tbody>
						<!-- BEGIN: loop -->
                        <tr class="">
							<td class="text-center">{r.stt}</td>
                            <th class="text-left">{r.tenkhoa}</th>
                            <td class="text-center">{r.sl_dieuduongduyet}</td>
                            <td class="text-center">{r.sl_hosinhduyet}</td>
                            <td class="text-center">{r.sl_ktvduyet}</td>
                            <td class="text-center"></td>
                        </tr>	
						<!-- END: loop -->
						<tr>
                            <th class="text-left">Thời gian:</th>
                            <td class="text-center" colspan="4">Từ ngày <b>{r.tg_ngaybatdau}</b> Đến ngày <b>{r.tg_ngayketthuc}</b></td>
                            <td class="text-center"></td>
                        </tr>
						<tr class="table-success">
                            <th class="text-left">{lang.ghichu}:</th>
                            <td colspan="5">{DATA.ghichu_duyet}</td>
                        </tr>						
                    </tbody>
                </table>
            </div>
        </div>
		</div>
<!-- END: step2 -->	
<!-- BEGIN: step3 -->
        <a class="accordion-msg"><i class="icofont icofont-location-arrow"> Danh sách điều động của phòng</i></a>
        <div class="accordion-desc">
		<h6> 1.Danh sách điều động</h6>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Mã BV</th>
						<th>Họ tên</th>
						<th class="text-center">Nam/Nữ</th>
						<th>Ngày sinh</th>
						<th>Điện thoại</th>										
						<th>Chức vụ</th>										
						<th>Công tác</th>										
						<th>Ghi chú</th>
					</tr>
				</thead>
				<tbody>
				<!-- BEGIN: row -->
					<tr style="{ROW.color}">
						<th class="text-center" scope="row">{ROW.stt}</th>
						<td class="text-center">{ROW.maso_bv}</td>
						<td>{ROW.hovaten}</td>
						<td class="text-center">{ROW.gioitinh}</td>
						<td>{ROW.ngaysinh}</td>
						<td>{ROW.dienthoai}</td>										
						<td>{ROW.chucvu}</td>										
						<td>{ROW.tenkhoa}</td>										
						<td>{ROW.ghichu}</td>
					</tr>
				<!-- END: row -->
				</tbody>
			</table>
		</div>
        </div>
<!-- END: step2 -->	
<!-- BEGIN: xuly_step1 -->
		 <a class="accordion-msg"><i class="icofont icofont-location-arrow"> Phê duyệt của phòng Điều Dưỡng</i></a>
        <div class="accordion-desc">
			<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frmnhucau(this);">
				
				<div class="table-responsive">
				<table class="table table-hover" id="tbl_dd">
					<thead>
						<tr>
                            <th colspan="4"><h6> 1.Chi tiết phê duyệt</h6></th>
                            <th colspan="2" class="text-right">
							<span onclick="insert_row('tbl_dd');" class="btn btn-primary text-center" style="width: 20%;"><i  style="padding: 0px;" class="fa fa-plus"></i></span>
							<span onclick="RemoveRow('tbl_dd');" class="btn btn-danger text-center" style="width: 20%;"><i  style="padding: 0px;" class="fa fa-trash-o"></i></span>
							</th>
                        </tr>
						<tr>
							<th class="text-center"></th>
							<th class="text-center">Khoa/Phòng xử lý</th>
							<th class="text-center">{lang.dieuduong}</th>
                            <th class="text-center">{lang.hosinh}</th>
                            <th class="text-center">{lang.ktv}</th>
                            <th class="text-center">{lang.ghichu}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<span id='rowbasic'>
							<td class="text-center">#</td>										
							<td><select name="id_khoaphong[]" class="btn btn-info btn-outline-info">
							<option value="0">Chọn Khoa/Phòng tiến hành điều chuyển </option>
							<!-- BEGIN: khoaphong -->
							<option value="{r.id}" {r.select}>{r.name}</option>
							<!-- END: khoaphong -->
							</select>
							</td>						
							<td><input name="sl_dieuduongduyet[]" value="{DATA.sl_dieuduongcan}" type="number" class="form-control text-center" required ></td>
							<td><input name="sl_hosinhduyet[]" value="{DATA.sl_hosinhcan}" type="number" class="form-control text-center" required ></td>
							<td><input name="sl_ktvduyet[]" value="{DATA.sl_ktvcan}" type="number" class="form-control text-center" required ></td>
							<td></td>
						</span>
						</tr>
					</tbody>
					
					<tfoot>	
						<tr>
							<td class="text-left" colspan="6">
							<h6>2. Thời gian điều động</h6></td>
						</tr>
						<tr>
							<td class="text-center" colspan="6">
							<div class="row"  >
							<div class="col-sm-5 input-group"  >
								<span class="input-group-addon" id="tg_tungay" style="width: auto;min-width:120px;">Ngày bắt đầu:</span>
								<input id="startDate" name="tg_tungay" value="{DATA.tg_tungay}" type="text" class="form-control" id="html5-date-input" >
							</div>
							<div class="col-sm-5 input-group"  >
								<span class="input-group-addon" id="tg_denngay" style="width: auto;min-width:120px;">Đến ngày:</span>
								<input id="endDate" name="tg_denngay" value="{DATA.tg_denngay}" type="text" class="form-control" id="html5-date-input" >
							</div>
							</div>
							</td>
						</tr>
						<tr>
							<td class="text-left" colspan="6">
							<h6>Ghi chú</h6>
								<textarea name="ghichu_duyet" rows="5" cols="25" class="form-control form-control-success">{DATA.lydo}</textarea>
							</td>
						</tr>
						<tr>
							<td class="text-center" colspan="6">								
							<button type="submit" class="btn btn-success btn-outline-success">
								<i class="icofont icofont-location-arrow"></i><strong>Phê duyệt yêu cầu</strong>
							</button>
							</td>
						</tr>
						
					</tfoot>
					
				</table>
			</div>
				<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
				<input type="hidden" name="sta" id="sta" value="{sta}2" />
				<input type="hidden" name="code_pro" id="code_pro" value="{DATA.code_pro}" />
			</form>
        </div>
<!-- END: xuly_step1 -->		
<!-- BEGIN: xuly_step2 -->
		 <a class="accordion-msg"><i class="icofont icofont-location-arrow"> Xác nhận điều động của Khoa/Phòng</i></a>
        <div class="accordion-desc">
			<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frmnhucau(this);">
				<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
				<input type="hidden" name="sta" id="sta" value="{sta}3" />
				<input type="hidden" name="code_pro" id="code_pro" value="{DATA.code_pro}" />
				
				<div class="card-block table-border-style">
                <div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">Chọn</th>
										<th class="text-center">Mã BV</th>
										<th>Họ tên</th>
										<th class="text-center">Nam/Nữ</th>
										<th>Ngày sinh</th>
										<th>Điện thoại</th>										
										<th>Chức vụ</th>										
										<th>Ghi chú</th>
									</tr>
								</thead>
								<tbody>
								<!-- BEGIN: row -->
									<tr style="{ROW.color}"  class="{ROW.class}">
										<th class="text-center" scope="row">{ROW.stt}</th>
										<td class="text-center"><input {ROW.status} style="width: 25px;height: 25px;" class="btn btn-icon " type="checkbox" value="{ROW.id}" name="idcheck[]"></td>
										<td class="text-center">{ROW.maso_bv}</td>
										<td>{ROW.hovaten}</td>
										<td class="text-center">{ROW.gioitinh}</td>
										<td>{ROW.ngaysinh}</td>
										<td>{ROW.dienthoai}</td>										
										<td>{ROW.chucvu}</td>										
										<td>{ROW.ghichu}</td>
									</tr>
								<!-- END: row -->
								</tbody>
							</table>
						</div>
					</div>
				
				<div class="form-group row">
					<h5 class="m-b-10">{lang.danhgia}</h5>
					<textarea name="danhgia_khoachuyen" rows="5" cols="25" class="form-control form-control-success">{DATA.danhgia_khoachuyen}</textarea>
				</div>
				
				<div class="form-group row">
					<h5 class="m-b-10">{lang.ghichu}</h5>
					<textarea name="ghichu_khoachuyen" rows="5" cols="25" class="form-control form-control-success">{DATA.ghichu_khoachuyen}</textarea>
				</div>
				
				<button type="submit" class="btn btn-success btn-outline-success">
				<i class="icofont icofont-location-arrow"></i><strong>Xác nhận nội dung điều động</strong></button>
			</form>
        </div>
<!-- END: xuly_step2 -->	
		 
    </div>
</div>

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
<!-- END: detail_yeucaunhanluc -->
