<!-- BEGIN: labels -->
	['{DATA.name}']
<!-- END: labels -->
<!-- BEGIN: main -->
	<!-- Page-header start -->
      <div class="page-header card" style="margin-top: 0px;">
          <div class="card-block">
              <h5 class="m-b-10">ĐÁNH GIÁ CHẤT LƯỢNG BỆNH VIỆN </h5>
			  {ROW.description}
          </div>
      </div>
	  
	  <div class="col-md-12 col-lg-6">
          <div class="card">
              <div class="card-header">
                  <h5>BIỂU ĐỒ 1: ĐIỂM TRUNG BÌNH ĐÁNH GIÁ GIỮA CÁC NĂM</h5>
                  <span></span>
                  <div class="card-header-right">
						 <div class="label-main">
						 <a title="In đồ thị này" onclick="printDiv('line_1');" class="label  btn-warning"><i class="fa fa-print"></i></a>
						 </div>
					 </div>
              </div>
              <div class="card-block">				  
				  <p style="margin: 0px auto;">
					<canvas id="line_1"  height="400"></canvas>
					</p>				  
              </div>
          </div>
      </div>
	  
	  <div class="col-md-12 col-lg-6">
          <div class="card">
              <div class="card-header">
                  <h5 style="text-transform: uppercase;">BIỂU ĐỒ 2: TÌNH HÌNH ĐÁNH GIÁ CHẤT LƯỢNG {BC.tieude}</h5>
                  <span></span>
                  <div class="card-header-right">
						 <div class="label-main">
						 <a title="In đồ thị này" onclick="printDiv('chart_2');" class="label  btn-warning"><i class="fa fa-print"></i></a>
						 </div>
					 </div>
              </div>
              <div class="card-block">				  
				  <p style="margin: 0px auto;">
					<canvas id="chart_2"  height="400"></canvas>
					</p>				  
              </div>
          </div>
      </div>
	  
	  <div class="col-md-12 col-lg-6">
          <div class="card">
              <div class="card-header">
                  <h5 style="text-transform: uppercase;">BIỂU ĐỒ 3: ĐÁNH GIÁ TIỂU MỤC CHƯA ĐẠT CỦA CÁC KHOA/PHÒNG {BC.tieude}</h5>
                  <span></span>
                  <div class="card-header-right">
						 <div class="label-main">
						 <a title="In đồ thị này" onclick="printDiv('chart_3');" class="label  btn-warning"><i class="fa fa-print"></i></a>
						 </div>
					 </div>
              </div>
              <div class="card-block">				  
				  <p style="margin: 0px auto;">
					<canvas id="chart_3"  height="400"></canvas>
					</p>				  
              </div>
          </div>
      </div>
	  
	  <div class="col-md-12 col-lg-6">
          <div class="card">
              <div class="card-header">
                  <h5 style="text-transform: uppercase;">BIỂU ĐỒ 4: SỐ LƯỢNG GHI CHÚ VÀ BẰNG CHỨNG TRONG KỲ ĐÁNH GIÁ</h5>
                  <span></span>
                  <div class="card-header-right">
						 <div class="label-main">
						 <a title="In đồ thị này" onclick="printDiv('chart_4');" class="label  btn-warning"><i class="fa fa-print"></i></a>
						 </div>
					 </div>
              </div>
              <div class="card-block">				  
				  <p style="width:75%;margin: 0px auto;">
					<canvas id="chart_4"  height="400"></canvas>
					</p>				  
              </div>
          </div>
      </div>
	  
	  <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h5 style="text-transform: uppercase;">BIỂU ĐỒ 5: TÌNH HÌNH ĐIỂM ĐÁNH GIÁ THEO TỪNG KHOA/PHÒNG {BC.tieude}</h5>
                  <span></span>
                  <div class="card-header-right">
						 <div class="label-main">
						 <a title="In đồ thị này" onclick="printDiv('chart_5');" class="label  btn-warning"><i class="fa fa-print"></i></a>
						 </div>
					 </div>
              </div>
              <div class="card-block">				  
				  <p style="margin: 0px auto;">
					<canvas id="chart_5"  height="400"></canvas>
					</p>				  
              </div>
          </div>
      </div>
	  
	  
	  
      <!-- Page-header end -->

