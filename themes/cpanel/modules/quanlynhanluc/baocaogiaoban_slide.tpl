<!-- BEGIN: main -->
<!-- Chartlist chart css -->
<link rel="stylesheet" type="text/css" href="{URL_THEMES}/assets/css/chartist/chartist.css">
<!-- Morris Chart js -->
<script src="{URL_THEMES}/assets/js/raphael/raphael.min.js"></script>
<script src="{URL_THEMES}/assets/js/morris.js/morris.js"></script>
<style>
	.morris-hover {
		width: 400px;
		/* display: flex; */
		/* gap: 10px; */
	}
	.carousel-control {
		width: 25px;
		height: 29px;
		background: black;
		top: 50%;
	}

	.carousel-inner .item {
		min-height: 600px;
		background: white;
		border-radius: 10px;
		padding: 15px;
	}

	p.form-control-static {
		font-size: 17px;
	}

	.item * {
		font-size: 1.3rem;
	}

	.slide-1 .form-control-static {
		font-size: 1.5rem;
	}

	.slide-1 .form-label {
		font-size: 1.5rem;
	}

	.slide-2 .form-label {
		font-size: 1.5rem;
	}

	.slide-3 tr *,
	.slide-4 tr * {
		padding-bottom: 0px !important;
		padding-top: 0px !important;
		line-height: unset !important;
		height: 1px !important;
		margin-bottom: 0px !important;
	}

	.slide-4 * {
		font-size: 1.2rem !important;
	}

	div#admintoolbar {
		display: none !important;
	}

	div.multi-report div {
		border-bottom: 1px solid #ccc;
		margin-bottom: 5px;
		padding-bottom: 5px;
	}

	div.multi-report div:last-child {
		border: none !important;
	}

	.slide-2 .form-control-static,
	.text-bold {
		font-weight: bold;
		color: red;
	}

	.slide-large-font {
		font-size: 50px;
	}

	#line-chart {
		width: 100%;
		min-height: 250px;
	}
	.chart-wrapper * {
		font-size: 12px !important;
	}

	.morris-hover .morris-hover-point {
		min-width: 120px;
		display: block;
		float: left;
	}
	/* .cart-chart {
		position: absolute;
		opacity: 0;
	} */
