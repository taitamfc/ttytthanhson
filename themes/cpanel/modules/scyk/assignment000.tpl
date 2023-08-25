Lưu ý function trong file js chứa cache
Ta phải đổi tên file js , sau đó đổi tên đường dẫn đến file script .../script
fix treo ios: bỏ thẻ div responsive
<!-- BEGIN: main -->

<head>
  <title> BÁO CÁO SỰ CỐ Y KHOA </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
  </script>

  <link href="{THEME_URL}/assets/css/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

  <script src="{THEME_URL}/assets/js/bootstrap/js/bootstrap-datetimepicker.min.js">
  </script>

  <!-- Languages -->

  <script src="{THEME_URL}/assets/js/bootstrap/js/locales/bootstrap-datetimepicker.vi.js"></script>

  <script src="{THEME_URL}/js/my_scyk.js"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



  <style>
    .icon-btn a {
      border-radius: 50%;
    }

    .modal {
      /* bug fix - no overlay */
      display: none;
    }

    .modal-header {
      background-color: #11be28;
      padding: 16px 16px;
      color: #FFF;
      border-bottom: 2px dashed #337AB7;
    }



    .btn-circle.btn-sm {

      align-items: center;
      margin-right: 5px;
      width: 30px;
      height: 30px;
      padding: 3px 0px;
      border-radius: 15px;
      font-size: 10px;
      text-align: center;
    }

    /* Custom style for the radio label */
    label {
      font-size: 1.4rem;
      /* You can adjust the font size as needed */
      margin-left: 5px;
      /* Optional: Add some spacing between the radio button and the label */
    }

    input[type="radio"] {
      /* remove standard background appearance */

      /* create custom radiobutton appearance */
      display: inline-block;
      width: 30px;
      height: 30px;
      padding: 4px;
      margin-right: 15px;

    }

    input[type="checkbox"] {
      /* remove standard background appearance */

      /* create custom radiobutton appearance */
      display: inline-block;
      width: 30px;
      height: 30px;
      padding: 4px;
    }

    .modal-footer {
      display: flex;
      justify-content: space-between;
    }
  </style>

</head>


<script>

</script>


