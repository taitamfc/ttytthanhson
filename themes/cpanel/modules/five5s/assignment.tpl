<!-- BEGIN: main -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
<!--        https://cdnjs.com/libraries/moment.js/-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<!--        https://cdnjs.com/libraries/bootstrap-datetimepicker-->
<link type="text/css" rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
<script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
</script>
<style>
  .icon-btn a {
    border-radius: 50%;
  }

  .modal-header {
    background-color: #11be28;
    padding: 16px 16px;
    color: #FFF;
    border-bottom: 2px dashed #337AB7;
  }

  .modal-dialog {
    margin-top: 80px;
    top: 80px;
    max-width:600px !important;
    max-height:800px !important;
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
  }</style>


<div class="pcoded-inner-content" id="demo1">
  <div class="main-body">
    <!-- Page-header start -->
    <!-- Page-header end -->
    
    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">
        <div class="card-block">



          <form  class="md-float-material" action="{link_frm}" method="post"
            id="myform">
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
    <div class="modal fade" id="modal{NHOMCAUHOI.stt}" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">

      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{NHOMCAUHOI.stt}. {NHOMCAUHOI.tennhom}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table id="myTable" class="table table-hover" style="width:100%">
              <!-- BEGIN: CAUHOI -->
              <tr>

                {CAUHOI.td1}

                {CAUHOI.form_control}

                {CAUHOI.td2}


              </tr>
              <!-- END: CAUHOI -->
            </table>


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
    <!-- END: NHOMCAUHOI -->

    </form>

  </div>
</div>

<script>
function handleRadioChange(event) {
            const nextButtonId = event.target.dataset.nextButton;
            if (nextButtonId) {
                const nextButton = document.querySelector(nextButtonId);
                nextButton.click();
            }
        }
</script>


    <script>
        // Get the submit button and notification element
        const submitBtn = document.getElementById('modal_submit');
        const notification = document.getElementById('notification');

        // Add event listener to the submit button
        submitBtn.addEventListener('click', function () {
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
      format: "YYYY-MM-DD"
    });

    /* setting time */
    $("#timepicker").datetimepicker({
      format: "HH:mm:ss"
    });

    /* setting datetime */
    $("#datetimepicker").datetimepicker({
      format: "YYYY-MM-DD HH:mm:ss"
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