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
                            <h5 class="card-title mb-0">Daftar Petugas Pukesmas</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                            <div class="dt-buttons btn-group flex-wrap">
                                {{-- <div class="btn-group">
                                    <button
                                        class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-4 waves-effect waves-light"
                                        tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                        data-bs-toggle="modal" data-bs-target="#importsekolah"><span><i
                                                class="ri-external-link-line me-sm-1"></i> <span
                                                class="d-none d-sm-inline-block">Import</span></span></button>



                                </div> --}}
                                <button class="btn btn-secondary create-new btn-primary waves-effect waves-light"
                                    tabindex="0" aria-controls="DataTables_Table_0" data-bs-toggle="modal"
                                    data-bs-target="#tambahpetugaspukesmas" type="button"><span><i
                                            class="ri-add-line ri-16px me-sm-2"></i>
                                        <span class="d-none d-sm-inline-block">Tambah Petugas  Pukesmas</span></span></button>


                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered no-footer dtr-column" id="tabelpetugasuks"
                        aria-describedby="petugasuks_info" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1" colspan="1"
                                    style="width: 5px;" aria-label="Name: activate to sort column ascending">
                                    No</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1" colspan="1"
                                    style="width: 144px;" aria-label="Username: Masukan nama siswa">Username
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1" colspan="1"
                                    style="width: 144px;" aria-label="Nama Siswa: Masukan nama siswa">Nama
                                    Petugas Pukesmas</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                    Jenis Kelamin</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                    Tanggal Lahir</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="Pendidikan">
                                    Pendidikan</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                    Pukesmas</th>

                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                    No HP</th>
                                <th class="sorting" tabindex="0" aria-controls="tabelpetugasuks" rowspan="1" colspan="1"
                                    style="width: 147px;" aria-label="Jenis Kelamin: Jenis kelamin siswa">
                                    Alamat </th>

                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 10px;"
                                    aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($petugaspukesmas as $item)
                                <tr class="odd">
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->username }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                    <td>{{ $item->pendidikan }}</td>
                                    <td>{{ $item->puskesmas->nama_puskesmas }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td >

                                        <div class="btn-toolbar demo-inline-spacing gap-2" role="toolbar"
                                            aria-label="Toolbar with button groups">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button type="button"
                                                    class="btn btn-outline-secondary waves-effect text-success"
                                                    data-bs-toggle="modal" data-bs-target="#editpetugaspukesmas"
                                                    data-bs-petugaspukesmas="{{ $item }}"
                                                    data-bs-id="{{ $item->id }}">
                                                    <i class="tf-icons ri-edit-box-line"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-outline-secondary waves-effect text-danger"
                                                    data-bs-toggle="modal" data-bs-target="#hapuspetugaspukesmas"
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


    <!-- tambah siswa -->
    <div class="modal fade" id="tambahpetugaspukesmas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Tambah Petugas Pukesmas</h4>
                        <p class="mb-6">Tambahkan Petugas baru ke daftar</p>


                    </div>
                    <form id="tambahPetugasPukesmasForm" class="row g-5" method="POST" action="{{ route('petugaspukesmas.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                      
                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalTambahUsername" name="username"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="jhon"
                                    value="{{ old('username') }}" />
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="modalTambahUsername">Username</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputTambahName" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Jhon"
                                    value="{{ old('name') }}" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahName">Nama Petugas</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-6">
                            <div class="form-floating form-floating-outline">
                                <select id="selectjeniskelamin"
                                    class="select2 form-select @error('jenis_kelamin') is-invalid @enderror "
                                    name="jenis_kelamin" data-allow-clear="true">
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>

                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>


                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="selectjeniskelamin">Jenis Kelamin</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputTambahTempatLahir" name="tempat_lahir"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Jhon"
                                    value="{{ old('tempat_lahir') }}" />
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahTempatLahir">Tempat Lahir</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="date" id="inputTambahTanggalLahir" name="tanggal_lahir"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Jhon"
                                    value="{{ old('tanggal_lahir') }}" />
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahTanggalLahir">Tanggal Lahir</label>
                            </div>
                        </div>




                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputTambahnohp" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror" placeholder="081234567"
                                    value="{{ old('no_hp') }}" />
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahnohp">No Hp</label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputTambahPendidikan" name="pendidikan"
                                    class="form-control @error('pendidikan') is-invalid @enderror"
                                    placeholder="S1 Teknik Informatika" value="{{ old('pendidikan') }}" />
                                @error('pendidikan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahPendidikan">Pendidikan</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="email" id="inputTambahEmail" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder=""
                                    value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahEmail">Email</label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputTambahKelas" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    placeholder="Jln KH. Ahmad Yamin SH" value="{{ old('alamat') }}" />
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahAlamat">Alamat</label>
                            </div>
                        </div>


                        <div class="col-md-6 mb-6">
                            <div class="form-floating form-floating-outline">
                                <select id="tambahselectpukesmas"
                                    class="select2 form-select @error('puskesmas_id') is-invalid @enderror "
                                    name="puskesmas_id" data-allow-clear="true">
                                    <option value="" disabled selected>Pilih Pukesmas</option>
                                    @foreach ($pukesmas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_puskesmas }}</option>
                                    @endforeach;

                                </select>
                                @error('puskesmas_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="tambahselectpukesmas">Pukesmas</label>
                            </div>
                        </div>


                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="password" id="inputTambahPassword" name="password"
                                    class="form-control @error('password') is-invalid @enderror" autocomplete="false"
                                    autocomplete="false" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahPassword">Password</label>
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
    <div class="modal fade" id="editpetugaspukesmas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Edit Petugas Pukesmas</h4>
                        <p class="mb-6">Update data Petugas </p>
                    </div>
                    <form id="editPetugasPukesmasForm" class="row g-5" method="POST" action=""
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-12 col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="modalEditUsername" name="username"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="jhon" />
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="modalEditUsername">Username</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputEditName" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Jhon" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditName">Nama Petugas</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-6">
                            <div class="form-floating form-floating-outline">
                                <select id="editjeniskelamin"
                                    class="select2 form-select @error('jenis_kelamin') is-invalid @enderror "
                                    name="jenis_kelamin" data-allow-clear="true">
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>

                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>


                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="editjeniskelamin">Jenis Kelamin</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputEditTempatLahir" name="tempat_lahir"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    placeholder="Jhon" />
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditTempatLahir">Tempat Lahir</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="date" id="inputEditTanggalLahir" name="tanggal_lahir"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    placeholder="Jhon" />
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditTanggalLahir">Tanggal Lahir</label>
                            </div>
                        </div>


                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputEditNoHp" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror" placeholder="081234567" />
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditNoHp">No Hp</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputEditPendidikan" name="pendidikan"
                                    class="form-control @error('pendidikan') is-invalid @enderror"
                                    placeholder="S1 Teknik Informatika" value="{{ old('pendidikan') }}" />
                                @error('pendidikan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditPendidikan">Pendidikan</label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="email" id="inputEditEmail" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditEmail">Email</label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputEditAlamat" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    placeholder="Jln KH. Ahmad Yamin SH" />
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditAlamat">Alamat</label>
                            </div>
                        </div>


                        <div class="col-md-6 mb-6">
                            <div class="form-floating form-floating-outline">
                                <select id="selectPukesmas"
                                    class="select2 form-select @error('puskesmas_id') is-invalid @enderror "
                                    name="puskesmas_id" data-allow-clear="true">
                                    <option value="" disabled selected>Pilih Pukesmas</option>
                                    @foreach ($pukesmas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_puskesmas }}</option>
                                    @endforeach;

                                </select>
                                @error('puskesmas_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="selectPukesmas">Pukesmas</label>
                            </div>
                        </div>



                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="password" id="inputEditPassword" name="password"
                                    class="form-control @error('password') is-invalid @enderror" autocomplete="false"
                                    autocomplete="false" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputEditPassword">Password</label>
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
    <div class="modal fade" id="hapuspetugaspukesmas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Hapus Data Petugas Pukesmas</h4>
                        <p class="mb-6">Apakah Anda yakin ingin menghapus data Petugas ini ? </p>
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
        const modalEdit = document.getElementById('editpetugaspukesmas')
        if (modalEdit) {
            modalEdit.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const petugaspukesmasString = button.getAttribute('data-bs-petugaspukesmas')
                const petugaspukesmas = JSON.parse(petugaspukesmasString);

                console.log(petugaspukesmas)

                const id = button.getAttribute('data-bs-id')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = modalEdit.querySelector('.modal-title')
                const inputUsername = modalEdit.querySelector('.modal-body #modalEditUsername')
                const inputName = modalEdit.querySelector('.modal-body #inputEditName')
                const selectJenisKelamin = modalEdit.querySelector('.modal-body #editjeniskelamin');
                const inputTempatLahir = modalEdit.querySelector('.modal-body #inputEditTempatLahir');
                const inputTanggalLahir = modalEdit.querySelector('.modal-body #inputEditTanggalLahir');
                const inputNoHp = modalEdit.querySelector('.modal-body #inputEditNoHp');
                const inputEmail = modalEdit.querySelector('.modal-body #inputEditEmail');
                const inputAlamat = modalEdit.querySelector('.modal-body #inputEditAlamat');
                const selectPukesmas = modalEdit.querySelector('.modal-body #selectPukesmas');
                const inputPendidikan = modalEdit.querySelector('.modal-body #inputEditPendidikan');

                console.log(petugaspukesmas.puskesmas_id)

                // modalTitle.textContent = `New message to ${sekolah}`
                inputUsername.value = petugaspukesmas.user.username
                inputName.value = petugaspukesmas.user.name
                selectJenisKelamin.value = petugaspukesmas.jenis_kelamin;
                inputTempatLahir.value = petugaspukesmas.tempat_lahir;
                inputTanggalLahir.value = petugaspukesmas.tanggal_lahir;
                inputNoHp.value = petugaspukesmas.no_hp;
                inputEmail.value = petugaspukesmas.user.email;
                inputAlamat.value = petugaspukesmas.alamat;
                selectPukesmas.value = petugaspukesmas.puskesmas_id;
                inputPendidikan.value = petugaspukesmas.pendidikan;


                const form = document.getElementById('editPetugasPukesmasForm');
                console.log(form)
                form.action = `/petugaspukesmas/update/${petugaspukesmas.user.id}`;
            })
        }

        const modalHapus = document.getElementById('hapuspetugaspukesmas')
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

                tombolHapus.href = `/petugaspukesmas/delete/${id}`;
            })
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                // Trigger modal to show if there are errors
                var myModal = new bootstrap.Modal(document.getElementById('tambahpetugaspukesmas'), {
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
            var table = $('#tabelpetugasuks').DataTable({
                "scrollX": true, // Aktifkan scroll horizontal
                "paging": true, // Aktifkan pagination

            });
        });
    </script>

@endsection
