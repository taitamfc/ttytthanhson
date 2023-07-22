
<!-- BEGIN: edit_item -->
<link href="{THEME_URL}/css/select2.min.css" rel="stylesheet" />
<script src="{THEME_URL}/js/select2.min.js"></script>

<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frm(this);">
			<input type="hidden" name="sta" value="save_item" />
			<input type="hidden" name="token" value="{CHECKSESS}_{nam}_{ROW.id}" />
			<div class="table-responsive" style="padding-bottom: 100px;">
                    <table class="table table-hover" >
                        <tbody>
							<tr><th colspan="1" class="text-center">CẬP NHẬT THÔNG TIN CHỈ TIÊU</th></tr>
                            <tr> <th>Chỉ tiêu</th> </tr>
                            <tr> <td><textarea name=chi_so rows="2"  class="form-control">{ROW.chi_so}</textarea></td> </tr>
							<tr> <th>Thành tố</th> </tr>
                            <tr> <td>
							<select name="thanh_to" class="form-control" placeholder="" title="Thành tố" data-toggle="tooltip">
									<!-- BEGIN: thanh_to -->
									<option value="{r.id}" {r.select}>{r.name}</option>
									<!-- END: thanh_to -->
							</select>
							</td> 
							</tr>
							<tr> <th>Phạm vi áp dụng</th> </tr>
                            <tr> <td>
							<select name="pham_vi[]"  multiple="multiple" class="form-control phamvi" >
									
									<!-- BEGIN: pham_vi -->
									<option value="{r.id}" {r.select}>{r.name}</option>
									<!-- END: pham_vi -->
							</select>
							</td> 
							</tr>
							<tr> <th>Khoa/phòng cung cấp</th> </tr>
                            <tr> <td>
							<select name="list_khoacungcap[]"  multiple="multiple" class="form-control khoacungcap" >
									<!-- BEGIN: khoacungcap -->
									<option value="{r.id}" {r.select}>{r.name}</option>
									<!-- END: khoacungcap -->
							</select>
							</td> 
							</tr>
							<tr> <th>Thời gian cung cấp</th> </tr>
							<tr> <td>
							<select name="tansuatgui"  class="form-control" >
									<!-- BEGIN: tansuatgui -->
									<option value="{r.id}" {r.select}>{r.name}</option>
									<!-- END: tansuatgui -->
							</select>
							</td> 
							</tr>
							
							<tr> <td class="text-center"> 
							
								<button type="submit" class="btn btn-out-dashed btn-info btn-square"> 
								<i class="icofont icofont-check-circled"></i> Cập nhật</button>	
							
							
							
								<a href="{link_back}"><span type="text" class="btn btn-out-dotted btn-danger btn-square">Trở lại</span>	</a>
							
							
							</td> </tr>
							
                        </tbody>
                        
                    </table>
                </div>
		</form>
		
		<script>$(document).ready(function() { $('.phamvi,.khoacungcap').select2();});</script>
			{JS}
<!-- END: edit_item -->

