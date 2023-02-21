{{--    delete modal --}}
<div class="modal fade" tabindex="-1" id="kt_modal_delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Hapus</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>
            <form id="form-delete" action="" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus ? Data akan dihapus secara permanen.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--    end modal --}}
