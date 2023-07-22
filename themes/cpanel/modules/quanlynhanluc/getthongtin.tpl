<!-- BEGIN: thongtinchucvu -->
	<!-- BEGIN: row -->
				<option value="{r.id}" {r.select}>{r.name}</option>
	<!-- END: row -->
<!-- END: thongtinchucvu -->

<!-- BEGIN: thaotac -->
<td><button class="btn-sm btn-inverse btn-outline-inverse">
<i class="icofont icofont-exchange"></i></button>
</td>
<!-- END: thaotac -->
<!-- BEGIN: dscanbotochuc -->
<div class="card-header">
    <h5 style="text-transform: uppercase;">Danh sách cán bộ {tc.tentochuc}</h5>
</div>
<div class="card-block table-border-style">
    <div class="table-responsive">
        <table id="tbl_danhsach" class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã BV</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Chức vụ</th>                    
                    <th>Khoa/phòng</th>
					<th>Phân công</th>
					<th>Chức vụ phân công</th>
                    <th>Ngày phân công</th>

                </tr>
            </thead>
            <tbody>
			<!-- BEGIN: row -->
                <tr>
                    <th scope="row">{ROW.stt}</th>
                    <td>{ROW.maso_bv}</td>
                    <td>{ROW.hovaten}</td>
                    <td>{ROW.ngaysinh}</td>
                    <td>{ROW.chucvu}</td>
                    <td>{ROW.tenkhoa}</td>
                    <td>{ROW.tentc}</td>
                    <td>{ROW.tencv}</td>
                    <td>{ROW.tungay}</td>
                </tr>
            <!-- END: row -->
            </tbody>
        </table>
    </div>
</div>

{FILE "export.tpl"}

<!-- END: dscanbotochuc -->

<!-- BEGIN: get_notification -->
	<a href="#"> <i class="ti-bell"></i> <span class="badge bg-c-pink">{msg_new}</span> </a>
    <ul class="show-notification">
        <li>
            <h6>Tin nhắn của bạn</h6>
			<a href="{viewall}">
           <label class="label label-danger">Xem tất cả</label>
			</a>
        </li>
		<!-- BEGIN: loop -->
        <li>
            <div class="media">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 outer-ellipsis">
				<h1 class="d-flex align-self-center img-radius"><i class="ti-email"></i></h1></div>
                <div class="media-body">
					<h5 class="notification-user">{ROW.nguoigui}</h5>
                    <p class="notification-msg">{ROW.tieude}</p>
                    <span class="notification-time">Thời gian:{ROW.tg_nhan}</span>
                </div>
            </div>
        </li>
		<!-- END: loop -->
	</ul>
<!-- END: get_notification -->

<!-- BEGIN: chitietcanbo -->
	<div class="table-responsive" >
		<table class="table table-hover table-border">
		  
		<thead>
			<tr style="background-color: #2ed8b6;" >
				<th colspan="10" class="text-center">CHI TIẾT THÔNG TIN CÁN BỘ</th>
			</tr>
			<tr><th class="align-middle">Mã BV:</th><th class="align-middle">{ROW.maso_bv}</th></tr>
			<tr><th class='align-middle'>Họ tên:</th><th class='align-middle'>{ROW.hovaten}</th></tr>
			<tr><th class='align-middle'>Ngày sinh:</th><th class='align-middle'>{ROW.ngaysinh}</th></tr>
			<tr><th class='align-middle'>Giới tính:</th><th class='align-middle'>{ROW.gioitinh}</th></tr>
			<tr><th class='align-middle'>Địa chỉ:</th><th class='align-middle'>{ROW.diachi}</th></tr>
			<tr><th class='align-middle'>Điện thoại:</th><th class='align-middle'>{ROW.dienthoai}</th></tr>
			<tr><th class='align-middle'>Khoa/Phòng:</th><th class='align-middle'>{ROW.tenkhoa}</th></tr>
			<tr><th class='align-middle'>Chức vụ:</th><th class='align-middle'>{ROW.chucvu}</th></tr>
			<tr><th class='align-middle'>Số hiệu VC:</th><th class='align-middle'>{ROW.sohieu_vc}</th></tr>
			<tr><th class='align-middle'>Phân loại:</th><th class='align-middle'>{ROW.phanloai_cb}</th></tr>
			<tr><th class='align-middle'>Hình thức làm việc:</th><th class='align-middle'>{ROW.hinhthuclamviec}</th></tr>
		</thead>
		<tbody>
		
		</tbody>
		
		
	</table>
	</div>
