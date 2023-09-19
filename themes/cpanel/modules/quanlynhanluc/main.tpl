<!-- BEGIN: data -->
[
	<!-- BEGIN: tongbn -->
	{ngaygio:'{R.ngay}',tongbn:{R.tongbn}}<!-- BEGIN: dau -->,<!-- END: dau -->
	<!-- END: tongbn -->
	{ngaygio:'{R.ngay}',tongbn:{R.tongbn}}
]
<!-- END: data -->


<!-- BEGIN: tbl_tongquan -->
	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<th class="text-center">Khoa,Phòng</th>
				<th class="text-center">Bác sĩ</th>
				<th class="text-center">ĐD,KTV, NHS</th>
				<th class="text-center">Bệnh nhân</th>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th class="text-center">{ROW.stt}</th>
				<th class="text-left">{ROW.tenkhoa}</th>
				<th class="text-center">{ROW.bs}</th>
				<th class="text-center">{ROW.dd}</th>
				<th class="text-center">{ROW.bn}</th>
			</tr>
		<!-- END: row -->	
		</thead>
	</table>
<!-- END: tbl_tongquan -->


<!-- BEGIN: tbl_dieudong -->
	<table class="table table-hover table-border">				  
		<thead>
			<tr style="background-color: #f4d03f; color: #fff;" >
				<th class="text-center">#</th>
				<th class="text-center">Khoa,Phòng</th>
				<th class="text-center">Tổng Nhân lực</th>
				<th class="text-center">Tổng CB Nghỉ</th>
				<th class="text-center">Tổng CB đi làm</th>
				<th class="text-center">Tổng CB điều động đến</th>
				<th class="text-center">Tổng CB điều động đi</th>
				<th class="text-center">Số cán bộ làm việc thực tế</th>
			</tr>
		</thead>
		
		<thead>
		<!-- BEGIN: row -->
			<tr>
				<th class="text-center">{ROW.stt}</th>
				<th class="text-left">{ROW.tenkhoa}</th>
				<th class="text-center">{ROW.bs}</th>
				<th class="text-center">{ROW.dd}</th>
				<th class="text-center">{ROW.bn}</th>
			</tr>
		<!-- END: row -->	
		</thead>
	</table>
<!-- END: tbl_dieudong -->

