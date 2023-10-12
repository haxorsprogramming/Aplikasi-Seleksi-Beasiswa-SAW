<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Assign Peserta Seleksi</h4>
            <p class="card-title-desc">
                <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)">
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
                        <th>Tanggal Mulai / Selesai</th>
                        <th>Status</th>
                        <th>Kuota</th>
                        <th>Peserta Terdaftar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataEvent as $event)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $event->nama_event }}</td>
                            <td>Mulai : {{ $event->tanggal_mulai }} <br/>Selesai : {{ $event->tanggal_selesai }}</td>
                            <td>{{ $event->status_event }}</td>
                            <td>{{ $event->kuota }}</td>
                            <td></td>
                            <td>
                                <a class="btn btn-success btn-sm waves-effect waves-light" href="javascript:void(0)" onclick="renderPage('app/core/assign/{{$event->kd_event}}', 'Event Seleksi')">
                                    <i class="{{ $iconInfo }}"></i> Detail
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
