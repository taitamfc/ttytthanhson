<!-- BEGIN: main -->
<style>
.phanhang{white-space:pre-wrap; word-wrap:break-word}
</style>
<div class="col-sm-12">
<!-- BEGIN: header1 -->
	<div class="card">	
		<div class="card-header">
			<div class="card-header-right">
				<ul class="list-unstyled card-option">
					<li><i class="fa fa-chevron-left"></i></li>
					<li><div onclick="nv_baocao('{bc.link}','{bc.code}');" ><i class="fa fa-edit"></i></div></li>
					<li><i class="fa fa-refresh reload-card"></i></li>
					<li><i class="fa fa-times close-card"></i></li>
				</ul>
			</div>
		</div>
		<div class="card-block">                                            
			{bc.value} 
<!-- END: header1 -->
<div class="card">	
		<div class="card-header">
			<div class="card-header-right">
				<ul class="list-unstyled card-option">
					<li><i class="fa fa-chevron-left"></i></li>
					<li><div onclick="nv_baocao('{bc.link}','{bc.code}');" ><i class="fa fa-edit"></i></div></li>
					<li><i class="fa fa-refresh reload-card"></i></li>
					<li><i class="fa fa-times close-card"></i></li>
				</ul>
			</div>
		</div>
	<div class="card-block">
	<div style="text-align: center;text-transform: uppercase;">
	<strong>SỞ Y TẾ PHÚ THỌ<br /> 
	BÁO CÁO TỰ KIỂM TRA, ĐÁNH GIÁ CHẤT LƯỢNG BỆNH VIỆN 
	<br/>{apdung.tieude}</strong>
	<br /> (ÁP DỤNG CHO CÁC BỆNH VIỆN TỰ KIỂM TRA, ĐÁNH GIÁ)</div> 
	<strong>Bệnh viện: TRUNG TÂM Y TẾ HUYỆN THANH SƠN</strong><br /> 
	Địa chỉ chi tiết:Khu Tân Thịnh - TT Thanh Sơn - Thanh Sơn - Phú Thọ<br /> 
	Email: bvdkthanhson@gmail.com<br /> 
	Số giấy phép hoạt động:0165/SYT-GPHĐ Ngày cấp: 21/6/2013<br /> 
	Tuyến trực thuộc: 3.Quận/Huyện<br /> 
	Cơ quan chủ quản: SỞ Y TẾ PHÚ THỌ<br /> 
	Hạng bệnh viện: Hạng II<br /> 
	Loại bệnh viện: Đa khoa<br />
	
	<strong>TÓM TẮT KẾT QUẢ TỰ KIỂM TRA CHẤT LƯỢNG BỆNH VIỆN</strong>
	<br/>                                  
	1. TỔNG SỐ CÁC TIÊU CHÍ ĐƯỢC ÁP DỤNG ĐÁNH GIÁ: {BC1.ct_dadg}/83 TIÊU CHÍ <br/>
	2. TỶ LỆ TIÊU CHÍ ÁP DỤNG SO VỚI 83 TIÊU CHÍ: {BC1.tile}% <br/>
	3. TỔNG SỐ ĐIỂM CỦA CÁC TIÊU CHÍ ÁP DỤNG: {BC1.tongdiem_dadg} (Có hệ số: -) <br/>
	4. SỐ TIÊU CHÍ TĂNG ĐIỂM: {BC1.sotc_tang} (Mã số tiêu chí)<br/>
	5. SỐ TIÊU CHÍ GIẢM ĐIỂM: {BC1.sotc_giam}  (Mã số tiêu chí)<br/>
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
				<tr><td class="text-center;text-transform: uppercase; ">
				<strong>BÁO CÁO TỰ KIỂM TRA, ĐÁNH GIÁ CHẤT LƯỢNG BỆNH VIỆN {apdung.tieude} </strong></td></tr>				
				<tr><td class="text-left"><strong>I. KẾT QUẢ TỰ KIỂM TRA, ĐÁNH GIÁ CÁC TIÊU CHÍ CHẤT LƯỢNG</strong></td> </tr>	
				</tbody>
			<table>
		</div>
		
		<div class="col-sm-12">
			<table class="table table-bordered border-primary">
				<thead>
				<tr >
				<th class="text-center col-1 align-middle ">Mã số</th>
				<th class="text-center  align-middle">Chỉ tiêu</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Điểm kế hoạch</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Đoàn KT đánh giá {apdung.namkia}</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Đoàn KT đánh giá {apdung.namngoai}</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Bệnh viện tự đánh giá {apdung.tieude}</th>
				<th class="text-center  align-middle phanhang" style="text-transform: uppercase;">Đoàn KT đánh giá {apdung.tieude}</th>
				<th class="text-center  align-middle">Ghi chú</th>
				</tr>
				</thead>
				
				<tbody>
				<!-- BEGIN: chitieu -->
					<tr style="color: #4099ff;font-weight: bold;">
						<td class="text-center">{R.code}</td>
						<td class="text-left">{R.chi_so}</td>
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
						<td class="text-center">-</td>
						<td class="text-center">-</td>
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
				<td>{R.chi_so}</td>
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
				<td class="text-left phanhang">{Q.noidung}</td>
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
				<td class="deName2"><h5>V. TỰ ĐÁNH GIÁ VỀ CÁC ƯU ĐIỂM CHẤT LƯỢNG BỆNH VIỆN</h5>
				
				</td>
			</tr>
			<tr>
				<td>
				 
				</td>
			</tr>

			<tr>
				<td class="deName2"><h5>VI. TỰ ĐÁNH GIÁ VỀ CÁC NHƯỢC ĐIỂM, VẤN ĐỀ TỒN TẠI </h5>
				</td>
			</tr>
			<tr>
				<td>
				 
				</td>
			</tr>

			<tr>
				<td class="deName2"><h5>VII. XÁC ĐỊNH CÁC VẤN ĐỀ ƯU TIÊN CẢI TIẾN CHẤT LƯỢNG </h5>
				</td>
			</tr>

			<tr>
				<td>
				 
				</td>
			</tr>

			<tr>
				<td class="deName2"><h5>VIII. GIẢI PHÁP, LỘ TRÌNH, THỜI GIAN CẢI TIẾN CHẤT LƯỢNG</h5>
				</td>
			</tr>
			<tr>
				<td>
				 
				</td>
			</tr>

			<tr>
				<td><h5>IX. KẾT LUẬN, CAM KẾT CỦA BỆNH VIỆN CẢI TIẾN CHẤT LƯỢNG</h5>
				</td>
			</tr>
			<tr>
				<td>
				 
				</td>
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


