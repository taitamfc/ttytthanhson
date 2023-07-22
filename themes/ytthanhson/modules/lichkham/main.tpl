<!-- BEGIN: main -->
<section class="container1903 home15">
    <div class="container12 sec33_row">
        <div class="d_flex">
         <div class="sec33_col1">
			<p><span>Lưu ý</span></p>
			<p><b>Quý khách vui lòng gửi thông tin chi tiết để chúng tôi có thể sắp xếp cuộc hẹn.</b></p>
			<hr>
			
				<p>+ Lịch hẹn có hiệu lực sau khi được xác nhận chính thức từ TTYT Thanh Sơn.</p>
				<p>+ Vui lòng cung cấp thông tin chính xác để được phục vụ tốt nhất. Trong trường hợp cung cấp sai thông tin email &amp; điện thoại, việc xác nhận cuộc hẹn sẽ không hiệu lực.</p>
				<p>+ Quý khách sử dụng dịch vụ Đặt hẹn trực tuyến, xin vui lòng đặt trước ít nhất là 24 giờ trước khi đến khám.</p>
				<p>+ Trong những trường hợp khẩn cấp hoặc nghi ngờ có các triệu chứng nguy hiểm, quý khách nên ĐẾN TRỰC TIẾP hoặc trung tâm y tế gần nhất để kịp thời xử lý.</p>
         
		 </div>  
                        
            <div class="sec33_col2">
                <div class="entry-loop__row">
                	<div class="form_register">
                        <div class="form_title"><h1><span>Đặt lịch khám</span></h1></div>                       
                       <form id="myForm" name="myform" action="{LINK_FORM}" method="POST" onsubmit="return ValidateFrmContact(this)">
						<input type="hidden" name="sta" value="dangkykhambenh">
						<input type="text" name="name" placeholder="Họ và tên (*)" aria-label="Họ và tên">
						<input type="text" name="phone" placeholder="Số điện thoại (*)" aria-label="Số điện thoại">
						
						<select name="danhmuckham" >
							<option value="No_Select">Chọn Lựa chọn khám </option>
							<!-- BEGIN: loop -->
							<option value="{r.id}" {r.select}>{r.name}</option>
							<!-- END: loop -->
						</select>
						<input type="text" name="email" placeholder="Email" aria-label="Email">
						<textarea name="note" id="note" rows="5" cols="25" placeholder="Triệu chứng" aria-label="Triệu chứng"></textarea>
						<input type="hidden" name="ip" value="{DATA.ip}" placeholder="IP">
						<input type="hidden" name="status" value="3" placeholder="Status">
						<button type="submit" name="submit"><span>Đặt lịch khám</span></button>
						</form>           
					</div>
                </div>
            </div>
     </div>
 </div>
</section>
<!-- END: main -->
<!-- BEGIN: sendmail -->
	
	<div style="text-align: left;"><strong>Xin chào Quản trị website Trung tâm y tế Thanh Sơn</strong></div>
	<div style="text-align: justify;">Chức năng <strong>Đặt lịch khám Online </strong> 
	vừa nhận được 1 yêu cầu khám bệnh thông tin cụ thể như sau:<br />
	Họ tên: <strong>{row.hoten}</strong><br />
	Số điện thoại: <strong>{row.dienthoai}</strong><br />
	Lựa chọn khám: <strong>{row.danhmuckham}</strong><br />
	Email: <strong>{row.email}</strong><br />
	Ghi chú: <strong>{row.note}</strong><br />
	Đăng ký vào lúc: <strong>{row.ngaydangky}<br /></strong>
	Trân trọng.!<br />
	Đây là hệ thống gửi mail tự động, vui lòng không nhấn trả lời thư này.</div>	
	
<!-- END: sendmail -->
	
	