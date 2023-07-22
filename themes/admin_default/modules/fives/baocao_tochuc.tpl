<!-- BEGIN: main -->
<div class="tms_body"id="div_print">

        <table style="width: 100%;margin-bottom: 20px;">
                <tr>
                    <th class="text-center" rowspan="3"style="width: 200px; vertical-align: middle; "><img src="{CONFIG.logo}"style="width: 100%;height: auto;"></th>
                    <th class="text-center"colspan="12" style="vertical-align: middle;">BIỂU 4</th>
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
                    <th class="text-center" rowspan="2"style="width: 200px; vertical-align: middle;">Khoa/phòng/khu vực được ĐG</th>
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
<div class="text-center hidden-print">
<input name="b_print" type="button" class="btn btn-info btn-sm"   onClick="printdiv('div_print');" value=" In báo cáo ">
</div>

</div>   

<script type="text/javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
    
$(document).ready(function() {$("[data-rel='block_tooltip'][data-content!='']").tooltip({
    placement: "top",
    html: true,
    title: function(){return ( $(this).data('img') == '' ? '' : '' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<!-- END: main -->