@php
    use Carbon\Carbon;
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
@endphp
@extends('dashboard.user.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('calendar-assets/css/style.css') }}">
    <link href='{{ asset('calendar-assets/fullcalendar/packages/core/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('calendar-assets/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
    {{-- <link rel="stylesheet" href="{{ asset('calendar-assets/css/bootstrap.min.css') }}"> --}}
    <style>
        .short-description {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            /* Batasi teks ke 2 baris */
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection
@section('content')
    {{-- @dd($events) --}}
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">


            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-8 ">

                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Jadwal
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <p class="fw-semibold fs-7 my-0 text-muted">Kalender Jadwal</p>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-2 py-md-1">

                                <!--begin::Button-->
                                @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                    <a href="{{ route('teacher.challenges.create') }}" class="btn btn-dark fw-bold">
                                        Tambah </a>
                                @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                    <a href="{{ route('mentor.challenges.create') }}" class="btn btn-dark fw-bold">
                                        Tambah </a>
                                @endif
                                <!--end::Button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    <div class="row g-2">
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="content px-20 pt-10">
                                    <div class="d-flex justify-content-end pb-2">
                                        <div class="btn btn-filter" style="background-color: #5CA7DB; color: white"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Lihat Detail">
                                            Filter Tahun/Bulan
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div id='calendar'></div>
                                        </div>
                                        {{-- <div class="col-12 col-md-3">
                                            <div class="card p-4 ms-3 mt-18 shadow card-statistics">
                                                <h4 class="text-center mt-2">Rekap Absen</h4>
                                                <div class="d-flex flex-column justify-content-center mx-5 gap-3">
                                                    <div class="row">
                                                        <div class="card d-flex flex-row gap-6 mt-4 align-items-center p-3"
                                                            style="background-color: #5CA7DB;">
                                                            <div class="col-4">
                                                                <div class="card p-3 text-center"
                                                                    style="background-color: hsl(205, 100%, 94%); font-weight: 500">
                                                                </div>
                                                            </div>
                                                            <div class="col-8" style="color: white; font-weight: 500">
                                                                {{ isset($_GET['bulan']) && $_GET['bulan'] != '' ? $_GET['bulan'] : date('n') }}
                                                                {{ isset($_GET['tahun']) && $_GET['tahun'] != '' ? $_GET['tahun'] : date('Y') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Footer-->
            <div id="kt_app_footer" class="app-footer ">
                <!--begin::Footer container-->
                <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-semibold me-1">{{ Carbon::now()->format('Y') }}©</span>
                        <a href="https://keenthemes.com/" target="_blank" class="text-gray-800 text-hover-primary">Kelas
                            Industri</a>
                    </div>
                    <!--end::Copyright-->

                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item"><a href="https://keenthemes.com/" target="_blank"
                                class="menu-link px-2">Tentang
                                Kami</a></li>

                        <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank"
                                class="menu-link px-2">Syarat &
                                Ketentuan</a></li>

                        <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank"
                                class="menu-link px-2">Kebijakan Privasi</a></li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Footer container-->
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.btn-filter', function() {
            $('#filterModal').modal('show');
        });
    </script>
    <script src="{{ asset('calendar-assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('calendar-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('calendar-assets/js/bootstrap.min.js') }}"></script>

    <script src='{{ asset('calendar-assets/fullcalendar/packages/core/main.js') }}'></script>
    <script src='{{ asset('calendar-assets/fullcalendar/packages/interaction/main.js') }}'></script>
    <script src='{{ asset('calendar-assets/fullcalendar/packages/daygrid/main.js') }}'></script>
    <script>
        let events = [];
        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');

            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var tahun = urlParams.get('tahun');
            var bulan = urlParams.get('bulan');
            // Define variables
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid'],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                defaultDate: tahun ? tahun + '-' + (bulan ? (parseInt(bulan) > 9 ? bulan : '0' + parseInt(
                        bulan)) : ('0' + (new Date().getMonth() + 1)).slice(-2)) : new Date().toISOString()
                    .split('T')[0],
                selectable: true,
                selectMirror: true,

                eventRender: function(info) {
                    var tooltip = new bootstrap.Tooltip(info.el, {
                        // title: info.event.title + ' ' + info.event.extendedProps.description, // Sesuaikan dengan properti yang Anda inginkan
                        title: ``,
                        // description: info.event.extendedProps.description,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                },

                // Create new event
                select: function(arg) {
                    $('#create_modal').modal('show')
                    $('#create_modal #submit_btn').click(function() {
                        var title = document.querySelector('input[name="event_name"]')
                            .value;
                        var description = document.querySelector(
                                'input[name="event_description"]')
                            .value;
                        if (title) {
                            const event = {
                                title: title,
                                description: description ? description : "",
                                start: arg.start,
                                end: arg.end,
                                allDay: arg.allDay
                            }
                            event.start = arg.startStr;
                            event.end = arg.endStr;

                            $.ajax({
                                type: "post",
                                url: "{{ route('admin.schedules.store') }}",
                                data: {
                                    'event': event,
                                    'school': $('#school').val(),
                                    'subject': $('#subject').val(),
                                    '_token': $("meta[name='csrf-token']").attr(
                                        "content")
                                },
                                success: function(response) {
                                    calendar.unselect()
                                    calendar.addEvent(event)
                                    Swal.fire({
                                        text: 'Jadwal berhasil ditambahkan',
                                        icon: "success",
                                        confirmButtonText: "Oke",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        }
                                    })
                                    $('#create_modal').modal('hide')

                                },
                                error: function(param) {
                                    Swal.fire({
                                        text: 'Jadwal Gagal ditambahkan',
                                        icon: "danger",
                                        confirmButtonText: "Oke",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        }
                                    })
                                    calendar.unselect()
                                    console.log(param);
                                }
                            })
                        }
                    })
                },

                // Delete event
                eventClick: function(arg) {
                    $('#detail_modal').modal('show')
                    $('#delete_btn').click(function() {
                        Swal.fire({
                            text: 'Apakah anda yakin ingin menghapus?',
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Ya!",
                            cancelButtonText: "Tidak",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then(function(result) {
                            if (result.value) {
                                $.ajax({
                                    type: "delete",
                                    url: "{{ route('admin.schedules.destroy', '') }}/" +
                                        arg.event.id,
                                    data: {
                                        '_token': $("meta[name='csrf-token']")
                                            .attr(
                                                "content")
                                    },
                                    success: function(res) {
                                        Swal.fire({
                                            text: 'Jadwal berhasil dihapus?',
                                            icon: "success",
                                            confirmButtonText: "Oke",
                                            customClass: {
                                                confirmButton: "btn btn-primary",
                                            }
                                        })
                                        arg.event.remove()
                                    },
                                    error: function(param) {
                                        console.log(param);
                                    }
                                })
                                $('#detail_modal').modal('hide')

                            }
                        });
                    })

                },
                editable: true,
                eventDidMount: function(info) {
                    var tooltip = new Tooltip(info.el, {
                        title: info.event.extendedProps.description,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                },


                events: events,
                // dayMaxEvents: true, // allow "more" link when too many events
            });

            calendar.render();

            $.ajax({
                type: 'get',
                url: "{{ route('common.schedules.all') }}",
                success: function(res) {
                    res.events.forEach(event => {
                        calendar.addEvent(event);
                    })
                }
            })
        })
    </script>
    <script src="{{ asset('calendar-assets/js/main.js') }}"></script>
@endsection
