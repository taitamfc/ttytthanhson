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


  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: rgba(42, 36, 188, 0.581);
    border: none;
  }

  #table tr th td,
  #table1 tr td,
  #table1 th,
  #table2 tr th td,
  #table2 th,
  #table6 tr td {
    border: none;
    border-collapse: collapse;
  }

  .table-container tr:last-child td {
    border-bottom: 1px solid black;
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
              <a href="{list_count.link_landanhgia}"
                class="{list_count.class}">{list_count.count_evaluation}</a>
              <!-- END: list_count -->
            </div>
            <div class="label-main">
              <button {hien_nutexcel} id="in-bieumau" onclick="printDiv1('bieumau');"
                class="btn btn-primary buttons-excel rounded-circle action  btn-warning"
                style="width: 100px; height: 40px;"><i class="fa fa-print"></i> Xem/In </button>

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
    <div class="col-sm-12" {hien_bieumau}>
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
                        </br>
                        <h4>
                          BÁO CÁO KẾT QUẢ TRIỂN KHAI KAIZEN 5S LẦN {THONGTIN.landanhgia} NĂM {nam}
                        </h4>

                      </th>
                    </tr>

                    <tr data-height="20">
                      <th></th>

                    <tr>
                      <td style="font-weight: bold" data-a-h="left" data-f-sz="12" data-f-name="Times New Roman"
                        data-f-bold="true" scope="row" colspan="12">
                        I. THÔNG TIN CHUNG</td>

                    </tr>



                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">1. Lần
                        đánh giá:
                        Lần thứ {THONGTIN.landanhgia}</td>

                    </tr>
                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">2. Thời
                        gian đánh
                        giá: Từ ngày :{THONGTIN.tungay}, đến ngày:
                        {THONGTIN.denngay}</td>

                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">3. Tổng
                        số khoa,
                        phòng đánh giá: {THONGTIN.tt}/{THONGTIN.tc} khoa, phòng </td>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">4 .Thành
                        phần đoàn
                        đánh giá (họ tên và chức danh):</td>
                    </tr>


                    <!-- BEGIN: TEAMS -->
                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        - {TEAMS}
                      <td>
                    </tr>
                    <!-- END: TEAMS -->

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" scope="row" colspan="12">5. Nội
                        dung thực
                        hiện đánh giá:</td>
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
                      <td style="font-weight: bold" data-a-h="left" data-f-sz="12" data-f-name="Times New Roman"
                        data-f-bold="true" scope="row" colspan="12">
                        II. KẾT QUẢ ĐÁNH GIÁ</td>
                    </tr>

                    <tr>
                      <td data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" data-f-bold="true" scope="row"
                        colspan="12">
                        1. Kết quả chung:</td>
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
                      <td data-a-h="left" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" colspan="10"
                        data-a-wrap="true">
                        - Khoa, phòng đạt tổng điểm cao nhất: {THONGTIN2.max_khoaphong}
                      </td>
                    </tr>

                    <tr data-height="35">
                      <td data-a-h="left" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" colspan="10"
                        data-a-wrap="true">
                        - Khoa, phòng đạt điểm thấp nhất: {THONGTIN2.min_khoaphong}
                      </td>
                    </tr>


                    <tr>

                      <td data-f-bold="true" data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                        2. Bảng đánh giá chi tiết:
                      </td>
                    </tr>

                  </thead>
                </table> <!-- end table2 -->


                <!-- Tooltips on textbox card start -->


                <table id="table3" class="table3 table  table-hover" border="0px" cellpadding="0" cellspacing="0"
                  style="width: 100%;">
                  <tbody>

                    <tr data-height="40">
                      <th class="tieumuc" data-f-bold="true" data-b-a-s="thin" data-a-v="middle" data-a-h="center"
                        data-f-sz="12" data-a-wrap="true" data-f-name="Times New Roman" colspan="10" class="text-left">
                        TỔNG HỢP KẾT
                        QUẢ ĐÁNH GIÁ 5 S TẠI CÁC
                        KHU VỰC
                        KHÁC NHAU Ở MỘT LẦN ĐÁNH GIÁ TRONG NĂM {nam}
                      </th>
                    </tr>
                    <tr data-b-a-s="thin">
                      <th class="tieumuc" data-b-a-s="thin" data-f-bold="true" colspan="10" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" class="text-left">Lần đánh giá: {landanhgia}
                        ({DANHSACH.from_date} –
                        {DANHSACH.to_date})
                      </th>
                    </tr>
                    <tr data-height="40">

                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Ngày đánh giá
                      </th>
                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Khoa/ phòng
                        được ĐG
                      </th>
                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Trưởng đội
                        đánh giá
                      </th>
                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Tổng điểm</th>
                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">ĐTB</th>
                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Xếp loại</th>
                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Kiến nghị</th>


                    </tr>

                    <!-- BEGIN: DANHSACH -->
                    <tr data-height="100">
                      <td class="tieumuc" style="vertical-align: middle;" colspan="1" data-a-wrap="true" data-a-h="left"
                        data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman" rowspan="{DANHSACH.sodong}"
                        data-b-a-s="thin">{DANHSACH.created_date}
                      </td>
                      <td class="tieumuc" style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-v="middle"
                        data-f-sz="12" data-f-name="Times New Roman" rowspan="{DANHSACH.sodong}" data-b-a-s="thin"
                        data-a-wrap="true">
                        {DANHSACH.tenkhoa}</td>
                      <td class="tieumuc" style="vertical-align: middle;" colspan="2" data-a-h="left" data-a-v="middle"
                        data-f-sz="12" data-f-name="Times New Roman" rowspan="{DANHSACH.sodong}" data-b-a-s="thin">
                        {DANHSACH.doitruong}
                      </td>
                      <td class="tieumuc" class="text-center" style="vertical-align: middle;" colspan="1" data-f-sz="12"
                        data-a-v="middle" data-f-name="Times New Roman" data-t="n" data-a-h="center"
                        rowspan="{DANHSACH.sodong}" data-b-a-s="thin">{DANHSACH.total_score} </td>
                      <td class="tieumuc" style="vertical-align: middle;" colspan="1" data-f-sz="12" data-a-v="middle"
                        data-f-name="Times New Roman" data-t="n" data-a-h="center" rowspan="{DANHSACH.sodong}"
                        data-b-a-s="thin">{DANHSACH.dtb} </td>
                      <td class="tieumuc" style="vertical-align: middle;" colspan="1" data-f-sz="12" data-a-wrap="true"
                        data-a-v="middle" data-f-name="Times New Roman" data-a-h="center" rowspan="{DANHSACH.sodong}"
                        data-b-a-s="thin">{DANHSACH.rating} </td>

                      <td class="tieumuc2" style="vertical-align: middle;" colspan="2" data-f-sz="12" data-a-wrap="true"
                        data-a-v="middle" data-f-name="Times New Roman" data-a-h="left rowspan=" {DANHSACH.sodonglui}"
                        data-b-t-s="thin" data-b-r-s="thin">- {DANHSACH.re} </td>

                      <!-- BEGIN: DSRE -->

                    <tr data-height="100">

                      <td class="{DSRE.class}" style="vertical-align: middle;" colspan="2" data-a-h="left"
                        data-a-wrap="true" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-b-s="{DSRE.bottom}" data-b-l-s="thin" data-b-r-s="thin">- {DSRE.re} </td>

                    </tr>
                    <!-- END: DSRE -->

                    </tr>

                    <!-- END: DANHSACH -->


                    <tr>
                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="5" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">Toàn bệnh viện
                        (điểm trung bình chung)
                      </th>
                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="3" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">{BCCT.dtb}
                      </th>
                      <th class="tieumuc" data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" data-a-wrap="true">{BCCT.xl}
                      </th>
                    </tr>


                  </tbody>
                </table> <!-- END table3 -->

                </br>
                <p>


                  <!-- start table_chart -->

                  <!-- END table_chart -->

                  <!-- Basic table card end -->


                <table id="table4" class="table table table-hover" border="0px" cellpadding="0" cellspacing="0" {STYLE}>

                  <tr>
                    <td data-f-bold="true" data-a-h="left" data-f-sz="12" data-f-name="Times New Roman">

                    </td>
                  </tr>

                  <tr>
                    <td data-f-bold="true" data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="5">
                      3. Bảng tổng hợp kết quả đánh giá :
                    </td>
                  </tr>

                  <tr data-height="60">
                    <th class="tieumuc41" data-a-wrap="true" data-f-bold="true" data-a-h="center" data-f-sz="12"
                      data-f-name="Times New Roman" colspan="10" class="text-center">
                      TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5S TẠI CÁC KHU VỰC </br> Ở CÁC LẦN ĐG KHÁC NHAU {nam}
                    </th>
                  </tr>
                  <tr>
                    <th class="tieumuc41" data-b-a-s="thin" data-f-bold="true" data-a-h="center" data-f-sz="12"
                      data-f-name="Times New Roman" data-b-a-s="thin" colspan="{SOCOTBC}" class="text-center">
                      Điểm các lần đánh giá
                    </th>
                  </tr>
                  <tr>
                    <th style="width: 10%;" class="tieumuc41" data-a-v="middle" data-f-bold="true" data-a-h="center"
                      colspan="1" rowspan="2" data-f-name="Times New Roman">STT</th>


                    <th class="tieumuc41" data-b-a-s="thin" data-f-bold="true" data-a-h="center" colspan="2"
                      data-f-name="Times New Roman">Lần
                      đánh giá</th>
                    <!-- BEGIN:LAN -->
                    <th class="tieumuc41" data-a-h="center" data-f-bold="true" data-f-sz="12"
                      data-f-name="Times New Roman" data-b-a-s="thin" class="text-Left">L{LAN.stt}
                    </th>
                    <!-- END: LAN -->

                  </tr>

                  <tr>


                    <th style="width: 30%;" class="tieumuc41" data-f-bold="true" data-a-v="middle" data-a-h="center"
                      colspan="2" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin">Thời gian thực hiện
                    </th>
                    <!-- BEGIN:NGAY -->
                    <td style="width: 10%;" class="tieumuc41" data-f-sz="12" data-f-name="Times New Roman"
                      data-b-a-s="thin" class="text-Left" data-a-wrap="true">{NGAY.ngay}
                    </td>
                    <!-- END: NGAY -->

                  </tr>

                  <!-- BEGIN:DANHSACH2 -->
                  <tr data-height="40">
                    <th class="tieumuc41" data-b-a-s="thin" data-t="n" data-f-bold="true" data-a-h="center" colspan="1"
                      data-f-name="Times New Roman">
                      {DANHSACH2.stt}
                    </th>
                    <td class="tieumuc42" data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin" colspan="2"
                      data-a-wrap="true">
                      {DANHSACH2.tenkhoa}
                    </td>
                    <!-- BEGIN:DANHSACH3 -->
                    <td class="tieumuc42 text-center" data-t="n" data-t="n" data-f-sz="12" data-f-name="Times New Roman"
                      data-b-a-s="thin">
                      {DANHSACH3.dtb}
                    </td>
                    <!-- END:DANHSACH3 -->

                  </tr>

                  <!-- END:DANHSACH2 -->

                </table> <!-- END table4 -->
                </br>

                <!-- BEGIN table5 -->
                <table id="table5" class="table table table-hover" border=0" cellpadding="0" cellspacing="0"
                  style="width: 100%;">

                  <tr>
                    <td data-f-bold="true" data-a-h="left" data-f-sz="12" data-f-name="Times New Roman" colspan="12">
                      4. Hạn chế, nguyên nhân, đề xuất, kiến nghị:
                    </td>
                  </tr>

                  <tr data-b-a-s="thin">


                  </tr>

                  <tbody>

                    <tr>

                      <th class="tieumuc51" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin">Stt</th>


                      <td class="tieumuc51" data-f-bold="true" colspan="2" data-a-h="center" data-a-v="middle"
                        data-f-sz="12" data-f-name="Times New Roman" data-a-wrap="true" data-b-a-s="thin">Tên Khoa/phòng
                        được
                        đánh giá</td>

                      <td class="tieumuc51" data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center"
                        data-f-sz="12" data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Nguyên nhân,
                        hạn chế,
                        kiến nghị</td>

                      <td class="tieumuc51" data-a-v="middle" data-f-bold="true" colspan="2" data-a-h="center"
                        data-f-sz="12" data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Nội dung kiến
                        nghị,
                        đề
                        xuất</td>

                      <td class="tieumuc51" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin">Nguồn lực
                      </td>

                      <td class="tieumuc51" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Phân công
                        nhiệm vụ
                      </td>

                      <td class="tieumuc51" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Chịu trách
                        nhiệm
                        chính
                      </td>

                      <td class="tieumuc51" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-a-wrap="true" data-f-name="Times New Roman" data-b-a-s="thin">Thời hạn hoàn
                        thành
                      </td>

                      <td class="tieumuc51" data-a-v="middle" data-f-bold="true" colspan="1" data-a-h="center"
                        data-f-sz="12" data-f-name="Times New Roman" data-b-a-s="thin">Ghi Chú</td>




                    </tr>
                    </thead>
                  <tbody>

                    <!-- BEGIN: BCHANCHE -->

                    <!-- BEGIN: DSHANCHE -->
                    <tr data-height="80">

                      {DSHANCHE.stt}
                      {DSHANCHE.tenkhoa}
                      <td class="{DSHANCHE.class}" style="vertical-align: middle;" colspan="2" data-a-h="left"
                        data-a-wrap="true" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.limit}</td>

                      <td class="{DSHANCHE.class}" style="vertical-align: middle;" colspan="2" data-a-h="left"
                        data-a-wrap="true" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.re}</td>

                      <td class="{DSHANCHE.class}" style="vertical-align: middle;" colspan="1" data-a-h="left"
                        data-a-wrap="true" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.person}
                      </td>

                      <td class="{DSHANCHE.class}" style="vertical-align: middle;" colspan="1" data-a-h="left"
                        data-a-wrap="true" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.ass}</td>

                      <td class="{DSHANCHE.class}" style="vertical-align: middle;" colspan="1" data-a-h="left"
                        data-a-wrap="true" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.main}</td>

                      {DSHANCHE.time}

                      <td class="{DSHANCHE.class}" style="vertical-align: middle;" colspan="1" data-a-h="left"
                        data-a-wrap="true" data-a-v="middle" data-f-sz="12" data-f-name="Times New Roman"
                        data-b-b-s="{DSHANCHE.bottom}" data-b-l-s="thin" data-b-r-s="thin">{DSHANCHE.note}</td>



                    </tr>
                    <!-- END: DSHANCHE -->

                    <!-- END: BCHANCHE -->

                  </tbody>
                </table> <!-- END table5 -->


                <!-- begin bc năng suất -->



                <div class="table-responsive" style="padding-bottom: 100px;">

                  <table id="table6" class="table" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">

                    <thead>
                      <tr>
                        <td style="font-weight: bold" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                          colspan="10" data-a-h="left" class="text-left">
                          <em>4. Khen thưởng: Có đề xuất khen thưởng không? Nếu có thì lý do. </em>
                        </td>

                      </tr>

                      <tr>
                        <td data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" colspan="10" data-a-h="left"
                          class="text-left">
                          {BCKHENTHUONG.khenthuong} </td>

                      </tr>

                      <tr>
                        <td style="font-weight: bold" data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman"
                          colspan="10" data-a-h="left" class="text-left">
                          <em>5. Xử lý vi phạm: Có đề xuất xử lý vi phạm không? Nếu có thì lý do.</em>
                        </td>
                      </tr>

                      <tr>
                        <td data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" colspan="10" data-a-h="left"
                          class="text-left">
                          {BCKHENTHUONG.kyluat} </td>

                      </tr>

                      <tr>
                        <td data-f-sz="12" data-f-name="Times New Roman" colspan="10" data-a-h="left" class="text-left">
                          Trên đây là báo cáo đánh giá kết quả triển khai Kaizen 5s lần
                          {THONGTIN.landanhgia} ({THONGTIN.tungay} – {THONGTIN.denngay})./. </td>

                      </tr>



                      <tr>

                        <td data-f-bold="true" style="font-weight: bold;width: 70%;" data-f-sz="12"
                          data-f-name="Times New Roman" colspan="8" data-a-h="left" class="text-left">
                          Nơi nhận:
                        </td>

                        <td data-f-bold="true" data-f-sz="12" data-f-name="Times New Roman" colspan="2"
                          data-a-h="center" class="text-center"><span style="font-weight: bold;"> GIÁM ĐỐC </span>
                        </td>

                      </tr>

                      <tr>
                        <td style="font-weight: bold;width: 70%;" data-f-sz="12" data-f-name="Times New Roman"
                          colspan="8" data-a-h="left" class="text-left">
                          - BGĐ (để b/c);
                        </td>

                        
                      </tr>
                      </br>

                      <tr>
                        <td style="font-weight: bold;width: 70%;" data-f-sz="12" data-f-name="Times New Roman"
                          colspan="8" data-a-h="left" class="text-left">
                          - Các khoa, phòng (để t/h)
                        </td>
                      </tr>

                      <tr>
                        <hr>
                      </tr>

                    </thead>
                  </table>





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








