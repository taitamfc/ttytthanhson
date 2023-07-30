<!-- BEGIN: main -->
<style>
ul.multi-report li {
    border-bottom: 1px solid #ccc;
    margin-bottom: 5px;
    padding-bottom: 5px;
}
ul.multi-report li:last-child {
    border: none !important;
}
ul.multi-report {
    padding-left: 18px;
}
.text-bold {
    font-weight: bold;
}
.fd_khoahscc {
    padding-left: 18px;
}
.fd_khoahscc label, .text-danger, .td-text-danger p.form-control-static {
    color: red !important;
}
</style>

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Xem chi tiết: {item.title}</h5>

                </div>
                <div class="card-block">
                    <form name="myform" id="myform" method="post"
                        action="index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}&id={item.id}">
                        <input type="hidden" name="token" value="{token}" />
                                <div class="mb-3">
                                    <label class="form-label">Tên báo cáo:</label>
                                    <p class="form-control-static">{item.title}<p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">I – THÀNH PHẦN TRỰC</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="form-label">Trực lãnh đạo:</label>
                                            <p class="form-control-static">{item.truc_lanh_dao}<p>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Trực bác sĩ:</label>
                                            <p class="form-control-static">{item.truc_bac_sy}<p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                    II – TÌNH HÌNH BỆNH NHÂN <br>
                                    1 . Tổng số bệnh nhân khám :</label>
                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <label class="form-label text-danger">1.1. Khoa Khám bệnh</label>
                                            {FILE "baocaogiaoban/tinh_hinh_benh_nhan/khoa-kham-benh.tpl"}
                                        </div>
                                        <div class="col-lg-6 ">
                                            <label class="form-label text-danger">1.2. Phòng khám ĐK Phú Thứ </label>
                                            {FILE "baocaogiaoban/tinh_hinh_benh_nhan/phong-kham-da-khoa.tpl"}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    {FILE "baocaogiaoban/tong-so-benh-nhan-kham.tpl"}
                                </div>
                                <div class="mb-3">
                                    {FILE "baocaogiaoban/hoat-dong-dieu-tri.tpl"}
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-danger">
                                        3. BỆNH NHÂN MỔ CẤP CỨU
                                    </label>
                                    {FILE "baocaogiaoban_show/benh_nhan_mo_cap_cuu.tpl"}
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-danger">
                                        4. BỆNH NHÂN MỔ PHIÊN
                                    </label>
                                    {FILE "baocaogiaoban_show/benh_nhan_mo_phien.tpl"}
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-danger">
                                        5. BỆNH NHÂN CHUYỂN TUYẾN:
                                    </label>
                                    {FILE "baocaogiaoban_show/benh_nhan_chuyen_tuyen.tpl"}
                                </div>
                  

                                <div class="mb-3">
                                    <label class="form-label text-danger">
                                        6. BỆNH NHÂN THEO DÕI
                                    </label>
                                    {FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-hscc.tpl"}
                                    {FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-ngoai.tpl"}
                                    {FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-phu-san.tpl"}
                                    {FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-noi.tpl"}
                                    {FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-nhi.tpl"}
                                    {FILE "baocaogiaoban_show/benh_nhan_theo_doi/khoa-yhct.tpl"}
                                </div>
                                <div class="mb-3">
                                        
                                        <a href="index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}=baocaogiaoban"
                                            class="btn bnt-mini btn-danger">
                                            <i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
                                </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   
    $(function() {
        $('input[type="number"]').each( function(key,val){
            let oldVal = $(val).val();
            $(val).closest('td').append('<p class="form-control-static text-bold">'+oldVal+'</p>')
            $(val).remove();
        });
    });
</script>
<!-- END: main -->