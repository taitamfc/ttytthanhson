<!-- BEGIN: main -->

<div class="tms_body"id="div_print">
        <table style="width: 100%;margin-bottom: 20px;">
                <tr>
                    <th class="text-center" rowspan="3"style="width: 200px; vertical-align: middle; "><img src="{CONFIG.logo}"style="width: 100%;height: auto;"></th>
                    <th class="text-center"colspan="12" style="vertical-align: middle;">BIỂU 3</th>
                   </tr>   
                     <tr>
                      <th class="text-left"colspan="12" style="vertical-align: middle; padding-left: 20px;">TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5 S TẠI MỘT KHU VỰC Ở CÁC LẦN ĐG KHÁC NHAU</th>
                    </tr>
                     <tr>
                      <th class="text-left"colspan="6" style="vertical-align: middle;padding-left: 20px;">Tên bệnh viện/khoa: {CONFIG.tendonvi}</th>
                      <th class="text-left"colspan="6" style="vertical-align: middle;padding-left: 20px;">Khoa/khu vực: {DONVI_VOTE}</th>
                    </tr>            
         </table>

	<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
     
                <tr>
                    <th class="text-center" rowspan="2"style="vertical-align: middle;">Lần ĐG</th>
                    <th class="text-center" rowspan="2"style="vertical-align: middle;">Ngày ĐG</th>
                    <th class="text-center" rowspan="2"style="vertical-align: middle;">Người đánh giá</th>
                    <th class="text-center"colspan="9">Điểm đánh giá</th>
                    <th class="text-center"rowspan="2"style="vertical-align: middle;">Nhận xét (nếu có)</th>
                   
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
                    <td class="text-center">{VOTE.stt} </td>
                    <td class="text-center"> {VOTE.time_add} </td>
                    <td class="text-center"> {VOTE.userid} </td>
                    <td class="text-center"> {VOTE.trungbinh} </td>
                     <!-- BEGIN: cats -->
                     <td class="text-center"> 
                        {CATS2.tongdiem}
                     </td>
                     <!-- END: cats -->
                    <td class="text-center"> 
                     <!-- BEGIN: note -->   
                    <div data-content="<!-- BEGIN: loop --><strong>{NOTE.catsid}:</strong> {NOTE.note} <br/><!-- END: loop -->"data-rel="block_tooltip" data-original-title="" >Xem nhận xét</div>
                    <!-- END: note -->
                    </td>
                </tr>
                <!-- END: loop -->
			
                <tr>
                    <td class="text-center" colspan="3"><strong>Điểm trung bình theo cột<strong></td>
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
<!-- END: main -->