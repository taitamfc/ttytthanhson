<!-- BEGIN: main -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js">
</script>

<script type="text/javascript" src="{THEME_URL}/assets/pages/accordion/accordion.js"></script>


<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>

<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js">
</script>

<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />

<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script src="https://code.jscharting.com/latest/jscharting.js"></script>

<link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" rel="stylesheet" type="text/css">

  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>




<!-- Morris Chart js -->
<div class="pcoded-inner-content">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="row">
            <!-- SITE VISIT CHART start -->
            <div class="col-md-12 col-lg-6">
                <div class="card">

                </div>
            </div>
        </div>
        <!-- Bar Chart start -->
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Biểu đồ 1-{BASE_URL}{NV_ASSETS_DIR}</h5>

                    <span>Số liệu cập nhật <strong>17:50 19/04/2023</strong></span>
                 <!-- Bar Chart start   <div id="chart1" style="max-width: 1000px;height: 800px;margin: 0px auto;"></div> --> 
                    <div id="chart1" style="max-width: 700px;height: 600px;margin: 0px auto;"></div> 
                    
                  

                </div>

            </div>
        </div>
        <!-- Bar Pie start -->
        <div class="col-md-12 col-lg-6">

            <div class="card">            

                <div class="card-header">               

                    <h5>Biểu đồ 2</h5>
                    <span>Số liệu cập nhật <strong>17:50 19/04/2023</strong></span>
                    <div id="chart2" style="max-width: 700px;height: 600px;margin: 0px auto;"></div> 
                    <div class="card-header-right">
                        <div class="label-main">
                            <a title="In đồ thị này" onclick="printDiv(&#39;pie_benhnhan&#39;);"
                                class="label  btn-warning"><i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>


                <div class="card-block icon-btn ">
                    <input type="hidden" id="ds_count" value="">

                  
                </div>



                <div class="card-block">
                    <div id="chart2"
                        style="max-height: 400px; display: block; box-sizing: border-box; height: 400px; width: 497px;"
                        width="621" height="500"></div>
                </div>
            </div>
        </div>
        <!-- Bar Pie Ends -->
        <!-- Bar Chart start -->
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Biểu đồ 3</h5>
                    <div class="input-group">

                        <select id="account" name="cbo_account" class="form-control" placeholder="Chọn Khoa Phòng"
                            title="" data-toggle="tooltip" data-original-title="Khoa Phòng">
                            <option value="" disabled selected>Chọn Khoa Phòng</option>
                            <!-- BEGIN: KHOAPHONG1 -->
                            <option value="{KHOAPHONG1.account}" {KHOAPHONG1.selected}>{KHOAPHONG1.name}</option>
                            <!-- END: KHOAPHONG2-->
                        </select>
                    </div>
                    <span>Số liệu cập nhật <strong>17:50 19/04/2023</strong></span>
                    <div class="card-header-right">
                        <div class="label-main">
                            <a title="In đồ thị này" onclick="printDiv(&#39;get_tl_dieuduong_bn&#39;);"
                                class="label  btn-warning"><i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div id="get_tl_dieuduong_bn">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bar Chart Ends -->
    <!-- Bar Chart start -->
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Biểu đồ 4</h5>
                <div class="input-group">

                    <select id="account" name="cbo_account" class="form-control" placeholder="Chọn Khoa Phòng" title=""
                        data-toggle="tooltip" data-original-title="Khoa Phòng">
                        <option value="" disabled selected>Chọn Khoa Phòng</option>
                        <!-- BEGIN: KHOAPHONG2 -->
                        <option value="{KHOAPHONG2.account}" {KHOAPHONG2.selected}>{KHOAPHONG2.name}</option>
                        <!-- END: KHOAPHONG2-->
                    </select>
                </div>
                <span>Số liệu cập nhật <strong>17:50 19/04/2023</strong></span>
                <div class="card-header-right">
                    <div class="label-main">
                        <a title="In đồ thị này" onclick="printDiv(&#39;get_tl_bacsi_bn&#39;);"
                            class="label  btn-warning"><i class="fa fa-print"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="get_tl_bacsi_bn">

                </div>
            </div>
        </div>
    </div>
    <!-- Bar Chart Ends -->
    <!-- table start -->
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Tổng quan nhân lực tại các khoa lâm sàn</h5>
                <span>Số liệu cập nhật <strong>17:50 19/04/2023</strong></span>
                <div class="card-header-right">
                    <div class="label-main">
                        <a title="In bảng dữ liệu này" onclick="printDiv(&#39;tbl_tongquan&#39;);"
                            class="label  btn-warning"><i class="fa fa-print"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="tbl_tongquan">
                    <table class="table table-hover table-border">
                        <thead>
                            <tr style="background-color: #f4d03f; color: #fff;">
                                <th class="text-center">#</th>
                                <th class="text-center">Khoa,Phòng</th>
                                <th class="text-center">Bác sĩ</th>
                                <th class="text-center">ĐD,KTV, NHS</th>
                                <th class="text-center">Bệnh nhân</th>
                            </tr>
                        </thead>

                        <thead>
                            <tr>
                                <th class="text-center">1</th>
                                <th class="text-left">yhct</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                            </tr>

                            <tr>
                                <th class="text-center">2</th>
                                <th class="text-left">khoanoi</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                            </tr>

                            <tr>
                                <th class="text-center">3</th>
                                <th class="text-left">khoanhi</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                            </tr>

                            <tr>
                                <th class="text-center">4</th>
                                <th class="text-left">khoangoai</th>
                                <th class="text-center">0</th>
                                <th class="text-center">23</th>
                                <th class="text-center">59</th>
                            </tr>

                            <tr>
                                <th class="text-center">5</th>
                                <th class="text-left">khoahstc</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                            </tr>

                            <tr>
                                <th class="text-center">6</th>
                                <th class="text-left">khoagayme</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                            </tr>

                            <tr>
                                <th class="text-center">7</th>
                                <th class="text-left">csskss</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                                <th class="text-center">0</th>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- tbl Ends -->
    <!-- table start -->
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Thông tin điều động cán bộ Khoa/Phòng</h5>
                <span>Số liệu cập nhật <strong>17:50 19/04/2023</strong></span>
                <div class="card-header-right">
                    <div class="label-main">
                        <a title="In đồ thị này" onclick="printDiv(&#39;get_dieudong&#39;);"
                            class="label  btn-warning"><i class="fa fa-print"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="get_dieudong" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                    <svg height="347" version="1.1" width="497.5" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        style="overflow: hidden; position: relative; left: -0.800018px; top: -0.400024px;">
                        <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0
                        </desc>
                        <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="35.86250114440918"
                            y="285.617712988206" text-anchor="end" font-family="sans-serif" font-size="12px"
                            stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.400018705674256" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0
                            </tspan>
                        </text>
                        <path fill="none" stroke="#5d9cec" d="M48.36250114440918,285.617712988206H472.5"
                            stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text
                            x="35.86250114440918" y="220.4632847411545" text-anchor="end" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.399994145146195" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                0.25</tspan>
                        </text>
                        <path fill="none" stroke="#5d9cec" d="M48.36250114440918,220.4632847411545H472.5"
                            stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text
                            x="35.86250114440918" y="155.308856494103" text-anchor="end" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.400000102196259" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0.5
                            </tspan>
                        </text>
                        <path fill="none" stroke="#5d9cec" d="M48.36250114440918,155.308856494103H472.5"
                            stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text
                            x="35.86250114440918" y="90.1544282470515" text-anchor="end" font-family="sans-serif"
                            font-size="12px" stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.399998429851792" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                0.75</tspan>
                        </text>
                        <path fill="none" stroke="#5d9cec" d="M48.36250114440918,90.1544282470515H472.5"
                            stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text
                            x="35.86250114440918" y="25" text-anchor="end" font-family="sans-serif" font-size="12px"
                            stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal">
                            <tspan dy="4.399999618530273" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">1
                            </tspan>
                        </text>
                        <path fill="none" stroke="#5d9cec" d="M48.36250114440918,25H472.5" stroke-width="0.5"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="260.4312505722046"
                            y="298.117712988206" text-anchor="middle" font-family="sans-serif" font-size="12px"
                            stroke="none" fill="#888888"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                            font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-166.4805,238.6802)">
                            <tspan dy="4.400018705674256" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                Phòng Điều Dưỡng</tspan>
                        </text>
                        <rect x="101.37968850135803" y="25" width="318.1031241416931" height="260.617712988206" rx="0"
                            ry="0" fill="#5fbeaa" stroke="none" fill-opacity="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                    </svg>
                    <div class="morris-hover morris-default-style" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- tbl Ends -->
