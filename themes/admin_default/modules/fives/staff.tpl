<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<!-- BEGIN: view -->

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="float:left"><i class="fa fa-list"></i> {LANG.staff}</h3> 
        <div class="pull-right">
            <button title="Ẩn /Hiện tìm kiếm"id="tms_sea_id" data-toggle="tooltip" data-placement="top"class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button> 
            <a href="{staff_add}" data-toggle="tooltip" data-placement="top" title="{LANG.staff_add}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        </div>
        <div style="clear:both"></div>
    </div>
 <div class="well" id="tms_sea">
    <form action="{NV_BASE_ADMINURL}index.php" id="formsearch" method="get">
        <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" />
        <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
        <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
        <div class="row">
            <div class="col-xs-24 col-sm-12  col-md-12  col-lg-6">
                <div class="form-group">
                    <input class="form-control" type="text" value="{Q}" name="q" maxlength="255"
                    placeholder="{LANG.name_staff}, {LANG.email}, {Lang.phone}" />
                </div>
            </div>

            <div class="col-xs-24 col-sm-12  col-md-12  col-lg-6">
                <div class="form-group">
                    <div class="input-group" style="width:100%">
                        <span class="input-group-addon w100">
                            Tìm kiếm nhanh
                        </span>
                        <select class="form-control link_flast" id="sea_flast" name="sea_flast">
                            <option value="0">
                                -- Chọn thời gian --
                            </option>
                            <option value="1" {SELECT1}>Ngày hôm nay</option>
                            <option value="2" {SELECT2}>Ngày hôm qua</option>
                            <option value="3" {SELECT3}>Tuần này</option>
                            <option value="4" {SELECT4}>Tuần trước</option>
                            <option value="5" {SELECT5}>Tháng này</option>
                            <option value="6" {SELECT6}>Tháng trước</option>
                            <option value="7" {SELECT7}>Năm này</option>
                            <option value="8" {SELECT8}>Năm trước</option>
                            <option value="9" {SELECT9}>Toàn thời gian
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xs-24 col-sm-12  col-md-12  col-lg-6">
                <div class="form-group">
                    <div class="input-group" style="width:100%">
                        <span class="input-group-addon w100">
                            hoặc {LANG.ngay_tu}
                        </span>
                        <input id="ngaytu" autocomplete="off" type="text" maxlength="255" class="form-control disabled" value="{ngay_tu}"
                        name="ngay_tu" placeholder="{LANG.ngay_tu}">
                    </div>
                </div>

            </div>

            <div class="col-xs-24 col-sm-12  col-md-12  col-lg-6">
                <div class="form-group">
                    <div class="input-group" style="width:100%">
                        <span class="input-group-addon w100">
                            {LANG.ngay_den}
                        </span>
                        <input id="ngayden" autocomplete="off" type="text" maxlength="255" class="form-control disabled" value="{ngay_den}"
                        name="ngay_den" placeholder="{LANG.ngay_den}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
               <div class="col-xs-24 col-sm-12  col-md-12  col-lg-6">
                <div class="form-group">
                    <div class="input-group" style="width:100%">
                        <span class="input-group-addon w100">
                          Chức vụ
                        </span>
                        <select id="position_id" name="position_id" class="form-control input-sm">
                            <!-- BEGIN: position_id -->
                            <option value="{position_id.id}" {position_id.selected}>{position_id.text}
                            </option>
                            <!-- END: position_id -->
                        </select>
                    </div>
                </div>
            </div>
              <div class="col-xs-24 col-sm-12  col-md-12  col-lg-6">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                Phòng ban
                            </span>
                            <select id="department_id" name="department_id" class="form-control input-sm">    
                                <option value="{department_id}">{department_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
         
            <div class="col-xs-24 col-sm-12  col-md-12  col-lg-6">
                <div class="form-group">
                    <div class="input-group" style="width:100%">
                        <span class="input-group-addon w100">
                            Trạng thái
                        </span>
                        <select id="status_search" name="status_search" class="form-control input-sm">
                            <!-- BEGIN: status_filt -->
                            <option value="{status_filt.id}" {status_filt.selected}>{status_filt.text}
                            </option>
                            <!-- END: status_filt -->
                        </select>
                    </div>
                </div>
            </div>
        
            <div class="col-sm-24  col-md-24  col-lg-4">
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
                     <button class="btn btn-primary export_file" type="button"  >
                            Xuất file excel
                        </button>
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
                    <th>{LANG.department}</th>
                    <th>{LANG.staff_code}</th>
                    <th>{LANG.name_staff}</th>
                    <th>{LANG.position}</th>
                    <th>{LANG.email}</th>
                    <th>{LANG.birthday}</th>
                    <th>{LANG.time_add}</th>
                    <th>{LANG.user_add}</th>
                    <th class="w100 text-center">{LANG.active}</th>
                    <th class="w150">&nbsp;</th>
                </tr>
            </thead>
            <!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="12">{NV_GENERATE_PAGE}</td>
                </tr>
            </tfoot>
            <!-- END: generate_page -->
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td>
                        <select class="form-control" id="id_weight_{VIEW.id}" onchange="nv_change_weight('{VIEW.id}');">
                            <!-- BEGIN: weight_loop -->
                            <option value="{WEIGHT.key}"{WEIGHT.selected}>{WEIGHT.title}</option>
                            <!-- END: weight_loop -->
                        </select>
                    </td>
                    <td> {VIEW.name_department} </td>
                    <td> {VIEW.staff_code} </td>
                    <td> {VIEW.name_staff} </td>
                    <td> {VIEW.position} </td>
                    <td> {VIEW.email} </td>
                    <td> {VIEW.birthday} </td>
                    <td> {VIEW.time_add} </td>
                    <td> {VIEW.user_add} </td>
                    <td class="text-center"><input type="checkbox" name="status" id="change_status_{VIEW.id}" value="{VIEW.id}" {CHECK} onclick="nv_change_status({VIEW.id});" /></td>
                    <td class="text-center">
                        <i class="fa fa-edit fa-lg">&nbsp;</i> 
                        <a href="{VIEW.link_edit}#edit">{LANG.edit}</a>- <em class="fa fa-trash-o fa-lg">&nbsp;</em> <a href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);">{LANG.delete}</a>
                    </td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</form>
