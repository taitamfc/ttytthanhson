<!-- BEGIN: main -->

<div class="tms_body"id="div_print">
              <table style="width: 100%;margin-bottom: 20px;">
                <tr>
                    <th class="text-center" rowspan="4"style="width: 200px; vertical-align: middle; "><img src="{CONFIG.logo}"style="width: 100%;height: auto;"></th>
                   </tr>   
                     <tr>
                      <th class="text-left"colspan="12" style="vertical-align: middle; padding-left: 20px;">TỔNG HỢP ĐIỂM ĐÁNH GIÁ THỰC HÀNH 5 S TẠI 1 ĐƠN VỊ Ở MỘT LẦN ĐÁNH GIÁ</th>
                    </tr>
                     <tr>
                      <th class="text-left"colspan="12" style="vertical-align: middle;padding-left: 20px;">Tên bệnh viện/khoa: {CONFIG.tendonvi}</th>
                    </tr>
                    <tr>
                     
                      <th class="text-left" colspan="12"style="vertical-align: middle;padding-left: 20px;">Đơn vị được đánh giá: {DONVI_VOTE}</th>
                    </tr>             
         </table>

<!-- BEGIN: cat -->
<div id="tms">
<h2>{CAT.title}</h2>
<div class="tms_list">
<ul>
<!-- BEGIN: loop -->    
<li><strong>{LOOP.stt}. {LOOP.username}:</strong> ({LOOP.time_add}) điểm trung bình: <strong>{LOOP.trungbinh}</strong>. Nhận xét: {LOOP.note} </li>
<!-- END: loop -->
</ul> 
</div>
</div>
<!-- END: cat -->
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
</script>


<!-- END: main -->