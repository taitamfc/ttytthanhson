<div class="has_fd fd_khoaphusan">
    <label class="form-label text-danger">
        6.3. KHOA PHỤ SẢN
    </label>
    <div class="clone-container">
        <div class="clone-wrapper">
            <div class="clone-item empty-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_phusan][tieude][]" value=""
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <textarea name="benh_nhan_theo_doi[khoa_phusan][noidung][]"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- BEGIN: khoa_phusan -->
            <div class="clone-item first-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_phusan][tieude][]" value="{khoa_phusan_item.tieude}"
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <textarea name="benh_nhan_theo_doi[khoa_phusan][noidung][]"
                            class="form-control">{khoa_phusan_item.noidung}</textarea>
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- END: khoa_phusan -->
        </div>
        <a class="clone-btn" href="#">Thêm Bệnh nhân</a>
    </div>
</div>