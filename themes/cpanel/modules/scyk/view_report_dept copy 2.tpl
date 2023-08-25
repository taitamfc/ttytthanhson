<!-- BEGIN: main -->
<style>
  .icon-btn a {
    border-radius: 50%;
  }

  #table2 th,
  #table2 td {
    border-top: 1px solid #dddddd;
    border-bottom: 1px solid #dddddd;
    border-right: 1px solid #dddddd;
  }



  #table1 tr,
  #table1 th {
    border: none;
    border-collapse: collapse;
  }

  #table1 th.tieumuc,
  #table1 td.tieumuc {
    border-top: 1px solid #dddddd;
    border-bottom: 1px solid #dddddd;
    border-right: 1px solid #dddddd;
  }


  #table3 tr,
  #table3 th,
  #table4 tr,
  #table4 th {
    border: none;
    border-collapse: collapse;
  }
</style>
<link href="{THEME_URL}/css/select2.min.css" rel="stylesheet" />
<script src="{THEME_URL}/js/select2.min.js"></script>
<script type="text/javascript" src="{THEME_URL}/assets/pages/accordion/accordion.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js">
</script>
<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js">
</script>
<script src="{BASE_URL}assets/js/language/jquery.ui.datepicker-vi.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>




<div class="pcoded-inner-content" id="demo1">
  <div class="main-body">
    <!-- Page-header start -->
    <!-- Page-header end -->
    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->

    </div>
    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">
        <div class="card-block">



          <form class="md-float-material" action="{link_frm}" method="post" id="myform">
            <input type="hidden" id="id_count" name="txt_count" value="{action}" />
            <input type="hidden" id="id_dept" name="txt_dept" value="" />
            <div class="">
              <table class="table">
                <thead>

                </thead>
                <tbody>


            </div>


            <tr>

              <div class="card">
                <div class="bg-info p-10">
                  <i class="icofont icofont-paper-plane"></i>
                  <strong>KHOA/PHÒNG XEM BÁO CÁO : {thongtinchung.tenkhoa}</strong>
                </div>
                <div class="card-header">
                  <div class="bg-success p-10">
                    <i class="icofont icofont-paper-plane"></i>
                    <strong> DANH SÁCH CÁC LẦN ĐÁNH GIÁ
                      TRONG NĂM {nam}</strong>
                  </div>
                </div>
                <div class="card-block icon-btn ">

                  <!-- BEGIN: list_count -->
                  <a href="{list_count.link_landanhgia}" class="{list_count.class}">{list_count.count}</a>
                  <!-- END: list_count -->

                </div>

                <div class="label-main">

                  <button id="in-bieumau" onclick="printDiv1('bieumau');"
                    class="btn btn-primary buttons-excel rounded-circle action  btn-warning"
                    style="width: 100px; height: 40px;"><i class="fa fa-print"></i> Xem/In </button>

                  <button id="button-excel" class="btn btn-secondary buttons-excel rounded-circle action  btn-info"
                    style="width: 100px; height: 40px;"><i class="fa fa-file-excel-o"></i> EXCEL</button>

                </div>


              </div>


            </tr>



            </tbody>
            </table>
        </div>

        <!-- Tooltips on textbox card end -->

        <!-- Page-header start -->
        <!-- Page-header end -->

      </div>

    </div>

  </div>
</div> <!-- Pcode... -->
<!-- Close for header -->
<!-- Tooltips on textbox card start -->
<div class="col-sm-12">

  <div class="card">

    <!-- Tạo biểu mẫu đánh giá -->
    <div class="card-block" id="bieumau">
      <div class="col-lg-12">
        <div class="card-block">

          <div class="container">
            <table id="table1" class="table" border=0" cellpadding="0" cellspacing="0" style="width:100%;">
            <thead>

             
                <tr data-f-bold="true">
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="false" colspan="5" data-a-h="center"
                    class="text-center">SỞ Y TẾ PHÚ THỌ </th>
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="5" data-a-h="center"
                    class="text-center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM </th>
                </tr>




                <tr>
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="5" data-a-h="center"
                    class="text-center">TRUNG TÂM Y TẾ HUYỆN THANH SƠN </th>
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="5" data-a-h="center"
                    class="text-center">Độc Lập-Tự Do-Hạnh Phúc </th>
                </tr>

                <tr data-height="20">
                  <th></th>

                </tr>
            </thead>

                <tr>
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="10" data-a-h="center"
                    class="text-center">
                    <p>
                    <h4> BÁO CÁO
                      Đề xuất danh mục sự cố y khoa<br>
                      và nhóm chuyên gia phân tích sự cố y khoa tương ứng<br>
                      Thời gian (Từ ngày 10/7/2023 đến ngày 21/7/2023)<p>
                    </h4>

                  </th>
                </tr>
                <tr>
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="10" data-a-h="center"
                    class="text-center">
                    <h4>(Áp dụng cho các {thongtinchung.ten_baocao}) </h4>

                  </th>
                </tr>

                <tr data-height="20">
                  <th></th>

                </tr>

                <tr>
                  <td data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="7" class="text-left">
                    I.DANH SÁCH SỰ CỐ Y KHOA </td>

                </tr>
                <tr>
                <td>
                  <table id="table2" class="table table-hover">
                    <thead>
                      <tr>
                        <th colspan="11" class="text-center bg-info">DANH SÁCH BÁO CÁO Y
                          KHOA ĐÃ TIẾP NHẬN </th>
                      </tr>
                      <tr>
                        <th>#</th>
                        <th>Mã BC</th>
                        <th>Khoa phòng</th>
                        <th>Tóm tắt nội dung</th>
                        <th>Ngày giờ BC</th>
                        <th>Trạng thái</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- BEGIN: DSBC -->
                      <tr class="vl">
                        <th>{DSBC.stt}</th>
                        <td>{DSBC.masobc}</td>
                        <td>{DSBC.khoaphong}</td>
                        <td>{DSBC.tomtatnd}</td>
                        <td>{DSBC.ngaygio}</td>
                        <td>{DSBC.trangthai}</td>

                      </tr>
                      <!-- END: DSBC -->

                    </tbody>

                  </table>
                </td>

                </tr>

                <tr>
                  <td data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="7" class="text-left">
                    II. TẦN SUẤT XẢY RA </td>
                </tr>


                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="7">
                  <br>Đề xuất nhóm
                    chuyên gia phân tích sự cố y khoa gồm các ông bà có tên sau
                    (chọn từ danh sách các thành viên nhóm chuyên gia phân tích sự cố y khoa trên phần mềm).
                    </td>
                </tr>



                <!-- BEGIN: dstv -->
                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                    - {dstv.tv}
                  <td>
                </tr>
                <!-- END: dstv -->

                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="7">
                    Trên đây là báo cáo Đề xuất danh mục sự cố y khoa và nhóm chuyên gia phân tích sự cố y khoa tương
                    ứng Thời gian (Từ ngày 10/7/2023 đến ngày 21/7/2023)./.
                </tr>


                <tr data-f-bold="true">
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="false" colspan="5" data-a-h="center"
                    class="text-left">Nơi Nhận<br>
                    - BGĐ (để b/c)<br>- Các khoa, phòng<br>- Lưu: KHNV. </th>
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="5" data-a-h="center"
                    class="text-center">GIÁM ĐỐC<br>Nguyễn Thị Ngọc Hoa </th>
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

<!-- Tinh tong diem -->















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