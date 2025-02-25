@extends('layouts.backend.master')

@section('title', 'Dashboard | IDC Tracing')

@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Tambah Sekolah</h5>
                <small class="text-body float-end">Default label</small>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                        <label for="basic-default-fullname">Full Name</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc.">
                        <label for="basic-default-company">Company</label>
                    </div>
                    <div class="mb-6">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe"
                                    aria-label="john.doe" aria-describedby="basic-default-email2">
                                <label for="basic-default-email">Email</label>
                            </div>
                            <span class="input-group-text" id="basic-default-email2">@example.com</span>
                        </div>
                        <div class="form-text">You can use letters, numbers &amp; periods</div>
                    </div>
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" id="basic-default-phone" class="form-control phone-mask"
                            placeholder="658 799 8941">
                        <label for="basic-default-phone">Phone No</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-6">
                        <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"
                            style="height: 60px"></textarea>
                        <label for="basic-default-message">Message</label>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Send</button>
                </form>
            </div>
        </div>



    </div>


@endsection
