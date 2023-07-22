<!-- BEGIN: main -->
<div id="users">
    <form action="{FORM_ACTION}" method="post">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <colgroup>
                    <col style="width: 260px" />
                    <col />
                </colgroup>
                <tfoot>
                    <tr>
                        <td colspan="2"><input type="hidden" name="save" value="1"><input type="submit" value="{LANG.config_save}" class="btn btn-primary" /></td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>{LANG.tendonvi}</td>
                        <td>
                          <input class="form-control" type="text" name="tendonvi" value="{DATA.tendonvi}" />  
                        </td>
                    </tr>
                     <tr>
                        <td>{LANG.masothue}</td>
                        <td>
                          <input class="form-control" type="text" name="masothue" value="{DATA.masothue}" />  
                        </td>
                    </tr>
                     <tr>
                        <td>{LANG.captai}</td>
                        <td>
                          <input class="form-control" type="text" name="captai" value="{DATA.captai}" />  
                        </td>
                    </tr>
                     <tr>
                        <td>{LANG.nguoidaidien}</td>
                        <td>
                          <input class="form-control" type="text" name="nguoidaidien" value="{DATA.nguoidaidien}" />  
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.diachi}</td>
                        <td>
                          <input class="form-control" type="text" name="diachi" value="{DATA.diachi}" />  
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.dienthoai}</td>
                        <td>
                          <input class="form-control" type="text" name="dienthoai" value="{DATA.dienthoai}" />  
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.raw_staff}</td>
                        <td>
                          <input class="form-control" type="text" name="raw_staff" value="{DATA.raw_staff}" />  
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.raw_department}</td>
                        <td>
                          <input class="form-control" type="text" name="raw_department" value="{DATA.raw_department}" />  
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.logo}</td>
                        <td><input class="form-control w350 pull-left" name="logo" id="logo" value="{DATA.logo}" />
                            <button class="btn btn-default selectfilelogo" type="button" >
                            <em class="fa fa-folder-open-o fa-fix">&nbsp;</em>
                            </button>
                         </td>
                    </tr>
                    <tr>
                        <td>{LANG.tuybien1}</td>
                        <td>
                          {DATA.tuybien1} 
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.tuybien2}</td>
                        <td>
                          {DATA.tuybien2} 
                        </td>
                    </tr>
                    <tr>
                        <td>{LANG.tuybien3}</td>
                        <td>
                          {DATA.tuybien3} 
                        </td>
                    </tr>
                    


                </tbody>
            </table>
        </div>
    </form>
</div>
<script type="text/javascript">
 $(".selectfilelogo").click(function() {
        var area = "logo";
        var path = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}";
        var currentpath = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}";
        var type = "image";
        nv_open_browse(script_name + "?" + nv_name_variable + "=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type + "&currentpath=" + currentpath, "NVImg", 850, 420, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
        return false;
    });   
</script>
<!-- END: main -->