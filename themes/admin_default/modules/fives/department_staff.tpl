<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<!-- BEGIN: view -->

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="float:left"><i class="fa fa-list"></i> {LANG.deparment_staff}</h3> 
        <div class="pull-right">
            <button title="Ẩn /Hiện tìm kiếm"id="tms_sea_id" data-toggle="tooltip" data-placement="top"class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button> 
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_insert_staff"> 
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </button>
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="well" id="tms_sea">
        <form action="{NV_BASE_ADMINURL}index.php" id="formsearch" method="get">
            <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" />
            <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
            <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
            <div class="row">
                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
                    <div class="form-group">
                        <input class="form-control" type="text" value="{Q}" name="q" maxlength="255"
                        placeholder="{LANG.name_staff}, {LANG.email}, {Lang.phone}" />
                    </div>
                </div>
                <div class="col-sm-24  col-md-24  col-lg-4">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="w100">{LANG.weight}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.staff_code}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.name_staff}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.email}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.birthday}</th>
                    <th class="w150">&nbsp;</th>
                </tr>
            </thead>
            <!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="6">{NV_GENERATE_PAGE}</td>
                </tr>
            </tfoot>
            <!-- END: generate_page -->
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td class="text-center" style="vertical-align: middle;">
                        {VIEW.stt}
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.staff_code} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.name_staff} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.email} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.birthday} </td>
                    <td class="text-center" style="vertical-align: middle;">
                        <button type="button" class="btn btn-danger" onclick="delete_department_staff({VIEW.id},{department_id})">
                            Xóa ra khỏi phòng
                        </button>
                    </td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</form>
<div id="modal_insert_staff" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm nhân viên vào phòng</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-5 col-md-4 control-label">
                            <strong>{LANG.userid_staff}</strong> 
                            <span class="red">(*)</span>
                        </label>
                        <div class="col-sm-19 col-md-20">
                            <select class="form-control userid" multiple name="userid" required>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Đóng
                </button>
                <button type="button" class="btn btn-success" onclick="add_staff({department_id})">
                    Thêm
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END: view -->
<script type="text/javascript">
    $("#tms_sea_id").click(function() {
        $("#tms_sea").toggle();
    });
    $('.userid').select2({
        placeholder:"Vui lòng chọn nhân viên", 
        width:"100%",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=get_user_staff_department',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    q: params.term,
                    department_id:{department_id}
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
</script>
<!-- END: main -->