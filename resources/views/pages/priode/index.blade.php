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
                            <h5 class="card-title mb-0">Daftar Priode</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                            <div class="dt-buttons btn-group flex-wrap">

                                <button class="btn btn-secondary create-new btn-primary waves-effect waves-light"
                                    tabindex="0" aria-controls="DataTables_Table_0" data-bs-toggle="modal"
                                    data-bs-target="#tambahpriode" type="button"><span><i
                                            class="ri-add-line ri-16px me-sm-2"></i>
                                        <span class="d-none d-sm-inline-block">Tambah Priode</span></span></button>


                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered no-footer dtr-column" id="tabelpriode"
                        aria-describedby="tabelpriode_info" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="tabelpriode" rowspan="1" colspan="1"
                                    style="width: 5px;" aria-label="Name: activate to sort column ascending">
                                    No</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpriode" rowspan="1" colspan="1"
                                    style="width: 144px;" aria-label="Nama Siswa: Masukan nama siswa">Priode</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpriode" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="">
                                    Mulai</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpriode" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="">
                                    Berakhir</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpriode" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="">
                                    Status</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpriode" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="">
                                    Aksi</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($priode as $item)
                                <tr class="odd">
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_priode }}</td>
                                    <td>{{ $item->mulai }}</td>
                                    <td>{{ $item->berakhir }}</td>
                                    <td>


                                        @if ($item->is_active == true)
                                            <span class="badge text-bg-success">Aktif</span>
                                        @elseif($item->is_active == false)
                                            <span class="badge text-bg-danger">Tidak Aktif</span>
                                        @endif
                                    </td>

                                    <td>

                                        <div class="btn-toolbar demo-inline-spacing gap-2" role="toolbar"
                                            aria-label="Toolbar with button groups">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button type="button"
                                                    class="btn btn-outline-secondary waves-effect text-success"
                                                    data-bs-toggle="modal" data-bs-target="#editpriode"
                                                    data-bs-priode="{{ $item }}" data-bs-id="{{ $item->id }}">
                                                    <i class="tf-icons ri-edit-box-line"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-outline-secondary waves-effect text-danger"
                                                    data-bs-toggle="modal" data-bs-target="#hapuspriode"
                                                    data-bs-id="{{ $item->id }}">
                                                    <i class="tf-icons ri-delete-bin-line"></i>
                                                </button>

                                            </div>

                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>



    </div>


    <!-- tambah priode -->
    <div class="modal fade" id="tambahpriode" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Tambah Priode</h4>
                        <p class="mb-6">Tambahkan Priode baru ke daftar</p>


                    </div>
                    <form id="tambahSiswaForm" class="row g-5" method="POST" action="{{ route('priode.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalTambahNamaPriode" name="nama_priode"
                                    class="form-control @error('nama_priode') is-invalid @enderror"
                                    placeholder="Priode 2025" value="{{ old('nama_priode') }}" />
                                @error('nama_priode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="modalTambahNamaPriode">Priode</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="date" id="inputTambahMulai" name="mulai"
                                    class="form-control @error('mulai') is-invalid @enderror"
                                    placeholder="Masukan tanggal mulai priode" value="{{ old('mulai') }}" />
                                @error('mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahMulai">Mulai Priode</label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="date" id="inputTambahBerakhir" name="berakhir"
                                    class="form-control @error('berakhir') is-invalid @enderror"
                                    placeholder="Masukan tanggal berakhir priode" value="{{ old('berakhir') }}" />
                                @error('berakhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahMulai">Berakhir Priode</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-6">
                            <label for="is_active" class="form-label">Aktif?</label>
                            <div class="form-check">
                                <input class="form-check-input @error('is_active') is-invalid @enderror" type="checkbox"
                                    name="is_active" id="is_active" value="1"
                                    {{ old('is_active') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Aktif</label>
                                @error('is_active')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
    <!--/ Tambah suku Siswa -->

    <!-- edit Siswa -->
    <div class="modal fade" id="editpriode" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Edit Priode</h4>
                        <p class="mb-6">Update data Priode </p>
                    </div>
                    <form id="editPriodeForm" class="row g-5" method="POST" action=""
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalEditNamaPriode" name="nama_priode"
                                    class="form-control @error('nama_priode') is-invalid @enderror"
                                    placeholder="Priode 2025" value="{{ old('nama_priode') }}" />
                                @error('nama_priode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="modalEditNamaPriode">Priode</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="date" id="inputEditMulai" name="mulai"
                                    class="form-control @error('mulai') is-invalid @enderror"
                                    placeholder="Masukan tanggal mulai priode" value="{{ old('mulai') }}" />
                                @error('mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditMulai">Mulai Priode</label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="date" id="inputEditBerakhir" name="berakhir"
                                    class="form-control @error('berakhir') is-invalid @enderror"
                                    placeholder="Masukan tanggal berakhir priode" value="{{ old('berakhir') }}" />
                                @error('berakhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditMulai">Berakhir Priode</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-6">
                            <label for="EditIsActive" class="form-label">Aktif?</label>
                            <div class="form-check">
                           
                                <input type="hidden" name="is_active" value="0">

                              
                                <input class="form-check-input @error('is_active') is-invalid @enderror" type="checkbox"
                                    name="is_active" id="EditIsActive" value="1"
                                    {{ old('is_active') === 'true' ? 'checked' : '' }}>

                                <label class="form-check-label" for="EditIsActive">Aktif</label>
                                @error('is_active')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
    <!--/ Edit Siswa Modal -->



    <!-- hapus Siswa -->
    <div class="modal fade" id="hapuspriode" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Hapus Data Priode</h4>
                        <p class="mb-6">Apakah Anda yakin ingin menghapus data Priode ini ? </p>
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
    <!--/ Edit Siswa Modal -->




    
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('aplikasi/material/assets/js/forms-selects.js') }}"></script>

    <script>
        const modalEdit = document.getElementById('editpriode')
        if (modalEdit) {
            modalEdit.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const priodeString = button.getAttribute('data-bs-priode')
                const priode = JSON.parse(priodeString);

                console.log(priode)

                const id = button.getAttribute('data-bs-id')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = modalEdit.querySelector('.modal-title')
                const inputNamaPriode = modalEdit.querySelector('.modal-body #modalEditNamaPriode')
                const inputMulai = modalEdit.querySelector('.modal-body #inputEditMulai')
                const inputBerakhir = modalEdit.querySelector('.modal-body #inputEditBerakhir');
                const inputIsActive = modalEdit.querySelector('.modal-body #EditIsActive');




                // modalTitle.textContent = `New message to ${sekolah}`
                inputNamaPriode.value = priode.nama_priode
                inputMulai.value = priode.mulai
                inputBerakhir.value = priode.berakhir;

                if (priode.is_active) {
                    inputIsActive.checked = true;
                    inputIsActive.value = true;
                } else {
                    inputIsActive.checked = false;
                    inputIsActive.value = false;
                }





                const form = document.getElementById('editPriodeForm');
                console.log(form)
                form.action = `/priode/update/${priode.id}`;
            })
        }

        const modalHapus = document.getElementById('hapuspriode')
        if (modalHapus) {
            modalHapus.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes

                const id = button.getAttribute('data-bs-id')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = modalHapus.querySelector('.modal-title')

                // modalTitle.textContent = `New message to ${sekolah}`


                const tombolHapus = modalHapus.querySelector('.modal-body #tombolhapus');

                console.log(tombolHapus);

                tombolHapus.href = `/priode/delete/${id}`;
            })
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                // Trigger modal to show if there are errors
                var myModal = new bootstrap.Modal(document.getElementById('tambahsiswa'), {
                    keyboard: false
                });
                myModal.show();
            @endif
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>


    <script>
        $(document).ready(function() {
            var table = $('#tabelpriode').DataTable({
                "scrollX": true, // Aktifkan scroll horizontal
                "paging": true, // Aktifkan pagination

            });
        });
    </script>

@endsection
