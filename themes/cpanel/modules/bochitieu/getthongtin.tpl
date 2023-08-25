<!-- BEGIN: editreport1 -->

<div class="card-header">
    <h5>CẬP NHẬT BÁO CÁO</h5>
</div>
<div class="card-block table-border-style">
    <div class="table-responsive">
        <table class="table table-bordered border-primary">
			<tbody>
			<tr>
				<td class=""><h5>V. TỰ ĐÁNH GIÁ VỀ CÁC ƯU ĐIỂM CHẤT LƯỢNG BỆNH VIỆN</h5></td>
			</tr>
			<tr>
				<td class="phanhang" style="color:#000">{COM.content_v}</td>
			</tr>

			<tr>
				<td class=""><h5>VI. TỰ ĐÁNH GIÁ VỀ CÁC NHƯỢC ĐIỂM, VẤN ĐỀ TỒN TẠI </h5></td>
			</tr>
			<tr>
				<td class="phanhang"  style="color:#000">{COM.content_vi}</td>
			</tr>

			<tr>
				<td class=""><h5>VII. XÁC ĐỊNH CÁC VẤN ĐỀ ƯU TIÊN CẢI TIẾN CHẤT LƯỢNG </h5></td>
			</tr>

			<tr>
				<td class="phanhang"  style="color:#000">{COM.content_vii}</td>
			</tr>

			<tr>
				<td class=""><h5>VIII. GIẢI PHÁP, LỘ TRÌNH, THỜI GIAN CẢI TIẾN CHẤT LƯỢNG</h5></td>
			</tr>
			<tr>
				<td class="phanhang"  style="color:#000">{COM.content_viii}</td>
			</tr>

			<tr>
				<td><h5>IX. KẾT LUẬN, CAM KẾT CỦA BỆNH VIỆN CẢI TIẾN CHẤT LƯỢNG</h5></td>
			</tr>
			<tr>
				<td class="phanhang"  style="color:#000">{COM.content_ix}</td>
			</tr>
			</tbody>
			</table>
    </div>
</div>

<!-- END: editreport1 -->


<!-- BEGIN: tkbangchung -->
<div class="card-header">
    <h5>Danh sách file</h5>
</div>
<div class="card-block table-border-style">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên File</th>
                    <th>Liên kết</th>
                    <th>Thời gian</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
			<!-- BEGIN: row -->
                <tr>
                    <th scope="row">{ROW.stt}</th>
                    <td>{ROW.file_name}</td>                    
                    <td><a href="{ROW.url_file}">Link file</a></td>
					<td>{ROW.ngaygio}</td>
                    <td>
					<label onclick="view_detail('{ROW.url_file}');" 
					title="Xem chi tiết" class="btn btn-success btn-mini waves-effect waves-light "> <i class="icofont icofont-eye-alt"></i> </label>
					
					</td>
                </tr>
            <!-- END: row -->
            </tbody>
        </table>
    </div>
</div>
<!-- Modal start -->
<div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialogdetail modal-lg" role="document">
        <div class="modal-content">
		<div class="modal-header" style="background-color: #b2f3fd;">
			<div style="width:90%; float:left">
				<div class="breadcrumb-header"><strong>CHI TIẾT ĐÍNH KÈM</strong></div>
			</div>
			<div style="width:10%; float:right">
			<div class="card-header-right" style="float:right">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" >
					Đóng</button>
			</div>
			</div>
			
		 </div>
		<div class="card borderless-card" style="margin-bottom: 0px;">
			<div id="modal_body" class="card-block" style="background-repeat: no-repeat;  min-height: 500px;min-width: 50%;">                
                <div class="page-header-breadcrumb">
				<div id="modal_bodydetail"></div> 
				
				</div>
			   
            </div>
		</div>
		
        </div>
		
    </div>
</div>
<!-- Modal end -->

<script type="text/javascript">
function view_detail(tb='',t='') {
		var body=document.getElementById("modal_body");
		var detail=document.getElementById("modal_bodydetail");
		var h=screen.height-100;
		//body.setAttribute("style","height:"+h+"px");
		//body.style.backgroundImage = "url('"+tb+"')"; 
		//var elem = document.createElement("img");elem.setAttribute("src", tb);
		//document.getElementById("modal_bodydetail").appendChild("elem");
          $('.modal-detail').modal({ keyboard: false,show: true});
		  detail.innerHTML = '<img width="100%" height="100%" src="'+tb+'">';
		  //$('#modal_bodydetail').html(tb);
		  $('.modal-dialogdetail').draggable({handle: ".modal-header"});
	return !1;
}
</script>
<!-- END: tkbangchung -->