<div class="pcoded-inner-content" id="demo1">
  <div class="main-body">
    <!-- Page-header start -->
    <!-- Page-header end -->




    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">
        <div class="card-block">




          <input readonly type="hidden" value="28-07-2023 20:52:01 PM" class="default" />




          <div class="">
            <table class="table">
              <thead>

              </thead>
              <tbody>


          </div>


          <tr>

            <div class="card">
              <div class="bg-primary p-10">
                <i class="icofont icofont-paper-plane"></i>
                <strong>BÁO CÁO SỰ CỐ Y KHOA</strong>
              </div>

              <div class="card-block icon-btn ">

                <!-- BEGIN: DS -->
                <button type="button" id="btn{NHOMCAUHOI.stt}"
                  class="btn btn-outline-success btn-circle btn-sm font-weight-bold btn-step" data-placement="bottom"
                  title="{NHOMCAUHOI.tennhom}"
                  onclick="openModal('#modal{NHOMCAUHOI.stt}'); changeButtonColor('{NHOMCAUHOI.stt}');">
                  {NHOMCAUHOI.stt}
                </button>
                <!-- END: DS -->

              </div>
              <div id="tooltip-container"></div>




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



    <form class="md-float-material" action="{link_frm}" method="post" id="testform">
      <input type="hidden" id="sta" name="sta" value="checksubmit" />
      <input type="hidden" id="id_count" name="txt_count" value="{action}" />
      <input type="hidden" id="id_dept" name="txt_dept" value="" />
      <!-- BEGIN: NHOMCAUHOI -->
      <!-- Modal -->

      <div class="modal fade" id="modal{NHOMCAUHOI.stt}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-keyboard="false" data-backdrop="static">

        <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down">
          <!-- Add 'modal-fullscreen-md-down' class to make it fullscreen on mobile -->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="NCH{NHOMCAUHOI.stt}">{NHOMCAUHOI.stt}. {NHOMCAUHOI.tennhom}{NHOMCAUHOI.ask}
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-5">
                <h5 class="text-center">{NHOMCAUHOI.ghichu}</h5>
              </div>
              <table id="myTable{NHOMCAUHOI.stt}" class="table table-hover" style="width:100%">
                <!-- BEGIN: CAUHOI -->
                <tr>

                  {CAUHOI.td1}

                  {CAUHOI.form_control}

                  {CAUHOI.td2}


                </tr>
                <!-- END: CAUHOI -->
              </table>
            </div>


            <div class="modal-footer ">


              <button {hiennut2} type="button" class="btn btn-success "
                onclick="premodal('#modal{NHOMCAUHOI.stt}', '#modal{NHOMCAUHOI.stt0}')">
                <div class="d-flex align-items-center">
                  <i class="fas fa-chevron-circle-left mr-1 ml-1"></i>
                  Quay lại
                </div>


              </button>


              <form id="myForm">
                <!-- Button to trigger the form submission -->
                <button type="button" class="btn btn-success" onclick="Send_Submit()">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-chevron-circle-left mr-1 ml-1"></i>
                    Test submit
                  </div>
                </button>
              </form>

              {HIENTHI}



              <button {hiennut} type="button" class="btn btn-primary " id="nextbutton{NHOMCAUHOI.stt}"
                onclick="showNextModal2('#modal{NHOMCAUHOI.stt}', '#modal{NHOMCAUHOI.stt1}','{NHOMCAUHOI.stt1}')">Tiếp
                theo
                <i class="fas fa-chevron-circle-right"></i>


              </button>



            </div>

          </div>
        </div>
      </div>
    </form>
    <!-- end modal -->
  </div>
  <!-- END: NHOMCAUHOI -->





</div>
</div>


<!-- Modal start -->

<!-- Modal -->
<div class="modal fade" id="modal-tb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">THÔNG BÁO TỪ CHƯƠNG TRÌNH</h5>

      </div>
      <div class="modal-body">
        <h6>
          Cảm ơn bạn đã gửi báo cáo về sự cố y khoa. </br>
          Trường hợp khẩn cấp hãy liên ngay số hotline: 1800 888 668 để được hỗ
          trợ.</br>
          Mã số sự cố y khoa của bạn là: <span style="color: red">{MABC}</span></br>
          Chúng tôi sẽ liên hệ lại với bạn sớm nhất có thể!
        </h6>

      </div>

      <div class="modal-footer ">

        <div class="card-header-right">

          <button type="button" class="btn btn-out-dashed btn-danger btn-square" onclick="close_modal();">
            Đóng
          </button>

        </div>

        <!--end form4 -->
      </div>

    </div>
  </div>
</div>
</div> <!-- end modal -->


<script>
  function Send_Submit() {
    // Manually submit the form
    var form = document.getElementById("testform");
    var formData = new FormData(form);
    event.preventDefault();
    //var isChecked = $("#idcheck48").prop('checked');
    //if (!isChecked) {
      //alert("Bạn chưa đồng ý xác nhận thông tin! ");
      //return false;
    //} 

    if (confirm(thongbao)) {

      $('#modal-tb').modal('show');
      setTimeout(function() {
        
        form.submit();}, 5000);


      
    }
    //form.submit();
  }
  
</script>


<script>
  function handleRadioChange(event) {
    // Check if the radio button is checked
    if (event.target.checked) {
      // Get the data-next-button attribute value
      //alert('Radio button value: " + event.target.value');
      const nextButtonSelector = event.target.getAttribute('data-next-button');

      // Find the next button using the selector
      const nextButton = document.querySelector(nextButtonSelector);

      // Trigger a click event on the next button
      if (nextButton) {
        nextButton.click();
      }

      const radioValue = event.target.value; // Get the value of the checked radio button
      //alert('Selected radio value: ' + radioValue);
    }
  }








  function handleLabelClick(event) {
    // Get the input element inside the label
    const inputElement = event.currentTarget.querySelector('input');

    // Trigger a click event on the input (radio) element
    if (inputElement) {
      inputElement.click();
    }

    alert('label JavaScript triggered');
  }