<!-- BEGIN: main -->
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
		<!-- Page-header start -->
			<div class="row">
                 <!-- SITE VISIT CHART start -->
                 <div class="col-md-12 col-lg-6">
                     <div class="card">
                         <div class="card-header">
                             <h5>Tổng số bệnh nhân toàn viện</h5>
                             <span>Số liệu thống kê dựa vào các khoa phòng cung cấp</span>
                             <div class="card-header-right">
								 <div class="label-main">
									 <a title="Dữ liệu xem trong 7 ngày" onclick="get_bn(7);" class="label label-primary">07 ngày</a>
									 <a title="Dữ liệu xem trong 14 ngày" onclick="get_bn(14);" class="label label-success">14 ngày</a>
									 <a title="Dữ liệu xem trong 30 ngày" onclick="get_bn(30);" class="label label-info">01 tháng</a>
									 <a title="In đồ thị này" onclick="printDiv('line-chart');" class="label  btn-warning"><i class="fa fa-print"></i></a>
								 </div>
							 </div>
                         </div>
                         <div class="card-block">
                             <div id="line-chart"></div>
                         </div>
                     </div>
                 </div>
				 <!-- Bar Chart start -->
				<div class="col-md-12 col-lg-6">
					<div class="card">
						<div class="card-header">
							<h5>Số cán bộ hiện đang công tác tại các khoa, phòng</h5>
                              <span>Số liệu cập nhật <strong>{thoigian}</strong></span>
							<div class="card-header-right">
								 <div class="label-main">
									 <a title="In đồ thị này" onclick="printDiv('dskhoaphong');" class="label  btn-warning"><i class="fa fa-print"></i></a>
								 </div>
							 </div>
						</div>
						<div class="card-block">
							<div id="dskhoaphong"></div>
						</div>
					</div>
				</div>
				
				

			<!-- Bar Pie start -->
			 <div class="col-md-12 col-lg-6">
				 <div class="card">
					 <div class="card-header">
						 <h5>Tỉ lệ bệnh nhân toàn viện</h5>
						 <span>Số liệu cập nhật <strong>{thoigian}</strong></span>
						 <div class="card-header-right">                                                             
							<div class="label-main">
							 <a title="In đồ thị này" onclick="printDiv('pie_benhnhan');" class="label  btn-warning"><i class="fa fa-print"></i></a>
							</div>                                                        
						</div>
					 </div>
					 <div class="card-block">
						<canvas id="pie_benhnhan" style="max-height: 400px; display: block;"></canvas>							
					 </div>
				 </div>
			 </div>
			 <!-- Bar Pie Ends -->
			 
			 <!-- Bar Chart start -->
             <div class="col-md-12 col-lg-6">
                 <div class="card">
                     <div class="card-header">
                         <h5>Tỉ lệ điều dưỡng/Bệnh nhân hiện tại của các Khoa-Phòng</h5>
                         <span>Số liệu cập nhật <strong>{thoigian}</strong></span>
                         <div class="card-header-right">
							<div class="label-main">
							 <a title="In đồ thị này" onclick="printDiv('get_tl_dieuduong_bn');" class="label  btn-warning"><i class="fa fa-print"></i></a>
							</div>
						</div>
                     </div>
                     <div class="card-block">
                         <div id="get_tl_dieuduong_bn"></div>
                     </div>
                 </div>
             </div>
             <!-- Bar Chart Ends -->
			 <!-- Bar Chart start -->
             <div class="col-md-12 col-lg-6">
                 <div class="card">
                     <div class="card-header">
                         <h5>Tỉ lệ Bác sĩ/Bệnh nhân hiện tại của các Khoa-Phòng</h5>
                         <span>Số liệu cập nhật <strong>{thoigian}</strong></span>
                         <div class="card-header-right">                                                             
							<div class="label-main">
							 <a title="In đồ thị này" onclick="printDiv('get_tl_bacsi_bn');" class="label  btn-warning"><i class="fa fa-print"></i></a>
							</div>
						</div>
                     </div>
                     <div class="card-block">
                         <div id="get_tl_bacsi_bn"></div>
                     </div>
                 </div>
             </div>
             <!-- Bar Chart Ends -->
			 <!-- table start -->
             <div class="col-md-12 col-lg-6">
                 <div class="card">
                     <div class="card-header">
                         <h5>Tổng quan nhân lực tại các khoa lâm sàn</h5>
                         <span>Số liệu cập nhật <strong>{thoigian}</strong></span>
                         <div class="card-header-right">                                                             
							<div class="label-main">
							 <a title="In bảng dữ liệu này" onclick="printDiv('tbl_tongquan');" class="label  btn-warning"><i class="fa fa-print"></i></a>
							</div>                                                         
				  </div>
                     </div>
                     <div class="card-block">
                         <div id="tbl_tongquan"></div>
                     </div>
                 </div>
             </div>
             <!-- tbl Ends -->
			 
			 <!-- table start -->
             <div class="col-md-12 col-lg-6">
                 <div class="card">
                     <div class="card-header">
                         <h5>Thông tin điều động cán bộ Khoa/Phòng</h5>
                         <span>Số liệu cập nhật <strong>{thoigian}</strong></span>
                         <div class="card-header-right">                                                             
							<div class="label-main">
							 <a title="In đồ thị này" onclick="printDiv('get_dieudong');" class="label  btn-warning"><i class="fa fa-print"></i></a>
							</div>                                                         
						</div>
                     </div>
                     <div class="card-block">
                         <div id="get_dieudong"></div>
                     </div>
                 </div>
             </div>
             <!-- tbl Ends -->
				 
			</div>
			
		</div>
</div>
</div>

<script src="{URL_THEMES}/js/chart.js"></script>

<script>
  var url='{link}';
  get_bn(7);
  get_tbl('tbl_tongquan');
  //get_tbl('tbl_dieudong');
$.ajax({
        type: 'post',
        cache: !1,
        url: url+'&act=get_dscanbo',
        dataType: "text",
        success: function(d) { //alert(d);
			Morris.Bar({
				element: 'dskhoaphong',
				data: JSON.parse(d),
				xkey: ['label'],
				ykeys: ['value'],
				labels: ['Số lượng'],
				barColors: ['#5FBEAA', '#34495E', '#FF9F55', '#E74C3C', '#1ABC9C', '#2ECC71'],
				hideHover: 'auto',xLabelAngle: 35,
				gridLineColor: '#FF9F55',
				resize: true
			});
        }
    }); 
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
} 
 
