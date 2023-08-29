<div class="has_fd fd_khoanoi">
    <label class="form-label text-danger">
        6.4. KHOA NỘI
    </label>
    <div class="clone-container">
        <div class="clone-wrapper">
            <div class="clone-item empty-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_noi][tieude][]" value="" class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <input name="benh_nhan_theo_doi[khoa_noi][noidung][]" class="form-control">
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- BEGIN: khoa_noi -->
            <div class="clone-item first-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_noi][tieude][]" value="{khoa_noi_item.tieude}"
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <input name="benh_nhan_theo_doi[khoa_noi][noidung][]"
                            class="form-control" value="{khoa_noi_item.noidung}">
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- END: khoa_noi -->
        </div>
        <a class="clone-btn" href="#">Thêm Bệnh nhân</a>
    </div>
</div>