<!-- BEGIN: content -->
<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frmnhucau(this);">
			<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
			<input type="hidden" name="sta" id="sta" value="{sta}" />
			<input type="hidden" name="id" id="id" value="{ROW.id}" />
			<div class="table-responsive" style="padding-bottom: 100px;">
                    <table class="table table-hover" >
                        <thead>
							<tr>
                                <th colspan="8" class="text-center">PHÂN BỐ CẬP NHẬT BỘ CHỈ TIÊU NĂM {namapdung}</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Chỉ tiêu</th>
                                <th>Thành tố</th>
                                <th>Phạm vi áp dụng</th>
                                <th>Khoa/phòng cung cấp</th>
                                <th>Thời gian cung cấp</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
						<!-- BEGIN: row -->
                            <tr >
                                <th scope="row">{ROW.stt}</th>
                                <td>
									<textarea name=chiso[] rows="2" cols="10" class="form-control" placeholder="Default textarea">{ROW.chi_so}</textarea>
								</td>
                                <td>
									<select name="thanh_to[]" class="form-control" placeholder="" title="Thành tố" data-toggle="tooltip">
											<!-- BEGIN: thanh_to -->
											<option value="{r.id}" {r.select}>{r.name}</option>
											<!-- END: thanh_to -->
									</select>
								</td>
                                <td><select name="pham_vi[]"  multiple="multiple" class="form-control phamvi" >
									<option value="0">Toàn viện</option>
									<!-- BEGIN: pham_vi -->
									<option value="{r.id}" {r.select}>{r.name}</option>
									<!-- END: pham_vi -->
									</select>
								</td>
                                <td><select name="list_khoacungcap[]"  multiple="multiple" class="form-control khoacungcap" >
									<option value="0">Toàn viện</option>
									<!-- BEGIN: khoacungcap -->
									<option value="{r.id}" {r.select}>{r.name}</option>
									<!-- END: khoacungcap -->
									</select></td>
                                <td>
								<select name="tansuatgui[]"  class="form-control" >
									<!-- BEGIN: tansuatgui -->
									<option value="{r.id}" {r.select}>{r.name}</option>
									<!-- END: tansuatgui -->
									</select>
									</td>
                                <td>Đang khởi tạo</td>                                
                                <td></td>                                
                            </tr>
                        <!-- END: row -->
                        </tbody>
                    </table>
                </div>
		</form>
<!-- END: content -->



<!-- BEGIN: main -->
<link href="{THEME_URL}/css/select2.min.css" rel="stylesheet" />
<script src="{THEME_URL}/js/select2.min.js"></script>

<!-- Page-header start -->
    <!-- Page-header end -->
	<div class="col-sm-12">
        <!-- Tooltips on textbox card start -->
        <div class="card">
            <div class="card-header">
                <h5 class="m-b-10"></h5>
            </div>			
			<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_frmnhucau(this);">
			<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
			<input type="hidden" name="sta" id="sta" value="{sta}" />
			<input type="hidden" name="id" id="id" value="{ROW.id}" />
			<div class="table-responsive" style="padding-bottom: 100px;">
                    <table class="table table-hover" >
                        <thead>
							<tr>
                                <th colspan="8" class="text-center">PHÂN BỐ CẬP NHẬT BỘ CHỈ TIÊU NĂM {namapdung}</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Chỉ tiêu</th>
                                <th>Thành tố</th>
                                <th>Phạm vi áp dụng</th>
                                <th>Khoa/phòng cung cấp</th>
                                <th>Thời gian cung cấp</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
						<!-- BEGIN: row -->
                            <tr >
                                <th scope="row">{ROW.stt}</th>
                                <td>
									{ROW.chi_so}
								</td>
                                <td>
									
								</td>                               <td>
								</td>
                                <td></td>
                                <td></td>
                                <td>Đã khởi tạo</td>                                
                                <td> 
								<div class="dropdown-success dropdown">
									<button class="btn btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Thao tác</button>
									<div class="dropdown-menu" aria-labelledby="dropdown-3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
										<a class="dropdown-item waves-light waves-effect" href="#"><i class="ti-pencil-alt"></i> Sửa</a>
										<a onclick="del_item('{ROW.link_del}','{ROW.token}')" class="dropdown-item waves-light waves-effect" href="#"><i class="ti-trash"></i> Xóa</a>
										<a class="dropdown-item waves-light waves-effect" href="#"><i class="ti-settings"></i> Cài đặt khác</a>
									</div>
								</div>
								</td>                                
                            </tr>
                        <!-- END: row -->
                        </tbody>
                    </table>
                </div>
		</form>
			
			
			
        <!-- Tooltips on textbox card end -->
    </div>
    </div>
	<script>$(document).ready(function() { $('.phamvi,.khoacungcap').select2();});</script>
	{JS}
<!-- END: main -->


			
			
			
			
			
			
			
			
			
			
			
			
			