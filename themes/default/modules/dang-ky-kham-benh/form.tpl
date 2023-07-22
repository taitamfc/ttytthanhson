<!-- BEGIN: main -->
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<div class="nv-fullbg">
    <form method="post" action="{ACTION_FILE}" onsubmit="return nv_validForm(this);" novalidate>
		
		<div class="form-group" style="display:none">
			<div class="input-group">
				<span class="input-group-addon">
				<em class="fa fa-file-text fa-lg fa-horizon"></em>
				</span>
				<input type="text" maxlength="255" class="form-control required" value="Đặt lịch khám của bệnh nhân " name="ftitle" placeholder="{LANG.title}" data-pattern="/^(.){3,}$/" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_title}" />
			</div>
		</div>
		
		
			<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><em class="fa fa-user fa-lg fa-horizon"></em></span>
				<input type="text" maxlength="100" value="" name="fname" class="form-control required" placeholder="{LANG.fullname}" data-pattern="/^(.){3,}$/" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_fullname}" />
              
            </div>
		</div>
		
		<div class="form-group">
			<div class="input-group">
				
				<span class="input-group-addon" id="from-fbirthday">
                <em class="fa fa-birthday-cake  fa-lg fa-horizon"></em>
                </span>
				<input  type="text"  value="" name="fbirthday" id="fbirthday" class="form-control  required" placeholder="{LANG.birthday}" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_birthday}" />

            </div>
		</div>
		 <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-home fa-lg fa-horizon"></em>
				</span>
                <input type="text" maxlength="60" value="" name="faddress" class="form-control required" placeholder="{LANG.address}" />
            </div>
        </div>
		
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-phone fa-lg fa-horizon"></em>
				</span>
                <input type="text" maxlength="60" value="" name="fphone" class="form-control required" placeholder="{LANG.phone}" />
            </div>
        </div>

	<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-envelope fa-lg fa-horizon"></em>
				</span>
				<input type="email" maxlength="60" value="" name="femail" class="form-control required" placeholder="{LANG.email}" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_email}" />
			</div>
		</div>
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon" id="from-fdays">
				<em class="fa fa-calendar-check-o  fa-lg fa-horizon"></em>
                </span>
							
							
                <input type="text"  value="{CONTENT.fdays}" name="fdays"  id="fdays" class="form-control  required" placeholder="{LANG.days}" />
            </div>
        </div>

		<!-- BEGIN: time_book -->
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-clock-o fa-lg fa-horizon">
					</em>
				</span>
				<select class="form-control required" name="ftime_book">
					<!-- BEGIN: select_option_loop -->
					<option value="{SELECTVALUE}">
						{SELECTNAME}
					</option>
					<!-- END: select_option_loop -->
				</select>
			</div>
		</div>
		<!-- END: time_book -->
		
		<!-- BEGIN: doctor -->
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-user-md fa-lg fa-horizon">
					</em>
				</span>
				<select class="form-control" name="fdoctor">
					<!-- BEGIN: select_option_loop -->
					<option value="{SELECTVALUE}">
						{SELECTNAME}
					</option>
					<!-- END: select_option_loop -->
				</select>
			</div>
		</div>
		<!-- END: doctor -->
		
		
		
		<div class="form-group">
            <div>
    			<textarea cols="10" name="fcon" class="form-control" style="min-height:120px" placeholder="{LANG.content}" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_content}"></textarea>
            </div>
		</div>
        <!-- BEGIN: sendcopy -->
        <div class="form-group">
            <label><input type="checkbox" name="sendcopy" value="1" checked="checked" /><span>{LANG.sendcopy}</span></label>
        </div>
        <!-- END: sendcopy -->
      
		<div class="text-center form-group">
			<input type="hidden" name="checkss" value="{CHECKSS}" />
			<input type="button" value="{LANG.reset}" class="btn btn-default" onclick="nv_validReset(this.form);return!1;" />
			<input type="submit" value="{LANG.sendcontact}" name="btsend" class="btn btn-primary" />
		</div>
	</form>
    <div class="contact-result alert"></div>
</div>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<!-- END: main -->