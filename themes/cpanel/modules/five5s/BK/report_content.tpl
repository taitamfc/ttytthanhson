<script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>

<!-- BEGIN: main -->
<style>
  .icon-btn a {
    border-radius: 50%;
  }


  th,
  td {
    border-top: 1px solid #dddddd;
    border-bottom: 1px solid #dddddd;
    border-right: 1px solid #dddddd;
  }

  th:first-child {
    border-left: 1px solid #dddddd;
  }

  .icon-btn a {
    border-radius: 50%;
  }

  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: rgba(42, 36, 188, 0.581);
    border: none;
  }

  #table tr th td,
  #table1 tr td,
  #table1 th,
  #table2 tr th td,
  #table2 th,
  #table3 tr,
  #table3 th {
    border: none;
    border-collapse: collapse;
  }

  textarea {
    width: 100%;
    height: 100%;
    border-color: Transparent;
    resize: none;
  }





  .ui-accordion .ui-accordion-content {padding: 0;}
  .ui-accordion .ui-accordion-header {padding: 14px 20px;}
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



<script src="https://cdn.jsdelivr.net/npm/@dayalk/table-to-excel@2.1.8/dist/tableToExcel.min.js"></script>

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
          <div class="bg-info p-10">
            <i class="icofont icofont-paper-plane"></i>
            <strong> BÁO CÁO TỔNG HỢP</strong>
          </div>
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
              <a href="{list_count.link_landanhgia}" class="btn btn-success btn-outline-success">{list_count.count_evaluation}</a>
              <!-- END: list_count -->
            </div>
            <div class="label-main">            
              <button {hien_nutexcel} id="button-excel" class="btn btn-secondary buttons-excel rounded-circle  btn-info"
                style="width: 100px; height: 40px;"><i class="fa fa-file-excel-o"></i> EXCEL</button>
            </div>

          </div>




          <!-- Tooltips on textbox card end -->

          <!-- Page-header start -->
          <!-- Page-header end -->

        </div>

      </div>
    </div> <!-- Pcode... -->
    <!-- Close for header -->
    <!-- Tooltips on textbox card start -->
    <div  class="col-sm-12" {hien_bieumau}>
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

                    <tr>
                      <th data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" colspan="5" data-a-h="center"
                        class="text-center">Số: .../BC-TTYT </th>
                      <th data-f-sz="12" data-f-name="Times New Roman" data-f-italic="true" colspan="5"
                        data-a-h="center" class="text-center"><label id="currentDate"></label> </th>
                    </tr>

                    <tr data-height="20">
                      <th></th>

                    </tr>
                    </head>
                </table> <!-- end table1 -->


                <table id="table2" class="table" border=0" cellpadding="0" cellspacing="0" style="width: 100%;">

                  <thead>

                    <tr>
                      <th data-a-h="center" data-f-sz="14" data-f-name="Times New Roman" data-f-bold="true" colspan="10"
                        class="text-center">
                        <p>
                        <h4>
                          BÁO CÁO KẾT QUẢ TRIỂN KHAI KAIZEN 5S LẦN {THONGTIN.landanhgia} NĂM {nam}
                        </h4>

                      </th>
                    </tr>

                    <tr data-height="20">
                      <th></th>

                    <tr>
                      <th data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" scope="row"
                        colspan="12">
                        I. THÔNG TIN CHUNG</th>

                    </tr>



                    <tr>
                      <th data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">1. Lần
                        đánh giá:
                        Lần thứ {THONGTIN.landanhgia}</th>

                    </tr>
                    <tr>
                      <th data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">2. Thời
                        gian đánh
                        giá: Từ ngày :{THONGTIN.tungay}, đến ngày:
                        {THONGTIN.denngay}</th>

                    </tr>

                    <tr>
                      <th data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">3. Tổng
                        số khoa,
                        phòng đánh giá: {THONGTIN.tt}/{THONGTIN.tc} khoa, phòng </th>
                    </tr>

                    <tr>
                      <th data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">4 .Thành
                        phần đoàn
                        đánh giá (họ tên và chức danh):</th>
                    </tr>


                    <!-- BEGIN: TEAMS -->
                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - {TEAMS}
                      <td>
                    </tr>
                    <!-- END: TEAMS -->

                    <tr>
                      <th data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">5. Nội
                        dung thực
                        hiện đánh giá:</th>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - Thực hiện kiểm tra, đánh giá thực hiện 5S theo quy định.
                      </td>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - Kiểm tra chất lượng thực hiện hồ sơ bệnh án theo quy định.
                      </td>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - Kiểm tra công tác đảm bảo an ninh trật tự bệnh viện.
                      </td>
                    </tr>



                    <tr>
                      <th data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" scope="row"
                        colspan="12">
                        II. KẾT QUẢ ĐÁNH GIÁ</th>
                    </tr>

                    <tr>
                      <th data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" scope="row"
                        colspan="12">
                        1. Kết quả chung:</th>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - Số khoa, phòng được xếp loại rất tốt: {XL.xl1}
                      </td>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - Số khoa, phòng được xếp loại tốt: {XL.xl2}
                      </td>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - Số khoa, phòng được xếp loại trung bình: {XL.xl3}
                      </td>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - Số khoa, phòng được xếp loại yếu: {XL.xl4}
                      </td>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - Số điểm trung bình của cả viện: {THONGTIN2.dtb}
                      </td>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - Số điểm trung bình của mỗi câu hỏi của cả viện: {THONGTIN2.cauhoidtb}
                      </td>
                    </tr>

                    <tr data-height="35">
                      <td data-a-h="left" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" colspan="15"
                        data-a-wrap="true">
                        - Khoa, phòng đạt tổng điểm cao nhất: {THONGTIN2.max_khoaphong}
                      </td>
                    </tr>

                    <tr data-height="35">
                      <td data-a-h="left" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" colspan="15"
                        data-a-wrap="true">
                        - Khoa, phòng đạt điểm thấp nhất: {THONGTIN2.min_khoaphong}
                      </td>
                    </tr>

                    <tr>
                      <th data-f-bold="true" data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        2. Bảng đánh giá chi tiết:
                      </th>
                    </tr>




                  </thead>
                </table> <!-- end table2 -->


                <!-- Tooltips on textbox card start -->

                <div class="card">
                  <div class="table-responsive" style="padding-bottom: 100px;">
                    <div class="card-block table-border-style">
                      <div class="table-responsive" style="padding-bottom: 100px;">
                        <table id="table3" class="table table table-hover" border=0" cellpadding="0" cellspacing="0"
                          style="width: 100%;">

                          <thead>

                            <tr data-height="40">
                              <th data-f-bold="true" data-b-a-s="thin" data-a-v="middle" data-a-h="center"
                                data-f-sz="12" data-a-wrap="true" data-f-name="Times New Roman"
                                style="background-color: #4CAF50;color: white;" colspan="10" class="text-center">
                                TỔNG HỢP KẾT
                                QUẢ ĐÁNH GIÁ 5 S TẠI CÁC
                                KHU VỰC
                                KHÁC NHAU Ở MỘT LẦN ĐÁNH GIÁ TRONG NĂM {nam}
                              </th>
                            </tr>
                            <tr data-b-a-s="thin">
                              <th data-b-a-s="thin" data-f-bold="true" colspan="10" data-a-h="center" data-f-sz="12"
                                data-f-name="Times New Roman" class="text-center">Lần đánh giá: {landanhgia}
                                ({DANHSACH.from_date} –
                                {DANHSACH.to_date})
                              </th>
                            </tr>
                            <tr data-height="40">

                              <th data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center" data-f-sz="12"
                                data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Ngày đánh giá</th>
                              <th data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center" data-f-sz="12"
                                data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Khoa/ phòng được ĐG
                              </th>
                              <th data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center" data-f-sz="12"
                                data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Trưởng đội đánh giá
                              </th>
                              <th data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center" data-f-sz="12"
                                data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Tổng điểm</th>
                              <th data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center" data-f-sz="12"
                                data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">ĐTB</th>
                              <th data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center" data-f-sz="12"
                                data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Xếp loại</th>
                              <th data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center" data-f-sz="12"
                                data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Kiến nghị</th>




                            </tr>
                          </thead>
                          <tbody>
                            <!-- BEGIN: DANHSACH -->
                            <tr data-height="60">
                              <td style="vertical-align: middle;" colspan="1" data-a-wrap="true" data-a-h="left"
                                data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                                rowspan="{DANHSACH.sodong}" data-b-a-s="thin">{DANHSACH.created_date}
                              </td>
                              <td style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-v="middle"
                                data-f-sz="12" data-f-name="Times New Roman" rowspan="{DANHSACH.sodong}"
                                data-b-a-s="thin" data-a-wrap="true">{DANHSACH.tenkhoa}</td>
                              <td style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-v="middle"
                                data-f-sz="12" data-f-name="Times New Roman" rowspan="{DANHSACH.sodong}"
                                data-b-a-s="thin">{DANHSACH.doitruong}</td>
                              <td style="vertical-align: middle;" colspan="1" data-f-sz="12" data-a-v="middle"
                                data-f-name="Times New Roman" data-t="n" data-a-h="center" rowspan="{DANHSACH.sodong}"
                                data-b-a-s="thin">{DANHSACH.total_score} </td>
                              <td style="vertical-align: middle;" colspan="1" data-f-sz="12" data-a-v="middle"
                                data-f-name="Times New Roman" data-t="n" data-a-h="center" rowspan="{DANHSACH.sodong}"
                                data-b-a-s="thin">{DANHSACH.dtb} </td>
                              <td style="vertical-align: middle;" colspan="1" data-f-sz="12" data-a-wrap="true"
                                data-a-v="middle" data-f-name="Times New Roman" data-a-h="center"
                                rowspan="{DANHSACH.sodong}" data-b-a-s="thin">{DANHSACH.rating} </td>
                              <td style="vertical-align: middle;" colspan="2" data-f-sz="12" data-a-wrap="true"
                                data-a-v="middle" data-f-name="Times New Roman" data-a-h="left rowspan="
                                {DANHSACH.sodonglui}" data-b-t-s="thin" data-b-r-s="thin">- {DANHSACH.re} </td>

                              <!-- BEGIN: DSRE -->

                            <tr data-height="60">

                              <td style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-wrap="true"
                                data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                                data-b-b-s="{DSRE.bottom}" data-b-l-s="thin" data-b-r-s="thin">- {DSRE.re} </td>

                            </tr>
                            <!-- END: DSRE -->





                            </tr>



                            <!-- END: DANHSACH -->


                          </tbody>
                        </table> <!-- END table3 -->


                        <!-- start table_chart -->
                        <table id="table_chart" class="table table table-hover" border=0" cellpadding="0"
                          cellspacing="0" style="width: 100%;">

                          <thead>

                            <tr data-height="20">
                              <td>
                              </td>
                            <tr data-exclude="true" data-height="20">
                              <td>

                                BIỂU ĐỒ TỔNG HỢP KẾT
                                QUẢ ĐÁNH GIÁ 5 S TẠI CÁC
                                KHU VỰC
                                KHÁC NHAU Ở MỘT LẦN ĐÁNH GIÁ TRONG NĂM {nam}


                              </td>


                            </tr>


                            <tr data-exclude="true">
                              <td colspan="4">

                                <canvas id="myChart" width="800" height="450"></canvas>

                              </td>
                            </tr>

                            <tr>
                              <td hidden>
                                <div>
                                  <img id="myImage" scr="" width="800" height="450" />
                                </div>

                              </td>
                            </tr>

                            <tr data-exclude="true">
                              <td>

                                <p>
                                  <button type="button" class="btn btn-primary"><a id="link1"
                                      download="ChartPng.png">Save as
                                      png</a></button>
                                  <button type="button" class="btn btn-primary"><a id="link2"
                                      download="ChartJpg.jpg">Save as
                                      jpg</a></button>
                                </p>
                              </td>

                            </tr>




                            </tbody>
                        </table> <!-- END table_chart -->
                      </div>
                    </div>
                  </div>
                  <!-- Basic table card end -->
                </div>
              </div>


              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive" style="padding-bottom: 100px;">
                    <div class="card-block table-border-style">
                      <div class="table-responsive" style="padding-bottom: 100px;">
                        <table id="table4" class="table table table-hover" border="0" cellpadding="0" cellspacing="0"
                          style="width: 100%;">

                          <thead>
                            <tr>
                              <th data-f-bold="true" data-a-h="left" data-f-sz="12" data-f-name="Times New Roman"
                                colspan="12">
                                3. Bảng tổng hợp kết quả đánh giá :
                              </th>
                            </tr>

                            <tr data-f-bold="true" data-b-a-s="thin">
                              <th data-f-bold="true" data-a-h="center" data-f-sz="12" data-f-name="Times New Roman"
                                data-b-a-s="thin" colspan="{socotbc}" class="text-center"
                                style="background-color: #4CAF50;color: white;">
                                TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5S TẠI CÁC KHU VỰC Ở CÁC LẦN ĐG KHÁC NHAU {nam}
                              </th>
                            </tr>
                            <tr>
                              <th data-b-a-s="thin" data-f-bold="true" data-a-h="center" data-f-sz="12"
                                data-f-name="Times New Roman" data-b-a-s="thin" colspan="{socotbc}" class="text-center">
                                Điểm các lần đánh giá
                              </th>
                            </tr>
                            <tr>
                              <th data-a-v="middle" data-f-bold="true" data-a-h="center" colspan="1" rowspan="2"
                                data-f-name="Times New Roman">STT</th>


                              <th data-b-a-s="thin" data-f-bold="true" data-a-h="center" colspan="2"
                                data-f-name="Times New Roman">Lần
                                đánh giá</th>
                              <!-- BEGIN:LAN -->
                              <th data-a-h="center" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                                data-b-a-s="thin" style="width: 1%;" class="text-Left">L{LAN.stt}
                              </th>
                              <!-- END: LAN -->

                            </tr>

                            <tr>


                              <th data-f-bold="true" data-a-v="middle" data-a-h="center" colspan="2" data-f-sz="12"
                                data-f-name="Times New Roman" data-b-a-s="thin">Thời gian thực hiện</th>
                              <!-- BEGIN:NGAY -->
                              <td data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" style="width: 1%;"
                                class="text-Left" data-a-wrap="true">{NGAY.ngay}
                              </td>
                              <!-- END: NGAY -->

                            </tr>

                            <!-- BEGIN:DANHSACH2 -->
                            <tr data-height="40">
                              <th data-b-a-s="thin" data-t="n" data-f-bold="true" data-a-h="center" colspan="1"
                                data-f-name="Times New Roman">
                                {DANHSACH2.stt}
                              </th>
                              <td data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" colspan="2"
                                data-a-wrap="true">
                                {DANHSACH2.tenkhoa}
                              </td>
                              <!-- BEGIN:DANHSACH3 -->
                              <td data-t="n" data-t="n" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin">
                                {DANHSACH3.tongdiem}
                              </td>
                              <!-- END:DANHSACH3 -->

                            </tr>

                            <!-- END:DANHSACH2 -->


                          </thead>
                          <tbody>


                          </tbody>
                        </table>




                      </div>





                    </div>


                  </div>
                </div>


              </div>

              <!-- begin bc năng suất -->
              <div class="card">
                <div class="table-responsive" style="padding-bottom: 100px;">
                  <div class="card-block table-border-style">
                    <div class="table-responsive" style="padding-bottom: 100px;">
                      <table id="table5" class="table table table-hover" border=0" cellpadding="0" cellspacing="0"
                        style="width: 100%;">

                        <thead>
                          <tr data-height="20">
                            </td>
                          </tr>

                          <tr>
                            <th data-f-bold="true" data-a-h="left" data-f-sz="12" data-f-name="Times New Roman"
                              colspan="12">
                              4. Hạn chế, nguyên nhân, đề xuất, kiến nghị:
                            </th>
                          </tr>

                          <tr data-b-a-s="thin">




                          </tr>
                        </thead>
                        <tbody>

                          <tr data-height="80">

                            <th data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center" data-f-sz="12"
                              data-f-name="Times New Roman" data-b-a-s="thin">Stt</th>


                            <td data-f-bold="true" colspan="2" data-a-h="center" data-a-v="middle" data-f-sz="12"
                              data-f-name="Times New Roman" data-a-wrap="true" data-b-a-s="thin">Tên Khoa/phòng được
                              đánh giá</td>

                            <th data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center" data-f-sz="12"
                              data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Nguyên nhân, hạn chế,
                              kiến nghị</th>

                            <th data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center" data-f-sz="12"
                              data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Nội dung kiến nghị, đề
                              xuất</th>

                            <th data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center" data-f-sz="12"
                              data-f-name="Times New Roman" data-b-a-s="thin">Nguồn lực
                            </th>

                            <th data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center" data-f-sz="12"
                              data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Phân công nhiệm vụ</th>

                            <th data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center" data-f-sz="12"
                              data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Chịu trách nhiệm chính
                            </th>

                            <th data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center" data-f-sz="12"
                              data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Thời hạn hoàn thành
                            </th>

                            <th data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center" data-f-sz="12"
                              data-f-name="Times New Roman" data-b-a-s="thin">Ghi Chú</th>




                          </tr>
                          </thead>
                        <tbody>

                          <!-- BEGIN: BCHANCHE -->

                          <!-- BEGIN: DSHANCHE -->
                          <tr data-height="60">

                            {DSHANCHE.stt}
                            {DSHANCHE.tenkhoa}
                            <td style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-wrap="true"
                              data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                              data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.limit}</td>

                            <td style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-wrap="true"
                              data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                              data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.re}</td>

                            <td style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-wrap="true"
                              data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                              data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.person}</td>

                            <td style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-wrap="true"
                              data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                              data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.ass}</td>

                            <td style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-wrap="true"
                              data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                              data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.main}</td>

                            {DSHANCHE.time}

                            <td style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-wrap="true"
                              data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                              data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.note}</td>



                          </tr>
                          <!-- END: DSHANCHE -->

                          <!-- END: BCHANCHE -->

                        </tbody>
                      </table> <!-- END table3 -->
                    </div>
                  </div>
                </div>
                <!-- Basic table card end -->
              </div> <!-- end bc năng suất -->
            </div>


          </div>
        </div>
        <!-- end Biểu mẫu-->
      </div>
    </div>

  </div> <!-- Khu vực form -->

