<!-- BEGIN: main -->

<link rel="stylesheet" href="./caidatbandau-chatluong_files/font-awesome.min.css">
<link rel="stylesheet" href="./caidatbandau-chatluong_files/bootstrap.non-responsive.css">
<link rel="stylesheet" href="./caidatbandau-chatluong_files/style.css">
<link rel="stylesheet" href="./caidatbandau-chatluong_files/style.non-responsive.css">
<link rel="StyleSheet" href="./caidatbandau-chatluong_files/qlcl.css">
<link rel="stylesheet" href="./caidatbandau-chatluong_files/custom.css">
<link rel="stylesheet" type="text/css" href="./caidatbandau-chatluong_files/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./caidatbandau-chatluong_files/themify-icons.css">
<link rel="stylesheet" type="text/css" href="./caidatbandau-chatluong_files/font-awesome.min(1).css">
<link rel="stylesheet" type="text/css" href="./caidatbandau-chatluong_files/icofont.css">
<link rel="stylesheet" type="text/css" href="./caidatbandau-chatluong_files/style(1).css">
<link rel="stylesheet" type="text/css" href="./caidatbandau-chatluong_files/jquery.mCustomScrollbar.css">
<!-- Required Fremwork -->
<!-- themify-icons line icon -->
<!-- ico font -->
<!-- Style.css -->

<div class="pcoded-inner-content">
  <div class="main-body">
    <!-- Page-header start -->
    <!-- Page-header end -->
    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">
        <div class="card-header">
          <h5 class="m-b-10">KHỞI TẠO BỘ TIÊU CHUẨN THEO NĂM</h5>
        </div>
        <!-- <form name="frm_setup" id="id_frm_setup" method="post" action="{link_frm}">       -->
        <form class="md-float-material" action="{link_frm}" method="post" id="id_frm_setup">

          <input type="hidden" name="checkss" id="checkss" value="53ff69290067026857e0a5b982731c76">
          <input type="hidden" name="sta" id="sta" value="khoitaochitieu">
          <input type="hidden" name="id" id="id" value="12">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">
                    <div class="input-group">
                      <span class="input-group-addon" id="id_cbo_year" style="width: auto;min-width:100px;">Chọn
                        năm:</span>
                      <select name="cbo_year" class="form-control" placeholder="Chọn năm" title="" data-toggle="tooltip"
                        data-original-title="Năm khởi tạo">
                        <!-- BEGIN: setcbo -->
                        <option value="{setcbo.vl}">Khởi tạo bộ tiêu chuẩn năm {setcbo.vl}</option> 
                        <!-- END: setcbo-->


                      </select>
                    </div>
                  </th>
                  <td>
                    <div class="input-group">
                      <input type="hidden" name="submit_clicked" id="submit_clicked" value="">
                      <button type="submit" id="submit_button" name="submit_button"
                        class="btn btn-out-dashed btn-info btn-square" data-toggle="tooltip" data-placement="right"
                        title="" data-original-title="Khởi tạo bộ chỉ tiêu áp dụng cho năm">
                        <i class="icofont icofont-check-circled"></i> Khởi tạo bộ chỉ tiêu</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
        <!-- Tooltips on textbox card end -->
      </div>
    </div>
    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">
        <div class="card-header">
          <h5 class="m-b-10">DANH SÁCH BỘ TIÊU CHUẨN ĐÃ KHỞI TẠO CÁC NĂM</h5>
        </div>
        <div class="card-block icon-btn">
          <!-- BEGIN: setup -->
          <a href="{link_year}" class="{setup.class}">{setup.year}</a>
          <!-- END: setup -->

        </div>
        <div class="table-responsive" style="padding-bottom: 100px;">
          <table class="table table-hover">
            <thead>
              <tr>
                <th colspan="8" class="text-center">PHÂN BỐ CẬP NHẬT BỘ TIÊU CHUẨN NĂM {set_default.year}</th>
              </tr>
              <tr style="display: {set_default.show};">
                <th colspan="8" class="text-center" style="color:#ff0000">
                  Lưu ý: Bộ chỉ tiêu {set_default.year} chưa được áp dụng mặc định.

                  <a href="{link_default}"
                    onclick="if (confirm('Bạn có chắc chắn chọn mặc định?')){return true;}else{event.stopPropagation(); event.preventDefault();};"
                    class="label label-success">Chọn áp dụng mặc định</a>

                </th>
              </tr>


              <tr>
                <th>#</th>
                <th>Tiêu chuẩn</th>
                <th>Khoa/phòng cung cấp</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>

              <!-- BEGIN: question_type -->

              <tr>
                <th scope="row">{question_type.stt}</th>
                <td>{question_type.stt2}{question_type.name_question_type}</td>
                <td>
                  <label class="label label-inverse-primary">
                    <b>{question_type.id_department}{question_type.d2}

                    </b></label>
                </td>
                <td><label class="label label-success">Đã khởi tạo</label> </td>
                <td>
                  <div class="dropdown-success dropdown">
                    <button class="btn btn-mini btn-success dropdown-toggle waves-effect waves-light " type="button"
                      id="dropdown-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Thao
                      tác</button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-3" data-dropdown-in="fadeIn"
                      data-dropdown-out="fadeOut">
                      <a class="dropdown-item waves-light waves-effect" href="{link_edit_id}"><i
                          class="ti-pencil-alt"></i> Sửa</a>
                      <a onclick="del_item(&#39;/index.php?language=vi&amp;nv=qlcl&amp;op=config_chitieu&amp;sta=del_item&#39;,&#39;53ff69290067026857e0a5b982731c76_2023_12&#39;)"
                        class="dropdown-item waves-light waves-effect"
                        href=""><i
                          class="ti-trash"></i> Xóa</a>                      
                    </div>
                  </div>
                </td>
              </tr>
              <!-- END: question_type -->

            </tbody>
          </table>
        </div>
      </div>
      <!-- Tooltips on textbox card end -->
    </div>
  </div>
