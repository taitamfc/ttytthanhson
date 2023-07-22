<!-- BEGIN: main -->
<div class="tms_body">
	<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th class="text-center"colspan="12">TỔNG HỢP ĐIỂM ĐÁNH GIÁ THỰC HÀNH 5 S TẠI 1 ĐƠN VỊ Ở MỘT LẦN ĐÁNH GIÁ <br/>Lần đánh giá: {LAN.title} (từ {LAN.time_from} đến {LAN.time_to}) </th>
                </tr>

                <tr>
                    <th class="text-center">Đơn vị được đánh giá: {DONVI_VOTE}  </th>
                    <th class="text-center"colspan="8">Mức độ đánh giá(Tổng các tiêu chí từng nội dung đánh giá theo cột)</th>
                   
                </tr>
                <tr>
                    <td class="text-center">{LANG.noidungdanhgia}</td>
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
</div>   



<!-- END: main -->