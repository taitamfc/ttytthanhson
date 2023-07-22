<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
            <input type="hidden" name="id" value="{ROW.id}" />
            <input type="hidden" name="userid" value="{ROW.userid}" />
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover full">
                    <colgroup>
                        <col style="width:180px" />
                        <col />
                    </colgroup>
                    <tbody>
                        <tr>
                            <td colspan="2" style="background: #3ea00b;color: #fff;text-transform: uppercase;">
                                <strong>
                                    Thông tin tài khoản
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Tên tài khoản</strong>
                            </td>
                            <td>
                                <input type="text" name="username" {readonly} value="{ROW.username}" class="form-control static-link required" placeholder="" autocomplete="off" required="required" oninvalid="setCustomValidity('Vui lòng nhập tên tài khoản')" oninput="setCustomValidity('')" >
                            </td>
                        </tr>
                        <!-- BEGIN: edit -->

                        <tr>
                            <td colspan="2" style="background: #3ea00b;color: #fff;text-transform: uppercase;">
                                <strong>
                                    Bỏ trống trường mật khẩu nếu không muốn thay đổi
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Mật khẩu</strong>
                            </td>
                            <td>
                                <input type="password" name="password1" value="" class="form-control static-link" placeholder="" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Nhập lại mật khẩu</strong>
                            </td>
                            <td>
                                <input type="password" name="password2" value="" class="form-control static-link" placeholder="" autocomplete="off">
                            </td>
                        </tr>
                        <!-- END: edit -->
                        <!-- BEGIN: no_edit -->

                        <tr>
                            <td colspan="2" style="background: #3ea00b;color: #fff;text-transform: uppercase;">
                                <strong>
                                    Mậu khẩu tài khoản
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Mật khẩu</strong>
                            </td>
                            <td>
                                <input type="password" name="password1" value="" class="form-control static-link required" required="required" oninvalid="setCustomValidity('Vui lòng nhập mật khẩu')" oninput="setCustomValidity('')" placeholder="" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Nhập lại mật khẩu</strong>
                            </td>
                            <td>
                                <input type="password" name="password2" value="" class="form-control static-link required"  required="required" oninvalid="setCustomValidity('Vui lòng nhập lại mật khẩu')" oninput="setCustomValidity('')" placeholder="" placeholder="" autocomplete="off">
                            </td>
                        </tr>
                        <!-- END: no_edit -->
                        <tr>
                            <td colspan="2" style="background: #3ea00b;color: #fff;text-transform: uppercase;">
                                <strong>
                                    Thông tin nhân viên
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>{LANG.name_staff}</strong>
                            </td>
                            <td>
                                <input class="form-control required" type="text" name="name_staff" value="{ROW.name_staff}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>{LANG.email}</strong>
                            </td>
                            <td>
                                <input class="form-control required" type="email" name="email" value="{ROW.email}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>{LANG.birthday}</strong>
                            </td>
                            <td>
                                <input class="form-control required" type="text" name="birthday" value="{ROW.birthday}" id="birthday" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>{LANG.phone}</strong>
                            </td>
                            <td>
                                <input class="form-control" type="text" name="phone" value="{ROW.phone}" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>{LANG.position}</strong>
                            </td>
                            <td>
                                <select class="form-control required" name="position_id" onchange="change_position(this)">
                                    <!-- BEGIN: position -->
                                    <option value="{key}" {selected}>{title}</option>
                                    <!-- END: position -->
                                </select>
                            </td>
                        </tr>
                        <!-- BEGIN: insert_department -->
                        <tr id="load_department">
                            <td>
                                <strong>Phòng ban</strong>
                            </td>
                            <td>
                                <select class="form-control required department_id" name="department_id">
                                </select>
                            </td>
                        </tr>
                        <!-- END: insert_department -->
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-center">
                                <input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    function change_position(a){
        var position=$(a).val()
        $('#load_department').html('<td><strong>Phòng ban</strong></td><td><select class="form-control required department_id" name="department_id" required></select></td>')
        $('.department_id').select2({
            placeholder:"Vui lòng chọn phòng ban", 
            ajax: {
                url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=get_department',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
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
    }
    $("#birthday").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        showOtherMonths : true,
        yearRange: '1900:'+new Date(),

    });
    $('.department_id').select2({
        placeholder:"Vui lòng chọn phòng ban", 
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=get_department',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    q: params.term,
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
</script>
<!-- END: main -->