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





      <div class="box box-danger" id="bieudo2">
        <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo2');" class="label  btn-success"><i class="fa fa-print"></i></a></div>
          {testcode}
          <h6 class='text-center'>Biểu đồ 2: TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5S TẠI MỘT ĐƠN VỊ </BR> Ở CÁC LẦN ĐG KHÁC NHAU
          </h6>
          <table class="table-boder">
            <tr>
              <!-- BEGIN: KHOAPHONG1 -->
              <td style="text-align: left;"><span id="sp-kp" class="badge badge-info mr-2"
                  onclick="get_khoaphong_lan(this);">{KHOAPHONG1.account}</span></td>
              <!-- END: KHOAPHONG1 -->
            </tr>

            <tr>
              <!-- BEGIN: KHOAPHONG2 -->
              <td style="text-align: left;"><span id="sp-kp" class="badge badge-info mr-2"
                  onclick="get_khoaphong_lan(this);">{KHOAPHONG2.account}</span></td>
              <!-- END: KHOAPHONG2 -->
            </tr>

            <tr>
              <!-- BEGIN: KHOAPHONG3 -->
              <td style="text-align: left;"><span id="sp-kp" class="badge badge-info mr-2"
                  onclick="get_khoaphong_lan(this);">{KHOAPHONG3.account}</span></td>
              <!-- END: KHOAPHONG3 -->
            </tr>

          </table>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="box-body chart-responsive">
          <div class="chart" id="khoaphong_lan" style="height: 250px; position: relative;"></div>
        </div>

      </div>


    </div>

    <div class="col-md-6">

      <div class="box box-primary" id="bieudo3">    
        <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo3');" class="label  btn-success"><i class="fa fa-print"></i></a></div>
          <h6 class='text-center'>Biểu đồ 3: TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5S TẠI CÁC KHU VỰC </BR> Ở MỘT LẦN ĐÁNH GIÁ </h6>
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
          <div class="chart" id="dskhoaphong" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">


          </div>
        </div>

      </div>

      <div class="box box-primary" id="bieudo4">    
        <div class="box-header with-border">
        <div><a title="In đồ thị này" onclick="printDiv('bieudo4');" class="label  btn-success"><i class="fa fa-print"></i></a></div>
          <h6 class='text-center'><h6 class="text-center">Biểu đồ 4:TỶ LỆ XẾP LOẠI TOÀN VIỆN</h6> 
          <div class='text-center'>
          

          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body chart-responsive">
        <div class="chart chart_morris" id="pie-kp" style="height: 300px; position: relative;"></div>
        <div id='pie-kp-legend'></div>
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
  get_thkhoaphong(); // bieu do 1
  get_dskhoaphong(1); //bieu do 2, mac dinh lan dg 1
  get_tlkhoaphong(); //bieu do 4
  get_khoaphong_rand(); //bieu do 3, mac dinh kp bat ky



  //function random color2
  // Array of colors


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
  function get_thkhoaphong() {
    var chartColors = get_randcolor(12);
    console.log(chartColors);
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_thkhoaphong',
      dataType: "text",
      success: function(d) { //alert(d);
        const array = ['l1', 'l3'];



        let parsedData = JSON.parse(d);
        console.log(d);
        let keys = Object.keys(parsedData[0]);
        let ykeys = keys.slice(1); // Remove the first element from the array
        const ykeys2 = ykeys.map(item => item.replace(/l/g, 'Lần '));

        //console.log(ykeys2);
        //console.log(ykeys);

        new Morris.Bar({
          element: 'thkhoaphong',
          data: parsedData,
          xkey: ['khoa'],
          ykeys: ykeys,
          labels: ykeys2,
          labelTop: true,
          horizontal: false,
          stacked: true,
          barColors: chartColors,
          //barColors: ['#5FBEAA', '#34495E', '#FF9F55', '#E74C3C', '#1ABC9C', '#2ECC71'],
          //hideHover: 'always',
          xLabelAngle: 35,
          gridLineColor: '#FF9F55',
          barGap: 10, // Adjust the gap between columns (increase/decrease value as needed)
          barSize: 50, // Adjust the size of columns (increase/decrease value as needed) 
          resize: true,

          hoverCallback: function(index, options, content, row) {
            var dataset = options.data[index];
            var tooltip = '<div class="morris-hover-row-label">' + dataset.khoa + '</div>';

            ykeys.forEach(function(key, i) {
              var value = dataset[key];
              if (value) {
                tooltip += '<div class="morris-hover-point" style="color: ' + chartColors[i] + '">';
                tooltip += '<i class="fas fa-square"></i> ' + ykeys2[i] + ': ' + value;
                tooltip += '</div>';
              }
            });

            return tooltip;
          }
        });


        var legendContainer = document.getElementById("thkhoaphong-legend");

        ykeys2.forEach(function(key, index) {
          var dataItem = {
            label: key
          };

          var node = document.createElement('span');
          node.innerHTML = '<span style="color:' + chartColors[index] +
            '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + dataItem.label + '</span>';
          legendContainer.appendChild(node);
        });

      }
    });
  }




  //bieu do 2
  function get_dskhoaphong(element) {
    $("#dskhoaphong").empty();
    let num = element.textContent || element.innerText;
    if (element === 1) num = element;

    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_dskhoaphong&num=' + num,
      dataType: "text",
      success: function(d) { //alert(d);
        console.log(d);

        new Morris.Bar({
          element: 'dskhoaphong',
          data: JSON.parse(d),
          xkey: ['label'],
          ykeys: ['value'],
          labels: ['ĐTB'],
          //lineColors: ['#a0d0e0', '#3c8dbc'],
          horizontal: true,
          stacked: false,
          barColors: ['#5FBEAA', '#34495E', '#FF9F55', '#E74C3C', '#1ABC9C', '#2ECC71'],
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

  function get_khoaphong_lan(element) {
    $('#khoaphong_lan').empty();
    let kp = element.textContent || element.innerText;

    //let kp = element.textContent || element.innerText; 
    //alert (kp); 
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_khoaphong_lan&kp=' + kp,
      dataType: "text",
      success: function(d) {
        console.log(d);
        var data = JSON.parse(d);
        var randKpValue = data[0].LAN_KP;
        $("span#sp-kp").removeClass().addClass('badge badge-info');
        $("span#sp-kp").filter(function() {
          return $(this).text() === randKpValue;
        }).removeClass().addClass('badge badge-warning');
        //alert(d);
        new Morris.Bar({
          element: 'khoaphong_lan',
          data: JSON.parse(d),
          xkey: ['y'],
          ykeys: ['dtb'],
          labels: ['ĐTB'],
          //lineColors: ['#a0d0e0', '#3c8dbc'],
          horizontal: true,
          barColors: ['#5FBEAA', '#34495E', '#FF9F55', '#E74C3C', '#1ABC9C', '#2ECC71'],
          hideHover: 'auto',
          xLabelAngle: 35,
          gridLineColor: '#FF9F55',
          resize: true,
          barGap: 4, // Adjust the gap between columns (increase/decrease value as needed)
          barSize: 50, // Adjust the size of columns (increase/decrease value as needed) 
          xLabelFormat: function(x) {
            return "L" + x.src.y + "[" + x.src.ngay + "]";
          },
          hoverCallback: function(index, options, content, row) {
            return "DTB:" + row.dtb + " (" + row.xl + ")";
          }
        });
      }
    });

  }

  //bieu do 3 -random khoa phong
  function get_khoaphong_rand() {
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_khoaphong_rand',
      dataType: "text",
      success: function(d) {
        console.log(d);
        var data = JSON.parse(d);
        //console.log(data);    
        var randKpValue = data[0].RAND_KP;
        $("span#sp-kp").removeClass().addClass('badge badge-info');
        $("span#sp-kp").filter(function() {
          return $(this).text() === randKpValue;
        }).removeClass().addClass('badge badge-warning');
        //alert(d);
        new Morris.Bar({
          element: 'khoaphong_lan',
          data: JSON.parse(d),
          xkey: ['y'],
          ykeys: ['dtb'],
          labels: ['ĐTB'],
          //lineColors: ['#a0d0e0', '#3c8dbc'],
          horizontal: true,
          //barColors: ['#5FBEAA', '#34495E', '#FF9F55', '#E74C3C', '#1ABC9C', '#2ECC71'],
          hideHover: 'auto',
          xLabelAngle: 35,
          gridLineColor: '#FF9F55',
          resize: true,
          barGap: 4, // Adjust the gap between columns (increase/decrease value as needed)
          barSize: 25, // Adjust the size of columns (increase/decrease value as needed) 
          xLabelFormat: function(x) {
            return "L" + x.src.y + "[" + x.src.ngay + "]";
          },
          hoverCallback: function(index, options, content, row) {
            return "DTB:" + row.dtb + " (" + row.xl + ")";
          }
        });
      }
    });

  }


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


  function get_tlkhoaphong() {
    $.ajax({
      type: 'post',
      cache: !1,
      url: url + '&act=get_tlkhoaphong',
      dataType: "text",
      success: function(d) { //alert(d);
        pie_data = JSON.parse(d),
          new Morris.Donut({
            element: 'pie-kp',
            donutType: 'donut',
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

  // LINE CHART
  var line = new Morris.Line({
    element: 'bar-example',
    resize: true,
    data: [
      {y: '2011 Q1', item1: 2666},
      {y: '2011 Q2', item1: 2778},
      {y: '2011 Q3', item1: 4912},
      {y: '2011 Q4', item1: 3767},
      {y: '2012 Q1', item1: 6810},
      {y: '2012 Q2', item1: 5670},
      {y: '2012 Q3', item1: 4820},
      {y: '2012 Q4', item1: 15073},
      {y: '2013 Q1', item1: 10687},
      {y: '2013 Q2', item1: 8432}
    ],
    xkey: 'y',
    ykeys: ['item1'],
    labels: ['Item 1'],
    lineColors: ['#3c8dbc'],
    hideHover: 'auto',

  });


  //BAR CHART
  var bar = new Morris.Bar({
    element: '5s-chart',
    resize: true,
    data: [
      {y: '2006', a: 100, b: 90},
      {y: '2007', a: 75, b: 65},
      {y: '2008', a: 50, b: 40},
      {y: '2009', a: 75, b: 65},
      {y: '2010', a: 50, b: 40},
      {y: '2011', a: 75, b: 65},
      {y: '2012', a: 100, b: 90}
    ],
    barColors: ['#00a65a', '#f56954'],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['CPU', 'DISK'],
    hideHover: 'auto'
  });



  //test stacked new
  new Morris.Bar({
    element: 'test-bar',
    data: [
      { t: "a", a: 2, b: 5, c: 2 },
      { t: "b", a: 3, b: null, c: null },
      { t: "c", a: 4, b: 8, c: 12 },
      { t: "d", a: null, b: 9, c: 15 }
    ],
    xkey: 't',
    ykeys: ['a', 'b', 'c'],
    labels: ['Spotify', 'Apple', 'Uber'],
    stacked: true,
    horizontal: true,
    hoverCallback: function(index, options, content, row) {
      var finalContent = $(content);
      var cpt = 0;

      $.each(row, function(n, v) {
        if (v == null) {
          $(finalContent).eq(cpt).empty();
        }
        cpt++;
      });

      return finalContent;
    }
  });



  $(function() {
    var tmp_content = "Morris.Line({<br>&emsp;element: 'chart_line_1',<br>&emsp;data: [<br>&emsp;&emsp;{year: '1958', nb: 1},<br>&emsp;&emsp;{year: '1962', nb: 2},<br>&emsp;&emsp;{year: '1970', nb: 3},<br>&emsp;&emsp;{year: '1994', nb: 4},<br>&emsp;&emsp;{year: '2002', nb: 5},<br>&emsp;],<br>&emsp;xkey: 'year',<br>&emsp;ykeys: ['nb'],<br>&emsp;labels: ['Editions Wins'],<br>});";
    $('#std_line').popover({content: tmp_content, html: true});

    tmp_content = "Morris.Bar({<br>&emsp;element: 'chart_hist_1',<br>&emsp;data: [<br>&emsp;&emsp;{team: 'Brazil', nb: 5},<br>&emsp;&emsp;{team: 'Italy', nb: 4},<br>&emsp;&emsp;{team: 'Germany', nb: 4},<br>&emsp;&emsp;{team: 'Uruguay', nb: 2},<br>&emsp;&emsp;{team: 'Argentina', nb: 2},<br>&emsp;],<br>&emsp;xkey: 'team',<br>&emsp;ykeys: ['nb'],<br>&emsp;labels: ['Editions Wins'],<br>});";
    $('#std_bar').popover({content: tmp_content, html: true});

    tmp_content = "Morris.Bar({<br>&emsp;element: 'chart_hist_3',<br>&emsp;data: [<br>&emsp;&emsp;{team: 'Brazil', nb: 5, avg: 2.2},<br>&emsp;&emsp;{team: 'Italy', nb: 4, avg: 1.9},<br>&emsp;&emsp;{team: 'Germany', nb: 4, avg: 2.1},<br>&emsp;&emsp;{team: 'Uruguay', nb: 2, avg: 1.4},<br>&emsp;&emsp;{team: 'Argentina', nb: 2, avg: 1.8},<br>],<br>&emsp;xkey: 'team',<br>&emsp;ykeys: ['nb', 'avg'],<br>&emsp;labels: ['Editions Wins', 'Average Points'],<br>&emsp;<strong>nbYkeys2: 1</strong><br>});";
    $('#combo_bar').popover({content: tmp_content, html: true});

    tmp_content = "Morris.Donut({<br>&emsp;element: 'pie-kp',<br>&emsp;data: [<br>&emsp;&emsp;{label: 'Test', value: 5 },<br>&emsp;&emsp;{label: 'Asia', value: 5 },<br>&emsp;&emsp;{label: 'Europe', value: 14 },<br>&emsp;&emsp;{label: 'North America', value: 3 },<br>&emsp;&emsp;{label: 'South America', value: 5 }<br>&emsp;]<br>});";
    $('#std_donut').popover({content: tmp_content, html: true});

    $('[data-toggle="popover"]').popover();
  });
</script>


<script>
  function showAlert(element) {
    var text = element.textContent || element.innerText;
    alert(text);
  }
</script>





<!-- END: main -->