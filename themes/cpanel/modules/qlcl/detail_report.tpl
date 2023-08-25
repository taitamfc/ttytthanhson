<!-- BEGIN: main -->
<style>
.phanhang{white-space:pre-wrap; word-wrap:break-word}
</style>
<!-- Page-header start -->
<div class="card">
    <div class="card-block">
        <h5 class="m-b-10" style="text-transform: uppercase;">{BC.chi_so}</h5>
    </div>
</div>
<!-- Page-header end -->
<div class="card-block" id="block_rp">
	<div style="text-align: center;">
	<strong>SỞ Y TẾ PHÚ THỌ<br /> TRUNG TÂM Y TẾ HUYỆN THANH SƠN<br /> <br /> 
	THỐNG KÊ KẾT QUẢ ĐÁNH GIÁ CỦA CÁC KHOA/PHÒNG</strong>
	<br /> 
		<div class="col-sm-12">
			<table  class="table table-bordered">
				<thead>
				<tr >
				<th class="text-center col-1 align-middle ">STT</th>
				<th class="text-center  align-middle">KHOA/PHÒNG</th>
				<th class="text-center  align-middle">Lần đánh giá</th>
				<th class="text-center  align-middle">Ngày đánh giá</th>
				<th class="text-center  align-middle">Trạng thái</th>
				<th class="text-center  align-middle">Chi tiết</th>
				</tr>
				</thead>
				
				<tbody>
				<!-- BEGIN: chitiet -->
				<tr >
				<td class="text-center col-1 align-middle ">{ROW.stt}</td>
				<td class="text-center  align-middle" style="text-transform: uppercase;">{ROW.account}</td>
				<td class="text-center  align-middle">{ROW.lannhap}</td>
				<td class="text-center  align-middle">{ROW.ngaynhap}</td>
				<td class="text-center  align-middle">
				<label class="label {ROW.tt_color}"><b>{ROW.tt}</b></label> </td>
				<td class="text-left phanhang">
				<!-- BEGIN: chiso -->
				<b>{CS.giatri}:</b><b>{CS.kq}</b>
				<!-- END: chiso -->
				
				</td>
				</tr>
				<!-- END: chitiet -->
				</tbody>
			<table>
		</div>
		</div>			
	</div>
</div>


    <!-- Basic table card start -->
    <div class="card">
        <span id="resurt"></span>
    </div>
    <!-- Basic table card end -->
</div>



<!-- END: main -->
