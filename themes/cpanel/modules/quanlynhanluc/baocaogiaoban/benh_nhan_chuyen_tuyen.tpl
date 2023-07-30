<div class="clone-container">
    <ol class="clone-wrapper">
        <li class="clone-item empty-clone">
            <div class="clone-input">
                <div class="mb-3">
                    <label class="form-label">Bệnh nhân</label>
                    <input name="benh_nhan_chuyen_tuyen[benh_nhan][]" class="form-control" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label">Chẩn đoán</label>
                    <input name="benh_nhan_chuyen_tuyen[chuan_doan][]" class="form-control" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nơi chuyển đến</label>
                    <input name="benh_nhan_chuyen_tuyen[noi_chuyen_den][]" class="form-control" type="text">
                </div>
            </div>
            <div class="clone-action">
                <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
            </div>
        </li>
        <!-- BEGIN: benh_nhan_chuyen_tuyen -->
        <li class="clone-item first-clone">
            <div class="clone-input">
                <div class="mb-3">
                    <label class="form-label">Bệnh nhân</label>
                    <input name="benh_nhan_chuyen_tuyen[benh_nhan][]" class="form-control" value="{benh_nhan_chuyen_tuyen_item.benh_nhan}" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label">Chẩn đoán</label>
                    <input name="benh_nhan_chuyen_tuyen[chuan_doan][]" class="form-control" value="{benh_nhan_chuyen_tuyen_item.chuan_doan}" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nơi chuyển đến</label>
                    <input name="benh_nhan_chuyen_tuyen[noi_chuyen_den][]" value="{benh_nhan_chuyen_tuyen_item.noi_chuyen_den}" class="form-control" type="text">
                </div>
            </div>
            <div class="clone-action">
                <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
            </div>
        </li>
        <!-- END: benh_nhan_chuyen_tuyen -->
    </ol>
    <a class="clone-btn" href="#">Thêm bệnh nhân</a>
</div>