<script>
  //
  function printDiv(divName) {
    //alert ('Test');
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }

  function printDiv1(divName) {
    var divToPrint = document.getElementById(divName);
    var htmlToPrint = '' +
      '<style type="text/css">' +

      '#table3 th.tieumuc, #table3 td.tieumuc {'+      
      'text-align: center;' +
      'border-right: 1px solid black;' +
      'border-top: 1px solid black;' +
      'border-bottom: 1px solid black;' +
      'border-left: 1px solid black;' +
      '}' +

      '#table3 td.tieumuc2 {'+
      'border-left: 1px solid black;' +
      'border-top: 1px solid black;' +
      'border-right: 1px solid black;' +
      '}' +

      '#table3 td.tieumuc3 {'+
      'border-left: 1px solid black;' +
      'border-bottom: 1px solid black;' +
      'border-right: 1px solid black;' +
      '}' +

      '#table3 td.tieumuc4 {'+
      'border-left: 1px solid black;' +
      'border-right: 1px solid black;' +
      '}' +

      '#table4 th.tieumuc41, #table4 td.tieumuc41 {'+
      'text-align: center;' +
      'border-top: 1px solid black;' +
      'border-bottom: 1px solid black;' +
      'border-left: 1px solid black;' +
      'border-right: 1px solid black;' +
      '}' +

      '#table4 th.tieumuc42, #table4 td.tieumuc42 {'+           
      'border-bottom: 1px solid black;' +
      'border-left: 1px solid black;' +
      'border-right: 1px solid black;' +
      '}' +

      '#table5 th.tieumuc51, #table5 td.tieumuc51 {'+   
      'border-top: 1px solid black;' +
      'border-bottom: 1px solid black;' +
      'border-left: 1px solid black;' +
      'border-right: 1px solid black;' +
      '}' +

      '#table5 th.tieumuc52, #table5 td.tieumuc52 {'+        
      'vertical-align: middle;' +
      'border-bottom: 1px solid black;' +
      'border-left: 1px solid black;' +
      '}' +

      '#table5 th.tieumuc53, td.tieumuc53 {'+
      'border-left: 1px solid black;' +
      'border-right: 1px solid black;' +
      '}' +

      '#table5 th.tieumuc54, td.tieumuc54 {'+
      'border-left: 1px solid black;' +
      'border-right: 1px solid black;' +
      'border-bottom: 1px solid black;' +

      '}' +



      '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
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
    let table6 = document.getElementById('table6');
    let mergedTable = document.createElement('table');
    mergedTable.appendChild(table1.cloneNode(true));
    mergedTable.appendChild(table2.cloneNode(true));
    mergedTable.appendChild(table3.cloneNode(true));
    //mergedTable.appendChild(table_chart.cloneNode(true));
    mergedTable.appendChild(table4.cloneNode(true));
    mergedTable.appendChild(table5.cloneNode(true));
    mergedTable.appendChild(table6.cloneNode(true));

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