</div>
</div>








<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  //alert('ok');
  const ctx = document.getElementById('myChart');
  //ctx.fillStyle = 'red'; // replace 'red' with your desired background color
  //ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);
  var data = {DATA};
  var label ={LABEL};


  console.log('Data:', data);

  // Create the chart
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: label,
      datasets: [{
        label: 'ĐTB',
        data: data,
        borderWidth: 0
      }]
    },
    options: {
      indexAxis: 'y',
      scales: {
        y: {
          beginAtZero: true
        }
      },
      animation: {
        onComplete: function() {


          // Get base64 image data
          //const base64Image = chart.toBase64Image();

          // Update image source
          document.querySelector('#myChart').setAttribute('href', this.toBase64Image());
          //document.querySelector('#myImage').setAttribute('src', this.toBase64Image());

          var url_base64 = document.getElementById("myChart").toDataURL("image/png");
          var url_base64jp = document.getElementById("myChart").toDataURL("image/jpg");

          link1.href = url_base64;
          link2.href = url_base64jp

          document.querySelector('#myImage').setAttribute('src', url_base64);

          var url = link1.href.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
        }
      }
    }
  });

  //
  function printDiv(divName) {
    //alert ('Test');
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
} 




</script>
<!-- jQuery -->

<!-- Select2 -->

