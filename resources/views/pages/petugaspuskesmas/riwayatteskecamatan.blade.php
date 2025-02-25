@extends('layouts.backend.master')

@section('title', 'Dashboard | IDC Tracing')

@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-datatable pt-0">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row border-bottom">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0">Daftar Riwayat Kecamatan</h5>
                        </div>

                    </div>

                    <table class="table table-bordered no-footer dtr-column" id="tabelpetugasuks"
                        aria-describedby="petugasuks_info" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1"
                                    colspan="1" style="width: 5px;" aria-label="Name: activate to sort column ascending">
                                    No</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1"
                                    colspan="1" style="width: 144px;" aria-label="Username: Masukan nama siswa">Nama
                                    Sekolah
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sekolah as $item)
                                <tr class="odd">
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>

                                        <a href="{{route('petugaspukesmas.siswabysekolah', $item->id)}}">{{ $item->nama_sekolah }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>



    </div>




@endsection
