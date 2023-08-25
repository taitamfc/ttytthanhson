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

          <div class="bg-warning p-10">
            <i class="icofont icofont-paper-plane"></i>
            <strong>BIỂU MẪU DÀNH CHO {DATA.name_report}</strong>
          </div>

          <form class="md-float-material" action="{link_frm}" method="post" id="myform">
            <input type="hidden" id="id_count" name="txt_count" value="{action}" />
            <input type="hidden" id="id_dept" name="txt_dept" value="" />
            <div class="">
              <table class="table">
                <thead>

                </thead>
                <tbody>
                  <tr>
                    <div class="card" {hien_khoaphong}>

                      <div class="card-header">
                        <h5 class="m-b-10">Chọn Khoa Phòng Cần Xem Báo Cáo</h5>
                      </div>
                      <div class="card-block icon-btn ">
                        <div class="input-group">
                          <span class="input-group-addon" id="id_cbo_account" style="width: auto;min-width:100px;">Chọn
                            Khoa Phòng:</span>
                          <select id="account" name="cbo_account" class="form-control" placeholder="Chọn Khoa Phòng"
                            title="" data-toggle="tooltip" data-original-title="Chọn Khoa Phòng">
                            <option value="" disabled selected>Chọn Khoa Phòng</option>
                            <!-- BEGIN: report -->
                            <option value="{report.account}" {report.selected}>{report.name}</option>
                            <!-- END: report-->

                          </select>



                        </div>
                      </div>

                    </div>
            </div>
            </tr>

            <tr>

              <div {hien_danhgia} class="card">

                <div class="card-header">
                  <div class="bg-success p-10">
                    <i class="icofont icofont-paper-plane"></i>
                    <strong> DANH SÁCH CÁC LẦN ĐÁNH GIÁ
                      TRONG NĂM {nam}</strong>
                  </div>
                </div>
                <div class="card-block icon-btn ">

                  <!-- BEGIN: list_count -->
                  <a href="{list_count.link_landanhgia}"
                    class="btn btn-success btn-outline-success">{list_count.count}</a>
                  <!-- END: list_count -->

                </div>
                <div class ="form-row">
                <button hidden id="button-view" class="btn btn-secondary buttons-excel rounded-circle  btn-info" style="width: 100px; height: 40px;"><i class="fa fa fa-eye"></i> Xem</button>
                <button  {hien_nutexcel} id="button-excel" class="btn btn-secondary buttons-excel rounded-circle  btn-warning" style="width: 100px; height: 40px;"><i class="fa fa-file-excel-o"></i>Excel</button>
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
  </div> <!-- Pcode... -->
  <!-- Close for header -->
  <!-- Tooltips on textbox card start -->
  <div class="col-sm-12" hidden>

    <div class="card">

      <!-- Tạo biểu mẫu đánh giá -->
      <div class="card-block">
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

                  <tr>
                    <th data-f-sz="16" data-f-name="Times New Roman" data-f-bold="true" colspan="10" data-a-h="center"
                      class="text-center">
                      <p>
                      <h4> BẢNG KIỂM BỆNH ÁN ĐIỆN TỬ</h4>

                    </th>
                  </tr>


                  <tr data-height="20">
                    <th></th>

                  </tr>

                  <tr>
                    <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="7" class="text-left">
                      Đơn vị được đánh giá : {thongtinchung.tenkhoa} </th>

                  </tr>                

                  <tr>
                    
                    <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="7" class="text-left">
                      Thời gian đánh giá : {thongtinchung.ngaydanhgia} </th>
                  </tr>

                  
                  <tr>
                  <th data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="7">Thành
                    phần đoàn
                    đánh giá (họ tên và chức danh):</th>
                </tr>     
                  
                   
                  
                      <!-- BEGIN: dstv --> 
                       <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                      - {dstv.tv}
                        <td>
                      </tr>
                        <!-- END: dstv -->   

                  <tr data-height="20">
                    <th></th>

                  </tr>

                </thead>
              </table>


            </div>
          </div>

          <div class="col-sm-12">
            <div class="card">

              <!-- Tạo biểu mẫu đánh giá -->
              <div class="card-block">
                <div class="col-lg-12">


                  <table data-b-a-s="thin" id="table2" class="cell-border table table-hover" style="width:50%">
                    <thead>

                      <tr data-b-a-s="thin">
                        <th data-f-bold="true" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                          data-b-a-s="thin" style="width:2%;" colspan="1" rowspan="2" class="text-center header">STT
                        </th>
                        <th data-a-v="middle" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                          data-b-a-s="thin" data-a-h="center" colspan="2" rowspan="2" class="text-center header">Danh
                          Mục</th>
                        <th data-a-v="middle" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                          data-b-a-s="thin" data-a-h="center" colspan="4" rowspan="2" class="text-center header">Nội
                          Dung</th>
                        <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin"
                          data-a-h="center" colspan="3" rowspan="1" class="text-center header">Điểm</th>
                      </tr>
                      <tr>
                        <th data-f-bold="true" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman"
                          data-b-a-s="thin" colspan="1" rowspan="1" data-t="n">0
                        </th>
                        <th data-f-bold="true" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman"
                          data-b-a-s="thin" colspan="1" rowspan="1" data-t="n">1
                        </th>
                        <th data-f-bold="true" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman"
                          data-b-a-s="thin" colspan="1" rowspan="1" data-t="n">2
                        </th>

                      </tr>

                    </thead>
                    <tbody>
                      <!-- BEGIN: group -->
                      <tr data-height="80" >
                        <th data-a-v="middle" data-a-h="center" data-t="n" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" data-b-a-s="thin"
                          colspan="1" rowspan="{group.sch}" class="title">{group.stt}</th>

                        <th data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" data-b-a-s="thin" data-a-wrap="true"
                          colspan="2" rowspan="{group.sch}" class="title">{group.name_question_type}</th>

                          <td data-a-v="middle" data-a-wrap="true" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" colspan="4" data-a-wrap="true"
                          class="title">{r.content}</td>

                          <td data-a-v="middle" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" class="text-center"
                          style="color:#ff0000">
                          <label for="">{SCORE_F0.check}</label>

                        </td>

                        <td data-a-v="middle" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" class="text-center"
                        style="color:#ff0000">
                        <label for="">{SCORE_F1.check}</label>

                      </td>

                      <td data-f-sz="12" data-a-h="center" data-a-v="middle" data-f-name="Times New Roman" data-b-a-s="thin" class="text-center"
                      style="color:#ff0000">
                      <label for="">{SCORE_F2.check}</label>

                    </td>

                      </tr>
                      <!-- BEGIN: question -->
                      {r4.tr}
                        {r3.td} {r3.content} {r3.td2}
                         <!-- BEGIN: score -->
                         <td data-a-v="middle" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" class="text-center"
                         style="color:#ff0000">
                         <label for="">{score.check}</label>

                       </td>
                       <!-- END: score -->
                        {r4.tr2}
                       

                      </tr>
                      <!-- END: question -->
                      <!-- END: group -->
                    </tbody>
                    <tfoot>


                      <tr data-b-a-s="thin">
                        <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin"
                          data-a-v="middle" data-a-h="center" colspan="7" rowspan="1" class="text-left header">TỔNG ĐIỂM</th>

                        <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin"
                          data-a-h="center" colspan="3" rowspan="1" class="text-center header" data-t="n">{total_score}
                        </th>


                      </tr>

                      <tr data-height="20">
                        <th></th>

                     
                     
                      </tr>
                      <table id="table3" class="cell-border table table-hover" style="width:100%">
                        <thead>                       


                          <tr>
                            <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" colspan="4"
                              class="title">II. NỘI DUNG ĐỀ XUẤT:
                            <th>

                          </tr>

                          <!-- BEGIN: DS -->

                          <tr>
                          <td data-f-sz="12" data-f-name="Times New Roman" colspan="10">
                           - {DS.re}
                          <td>

                        </tr>
                             <!-- END: DS -->



                          <tr>
                            <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" colspan="3"
                              class="title">III. XẾP LOẠI
                            <th>

                          </tr>

                          <tr data-height="20">
                            <th></th>

                          </tr>


                          <tr>
                            <th data-b-a-s="thin" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                              colspan="2" class="text-center header" data-a-h="center"> Rất
                              tốt (90-100)
                            </th>
                            <th data-b-a-s="thin" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                              colspan="2" class="text-center header" data-a-h="center"> Tốt
                              (70-89)
                            </th>
                            <th data-b-a-s="thin" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                              colspan="2" class="text-center header" data-a-h="center">
                              Trung bình (50-69)
                            </th>
                            <th data-b-a-s="thin" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                              colspan="2" class="text-center header" data-a-h="center"> Yếu
                              (49)
                            </th>

                          </tr>
                          <tr>

                            <td data-b-a-s="thin" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                              colspan="2" class="text-center header" data-a-h="center">
                              {xeploai.xl1}
                            </td>

                            <td data-b-a-s="thin" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                              colspan="2" class="text-center header" data-a-h="center">
                              {xeploai.xl2}
                            </td>

                            <td data-b-a-s="thin" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                              colspan="2" class="text-center header" data-a-h="center">
                              {xeploai.xl3}
                            </td>

                            <td data-b-a-s="thin" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                              colspan="2" class="text-center header" data-a-h="center">
                              {xeploai.xl4}
                            </td>

                          </tr>


                          <tr data-height="20">
                            <th></th>

                          </tr>



                    </tfoot>
                  </table>




                  <table id="table4" class="table" border=0" cellpadding="0" cellspacing="0" style="width: 100%;">

                    <thead>
                      <tr>
                        <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" colspan="5"
                          data-a-h="center" class="text-center">TRƯỞNG KHOA/PHÒNG </th>
                        <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" colspan="5"
                          data-a-h="center" class="text-center">BAN CHỈ ĐẠO THỰC HÀNH 5S</th>
                      </tr>

                      <tr>
                        <th data-f-italic="true" data-f-sz="12" data-f-name="Times New Roman" colspan="5"
                          data-a-h="center" class="text-center">(Ký, ghi rõ họ tên)</th>
                        <th data-f-italic="true" data-f-sz="12" data-f-name="Times New Roman" colspan="5"
                          data-a-h="center" class="text-center">(Ký, ghi rõ họ tên) </th>
                      </tr>
                      <tr>
                        <hr>
                      </tr>

                    </thead>
                  </table>


                </div>
              </div>
            </div>
            <!-- end Biểu mẫu-->
          </div>
        </div>

        </form>
      </div> <!-- Khu vực form -->

    </div>
  </div>
  <!-- jQuery -->

  <!-- Select2 -->

  <!-- JS xu ly form submit-->
  <script type="text/javascript">
    /* $(function() {
var url = "{link_frm}";    
    $('#myform').on('submit', function(e) {

    if (confirm('Bạn có chắc chắn cập nhật dữ  liệu lần đánh giá?')) {
      $.ajax({
        type: 'post',
        url: url,
        data: $(this).serialize(),
        success: function(response) {
          alert('Success: ' + response);
          //alert('Success: Đã cập nhật thành công');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error: ' + textStatus + ' - ' + errorThrown);
        }
      });

    }
    });
    });*/
  </script>




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
    function calcscore() {
      var score = 0;
      $(".calc:checked").each(function() {
        score += parseInt($(this).val(), 10);
      });
      $("input[name=totalsum]").val(score)
    }
    $().ready(function() {
      $(".calc").change(function() {
        calcscore()
      });
    });
    calcscore();
  </script>


  <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>








  <script>
    $(document).ready(function() {
      // Merge tables into a single table
      let table1 = document.getElementById('table1');
      let table2 = document.getElementById('table2');
      let table3 = document.getElementById('table3');
      let table4 = document.getElementById('table4');
      let mergedTable = document.createElement('table');
      mergedTable.appendChild(table1.cloneNode(true));
      mergedTable.appendChild(table2.cloneNode(true));
      mergedTable.appendChild(table3.cloneNode(true));
      mergedTable.appendChild(table4.cloneNode(true));

      var kp = '{thongtinchung.tenkhoa}';
      var landanhgia = '{thongtinchung.landanhgia}';

      tenbaocao = 'Bảng kiểm bệnh án điện tử-' + kp + '_' + landanhgia + '.xlsx';


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

        TableToExcel.convert(mergedTable, {
          name: tenbaocao,
          sheet: {
            name: 'Sheet1'
          }
        });


      });


      //test button-excel2
      let button2 = document.querySelector("#button-view");
      button2.addEventListener("click", e => {
        e.preventDefault();
        url='{link_view}';     
       
        window.location = url;

      });




    });
  </script>

  </script>






  <!-- jQuery library -->


  <!-- Upload and convert image to base64 -->





<!-- END: main -->