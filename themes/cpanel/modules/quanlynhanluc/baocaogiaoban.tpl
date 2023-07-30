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
                    <h5>BÁO CÁO GIAO BAN</h5>
                    <span></span>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-chevron-left"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-times close-card"></i></li>
                        </ul>
                    </div>

                </div>
                <div class="card-block">
                    <div class="table-responsive" style="padding-bottom: 100px;">
                        <form name="myform" id="myform" method="post" action="{link_frm}">
                            <input type="hidden" name="sta" id="sta" value="find_item" />
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="txt_find"
                                                    style="width: auto;min-width:120px;">Tìm theo tên:</span>
                                                <input name="txt_find" value="{F.txt_find}" type="text"
                                                    class="form-control">
                                            </div>
                                        </th>

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
                                                <button type="submit" class="btn btn-success">
                                                    <i
                                                        class="icofont icofont-location-arrow"></i><strong>Tìm</strong></button>
                                            </div>
                                        </th>
                                    </tr>

                                </thead>
                            </table>
                        </form>
                        <table id="tbl_danhsach" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiêu đề</th>
                                    <th>Ngày lập</th>
                                    <th>Người lập</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Người cập nhật</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- BEGIN: items -->
                                <tr>
                                    <th scope="row"><a href="{item.link_edit}"> {item.id}</a></th>
                                    <td><a href="{item.link_edit}">{item.title}</a></td>
                                    <td>{item.created_date}</td>
                                    <td>{item.updated_date}</td>
                                    <td>{item.updated_date}</td>
                                    <td>{item.updated_date}</td>
                                    <td><a href="{item.link_view}">Xem</a></td>
                                </tr>
                                <!-- END: items -->
                                <!-- BEGIN: generate_page -->
                                <tfoot>
                                    <tr>
                                        <td class="text-center js-page-links" colspan="6" >{NV_GENERATE_PAGE}</td>
                                    </tr>
                                </tfoot>
                                <!-- END: generate_page -->
                            </tbody>
                        </table>
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