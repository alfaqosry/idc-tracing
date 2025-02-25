@extends('layouts.backend.master')

@section('title', 'Dashboard | IDC Tracing')

@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

      
            <div class="card-datatable table-responsive pt-0">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row border-bottom">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0">Daftar Sekolah</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="btn-group">
                                    {{-- <button
                                        class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-4 waves-effect waves-light"
                                        tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                        data-bs-toggle="modal" data-bs-target="#importsekolah"><span><i
                                                class="ri-external-link-line me-sm-1"></i> <span
                                                class="d-none d-sm-inline-block">Import</span></span></button> --}}



                                </div>
                                <button class="btn btn-secondary create-new btn-primary waves-effect waves-light"
                                    tabindex="0" aria-controls="DataTables_Table_0" data-bs-toggle="modal"
                                    data-bs-target="#tambahsekolah" type="button"><span><i
                                            class="ri-add-line ri-16px me-sm-2"></i>
                                        <span class="d-none d-sm-inline-block">Tambah Sekolah</span></span></button>


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
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 5px;" aria-label="Name: activate to sort column ascending">
                                    No</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 144px;"
                                    aria-label="Name: activate to sort column ascending">Nama Sekolah</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 144px;"
                                    aria-label="NPSN: activate to sort column ascending">NPSN</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 147px;"
                                    aria-label="Email: activate to sort column ascending">Kecamatan</th>

                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 10px;"
                                    aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sekolah as $item)
                                <tr class="odd">
                                  

                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_sekolah }}</td>
                                    <td>{{ $item->npsn }}</td>
                                    <td>{{ $item->kec }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-line"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <button class="dropdown-item waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#editsekolah"
                                                    data-bs-sekolah="{{ $item->nama_sekolah }}"
                                                    data-bs-kec="{{ $item->kec }}" data-bs-id="{{ $item->id }}"
                                                    data-bs-npsn="{{ $item->npsn }}"><i class="ri-pencil-line me-1"></i>
                                                    Edit</button>
                                                <button class="dropdown-item waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#hapussekolah" data-bs-id="{{ $item->id }}"><i
                                                        class="ri-delete-bin-7-line me-1"></i> Delete</button>
                                                    <a class="dropdown-item waves-effect" href="{{route('tesidc.riwayat-sekolah-all', $item->id)}}"><i
                                                            class="ri-hospital-line me-1"></i> Lihat Tes Siswa</a>


                                            </div>
                                        </div>
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


    <!-- tambah sekolah -->
    <div class="modal fade" id="tambahsekolah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Tambah Sekolah</h4>
                        <p class="mb-6">Tambahkan sekolah baru ke daftar</p>
                    </div>
                    <form id="editUserForm" class="row g-5" method="POST" action="{{ route('sekolah.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalTambahSekolah" name="nama_sekolah" class="form-control"
                                    placeholder="SMAN Bangkinang Kota" />
                                <label for="modalTambahSekolah">Nama Sekolah</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalTambahNpsn" name="npsn" class="form-control"
                                    placeholder="10400307" />
                                <label for="modalTambahNpsn">NPSN</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalTambahKec" name="kec" class="form-control"
                                    placeholder="Bangkinang" />
                                <label for="modalTambahKec">Kecamatan</label>
                            </div>
                        </div>

                        <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Tambah sekolah Modal -->

    <!-- edit sekolah -->
    <div class="modal fade" id="editsekolah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Edit Sekolah</h4>
                        <p class="mb-6">Update data sekolah </p>
                    </div>
                    <form id="editSekolahForm" class="row g-5" method="POST" action=""
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalEditSekolah" name="nama_sekolah" class="form-control"
                                    placeholder="SMAN Bangkinang Kota" />
                                <label for="modalEditSekolah">Nama Sekolah</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalEditNpsn" name="npsn" class="form-control"
                                    placeholder="10400307" />
                                <label for="modalEditNpsn">NPSN</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalEditKec" name="kec" class="form-control"
                                    placeholder="Bangkinang" />
                                <label for="modalEditKec">Kecamatan</label>
                            </div>
                        </div>

                        <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Edit sekolah Modal -->



    <!-- edit sekolah -->
    <div class="modal fade" id="hapussekolah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Hapus Data Sekolah</h4>
                        <p class="mb-6">Apakah Anda yakin ingin menghapus data sekolah ini ? </p>
                    </div>

                    <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                        <a class="btn btn-danger" id="tombolhapus" href="">Hapus</a>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
                            Batal
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/ Edit sekolah Modal -->




    <!-- imporat sekolah -->
    <div class="modal fade" id="importsekolah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">

                    <form id="formimportsekolah" class="row g-5" method="POST" action="{{ route('sekolah.import') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="ol-12 col-md-12">
                            <label for="formFile" class="form-label">Import data Sekolah</label>
                            <input class="form-control" type="file" name="file" id="formFile">
                        </div>

                        <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                            <button type="submit" class="btn btn-primary">Import</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('aplikasi/material/assets/js/tables-datatables-basic.js') }}"></script>

    <script>
        const modalEdit = document.getElementById('editsekolah')
        if (modalEdit) {
            modalEdit.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const sekolah = button.getAttribute('data-bs-sekolah')
                const kec = button.getAttribute('data-bs-kec')
                const id = button.getAttribute('data-bs-id')
                const npsn = button.getAttribute('data-bs-npsn')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = modalEdit.querySelector('.modal-title')
                const inputSekolah = modalEdit.querySelector('.modal-body #modalEditSekolah')
                const inputkKec = modalEdit.querySelector('.modal-body #modalEditKec')
                const inputNpsn = modalEdit.querySelector('.modal-body #modalEditNpsn')

                // modalTitle.textContent = `New message to ${sekolah}`
                inputSekolah.value = sekolah
                inputkKec.value = kec
                inputNpsn.value = npsn

                const form = document.getElementById('editSekolahForm');
                form.action = `/sekolah/update/${id}`;
            })
        }

        const modalHapus = document.getElementById('hapussekolah')
        if (modalHapus) {
            modalHapus.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const sekolah = button.getAttribute('data-bs-sekolah')
                const kec = button.getAttribute('data-bs-kec')
                const id = button.getAttribute('data-bs-id')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = modalHapus.querySelector('.modal-title')

                // modalTitle.textContent = `New message to ${sekolah}`


                const tombolHapus = modalHapus.querySelector('.modal-body #tombolhapus');

                console.log(tombolHapus);

                tombolHapus.href = `/sekolah/delete/${id}`;
            })
        }
    </script>

@endsection
