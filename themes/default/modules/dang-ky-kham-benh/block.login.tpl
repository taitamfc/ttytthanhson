<!-- BEGIN: main -->
<form class="form_search" action="{NV_BASE_SITEURL}index.php" method="get">

	<div class="row1">
		
		<div class="form-group">
				<label class="col-sm-3 control-label"><strong>{LANG.ma_bn}</strong></label>
				<div class="col-sm-21">
					<input class="form-control" name="ma_bn" type="text" value="{ma_bn}" maxlength="255" />
				</div>
		</div>
		
		<div class="form-group">
				<label class="col-sm-3 control-label"><strong>{LANG.password}</strong></label>
				<div class="col-sm-21">
					<input class="form-control" name="password" type="text" value="{password}" maxlength="255" />
				</div>
		</div>
			
		
		<div class="form-group text-center">
			<span class="btn btn-primary search_submit">{LANG.search_submit}</span>
		</div>
		
	</div>
</form>

<script>
	
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
				
					if(res == 1)
					{
						alert('{LANG.login_succes}');
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