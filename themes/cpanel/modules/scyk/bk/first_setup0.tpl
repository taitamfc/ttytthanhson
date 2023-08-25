WAN LY SU CO Y KHOA

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<script type="text/javascript"
	src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js">
</script>

<link rel="stylesheet" type="text/css"
	href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<!-- BEGIN: main -->

<!--        https://cdnjs.com/libraries/moment.js/-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


<!--        https://cdnjs.com/libraries/bootstrap-datetimepicker-->

<link type="text/css" rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
</script>


<link href="{THEME_URL}/css/select2.min.css" rel="stylesheet" />
<script src="{THEME_URL}/js/select2.min.js"></script>
<script type="text/javascript" src="{THEME_URL}/assets/pages/accordion/accordion.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js">
</script>
<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js">
</script>
<script src="{BASE_URL}assets/js/language/jquery.ui.datepicker-vi.js"></script>


<script type="text/javascript"
	src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js">
</script>

<link rel="stylesheet" type="text/css"
	href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>




<head>



	<style>
		.form-check-label {
			white-space: pre-wrap;
		}

		.form-label {
			white-space: pre-wrap;
		}

		textarea {

			resize: none;
			border-style: none;
			font-size: 14px;
			font-weight: bold;
			border-color: Transparent;
			overflow: auto;
		}

		.badge:hover {
			background-color: yellow;
			cursor: pointer;
		}

		.form-check {
			display: inline-flex;
			align-items: center;
			/* Optional: Align items vertically in the container */
			margin-right: 15px;
			/* Optional: Add space between multiple inline items */
		}

		.form-check-label {
			margin-left: 10px;
			/* Adjust the value as needed to set the desired space */
		}

		input[type="radio"] {
			/* remove standard background appearance */

			/* create custom radiobutton appearance */
			display: inline-block;
			width: 25px;
			height: 25px;
			padding: 30px;
			margin-right: 15px;
		}

		input[type="checkbox"] {
			/* remove standard background appearance */

			/* create custom radiobutton appearance */
			display: inline-block;
			width: 25px;
			height: 25px;
			margin-right: 15px;
		}
	</style>

	<style>
		.modal.left .modal-dialog,
		.modal.right .modal-dialog {
			position: fixed;
			margin: auto;
			min-width: 100%;
			height: 100%;
			-webkit-transform: translate3d(0%, 0, 0);
			-ms-transform: translate3d(0%, 0, 0);
			-o-transform: translate3d(0%, 0, 0);
			transform: translate3d(0%, 0, 0);
		}

		.modal.left .modal-content,
		.modal.right .modal-content {
			height: 100%;
			overflow-y: auto;
		}

		.modal.left .modal-body,
		.modal.right .modal-body {

			padding: 15px 15px 80px;
		}

		/*Left*/
		.modal.left.fade .modal-dialog {
			left: -320px;
			-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
			-moz-transition: opacity 0.3s linear, left 0.3s ease-out;
			-o-transition: opacity 0.3s linear, left 0.3s ease-out;
			transition: opacity 0.3s linear, left 0.3s ease-out;
		}

		.modal.left.fade.in .modal-dialog {
			left: 0;
		}

		/*Right*/
		.modal.right.fade .modal-dialog {
			right: -320px;
			-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
			-moz-transition: opacity 0.3s linear, right 0.3s ease-out;
			-o-transition: opacity 0.3s linear, right 0.3s ease-out;
			transition: opacity 0.3s linear, right 0.3s ease-out;
		}

		.modal.right.fade.in .modal-dialog {
			right: 0;
		}

		/* ----- MODAL STYLE ----- */
		.modal-content {
			border-radius: 0;
			border: 10px;

		}

		.modal-header {
			background-color: #11be28;
			padding: 5px 5px;
			color: #FFF;
			border-bottom: 2px dashed #337AB7;
		}

		

		/* ----- v CAN BE DELETED v ----- */
		body {
			background-color: #78909C;
		}

		.demo {
			padding-top: 60px;
			padding-bottom: 110px;
		}

		.btn-demo {
			margin: 15px;
			padding: 10px 15px;
			border-radius: 0;
			font-size: 16px;
			background-color: #FFFFFF;
		}

		.btn-demo:focus {
			outline: 0;
		}

		.modal-footer-1 {
			position: fixed;
			bottom: 2px;;
			width: 46%;
			padding: 2px;
			/*background-color: rgb(12, 44, 175); */
			/*background-color: green;*/
			display: block;
			justify-content: space-between;			
			border-top: 2px solid  green;
			border-bottom: 2px solid green;
			border-left: 2px solid green;
			border-right: 2px solid green;
		}

		.modal-footer-2 {
			position: fixed;
			bottom: 2px;
			width: 46%;
			padding: 2px;
			/*background-color: blueviolet;*/
			display: flexbox;
			justify-content: space-between;
			border-top: 2px solid  blue;
			border-bottom: 2px solid blue;
			border-left: 2px solid  blue;
			border-right: 2px solid  blue;
		}

		
	</style>


	



	<!-- function for save-data only use add new and save row-->
	





