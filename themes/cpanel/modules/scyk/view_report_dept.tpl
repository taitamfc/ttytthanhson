<!-- BEGIN: main -->
<style>
  .icon-btn a {
    border-radius: 50%;
  }



  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: rgba(42, 36, 188, 0.581);
    border: none;
  }


  /* Flexbox layout */
  #pie-tldoituong-legend,
  #pie-doituongbc-legend,
  #pie-mucdott_nb-legend

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
</style>
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

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/font-awesome.min.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/ionicons.min.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/morris.css">



<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/_all-skins.min.css">



<script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>


<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/morris.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/AdminLTE.min.css">

<link rel="stylesheet" href="{BASE_URL}{NV_ASSETS_DIR}/css/_all-skins.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="{BASE_URL}{NV_ASSETS_DIR}/js/morris-chart/morris.js"></script>

<script src="{BASE_URL}{NV_ASSETS_DIR}/js/morris-chart/adminlte.min.js"></script>


<div class="pcoded-inner-content" id="demo1">
  <div class="main-body">
    <!-- Page-header start -->
    <!-- Page-header end -->

    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">
        <div class="bg-info p-10">
          <i class="icofont icofont-paper-plane"></i>
          <strong>BÁO CÁO HÀNG TUẦN</strong>
        </div>

        <div class="card-block">
          <div class="table-responsive" style="padding-bottom: 100px;">
            <form name="frm1" id="myform1" method="post" action="">
              <input type="hidden" name="sta" id="sta" value="find_item" />
              <table class="table bieumau table-hover table-responsive">
                <thead>
                  <tr style="text-transform: uppercase;background-color: #2e8ed8; color:white">
                    <th scope="row" class="text-center" colspan="4"><i class="icofont icofont-paper-plane">THÔNG TIN KỲ
                        BÁO CÁO TỪ NGÀY
                        {BC.tungay} ĐẾN NGÀY {BC.denngay}</i>
                    </th>
                  </tr>
                </thead>
                <tbody>


                  <tr>
                    <td class="col-1"><b><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        Từ Ngày:</b></td>

                    <td><input id="start-date" name="from_date" type="text" class="form-control" value="{BC.tungay}"
                        placeholder="Chọn ngày bắt đầu">
                    </td>

                    <td><input name="hidden" value="" type="text" class="form-control hidden2"
                        style="border:none; background: transparent;" disabled>
                    </td>

                  </tr>

                  <tr>

                    <td class="col-1"><b><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        Đến Ngày:</b></td>

                    <td><input id="end-date" name="to_date" value="{BC.denngay}" type="text" class="form-control"
                        placeholder="Chọn ngày kết thúc"></td>
                  </tr>

                  <tr>
                    <td>


                      <!-- start modal -->




                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td class="text-center">
                      <button type="submit" name="btn_xem" class="btn btn-warning">
                        <i class="icofont icofont-location-arrow"></i><strong>Xem/In BC</strong>
                      </button>


                    </td>
                  </tr>
                </tfoot>
              </table>
            </form> <!-- end form1 -->



          </div>
        </div>
      </div>

    </div>
  </div> <!-- Pcode... -->
  <!-- Close for header -->
  <!-- Tooltips on textbox card start -->
  <div class="col-sm-12" {hienbieumau}>

    <div class="card">

      <!-- Tạo biểu mẫu đánh giá -->
      <div class="card-block table-responsive" id="bieumau2">
        <div class="col-lg-12">
          <div class="card-block">

            <div class="container">
              <table id="tbl_danhsach" class="table table-hover table-responsive" style="width: 100%">

                <tr>
                  <th colspan="5">{BCHEAD.header1}
                  </th>
                  <th colspan="5" class="text-center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM
                    <br>Độc lập – Tự do – Hạnh phúc
                  </th>
                </tr>

                <tr>
                  <th colspan="5">Số: .../BC-TTYT
                  </th>
                  <th colspan="5" class="text-center">
                    <i>{BC.tendv}, ngày... tháng... năm...</i>
                  </th>
                </tr>

                <tr>
                  <th colspan="10" class="text-center">BÁO CÁO<br>
                    Đề xuất danh mục sự cố y khoa<br>
                    và nhóm chuyên gia phân tích sự cố y khoa tương ứng<br>
                    <i>Thời gian (Từ ngày {BC.tungay} đến ngày {BC.denngay} )</i>
                  </th>
                </tr>
                <tr>
                  <th colspan="10">I. DANH SÁCH BÁO CÁO Y KHOA
                  </th>
                </tr>


                <tr>
                  <th colspan="10" class="text-center bg-info">DANH SÁCH BÁO CÁO Y
                    KHOA ĐÃ TIẾP NHẬN </th>
                </tr>


                <tr>
                  <th>#</th>
                  <th>Mã BC</th>
                  <th>Khoa phòng</th>
                  <th>Tóm tắt nội dung</th>
                  <th>Ngày giờ BC</th>
                  <th>Trạng thái</th>
                  <th>Ghi chú</th>
                </tr>

                <tbody>
                  <!-- BEGIN: DSBC -->
                  <tr class="vl">
                    <th>{DSBC.stt}</th>
                    <td>{DSBC.masobc}</td>
                    <td>{DSBC.khoaphong}</td>
                    <td style="white-space:pre-wrap; word-break:break-word">{DSBC.tomtatnd}</td>
                    <td>{DSBC.ngaygio}</td>
                    <td>{DSBC.trangthai}</td>
                    <td>{DSBC.ghichu}</td>
                  </tr>
                  <!-- END: DSBC -->

                </tbody>

                <tr>
                  <th colspan="10">II. TẦN SUẤT XẢY RA (theo phụ lục 1 đính kèm):
                  </th>
                </tr>
                <tr>
                  <th colspan="10">


                    <div class="row">
                      <!-- SITE VISIT CHART start -->

                      <div class="col-md-6">

                        <div class="box box-primary" id="bieudo1">
                          <div class="box-header with-border">
                            <div><a title="In đồ thị này" onclick="printDiv('bieudo1');" class="label  btn-success"><i
                                  class="fa fa-print"></i></a></div>

                            <h6 class="text-center">Biểu đồ 1: Hình thức báo cáo</h6>


                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                  class="fa fa-minus"></i>
                              </button>
                            </div>
                          </div>

                          <div class="box-body chart-responsive">
                            <div class="chart chart_morris" id="pie-tlthsc" style="height: 310px; position: relative;">
                            </div>
                            <div id='pie-kp-legend'></div>
                          </div>

                        </div>



                        <div class="box box-primary" id="bieudo3">
                          <div class="box-header with-border">
                            <div><a title="In đồ thị này" onclick="printDiv('bieudo3');" class="label  btn-success"><i
                                  class="fa fa-print"></i></a></div>

                            <h6 class="text-center">Biểu đồ 3: Đối tượng xảy ra sự cố</h6>


                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                  class="fa fa-minus"></i>
                              </button>
                            </div>
                          </div>

                          <div class="box-body chart-responsive">
                            <div class="chart chart_morris" id="pie-tldoituong"
                              style="height: 320px; position: relative;">
                            </div>

                            <div id="pie-tldoituong-legend">


                            </div>
                          </div>


                        </div>

                        <div class="box box-primary" id="bieudo5">
                          <div class="box-header with-border">
                            <div><a title="In đồ thị này" onclick="printDiv('bieudo5');" class="label  btn-success"><i
                                  class="fa fa-print"></i></a></div>
                            <h6 class='text-center'>Biểu 5: Đối tượng báo cáo sự cố</h6>


                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                  class="fa fa-minus"></i>
                              </button>
                            </div>
                          </div>
                          <div class="box-body chart-responsive">
                            <div class="chart" id="pie-doituongbc"
                              style="height: 350px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
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
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                  class="fa fa-minus"></i>
                              </button>
                            </div>
                          </div>
                          <div class="box-body chart-responsive">
                            <div class="chart" id="dskhoaphong"
                              style="height: 330px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">


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
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                                </button>
                              </div>
                          </div>

                          <div class="box-body chart-responsive">
                            <div class="chart chart_morris" id="pie-tldgbandau"
                              style="height: 335px; position: relative;"></div>
                            <div id='pie-tldgbandau-legend'></div>
                          </div>

                        </div>


                        <div class="box box-primary" id="bieudo6">
                          <div class="box-header with-border">
                            <div><a title="In đồ thị này" onclick="printDiv('bieudo6');" class="label  btn-success"><i
                                  class="fa fa-print"></i></a></div>
                            <h6 class='text-center'>Biểu đồ 6: Phân loại sự cố theo mức độ tổn thương trên người bệnh
                            </h6>
                            <div class='text-center'>


                            </div>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                  class="fa fa-minus"></i>
                              </button>
                            </div>
                          </div>
                          <div class="box-body chart-responsive">
                            <div class="chart" id="pie-mucdott_nb"
                              style="height: 330px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            </div>
                            <div id='pie-mucdott_nb-legend'></div>
                          </div>

                        </div>

                      </div>

                    </div>





                  </th>
                </tr>
                <tr>
                  <th colspan="10">III. ĐỀ XUẤT NHÓM CHUYÊN GIA PHÂN TÍCH SỰ CỐ Y KHOA:

                  </th>
                </tr>
                <!-- BEGIN: DSTV -->
                <tr>
                  <td colspan="10">
                    - {DSTV.full_name}-{DSTV.position}


                  <td>
                </tr>
                <!-- END: DSTV -->

                <tr>
                  <td colspan="10">Trên đây là báo cáo Đề xuất danh mục sự cố y khoa và nhóm chuyên gia phân tích sự cố
                    y khoa <br>
                    tương ứng Thời gian (Từ ngày {BC.tungay} đến ngày {BC.denngay})./.
                  </td>
                </tr>

                <tr>
                  <th colspan="5">Nơi nhận<br>
                    - BGĐ (để b/c)<br>
                    - Các khoa, phòng<br>
                    - Lưu: KHNV.

                  </th>
                  <th colspan="5" class="text-center">
                    GIÁM ĐỐC
                    <br><br><br>

                  </th>
                </tr>



              </table>


            </div>
          </div>


        </div>


      </div> <!-- Khu vực form -->

    </div>
  </div>
  <!-- jQuery -->

  <!-- Select2 -->

  <!-- JS xu ly form submit-->





  <script>
    $("#multiple").select2({
      placeholder: "Chọn thành viên",
      allowClear: true
    });
  </script>


  <!-- Select2 -->

  <!-- Kiem tra du lieu da co cua 2 combobox khoaphong va so lan danh gia -->

  <script type="text/javascript">
    $(function() {
      vl1 = $("#account").val();
      vl2 = $("#count").val();
      $("#account").change(function() {

        $('#id_dept').val($('#account').val());


        url = '{link_frm}';
        vl1 = $(this).val();
        window.location = url + '&kp=' + vl1;
      });

      $("#count").change(function() {
        var url = '{link_frm}';
        vl2 = $(this).val();

        window.location = url + '&count=' + vl2;

      });



    });
  </script>


  <script>
    $(document).ready(function() {
      var date = new Date();
      var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
      var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

      //$('#start-date').datepicker({ dateFormat: 'dd-mm-yy' });
      //$('#start-date').datepicker().datepicker('setDate', firstDay);

      //$('#end-date').datepicker({ dateFormat: 'dd-mm-yy' });
      //$('#end-date').datepicker().datepicker('setDate', lastDay);


      $.datepicker.setDefaults({
        dateFormat: 'dd-mm-yy',
        //maxDate: date,
        //beforeShowDay: function(date) {
        //var day = date.getDay();
        //return [(day >= 6 && day <=6), ''];
        //}, *}



      });


      $('#start-date').datepicker({


        onSelect: function(selectedDate) {
          $('#end-date').datepicker('option', 'minDate', selectedDate);

        }
      });

      $('#end-date').datepicker({

        onSelect: function(selectedDate) {
          $('#start-date').datepicker('option', 'maxDate', selectedDate);

        }
      });
    });
  </script>

  <!-- bieu do -->



  <script>
    let tngay = '{BC.tungay}';
    let dngay = '{BC.denngay}';
    let url='{link_frm}'+'&tungay='+tngay+'&denngay='+dngay;
    //alert ('tngay='+tngay);
    get_tlhtbcsuco(); //bieu do 1 
    get_dskhoaphong(); //bieu do 2, mac dinh lan dg 1
    get_tldoituong(); //bieu do 3
    get_tldgbandau(); //bieu do 4
    get_doituongbc(); //bieu do 5
    get_mucdott_nb(); //bieu do 6




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
      var tungay = document.getElementById('start-date').value;
      var denngay = document.getElementById('end-date').value;

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
                  '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label + ' [' +
                  pie_data[a].value + ']' + '</span>';
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
                  '"><i style="margin-left: 15px;" class="fas fa-square"></i> ' + pie_data[a].label + ' [' +
                  pie_data[a].value + ']' + '</span>';
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
                var node = document.createElement('div');
                node.className = 'legend-item';
                node.innerHTML = '<span style="color:' + color +
                  '"><i style="margin-left: 5px;" class="fas fa-square"></i> ' + pie_data[a].label + ' [' +
                  pie_data[a].value + ']' + '</span>';
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
  </script>















  <script>
    $(document).ready(function() {
      // Merge tables into a single table
      let mytable = document.getElementById('tbl_danhsach');


      tenbaocao = 'BCYK' + '.xlsx';


      let button = document.querySelector("#button-excel");
      button.addEventListener("click", e => {
        //alert('ok');
        /*TableToExcel.convert(document.getElementById("table1"), {
          name: "table1.xlsx",
          sheet: {
            name: "Sheet 1"
          }
        });*/
        e.preventDefault();

        TableToExcel.convert(mytable, {
          name: tenbaocao,
          sheet: {
            name: 'Sheet1'
          }
        });


      });
    });
  </script>

  <script>
    function printDiv1(divName) {
      var divToPrint = document.getElementById(divName);
      var htmlToPrint = '' +
        '<style type="text/css">' +

        '#table1 th.tieumuc, #table1 td.tieumuc {'+
        'text-align: center;' +
        'border-top: 1px solid black;' +
        'border-bottom: 1px solid black;' +
        'border-right: 1px solid black;' +
        'border-left: 1px solid black;' +
        '}' +

        '#table2 th, #table2 td {'+    
        'border-bottom: 1px solid black;' +
        'border-right: 1px solid black;' +

        '}' +

        '#table2 td.dau, th.dau{'+     
        'border-left: 1px solid black;' +
        '}' +



        '</style>';
      htmlToPrint += divToPrint.outerHTML;
      newWin = window.open("");
      newWin.document.write(htmlToPrint);
      newWin.print();
      newWin.close();

    }
  </script>






  <!-- jQuery library -->


  <!-- Upload and convert image to base64 -->





<!-- END: main -->