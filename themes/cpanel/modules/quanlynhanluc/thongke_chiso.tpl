<!-- BEGIN: main -->
	<div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>BÁO CÁO CÁC CHỈ SỐ ĐÁNH GIÁ NHU CẦU NHÂN LỰC</h5>
                        <span style="color: #ff0000;">Lưu ý: Thông tin tổng hợp từ các khoa phòng cập nhật.</span>
                        <div class="card-header-right">
							<ul class="list-unstyled card-option">
								<li><i class="fa fa-chevron-left"></i></li>
								<li><i class="fa fa-window-maximize full-card"></i></li>
								<li><i class="fa fa-minus minimize-card"></i></li>
								<li><i class="fa fa-refresh reload-card"></i></li>
								<li><i class="fa fa-times close-card"></i></li>
							</ul>
						</div>

                    </div>
                    <div class="card-block">
                        <div class="table-responsive" style="padding-bottom: 100px;">
							<table id="tbl_danhsach" class="table table-hover table-border">
							  
							<thead>
								<tr>
									<th colspan="10" class="text-left">CÁC CHỈ SỐ ĐÁNH GIÁ NHU CẦU NHÂN LỰC</th>
								</tr>
								<tr style="background-color: #2ed8b6;">
									<th class="align-middle">#</th>
									<th class="align-middle">CÁC CHỈ SỐ ĐÁNH GIÁ NHU CẦU NHÂN LỰC</th>		
									<th class="align-middle text-center">Tổng chỉ số <br> cả viện</th>
									<th class="align-middle text-center">Khoa Ngoại <br>tổng hợp</th>
									<th class="align-middle text-center">Khoa <br>phụ sản</th>
									<th class="align-middle text-center">Khoa cấp cứu<br>HSTC <br>& Chống Độc</th>
									<th class="align-middle text-center">Khoa Nội <br>tổng hợp</th>
									<th class="align-middle text-center">Khoa nhi</th>
									<th class="align-middle text-center">Khoa Y học <br> cổ truyền <br>& PHCN</th>
								</tr>
								
							</thead>
							<tbody>
							<!-- BEGIN: row --> <!-- BEGIN: khoaphong --><td style="background-color: #2ed8b6;"> {tenkhoa}</td><!-- END: khoaphong -->
								<tr>
									<th class='text-center' scope="row">{ROW.stt}</th>									
									<th>{ROW.title_bc}</th>								
									<td class='text-center'>{ROW.toanvien}</td>																
									<td class='text-center'>{ROW.khoangoai}</td>	
									<td class='text-center'>{ROW.khoaps}</td>	
									<td class='text-center'>{ROW.capcuu}</td>	
									<td class='text-center'>{ROW.khoanoi}</td>	
									<td class='text-center'>{ROW.khoanhi}</td>	
									<td class='text-center'>{ROW.yhct}</td>	
									<!-- BEGIN: chiso -->
									<td class='text-center'>{chiso}</td>								
									<!-- END: chiso -->								
								</tr>
							<!-- END: row -->
							</tbody>
							
							<tfoot>
								<!-- BEGIN: total -->
								<tr class="font-weight-bold">
									
									<td class='text-center' colspan="3">Tổng cộng</td>
									<td class='text-center' style="background-color: #2ed8b6;">{SUM.bn_tong}</td>
									<td class='text-center'>{SUM.bn_cu}</td>
									<td class='text-center'>{SUM.bn_vaovien}</td>
									<td class='text-center'>{SUM.bn_ravien}</td>
									<td class='text-center'>{SUM.bn_chuyenkhoa}</td>
									<td class='text-center'>{SUM.bn_tuvong}</td>									
									<td class='text-center'>{SUM.bn_chuyenvien}</td>
									<td class='text-center'>{SUM.bn_xinve}</td>
									<td class='text-center'>{SUM.bn_noitru}</td>
									<td class='text-center'>{SUM.bn_ngoaitru}</td>
									<td class='text-center'>{SUM.bn_namyc}</td>
									<td></td> 
								</tr>
							<!-- END: total -->
								
								<!-- BEGIN: generate_page -->
									<tr class="{ROW.color}">
										<td colspan="12" class="text-center">{GENERATE_PAGE}</td>
									</tr>
								<!-- END: generate_page -->
							</tfoot>
						</table>
						</div>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
	{FILE "export.tpl"}
<!-- END: main -->