</div>
</div>
</div>
</div>
</div>
</div>
</div> <!-- Pcode... -->
<!-- Close for header -->
</div>
</div>


<!-- Required Jquery -->
<!-- jquery slimscroll js -->
<!-- modernizr js -->
<!-- am chart -->
<!-- Chart js -->
<!-- Todo js -->
<!-- Custom js -->
<!-- Modal start -->
<div class="modal fade modal-icon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card borderless-card" style="margin-bottom: 0px;">
                <div class="card-block primary-breadcrumb">
                    <div class="breadcrumb-header">
                        <h5>THÔNG BÁO TỪ CHƯƠNG TRÌNH</h5>
                    </div>
                    <div class="page-header-breadcrumb"><span id="modal_body"></span> </div>
                    <div class="card-header-right">
                        <button type="button" class="btn btn-danger btn-sm btn-round" data-dismiss="modal"
                            style="float:right">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

<script>
    // create initial empty chart



    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }



    function getRandomIntInclusive(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    var chart1 = document.getElementById("chart1");
    var chart2 = document.getElementById("chart2");


    function get_count() {

        var mychart2 = new Chart(chart2, {
            type: 'bar',
            data: {
                labels: [],

                datasets: [{
                    data: [],
                    borderWidth: 1,
                    backgroundColor: 'pink',
                    label: 'ĐTB',
                }]
            },
            options: {
                hover: {
                    mode: null,
                },
                title: {
                    display: true,
                    text: "Tổng Hợp Kết Quả Đánh Giá 5S Tại Các Khu Vực Khác Nhau Ở Một Lần Đánh Giá ",
                },
                legend: {
                    display: true
                },
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                animation: {
                    onComplete: function() {

                    }
                },
            }
        });

        //get id_count
        var id = event.target.id;
        var mydata = 'count';
        set_chart(id, mychart2, mydata);
    };

    // get new data every 3 seconds
    function set_chart(id, mychart, mydata) {

        $.ajax({
            url: '{link_frm}',
            type: 'GET',
            data: { mydata: id },
            dataType: 'json',
            success: function(jsonData) {
                // process your data to pull out what you plan to use to update the chart

                console.log(jsonData.data);
                console.log(jsonData.label);
                mychart.options.hover.mode = null; // set hover to null
                mychart.data.labels = jsonData.label;
                mychart.data.datasets[0].data = jsonData.data
                // re-render the chart
                mychart.update();
                mychart.options.hover.mode = null; // set hover to null*/
            }
        });



    }
    //setInterval(getData, 3000);
</script>


<!-- mychart -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    //alert('ok');



    // add an event listener to the count link
    // add an event listener to the count link
    //$('#count-link').click(function(event) {
    //event.preventDefault(); // prevent the link from opening a new page

    // send an AJAX request to the server-side script that returns the count value(
</script>


<script> 
  anychart.onDocumentReady(function () {

    // Create the bar chart instance
    var barChart = anychart.bar();

    // Set bar chart data
    barChart.data([
        ['Apples', 10],
        ['Oranges', 15],
        ['Bananas', 7],
        ['Grapes', 20]
    ]);

    // Set bar chart title
    
    barChart.title("Tổng Hợp Kết Quả Đánh Giá 5S Tại Các Khu Vực Khác Nhau Ở Một Lần Đánh Giá");
     // Set chart orientation to horizontal    

    // Set bar chart container and draw
    barChart.container('chart2');
    barChart.draw();
    //-------------------------------------------------------


    var id = 1;
    var mydata = 'count';
    let chart_data=[];
    //set_chart(id, chartDiv, mydata);
    $.ajax({
        url: '{link_frm}',
        type: 'GET',
        data: { 'crosstable': 1,'mychart3':2 },
        dataType: 'json',
        success: function(jsonData) {
            // process your data to pull out what you plan to use to update the chart           
            //console.log(jsonData.data);
            //console.log(jsonData.label);
            //const obj = JSON.parse(jsonData);        
           
           
            var keys = Object.keys(jsonData);
            //console.log ( jsonData);
            //console.log ( keys[1]);
          

            const entries = Object.entries(jsonData);
            console.log(entries[0]);
          
  var dataSet = anychart.data.set(
    //entries[3]
    jsonData
    
  );
  
  

  // create bar chart
  var chart = anychart.bar();

  // turn on chart animation
  chart.animation(true);

  // force chart to stack values by Y scale.
  chart.yScale().stackMode('value');

  // set chart title text settings
  chart.title('TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5S TẠI CÁC KHU VỰC Ở CÁC LẦN ĐG KHÁC NHAU 2023');

  // set yAxis labels formatting, force it to add % to values
  //chart.yAxis(0).labels().format('{%Value}%');
  //chart.yAxis(0).labels().format('{%Value}%');
  
  // helper function to setup label settings for all series
  var setupSeriesLabels = function (series, name) {
    series.name(name).stroke('3 #fff 1');
    series.hovered().stroke('3 #fff 1');
  };

  // temp variable to store series instance
  var series;

  // create first series with mapped data
  // map data for the first series, take x from the zero column and value from the first column of data set
  //var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });

  
  <!-- BEGIN: list_count -->
  var label='L'+{list_count.count}
 
  var stt = {list_count.stt};
  //var tencot = {list_count.kp};
  var firstSeriesData = dataSet.mapAs({ x: 0, value: stt  });
  series = chart.bar(firstSeriesData);
  setupSeriesLabels(series, label);
 
   <!-- END: list_count -->

  

  // turn on legend
  chart.legend().enabled(true).fontSize(14).padding([0, 0, 0, 0]);

  //chart.interactivity().hoverMode('by-x');

  //chart.tooltip().displayMode('union').valuePrefix('ĐTB: ');
  chart.tooltip().displayMode('union').valuePrefix('');
  //chart.yAxis().labels().hAlign('left');
  //yLabels.hAlign("left");
  //chart.yAxis().labels().position("inside");

  var xLabels = chart.xAxis().labels();
  
  xLabels.width(200);
  xLabels.wordWrap("break-word");
  //xLabels.wordBreak("break-all");

  // create a series
  labels = chart.labels();
  labels.enabled(true);
  labels.fontSize(10);

  labels.fontColor("whitesmoke");
  //lấy ra label đầu tiên
  //labels = chart.getSeries(0).labels();

  //labels = series.labels();
    labels.position("center");
    labels.anchor("center");
//labels.position("center-top");
  //labels.anchor("left");
//labels.offsetY(-10);
  //labels.rotation(-90);

  // set container id for the chart
  chart.container('chart1');
  // initiate chart drawing
  chart.draw();
  

          
        }
    });
    
    
 
});</script>

<!-- END: main -->