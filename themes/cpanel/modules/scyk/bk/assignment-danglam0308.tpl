Lưu ý function trong file js chứa cache
Ta phải đổi tên file js , sau đó đổi tên đường dẫn đến file script .../
<script <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css rel="
  stylesheet" />
themes icon:
<i class="icofont icofont-check-circled"></i>
<i class="icofont icofont-paper-plane"></i>
<i class="fa fa fa-user fa-fw" aria-hidden="true"></i>
<i class="fa fa-sign-out" aria-hidden="true"></i>
<i class="fa fa fa-cog" aria-hidden="true"></i>
<i class="icofont icofont-printer"></i>
<i class="icofont icofont-location-arrow"></i>
<i class="icofont icofont-id-card"></i>
<i class="fa fa-file-text-o"></i>
<i class="fa fa-edit"></i>
<i class="fa fa-trash"></i>
<i class="fa fa-floppy-o" aria-hidden="true"></i>

<!-- BEGIN: main -->

<head>
  <title> BÁO CÁO SỰ CỐ Y KHOA </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale = 1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
  </script>

  <link href="{THEME_URL}/assets/css/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

  <script src="{THEME_URL}/assets/js/bootstrap/js/bootstrap-datetimepicker.min.js">
  </script>

  <!-- Languages -->

  <script src="{THEME_URL}/assets/js/bootstrap/js/locales/bootstrap-datetimepicker.vi.js"></script>

  <script src="{THEME_URL}/js/my_scyk.js"></script>






  <style>

  .modal-content {
    border-radius: 10px; /* You can adjust the value to change the border radius */
  }
    .icon-btn a {
      border-radius: 50%;
    }

    .modal {
      /* bug fix - no overlay */
      display: none;
    }

    .modal-header {
      border-radius: 10px;
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
  //document.getElementById("btn1").click();
  let activeButton = 1; // Set the initial active button to 1

  function changeButtonColor(step) {
    //alert ('btn='+step);


    var btn = document.querySelector('#btn' + step);
    btn.style.backgroundColor = 'blue';
    btn.style.color = 'white';
    activeButton++; // Move to the next active button
    enableNextButton(step);


  }

  function enableNextButton(step) {
    const buttons = document.querySelectorAll('.btn-step');
    buttons.forEach((button, index) => {
      const buttonId = parseInt(button.id.replace('btn', ''));
      button.disabled = buttonId > activeButton;
    });
  }
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
                  onclick="openModal('#modal{NHOMCAUHOI.stt}'); changeButtonColor({NHOMCAUHOI.stt});">
                  {NHOMCAUHOI.stt}
                </button>
                <!-- END: DS -->

              </div>
              <div id="tooltip-container"></div>




            </div>


          </tr>



          </tbody>
          </table>


          <!-- Tooltips on textbox card end -->

          <!-- Page-header start -->
          <!-- Page-header end -->

        </div>

      </div>


      <form class="md-float-material" action="{link_frm}" method="post" id="myform">
        <input type="hidden" id="sta" name="sta" value="checksubmit" />
        <input type="hidden" id="id_dept" name="txt_dept" value="testdept" />

        <!-- BEGIN: NHOMCAUHOI -->
        <!-- Modal -->
        <div class="table-responsive" style="padding-bottom: 100px;">
          <div class="modal fade" id="modal{NHOMCAUHOI.stt}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-keyboard="false" data-backdrop="static">

            <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down">
              <!-- Add 'modal-fullscreen-md-down' class to make it fullscreen on mobile -->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="NCH{NHOMCAUHOI.stt}">{NHOMCAUHOI.stt}.
                    {NHOMCAUHOI.tennhom}{NHOMCAUHOI.ask}
                  </h4>
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

                  <button {hienthi2} type="button" class="btn btn-success "
                    onclick="premodal('#modal{NHOMCAUHOI.stt}', '#modal{NHOMCAUHOI.stt0}')">
                    <div class="d-flex align-items-center">
                      <i class="fas fa-chevron-circle-left mr-1 ml-1"></i>
                      Quay lại
                    </div>


                  </button>
                  {HIENTHI}



                  <button {hiennut} type="button" class="btn btn-primary " id="nextbutton{NHOMCAUHOI.stt}"
                    onclick="showNextModal('#modal{NHOMCAUHOI.stt}', '#modal{NHOMCAUHOI.stt1}','{NHOMCAUHOI.stt1}')">Tiếp
                    theo
                    <i class="fas fa-chevron-circle-right"></i>


                  </button>


                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- end modal -->

        <!-- END: NHOMCAUHOI -->

      </form>



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
          </form>
          <!--end form4 -->
        </div>

      </div>
    </div>
  </div>


  <div id="server-results">
    <!-- For server results -->
  </div>


</div> <!-- end modal -->




<script>
  // Function to check if an element is empty
  function isEmpty(elem) {
    var value = elem.val();
    // Check if the value is null or empty
    return value === null || value.trim() === '';

  }

  // Function to check if at least one radio button in a group is selected
  function isRadioGroupSelected(groupName) {
    return $("input[name='" + groupName + "']:checked").length > 0;
  }

  // Function to check if at least one checkbox in a group is selected
  function isCheckboxGroupSelected(groupName) {
    return $("input[name='" + groupName + "']:checked").length > 0;
  }

  // Function to show the next modal based on the current modal and next modal IDs
  function showNextModal(currentModal, nextModal, step) {
    var currentModalInputs = $(currentModal + " input, " + currentModal + " textarea, " + currentModal + " select");
    var hasEmptyInput = false;

    currentModalInputs.each(function() {
      var inputType = $(this).attr("type");
      var tagName = $(this).prop("tagName").toLowerCase();

      // Check different input types and textarea
      if ((tagName === 'input' && inputType === 'text') ||
        tagName === 'textarea' || tagName === 'select') {
        if (isEmpty($(this))) {
          hasEmptyInput = true;
          return false; // Exit the loop early if an empty input is found
        }
      } else if (inputType === 'radio') {
        var groupName = $(this).attr('name');
        if (!isRadioGroupSelected(groupName)) {
          hasEmptyInput = true;
          return false; // Exit the loop early if no radio button is selected in the group
        }
      } else if (inputType === 'checkbox') {
        var groupName = $(this).attr('name');
        if (!isCheckboxGroupSelected(groupName)) {
          hasEmptyInput = true;
          return false; // Exit the loop early if no checkbox is selected in the group
        }
      }
    });

    // If any input in the current modal is empty, show an alert and prevent the next modal from being shown
    switch (currentModal) {
      case '#modal1':
        //kiểm tra nút check camkết
        var isChecked = $("#idcheck2").prop('checked');
        if (isChecked) {
          $(currentModal).modal("hide");
          $(nextModal).modal("show");
          changeButtonColor('2');
        } else {
          alert("Bạn chưa đồng ý cam kết! ");
        }

        break;

      case '#modal2':
        //check hình thức báo cáo


        var isChecked = $("#idradiog4").prop("checked") || $("#idradiog3").prop("checked");
        if (isChecked) {
          $(currentModal).modal("hide");
          $(nextModal).modal("show");
          changeButtonColor(step);

        } else {
          alert("Vui lòng điền đầy đủ các dữ liệu, không được để trống!");
        }

        break;


      case '#modal18':
        //alert("Modal ID=: " + modalidvalue);
        //kiểm tra nút chọn thông tin đối tượng khác thì cho hiển thị modal19
        var isChecked = $("#idradiog44").prop('checked');
        if (isChecked) {
          $(currentModal).modal("hide");
          $(nextModal).modal("show");
        } else {
          //hiển thị bỏ wa modal19, hiển thị modal20
          $('#modal20').modal('show');
          $(currentModal).modal("hide");
        }

        break;


      case '#modal20':
        changeButtonColor(step);
        //alert(currentModal);
        $(currentModal).modal("hide");
        $(nextModal).modal("show");
        break;

      case '#modal21':
        changeButtonColor(step);
        //alert(currentModal);
        $(currentModal).modal("hide");
        $(nextModal).modal("show");
        break;




      default:

        var isChecked = $("#idradiog4").prop("checked");
        if (isChecked) {
          //alert(isChecked);
          if (hasEmptyInput) {
            alert("Vui lòng điền đầy đủ các dữ liệu, không được để trống!");
            break;
          } else {
            // Show the next modal if all inputs are filled

          }
        }

        changeButtonColor(step);
        //alert(currentModal);
        $(currentModal).modal("hide");
        $(nextModal).modal("show");


        break;
    }

  }
</script>




<script>
  function clicknext(a) {
    changeButtonColor(a);

    //alert ('tieptheo='+a);
  }
</script>

<script>
  //submit ok
  $("#myform").submit(function(event) {

    event.preventDefault(); //prevent default action 
    var isChecked = $("#idcheck48").prop('checked');
    if (!isChecked) {
      alert("Bạn chưa đồng ý xác nhận thông tin! ");
      return false;
    }

    if (confirm(thongbao)) {


      var post_url = $(this).attr("action"); //get form action url
      var request_method = $(this).attr("method"); //get form GET/POST method
      var form_data = $(this).serialize(); //Encode form elements for submission

      var frm = $('#myform');
      //alert(form_data);

      $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        dataType: 'json',
        success: function(data) {
          //alert ( JSON.parse(data));
          //alert(data);
          console.log('Submission was successful.');
          console.log(data);

          $('#modal-tb').modal('show');
          setTimeout(function() {location.reload();}, 5000);     
        },
        error: function(data) {
          console.log('An error occurred.');
          console.log(data);
        }
      });
    }

  });
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

  function handleNextButtonClick() {
    // Add your logic for what should happen when the next button is clicked
    console.log('Next button clicked!');
    // Replace the console.log with your desired actions
  }


  function handleTdClick(tdElement) {
    // Find the radio input within the same row (td's parent)
    const radioInput = tdElement.parentNode.querySelector('input[type="radio"]');
    if (radioInput) {
      // Trigger a click event on the radio input
      radioInput.click();
    }

    alert('Radio name: ' + radioInput.name);
  }
