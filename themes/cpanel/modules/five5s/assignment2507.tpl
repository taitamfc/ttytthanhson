<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />

<!--        https://cdnjs.com/libraries/moment.js/-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<!--        https://cdnjs.com/libraries/bootstrap-datetimepicker-->
<link type="text/css" rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
<script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
</script>

<!-- BEGIN: main -->

<head>
  <title> BÁO CÁO SỰ CỐ Y KHOA </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
  </script>

  <style>
    /* Custom style for the radio button */
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

    /* Custom style for the radio label */
    label {
      font-size: 1.5rem;
      /* You can adjust the font size as needed */
      margin-left: 5px;
      /* Optional: Add some spacing between the radio button and the label */
    }

    .modal-header {
      background-color: #28a639;
      padding: 16px 16px;
      color: #FFF;
      border-bottom: 2px dashed #337AB7;
    }
  </style>
</head>




<div class="pcoded-inner-content" id="demo1">
  <div class="main-body">
    <!-- Page-header start -->
    <!-- Page-header end -->

    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">
        <div class="card-block">

          <div class="container" id="alertcont" style="">
            <h4> Full Screen Modal function </h4>
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target=".popupModal">
              Open modal function
            </button>
          </div>

          <!-- BEGIN: NHOMCAUHOI -->
          <!-- Modal -->

          <div class="modal popupModal fade" id="modal{NHOMCAUHOI.stt}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
              <!-- Add 'modal-fullscreen-md-down' class to make it fullscreen on mobile -->
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">{NHOMCAUHOI.stt}. {NHOMCAUHOI.tennhom}</h3>

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <div class="mb-4">
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
                    data-bs-toggle="modal" data-bs-target="#modal{NHOMCAUHOI.stt1}"
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




    </div>
  </div>


  <!-- Bootstrap JS -->




<!-- END: main -->