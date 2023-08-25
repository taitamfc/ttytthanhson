<!-- BEGIN: main -->
<!-- assignment 2: THực hiện nhiệm vụ -->
<script src="https://code.jquery.com/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://rawgit.com/seiyria/bootstrap-slider/master/dist/css/bootstrap-slider.min.css" rel="stylesheet"
  type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://rawgit.com/seiyria/bootstrap-slider/master/dist/bootstrap-slider.min.js"></script>
<style>
  .icon-btn a {
    border-radius: 50%;
  }

  /* Customize the slider color */
  .slider-track {
    background-color: #0008ff;
    /* Set the track color to red */
  }

  .slider-handle {
    background-color: #3300ff;
    /* Set the handle color to green */
    border-color: #00FF00;
    /* Set the handle border color to green */
  }
</style>

<script>
  var slider = new Slider("#slider1");
  slider.on("slideStop", function(slideEvt) {
    document.getElementById("sliderValue").textContent = slideEvt + "%";
  });
</script>
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
        <!-- <form name="frm_setup" id="id_frm_setup" method="post" action="{link_frm}">       -->
        <form class="md-float-material" action="{link_frm}" method="post" id="id_frm_setup">
          <input type="hidden" name="checkss" id="checkss" value="53ff69290067026857e0a5b982731c76">
          <input type="hidden" name="sta" id="sta" value="khoitaochitieu">
          <input type="hidden" name="id" id="id" value="12">

        </form>
        <!-- Tooltips on textbox card end -->
      </div>
    </div>
    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">

        <div class="table-responsive" style="padding-bottom: 100px;">
          <table class="table table-hover">
            <thead>
              <tr style="text-transform: uppercase;background-color: #4d2ed8;color: #fff;">
                <th scope="row" class="text-center" colspan="4">THỰC HIỆN NHIỆM VỤ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-1">Tên Khoa/Phòng</td>
                <td><input name="maso_bv" value="000142" type="text" class="form-control" enable="false"></td>
                <td class="col-1">Nguồn lực</td>
                <td><textarea id="content2" name="name_content" rows="2" class="form-control">
                Kiểm tra đánh giá thực hành tốt 5S theo quy định của Trung tâm Y tế test</textarea></td>
                </td>
              </tr>

              <tr>
                <td>Thời hạn hoàn thành</td>
                <td><input id="datetime" name="ngaysinh" value="11/12/1970" type="text"
                    class="form-control hasDatepicker">
                </td>
                <td>Ghi Chú</td>
                <td><input name="note" value="" type="text" class="form-control"></td>
              </tr>

              <tr>
                <td>Nội dung kiến nghị, đề xuất</td>
                <td colspan="3"><textarea id="content" name="name_content" rows="5" class="form-control">
                - Kiến nghị 1
                - Kiến nghị 2</textarea></td>
              </tr>



              <tr>
                <td>Tiến độ hoàn thành</td>
                <td>
                  <label for="slider1"></label>
                  <input id="slider1" type="text" value="" data-slider-min="0" data-slider-max="100"
                    style="background-color: #00ff40;width: 1000px; height: 0.5px;" data-slider-step="10"
                    data-slider-value="50" /><span style="margin-left: 20px;" class="badge badge-info"
                    id="sliderValue">50%</span>
                  <p id="sliderValue"></p>
                </td>

                <td>Trạng thái</td>
                <td><span class="badge badge-success" id="">Hoàn thành</span></td>

              </tr>
              <tr>
                <td>Tiến độ hoàn thành 2</td>
                <td>
                <input id="slider" type="text" data-slider-min="0" data-slider-max="100" data-slider-ticks="[1, 50, 100]" data-slider-lock-to-ticks="true"/>
                </td>
              </tr>

            </tbody>
            <tfoot>
              <tr>
                <td class="text-center" colspan="4">
                  <button type="submit" class="btn btn-warning">
                    <i class="icofont icofont-location-arrow"></i><strong>Cập nhật thông tin</strong>
                  </button>
                  <a href="/index.php?language=vi&amp;nv=quanlynhanluc&amp;op=chitietdieuduong&amp;token=97_fceb5904e10e60c57200a69770fa8fea"
                    class="btn btn-danger">
                    <i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
                </td>
              </tr>
            </tfoot>
          </table>
          <div>
          <div style="float:left;">
          <span style="display:inline; color: red;">First Span</span><hr style="background-color: black">
          <span style="display:inline; color: blue; border-left: 1px solid black; padding-left: 5px;">Second Span</span>
      </div>

      <div style="float:left;">
    <span style="display:inline; color: red;">First Span</span>
    <hr style="border: none; height: 1px; background-color: black; ">
    <span style="display:inline; color: blue;">Second Span</span>
</div>

<div style="display: flex;">
    <span style="display:inline; color: red;">First Span</span>
    <div style="width: 1px; background-color: black; margin: 0 5px;"></div>
    <span style="display:inline; color: blue;">Second Span</span>
</div>
          </div>
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
// With JQuery
$("#slider").slider({
	value: [0,100],
	ticks: [1, 10, 20, 30, 40 , 50],
	lock_to_ticks: true
});


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





<!-- END: main -->