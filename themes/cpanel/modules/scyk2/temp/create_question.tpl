<!-- BEGIN: main -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
    body {
        color: #404E67;
        background: #F5F7FA;
        font-family: 'Open Sans', sans-serif;
    }

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
</style>

<div class="page-body">
    <!-- order-card start -->
    <!-- Page-header start -->
    <div class="page-header card">


        <form class="md-float-material" action="{link_frm}" method="post" id="frm_evaluation_details">
            <div class="pcoded-main-container" style="margin-top: 57.6px;">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar" navbar-theme="themelight1" active-item-theme="theme4"
                        sub-item-theme="theme2" active-item-style="style0" pcoded-navbar-position="fixed">
                        <div class="sidebar_toggle"><a
                                href="http://ttythuyenthanhson.com/vi/qlcl/cungcapchitieu/?token=64f45b86673629fd15654e6233ec1c22_2023_2#"><i
                                    class="icon-close icons"></i></a></div>
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
                                            <a href="http://ttythuyenthanhson.com/vi/qlcl/">
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
                    <div class="pcoded-inner-content">
                        <div class="main-body">

                            <!-- Page-header start -->
                            <!-- Page-header end -->
                            <div class="col-sm-12">
                                <div class="container-lg">
                                    <div class="table-responsive">
                                        <div class="table-wrapper">
                                            <div class="table-title">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <h2><b>{group.name_question_type} </b></h2>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <button type="button" class="btn btn-info add-new"><i
                                                                class="fa fa-plus"></i> Add New</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-bordered">
                                                <thead>

                                                    <tr>
                                                        <th style="width: 10%">STT</th>
                                                        <th style="width: 70%">Nội dung đánh giá</th>
                                                        <th style="width: 30%">Actions</th>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Pcode... -->
            <!-- Close for header -->
    </div>
</div>
</div>

<!-- Required Jquery -->
<!-- jquery slimscroll js -->
<!-- modernizr js -->
<!-- am chart -->
<!-- Chart js -->
<!-- Todo js -->
<!-- Custom js -->
<!-- Modal start -->

<!-- Modal end -->

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new").click(function() {
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="stt" id="stt"></td>' +
                '<td><input type="text" class="form-control" name="new_question" id="new_question"></td>' +
                '<td>' + actions + '</td>' +
                '</tr>';
            $("table").append(row);
            $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function() {
                if (!$(this).val()) {
                    $(this).addClass("error");
                    empty = true;
                } else {
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if (!empty) {
                input.each(function() {
                    $(this).parent("td").html($(this).val());
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
            }
        });
        // Edit row on edit button click
        $(document).on("click", ".edit", function() {
            $(this).parents("tr").find("td:not(:last-child)").each(function() {
                $(this).html('<input type="text" class="form-control" value="' + $(this)
                    .text() + '">');
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function() {
            $(this).parents("tr").remove();
            $(".add-new").removeAttr("disabled");
        });
    });
</script>



<script>
    var nv_base_siteurl = "/",
        nv_lang_data = "vi",
        nv_lang_interface = "vi",
        nv_name_variable = "nv",
        nv_fc_variable = "op",
        nv_lang_variable = "language",
        nv_module_name = "qlcl",
        nv_func_name = "cungcapchitieu",
        nv_is_user = 1,
        nv_my_ofs = 7,
        nv_my_abbr = "ICT",
        nv_cookie_prefix = "nv4c_z4iMR",
        nv_check_pass_mstime = 1738000,
        nv_area_admin = 0,
        nv_safemode = 0,
        theme_responsive = 0,
        nv_is_recaptcha = 0;
</script>

< <script type="text/javascript">
    $(function () { $('#datetime').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new
    Date());});
    $(function () { $('#datetime1').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new
    Date());});
    $(function () { $('#datetime2').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new
    Date());});
    $(function () { $('#datetime3').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new
    Date());});
    $(function () { $('#datetime4').datepicker({ autoclose: true,todayHighlight: true }).datepicker('update', new
    Date());});
    </script>



    <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
    </div>
    </body>

    </html>

<!-- END: main -->