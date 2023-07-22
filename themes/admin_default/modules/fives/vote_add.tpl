<!-- BEGIN: main -->

<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />

<div class="clear"></div>
    <div class="tmswell">
        <div class="row">
            <div class="col-xs-12 col-sm-12  col-md-6  col-lg-6">
                <div class="form-group">
                    <div class="input-group" style="width:100%">
                        <span class="input-group-addon tms-addon">
                            Nhân viên
                        </span>
                        <input type="text" class="form-control input-sm" value="{STAFF}">

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12  col-md-6  col-lg-6">
                <div class="form-group">
                    <div class="input-group" style="width:100%">
                        <span class="input-group-addon tms-addon">
                            Thời gian
                        </span>
                        <input type="text" class="form-control input-sm" value="{TIME_DANHGIA}">
                    </div>
                </div>
            </div>

            <div class="col-xs-24 col-sm-24  col-md-12  col-lg-12">
                <div class="form-group">
                    <div class="input-group" style="width:100%">
                        <span class="input-group-addon tms-addon">
                            Phòng ban
                        </span>
                        <select id="department_id" class="form-control input-sm"onchange="load_static_department()">
                        </select>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div id="load_data"></div>

<script type="text/javascript">
    $('#department_id').select2({
        placeholder:"Vui lòng chọn phòng ban", 
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


<!-- END: main -->