</div>
</div> <!-- Pcode... -->
<!-- Close for header -->
</div>
</div>
</div>

<!-- JS xu ly form submit-->
<script>
  $(function() {
    var url = "{link_frm}";    
    $('#id_frm_setup').on('submit', function(e) {
      $.ajax({
        type: 'post',
        url: url,
        data: $(this).serialize(),
        success: function(response) {
          //alert('Success: ' + response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error: ' + textStatus + ' - ' + errorThrown);
        }
      });
    });
  });
</script>

<script src="./caidatbandau-chatluong_files/jquery.min.js.tải xuống"></script>

<script>
  function setdefault_item(url, a) {
    if (confirm('Bạn có chắc chắn áp dụng mặc định?')) {//link_del
    $.post(url, 'token=' + a, function(res) {
      var r_split = res.split("_");
      alert(url);
      if (r_split[0] == 'OK') {
        //location.reload();
        alert(url);
      }
    });
  }
  return false;
  }
</script>

<script type="text/javascript" src="./caidatbandau-chatluong_files/jquery-ui.min.js.tải xuống"></script>
<script type="text/javascript" src="./caidatbandau-chatluong_files/popper.min.js.tải xuống"></script>
<script type="text/javascript" src="./caidatbandau-chatluong_files/jquery.slimscroll.js.tải xuống"></script>
<script type="text/javascript" src="./caidatbandau-chatluong_files/modernizr.js.tải xuống"></script>
<script src="./caidatbandau-chatluong_files/amcharts.min.js.tải xuống"></script>
<script src="./caidatbandau-chatluong_files/serial.min.js.tải xuống"></script>
<script type="text/javascript" src="./caidatbandau-chatluong_files/Chart.js.tải xuống"></script>
<script type="text/javascript " src="./caidatbandau-chatluong_files/todo.js.tải xuống"></script>
<script type="text/javascript" src="./caidatbandau-chatluong_files/script.js.tải xuống"></script>
<script type="text/javascript " src="./caidatbandau-chatluong_files/SmoothScroll.js.tải xuống"></script>
<script src="./caidatbandau-chatluong_files/pcoded.min.js.tải xuống"></script>
<script src="./caidatbandau-chatluong_files/vartical-demo.js.tải xuống"></script>
<script src="./caidatbandau-chatluong_files/jquery.mCustomScrollbar.concat.min.js.tải xuống"></script>
<script src="./caidatbandau-chatluong_files/bootstrap.min.js.tải xuống"></script>




<!-- END: main -->