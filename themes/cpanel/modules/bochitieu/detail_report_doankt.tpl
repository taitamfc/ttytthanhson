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
					BÁO CÁO ĐOÀN KIỂM TRA, ĐÁNH GIÁ CHẤT LƯỢNG BỆNH VIỆN NĂM {BC.nam}</th>
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
	<strong>SỞ Y TẾ PHÚ THỌ<br /> 
	TRUNG TÂM Y TẾ HUYỆN THANH SƠN<br /> 
	BIÊN BẢN KIỂM TRA, ĐÁNH GIÁ CHẤT LƯỢNG BỆNH VIỆN 
	<br/>KỲ ĐÁNH GIÁ {BC.tieude}</strong>
	<br /> (ÁP DỤNG CHO CÁC ĐOÀN KIỂM TRA CỦA CƠ QUAN QUẢN LÝ)</div> 
	{CF.donvi_bc2}
	<br/> 
	<strong>TÓM TẮT KẾT QUẢ TỰ KIỂM TRA CHẤT LƯỢNG BỆNH VIỆN</strong>
	<br/>                                  
	1. TỔNG SỐ CÁC TIÊU CHÍ ĐƯỢC ÁP DỤNG ĐÁNH GIÁ: {BC1.ct_dadg}/83 TIÊU CHÍ <br/>
	2. TỶ LỆ TIÊU CHÍ ÁP DỤNG SO VỚI 83 TIÊU CHÍ: {BC1.tile}% <br/>
	3. TỔNG SỐ ĐIỂM CỦA CÁC TIÊU CHÍ ÁP DỤNG: {BC1.tongdiem_dadg} (Có hệ số:{BC1.diem2x}) <br/>
	4. SỐ TIÊU CHÍ TĂNG ĐIỂM: {BC1.sotc_tang} <strong style="color:#3800ff">({BC1.ds_tang})</strong><br/>
	5. SỐ TIÊU CHÍ GIẢM ĐIỂM: {BC1.sotc_giam}  <strong style="color:#f00">({BC1.ds_giam})</strong><br/>
	6. SỐ TIÊU CHÍ GIỮ NGUYÊN ĐIỂM:{BC1.sotc_nguyen}  <br/>
	7. ĐIỂM TRUNG BÌNH CHUNG CỦA CÁC TIÊU CHÍ: {BC1.dtb_dadg} <br/>
	(Tiêu chí C3 và C5 có hệ số 2)<br/>
			
			<div class="col-sm-6">
				<table class="table table-bordered">
				<tbody>
				<tr>
					<td>KẾT QUẢ CHUNG CHIA THEO MỨC</td>
					<td>Mức 1</td>
					<td>Mức 2</td>
					<td>Mức 3</td>
					<td>Mức 4</td>
					<td>Mức 5</td><td>Tổng số tiêu chí</td>
				</tr>
				<tr>
					<td>5. SỐ LƯỢNG TIÊU CHÍ ĐẠT:</td>
					<td>{BC1.M1}</td>
					<td>{BC1.M2}</td>
					<td>{BC1.M3}</td>
					<td>{BC1.M4}</td>
					<td>{BC1.M5}</td>
					<td>{BC1.tong_dat}</td>
				</tr>
				<tr>
					<td>6. % TIÊU CHÍ ĐẠT:</td>
					<td>{BC1.tl1}</td>
					<td>{BC1.tl2}</td>
					<td>{BC1.tl3}</td>
					<td>{BC1.tl4}</td>
					<td>{BC1.tl5}</td>
					<td>100%</td>
				</tr>
				</tbody>
				</table>			
			</div>
		
		<div class="row">
			<table class="table table-borderless" style="width:90%">
				<tbody>
				<tr><td colspan="2" class="text-right">Ngày.........tháng..........năm.........</td> </tr>	
				<tr>	
				<td class="text-center">NGƯỜI ĐIỀN THÔNG TIN </br>(ký tên)	</td> 
				<td class="text-center">GIÁM ĐỐC BỆNH VIỆN <br/> (ký tên và đóng dấu)</td> 
				</tr>	
				</tbody>
			<table>
		</div>
		
		<div class="row">
			<table class="table table-borderless" style="width:100%">
				<tbody>
				<tr><td class="text-center;" style="text-transform: uppercase; ">
				<strong>BÁO CÁO TỰ KIỂM TRA, ĐÁNH GIÁ CHẤT LƯỢNG BỆNH VIỆN {BC.tieude} </strong></td></tr>				
				<tr><td class="text-left"><strong>I. KẾT QUẢ TỰ KIỂM TRA, ĐÁNH GIÁ CÁC TIÊU CHÍ CHẤT LƯỢNG</strong></td> </tr>	
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
		<div class="row">
			<table class="table table-borderless" style="width:100%">
				<tbody>
				<tr><td class="text-center;text-transform: uppercase; ">
				<strong>II. BẢNG TỔNG HỢP KẾT QUẢ CHUNG </strong></td></tr>	
				</tbody>
			<table>
		</div>
		
		<div class="row">
			<table class="table table-bordered border-primary" style="width:50%">
				<thead>
				<tr>
					<th>KẾT QUẢ CHUNG CHIA THEO MỨC</th>
					<th>Mức 1</th>
					<th>Mức 2</th>
					<th>Mức 3</th>
					<th>Mức 4</th>
					<th>Mức 5</th>
					<th>Điểm TB</th>
					<th>Số TC áp dụng</th>
				</tr>
				</thead>
				
				<tbody>
				<!-- BEGIN: chitieu2 -->
				<tr  style="color: #f00;font-weight: bold;" >
				<td>{R.chi_so}({R.sum})</td>
				<td class="text-center">{R.M1}</td>
				<td class="text-center">{R.M2}</td>
				<td class="text-center">{R.M3}</td>
				<td class="text-center">{R.M4}</td>
				<td class="text-center">{R.M5}</td>
				<td class="text-center">{R.dtb}</td>
				<td class="text-center">{R.sum}</td>
				</tr>
				<!-- BEGIN: loop -->
				<tr  style="color: #000;" >
				<td class="text-left phanhang">{Q.noidung}({KQ.sum})</td>
				<td class="text-center">{KQ.L1}</td>
				<td class="text-center">{KQ.L2}</td>
				<td class="text-center">{KQ.L3}</td>
				<td class="text-center">{KQ.L4}</td>
				<td class="text-center">{KQ.L5}</td>
				<td class="text-center">{KQ.dtb}</td>
				<td class="text-center">{KQ.sum}</td>
				</tr>				
				<!-- END: loop -->
				<!-- END: chitieu2 -->
				</tbody>
				
			<table>
		</div>
		
		<div class="row">					
			<table class="table table-bordered border-primary">
			<tbody>
			<tr>
				<td class=""><h5>III. TÓM TẮT CÔNG VIỆC KIỂM TRA BỆNH VIỆN</h5></td>
			</tr>
			<tr>
				<td class="phanhang" style="color:#000">{COM.content_iii}
				</td>
			</tr>
			</tbody>
			</table>
		</div>	
		<div class="row">	
			<div class="col-12">
				<div class="card-header-left">
				<h5>IV. BIỂU ĐỒ CÁC KHÍA CẠNH CHẤT LƯỢNG BỆNH VIỆN</h5> </div>	
			</div>	
				
			<div class="col-lg-12">
				<div class="badge-box">
				<div class="sub-title">a. Biểu đồ chung cho 5 phần (từ phần A đến phần E) </div>
				<div>
					<p style="width: 800px;margin: 0px auto;"><canvas id="Chart5p"  height="200"></canvas></p>
				</div>
			</div>
			
			<div class="col-lg-12">
				<div class="badge-box">
				<div class="sub-title">b. Biểu đồ riêng cho phần A (từ A1 đến A4) </div>
				<div>
					<p style="width: 800px;margin: 0px auto;">
					<canvas id="Chart_a"  height="200"></canvas>
					</p>
				</div>
			</div>
			
			<div class="col-lg-12">
				<div class="badge-box">
				<div class="sub-title">c. Biểu đồ riêng cho phần B (từ B1 đến B4) </div>
				<div>
					<p style="width: 800px;margin: 0px auto;">
					<canvas id="Chart_b"  height="200"></canvas>
					</p>
				</div>
			</div>
		
			<div class="col-lg-12">
				<div class="badge-box">
				<div class="sub-title">d. Biểu đồ riêng cho phần C (từ C1 đến C10) </div>
				<div>
					<p style="width: 800px;margin: 0px auto;">
					<canvas id="Chart_c"  height="200"></canvas>
					</p>
				</div>
			</div>
			
			<div class="col-lg-12">
				<div class="badge-box">
				<div class="sub-title">e. Biểu đồ riêng cho phần D (từ D1 đến D3) </div>
				<div>
					<p style="width: 800px;margin: 0px auto;">
					<canvas id="Chart_d"  height="200"></canvas>
					</p>
				</div>
			</div>
		
			<div class="col-lg-12" style="display:none">
				<div class="badge-box">
				<div class="sub-title">f. Biểu đồ riêng cho phần E (từ E1 đến E2) </div>
				<div>
					<p style="width: 800px;margin: 0px auto;">
					<canvas id="Chart_e"  height="200"></canvas>
					</p>
				</div>
			</div>
		
		
        </div>
		
		
		<div class="row">		
			<table class="table table-bordered border-primary">
			<tbody>
			<tr>
				<td class=""><h5>V. ĐOÀN KIỂM TRA ĐÁNH GIÁ CHUNG VỀ CHẤT LƯỢNG BỆNH VIỆN</h5>
				
				</td>
			</tr>
			<tr>
				<td class="phanhang" style="color:#000">{COM.content_v}</td>
			</tr>

			<tr>
				<td class=""><h5>VI. ĐOÀN KIỂM TRA ĐÁNH GIÁ VỀ ƯU ĐIỂM CỦA BỆNH VIỆN </h5>
				</td>
			</tr>
			<tr>
				<td class="phanhang"  style="color:#000">{COM.content_vi}</td>
			</tr>

			<tr>
				<td class=""><h5>VII. ĐOÀN KIỂM TRA ĐÁNH GIÁ VỀ NHƯỢC ĐIỂM, VẤN ĐỀ TỒN TẠI  </h5>
				</td>
			</tr>

			<tr>
				<td class="phanhang"  style="color:#000">{COM.content_vii}</td>
			</tr>

			<tr>
				<td class=""><h5>VIII. ĐOÀN KIỂM TRA ĐỀ XUẤT CÁC VẤN ĐỀ ƯU TIÊN CẦN CẢI TIẾN</h5>
				</td>
			</tr>
			<tr>
				<td class="phanhang"  style="color:#000">{COM.content_viii}</td>
			</tr>

			<tr>
				<td><h5>IX. Ý KIẾN PHẢN HỒI CỦA BỆNH VIỆN VỀ KẾT QUẢ KIỂM TRA </h5>
				</td>
			</tr>
			<tr>
				<td class="phanhang"  style="color:#000">{COM.content_ix}</td>
			</tr>
			<tr>
				<td><h5>X. KẾT LUẬN CỦA TRƯỞNG ĐOÀN KIỂM TRA </h5>
				</td>
			</tr>
			<tr>
				<td class="phanhang"  style="color:#000">{COM.content_x}</td>
			</tr>
			
			</tbody>
			</table>
		</div>	
		
		<div class="row">
			<table class="table table-borderless" style="width:90%">
				<tbody>
				<tr><td colspan="2" class="text-right">Ngày.........tháng..........năm.........</td> </tr>	
				<tr>	
				<td class="text-center">NGƯỜI ĐIỀN THÔNG TIN </br>(ký tên)	</td> 
				<td class="text-center">GIÁM ĐỐC BỆNH VIỆN <br/> (ký tên và đóng dấu)</td> 
				</tr>	
				</tbody>
			<table>
		</div>
			
			
			
			
			


		</div>			
	</div>
	
</div>

<script>
const options = {responsive: true,maintainAspectRatio: false,plugins: {legend:{display:false},labels: {render: 'value'}},
scale: {ticks: {stepSize: 0.5}}};
<!-- BEGIN: loopchart -->
new Chart(document.getElementById('{Ch.id}'), {
      type: 'radar',data: {labels: [{Ch.label}],
        datasets: [{data: [{Ch.value}],backgroundColor: ['#FF6384']}]
      },options: options});
<!-- END: loopchart -->

function view_report(a,token) {
	window.location=nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?token='+token+'_'+a.value+'_doankt';
}
</script>
<!-- END: main -->
