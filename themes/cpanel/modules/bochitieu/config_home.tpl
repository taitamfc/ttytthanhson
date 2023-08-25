<!-- BEGIN: main -->
<script type="text/javascript" src="{URL_THEMES}/assets/pages/accordion/accordion.js"></script>
<style>.phanhang{white-space:pre-wrap; word-wrap:break-word}</style>
<!-- Page-header start -->
<!-- Color Open Accordion start -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="" style="text-transform: uppercase;color: #4099ff;">CÀI ĐẶT HỆ THỐNG</h4>
        </div>
        <div class="card-block accordion-block color-accordion-block">
            <div class="color-accordion" id="color-accordion">
                <a class="accordion-msg b-none"><h5> <i class="fa fa-home"></i> THÔNG TIN TRANG CHỦ</h5></a>
                <div class="accordion-desc">
				<form name="myform" id="myform" method="post" action="{link_frm}">
					<input type="hidden" name="token" id="checkss" value="{CHECKSESS}" />
					<input type="hidden" name="sta" id="sta" value="updateconfig" />
					<input type="hidden" name="id" value="{COM.id}" />
					<table class="table table-bordered border-primary">
					<tr>
						<td class="">{COM.description}</td>
					</tr>
					<tr>
						<td class="text-center">		
							<button class="bsubmit btn btn-success" type="submit">
							<em class="fa fa-save"> </em> Cập nhật</button>
						</td>
					</tr>
					</table>
				</form>	
                </div>
				
				<a class="accordion-msg bg-dark-primary b-none"><h5><i class="fa fa-user"></i> QUẢN LÝ NGƯỜI DÙNG</h5></a>
                <div class="accordion-desc">
				<form name="myform" id="myform" method="post" action="{link_frm}">
					<input type="hidden" name="token" id="checkss" value="{CHECKSESS}" />
					<input type="hidden" name="sta" id="sta" value="updateuser" />
					<input type="hidden" name="code" value="content_v" />
					<table class="col-sm-6 table table-bordered">
					<tr>
						<th class="text-center">STT</th>
						<th class="text-center">Tài khoản</th>
						<th class="text-center">Tên khoa/Phòng</th>
						<th class="text-center">Quyền sử dụng</th>
						<th class="text-center">Thao tác</th>
					</tr>
					<!-- BEGIN: user -->
					<tr>
						<td class="text-center">{U.stt}</td>
						<td class="text-left">{U.account}</td>
						<td class="text-left">{U.tenkhoa}</td>
						<td class="text-center">							
							<select onchange="quyensudung(this,'{token_phong}');" style="color: #4099ff;width:200px" name="listgroup" 
							class="form-control" >
								<!-- BEGIN: group -->
								<option value="{g.id}" {g.select}>{g.name}</option>
								<!-- END: group -->
							</select>
							
						</td>
						<td class="text-center">+</td>
					</tr>
					<!-- END: user -->
					
					</table>
				</form>	
                </div>
					
                    </div>
                </div>
            </div>
        </div>
        <!-- Color Open Accordion ends -->
</div>

<!-- END: main -->

