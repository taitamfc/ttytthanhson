<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />

<!-- BEGIN: main -->




        


<!--        https://cdnjs.com/libraries/moment.js/-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>        

<!--        https://cdnjs.com/libraries/bootstrap-datetimepicker-->
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<!-- Bootstrap CSS -->

<style>
  /*
  .modal-content {
    /* 80% of window height 
    height: 80%;
    background-color: #BBD6EC;
  }
*/
  .modal-header {
    background-color: #11be28;
    padding: 16px 16px;
    color: #FFF;
    border-bottom: 2px dashed #337AB7;
  }

  .modal-dialog {
    margin-top: 100px;
    top: 100px;
  }

  .btn-circle.btn-sm {

    align-items: center;
    margin-right: 5px;
    width: 15px;
    height: 15px;
    padding: 3px 0px;
    border-radius: 10px;
    font-size: 0px;
    text-align: center;
  }

  @import url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css");

  .fade-scale {
    transform: scale(0);
    opacity: 0;
    -webkit-transition: all .25s linear;
    -o-transition: all .25s linear;
    transition: all .25s linear;
  }

  .fade-scale.in {
    opacity: 1;
    transform: scale(1);
  }

  .modal-footer {
    display: flex;
    justify-content: space-between;
  }

  input[type="radio"] {
    /* remove standard background appearance */

    /* create custom radiobutton appearance */
    display: inline-block;
    width: 30px;
    height: 30px;
    padding: 4px;
    margin-right: 15px;

    /* background-color only for content */
    /* optional styles, I'm using this for centering radiobuttons */
    .flex {
      display: flex;
      align-items: center;
    }
  }
</style>

<div class="pcoded-inner-content">
  <div class="main-body">
    <!-- Page-header start -->
    <!-- Page-header end -->
    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">
        <h5 class="text-center modal-title">BÁO CÁO SỰ CỐ Y KHOA</h5>
        <div class="card-header">
          <form class="md-float-material modalform" action="{link_frm}" method="post" id="myform"
            onsubmit="return openform(this);">

            <!-- BEGIN: DS -->
            <button type="button" class="btn btn-outline-success btn-circle btn-sm font-weight-bold"
              data-toggle="tooltip" data-placement="bottom" title="{NHOMCAUHOI.tennhom}"
              onclick="openModal('#modal{NHOMCAUHOI.stt}')">
              {NHOMCAUHOI.stt}
            </button>
            <!-- END: DS -->
        </div>

        


        <!-- Tooltips on textbox card end -->
      </div>
      <button type="submit" class="btn btn-success " id="modal_submit" name="submit_button">Finish</button>
    </div>


    <!-- Click on Modal Button -->


    <!-- BEGIN: NHOMCAUHOI -->
    <!-- Modal -->
    <div class="modal fade" id="modal{NHOMCAUHOI.stt}" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">

      <div class="modal-dialog modal-notify modal-lg modal-warning" role="document">
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

              <button type="button" class="btn btn-primary "
                onclick="nextmodal('#modal{NHOMCAUHOI.stt}', '#modal{NHOMCAUHOI.stt1}')">Next</button>
              <button type="button" class="btn btn-success "
                onclick="nextmodal('#modal{NHOMCAUHOI.stt}', '#modal{NHOMCAUHOI.stt0}')">Previous</button>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- END: NHOMCAUHOI -->

    </form>

  </div>
</div>
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
  var modalIndex = 1; // Current modal index (starts at 1)

  function navigateModal(direction) {
    var currentModal = $('#modal' + modalIndex);
    currentModal.modal('toggle'); // Hide the current modal

    modalIndex += direction; // Update the modal index

    // Wrap around to the first modal if reached the end
    if (modalIndex <= 0) {
      modalIndex = $('.modal').length;
    } else if (modalIndex > $('.modal').length) {
      modalIndex = 1;
    }

    var nextModal = $('#modal' + modalIndex);
    nextModal.modal('toggle'); // Show the next modal
  }
</script>

<!-- END: main -->