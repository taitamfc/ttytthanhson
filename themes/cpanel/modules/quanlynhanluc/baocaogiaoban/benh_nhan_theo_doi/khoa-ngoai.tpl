<div class="has_fd fd_khoangoai">
    <label class="form-label text-danger">
        6.2. KHOA NGOẠI TH
    </label>
    <div class="clone-container">
        <div class="clone-wrapper">
            <div class="clone-item empty-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_ngoai][tieude][]" 
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <input name="benh_nhan_theo_doi[khoa_ngoai][noidung][]"
                            class="form-control">
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- BEGIN: khoa_ngoai -->
            <div class="clone-item first-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_ngoai][tieude][]" value="{khoa_ngoai_item.tieude}"
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <input name="benh_nhan_theo_doi[khoa_ngoai][noidung][]"
                            class="form-control" value="{khoa_ngoai_item.noidung}">
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- END: khoa_ngoai -->
        </div>
        <a class="clone-btn" href="#">Thêm Bệnh nhân</a>
    </div>
</div>