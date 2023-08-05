<div class="has_fd fd_yhct">
    <label class="form-label text-danger">
        6.7. KHOA YHCT
    </label>
    <div class="clone-container">
        <ol class="clone-wrapper">
            <li class="clone-item empty-clone">
                <div class="clone-input">
                    {* <div class="mb-3">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_yhct][tieude][]" value=""
                            class="form-control" type="text">
                    </div> *}
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <textarea name="benh_nhan_theo_doi[khoa_yhct][noidung][]"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </li>
            <!-- BEGIN: khoa_yhct -->
            <li class="clone-item first-clone">
                <div class="clone-input">
                    {* <div class="mb-3">
                        <label class="form-label">Tiêu đề báo cáo</label>
                        <input name="benh_nhan_theo_doi[khoa_yhct][tieude][]" value="{khoa_yhct_item.tieude}"
                            class="form-control" type="text">
                    </div> *}
                    <div class="mb-3">
                        <label class="form-label">Bệnh nhân</label>
                        <textarea name="benh_nhan_theo_doi[khoa_yhct][noidung][]"
                            class="form-control">{khoa_yhct_item.noidung}</textarea>
                    </div>
                </div>
                <div class="clone-action">
                    <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
                </div>
            </li>
            <!-- END: khoa_yhct -->
        </ol>
        <a class="clone-btn" href="#">Thêm Bệnh nhân</a>
    </div>
</div>