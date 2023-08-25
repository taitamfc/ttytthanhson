<!-- BEGIN: main -->
<!-- assignment 2: THực hiện nhiệm vụ -->
<script src="https://code.jquery.com/jquery.min.js"></script>


<style>
  .icon-btn a {
    border-radius: 50%;
  }

  /*.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}*/

  .btn-circle.btn-sm {
    width: 40px;
    height: 40px;
    padding: 6px 0px;
    border-radius: 20px;
    font-size: 10px;
    text-align: center;
  }


  .modal-dialog {
    margin top: 20px;
    top: 60px;
  }

  @import url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css");

  .fade {
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
  <h6>KHẢO SÁT THÔNG TIN</h6>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">
    Open Modal 1
  </button>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">
    Open Modal 2

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal4">
    Open Modal 4
  </button>
  <h4>Normal Circle Buttons</h4>
  <!-- BEGIN: LOAICAUHOI -->

  <button type="button" class="btn btn-outline-success btn-circle btn-sm font-weight-bold">{LOAICAUHOI}</button>

  <!-- END: LOAICAUHOI -->


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
          <div class="container">



            <!-- Add more buttons for additional modals -->

            <!-- Modals -->
            <div class="modal fade-scale" id="modal1" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal 1 Title</h4>
                  </div>
                  <div class="modal-body">
                    <img src="la.jpg2" alt="Los Angeles">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default" onclick="navigateModal(-1)">Previous</button>
                    <button type="button" class="btn btn-default" onclick="navigateModal(1)">Next</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade-scale" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal 2 Title</h4>
                  </div>
                  <div class="modal-body">
                    <img src="chicago.jpg2" alt="Chicago">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default" onclick="navigateModal(-1)">Previous</button>
                    <button type="button" class="btn btn-default" onclick="navigateModal(1)">Next</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade-scale" id="modal3" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal 3 Title</h4>
                  </div>
                  <div class="modal-body">
                    <img src="chicago.jpg2" alt="Tesst3">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default" onclick="navigateModal(-1)">Previous</button>
                    <button type="button" class="btn btn-default" onclick="navigateModal(1)">Next</button>
                  </div>
                </div>
              </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bootstrap 5 Modal Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                          placeholder="Password" />
                      </div>
                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                      <div class="modal-footer d-block">
                        <p class="float-start">Not yet account <a href="#">Sign Up</a></p>
                        <button type="submit" class="btn btn-warning float-end">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Add more modals here -->

          </div>

        </form>
        <!-- Tooltips on textbox card end -->
      </div>
    </div>

  </div> <!-- Pcode... -->
  <!-- Close for header -->
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