<!-- BEGIN: main -->
<style>
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
		font-size: 2rem;
	}
	.slide-1 .form-label {
		font-size: 1.5rem;
	}
	.slide-2 .form-label {
		font-size: 1.5rem;
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
	.slide-2 .form-control-static, .text-bold {
		font-weight: bold;
		color: red;
	}
</style>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active slide-1">
			<div class="container-fluid">
				<div class="mb-3">
					<h1 class="text-center text-danger">BÁO CÁO TRỰC NGÀY {item.title}<h1>
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
		<div class="item slide-2">
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
				</div>
			</div>
		</div>
		<div class="item  slide-3">
			<div class="container-fluid">
				<div class="mb-3">
					{FILE "baocaogiaoban/tong-so-benh-nhan-kham.tpl"}
				</div>
			</div>
		</div>
		<!-- Hoạt động điều trị -->
		<div class="item slide-4">
			<div class="container-fluid">
				<div class="mb-3">
					{FILE "baocaogiaoban/hoat-dong-dieu-tri.tpl"}
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
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="ti-arrow-left" aria-hidden="true"></span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="ti-arrow-right" aria-hidden="true"></span>
	</a>
</div>

<script>
	$(document).ready(function() {
		$('.carousel').carousel({
			interval:20000,
			pause:'hover',
		});
		$('input[type="number"], input[type="text"]').each( function(key,val){
            let oldVal = $(val).val();
            $(val).closest('td').append('<p class="form-control-static text-center text-bold">'+oldVal+'</p>')
            $(val).remove();
        });
	});
</script>
<!-- END: main -->