function get_tbl(id)
{
$.ajax({
        type: 'post',cache: !1,
        url: url+'&act='+id,
        dataType: "text",
        success: function(d) {
			$('#'+id).html(d);}
    });
}

function get_bn(num=7)
{
	$("#line-chart").empty();
	$.ajax({
        type: 'post',
        cache: !1,
        url: url+'&act=get_bn&limit='+num,
        dataType: "text",
        success: function(d) { //alert(d);
			window.lineChart = Morris.Line({
				element: 'line-chart',data: JSON.parse(d),
				xkey: ['ngay'],
				xLabelFormat: function (da) {return ("0" + da.getDate()).slice(-2) + '/' + ("0" + (da.getMonth() + 1)).slice(-2);},
				redraw: true,
				ykeys: ['tongbn'],hideHover: 'auto',
				labels: [ 'BN'],lineColors: ['#FF9F55']
			});
        }
    });
}

var xBenhnhan = [{BN.x}];
var yBenhnhan = [{BN.y}];
var barColors = ['#FF0000', '#00FF00','#0000FF','#FFFF00',	'#00FFFF',	'#FF00FF',	'#C0C0C0',	'#FF99FF',	'#00DD00',	'#97FFFF',	'#A0522D',	'#3300FF',	'#000000' ];
var optionsPie = {plugins: {legend: {position: 'right'}}};
new Chart("pie_benhnhan", { type: "pie",
  data: {labels: xBenhnhan, datasets: [{label: 'Số lượng', backgroundColor: barColors,data: yBenhnhan}],hoverOffset: 4},
  options: optionsPie
});

$.ajax({
        type: 'post',
        cache: !1,
        url: url+'&act=get_tl_dieuduong_bn',
        dataType: "text",
        success: function(d) {
			Morris.Bar({
				element: 'get_tl_dieuduong_bn',
				data: JSON.parse(d),
				xkey: 'tenkhoa',
				ykeys: ['value1','value2'],
				labels: ['Điều dưỡng','Bệnh nhân'],
				barColors: [ '#5D9CEC', '#ff0000'],
				hideHover: 'auto',xLabelAngle: 35,
				gridLineColor: '#5D9CEC',
				resize: true
			});
        }
    });

$.ajax({
        type: 'post',
        cache: !1,
        url: url+'&act=get_tl_bacsi_bn',
        dataType: "text",
        success: function(d) {
			Morris.Bar({
				element: 'get_tl_bacsi_bn',
				data: JSON.parse(d),
				xkey: 'tenkhoa',
				ykeys: ['value1','value2'],
				labels: ['Bác sĩ','Bệnh nhân'],
				barColors: [ '#5D9CEC', '#ff0000'],
				hideHover: 'auto',xLabelAngle: 35,
				gridLineColor: '#5D9CEC',
				resize: true
			});
        }
    });




$.ajax({
        type: 'post',
        cache: !1,
        url: url+'&act=get_dieudong',
        dataType: "text",
        success: function(d) { //alert(d);
			Morris.Bar({
				element: 'get_dieudong',
				data: JSON.parse(d),
				xkey: 'tenkhoa',
				ykeys: ['soluong'],
				labels: ['Số lượng'],
				barColors: ['#5FBEAA', '#5D9CEC', '#cCcCcC'],
				hideHover: 'auto',xLabelAngle: 35,
				gridLineColor: '#5D9CEC',
				resize: true
			});
        }
    });	
	

</script>
<!-- END: main -->

<script src="{URL_THEMES}/js/chartjs-plugin-labels.js"></script>
<script src="{URL_THEMES}/js/Chart.bundle.min.js"></script>


$(document).ready(function() {
	get_bn(7);
    showinfor();

    $(window).on('resize',function() { });
});