</style>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active slide-1">
			<div class="container-fluid">
				<div class="mb-3">
					<h1 class="text-center text-danger slide-large-font">BÁO CÁO TRỰC NGÀY {item.title}<h1>
				</div>
				<div class="mb-3">
					<label class="form-label">I – THÀNH PHẦN TRỰC</label>
					<div class="row">
						<div class="col-lg-12">
							<label class="form-label">Trực lãnh đạo:</label>
							<p class="form-control-static">{item.truc_lanh_dao}
							<p>
						</div>
						<div class="col-lg-12">
							<label class="form-label">Trực bác sĩ:</label>
							<p class="form-control-static">{item.truc_bac_sy}
							<p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item slide-2 chart" id="chart-tong_benh_nhan_kham">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label">
						II – TÌNH HÌNH BỆNH NHÂN <br>
						1 . Tổng số bệnh nhân khám :</label>
					<div class="row">
						<div class="col-lg-6 ">
							<label class="form-label text-danger">1.1. Khoa Khám bệnh</label>
							{FILE "baocaogiaoban_show/tinh_hinh_benh_nhan/khoa-kham-benh.tpl"}
						</div>
						<div class="col-lg-6 ">
							<label class="form-label text-danger">1.2. Phòng khám ĐK Phú Thứ </label>
							{FILE "baocaogiaoban_show/tinh_hinh_benh_nhan/phong-kham-da-khoa.tpl"}
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button class="btn btn-info btn-sm" onclick="chart_tong_benh_nhan_kham()">Xem biểu đồ</button>
							<div class="card cart-chart">
								<div class="card-block">
									<div class="chart-wrapper" id="tong_benh_nhan_kham"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item  slide-3 chart" id="chart-ti_le_vao_vien">
			<div class="container-fluid">
				<div class="mb-3">
					{FILE "baocaogiaoban/tong-so-benh-nhan-kham.tpl"}
				</div>
				<div class="row">
					<div class="col-12">
						<button class="btn btn-info btn-sm" onclick="chart_ti_le_vao_vien()">Xem biểu đồ</button>
						<div class="card cart-chart">
							<div class="card-header">
								<!-- <h5>Tổng số bệnh nhân toàn viện</h5>
								<span>Số liệu thống kê dựa vào các khoa phòng cung cấp</span> -->
								<div class="card-header-right">
									<!-- <div class="label-main">
										<a title="Dữ liệu xem trong 7 ngày" onclick="get_bn(7);"
											class="label label-primary">07 ngày</a>
									</div> -->
								</div>
							</div>
							<div class="card-block">
								<div class="chart-wrapper" id="ti_le_vao_vien"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Hoạt động điều trị -->
		<div class="item slide-4 chart" id="chart-tong_benh_nhan_dieu_tri">
			<div class="container-fluid">
				<div class="mb-3 center-th">
					{FILE "baocaogiaoban/hoat-dong-dieu-tri.tpl"}
				</div>
				<div class="row">
					<div class="col-12">
					<button class="btn btn-info btn-sm ml-3" onclick="chart_tong_benh_nhan_dieu_tri()">Xem biểu đồ</button>
						<div class="card card-chart ml-3">
							<div class="card-header">
								<h5>Tổng số bệnh điều trị</h5>
							</div>
							<div class="card-block">
								<div class="chart-wrapper" id="tong_benh_nhan_dieu_tri"></div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="card card-chart">
							<div class="card-header">
								<h5>Tổng số bệnh điều trị yêu cầu</h5>
							</div>
							<div class="card-block">
								<div class="chart-wrapper" id="tong_benh_nhan_dieu_tri_yeu_cau"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item slide-5">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label text-danger">
						3. BỆNH NHÂN MỔ CẤP CỨU
					</label>
					{FILE "baocaogiaoban_show/benh_nhan_mo_cap_cuu.tpl"}
				</div>
			</div>
		</div>
		<div class="item slide-6">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label text-danger">
						4. BỆNH NHÂN MỔ PHIÊN
					</label>
					{FILE "baocaogiaoban_show/benh_nhan_mo_phien.tpl"}
				</div>
			</div>
		</div>
		<div class="item slide-7">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label text-danger">
						5. BỆNH NHÂN CHUYỂN TUYẾN:
					</label>
					{FILE "baocaogiaoban_show/benh_nhan_chuyen_tuyen.tpl"}
				</div>
			</div>
		</div>

		<div class="item slide-8">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label text-danger">
						6. BỆNH NHÂN THEO DÕI
					</label>
					{FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-hscc.tpl"}
				</div>
			</div>
		</div>

		<div class="item slide-9">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label text-danger">
						6. BỆNH NHÂN THEO DÕI
					</label>
					{FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-ngoai.tpl"}
				</div>
			</div>
		</div>

		<div class="item slide-10">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label text-danger">
						6. BỆNH NHÂN THEO DÕI
					</label>
					{FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-phu-san.tpl"}
				</div>
			</div>
		</div>

		<div class="item slide-11">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label text-danger">
						6. BỆNH NHÂN THEO DÕI
					</label>
					{FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-noi.tpl"}
				</div>
			</div>
		</div>

		<div class="item slide-12">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label text-danger">
						6. BỆNH NHÂN THEO DÕI
					</label>
					{FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-nhi.tpl"}
				</div>
			</div>
		</div>

		<div class="item slide-13">
			<div class="container-fluid">
				<div class="mb-3">
					<label class="form-label text-danger">
						6. BỆNH NHÂN THEO DÕI
					</label>
					{FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-yhct.tpl"}
				</div>
			</div>
		</div>

	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="ti-arrow-left" aria-hidden="true"></span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="ti-arrow-right" aria-hidden="true"></span>
	</a>
</div>

<script>
	$(document).ready(function() {
		$('.carousel').carousel({
			interval: false,
			pause: 'hover',
		});

		$('#myCarousel').on('slid.bs.carousel', function(e) {
			var chart_id = e.relatedTarget.id;
			switch (chart_id && false) {
				case 'chart-tong_benh_nhan_kham':
					chart_tong_benh_nhan_kham();
					break;
				case 'chart-ti_le_vao_vien':
					chart_ti_le_vao_vien();
					break;
				case 'chart-tong_benh_nhan_dieu_tri':
					chart_tong_benh_nhan_dieu_tri();
					break;
			
				default:
					break;
			}
			
			
		})
		$('input[type="number"], input[type="text"]').each(function(key, val) {
			let oldVal = $(val).val();

			if ($(val).hasClass('f_auto') || $(val).hasClass('f_auto_col') || $(val).hasClass(
					'tong_so_phantram')) {
				$(val).closest('td').append('<p class="form-control-static text-center text-bold">' +
					oldVal + '</p>')
			} else {
				$(val).closest('td').append(
					'<p class="form-control-static text-center text-bold text-dark">' + oldVal + '</p>'
				)
			}
			$(val).remove();
		});
});
function chart_tong_benh_nhan_kham(){
	// Tổng số bệnh nhân khám
		$.ajax({
			type: 'post',
			cache: !1,
			url: 'index.php?nv=quanlynhanluc&op=baocaogiaoban_add&is_ajax=1&task=tong_benh_nhan_kham',
			dataType: "json",
			success: function(res) { //alert(d);
				$('#tong_benh_nhan_kham').empty();
				window.lineChart = Morris.Line({
					element: 'tong_benh_nhan_kham',
					data: res.data,
					xkey: ['ngay'],
					xLabelFormat: function (da) {return ("0" + da.getDate()).slice(-2) + '/' + ("0" + (da.getMonth() + 1)).slice(-2);},
					redraw: true,
					ykeys: res.ykeys,
					hideHover: 'auto',
					labels: res.labels,
					lineColors: res.lineColors,
					resize: true
				});
			}
	}); 
}
function chart_ti_le_vao_vien(){
	// Tổng số bệnh nhân khám
		$.ajax({
			type: 'post',
			cache: !1,
			url: 'index.php?nv=quanlynhanluc&op=baocaogiaoban_add&is_ajax=1&task=ti_le_vao_vien',
			dataType: "json",
			success: function(res) { //alert(d);
				$('#ti_le_vao_vien').empty();
				window.lineChart = Morris.Line({
					element: 'ti_le_vao_vien',
					data: res.data,
					xkey: ['ngay'],
					xLabelFormat: function (da) {return ("0" + da.getDate()).slice(-2) + '/' + ("0" + (da.getMonth() + 1)).slice(-2);},
					redraw: true,
					ykeys: res.ykeys,
					hideHover: 'auto',
					labels: res.labels,
					lineColors: res.lineColors,
					resize: true
				});
			}
		}); 
}
function chart_tong_benh_nhan_dieu_tri(){
	$.ajax({
		type: 'post',
		cache: !1,
		url: 'index.php?nv=quanlynhanluc&op=baocaogiaoban_add&is_ajax=1&task=tong_benh_nhan_dieu_tri',
		dataType: "json",
		success: function(res) { //alert(d);
			$('#tong_benh_nhan_dieu_tri').empty();
			window.lineChart = Morris.Line({
				element: 'tong_benh_nhan_dieu_tri',
				data: res.data,
				xkey: ['ngay'],
				xLabelFormat: function (da) {return ("0" + da.getDate()).slice(-2) + '/' + ("0" + (da.getMonth() + 1)).slice(-2);},
				redraw: true,
				ykeys: res.ykeys,
				hideHover: 'auto',
				labels: res.labels,
				lineColors: res.lineColors,
				resize: true
			});
		}
	}); 
	$.ajax({
		type: 'post',
		cache: !1,
		url: 'index.php?nv=quanlynhanluc&op=baocaogiaoban_add&is_ajax=1&task=tong_benh_nhan_dieu_tri_yeu_cau',
		dataType: "json",
		success: function(res) { //alert(d);
			$('#tong_benh_nhan_dieu_tri_yeu_cau').empty();
			window.lineChart = Morris.Line({
				element: 'tong_benh_nhan_dieu_tri_yeu_cau',
				data: res.data,
				xkey: ['ngay'],
				xLabelFormat: function (da) {return ("0" + da.getDate()).slice(-2) + '/' + ("0" + (da.getMonth() + 1)).slice(-2);},
				redraw: true,
				ykeys: res.ykeys,
				hideHover: 'auto',
				labels: res.labels,
				lineColors: res.lineColors,
				resize: true
			});
		}
	}); 
}
</script>
<!-- END: main -->