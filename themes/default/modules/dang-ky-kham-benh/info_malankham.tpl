<!-- BEGIN: main -->
<div class="tms_box">
	<div class="tms_box_heading">
    {LANG.thongtinkham}
	</div>
<div class="tms_box_body">
	
<div class="thongtin_malankham">
<div class="ngay_kham">{LANG.ngaykham}: {date_kham} </div>
<ul>	
	<li>
	
		<a href="{thongtinhanhchinh}" title="{LANG.thongtinhanhchinh}" class="thongtinhanhchinh" > 
			<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/dang-ky-kham-benh/thong_tin_hanh_chinh.png" style="height:40px;width:80px"class=" pull-left"> <span>{LANG.thongtinhanhchinh}</span>
		</a>
	</li>
	
	<li>
		<a href="{thongtinkham}" title="{LANG.thongtinkham}" class="thongtinkham" > 
			<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/dang-ky-kham-benh/thong_tin_kham_chua_benh.png" style="height:40px;width:80px"class=" pull-left"> <span>{LANG.thongtinkham}</span>
		</a>
	</li>
	
	<li>
		<a href="{donthuoc}" title="{LANG.donthuoc}" class="donthuoc" > 
			<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/dang-ky-kham-benh/don_thuoc.png" style="height:40px;width:80px"class=" pull-left"> <span>{LANG.donthuoc}</span>
		</a>
	</li>
	
	<li>
		<a href="{ketquaxetnghiem}" title="{LANG.ketquaxetnghiem}" class="ketquaxetnghiem" > 
			<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/dang-ky-kham-benh/ket_qua_xet_nghiem.png" style="height:40px; width:80px"class=" pull-left"> <span>{LANG.ketquaxetnghiem}</span>
		</a>
	</li>
	
	<li>
		<a href="{cdha_tdcn}" title="{LANG.cdha_tdcn}" class="cdha_tdcn" > 
			<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/dang-ky-kham-benh/ket_qua_cdha_tdcn.png" style="height:40px;width:80px"class=" pull-left"> <span>{LANG.cdha_tdcn}</span>
		</a>
	</li>
	
	<li>
		<a href="{ketqua_chupphim}" title="{LANG.ketqua_chupphim}" class="ketqua_chupphim" > 
			<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/dang-ky-kham-benh/ket_qua_phim.png" style="height:40px;width:80px"class=" pull-left"> <span>{LANG.ketqua_chupphim}</span>
		</a>
	</li>
</ul>
</div>
<div class="tms_box_botom" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> {LANG.back}</div>
<div class="tms_box_thoat"><i class="fa fa-sign-out" aria-hidden="true"></i> {LANG.exit_tms}</div>
</div>
</div>

<script>
function goBack() {
    window.history.back();
}
$('.tms_box_thoat').click(function(){
		var logout = 1;
		$.ajax({
				type : 'POST',
				url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
				data : { logout : logout},
				success : function(res){
				window.location = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name;	
				}			
		});
		
	
	});
	$('.thongtinhanhchinh').click(function(){
		
			var thongtinhanhchinh = 1;
			var ngaykham = $(this).attr('ngaykham');
			$.ajax({
					type : 'POST',
					url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
					data : { thongtinhanhchinh : thongtinhanhchinh, ngaykham : ngaykham},
					success : function(res){
						if(res != '')
						$('.result_search').html(res);
					}			
			});
		
	});
	
	$('.thongtinkham').click(function(){
		
			var thongtinkham = 1;
			var malankham = $(this).attr('malankham');
			var ngaykham = $(this).attr('ngaykham');
			$.ajax({
					type : 'POST',
					url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
					data : { thongtinkham : thongtinkham, malankham : malankham, ngaykham : ngaykham },
					success : function(res){
						if(res != '')
						$('.result_search').html(res);
					}			
			});
		
	});
	
	
	$('.donthuoc').click(function(){
		
			var donthuoc = 1;
			var malankham = $(this).attr('malankham');
			var ngaykham = $(this).attr('ngaykham');
			$.ajax({
					type : 'POST',
					url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
					data : { donthuoc : donthuoc, malankham : malankham, ngaykham : ngaykham },
					success : function(res){
						if(res != '')
						$('.result_search').html(res);
					}			
			});
		
	});
	
	
	$('.ketquaxetnghiem').click(function(){
		
			var ketquaxetnghiem = 1;
			var malankham = $(this).attr('malankham');
			var ngaykham = $(this).attr('ngaykham');
			$.ajax({
					type : 'POST',
					url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
					data : { ketquaxetnghiem : ketquaxetnghiem, malankham : malankham, ngaykham : ngaykham },
					success : function(res){
						if(res != '')
						$('.result_search').html(res);
					}			
			});
		
	});
	
	
	$('.cdha_tdcn').click(function(){
		
			var cdha_tdcn = 1;
			var malankham = $(this).attr('malankham');
			var ngaykham = $(this).attr('ngaykham');
			$.ajax({
					type : 'POST',
					url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
					data : { cdha_tdcn : cdha_tdcn, malankham : malankham, ngaykham : ngaykham },
					success : function(res){
						if(res != '')
						$('.result_search').html(res);
					}			
			});
		
	});
	
	
	$('.ketqua_chupphim').click(function(){
		
			var ketqua_chupphim = 1;
			var malankham = $(this).attr('malankham');
			var ngaykham = $(this).attr('ngaykham');
			$.ajax({
					type : 'POST',
					url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
					data : { ketqua_chupphim : ketqua_chupphim, malankham : malankham, ngaykham : ngaykham },
					success : function(res){
						if(res != '')
						$('.result_search').html(res);
					}			
			});
		
	});
	
	
	
	
	
	
	

</script>


<!-- END: main -->