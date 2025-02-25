@extends('layouts.backend.master')

@section('title', 'Dashboard | IDC Tracing')

@section('content')

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-header flex-column flex-md-row border-bottom">
                    <div class="head-label text-center">
                        <h5 class="card-title mb-0">Riwayat Tes {{$siswa->user->name}}</h5>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 mt-5 mt-md-0">
                        <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                    name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                    class="form-select form-select-sm">
                                    <option value="7">7</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="75">75</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search"
                                    class="form-control form-control-sm" placeholder=""
                                    aria-controls="DataTables_Table_0"></label></div>
                    </div>
                </div>
                <table class="datatables-basic table table-bordered dataTable no-footer dtr-column" id="DataTables_Table_0"
                    aria-describedby="DataTables_Table_0_info" style="width: 1396px;">
                    <thead>
                        <tr>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 5px;" aria-label="Name: activate to sort column ascending">
                                No</th>

                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 5px;" aria-label="Name: activate to sort column ascending">
                                Priode</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 144px;" aria-label="Waktu Test">Waktu Test
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 144px;" aria-label="Point Test: ">Risiko Diabetes</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 144px;" aria-label="Point Test: ">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                      
                 
                        @foreach ($tes as $priode)
                            <tr class="odd">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{$priode->nama_priode}}</td>
                              
                                <td>{{ $priode->tesDiabetes->created_at }}</td>
                                <td>

                                    @php
                                        $hasiltes = Idc::get_tes($siswa, $priode->tesDiabetes);

                                    @endphp


                                    {{ Idc::totalpoin($hasiltes['total_poin']) }}


                                </td>

                                <td>
                                    <a href="{{route('tesidc.show', $priode->tesDiabetes->id)}}" class="btn btn-success btn-sm">Detail</a>
                                </td>

                               

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                            Showing 0 to 0 of 0 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                    <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link"
                                        data-dt-idx="previous" tabindex="-1" class="page-link"><i
                                            class="ri-arrow-left-s-line"></i></a>
                                </li>
                                <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a
                                        aria-controls="DataTables_Table_0" aria-disabled="true" role="link"
                                        data-dt-idx="next" tabindex="-1" class="page-link"><i
                                            class="ri-arrow-right-s-line"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
