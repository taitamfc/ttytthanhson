<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<!-- BEGIN: main -->
<style>
  a.btn-count {
    border-radius: 50%;
  }

  button.action {
    border-radius: 10%;
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



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



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
            <strong>BÁO CÁO CHI TIẾT</strong>
            {check}
          </div>

          <form class="md-float-material" action="{link_frm}" method="post" id="myform">
            <input type="hidden" id="id_count" name="txt_count" value="{action}" />
            <input type="hidden" id="id_dept" name="txt_dept" value="" />
            <div class="">
              <table class="table table-hover chitiet" border=0" cellpadding="10" cellspacing="10" style="width: 100%;">
                <thead>

                </thead>
                <tbody>
                  <div class="card {hienkhoaphong}">

                    <div class="card-header">
                      <h5 class="m-b-10">{thongtinchung.khoa_lan}</h5>
                      <div class="row">
                        <div class="column"></div>
                        <div class="column"></div>
                      </div>
                      <div class="hidden">
                        <b><i class="fa fa-hand-o-right" aria-hidden="true">
                          </i> Trạng thái đánh giá: <span
                            class="label {thongtinchung.class}label-danger">{thongtinchung.trangthai}</span></b>
                      </div>

                    </div>


                    <div class="label-main">

                      <button {hien_nutexcel} id="danhgia" onclick="redirect_eva('bieumau');"
                        class="btn btn-primary rounded-circle action btn-danger" style="width: 120px; height: 40px;"><i
                          class="fa fa-chevron-circle-right" aria-hidden="true"></i> Đánh Giá </button>



                      <button {hien_nutexcel} id="in-bieumau" onclick="printDiv1('bieumau');"
                        class="btn btn-primary buttons-excel rounded-circle action  btn-warning"
                        style="width: 100px; height: 40px;"><i class="fa fa-print"></i> Xem/In </button>

                      <button {hien_nutexcel} id="button-excel"
                        class="btn btn-secondary buttons-excel rounded-circle action  btn-info"
                        style="width: 100px; height: 40px;"><i class="fa fa-file-excel-o"></i> EXCEL</button>

                    </div>

                  </div>

            </div>


            <tr>

              <th style="background-color: #2967e3;color: white;vertical-align:middle;" class="tieumuc text-center" rowspan="2" >
              <h5>TÊN KHOA PHÒNG</span></h5>
                
              </th>


              <th style="background-color: #2967e3;color: white;" class="tieumuc text-center" colspan="12">
              <h5><span id="sp-kp" class=""
              onclick="get_khoaphong_lan(this);">CHI TIẾT LẦN ĐÁNH GIÁ</span></h5>
              </th>

            </tr>



            <tr>
            

              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 1</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 2</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 3</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 4</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 5</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 6</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 7</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 8</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 9</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 10</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 11</span></h6></th>
              <th class="tieumuc text-center"><h6><span id="sp-kp" class="badge badge-primary"
              onclick="get_khoaphong_lan(this);">LẦN 12</span></h6></th>

            </tr>

            <!-- BEGIN: DSKHOA -->
            <tr>

              <th style="vertical-align:middle">
              <h4><span id="sp-kp" class="badge badge-success"
              onclick="get_khoaphong_lan(this);">{DSKHOA.tenkhoa}</span></h4>

              </th>

              <!-- BEGIN: LIST -->

              <th class="tieumuc text-center">

                <a onclick="get_count(this.id);" id="{LIST.account}_{LIST.count}" style="text-color:white"
                  class="{LIST.class} btn-count">{LIST.count}</a>


              </th>

              <!-- END: LIST -->

            </tr>
            <!-- END: DSKHOA -->






        </div>
      </div>
    </div>
  </div>






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
<div class="col-sm-12 hidden">

  <div class="card">

    <!-- Tạo biểu mẫu đánh giá -->
    <div class="card-block bieumaucl" id="bieumau">
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
                  <th style="color: white;">. </th>

                </tr>



                <tr>
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="10" data-a-h="center"
                    class="text-center">
                    <h4>BẢNG KIỂM ĐÁNH GIÁ THỰC HÀNH TỐT 5S LẦN {thongtinchung.landanhgia}/{nam} </h4>
                  </th>
                </tr>

                <tr data-height="20">
                  <th></th>

                </tr>

                <tr>
                  <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="10" data-a-h="center"
                    class="text-center">
                    <h4>(Áp dụng cho các {thongtinchung.tenbaocao}) </h4>
                  </th>
                </tr>

                <tr data-height="20">
                  <th></th>

                </tr>

                <tr>
                  <td data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="7" class="text-left"
                    style="font-weight: bold;">
                    1.Đơn vị được đánh giá : {thongtinchung.tenkhoa} </td>
                </tr>

                <td data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="7" class="text-left"
                  style="font-weight: bold;">
                  2.Thời gian đánh giá : {thongtinchung.ngaydanhgia} </td>
                </tr>


                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-bold="true" data-f-name="Times New Roman" scope="row"
                    colspan="7" style="font-weight: bold;">
                    3.Thành
                    phần đoàn
                    đánh giá (họ tên và chức danh):</td>
                </tr>



                <!-- BEGIN: dstv -->
                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                    - {dstv.tv}
                  <td>
                </tr>
                <!-- END: dstv -->
                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" scope="row"
                    colspan="7" style="font-weight: bold;">
                    4. Tổng số các tiểu mục được áp dụng đánh giá : {tieumuc.tongso}
                  </td>
                </tr>

                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" scope="row"
                    colspan="7" style="font-weight: bold;">
                    5. Tỷ lệ tiểu mục áp dụng : {tieumuc.tyle}%
                  </td>
                </tr>

                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" scope="row"
                    colspan="7" style="font-weight: bold;">
                    6. Tổng số điểm: {tieumuc.total_score}
                  </td>

                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" scope="row"
                    colspan="7" style="font-weight: bold;">
                    7. Điểm trung bình chung: {tieumuc.dtb}
                  </td>
                </tr>

                <tr>
                  <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" scope="row"
                    colspan="7" style="font-weight: bold;">
                    8. Bảng điểm chi tiết:
                  </td>
                </tr>

                <tr data-height="40">

                  <th data-a-wrap="true" colspan="3" class="tieumuc text-center" data-f-bold="true" data-a-h="center"
                    data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" style="text-align: center;">Kết quả
                    chung theo tiểu mục </th>
                  <th style="text-align: center;" class="tieumuc text-center" data-f-bold="true" data-a-h="center"
                    data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin"
                    style="text-align: center;">Mức 0 </th>
                  <th class="tieumuc text-center" data-f-bold="true" data-a-h="center" data-a-v="middle" data-f-sz="12"
                    data-f-name="Times New Roman" data-b-a-s="thin" style="text-align: center;">Mức 1 </th>
                  <th class="tieumuc text-center" data-f-bold="true" data-a-h="center" data-a-v="middle" data-f-sz="12"
                    data-f-name="Times New Roman" data-b-a-s="thin" style="text-align: center;">Mức 2 </th>
                  <th data-a-wrap="true" colspan="3" class="tieumuc text-center" data-f-bold="true" data-a-h="center"
                    data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin"
                    style="text-align: center;">Tổng số tiểu mục đánh giá </th>

                </tr>

                <tr data-height="40">

                  <th data-a-wrap="true" colspan="3" class="tieumuc text-center" data-f-bold="true" data-a-h="center"
                    data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin">Số lượng tiểu mục đạt</th>
                  <th class="tieumuc text-center" data-f-bold="true" data-a-v="middle" data-a-h="center" data-f-sz="12"
                    data-f-name="Times New Roman" data-b-a-s="thin" data-t="n">{tieumuc.m0}
                  </th>
                  <th class="tieumuc text-center" data-f-bold="true" data-a-v="middle" data-a-h="center" data-f-sz="12"
                    data-f-name="Times New Roman" data-b-a-s="thin" data-t="n">{tieumuc.m1}
                  </th>
                  <th class="tieumuc text-center" data-f-bold="true" data-a-v="middle" data-a-h="center" data-f-sz="12"
                    data-f-name="Times New Roman" data-b-a-s="thin" data-t="n">{tieumuc.m2}
                  </th>
                  <th colspan="3" class="tieumuc text-center" data-f-bold="true" data-a-v="middle" data-a-h="center"
                    data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-t="n">{tieumuc.tongso} </th>

                </tr>



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


                <table data-b-a-s="thin" id="table2" class="cell-border table table-hover" style="width:100%">
                  <thead>

                    <tr data-b-a-s="thin">
                      <th data-f-bold="true" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-a-s="thin" style="width:2%;" colspan="1" rowspan="2" class="dau title text-center header">
                        STT
                      </th>
                      <th data-a-v="middle" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-a-s="thin" data-a-h="center" colspan="6" rowspan="2" class="title text-center header">Nội
                        dung kiểm tra</th>
                      <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin"
                        data-a-h="center" colspan="3" rowspan="1" class="title text-center header">Điểm</th>
                    </tr>
                    <tr>
                      <th data-f-bold="true" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-a-s="thin" colspan="1" rowspan="1" data-t="n" class="title">0
                      </th>
                      <th data-f-bold="true" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-a-s="thin" colspan="1" rowspan="1" data-t="n" class="title">1
                      </th>
                      <th data-f-bold="true" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-a-s="thin" colspan="1" rowspan="1" data-t="n" class="title">2
                      </th>

                    </tr>

                  </thead>
                  <tbody>
                    <!-- BEGIN: group -->
                    <tr>

                      <td  data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" data-b-a-s="thin" colspan="10"
                        class="dau title"> <strong> {group.stt}. {group.name_question_type} </strong> </td>

                    </tr>
                    <!-- BEGIN: question -->
                    <tr data-height="40">
                      <th data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin"
                        data-a-h="center" class="dau text-center" data-t="n">
                        {question.stt}</th>
                      <td data-a-v="middle" style="word-break:break-word" data-f-sz="12" data-a-wrap="true"
                        data-f-name="Times New Roman" data-b-a-s="thin" colspan="6" class="text-left">
                        {question.content}</td>

                      <!-- BEGIN: score -->
                      <td data-a-v="middle" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-a-s="thin" class="text-center" style="color:#ff0000">
                        <label for="r{question.id_question}_{score.score}">{score.check}</label>

                      </td>
                      <!-- END: score -->

                    </tr>
                    <!-- END: question -->
                    <!-- END: group -->




                    <tr data-b-a-s="thin">
                      <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin"
                        data-a-h="center" data-a-v="middle" colspan="7" rowspan="1" class="text-left header">TỔNG ĐIỂM
                      </th>

                      <th data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin"
                        data-a-h="center" colspan="3" rowspan="1" class="text-center header" data-t="n">
                        {tieumuc.total_score}
                      </th>


                    </tr>

                  </tbody>




                  </tr>
                  <table id="table3" class="cell-border table table-hover" style="width:100%">
                    <thead>

                      <tr data-height="20">
                        <th></th>

                      </tr>



                    
                        <!-- Break page :  <div style="page-break-after: always;"> Content of the second page -->


                        <tr>
                          <td data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" colspan="3" class="title">
                            <strong> II. NỘI DUNG ĐỀ XUẤT: </strong>
                          <td>

                        </tr>

                        <!-- BEGIN: DS -->

                        <tr>
                          <td data-f-sz="12" data-f-name="Times New Roman" colspan="10">
                            - {DS.re}
                          <td>

                        </tr>
                        <!-- END: DS -->



                        <tr>
                          <td data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" colspan="3" class="title">
                            <strong> III. XẾP LOẠI </strong>
                          <td>

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

                          <th style="color: blue;" data-b-a-s="thin" data-f-bold="true" data-f-sz="12"
                            data-f-name="Times New Roman" colspan="2" class="text-center header" data-a-h="center">
                            {xeploai.xl1}
                          </th>

                          <th style="color: blue;" data-b-a-s="thin" data-f-bold="true" data-f-sz="12"
                            data-f-name="Times New Roman" colspan="2" class="text-center header" data-a-h="center">
                            {xeploai.xl2}
                          </th>

                          <th style="color: blue;" data-b-a-s="thin" data-f-bold="true" data-f-sz="12"
                            data-f-name="Times New Roman" colspan="2" class="text-center header" data-a-h="center">
                            {xeploai.xl3}
                          </th data-b-a-s="thin" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                            colspan="3" class="text-center header" data-a-h="center">

                          <th style="color: blue;" data-b-a-s="thin" data-f-bold="true" data-f-sz="12"
                            data-f-name="Times New Roman" colspan="2" class="text-center header" data-a-h="center">
                            {xeploai.xl4}
                          </th>

                        </tr>


                        <tr data-height="20">
                          <th></th>

                        </tr>



                        </tfoot>
                  </table>




                  <table id="table4" class="table" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">

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

    var kp = '{thongtinchung.tenkhoabc}';
    var landanhgia = '{thongtinchung.landanhgia}';

    tenbaocao = 'Bảng kiểm đánh giá thực hành tốt-' + kp + '_' + landanhgia + '.xlsx';


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
  });
</script>

<script>
  function get_count() {
    var url = '{link_frm}';
    var vl = event.target.id;
    //vl2= document.getElementById("account").value;
    //document.getElementById("txt_count").value = vl1;
    //alert(vl);
    window.location = url + '&idd=' + vl;
  };

  function redirect_eva() {
    var url = '{link_dg}';    
    //window.location.href = url ;
    window.open(url);
  };

  //print


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