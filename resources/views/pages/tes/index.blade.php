@extends('layouts.backend.master-tes')

@section('title', 'Dashboard | IDC Tracing')

@section('content')

    <div id="wizard-property-listing" class="bs-stepper vertical mt-2">
        <div class="bs-stepper-header gap-lg-3 border-end">
            <div class="step" data-target="#beratdantinggibadan">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-number">01</span>
                        <span class="d-flex flex-column ms-2">
                            <span class="bs-stepper-title">Berat & Tinggi Badan</span>

                        </span>
                    </span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#tekananguladandarah">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-number">02</span>
                        <span class="d-flex flex-column ms-2">
                            <span class="bs-stepper-title">Tekanan Darah dan Gula</span>

                        </span>
                    </span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#gayahidup">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-number">03</span>
                        <span class="d-flex flex-column ms-2">
                            <span class="bs-stepper-title">Gaya Hidup</span>

                        </span>
                    </span>
                </button>
            </div>

            <div class="line"></div>
            <div class="step" data-target="#property-keluarga">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-number">04</span>
                        <span class="d-flex flex-column ms-2">
                            <span class="bs-stepper-title">Keluarga</span>

                        </span>
                    </span>
                </button>
            </div>




        </div>
        <div class="bs-stepper-content">
            <form id="wizard-property-listing-form" action="{{ route('tesidc.store') }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div id="beratdantinggibadan" class="content">
                    <div class="row g-5">




                        <div class="col-sm-6 mt-6">
                            <div class="form-floating form-floating-outline">
                                <select id="tinggi_badan" name="tinggi_badan" class="select2 form-select"
                                    data-allow-clear="true">
                                    <option value="">Pilih</option>
                                    <option value="" selected disabled>Pilih</option>
                                    @for ($i = 50; $i <= 200; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="tinggi_badan">Berapa tinggi badan anda? (Cm)</label>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-6">
                            <div class="form-floating form-floating-outline">
                                <select id="berat_badan" name="berat_badan" class="select2 form-select"
                                    data-allow-clear="true">
                                    <option value="">Pilih</option>
                                    <option value="" selected disabled>Pilih</option>
                                    @for ($i = 30; $i <= 215; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="berat_badan">Berapa berat badan anda saat terakhir diukur? (Kg)</label>
                            </div>
                        </div>


<input type="hidden" value="{{$priodeid}}" name="priodeid">
                        <div class="col-12 d-flex justify-content-between mt-6">
                            <button class="btn btn-outline-secondary btn-prev" disabled>
                                <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button class="btn btn-primary btn-next" type="button">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ri-arrow-right-line ri-16px"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property Details -->
                <div id="tekananguladandarah" class="content">
                    <div class="row g-5">

                        <div class="col-sm-6">
                            <label class="mb-3">Apakah anda pernah mengalami tekanan darah lebih dari 140 mg/dl ?</label>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Ya" name="tekanan_darah"
                                    id="tekanandarahya" />
                                <label class="form-check-label" for="tekanandarahya">Ya</label>
                            </div>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Tidak" name="tekanan_darah"
                                    id="tekanandarahtidak" />
                                <label class="form-check-label" for="tekanandarahtidak">Tidak</label>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <label class="mb-3">Berapa kadar gula darah anda saat terakhir diperiksa ?</label>
                            <input type="number" id="kadar_gula" name="kadar_gula" class="form-control"
                                placeholder="178">
                        </div>


                        <div class="col-12 d-flex justify-content-between mt-6">
                            <button class="btn btn-outline-secondary btn-prev" type="button">
                                <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button class="btn btn-primary btn-next" type="button">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ri-arrow-right-line ri-16px"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property Details -->
                <div id="gayahidup" class="content">
                    <div class="row g-5">

                        <div class="col-sm-6 mt-6" id="input_aktifitas">
                            <div class="form-floating form-floating-outline">
                                <select id="aktifitas_fisik" name="aktifitas_fisik" class="select2 form-select"
                                    data-allow-clear="true">
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="<60 menit dalam sehari, kurang dari 5 hari dalam seminggu"> &lt;60 menit
                                        dalam sehari, kurang dari 5 hari dalam seminggu</option>
                                    <option value=">=60 menit dalam sehari, minimal 5 hari dalam seminggu">&ge;60 menit
                                        dalam sehari, minimal 5 hari dalam seminggu</option>


                                </select>
                                <label for="aktifitas_fisik">Seberapa sering anda melakukan aktifitas fisik?</label>
                            </div>
                        </div>

                       

                        <div class="col-sm-6">
                            <label class="mb-3">Apakah anda makan sayur sebanyak 400 gram sehari? (setara dengan 20
                                sendok makan atau 4 cangkir)</label>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Ya" name="sayur"
                                    id="sayurya" />
                                <label class="form-check-label" for="sayurya">Ya</label>
                            </div>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Tidak" name="sayur"
                                    id="sayurtidak" />
                                <label class="form-check-label" for="sayurtidak">Tidak</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="mb-3">Apakah Anda makan buah sebanyak 200 gram sehari? (setara dengan buah apel
                                ukuran sedang, atau 2 buah pisang ukuran sedang, atau 2 buah jeruk, atau 3 buah
                                salak)</label>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Ya" name="makan_buah"
                                    id="makan_buahya" />
                                <label class="form-check-label" for="makan_buahya">Ya</label>
                            </div>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Tidak" name="makan_buah"
                                    id="makan_buahtidak" />
                                <label class="form-check-label" for="makan_buahtidak">Tidak</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="mb-3">Apakah anda minum-minuman bersoda sebanyak 10 kaleng/botol atau lebih dalam seminggu? (seperti coca-cola, fanta, sprite, dll)</label>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Ya" name="minum_bersoda"
                                    id="minum_bersodaya" />
                                <label class="form-check-label" for="minum_bersodaya">Ya</label>
                            </div>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Tidak" name="minum_bersoda"
                                    id="minum_bersodatidak" />
                                <label class="form-check-label" for="minum_bersodatidak">Tidak</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="mb-3">Apakah minum-minuman manis kemasan sebanyak 1-2 botol/cup atau lebih dalam sehari? ( seperti teh botol, kopi kemasan, pop ice, minuman berenergi, dll)</label>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Ya" name="minuman_manis"
                                    id="minuman_manisya" />
                                <label class="form-check-label" for="minuman_manisya">Ya</label>
                            </div>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Tidak" name="minuman_manis"
                                    id="minuman_manistidak" />
                                <label class="form-check-label" for="minuman_manistidak">Tidak</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="mb-3">Apakah anda makan-makanan cepat saji lebih dari 2 kali dalam seminggu? (seperti mie instan, gorengan, eskrim, martabak manis, cemilan kemasan, dll)</label>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Ya" name="makanan_cepat_saji"
                                    id="makanan_cepat_sajiya" />
                                <label class="form-check-label" for="makanan_cepat_sajiya">Ya</label>
                            </div>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Tidak" name="makanan_cepat_saji"
                                    id="makanan_cepat_sajitidak" />
                                <label class="form-check-label" for="makanan_cepat_sajitidak">Tidak</label>
                            </div>
                        </div>




                        <div class="col-sm-6">
                            <label class="mb-3">Apakah dalam waktu 2 minggu terakhir anda merasa memiliki masalah yang sulit diselesaikan sehingga menggangu aktivitas sehari-hari dan waktu tidur anda?</label>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Ya" name="tekanan"
                                    id="tekananya" />
                                <label class="form-check-label" for="tekananya">Ya</label>
                            </div>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio" value="Tidak" name="tekanan"
                                    id="tekanantidak" />
                                <label class="form-check-label" for="tekanantidak">Tidak</label>
                            </div>
                        </div>





                        <div class="col-12 d-flex justify-content-between mt-6">
                            <button class="btn btn-outline-secondary btn-prev" type="button">
                                <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button class="btn btn-primary btn-next" type="button">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ri-arrow-right-line ri-16px"></i>
                            </button>
                        </div>
                    </div>
                </div>




                <div id="property-keluarga" class="content">


                    <div class="col-sm-6">
                        <label class="mb-3">Apakah anda merokok</label>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="radio" value="Ya" name="merokok"
                                id="merokokya" />
                            <label class="form-check-label" for="merokokya">Ya</label>
                        </div>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="radio" value="Tidak" name="merokok"
                                id="merokoktidak" />
                            <label class="form-check-label" for="merokoktidak">Tidak</label>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-6" id="inputperokokpasif" style="display: none;">
                        <label class="mb-3">Apakah ada keluarga yang tinggal serumah dengan anda merokok?</label>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="radio" value="Ya" name="merokok_pasif"
                                id="merokopasifya" />
                            <label class="form-check-label" for="merokopasifya">Ya</label>
                        </div>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="radio" value="Tidak" name="merokok_pasif"
                                id="merokopasiftidak" />
                            <label class="form-check-label" for="merokopasiftidak">Tidak</label>
                        </div>
                    </div>



                    <div class="col-sm-6">
                        <label class="mb-3">Apakah ada di antara ayah, ibu, adik atau kakak anda yang menderita
                            diabetes?</label>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="radio" value="Ya" name="keluarga"
                                id="keluargaya" />
                            <label class="form-check-label" for="keluargaya">Ya</label>
                        </div>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="radio" value="Tidak" name="keluarga"
                                id="keluargatidak" />
                            <label class="form-check-label" for="keluargatidak">Tidak</label>
                        </div>
                    </div>


                    <div class="col-sm-6 mt-6" id="inputKeluarga" style="display: none;">
                        <div class="form-floating form-floating-outline">
                            <select id="selectKeluarga" name="selectkeluarga" class="select2 form-select"
                                data-allow-clear="true">
                                <option value="" disabled selected>Pilih anggota keluarga</option>
                                <option value="ayah">Ayah dan Ibu</option>
                                <option value="ayah">Ayah</option>
                                <option value="ibu">Ibu</option>
                                <option value="adik">Adik</option>
                                <option value="kakak">Kakak</option>
                            </select>
                            <label for="selectKeluarga">Jika ada, siapa anggota keluarga anda yang mengalami
                                diabetes?</label>
                        </div>
                    </div>


                    <div class="row g-5">

                        <div class="col-12 d-flex justify-content-between mt-6">
                            <button class="btn btn-outline-secondary btn-prev" type="button">
                                <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button class="btn btn-success btn-submit btn-next" type="submit">
                                <span class="align-middle d-sm-inline-block d-none">Selesai</span>
                                <i class="ri-check-line ri-16px ms-0 ms-sm-2"></i>
                            </button>

                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>



    <script>
        const radioYa = document.getElementById('keluargaya');
        const radioTidak = document.getElementById('keluargatidak');
        const inputKeluarga = document.getElementById('inputKeluarga');

        // Tambahkan event listener pada radio button
        radioYa.addEventListener('change', () => {
            if (radioYa.checked) {
                inputKeluarga.style.display = 'block'; // Tampilkan select
            }
        });

        radioTidak.addEventListener('change', () => {
            if (radioTidak.checked) {
                inputKeluarga.style.display = 'none'; // Sembunyikan select
            }
        });



        const radioPasifYa = document.getElementById('merokokya');
        const radioPasifTidak = document.getElementById('merokoktidak');
        const inputPerokokPasif = document.getElementById('inputperokokpasif');

        // Tambahkan event listener pada radio button
        radioPasifYa.addEventListener('change', () => {
            if (radioPasifYa.checked) {
                inputPerokokPasif.style.display = 'none'; // Sembunyikan select
            }
        });

        radioPasifTidak.addEventListener('change', () => {
            if (radioPasifTidak.checked) {
                
                inputPerokokPasif.style.display = 'block'; // Tampilkan select
            }
        });
    </script>
@endsection
