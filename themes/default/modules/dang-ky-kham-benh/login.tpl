<!-- BEGIN: main -->
<form class="form_search" action="{NV_BASE_SITEURL}index.php" method="get">
	<div class="tms_box">
	<div class="tms_box_heading">
		{LANG.dangnhap}
	</div>
	<div class="tms_box_body">

		<div class="form-group">
				<label class="col-sm-3 control-label"><strong>{LANG.ma_bn}</strong></label>
				<div class="col-sm-21">
					<input class="form-control" name="ma_bn" type="text" value="{ma_bn}" maxlength="255" />
				</div>
		</div>
		
		<div class="form-group">
				<label class="col-sm-3 control-label"><strong>{LANG.password}</strong></label>
				<div class="col-sm-21">
					<input class="form-control" name="password" type="password" value="{password}" maxlength="255" />
				</div>
		</div>
			
		
		<div class="form-group text-center">
			<span class="btn btn-primary search_submit">{LANG.search_submit}</span>
		</div>
		
		<div class="form-group text-center">
		{LANG.user_note}
		</div>
		
		</div>
</div>
</form>

<script>

	$('.form_search input[name=ma_bn]').change(function(){
		
		var ma_bn = $('.form_search input[name=ma_bn]').val();
		if(ma_bn == '')
		{
			alert('{LANG.no_ma_bn}');
			return false;
		}
		
		$.ajax({
				type : 'POST',
				url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
				data : { ma_bn_ajax : ma_bn},
				success : function(res){
					
					$('.form_search input[name=ma_bn]').val(res);
					
				}			
		});
		
	
	});
	
	$('.search_submit').click(function(){
	
		var ma_bn = $('.form_search input[name=ma_bn]').val();
		if(ma_bn == '')
		{
			alert('{LANG.no_ma_bn}');
			return false;
		}
		
		var password = $('.form_search input[name=password]').val();
		if(password == '')
		{
			alert('{LANG.no_password}');
			return false;
		}
		
		
		
		
		$.ajax({
				type : 'POST',
				url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
				data : { ma_bn : ma_bn, password : password},
				success : function(res){
					//alert(res)
					if(res == 1)
					{
						window.location = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=information';
					}
					else if(res == 2)
					{
						window.location = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=change-password';
					}
					else
					{
						alert('{LANG.login_no_succes}');
					}
					//var myObj = JSON.parse(res);
					console.log(res);
				}			
		});
		
	});

</script>
<!-- END: main -->