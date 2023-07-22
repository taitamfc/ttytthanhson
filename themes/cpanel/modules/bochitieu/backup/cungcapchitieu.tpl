	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
	<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="{BASE_URL}assets/js/language/jquery.ui.datepicker-vi.js"></script>
<div id="imagePreview{CS.id}" class="row"></div>
<!-- BEGIN: getvalue -->
<div >
<div class="row">
	<div style="border-color: #2ed8b6;">
		<strong>{CH.code}: {CH.noidung}</strong>
		
		 <form id="frm_upload" method="post" enctype="multipart/form-data" action="{link_frm}">
			<input type="hidden" name="id_cauhoi" id="id_cauhoi" value="{CH.id}" />
			<input type="hidden" name="dinhdanh" id="dinhdanh" value="{dinhdanh}" />
			<input type="hidden" name="token" id="token" value="{token}" />
		 </form>
		 
	</div>
</div>
<div class="row">
<!-- BEGIN: select -->
	<div class="ks-cboxtags">
            <input type="checkbox" id="check{lev}"  value="1" onclick="checkAllLevel({lev},this);">
            <label for="check{lev}">Chọn toàn bộ mức {lev}</label>
    </div>
<!-- END: select -->
</div>
<div class="row">
<button onclick="copydanhgia();" class="btn btn-out-dashed btn-primary btn-square btn-block">
<i class="icofont icofont-user-alt-3"></i><strong>COPY ĐÁNH GIÁ TỪ BV SANG ĐOÀN KT</strong></button>

</div>

<div class="row">
<div style="width: 100%;">
	<table class="table align-middle">
        <thead>
			<tr>
                <th  class="text-center">Mức</th>
                <th  scope="col">Nội dung</th>
                <th  class="text-center">BV <br/>đánh giá</th>
                <th  class="text-center">Đoàn <br/>đánh giá</th>
                <th  class="text-center">Đính <br/> kèm</th>
            </tr>
        </thead>
        <tbody>
		<!-- BEGIN: loop -->
			<tr>
                <td style="background-color:{CS.color};color:#fff" class="text-center align-middle">
				<strong>{CS.code}</strong></td>
                <td style="white-space:pre-wrap; word-wrap:break-word">-{CS.noidung}	
				</td>
                <td class="text-center align-middle"> 
					<div class="ks-cboxtags">
							<input onchange="checkBV();" class="level_{CS.code}_1" type="checkbox" id="checkBV{CS.id}" value="1" {CS.bv_check} name="checks_bv[]">
							<label for="checkBV{CS.id}">Đạt</label>
					</div>
				</td>
                <td class="text-center align-middle"> 

					<div class="ks-cboxtags">
							<input onchange="checkBV();" class="level_{CS.code}_2" type="checkbox" id="checkKT{CS.id}" name="checks_kt[]" value="1" {CS.doan_check}>
							<label for="checkKT{CS.id}">Đạt</label>
					</div>

			    </td>
				<td class="text-center align-middle"> 
					<input type="hidden" name="txt_image{CS.id}" id="id_image{CS.id}" />
                    <input type="hidden" name="txt_url{CS.id}" id="id_txturl{CS.id}" />
						<div class="row">
							<div class="custom-file" style="width: 100%;">
							  <input style="display:none" id="file{CS.id}" name="file{CS.id}" type="file" required="required" class="form-control" 
							  onchange="sendfile('#frm{CS.id}',{CS.id});">
							  <label title="Tải hình ảnh đính kèm" class="btn btn-warning btn-mini waves-effect waves-light " for="file{CS.id}">
							  <i class="icofont icofont-upload-alt"></i></label>
							</div>
							<div style="width: 100%; {CS.showfile}" id="view{CS.id}">
								<label onclick="openForm('{link_viewfile}');" title="Xem lại hình ảnh"  
								class="btn btn-success btn-mini waves-effect waves-light ">
								<i class="icofont icofont-eye-alt"></i> </label>
							</div>
						</div>
			    </td>
				
				
            </tr>
		<!-- END: loop -->
        </tbody>
		
	</table>
	<form id="frm_ghichu" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
			<input type="hidden" name="id_cauhoi" id="id_cauhoi" value="{KQ.id}" />
			<input type="hidden" name="dinhdanh" id="dinhdanh" value="{dinhdanh}" />
			<input type="hidden" name="token" id="token" value="{dinhdanh}" />
			<input type="hidden" name="sta" value="updateghichu" />
			<table class="table align-middle">
        <thead>        
			<tr> 
			<td colspan="2"><strong>Ghi chú: (Nếu có)</strong></td> 
			</tr>
			<tr> 
			<td>
			<textarea name="ghichu" rows="2" class="form-control"> {KQ.ghichu}</textarea></td> 
			<td class="text-center col-1">
			<button type="submit" title="Lưu ghi chú"  class="btn btn-success waves-effect waves-light ">
				<i class="icofont icofont-save"></i><br/>Lưu
			</button>
			</td> 
			</tr>
		</thead>
		</table>
	</form>
