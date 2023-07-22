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
                        <h5>{TITLE} TÀI LIỆU ĐIỀU DƯỠNG</h5>
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
                        <div class="table-responsive" style="padding-bottom: 100px;">
						<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
						<input type="hidden" name="sta" id="sta" value="luu_vanban" />
						<input type="hidden" name="token" value="{token}" />
							<table class="table table-hover table-border">
							<thead>
								<tr><th class="align-middle" colspan="2">Tên tài liệu:</th></tr>
								<tr><td class='align-middle' colspan="2"><input name='tentailieu' value='{DATA.tentailieu}' type='text' class='form-control' ></td></tr>
								<tr><th class="align-middle">Số hiệu:</th>
								<th class="align-middle">Loại văn bản:</th>
								</tr>
								<tr><td class='align-middle'><input name='sohieu' value='{DATA.sohieu}' type='text' class='form-control' ></td>
								<td class='align-middle'>
								<select name="loaivanban" class="form-control" >
									<option value="0">Chọn loại văn bản</option>
									<!-- BEGIN: loaivanban -->
									<option value="{r.id}" {r.select}>{r.name}</option>
									<!-- END: loaivanban -->
								</select>
								</td>
								</tr>
								
								<tr><th class="align-middle">Cơ quan ban hành:</th>
								<th class="align-middle">Ngày ban hành:</th>
								</tr>
								<tr><td class='align-middle'>
								<input name='cq_banhanh' value='{DATA.cq_banhanh}' type='text' class='form-control' ></td>
								<td class='align-middle'>
								<input id="datetime" name='ngaybanhanh' value='{DATA.ngaybanhanh}' type='text' class='form-control' ></td></tr>
								
								<tr><th class="align-middle" colspan="2">Trích yếu:</td></th>
								<tr><td class='align-middle' colspan="2">
								<textarea name="trichyeu" rows="5" cols="25" class="form-control form-control-success">{DATA.trichyeu}</textarea>
								</td></tr>
								
								<tr><th class="align-middle">Hiệu lực:</th><th class="align-middle">Link lưu trữ:</th></tr>
								<tr>
								<td class='align-middle'>
								<select name="hieuluc" class="form-control" >
									<!-- BEGIN: hieuluc -->
									<option value="{r.id}" {r.select}>{r.name}</option>
									<!-- END: hieuluc -->
								</select>
								</td>
								<td class='align-middle'>
								<input name='link_file' value='{DATA.link_file}' type='text' class='form-control' ></td>
								</tr>
								<tr><td class="align-middle" colspan="2">
								<button type="submit" class="btn btn-success">
									<i class="ti-save"></i><strong>Lưu văn bản</strong></button>
								<a href="{link_close}" class="btn bnt-mini btn-danger">
								<i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
								</td></tr>
							</thead>
						</table>
					</form>
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
