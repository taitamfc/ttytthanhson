<!-- BEGIN: main -->

<head>
  <title> BÁO CÁO SỰ CỐ Y KHOA </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
  </script>

  <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  

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


  <div class="pcoded-inner-content" id="demo1">
    <div class="main-body">
      <!-- Page-header start -->
      <!-- Page-header end -->
      

      <input type="date" class="form-control" name="date-field" />

      <div class="col-sm-12">
        <!-- Tooltips on textbox card start -->
        <div class="card">
          <div class="card-block">

            

          <input id="datepicker" width="276" />
          <script>
              $('#datepicker').datepicker({
                  uiLibrary: 'bootstrap5'
              });
          </script>



          <form class="md-float-material" action="{link_frm}" method="post" id="myform">
            <input type="hidden" id="id_count" name="txt_count" value="{action}" />
            <input type="hidden" id="id_dept" name="txt_dept" value="" />
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
                  <button type="button" class="btn btn-outline-success btn-circle btn-sm font-weight-bold"
                    data-toggle="tooltip" data-placement="bottom" title="{NHOMCAUHOI.tennhom}"
                    onclick="openModal('#modal{NHOMCAUHOI.stt}')">
                    {NHOMCAUHOI.stt}
                  </button>
                  <!-- END: DS -->

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


    

    <!-- BEGIN: NHOMCAUHOI -->
    <!-- Modal -->
    <div class="table-responsive" style="padding-bottom: 100px;">
      <div class="modal fade" id="modal{NHOMCAUHOI.stt}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down">
          <!-- Add 'modal-fullscreen-md-down' class to make it fullscreen on mobile -->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{NHOMCAUHOI.stt}. {NHOMCAUHOI.tennhom}</h5>
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

              <button {hiennut} type="button" class="btn btn-primary " id="nextbutton{NHOMCAUHOI.stt}"
                onclick="nextmodal('#modal{NHOMCAUHOI.stt}', '#modal{NHOMCAUHOI.stt1}')">Tiếp theo</button>
              <button type="button" class="btn btn-success "
                onclick="nextmodal('#modal{NHOMCAUHOI.stt}', '#modal{NHOMCAUHOI.stt0}')">Quay lại</button>
              {HIENTHI}

            
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->
  </div>
  <!-- END: NHOMCAUHOI -->

  </form>

  

  </div>
  </div>

  <script>
    function handleRadioChangetest(event) {
      const nextButtonId = event.target.dataset.nextButton;
      if (nextButtonId) {
        const nextButton = document.querySelector(nextButtonId);
        nextButton.click();
      }
    }


    function handleRadioChange2(event) {
      // Add your logic here to handle radio button change event
      console.log("Radio button value: " + event.target.value);
      // You can access the selected value with event.target.value and perform actions accordingly
    }

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


    function handleDivClick2(event) {
      // Get the input element (radio) inside the div
      const inputElement = event.currentTarget.querySelector('input');

      // Trigger a click event on the input (radio) element
      if (inputElement) {
        inputElement.click();

        // Show an alert with the value of the input element
        const inputValue = inputElement.value;
        alert('Clicked input value: ' + inputValue);
      }

     
    }

    function handleDivClick3(clickedDiv) {
    // Find the input element within the clicked div
    const radioInput = clickedDiv.querySelector('input[type="radio"]');
    if (radioInput) {
      // Access the name attribute of the radio input and alert it
      alert('Radio name: ' + radioInput.name);
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
    submitBtn.addEventListener('click', function() {
      // Show the notification
      alert("Chúc mừng bạn đã gửi báo cáo thành công !")

    });
  </script>
  <!-- Bootstrap JS -->
  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>


  <script>
    $(function() {

      /* setting date */
      $("#datepicker").datetimepicker({
        format: "DD-MM-YYYY"
      });

      /* setting time */
      $("#timepicker").datetimepicker({
        format: "HH:mm:ss"
      });

      /* setting datetime */
      $("#datetimepicker").datetimepicker({
        format: "DD-MM-YYYY HH:mm:ss"
      });

      /* range */
      $(".input-daterange").datetimepicker({
        format: "YYYY-MM-DD"
      });

    });
  </script>

  <script>
    /*
  $(function() {

    $('#modal_submit2').on('click', function(e) {
      alert ("ok");
      //e.preventDefault();
      alert ($('form.modalform').serialize());
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
    });
    });
    */

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
      $('#modal1').modal('toggle');
    });

    $(document).off('focusin.modal');

    function openModal(currentModal) {
      //$(previousModal).modal('hide');
      $(currentModal).modal('toggle');
    }

    function nextmodal(targetmodal, nextmodal) {
      $(nextmodal).modal('show');
      $(targetmodal).modal('hide');
    }

    function premodal(targetmodal, premodal) {
      $(premodal).modal('show');
      $(targetmodal).modal('hide');
    }
  </script>

  <script>
    function nv_execute_scyk(a) {
      if (confirm(thongbao)) {
        var c = [];
        c.type = $(a).prop("method");
        c.url = $(a).prop("action");
        c.data = $(a).serialize();
        $(a).find("input,button,select,textarea, a").removeClass("has-error");
        $(a).find("input,button,select,textarea, a").prop("disabled", !0);
        //alert (c.data);
        $.ajax({

          url: c.url,
          cache: !1,
          data: c.data,
          type: c.type,
          dataType: 'json',
          success: function(result) {
            alert(result);
            if (result.status == "OK") setTimeout(function () { window.location = result.url }, 2000);// setTimeout(function () {window.location =result.url},2000);//window.location =result.url;location.reload();//
            modal(result.mess);
            $(a).find("input,button,select,textarea, a").prop("disabled", !1);


          }
        });
      }
      return !1;
    }
  </script>



<!-- END: main -->