</div>
</div>

</div>

<div class="table-responsive">
    
	
		<form name="myform{TS.no}" id="myform{TS.no}" method="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
			<input type="hidden" name="checkss" id="token" value="{checkss}" />
			<input type="hidden" name="token" id="token" value="{token}" />
			<input type="hidden" name="sta" id="sta" value="updatechiso" />
			<input type="hidden" name="id" id="id" value="{TS.id}" />
		<table class="table table-hover" >	
			<!-- BEGIN: chiso -->
				<tr>									
					 <th class="text-left col-1">{CS.stt}.{CS.giatri}:</th>
					 <td class="text-center"> 
					 <input {ROW.lock} onchange="checkValue($(this))" id="ketqua[]" name="ketqua[]" 
					 value="{CS.kq}" type="text" class="dataValue form-control">
					</td>									
				</tr>
			<!-- END: chiso -->	
		</table>	
		</form>			
		
</div>
<!-- END: getvalue -->


<!-- BEGIN: main -->
<style>
.phanhang{white-space:pre-wrap; word-wrap:break-word}
</style>
<!-- Page-header start -->
    <!-- Page-header end -->
	<div class="col-sm-12">
        <!-- Tooltips on textbox card start -->
        <div class="card">
            <div class="card-header">
                <h5 class="m-b-10" style="text-transform: uppercase;">CHI TIẾT KIỂM TRA BỆNH VIỆN {namapdung}</h5>
            </div>			
			<div style="padding:0px 25px;">
			
			<div class="table-responsive" style="padding-bottom: 100px;">
                    <table class="table table-hover" >
                        <thead>
							<tr style="background-color: #2ed8b6; color: #fff;min-height:50px;text-transform: uppercase;">
                                <th colspan="10" class="align-middle">Chỉ tiêu: {ROW.chi_so}</th>
                            </tr>
                            
                        </thead>
                        <tbody>
					</table>
						<!-- BEGIN: solan -->
						<form name="myform{TS.no}" id="myform{TS.no}" metdod="post" action="{link_frm}" onsubmit="return nv_execute_update(this);">
							<input type="hidden" name="checkss" id="token" value="{checkss}" />
							<input type="hidden" name="token" id="token" value="{token}" />
							<input type="hidden" name="sta" id="sta" value="updatechiso" />
							<input type="hidden" name="id" id="id" value="{TS.id}" />
						<table class="table table-hover" >	
								<tr>									
									 <th class="text-left col-1">Mã số:</th>
									 <th class="text-center"> Chỉ tiêu</th>									
									 <th class="text-left"> Kế hoạch</th>									
									 <th class="text-center"> Đoàn KT đánh giá <br/>{log1} </th>									
									 <th class="text-center"> Đoàn KT đánh giá <br/>{log}</th>
									 <th class="text-center"> BV tự đánh giá <br/>{namapdung} </th>									
									 <th class="text-center"> Đoàn KT đánh giá <br/>{namapdung}</th>
									 <th class="text-center"> Thao tác </th>
								</tr>
								<!-- BEGIN: chiso -->
								<tr style="color: #f00;font-weight: bold;">									
									<td class="text-center">{CS.code}</td>
									<td class="text-left phanhang">-{CS.noidung}</td>
									
									<td class="text-center"> </td>
									<td class="text-center"> </td>
									
									<td class="text-center"> 
									<!-- BEGIN: khoaphong -->
									<select onchange="phanloaiphong(this,'{token_phong}');" style="color: #4099ff;width:200px" name="list_khoacungcap" 
									class="form-control khoacungcap" >
										<!-- BEGIN: khoacungcap -->
										<option value="{r.id}" {r.select}>{r.name}</option>
										<!-- END: khoacungcap -->
									</select>
									<!-- END: khoaphong -->
									</td>									
									<td class="text-center"> </td>
									<td class="text-center"> </td>	
									<td class="text-center"> </td>	
									
								</tr>
								
								<!-- BEGIN: loop -->
								<tr>									
									<td class="text-center">{Q.code}</td>
									<td class="text-left phanhang">-{Q.noidung} 
										<!-- BEGIN: ghichu --><div style="color:#ccc">{KQ.ghichu}</div><!-- END: ghichu -->
									</td>									
									
									<td class="text-center"> 
										<!-- BEGIN: user -->
										<div class="btn label-inverse-default">
										<span  style="font-weight: bold;color:#f00">{KQ.diem_kehoach}</span></div>
										<!-- END: user -->
										<!-- BEGIN: qlchatluong -->
										<select onchange="diemkehoach(this, '{Q.token}');" style="color: #f00;width:200px" name="list_diem" 
										class="form-control text-center col-4" >
											<!-- BEGIN: diem -->
											<option value="{r.id}" {r.select}>{r.name}</option>
											<!-- END: diem -->
										</select>										
										<!-- END: qlchatluong -->
									</td>
									
									<td class="text-center"> 
										<div class="btn label-inverse-default">
										<span  style="font-weight: bold;color:#000">-</span></div>
									</td>
									
									<td class="text-center"> 
										<div class="btn label-inverse-default">
										<span style="font-weight: bold;color:#000">{LOG.diem_doandg}</span></div>
									</td>
									
									<td class="text-center"> 
										<div class="btn btn-primary">
										<span style="font-weight: bold;" id="bv{Q.id}">{KQ.diem_bvdg}</span></div>
									</td>									
									<td class="text-center"> 
										<div class="btn btn-primary">
										<span style="font-weight: bold;" id="kt{Q.id}">{KQ.diem_doandg}</span></div>
									</td>
									<td class="text-center"> 
									<div class="btn btn-danger" onclick="nv_danhgia('{link_frm}&sta=getvalue&code={Q.token}');"><i class="ti-pencil-alt"></i></div>									
									</td>								
								</tr>
								
								
								<!-- END: loop -->
								
							<!-- END: chiso -->	
								
						</table>	
						</form>		
						<!-- END: solan -->		
						
                </div>
           </div>
		
        <!-- Tooltips on textbox card end -->
    </div>
    </div>


