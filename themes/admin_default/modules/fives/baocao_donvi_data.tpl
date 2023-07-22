<!-- BEGIN: main -->

<div class="tms_body"id="div_print">
              <table style="width: 100%;margin-bottom: 20px;">
                <tr>
                    <th class="text-center" rowspan="3"style="width: 200px; vertical-align: middle; "><img src="{CONFIG.logo}"style="width: 100%;height: auto;"></th>
                    <th class="text-center"colspan="12" style="vertical-align: middle;">BIỂU 1</th>
                   </tr>   
                     <tr>
                      <th class="text-left"colspan="12" style="vertical-align: middle; padding-left: 20px;">TỔNG HỢP ĐIỂM ĐÁNH GIÁ THỰC HÀNH 5 S TẠI 1 ĐƠN VỊ Ở MỘT LẦN ĐÁNH GIÁ</th>
                    </tr>
                     <tr>
                      <th class="text-left"colspan="6" style="vertical-align: middle;padding-left: 20px;">Tên bệnh viện/khoa: {CONFIG.tendonvi}</th>
                      <th class="text-left"colspan="6" style="vertical-align: middle;padding-left: 20px;">Đơn vị được đánh giá: {DONVI_VOTE}</th>
                    </tr>            
         </table>


	<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
     
                <tr>
                    <th class="text-center" rowspan="2"style="vertical-align: middle;">{LANG.noidungdanhgia}</th>
                    <th class="text-center"colspan="8"style="vertical-align: middle;">Mức độ đánh giá(Tổng các tiêu chí từng nội dung đánh giá theo cột)</th>
                   
                </tr>
                <tr>
                   
                    <td class="text-center" style="width: 160px;">{LANG.trungbinh}</td>
                    <!-- BEGIN: rank -->
                    <td class="text-center"style="width: 90px;">{RANK.numer_rank}</td>
                     <!-- END: rank -->
                </tr>
         
            <tbody>
            	<!-- BEGIN: loop -->
                    <tr>
                    <td> {LOOP.title} </td>
                    <td class="text-center"> {LOOP.trungbinh} </td>
                     <!-- BEGIN: rank -->
                     <td class="text-center"> 
                        {RANKLOOP.hienthi}
                     </td>
                     <!-- END: rank -->
                </tr>
                <!-- END: loop -->
				<tr>
                	<td class="text-center"colspan="2">Tổng số tiêu chí theo cột</td>
                    <!-- BEGIN: rank_tong -->
                    <td class="text-center"> {RANK_TONG}</td>
                    <!-- END: rank_tong -->
                </tr>
                <tr>
                    <td class="text-center" colspan="2">Điểm nhân theo cột</td>
                     <!-- BEGIN: rank_nhan -->
                    <td class="text-center">{RANK_NHAN}</td>
                    <!-- END: rank_nhan -->
                </tr>
                <tr>
                    <td class="text-center" colspan="2">Điểm trung bình của các nội dung đánh giá</td>
                    <td class="text-center" colspan="6">{TONGTRUNGBINH}</td>
    
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
</script>


<!-- END: main -->