<!-- END: view -->

   <div class="well">
        <form action="{NV_BASE_ADMINURL}index.php" method="post" enctype="multipart/form-data" name="readexcel" id="readexcel">
            <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" />
            <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
            <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
            <div class="row">
                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                File excel
                            </span>
                            <input type="file" name="excel" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="col-sm-24  col-md-24  col-lg-4">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="import_excel" value="Import" />
                    
                        <input class="btn btn-primary" type="submit" name="import_excel2" value="Cập nhật import" style="margin-left: 5px;" />
                    </div>
                </div>
            </div>
        </form>
    </div>

<script type="text/javascript">
    function nv_change_weight(id) {
        var nv_timer = nv_settimeout_disable('id_weight_' + id, 5000);
        var new_vid = $('#id_weight_' + id).val();
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=staff&nocache=' + new Date().getTime(), 'ajax_action=1&id=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=staff';
            return;
        });
        return;
    }


    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=staff&nocache=' + new Date().getTime(), 'change_status=1&id='+id, function(res) {
                var r_split = res.split('_');
                if (r_split[0] != 'OK') {
                    alert(nv_is_change_act_confirm[2]);
                }
            });
        }
        else{
            $('#change_status_' + id).prop('checked', new_status ? false : true);
        }
        return;
    }
    $('select[name=sea_flast]').change(function() {
        var time_from = "";
        var time_to = "";
        var time = $('select[name=sea_flast]').val();
        if (time == 1) {
            time_from = "{HOMNAY}"
            time_to = "{HOMNAY}"
        } else if (time == 2) {
            time_from = "{HOMQUA}"
            time_to = "{HOMQUA}"
        } else if (time == 3) {
            time_from = "{TUANNAY.from}"
            time_to = "{TUANNAY.to}"
        } else if (time == 4) {
            time_from = "{TUANTRUOC.from}"
            time_to = "{TUANTRUOC.to}"
        } else if (time == 5) {
            time_from = "{THANGNAY.from}"
            time_to = "{THANGNAY.to}"
        } else if (time == 6) {
            time_from = "{THANGTRUOC.from}"
            time_to = "{THANGTRUOC.to}"
        } else if (time == 7) {
            time_from = "{NAMNAY.from}"
            time_to = "{NAMNAY.to}"
        } else if (time == 8) {
            time_from = "{NAMTRUOC.from}"
            time_to = "{NAMTRUOC.to}"
        } else if (time == 9) {
            time_from = "Không chọn"
            time_to = "Không chọn"
        } else if (time == 0) {
            time_from = ""
            time_to = ""
        }
        $('#ngaytu').val(time_from);
        $('#ngayden').val(time_to); 
    })
    $("#tms_sea_id").click(function() {
        $("#tms_sea").toggle();
    });
    $("#ngaytu,#ngayden").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        showOtherMonths: true,
    });

 $('#department_id').select2({
        placeholder:"Vui lòng chọn phòng ban", 
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=get_department_search',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    q: params.term
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

    $('.export_file').on('click', function(e) {
        var all = $(this).attr('data-all'); 
        var form_data = $('#formsearch').serializeArray(); 
        form_data.push({ name: 'all', value: all });
        $.ajax({
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=is_download&nocache=' + new Date().getTime(),
            type: 'post',
            dataType: 'json',
            data: form_data,
            beforeSend: function() {
                $('.export_file i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
                $('.export_file').prop('disabled', true);
                loading();
            },  
            complete: function() {
                $('.export_file i').replaceWith('<i class="fa fa-download"></i>');
                $('.export_file').prop('disabled', false);
            },
            success: function(json) {
                removeloading();
                if( json['error'] ) alert( json['error'] );         
                if( json['link'] ) window.location.href= json['link'];          
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
        e.preventDefault();     
    });
</script>
<!-- END: main -->