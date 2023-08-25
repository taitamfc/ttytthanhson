<!-- BEGIN: main -->
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="{BASE_URL}assets/js/language/jquery.ui.datepicker-vi.js"></script>
<!-- Page-header start -->
    <!-- Page-header end -->
	<div class="col-sm-12">
        <!-- Tooltips on textbox card start -->
        <div class="card">
            <div class="card-header">
                <h5 class="m-b-10">PHÂN BỐ CẬP NHẬT BỘ CHỈ TIÊU NĂM {namapdung}</h5>
            </div>			
			<div style="padding: 25px;">
			
			<div class="table-responsive" style="padding-bottom: 100px;">
                    <table class="table table-hover" >
                        <thead>
							<tr style="background-color: #2ed8b6; color: #fff;height:100px">
                                <th colspan="10" class="align-middle" style="text-transform: uppercase;">Chỉ tiêu: {ROW.chi_so}</th>
                            </tr>
                            
                        </thead>
                        <tbody>
					</table>
						<!-- BEGIN: solan -->
						<form name="myform{TS.no}" id="myform{TS.no}" metdod="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
							<input type="hidden" name="checkss" id="token" value="{checkss}" />
							<input type="hidden" name="token" id="token" value="{token}" />
							<input type="hidden" name="sta" id="sta" value="updatechiso" />
							<input type="hidden" name="id" id="id" value="{TS.id}" />
						<table class="table table-hover" >	
							<tr style="background-color: #73b4ff;border-color: #73b4ff;outline: 1px dashed #fff;outline-offset: -5px;">									
									 <td  class="align-middle text-left col-1">
									 <b><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {TS.title}:</b> (Vui lòng chọn ngày nhập dữ liệu)
									 </td>
									 <td class="text-center col-2"> 
									 <input {ROW.lock} id="datetime{TS.no}" name="ngaynhap" value="{ROW.ngaynhap}" type="text" class="dataValue form-control">
									</td>
									<td style="background-color: #fff;" class="align-middle text-left" rowspan="{sohang}"> 
										<!-- BEGIN: capnhat -->
										<button type="submit" class="btn btn-primary">
											<i class="icofont icofont-location-arrow"></i><strong style="text-transform: uppercase;">CẬP NHẬT<br/>{TS.title}</strong>
										</button>
										<!-- END: capnhat -->
										<!-- BEGIN: lock -->
										<a onclick="lock_item('{link_frm}&sta=lockvalue','{ROW.code}')" class="btn btn-danger" style="color:#fff;text-transform: uppercase;">
											<i class="icofont icofont-lock"></i>
											<strong>KHÓA CHỈ SỐ<br/>{TS.title}</strong>
										</a>
										<!-- END: lock -->
										<!-- BEGIN: finish -->
										<a class="btn hor-grd btn-grd-inverse" style="color:#fff;text-transform: uppercase;">
											<i class="icofont icofont-lock"></i>
											<strong>CHỈ SỐ <br/>ĐÃ KHÓA</strong>
										</a>
										<!-- END: finish -->
									</td>									
							</tr>
							<!-- BEGIN: chiso -->
								<tr>									
									 <th class="text-left col-1">{CS.stt}.{CS.giatri}:</th>
									<!-- BEGIN: input -->
									 <td class="text-center"> 
									 <input {ROW.lock} onchange="{CS.onchange}" id="ketqua_{TS.no}{CS.stt}" name="ketqua[]" value="{CS.kq}" type="text" class="dataValue form-control">
									</td>
									<!-- END: input -->
									<!-- BEGIN: tile -->
									 <td class="text-center"> 
									 <div class="btn btn-success"><span id="tile_{TS.no}{CS.stt}" style="font-weight: bold;">{tile}%</span></div>
									 <input {ROW.lock} id="ketqua_{TS.no}{CS.stt}" name="ketqua[]" value="{CS.kq}" type="hidden" class="dataValue form-control">
									</td>
									<!-- END: tile -->
									
								</tr>
								
							<!-- END: chiso -->	
						</table>	
						</form>		
						<!-- END: solan -->		
						
                </div>
           </div>
		
        <!-- Tooltips on textbox card end -->
    </div>
    </div>
	<script type="text/javascript">
$(function () {	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
$(function () {	$('#datetime1').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
$(function () {	$('#datetime2').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
$(function () {	$('#datetime3').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
$(function () {	$('#datetime4').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
</script>
<!-- END: main -->


			
			
			
			
			
			
			
			
			
			
			
			
			