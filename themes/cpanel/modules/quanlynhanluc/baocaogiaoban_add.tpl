<!-- BEGIN: main -->
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js">
</script>
<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js">
</script>

<style>
.has_f {
    border-color: red !important;
}
</style>

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>THÊM BÁO CÁO GIAO BAN</h5>
                    <span style="color: #ff0000;">Trường có dấu (*) là bắt buộc</span>

                </div>
                <div class="card-block">
                    <div class="table-responsive" style="padding-bottom: 100px;">
                        <form name="myform" id="myform" method="post" action="index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}&id={item.id}"
                            >
                            <input type="hidden" name="token" value="{token}" />
                            <table class="table table-hover table-border" width="100%">
                                <thead>
                                    
                                    <tr>
                                        <th class="align-middle" colspan="2">Tên báo cáo:</th>
                                    </tr>
                                    <tr>
                                        <td class='align-middle' colspan="2">
                                        <input name='title' value='{item.title}' type='text' class='has_f f_title form-control'></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="align-middle">I – THÀNH PHẦN TRỰC</th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Trực lãnh đạo:</th>
                                        <th class="align-middle">Trực bác sĩ:</th>
                                    </tr>
                                    <tr>
                                        <td class='align-middle'>
                                            <input name='truc_lanh_dao' value='{item.truc_lanh_dao}' type='text'
                                                class='form-control has_f f_truc_lanh_dao'>
                                        </td>
                                        <td class='align-middle'>
                                            <input name='truc_bac_sy' value='{item.truc_bac_sy}' type='text'
                                                class='form-control has_f f_truc_bac_sy'>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2" class="align-middle">
                                            II – TÌNH HÌNH BỆNH NHÂN <br>
                                            1 . Tổng số bệnh nhân khám :
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">1.1. Khoa Khám bệnh </th>
                                        <th class="align-middle">1.2. Phòng khám ĐK Phú Thứ </th>
                                    </tr>
                                    <tr>
                                        <td class='align-top'>
                                            {FILE "baocaogiaoban/tinh_hinh_benh_nhan/khoa-kham-benh.tpl"}
                                            
                                        </td>
                                        <td class='align-top'>
                                            {FILE "baocaogiaoban/tinh_hinh_benh_nhan/phong-kham-da-khoa.tpl"}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle" colspan="2">
                                            {FILE "baocaogiaoban/tong-so-benh-nhan-kham.tpl"}
                                        </td>
                                    </tr>
                                    
                                    {FILE "baocaogiaoban/hoat-dong-dieu-tri.tpl"}
                                    
                                    <tr>
                                        <th colspan="2">
                                        3. BỆNH NHÂN MỔ CẤP CỨU: 05
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <textarea style="width:100%" name="benh_nhan_mo_cap_cuu">
                                            {item.benh_nhan_mo_cap_cuu}
                                        </textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">
                                        4. BỆNH NHÂN MỔ PHIÊN : 05
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <textarea style="width:100%" name="benh_nhan_mo_phien">
                                            {item.benh_nhan_mo_phien}
                                        </textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">
                                        5. BỆNH NHÂN CHUYỂN TUYẾN: 03
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <textarea style="width:100%" name="benh_nhan_chuyen_tuyen">
                                            {item.benh_nhan_chuyen_tuyen}
                                        </textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">
                                        6. BỆNH NHÂN THEO DÕI
                                        </th>
                                    </tr>
                                    {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-hscc.tpl"}
                                    {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-ngoai.tpl"}
                                    {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-phu-san.tpl"}
                                    {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-noi.tpl"}
                                    {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-nhi.tpl"}
                                    {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-yhct.tpl"}
                                    
                                    <tr>
                                        <td class="align-middle" colspan="2">
                                            <button type="submit" class="btn btn-success">
                                                <i class="ti-save"></i><strong>Lưu văn bản</strong></button>
                                            <a href="{link_close}" class="btn bnt-mini btn-danger">
                                                <i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
       $('.clone-btn').on('click',function(){
            var parent = $(this).closest('.clone-container');
            var cloned = parent.find('.clone-item').clone();
            cloned.removeClass('first-clone')
            cloned.find('input, textarea').val('')
            parent.find('.clone-wrapper').append(cloned);
       });

       $('body').on('click','.clone-remove',function(e){
            e.preventDefault();
            var parent = $(this).closest('.clone-wrapper').find('.clone-item');
            if( parent.length > 1 ){
                $(this).closest('.clone-item').remove();
            }
       });
    });
</script>
<!-- END: main -->