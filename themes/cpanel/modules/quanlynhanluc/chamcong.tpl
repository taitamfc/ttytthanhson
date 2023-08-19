<!-- BEGIN: main -->
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js">
</script>
<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js">
</script>
<script type="text/javascript" src="{URL_THEMES}/assets/pages/accordion/accordion.js"></script>

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>CHẤM CÔNG</h5>
                    <div class="card-header-right">
                        <a class="btn bnt-mini btn-info" href="index.php?language=vi&nv=quanlynhanluc&op=baocaogiaoban_add">Thêm mới</a>
                    </div>
                </div>
                <div class="card-block">
                    <div class="table-responsive" style="padding-bottom: 100px;">
                        <form name="myform" id="myform" method="post" action="{link_frm}">
                            <input type="hidden" name="sta" id="sta" value="find_item" />
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="txt_find"
                                                    style="width: auto;min-width:120px;">Tìm theo khoa:</span>
                                                <select name="khoa_id" class="form-control">
                                                    <option value="">Tất cả khoa</option>
                                                    <!-- BEGIN: khoas -->
                                                    <option {khoa.selected} value="{khoa.key}">{khoa.value}</option>
                                                    <!-- END: khoas -->
                                                </select>
                                            </div>
                                        </th>
                                        <th colspan="2">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="txt_find"
                                                    style="width: auto;min-width:120px;">Tên nhân viên:</span>
                                                <input name="txt_find" value="{F.txt_find}" type="text"
                                                    class="form-control">
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="tg_tungay"
                                                    style="width: auto;min-width:120px;">Từ ngày:</span>
                                                <input name="tg_tungay" value="{F.tg_tungay}" type="date"
                                                    class="form-control">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="tg_denngay"
                                                    style="width: auto;min-width:120px;">Đến ngày:</span>
                                                <input name="tg_denngay" value="{F.tg_denngay}" type="date"
                                                    class="form-control">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group">
                                                <button type="submit" name="search" class="btn btn-success">
                                                    <i class="icofont icofont-location-arrow"></i><strong>Tìm</strong></button>

                                                    <button type="submit" name="save" class="btn btn-primary ml-2">
                                                    <i class="icofont icofont-save"></i><strong>Lưu</strong></button>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                            </table>

                            {tableHtml}
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#startDate,#endDate").datepicker({
            dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
            showOn: 'focus'
        });

        $('#tg_tungay').click(function() {
            $("#publ_date").datepicker('show');
        });

        $('#tg_denngay').click(function() {
            $("#exp_date").datepicker('show');
        });
    });
</script>

{FILE "export.tpl"}
<!-- END: main -->