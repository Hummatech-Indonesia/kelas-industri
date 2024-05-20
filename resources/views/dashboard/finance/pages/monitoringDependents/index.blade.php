@extends('dashboard.finance.layout.app')
@section('css')
    <style>
        @media (max-width:639px) {
            .position-relative {
                margin-bottom: 10px;
            }
        }

        @media (min-width:640px) {
            .searching {
                display: flex;
            }
        }

        .card-total .active {
            border-bottom: 2px solid;
        }
    </style>
@endsection
@section('content')
    <div class="card shadow-sm mb-3">
        <div class="card-body"></div>
    </div>
    <div class="row max-h-md-2">
        <div class="col-4 d-flex flex-column gap-2 card-total">
            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover active border-primary"
                data-finance="income">
                <div class="card-body d-flex align-items">
                    <span class="w-4 h-4 my-auto fs-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 3c2.21 0 4 1.79 4 4s-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4m4 10.54c0 1.06-.28 3.53-2.19 6.29L13 15l.94-1.88c-.62-.07-1.27-.12-1.94-.12s-1.32.05-1.94.12L11 15l-.81 4.83C8.28 17.07 8 14.6 8 13.54c-2.39.7-4 1.96-4 3.46v4h16v-4c0-1.5-1.6-2.76-4-3.46Z">
                            </path>
                        </svg>
                    </span>
                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                        Total Pemasukan
                        Rp. 100.000
                    </span>
                </div>
            </a>
            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover active border-danger"
                data-finance="spent">
                <div class="card-body d-flex align-items">
                    <span class="w-4 h-4 my-auto fs-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z">
                            </path>
                        </svg>
                    </span>
                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                        Total Pengeluaran
                        Rp. 200.000
                    </span>
                </div>
            </a>
            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover active border-warning"
                data-finance="dept">
                <div class="card-body d-flex align-items">
                    <span class="w-4 h-4 my-auto fs-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z">
                            </path>
                        </svg>
                    </span>
                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                        Total Piutang
                        Rp. 300.000
                    </span>
                </div>
            </a>
        </div>
        <div class="col card shadow-sm">
            <div class="card-body">
                <div id="kt_apexcharts_3" style="height: 350px;"></div>
            </div>
        </div>
    </div>
    <div class="toolbar mb-5 mt-20 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Sekolah
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List sekolah yang terdaftar di kelas industri.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <!--begin::Card-->
                <div class="card mb-7">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Compact form-->
                        <div class="searching align-items-center row">
                            <!--begin::Input group-->
                            <div class="col-lg-6 col-md-6 col-5">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span
                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                        </rect>
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" class="form-control form-control-solid ps-10" name="search"
                                    value="{{ $parameters['search'] ?? '' }}" placeholder="Search">
                            </div>
                            <div class="col-lg-2 col-md-4 col-2">
                                <button class="btn btn-primary" id="btn-search">Cari</button>
                                <a href="{{ route('administration.tracking.index') }}" type="button"
                                    class="btn btn-light text-light ms-2"><i class="fonticon-repeat"></i></a>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Compact form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
        </div>
        <div class="row">
            @forelse($schools as $school)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-5 mb-5">

                    <!--begin::Card-->

                    <div class="card card-custom gutter-b card-stretch">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Section-->

                            <div class="d-flex align-items-center gap-3">

                                <!--begin::Pic-->

                                <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle display-5">

                                    @if ($school->photo)
                                        <img src="{{ asset('storage/' . $school->photo) }}" alt="kanesa">
                                    @else
                                        <div class="symbol-label fs-2 fw-s  emibold bg-primary text-inverse-danger">
                                            {{ substr($school->name, 0, 1) }}</div>
                                    @endif

                                </div>

                                <!--end::Pic-->

                                <!--begin::Info-->

                                <div class="d-flex flex-column mr-auto ">

                                    <!--begin: Title-->

                                    <a href="{{ route('admin.schools.show', $school->id) }}"
                                        class="card-title text-hover-primary fw-bolder font-size-h5 text-dark mb-1">
                                        {{ $school->name }}
                                    </a>


                                    <span class="font-weight-bold"
                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 200px ;white-space: nowrap">
                                        {{-- {{ $school->address }} --}}
                                        Tanggungan siswa
                                    </span>
                                    <!--end::Title-->

                                </div>

                                <!--end::Info-->
                            </div>

                            <!--end::Section-->

                            <!--begin::Content-->

                            <!--begin::Progress-->

                            <div class="d-flex mt-3 justify-content-evenly">

                                <div class="mb-1 col-4 text-center">

                                    <span class="d-block font-weight-bold mb-3">

                                        BELUM LUNAS

                                    </span>

                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">
                                        {{ $countStudents[$school->id] }}
                                    </span>

                                </div>

                                <div class="mb-1 col-4 text-center">

                                    <span class="d-block font-weight-bold mb-3">

                                        SUDAH LUNAS

                                    </span>

                                    <span class="btn btn-light-warning btn-sm font-weight-bold btn-upper btn-text">
                                        {{ count($school->teachers) }}
                                    </span>

                                </div>

                            </div>

                            <!--end::Progress-->

                            <!--end::Content-->


                        </div>

                        <!--end::Body-->

                        <!--begin::Footer-->

                        <div class="card-footer d-flex align-items-center flex-row justify-content-center gap-2">

                            <a href="{{ route('administration.payment-student', $school->id) }}"
                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-2 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Detail</a>

                        </div>

                        <!--end::Footer-->

                    </div>


                    <!--end:: Card-->

                </div>
            @empty
                <x-empty-component title="sekolah" />
            @endforelse
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-pagination-component :paginator="$schools" :parameters="$parameters" route="administration.tracking.index" />
            </div>
        </div>
        <x-delete-modal-component />
    </div>
