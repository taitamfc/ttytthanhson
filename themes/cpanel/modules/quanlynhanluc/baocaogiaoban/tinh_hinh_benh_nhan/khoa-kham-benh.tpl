<table class="table table-hover table-bordered">
    <tr class="td-text-danger">
        <th colspan="2">TỔNG SỐ </th>
        <td>
        <input type="number" class="form-control w80 has_f f_khoakb" name="tinh_hinh_benh_nhan[bhyt][tong]" value="{item.tinh_hinh_benh_nhan.bhyt.tong}">
        </td>
    </tr>
    <tr>
        <td rowspan="2">Bệnh nhân BHYT246</td>
        <td>Ngoại tỉnh</td>
        <td><input type="number" class="form-control w80 has_f f_khoakb" name="tinh_hinh_benh_nhan[bhyt][ngoaitinh]" value="{item.tinh_hinh_benh_nhan.bhyt.ngoaitinh}">  </td>
    </tr>
    <tr>
        <td>Nội tỉnh</td>
        <td><input type="number" name="tinh_hinh_benh_nhan[bhyt][noitinh]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.bhyt.noitinh}"></td>
    </tr>
    <tr>
        <td colspan="2">Bệnh nhân Viện phí</td>
        <td><input type="number" name="tinh_hinh_benh_nhan[bn_vienphi]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.bn_vienphi}"></td>
    </tr>
    <tr>
        <td colspan="2">Bệnh nhân vào viện </td>
        <td><input type="number" name="tinh_hinh_benh_nhan[bn_vaovien]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.bn_vaovien}"></td>
    </tr>
    <tr>
        <td colspan="2">Bệnh nhân chuyển viện </td>
        <td><input type="number" name="tinh_hinh_benh_nhan[bn_chuyenvien]" class="form-control w80 has_f f_khoakb" value="{item.tinh_hinh_benh_nhan.bn_chuyenvien}"></td>
    </tr>
</table>