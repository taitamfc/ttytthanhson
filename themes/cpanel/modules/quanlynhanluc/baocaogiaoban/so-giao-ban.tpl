<div class="mb-3">
    <label class="form-label">Thời gian bắt đầu:</label>
    <table class="table">
        <tr>
            <td>Giờ</td>
            <td> <input name="sgb[bat_dau][gio]" value="{item.sgb.bat_dau.gio}" type="number" class="form-control"> </td>
            <td>Phút</td>
            <td> <input name="sgb[bat_dau][phut]" value="{item.sgb.bat_dau.phut}" type="number" class="form-control"> </td>
            <td>Ngày</td>
            <td> <input name="sgb[bat_dau][ngay]" value="{item.sgb.bat_dau.ngay}" type="number" class="form-control"> </td>
            <td>Tháng</td>
            <td> <input name="sgb[bat_dau][thang]" value="{item.sgb.bat_dau.thang}" type="number" class="form-control"> </td>
            <td>Năm</td>
            <td> <input name="sgb[bat_dau][nam]" value="{item.sgb.bat_dau.nam}" type="number" class="form-control"> </td>
        </tr>
    </table>
</div>
<div class="mb-3">
    <label class="form-label">Thành phần tham dự:</label>
    <table class="table">
        <tr>
            <td>
                <label  class="form-label">Chủ trì</label>
                <select value="{item.sgb.tham_du.chu_tri}" name="sgb[tham_du][chu_tri]" class="form-control">
                    <option value="Nguyễn Minh Sơn, Giám đốc">Nguyễn Minh Sơn, Giám đốc</option>
                    <option value="Đặng Thế Vụ, Phó Giám đốc">Đặng Thế Vụ, Phó Giám đốc</option>
                    <option value="Đỗ Đăng Lâm, Phó Giám đốc">Đỗ Đăng Lâm, Phó Giám đốc</option>
                    <option value="Trần Văn Luyện, Phó Giám đốc">Trần Văn Luyện, Phó Giám đốc</option>
                </select>
            </td>
            <td> 
                <label  class="form-label">Thư ký</label>
                <select value="{item.sgb.tham_du.thu_ky}" name="sgb[tham_du][thu_ky]" class="form-control">
                    <option value="Nguyễn Xuân Trưởng, Viên chức">Nguyễn Xuân Trưởng, Viên chức</option>
                    <option value="Nguyễn Quang Huy, Viên chức">Nguyễn Quang Huy, Viên chức</option>
                    <option value="Nguyễn Hồng Chuyên, Trưởng phòng KHNV">Nguyễn Hồng Chuyên, Trưởng phòng KHNV</option>
                    <option value="Nguyễn Thị Thủy, Viên chức">Nguyễn Thị Thủy, Viên chức</option>
                    <option value="Tô Thị Lan Hương, Phó phòng KHNV">Tô Thị Lan Hương, Phó phòng KHNV</option>
                    <option value="Nguyễn Hoàng Anh, Viên chức">Nguyễn Hoàng Anh, Viên chức</option>
                </select>
            </td>
            <td> 
                <label  class="form-label">Thành phần khác</label>
                <input value="{item.sgb.tham_du.thanh_phan_khac}" name="sgb[tham_du][thanh_phan_khac]" type="text" class="form-control"> 
            </td>
        </tr>
    </table>
</div>
<div class="mb-3">
    <label class="form-label">Các nội dung khác:</label>
    <textarea name="sgb[noi_dung_khac]" class="form-control">{item.sgb.noi_dung_khac}</textarea>

</div>
<div class="mb-3">
    <label class="form-label">Thời gian kết thúc:</label>
    <table class="table">
        <tr>
            <td>Giờ</td>
            <td> <input value="{item.sgb.ket_thuc.gio}" name="sgb[ket_thuc][gio]"  type="number" class="form-control"> </td>
            <td>Phút</td>
            <td> <input value="{item.sgb.ket_thuc.phut}" name="sgb[ket_thuc][phut]" type="number" class="form-control"> </td>
            <td>Ngày</td>
            <td> <input value="{item.sgb.ket_thuc.ngay}" name="sgb[ket_thuc][ngay]" type="number" class="form-control"> </td>
            <td>Tháng</td>
            <td> <input value="{item.sgb.ket_thuc.thang}" name="sgb[ket_thuc][thang]" type="number" class="form-control"> </td>
            <td>Năm</td>
            <td> <input value="{item.sgb.ket_thuc.nam}" name="sgb[ket_thuc][nam]" type="number" class="form-control"> </td>
        </tr>
    </table>
</div>