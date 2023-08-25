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

<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js">
</script>
<script src="{BASE_URL}assets/js/language/jquery.ui.datepicker-vi.js"></script>



<style>
 /* Flexbox layout */
 
 #pie-mucdott_nb-legend,
 #pie-tldoituong-legend,
 #pie-mucdott_nb3b-legend

   {
   display: flex;
   flex-wrap: wrap;
 }

 .legend-item {
   width: 50%;
   /* Two items per row */
   box-sizing: border-box;
   padding: 5px;
   /* Add spacing between items */
 }

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
  border-right: 1px solid black;
  /* Add a vertical line between the columns */
  border-bottom: 1px solid black;
  /* Add a vertical line between the columns */
  padding-right: 5px;
  /*box-sizing: border-box; /* Include border in width calculation 
      .box:last-child {
                border-right: none; /* Remove border from the last column 
            }


    }


  }  
  */
</style>


<script>
  $(function() {
    // datetime 
    $('#datetime1').datepicker({
      dateFormat: 'dd-mm-yy',


      onSelect: function(selectedDate) {
        $('#datetime2').datepicker('option', 'minDate', selectedDate);

      }
    });

    $('#datetime2').datepicker({
      dateFormat: 'dd-mm-yy',

      onSelect: function(selectedDate) {
        $('#datetime1').datepicker('option', 'maxDate', selectedDate);

      }
    });

  });
</script>





