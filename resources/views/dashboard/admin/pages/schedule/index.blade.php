@extends('dashboard.admin.layouts.app')
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
                Jadwal
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Jadwal Kunjengan Idustri dan Ujian
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
                        <div class="d-flex justify-content-end pb-2">
                            <div class="btn btn-filter" style="background-color: #5CA7DB; color: white"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                data-bs-title="Lihat Detail">
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
                        <form id="form-filter">
                            <div class="row gap-3">
                                <div class="col-12">
                                    <label for="tahun">Pilih Tahun</label>
                                    <select name="tahun" id="tahun" class="form-select form-select-solid me-5"
                                        data-control="select2" data-placeholder="select an option"
                                        onchange="getBulan(this.value)">
                                        <option value="">Pilih Tahun</option>
                                        @php
                                            $tahuns = [];
                                        @endphp
                                        {{-- @foreach ($attendances as $attendance)
                                            @if (!in_array(substr($attendance->created_at, 0, 4), $tahuns))
                                                <option value="{{ substr($attendance->created_at, 0, 4) }}"
                                                    >
                                                    {{ substr($attendance->created_at, 0, 4) }}
                                                </option>
                                                @php
                                                    $tahuns[] = substr($attendance->created_at, 0, 4);
                                                @endphp
                                            @endif
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="bulan">Pilih Bulan</label>
                                    <select name="bulan" id="bulan" class="form-select form-select-solid me-5"
                                        data-control="select2" data-placeholder="select an option">
                                        <option value="">Pilih Bulan</option>

                                    </select>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn fw-bold"
                                        style="background-color: #5CA7DB; color: white;">Filter</button>
                                </div>
                            </div>
                        </form>
                        <script>
                            function getBulan(tahun) {
                                $.ajax({
                                    method: "POST",
                                    data: {
                                        tahun: tahun,
                                        _token: "{{ csrf_token() }}"
                                    },
                                    success: function(data) {
                                        var bulanTerpilih = '';
                                        var html = '';
                                        data.forEach(element => {
                                            const bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                                            ][element.month];
                                            if (bulanTerpilih != bulan) {
                                                bulanTerpilih = bulan;
                                                html += '<option value="' + element.month + '">' + bulan + '</option>';
                                            }
                                        });
                                        $('#bulan').html(html);
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="detail_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="title h2 mb-3">Judul</div>
                    <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis,
                        recusandae? Dignissimos enim accusantium dolores corporis aperiam voluptate a ea numquam, harum
                        distinctio exercitationem, fuga labore quae quibusdam recusandae reprehenderit inventore?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="delete_btn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="create_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Acara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-5" name="event_name" placeholder="Acara" /><input
                        type="text" class="form-control" name="event_description" placeholder="deskripsi" />
                    <div>
                        <select name="school_id" class="form-select form-select-solid me-5 mt-3" data-control="select2"
                            data-placeholder="Select an option" id="school">
                            <option value="">Sekolah (opsional)</option>
                            @foreach ($schools as $school)
                                <option {{ old('school_id') == $school->id ? 'selected' : '' }}
                                    value="{{ $school->id }}">
                                    {{ $school->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="submit_btn">Simpan</button>
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

            // var calendar = new FullCalendar.Calendar(calendarEl, {
            // plugins: ['interaction', 'dayGrid'],
            //     defaultDate: tahun ? tahun + '-' + (bulan ? (parseInt(bulan) > 9 ? bulan : '0' + parseInt(bulan)) : ('0' + (new Date().getMonth() + 1)).slice(-2)) : new Date().toISOString().split('T')[0],
            //     editable: true,
            //     eventLimit: true,

            // })

            // calendar.render();


            // Define variables
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid'],
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
                                description: description? description : "",
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
                url: "{{ route('admin.schedules.all') }}",
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
