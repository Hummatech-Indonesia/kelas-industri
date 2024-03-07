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
                Detail mentors
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Detail mentors {{ $mentors->name }}.
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
                            <div class="btn btn-filter me-1" style="background-color: #5CA7DB; color: white"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                data-bs-title="Lihat Detail">
                                Filter Tahun/Bulan
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div id='calendar'></div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="card p-4 ms-3 mt-18 shadow card-statistics">
                                    <h4 class="text-center mt-2">Rekap Absen</h4>
                                    <div class="d-flex flex-column justify-content-center mx-5 gap-3">
                                        <div class="row">
                                            <div class="card d-flex flex-row gap-6 mt-4 align-items-center p-3" style="background-color: #5CA7DB;">
                                                <div class="col-4">
                                                    <div class="card p-3 text-center" style="background-color: hsl(205, 100%, 94%); font-weight: 500">{{$attendancesCountMonth}}</div>
                                                </div>
                                                <div class="col-8" style="color: white; font-weight: 500">Januari 2024</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        @foreach ($attendances as $attendance)
                                            @if (!in_array(substr($attendance->created_at, 0, 4), $tahuns))
                                                <option value="{{ substr($attendance->created_at, 0, 4) }}"
                                                    @if (request('tahun') == substr($attendance->created_at, 0, 4)) selected @endif>
                                                    {{ substr($attendance->created_at, 0, 4) }}
                                                </option>
                                                @php
                                                    $tahuns[] = substr($attendance->created_at, 0, 4);
                                                @endphp
                                            @endif
                                        @endforeach
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
                                    url: "{{ route('administration.mentorMonth.show', $mentors->id) }}",
                                    method: "POST",
                                    data: {
                                        tahun: tahun,
                                        _token: "{{ csrf_token() }}"
                                    },
                                    success: function(data) {
                                        var bulanTerpilih = '';
                                        var html = '';
                                        data.forEach(element => {
                                            const date = element.created_at.split('-');
                                            const bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                                            ][parseInt(date[1])];
                                            if (bulanTerpilih != bulan) {
                                                bulanTerpilih = bulan;
                                                html += '<option value="' + date[1] + '">' + bulan + '</option>';
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

            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var tahun = urlParams.get('tahun');
            var bulan = urlParams.get('bulan');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid'],
                defaultDate: tahun ? tahun + '-' + (bulan ? bulan : new Date().getMonth() + 1) : new Date()
                    .toISOString().split('T')[0],
                editable: true,
                eventLimit: true,
                events: [
                    @foreach ($attendances as $attendance)
                        {
                            title: '{{ $attendance->title }}',
                            start: '{{ $attendance->created_at->format('Y-m-d') }}',
                        },
                    @endforeach
                ],
            })


            calendar.render();
        })
    </script>
    <script src="{{ asset('calendar-assets/js/main.js') }}"></script>
@endsection