</script>


<script>
  // Get the submit button and notification element
  const submitBtn = document.getElementById('modal_submit');
  const notification = document.getElementById('notification');

  // Add event listener to the submit button
  //submitBtn.addEventListener('click', function() {
  // Show the notification
  //alert("Chúc mừng bạn đã gửi báo cáo thành công !")

  //});
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
</script>






<script>
  function close_modal() {
    $('#modal-tb').modal('toggle');
    window.location.reload();


  }

  function nextmodal2(modalid) {
    var modalidvalue = $(modalid).attr('id');
    alert("Modal ID: " + modalidvalue);
  }

  function openform(e) {
    e.preventDefault();
    alert($('form.modalform').serialize());
    $.ajax({
      type: "POST",
      url: "{link_frm}",
      data: $('form.modalform').serialize(),
      success: function(response) {
        console.log(response);
        alert(response['response']);
      },
      error: function() {
        alert('Error');
      }
    });
    return false;
  }
</script>




<script>
  $(document).ready(function() {
    //$('#modal1').modal('toggle');
    //$('#btn1').click();
    $('#modal1').modal('show');
    changeButtonColor('1');


  });

  //$(document).off('focusin.modal');

  function openModal(currentModal) {
    //$(previousModal).modal('hide');
    $('.modal').modal('hide');


    $(currentModal).modal({

      backdrop: 'static', // Show static backdrop
      keyboard: false // Disable keyboard interaction
    });

    $(currentModal).modal('show');
    $(currentModal).on('shown.bs.modal', function(e) {
      $(document).off('focusin.modal');
    })
  }

  function nextmodal(targetmodal, nextmodal, step) {
    $(nextmodal).modal({

      backdrop: 'static', // Show static backdrop
      keyboard: false // Disable keyboard interaction
    });

    var modalidvalue = $(targetmodal).attr('id');
    //alert("Modal ID=: " + modalidvalue);

    switch (modalidvalue) {
      case 'modal1':
        //alert("Modal ID=: " + modalidvalue);
        //kiểm tra nút check camkết
        var isChecked = $("#idcheck2").prop('checked');
        if (isChecked) {
          $(nextmodal).modal('toggle');
          $(targetmodal).modal('toggle');
          changeButtonColor('2');
        } else {
          alert("Bạn chưa đồng ý cam kết! ");
        }

        // code block
        break;

      case 'modal2':
        //check hình thức báo cáo
        $(nextmodal).modal('toggle');
        $(targetmodal).modal('toggle');


        var isChecked = $("#idradiog4").prop("checked");
        if (isChecked) {
          alert(isChecked);
        }

        break;


      case 'modal18':
        //alert("Modal ID=: " + modalidvalue);
        //kiểm tra nút chọn thông tin đối tượng khác thì cho hiển thị modal19
        var isChecked = $("#idradiog44").prop('checked');
        if (isChecked) {
          $(nextmodal).modal('toggle');
          $(targetmodal).modal('toggle');
        } else {
          //hiển thị bỏ wa modal19, hiển thị modal20
          $('#modal20').modal('toggle');
          $(targetmodal).modal('toggle');
        }

        break;

      default:
        $(nextmodal).modal('toggle');
        $(targetmodal).modal('toggle');
        //alert (step);
        clicknext(step);
        break;
        // code block
    }

  }

  function premodal(targetmodal, premodal) {
    var modalidvalue = $(targetmodal).attr('id');
    //alert("Modal ID=: " + modalidvalue);

    switch (modalidvalue) {

      case 'modal1':
        return false;
        break;

      case 'modal20':
        //alert("Modal ID=: " + modalidvalue);
        //kiểm tra nút chọn thông tin đối tượng khác thì cho hiển thị modal19
        var isChecked = $("#idradiog44").prop('checked');
        if (isChecked) {
          $(premodal).modal('toggle');
          $(targetmodal).modal('toggle');
        } else {
          //hiển thị bỏ wa modal19, hiển thị modal18
          $('#modal18').modal('toggle');
          $(targetmodal).modal('toggle');
        }
        break;


      default:
        $(premodal).modal('toggle');
        $(targetmodal).modal('toggle');
        break;
        // code block
    }



  }
