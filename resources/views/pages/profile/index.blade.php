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
        <div class="row gy-6 gy-md-0">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-6">
                    <div class="card-body pt-12">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded-3 mb-4"
                                    src="{{ asset('aplikasi/material/assets/img/avatars/1.png') }}" height="120"
                                    width="120" alt="User avatar">
                                <div class="user-info text-center">
                                    <h5>{{ $siswa->user->name }}</h5>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around flex-wrap my-6 gap-0 gap-md-3 gap-lg-4">
                            <div class="d-flex align-items-center me-5 gap-4">
                                <div class="avatar">
                                    <div class="avatar-initial bg-label-primary rounded-3">
                                        <i class="ri-check-line ri-24px"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-0">1.23k</h5>
                                    <span>Task Done</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <div class="avatar">
                                    <div class="avatar-initial bg-label-primary rounded-3">
                                        <i class="ri-briefcase-line ri-24px"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-0">568</h5>
                                    <span>Project Done</span>
                                </div>
                            </div>
                        </div>
                        <h5 class="pb-4 border-bottom mb-4">Details</h5>
                        <div class="info-container">
                            <ul class="list-unstyled mb-6">
                                <li class="mb-2">
                                    <span class="fw-medium text-heading me-2">Username:</span>
                                    <span>{{ $siswa->user->username }}</span>
                                </li>
                                <li class="mb-2">
                                    <span class="fw-medium text-heading me-2">Email:</span>
                                    <span>{{ $siswa->user->email }}</span>
                                </li>
                                <li class="mb-2">
                                    <span class="fw-medium text-heading me-2">Status:</span>
                                    <span class="badge bg-label-success rounded-pill">Active</span>
                                </li>
                                <li class="mb-2">
                                    <span class="fw-medium text-heading me-2">Gender:</span>
                                    <span>{{ $siswa->jenis_kelamin }}</span>
                                </li>
                                <li class="mb-2">
                                    <span class="fw-medium text-heading me-2">Tanggal Lahir:</span>
                                    <span>{{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}/span>
                                </li>
                                <li class="mb-2">
                                    <span class="fw-medium text-heading me-2">No Telepon:</span>
                                    <span>{{ $siswa->no_hp }}</span>
                                </li>
                                <li class="mb-2">
                                    <span class="fw-medium text-heading me-2">Alamat:</span>
                                    <span>{{ $siswa->alamat }}</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <a href="javascript:;" class="btn btn-primary me-4 waves-effect waves-light"
                                    data-bs-target="#tambahsiswa" data-bs-toggle="modal">Edit</a>
                                <a href="javascript:;" class="btn btn-outline-danger suspend-user waves-effect">Suspend</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- User Tabs -->
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2">
                        <li class="nav-item">
                            <a class="nav-link active waves-effect waves-light" href="javascript:void(0);"><i
                                    class="ri-group-line me-2"></i>Account</a>
                        </li>
                      
                    </ul>
                </div>
                <!--/ User Tabs -->

                <!-- Project table -->
                <div class="card mb-6">
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="card-header d-flex flex-wrap row-gap-5 gap-5 gap-sm-0">
                                <div class="project-head-label">
                                    <h5 class="card-title mb-0">Riwayat Tes</h5>
                                </div>
                                <div class=" text-end pt-0 my-n5">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input
                                                type="search" class="form-control form-control-sm ms-0"
                                                placeholder="Search Project" aria-controls="DataTables_Table_0"></label>
                                    </div>
                                </div>
                            </div>
                            <table class="table datatable-project table-border-bottom-0 dataTable no-footer dtr-column"
                                id="DataTables_Table_0">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 5px;" aria-label="Name: activate to sort column ascending">
                                            No</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 144px;" aria-label="Waktu Test">Waktu Test
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 144px;" aria-label="Point Test: ">Point Test</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" style="width: 144px;" aria-label="Point Test: ">Aksi</th>
            
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tes as $item)
                                        <tr class="odd">
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ Idc::totalpoin($item->totalpoin) }}</td>
                                            <td><a href="{{ route('tesidc.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">Detail</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Project table -->

                <!-- Activity Timeline -->
          
                <!-- /Activity Timeline -->


            </div>
            <!--/ User Content -->
        </div>



    </div>


    <!-- tambah siswa -->
    <div class="modal fade" id="tambahsiswa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Tambah Siswa</h4>
                        <p class="mb-6">Tambahkan Siswa baru ke daftar</p>


                    </div>
                    <form id="tambahSiswaForm" class="row g-5" method="POST"
                        action="{{ route('siswa.update', $siswa->user_id) }}" enctype="multipart/form-data">
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
                                    value="{{ $siswa->user->name }}" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahName">Nama Siswa</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-6">
                            <div class="form-floating form-floating-outline">
                                <select id="selectjeniskelamin"
                                    class="select2 form-select @error('jenis_kelamin') is-invalid @enderror "
                                    name="jenis_kelamin" data-allow-clear="true">
                                    <option>{{ $siswa->jenis_kelamin }}</option>

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
                                    value="{{ $siswa->tempat_lahir }}" />
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
                                    value="{{ $siswa->tanggal_lahir }}" />
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
                                <input type="text" id="inputTambahTempatNisn" name="nisn"
                                    class="form-control @error('nisn') is-invalid @enderror" placeholder="92349823421"
                                    value="{{ $siswa->nisn }}" />
                                @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahNisn">NISN</label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputTambahTahunajaranmasuk" name="tahunajaranmasuk"
                                    class="form-control @error('tahunajaranmasuk') is-invalid @enderror"
                                    placeholder="2019/2020" value="{{ $siswa->tahunajaranmasuk }}" />
                                @error('tahunajaranmasuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahTahunajaranmasuk">Tahun Ajaran Masuk</label>
                            </div>
                        </div>


                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="inputTambahKelas" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror" placeholder="081234567"
                                    value="{{ $siswa->no_hp }}" />
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="inputTambahNoHp">No Hp</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="email" id="inputTambahEmail" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder=""
                                    value="{{ $siswa->user->email }}" />
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
                                    placeholder="Jln KH. Ahmad Yamin SH" value="{{ $siswa->alamat }}" />
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
                                <select id="selectsekolah"
                                    class="select2 form-select @error('sekolah_id') is-invalid @enderror "
                                    name="sekolah_id" data-allow-clear="true">
                                    <option value="{{ $siswa->sekolah_id }}" disabled selected></option>
                                    @foreach ($sekolah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                    @endforeach;

                                </select>
                                @error('sekolah_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="selectsekolah">Sekolah</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-6">
                            <div class="form-floating form-floating-outline">
                                <select id="selectsuku" class="form-control @error('suku_id') is-invalid @enderror"
                                    name="suku_id" data-allow-clear="true">
                                    <option value="{{ $siswa->suku_id }}" disabled selected>Pilih Suku</option>
                                    @foreach ($suku as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_suku }}</option>
                                    @endforeach;

                                </select>
                                @error('suku_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="selectsuku">Suku</label>
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

@endsection
