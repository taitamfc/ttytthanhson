<!-- BEGIN: main -->
<form class="form_search" action="{NV_BASE_SITEURL}index.php" method="get">
	<div class="tms_box">
	<div class="tms_box_heading">
		{LANG.change_password}
	</div>
	<div class="tms_box_body">

		<div class="form-group">
				<label class="col-sm-3 control-label"><strong>{LANG.ma_bn}</strong></label>
				<div class="col-sm-21">
					<input readonly="readonly" class="form-control" name="ma_bn" type="text" value="{ma_bn}" maxlength="255" />
				</div>
		</div>
		
		<div class="form-group">
				<label readonly="readonly" class="col-sm-3 control-label"><strong>{LANG.password_old}</strong></label>
				<div class="col-sm-21">
					<input class="form-control" name="password" type="password" value="" maxlength="255" />
				</div>
		</div>
		
		<div class="form-group">
				<label class="col-sm-3 control-label"><strong>{LANG.password_new}</strong></label>
				<div class="col-sm-21">
					<input class="form-control" name="password_new" type="password" value="{password_new}" maxlength="255" />
				</div>
		</div>
		
		<div class="form-group">
				<label class="col-sm-3 control-label"><strong>{LANG.password_new_nhaplai}</strong></label>
				<div class="col-sm-21">
					<input class="form-control" name="password_new_nhaplai" type="password" value="{password_new_nhaplai}" maxlength="255" />
				</div>
		</div>
			
		
		<div class="form-group text-center">
			<span class="btn btn-primary search_submit">{LANG.change_password_sumit}</span>
		</div>
		<div class="tms_box_botom" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> {LANG.back}</div>
<div class="tms_box_thoat"><i class="fa fa-sign-out" aria-hidden="true"></i> {LANG.exit_tms}</div>
		</div>
</div>
</form>

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
			$('.form_search input[name=password]').focus();
			return false;
		}
		
		var password_new = $('.form_search input[name=password_new]').val();
		if(password_new == '')
		{
			alert('{LANG.no_password_new}');
			$('.form_search input[name=password_new]').focus();
			return false;
		}
		
		var password_new_nhaplai = $('.form_search input[name=password_new_nhaplai]').val();
		if(password_new_nhaplai == '')
		{
			alert('{LANG.no_password_new_nhaplai}');
			$('.form_search input[name=password_new_nhaplai]').focus();
			return false;
		}
		
		if(password_new != password_new_nhaplai )
		{
			alert('{LANG.no_password_chuatrung}');
			$('.form_search input[name=password_new_nhaplai]').focus();
			return false;
		}
		
		if(password_new.length < 6)
		{
			alert('{LANG.no_6_password_new}');
			$('.form_search input[name=password_new]').focus();
			return false;
		}
		
		if(password_new_nhaplai.length < 6)
		{
			alert('{LANG.no_6_password_new_nhaplai}');
			$('.form_search input[name=password_new_nhaplai]').focus();
			return false;
		}
		
		
		$.ajax({
				type : 'POST',
				url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
				data : { ma_bn_active : ma_bn, password : password, password_new : password_new, password_new_nhaplai : password_new_nhaplai },
				success : function(res){
					
					if(res == 1)
					{
						window.location = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=information';
					}
					else
					{
						alert('{LANG.login_no_succes}');
					}
					
				}			
		});
		
	
	});
	
	
</script>
<!-- END: main -->