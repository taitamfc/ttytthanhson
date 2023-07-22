<!-- BEGIN: main -->
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
		<caption><em class="fa fa-file-text-o">&nbsp;</em>{DATA.title} / {LANG.send_time}: {DATA.send_time}</caption>
		<col class="w150"/>
		<col/>
		<tbody>
			
	
			<tr>
				<td>{LANG.fullname}</td>
				<td>{DATA.send_name}</td>
			</tr>
			<tr>
				<td>{LANG.birthday}</td>
				<td>{DATA.sender_birthday}</td>
			</tr>
			<tr>
				<td>{LANG.phone}</td>
				<td>{DATA.sender_phone}</td>
			</tr>
			<tr>
				<td>{LANG.address}</td>
				<td>{DATA.sender_address}</td>
			</tr>
			<tr>
				<td>{LANG.email}</td>
				<td>{DATA.sender_email}</td>
			</tr>
			
			
            <tr>
				<td>{LANG.days}</td>
				<td>{DATA.days}</td>
			</tr>
			<tr>
				<td>{LANG.time_book}</td>
				<td>{DATA.time_book}</td>
			</tr>
			<tr>
				<td>{LANG.specialist}</td>
				<td>{DATA.specialist}</td>
			</tr>	
			<tr>
				<td>{LANG.doctor}</td>
				<td>{DATA.doctor}</td>
			</tr>
			
			
			<tr>
				<td colspan="2">{DATA.content}</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
		<tbody>
			<tr>
				<td class="text-center">
				<!-- BEGIN: reply -->
				<a class="btn btn-default" href="{URL_REPLY}">{LANG.send_title}</a>&nbsp;
				<!-- END: reply -->
				<a class="btn btn-default" href="javascript:void(0);" onclick="nv_del_mess({DATA.id});">{GLANG.delete}</a>&nbsp;
				<a class="btn btn-default" href="{DATA.url_back}">{LANG.back_title}</a>&nbsp;
                <a class="btn btn-default" href="javascript:void(0);" onclick="mark_as_unread();">{LANG.mark_as_unread}</a>&nbsp;
                <a class="btn btn-default" href="{URL_FORWARD}"><em class="fa fa-share">&nbsp;</em> {LANG.mark_as_forward}</a>
                </td>
			</tr>
		</tbody>
	</table>
</div>
<!-- BEGIN: data_reply -->
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
		<caption><em class="fa fa-file-text-o">&nbsp;</em>Re: {DATA.title}</caption>
		<col class="w150"/>
		<col />
		<tbody>
			<tr>
				<td style="vertical-align:top">{LANG.infor_user_send_title}</td>
				<td> {REPLY.reply_name} &lt;{REPLY.admin_email}&gt;
				<br />
				{REPLY.time} </td>
			</tr>
			<tr>
				<td>{LANG.reply_user_send_title}</td>
				<td>{REPLY.reply_time}</td>
			</tr>
			<tr>
				<td colspan="2">{REPLY.reply_content}</td>
			</tr>
		</tbody>
	</table>
</div>
<!-- END: data_reply -->
<!-- END: main -->