<script src="{URL_THEMES}/js/chart.js"></script>
<script>
var url='{link}';
const options = {responsive: true,maintainAspectRatio: false,plugins: {legend:{display:false},labels: {render: 'value'}},
scale: {ticks: {stepSize: 0.5}}};

<!-- BEGIN: loopchart -->
new Chart(document.getElementById('{CH.id}'),{
	type: 'line',data: {labels: [{CH.label}],
	datasets: [{data: [{CH.value}],
	borderColor:['#2ed8b6'],
	backgroundColor: ['#FF9F55'],
	pointStyle: 'circle',pointRadius: 10,pointHoverRadius: 15}]},
	options: options});
<!-- END: loopchart -->		

<!-- BEGIN: chart_2 -->
new Chart(document.getElementById('{CH.id}'),{
	type: 'bar',data: {labels: [{CH.label}],
	datasets: [{data: [{CH.value}],
	borderColor:['#2ed8b6'],
	backgroundColor: ['#2ed8b6']}]},
	options: options});
<!-- END: chart_2 -->		

<!-- BEGIN: chart_3 -->
new Chart(document.getElementById('{CH.id}'),{
	type: 'bar',data: {labels: [{CH.label}],
	datasets: [{data: [{CH.value}],
	borderColor:['#2ed8b6'],
	backgroundColor: ['#2ed8b6']}]},
	options: options});
<!-- END: chart_3 -->		

<!-- BEGIN: chart_4 -->
new Chart(document.getElementById('{CH.id}'),{
	type: 'bar',data: {labels: [{CH.label}],
	datasets: [{data: [{CH.value}],
	borderColor:['#2ed8b6'],
	backgroundColor: ['#FF9F55'],
	pointStyle: 'circle',pointRadius: 10,pointHoverRadius: 15}]},
	options: options});
<!-- END: chart_4 -->		

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
} 

<!-- BEGIN: chart_5 -->
new Chart(document.getElementById('{CH.id}'), {
  type: 'bar',
  data: { labels: [{CH.label}],
    datasets: [{
      label: "Tăng điểm",
      stack: "Base",
      backgroundColor: "#2ed8b6",
      data: [{CH.sltangdiem}],
    },
	{
      label: "Giảm điểm",
      stack: "Base",
      backgroundColor: "#f00",
      data: [{CH.slgiamdiem}],
    },
	{
      label: "Giữ nguyên điểm",
      stack: "Base",
      backgroundColor: "#FF9F55",
      data: [{CH.slgiunguyen}],
    }
	
	]
  },
  options: options
});
<!-- END: chart_5 -->
</script>


<!-- END: main -->

				//
<script src="{URL_THEMES}/js/highcharts.js"></script>
<script src="{URL_THEMES}/js/boost.js"></script>
<script src="{URL_THEMES}/js/exporting.js"></script>
<!-- Chartlist chart css -->
<link rel="stylesheet" type="text/css" href="{URL_THEMES}/assets/css/chartist/chartist.css">
<!-- Morris Chart js -->
<script src="{URL_THEMES}/assets/js/raphael/raphael.min.js"></script>
<script src="{URL_THEMES}/assets/js/morris.js/morris.js"></script>

