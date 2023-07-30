<div class="has_fd fd_khoangoai">
    <label class="form-label text-danger">
        6.2. KHOA NGOẠI TH
    </label>
    <div class="clone-container">
        <ol class="clone-wrapper">
            <li class="clone-item empty-clone">
                <div class="clone-input">
                    <div class="mb-3">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_ngoai][tieude][]" 
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội dung báo cáo</label>
                        <textarea name="benh_nhan_theo_doi[khoa_ngoai][noidung][]"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </li>
            <!-- BEGIN: khoa_ngoai -->
            <li class="clone-item first-clone">
                <div class="clone-input">
                    <div class="mb-3">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_ngoai][tieude][]" value="{khoa_ngoai_item.tieude}"
                            class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội dung báo cáo</label>
                        <textarea name="benh_nhan_theo_doi[khoa_ngoai][noidung][]"
                            class="form-control">{khoa_ngoai_item.noidung}</textarea>
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </li>
            <!-- END: khoa_ngoai -->
        </ol>
        <a class="clone-btn" href="#">Thêm nội dung báo cáo</a>
    </div>
</div>