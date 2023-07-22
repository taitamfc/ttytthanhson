<!-- BEGIN: main -->
<div class="tms_body">
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
                    <th class="text-center"style="width: 90px;vertical-align: middle;">Điểm trung bình</th>
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
</div>   


<script type="text/javascript">
$(document).ready(function() {$("[data-rel='block_tooltip'][data-content!='']").tooltip({
    placement: "top",
    html: true,
    title: function(){return ( $(this).data('img') == '' ? '' : '' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<!-- END: main -->