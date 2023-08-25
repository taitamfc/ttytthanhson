<!-- BEGIN: main -->
<!-- Page-header start -->
<div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="" style="text-transform: uppercase;color: #4099ff;">BÁO CÁO {DG.tieude}</h4>
            </div>	
        </div>	
		
		<div class="page-body">
		   <div class="row">
			  <!-- order-card start -->
			  <div class="col-md-6 col-lg-4">
					<div class="card">
						<div class="card-block text-center"  style="min-height: 250px;">
							<i class="fa fa-file-text-o  text-c-green d-block f-40"></i>
							<h4 class="m-t-20"><span class="text-c-blgreenue"></span> BÁO CÁO BỆNH VIỆN ĐÁNH GIÁ</h4>
							<p class="m-b-20"></p>
							<button onclick="openForm('{LINK.link_bv}',0,0);" class="btn btn-success btn-sm btn-round">Xem Báo Cáo</button>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="card">
						<div class="card-block text-center"  style="min-height: 250px;">
							<i class="fa fa-file-text-o  text-c-green d-block f-40"></i>
							<h4 class="m-t-20"><span class="text-c-blgreenue"></span> BÁO CÁO ĐOÀN KIỂM TRA ĐÁNH GIÁ</h4>
							<p class="m-b-20"> </p>
							<button onclick="openForm('{LINK.link_doandg}',0,0);" class="btn btn-success btn-sm btn-round">Xem Báo Cáo</button>
						</div>
					</div>
				</div>
				
			  <!-- order-card end -->
			  
			</div>
		</div>
</div>	

<!-- END: main -->



<!-- Page-header end -->
<div class="page-body">    
     <div class="page-body">
       <div class="row">
          <!-- order-card start -->
          <!-- BEGIN: chitieu -->
          <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-block text-center"  style="min-height: 250px;">
                        <i class="fa fa-file-text-o  text-c-green d-block f-40"></i>
                        <h4 class="m-t-20"><span class="text-c-blgreenue"></span> {ROW.chi_so}</h4>
                        <p class="m-b-20">Thời gian cung cấp: {ROW.tansuatgui} </p>
                        <button onclick="openForm('{ROW.link_detail}',0,0);" class="btn btn-success btn-sm btn-round">Xem Báo Cáo</button>
                    </div>
                </div>
            </div>
          <!-- END: chitieu -->
          <!-- order-card end -->
        </div>
    </div>
    <!-- Basic table card start -->
    <div class="card">
        <span id="resurt"></span>
    </div>
    <!-- Basic table card end -->
</div>
