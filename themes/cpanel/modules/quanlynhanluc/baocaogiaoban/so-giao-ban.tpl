<div class="mb-3">
    <label class="form-label">Thời gian bắt đầu:</label>
    <table class="table">
        <tr>
            <td>Giờ</td>
            <td> <input name="sgb[bat_dau][gio]" type="number" class="form-control"> </td>
            <td>Phút</td>
            <td> <input name="sgb[bat_dau][phut]" type="number" class="form-control"> </td>
            <td>Ngày</td>
            <td> <input name="sgb[bat_dau][ngay]" type="number" class="form-control"> </td>
            <td>Tháng</td>
            <td> <input name="sgb[bat_dau][thang]" type="number" class="form-control"> </td>
            <td>Năm</td>
            <td> <input name="sgb[bat_dau][nam]" type="number" class="form-control"> </td>
        </tr>
    </table>
</div>
<div class="mb-3">
    <label class="form-label">Thành phần tham dự:</label>
    <table class="table">
        <tr>
            <td>
                <label  class="form-label">Chủ trì</label>
                <select name="sgb[tham_du][chu_tri]" class="form-control">
                    <option>Nguyễn Minh Sơn, Giám đốc</option>
                    <option>Đặng Thế Vụ, Phó Giám đốc</option>
                    <option>Đỗ Đăng Lâm, Phó Giám đốc</option>
                    <option>Trần Văn Luyện, Phó Giám đốc</option>
                </select>
            </td>
            <td> 
                <label  class="form-label">Thư ký</label>
                <select name="sgb[tham_du][thu_ky]" class="form-control">
                    <option>Nguyễn Xuân Trưởng, Viên chức</option>
                    <option>Nguyễn Quang Huy, Viên chức</option>
                    <option>Nguyễn Hồng Chuyên, Trưởng phòng KHNV</option>
                    <option>Nguyễn Thị Thủy, Viên chức</option>
                    <option>Tô Thị Lan Hương, Phó phòng KHNV</option>
                    <option>Nguyễn Hoàng Anh, Viên chức</option>
                </select>
            </td>
            <td> 
                <label  class="form-label">Thành phần khác</label>
                <input name="sgb[tham_du][thanh_phan_khac]" type="text" class="form-control"> 
            </td>
        </tr>
    </table>
</div>
<div class="mb-3">
    <label class="form-label">Các nội dung khác:</label>
    <table class="table">
        <tbody>
            <tr>
                <td>Nội dung</td>
                <td>
                    <textarea name="sgb[noi_dung_khac][]" class="form-control"></textarea>
                </td>
                <td> <a href="#" class="text-danger">Xóa</a> </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"> <a href="#" class="text-primary">Thêm mới</a> </td>
            </tr>
        </tfoot>
        
    </table>
</div>
<div class="mb-3">
    <label class="form-label">Thời gian kết thúc:</label>
    <table class="table">
        <tr>
            <td>Giờ</td>
            <td> <input name="sgb[ket_thuc][gio]" type="number" class="form-control"> </td>
            <td>Phút</td>
            <td> <input name="sgb[ket_thuc][phut]" type="number" class="form-control"> </td>
            <td>Ngày</td>
            <td> <input name="sgb[ket_thuc][ngay]" type="number" class="form-control"> </td>
            <td>Tháng</td>
            <td> <input name="sgb[ket_thuc][thang]" type="number" class="form-control"> </td>
            <td>Năm</td>
            <td> <input name="sgb[ket_thuc][nam]" type="number" class="form-control"> </td>
        </tr>
    </table>
</div>