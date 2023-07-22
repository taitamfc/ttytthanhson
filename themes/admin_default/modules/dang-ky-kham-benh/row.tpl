<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-danger">{ERROR}</div>
<!-- END: error -->
<form method="post" action="{FORM_ACTION}">
	<input name="save" type="hidden" value="1" />
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<col class="w150"/>
			<col />
			<tbody>
				<tr>
					<td><strong>{LANG.part_row_title}</strong><sup class="required">(*)</sup></td>
					<td><input class="w300 form-control pull-left" type="text" value="{DATA.full_name}" name="full_name" id="idfull_name" maxlength="250" /></td>
				</tr>
				<tr>
                    <td><strong>{LANG.alias}</strong></td>
                    <td><input class="w300 form-control pull-left" type="text" name="alias" value="{DATA.alias}" id="idalias" maxlength="250" />&nbsp;<em class="fa fa-refresh fa-lg fa-pointer" onclick="get_alias('{ID}');">&nbsp;</em></td>
                </tr>
				
			
				
			
                <tr>
					<td><strong>{LANG.time_book}</strong></td>
					<td>
                        <!-- BEGIN: time_book -->
                        <fieldset class="m-bottom">
                            <input class="w300 form-control pull-left" type="text" name="time_book[]" value="{TIME_BOOK}" />&nbsp;<em class="fa fa-remove fa-pointer" onclick="removefieldset(this);">&nbsp;</em>
                        </fieldset>
                        <!-- END: time_book -->
                        <div class="template">
                            <fieldset class="m-bottom">
                                <input class="w300 form-control pull-left" type="text" name="time_book[]" value="" />
                            </fieldset>
                        </div>
                        <div class="new"></div>
                        <button type="button" class="btn btn-primary btn-sm" onclick="addfieldset(this);">{LANG.addNew}</button>
                    </td>
				</tr>   
				
				<tr>
					<td><strong>{LANG.doctor}</strong></td>
					<td>
                        <!-- BEGIN: doctor -->
                        <fieldset class="m-bottom">
                            <input class="w300 form-control pull-left" type="text" name="doctor[]" value="{DOCTOR}" />&nbsp;<em class="fa fa-remove fa-pointer" onclick="removefieldset(this);">&nbsp;</em>
                        </fieldset>
                        <!-- END: doctor -->
                        <div class="template">
                            <fieldset class="m-bottom">
                                <input class="w300 form-control pull-left" type="text" name="doctor[]" value="" />
                            </fieldset>
                        </div>
                        <div class="new"></div>
                        <button type="button" class="btn btn-primary btn-sm" onclick="addfieldset(this);">{LANG.addNew}</button>
                    </td>
				</tr>
				
				
				
				<tr>
					<td colspan="2">
					<p>
						<strong>{LANG.note_row_title}</strong>
					</p> {DATA.note} </td>
				</tr>
			</tbody>
		</table>
		<table class="table table-striped table-bordered table-hover">
			<caption><em class="fa fa-file-text-o">&nbsp;</em>{LANG.list_admin_row_title}</caption>
			<thead>
				<tr>
					<th>{LANG.username_admin_row_title}</th>
					<th>{LANG.name_admin_row_title}</th>
					<th>{GLANG.email}</th>
					<th>{LANG.admin_view_title}</th>
					<th>{LANG.admin_reply_title}</th>
					<th>{LANG.admin_send2mail_title}</th>
				</tr>
			</thead>
			<tbody>
				<!-- BEGIN: admin -->
				<tr {ADMIN.suspend}>
					<td>
						<img style="vertical-align:middle;" alt="{ADMIN.level}" src="{NV_BASE_SITEURL}themes/{NV_ADMIN_THEME}/images/{ADMIN.img}.png" width="38" height="18" />
						{ADMIN.username}
					</td>
					<td>{ADMIN.full_name}</td>
					<td>{ADMIN.email}</td>
					<td class="text-center"><input type="checkbox" name="view_level[]" value="{ADMIN.admid}"{ADMIN.view_level}{ADMIN.disabled} /></td>
					<td class="text-center"><input type="checkbox" name="reply_level[]" value="{ADMIN.admid}"{ADMIN.reply_level}{ADMIN.disabled} /></td>
					<td class="text-center"><input type="checkbox" name="obt_level[]" value="{ADMIN.admid}"{ADMIN.obt_level} /></td>
				</tr>
				<!-- END: admin -->
			</tbody>
		</table>
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<td class="text-center"><input name="submit1" type="submit" value="{GLANG.submit}" class="btn btn-primary" /></td>
			</tr>
		</table>
	</div>
</form>
<script type="text/javascript">
function removefieldset(a){
    var b = $(a).parent().parent();
    if(b.is(".template")) return!1;
    $(a).parent().remove();
    return!1
}
function addfieldset(a){
    var b = $(a).parent().find(".template").html();
    $(a).parent().find(".new").append(b);
    $(a).parent().find(".new fieldset").last().append('&nbsp;<em class="fa fa-remove fa-pointer" onclick="removefieldset(this);">&nbsp;</em>');
    return!1
}
<!-- BEGIN: get_alias -->
$(function() {
    $('#idfull_name').change(function() {
        get_alias('{ID}');
    });
});
<!-- END: get_alias -->
</script>
<!-- END: main -->