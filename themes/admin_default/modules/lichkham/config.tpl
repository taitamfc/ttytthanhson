<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div style="padding:10px; text-align:center;font-weight:bold; background:#FFE6F2;">
	{error}
</div>
<meta http-equiv="Refresh" content="1;URL={redirect}">
<!-- END: error -->
<form class="form-inline" action="{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method='post'>
	<table class="table table-striped table-bordered table-hover" style="margin-bottom: 8px;">
		<tbody>
			<tr>
				<td class="right w350">Số điện thoại:</td>
				<td><input class="form-control" type="text" name="phone" value="{DATA.phone}" style="width:30%"/></td>
			</tr>
			<tr>
				<td class="right w350">Fanpage:</td>
				<td><input class="form-control" type="text" name="fanpage" value="{DATA.fanpage}" style="width:30%"/></td>
			</tr>
			<tr>
				<td class="right w350">Zalo:</td>
				<td><input class="form-control" type="text" name="fzalo" value="{DATA.fzalo}" style="width:30%"/></td>
			</tr>
			<tr>
				<td class="right w350">Google Map:</td>
				<td><input class="form-control" type="text" name="gmap" value="{DATA.gmap}" style="width:30%"/></td>
			</tr>
			<tr>
				<td class="right w350">Email:<br/> Các email cách nhau bởi dấu chấm phẩy (;) <br/>Lưu ý: tối đa không quá 50 email.</td>
				<td><input class="form-control" type="text" name="email" value="{DATA.email}" style="width:30%"/></td>
			</tr>
			
			<tr>
				<td colspan="2" class="text-center"><input class="btn btn-primary" type="submit" name="submit" value="{LANG.weblink_submit}"/></td>
			</tr>
		</tbody>
	</table>
</form>
<!-- END: main -->

<form class="form-inline" action="{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method='post'>
	<table class="table table-striped table-bordered table-hover" style="margin-bottom: 8px;">
		<tbody>
			<tr>
				<td class="right w250">{LANG.weblink_config_imgwidth}</td>
				<td><input class="form-control" type="text" name="imgwidth" value="{DATA.imgwidth}" style="width:50px"/> px</td>
			</tr>
			<tr>
				<td class="right">{LANG.weblink_config_imgheight}</td>
				<td><input class="form-control" type="text" name="imgheight" value="{DATA.imgheight}" style="width:50px"/> px</td>
			</tr>
			<tr>
				<td class="right">{LANG.config_per_page}</td>
				<td><input class="form-control" type="text" name="per_page" value="{DATA.per_page}" style="width:50px"/></td>
			</tr>
			<tr>
				<td class="right">{LANG.weblink_config_sort}</td>
				<td><input type="radio" name="sort" {DATA.asc} value="asc" /> {LANG.weblink_asc} <input type="radio" name="sort" {DATA.des} value="des" /> {LANG.weblink_des} </td>
			</tr>
			<tr>
				<td class="right">{LANG.weblink_config_sortoption}</td>
				<td><input type="radio" name="sortoption" id="sapxepoption_0" {DATA.byid} value="byid"/>{LANG.weblink_config_sortbyid} <input type="radio" name="sortoption" id="sapxepoption_1" {DATA.byrand} value="byrand"/>{LANG.weblink_config_sortbyrand} <input type="radio" name="sortoption" id="sapxepoption_2" {DATA.bytime} value="bytime"/>{LANG.weblink_config_sortbytime} <input type="radio" name="sortoption" id="sapxepoption_3" {DATA.byhit} value="byhit"/>{LANG.weblink_config_sortbyhit} </td>
			</tr>
			<tr>
				<td class="right">{LANG.weblink_config_showimagelink}</td>
				<td><input type="checkbox"  value="1" name="showlinkimage" {DATA.ck_showlinkimage} /></td>
			</tr>
			<tr>
				<td colspan="2" class="text-center"><input class="btn btn-primary" type="submit" name="submit" value="{LANG.weblink_submit}"/></td>
			</tr>
		</tbody>
	</table>
</form>