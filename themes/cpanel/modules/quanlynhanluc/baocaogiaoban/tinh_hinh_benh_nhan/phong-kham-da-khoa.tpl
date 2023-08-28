<!--table class="table table-hover table-bordered">
    <tr>
        <td>Phòng Khám ĐK Phú Thứ</td>
        <td>BH</td>
        <td>VP</td>
        <td>Tổng</td>
    </tr>
    <tr>
        <td>Phòng khám Chung</td>
        <td> <input type="number" name="tinh_hinh_benh_nhan[pkdk][phong_kham_chung][BH]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.phong_kham_chung.BH}"> </td>
        <td> <input type="number" name="tinh_hinh_benh_nhan[pkdk][phong_kham_chung][VP]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.phong_kham_chung.VP}"> </td>
        <td> <input type="number" name="tinh_hinh_benh_nhan[pkdk][phong_kham_chung][TONG]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.phong_kham_chung.TONG}"> </td>
    </tr>
    <tr>
        <td>Phòng khám Sản</td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][phong_kham_san][BH]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.phong_kham_san.BH}"></td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][phong_kham_san][VP]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.phong_kham_san.VP}"></td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][phong_kham_san][TONG]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.phong_kham_san.TONG}"></td>
    </tr>
    <tr>
        <td>Phòng khám Cấp Cứu</td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][phong_kham_capcuu][BH]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.phong_kham_capcuu.BH}"></td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][phong_kham_capcuu][VP]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.phong_kham_capcuu.VP}"></td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][phong_kham_capcuu][TONG]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.phong_kham_capcuu.TONG}"></td>
    </tr>
    <tr class="td-text-danger">
        <td>Tổng số BN</td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][TONG_BH]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.TONG_BH}"></td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][TONG_VP]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.TONG_VP}"></td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][TONG_TONG]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.TONG_TONG}"></td>
    </tr>
</table-->

<table class="table table-hover table-bordered">
    <tr class="td-text-danger">
        <th colspan="2">TỔNG SỐ </th>
        <td>
        <input type="number" class="form-control w80 has_f f_khoakb tong_benh_nhan_kham_phuthu" name="tinh_hinh_benh_nhan[pkdk][bhyt][tong]" value="{item.tinh_hinh_benh_nhan.pkdk.bhyt.tong}">
        </td>
    </tr>
    <tr>
        <td rowspan="2">Bệnh nhân BHYT 246</td>
        <td>Ngoại tỉnh</td>
        <td><input type="number" class="form-control w80 has_f f_khoakb benh_nhan_kham_phuthu" name="tinh_hinh_benh_nhan[pkdk][bhyt][ngoaitinh]" value="{item.tinh_hinh_benh_nhan.pkdk.bhyt.ngoaitinh}">  </td>
    </tr>
    <tr>
        <td>Nội tỉnh</td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][bhyt][noitinh]" class="form-control w80 has_f f_khoakb benh_nhan_kham_phuthu" value="{item.tinh_hinh_benh_nhan.pkdk.bhyt.noitinh}"></td>
    </tr>
    <tr>
        <td colspan="2">Bệnh nhân Viện phí</td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][bn_vienphi]" class="form-control w80 has_f f_khoakb benh_nhan_kham_phuthu" value="{item.tinh_hinh_benh_nhan.pkdk.bn_vienphi}"></td>
    </tr>
    <tr>
        <td colspan="2">Bệnh nhân vào viện </td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][bn_vaovien]" class="form-control w80 has_f f_khoakb " value="{item.tinh_hinh_benh_nhan.pkdk.bn_vaovien}"></td>
    </tr>
    <tr>
        <td colspan="2">Bệnh nhân chuyển viện </td>
        <td><input type="number" name="tinh_hinh_benh_nhan[pkdk][bn_chuyenvien]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.pkdk.bn_chuyenvien}"></td>
    </tr>
</table>