</head>




<style>
	.count a {
		border-radius: 50%;
	}

	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: rgba(42, 36, 188, 0.581);
		border: none;
	}
</style>


<!-- Accordion js -->

<div class="pcoded-inner-content">
	<div class="main-body">
		<!-- Page-header start -->
		<!-- Page-header end -->


		<div class="col-sm-12">


			<div class="card">
				<div class="card-header">
					<div class="label-main">
						<label class="label label-inverse-primary"><strong>Quản lý báo cáo sự cố y khoa</strong></label>
					</div>
					<h5></h5>
					<span></span>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-chevron-left"></i></li>
							<li><i class="fa fa-window-maximize full-card"></i></li>
							<li><i class="fa fa-minus minimize-card"></i></li>
							<li><i class="fa fa-refresh reload-card"></i></li>
						</ul>
					</div>
				</div>

				<div class="card-block">
					<div class="table-responsive" style="padding-bottom: 100px;">
						<form name="nmyform1" id="myform1" method="post" action="">
							<input type="hidden" name="sta" id="sta" value="find_item" />
							<table class="table table-hover">
								<thead>
									<tr>
										<th>
											<div class="input-group" style="width: auto;min-width:150px;">
												<select name="id_dsbc" class="form-control"
													onchange="filter_dsbc(this)">
													<!-- BEGIN: LOAIBC -->
													<option value="{LOAIBC.value}" {LOAIBC.check}>BC {LOAIBC.trangthai}
													</option>
													<!-- END: LOAIBC -->

												</select>
											</div>
										</th>

										<th>
											<div class="input-group">
												<span class="input-group-addon" id="tg_tungay"
													style="width: auto;min-width:120px;">Từ ngày:</span>
												<input id="datetime1" name="tg_tungay" value="" type="text"
													class="form-control">
											</div>
										</th>
										<th>
											<div class="input-group">
												<span class="input-group-addon" id="tg_denngay"
													style="width: auto;min-width:120px;">Đến ngày:</span>
												<input id="datetime2" name="tg_denngay" value="" type="text"
													class="form-control">
											</div>
										</th>
										<th>
											<div class="input-group">
												<button type="submit" class="btn btn-success" id="idfind"
													name="btn_find">
													<i
														class="icofont icofont-location-arrow"></i><strong>Tìm</strong></button>
											</div>
										</th>
									</tr>
								</thead>
							</table>
						</form> <!-- end form1 -->

						<table id="tbl_danhsach" class="table table-hover">
							<thead>
								<tr>
									<th colspan="11" class="text-center bg-info">DANH SÁCH BÁO CÁO Y
										KHOA {TENBC} </th>
								</tr>
								<tr>
									<th>#</th>
									<th>Mã BC</th>
									<th>Khoa phòng</th>
									<th>Tóm tắt nội dung</th>
									<th>Ngày giờ BC</th>
									<th>Trạng thái</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								<!-- BEGIN: DSBC -->
								<tr class="vl">
									<th>{DSBC.stt}</th>
									<td>{DSBC.masobc}</td>
									<td>{DSBC.khoaphong}</td>
									<td>{DSBC.tomtatnd}</td>
									<td>{DSBC.ngaygio}</td>
									<td>{DSBC.trangthai}</td>
									<td>
										<a style="color: #fff;" href="#" title="Xem /In BC"
											onclick="view_info('/index.php?language=vi&nv=quanlynhanluc&op=lichnghidieuduong&sta=quatrinhnghi&id=179',69);"
											class="btn btn-mini btn-success btn-round">
											<i class="fa fa-eye" aria-hidden="true"></i> </a>

										<a style="color: #fff;" href="#" title="Xem /In PHBC"
											onclick="view_info('/index.php?language=vi&nv=quanlynhanluc&op=lichnghidieuduong&sta=quatrinhnghi&id=179',69);"
											class="btn btn-mini btn-warning btn-round">
											<i class="fa fa-eye" aria-hidden="true"></i> </a>

										<a href="#" title="Sửa thông tin này"
											onclick="del_item('/index.php?language=vi&nv=quanlynhanluc&op=lichnghidieuduong&sta=deleteitem&token=69_14bfa6bb14875e45bba028a21ed38046','69')"
											class="btn btn-mini btn-primary">
											<i class="fa fa-config"></i></a>


									</td>
								</tr>
								<!-- END: DSBC -->

							</tbody>

						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- end PScode -->


