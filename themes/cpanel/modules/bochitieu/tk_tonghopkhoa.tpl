<!-- BEGIN: thang -->	
	<th class="text-center phanhang align-middle" colspan="3">{thang}</th>
<!-- END: thang -->	

<!-- BEGIN: thang_null -->		
	<td class="text-center">*</td>
	<td class="text-center">*</td>
	<td class="text-center">*</td>
<!-- END: thang_null -->
<!-- BEGIN: thang_danhgia -->		
	<td class="text-center">{KQ.diem_bvdg}</td>
	<td class="text-center">{KQ.diem_doandg}</td>
	<td class="text-center">{KQ.danhgia}</td>
<!-- END: thang_danhgia -->
<!-- BEGIN: thang_title -->	
	<td class="text-center align-middle phanhang">Số tiêu chí tăng điểm</td>
	<td class="text-center align-middle phanhang">Số tiêu chí giảm điểm</td>
	<td class="text-center align-middle phanhang">Số tiêu chí giữ nguyên điểm</td>
<!-- END: thang_title -->

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
	ĐÁNH GIÁ KẾT QUẢ THEO KHOA, PHÒNG </strong>
	<br /> 
		
		<div class="table-responsive col-sm-12">
			<table  class="table table-bordered ">
				
				<thead>
				<tr >
				<th class="text-center align-middle " rowspan="2" >TT</th>
				<th class="text-center col-3 align-middle" rowspan="2">KHOA PHÒNG</th>
				<th class="text-center  align-middle phanhang" rowspan="2">PHỤ TRÁCH</th>
				<th class="text-center  align-middle phanhang" rowspan="2">SỐ TIÊU CHÍ ĐƯỢC GIAO PHỤ TRÁCH</th>
				<th class="text-center  align-middle" colspan="3">KẾ HOẠCH</th>					
					{THANG}		
				</tr>
				<tr style="color: #4099ff;font-weight: bold;">
					<td class="text-center align-middle phanhang">Số tiêu chí tăng điểm</td>
					<td class="text-center align-middle phanhang">Số tiêu chí giảm điểm</td>
					<td class="text-center align-middle phanhang">Số tiêu chí giữ nguyên điểm</td>
					{THANG_TITLE}
				</tr>
				</thead>
				
				<tbody>
				
				
				<!-- BEGIN: dskhoa -->
					<tr style="color: #000;">
						<td class="text-center">{KHOA.stt}</td>
						<td class="text-left phanhang">{KHOA.tenkhoa}</td>
						<td class="text-left phanhang"><strong>{KHOA.phutrach}</strong></td>
						<td class="text-center">{KHOA.slchitieu}</td>
						<td class="text-center">{KHOA.kh_tangdiem}</td>
						<td class="text-center">{KHOA.kh_giamdiem}</td>
						<td class="text-center">{KHOA.kh_giunguyen}</td>
						
						<td class="text-center">{KHOA.sltangdiem}</td>
						<td class="text-center">{KHOA.slgiamdiem}</td>
						<td class="text-center">{KHOA.slgiunguyen}</td>
						{DANHGIA}
					</tr>
					
				<!-- END: dskhoa -->
				</tbody>
				</tfoot>
					<tr style="color: #000;font-weight: bold;">
						<td class="text-center" colspan="3">TỔNG CỘNG</td>
						
						<td class="text-center">{TK.slchitieu}</td>
						<td class="text-center">{TK.kh_tangdiem}</td>
						<td class="text-center">{TK.kh_giamdiem}</td>
						<td class="text-center">{TK.kh_giunguyen}</td>
						<td class="text-center">{TK.sltangdiem}</td>
						<td class="text-center">{TK.slgiamdiem}</td>
						<td class="text-center">{TK.slgiunguyen}</td>
						
					</tr>
					<tr style="color: #000;font-weight: bold;">
						<td class="text-center" colspan="10">
						<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return export_excel(this);">
						<input type="hidden" name="token" value="{export_excel}" />
						<button class="btn btn-success" type="submit">
							<strong> <i class="fa fa-file-excel-o"></i> TẢI BẢNG THỐNG KÊ </strong>
						</button>
						</form>
						</td>
						
					</tr>
				</tfoot>
				
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
