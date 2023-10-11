<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Master Mahasiswa Seleksi</h4>
            <p class="card-title-desc">
                <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)" @click="tambahMahasiswaAtc()">
                    <i class="mdi mdi-plus-box-multiple-outline"></i>
                    Tambah Data Mahasiswa
                </a>&nbsp;
            </p>

            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataEvent">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jurusan</th>
                        <th>Event Terdaftar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataMahasiswa as $mhs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama_lengkap }}</td>
                            <td>{{ $mhs->jurusan }}</td>
                            <td></td>
                            <td>
                                <a class="btn btn-primary btn-sm waves-effect waves-light" href="javascript:void(0)" @click="editEventAtc('{{ $mhs->nim }}')">
                                    <i class="{{$iconEdit}}"></i> Edit
                                </a>
                                <a class="btn btn-warning btn-sm waves-effect waves-light" href="javascript:void(0)" @click="deleteEventAtc('{{ $mhs->nim}}')">
                                    <i class="{{ $iconDelete }}"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