<div class="container demo">


	
	<!-- Modal -->
	<div class="modal left fade" id="mymodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-body">
					<div class="col-md-12 col-lg-6 ">

						<div class="card">
							<div id="bieumau1">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">THÔNG TIN BÁO CÁO SỰ
										CỐ {MABC}
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
											aria-hidden="true">&times;</span></button>
								</div>

								<form name="nmyform2" id="myform2" action="#" method="post"
									onsubmit="frm_submit(this);">

									<input type="hidden" name="sta2" id="id_sta2" value="bcsc">

									<div class="card-block">
										<!-- BEGIN: NHOMCAUHOI -->
										<div class="header bg-success text-white p-2">
											{NHOMCAUHOI.stt}. {NHOMCAUHOI.tennhom}
										</div>
										<table id="mytable{NHOMCAUHOI.stt}" class="table table-hover"
											style="width:100%;{NHOMCAUHOI.testdisplay}">

											<tbody>

												<!-- BEGIN: CAUHOI-->
												<tr>

													{CAUHOI.td1}

													{CAUHOI.form_control}

													{CAUHOI.td2}


												</tr>
												<!-- END: CAUHOI -->
											</tbody>

										</table>
										<!-- END: NHOMCAUHOI -->

									</div>

									

									<div class="modal-footer-1">

										<div class="row ">

										<div class="col-auto">
												<button type="button"  
													class="btn btn-info" onclick=printDiv('bieumau1');>
													Xem/In BC
												</button>
											</div>


											<div class="col-auto">
												<button type="submit" id="idsubmit_btn" name="submit_bcsc" {TRANGTHAI2}
													class="btn btn-success">
													Duyệt BC
												</button>
											</div>


											<div class="col-auto">
												<button type="button" class="btn btn-danger" data-dismiss="modal"
													onclick="window.location.href='{link_frm}'">
													Đóng
												</button>
											</div>
										</div>
								</form> <!-- end form2 -->

							</div> <!-- end bieumau1 -->
						</div>
					</div>

				</div>

				<div class="col-md-12 col-lg-6">
					<div class="card">
						<div id="bieumau2">
							<div class="modal-header bg-primary">
								<h5 class="modal-title" id="exampleModalLabel">THÔNG TIN PHẢN HỒI BÁO CÁO SỰ
									CỐ {MABC}
								</h5>
							</div>


							<form name="nmyform3" id="myform3" action="#" method="post" onsubmit="frm_submit(this);">

								<input type="hidden" name="sta3" id="id_sta3" value="ptsc">

								<div class="card-block">
									<!-- BEGIN: NHOMCAUHOI2 -->
									<table id="mytable2" class="table table-hover" style="width:100%">

										<tr>
											<th class="bg-info text-white p-2">
												{NHOMCAUHOI2.stt}. {NHOMCAUHOI2.tennhom}
											</th>
										</tr>
										<!-- BEGIN: CAUHOI2-->
										<tr>

											{CAUHOI2.td1}

											{CAUHOI2.form_control}

											{CAUHOI2.td2}


										</tr>
										<!-- END: CAUHOI2 -->

									</table>
									<!-- END: NHOMCAUHOI2 -->

								</div>

								<div class="modal-footer-2 ">

									<div class="row ">

									<div class="col-auto">
											<button type="submit" class="btn btn-primary" onclick="printDiv('bieumau2');">
												Xem/In BC
											</button>
										</div>
									
										<div class="col-auto">
											<button type="submit" class="btn btn-info" id="id_ptsc" name="btn_ptsc">
												Phân tích BC
											</button>
										</div>
										<div class="col-auto">
											<button type="button" class="btn btn-warning" data-toggle="modal"
												data-backdrop="static" data-keyboard="false" data-target="#modal-tb">
												Phản hồi báo cáo
											</button>
										</div>
										<div class="col-auto">
											<button type="button" class="btn btn-danger" data-dismiss="modal"
												onclick="window.location.href='{link_frm}'">
												Đóng
											</button>
										</div>

							</form> <!-- end form3 -->
						</div><!-- end bieumau2-->
					</div>
				</div>
				</form>
			</div>

		</div>



	</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->


</div><!-- container -->



<!-- Modal start -->

<!-- Modal -->
<div class="modal fade" id="modal-tb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h5 class="modal-title" id="exampleModalLabel">PHẢN HỒI BÁO CÁO MÃ SỐ : {MABC}</h5>

			</div>
			<div class="modal-body">
				<form name="nmyform4" id="myform4" action="#" method="post" onsubmit="frm_submit(this);">

					<input type="hidden" name="sta4" id="id_sta4" value="phsc">


					<h5> Gửi cho khoa/phòng </h5>
					<select id="multiple" name="department[]" class="js-states form-control" multiple>
						<!-- BEGIN:  department -->
						<option {department.selected}="{department.selected}" value="{department.account}">
							{department.tenkhoa}"
						</option>
						<!-- END:  department -->

					</select>




			</div>


			<div class="modal-footer ">

				<div class="card-header-right">

					<button type="submit" class="btn btn-out-dashed btn-info btn-square" id="id_phsc" name="btn_phsc">
						<i class="icofont icofont-check-circled"></i> Gửi</button>


					<button type="button" class="btn btn-out-dashed btn-danger btn-square" data-dismiss="modal">
						Đóng
					</button>

				</div>
				</form>
				<!--end form4 -->
			</div>

		</div>
	</div>