</script>

<script>
  function send_report(a) {

    var isChecked = $("#idcheck48").prop('checked');
    if (!isChecked) {
      alert("Bạn chưa đồng ý xác nhận thông tin! ");
      return false;
    } else {
      $('#modal-tb').modal('show');
      //return false;

      setTimeout(function() {$('#modal-tb').modal('hide');}, 5000); 

    }



    if (confirm(thongbao)) {

      //$('#modal-tb').modal('show');

      //setTimeout(function() {$('#modal-tb').modal('hide');}, 5000); 



      //a.preventDefault();
      //note ghi chu de show debug
      //check form submit
      //var a = $('#myform');
      var c = [];
      c.type = $(a).prop("method");
      c.url = $(a).prop("action");
      c.data = $(a).serialize();
      $(a).find("input,button,select,textarea, a").removeClass("has-error");
      $(a).find("input,button,select,textarea, a").prop("disabled", !0);
      //alert (c.url);
      //show modal thanh cong


      $.ajax({
        url: c.url,
        cache: !1,
        type: "POST",
        url: urlfrm,
        //data: { "addRow": c.data }
        data: c.data,
        type: c.type,
        dataType: 'json',
        success: function(result) {
          //alert(result); // You should remove quotes to show the actual result value

        },
        error: function(xhr, textStatus, errorThrown) {
          // Handle error, if needed
          alert("Error occurred during AJAX request.");
          $(a).find("input, button, select, textarea, a").prop("disabled", false);
        }
      });

    }
    return !1;
  }
