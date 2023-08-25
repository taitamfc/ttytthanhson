<!-- BEGIN: main -->
<style>
  .icon-btn{
    border-radius: 50%;
  }

  #myTable {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #myTable th,
  #myTable td {
    text-align: left;
    padding: 8px;
  }

  #myTable th.header {
    background-color: #6574d7;
    color: white;
  }

  #myTable td.title {
    background-color: #4CAF50;
    color: white;
  }

  #myTable tr:nth-child(even) {
    background-color: #f2f2f2;
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

  .custom-bg {
    background-color: #2600ff;
    /* replace with your preferred color */
  }

  .ui-accordion .ui-accordion-content {padding: 0;}
  .ui-accordion .ui-accordion-header {padding: 14px 20px;}



  /* Custom styles for square radio buttons */
  .ks-cboxtags1 {
    display: inline-block;
    position: relative;
    padding-left: 30px;
    /* Space for the square */
    cursor: pointer;
    margin-right: 10px;
    /* Space between the radio buttons */
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
          <h5 class="m-b-10">THỰC HIỆN ĐÁNH GIÁ </h5>
          <p class="text-muted m-b-10">{DATA.name_report}</p>
          <div style="border-top: 1px solid #e0e0e0;"> </div>

          <form class="md-float-material" action="{link_frm}" method="post" id="myform" enctype="multipart/form-data">
            <input type="hidden" name="txt_action" value="{action}" />
            <input type="hidden" name="txt_id_rp" value="{id_rp_detail}" />
            <input type="hidden" name="txt_status" value="{thongtinchung.status}" />
            <input type="hidden" id="txt_count" name="cbo_count" value="{idcount}" />
            <div class="">
              <table class="table">
                <tbody>
                  <tr>
                    <td colspan="2">
                      <div class="input-group">
                        <span class="input-group-addon" id="id_cbo_account" style="width: auto;min-width:100px;">Chọn
                          Khoa Phòng Đánh Giá:</span>
                        <select id="account" name="cbo_account" class="form-control" placeholder="Chọn Khoa Phòng"
                          title="" data-toggle="tooltip" data-original-title="Khoa Phòng Đánh Giá" onchange ="change_account(this)"   >
                          <option value="" disabled selected>Chọn Khoa Phòng</option>
                          <!-- BEGIN: report -->
                          <option value="{report.account}" {report.selected}>{report.name}</option>
                          <!-- END: report-->
                        </select>

                    </td>

            </div>


            <td colspan="2">              
                
                  <!-- BEGIN: setcount -->                 
                  <a  onclick="get_count(this.id);" id="{setcount.count}"
											class="{setcount.class} icon-btn">{setcount.count}</a>
                  <!-- END: setcount-->               
              
            </td>

        </div>


        </tr>
        <tr style="background-color: #e8edea;border-color: #73b4ff;outline: 1px dashed #fff;outline-offset: -5px;">
          <td class="align-middle text-left col-2">
            <b><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Từ
              ngày:</b>
          </td>

          <td class="text-center col-2">
            <input id="start-date" name="from_date" value="{thongtin.from_date}" type="text"
              class="dataValue form-control bg-success" readonly disabled />
          </td>

          <td class="align-middle text-left col-1">
            <b><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Đến
              ngày:</b>
          </td>

          <td class="text-center col-2">
            <input id="end-date" name="to_date" value="{thongtin.to_date}" type="text" class="dataValue form-control bg-success"
              readonly disabled />
          </td>

        </tr>


        <tr style="background-color: #e8edea;border-color: #73b4ff;outline: 1px dashed #fff;outline-offset: -5px;">
          <td class="align-middle text-left col-2">
            <b><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Ngày đánh giá:</b>
          </td>

          <td class="text-center col-2">
            <input id="current-date" name="created_date" value="{thongtin.created_date}" type="text"
              class="dataValue form-control bg-warning"  />
          </td>

          <td class="align-middle text-left col-2">
            <b><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Hình thức đánh giá:</b>
          </td>



          <td class="text-left col-1">

            <input class="btn  bg-info btn-square" type="text" name="cbo_evaluation_type" id="id_evaluation_type"
              value="{evaluation_type.name_evaluation_type}" size="30" readonly="readonly">
          </td>

        <tr>

        <td class="align-middle text-left col-2">
        <b><i class="fa fa-hand-o-right" aria-hidden="true"></i> Trạng thái đánh giá: <span class="label {thongtinchung.class}">{thongtinchung.trangthai}</span></b>
      </td>
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
<div class="col-sm-12" {hien_bieumau}>
  <div class="card">

    <!-- Tạo biểu mẫu đánh giá -->
    <div class="card-block">
      <div class="col-lg-12">
        <table id="myTable" class="cell-border table table-hover" style="width:100%">
          <thead>
            <tr>
              <th class="header">
                <h4 class="m-b-10">BIỂU MẪU ĐÁNH GIÁ </h4>
              </th>
              <th class="text-center header" colspan="3">
                TỔNG ĐIỂM: <input class="btn btn-out btn-danger btn-square" type="text" name="totalsum" id="id_totalSum"
                  value="{total_score}" size="2" readonly="readonly">
              </th>
              <th class="text-center header" colspan="2">
                DTB: <input class="btn btn-out btn-warning btn-square" type="text" name="dtb" id="id_dtb"
                  value="{thongtin.dtb}" size="2" readonly="readonly">
              </th>
            </tr>

            </tr>

            <th style="text-align: left;">KẾT QUẢ CHUNG CHIA THEO TIỂU MỤC  </th>
            <th style="text-align: center;">MỨC 0  </th>
            <th style="text-align: center;">MỨC 1  </th>
            <th style="text-align: center;">MỨC 2  </th>
            <th style="text-align: center;">TỔNG SỐ TIỂU MỤC ĐÃ ĐÁNH GIÁ  </th>

            </tr>

            </tr>

            <th style="text-align: left;">SỐ LƯỢNG TIỂU MỤC ĐẠT</th>
            <th style="text-align: center;">{tieumuc.m0} </th>
            <th style="text-align: center;">{tieumuc.m1} </th>
            <th style="text-align: center;">{tieumuc.m2} </th>
            <th style="text-align: center;">{tieumuc.tongso} </th>

            </tr>


          </thead>
        </table>



        <div class="accordion-block color-accordion-block">
          <div class="color-accordion ui-accordion ui-widget ui-helper-reset" id="color-accordion" role="tablist">
            <!-- BEGIN: group -->
            <a class="accordion-msg b-none ui-corner-top ui-state-default ui-accordion-icons scale_active ui-accordion-header-collapsed ui-corner-all"
              role="tab" id="ui-id-13" aria-controls="ui-id-14" aria-selected="false" aria-expanded="false"
              tabindex="-1">
              <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>

              <strong>{group.stt} {group.name_question_type} </strong><span class="{group.class}">{group.ctl}</span></a>
            <div class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content"
              style="display: none;" id="ui-id-14" aria-labelledby="ui-id-13" role="tabpanel" aria-hidden="true">
              <p>

              <table id="myTable" class="cell-border table table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th class="text-center header" style="width: 3% ;">STT</th>
                    <th class="header">Nội dung</th>
                    <th style="width: 10%" class="text-center header" colspan="3">Điểm</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- BEGIN: question -->
                  <tr>
                    <th class="text-center">{question.stt}</th>
                    <td style="white-space:pre-wrap; word-break:break-word">{question.content}
                    </td>

                    <!-- BEGIN: score -->
                    <td >
                      <div class="ks-cboxtags">
                        <input class="calc form-check-input" type="radio" id="r{score.id_question}_{score.score}"
                          name="a[{score.id_question}]" value="{score.score}" {score.checked}>
                        <label style="width: 100px; height: 40px; color:#2600ffb1; " class="btn btn-warning btn-circled"
                          for="r{score.id_question}_{score.score}"><strong>{score.score}</strong></label>

                      </div>
                    </td>
                    <!-- END: score -->

                  </tr>
                  <!-- END: question -->

                </tbody>
              </table>
              </p>
            </div>
            <!-- END: group -->


            <a class="accordion-msg b-none ui-corner-top ui-state-default ui-accordion-icons scale_active ui-accordion-header-collapsed ui-corner-all"
              role="tab" id="ui-id-13" aria-controls="ui-id-14" aria-selected="false" aria-expanded="false"
              tabindex="-1">
              <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>
              <strong>HÌNH ẢNH BẰNG CHỨNG ĐÍNH KÈM</strong></a>
            <div class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content"
              style="display: none;" id="ui-id-14" aria-labelledby="ui-id-13" role="tabpanel" aria-hidden="true">
              <p>
              <table id="myTable" class="cell-border table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <div class="container">

                      <br><br>

                      <div id="imagePreview" class="row">
                        <!-- BEGIN: images -->
                        <div class="col-md-3 position-relative" style="margin: 20px 0;">
                          {images}

                          <button type="button"
                            class="btn btn-danger position-absolute top-0 end-0 delete-btn">&times;</button>
                        </div>




                        <!-- END: images -->
                      </div>

                  </tr>

                </thead>
                <tfoot>

                  <tr class="align-items-center border-0">
                    <td style="text-align: center;" class="border-0">

                      <input type="hidden" name="txt_image" id="id_image" />
                      <input type="hidden" name="txt_url" id="id_txturl" />


                      <div class="form-group h-100 border-0">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="file" name="imgs[]" multiple
                            onchange="uploadImages()">
                          <label class="btn btn-out-dotted btn-warning" for="file">upload Images</label>

                        </div>
                      </div>




                    </td>
                  </tr>

                </tfoot>


              </table>
              </p>
            </div>
            
            
            <a class="accordion-msg b-none ui-corner-top ui-state-default ui-accordion-icons scale_active ui-accordion-header-collapsed ui-corner-all"
              role="tab" id="ui-id-13" aria-controls="ui-id-14" aria-selected="false" aria-expanded="false"
              tabindex="-1">
              <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>
              <strong>NHẬN XÉT - ĐỀ XUẤT, KIẾN NGHỊ, KHEN THƯỞNG, KỶ LUẬT</strong></a>
            <div class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content"
              style="display: none;" id="ui-id-14" aria-labelledby="ui-id-13" role="tabpanel" aria-hidden="true">
              <p>
              <table id="myTable" class="cell-border table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <td class="class=" align-middle text-left col-1"">
                      <label for="id_evaluation_type">Hạn Chế, Nguyên Nhân</label>
                    </td>
                  </tr>
                  <tr>
                    <td><textarea id="limitation" name="name_limitation" rows="5"
                        class="form-control">{thongtin.limit}</textarea>
                    </td>
                  </tr>

                  <tr>
                    <td class="class=" align-middle text-left col-1"">
                      <label for="id_evaluation_type">Đề Xuất, Kiến Nghị</label>
                    </td>
                  </tr>
                  <tr>
                    <td><textarea id="recommendation" name="name_recommendation" rows="5"
                        class="form-control">{thongtin.re}</textarea>
                    </td>
                  </tr>

                  <tr>
                  <td class="class=" align-middle text-left col-1"">
                    <label for="id_evaluation_type">Khen Thưởng</label>
                  </td>
                </tr>
                <tr>
                  <td><textarea id="bonus" name="name_bonus" rows="5"
                      class="form-control">{thongtin.bonus}</textarea>
                  </td>
                </tr>

                <tr>
                <td class="class=" align-middle text-left col-1"">
                  <label for="id_evaluation_type">Kỷ Luật</label>
                </td>
              </tr>
              <tr>
                <td><textarea id="discipline" name="name_discipline" rows="5"
                    class="form-control">{thongtin.discipline}</textarea>
                </td>
              </tr>


                  
                </thead>
                <tfoot>
                  <tr>
                    <td style="text-align: center;">
                      <button type="submit" style="display:{save_button};" id=" id_submit" name="submit_button"
                        class="btn btn-out-dashed btn-success btn-square">
                        <i class="icofont icofont-check-circled"></i> Lưu
                      </button>

                      <button type="button" style="display:{type_button};"
                        onclick="if (confirm('Bạn có chắc chắn xóa dữ liệu lần đánh giá?')){window.location.href='{link_del}'; return true;} else{event.stopPropagation(); event.preventDefault();}"
                        id="id_back" name="back_button" class="btn btn-out-dotted btn-danger btn-danger">
                        Xóa</button>

                      <button type="button" onclick="location.href='{link_back}'" id="id_back" name="del_button"
                        class="btn btn-out-dotted btn-info ">Trở Lại
                      </button>

                    </td>
                  </tr>
                </tfoot>


              </table>
              </p>
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
  $(function() {
    var url = '{link_frm}';    
    $('#myform').on('submit', function(e) {

      if (confirm('Bạn có chắc chắn cập nhật dữ  liệu lần đánh giá?')) {

        //e.preventDefault();
        $.ajax({
          type: 'post',
          url: url,
          data: $(this).serialize(),
          success: function(response) {
            //alert('ok');
            //window.location.reload();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus + ' - ' + errorThrown);
          }
        });

      }
    });
  });
</script>




<script>
  $("#multiple").select2({
    placeholder: "Chọn thành viên",
    allowClear: true
  });
</script>


<!-- Select2 -->

<!-- Kiem tra du lieu da co cua 2 combobox khoaphong va so lan danh gia -->

<script>

  function get_count(){
    var url = '{link_frm}';
    var vl1 = event.target.id;    
    vl2= document.getElementById("account").value;
    //document.getElementById("txt_count").value = vl1;
    //alert(vl2);
    window.location = url + '&idd=' + vl2 + '_' + vl1;
  };

  function change_account(a){
    var url = '{link_frm}';
    var vl1 = (a.value || a.options[a.selectedIndex].value);  //crossbrowser solution =)
    //vl2= document.getElementById("txt_count").value;

    
    //alert(vl1);
    window.location = url + '&idd=' + vl1;

  };
   
  
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

<!-- kiem tra dữ liệu ngày nhập-->
<script>
  function TDate() {
    var CreatedDate = document.getElementById("createddate").value;
    var ToDate = new Date();

    if (new Date(CreatedDate).getTime() > ToDate.getTime()) {
      alert("Thông báo: Ngày đánh giá không được lớn hơn ngày hiện tại");

      CreatedDate.value = ToDate.getTime();
      return false;
    }
    return true;
  }
</script>








<!-- jQuery library -->
<script>
  $(document).ready(function() {


    var date = new Date();
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

    $.datepicker.setDefaults({
      dateFormat: 'dd-mm-yy',
     
    });


    $('#current-date').datepicker('setDate', new Date());

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

    $('#current-date').datepicker({
      onSelect: function(selectedDate) {

      }
    });
  });
</script>

<!-- Upload and convert image to base64 -->



<script type="text/javascript">
  function uploadImages() {
    var files = $('#file')[0].files;
    var formData = new FormData();
    for (var i = 0; i < files.length; i++) {
      formData.append('images[]', encodeImgtoBase64(files[i]));
    }
    $('#id_image').val(formData);
    /*
    $.ajax({
url: '{link_frm}',
    type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        alert(response);
      },
      error: function(jqXHR, textStatus, errorMessage) {
        console.log(errorMessage); // Optional
      }
  });*/
  }

  function encodeImgtoBase64(file) {
    var reader = new FileReader();
    reader.onloadend = function() {
      var base64String = reader.result;
      // Create a new div for each image with a delete button overlay
      var newDiv = $('<div class="col-md-3 position-relative" style="margin: 20px 0;"></div>');
      var newImg = $('<img src="' + base64String + '" class="img-thumbnail border-dark p-2 h-100 w-100" >');
      var deleteBtn = $(
        '<button type="button" class="btn btn-danger position-absolute top-0 end-0 delete-btn">&times;</button>');

      // Add a click event listener to the delete button
      deleteBtn.on('click', function() {
        // Remove the parent div of the delete button (which is the image container)
        $(this).parent().remove();
      });

      // Append the image and delete button to the new div
      newDiv.append(newImg);
      newDiv.append(deleteBtn);

      // Append the new div to the imagePreview container
      $('#imagePreview').append(newDiv);

      // Resize the image
      var img = new Image();
      img.onload = function() {
        // Create a canvas element and draw the image on it
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');

        // Calculate the new width and height while maintaining aspect ratio
        var width = img.width;
        var height = img.height;
        var aspectRatio = width / height;
        if (width > 800) {
          width = 800;
          height = width / aspectRatio;
        }
        if (height > 600) {
          height = 600;
          width = height * aspectRatio;
        }

        // Set the canvas size to the new width and height
        canvas.width = width;
        canvas.height = height;

        // Draw the image on the canvas with the new size
        ctx.drawImage(img, 0, 0, width, height);

        // Convert the canvas to a data URL with a specified compression level
        var dataUrl = canvas.toDataURL('image/jpeg', 0.9); // set the compression level here

        // Update the img element's src attribute with the compressed data URL
        newImg.attr('src', dataUrl);
      };
      img.src = base64String;
    };
    reader.readAsDataURL(file);
    return reader.result;
  }
</script>

<script type="text/javascript">
  // Get all the X button elements
  var deleteBtns = document.querySelectorAll('.delete-btn');

  // Loop through each X button and add a click event listener
  deleteBtns.forEach(function(deleteBtn) {
    deleteBtn.addEventListener('click', function() {
      // Get the parent element of the X button (i.e., the div containing the image and the button)
      var parent = this.parentElement;

      // Remove the parent element
      parent.remove();
    });
  });


  //Get ulr set to txt_url
  var images = document.querySelectorAll('#imagePreview img');
  var srcString = '';
  for (var i = 0; i < images.length; i++) {
    srcString += images[i].src + '|';
  }
  // Set the value of the input text field to the concatenated string
  document.getElementById('id_txturl').value = srcString;
</script>



<!-- END: main -->