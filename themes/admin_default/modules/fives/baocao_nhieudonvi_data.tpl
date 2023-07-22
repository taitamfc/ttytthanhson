<!-- BEGIN: main -->

<div class="tms_body"id="div_print">
	<div class="table-responsive">
               <table style="width: 100%;margin-bottom: 20px;">
                <tr>
                    <th class="text-center" rowspan="3"style="width: 200px; vertical-align: middle; "><img src="{CONFIG.logo}"style="width: 100%;height: auto;"></th>
                    <th class="text-center"colspan="12" style="vertical-align: middle;">BIỂU 2</th>
                   </tr>   
                     <tr>
                      <th class="text-left"colspan="12" style="vertical-align: middle; padding-left: 20px;">TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5 S TẠI CÁC KHU VỰC KHÁC NHAU Ở MỘT LẦN ĐÁNH GIÁ</th>
                    </tr>
                     <tr>
                      <th class="text-left"colspan="6" style="vertical-align: middle;padding-left: 20px;">Tên bệnh viện/khoa: {CONFIG.tendonvi}</th>
                      <th class="text-left"colspan="6" style="vertical-align: middle;padding-left: 20px;">Lần đánh giá: {LANDANHGIA}</th>
                    </tr>            
         </table>

        <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th class="text-center" rowspan="2"style="width: 200px; vertical-align: middle;">Đơn vị</th>
                    <th class="text-center" rowspan="2"style="width: 90px;vertical-align: middle;">Lần ĐG</th>
                    <th class="text-center"colspan="9">Điểm đánh giá</th>
                </tr>
                <tr>
                    <th class="text-center"style="width: 90px;vertical-align: middle;">{LANG.trungbinh}</th>
                    <!-- BEGIN: cats -->
                    <th class="text-center"style="width: 90px;vertical-align: middle;">{CATS.title}</th>
                     <!-- END: cats -->
                </tr>
         
            <tbody>
            	<!-- BEGIN: loop -->
                    <tr>
                    <td class="text-center"> {DONVI.name_department} </td>
                    <td class="text-center"> {DONVI.number} </td>
                    <td class="text-center"> {DONVI.trungbinh} </td>
                     <!-- BEGIN: cats -->
                     <td class="text-center"> 
                        {CATS.tongdiem}
                     </td>
                     <!-- END: cats -->
                 
                </tr>
                <!-- END: loop -->
                <tr>
                    <td class="text-center" colspan="2"><strong>Điểm trung bình theo cột<strong></td>
                     <td class="text-center">{TONGTRUNGBINH}</td>
                   <!-- BEGIN: cat_tong -->
                    <td class="text-center"> {CAT_TONG}</td>
                    <!-- END: cat_tong -->
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

<script src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/chart/chart.min.js"></script>
<script src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/chart/chartstat.js"></script>


<div class="panel panel-primary">
    <div class="panel-heading"><i class="fa fa-line-chart fa-fw"></i>TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5 S TẠI CÁC KHU VỰC KHÁC NHAU Ở MỘT LẦN ĐÁNH GIÁ</div>
    <div class="panel-body">
<canvas id="line-chart" style="width:100%; min-width:800px; height:400px" ></canvas>
<script>
new Chart(document.getElementById("line-chart"), {
  type: 'bar',

  data: {
    labels: [<!-- BEGIN: donvitk -->'{DONVITK.name_department}',<!-- END: donvitk -->],
    datasets: [
         {
        data: [<!-- BEGIN: tktrungbinh --> {DONVI.trungbinh},<!-- END: tktrungbinh -->],
        label: "Điểm trung bình",
        borderColor: "#8ca7ff",
        backgroundColor: "#8ca7ff",
        fill: false
      },
      
   
      
    ],
  },

  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});
</script>
    </div>
    <div class="panel-footer">
       Tổng trung bình: <strong>{TONGTRUNGBINH}</strong> - Truy cập website: <strong>{CTSDM.totalweb} ({CTSDM.phantramweb}%)</strong> - Truy cập sàn: <strong>{CTSDM.totalsan} ({CTSDM.phantramsan}%)</strong>
    </div>
</div>


<!-- END: main -->