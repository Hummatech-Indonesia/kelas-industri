@extends('dashboard.finance.layout.app')
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
                <h3>Selamat datang,
                    {{ auth()->user()->name }}
                </h3>
            </div>

        </div>
        <div class="covercard row gap-2 mt-4">
            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                <div class="card-body d-flex align-items">
                    <span class="w-4 h-4 my-auto fs-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 3c2.21 0 4 1.79 4 4s-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4m4 10.54c0 1.06-.28 3.53-2.19 6.29L13 15l.94-1.88c-.62-.07-1.27-.12-1.94-.12s-1.32.05-1.94.12L11 15l-.81 4.83C8.28 17.07 8 14.6 8 13.54c-2.39.7-4 1.96-4 3.46v4h16v-4c0-1.5-1.6-2.76-4-3.46Z" />
                        </svg>
                    </span>

                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                        Jumlah Mentor
                        {{ $mentor }}
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
                        Jumlah Guru
                        {{ $guru }}
                    </span>
                </div>
            </a>
        </div>
        {{-- @endif --}}

        <div class="row gap-2 mt-4">
            {{-- <div class="col-12 col-sm-3 h-100">
                <div class="card shadow-sm p-5">
                    <h3 class="card-title">Absensi Mentor</h3>
                    <div class="row row-cols-1 gap-5 mt-4">
                        <div class="col">
                            <div class="card border-4 border-start border-primary shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Jumlah absen</h3>
                                        <h3>{{ $countAttendance ? $countAttendance : 0 }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col">
                <div class="card shadow-sm">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mx-4 mt-4 gap-2">
                        <div class="row">
                            <div class="col">
                                <h4 class="text-muted">Total Pemasukan</h4>
                                <h3><span class="text-primary">Rp. {{ $incomes->sum() }}</span></h3>
                            </div>
                            <div class="col border-2 border-start border-end">
                                <h4 class="text-muted">Total Pengeluaran</h4>
                                <h3><span class="text-primary">Rp. {{ $spents->sum() }}</span></h3>
                            </div>
                            <div class="col">
                                <h4 class="text-muted">Total Piutang</h4>
                                <h3><span class="text-primary">Rp. {{ $depts->sum() }}</span></h3>
                            </div>
                        </div>
                        <form action="#kt_jurnal_guru" method="GET" class="d-flex gap-2">
                            <select class="form-select form-select-solid me-5" name="year" data-control="select2"
                                data-placeholder="Tahun">
                                <option></option>
                                <option value="2024">2024</option>
                            </select>
                            <button type="submit" class="btn btn-primary fw-bold">Filter</button>
                        </form>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-4">
                        <div id="kt_keuangan"></div>
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 gap-2 gap-md-0 mt-4">
            <div class="col" id="jurnal_mentor">
                <div class="card shadow-sm h-100">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mx-4 mt-4 gap-2">
                        <h4 class="card-title">Jurnal Mentor</h4>
                        <form action="#jurnal_mentor" method="GET"
                            class="row row-cols-1 row-cols-md-4 justify-content-between">
                            <div class="col">
                                <select class="form-select form-select-solid" name="school" data-control="select2"
                                    data-placeholder="Sekolah">
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select form-select-solid" name="year" data-control="select2"
                                    data-placeholder="Tahun">
                                    <option></option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>

                            <div class="col">
                                <select class="form-select form-select-solid" name="month" data-control="select2"
                                    data-placeholder="Bulan">
                                    <option></option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juli</option>
                                    <option value="07">Juni</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col"><button type="submit" class="btn btn-primary fw-bold">Filter</button>
                            </div>
                        </form>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-4">
                        @if (count($mentorsJournal) <= 0)
                            <x-empty-component title="jurnal mentor" />
                        @else
                            <div id="kt_jurnal_mentor" style="height: 350px;"></div>
                        @endif
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            <div class="col" id="jurnal_guru">
                <div class="card shadow-sm">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mx-4 mt-4 gap-2">
                        <h4 class="card-title">Jurnal Guru</h4>
                        <div>
                            <form action="#jurnal_guru" method="GET"
                                class="row row-cols-1 row-cols-md-4 justify-content-between">
                                <div class="col">
                                    <select class="form-select form-select-solid" name="school" data-control="select2"
                                        data-placeholder="Sekolah">
                                        @foreach ($schools as $school)
                                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select form-select-solid" name="year" data-control="select2"
                                        data-placeholder="Tahun">
                                        <option></option>
                                        <option value="2024">2024</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <select class="form-select form-select-solid" name="month" data-control="select2"
                                        data-placeholder="Bulan">
                                        <option></option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juli</option>
                                        <option value="07">Juni</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col"><button type="submit"
                                        class="btn btn-primary fw-bold">Filter</button></div>
                            </form>
                        </div>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-4 px-0">
                        @if (count($teachersJournal) <= 0)
                            <x-empty-component title="jurnal guru" />
                        @else
                            <div id="kt_jurnal_guru" style="height: 350px;"></div>
                        @endif
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 gap-2 gap-md-0 mt-4">
            <div class="col">
                <div class="card shadow-sm p-5">
                    <h3 class="card-title">Paket Sekolah</h3>
                    <div class="row row-cols-md-2 row-gap-3 mt-4">
                        <div class="col">
                            <div class="card border-3 border-bottom border-primary shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Dibayar</h3>
                                        <h3>{{ isset($schoolPackages['already_paid']) ? $schoolPackages['already_paid'] : 0 }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-3 border-bottom border-danger shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Belum Dibayar</h3>
                                        <h3>{{ isset($schoolPackages['not_yet_paid']) ? $schoolPackages['not_yet_paid'] : 0 }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-3 border-bottom border-warning shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Piutang</h3>
                                        <h3>{{ isset($schoolPackages['dept']) ? $schoolPackages['dept'] : 0 }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm p-5 h-100">
                    <h3 class="card-title">Paket Siswa</h3>
                    <div class="row row-cols-md-2 row-gap-3 mt-4">
                        <div class="col">
                            <div class="card border-3 border-bottom border-primary shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Lunas</h3>
                                        <h3>{{ isset($studentPayment['paid_off']) ? $studentPayment['paid_off'] : 0 }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-3 border-bottom border-danger shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Belum Lunas</h3>
                                        <h3>{{ isset($studentPayment['not_yet_paid_off']) ? $studentPayment['not_yet_paid_off'] : 0 }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        {{-- chart income --}}
        <script>
            var keuangan = document.getElementById('kt_keuangan');

            // const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];
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
                    name: 'Piutang',
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

            // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
            var financeChart = new ApexCharts(keuangan, financeOptions);
            financeChart.render();
        </script>

        {{-- teacher jurnal chart --}}
        <script>
            var teacherJournal = document.getElementById('kt_jurnal_guru');
            var mentorJournal = document.getElementById('kt_jurnal_mentor');

            var height = parseInt(KTUtil.css(teacherJournal, 'height'));
            var labelColor = KTUtil.getCssVariableValue('--kt-gray-500');
            var borderColor = KTUtil.getCssVariableValue('--kt-gray-200');
            var baseColor = KTUtil.getCssVariableValue('--kt-primary');
            var secondaryColor = KTUtil.getCssVariableValue('--kt-gray-300');

            // if (!element) {
            //     return;
            // }

            var teacherOptions = {
                series: [
                    @foreach ($teachersJournal as $key => $count)
                        {
                            name: "{{ $key }}",
                            data: [{{ $count }}]
                        },
                    @endforeach
                ],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Feb'],
                },
                // yaxis: {
                //     title: {
                //         text: '$ (thousands)'
                //     }
                // },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    // y: {
                    //     formatter: function(val) {
                    //         return "$ " + val + " thousands"
                    //     }
                    // }
                }
            };

            var teacherJournalChart = new ApexCharts(teacherJournal, teacherOptions);
            teacherJournalChart.render();

            var mentorOptions = {
                series: [
                    @foreach ($mentorsJournal as $key => $count)
                        {
                            name: "{{ $key }}",
                            data: [{{ $count }}]
                        },
                    @endforeach
                ],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Feb'],
                },
                // yaxis: {
                //     title: {
                //         text: '$ (thousands)'
                //     }
                // },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    // y: {
                    //     formatter: function(val) {
                    //         return "$ " + val + " thousands"
                    //     }
                    // }
                }
            };

            var mentorJournalChart = new ApexCharts(mentorJournal, mentorOptions);
            mentorJournalChart.render();
        </script>
    @endsection
