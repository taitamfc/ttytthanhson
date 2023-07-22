<!-- BEGIN: main -->
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<script src="{BASE_URL}assets/js/language/jquery.ui.datepicker-vi.js"></script>

	<!-- Page-header start -->
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">CƠ CẤU TỔ CHỨC & QUẢN LÝ TÀI CHÍNH </h5>
            <p class="text-muted m-b-10">{ROW.tencoso}</p>
        </div>
    </div>
    <!-- Page-header end -->
	
	<div class="page-body">
			
         <div class="page-body">
           <div class="row">
              <!-- order-card start -->
			  <!-- BEGIN: item_tochuc -->
              <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-block text-center" >
                            <i class="fa fa-twitter text-c-green d-block f-40"></i>
                            <h4 class="m-t-20"><span class="text-c-blgreenue"></span> {r.tentochuc}</h4>
                            <p class="m-b-20">Thành viên: {r.soluong} </p>
                            <button onclick="setValue('{r.link}','resurt');" class="btn btn-success btn-sm btn-round">Chi tiết thành viên</button>
                            <button onclick="setValue('{r.link_taichinh}','resurt');" class="btn btn-primary btn-sm btn-round">Danh sách tài chính</button>
                        </div>
                    </div>
                </div>

			  <!-- END: item_tochuc -->
			  <!-- order-card end -->
            </div>
            
        </div>
	
	
        <!-- Basic table card start -->
        <div class="card">
            <span id="resurt"></span>
        </div>
        <!-- Basic table card end -->
	</div>
<!-- END: main -->