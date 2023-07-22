<!-- BEGIN: main -->
<style>
  .icon-btn a {
    border-radius: 50%;
  }
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="{THEME_URL}/css/select2.min.css" rel="stylesheet" />
<script src="{THEME_URL}/js/bootstrap.min.js"></script>
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
          <table class="table table-hover center" style="width:100%">
            <div class="container">
              <div class="row">
                <div class="col-12">
                 
                    <thead>
                    <tr>
                    <th style="background-color: #4CAF50;color: white;" colspan="8" class="text-center">DANH SÁCH CÁC MẪU BÁO CÁO THEO NĂM {set_default}
                    </th>
                  </tr>
                      <tr>
                        <th scope="col" style="width:10%;" >STT</th>
                        <th scope="col"style="width:75%;" >Tên báo cáo</th>                       
                        <th scope="col" style="width:50%;">Xem/In</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Báo cáo tổng hợp đánh giá KAIZEN 5S</td>                      
                        <td>
                          <button type="button" onclick="location.href='{LINK.xem_tonghop}';" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                          <button type="button" onclick="location.href='{in_tonghop}';" class="btn btn-success"><i class="fa fa-print"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Bảng báo cáo chi tiết</td>                        
                        <td>
                          <button type="button" onclick="location.href='{LINK.xem_chitiet}';" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                          <button type="button" onclick="location.href='{in_chitiet}';" class="btn btn-success"><i class="fa fa-print"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Báo cáo tiến độ cải tiến chất lượng</td>                        
                        <td>
                          <button type="button" onclick="location.href='{xem_caitien}';" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                          <button type="button" onclick="location.href='{in_caitien}';" class="btn btn-success"><i class="fa fa-print"></i></button>
                        </td>
                      </tr>
                    </tbody>
                 
                </div>
              </div>
            </div>
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





<!-- END: main -->