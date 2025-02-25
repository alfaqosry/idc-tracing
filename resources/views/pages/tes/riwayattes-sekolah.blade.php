@extends('layouts.backend.master')

@section('title', 'Dashboard | IDC Tracing')

@section('content')

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-header flex-column flex-md-row border-bottom">
                    <div class="head-label text-center">
                        <h5 class="card-title mb-0">Riwayat Tes Sekolah {{ $petugas->sekolah->nama_sekolah }}</h5>
                    </div>

                </div>

                <table class="datatables-basic table table-bordered dataTable no-footer dtr-column" id="riwayattessekolah"
                    aria-describedby="riwayattessekolah_info" style="width: 1396px;">
                    <thead>
                        <tr>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 5px;" aria-label="Name: activate to sort column ascending">
                                No</th>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 144px;" aria-label="Waktu Test">Nama Siswa
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                Jenis Kelamin</th>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                Tanggal Lahir</th>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                Suku</th>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                Sekolah</th>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                NISN</th>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                Kelas</th>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                No HP</th>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                Alamat </th>
                            <th class="sorting" tabindex="0" aria-controls="riwayattessekolah" rowspan="1"
                                colspan="1" style="width: 144px;" aria-label="Point Test: ">Point Test Terakhir</th>


                        </tr>
                        <tr>
                            <th></th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Cari Nama Siswa">
                            </th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Cari Jenis Kelamin">
                            </th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Cari Tanggal Lahir">
                            </th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Cari Suku"></th>
                            <th>
                                <select class="form-select form-select-sm">
                                    <option value="">Semua</option>

                                    @foreach ($sekolah as $item)
                                        <option value="{{$item->nama_sekolah}}">{{$item->nama_sekolah}}</option>
                                    @endforeach

                                </select>
                            </th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Cari NISN"></th>
                            <th>
                                <select class="form-select form-select-sm">
                                    <option value="">Semua</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                    <option value="LULUS">LULUS</option>
                                </select>
                            </th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Cari No HP"></th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Cari Alamat">
                            </th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Cari Point Test">
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($siswa as $item)
                            <tr class="odd">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td> <a href="{{ route('tesidc.showbyid', $item->user_id) }}">{{ $item->user->name }}</a>
                                </td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->suku->nama_suku }}</td>
                                <td>{{ $item->sekolah->nama_sekolah }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ Idc::getKelas($item->tahunajaranmasuk) }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->alamat }}</td>

                                <td>

                                    @if ($item->user->tesDiabetes()->latest()->first() == null)
                                        <span class='badge bg-primary'> Belum melakukan Tes</span>
                                    @else
                                        @php
                                            $hasiltes = Idc::get_tes(
                                                $item,
                                                $item->user->tesDiabetes()->latest()->first(),
                                            );

                                        @endphp


                                        {{ Idc::totalpoin($hasiltes['total_poin']) }}
                                    @endif

                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            var table = $('#riwayattessekolah').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });

            // Setup filter pada tiap kolom
            $('#riwayattessekolah thead tr:eq(1) th').each(function(i) {
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });

                // Khusus untuk Select pada kolom Kelas
                $('select', this).on('change', function() {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                });
            });
        });
    </script>

@endsection
