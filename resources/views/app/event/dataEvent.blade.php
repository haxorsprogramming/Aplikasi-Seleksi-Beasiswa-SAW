<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Event</h4>
            <p class="card-title-desc">
                <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)" @click="tambahEventAtc()">
                    <i class="mdi mdi-plus-box-multiple-outline"></i>
                    Tambah Event Seleksi
                </a>&nbsp;
            </p>

            <div class="table-responsive">
                <table class="table mb-0 table-hover" id="tblDataEvent">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Seleksi</th>
                        <th style="width: 300px;">Deksripsi</th>
                        <th>Kuota</th>
                        <th>Timeline</th>
                        <th>Status Event</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataEvent as $e)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $e->nama_event }}</td>
                            <td>{{ $e->keterangan }}</td>
                            <td>{{ $e->kuota }}</td>
                            <td>{{ $e->tanggal_mulai }}</td>
                            <td>{{ $e->status_event  }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm waves-effect waves-light" href="javascript:void(0)" @click="editEventAtc('{{ $e->kd_event }}')">
                                    <i class="mdi mdi-folder-edit-outline"></i> Edit
                                </a>
                                <a class="btn btn-warning btn-sm waves-effect waves-light" href="javascript:void(0)" @click="deleteEventAtc('{{ $e->kd_event }}')">
                                    <i class="mdi mdi-folder-edit-outline"></i> Hapus
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