@endsection

@section('script')
    <script>
        $('#btn-search').click(function() {
            var searchQuery = $("input[name='search']").val();
            var status = $("select[name='status']").val();
            var baseUrl = "{{ route('administration.tracking.index') }}";
            window.location.href = baseUrl + '?search=' + searchQuery + '&status=' + status;
        })

        // const card = $('.card-total .card');
        // $.each(card, function(indexInArray, valueOfElement) {
        //     valueOfElement.addEventListener('click', e => {
        //         if (valueOfElement.getAttribute("data-finance") == 'income') {
        //             chart.updateSeries(incomeSeries);
        //         } else if (valueOfElement.getAttribute("data-finance") == 'spent') {
        //             chart.updateSeries(spentSeries);
        //         } else if (valueOfElement.getAttribute("data-finance") == 'dept') {
        //             chart.updateSeries(deptSeries);
        //         }
        //     })
        // });

        function getDAtaFinance(type) {
            const series = [{
                name: type,
                data: [10, 10, 10, 30, 20, 10],
                color: () => {
                    if (type == 'income') {
                        return "#009ef7";
                    } else if (type == 'spent') {
                        return "#f1416c"
                    } else if (type == 'dept') {
                        return "#ffc700"
                    }
                    return ""
                }
            }]
            chart.updateSeries(series)
        }
    </script>


    <script>
        let financeData = "";

        var element = document.getElementById('kt_apexcharts_3');

        var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--kt-gray-500');
        var borderColor = KTUtil.getCssVariableValue('--kt-gray-200');
        var baseColor = KTUtil.getCssVariableValue('--kt-info');
        var lightColor = KTUtil.getCssVariableValue('--kt-info-light');
        var options = {
            series: [{
                name: 'Pemasukan',
                data: [0, 0, 0, 0, 0, 0, 0]
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: true
                }
            },
            plotOptions: {

            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: "gradient",
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseColor]
            },
            xaxis: {
                type: 'category',
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function(val) {
                        return '$' + val + ' thousands'
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(element, options);
        chart.render();

        let incomeSeries = [{
            name: "Pemasukan",
            data: "",
            color: "#009ef7"
        }, {
            name: "Pengeluaran",
            data: "",
            color: "#f1416c"
        }, {
            name: "Piutang",
            data: "",
            color: "#ffc700"
        }];
        let spentSeries = [{
            name: "Pengeluaran",
            data: "",
            color: "#f1416c"
        }, ];
        let deptSeries = [{
            name: "Piutang",
            data: "",
            color: "#ffc700"
        }];

        $.ajax({
            type: "get",
            url: "/administration/finance",
            success: function(response) {
                financeData = response
                // console.log(financeData.incomes);
                incomeSeries[0].data = Object.entries(financeData.incomes).map(([month, value]) => {
                    return {
                        x: month,
                        y: value
                    };
                });
                incomeSeries[1].data = Object.entries(financeData.spents).map(([month, value]) => {
                    return {
                        x: month,
                        y: value
                    };
                });
                incomeSeries[2].data = Object.entries(financeData.depts).map(([month, value]) => {
                    return {
                        x: month,
                        y: value
                    };
                });

                chart.updateSeries(incomeSeries)
            }

        });
    </script>
@endsection
