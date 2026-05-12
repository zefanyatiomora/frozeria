<div class="modal fade" id="modalHapusKategori" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">

            <div class="d-flex align-items-start gap-3">

                {{-- ICON --}}
                <div class="border border-danger text-danger d-flex align-items-center justify-content-center"
                    style="width:50px; height:50px; border-radius:6px;">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>

                {{-- TEXT --}}
                <div>
                    <h5 class="fw-bold mb-1">
                        Hapus kategori?
                    </h5>

                    <p class="mb-0 text-muted">
                        Data
                        <strong id="namaKategori"></strong>
                        akan dihapus secara permanen dari sistem.
                        Tindakan ini tidak dapat dibatalkan.
                    </p>
                </div>
            </div>

            <hr class="my-4">

            {{-- BUTTON --}}
            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-light border" data-bs-dismiss="modal">
                    Batal
                </button>

                <form id="formHapusKategori" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-danger">

                        Ya, Hapus

                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
