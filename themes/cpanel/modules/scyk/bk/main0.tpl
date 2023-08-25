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

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->





<section class="content-header">

</section>

<section class="content">



  <div class="col-md-6">

    <div class="box box-primary" id="bieudo1">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo1');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>
          <h6 class="text-center">Biểu đồ 1: Hình thức báo cáo</h6>
          <div class='text-center'>


          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
      </div>

      <div class="box-body chart-responsive">
        <div class="chart chart_morris" id="pie-tlthsc" style="height: 300px; position: relative;"></div>
        <div id='pie-kp-legend'></div>
      </div>

    </div>



    <div class="box box-primary" id="bieudo3">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo3');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>
          <h6 class="text-center">Biểu đồ 3: Đối tượng xảy ra sự cố</h6>
          <div class='text-center'>


          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
      </div>

      <div class="box-body chart-responsive">
        <div class="chart chart_morris" id="pie-tldoituong" style="height: 320px; position: relative;"></div>
        <div id='pie-tldoituong-legend'></div>
      </div>

    </div>


  </div>

  <div class="col-md-6">

    <div class="box box-primary" id="bieudo2">
      <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo3');" class="label  btn-success"><i
              class="fa fa-print"></i></a></div>
        <h6 class='text-center'>Biểu đồ 2: Khoa phòng báo cáo</h6>
        <div class='text-center'>
          <!-- BEGIN: LANDG -->
          <a title="Lần {LANDG.count_evaluation}" onclick="changeClass(this);get_dskhoaphong(this);"
            class="ds-kp label label-info">{LANDG.count_evaluation}</a>
          <!-- END: LANDG -->

        </div>

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
        <div class="chart chart_morris" id="pie-tldgbandau" style="height: 320px; position: relative;"></div>
        <div id='pie-tldgbandau-legend'></div>
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
  let url='{link_frm}';
  get_tlhtbcsuco();
  //get_thkhoaphong(); // bieu do 1
  get_dskhoaphong(); //bieu do 2, mac dinh lan dg 1
  get_tldoituong(); //bieu do 3
  get_tldgbandau(); //bieu do 4


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
        console.log(d);

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

  //bieu do 3


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
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_tlhtbcsuco',
      dataType: "text",
      success: function(d) { //alert(d);
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
                '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label + '</span>';
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
              var node = document.createElement('span');
              node.innerHTML += '<span style="color:' + color +
                '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label + '</span>';
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
                '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label + '</span>';
              document.getElementById("pie-tldgbandau-legend").appendChild(node);
            }

          });
      }
    });
  }



  //bieu do 3








  //test stacked new
</script>


<script>
  function showAlert(element) {
    var text = element.textContent || element.innerText;
    alert(text);
  }
</script>





<!-- END: main -->