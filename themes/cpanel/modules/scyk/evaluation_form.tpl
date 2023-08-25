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
     max-width: 600px !important;
     max-height: 800px !important;
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



   th:first-child {
     border-left: 1px solid #dddddd;
   }

   th,
   td {
     border-top: 1px solid #dddddd;
     border-bottom: 1px solid #dddddd;
     border-right: 1px solid #dddddd;
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


 <div class="pcoded-inner-content" id="demo1">
   <div class="main-body">
     <!-- Page-header start -->
     <!-- Page-header end -->

     <div class="col-sm-12">
       <!-- Tooltips on textbox card start -->
       <div class="card">
         <div class="card-block">



           <form class="md-float-material" action="{link_frm}" method="post" id="myform">
             <input type="hidden" id="id_count" name="txt_count" value="{action}" />
             <input type="hidden" id="id_dept" name="txt_dept" value="" />

             <table class="table">
               <thead>

               </thead>
               <tbody>





                 <tr>

                   <div class="card">
                     <div class="bg-warning p-10">
                       <i class="icofont icofont-paper-plane"></i>
                       <strong>PHẢN HỒI BÁO CÁO SỰ CỐ Y KHOA</strong>
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

     <div class="accordion" id="accordionPanelsStayOpenExample">
       <!-- BEGIN: NHOMCAUHOI -->
       <div class="accordion-item">
         <h2 class="accordion-header" id="panelsStayOpen-headingOne">
           <button class="accordion-button" type="button" data-bs-toggle="collapse"
             data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
             aria-controls="panelsStayOpen-collapseOne">
             {NHOMCAUHOI.stt}. {NHOMCAUHOI.tennhom}
           </button>
           <input type="hidden" id="idcheckbut{NHOMCAUHOI.stt}" name="checkbut{NHOMCAUHOI.vid}" />
         </h2>
         <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
           aria-labelledby="panelsStayOpen-headingOne">
           <div class="accordion-body">
             <table id="myTable" class="table table-hover" style="width:100%">
               <!-- BEGIN: CAUHOI -->
               <tr>

                 {CAUHOI.td1}

                 {CAUHOI.form_control}

                 {CAUHOI.td2}


               </tr>
               <!-- END: CAUHOI -->
             </table>



           </div>
         </div>
       </div>
       <!-- END: NHOMCAUHOI -->
       <div>
         <button type="submit" class="btn  btn-success " id="modal_submit" name="submit_button"><i class=""></i>Gửi báo
           cáo</button>
       </div>

     </div>






     </form>

   </div>
 </div>

 <script>
   function change_checkbox(checkboxId, hiddenInputId) {
     var checkedValues = $("input[name='" + checkboxId + "']:checked").map(function() {
       return $(this).val();
     }).get();
     $("#" + hiddenInputId).val(checkedValues.join(";"));
     //alert(checkedValues.join(", "));
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