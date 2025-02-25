@extends('layouts.backend.master')

@section('title', 'Dashboard | IDC Tracing')

@section('content')
    {{-- 
<h1>{{Auth::user()->getRoleNames()->first()}} sdasdasdas</h1> --}}

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">
            <!-- Gamification Card -->
            <div class="col-md-12 col-xxl-8">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-6 order-2 order-md-1">
                            <div class="card-body">
                                <h5 class="mb-2">Welcome back,<span class="h4 fw-semibold"> {{ Auth()->user()->name }}
                                        👋🏻</span></h5>

                                @role('idc')
                                    <p>Selamat datang petugas IDC.</p>
                                    <a href="{{ route('sekolah.index') }}" class="btn btn-primary">Lihat Hasil
                                        Tes</a>
                                @endrole

                                @role('siswa')

                                    @if ($priode == null)
                                        <p>Belum ada priode tes yang aktif</p>
                                    @else
                                        @if ($cektes == null)
                                            <p>Selamat datang di diabetes tracking system. Aplikasi ini dapat membuatmu untuk
                                                mendeteksi
                                                faktor
                                                resiko diabetes.</p>

                                            <a href="{{ route('tesidc.index', $priode->id) }}"
                                                class="btn btn-primary">{{ $priode->nama_priode }}</a>
                                        @else
                                            <p>Terimakasi telah melakukan tes pada tes {{ $priode->nama_priode }}</p>
                                            <a href="{{ route('tesidc.show', $cektes->id) }}" class="btn btn-primary">Lihat
                                                Hasil Tes</a>
                                        @endif
                                    @endif

                                @endrole

                                @role('puskesmas')
                                    <p>Selamat datang Petugas <strong>{{ $puskesmas->nama_puskesmas }} </strong> . </p>
                                    <a href="{{ route('petugaspukesmas.daftarsekolah') }}" class="btn btn-primary">Lihat Hasil
                                        Tes</a>
                                @endrole

                                @role('uks')
                                    <p>Selamat datang Petugas UKS <strong>{{ $sekolah->nama_sekolah }} </strong> . </p>
                                    <a href="{{ route('tesidc.riwayat-sekolah') }}" class="btn btn-primary">Lihat Hasil
                                        Tes</a>
                                @endrole



                            </div>
                        </div>
                        <div class="col-md-6 text-center text-md-end order-1 order-md-2">
                            <div class="card-body pb-0 px-0 pt-2">
                                <img src="../../assets/img/illustrations/illustration-john-light.png" height="186"
                                    class="scaleX-n1-rtl" alt="View Profile"
                                    data-app-light-img="illustrations/illustration-john-light.png"
                                    data-app-dark-img="illustrations/illustration-john-dark.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Gamification Card -->
            @role(['puskesmas', 'idc', 'uks'])
                <!-- Statistics Total Order -->
                <div class="col-xxl-2 col-sm-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                                <div class="avatar">
                                    <div class="avatar-initial bg-label-primary rounded-3">
                                        <i class="ri-graduation-cap-line ri-24px"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">

                                    <i class="ri-arrow-up-s-line text-success"></i>
                                </div>
                            </div>
                            <div class="card-info mt-5">
                                <h5 class="mb-1">{{ $totalsiswa }}</h5>
                                <p>Jumlah Siswa</p>

                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics Total Order -->
            @endrole
            <!--/ Gamification Card -->
            @role(['puskesmas', 'idc'])
                <!-- Statistics Total Order -->
                <div class="col-xxl-2 col-sm-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                                <div class="avatar">
                                    <div class="avatar-initial bg-label-primary rounded-3">
                                        <i class="ri-school-line ri-24px"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">

                                    <i class="ri-arrow-up-s-line text-success"></i>
                                </div>
                            </div>
                            <div class="card-info mt-5">
                                <h5 class="mb-1">{{ $totalsekolah }}</h5>
                                <p>Jumlah Sekolah</p>

                            </div>
                        </div>
                    </div>
                </div>
            @endrole

            @role('uks')
                <div class="col-xl-12 col-12 mb-6">
                    <div class="card">
                        <div class="card-header header-elements">
                            <h5 class="card-title mb-0">Statistik Priode Terbaru</h5>
                            <div class="card-action-element ms-auto py-0">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="ri-calendar-2-line"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="javascript:void(0);"
                                                class="dropdown-item d-flex align-items-center">Today</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"
                                                class="dropdown-item d-flex align-items-center">Yesterday</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7
                                                Days</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                                30 Days</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"
                                                class="dropdown-item d-flex align-items-center">Current Month</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                                Month</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="barChart" class="chartjs" data-height="400"></canvas>
                        </div>
                    </div>
                </div>
            @endrole
            @role('siswa')
                <div class="col-xxl-4 col-sm-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                                <div class="avatar">
                                    <div class="avatar-initial bg-label-primary rounded-3">
                                        <i class="ri-survey-line ri-24px"></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">

                                    <i class="ri-arrow-up-s-line text-success"></i>
                                </div>
                            </div>
                            <div class="card-info mt-5">
                                <h5 class="mb-1">


                                    @if ($siswa->user->tesDiabetes()->latest()->first() == null)
                                        <span class='badge bg-primary'> Belum melakukan Tes</span>
                                    @else
                                        @php
                                            $hasiltes = Idc::get_tes(
                                                $siswa,
                                                $siswa->user->tesDiabetes()->latest()->first(),
                                            );

                                        @endphp


                                        {{ Idc::totalpoin($pointerakhir->totalpoin) }}
                                    @endif
                                </h5>
                                <p>Tes Terakhir</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-12 mb-6">
                    <div class="card">
                        <div class="card-header header-elements">
                            <h5 class="card-title mb-0">Statistik</h5>
                            <div class="card-action-element ms-auto py-0">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="ri-calendar-2-line"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="javascript:void(0);"
                                                class="dropdown-item d-flex align-items-center">Today</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"
                                                class="dropdown-item d-flex align-items-center">Yesterday</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                                7
                                                Days</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                                30 Days</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"
                                                class="dropdown-item d-flex align-items-center">Current Month</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                                Month</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="barChart" class="chartjs" data-height="400"></canvas>
                        </div>
                    </div>
                </div>

            @endrole
            <!--/ Statistics Total Order -->

            <!-- Sessions line chart -->

            <!--/ Sessions line chart -->




        </div>
    </div>




    <!-- Main JS -->
    <script src="{{ asset('aplikasi/material/assets/js/main.js') }}"></script>

    <script src="{{ asset('aplikasi/material/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('aplikasi/material/assets/vendor/libs/chartjs/chartjs.js') }}"></script>
    @role('siswa')
        <script>
            (function() {
                // Color Variables
                const purpleColor = '#836AF9',
                    yellowColor = '#ffe800',
                    cyanColor = '#28dac6',
                    orangeColor = '#FF8132',
                    orangeLightColor = '#ffcf5c',
                    oceanBlueColor = '#299AFF',
                    greyColor = '#4F5D70',
                    greyLightColor = '#EDF1F4',
                    blueColor = '#2B9AFF',
                    blueLightColor = '#84D0FF';

                let cardColor, headingColor, labelColor, borderColor, legendColor;

                if (isDarkStyle) {
                    cardColor = config.colors_dark.cardColor;
                    headingColor = config.colors_dark.headingColor;
                    labelColor = config.colors_dark.textMuted;
                    legendColor = config.colors_dark.bodyColor;
                    borderColor = config.colors_dark.borderColor;
                } else {
                    cardColor = config.colors.cardColor;
                    headingColor = config.colors.headingColor;
                    labelColor = config.colors.textMuted;
                    legendColor = config.colors.bodyColor;
                    borderColor = config.colors.borderColor;
                }

                // Set height according to their data-height
                // --------------------------------------------------------------------
                const chartList = document.querySelectorAll('.chartjs');
                chartList.forEach(function(chartListItem) {
                    chartListItem.height = chartListItem.dataset.height;
                });







                // Bar Chart
                // --------------------------------------------------------------------
                const barChart = document.getElementById('barChart');
                if (barChart) {
                    const barChartVar = new Chart(barChart, {
                        type: 'line',
                        data: {

                            datasets: [{
                                data: @json($poin),
                                backgroundColor: orangeLightColor,
                                borderColor: orangeLightColor,
                                maxBarThickness: 15,
                                borderRadius: {
                                    topRight: 15,
                                    topLeft: 15
                                }
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            animation: {
                                duration: 500
                            },
                            plugins: {
                                tooltip: {
                                    rtl: isRtl,
                                    backgroundColor: cardColor,
                                    titleColor: headingColor,
                                    bodyColor: legendColor,
                                    borderWidth: 1,
                                    borderColor: borderColor
                                },
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        color: borderColor,
                                        drawBorder: false,
                                        borderColor: borderColor
                                    },
                                    ticks: {
                                        color: labelColor
                                    }
                                },
                                y: {
                                    min: 0,
                                    max: 20,
                                    grid: {
                                        color: borderColor,
                                        drawBorder: false,
                                        borderColor: borderColor
                                    },
                                    ticks: {
                                        stepSize: 100,
                                        color: labelColor
                                    }
                                }
                            }
                        }
                    });
                }

            })();
        </script>
    @endrole



    @role('uks')
        <script>
            (function() {
                // Color Variables
                const purpleColor = '#836AF9',
                    yellowColor = '#ffe800',
                    cyanColor = '#28dac6',
                    orangeColor = '#FF8132',
                    orangeLightColor = '#ffcf5c',
                    oceanBlueColor = '#299AFF',
                    greyColor = '#4F5D70',
                    greyLightColor = '#EDF1F4',
                    blueColor = '#2B9AFF',
                    blueLightColor = '#84D0FF';

                let cardColor, headingColor, labelColor, borderColor, legendColor;

                if (isDarkStyle) {
                    cardColor = config.colors_dark.cardColor;
                    headingColor = config.colors_dark.headingColor;
                    labelColor = config.colors_dark.textMuted;
                    legendColor = config.colors_dark.bodyColor;
                    borderColor = config.colors_dark.borderColor;
                } else {
                    cardColor = config.colors.cardColor;
                    headingColor = config.colors.headingColor;
                    labelColor = config.colors.textMuted;
                    legendColor = config.colors.bodyColor;
                    borderColor = config.colors.borderColor;
                }

                // Set height according to their data-height
                // --------------------------------------------------------------------
                const chartList = document.querySelectorAll('.chartjs');
                chartList.forEach(function(chartListItem) {
                    chartListItem.height = chartListItem.dataset.height;
                });

                // Pie Chart
                // --------------------------------------------------------------------

                const pieData = @json($pie);
                const pieChart = document.getElementById('barChart');
                if (pieChart) {
                    const pieChartVar = new Chart(pieChart, {
                        type: 'pie',
                        data: {
                            labels: ['Berisiko', 'Tidak Berisiko'],
                            datasets: [{
                                data: pieData,
                                backgroundColor: [orangeLightColor, cyanColor],
                                borderColor: cardColor,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                tooltip: {
                                    rtl: isRtl,
                                    backgroundColor: cardColor,
                                    titleColor: headingColor,
                                    bodyColor: legendColor,
                                    borderWidth: 1,
                                    borderColor: borderColor
                                },
                                legend: {
                                    position: 'top',
                                    labels: {
                                        color: labelColor
                                    }
                                }
                            }
                        }
                    });
                }

            })();
        </script>
    @endrole

@endsection
