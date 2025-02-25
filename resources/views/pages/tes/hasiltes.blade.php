@extends('layouts.backend.master-tes')

@section('title', 'Dashboard | IDC Tracing')

@section('content')
    <style>
        td {
            white-space: normal;
            /* Izinkan teks terbungkus */
            word-break: break-word;
            /* Potong teks jika terlalu panjang */
        }
    </style>

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
        @php
            use Carbon\Carbon;
            $umur = Carbon::parse($siswa->tanggal_lahir)->age;

        @endphp

        @if ($hasiltes['total_poin'] < 5)
            <div class="alert alert-success alert-dismissible" role="alert">
                <h4 class="alert-heading d-flex align-items-center">
                    <span class="alert-icon rounded"><i class="ri-checkbox-circle-line ri-22px"></i></span>Total Skor :
                    {{ $hasiltes['total_poin'] }} Poin
                </h4>
                <hr>
                <p class="mb-0">
                    Anda tidak berisiko mengalami diabetes Tipe 2
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif($hasiltes['total_poin'] >= 5)
            <div class="alert alert-warning alert-dismissible" role="alert">
                <h4 class="alert-heading d-flex align-items-center">
                    <span class="alert-icon rounded"><i class="ri-checkbox-circle-line ri-22px"></i></span>Total Skor :
                    {{ $hasiltes['total_poin'] }} Poin
                </h4>
                <hr>
                <p class="mb-0">
                    Anda berisiko mengalami diabetes Tipe 2
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">

            <div class="col-6">
                <div class="card">
                    <h5 class="card-header">Rician Hasil Tes</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody class="table-border-bottom-0">
                                <tr>

                                    <th> <strong>Jenis Kelamin</strong> </th>
                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                    <td>
                                        {{ Idc::poin($hasiltes['point_detail']['jenis_kelamin']) }}

                                    </td>

                                </tr>
                                <tr>

                                    <th> <strong>Usia</strong> </th>
                                    <td>{{ $umur }} Tahun</td>
                                    <td>

                                        {{ Idc::poin($hasiltes['point_detail']['usia']) }}
                                    </td>


                                </tr>
                                <tr>

                                    <th> <strong>Indeks Masa Tubuh</strong> </th>
                                    <td>


                                        {{ $hasiltes['imt'] }} Kg/M2


                                    </td>
                                    <td>

                                        {{ Idc::poin($hasiltes['point_detail']['imt']) }}


                                    </td>



                                </tr>
                                <tr>

                                    <th> <strong>Tekanan Darah Tinggi</strong> </th>
                                    <td>

                                        @if ($tes->tekanan_darah == 'Ya')
                                            Ya
                                        @else
                                            Tidak
                                        @endif
                                    </td>
                                    <td>
                                        {{ Idc::poin($hasiltes['point_detail']['tekanan_darah']) }}
                                    </td>



                                </tr>
                                <tr>

                                    <th> <strong>Riwayat Keluarga</strong> </th>
                                    <td>


                                        @if ($tes->keluarga == 'Ya')
                                            (Ya)
                                            {{ $tes->selectkeluarga }}
                                        @else
                                            Tidak
                                        @endif



                                    </td>
                                    <td>
                                        {{ Idc::poin($hasiltes['point_detail']['keluarga']) }}

                                    </td>



                                </tr>
                                <tr>

                                    <th> <strong>Aktivitas Fisik</strong> </th>
                                    <td>{{ $tes->aktifitas_fisik }}</td>
                                    <td class="text-nowrap">
                                        {{ Idc::poin($hasiltes['point_detail']['aktivitas_fisik']) }}


                                    </td>



                                </tr>


                                <tr>

                                    <th> <strong>Kadar Gula Darah</strong> </th>
                                    <td>
                                        {{ $tes->kadar_gula }} mg/dl


                                    </td>
                                    <td>

                                        {{ Idc::poin($hasiltes['point_detail']['kadar_gula']) }}
                                    </td>



                                </tr>

                                <tr>

                                    <th> <strong>Konsumsi Makanan dan Minuman</strong> </th>
                                    <td>


                                        <ul>
                                            <li>Makan Sayur : {{ $polakosumsi['sayur'] == 0 ? 'Ya' : 'Tidak' }}</li>
                                            <li>Makan Buah-Buahan : {{ $polakosumsi['makan_buah'] == 0 ? 'Ya' : 'Tidak' }}
                                            </li>
                                            <li>Minum minuman bersoda :
                                                {{ $polakosumsi['minum_bersoda'] == 1 ? 'Ya' : 'Tidak' }}
                                            </li>
                                            <li>Minum minuman manis :
                                                {{ $polakosumsi['minuman_manis'] == 1 ? 'Ya' : 'Tidak' }}
                                            </li>
                                            <li>Minum Makanan Cepat Saji :
                                                {{ $polakosumsi['makanan_cepat_saji'] == 1 ? 'Ya' : 'Tidak' }}</li>

                                        </ul>
                                    </td>
                                    <td>


                                        {{ Idc::poin($hasiltes['point_detail']['diet']) }}
                                    </td>



                                </tr>
                                <tr>

                                    <th> <strong>Merokok</strong> </th>
                                    <td>

                                        @if ($tes->merokok == 'Ya')
                                            Ya
                                        @else
                                            Tidak
                                        @endif

                                    </td>
                                    <td>
                                        {{ Idc::poin($hasiltes['point_detail']['merokok']) }}
                                    </td>



                                </tr>

                                <tr>

                                    <th> <strong>Perokok Pasif</strong> </th>
                                    <td>

                                        @if ($tes->merokok_pasif == 'Ya')
                                            Ya
                                        @else
                                            Tidak
                                        @endif

                                    </td>
                                    <td>
                                        {{ Idc::poin($hasiltes['point_detail']['merokok_pasif']) }}
                                    </td>



                                </tr>
                                <tr>

                                    <th> <strong>Stres</strong> </th>
                                    <td>

                                        @if ($tes->tekanan == 'Ya')
                                            Ya
                                        @else
                                            Tidak
                                        @endif
                                    </td>
                                    <td>
                                        {{ Idc::poin($hasiltes['point_detail']['stres']) }}
                                    </td>



                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <h5 class="card-header">Rekomendasi Pencegahan</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody class="table-border-bottom-0">
                                <tr>

                                    @if ($siswa->jenis_kelamin == 'Perempuan')
                                        <td>

                                            Jenis kelamin adalah faktor risiko yang tidak bisa dirubah, lakukan gaya hidup
                                            sehat
                                            untuk mengurangi resikonya.

                                        </td>
                                    @endif
                                </tr>

                                <tr>

                                    @if ($hasiltes['imt'] > 24.9)
                                        <td>

                                            Kontrol berat badan anda agar kembali normal

                                        </td>
                                    @endif

                                </tr>
                                <tr>


                                    @if ($tes->tekanan_darah == 'Ya')
                                        <td>

                                            Kurangi konsumsi makanan asin dan berlemak tinggi serta periksa tekanan darah
                                            anda
                                            secara teratur.


                                        </td>
                                    @endif

                                </tr>
                                <tr>


                                    @if ($tes->keluarga == 'Ya')
                                        <td>

                                            Riwayat keluarga adalah faktor risiko yang tidak bisa dirubah, lakukan gaya
                                            hidup
                                            sehat
                                            untuk mengurangi risikonya.

                                        </td>
                                    @endif

                                </tr>
                                <tr>

                                    @if ($tes->aktifitas_fisik == '<60 menit dalam sehari, kurang dari 5 hari dalam seminggu')
                                        <td>

                                            Lakukan aktivitas fisik atau olahraga minimal 60 menit dalam sehari, minimal 5
                                            hari
                                            dalam seminggu

                                        </td>
                                    @endif

                                </tr>


                                <tr>


                                    @if ($tes->kadar_gula >= 200)
                                        <td>

                                            Lakukan pemeriksaan kadar gula darah lebih lanjut, kosultasikan dengan dokter.

                                        </td>
                                    @endif

                                </tr>

                                <tr>


                                    @if ($hasiltes['point_detail']['diet'] > 0)
                                        <td>

                                            Perbanyak makan sayur dan buah, serta kurangi konsumsi makanan dan minuman cepat
                                            saji.

                                        </td>
                                    @endif

                                </tr>
                                <tr>


                                    @if ($tes->merokok == 'Ya')
                                        <td>

                                            Berhentilah merokok dan hindari paparan asap rokok.

                                        </td>
                                    @endif
                                </tr>

                                <tr>


                                    @if ($tes->merokok_pasif == 'Ya')
                                        <td>

                                          Jauhilah jangkauan dari asap rokok

                                        </td>
                                    @endif
                                </tr>
                                <tr>


                                    @if ($tes->tekanan == 'Ya')
                                        <td>

                                            Kelolah stres yang anda alami dengan baik, temukan solusi dari permasalahan yang
                                            anda
                                            hadapi, jika perlu bantuan lakukan bimbingan konserling dengan guru konseling.

                                        </td>
                                    @endif

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Basic Bootstrap Table -->


        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('dashboard.index') }}" class="btn btn-primary">
                <i class="ri-dashboard-line"></i> Kembali ke Dashboard
            </a>
            <a href="{{ route('tesidc.riwayat') }}" class="btn btn-secondary">
                <i class="ri-file-list-line"></i> Lihat Riwayat Tes
            </a>
        </div>



        <!--/ Responsive Table -->


    </div>



@endsection
