<!-- saved from url=(0060)https://adminlte.io/themes/AdminLTE/pages/charts/morris.html -->
<!-- BEGIN: main -->
<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/font-awesome.min.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/ionicons.min.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/morris.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/AdminLTE.min.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/_all-skins.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="{BASE_URL}{NV_ASSETS_DIR}/js/morris-chart/morris.js"></script>

<script src="{BASE_URL}{NV_ASSETS_DIR}/js/morris-chart/adminlte.min.js"></script>

<!-- Normalize or reset CSS with your favorite library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

<!-- Load paper.css for happy printing -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">


<style>
  .badge:hover {
    background-color: yellow;
    cursor: pointer;
  }
/*
  @media print {
    .box {
      width: 50%;
      height: 50vh;
      float: left;
      border-left: 1px solid black; /* Add a vertical line between the columns */
      border-right: 1px solid black; /* Add a vertical line between the columns */
      border-bottom: 1px solid black; /* Add a vertical line between the columns */
      padding-right: 5px; 
      /*box-sizing: border-box; /* Include border in width calculation 
      .box:last-child {
                border-right: none; /* Remove border from the last column 
            }
  
      
    }

   
  }  
  */
</style>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->





<section class="content-header">
<h1 class="text-center">PHẦN MỀM SCYK </h1> 
</section>

<section class="content">

  

    <div class="col-md-6">

      <div class="box box-info" id="bieudo1">
        <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo1');" class="label  btn-success"><i class="fa fa-print"></i></a></div>
        <h6 class="text-center">Biểu đồ 1: TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5S CỦA BỆNH VIỆN</BR> Ở CÁC LẦN ĐÁNH GIÁ KHÁC
            NHAU </h6>
          <div id='thkhoaphong-legend'></div>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="box-body chart-responsive">
          <div class="chart" id="thkhoaphong" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" >
            <div class="morris-hover morris-default-style" style="display: none;"></div>
          </div>
        </div>

      </div>





     





<!-- END: main -->