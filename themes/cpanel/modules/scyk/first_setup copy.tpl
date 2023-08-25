WAN LY SU CO Y KHOA
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




<head>



	<style>
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
			bottom: 0;
			width: 100%;
			padding: 2px;
			/*background-color: rgb(12, 44, 175); */
			display: block;
			justify-content: space-between;
		}

		.modal-footer-2 {
			position: fixed;
			bottom: 0;
			width: 100%;
			padding: 10px;
			/*background-color: rgb(62, 55, 150); */
			display: flexbox;

			justify-content: space-between;
		}
	</style>


	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
			var actions = $("table.test td:last-child").html();
			// Append table with add row form on add new button click
			$(".add-new").click(function() {
				//$(this).attr("disabled", "disabled");
				var index = $("table.test tbody tr:last-child").index();
				var row = '<tr>' +
					'<td><input type="text" class="form-control" name="name" id="name"></td>' +
					'<td><input type="text" class="form-control" name="position" id="positon"></td>' +
					'<td hidden><input type="text" class="form-control" name="id" id="id"></td>' +
					'<td><button onclick="save_data();"  class="btn btn-info savenew" title="Lưu" data-toggle="tooltip"><i class="fa fa-floppy-o" aria-hidden="true"></i></button></td>' +
					'<td><button   class="btn btn-danger delete" title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>' +
					'<td>' + actions + '</td>' +
					'</tr>';
				$("table.test").append(row);
				$("table.test tbody tr").eq(index + 1).find(".add, .edit").toggle();
				$('[data-toggle="tooltip"]').tooltip();
				//lock button add-new when on it
				$(this).attr("disabled", "disabled");
			});
			// Add row on add button click
			$(document).on("click", "table.test .add", function() {
				var empty = false;
				var input = $(this).parents("tr").find('input[type="text"]');
				input.each(function() {
					if (!$(this).val()) {
						$(this).addClass("error");
						empty = true;
					} else {
						$(this).removeClass("error");
					}
				});
				$(this).parents("tr").find(".error").first().focus();
				if (!empty) {
					input.each(function() {
						$(this).parent("td").html($(this).val());
					});
					$(this).parents("tr").find(".add, .edit").toggle();
					//$(".add-new").removeAttr("disabled");
				}
			});
			// Edit row on edit button click
			$(document).on("click", "td:has(table.test) .edit", function() {
				var $tr = $(this).closest("tr");
				$tr.find("td:not(:last-child)").each(function() {
					$(this).html('<input type="text" class="form-control" value="' + $(this).text()
						.trim() +
						'">');
				});
				$tr.find(".add, .edit").toggle();
				$(".add-new").attr("disabled", "disabled"); //disable button ad-new when on edit
				$(".edit").attr("disabled", "disabled"); //disable button edit other when on edit
				//$tr.find(".delete").hide(); // Hide delete button
				$tr.find(".edit").after(
					'<button  class="btn btn-info save" title="Lưu" data-toggle="tooltip"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>'
				); // Add save button
				$tr.find(".save").after(
					'<button  class="btn btn-danger delete" title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></button>'
				); // Add delete button
				//$tr.find(".edit").hide();// Hide edit button
				//$(this).attr("disabled", "disabled");
				$(".edit").hide();
			});

			// Delete row on delete button click
			$(document).on("click", "td:has(table.test) .delete", function() {
				var currentRow = $(this).closest("tr");

				var rowData = {
					"name": currentRow.find('td:eq(0) input').val(),
					"position": currentRow.find('td:eq(1) input').val(),
					"id": currentRow.find('td:eq(2) input').val()
				};
				$.ajax({
					type: "POST",
					url: "{link_frm}",
					data: { "deleteRow": rowData },
					success: function(response) {
						console.log("success:", response);
						//alert(response);
						currentRow.remove();
						location.reload();
						//$(".add-new").removeAttr("disabled");
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert("Error deleting row: " + errorThrown);
					}
				});
			});

			// save row on button click
			// 
			$(document).on("click", "td:has(table.test) .save", function() {
				var currentRow = $(this).closest("tr");

				var rowData = {
					"name": currentRow.find('td:eq(0) input').val(),
					"position": currentRow.find('td:eq(1) input').val(),
					"id": currentRow.find('td:eq(2) input').val()
				};
				$.ajax({
					type: "POST",
					url: "{link_frm}",
					data: { "saveRow": rowData },
					success: function(response) {
						//alert(response);
						//currentRow.remove();
						location.reload();
						//$(".add-new").removeAttr("disabled");
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert("Error deleting row: " + errorThrown);
					}
				});
			});

			// Reset form fields on modal close

			$('#close').on('click', function() {
				// Reset the form with id "test"
				window.location.reload();
			});



		});
	</script>



	<!-- function for save-data only use add new and save row-->
	<script>
		function save_data() {
			var tableData = [];
			var urlfrm = "{link_frm}";			
			$('table.test tr').each(function(row, tr) {
				if (row !== 0) {
					var rowData = {
						"name": $(tr).find('td:eq(0) input').val(),
						"position": $(tr).find('td:eq(1) input').val(),
						"id": $(tr).find('td:eq(2) input').val()
					};
					tableData = rowData;
				}
			});
			$.ajax({
				type: "POST",
				url: urlfrm,
				data: { "addRow": tableData },
				success: function(response) {
					console.log("success:", response);
					//alert(response);
					//$('#myform2')[0].reset();
					location.reload(); // reload the page
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert("Error saving data: " + errorThrown);
				}
			});
		}
	</script>





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
												<select name="id_khoaphong" class="form-control">
													<option value="1">BC Đã tiếp nhận</option>
													<option value="2">BC Chưa duyệt</option>
													<option value="3">BC Đã duyệt </option>
													<option value="4">BC Đang xử lý</option>
													<option value="5">BC Đã phản hồi</option>

												</select>
											</div>
										</th>
										<th>
											<div class="input-group">
												<span class="input-group-addon" id="txt_find"
													style="width: auto;min-width:120px;">Tìm theo tên:</span>
												<input name="txt_find" value="" type="text" class="form-control">
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
												<button type="submit" class="btn btn-success">
													<i
														class="icofont icofont-location-arrow"></i><strong>Tìm</strong></button>
											</div>
										</th>
									</tr>
								</thead>
							</table>
						
						<table id="tbl_danhsach" class="table table-hover">
							<thead>
								<tr>
									<th colspan="11" class="text-center">DANH SÁCH BÁO CÁO Y
										KHOA ĐÃ TIẾP NHẬN</th>
								</tr>
								<tr>
									<th>#</th>
									<th>Mã BC</th>
									<th>Khoa phòng</th>
									<th>Tóm tắt nội dung</th>
									<th>Ngày giờ BC</th>
									<th>Trạng thái</th>
									<th>Ghi chú</th>
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
									<td>{DSBC.note}</td>
									<td>
										<a style="color: #fff;" href="#" title="Xem /In"
											onclick="view_info('/index.php?language=vi&nv=quanlynhanluc&op=lichnghidieuduong&sta=quatrinhnghi&id=179',69);"
											class="btn btn-mini btn-success btn-round">
											<i class="fa fa-eye" aria-hidden="true"></i> </a>

										<a href="#" title="Sửa thông tin này"
											onclick="del_item('/index.php?language=vi&nv=quanlynhanluc&op=lichnghidieuduong&sta=deleteitem&token=69_14bfa6bb14875e45bba028a21ed38046','69')"
											class="btn btn-mini btn-warning">
											<i class="ti-printer"></i></a>


									</td>
								</tr>
								<!-- END: DSBC -->

							</tbody>

						</table>
						</form> <!-- end form1 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- end PScode -->