<section class="content-header">

  <form name="nmyform1" id="myform1" method="post" action="">
    <input type="hidden" name="sta" id="sta" value="find_item" />
    <table class="table table-hover">

      <thead>
        <tr>

          <th>
            <div class="input-group  bg-primary">
           <h5 class="modal-title" id="exampleModalLabel">Từ ngày
            </h5>
              <input id="datetime1" name="tg_tungay" value="{BC.tungay}" type="text" class="form-control">
            </div>
          </th>
          <th>
            <div class="input-group bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">Đến ngày
            </h5>
              <input id="datetime2" name="tg_denngay" value="{BC.denngay}" type="text" class="form-control">
            </div>
          </th>
          <th>
            <div class="input-group">
              <button type="submit" class="btn btn-success" id="idfind" name="btn_find" onclick="get_tlhtbcsuco();">
                <i class="icofont icofont-location-arrow"></i><strong>Xem</strong></button>
            </div>
          </th>
        </tr>
      </thead>
    </table>
  </form>


  <div class="col-md-12 bg-success text-center py-2">

    <h5 class="modal-title" id="exampleModalLabel">BIỂU ĐỒ PHÂN TÍCH SƠ BỘ
    </h5>
  </div>
  </div>




  <div class="col-md-6">

    <div class="box box-primary" id="bieudo1">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo1');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>

        <h6 class="text-center">Biểu đồ 1: Hình thức báo cáo</h6>


        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="box-body chart-responsive">
        <div class="chart chart_morris" id="pie-tlthsc" style="height: 310px; position: relative;"></div>
        <div id='pie-kp-legend'></div>
      </div>

    </div>



    <div class="box box-primary" id="bieudo3">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo3');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>

        <h6 class="text-center">Biểu đồ 3: Đối tượng xảy ra sự cố</h6>


        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="box-body chart-responsive">
        <div class="chart chart_morris" id="pie-tldoituong" style="height: 320px; position: relative;">
        </div>
        <div id='pie-tldoituong-legend'></div>
      </div>

    </div>

    <div class="box box-primary" id="bieudo5">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo5');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>Biểu 5: Đối tượng báo cáo sự cố</h6>


        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="pie-doituongbc" style="height: 350px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        </div>
        <div id='pie-doituongbc-legend'></div>
      </div>

    </div>

  </div>

  <div class="col-md-6">

    <div class="box box-primary" id="bieudo2">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo2');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>Biểu đồ 2: Khoa phòng báo cáo</h6>


        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="dskhoaphong" style="height: 330px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">


        </div>
      </div>

    </div>

    <div class="box box-primary" id="bieudo4">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo4');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>
          <h6 class="text-center">Biểu đồ 4: Đánh giá ban đầu về mức độ ảnh hưởng của sự cố</h6>
          <div class='text-center'>


          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
      </div>

      <div class="box-body chart-responsive">
        <div class="chart chart_morris" id="pie-tldgbandau" style="height: 335px; position: relative;"></div>
        <div id='pie-tldgbandau-legend'></div>
      </div>

    </div>


    <div class="box box-primary" id="bieudo6">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo6');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>Biểu đồ 6: Phân loại sự cố theo mức độ tổn thương trên người bệnh</h6>
        <div class='text-center'>


        </div>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="pie-mucdott_nb" style="height: 330px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        </div>
        <div id='pie-mucdott_nb-legend'></div>
      </div>

    </div>



  </div>


  <div class="col-md-12 bg-primary text-center py-2">

    <h5 class="modal-title" id="exampleModalLabel">BIỂU ĐỒ DO NHÓM CHUYÊN GIA PHÂN TÍCH SỰ CỐ Y KHOA
    </h5>
  </div>
  </div>


  <div class="col-md-6">


    <div class="box box-primary" id="bieudo1b">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo1b');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>
          <h6 class="text-center">Biểu đồ 1: Phân loại sự cố theo nhóm sự cố (INCIDENT TYPE)</h6>
          <div class='text-center'>        

          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
      </div>

      <div class="box-body chart-responsive">
        <div class="chart chart_morris" id="plnhomsuco" style="height: 320px; position: relative;"></div>
        <div id='pie-plnhomsuco-legend'></div>

      </div>

    </div>


    <div class="box box-primary" id="bieudo3b">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo6');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>Biểu đồ 3: Đánh giá mức độ tổn thương trên người bệnh</h6>
        <div class='text-center'>


        </div>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="pie-mucdott_nb3b" style="height: 330px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        </div>
        <div id='pie-mucdott_nb3b-legend'></div>
      </div>

    </div>


  </div>

  <div class="col-md-6">


    <div class="box box-primary" id="bieudo2b">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo2b');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>
          <h6 class="text-center">Biểu đồ 2: Phân loại sự cố theo nhóm nguyên nhân sự cố </h6>
          <div class='text-center'>


          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
      </div>

      <div class="box-body chart-responsive">
        <div class="chart chart_morris" id="plnguyennhan" style="height: 360px; position: relative;"></div>
        <div id='pie-plnguyennhan-legend'></div>
      </div>

    </div>

    <div class="box box-primary" id="bieudo4b">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo4b');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>
          <h6 class="text-center">Biểu đồ 4: Đánh giá mức độ tổn thương trên tổ chức </h6>
          <div class='text-center'>


          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
      </div>

      <div class="box-body chart-responsive">
        <div class="chart chart_morris" id="pie-mucdott_tc4b" style="height: 340px; position: relative;"></div>
        <div id='pie-mucdott_tc4b-legend'></div>
      </div>

    </div>

    

  </div>



</section>

</div>



<div class="control-sidebar-bg"></div>
</div>



<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }


  function printDiv1(divName) {
    var divToPrint = document.getElementById(divName);
    var htmlToPrint = '';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();

  }
</script>




<script>
  $(document).ready(function() {
    $('.ds-kp').each(function() {
      if ($(this).text() === "1") {
        $(this).removeClass('label-info');
        $(this).addClass('label-warning');
      }
    });
  });
</script>

<script>
  function changeClass(element) {

    var allLinks = document.getElementsByClassName('ds-kp');
    for (var i = 0; i < allLinks.length; i++) {
      //allLinks[i].classList.remove('label-warning');
      allLinks[i].classList.add('label-info');

    }
    element.classList.remove("label-info");
    element.classList.add('label-warning');


  }
</script>



