<!-- BEGIN: main -->
<form class="form_search" action="{NV_BASE_SITEURL}index.php" method="get">
	<input type="hidden" name="{NV_LANG_VARIABLE}"  value="{NV_LANG_DATA}" />
	<input type="hidden" name="{NV_NAME_VARIABLE}"  value="{MODULE_NAME}" />
	<input type="hidden" name="{NV_OP_VARIABLE}"  value="{OP}" />
	<div class="row">
		<div class="col-xs-24 col-md-6">
			<div class="form-group">
				<input class="form-control" type="text" value="{ma_bn}" name="ma_bn" maxlength="255" placeholder="{LANG.search_title}" />
			</div>
		</div>
		<div class="col-xs-12 col-md-3">
			<div class="form-group">
				<span class="btn btn-primary search_submit">{LANG.search_submit}</span>
			</div>
		</div>
	</div>
</form>

<script>
	
	$('.search_submit').click(function(){
	
		var ma_bn = $('.form_search input[name=ma_bn]').val();
		if(ma_bn == '')
		{
			alert('{LANG.no_ma_bn}');
		}
		else
		{
			$.ajax({
				type : 'GET',
				url : 'http://27.72.76.115:8181/api/lich-su-kham-benh/get-all/BN000159017' ,
				dataType: 'json',
				success : function(res){
				//var myObj = JSON.parse(res);
					console.log(res);
				}			
			});
		}
	});

</script>
<!-- END: main -->