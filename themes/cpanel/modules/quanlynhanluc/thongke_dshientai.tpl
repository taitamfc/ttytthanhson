<!-- BEGIN: main -->
	<div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>THÔNG TIN CHI TIẾT CÁN BỘ HIỆN TẠI</h5>
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
									<th colspan="12" >TỔNG SỐ CÁN BỘ: {TONGCB}</th>
								</tr>
								<tr  style="background-color: #2ed8b6;">
									<th class='align-middle text-center'>#</th>
									<th class='align-middle'>Khoa/Phòng</th>		
									<th class='align-middle text-center'>Tổng số CB <br/> đi làm</th>
									<th class='align-middle text-center'>CB nghỉ <br/>việc riêng (1)</th>
									<th class='align-middle text-center'>CB nghỉ <br/>thai sản (2)</th>
									<th class='align-middle text-center'>CB <br/>nghỉ phép (3)</th>
									<th class='align-middle text-center'>CB <br/>nghỉ ốm (4)</th>
									<th class='align-middle text-center'>CB <br/>đi học (5)</th>
									<th class='align-middle text-center'>CB đi <br/>công tác (6)</th>
									<th class='align-middle text-center'>CB đi <br/>tăng cường (7)</th>
									<th class='align-middle text-center'>CB nghỉ <br/>khác (8)</th>
									<th class='align-middle text-center'>CB đến <br/>tăng cường (9)</th>
									<th class='align-middle text-center'>Nghỉ <br/> bù (10)</th>
									<th class='align-middle text-center'>Nghỉ 1/2 <br/> ngày (11)</th>
								</tr>
							</thead>
							<tbody>
							<!-- BEGIN: row -->
								<tr>
									<th scope="row">{ROW.stt}</th>
									<th> {ROW.tenkhoa}</th>
									<td class='text-center'><strong>{ROW.dilam}</strong></td>
									<td class='text-center'>{ROW.nghi_rieng}</td>
									<td class='text-center'>{ROW.nghi_ts}</td>
									<td class='text-center'>{ROW.nghi_phep}</td>
									<td class='text-center'>{ROW.nghi_om}</td>
									<td class='text-center'>{ROW.nghi_hoc}</td>									
									<td class='text-center'>{ROW.nghi_ct}</td>
									<td class='text-center'>{ROW.tangcuongdi}</td>
									<td class='text-center'>{ROW.nghi_khac}</td>
									<td class='text-center'>{ROW.tangcuongden}</td>
									<td class='text-center'>{ROW.nghi_bu}</td>
									<td class='text-center'>{ROW.nghi_1_2}</td>
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