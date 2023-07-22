<!-- BEGIN: main -->
<style>
      #myTable {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #myTable th, #myTable td {
        text-align: left;
        padding: 8px;
      }

      #myTable th.header  {
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

      th,td {
        border-top: 1px solid #dddddd;
        border-bottom: 1px solid #dddddd;
        border-right: 1px solid #dddddd;
      }
        
      th:first-child {
        border-left: 1px solid #dddddd;
      }
     
          
</style>
    <div class="page-body">
            <!-- order-card start -->
            <!-- Page-header start -->
      <div class="page-header card">
      <form class="md-float-material" action="{link_frm}" method="post" id="frm_evaluation_details" >
      <div class="row">

        <div class="col-md-4 mb-3">
            <label for="cbo_evaluation_type">Loại: Thực hành/Chuyên môn</label>
            <select id="cbo_evaluation_type" name="cbo_evaluation_type" class="form-control">
                <option selected>Chọn loại đánh giá</option>
                <!-- BEGIN: rating_type -->
                <option>{rating_type.name_rating_type}</option>
                <!-- END: rating_type -->
            </select>
        </div>


      <div class="col-md-4 mb-3">
          <label for="cbo_year">Năm đánh giá: </label>     
          <select id="cbo_year" name="cbo_year" class="form-control" >
              <option selected>Chọn năm đánh giá</option>
              <option>2022</option>
              <option>2023</option>
              <option>2024</option>
              <option>...</option>
        </select>
      </div> 
  
      <div class="col-md-4 mb-3">
          <label for="cbo_times">Lần đánh giá: </label>     
          <select id="cbo_times" name="cbo_times" class="form-control">
              <option selected>Chọn lần đánh giá</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>...</option>
        </select>
      </div> 
      
    </div> <!-- end form-row -->  
          <div class="row m-t-30">
              <div class="col-md-2">
              <div class="text-center"><input class="btn btn-primary" name="submit" type="submit" value="Save" /></div>
              
              </div>
          </div>
          <hr>
          
      </div>
<!-- Tạo biểu mẫu đánh giá -->
<table id="myTable" class="cell-border" style="width:100%">
  <thead>
    <tr>
      <th  class="header">STT</th>
      <th class="header">Nội dung</th>
      <th style="width: 20%" class="header">Điểm</th>
    </tr>
  </thead>
  <tbody>
  <!-- BEGIN: group -->
    <tr>
    <td colspan="3" class="title">{group.name_question_type}</td>
    <td></td>
    <td></td>
      
    </tr>

 <!-- BEGIN: question -->
    <tr>     
      <td>{question.stt}</td>
      <td style="width: 70% ;">{question.content}</td>
      <td >      
          <label><input type="radio" class="form-check-input" id="r{question.id_question_details}" name="a{question.id_question_details}" value="1"> 1</label>        
              
          <label><input type="radio" class="form-check-input" id="r{question.id_question_details}" name="a{question.id_question_details}" value="2"> 2</label>        
            
          <label><input type="radio" class="form-check-input" id="r{question.id_question_details}" name="a{question.id_question_details}" value="3"> 3</label>	  
     </td>     
    </tr>
<!-- END: question -->
  <!-- END: group --> 
 
 

  </tbody>
</table>


  </form>
          </div>
      </div>
      <!-- Page-header end -->
            
            <!-- order-card end -->
   </div>
    <!-- JS //alert("Email has been sent!");-->
    


   <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
   
<!-- JS xu ly form submit-->
   <script>
    $(function () {
      $('#frm_evaluation_details').on('submit',function (e) {
        $.ajax({
          type: 'post',
          /*url: 'http://localhost/5s/index.php?language=vi&nv=fives&op=evaluation_details_form',*/
          data: $('#frm_evaluation_details').serialize(),
          success: function () {            
            alert($('#frm_evaluation_details').serialize());
          }
        });
        
      });
    });
  </script>

<!-- END: main -->