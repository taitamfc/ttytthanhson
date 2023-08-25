<!-- BEGIN: main -->
	<!-- Page-header start -->
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">CƠ CẤU TỔ CHỨC</h5>
            <p class="text-muted m-b-10">{ROW.tencoso}</p>
        </div>
    </div>
    <!-- Page-header end -->
		
	
	<div class="page-body">
			
         <div class="page-body">
           <div class="row">
              <!-- order-card start -->
			  <!-- BEGIN: item_tochuc -->
              <div class="col-md-6 col-xl-4" onclick="setValue('{r.link}','resurt');">
                  <div class="card bg-c-blue order-card">
                      <div class="card-block">
                          <h5 class="m-b-20">{r.tentochuc}</h5>
                          <h1 class="text-right"><i class="{r.icon} f-left"></i><span>{r.soluong}</span></h1>
                      </div>
                  </div>
              </div>
			  <!-- END: item_tochuc -->
			  <!-- order-card end -->
            </div>
            
        </div>
	
	
        <!-- Basic table card start -->
        <div class="card">
            <div class="row">
                <div class="card-block">
                    <button class="btn btn-primary"><i class="icofont icofont-user-alt-3"></i>Thêm mới</button>
                </div>
            </div>
            <span id="resurt"></span>
        </div>
        <!-- Basic table card end -->
	</div>
<!-- END: main -->