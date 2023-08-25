<!-- BEGIN: thang -->	
	<th class="text-center phanhang align-middle" colspan="3">{thang}</th>
<!-- END: thang -->	

<!-- BEGIN: main -->
<style>
.phanhang{white-space:pre-wrap; word-wrap:break-word}
</style>
<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <script src="{BASE_URL}assets/js/language/jquery.ui.datepicker-vi.js"></script>

<div class="col-sm-12">

<div class="card">	

	<div class="table-responsive">
		<table class="table table-hover" >
				<thead>
					<tr>
						<th colspan="12" class="text-center" style="text-transform: uppercase;">
						BÁO CÁO TỰ KIỂM TRA, ĐÁNH GIÁ CHẤT LƯỢNG BỆNH VIỆN NĂM {BC.nam}</th>
					</tr>					
				</thead>
		</table>
	</div>

	<div class="card-block" id="block_rp">
	<div style="text-align: center;">
	<strong>SỞ Y TẾ PHÚ THỌ<br /> TRUNG TÂM Y TẾ HUYỆN THANH SƠN<br /> 
	PHỤC VỤ KIỂM TRA </strong>
	<br /> 
	<div class="table-responsive col-sm-12">
		<form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return exp_report(this);">
			<input type="hidden" name="sta" value="exp_item" />
			<input type="hidden" name="token" value="{CHECKSESS}_{nam}_{ROW.id}" />
			<table  class="table table-bordered ">
				<thead>
				<tr >
				<th class="text-center align-middle ">
				PHỤ LỤC 1 <br/>
				LỰA CHỌN DANH MỤC CẦN PHỤC VỤ KIỂM TRA</th>					
				</tr>				
				</thead>				
				<tbody>
				<tr>
					<td class="text-center align-middle">
					<!-- BEGIN: select -->
						<div class="ks-cboxtags">
								<input type="checkbox" id="check{ROW.id}" name="item[]" class="check"  value="{ROW.id}">
								<label for="check{ROW.id}">{ROW.code}</label>
						</div>
					<!-- END: select -->
					</td>
				</tr>
				
				</tbody>
				</tfoot>
					<tr style="color: #000;font-weight: bold;">
						<td class="text-center" colspan="3">
						<button class="btn btn-success" type="submit">
						<strong> <i class="fa fa-file-excel-o"></i> TẢI PHỤ LỤC 1 </strong></button>						
						</td>
					</tr>
				</tfoot>
			<table>
		</form>
		
		</div>		
</div>
	</div>
	
	
<!-- Input Grid card start -->
     <div class="card">
         <div class="card-header">
             <h5><strong>
				PHỤ LỤC 3 <br/>
				MẪU PHIẾU ĐÁNH GIÁ TIÊU CHÍ CHẤT LƯỢNG BỆNH VIỆN<br/>
				(ÁP DỤNG CHO THÀNH VIÊN ĐOÀN ĐÁNH GIÁ TIÊU CHÍ CHẤT LƯỢNG)</strong>
			</h5>
             <span><code>Vui lòng nhập các thông tin theo mẫu trước khi tải bản phụ lục 3</code></span>
         </div>
         <div style="text-align: left;" class="card-block">
           <form name="myform" id="myform" method="post" action="{link_frm}" onsubmit="return exp_report(this);">
			<input type="hidden" name="sta" value="exp_phuluc3" />
			<input type="hidden" name="token" value="{CHECKSESS}_{nam}_{ROW.id}" />
                 <div class="form-group row">
                     <div class="col-sm-4">
                         <input name="txt_hoten" type="text" class="form-control"
                         placeholder="{LANG.hoten_dg}">
                     </div>
                     <div class="col-sm-6">
                         <input name="txt_congtac" type="text" class="form-control"
                         placeholder="{LANG.vt_congtac}">
                     </div>
					 <div class="col-sm-2">
                         <input name="txt_sdt" type="text" class="form-control"
                         placeholder="{LANG.sdt}">
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-8">
                         <input name="txt_matieuchi" type="text" class="form-control"
                         placeholder="{LANG.matieuchi}">
                     </div>
                     <div class="col-sm-2">
                         <input name="txt_xeploai" type="text" class="form-control"
                         placeholder="{LANG.xeploai}">
                     </div>
					 <div class="col-sm-2">
                         <input id="datetime" name="txt_ngaycham" type="datetime" class="form-control"
                         placeholder="{LANG.ngaycham}">
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-12">
						<div class="col-form-label">{LANG.mota1}</div>
                         <textarea name="txt_mota1" rows="3" cols="5" class="form-control"></textarea>
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-12">
						<div class="col-form-label">{LANG.mota2}</div>
                         <textarea name="txt_mota2" rows="3" cols="5" class="form-control"></textarea>
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-12">
						<div class="col-form-label">{LANG.mota3}</div>
                         <textarea name="txt_mota3" rows="3" cols="5" class="form-control"></textarea>
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-12">
						<div class="col-form-label">{LANG.mota4}</div>
                         <textarea name="txt_mota4" rows="3" cols="5" class="form-control"></textarea>
                     </div>
                 </div>
                 <div style="text-align: center;" class="form-group row">
                     <div class="col-sm-12">
					 <button class="btn btn-success" type="submit">
						<strong> <i class="fa fa-file-excel-o"></i> TẢI PHỤ LỤC 3 </strong></button>
					 </div>
                 </div>
                 
             </form>
         </div>
     </div>
     <!-- Input Grid card end -->
</div>

<script>
function view_report(a,token) {
	window.location=nv_base_siteurl+nv_module_name+'/'+nv_func_name+'/?token='+token+'_'+a.value+'_bv';
}
function exp_report() {
	var c = []; 
		c.type = $(a).prop("method"); c.url =$(a).prop("action"); 
		c.data = $(a).serialize();		
		$.ajax({
				url : c.url,
				cache: !1,
				data:c.data,
				type : c.type,
				dataType : 'text',
				success : function (){
				
				}
			});
			return false;
}

function exp_report1() {
	checkboxes = document.getElementsByClassName('check');
	 for(var i=0,n=checkboxes.length; i<n;i++) {
		checkboxes[i].checked = a.checked;
	  }
}
$(function () {	$('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new Date());});

</script>
<!-- END: main -->
