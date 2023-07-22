<link href="{THEME_URL}/css/select2.min.css" rel="stylesheet" />
<script src="{THEME_URL}/js/select2.min.js"></script>
<!-- BEGIN: main -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<style>
  .icon-btn a {
    border-radius: 50%;
  }

  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: rgba(36, 154, 20, 0.581);
    border: none;
  }
</style>



<div class="pcoded-inner-content">
  <div class="main-body">
    <!-- Page-header start -->
    <!-- Page-header end -->
    <div class="col-sm-12">
      <!-- Tooltips on textbox card start -->
      <div class="card">
        <div class="card-block">
          <form name="frm_setup" id="id_frm_setup" method="post" action="{link_frm}"
            onsubmit="return nv_execute_update(this);">
            <input type="hidden" name="checkss" id="checkss" value="{CHECKSESS}" />
            <input type="hidden" name="sta" id="sta" value="update_report" />
            <input type="hidden" name="id" id="id" value="{ROW.id}" />

            <div>
              <table class="table table-hover">
                <tbody data-select2-id="select2-data-12-vbzn">
                  <tr>
                    <th colspan="1" class="text-center">
                      <H5>CẬP NHẬT THÔNG TIN BIỂU MẪU</H5>
                    </th>
                  </tr>
                  <tr>
                    <th>Tên biểu mẫu</th>
                  </tr>
                  <tr>
                    <td><textarea name="name_report" rows="2" class="form-control">{name_report}</textarea>
                    </td>
                  </tr>
                  <tr>
                    <th>Áp dụng cho Khoa/Phòng</th>
                  </tr>
                  <tr>
                    <td>
                      <select id="multiple" name="department[]" class="js-states form-control" multiple>
                        <!-- BEGIN: department -->
                        <option {department.selected}="{department.selected}" value="{department.account}">
                          {department.tenkhoa}"
                        </option>
                        <!-- END: department -->
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center">
                      <button type="submit" class="btn btn-out-dashed btn-info btn-square" id="id_submit" name="submit">
                        <i class="icofont icofont-check-circled"></i> Cập nhật</button>
                      <a href="{link_back}"><span type="text" class="btn btn-out-dotted btn-danger btn-square">Trở
                          lại</span> </a>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>

            <!-- Tooltips on textbox card end -->
            <div class="table-responsive" style="padding-bottom: 100px;">
              <table class="table table-hover center" style="width:100%">
                <thead>
                  <tr>
                    <th colspan="3" class="text-center">
                      <H5> DANH SÁCH PHÂN BỔ CÁC TIÊU CHUẨN THEO MẪU BÁO CÁO TRÊN</H5>
                    </th>
                  </tr>
                  <tr>
                    <th class="align-middle text-center">#</th>
                    <th>Tiêu chuẩn đánh giá</th>
                    <th class="align-middle text-center">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- BEGIN: question_type -->
                  <tr>
                    <th class="align-middle text-center">{question_type.stt}</th>
                    <td class="align-middle">{question_type.name_question_type}</td>
                    <td class="text-left col-1 ">
                      <div class="ks-cboxtags">
                        <input type="checkbox" id="check{question_type.id_question_type}" name="checks[]"
                          value="{question_type.id_question_type} " {question_type.check}>
                        <label for="check{question_type.id_question_type}">Áp dụng</label>
                      </div>
                    </td>
                  </tr>
                  <!-- END: question_type -->
                </tbody>
              </table>




            </div>
        </div>
        </form>
      </div>
      <!-- Tooltips on textbox card end -->
    </div>
  </div>
</div>
</div> <!-- Pcode... -->
<!-- Close for header -->
</div>
</div>
</div>

<script>
  $("#multiple").select2({
    placeholder: "Chọn Khoa Phòng",
    allowClear: true
  });
</script>
<!-- END: main -->