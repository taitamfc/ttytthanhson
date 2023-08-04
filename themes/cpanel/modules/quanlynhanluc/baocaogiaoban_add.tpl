<!-- BEGIN: main -->
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js">
</script>
<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js">
</script>

<style>
    .has_f:disabled,
    .has_fd input:disabled,
    .has_fd textarea:disabled {
        border: none !important;
        cursor: not-allowed;
        background: none;
    }

    a.clone-btn {
        color: blue;
        text-decoration: underline;
        margin-bottom: 11px;
        float: left;
        width: 100%;
    }

    .w80 {
        width: 80px;
    }

    .clone-item {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .clone-input {
        flex: 9;
    }

    .clone-action {
        flex: initial;
    }

    ol li {
        border-bottom: 1px solid #ccc;
        margin-bottom: 5px;
        padding-bottom: 5px;
    }
    td.flex-center {
        display: flex;
        align-items: center;
        gap: 4px;
    }
</style>

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>{page_title}</h5>
                    <span style="color: #ff0000;">Trường có dấu (*) là bắt buộc</span>

                </div>
                <div class="card-block">
                    <form name="myform" id="myform" method="post"
                        action="index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}&id={item.id}">
                        <input type="hidden" name="token" value="{token}" />
                        <div class="mb-3">
                            <label class="form-label">Tên báo cáo:</label>
                            <input name='title' value='{item.title}' type='text' class='has_f f_khoakb form-control'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">I – THÀNH PHẦN TRỰC</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label">Trực lãnh đạo:</label>
                                    <input name='truc_lanh_dao' value='{item.truc_lanh_dao}' type='text'
                                        class='form-control has_f f_khoakb'>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Trực bác sĩ:</label>
                                    <input name='truc_bac_sy' value='{item.truc_bac_sy}' type='text'
                                        class='form-control has_f f_khoakb'>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                II – TÌNH HÌNH BỆNH NHÂN <br>
                                1 . Tổng số bệnh nhân khám :</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label">1.1. Khoa Khám bệnh</label>
                                    {FILE "baocaogiaoban/tinh_hinh_benh_nhan/khoa-kham-benh.tpl"}
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">1.2. Phòng khám ĐK Phú Thứ </label>
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
                            {FILE "baocaogiaoban/benh_nhan_mo_cap_cuu.tpl"}
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-danger">
                                4. BỆNH NHÂN MỔ PHIÊN
                            </label>
                            {FILE "baocaogiaoban/benh_nhan_mo_phien.tpl"}
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-danger">
                                5. BỆNH NHÂN CHUYỂN TUYẾN:
                            </label>
                            {FILE "baocaogiaoban/benh_nhan_chuyen_tuyen.tpl"}
                        </div>


                        <div class="mb-3">
                            <label class="form-label text-danger">
                                6. BỆNH NHÂN THEO DÕI
                            </label>
                            {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-hscc.tpl"}
                            {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-ngoai.tpl"}
                            {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-phu-san.tpl"}
                            {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-noi.tpl"}
                            {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-nhi.tpl"}
                            {FILE "baocaogiaoban/benh_nhan_theo_doi/khoa-yhct.tpl"}
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">
                                <i class="ti-save"></i><strong>Lưu văn bản</strong></button>
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
    var currentKhoa = '{currentKhoa}';
    var currentGroupId = '{currentGroupId}';

    if (currentGroupId > 1 && currentKhoa != 'admin') {
        jQuery('input.has_f').prop('disabled', true);
        jQuery('input.f_' + currentKhoa).prop('disabled', false);

        jQuery('.has_fd').find('input, textarea').prop('disabled', true);
        jQuery('.has_fd').find('.clone-remove').remove();
        jQuery('.has_fd').find('.clone-remove, .clone-btn').remove();
    }

    $('.first-clone').each(function(key, val) {
        if ($(val).find('input').val()) {
            $(val).closest('.clone-wrapper').find('.empty-clone').remove();
        }
    });

    $(function() {
        $('.clone-btn').on('click', function() {
            var parent = $(this).closest('.clone-container');
            var cloned = parent.find('.clone-item').first().clone();
            cloned.removeClass('first-clone')
            cloned.find('input, textarea').val('')
            parent.find('.clone-wrapper').append(cloned);
        });

        $('body').on('click', '.clone-remove', function(e) {
            e.preventDefault();
            var parent = $(this).closest('.clone-wrapper').find('.clone-item');
            if (parent.length > 1) {
                $(this).closest('.clone-item').remove();
            }
        });

        $('.hoat_dong_dieu_tri_bn_vaovien').on('keyup change',function(){
            var hoat_dong_dieu_tri_tong_bn_vaovien = 0;
            $('.hoat_dong_dieu_tri_bn_vaovien').each( function(key,val){
                let valLue = $(val).val();
                if(valLue){
                    hoat_dong_dieu_tri_tong_bn_vaovien += parseInt(valLue);
                }
            });
            $('.hoat_dong_dieu_tri_tong_bn_vaovien').val(hoat_dong_dieu_tri_tong_bn_vaovien);
        });

        // Auto total for col
        if( $('.has_auto_total').length ){
            $('.f_auto_col').each( function(key,val){
                let col_auto = $(val);
                let col_auto_colum = col_auto.data('col');
                let col_need_autos = col_auto.closest('table').find('tr td:nth-of-type('+col_auto_colum+') input');
                col_need_autos.addClass('col_need_autos')
                col_need_autos.on('keyup change',function(){
                    let total_value = 0;
                    col_need_autos.each( function(key,val){
                        if( $(val).val() && !$(val).hasClass('f_auto_col') ){
                            total_value += parseInt($(val).val())
                        }
                    })
                    col_auto.val(total_value)

                    if( col_auto.hasClass('hoat_dong_dieu_tri_tong_bn_vaovien') ){
                        $('[name="tinh_hinh_benh_nhan[bn_vaovien]"]').val(total_value)
                    }
                    if( col_auto.hasClass('hoat_dong_dieu_tri_tong_bn_ravien') ){
                        $('.tinh_hinh_benh_nhan_tong_bn_chuyenvien').text(total_value);

                        let t_bn_chuyenvien = parseInt( $('[name="tinh_hinh_benh_nhan[bn_chuyenvien]"]').val() )
                        let t_bn_chuyenvien_cac_khoa = parseInt( $('.tinh_hinh_benh_nhan_tong_bn_chuyenvien').text() );
                        $('[name="tinh_hinh_benh_nhan[tong_bn_chuyenvien]"]').val( t_bn_chuyenvien + t_bn_chuyenvien_cac_khoa );
                    }
                })
            })
        }

        if( $('[name="tinh_hinh_benh_nhan[bn_chuyenvien]"]').length ){
            $('[name="tinh_hinh_benh_nhan[bn_chuyenvien]"]').on('change keyup',function(){
                let t_bn_chuyenvien = parseInt($(this).val())
                let t_bn_chuyenvien_cac_khoa = parseInt( $('.tinh_hinh_benh_nhan_tong_bn_chuyenvien').text() );
                $('[name="tinh_hinh_benh_nhan[tong_bn_chuyenvien]"]').val( t_bn_chuyenvien + t_bn_chuyenvien_cac_khoa );
            });
        }

        if( $('.phantram_vao_vien').length ){
            $('.phantram_vao_vien').each( function(key,val){
                let col_auto = $(val);
                let col_need_autos = col_auto.closest('tr').find('td input');
                col_need_autos.on('keyup change',function(){
                    let total_value = [];
                    col_need_autos.each( function(key,val){
                        if( $(val).val() && !$(val).hasClass('phantram_vao_vien') ){
                            total_value.push(parseInt($(val).val()))
                        }
                    })
                    col_auto.attr('data-values',total_value.join(','))
                    let percent = (total_value[1] / total_value[0]) * 100;
                    col_auto.val(percent.toFixed(2));
                    // if( col_auto.hasClass('hoat_dong_dieu_tri_tong_bn_vaovien') ){
                    //     $('[name="tinh_hinh_benh_nhan[bn_vaovien]"]').val(total_value)
                    // }
                    // if( col_auto.hasClass('hoat_dong_dieu_tri_tong_bn_ravien') ){
                    //     $('.tinh_hinh_benh_nhan_tong_bn_chuyenvien').text(total_value);

                    //     let t_bn_chuyenvien = parseInt( $('[name="tinh_hinh_benh_nhan[bn_chuyenvien]"]').val() )
                    //     let t_bn_chuyenvien_cac_khoa = parseInt( $('.tinh_hinh_benh_nhan_tong_bn_chuyenvien').text() );
                    //     $('[name="tinh_hinh_benh_nhan[tong_bn_chuyenvien]"]').val( t_bn_chuyenvien + t_bn_chuyenvien_cac_khoa );
                    // }
                })
            });
        }
    });
</script>
<!-- END: main -->