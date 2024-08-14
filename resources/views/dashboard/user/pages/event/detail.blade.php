@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.user.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">
    <style>
        /* .owl-carousel.owl-loaded.owl-drag {
            height: 150px !important;
            margin-bottom: 1rem;
        }

        .owl-stage-outer {
            height: 100%;
        } */
    </style>
@endsection
@section('content')
    @if ($errors->any())
        <x-errors-component />
    @endif
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
                                    {{-- Selamat datang, {{ auth()->user()->name }} --}}
                                    Detail Event
                                </h1>
                                <!--end::Title-->

                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('student.events.index') }}" class="text-muted text-hover-primary">
                                            Event </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('student.events.index') }}" class="text-muted text-hover-primary">
                                            {{ request()->event->title }} </a>
                                    </li>
                                    <!--end::Item-->

                                </ul>
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3 py-2 py-md-1">

                                <!--begin::Button-->
                                {{-- @dd($participant) --}}
                                @if ($participant && $participant['certificate'])
                                    <a href="{{ route('student.events.print-certify', ['event' => $event->id, 'participant' => $participant['following']->id]) }}"
                                        class="btn btn-primary btn-active-light-primary h-40px fs-7 fw-bold">Download
                                        Sertifikat
                                    </a>
                                @endif
                                <a href="{{ route('student.events.index') }}"
                                    class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </a>
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
                    <div class="card-body">
                        <!--begin::About-->
                        <div class="mb-5">
                            <!--begin::Wrapper-->
                            <div class="mb-5">
                                <!--begin::Overlay-->
                                <div class="overlay">
                                    <!--begin::Image-->
                                    <img class="w-100 h-500px card-rounded" src="{{ asset('storage/' . $event->photo) }}"
                                        alt="" style="">
                                    <!--end::Image-->

                                    <!--begin::Links-->

                                    <!--end::Links-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Description-->
                            <div class="fs-5 fw-semibold text-gray-600">

                                <h1 class="mb-4">{{ $event->title }}</h1>
                                <!--begin::Text-->
                                <div class="mb-8">
                                    {!! $event->description !!}
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::About-->

                        @if ($event->start_date <= Carbon::now())
                            <!--begin::Section-->
                            <div class="mb-5">
                                <!--begin::Top-->
                                <div class="text-center">
                                    <!--begin::Title-->
                                    <h4 class="fs-2hx text-gray-900 mb-5">Dokumentasi Event</h4>

                                </div>
                                <!--end::Top-->

                                <!--begin::Row-->
                                <div class="owl-carousel">
                                    @foreach ($event->documentations as $documentation)
                                        <div>
                                            <img src="{{ asset('storage/' . $documentation->media) }}" alt=""
                                                class="documentation_image col w-300px m-auto rounded"
                                                data-image="{{ asset('storage/' . $documentation->media) }}">
                                        </div>
                                    @endforeach
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Section-->
                        @endif
                        <!--begin::Team-->
                        <!--end::Team-->
                        <div>
                            <div class="row">
                                <div class="col">
                                    <p class="fw-bold fs-4">Acara</p>
                                </div>
                                <div class="col-11">: {{ $event->title }}</div>
                                <div class="col">
                                    <p class="fw-bold fs-4">Tanggal</p>
                                </div>
                                <div class="col-11">:
                                    {{ Carbon::parse($event->start_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                </div>
                                <div class="col">
                                    <p class="fw-bold fs-4">Waktu</p>
                                </div>
                                <div class="col-11">: {{ Carbon::parse($event->start_date)->format('H:m') }}</div>
                                <div class="col">
                                    <p class="fw-bold fs-4">Tempat</p>
                                </div>
                                <div class="col-11">: {{ $event->location }}</div>
                            </div>
                        </div>
                        {{-- @dd($event->start_date) --}}
                        @if ($participant && $participant['following'])
                            @if ($event->start_date < now())
                                <form action="{{ route('student.events.unfollow', $event->id) }}" method="POST"
                                    class="text-end pb-16" id="unfollow-form">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="btn btn-danger py-2" id="unfollow-btn">Batal
                                        Mengikuti</button>
                                </form>
                            @else
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-light-primary py-2">Telah Mengikuti</button>
                                </div>
                            @endif
                        @elseif($event->start_date < Carbon::now()->locale('id'))
                            <form action="{{ route('student.events.follow', $event->id) }}" method="POST"
                                class="text-end pb-16" id="follow-form">
                                @csrf
                                <button type="button" class="btn btn-primary py-2" id="follow-btn">Ikuti</button>
                            </form>
                        @else
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-light-warning py-2">Telah Dimulai</button>
                            </div>
                        @endif
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="show_image">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <img src="" alt="">
            </div>
        </div>
    </div>
    <x-delete-modal-component />
    @php
        $documentation_count = count($event->documentations);
    @endphp
@endsection
@section('script')
    <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: {{ $documentation_count < 2 ? $documentation_count : 3 }},
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                fixedWidth: 300,
                fixedHight: 100,
                autoWidth: false,
                center: true,
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete', function() {
            const url = "{{ route('admin.rollingMentor.deleteRollingMentor', ':id') }}".replace(':id', $(this)
                .data(
                    'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('#follow-btn').click(function(e) {
            Swal.fire({
                text: "Apakah anda ingin mengikuti event ini?",
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: 'Tidak',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then(function(params) {
                if (params.value) {
                    $('#follow-form').submit()
                }
            });
        })
        $('#unfollow-btn').click(function(e) {
            Swal.fire({
                text: "Apakah anda batal mengikuti event ini?",
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: 'Tidak',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then(function(params) {
                if (params.value) {
                    $('#unfollow-form').submit()
                }
            });
        })

        $(document).ready(function() {
            const datepicker = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"));
            datepicker.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
        })

        $('.documentation_image').click(function() {
            $('#show_image img').attr('src', $(this).data('image'))
            $('#show_image').modal('show')
        })
    </script>
@endsection
