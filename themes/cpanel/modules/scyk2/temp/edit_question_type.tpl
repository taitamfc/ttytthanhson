<!-- BEGIN: main -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<style>
    .table-wrapper {
        width: 700px;
        margin: 30px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }

    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }

    .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
    }

    .table-title .add-new i {
        margin-right: 4px;
    }

    table.table {
        table-layout: fixed;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table th:last-child {
        width: 100px;
    }

    table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 24px;
    }

    table.table td a.add {
        color: #27C46B;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.delete {
        color: #E34724;
    }

    table.table td i {
        font-size: 19px;
    }

    table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
    }

    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }

    table.table .form-control.error {
        border-color: #f50000;
    }

    table.table td .add {
        display: none;
    }


    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: rgba(36, 154, 20, 0.581);
        border: none;
    }
</style>

<div class="page-body">
    <!-- order-card start -->
    <!-- Page-header start -->
    <div class="page-header card">

        <div class="pcoded-main-container" style="margin-top: 57.6px;">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar" navbar-theme="themelight1" active-item-theme="theme4" sub-item-theme="theme2"
                    active-item-style="style0" pcoded-navbar-position="fixed">
                    <div class="sidebar_toggle"><a href="{}"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu mCustomScrollbar _mCS_1 mCS_no_scrollbar"
                        style="height: calc(100% - 90px);">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                            style="max-height: none;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position: relative; top: 0px; left: 0px;" dir="ltr">
                                <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none"
                                    subitem-border="true">
                                    <li
                                        style="background-color: #73b4ff;border-color: #73b4ff;outline: 1px dashed #fff;outline-offset: -5px;">
                                        <a href="{}">
                                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main"><strong>Trang
                                                    chủ</strong></span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{link_frm}">
                                            <span class="pcoded-micon"><i class="ti-layers"></i><b></b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Cài đặt
                                                quản lý</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="pcoded-hasmenu active pcoded-trigger" dropdown-icon="style3"
                                        subitem-icon="style7">
                                        <a href="{link_frm}">
                                            <span class="pcoded-micon"><i class="ti-layers"></i><b></b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Danh mục
                                                tiêu chuẩn</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <!-- BEGIN: question_type -->

                                            <li class="">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><a
                                                        href="{link_id}">
                                                        Tiêu chuẩn số {question_type.stt}</a></span>
                                                <span class="pcoded-mcaret"></span>

                                            </li>
                                            <!-- END: question_type -->

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div id="mCSB_1_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                                style="display: none;">
                                <div class="mCSB_draggerContainer">
                                    <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                        style="position: absolute; min-height: 30px; height: 0px; top: 0px;">
                                        <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                    </div>
                                    <div class="mCSB_draggerRail"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="pcoded-content">

                <!-- Tooltips on textbox card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-b-10">CẬP NHẬT THÔNG TIN TIÊU CHUẨN</h5>
                    </div>
                    <!-- <form name="frm_settup" id="id_frm_settup" method="post" action="{link_frm}">       -->
                    <form class="md-float-material" action="{link_frm}" method="post" id="id_frm_settup">
                        <input type="hidden" name="checkss" id="checkss" value="53ff69290067026857e0a5b982731c76">
                        <input type="hidden" name="sta" id="sta" value="khoitaochitieu">
                        <input type="hidden" name="id" id="id" value="12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>
                                            <textarea name="questiontype_txt" id="id_questiontype" rows="4"
                                                style="width: 100%;height: 100px; text-align:left" ;>
                                                   {group.name_question_type}</textarea>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <h5 class="m-b-10">Khoa phòng cung cấp</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <select id="multiple" name="department[]" class="js-states form-control"
                                                multiple>
                                                <!-- BEGIN: department -->
                                                <option value="{department.id_department}">{department.name_department}
                                                </option>
                                                <!-- END: department -->
                                            </select>
                                        </th>
                                    </tr>
                                    <tr>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%">STT</th>
                                                    <th style="width: 70%">Nội dung đánh giá</th>
                                                    <th style="width: 30%">Sửa/Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- BEGIN: group -->
                                                <!-- BEGIN: question -->

                                                <tr>
                                                    <td>{question.stt}</td>
                                                    <td>{question.content}</td>
                                                    <td>
                                                        <a class="add" title="Add" data-toggle="tooltip"><i
                                                                class="material-icons">&#xE03B;</i></a>
                                                        <a class="edit" title="Edit" data-toggle="tooltip"><i
                                                                class="material-icons">&#xE254;</i></a>
                                                        <a class="delete" title="Delete" data-toggle="tooltip"><i
                                                                class="material-icons">&#xE872;</i></a>
                                                    </td>
                                                </tr>

                                                <!-- END: question -->
                                                <!-- END: group -->

                                            </tbody>
                                        </table>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Tooltips on textbox card end -->

                        <!-- Page-header start -->
                        <!-- Page-header end -->
                        <table>
                            <tr>
                                <td style="text-align: right;>
                                    <input type=" hidden" name="submit_clicked" id="submit_clicked" value="">
                                    <button type="submit" id="idsubmit_button" name="submit_button"
                                        class="btn btn-out-dashed btn-info btn-square">
                                        <i class="icofont icofont-check-circled"></i> Cập nhật
                                    </button>
                                </td>

                                <td style="width: 2%;"></td>
                                <td>
                                    <button type="button" id="id_back" name="back_button"
                                        class="btn btn-out-dashed btn-info btn-square">
                                        <i class="icofont icofont-check-circled"></i> Trở lại
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div> <!-- Pcode... -->
        <!-- Close for header -->
    </div>
</div>
</div>
</div>
//!-- test button

<script>
    $(function() {
        var url = "{link_frm}"; 
        var value1 = 'value1';
        $('#id_frm_settup').on('submit', function(e) {
           
            $.ajax({
                type: 'post',
                contentType: "application/json; charset=utf-8",
                url: url,
                data: JSON.stringify({data1 : $(this).serialize(), data2 : value1}),
                success: function(response) {
                    alert('Success: ' + response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        });
    });
</script>
//-->


<script>
    $("#multiple").select2({
        placeholder: "Chọn Khoa Phòng",
        allowClear: true
    });
</script>



<!-- END: main -->