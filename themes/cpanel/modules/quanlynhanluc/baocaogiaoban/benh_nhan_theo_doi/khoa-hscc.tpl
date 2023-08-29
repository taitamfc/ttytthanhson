<div class="has_fd fd_khoahscc">
    <label class="form-label text-danger">6.1.KHOA HSCC</label>
    <div class="clone-container">
        <div class="clone-wrapper">
            <div class="clone-item empty-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_hscc][tieude][]" value=""
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bênh nhân</label>
                        <input name="benh_nhan_theo_doi[khoa_hscc][noidung][]"
                            class="form-control">
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- BEGIN: khoa_hscc -->
            <div class="clone-item first-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_hscc][tieude][]" value="{khoa_hscc_item.tieude}"
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bênh nhân</label>
                        <input name="benh_nhan_theo_doi[khoa_hscc][noidung][]"
                            class="form-control" value="{khoa_hscc_item.noidung}">
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- END: khoa_hscc -->
        </div>
        <a class="clone-btn" href="#">Thêm nội dung báo cáo</a>
    </div>
</div>