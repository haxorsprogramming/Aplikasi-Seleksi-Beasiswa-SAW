<!-- modal tambah mahasiswa  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahMahasiswa">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center;">
                        <img src="{{ asset('ladun/base/default-user-profile-picture.jpg') }}" id="txtPreviewUpload" style="width: 250px;text-align: center;">
                        <br/>
                        <input type="file" id="txtFoto" onchange="setImg()" style="margin-top: 10px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="company">NIM (Nomor Induk Mahasiswa)</label>
                            <input type="text" class="form-control" id="txtNim">
                        </div>
                        <div class="form-group">
                            <label for="company">NIK (Nomor Induk Kependudukan)</label>
                            <input type="text" class="form-control" id="txtNik">
                        </div>
                        <div class="form-group">
                            <label for="company">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="txtNama">
                        </div>
                        <div class="form-group">
                            <label for="company">Tempat Lahir</label>
                            <input type="text" class="form-control" id="txtTempatLahir">
                        </div>
                        <div class="form-group">
                            <label for="company">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="txtTanggalLahir">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="company">Jurusan</label>
                            <select class="form-control" id="txtJurusan">
                                <option value="none">-- Pilih Jurusan --</option>
                                @foreach($dataJurusan as $jurusan)
                                    <option value="{{ $jurusan }}">{{ $jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="company">Nomor Handphone</label>
                            <input type="text" class="form-control" id="txtHp">
                            <small><i>Nomor handphone min. 5 karakter</i></small>
                        </div>
                        <div class="form-group">
                            <label for="company">Email</label>
                            <input type="text" class="form-control" id="txtEmail">
                            <small><i>Email min. 4 karakter</i></small>
                        </div>
                        <div class="form-group">
                            <label for="company">Username</label>
                            <input type="text" class="form-control" id="txtUsername">
                            <small><i>Username min. 4 karakter</i></small>
                        </div>
                        <div class="form-group">
                            <label for="company">Alamat</label>
                            <textarea class="form-control" style="height: 50px;resize: none;" id="txtAlamat"></textarea>
                            <small><i>Alamat tidak boleh kosong !!!</i></small>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="javascript:void(0)" class="btn btn-primary" id="btnTambahMahasiswa" onclick="preTambahMahasiswa()">Proses Tambah Mahasiswa</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit mahasiswa  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditMahasiswa">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center;">
                        <img src="{{ asset('ladun/base/default-user-profile-picture.jpg') }}" id="txtPreviewUploadEdit" style="width: 250px;text-align: center;">
                        <br/>
                        <input type="file" id="txtFotoEdit" onchange="setImgEdit()" style="margin-top: 10px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="company">NIM (Nomor Induk Mahasiswa)</label>
                            <input type="text" class="form-control disabled" readonly id="txtNimEdit">
                        </div>
                        <div class="form-group">
                            <label for="company">NIK (Nomor Induk Kependudukan)</label>
                            <input type="text" class="form-control" id="txtNikEdit">
                        </div>
                        <div class="form-group">
                            <label for="company">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="txtNamaEdit">
                        </div>
                        <div class="form-group">
                            <label for="company">Tempat Lahir</label>
                            <input type="text" class="form-control" id="txtTempatLahirEdit">
                        </div>
                        <div class="form-group">
                            <label for="company">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="txtTanggalLahirEdit">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="company">Jurusan</label>
                            <select class="form-control" id="txtJurusanEdit">
                                <option value="none">-- Pilih Jurusan --</option>
                                @foreach($dataJurusan as $jurusan)
                                    <option value="{{ $jurusan }}">{{ $jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="company">Nomor Handphone</label>
                            <input type="text" class="form-control" id="txtHpEdit">
                            <small><i>Nomor handphone min. 5 karakter</i></small>
                        </div>
                        <div class="form-group">
                            <label for="company">Email</label>
                            <input type="text" class="form-control" id="txtEmailEdit">
                            <small><i>Email min. 4 karakter</i></small>
                        </div>
                        <div class="form-group">
                            <label for="company">Username</label>
                            <input type="text" class="form-control" id="txtUsernameEdit">
                            <small><i>Username min. 4 karakter</i></small>
                        </div>
                        <div class="form-group">
                            <label for="company">Alamat</label>
                            <textarea class="form-control" style="height: 50px;resize: none;" id="txtAlamatEdit"></textarea>
                            <small><i>Alamat tidak boleh kosong !!!</i></small>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="javascript:void(0)" class="btn btn-primary" id="btnEditMahasiswa" onclick="preTambahMahasiswa()">Proses Edit Mahasiswa</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
