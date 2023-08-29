<label class="form-label text-danger">
    2. HOẠT ĐỘNG ĐIỀU TRỊ
</label>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <tbody class="has_auto_total">
            <tr>
                <th rowspan="2">KHOA PHÒNG</th>
                <th rowspan="2">Cũ</th>
                <th rowspan="2">Vào viện</th>
                <th rowspan="2">Ra Viện</th>
                <th rowspan="2">Chuyển Khoa</th>
                <th rowspan="2">Chuyển Viện</th>
                <th rowspan="2">Xin Về</th>
                <th colspan="3">HIỆN CÓ</th>
                <th rowspan="2">Yêu cầu</th>
            </tr>
            <tr>
                <td><b>Nội Trú</b></td>
                <td><b>Ngoại trú</b></td>
                <td><b>Tổng</b></td>
            </tr>
            <tr>
                <td><b>Khoa CC-HSTC-CĐ</b></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_cu]" class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu"
                        value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_cu}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_vaovien]" class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu hoat_dong_dieu_tri_bn_vaovien"
                        value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_vaovien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_ravien]" class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu"
                        value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_ravien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_chuyenkhoa]" class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu"
                        value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_chuyenkhoa}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_chuyenvien]" class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu"
                        value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_chuyenvien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_xinve]" class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu"
                        value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_xinve}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_noitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu" value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_noitru}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_ngoaitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu" value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_ngoaitru}">
                </td>
                <td>
                        <input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_tong]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu f_auto f_auto_row_1" data-sum="7,8" 
                        value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_tong}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_cc_hstc][bn_namyc]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_capcuu" value="{item.hoat_dong_dieu_tri.khoa_cc_hstc.bn_namyc}">
                </td>
            </tr>
            <tr>
                <td><b>Khoa Ngoại-TH</b></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_cu]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai"
                        value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_cu}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_vaovien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai hoat_dong_dieu_tri_bn_vaovien"
                        value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_vaovien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_ravien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai"
                        value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_ravien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_chuyenkhoa]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai" value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_chuyenkhoa}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_chuyenvien]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai" value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_chuyenvien}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_xinve]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai"
                        value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_xinve}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_noitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai" value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_noitru}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_ngoaitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai" value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_ngoaitru}">
                </td>
                <td>
                        <input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_tong]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai f_auto f_auto_row_2" data-sum="7,8" 
                        value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_tong}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_ngoai_th][bn_namyc]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoangoai" value="{item.hoat_dong_dieu_tri.khoa_ngoai_th.bn_namyc}">
                </td>
            </tr>
            <tr>
                <td><b>Khoa Phụ Sản</b></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_cu]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan"
                        value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_cu}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_vaovien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan hoat_dong_dieu_tri_bn_vaovien"
                        value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_vaovien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_ravien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan"
                        value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_ravien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_chuyenkhoa]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan" value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_chuyenkhoa}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_chuyenvien]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan" value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_chuyenvien}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_xinve]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan"
                        value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_xinve}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_noitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan" value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_noitru}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_ngoaitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan" value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_ngoaitru}">
                </td>
                <td>
                        <input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_tong]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan f_auto f_auto_row_3" data-sum="7,8" 
                        value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_tong}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_phu_san][bn_namyc]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoaphusan" value="{item.hoat_dong_dieu_tri.khoa_phu_san.bn_namyc}">
                </td>
            </tr>
            <tr>
                <td><b>Khoa Nhi</b></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_cu]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi"
                        value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_cu}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_vaovien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi hoat_dong_dieu_tri_bn_vaovien"
                        value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_vaovien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_ravien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi"
                        value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_ravien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_chuyenkhoa]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi"
                        value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_chuyenkhoa}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_chuyenvien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi"
                        value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_chuyenvien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_xinve]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi"
                        value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_xinve}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_noitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi" value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_noitru}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_ngoaitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi" value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_ngoaitru}">
                </td>
                <td>
                        <input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_tong]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi f_auto f_auto_row_4" data-sum="7,8" 
                        value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_tong}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_nhi][bn_namyc]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanhi"
                        value="{item.hoat_dong_dieu_tri.khoa_nhi.bn_namyc}"></td>
            </tr>
            <tr>
                <td><b>Khoa Nội-Tn</b></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_cu]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi"
                        value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_cu}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_vaovien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi hoat_dong_dieu_tri_bn_vaovien"
                        value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_vaovien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_ravien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi"
                        value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_ravien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_chuyenkhoa]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi"
                        value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_chuyenkhoa}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_chuyenvien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi"
                        value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_chuyenvien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_xinve]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi"
                        value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_xinve}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_noitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi" value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_noitru}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_ngoaitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi" value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_ngoaitru}">
                </td>
                <td>
                        <input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_tong]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi f_auto f_auto_row_5" data-sum="7,8" 
                        value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_tong}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_noi_tn][bn_namyc]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi" value="{item.hoat_dong_dieu_tri.khoa_noi_tn.bn_namyc}">
                </td>
            </tr>
            <tr>
                <td><b>Khoa Covid 19</b></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_cu]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi f_col_not_auto"
                        value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_cu}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_vaovien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi hoat_dong_dieu_tri_bn_vaovien f_col_not_auto"
                        value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_vaovien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_ravien]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi f_col_not_auto"
                        value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_ravien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_chuyenkhoa]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi f_col_not_auto" value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_chuyenkhoa}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_chuyenvien]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi f_col_not_auto" value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_chuyenvien}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_xinve]" class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi f_col_not_auto"
                        value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_xinve}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_noitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi f_col_not_auto" value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_noitru}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_ngoaitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi f_col_not_auto"
                        value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_ngoaitru}"></td>
                <td>
                        <input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_tong]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi f_auto f_auto_row_6" data-sum="7,8" 
                        value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_tong}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khoa_covid19][bn_namyc]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_khoanoi" value="{item.hoat_dong_dieu_tri.khoa_covid19.bn_namyc}">
                </td>
            </tr>
            <tr>
                <td><b>Khu YHCT&amp;PHCN</b></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_cu]" class="hoat_dong_dieu_tri form-control w80 has_f f_yhct"
                        value="{item.hoat_dong_dieu_tri.khu_yhct.bn_cu}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_vaovien]" class="hoat_dong_dieu_tri form-control w80 has_f f_yhct hoat_dong_dieu_tri_bn_vaovien"
                        value="{item.hoat_dong_dieu_tri.khu_yhct.bn_vaovien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_ravien]" class="hoat_dong_dieu_tri form-control w80 has_f f_yhct"
                        value="{item.hoat_dong_dieu_tri.khu_yhct.bn_ravien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_chuyenkhoa]" class="hoat_dong_dieu_tri form-control w80 has_f f_yhct"
                        value="{item.hoat_dong_dieu_tri.khu_yhct.bn_chuyenkhoa}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_chuyenvien]" class="hoat_dong_dieu_tri form-control w80 has_f f_yhct"
                        value="{item.hoat_dong_dieu_tri.khu_yhct.bn_chuyenvien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_xinve]" class="hoat_dong_dieu_tri form-control w80 has_f f_yhct"
                        value="{item.hoat_dong_dieu_tri.khu_yhct.bn_xinve}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_noitru]" class="hoat_dong_dieu_tri form-control w80 has_f f_yhct"
                        value="{item.hoat_dong_dieu_tri.khu_yhct.bn_noitru}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_ngoaitru]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_yhct" value="{item.hoat_dong_dieu_tri.khu_yhct.bn_ngoaitru}"></td>
                <td>
                        <input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_tong]"
                        class="hoat_dong_dieu_tri form-control w80 has_f f_yhct f_auto f_auto_row_7" data-sum="7,8" 
                        value="{item.hoat_dong_dieu_tri.khu_yhct.bn_tong}">
                </td>
                <td><input type="number" name="hoat_dong_dieu_tri[khu_yhct][bn_namyc]" class="hoat_dong_dieu_tri form-control w80 has_f f_yhct"
                        value="{item.hoat_dong_dieu_tri.khu_yhct.bn_namyc}"></td>
            </tr>
            <tr class="td-text-danger">
                <td><b>TỔNG CỘNG</b></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_bn_cu]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col" data-col="2"
                        value="{item.hoat_dong_dieu_tri.tong_bn_cu}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_vaovien]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col hoat_dong_dieu_tri_tong_bn_vaovien"  data-col="3"
                        value="{item.hoat_dong_dieu_tri.tong_vaovien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_ravien]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col hoat_dong_dieu_tri_tong_bn_ravien" data-col="4"
                        value="{item.hoat_dong_dieu_tri.tong_ravien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_chuyenkhoa]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col" data-col="5"
                        value="{item.hoat_dong_dieu_tri.tong_chuyenkhoa}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_chuyenvien]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col hoat_dong_dieu_tri_tong_bn_chuyenvien" data-col="6"
                        value="{item.hoat_dong_dieu_tri.tong_chuyenvien}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_xinve]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col" data-col="7"
                        value="{item.hoat_dong_dieu_tri.tong_xinve}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_noitru]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col" data-col="8"
                        value="{item.hoat_dong_dieu_tri.tong_noitru}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_ngoaitru]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col" data-col="9"
                        value="{item.hoat_dong_dieu_tri.tong_ngoaitru}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_sobn]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col" data-col="10"
                        value="{item.hoat_dong_dieu_tri.tong_sobn}"></td>
                <td><input type="number" name="hoat_dong_dieu_tri[tong_ctyc]" class="hoat_dong_dieu_tri form-control w80 has_f f_auto f_auto_col" data-col="11"
                        value="{item.hoat_dong_dieu_tri.tong_ctyc}"></td>
            </tr>
        </tbody>
    </table>
</div>