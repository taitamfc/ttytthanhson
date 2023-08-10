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
                        <h5>THÔNG TIN KHÁM CHỮA BỆNH</h5>
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
						<table class="table table-hover " >
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
											<select name="id_khoaphong"  class="form-control">
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
									<th colspan="14" class="text-left">LỊCH SỬ KHÁM CHỮA BỆNH</th>
								</tr>
								<tr>
									<th>#</th>
									<th>Ngày tháng</th>
									<!-- BEGIN: khoaphong --><th>Khoa/Phòng</th><!-- END: khoaphong -->									
									<th><strong>Tổng số BN</strong></th>
									<th>BN cũ</th>
									<th>BN Vào viện</th>
									<th>BN ra viện</th>
									<th>BN Chuyển khoa</th>
									<th>BN Tử vong</th>
									<th>BN Chuyển viện</th>
									<th>BN Xin về</th>
									<th>BN Nội trú</th>
									<th>BN Ngoại trú</th>
									<th>BN nằm giường yêu cầu</th>
								</tr>
							</thead>
							<tbody>
								<!-- BEGIN: row -->
								<tr>
									<th scope="row">{ROW.stt}</th>									
									<td class='text-center'>{ROW.thoigian}</td>
									<!-- BEGIN: khoaphong --><td style="background-color: #2ed8b6;"> {tenkhoa}</td><!-- END: khoaphong -->
									<td class='text-center' style="background-color: #2ed8b6;"><strong>{ROW.bn_tong}</strong></td>
									<td class='text-center'>{ROW.bn_cu}</td>
									<td class='text-center'>{ROW.bn_vaovien}</td>
									<td class='text-center'>{ROW.bn_ravien}</td>
									<td class='text-center'>{ROW.bn_chuyenkhoa}</td>
									<td class='text-center'>{ROW.bn_tuvong}</td>									
									<td class='text-center'>{ROW.bn_chuyenvien}</td>
									<td class='text-center'>{ROW.bn_xinve}</td>
									<td class='text-center'>{ROW.bn_noitru}</td>
									<td class='text-center'>{ROW.bn_ngoaitru}</td>
									<td class='text-center'>{ROW.bn_namyc}</td>
									
								</tr>
								<!-- END: row -->
							</tbody>
							
							<tfoot>	
								<!-- BEGIN: total -->
								<tr class="font-weight-bold">
									<td class='text-center' colspan="3">Tổng cộng</td>
									<td class='text-center'>{SUM.bn_tong}</td>
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
								</tr>
							<!-- END: total -->
							
								<!-- BEGIN: generate_page -->
									<tr class="{ROW.color}">
										<td colspan="14" class="text-center">{GENERATE_PAGE}</td>
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
						<table class="table table-borderless" >
							<thead>
								<tr>
										<th scope="row" class="text-center" style="text-transform: uppercase;">
											<h5> NHẬP THÔNG TIN KHÁM CHỮA BỆNH - {THONGTIN.ngay_tao}<br/> {THONGTIN.tenkhoa} </h5> 
										</th>									
								</tr>
							</thead>
						</table>		
						<div class="row">
						<div class="col-sm-6">
							<table class="table table-hover table-border" >
							<thead>
								<tr style="text-transform: uppercase;background-color: #2ed8b6;">
										<th scope="row" class="text-center" >#</th>									
										<th scope="row" class="text-center" >Chỉ số</th>									
										<th scope="row" class="text-center" >Giá trị</th>									
								</tr>
							</thead>
							<tbody>									
								<tr><th class='text-center'>1</th>
								 <th>- {lang.bn_cu}</th>
								 <td><input id='bn_cu' onchange='bn_sum($(this));' name='bn_cu'  value='{DATA.bn_cu}' type='text'   class='dataValue form-control' ></td>
								</tr>
								<tr><th class='text-center'>2</th>
								 <th>- {lang.bn_vaovien}</th>
								 <td><input id='bn_vaovien' onchange='bn_sum($(this));' name='bn_vaovien'  value='{DATA.bn_vaovien}' type='text'   class='dataValue form-control' ></td>
								</tr>
								<tr><th class='text-center'>3</th>
								 <th>- {lang.bn_ravien}</th>
								 <td><input id='bn_ravien' onchange='bn_sum($(this));' name='bn_ravien'  value='{DATA.bn_ravien}' type='text'   class='dataValue form-control' ></td>
								</tr>
								<tr><th class='text-center'>4</th>
								 <th>- {lang.bn_chuyenkhoa}</th>
								 <td><input id='bn_chuyenkhoa' onchange='bn_sum($(this));' name='bn_chuyenkhoa'  value='{DATA.bn_chuyenkhoa}' type='text'   class='dataValue form-control' ></td>
								</tr>
								<tr><th class='text-center'>5</th>
								 <th>- {lang.bn_chuyenvien}</th>
								 <td><input id='bn_chuyenvien' onchange='bn_sum($(this));' name='bn_chuyenvien'  value='{DATA.bn_chuyenvien}' type='text'   class='dataValue form-control' ></td>
								</tr>			
							</tbody>	
							</table>	
						</div>
						<div class="col-sm-6">
							<table class="table table-hover table-border" >
							<thead>
								<tr style="text-transform: uppercase;background-color: #2ed8b6;">
										<th scope="row" class="text-center" >#</th>									
										<th scope="row" class="text-center" >Chỉ số</th>									
										<th scope="row" class="text-center" >Giá trị</th>									
								</tr>
							</thead>
							<tbody>			
								<tr><th class='text-center'>6</th>
								 <th>- {lang.bn_xinve}</th>
								 <td><input id='bn_xinve' onchange='bn_sum($(this));' name='bn_xinve'  value='{DATA.bn_xinve}' type='text'   class='dataValue form-control' ></td>
								</tr>
								<tr><th class='text-center'>7</th>
								 <th>- {lang.bn_tuvong}</th>
								 <td><input id='bn_tuvong' onchange='bn_sum($(this));' name='bn_tuvong'  value='{DATA.bn_tuvong}' type='text'   class='dataValue form-control' ></td>
								</tr>
								<tr><th class='text-center'>8</th>
								 <th>- {lang.bn_noitru}</th>
								 <td><input id='bn_noitru' onchange='bn_sum($(this));' name='bn_noitru'  value='{DATA.bn_noitru}' type='text'   class='dataValue form-control' ></td>
								</tr>
								<tr><th class='text-center'>9</th>
								 <th>- {lang.bn_ngoaitru}</th>
								 <td><input id='bn_ngoaitru' onchange='bn_sum($(this));' name='bn_ngoaitru'  value='{DATA.bn_ngoaitru}' type='text'   class='dataValue form-control' ></td>
								</tr>
								<tr><th class='text-center'>10</th>
								 <th>- {lang.bn_namyc}</th>
								 <td><input id='bn_namyc' onchange='bn_sum($(this));' name='bn_namyc'  value='{DATA.bn_namyc}' type='text'   class='dataValue form-control' ></td>
								</tr>
							</tbody>	
							</table>	
						</div>
						</div>
						<table class="table table-hover table-border" >
							<tfoot>
							<tr>
								<td class="text-center">								
									<div class="input-group">
									<span class="btn btn-success btn-block">
									<strong>TỔNG SỐ BỆNH NHÂN: <span id='bn_tong'>0</span> </strong></span>
									</div>
								</td>
								<td class="text-left">								
								<button type="submit" class="btn btn-warning">
									<i class="icofont icofont-location-arrow"></i><strong>Cập nhật số liệu</strong>
								</button>		
								</td>
							</tr>
							</tfoot>
						</table> 
						</form>
						<script type="text/javascript">
						var bn_vaovien = 0;
						var bn_ravien =  0;
						var bn_chuyenkhoa = 0;
						var bn_chuyenvien = 0;
						var bn_xinve =  0;
						var bn_noitru = 0;
						var bn_ngoaitru = 0;
						var bn_namyc = 0;
						var bn_tuvong = 0;
						function bn_sum(object){
								if(checkValue(object)){ 
									if ($('#bn_cu').val()!='') bn_cu = parseInt($('#bn_cu').val());
									if ($('#bn_vaovien').val()!='') bn_vaovien = parseInt($('#bn_vaovien').val());
									if ($('#bn_ravien').val()!='') bn_ravien = parseInt($('#bn_ravien').val());
									if ($('#bn_chuyenkhoa').val()!='') bn_chuyenkhoa =parseInt($('#bn_chuyenkhoa').val());
									if ($('#bn_chuyenvien').val()!='') bn_chuyenvien =parseInt($('#bn_chuyenvien').val());
									if ($('#bn_xinve').val()!='') bn_xinve = parseInt($('#bn_xinve').val());
									if ($('#bn_noitru').val()!='') bn_noitru =parseInt($('#bn_noitru').val());
									if ($('#bn_ngoaitru').val()!='') bn_ngoaitru =parseInt($('#bn_ngoaitru').val());
									if ($('#bn_namyc').val()!='') bn_namyc =parseInt($('#bn_namyc').val());
									if ($('#bn_tuvong').val()!='') bn_tuvong =parseInt($('#bn_tuvong').val());
								$("#bn_tong").html(bn_cu+bn_vaovien-bn_ravien-bn_chuyenkhoa-bn_chuyenvien-bn_xinve-bn_tuvong);
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
	{FILE "export.tpl"}
<!-- END: main -->