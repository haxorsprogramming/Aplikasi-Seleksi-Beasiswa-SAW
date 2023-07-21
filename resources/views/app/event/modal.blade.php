<!-- modal tambah produk  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahEvent">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="company">Nama Event</label>
                    <input type="text" class="form-control" id="txtNamaEvent">
                    <small><i>*) Nama event minimal 5 karakter</i></small>
                </div>
                <div class="form-group">
                    <label for="company">Keterangan</label>
                    <textarea class="form-control" id="txtKeterangan" style="resize: none;"></textarea>
                </div>
                <div class="form-group">
                    <label for="company">Kuota</label>
                    <input type="number" class="form-control" id="txtKuota" required>
                </div>
                <div class="form-group">
                    <label for="company">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="txtTanggalMulai">
                </div>
                <div class="form-group">
                    <label for="company">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="txtTanggalSelesai">
                </div>
                <div>
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="prosesTambahEvent()">Proses Tambah Event</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
