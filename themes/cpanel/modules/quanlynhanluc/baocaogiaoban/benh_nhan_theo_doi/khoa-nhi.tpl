<div class="has_fd fd_khoanhi">
    <label class="form-label text-danger">
        6.6. KHOA NHI
    </label>
    <div class="clone-container">
        <div class="clone-wrapper">
            <div class="clone-item empty-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_nhi][tieude][]" 
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <textarea name="benh_nhan_theo_doi[khoa_nhi][noidung][]"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- BEGIN: khoa_nhi -->
            <div class="clone-item first-clone">
                <div class="clone-input">
                    <div class="mb-3 hide">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_nhi][tieude][]" value="{khoa_nhi_item.tieude}"
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <textarea name="benh_nhan_theo_doi[khoa_nhi][noidung][]"
                            class="form-control">{khoa_nhi_item.noidung}</textarea>
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </div>
            <!-- END: khoa_nhi -->
        </div>
        <a class="clone-btn" href="#">Thêm Bệnh nhân</a>
    </div>
</div>