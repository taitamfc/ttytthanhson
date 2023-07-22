<!-- BEGIN: main -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
<form action="{NV_BASE_ADMINURL}index.php" method="get">
	<input type="hidden" name="{NV_LANG_VARIABLE}"  value="{NV_LANG_DATA}" />
	<input type="hidden" name="{NV_NAME_VARIABLE}"  value="{MODULE_NAME}" />
	<input type="hidden" name="{NV_OP_VARIABLE}"  value="{OP}" />  

<div class="row">

<!-- BEGIN: time_book -->
<div class="col-lg-4 col-md-8 col-sm-12 col-xs-24">

	<div class="form-group">
		<div class="input-group">
							<span class="input-group-addon">{LANG.time_book}</span>
							<select class="form-control" name="ftime_book">
								<!-- BEGIN: select_option_loop -->
								<option {selected_time_book} value="{SELECTVALUE}">
									{SELECTNAME}
								</option>
								<!-- END: select_option_loop -->
							</select>
			</div>
	</div>
	
</div>
<!-- END: time_book -->


<!-- BEGIN: doctor -->
<div class="col-lg-4 col-md-8 col-sm-12 col-xs-24">

	<div class="form-group">
		<div class="input-group">
							<span class="input-group-addon">{LANG.doctor}</span>
							<select class="form-control" name="fdoctor">
								<!-- BEGIN: select_option_loop -->
								<option {selected_doctor} value="{SELECTVALUE}">
									{SELECTNAME}
								</option>
								<!-- END: select_option_loop -->
							</select>
			</div>
	</div>
	
</div>
<!-- END: doctor -->


<div class="col-lg-4 col-md-8 col-sm-12 col-xs-24">

	<div class="form-group">
	<div class="input-group">
					<span class="input-group-addon">{LANG.ngay_tu}</span>
					<input id="ngaytu" type="text" maxlength="255" class="form-control disabled" value="{ngay_tu}" name="ngay_tu"  placeholder="{LANG.ngay_tu}">
	</div>
	</div>


</div>

<div class="col-lg-4 col-md-8 col-sm-12 col-xs-24">
		<div class="form-group">
	<div class="input-group">
					<span class="input-group-addon">{LANG.ngay_den}</span>
					<input id="ngayden" type="text" maxlength="255" class="form-control disabled" value="{ngay_den}" name="ngay_den"  placeholder="{LANG.ngay_den}">
	</div>
	</div>
</div>


<div class="col-lg-4 col-md-8 col-sm-12 col-xs-24">
<center>
<div class="form-group">	
<div class="input-group ">

<input type="checkbox" value="1" name="export_word"> {LANG.export_excel}
<input class=" btn btn-success" type="submit" value="Tìm kiếm">
	
</div>
</div>
</center>
</div>
</div>
</form>	

<script type="text/javascript">


//<![CDATA[
	$("#ngaytu,#ngayden").datepicker({
		dateFormat : "dd/mm/yy",
		changeMonth : true,
		changeYear : true,
		showOtherMonths : true,
	});

</script>

<div style="clear: both;"></div>


<!-- BEGIN: empty -->
<div class="alert alert-info">{LANG.no_row_contact}</div>
<!-- END: empty -->
<!-- BEGIN: data -->
<form name="myform" id="myform" method="post" action="{FORM_ACTION}">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<colgroup>
				<col class="w10" />
				<col/>
				<col/>
				<col/>
			</colgroup>
			<thead>
				<tr>
					<th class="text-center"><input name="check_all[]" type="checkbox" value="yes" onclick="nv_checkAll(this.form, 'sends[]', 'check_all[]',this.checked);" /></th>
					<th>{LANG.time_book}</th>
					<th>{LANG.doctor}</th>
					<th>{LANG.name_user_send_title}</th>
					<th>{LANG.send_time}</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td class="text-center"><input name="check_all[]" type="checkbox" value="yes" onclick="nv_checkAll(this.form, 'sends[]', 'check_all[]',this.checked);" /></td>
					<td colspan="5">
                        <a class="btn btn-default" href="javascript:void(0);" onclick="nv_del_submit(document.myform, 'sends[]');"><em class="fa fa-trash-o fa-lg">&nbsp;</em> {LANG.bt_del_row_title}</a> &nbsp;
                        <a class="btn btn-default" href="javascript:void(0)" onclick="nv_delall_submit();"><em class="fa fa-trash-o">&nbsp;</em> {LANG.delall}</a> &nbsp;
                        <a class="btn btn-default" href="javascript:void(0);" onclick="multimark('#myform','unread');"><em class="fa fa-bookmark">&nbsp;</em> {LANG.mark_as_unread}</a> &nbsp;
                        <a class="btn btn-default" href="javascript:void(0);" onclick="multimark('#myform','read');"><em class="fa fa-bookmark-o">&nbsp;</em> {LANG.mark_as_read}</a>&nbsp;
                    </td>
				</tr>
			</tfoot>
			<tbody>
				<!-- BEGIN: row -->
				<tr>
					<td class="text-center"><input name="sends[]" type="checkbox" value="{ROW.id}" onclick="nv_UncheckAll(this.form, 'sends[]', 'check_all[]', this.checked);" /></td>
					
					<td {ROW.style} {ROW.onclick}> {ROW.time_book}</td>
					<td {ROW.style} {ROW.onclick}> {ROW.doctor}</td>
					<td {ROW.style} {ROW.onclick}> {ROW.sender_name}</td>

					<td {ROW.style} {ROW.onclick}> {ROW.time}</td>
				</tr>
				<!-- END: row -->
			</tbody>
		</table>
	</div>
</form>
<!-- BEGIN: generate_page -->
	<div class="text-center">{GENERATE_PAGE}</div>
<!-- END: generate_page -->
<!-- END: data -->
<script type="text/javascript">
	function open_browse_forward() {
		nv_open_browse('{NV_BASE_ADMINURL}index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '={MODULE_NAME}&' + nv_fc_variable + '=forward&id=1', 'NVImg', 850, 500, 'resizable=no,scrollbars=no,toolbar=no,location=no,status=no');
	}
</script>
<!-- END: main -->