function createChart(id, type, options) {
      var data = {
        labels: ['khoanhi (58.7%)','phusan (0%)','khoangoai (0%)','khoanoi (0%)','khoacc (0%)','yhct (0%)','khoahstc (41.3%)'],
        datasets: [
          {
            label: 'Số lượng',
            data: [54,10,20,30,40,51,38],
            backgroundColor: ['#FF0000', '#00FF00','#0000FF','#FFFF00',	'#00FFFF',	'#FF00FF',	'#C0C0C0',	'#FF99FF',	'#00DD00',	'#97FFFF',	'#A0522D']
          }
        ]
      };

      new Chart(document.getElementById(id), {
        type: type,
        data: data,
        options: options
      });
    }
	
createChart('pie' + '-canvas1', 'pie', {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        plugins: {
          labels: {render: 'label'},
		  legend: {position: 'right'}
        }
      });	
	
	



var label=''; var data='';
//gioi tính
$.ajax({
        type: 'post',
        cache: !1,
        url: url+'&act=get_gender',
        dataType: "json",
        success: function(d) {//alert(d);
			label=d.label; data=d.value;
        }
    });	


var xBenhnhan = [{BN.x}];
var yBenhnhan = [{BN.y}];
var barColors = ['#FF0000', '#00FF00','#0000FF','#FFFF00',	'#00FFFF',	'#FF00FF',	'#C0C0C0',	'#FF99FF',	'#00DD00',	'#97FFFF',	'#A0522D',	'#3300FF',	'#000000' ];
var optionsPie = {plugins: {legend: {position: 'right'}}};
new Chart("pie_benhnhan", { type: "pie",
  data: {labels: xBenhnhan, datasets: [{label: 'Số lượng', backgroundColor: barColors,data: yBenhnhan}],hoverOffset: 4},
  options: optionsPie
});

/*
new Chart($('#chart_gender'), {type: 'pie',data: {labels: ['Nam','Nữ'] ,datasets: [{label: 'Số lượng',data:[113,179],borderWidth:2}]},
		options: {scales: {y: { beginAtZero: true}}}});
*/






function showinfor()
{
	
	
// Morris bar chart
$.ajax({
        type: 'post',
        cache: !1,
        url: url+'&act=get_dieudong',
        dataType: "text",
        success: function(d) { //alert(d);
			Morris.Bar({
				element: 'get_dieudong',
				data: JSON.parse(d),
				xkey: 'tenkhoa',
				ykeys: ['soluong'],
				labels: ['Số lượng'],
				barColors: ['#5FBEAA', '#5D9CEC', '#cCcCcC'],
				hideHover: 'auto',xLabelAngle: 35,
				gridLineColor: '#5D9CEC',
				resize: true
			});
        }
    });

// Morris bar chart



// Morris bar chart
$.ajax({
        type: 'post',
        cache: !1,
        url: url+'&act=get_dscanbo',
        dataType: "text",
        success: function(d) { //alert(d);
			Morris.Bar({
				element: 'dskhoaphong',
				data: JSON.parse(d),
				xkey: ['label'],
				ykeys: ['value'],
				labels: ['Số lượng'],
				barColors: ['#5FBEAA', '#34495E', '#FF9F55', '#E74C3C', '#1ABC9C', '#2ECC71'],
				hideHover: 'auto',xLabelAngle: 35,
				gridLineColor: '#FF9F55',
				resize: true
			});
        }
    });

    return !1
	
}
	
<!-- Bar Pie start -->
<div class="col-md-12 col-lg-6">
	<div class="card">
		<div class="card-header">
			<h5>Tỉ lệ Nam/Nữ cán bộ</h5>
			<span>Số liệu cập nhật <strong>{thoigian}</strong></span>
			<div class="card-header-right">                                                             
			<i class="icofont icofont-spinner-alt-5"></i>                                                         
		</div>
		</div>
		<div class="card-block">
		<canvas id="pie-canvas1"></canvas>
		</div>
	</div>
</div>
<!-- Bar Pie Ends -->

<!-- Bar Chart Ends -->
<!-- Bar Chart start -->
<div class="col-md-12 col-lg-6">
	<div class="card">
		<div class="card-header">
			<h5>Thông tin điều động cán bộ Khoa/Phòng</h5>
			<span>Số liệu cập nhật <strong>{thoigian}</strong></span>
			<div class="card-header-right">                                                             
			<i class="icofont icofont-spinner-alt-5"></i>                                                         
		</div>
		</div>
		<div class="card-block">
			<div id="get_dieudong"></div>
		</div>
	</div>
</div>
<!-- Bar Chart Ends -->
