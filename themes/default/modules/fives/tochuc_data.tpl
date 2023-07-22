<!-- BEGIN: main -->
<div class="tms_body">
	<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th class="text-center"colspan="11" style="vertical-align: middle;">TỔNG HỢP KẾT QUẢ ĐÁNH GIÁ 5 S TẠI CÁC KHU VỰC KHÁC NHAU Ở MỘT LẦN ĐÁNH GIÁ</th>
                    
                </tr> 
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
</div>   


<script type="text/javascript">
$(document).ready(function() {$("[data-rel='block_tooltip'][data-content!='']").tooltip({
    placement: "top",
    html: true,
    title: function(){return ( $(this).data('img') == '' ? '' : '' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<!-- END: main -->