<script>
  let tngay = '{BC.tungay}';
  let dngay = '{BC.denngay}';
  let url='{link_frm}'+'&tungay='+tngay+'&denngay='+dngay;
  //alert ('tngay='+tngay);
  get_tlhtbcsuco();//bieu do 1 
  get_dskhoaphong(); //bieu do 2, mac dinh lan dg 1
  get_tldoituong(); //bieu do 3
  get_tldgbandau(); //bieu do 4
  get_doituongbc(); //bieu do 5
  get_mucdott_nb(); //bieu do 6
  get_plnhomsuco(); //bieu do 1b
  get_plnguyenhan();//bieu do 2b
  get_mucdott_nb3b(); //bieu do 3b
  get_mucdott_tc4b(); //bieu do 4b



  // Function to generate random colors
  function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var temp = array[i];
      array[i] = array[j];
      array[j] = temp;
    }
    return array;
  }

  function get_randcolor(num) {
    var colors = ["red", "blue", "green", "yellow", "pink", "purple", "orange", "yellow-green", "red-violet", "brown",
      "blue-green"
    ];
    colors = shuffleArray(colors); // Shuffle the colors array

    var randomColors = [];

    for (var i = 0; i < num; i++) {
      var colorName = colors[i % colors.length]; // Select colors sequentially
      var hexValue = getColorHexValue(colorName);
      randomColors.push(hexValue);
    }

    return randomColors;
  }

  function getColorHexValue(colorName) {
    // Map color names to their hexadecimal values
    var colorMap = {
      red: "#FF0000",
      blue: "#0000FF",
      green: "#00FF00",
      yellow: "#FFFF00",
      pink: "#FFC0CB",
      purple: "#800080",
      orange: "#FFA500",
      "yellow-green": "#9ACD32",
      "red-violet": "#C71585",
      brown: "#A52A2A",
      "blue-green": "#008080"
      // Add more color mappings if needed
    };

    // Retrieve the hexadecimal value for the given color name
    var hexValue = colorMap[colorName.toLowerCase()];
    return hexValue || ""; // Return an empty string if no mapping is found
  }
  //var testcolor = get_randcolor(12);

  //bieu do 1


  function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
  //bieu do 2
  function get_dskhoaphong() {
    var chartColors = get_randcolor(12);

    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_dskhoaphong',
      dataType: "text",
      success: function(d) { //alert(d);
        //console.log(d);

        new Morris.Bar({
          element: 'dskhoaphong',
          data: JSON.parse(d),
          xkey: ['label'],
          ykeys: ['value'],
          labels: ['Số Lần'],
          //lineColors: ['#a0d0e0', '#3c8dbc'],
          horizontal: true,
          stacked: false,
          barColors: function(row, series, type) {


            return getRandomColor();

          },
          hideHover: 'auto',
          xLabelAngle: 35,
          gridLineColor: '#FF9F55',
          barGap: 10, // Adjust the gap between columns (increase/decrease value as needed)
          barSize: 50, // Adjust the size of columns (increase/decrease value as needed) 
          resize: true,

        });
      }
    });
  }

  //bieu do 1b  

  function get_plnhomsuco() {
    var chartColors = get_randcolor(12);

    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_plnhomsuco',
      dataType: "text",
      success: function(d) { //alert(d);
        //console.log(d),
        pie_data = JSON.parse(d),
        new Morris.Donut({
            element: 'plnhomsuco',
            donutType: 'pie',
            data: pie_data,
            dataLabels: true,
            showPercentage: true,
            dataLabelsPosition: 'outside',
            dataLabelsFormatter: function(value, ratio, label) {
              return label;
            },
            colors: chartColors
            }).options.colors.forEach(function(color, a) {
              if (pie_data[a] != undefined) {
                var node = document.createElement('span');
                node.innerHTML += '<span style="color:' + color +
                '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label +' ['+
                pie_data[a].value+']'+  '</span>';
              document.getElementById("pie-plnhomsuco-legend").appendChild(node);
                
              }
        })

       
      }
    });
  }

   //bieu do 2b  

   function get_plnguyenhan() {
    var chartColors = get_randcolor(12);

    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_plnguyenhan',
      dataType: "text",
      success: function(d) { //alert(d);
        //console.log(d),
        pie_data = JSON.parse(d),
        new Morris.Donut({
            element: 'plnguyennhan',
            donutType: 'pie',
            data: pie_data,
            dataLabels: true,
            showPercentage: true,
            dataLabelsPosition: 'outside',
            dataLabelsFormatter: function(value, ratio, label) {
              return label;
            },
            colors: chartColors
            }).options.colors.forEach(function(color, a) {
              if (pie_data[a] != undefined) {
                var node = document.createElement('span');
                node.innerHTML += '<span style="color:' + color +
                '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label +' ['+
                pie_data[a].value+']'+  '</span>';
              document.getElementById("pie-plnguyennhan-legend").appendChild(node);
                
              }
        })

       
      }
    });
  }


  //bieu do 3 -random khoa phong



  //bieu do 4
  function getRandomColors(count) {
    var colors = [];
    var availableColors = ['red', 'blue', 'green', 'yellow', 'red', 'purple', 'pink'];
    for (var i = 0; i < count; i++) {
      var color;
      do {
        color = availableColors[Math.floor(Math.random() * availableColors.length)];
      } while (colors.includes(color));
      colors.push(color);
    }
    return colors;
  }




  //bieu do ty le bcsuco- bieu do 1

  function get_tlhtbcsuco() {
    var tungay = document.getElementById('datetime1').value;
    var denngay = document.getElementById('datetime2').value;

    //lấy ra từ ngày, đến ngày
    $.ajax({
      type: 'post',
      cache: !1,
      //url: url + '&act=get_tlhtbcsuco',

      url: url + '&act=get_tlhtbcsuco&tungay=' + tungay,
      dataType: "text",
      success: function(d) { //alert(d);
        //console.log(d);
        pie_data = JSON.parse(d),
          new Morris.Donut({
            element: 'pie-tlthsc',
            donutType: 'pie',
            data: pie_data,
            dataLabels: true,
            showPercentage: true,
            dataLabelsPosition: 'outside',
            dataLabelsFormatter: function(value, ratio, label) {
              return label;
            },

            colors: getRandomColors(pie_data.length),
          }).options.colors.forEach(function(color, a) {
            if (pie_data[a] != undefined) {
              var node = document.createElement('span');
              node.innerHTML += '<span style="color:' + color +
                '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label +' ['+
                pie_data[a].value+']'+  '</span>';
              document.getElementById("pie-kp-legend").appendChild(node);
            }

          });
      }
    });
  }

  //bieu do 3
  function get_tldoituong() {
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_tldoituong',
      dataType: "text",
      success: function(d) { //alert(d);
        pie_data = JSON.parse(d),
          new Morris.Donut({
            element: 'pie-tldoituong',
            donutType: 'pie',
            data: pie_data,
            dataLabels: true,
            showPercentage: true,
            dataLabelsPosition: 'outside',
            dataLabelsFormatter: function(value, ratio, label) {
              return label;
            },

            colors: getRandomColors(pie_data.length),
          }).options.colors.forEach(function(color, a) {
            if (pie_data[a] != undefined) {
              var node = document.createElement('div');
                node.className = 'legend-item';
                node.innerHTML = '<span style="color:' + color +
                  '"><i style="margin-left: 5px;" class="fas fa-square"></i> ' + pie_data[a].label + ' [' +
                  pie_data[a].value + ']' + '</span>';
              document.getElementById("pie-tldoituong-legend").appendChild(node);
            }

          });
      }
    });
  }

  //bieu do 4 
  function get_tldgbandau() {
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_tldgbandau',
      dataType: "text",
      success: function(d) { //alert(d);
        pie_data = JSON.parse(d),
          new Morris.Donut({
            element: 'pie-tldgbandau',
            donutType: 'pie',
            data: pie_data,
            dataLabels: true,
            showPercentage: true,
            dataLabelsPosition: 'outside',
            dataLabelsFormatter: function(value, ratio, label) {
              return label;
            },

            colors: getRandomColors(pie_data.length),
          }).options.colors.forEach(function(color, a) {
            if (pie_data[a] != undefined) {
              var node = document.createElement('span');
              node.innerHTML += '<span style="color:' + color +
              '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label +' ['+
              pie_data[a].value+']'+  '</span>';
              document.getElementById("pie-tldgbandau-legend").appendChild(node);
            }

          });
      }
    });
  }

  //bieu do 5
  function get_doituongbc() {
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_doituongbc',
      dataType: "text",
      success: function(d) { //alert(d);
        //console.log(d);
        pie_data = JSON.parse(d),
          new Morris.Donut({
            element: 'pie-doituongbc',
            donutType: 'pie',
            data: pie_data,
            dataLabels: true,
            showPercentage: true,
            dataLabelsPosition: 'outside',
            dataLabelsFormatter: function(value, ratio, label) {
              return label;
            },

            colors: getRandomColors(pie_data.length),
          }).options.colors.forEach(function(color, a) {
            if (pie_data[a] != undefined) {
              var node = document.createElement('span');
              node.innerHTML += '<span style="color:' + color +
              '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label +' ['+
              pie_data[a].value+']'+  '</span>';
              document.getElementById("pie-doituongbc-legend").appendChild(node);
            }

          });
      }
    });
  }

  //bieu do 6: muc do ton thuong nb
  function get_mucdott_nb() {
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_mucdott_nb',
      dataType: "text",
      success: function(d) { //alert(d);
        //console.log(d);
        pie_data = JSON.parse(d),
          new Morris.Donut({
            element: 'pie-mucdott_nb',
            donutType: 'pie',
            data: pie_data,
            dataLabels: true,
            showPercentage: true,
            dataLabelsPosition: 'outside',
            dataLabelsFormatter: function(value, ratio, label) {
              return label;
            },

            colors: getRandomColors(pie_data.length),
          }).options.colors.forEach(function(color, a) {
            if (pie_data[a] != undefined) {
              var node = document.createElement('div');
                node.className = 'legend-item';
                node.innerHTML = '<span style="color:' + color +
                  '"><i style="margin-left: 5px;" class="fas fa-square"></i> ' + pie_data[a].label + ' [' +
                  pie_data[a].value + ']' + '</span>';
              document.getElementById("pie-mucdott_nb-legend").appendChild(node);
            }

          });
      }
    });
  }



  //bieu do 3b: muc do ton thuong nb
  function get_mucdott_nb3b() {
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_mucdott_nb3b',
      dataType: "text",
      success: function(d) { //alert(d);
        //console.log(d);
        pie_data = JSON.parse(d),
          new Morris.Donut({
            element: 'pie-mucdott_nb3b',
            donutType: 'pie',
            data: pie_data,
            dataLabels: true,
            showPercentage: true,
            dataLabelsPosition: 'outside',
            dataLabelsFormatter: function(value, ratio, label) {
              return label;
            },

            colors: getRandomColors(pie_data.length),
          }).options.colors.forEach(function(color, a) {
            if (pie_data[a] != undefined) {
              var node = document.createElement('div');
                node.className = 'legend-item';
                node.innerHTML = '<span style="color:' + color +
                  '"><i style="margin-left: 5px;" class="fas fa-square"></i> ' + pie_data[a].label + ' [' +
                  pie_data[a].value + ']' + '</span>';
              document.getElementById("pie-mucdott_nb3b-legend").appendChild(node);
            }

          });
      }
    });
  }
  
  //bieu do 4b: muc do ton thuong to chuc
  function get_mucdott_tc4b() {
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_mucdott_tc4b',
      dataType: "text",
      success: function(d) { //alert(d);
        //console.log(d);
        pie_data = JSON.parse(d),
          new Morris.Donut({
            element: 'pie-mucdott_tc4b',
            donutType: 'pie',
            data: pie_data,
            dataLabels: true,
            showPercentage: true,
            dataLabelsPosition: 'outside',
            dataLabelsFormatter: function(value, ratio, label) {
              return label;
            },

            colors: getRandomColors(pie_data.length),
          }).options.colors.forEach(function(color, a) {
            if (pie_data[a] != undefined) {
              var node = document.createElement('span');
              node.innerHTML += '<span style="color:' + color +
              '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label +' ['+
              pie_data[a].value+']'+  '</span>';
              document.getElementById("pie-mucdott_tc4b-legend").appendChild(node);
            }

          });
      }
    });
  }
  








  //test stacked new
</script>


<script>
  function showAlert(element) {
    var text = element.textContent || element.innerText;
    alert(text);
  }
</script>





<!-- END: main -->