</script>


<script>
  function submit_report(a) {
    var isChecked = $("#idcheck48").prop('checked');
    if (!isChecked) {
      alert("Bạn chưa đồng ý xác nhận thông tin! ");
      return false;
    }


    if (confirm(thongbao)) {
      //a.preventDefault();

      var url ="{link_frm}";
      //var frmdata = $("#myform").serialize();
      var frmdata = $('#myform2').serialize();
      alert(frmdata);
      $.ajax({
        type: 'post',
        cache: !1,
        url: url + '&act=submit_report',
        data :{'formdata': frmdata},
        dataType: "text",
        success: function(d) {
          //var label = JSON.parse(d)[0].label; if res = [{"label":"Test Submit_report","value":"1"}] //array json
          //var label = JSON.parse(d).label; if res = {"label":"Test Submit_report","value":"1"}  //json     
          var status = JSON.parse(d).status;
          if (status == "ok") {
            //hien thị thông báo thành công
            //alert ('ok');
            $('#modal-tb').modal('show');
            setTimeout(function() {location.reload();}, 3000);         

          } else {
            alert("Đã có lỗi xảy ra, Bạn hãy thử gửi lại báo cáo.");
          }


        },

        error: function(xhr, textStatus, errorThrown) {
          // Handle error, if needed
          alert("Đã có lỗi xảy ra, Bạn hãy thử gửi lại báo cáo.");
        }

      });
    }
  }
</script>


<!-- END: main -->