<div class="container demo">


	<div class="text-center">
		<button type="button" class="btn btn-info" data-toggle="modal" data-backdrop="static" data-keyboard="false"
			data-target="#mymodal">
			Xem /Sửa BC
		</button>

		<button type="button" class="btn btn-success" data-toggle="modal" data-backdrop="static" data-keyboard="false"
			data-target="#mymodal">
			Phản hồi báo cáo
		</button>
	</div>

	<!-- Modal -->
	<div class="modal left fade" id="mymodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-body">
					<div class="col-md-12 col-lg-6">
						<div class="card">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">THÔNG TIN BÁO CÁO SỰ
									CỐ {MABC}
								</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true">&times;</span></button>
							</div>

							<form name="nmyform2" id="myform2" action="" method="post" onsubmit="sendData(2);">
								<div class="card-block">
									<!-- BEGIN: NHOMCAUHOI -->
									<div class="header bg-success text-white p-2">
										{NHOMCAUHOI.stt}. {NHOMCAUHOI.tennhom}
									</div>
									<table id="mytable{NHOMCAUHOI.stt}" class="table table-hover" style="width:100%">

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
											<button type="button" class="btn btn-info">
												Sửa BC
											</button>
										</div>
										<div class="col-auto">
											<button type="button" class="btn btn-warning" data-toggle="modal"
												data-backdrop="static" data-keyboard="false" data-target="#mymodal2">
												Lưu BC
											</button>
										</div>

										<div class="col-auto">
											<button type="submit" id="idsubmit_btn" name="submit_bcsc" class="btn btn-danger"  onclick="sendData(2)">
												Duyệt BC
											</button>
										</div>
										

										<div class="col-auto">
											<button type="button" class="btn btn-danger" data-dismiss="modal">
												Đóng
											</button>
										</div>
									</div>
							</form> <!-- end form2 -->

						</div>

					</div>

				</div>

				<div class="col-md-12 col-lg-6">
					<div class="card">
						<div class="modal-header bg-primary">
							<h5 class="modal-title" id="exampleModalLabel">THÔNG TIN PHẢN HỒI BÁO CÁO SỰ
								CỐ {MABC}
							</h5>
						</div>

					</div>
					<form name="nmyform3" id="myform3" action="" method="post">

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
									<button type="button" class="btn btn-info" onclick="sendData(3)";>
										Phân tích BC
									</button>
								</div>
								<div class="col-auto">
									<button type="button" class="btn btn-warning" data-toggle="modal"
										data-backdrop="static" data-keyboard="false" data-target="#mymodal2">
										Phản hồi báo cáo
									</button>
								</div>
								<div class="col-auto">
									<button type="button" class="btn btn-danger" data-dismiss="modal">
										Đóng
									</button>
								</div>
							</div>
					</form> <!-- end form3 -->

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
<div class="modal fade modal-icon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="card borderless-card" style="margin-bottom: 0px;">
				<div class="card-block primary-breadcrumb">
					<div class="breadcrumb-header">
						<h5>THÔNG BÁO TỪ CHƯƠNG TRÌNH</h5>
					</div>
					<div class="page-header-breadcrumb"><span id="modal_body"></span> </div>
					<div class="card-header-right">
						<button type="button" class="btn btn-danger btn-sm btn-round" data-dismiss="modal"
							style="float:right">Đóng</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal end -->