<!-- JS xu ly form submit-->

<script>
  $(document).ready(function() {
    // Merge tables into a single table
    let table1 = document.getElementById('table1');
    let table2 = document.getElementById('table2');
    let table3 = document.getElementById('table3');
    //let table_chart = document.getElementById('table_chart');
    let table4 = document.getElementById('table4');
    let table5 = document.getElementById('table5');
    let mergedTable = document.createElement('table');
    mergedTable.appendChild(table1.cloneNode(true));
    mergedTable.appendChild(table2.cloneNode(true));
    mergedTable.appendChild(table3.cloneNode(true));
    //mergedTable.appendChild(table_chart.cloneNode(true));
    mergedTable.appendChild(table4.cloneNode(true));
    mergedTable.appendChild(table5.cloneNode(true));

    var nam = '{nam}';
    var landanhgia = '{THONGTIN.landanhgia}';

    tenbaocao = 'BC kết quả triển khai 5S_Lần ' + landanhgia + '_' + nam + '.xlsx';
    let button = document.querySelector("#button-excel");
    button.addEventListener("click", e => {


      e.preventDefault();
      //var tenbaocao = 'BC kết quả triển khai 5S.xlsx';

      TableToExcel.convert(mergedTable, {
        name: tenbaocao,
        sheet: {
          name: 'BC kết quả triển khai 5S'
        }
      });


    });
  });
</script>






<!-- Select2 -->

<!-- Kiem tra du lieu da co cua 2 combobox khoaphong va so lan danh gia -->


<!-- Tinh tong diem -->


<!-- jQuery library -->














<script type="text/javascript">
  // Lấy thời gian hiện tại
  var today = new Date();

  // Lấy giá trị ngày, tháng, năm
  var day = today.getDate();
  var month = today.getMonth() + 1; // Tháng bắt đầu từ 0, nên cộng thêm 1
  var year = today.getFullYear();

  // Tạo chuỗi văn bản với giá trị ngày, tháng, năm
  var currentDate = "....,Ngày " + day + " tháng " + month + " năm " + year;

  // Hiển thị chuỗi văn bản vào trong thẻ HTML có id="currentDate"
  document.getElementById("currentDate").innerHTML = currentDate;
</script>


<!-- Upload and convert image to base64 -->






<!-- END: main -->