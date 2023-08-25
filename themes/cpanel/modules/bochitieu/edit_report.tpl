<!-- BEGIN: main -->
<script type="text/javascript" src="{URL_THEMES}/assets/pages/accordion/accordion.js"></script>
<style>.phanhang{white-space:pre-wrap; word-wrap:break-word}</style>
<!-- Page-header start -->
<!-- Color Open Accordion start -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="" style="text-transform: uppercase;color: #4099ff;">CẬP NHẬT CÁC NỘI DUNG BÁO CÁO CỦA BỆNH VIỆN THÁNG {BC.thangapdung} NĂM {BC.nam}</h4>
        </div>
        <div class="card-block accordion-block color-accordion-block">
            <div class="color-accordion" id="color-accordion">
                <a class="accordion-msg b-none"><h5>III. TÓM TẮT CÔNG VIỆC TỰ KIỂM TRA BỆNH VIỆN</h5></a>
                <div class="accordion-desc">
				<form name="myform" id="myform" method="post" action="{link_frm}">
					<input type="hidden" name="token" id="checkss" value="{CHECKSESS}" />
					<input type="hidden" name="sta" id="sta" value="updatereport" />
					<input type="hidden" name="code" value="content_iii" />
					<input type="hidden" name="id" value="{COM.id}" />
					<table class="table table-bordered border-primary">
					<tr>
						<td class="">{COM.content_iii}</td>
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
				
				<a class="accordion-msg bg-dark-primary b-none"><h5>V. TỰ ĐÁNH GIÁ VỀ CÁC ƯU ĐIỂM CHẤT LƯỢNG BỆNH VIỆN</h5></a>
                <div class="accordion-desc">
				<form name="myform" id="myform" method="post" action="{link_frm}">
					<input type="hidden" name="token" id="checkss" value="{CHECKSESS}" />
					<input type="hidden" name="sta" id="sta" value="updatereport" />
					<input type="hidden" name="code" value="content_v" />
					<input type="hidden" name="id" value="{COM.id}" />
					<table class="table table-bordered border-primary">
					<tr>
						<td class="">{COM.content_v}</td>
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
                <a class="accordion-msg bg-dark-primary b-none">
					<h5>VI. TỰ ĐÁNH GIÁ VỀ CÁC NHƯỢC ĐIỂM, VẤN ĐỀ TỒN TẠI </h5></a>
					<div class="accordion-desc">
					<form name="myform" id="myform" method="post" action="{link_frm}" >
						<input type="hidden" name="token" id="checkss" value="{CHECKSESS}" />
						<input type="hidden" name="sta" id="sta" value="updatereport" />
						<input type="hidden" name="code" value="content_vi" />
						<input type="hidden" name="id" value="{COM.id}" />
						<table class="table table-bordered border-primary">
						<tr>
							<td class="">{COM.content_vi}</td>
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
                 <a class="accordion-msg bg-dark-primary b-none">
					<h5>VII. XÁC ĐỊNH CÁC VẤN ĐỀ ƯU TIÊN CẢI TIẾN CHẤT LƯỢNG </h5></a>
					<div class="accordion-desc">
					<form name="myform" id="myform" method="post" action="{link_frm}" >
						<input type="hidden" name="token" id="checkss" value="{CHECKSESS}" />
						<input type="hidden" name="sta" id="sta" value="updatereport" />
						<input type="hidden" name="code" value="content_vii" />
						<input type="hidden" name="id" value="{COM.id}" />
						<table class="table table-bordered border-primary">
						<tr>
							<td class="">{COM.content_vii}</td>
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
                  <a class="accordion-msg bg-dark-primary b-none">
					<h5>VIII. GIẢI PHÁP, LỘ TRÌNH, THỜI GIAN CẢI TIẾN CHẤT LƯỢNG </h5></a>
					<div class="accordion-desc">
					<form name="myform" id="myform" method="post" action="{link_frm}" >
						<input type="hidden" name="token" id="checkss" value="{CHECKSESS}" />
						<input type="hidden" name="sta" id="sta" value="updatereport" />
						<input type="hidden" name="code" value="content_viii" />
						<input type="hidden" name="id" value="{COM.id}" />
						<table class="table table-bordered border-primary">
						<tr>
							<td class="">{COM.content_viii}</td>
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
                    <a class="accordion-msg bg-dark-primary b-none">
					<h5>IX. KẾT LUẬN, CAM KẾT CỦA BỆNH VIỆN CẢI TIẾN CHẤT LƯỢNG</h5></a>
					<div class="accordion-desc">
					<form name="myform" id="myform" method="post" action="{link_frm}" >
						<input type="hidden" name="token" id="checkss" value="{CHECKSESS}" />
						<input type="hidden" name="sta" id="sta" value="updatereport" />
						<input type="hidden" name="code" value="content_ix" />
						<input type="hidden" name="id" value="{COM.id}" />
						<table class="table table-bordered border-primary">
						<tr>
							<td class="">{COM.content_ix}</td>
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
					
                    </div>
                </div>
            </div>
        </div>
        <!-- Color Open Accordion ends -->
</div>

<!-- END: main -->

