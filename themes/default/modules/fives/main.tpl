<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />

<!-- BEGIN: tochuc -->
<div id="tms">
<h2>I.BIỂU 4</h2>
<div class="tms_body">
       <table style="width: 100%;margin-bottom: 20px;">
                <tr>
                    <th class="text-center" rowspan="3"style="width: 220px; vertical-align: middle; "><img src="{CONFIG.logo}"style="width: 100%;height: auto;"></th>
                   
                   </tr>   
                     <tr>
                      <th class="text-left"colspan="12" style="vertical-align: middle; padding-left: 20px;">TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5S TẠI CÁC KHU VỰC Ở CÁC LẦN ĐG KHÁC NHAU</th>
                    </tr>
                     <tr>
                      <th class="text-left"colspan="12" style="vertical-align: middle;padding-left: 20px;">Tên bệnh viện/khoa: {CONFIG.tendonvi}</th>
                    </tr>
         
                    
               
         </table>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
               
                <tr>
                    <th class="text-center" rowspan="2"style="width: 220px; vertical-align: middle;">Khoa/phòng/khu vực được ĐG</th>
                    <th class="text-center"colspan="12">Điểm trung bình các lần đánh giá</th>
                </tr>
                <tr>
                    <!-- BEGIN: lan -->
                    <th class="text-center"style="width: 90px;vertical-align: middle;">L{LAN.stt}</th>
                     <!-- END: lan -->
                </tr>
            <tbody>
                <tr>
                    <td class="text-center"><strong>Ngày đánh giá<strong></td>
                   <!-- BEGIN: ngay -->
                    <td class="text-center"> {NGAY}</td>
                    <!-- END: ngay -->
                </tr>
                <!-- BEGIN: loop -->
                    <tr>
                    <td class="text-center"> {DONVI.name_department} </td>
                     <!-- BEGIN: lan -->
                     <td class="text-center"> 
                        {LAN.tongdiem}
                     </td>
                     <!-- END: lan -->
                </tr>
                <!-- END: loop -->
                <tr>
                    <td class="text-center"><strong>Điểm trung bình theo cột<strong></td>
                   <!-- BEGIN: lan_tong -->
                    <td class="text-center"> {LAN_TONG}</td>
                    <!-- END: lan_tong -->
                </tr>
            </tbody>
        </table>
    </div>
</div>   
</div>  
<!-- END: tochuc -->
<div id="tms">
    <h2>II.BIỂU 3 TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5 S TẠI MỘT KHU VỰC Ở CÁC LẦN ĐG KHÁC NHAU</h2>
      <div class="tmswell">
        <div class="row">
            <div class="col-xs-24 col-sm-24  col-md-6  col-lg-6"></div>
            <div class="col-xs-24 col-sm-24  col-md-12  col-lg-12">
                <div class="form-group">
                    <div class="input-group" style="width:100%">
                        <span class="input-group-addon tms-addon">
                         CHỌN ĐƠN VỊ CẦN XEM BÁO CÁO
                        </span>
                        <select id="department_id" class="form-control input-sm"onchange="load_static_donvi_chitiet()">
                        </select>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div id="load_data"></div>

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

</div>


<div class="row">
<div class="col-xs-24 col-sm-24 col-md-12">
  <div id="tms">
    <h2>BIỂU 1. TỔNG HỢP ĐIỂM ĐÁNH GIÁ THỰC HÀNH 5 S TẠI 1 ĐƠN VỊ Ở MỘT LẦN ĐÁNH GIÁ</h2>
    <div class="tms_list">
        <!-- BEGIN: donvi -->    
            <ul>
                <!-- BEGIN: loop -->
                 <li><a href="{LAN.donvi}" title="{LAN.title}">{LAN.title} thời gian từ ngày {LAN.time_from} đến hết ngày {LAN.time_to}</a></li>
                <!-- END: loop -->
            </ul> 
        <!-- END: donvi -->
    </div>
    </div>  
</div>
<div class="col-xs-24 col-sm-24 col-md-12">
  <div id="tms">
    <h2>BIỂU 2. TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5 S TẠI CÁC KHU VỰC KHÁC NHAU Ở MỘT LẦN ĐÁNH GIÁ</h2>
    <div class="tms_list">
        <!-- BEGIN: phongban -->    
            <ul>
                <!-- BEGIN: loop -->
                 <li><a href="{LAN.tochuc}" title="{LAN.title}">{LAN.title} thời gian từ ngày {LAN.time_from} đến hết ngày {LAN.time_to}</a></li>
                <!-- END: loop -->
            </ul> 
        <!-- END: phongban -->
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