@extends('layouts.backend.master')

@section('title', 'Dashboard | IDC Tracing')

@section('content')

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-header flex-column flex-md-row border-bottom">
                    <div class="head-label text-center">
                        <h5 class="card-title mb-0">Riwayat Tes Sekolah {{ $sekolah->nama_sekolah }}</h5>
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
                    </thead>
                    <tbody>

                        @foreach ($siswa as $item)
                            <tr class="odd">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td> <a href="{{ route('tesidc.showbyid',$item->user_id ) }}">{{ $item->user->name }}</a></td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->suku->nama_suku }}</td>
                                <td>{{ $item->sekolah->nama_sekolah }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->alamat }}</td>

                                <td>
                                    @php
                                        $hasiltes = Idc::get_tes($item, $item->user->tesDiabetes()->latest()->first());

                                    @endphp


                                    {{ Idc::totalpoin($hasiltes['total_poin']) }}

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
    var table = $('#riwayattessekolah').DataTable({
        "scrollX": true, // Aktifkan scroll horizontal
        "paging": true,  // Aktifkan pagination
       
    });
});
    </script>

@endsection
