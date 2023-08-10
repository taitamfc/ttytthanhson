<div class="clone-container">
    <ol class="clone-wrapper">
        <li class="clone-item empty-clone">
            <div class="clone-input">
                <div class="mb-3">
                    <label class="form-label">Bệnh nhân</label>
                    <input name="benh_nhan_mo_phien[]" class="form-control" type="text">
                </div>
            </div>
            <div class="clone-action">
                <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
            </div>
        </li>
        <!-- BEGIN: benh_nhan_mo_phien -->
        <li class="clone-item first-clone">
            <div class="clone-input">
                <div class="mb-3">
                    <label class="form-label">Bệnh nhân</label>
                    <input name="benh_nhan_mo_phien[]" value="{benh_nhan_mo_phien_item}" class="form-control" type="text">
                </div>
            </div>
            <div class="clone-action">
                <button type="button" class="btn btn-danger btn-sm clone-remove">X</button>
            </div>
        </li>
        <!-- END: benh_nhan_mo_phien -->

    </ol>
    <a class="clone-btn" href="#">Thêm bệnh nhân</a>
</div>