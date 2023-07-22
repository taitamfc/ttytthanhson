<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/AdminLTE.min.css">

<!-- BEGIN: main -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js">
</script>

<script type="text/javascript" src="{THEME_URL}/assets/pages/accordion/accordion.js"></script>


<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>

<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js">
</script>

<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />

<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/font-awesome.min.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/ionicons.min.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/morris.css">



<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/_all-skins.min.css">



<head>
	<style>
		.badge:hover {
			background-color: yellow;
			cursor: pointer;
		}

		.modal-dialog {
			margin top: 200px;
			top: 100px;
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
<script type="text/javascript" src="{THEME_URL}/assets/pages/accordion/accordion.js"></script>
<div class="pcoded-inner-content">
	<div class="main-body">
		<!-- Page-header start -->
		<!-- Page-header end -->
		<div class="col-sm-12">
			<!-- Tooltips on textbox card start -->
			<div class="card">
				<div class="card-header">
					<h5 class="m-b-10">KHỞI TẠO CÁC BIỂU MẪU ĐÁNH GIÁ THEO NĂM</h5>

				</div>
				<!-- <form name="frm_setup" id="id_frm_setup" method="post" action="{link_frm}">       -->
				<form name="myform" id="myform" method="post" action="{link_frm}"
					onsubmit="return nv_execute_frm(this);">
					<input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
					<input type="hidden" name="sta" id="sta" value="{sta}" />
					<input type="hidden" name="id" id="id" value="{ROW.id}" />
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<th scope="row">
										<div class="input-group">
											<span class="input-group-addon" id="nam"
												style="width: auto;min-width:100px;">Chọn năm:</span>
											<select name="nam" class="form-control" placeholder="" title="Năm khởi tạo"
												data-toggle="tooltip">
												<!-- BEGIN: nam -->
												<option value="{r.id}" {r.select}>{r.name}</option>
												<!-- END: nam -->
											</select>
										</div>
									</th>

									<td>
										<div class="input-group">
											<button type="submit" class="btn btn-out-dashed btn-info btn-square"
												data-toggle="tooltip" data-placement="right"
												title="Khởi tạo đánh giá áp dụng cho năm">
												<i class="icofont icofont-check-circled"></i> Khởi tạo đánh giá</button>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</form>
				<!-- Tooltips on textbox card end -->
			</div>
		</div>

		<div class="col-sm-12">
			<!-- Tooltips on textbox card start -->
			<div class="card">
				<!-- BEGIN: dsbieumau -->
				<div class="card-header">
					<h5 class="m-b-10">DANH SÁCH BỘ ĐÁNH GIÁ KHỞI TẠO CÁC NĂM</h5>
				</div>
				<div class="card-block icon-btn">
					<!-- BEGIN: setup -->
					<a href="{link_year}" class="{setup.class}">{setup.year}</a>
					<!-- END: setup -->
				</div>
				<!-- END: dsbieumau -->

			</div>

			<div class="row">

				<!-- BEGIN: item -->
				<div class="col-sm-12">
					<!-- Tooltip on icon card start -->
					<div class="card">
						<div class="card-header">
							<div class="bg-warning p-10">
								<i class="icofont icofont-paper-plane"></i>
								<strong> THÔNG TIN CÁC BỘ ĐÁNH GIÁ TRONG {namapdung} </strong>
							</div>
						</div>
						<div class="card-block">
							<p> Bộ đánh giá {namapdung} bao gồm {sobieumau} biểu mẩu
								<a class="label label-success">
									<i class="fa fa-plus"></i> Thêm mới biểu mẫu</a>
							</p>
							<!-- BEGIN: default -->
							<p style="color:#ff0000">
								Lưu ý: Bộ đánh giá {namapdung} chưa được áp dụng mặc định.
								<a onclick="setdefault_item('{ACT.link}','{ACT.token}')" class="label label-info">Chọn
									áp dụng mặc định</a>
							</p>
							<!-- END: default -->
							<div class="card">

								<div class="card-header">
									<div class="bg-success p-10">
										<i class="icofont icofont-paper-plane"></i>
										<strong> KHỞI TẠO CÁC LẦN ĐÁNH GIÁ TRONG NĂM {namapdung}
										</strong>
									</div>

									<div class="card-block icon-btn count ">

										<!-- BEGIN: list_count -->
										<a href="{list_count.link_landanhgia}"
											class="{list_count.class}">{list_count.count}</a>
										<!-- END: list_count -->
									</div>

								</div>
							</div>
							<!-- : list_count <form name="myform2" id="myform2" method="post" action="{link_frm}" onsubmit="return nv_execute_frm(this);">  -->
							<form name="myform2" id="myform2" method="post" action="{link_frm}"
								onsubmit="return nv_execute_frm(this);">
								<input type="hidden" name="sta2" id="id_sta2" value="{sta2}">
								<input type="hidden" name="token2" value="{token2}">

								<table class="table bieumau table-hover table-responsive" {hien_bieumau}>
									<thead>
										<tr style="text-transform: uppercase;background-color: #2e8ed8; color:white">
											<th scope="row" class="text-center" colspan="4"><i
													class="icofont icofont-paper-plane">THÔNG TIN LẦN ĐÁNH GIÁ
													SỐ
													{landanhgia}/{namapdung}</i>
											</th>
										</tr>
									</thead>
									<tbody>


										<tr>
											<td class="col-1"><b><i class="fa fa-calendar-check-o"
														aria-hidden="true"></i>
													Từ Ngày:</b></td>

											<td><input id="start-date" name="from_date" value="{from_date}" type="text"
													class="form-control"></td>

											<td><input name="hidden" value="" type="text" class="form-control hidden2"
													style="border:none; background: transparent;" disabled>
											</td>

										</tr>

										<tr>

											<td class="col-1"><b><i class="fa fa-calendar-check-o"
														aria-hidden="true"></i>
													Đến Ngày:</b></td>

											<td><input id="end-date" name="to_date" value="{to_date}" type="text"
													class="form-control"></td>
										</tr>

										<tr>

											<td class="col-1"><b><i class="fa fa fa-user fa-fw" aria-hidden="true"></i>
													Thành phần đoàn đánh giá:</b></td>
											<td><select id="multiple" name="teams[]" class="js-states form-control "
													multiple>
													<!-- BEGIN: TEAM -->
													<option {TEAM.selected}="{TEAM.selected}"
														value=" {TEAM.full_name}-{TEAM.position}">
														{TEAM.full_name}-{TEAM.position}
													</option>
													<!-- END: TEAM -->
												</select>
											</td>

											<td>
												<!-- start modal -->
												<!-- start modal -->
							</form>


							<button type="button" class="btn btn-primary" data-toggle="modal"
								data-target="#employeeModal">Cập nhật thành viên</button>

							<!-- The Modal -->
							<div class="modal fade" id="employeeModal" style="margin-top: 50px;">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">

										<!-- Modal Header -->
										<!-- Modal body with the table code -->
										<div class="modal-body">
											<div class="container-lg">
												<div class="table-responsive">
													<div class="table-wrapper">
														<div class="table-title">
															<div class="row">
																<div class="col-sm-8">
																	<h2>Danh sách thành viên </h2>
																</div>
																<div class="col-sm-4">
																	<button type="button"
																		class="btn btn-info add-new"><i
																			class="fa fa-plus"></i>
																		Thêm mới</button>
																</div>
															</div>
														</div>

														<form name="formteam" id="formteam" method="post"
															action="{link_frm}" onsubmit="return nv_execute_frm(this);">
															<table class="table test table-bordered table-responsive">
																<thead>
																	<tr>
																		<th>Họ tên</th>
																		<th>Chức vụ</th>
																		<th hidden>Id</th>
																		<th>Thao tác</th>
																	</tr>
																</thead>
																<tbody>

																	<!-- BEGIN: update_team -->

																	<tr>
																		<td>{update_team.full_name}
																		</td>
																		<td>{update_team.position}
																		</td>
																		<td hidden>
																			{update_team.id_evaluation_member}
																		</td>
																		<td>
																			<a class="edit" title="Chỉnh Sửa"
																				data-toggle="tooltip"><i
																					class="fa fa-pencil-square-o"
																					aria-hidden="true"></i></a>


																		</td>

																		</td>
																	</tr>
														</form>
														<!-- END: update_team -->
														</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

										<!-- Modal footer with a Close button -->
										<div class="modal-footer">

											<button id="close" type="button" class="btn btn-danger"
												data-dismiss="modal">Đóng<i class="fa fa-sign-out"
													aria-hidden="true"></i></button>
										</div>

									</div>
								</div>
							</div>


							</form>
							</td>


							</tr>

							<tr>
								<td><b><i class="fa fa fa-cog" aria-hidden="true"></i>Hình thức đánh
										giá:</b>
								</td>
								<td>
									<select id="id_evaluation_type" name="evaluation_type" class="form-control">
										<!-- BEGIN: evaluation_type -->
										<option {evaluation_type.selected}
											value=" {evaluation_type.name_evaluation_type}">
											{evaluation_type.name_evaluation_type}</option>
										<!-- END: evaluation_type -->
									</select>
								</td>
							</tr>

							<tr>
								<td><b><i class="fa fa fa-book fa-fw" aria-hidden="true"></i>Nội dung đánh
										giá:</b>
								</td>
								<td><textarea id="content" name="name_content" rows="5"
										class="form-control">{content}</textarea>
								</td>
							</tr>

							<tr>
							<table id="tbl" class="tbl table">
							<tr>
								<td class="text-center">

									<div class="col mx-auto"> <a onclick="get_linkbcth();"
											class="btn btn-md btn-primary text-white">
											<i class="icofont icofont-printer"></i> <strong>Xem báo cáo tổng
												hợp</strong></a> </div>

								</td>
								<td class="text-center">
									<button type="submit" class="btn-md btn-warning">
										<i class="icofont icofont-location-arrow"></i><strong>Cập nhật thông
											tin</strong>
									</button>

								</td>
							</tr>
						</table>
							</tr>

							<tr>

								<table class="tbl_chart">
									<tr>
										<div class="row">

											<div class="col-md-12 col-lg-6">
												<div class="card">
													<div class="card-block">
														<div class="container">
															<div class="row">
																<div class="col-12 col-md-10">
																	<h6 style="color:rgb(0, 132, 255) ;" class="">Số
																		liệu khoa/phòng đánh giá</h6>
																	<ul class="list-group">
																		<li style="color:rgb(0, 132, 255) ;"
																			class="list-group-item d-flex justify-content-between align-items-center">
																			Số khoa/phòng được đánh giá
																			<span
																				class="badge badge-danger badge-pill">{TONGHOP.slkp}</span>
																		</li>
																		<li style="color:rgb(0, 132, 255) ;"
																			class="list-group-item d-flex justify-content-between align-items-center">
																			Số khoa/phòng đã hoàn thành đánh giá
																			<span
																				class="badge badge-primary badge-pill">{TONGHOP.sl_htdg}</span>
																		</li>
																		<li style="color:rgb(0, 132, 255) ;"
																			class="list-group-item d-flex justify-content-between align-items-center">
																			Số khoa/phòng đang đánh giá
																			<span
																				class="badge badge-warning badge-pill">{TONGHOP.sl_ddg}</span>
																		</li>
																		<li style="color:rgb(0, 132, 255) ;"
																			class="list-group-item d-flex justify-content-between align-items-center">
																			Số khoa/phòng chưa đánh giá
																			<span
																				class="badge badge-success badge-pill">{TONGHOP.sl_cdg}</span>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- Bar Chart start -->
											<div class="col-md-12 col-lg-6">
												<div class="card">

													<div class="card-block">
														<div class="container">
															<div class="row">
																<div class="col-12 col-md-10">

																	<h6 style="color:rgb(0, 132, 255) ;">Tỷ lệ phân loại
																		đánh giá</h6>
																	<ul class="list-group">
																		<li style="color:rgb(0, 132, 255) ;"
																			class="list-group-item d-flex justify-content-between align-items-center">
																			Rất tốt
																			<span
																				class="badge badge-danger badge-pill">{TONGHOP.rattot}%</span>
																		</li>
																		<li style="color:rgb(0, 132, 255) ;"
																			class="list-group-item d-flex justify-content-between align-items-center">
																			Tốt
																			<span
																				class="badge badge-primary badge-pill">{TONGHOP.tot}%</span>
																		</li>
																		<li style="color:rgb(0, 132, 255) ;"
																			class="list-group-item d-flex justify-content-between align-items-center">
																			Trung bình
																			<span
																				class="badge badge-warning badge-pill">{TONGHOP.trungbinh}%</span>
																		</li>
																		<li style="color:rgb(0, 132, 255) ;"
																			class="list-group-item d-flex justify-content-between align-items-center">
																			Yếu
																			<span
																				class="badge badge-success badge-pill">{TONGHOP.yeu}%</span>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</tr>
								</table>


								</tbody>
								<tfoot>
								</tfoot>
								</table>

								


								</form> <!-- end form 2 -->

						</div>
					</div>

				</div>
				<!-- END: item -->
				<!-- BEGIN: report -->
				<div class="col-sm-6">
					<!-- Tooltip on icon card start -->
					<div class="card">
						<div class="card-header">


							<div class="{ROW.class} p-10">
								<i class="icofont icofont-id-card"></i>
								<strong> BIỂU MẪU {ROW.stt} - {ROW.name_report} </strong>
							</div>
						</div>

						<div class="card-block">
							<div style="padding: 0px 25px;">
								<div class="row">
									<strong>Có {ROW.slkhoa} Khoa/phòng được đánh giá và xem báo cáo: </strong>

								</div>
								<div class="row">
									<div class="label-main">
										{ROW.tbl_kp}
									</div>
								</div>
								<div class="row">
									<hr>
								</div>

								<div class="row">
									<div class="col mx-auto"> <a href="{ROW.link_danhgia}"
											class="btn btn-mini btn-primary btn-round">
											<i class="fa fa-file-text-o"></i> Đánh giá</a> </div>

									<div class="col mx-auto"> <a href="{ROW.link_baocao}"
											class="btn btn-mini btn-info btn-round">
											<i class="fa fa-file-text-o"></i> Xem báo cáo</a> </div>
									<div class="col mx-auto"> <a href="{ROW.link_edit}"
											class="btn btn-mini btn-warning btn-round"> <i class="fa fa-edit"></i> Chỉnh
											sửa</a> </div>

									<div class="col mx-auto"> <button onclick="del_item('{ROW.link_del}','{ROW.token}')"
											class="btn btn-mini btn-danger btn-round"> <i class="fa fa-trash"></i> Xóa
											biểu mẫu</button> </div>

								</div>


							</div>


						</div>
					</div>
				</div>
				<!-- END: report -->
			</div>



			<script>
				function setdefault_item(url, a) {
					if (confirm('Bạn có chắc chắn áp dụng mặc định?')) {//link_del
					$.post(url, 'token=' + a, function(res) {
						var r_split = res.split("_");
						if (r_split[0] == 'OK') {
							location.reload();
						} else if (r_split[0] == 'ERR') {
							alert(r_split[1]);
						} else {
							alert(nv_is_del_confirm[2]);
						}
					});
				}
				return false;
				}
			</script>


			<!-- select2 -->
			<script>
				$("#multiple").select2({

					width: 'element',
					placeholder: "Chọn danh sách",
					allowClear: true
				});
			</script>



			<!-- jQuery library -->
			<script>
				$(document).ready(function() {
					var date = new Date();
					var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
					var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

					//$('#start-date').datepicker({ dateFormat: 'dd-mm-yy' });
					//$('#start-date').datepicker().datepicker('setDate', firstDay);

					//$('#end-date').datepicker({ dateFormat: 'dd-mm-yy' });
					//$('#end-date').datepicker().datepicker('setDate', lastDay);


					$.datepicker.setDefaults({
						dateFormat: 'dd-mm-yy',
						//minDate: firstDay,
						//maxDate: lastDay,
					});


					$('#start-date').datepicker({
						onSelect: function(selectedDate) {
							$('#end-date').datepicker('option', 'minDate', selectedDate);

						}
					});

					$('#end-date').datepicker({
						onSelect: function(selectedDate) {
							$('#start-date').datepicker('option', 'maxDate', selectedDate);

						}
					});

					//datatable
					var table = $('#employeeTable').DataTable();

					// Edit button click handler
					$('#employeeTable').on('click', '.edit-btn', function() {
						var data = table.row($(this).closest('tr')).data();
						$('#editName').val(data[0]);
						$('#editDepartment').val(data[1]);
						$('#editRowId').val(table.row($(this).closest('tr')).index());
					});

					// Add button click handler
					$('#addBtn').click(function() {
						var name = $('#newName').val();
						var department = $('#newDepartment').val();
						var actions = '<button class="btn btn-primary edit-btn">Edit</button>';

						table.row.add([name, department, actions]).draw(false);

						$('#newName').val('');
						$('#newDepartment').val('');
						$('#addModal').modal('hide');
					});

					// Save button click handler
					$('#saveEditBtn').click(function() {
						var name = $('#editName').val();
						var department = $('#editDepartment').val();
						var rowId = $('#editRowId').val();

						table.row(rowId).data([name, department,
							'<button class="btn btn-primary edit-btn">Edit</button>'
						]).draw(false);

						$('#editModal').modal('hide');
					});
				});
			</script>



			<!-- JS xu ly form submit-->

			<script>
				//tạo biểu đồ
				function dg_khoaphong(element) {
					let kp = element.textContent || element.innerText;
					//alert (kp);
					var url ="{link_dg}"+kp+'_'+{LANDG};
					//alert (url);
					var idrpValue = document.getElementById("id_rp").value;
					alert(idrpValue);
					window.location.href = url;
				}
			</script>

			<script>
				function get_linkbcth() {
					var url ="{link_bcth}";
					window.location.href = url;


				}
			</script>

<!-- END: main -->