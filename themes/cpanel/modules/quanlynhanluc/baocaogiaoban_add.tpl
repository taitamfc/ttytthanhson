<!-- BEGIN: main -->
<style>
    
    .clone-container {
        padding-left: 24px;
    }
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
                            <div class="row">
                                <div class="col-lg-6">
                                BÁO CÁO TRỰC NGÀY 
                                </div>
                                <div class="col-lg-6">
                                <input name='title' value='{item.title}' type='date' class='has_f f_khoakb form-control'>
                                </div>
                            </div>
                            
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
                            <label class="form-label">
                                SỔ GIAO BAN
                            </label>
                            {FILE "baocaogiaoban/so-giao-ban.tpl"}
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
    var layout = '{layout}';


    if( currentGroupId != 1 ){
        if (currentKhoa != "") {
            jQuery('input.has_f').prop('readonly', true);
            jQuery('input.f_' + currentKhoa).prop('readonly', false);

            jQuery('.has_fd').find('input, textarea').prop('readonly', true);
            jQuery('.has_fd').find('.clone-remove').hide();
            jQuery('.has_fd').find('.clone-remove, .clone-btn').hide();

            jQuery('.fd_' + currentKhoa).find('input, textarea').prop('readonly', false);
            jQuery('.fd_' + currentKhoa).find('.clone-remove').show();
            jQuery('.fd_' + currentKhoa).find('.clone-remove, .clone-btn').show();
        }else{
            jQuery('.clone-remove').hide();
        }
    }


    

    $('.first-clone').each(function(key, val) {
        //if ($(val).find('input').val() != '') {
        if( layout == 'add' ){
            $(val).closest('.clone-wrapper').find('.empty-clone').remove();
        }
    });

    

    $(document).ready( function(){

        $('input[type="number"]').attr('min',0);

        $('.tong_so_kham, .tong_so_vao_vien').on('change',function(){
            tong_so_phantram();
        });

        $('body').on('dbclick','input, textarea', function(e){
            console.log(e);
            e.preventDefault();
            return false;
        })

        // $('.hoat_dong_dieu_tri.f_khoanoi').val(0);

        $('.clone-btn').on('click', function() {
            console.log('click');
            var parent = $(this).closest('.clone-container');
            var cloned = parent.find('.clone-item').first().clone();
            cloned.removeClass('first-clone')
            cloned.find('input, textarea').val('')
            parent.find('.clone-wrapper').append(cloned);
        });

        $('body').on('click', '.clone-remove', function(e) {
            console.log('click');
            e.preventDefault();
            var parent = $(this).closest('.clone-wrapper').find('.clone-item');
            if (parent.length > 1) {
                $(this).closest('.clone-item').remove();
            }
        });

        $('.hoat_dong_dieu_tri_bn_vaovien').on('keyup change',function(){
            console.log('change');
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
            setTimeout(() => {
                $('.f_auto_col').each( function(key,val){
                    let col_auto = $(val);
                    let col_auto_colum = col_auto.data('col');
                    let col_need_autos = col_auto.closest('table').find('tr td:nth-of-type('+col_auto_colum+') input').not('.f_auto_col').not('.f_col_not_auto');
                    col_need_autos.addClass('col_need_autos')
                    handle_auto_col(col_need_autos,col_auto);
                    
                    col_need_autos.on('keyup change load',function(){
                        handle_auto_col(col_need_autos,col_auto)
                    })
                })
            }, 500);
        }

        function handle_auto_col(col_need_autos,col_auto){
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
            if( col_auto.hasClass('hoat_dong_dieu_tri_tong_bn_chuyenvien') ){
                $('.tinh_hinh_benh_nhan_tong_bn_chuyenvien').text(total_value);

                let t_bn_chuyenvien = parseInt( $('[name="tinh_hinh_benh_nhan[bn_chuyenvien]"]').val() )
                let t_bn_chuyenvien_cac_khoa = parseInt( $('.tinh_hinh_benh_nhan_tong_bn_chuyenvien').text() );
                $('[name="tinh_hinh_benh_nhan[tong_bn_chuyenvien]"]').val( t_bn_chuyenvien + t_bn_chuyenvien_cac_khoa );
            }
        }

        if( $('[name="tinh_hinh_benh_nhan[bn_chuyenvien]"]').length ){
            $('[name="tinh_hinh_benh_nhan[bn_chuyenvien]"]').on('change keyup',function(){
                let t_bn_chuyenvien = parseInt($(this).val())
                let t_bn_chuyenvien_cac_khoa = parseInt( $('.tinh_hinh_benh_nhan_tong_bn_chuyenvien').text() );
                $('[name="tinh_hinh_benh_nhan[tong_bn_chuyenvien]"]').val( t_bn_chuyenvien + t_bn_chuyenvien_cac_khoa );
            });
        }

        // Moi
        function tong_so_phantram(){
            setTimeout(() => {
                let tong_so_kham = $('.tong_so_kham').val();
                let tong_so_vao_vien = $('.tong_so_vao_vien').val();
                let tong_so_phantram = (tong_so_vao_vien / tong_so_kham) * 100;
                $('.tong_so_phantram').val(tong_so_phantram.toFixed(2))
            }, 500);
        }
        
        $('.bhyt_ngoaitinh, .noitinh_ngoaitinh').on('change keyup',function(){
            bhyt_ngoaitinh_noitinh();
        });
        function bhyt_ngoaitinh_noitinh(){
            // let bhyt_noitinh = $('.bhyt_noitinh').val();
            let bhyt_noitinh = $('.noitinh_ngoaitinh').val();
            let bhyt_ngoaitinh = $('.bhyt_ngoaitinh').val();
            $('.bhyt_noitinh').val( parseInt(bhyt_noitinh) - parseInt(bhyt_ngoaitinh) );
        }
        $('.pkdk_bhyt_ngoaitinh, .pkdk_noitinh_ngoaitinh').on('change keyup',function(){
            pkdk_bhyt_ngoaitinh_noitinh();
        });
        function pkdk_bhyt_ngoaitinh_noitinh(){
            // let pkdk_bhyt_noitinh = $('.pkdk_bhyt_noitinh').val();
            let pkdk_bhyt_noitinh = $('.pkdk_noitinh_ngoaitinh').val();
            let pkdk_bhyt_ngoaitinh = $('.pkdk_bhyt_ngoaitinh').val();
            $('.pkdk_bhyt_noitinh').val( parseInt(pkdk_bhyt_noitinh) - parseInt(pkdk_bhyt_ngoaitinh) );
        }
        $('.benh_nhan_kham').on('change keyup',function(){
            tong_benh_nhan_kham();
        });
        tong_benh_nhan_kham();
        function tong_benh_nhan_kham(){
            if( $('.benh_nhan_kham').length ){
                let benh_nhan_kham = 0;
                $('.benh_nhan_kham').each( function(key,val){
                    benh_nhan_kham += parseInt($(val).val());
                })
                $('.tong_benh_nhan_kham').val(benh_nhan_kham)
                $('.tong_benh_nhan_kham').prop('readonly',true)
            }
        }
        $('.benh_nhan_kham_phuthu').on('change keyup',function(){
            tong_benh_nhan_kham_phuthu();
        });
        tong_benh_nhan_kham_phuthu();
        function tong_benh_nhan_kham_phuthu(){
            if( $('.benh_nhan_kham_phuthu').length ){
                let benh_nhan_kham_phuthu = 0;
                $('.benh_nhan_kham_phuthu').each( function(key,val){
                    benh_nhan_kham_phuthu += parseInt($(val).val());
                })
                $('.tong_benh_nhan_kham_phuthu').val(benh_nhan_kham_phuthu)
                $('.tong_benh_nhan_kham_phuthu').prop('readonly',true)
            }
        }
        
        // End moi
        if( $('.phantram_vao_vien').length ){
            $('.phantram_vao_vien').each( function(key,val){
                let col_auto = $(val);
                let col_need_autos = col_auto.closest('tr').find('td input').not('.f_auto_col');
                col_need_autos.on('keyup change',function(){
                    
                    let total_value = [];
                    col_need_autos.each( function(key,val){
                        if( $(val).val() && !$(val).hasClass('phantram_vao_vien') ){
                            total_value.push(parseInt($(val).val()))
                        }
                    })
                    col_auto.attr('data-values',total_value.join(','))
                    let percent = (total_value[1] / total_value[0]) * 100;
                    if( isNaN(percent) ){
                        col_auto.val(0);
                    }else{
                        col_auto.val(percent.toFixed(2));
                    }

                    tong_so_phantram();
                })
            });
        }

        if( $('.f_auto_row_1').length ){
            for(let i = 1; i <= 7; i++){
                $('.f_auto_row_'+i).closest('tr').find('td:nth-of-type(8) input, td:nth-of-type(9) input').on('change keyup',function(){
                    let noi_tru = $('.f_auto_row_'+i).closest('tr').find('td:nth-of-type(8) input').val();
                    let ngoai_tru = $('.f_auto_row_'+i).closest('tr').find('td:nth-of-type(9) input').val();
                    $('.f_auto_row_'+i).val( parseInt(noi_tru) + parseInt(ngoai_tru) );
                });
            }
        }
    });
</script>
<!-- END: main -->