@extends('layouts.backend.master')

@section('title', 'Dashboard | IDC Tracing')

@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row border-bottom">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0">Daftarrrr Sekolah</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="btn-group">
                                    <button
                                        class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-4 waves-effect waves-light"
                                        tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                        aria-haspopup="dialog" aria-expanded="false"><span><i
                                                class="ri-external-link-line me-sm-1"></i> <span
                                                class="d-none d-sm-inline-block">Export</span></span></button>
                                </div>
                                <a href="{{ route('sekolah.create') }}"
                                    class="btn btn-secondary create-new btn-primary waves-effect waves-light" tabindex="0"
                                    aria-controls="DataTables_Table_0"><span><i class="ri-add-line ri-16px me-sm-2"></i>
                                        <span class="d-none d-sm-inline-block">Tambah Sekolah</span></span></a>
                            </div>
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
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                        type="search" class="form-control form-control-sm" placeholder=""
                                        aria-controls="DataTables_Table_0"></label></div>
                        </div>
                    </div>
                    <table class="datatables-basic table table-bordered dataTable no-footer dtr-column"
                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1396px;">
                        <thead>
                            <tr>
                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                    style="width: 49px; display: none;" aria-label=""></th>
                                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                    colspan="1" style="width: 50px;" data-col="1" aria-label=""><input type="checkbox"
                                        class="form-check-input"></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 144px;"
                                    aria-label="Name: activate to sort column ascending">Nama Sekolah</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 147px;"
                                    aria-label="Email: activate to sort column ascending">Kecamatan</th>

                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 176px;"
                                    aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                <td></td>
                            </tr>
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
                                    <li class="paginate_button page-item previous disabled"
                                        id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0"
                                            aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1"
                                            class="page-link"><i class="ri-arrow-left-s-line"></i></a></li>
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



    </div>
    <script src="{{ asset('aplikasi/material/assets/js/tables-datatables-basic.js') }}"></script>

@endsection
