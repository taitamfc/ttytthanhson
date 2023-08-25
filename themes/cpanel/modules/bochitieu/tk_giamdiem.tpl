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
					<td class="text-center"> 
					<div class="btn col-sm-9" style="text-align: right;"> 
						<span style="font-weight:Bold">CHỌN THÁNG XEM BÁO CÁO:</span></div>
					<div class="btn col-sm-3">
						<select onchange="view_report(this,'{CHECKSESS}');" 
						name="select_month" class="btn btn-mat btn-primary"
						style="font-weight: bold;float: left;" >
							<!-- BEGIN: thang -->
							<option value="{r.id}" {r.select}>{r.name}</option>
							<!-- END: thang -->
						</select>
					</div>
					</td>
					<td class="text-right">
					<button class="btn btn-success" id="print" onclick="printDiv('block_rp','In Báo Cáo');" ><i class="fa fa-print"></i> Print</button>
					<button class="btn btn-warning" id="btnDoc" onclick="expWorld('block_rp','{filename}');" ><i class="fa fa-file-word-o"></i> Ms World</button>
					</td>
                </tr>
				
			</thead>
	</table>
</div>

<div class="card-block" id="block_rp">
	<div style="text-align: center;text-transform: uppercase;">
	<strong>SỞ Y TẾ PHÚ THỌ<br /> TRUNG TÂM Y TẾ HUYỆN THANH SƠN<br /> <br /> 
	THỐNG KÊ CÁC TIÊU CHÍ GIẢM ĐIỂM 
	<br/>KỲ ĐÁNH GIÁ {BC.tieude}</strong>
	<br /> (ÁP DỤNG CHO CÁC KHOA PHÒNG TỰ KIỂM TRA, ĐÁNH GIÁ)</div> 
		<div class="row">
			<table class="table table-borderless" style="width:100%">
				<tbody>
				<tr><td class="text-center;" style="text-transform: uppercase; ">
				<strong>BÁO CÁO TỰ KIỂM TRA, ĐÁNH GIÁ CHẤT LƯỢNG BỆNH VIỆN {BC.tieude} </strong></td></tr>				
				<tr><td class="text-left"><strong>I. KẾT QUẢ TỰ KIỂM TRA, ĐÁNH GIÁ CÁC TIÊU CHÍ CHẤT LƯỢNG GIẢM ĐIỂM</strong></td> </tr>	
				</tbody>
			<table>
		</div>
		
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

<script>
function view_report(a,token) {
	window.location=nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?token='+token+'_'+a.value+'_bv';
}
</script>
<!-- END: main -->