<!-- Modal start -->
<div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialogdetail modal-lg" role="document">
        <div class="modal-content">
		<div class="modal-header" style="background-color: #b2f3fd;">
			<div class="breadcrumb-header"><strong>CHI TIẾT ĐÁNH GIÁ</strong></div>
		 </div>
		<div class="card borderless-card" style="margin-bottom: 0px;">
			<div class="card-block">                
                <div class="page-header-breadcrumb"><span id="modal_bodydetail"></span>  </div>
			   <div class="card-header-right">
					<button type="button" class="btn btn-danger btn-sm btn-round" data-dismiss="modal" style="float:right">Đóng</button>
					
			   </div>
            </div>
			
		</div>
		
        </div>
		
    </div>
</div>
<!-- Modal end -->

<script>
	function diemkehoach(a,id=''){
	var url=nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?sta=setdiemkehoach&token='+id+'_'+a.value;
		if (confirm('Bạn có chắc chắn cập nhật điểm kế hoạch này?')) {
        $.post(url, 'token=' + a, function(res) {
            var r_split = res.split("_");
            if (r_split[0] == 'OK') {//alert(r_split[1]); //location.reload();
                  
            } else if (r_split[0] == 'ERR') {
                alert(r_split[1]);
            } 
        });
    }
	return false;
}
</script>

<!-- END: main -->

			
			
			
			
			
			
			
			
			
			