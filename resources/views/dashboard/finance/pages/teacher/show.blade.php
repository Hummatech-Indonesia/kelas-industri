@extends('dashboard.finance.layout.app')
@section('css')
    <link href='{{ asset('calendar-assets/fullcalendar/packages/core/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('calendar-assets/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
    {{-- <link rel="stylesheet" href="{{ asset('calendar-assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('calendar-assets/css/style.css') }}">
@endsection
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Detail Guru
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Detail Guru {{ $guru->name }}.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <div class="flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="content px-20 pt-10">
                        <div class="d-flex justify-content-end pb-2 px-11">
                            <div class="btn btn-filter me-1" style="background-color: #5CA7DB; color: white" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Lihat Detail">
                                Filter Tahun/Bulan
                            </div>
                        </div>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>

        </div>
        <x-delete-modal-component />
        <div class="modal fade" tabindex="-1" id="filterModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Filter Tahun/Bulan</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                                width="30">
                                <path
                                    d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                            </svg>
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body row">
                        <form action="">
                        <div class="row gap-3">
                            <div class="col-12">
                                <label for="tahun">Pilih Tahun</label>
                                <select name="tahun" id="tahun" class="form-select form-select-solid me-5" data-control="select2"
                                    data-placeholder="select an option">
                                    <option value="">Tahun</option>
                                        <option value="">
                                            Rendi
                                        </option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="bulan">Pilih Bulan</label>
                                <select name="bulan" id="bulan" class="form-select form-select-solid me-5" data-control="select2"
                                    data-placeholder="select an option">
                                    <option value="">Bulan</option>
                                        <option value="">
                                            Rendi
                                        </option>
                                </select>   
                            </div>
                            <div class="col-12 d-flex justify-content-end mt-3">
                                <button type="submit" class="btn fw-bold" style="background-color: #5CA7DB; color: white;">Filter</button>
                            </div>
                        </div>
                    </form>
                    </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid'],
                defaultDate: new Date().toISOString().split('T')[0],
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [{
                        title: 'All Day Event',
                        start: '2020-02-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2020-02-07',
                        end: '2020-02-10'
                    },
                    {
                        groupId: 999,
                        title: 'Repeating Event',
                        start: '2020-02-09T16:00:00'
                    },
                    {
                        groupId: 999,
                        title: 'Repeating Event',
                        start: '2020-02-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2020-02-11',
                        end: '2020-02-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2020-02-12T10:30:00',
                        end: '2020-02-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2020-02-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2020-02-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2020-02-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2020-02-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2020-02-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2020-02-28'
                    }
                ]
            });

            calendar.render();
        });
    </script>
    <script src="{{ asset('calendar-assets/js/main.js') }}"></script>
@endsection