</script>



<!-- Bootstrap JS -->
<script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>

<script>
  //test



  //const currentDate = new Date();
  $('.default').datetimepicker({

    container: 'body',
    language: 'vi',
    // RTL mode
    rtl: true,
    minuteStep: 1,
    pickerPosition: 'bottom-right',
    // enable meridian views for day and hour views    
    showMeridian: true,
    format: 'dd/mm/yyyy - hh:ii:ss P',
    weekStart: 0,
    daysOfWeekDisabled: [],
    autoclose: true,

    // 0 or 'hour' for the hour view

    // 1 or 'day' for the day view

    // 2 or 'month' for month view (the default)

    // 3 or 'year' for the 12-month overview

    // 4 or 'decade' for the 10-year overview.

    // attributes: data-start-view

    startView: 2,
    minView: 0,
    maxView: 3,

    // select the view from which the date will be selected

    // 'decade', 'year', 'month', 'day', 'hour'

    // attributes: data-view-select

    viewSelect: 0,
    todayBtn: true,
    todayHighlight: true,
    forceParse: true

  });


  //ngay sinh
  $('#datepicker').datetimepicker({
    language: 'vi',
    format: 'dd/mm/yyyy',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: true,
    showMeridian: 1
  });

  //ngay bao cao
  $('#datetimepicker').datetimepicker({
    // format: "dd/mm/yyyy - hh:ii:ss P",
    container: 'body',
    language: 'vi',
    // RTL mode
    rtl: true,
    minuteStep: 1,
    pickerPosition: 'bottom-right',
    // enable meridian views for day and hour views    
    showMeridian: true,
    format: 'dd/mm/yyyy - hh:ii:ss P',
    weekStart: 0,
    daysOfWeekDisabled: [],
    autoclose: true,
    startView: 2,
    minView: 0,
    maxView: 3,
    viewSelect: 0,
    todayBtn: true,
    todayHighlight: true,
    forceParse: true
  });

  // Set the default date to today
  var today = new Date();
  $('#datetimepicker').datetimepicker('setDate', today);
</script>






<script>
  function close_modal() {
    $('#modal-tb').modal('toggle');
    window.location.reload();


  }
</script>



<script>
  $(document).ready(function() {
    //$('#modal1').modal('toggle');
    //$('#modal1').appendTo($('body')).modal('show');
    $('#modal1').appendTo("body").modal('show');
    //$('#modal1').modal('show');
  });

  $(document).off('focusin.modal');

  function openModal(currentModal) {
    //$(previousModal).modal('hide');

    $(currentModal).modal({

      backdrop: 'static', // Show static backdrop
      keyboard: false // Disable keyboard interaction
    });



    //$(currentModal).modal('toggle');
  }



  function premodal(targetmodal, premodal) {
    var modalidvalue = $(targetmodal).attr('id');
    //alert("Modal ID=: " + modalidvalue);

    switch (modalidvalue) {

      case 'modal20':
        //alert("Modal ID=: " + modalidvalue);
        //kiểm tra nút chọn thông tin đối tượng khác thì cho hiển thị modal19
        var isChecked = $("#idradiog44").prop('checked');
        if (isChecked) {
          $(premodal).modal('show');
          $(targetmodal).modal('hide');
        } else {
          //hiển thị bỏ wa modal19, hiển thị modal18
          $('#modal18').modal('show');
          $(targetmodal).modal('hide');
        }
        break;


      default:
        $(premodal).modal('show');
        $(targetmodal).modal('hide');
        break;
        // code block
    }



  }
</script>




<!-- END: main -->