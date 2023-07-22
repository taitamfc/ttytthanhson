<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<!-- BEGIN: view -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="float:left"><i class="fa fa-list"></i> {LANG.vote_list}</h3> 
        <div class="pull-right">
           <button title="Ẩn /Hiện tìm kiếm"id="tms_sea_id" data-toggle="tooltip" data-placement="top"class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button> 
           <a href="{ADD}" data-toggle="tooltip" data-placement="top" title="{LANG.list_fives_add}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
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

            <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
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

            <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
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
            <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
                <div class="form-group">
                    <input class="form-control" type="text" value="{Q}" name="q" maxlength="255"
                    placeholder="{LANG.list_fives}" />
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
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                    <th class="w50 text-center">{LANG.weight}</th>
                    <th class=" text-center">{LANG.vote}</th>
                    <th class=" text-center">{LANG.department_title}</th>
                    <th class=" text-center">{LANG.user_add}</th>
                    <th class=" text-center">{LANG.trungbinh}</th>
                    <th class="w150 text-center">{LANG.time_add}</th>

                    <th class="w150">&nbsp;</th>
                </tr>
            </thead>
            <!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="11">{NV_GENERATE_PAGE}</td>
                </tr>
            </tfoot>
            <!-- END: generate_page -->
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td class="text-center" style="vertical-align: middle;">
                       {VIEW.stt}
                    </td>
                    <td> {VIEW.title_list} ( {VIEW.tungay} -  {VIEW.denngay} )</td>
                    <td class="text-center"> {VIEW.department_name}</td>
                    <td class="text-center"> {VIEW.username}</td>
                    <td class="text-center"> {VIEW.trungbinh}</td>
                    <td class="text-center"> {VIEW.time} </td>
                  
                    <td class="text-center"><i class="fa fa-edit fa-lg">&nbsp;</i> <a href="{VIEW.link_edit}#edit">{LANG.edit}</a> - <em class="fa fa-trash-o fa-lg">&nbsp;</em> <a href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);">{LANG.delete}</a></td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</form>
<!-- END: view -->

<script type="text/javascript">
       function nv_change_weight(id) {
        var nv_timer = nv_settimeout_disable('id_weight_' + id, 5000);
        var new_vid = $('#id_weight_' + id).val();
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=list_fives&nocache=' + new Date().getTime(), 'ajax_action=1&id=' + id + '&new_vid=' + new_vid, function(res) {
            var r_split = res.split('_');
            if (r_split[0] != 'OK') {
                alert(nv_is_change_act_confirm[2]);
            }
            window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=list_fives';
            return;
        });
        return;
    }

    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=list_fives&nocache=' + new Date().getTime(), 'change_status=1&id='+id, function(res) {
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
</script>
<!-- END: main -->

<!-- BEGIN: add -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<h1>{CONTENT.title}</h1>
<!-- BEGIN: hometext -->
<div class="tmswell">{CONTENT.hometext}</div>
<!-- END: hometext -->

<div class="clear"></div>

    <div class="row">
    
        <div class="col-xs-12 col-sm-12  col-md-4  col-lg-4">
            <div class="form-group">
                <div class="input-group" style="width:100%">
                    <span class="input-group-addon tms-addon">
                        Thời gian
                    </span>
                     <input class="form-control" type="text" name="time"value="{TIME}" {khoa} id="time" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')"  onchange="load_static_department()"/>
                    
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12  col-md-6  col-lg-6">
            <div class="form-group">
                <div class="input-group" style="width:100%">
                    <span class="input-group-addon tms-addon">
                       Lần đánh giá
                    </span>
                    <select id="row_id" name="row_id" class="form-control input-sm"{khoa} onchange="load_static_department()"> 
                    <!-- BEGIN: row_id -->
                        <option value="{row_id}" selected="selected">{title}</option>
                        <script type="text/javascript">
                            setTimeout(function(){
                                load_static_department()
                            },300)</script>
                        <!-- END: row_id -->
                    </select>

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12  col-md-6  col-lg-6">
            <div class="form-group">
                <div class="input-group" style="width:100%">
                    <span class="input-group-addon tms-addon">
                        Nhân viên
                    </span>
                    <select id="userid" class="form-control input-sm"{khoa} onchange="load_static_department()">
                         <!-- BEGIN: userid -->
                        <option value="{userid}" selected="selected">{title}</option>
                        <script type="text/javascript">
                            setTimeout(function(){
                                load_static_department()
                            },300)</script>
                        <!-- END: userid -->
                    </select>

                </div>
            </div>
        </div>

        <div class="col-xs-24 col-sm-24  col-md-6  col-lg-6">
            <div class="form-group">
                <div class="input-group" style="width:100%">
                    <span class="input-group-addon tms-addon">
                        Phòng ban
                    </span>
                    <select id="department_id" class="form-control input-sm"{khoa} onchange="load_static_department()">
                          <!-- BEGIN: department_id -->
                        <option value="{department_id}" selected="selected">{title}</option>
                        <script type="text/javascript">
                            setTimeout(function(){
                                load_static_department()
                            },300)</script>
                        <!-- END: department_id -->
                    </select>
                </div>
            </div>
        </div>
    </div>

