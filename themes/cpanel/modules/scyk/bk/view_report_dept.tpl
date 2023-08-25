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

  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: rgba(42, 36, 188, 0.581);
    border: none;
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
              <table class="table bieumau table-hover table-responsive" >
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

                    <td class="col-1"><b><i class="fa fa fa-user fa-fw" aria-hidden="true"></i>
                        Thành phần đoàn chuyên gia phân tích:</b></td>
                    <td><select id="multiple" name="teams[]" class="js-states form-control " multiple>
                        <!-- BEGIN: TEAM -->
                        <option {TEAM.selected}="{TEAM.selected}" value=" {TEAM.full_name}-{TEAM.position}">
                          {TEAM.full_name}-{TEAM.position}
                        </option>
                        <!-- END: TEAM -->
                      </select>
                    </td>

                    <td>
                      <!-- start modal -->




                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td class="text-center">
                      <button type="submit" name="btn_xem" class="btn btn-warning" >
                        <i class="icofont icofont-location-arrow"></i><strong>Xem/In BC</strong>
                      </button>

                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeModal">
                        <i class="icofont icofont-location-arrow"></i><strong>Cập nhật thành viên</strong>
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
      <div class="card-block table-responsive" id="bieumau2" >
        <div class="col-lg-12">
          <div class="card-block">

            <div class="container">
              <table id="tbl_danhsach" class="table table-hover table-responsive" >

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
                    <td>{DSBC.tomtatnd}</td>
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
                  <th colspan="10">Đưa các loại biểu đồ vào đây
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
                  <th colspan="10">Trên đây là báo cáo Đề xuất danh mục sự cố y khoa và nhóm chuyên gia phân tích sự cố
                    y khoa <br>
                    tương ứng Thời gian (Từ ngày {BC.tungay} đến ngày {BC.denngay})./.
                  </th>
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