<!-- END: chitietcanbo -->
<!-- BEGIN: dstaichinh -->
<style>
tr td input,textarea {height: 30px;width: 98%;}
</style>
<div class="card-header">
    <h5  style="text-transform: uppercase;">QUẢN LÝ TÀI CHÍNH {TC.tentochuc}</h5>
</div>
<div class="card-block table-border-style">
    <div class="table-responsive">
    <form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
        <input type="hidden" name="sta" id="sta" value="save_taichinh" />
        <input type="hidden" name="table" value="{table}" />
        <input type="hidden" name="token" value="{token}" />
        <table id="tbl_danhsach" style="width: 99%;" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="align-middle text-center " rowspan="2">STT</th>
                    <th class="align-middle text-center" rowspan="2">NGÀY GHI SỔ</th>
                    <th class="align-middle text-center" rowspan="2">DIỄN GIẢI</th>
                    <th class="align-middle text-center" colspan="2">CHI TIẾT SỐ TIỀN</th>
                    <th class="align-middle text-center" rowspan="2">NGƯỜI NỘP(CHI) TIỀN</th>
                    <th class="align-middle text-center" rowspan="2">Thao tác</th>
                </tr>
                <tr>
                    <th  class="align-middle text-center">THU</th>
                    <th  class="align-middle text-center">CHI</th>
                </tr>
            </thead>
            <tbody>
            <!-- BEGIN: admin -->
                <tr>
                    <th class="align-middle text-center">#</th>
                    <td><input id="datetime" name='ngayghi' type='text'></td>
                    <td>
                        <textarea name="diengiai" rows="1" cols="25"></textarea>
                    </td>
                    <td><input name='thu' onchange="checkValue($(this))" type='text' value="0"></td>
                    <td><input name='chi' onchange="checkValue($(this))" type='text' value="0"></td>
                    <td><input name='nguoinop' type='text' ></td>
                    <td class="align-middle text-center"><button type="submit" class="btn btn-mini btn-warning">
                        <i class="icofont icofont-location-arrow"></i><strong>Cập nhật</strong>
                    </button></td>
                </tr>
            <!-- END: admin -->
			<!-- BEGIN: row -->
                <tr>
                    <th class="align-middle text-center">{ROW.stt}</th>
                    <td class="align-middle text-center">{ROW.ngayghi}</td>
                    <td>{ROW.diengiai}</td>
                    <td class="align-middle text-right">{ROW.thu}</td>
                    <td class="align-middle text-right">{ROW.chi}</td>
                    <td>{ROW.nguoinop}</td>
                    <td><!-- BEGIN: admin -->
                        <a href="#" title="Xóa" onclick="update_item('{ROW.link_remove}','{ROW.token}')" class="btn btn-mini btn-danger btn-outline-danger">
                        <i class="ti-trash"></i>Xóa</a>
                        <!-- END: admin -->
                    </td>
                </tr>
            <!-- END: row -->
            </tbody>
            <tfoot>
                <tr style="background-color: #2ed8b6;">
                    <th colspan="7">TỔNG SỐ TIỀN CÒN LẠI: {ton} ĐỒNG.</th>
                </tr>
            </tfoot>
        </table>
    </form>
    </div>
</div>


<script type="text/javascript">
    $(function () {
        $('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());
        });
</script>
<!-- END: dstaichinh -->
{FILE "export.tpl"}