<!-- JS -->
<script>
	//let url='{link_frm}';



	$(document).ready(function() {

		
		$("#tbl_danhsach").on("dblclick", "tr.vl", function() {
			const firstTdValue = $(this).find("td:eq(0)").text();
			//window.location.href='{link_frm}' + '&act=hienmodal&msbc=' + firstTdValue;

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

	// Reusable AJAX function
		function sendDataToPHP(formData, phpScriptUrl) {
			$.ajax({
				type: "POST",
				url: phpScriptUrl,
				data: formData,
				success: function(response) {
					// Handle the response from the server (if needed)
					console.log("Data sent successfully!"+formData);
					console.log("Data sent !"+response);
				},
				error: function(xhr, status, error) {
					// Handle errors (if any)
					console.error("Error occurred while sending data:", error);
				}
			});
		}
		// Function to handle the click event and send the form data
		function sendData(idfrm) {
			// Serialize the form data
			var formData = $("#myform"+idfrm).serialize();
			var link_frm ="{link_frm}"+"&check=update";
			//alert ('ok');

			// Call the reusable AJAX function
			sendDataToPHP(formData,
				link_frm); // Replace with the actual path to your PHP script
		}
		
		// Alert the 'msbc' value after the page loads



		
</script>








<!-- END: main -->