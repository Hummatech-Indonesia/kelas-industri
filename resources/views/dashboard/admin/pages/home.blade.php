@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Beranda
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Halaman beranda.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">


        </div>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-md-3">
                <h3>Selamat datang, {{ auth()->user()->name }}</h3>
            </div>

        </div>
        @if (auth()->user()->roles->pluck('name')[0] == 'school')
            <div class="covercard row gap-2 mt-4">
                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20v16M10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16c1.3 0 2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah Kelas Di Sekolah {{ $classroom }}
                        </span>
                    </div>
                </a>

                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M16 8c0 2.21-1.79 4-4 4s-4-1.79-4-4l.11-.94L5 5.5L12 2l7 3.5v5h-1V6l-2.11 1.06L16 8m-4 6c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah Guru {{ $teacher }}
                        </span>
                    </div>
                </a>
                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah Siswa {{ $student }}
                        </span>
                    </div>
                </a>
                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M18 22a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6v7L9.5 7.5L7 9V2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah jurnal {{ $jurnal }}
                        </span>
                    </div>
                </a>
            </div>

            {{-- <div class="card card-bordered mt-5">
                <div class="card-body">
                    <div id="kt_keuangan"></div>
                </div>
            </div> --}}
            <div class="row row-cols-md-2 mt-5">
                <div class="col">
                    <div class="card" style="height: 368px;">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Title-->
                            <h3 class="card-title fw-bold text-gray-800" style="margin-bottom: 3rem">
                                Peringkat
                            </h3>
                            <!--end::Title-->
                            <div class="overflow-auto" style="max-height: 300px;">
                                @forelse ($rankings as $index => $ranking)
                                    <div class="d-flex mb-3 flex-stack">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            @if ($index == 0)
                                                <img width="50px"
                                                    src="http://127.0.0.1:8000/app-assets/medal_file/gold-medal.png"
                                                    alt="">
                                            @elseif ($index == 1)
                                                <img width="50px"
                                                    src="http://127.0.0.1:8000/app-assets/medal_file/silver-medal.png"
                                                    alt="">
                                            @elseif ($index == 2)
                                                <img width="50px"
                                                    src="http://127.0.0.1:8000/app-assets/medal_file/bronze-medal.png"
                                                    alt="">
                                            @else
                                                <div class="d-flex justify-content-center items-center"
                                                    style="width:40px; height:50px; ">
                                                    <p>{{ $index + 1 }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <!--begin:Author-->
                                            <div class="flex-grow-1 me-2">
                                                <a href="http://127.0.0.1:8000/student/ranking"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bold">{{ $ranking->name }}</a>
                                                <span
                                                    class="text-muted fw-semibold d-block fs-7">{{ $ranking->studentSchool->school->name }}</span>
                                                <span
                                                    class="text-muted fw-semibold d-block fs-7">{{ $ranking->point }}</span>
                                            </div>
                                            <!--end:Author-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                @empty
                                <x-empty-component title="siswa" />
                                @endforelse
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-12 h-100">
                    <div class="card shadow-sm p-5">
                        <h5 class="card-title">Pembayaran siswa</h5>
                        <div class="row row-cols-1 gap-5 mt-4">
                            <div class="col">
                                <div class="card border-4 border-start border-primary shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Total Siswa</h3>
                                            <h3>{{ $student }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card border-4 border-start border-primary shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Sudah Bayar</h3>
                                            <h3>{{ $studentPayment['paid_off'] ? $studentPayment['paid_off'] : 0 }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card border-4 border-start border-danger shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Belum Bayar</h3>
                                            <h3>{{ $studentPayment['not_yet_paid_off'] ? $studentPayment['not_yet_paid_off'] : 0 }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (auth()->user()->roles->pluck('name')[0] == 'admin')
            <div class="covercard row gap-2 mt-4">
                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 3L1 9l11 6l9-4.91V17h2V9M5php art 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah Sekolah {{ $school }}
                        </span>
                    </div>
                </a>

                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M9 3v15h3V3H9m3 2l4 13l3-1l-4-13l-3 1M5 5v13h3V5H5M3 19v2h18v-2H3Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah Materi {{ $material }}
                        </span>
                    </div>
                </a>
                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 3c2.21 0 4 1.79 4 4s-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4m4 10.54c0 1.06-.28 3.53-2.19 6.29L13 15l.94-1.88c-.62-.07-1.27-.12-1.94-.12s-1.32.05-1.94.12L11 15l-.81 4.83C8.28 17.07 8 14.6 8 13.54c-2.39.7-4 1.96-4 3.46v4h16v-4c0-1.5-1.6-2.76-4-3.46Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah Mentor {{ $mentor }}
                        </span>
                    </div>
                </a>
                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah Siswa {{ $student }}
                        </span>
                    </div>
                </a>
            </div>

            <div class=" row gap-2 mt-4">
                <div class="card shadow-sm">
                    <div class="mt-4 mx-5">
                        <h4 class="card-title">Keuangan</h4>
                        <div class="card-body">
                            <div id="kt_keuangan"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
@section('css')
    <Style>
        @media (max-width:639px) {
            .covercard {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:640px) {
            .searching {
                display: flex;
            }
        }
    </Style>
@endsection
@section('script')
    <script>
        var keuangan = document.getElementById('kt_keuangan');
        var jurnal = document.getElementById('kt_jurnal');

        // var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--kt-gray-500');
        var borderColor = KTUtil.getCssVariableValue('--kt-gray-200');
        var baseColor = KTUtil.getCssVariableValue('--kt-info');
        var lightColor = KTUtil.getCssVariableValue('--kt-info-light');

        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];
        const incomeData = [
            @foreach ($incomes as $key => $value)
                {
                    x: '{{ $key }}',
                    y: '{{ $value }}'
                },
            @endforeach
        ];
        const spentData = [
            @foreach ($spents as $key => $value)
                {
                    x: '{{ $key }}',
                    y: '{{ $value }}'
                },
            @endforeach
        ];
        const deptData = [
            @foreach ($depts as $key => $value)
                {
                    x: '{{ $key }}',
                    y: '{{ $value }}'
                },
            @endforeach
        ];

        var financeOptions = {
            chart: {
                type: 'line',
                height: '300px',
                width: '100%'
            },
            series: [{
                name: 'Pemasukan',
                data: incomeData
            }, {
                name: 'Pengeluaran',
                data: spentData
            }, {
                name: 'Hutang',
                data: deptData
            }],
            xaxis: {
                type: 'category'
            },
            stroke: {
                curve: 'smooth',
            },
            colors: ['#0057E4', '#FF0000', '#FFC700'],
            toolbar: {
                show: false,
            },
            dropShadow: {
                enabled: true,
                top: 0,
                left: 0,
                blur: 3,
                opacity: 0.5
            },
        }


        var chartkeuangan = new ApexCharts(keuangan, financeOptions);
        chartkeuangan.render();
        // var chartjurnal = new ApexCharts(jurnal, options);
        // chartjurnal.render();
    </script>
@endsection