<div id="load_data"></div>
<script type="text/javascript">
      $("#time").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        showOtherMonths : true,
    });
       $('#row_id').select2({
        placeholder:"Chọn lần đánh giá", 
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=get_row_id',
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

       $('#userid').select2({
        placeholder:"Chọn nhân viên", 
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=get_user',
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
       
    $('#department_id').select2({
        placeholder:"Chọn phòng ban", 
        ajax: {
            url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax&mod=get_department',
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

    
</script>

<div class="no_load">
    <div style="text-align: center;background: #dcdcdc;width: 100%;padding: 10px;">
        <span style="position: relative;font-size: 16px; font-weight: 600;">
            {LANG.loading}
            <div class="loader four"></div>
        </span>
        <span></span>
    </div>
    <div class="load_box">
        <span><i class="fa fa-spinner icon_loading"></i></span>
    </div>
</div>

<script type="text/javascript">
    function loading(){
        var $elie = $(".icon_loading");
        rotate(0);
        function rotate(degree) {
            $elie.css({ WebkitTransform: 'rotate(' + degree + 'deg)'});
            $elie.css({ '-moz-transform': 'rotate(' + degree + 'deg)'});
            setTimeout(
                function() {
                    rotate(++degree); 
                },
                10
                );
        }    
        $(".no_load").addClass("load");
        $(".no_load").removeClass("no_load");
    }
    function removeloading(){
        $(".load").addClass("no_load");
        $(".load").removeClass("load");

    }
    function go_back(){
        history.back();
    }
</script>
<style>
    .tmswell{width: 100%; margin-bottom: 20px; padding: 10px;   background-color: #f2f2f2;    border: 1px solid #0000;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%);}
    .load{
        display: block !important;
    }
    .no_load{
        display: none !important;
    }
    .four {
        width: 10px;
        height: 10px;
        background-color: #fff;
        border-radius: 50%;
        animation: loader4Animation 1s linear infinite;
        position: absolute;
        right: -25px;
        top: 5px;
    }
    @keyframes loader4Animation {
        0% {
            background-color: rgba(0,0,128, 1);
            box-shadow: 15px 0px 0px 0px rgba(0,0,128, 0.67),
            30px 0px 0px 0px rgba(0,0,128, 0.33);
        }
        17% {
            background-color: rgba(0,0,128, 0.67);
            box-shadow: 15px 0px 0px 0px rgba(0,0,128, 1),
            30px 0px 0px 0px rgba(0,0,128, 0.67);
        }
        33% {
            background-color: rgba(0,0,128, 0.33);
            box-shadow: 15px 0px 0px 0px rgba(0,0,128, 0.67),
            30px 0px 0px 0px rgba(0,0,128, 1);
        }
        50% {
            background-color: rgba(0,0,128, 0);
            box-shadow: 15px 0px 0px 0px rgba(0,0,128, 0.33),
            30px 0px 0px 0px rgba(0,0,128, 0.67);
        }
        67% {
            background-color: rgba(0,0,128, 0.33);
            box-shadow: 15px 0px 0px 0px rgba(0,0,128, 0),
            30px 0px 0px 0px rgba(0,0,128, 0.33);
        }
        83% {
            background-color: rgba(0,0,128, 0.67);
            box-shadow: 15px 0px 0px 0px rgba(0,0,128, 0.33),
            30px 0px 0px 0px rgba(0,0,128, 0);
        }
        100% {
            background-color: rgba(0,0,128, 1);
            box-shadow: 15px 0px 0px 0px rgba(0,0,128, 0.67),
            30px 0px 0px 0px rgba(0,0,128, 0.33);
        }
    }
    .load{
        position: fixed;
        height: 100vh;
        width: 100vw;
        top: 0px;
        left: 0px;
        z-index: 10000000;
        background: rgba(0, 0, 0, 0.3);
        text-align: center;
    }
    .load_box{
        height: 100px;
        width: 100px;
        position: absolute;
        top: 45%;
        display: inline-block;
        padding: 30px;
    }
    .load_box i{
        font-size: 40px;
        color: #fff;
        z-index: 100000000;
    }
    .load_box span{

    }

    .no_load{
        display: none;
    }
</style>
<!-- END: add -->