<!-- Modal start -->
<div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialogdetail modal-lg" role="document">
        <div class="modal-content">
		<div class="modal-header" style="background-color: #b2f3fd;">
			<div class="breadcrumb-header"><strong>CHỈNH SỬA BÁO CÁO</strong></div>
		 </div>
		<div class="card borderless-card" style="margin-bottom: 0px;">
		<form name="myform" id="myform" method="post" action="{link_frm}" >
			<input type="hidden" name="token" id="checkss" value="{CHECKSESS}" />
			<input type="hidden" name="sta" id="sta" value="updatevalue" />
			<input type="hidden" name="code" id="idbc" value="0" />
			
			<div class="card-block">                
                <div class="page-header-breadcrumb"><span id="modal_bodydetail"></span>  </div>
			   <div class="card-header-right">
				<button class="bsubmit btn btn-success" type="submit">
							<em class="fa fa-save"> </em> Cập nhật</button>
					<button type="button" class="btn btn-danger btn-sm btn-round" data-dismiss="modal" style="float:right">Đóng</button>
			   </div>
            </div>
		</form>	
			
		</div>
		
        </div>
		
    </div>
</div>
<!-- Modal end -->
<script> //onsubmit="return nv_executebc(this);"
function nv_baocao(url,a='') {
		document.getElementById("idbc").value=a; 
		var c = []; 
		$.ajax({
                    url : url,
                    type : 'get',
                    dataType : 'text',
                    success : function (result){
						detail(result,' ');
                    }
                });
		
		return !1;	
}
function nv_executebc(a) {
		if (confirm('Bạn có chắc chắn sẽ cập nhật?')) 
		{
		var c = []; 
		c.type = $(a).prop("method"); c.url = $(a).prop("action"); c.data = $(a).serialize();
		$(a).find("input,button,select,textarea, a").removeClass("has-error");
		$(a).find("input,button,select,textarea, a").prop("disabled", !0);
		$.ajax({
				url : c.url,
				cache: !1,
				data:c.data,
				type : c.type,
				dataType : 'json',
				success : function (result){
				alert(result.mess);$(a).find("input,button,select,textarea, a").prop("disabled", !1);
				if(result.status == "ok") location.reload();
				}
			});
		}
		return !1;	
}
</script>

<!-- END: main -->
<div class="card-header">
                <h4 class="" style="text-transform: uppercase;color: #4099ff;">BÁO CÁO Kỳ đánh giá 06 tháng năm 2023</h4>
            </div>	