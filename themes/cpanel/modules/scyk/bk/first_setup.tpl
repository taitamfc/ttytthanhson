WAN LY SU CO Y KHOA
***Luu y: ctrl + f5 reload lại trang web khi thay code vào file js




<!-- BEGIN: main -->

<!--        https://cdnjs.com/libraries/moment.js/-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


<!--        https://cdnjs.com/libraries/bootstrap-datetimepicker-->



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

<script src="{THEME_URL}/js/my_scyk.js"></script>


<link href="{THEME_URL}/assets/css/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

<script src="{THEME_URL}/assets/js/bootstrap/js/bootstrap-datetimepicker.min.js">
</script>

<!-- Languages -->

<script src="{THEME_URL}/assets/js/bootstrap/js/locales/bootstrap-datetimepicker.vi.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">





<head>



	<style>
		.form-label {
			white-space: pre-wrap;
		}


		.radio-list {
			list-style: none;
			padding: 0;
		}

		.radio-item {
			display: flex;
			align-items: center;
			margin-bottom: 10px;
		}

		.form-check-input {
			width: 20px;
			height: 20px;
			margin-right: 10px;
		}

		.form-check-label {
			margin: 0;
			word-wrap: break-word;
			white-space: pre-wrap;
			/* Tự động ngắt hàng khi dòng dài */
		}


		/* Check box*/
		.form-check2 {
			display: flex;
			align-items: center;
			margin-bottom: 10px;
		}

		.form-check-input2 {
			margin-right: 10px;
		}

		.form-check-label2 {
			margin: 0;
			word-wrap: break-word;
			/* Tự động ngắt hàng khi dòng dài */
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
			bottom: 2px;
			;
			width: 46%;
			padding: 2px;
			/*background-color: rgb(12, 44, 175); */
			/*background-color: green;*/
			display: block;
			justify-content: space-between;
			border-top: 2px solid green;
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
			border-top: 2px solid blue;
			border-bottom: 2px solid blue;
			border-left: 2px solid blue;
			border-right: 2px solid blue;
		}

		table.phuluc1 td,
		table.phuluc1 th {

			white-space: pre-line;
			border-top: 1px solid black;
			border-left: 1px solid black;
			border-right: 1px solid black;
			border-bottom: 1px solid black;

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
												<input id="datetime1" name="tg_tungay" value="{BC.tungay}" type="text"
													class="form-control">
											</div>
										</th>
										<th>
											<div class="input-group">
												<span class="input-group-addon" id="tg_denngay"
													style="width: auto;min-width:120px;">Đến ngày:</span>
												<input id="datetime2" name="tg_denngay" value="{BC.denngay}" type="text"
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

						<table id="tbl_danhsach" class="table table-hover" style="width:100%">
							<thead>

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
									<td style="white-space:pre-wrap; word-break:break-word">{DSBC.tomtatnd}
									</td>

									<td>{DSBC.ngaygio}</td>
									<td>{DSBC.trangthai}</td>
									<td>
										<a style="color: #fff;" href="#" title="Xem /In BC" onclick="view_info(this);"
											class="btn btn-mini btn-success btn-round">
											<i class="fa fa-eye" aria-hidden="true"></i> </a>


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

								<div class="modal-header bg-success">
									<h5 class="modal-title" id="exampleModalLabel">THÔNG TIN BÁO CÁO SỰ
										CỐ {MABC}
									</h5>
								</div>
								<form name="nmyform2" id="myform2" action="#" method="post"
									onsubmit="frm_submit(this);">

									<input type="hidden" name="sta2" id="id_sta2" value="bcsc">

									<div class="container mt-4">
										<!-- Outer accordion - Level 1 -->
										<div class="accordion" id="outerAccordionA">
											<!-- First accordion item - Level 1 -->
											<div class="card">
												<div class="card-header bg-primary text-white py-1" id="headingOne">
													<button class="btn btn-link text-white" type="button"
														data-toggle="collapse" data-target="#collapseOne"
														aria-expanded="false">
														PHẦN A. THÔNG TIN ĐƯỢC BÁO CÁO
													</button>
												</div>
												<div id="collapseOne" class="collapse" data-parent="#outerAccordionA">
													<div class="card-body">
														<!-- Nested accordion - Level 2 -->
														<div class="accordion" id="nestedAccordionA">
															<!-- BEGIN: NHOMCAUHOI -->
															<!-- First accordion item - Level 2 -->
															<div class="card">
																<div class="card-header bg-success text-white py-1"
																	id="nestedHeading{NHOMCAUHOI.stt}A">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse{NHOMCAUHOI.stt}A"
																		aria-expanded="false">
																		{NHOMCAUHOI.stt}. {NHOMCAUHOI.tennhom}
																	</button>

																</div>
																<div id="nestedCollapse{NHOMCAUHOI.stt}A"
																	class="collapse" data-parent="#nestedAccordionA">
																	<div class="card-body">
																		<table id="mytable{NHOMCAUHOI.stt}"
																			class="table table-hover"
																			style="width:100%;">

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
																	</div>
																</div>
															</div>
															<!-- END: NHOMCAUHOI -->


														</div>
													</div>
												</div>
											</div>


											<!-- Second accordion item - Level 1 -->
											<div class="card">
												<div class="card-header bg-primary text-yellow py-1" id="headingTwo">
													<button class="btn btn-link text-white" type="button"
														data-toggle="collapse" data-target="#collapseTwo"
														aria-expanded="false">
														PHẦN B. DÀNH CHO NHÂN VIÊN TIẾP NHẬN SỰ CỐ Y KHOA
													</button>
												</div>
												<div id="collapseTwo" class="collapse" data-parent="#outerAccordion">
													<div class="card-body ">
														<!-- Nested accordion - Level 2 -->
														<div class="accordion" id="nestedAccordionTwo">
															<!-- First accordion item - Level 2 -->
															<div class="card hidden1A ">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeadingThree">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapseThree"
																		aria-expanded="false">
																		I. PHÂN LOẠI SỰ CỐ Y KHOA THEO MỨC ĐỘ TỔN THƯƠNG
																	</button>
																</div>
																<div id="nestedCollapseThree" class="collapse"
																	data-parent="#nestedAccordionTwo">
																	<div class="card-body">
																		<div class="container">

																			<table class="table phuluc1 table-hover"
																				style="width: 100%;border: 1px solid black;">
																				<thead>
																					<tr>
																						<th style=" max-width: 20px; width:20px; vertical-align: middle;"
																							scope="col">STT</th>
																						<th style=" max-width: 200px; width:200px; vertical-align: middle;"
																							scope="col">Mô tả sự cố
																							y khoa</th>
																						<th style=" max-width: 100px; width:100px; vertical-align: middle;"
																							scope="col">Theo
																							diễn biến
																							tình huống</th>

																						<th style=" max-width: 200px; width:200px; vertical-align: middle; scope="
																							col">Theo mức độ
																							tổn thương
																							đến sức khỏe,
																							tính mạng người bệnh
																							(Cấp độ nguy cơ-NC)

																						</th>
																						<th style=" max-width: 200px; width:200px; vertical-align: middle;  scope="
																							col">Hình thức
																							báo cáo</th>

																					</tr>
																				</thead>
																				<tbody>
																					<tr>
																						<td>1</td>
																						<td>Tình huống có nguy
																							cơ gây ra sự cố (near miss)
																						</td>
																						<td
																							style="vertical-align: middle;">
																							<div
																								class="flex form-check ">
																								<input
																									class="form-check-input"
																									type="radio"
																									name="mucdott_nb"
																									id="idradiogA"
																									value="A" {MUCDOTT_NB.CHECKA}>
																									

																								<label
																									class="form-check-label"
																									for="radiogA">A</label>
																							</div>
																						</td>
																						<td
																							style="vertical-align: middle;">
																							Chưa xảy ra (NC0)
																							</td>
																						<th rowspan="6"
																							style="vertical-align: middle;">
																							Báo
																							cáo
																							tự nguyện</th>

																					</tr>
																					<tr>
																						<td>2</td>
																						<td>Sự cố đã xảy ra,
																							chưa tác động trực
																							tiếp đến người bệnh</td>

																						<td
																							style="vertical-align: middle;">
																							<div
																								class="flex form-check ">
																								<input
																									class="form-check-input"
																									type="radio"
																									name="mucdott_nb"
																									id="idradiogB"
																									value="B" {MUCDOTT_NB.CHECKB}>
																									

																								<label
																									class="form-check-label"
																									for="radiogB">B</label>
																							</div>
																						</td>
																						<td rowspan="3"
																							style="vertical-align: middle;">
																							Tổn thương nhẹ[1] (NC1)
																							</td>


																					</tr>
																					<tr>
																						<td>3</td>
																						<td>Sự cố đã xảy ra
																							tác động trực tiếp
																							đến người bệnh,
																							chưa gây nguy hại.
																						</td>

																						<td
																							style="vertical-align: middle;">
																							<div
																								class="flex form-check ">
																								<input
																									class="form-check-input"
																									type="radio"
																									name="mucdott_nb"
																									id="idradiogC"
																									value="C" {MUCDOTT_NB.CHECKC}>
																									

																								<label
																									class="form-check-label"
																									for="radiogC">C</label>
																							</div>
																						</td>


																					</tr>
																					<tr>
																						<td>4</td>
																						<td>Sự cố đã xảy ra
																							tác động trực tiếp
																							đến người bệnh,
																							cần phải theo dõi
																							hoặc đã can thiệp
																							điều trị kịp thời
																							nên không gây nguy hại</td>



																						<td
																							style="vertical-align: middle;">
																							<div
																								class="flex form-check ">
																								<input
																									class="form-check-input"
																									type="radio"
																									name="mucdott_nb"
																									id="idradiogD"
																									value="D" {MUCDOTT_NB.CHECKD}>
																									

																								<label
																									class="form-check-label"
																									for="radiogD">D</label>
																							</div>
																						</td>

																					</tr>
																					<tr>
																						<td>5</td>
																						<td>Sự cố đã xảy ra gây nguy hại
																							tạm
																							thời và cần phải can thiệp
																							điều
																							trị

																						</td>
																						<td
																							style="vertical-align: middle;">
																							<div
																								class="flex form-check ">
																								<input
																									class="form-check-input"
																									type="radio"
																									name="mucdott_nb"
																									id="idradiogE"
																									value="E" {MUCDOTT_NB.CHECKE}>
																									

																								<label
																									class="form-check-label"
																									for="radiogE">E</label>
																							</div>
																						</td>
																						<td rowspan="2"
																							style="vertical-align: middle;">
																							Tổn thương trung bình[2] (NC2)
																							
																						</td>


																					</tr>
																					<tr>
																						<td>6</td>
																						<td>Sự cố đã xảy ra, gây nguy
																							hại
																							tạm
																							thời, cần phải can thiệp
																							điều
																							trị và
																							kéo dài thời gian nằm viện
																						</td>


																						<td
																							style="vertical-align: middle;">
																							<div
																								class="flex form-check ">
																								<input
																									class="form-check-input"
																									type="radio"
																									name="mucdott_nb"
																									id="idradiogF"
																									value="F" {MUCDOTT_NB.CHECKF}>
																									

																								<label
																									class="form-check-label"
																									for="radiogF">F</label>
																							</div>
																						</td>

																					</tr>
																					<tr>
																						<td>7</td>
																						<td>Sự cố đã xảy ra gây nguy hại
																							kéo
																							dài, để lại di chứng (kèm
																							theo
																							bảng
																							sự cố y khoa nghiêm trọng)
																						</td>


																						<td
																							style="vertical-align: middle;">
																							<div
																								class="flex form-check ">
																								<input
																									class="form-check-input"
																									type="radio"
																									name="mucdott_nb"
																									id="idradiogG"
																									value="G" {MUCDOTT_NB.CHECKG}>
																									

																								<label
																									class="form-check-label"
																									for="radiogG">G</label>
																							</div>
																						</td>
																						<td rowspan="3"
																							style="vertical-align: middle;">
																							Tổn thương nặng[3] (NC3)</td>
																							

																						<th rowspan="3"
																							style="vertical-align: middle;">
																							Báo
																							cáo
																							bắt buộc</th>


																					</tr>
																					<tr>
																						<td>8</td>
																						<td>Sự cố đã xảy ra gây nguy hại
																							cần
																							phải hồi sức tích cực</td>

																						<td
																							style="vertical-align: middle;">
																							<div
																								class="flex form-check ">
																								<input
																									class="form-check-input"
																									type="radio"
																									name="mucdott_nb"
																									id="idradiogH"
																									value="H" {MUCDOTT_NB.CHECKH}>
																									

																								<label
																									class="form-check-label"
																									for="radiogH">H</label>
																							</div>
																						</td>

																					</tr>
																					<tr>
																						<td>9</td>
																						<td>Sự cố đã xảy ra có ảnh hưởng
																							hoặc
																							trực tiếp gây tử vong</td>

																						<td
																							style="vertical-align: middle;">
																							<div
																								class="flex form-check ">
																								<input
																									class="form-check-input"
																									type="radio"
																									name="mucdott_nb"
																									id="idradiogI"
																									value="I" {MUCDOTT_NB.CHECKI}>

																								<label
																									class="form-check-label"
																									for="radiogI">I</label>
																							</div>
																						</td>

																					</tr>
																				</tbody>
																			</table>

																		</div>
																	</div>
																</div>
															</div>

															<!-- Second accordion item - Level 2 -->
															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeadingFour">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapseFour"
																		aria-expanded="false">
																		II. PHÂN LOẠI THEO NHÓM SỰ CỐ (INCIDENT TYPE)
																	</button>
																</div>
																<div id="nestedCollapseFour" class="collapse"
																	data-parent="#nestedAccordionTwo">
																	<div class="card-body">
																		<!-- BEGIN: NHOMCAUHOI2B-->
																		<div class="card-header bg-success text-white py-1"
																			id="nestedHeading{NHOMCAUHOI2B.stt}A">
																			<button class="btn btn-link text-white"
																				type="button" data-toggle="collapse"
																				data-target="#nestedCollapse{NHOMCAUHOI2B.stt}A"
																				aria-expanded="false">
																				{NHOMCAUHOI2B.stt}.
																				{NHOMCAUHOI2B.tennhom}
																			</button>

																			<!-- luu gia tri cac checkbox tuong ung moi nhom cau hoi-->
																			<input type="hidden"
																				id="idcheckbut{NHOMCAUHOI2B.stt}"
																				name="checkbut{NHOMCAUHOI2B.stt}" />
																		</div>

																		<table id="mytable{NHOMCAUHOI2B.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CAUHOI2B-->
																				<tr>

																					{CAUHOI2B.td1}

																					{CAUHOI2B.form_control}

																					{CAUHOI2B.td2}


																				</tr>
																				<!-- END: CAUHOI2B -->
																			</tbody>

																		</table>
																		<!-- END: NHOMCAUHOI2B-->
																	</div>
																</div>
															</div>


															<!-- Second accordion item - Level 3 -->
															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading3B">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse3B"
																		aria-expanded="false">
																		III. PHÂN LOẠI THEO NHÓM NGUYÊN NHÂN GÂY RA SỰ
																		CỐ
																	</button>
																</div>
																<div id="nestedCollapse3B" class="collapse"
																	data-parent="#nestedAccordionTwo">
																	<div class="card-body">
																		<!-- BEGIN: NHOMCAUHOI3B-->
																		<div class="card-header bg-success text-white py-1"
																			id="nestedHeading{NHOMCAUHOI3B.stt}A">
																			<button class="btn btn-link text-white"
																				type="button" data-toggle="collapse"
																				data-target="#nestedCollapse{NHOMCAUHOI3B.stt}A"
																				aria-expanded="false">
																				{NHOMCAUHOI3B.stt}.
																				{NHOMCAUHOI3B.tennhom}
																			</button>
																		</div>

																		<table id="mytable{NHOMCAUHOI3B.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CAUHOI3B-->
																				<tr>

																					{CAUHOI3B.td1}

																					{CAUHOI3B.form_control}

																					{CAUHOI3B.td2}


																				</tr>
																				<!-- END: CAUHOI3B -->
																			</tbody>

																		</table>
																		<!-- END: NHOMCAUHOI3B-->
																	</div>
																</div>
															</div>

															<!-- Second accordion item - Level 4 -->
															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading4B">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse4B"
																		aria-expanded="false">
																		IV. DANH MỤC SỰ CỐ Y KHOA NGHIÊM TRỌNG
																	</button>
																</div>
																<div id="nestedCollapse4B" class="collapse"
																	data-parent="#nestedAccordionTwo">
																	<div class="card-body">
																		<!-- BEGIN: NHOMCAUHOI4B-->
																		<div class="card-header bg-success text-white py-1"
																			id="nestedHeading{NHOMCAUHOI4B.stt}A">
																			<button class="btn btn-link text-white"
																				type="button" data-toggle="collapse"
																				data-target="#nestedCollapse{NHOMCAUHOI4B.stt}A"
																				aria-expanded="false">
																				{NHOMCAUHOI4B.tennhom}
																			</button>
																		</div>

																		<table id="mytable{NHOMCAUHOI4B.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CAUHOI4B-->
																				<tr>

																					{CAUHOI4B.td1}

																					{CAUHOI4B.form_control}

																					{CAUHOI4B.td2}


																				</tr>
																				<!-- END: CAUHOI4B -->
																			</tbody>

																		</table>
																		<!-- END: NHOMCAUHOI4B-->
																	</div>
																</div>
															</div>



														</div>
													</div>
												</div>
											</div>






										</div>



									</div>

							</div>
							<div class="modal-footer-1">

								<div class="row ">

									<div class="col-auto">
										<button type="button" class="btn btn-out-dashed btn-info btn-square"
											onclick=printDiv('bieumau1');>
											<i class="icofont icofont-printer"></i> Xem/In BC
										</button>
									</div>

									


									<div class="col-auto">


										<button type="submit" class="btn btn-out-dashed btn-success btn-square"
											id="idsubmit_btn" name="submit_bcsc" {TT.DUYET}>
											<i class="icofont icofont-check-circled"></i> {TT.TTDUYET}</button>
									</div>


									<div class="col-auto">
										<button type="button" class="btn btn-out-dashed btn-danger btn-square"
											data-dismiss="modal" onclick="window.location.href='{link_frm}'">
											<i class="fa fa-power-off" aria-hidden="true"></i>
											Đóng
										</button>
									</div>
								</div>
								</form> <!-- end form2 -->


							</div>

						</div>

					</div>

					<div class="col-md-12 col-lg-6">

						<div id="bieumau2">
							<div class="modal-header bg-primary">
								<h5 class="modal-title" id="exampleModalLabel">NHÓM CHUYÊN GIA PHÂN TÍCH SỰ CỐ Y KHOA
									{MABC}
								</h5>
							</div>


							<form name="nmyform3" id="myform3" action="#" method="post" onsubmit="frm_submit(this);">

								<input type="hidden" name="sta3" id="id_sta3" value="ptsc">

								<div class="card">
									<div class="container mt-4">
										<!-- Outer accordion - Level 1 -->
										<div class="accordion" id="outerAccordionB">
											<!-- First accordion item - Level 1 -->
											<div class="card">
												<div class="card-header bg-primary text-yellow py-1" id="headingTwo">
													<button class="btn btn-link text-white" type="button"
														data-toggle="collapse" data-target="#collapse_phsc"
														aria-expanded="false">
														PHẦN A. DÀNH CHO NHÂN VIÊN CHUYÊN TRÁCH
													</button>
												</div>
												<div id="collapse_phsc" class="collapse" data-parent="#outerAccordion">
													<div class="card-body">
														<!-- Nested accordion - Level 2 -->
														<div class="accordion" id="nestedAccordion_phsc">
															<!-- First accordion item - Level 2 -->


															<!-- Second accordion item - Level 2 -->
															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading_phsc">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse_phsc"
																		aria-expanded="false">
																		I. MÔ TẢ CHI TIẾT SỰ CỐ:
																	</button>
																</div>
																<div id="nestedCollapse_phsc" class="collapse"
																	data-parent="#nestedAccordion_phsc">
																	<div class="card-body">
																		<!-- BEGIN: NHOMPHSC1-->


																		<table id="mytable{NHOMPHSC1.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CH_PHSC1-->
																				<tr>

																					{CH_PHSC1.td1}

																					{CH_PHSC1.form_control}

																					{CH_PHSC1.td2}


																				</tr>
																				<!-- END: CH_PHSC1 -->
																			</tbody>

																		</table>
																		<!-- END: NHOMPHSC1-->
																	</div>
																</div>
															</div>

															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading_phsc2">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse_phsc2"
																		aria-expanded="false">
																		II. PHÂN LOẠI SỰ CỐ THEO NHÓM SỰ CỐ
																		(INCIDENT TYPE)
																	</button>
																</div>
																<div id="nestedCollapse_phsc2" class="collapse"
																	data-parent="#nestedAccordion_phs2">
																	<div class="card-body">
																		<!-- BEGIN: NHOMPHSC2-->
																		<div class="card-header bg-success text-white py-1"
																			id="nestedHeading{NHOMPHSC2.stt}A">
																			<button class="btn btn-link text-white"
																				type="button" data-toggle="collapse"
																				data-target="#nestedCollapse{NHOMPHSC2.stt}A"
																				aria-expanded="false">
																				{NHOMPHSC2.stt}. {NHOMPHSC2.tennhom}
																			</button>
																		</div>

																		<table id="mytable{NHOMPHSC2.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CH_PHSC2-->
																				<tr>

																					{CH_PHSC2.td1}

																					{CH_PHSC2.form_control}

																					{CH_PHSC2.td2}


																				</tr>
																				<!-- END: CH_PHSC2 -->
																			</tbody>

																		</table>
																		<!-- END: NHOMPHSC2-->
																	</div>
																</div>
															</div>


															<!-- Second accordion item - Level 3 -->
															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading_phsc3">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse_phsc3"
																		aria-expanded="false">
																		III. ĐIỀU TRỊ Y LỆNH ĐÃ ĐƯỢC THỰC HIỆN
																	</button>
																</div>
																<div id="nestedCollapse_phsc3" class="collapse"
																	data-parent="#nestedAccordion_phsc3">
																	<div class="card-body">
																		<!-- BEGIN: NHOMPHSC3-->


																		<table id="mytable{NHOMPHSC3.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CH_PHSC3-->
																				<tr>

																					{CH_PHSC3.td1}

																					{CH_PHSC3.form_control}

																					{CH_PHSC3.td2}


																				</tr>
																				<!-- END: CH_PHSC3 -->
																			</tbody>

																		</table>
																		<!-- END: NHOMPHSC3-->
																	</div>
																</div>
															</div>

															<!-- Second accordion item - Level 4 -->
															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading_phsc4">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse_phsc4"
																		aria-expanded="false">
																		IV. PHÂN LOẠI SỰ CỐ THEO NHÓM NGUYÊN NHÂN
																		GÂY RA SỰ CỐ
																	</button>
																</div>
																<div id="nestedCollapse_phsc4" class="collapse"
																	data-parent="#nestedAccordion_phsc4">
																	<div class="card-body">
																		<!-- BEGIN: NHOMPHSC4-->
																		<div class="card-header bg-success text-white py-1"
																			id="nestedHeading{NHOMPHSC4.stt}A">
																			<button class="btn btn-link text-white"
																				type="button" data-toggle="collapse"
																				data-target="#nestedCollapse{NHOMPHSC4.stt}A"
																				aria-expanded="false">
																				{NHOMPHSC4.stt}. {NHOMPHSC4.tennhom}
																			</button>
																		</div>

																		<table id="mytable{NHOMPHSC4.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CH_PHSC4-->
																				<tr>

																					{CH_PHSC4.td1}

																					{CH_PHSC4.form_control}

																					{CH_PHSC4.td2}


																				</tr>
																				<!-- END: CH_PHSC4 -->
																			</tbody>

																		</table>
																		<!-- END: NHOMPHSC4-->
																	</div>
																</div>
															</div>

															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading_phsc5">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse_phsc5"
																		aria-expanded="false">
																		V. HÀNH ĐỘNG KHẮC PHỤC SỰ CỐ
																	</button>
																</div>
																<div id="nestedCollapse_phsc5" class="collapse"
																	data-parent="#nestedAccordion_phsc5">
																	<div class="card-body">
																		<!-- BEGIN: NHOMPHSC5-->


																		<table id="mytable{NHOMPHSC5.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CH_PHSC5-->
																				<tr>

																					{CH_PHSC5.td1}

																					{CH_PHSC5.form_control}

																					{CH_PHSC5.td2}


																				</tr>
																				<!-- END: CH_PHSC5 -->
																			</tbody>

																		</table>
																		<!-- END: NHOMPHSC5-->
																	</div>
																</div>
															</div>

															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading_phsc6">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse_phsc6"
																		aria-expanded="false">
																		VI. ĐỀ XUẤT KHUYẾN CÁO PHÒNG NGỪA SỰ CỐ
																	</button>
																</div>
																<div id="nestedCollapse_phsc6" class="collapse"
																	data-parent="#nestedAccordion_phsc6">
																	<div class="card-body">
																		<!-- BEGIN: NHOMPHSC6-->


																		<table id="mytable{NHOMPHSC6.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CH_PHSC6-->
																				<tr>

																					{CH_PHSC6.td1}

																					{CH_PHSC6.form_control}

																					{CH_PHSC6.td2}


																				</tr>
																				<!-- END: CH_PHSC6 -->
																			</tbody>

																		</table>
																		<!-- END: NHOMPHSC6-->
																	</div>
																</div>
															</div>



														</div>
													</div>
												</div>
											</div>


											<!-- Second accordion item - Level 1 -->
											<div class="card">
												<div class="card-header bg-primary text-yellow py-1" id="heading_cgsc1">
													<button class="btn btn-link text-white" type="button"
														data-toggle="collapse" data-target="#collapse_cgsc1"
														aria-expanded="false">
														PHẦN B. DÀNH CHO CẤP QUẢN LÝ
													</button>
												</div>
												<div id="collapse_cgsc1" class="collapse"
													data-parent="#outerAccordionC">
													<div class="card-body">
														<!-- Nested accordion - Level 2 -->
														<div class="accordion" id="nestedAccordion_cgsc1">
															<!-- First accordion item - Level 2 -->
															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading_cgsc1">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse_cgsc1"
																		aria-expanded="false">
																		I. ĐÁNH GIÁ CỦA TRƯỞNG NHÓM CHUYÊN GIA
																	</button>
																</div>
																<div id="nestedCollapse_cgsc1" class="collapse"
																	data-parent="#nestedAccordion_cgsc1">
																	<div class="card-body">
																		<!-- BEGIN: NHOMCGSC1-->
																		<div class="card-header bg-success text-white py-0"
																			id="nestedHeading{NHOMCGSC1.stt}A">
																			<button class="btn btn-link text-white"
																				type="button" data-toggle="collapse"
																				data-target="#nestedCollapse{NHOMCGSC1.stt}A"
																				aria-expanded="false">
																				{NHOMCGSC1.stt}. {NHOMCGSC1.tennhom}
																			</button>
																		</div>

																		<table id="mytable{NHOMCGSC1.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CH_CGSC1-->
																				<tr>

																					{CH_CGSC1.td1}

																					{CH_CGSC1.form_control}

																					{CH_CGSC1.td2}


																				</tr>
																				<!-- END: CH_CGSC1 -->
																			</tbody>

																		</table>
																		<!-- END: NHOMCGSC1-->
																	</div>
																</div>
															</div>

															<!-- Second accordion item - Level 2 -->
															<div class="card">
																<div class="card-header bg-info text-white py-1"
																	id="nestedHeading_cgsc2">
																	<button class="btn btn-link text-white"
																		type="button" data-toggle="collapse"
																		data-target="#nestedCollapse_cgsc2"
																		aria-expanded="false">
																		II. ĐÁNH GIÁ MỨC ĐỘ TỔN THƯƠNG
																	</button>
																</div>
																<div id="nestedCollapse_cgsc2" class="collapse"
																	data-parent="#nestedAccordion_cgsc2">
																	<div class="card-body">
																		<!-- BEGIN: NHOMCGSC2-->
																		<div class="card-header bg-success text-white py-0"
																			id="nestedHeading{NHOMCGSC2.stt}A">
																			<button class="btn btn-link text-white"
																				type="button" data-toggle="collapse"
																				data-target="#nestedCollapse{NHOMCGSC2.stt}A"
																				aria-expanded="false">
																				{NHOMCGSC2.stt}. {NHOMCGSC2.tennhom}
																			</button>
																		</div>

																		<table id="mytable{NHOMCGSC2.stt}"
																			class="table table-hover"
																			style="width:100%;">

																			<tbody>

																				<!-- BEGIN: CH_CGSC2-->
																				<tr>

																					{CH_CGSC2.td1}

																					{CH_CGSC2.form_control}

																					{CH_CGSC2.td2}


																				</tr>
																				<!-- END: CH_CGSC2 -->
																			</tbody>

																		</table>
																		<!-- END: NHOMCGSC2-->
																	</div>
																</div>
															</div>







														</div>
													</div>
												</div>
											</div>






										</div>



									</div>


								</div>

						</div><!-- end bieumau2-->

						<div class="modal-footer-2 ">

							<div class="row ">

								<div class="col-auto">
									<button type="submit" class="btn btn-primary" onclick="printDiv('bieumau2');">
										<i class="icofont icofont-printer"></i> Xem/In BC
									</button>
								</div>

								<div class="col-auto">
									<button type="submit" class="btn btn-out-dashed btn-info btn-square" id="id_ptsc"
										name="btn_ptsc" {TT.PHANTICH}>

										<i class="icofont icofont-id-card"></i>
										{TT.TTPHANTICH}
									</button>
								</div>
								<div class="col-auto">
									<button type="button" class="btn btn-out-dashed btn-warning btn-square"
										data-toggle="modal" data-backdrop="static" data-keyboard="false"
										data-target="#modal-tb" {TT.PHANHOI}>
										<i class="icofont icofont-paper-plane"></i>
										{TT.TTPHANHOI}
									</button>
								</div>
								<div class="col-auto">
									<button type="button" class="btn btn-out-dashed btn-danger btn-square"
										data-dismiss="modal" onclick="window.location.href='{link_frm}'">
										<i class="fa fa-power-off" aria-hidden="true"></i>
										Đóng
									</button>
								</div>

								<div class="col-auto">
									<button hidden type="button" class="btn btn-danger"
										onclick="check_forms('myform3');">
										Check Form
									</button>
								</div>

								</form> <!-- end form3 -->

							</div>
						</div>



					</div>



				</div><!-- modal-content -->
			</div><!-- modal-dialog -->
		</div><!-- modal -->


	</div><!-- container -->



	<!-- Modal start PHẢN HỒI BÁO CÁO -->

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
						<h5 class="bg-info"> Ghi Chú </h5>
						<textarea id="idnote" name="note" rows="4"
							class="form-control form-control-lg"> {NOTE} </textarea>
						<hr>
						</hr>


						<h5 class="bg-warning"> Gửi cho khoa/phòng </h5>
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

						<button type="submit" class="btn btn-out-dashed btn-info btn-square" id="id_phsc"
							name="btn_phsc">
							<i class="icofont icofont-check-circled"></i> Gửi</button>


						<button type="button" class="btn btn-out-dashed btn-danger btn-square" data-dismiss="modal">
							<i class="fa fa-power-off" aria-hidden="true"></i> Đóng
						</button>

					</div>
					</form>
					<!--end form4 -->
				</div>

			</div>
		</div>
	</div>
</div> <!-- end modal -->



<script>
	$(function() {

		$('#datetime1').datepicker({
			dateFormat: 'dd-mm-yy',


			onSelect: function(selectedDate) {
				$('#datetime2').datepicker('option', 'minDate', selectedDate);

			}
		});

		$('#datetime2').datepicker({
			dateFormat: 'dd-mm-yy',

			onSelect: function(selectedDate) {
				$('##datetime1').datepicker('option', 'maxDate', selectedDate);

			}
		});



		//ngay bao cao
		$('#ngaygiott').datetimepicker({
			// format: "dd/mm/yyyy - hh:ii:ss P",

			language: 'vi',
			// RTL mode
			rtl: true,
			minuteStep: 1,
			pickerPosition: 'bottom-right',
			// enable meridian views for day and hour views    
			showMeridian: true,
			format: 'dd/mm/yyyy - hh:ii:ss P',
			weekStart: 0,
			daysOfWeekDisabled: [],
			autoclose: true,
			startView: 2,
			minView: 0,
			maxView: 3,
			viewSelect: 0,
			todayBtn: true,
			todayHighlight: true,
			forceParse: true
		});

		// Set the default date to today
		var today = new Date();
		$('#ngaygiott').datetimepicker('setDate', today);




	});







	function printDiv(divName) {
		var originalContents = document.body.innerHTML;
		var targetDiv = document.getElementById(divName);

		// Clone the target div and remove collapse classes
		var cloneDiv = targetDiv.cloneNode(true);
		var collapseElements = cloneDiv.querySelectorAll('.collapse');
		collapseElements.forEach(function(element) {
			element.classList.remove('collapse');
			element.classList.add('show');
		});

		// Replace the content of the body with the modified clone
		document.body.innerHTML = cloneDiv.outerHTML;

		// Print the modified content
		window.print();

		// Restore the original content
		document.body.innerHTML = originalContents;
	}
</script>

<script>
	//kiểm tra nút dánh giá sự cố nặng
	//var isChecked = document.querySelector('#idradiog35').checked = true;
	const divElement = document.querySelector('.hidden1A');

	var t = $("input[name='dgbd']:checked").val();

	if (typeof t === "undefined") {
		t = "default_value";
		//ẩn báo cáo đánh giá sự cố 
		divElement.setAttribute('hidden', 'true');

	} else {
		if (t === 'Nặng') {
			//hiển thị báo cáo sự cố nặng
			divElement.removeAttribute('hidden');
		} else {
			divElement.setAttribute('hidden', 'true');
		}
	}





	//handel radio check
	function handleRadioChange(event) {
		// Check if the radio button is checked

		if (event.target.checked) {

			const radioValue = event.target.value; // Get the value of the checked radio button
			const divElement = document.querySelector('.hidden1A');


			if (radioValue === 'Nặng') {
				//alert('Selected radio value: ' + radioValue);
				//show div and table in A ( cau 41 ...)
				// Get references to the div and table elements

				divElement.removeAttribute('hidden');


			} else {
				divElement.setAttribute('hidden', 'true');

			}
		}
	}



	function filter_dsbc(a) {
		var url = '{link_frm}';
		var vl1 = (a.value || a.options[a.selectedIndex].value); //crossbrowser solution =)
		//vl2= document.getElementById("txt_count").value;
		//alert(vl1);
		window.location = url + '&idd=' + vl1;
	}



	function change_checkbox(checkboxId, hiddenInputId) {
		var checkedValues = $("input[name='" + checkboxId + "']:checked").map(function() {
			return $(this).val();
		}).get();
		alert(checkedValues.join(", "));
		$("#" + hiddenInputId).val(checkedValues.join(";"));
	}



	function frm_submit(a) {
		//alert($(a).serialize());

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
				autoWidth: false,

				// The columns are explicitly
				// specified as the column array

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

	//check click on tbl
	function view_info(button) {
		// Get the parent row (<tr>) of the clicked button
		var parentRow = button.closest('tr');

		// Find the <td> elements within the row
		var stt = parentRow.querySelector('th').innerText;
		var masobc = parentRow.querySelector('td:nth-child(2)').innerText;
		var khoaphong = parentRow.querySelector('td:nth-child(3)').innerText;
		var tomtatnd = parentRow.querySelector('td:nth-child(4)').innerText;
		var ngaygio = parentRow.querySelector('td:nth-child(6)').innerText;
		var trangthai = parentRow.querySelector('td:nth-child(7)').innerText;

		// Create a string containing the values
		//var values = "STT: " + stt + "\nMasobc: " + masobc + "\nKhoaphong: " + khoaphong + "\nTomtatnd: " +
		//tomtatnd + "\nNgaygio: " + ngaygio + "\nTrangthai: " + trangthai;

		window.location.href='{link_frm}' + '&act=hienmodal&msbc=' + masobc;

		// Show the values in an alert
		//alert(values);
	}
</script>



<script>
	$("#multiple").select2({
		placeholder: "Chọn Khoa Phòng",
		allowClear: true
	});
</script>




<!-- END: main -->