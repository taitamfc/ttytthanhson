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
	<td class="text-center phanhang">Bệnh viện tự đánh giá {thang}</td>
	<td class="text-center phanhang">Đoàn KT đánh giá {thang}</td>
	<td class="text-center phanhang">Đánh giá </td>
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
	<strong>{LANG.tieude_bc} <br /> 
	BẢNG ĐIỂM KẾ HOẠCH 83 TIÊU CHÍ CHẤT LƯỢNG BỆNH VIỆN NĂM {BC.nam} </strong>
	<br /> 
		
		<div class="table-responsive col-sm-12">
			<table  class="table table-bordered ">
				
				<thead>
				<tr >
				<th class="text-center align-middle " rowspan="2" >TT</th>
				<th class="text-center col-3 align-middle" colspan="2" rowspan="2">PHẦN, MỤC, MÃ, TÊN VÀ SỐ LƯỢNG TIÊU CHÍ</th>
				<th class="text-center  align-middle phanhang" rowspan="2">Khoa/Phòng <br/>Phụ trách</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;" rowspan="2">
					Điểm kế hoạch</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;" rowspan="2">
					Đoàn KT đánh giá {BC.namkia}</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;" rowspan="2">
					Đoàn KT đánh giá {BC.namngoai}</th>
					{THANG}		
				</tr>
				</thead>
				
				<tbody>
				<tr style="color: #4099ff;font-weight: bold;">
					<td class="text-center"></td>
					<td class="text-left" colspan="2" ></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					{THANG_TITLE}
				</tr>
				
				<!-- BEGIN: chitieu -->
					<tr style="color: #4099ff;font-weight: bold;">
						<td class="text-center"></td>
						<td class="text-left" colspan="2"> {R.chi_so}({R.sl_chitieu})</td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						{THANG_NULL}	
					</tr>
				<!-- BEGIN: chuong -->
					<tr style="color: #4099ff;font-weight: bold;">
						<td class="text-center"></td>
						<td class="text-left col-1" colspan="2" >CHƯƠNG {chuong.noidung}({chuong.sl_chitieu})</td>
						<td class="text-center" style="text-transform: uppercase;">{chuong.phongxuly}</td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						{THANG_NULL}				
						
					</tr>
					
					<!-- BEGIN: loop -->
					<tr style="color: #000;">
						<td class="text-center">{KQ.stt}</td>
						<td class="text-center ">{Q.code}</td>
						<td class="text-left phanhang">{Q.noidung}</td>
						<td class="text-center"> </td>
						<td class="text-center">{KQ.diem_kehoach}</td>
						<td class="text-center">{KQ.diem_namkia}</td>
						<td class="text-center">{KQ.diem_namngoai}</td>
						
						{DANHGIA}
						
					</tr>
					
					<!-- END: loop -->
				<!-- END: chuong -->
				<!-- END: chitieu -->
				</tbody>
				</tfoot>					
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
