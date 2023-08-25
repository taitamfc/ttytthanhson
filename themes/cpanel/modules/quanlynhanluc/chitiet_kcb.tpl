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
                        <h5>THÔNG TIN CHI TIẾT TÌNH HÌNH BỆNH NHÂN</h5>
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
							<table id="tbl_danhsach" class="table table-hover" style="border:1px #DCDED5 solid !important;">
							<thead>
								<tr>
									<th colspan="22" class="text-left">LỊCH SỬ CHI TIẾT KHÁM CHỮA BỆNH</th>
								</tr>
								<tr style="background-color: #2ed8b6;">
									<th class="align-middle col-1">#</th>
									<th class="align-middle col-1">Ngày tháng</th>
									<!-- BEGIN: khoaphong --><th class="align-middle col-1" >Khoa/Phòng</th><!-- END: khoaphong -->									
									<th class='align-middle text-center'>Số bác sĩ <br/>làm lâm sàng</th>
									<th class=' text-center'>Số giường bệnh <br/>thực kê</th>
									<th class='align-middle text-center'>BN cấp I</th>
									<th class='text-center'>BN Cấp I <br/>chăm sóc<br/>toàn diện</th>
									<th class='align-middle text-center'>BN cấp II</th>
									<th class='text-center'>BN Cấp II <br/>chăm sóc<br/>toàn diện</th>
									<th class='align-middle text-center'>BN cấp III</th>
									<th class='text-center'>BN Cấp III <br/>chăm sóc<br/>toàn diện</th>
									<th class='align-middle text-center'>Gội đầu</th>
									<th class='align-middle text-center'>Tắm khô</th>
									<th class='align-middle text-center'>Xông hơi <br/>sản phụ</th>
									<th class='align-middle text-center'>Tắm bé</th>
									<th class='align-middle text-center'>Matxa trẻ</th>
									<th class='align-middle text-center'>Xoay sở</th>
									<th class='align-middle text-center'>Vỗ rung</th>
									<th class='align-middle text-center'>Số ca đẻ</th>
									<th class='align-middle text-center'>Số ca <br/>phẫu thuật</th>
									<th class='align-middle text-center'>BN loét<br/>do tỳ đè </th>
									<th class='align-middle text-center'>BN <br/> viêm phổi<br/>do ứ đọng</th>
								</tr>
							</thead>
							<tbody>
							<!-- BEGIN: row -->
								<tr>
									<th scope="row">{ROW.stt}</th>									
									<td class='text-center'>{ROW.thoigian}</td>
									<!-- BEGIN: khoaphong --><td style="background-color: #2ed8b6;"> {tenkhoa}</td><!-- END: khoaphong -->
									<td class='text-center'>{ROW.bs_lamsang}</td>
									<td class='text-center'>{ROW.so_giuong}</td>
									<td class='text-center'>{ROW.bn_c1}</td>
									<td class='text-center'>{ROW.c1_toandien}</td>
									<td class='text-center'>{ROW.bn_c2}</td>
									<td class='text-center'>{ROW.c2_toandien}</td>
									<td class='text-center'>{ROW.bn_c3}</td>
									<td class='text-center'>{ROW.c3_toandien}</td>
									<td class='text-center'>{ROW.goi_dau}</td>
									<td class='text-center'>{ROW.tam_kho}</td>
									<td class='text-center'>{ROW.xong_hoi}</td>
									<td class='text-center'>{ROW.tam_be}</td>
									<td class='text-center'>{ROW.massage}</td>
									<td class='text-center'>{ROW.xoay}</td>
									<td class='text-center'>{ROW.vo_rung}</td>
									<td class='text-center'>{ROW.ca_de}</td>
									<td class='text-center'>{ROW.phau_thuat}</td>
									<td class='text-center'>{ROW.bn_loet}</td>
									<td class='text-center'>{ROW.bn_viem}</td>
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
												<h5> NHẬP THÔNG TIN CHI TIẾT BỆNH NHÂN - {THONGTIN.ngay_tao}<br/> KHOA/PHÒNG:{THONGTIN.tenkhoa}</h5 >
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
									<tr><th class='text-center'>1</th>
									 <th>- {lang.bs_lamsang}</th>
									 <td><input name='bs_lamsang' value='{DATA.bs_lamsang}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>2</th>
									 <th>- {lang.so_giuong}</th>
									 <td><input name='so_giuong' value='{DATA.so_giuong}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>3</th>
									 <th>- {lang.bn_c1}</th>
									 <td><input name='bn_c1' value='{DATA.bn_c1}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>4</th>
									 <th>- {lang.c1_toandien}</th>
									 <td><input name='c1_toandien' value='{DATA.c1_toandien}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>5</th>
									 <th>- {lang.bn_c2}</th>
									 <td><input name='bn_c2' value='{DATA.bn_c2}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>6</th>
									 <th>- {lang.c2_toandien}</th>
									 <td><input name='c2_toandien' value='{DATA.c2_toandien}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>7</th>
									 <th>- {lang.bn_c3}</th>
									 <td><input name='bn_c3' value='{DATA.bn_c3}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>8</th>
									 <th>- {lang.c3_toandien}</th>
									 <td><input name='c3_toandien' value='{DATA.c3_toandien}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>9</th>
									 <th>- {lang.goi_dau}</th>
									 <td><input name='goi_dau' value='{DATA.goi_dau}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>10</th>
									 <th>- {lang.tam_kho}</th>
									 <td><input name='tam_kho' value='{DATA.tam_kho}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-sm-6">
						<table class="table table-hover table-border" style="float:right">
								<thead>
									<tr style="text-transform: uppercase;background-color: #2ed8b6;">
											<th scope="row" class="text-center" >#</th>									
											<th scope="row" class="text-center" >Chỉ số</th>									
											<th scope="row" class="text-center" >Giá trị</th>									
									</tr>
								</thead>
								<tbody>
									<tr><th class='text-center'>11</th>
									 <th>- {lang.xong_hoi}</th>
									 <td><input name='xong_hoi' value='{DATA.xong_hoi}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>12</th>
									 <th>- {lang.tam_be}</th>
									 <td><input name='tam_be' value='{DATA.tam_be}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>13</th>
									 <th>- {lang.massage}</th>
									 <td><input name='massage' value='{DATA.massage}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>14</th>
									 <th>- {lang.xoay}</th>
									 <td><input name='xoay' value='{DATA.xoay}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>15</th>
									 <th>- {lang.vo_rung}</th>
									 <td><input name='vo_rung' value='{DATA.vo_rung}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>16</th>
									 <th>- {lang.ca_de}</th>
									 <td><input name='ca_de' value='{DATA.ca_de}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>17</th>
									 <th>- {lang.phau_thuat}</th>
									 <td><input name='phau_thuat' value='{DATA.phau_thuat}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>18</th>
									 <th>- {lang.bn_loet}</th>
									 <td><input name='bn_loet' value='{DATA.bn_loet}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
									</tr>
									<tr><th class='text-center'>19</th>
									 <th>- {lang.bn_viem}</th>
									 <td><input name='bn_viem' value='{DATA.bn_viem}' type='text' onchange="checkValue($(this))"  class='dataValue form-control' ></td>
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