<!-- BEGIN: dsdinhkem -->
<div class="card-header">
    <h5>Danh sách file</h5>
</div>
<div class="card-block table-border-style">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên File</th>
                    <th>Liên kết</th>
                    <th>Thời gian</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
			<!-- BEGIN: row -->
                <tr>
                    <th scope="row">{ROW.stt}</th>
                    <td>{ROW.file_name}</td>                    
                    <td><a href="{ROW.url_file}">Link file</a></td>
					<td>{ROW.ngaygio}</td>
                    <td>
					<label onclick="view_detail('{ROW.url_file}');" 
					title="Xem chi tiết" class="btn btn-success btn-mini waves-effect waves-light "> <i class="icofont icofont-eye-alt"></i> </label>
					<label onclick="del_item('{ROW.url_del}');" title="Xóa đính kèm" class="btn btn-danger btn-mini waves-effect waves-light "> 
					<i class="icofont icofont-trash"></i> </label>
					</td>
                </tr>
            <!-- END: row -->
            </tbody>
        </table>
    </div>
</div>
<!-- Modal start -->
<div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialogdetail modal-lg" role="document">
        <div class="modal-content">
		<div class="modal-header" style="background-color: #b2f3fd;">
			<div style="width:90%; float:left">
				<div class="breadcrumb-header"><strong>CHI TIẾT ĐÍNH KÈM</strong></div>
			</div>
			<div style="width:10%; float:right">
			<div class="card-header-right" style="float:right">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" >
					Đóng</button>
			</div>
			</div>
			
		 </div>
		<div class="card borderless-card" style="margin-bottom: 0px;">
			<div id="modal_body" class="card-block" style="background-repeat: no-repeat;  min-height: 500px;min-width: 50%;">                
                <div class="page-header-breadcrumb">
				<div id="modal_bodydetail"></div> 
				
				</div>
			   
            </div>
		</div>
		
        </div>
		
    </div>
</div>
<!-- Modal end -->

<script type="text/javascript">
function view_detail(tb='',t='') {
		var body=document.getElementById("modal_body");
		var detail=document.getElementById("modal_bodydetail");
		var h=screen.height-100;
		//body.setAttribute("style","height:"+h+"px");
		//body.style.backgroundImage = "url('"+tb+"')"; 
		//var elem = document.createElement("img");elem.setAttribute("src", tb);
		//document.getElementById("modal_bodydetail").appendChild("elem");
          $('.modal-detail').modal({ keyboard: false,show: true});
		  detail.innerHTML = '<img width="100%" height="100%" src="'+tb+'">';
		  //$('#modal_bodydetail').html(tb);
		  $('.modal-dialogdetail').draggable({handle: ".modal-header"});
	return !1;
}
</script>
<!-- END: dsdinhkem -->

<iframe height="100%" width="100%" class="responsive" src="https://docs.google.com/gview?url=http://localhost:88/ttytthanhson/uploads/bochitieu/202306_1_A1.1_23JulJul080205.doc 	&embedded=true" >
</iframe>

<!-- BEGIN: dscanbotochuc -->

<div class="card-header">
    <h5>Danh sách cán bộ {tc.tentochuc}</h5>
</div>
<div class="card-block table-border-style">
    <div class="table-responsive">
        <table class="table table-hover">
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
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
			<!-- BEGIN: row -->
                <tr>
                    <th scope="row">{ROW.stt}</th>
                    <td>{ROW.mabv}</td>
                    <td>{ROW.hoten}</td>
                    <td>{ROW.ngaysinh}</td>
                    <td>{ROW.chucvu}</td>
                    <td>{ROW.tenkhoa}</td>
                    <td>{ROW.noidung}</td>
                    <td>{ROW.chucvuphancong}</td>
                    <td>{ROW.ngaybatdau}</td>
                    <td><button class="btn-sm btn-inverse btn-outline-inverse"><i class="icofont icofont-exchange"></i></button></td>
                </tr>
            <!-- END: row -->
            </tbody>
        </table>
    </div>
</div>

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