</div>
</div> <!-- end modal -->


< <!-- Modal end -->

	<script>
		$(function() {

			/* setting date */
			$("#datetime1").datetimepicker({
				format: "DD-MM-YYYY"
			});

			/* setting time */
			$("#datetime2").datetimepicker({
				format: "DD-MM-YYYY"
				/* setting datetime */

			});

		});

		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}

	</script>

	<script>
		function filter_dsbc(a) {
			var url = '{link_frm}';
			var vl1 = (a.value || a.options[a.selectedIndex].value); //crossbrowser solution =)
			//vl2= document.getElementById("txt_count").value;
			//alert(vl1);
			window.location = url + '&idd=' + vl1;
		}
	</script>


	<!-- JS -->
	<script type="text/javascript">
		function frm_submit(a) {

			if (confirm("Bạn có chắc chắn thực hiện hành động này ?")) {
				a.preventDefault(); // phải có lệnh này mới cho submit vào form và hiển thị debug từ php, không reload page

				var c = [];
				c.type = $(a).prop("method");
				c.url = $(a).prop("action");
				c.data = $(a).serialize();
				$(a).find("input,button,select,textarea, a").removeClass("has-error");
				$(a).find("input,button,select,textarea, a").prop("disabled", !0);
				alert(c.url);
				modal('Chúc mừng bạn đã thực hiện thành công');
				//window.location.reload();
				$.ajax({
						url: c.url,
						data: c.data,
						type: c.type,
						dataType: 'json',
						success: function(result) {
							//a.preventDefault(); // phải có lệnh này mới cho submit vào form
							//alert('Data send ok' + c.data);
							console.log(result);
							if (result.status == "OK") setTimeout(function()
									{ window.location = result.url }, 2000);// setTimeout(function () {window.location =result.url},2000);//window.location =result.url;location.reload();//
									//modal(result.mess); $(a).find("input,button,select,textarea, a").prop("disabled",!1);
								},
								error: function(xhr, status, error) {
									// Handle errors (if any)
									console.error("Error occurred while sending data:", error);
								}


						});

				}
				else {
					a.preventDefault();

				}
				return !1;
			}
	</script>


	<script>
		$(document).ready(function() {

			$('#tbl_danhsach').DataTable({
					dom: '<"top"B>rt<"bottom"flp><"clear">',
					searching: false,
					paging: true,
					info: false,
					aLengthMenu: [
						[25, 50, 100, 200, -1],
						[25, 50, 100, 200, "Tất cả"]
					],
					language: {"lengthMenu": "Hiển thị  _MENU_  dòng/trang","paginate": {"next": "Trang sau","previous": "Trang trước"}},
					buttons: [{extend: 'print',title:'DS BÁO CÁO '+'{TENBC}', text: '<i class="fa fa-print"></i> In',className: 'btn btn-success',exportOptions: {modifier: {page: 'current'}}},
					{extend: 'excelHtml5',title:'DS BÁO CÁO '+'{TENBC}', text: '<i class="fa fa-file-excel-o"></i> EXCEL',className: 'btn btn-warning',exportOptions: {modifier: {page: 'current'}}},
					{extend: 'pdfHtml5',title:'DS BÁO CÁO '+'{TENBC}', text: '<i class="fa fa-file-pdf-o" ></i> Xuất PDF',className: 'btn  btn-danger',exportOptions: {modifier: {page: 'current'}}}

				]
			});
		});
	</script>

	<script>
		//let url='{link_frm}';



		$(document).ready(function() {


			$("#tbl_danhsach").on("dblclick", "tr.vl", function() {
				const firstTdValue = $(this).find("td:eq(0)").text();
				window.location.href='{link_frm}' + '&act=hienmodal&msbc=' + firstTdValue;

			});

			// Function to fetch updated data and update the modal content
			function getParameterValue(paramName) {
				var urlParams = new URLSearchParams(window.location.search);
				return urlParams.get(paramName);
			}

			// Get the value of 'msbc' from the current URL
			var msbcValue = getParameterValue("msbc");

			// Check if 'msbcValue' is null
			if (msbcValue === null) {

			} else {
				$("#mymodal").modal("show");

				//alert(msbcValue);
			}

		});
	</script>



	<script>
		$("#multiple").select2({
			placeholder: "Chọn Khoa Phòng",
			allowClear: true
		});
	</script>




<!-- END: main -->