<div class="pcoded-inner-content">
        <div class="page-wrapper">
			<div class="row">
			<!-- BEGIN: group -->
			<!-- Table start -->
				<div class="col-md-12 col-lg-6">
					<div class="card">
						<div class="card-header">
							<h5>Chỉ tiêu số {ROW.stt}:{ROW.chi_so}</h5>
							<span></span>
						</div>
						<div class="card-block">
						<table class="table table-hover" >
                        <thead>
							<tr style="background-color: #73b4ff;">
                                <th  class="align-middle text-center col-1">STT</th>
								<!-- BEGIN: kehoach -->								
								<th  class="align-middle text-center col-1">Kế hoạch <br> {namapdung}</th>								
								<!-- END: kehoach -->	
								<!-- BEGIN: solan -->								
								<th  class="align-middle text-center col-1">{TS.title}</th>								
								<!-- END: solan -->
								<th  class="align-middle text-center col-1">Đánh giá</th>										
                            </tr>
                        </thead>
                        <tbody>
							<td  class="align-middle text-center">1</td>
							<!-- BEGIN: kehoachnhap -->								
								<th  class="align-middle text-center col-1">{TS.giatri}</th>								
							<!-- END: kehoachnhap -->
							<!-- BEGIN: solannhap -->								
								<th  class="align-middle text-center col-1">{TS.giatri}</th>								
							<!-- END: solannhap -->	
							<th  class="align-middle text-center col-1">Đạt</th>							

							
                        </tbody>
					</table>	
						</div>
					</div>
				</div>
            <!-- table Ends -->	
			<!-- Bar Chart start -->
				<div class="col-md-12 col-lg-6">
					<div class="card">
						<div class="card-header">
							<h5>Biểu đồ đánh giá chỉ tiêu:{ROW.chi_so}</h5>
							<span></span>
						</div>
						<div class="card-block">
							<div id="get_chiso{ROW.stt}"></div>
						</div>
					</div>
				</div>
				<script> Morris.Bar({
							element: 'get_chiso{ROW.stt}',
							data: [{datachart}],
							xkey: 'Quy',
							ykeys: ['giatri'],
							labels: ['KQ'],
							barColors: [ '#5D9CEC', '#ff0000'],
							hideHover: 'auto',xLabelAngle: 35,
							gridLineColor: '#5D9CEC',
							resize: true
						});	
				</script>				
				<!-- Bar Chart Ends -->
			<!-- END: group -->
			</div>
	
	
	
	<div class="row">
		<!-- Table start -->
		<!-- BEGIN: list_table -->
		<!-- BEGIN: chitieu -->
				<div class="col-md-12 col-lg-6">
					<div class="card">
						<div class="card-header">
							<h5>Chỉ tiêu:{ROW.chi_so}</h5>
							<span></span>
						</div>
						<div class="card-block">
						<table class="table table-hover" >
							<thead>
								<tr style="background-color: #73b4ff;">
									<th  class="align-middle text-center col-1">STT</th>
									<th  class="align-middle text-center col-1">Nội dung</th>										
									<th  class="align-middle text-center col-1">Số SCYK <br>được báo cáo</th>										
								</tr>
							</thead>
							<tbody>
								<!-- BEGIN: loop -->	
								<tr>
								<td  class="align-middle text-center">{ITEM.stt}</td>														
								<th  class="align-middle text-left col-1">{ITEM.noidung}</th>						
								<th  class="align-middle text-center col-1">{ITEM.giatri}</th>
								</tr>								
								<!-- END: loop -->	
							</tbody>
						</table>	
						</div>
					</div>
				</div>
         <!-- table Ends -->	
		<!-- END: chitieu -->
		<!-- END: list_table -->
	</div>
	
</div>
</div>


<script src="{URL_THEMES}/js/chart.js"></script>
<script>
  
var url='{link}';
$(document).ready(function() {

    //showinfor();

    $(window).on('resize',function() { });
});
// Morris bar chart
//alert(url+'&act=get_chitieu1');
function showinfor(){	
$.ajax({
        type: 'post',
        cache: !1,
        url: url+'&act=get_kehoach_chitieu',
        dataType: "text",
        success: function(d) {
			Morris.Bar({
				element: 'get_kehoach_chitieu',
				data: JSON.parse(d),
				xkey: 'chitieu',
				ykeys: ['kehoach','nam'],
				labels: ['Kế Hoạch','Kết quả'],
				barColors: [ '#5D9CEC', '#ff0000'],
				hideHover: 'auto',xLabelAngle: 35,
				gridLineColor: '#5D9CEC',
				resize: true
			});
        }
    });

    return !1
	
}

//alert(url);
</script>

