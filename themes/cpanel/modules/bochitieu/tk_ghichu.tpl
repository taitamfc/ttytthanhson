<!-- BEGIN: main -->
<script src="{URL_THEMES}/js/chart.js"></script>
<style>
.phanhang{white-space:pre-wrap; word-wrap:break-word}
</style>
<div class="col-sm-12">

<div class="card">	

<div class="table-responsive">
	<table class="table table-hover" >
            <thead>
				<tr>
                    <th colspan="12" class="text-center" style="text-transform: uppercase;">
					BÁO CÁO TỰ KIỂM TRA, ĐÁNH GIÁ CHẤT LƯỢNG BỆNH VIỆN NĂM {BC.nam}</th>
                </tr>
				<tr>
					<td class="text-center"> </td>
					<td class="text-right">
					<button class="btn btn-success" id="print" onclick="printDiv('block_rp','In Báo Cáo');" ><i class="fa fa-print"></i> Print</button>
					<button class="btn btn-warning" id="btnDoc" onclick="expWorld('block_rp','{filename}');" ><i class="fa fa-file-word-o"></i> Ms World</button>
					</td>
                </tr>
				
			</thead>
	</table>
</div>

<div class="card-block" id="block_rp">
	<div style="text-align: center;">
	<strong>SỞ Y TẾ PHÚ THỌ<br /> TRUNG TÂM Y TẾ HUYỆN THANH SƠN<br /> <br /> 
	THỐNG KÊ SỐ LƯỢNG GHI CHÚ ĐÁNH GIÁ </strong>
	<br /> 
		
		<div class="col-sm-12">
			<table  class="table table-bordered border-primary">
				<thead>
				<tr >
				<th class="text-center col-1 align-middle ">Mã số</th>
				<th class="text-center  align-middle">Chỉ tiêu</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Điểm kế hoạch</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Đoàn KT đánh giá {BC.namkia}</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Đoàn KT đánh giá {BC.namngoai}</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Khoa phòng tự đánh giá {BC.tieude}</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Hội đồng QLCL đánh giá {BC.tieude}</th>
				<th class="text-center  align-middle">Ghi chú</th>
				</tr>
				</thead>
				
				<tbody>
				<!-- BEGIN: chitieu -->
					<tr style="color: #4099ff;font-weight: bold;">
						<td class="text-center">{R.code}</td>
						<td class="text-left">{R.chi_so}({R.sl_chitieu})</td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						
					</tr>
					<!-- BEGIN: loop -->
					<tr style="color: #000;">
						<td class="text-center">{Q.code}</td>
						<td class="text-left phanhang">{Q.noidung}</td>
						<td class="text-center">{KQ.diem_kehoach}</td>
						<td class="text-center">{KQ.diem_namkia}</td>
						<td class="text-center">{KQ.diem_namngoai}</td>
						<td class="text-center">{KQ.diem_bvdg}</td>
						<td class="text-center">{KQ.diem_doandg}</td>
						<td class="text-left phanhang">{KQ.ghichu}</td>
					</tr>
					
					<!-- END: loop -->
				<!-- END: chitieu -->
				</tbody>
			<table>
		</div>
		</div>			
	</div>
</div>

<!-- END: main -->
