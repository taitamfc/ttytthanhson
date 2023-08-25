<!-- BEGIN: main -->
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
	<script type="text/javascript" src="{URL_THEMES}/assets/pages/accordion/accordion.js"></script>
    <script src="/ttytthanhson/assets/js/language/jquery.ui.datepicker-vi.js"></script>
	<div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>BÁO CÁO KẾT QUẢ KHÁM CHỮA BỆNH</h5>
                        <span style="color: #ff0000;">Lưu ý: Thông tin nhập hàng ngày từ 07 giờ sáng hôm trước đến 07 giờ sáng hôm sau.</span>
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
						<form name="findform" id="findform" method="post" action="{link_frm}">
						<input type="hidden" name="sta" id="sta" value="find_item" />
						<table class="table table-hover" >
								<thead>
									<tr>
										<th>
										<div class="input-group">
										<span class="btn btn-warning btn-block">
										<i class="icofont icofont-user-alt-3"></i>Tra cứu dữ liệu lịch sử nhập</span>
										</div>
										</th>
										
										<th>
										<div class="input-group">
											<select name="id_khoaphong" class="btn">
											<option value=""><strong>Tất cả các khoa phòng</strong></option>
											<!-- BEGIN: dskhoaphong -->
											<option value="{r.id}" {r.select}>{r.name}</option>
											<!-- END: dskhoaphong -->
											</select>	
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
						<!-- BEGIN: lichsunhap -->
							<table id="tbl_danhsach" class="table table-hover table-border">
							<thead>
								<tr>
									<th colspan="6" class="text-left">BÁO CÁO KẾT QUẢ KHÁM CHỮA BỆNH</th>
								</tr>
								<tr style="background-color: #2ed8b6;">
									<th>#</th>
								<th>Ngày tháng</th>
								<!-- BEGIN: khoaphong --><th>Khoa/Phòng</th><!-- END: khoaphong -->									
								<th class='text-center'>Số bệnh nhân khám theo chế độ BHYT</th>
								<th class='text-center'>Số BN Nội tỉnh </th>
								<th class='text-center'>Số BN Ngoại tỉnh</th>
								<th class='text-center'>Số bệnh nhân khám viện phí</th>
								</tr>
							</thead>
							<tbody>
							<!-- BEGIN: row -->
								<tr>
									<th scope="row">{ROW.stt}</th>									
									<th class='text-center'>{ROW.thoigian}</th>
									<!-- BEGIN: khoaphong --><th style="background-color: #2ed8b6;"> {tenkhoa}</th><!-- END: khoaphong -->
									<th class='text-center'>{ROW.sobn_bhyt}</th>
									<th class='text-center'>{ROW.bn_noitinh}</th>
									<th class='text-center'>{ROW.bn_ngoaitinh}</th>
									<th class='text-center'>{ROW.bnkham}</th>
								</tr>
							<!-- END: row -->
							</tbody>
							
							<tfoot>
								<!-- BEGIN: total1 -->
								<tr class="font-weight-bold">
									
									<td class='text-center' colspan="3">Tổng cộng</td>
									<td class='text-center' style="background-color: #2ed8b6;">{SUM.bn_tong}</td>
									<td class='text-center'>{SUM.bn_cu}</td>
									<td class='text-center'>{SUM.bn_vaovien}</td>
									<td class='text-center'>{SUM.bn_ravien}</td>
									<td class='text-center'>{SUM.bn_chuyenkhoa}</td>
									<td class='text-center'>{SUM.bn_tuvong}</td>									
									<td class='text-center'>{SUM.bn_chuyenvien}</td>
									<td class='text-center'>{SUM.bn_xinve}</td>
									<td class='text-center'>{SUM.bn_noitru}</td>
									<td class='text-center'>{SUM.bn_ngoaitru}</td>
									<td class='text-center'>{SUM.bn_namyc}</td>
									<td></td> 
								</tr>
							<!-- END: total1 -->
								
								<!-- BEGIN: generate_page -->
									<tr class="{ROW.color}">
										<td colspan="22" class="text-center">{GENERATE_PAGE}</td>
									</tr>
								<!-- END: generate_page -->
							</tfoot>
						</table>
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
						<!-- END: lichsunhap -->
						
						<!-- BEGIN: nhapdulieu -->						
						<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frmnhucau(this);">
						<input type="hidden" name="sta" id="sta" value="inputdata" />
						<input type="hidden" name="token" value="{token}" />
						<table class="table" style="width:100%">
								<thead>
									<tr>
											<th scope="row" class="text-center"  style="text-transform: uppercase;">
												<h5> BÁO CÁO KẾT QUẢ KHÁM CHỮA BỆNH - {THONGTIN.ngay_tao}<br/> KHOA/PHÒNG:{THONGTIN.tenkhoa}</h5 >
											</th>									
									</tr>
								</thead>
						</table>
						<div class="row">
						<div class="col-sm-6">
						<table class="table table-hover table-border" style="">
								<thead>
									<tr style="text-transform: uppercase;background-color: #2ed8b6;">
											<th scope="row" class="text-center" >#</th>									
											<th scope="row" class="text-center" >Chỉ số</th>									
											<th scope="row" class="text-center" >Giá trị</th>									
									</tr>
								</thead>
								<tbody>
									<tr style="color: #4099ff;"><th class='text-center'>1</th>
									 <th>- {lang.sobn_bhyt}</th>
									 <th class='text-right'> <span id='bn_bhyt'>0</span> </th>
									</tr>
									<tr><th class='align-middle' rowspan="2">2</th>
									 <td>- {lang.bn_noitinh}</td>
									 <td><input id='bn_noitinh' name='bn_noitinh' value='{DATA.bn_noitinh}' type='text' onchange='bn_sum($(this))'  class='dataValue form-control' ></td>
									</tr>
									<tr>
									 <td>- {lang.bn_ngoaitinh}</td>
									 <td><input id='bn_ngoaitinh' name='bn_ngoaitinh' value='{DATA.bn_ngoaitinh}' type='text' onchange='bn_sum($(this))'  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>3</th>
									 <th>- {lang.bnkham}</th>
									 <td><input name='bnkham' value='{DATA.bnkham}' type='text' onchange='checkValue($(this))'  class='dataValue form-control' ></td>
									</tr>
								</tbody>
								<tfoot>
								<tr>
									<td class="text-center" colspan="3">
									<button type="submit" class="btn btn-warning">
										<i class="icofont icofont-location-arrow"></i><strong>Cập nhật số liệu</strong>
									</button>
									
									</td>
								</tr>
								</tfoot>
							</table>
						</div>
						</div>
						</form>
						<script type="text/javascript">	
						var bn_noitinh =  0;
						var bn_ngoaitinh = 0;
						function bn_sum(object){
								if(checkValue(object)){ 
									if ($('#bn_noitinh').val()!='') bn_noitinh = parseInt($('#bn_noitinh').val());
									if ($('#bn_ngoaitinh').val()!='') bn_ngoaitinh = parseInt($('#bn_ngoaitinh').val());
									$("#bn_bhyt").html(bn_noitinh+bn_ngoaitinh);
								}
							}
						</script>
					<!-- END: nhapdulieu -->
						
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<!-- END: main -->
