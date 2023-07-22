<!-- BEGIN: chitiettailieu -->
<table id="chitiettailieu" class="table-data3 table table-hover table-border">
	<thead>
		<tr><th class="align-middle col-1" colspan="2">Tên tài liệu:</th></tr>
		<tr><td class='align-middle' colspan="2">
		{ROW.tentailieu} - <label class="label label-inverse-primary">{ROW.account}</label></td>
		</tr>
		<tr><th class="align-middle">Số hiệu:</th>
		<th class="align-middle">Loại văn bản:</th>
		</tr>
		<tr><td class='align-middle'>
		<div class="label-main"><label class="label label-inverse-primary">{ROW.sohieu}</label></div>
		</td>
		<td class='align-middle'>
		<div class="label-main"><label class="label label-inverse-primary">{ROW.loaivanban}</label></div>
		</td>
		</tr>
		
		<tr><th class="align-middle">Cơ quan ban hành:</th>
		<th class="align-middle">Ngày ban hành:</th>
		</tr>
		<tr><td class='align-middle'>{ROW.cq_banhanh}</td>
		<td class='align-middle'>
		<div class="label-main"><label class="label label-inverse-primary">{ROW.ngaybanhanh}</label></div>
		</td>
		</tr>
		
		<tr><th class="align-middle" colspan="2">Trích yếu:</td></th>
		<tr><td class='align-middle' colspan="2" style="white-space: pre-line;">{ROW.trichyeu}</td></tr>
		
		<tr><th class="align-middle">Hiệu lực:</th><th class="align-middle">Link lưu trữ:</th></tr>
		<tr>
		<td class='align-middle'>
		<div class="label-main"><label class="label label-inverse-primary">{ROW.hieuluc}</label></div>
		</td>
		<td class='align-middle'>			
			<div class="label-main">
			<a target="_blank" href="{ROW.link_file}" class="label label-inverse-danger">
			 Xem chi tiết tài liệu </a></div>		
		</td>
		</tr>
		<tr><td class="align-middle" colspan="2">
		<button id="close" class="btn bnt-mini btn-danger">
		<i class="fa fa-times" aria-hidden="true"></i>Đóng</button>
		</td></tr>
	</thead>
</table>
<script type="text/javascript">
	$("#close").click(function(){$("#chitiettailieu").fadeOut(500);});
</script>				
<!-- END: chitiettailieu -->

<!-- BEGIN: main -->
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>

	<div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>TÀI LIỆU ĐIỀU DƯỠNG</h5>
                        <span style="color: #ff0000;">Những tài liệu, văn bản lưu hành nội bộ toàn viện.</span>
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
						<div id='chitiet' class="table-responsive"></div>
                        <div class="table-responsive" style="padding-bottom: 100px;">
						<form name="myform" id="myform" method="post" action="{link_frm}">
							<table class="table-data3 table table-hover table-border">
							<thead>
								<tr>
									<th colspan="10" class="text-left">CÁC TÀI LIỆU ĐÃ ĐƯỢC BAN HÀNH</th>
								</tr>
								<tr style="background-color: #2ed8b6;">
									<th class="align-middle">#</th>
									<th class="align-middle">Tên tài liệu</th>		
									<th class="align-middle text-center">Số ký hiệu</th>
									<th class="align-middle text-center">Loại văn bản</th>
									<th class="align-middle text-center">Cơ quan ban hành</th>
									<th class="align-middle text-center">Ngày ban hành</th>
									<th class="align-middle text-center">Hiệu lực</th>
									<th class="align-middle text-center">Thao tác</th>
								</tr>
								<tr style="background-color: #fff;">
									<th class="align-middle">*</th>
									<th class="align-middle">
									<input name='tentailieu' value='{DATA.tentailieu}' type='text' class='form-control' >
									</th>		
									<th class="align-middle text-center">
									<input name='sohieu' value='{DATA.sohieu}' type='text' class='form-control' >
									</th>
									<th class="align-middle text-center">
									<select name="loaivanban" class="form-control" >
										<option value="0">Chọn loại văn bản</option>
										<!-- BEGIN: loaivanban -->
										<option value="{r.id}" {r.select}>{r.name}</option>
										<!-- END: loaivanban -->
									</select>
									</th>
									<th class="align-middle text-center">
									<input name='cq_banhanh' value='{DATA.cq_banhanh}' type='text' class='form-control' >
									</th>
									<th class="align-middle text-center">
									<input id='datetime' name='ngaybanhanh' value='{DATA.ngaybanhanh}' type='text' class='form-control' >
									</th>
									<th class="align-middle text-center">
									<select name="hieuluc" class="form-control" >
										<option value="0">Hiệu lực văn bản</option>
										<!-- BEGIN: hieuluc -->
										<option value="{r.id}" {r.select}>{r.name}</option>
										<!-- END: hieuluc -->
									</select>
									</th>
									<th class="align-middle text-center">
									<button type="submit" class="btn btn-success">
									<i class="ti-search"></i><strong>Tìm</strong></button>
									</th>
								</tr>
							</thead>
							</form>
							
							<tbody>
							<!-- BEGIN: row --> 
								<tr>
									<th class='text-center' scope="row">{ROW.stt}</th>									
									<th style="white-space: pre-line;"><a onclick="setValue('{ROW.link_view}','chitiet')" href="#">{ROW.tentailieu}</a></th>								
									<td class='text-center'>{ROW.sohieu}</td>																
									<td class='text-center'>{ROW.loaivanban}</td>	
									<td class='text-center'>{ROW.cq_banhanh}</td>	
									<td class='text-center'>{ROW.ngaybanhanh}</td>	
									<td class='text-center'>{ROW.hieuluc}</td>	
									<td class='text-center'>
									
									<a href="#" title="Xem chi tiết" onclick="setValue('{ROW.link_view}','chitiet')" class="btn btn-mini btn-success btn-outline-success">
									<i class="ti-eye"></i></a>
									<!-- BEGIN: edit -->
									<a href="{link_edit}" title="Sửa tài liệu" class="btn btn-mini btn-warning btn-outline-warning">
									<i class="ti-pencil"></i></a>
									<!-- END: edit -->
									<!-- BEGIN: delete -->
									<a href="#" title="Xóa tài liệu" onclick="del_item('{link_del}','{ROW.token}')" class="btn btn-mini btn-danger btn-outline-danger">
									<i class="ti-trash"></i></a>
									<!-- END: delete -->
									</td>	
								</tr>
							<!-- END: row -->
							</tbody>
							<tfoot>								
								<!-- BEGIN: generate_page -->
									<tr class="{ROW.color}">
										<td colspan="12" class="text-center">{GENERATE_PAGE}</td>
									</tr>
								<!-- END: generate_page -->
							</tfoot>
						</table>
						</div>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
		$(function () {	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});
</script>	
<!-- END: main -->