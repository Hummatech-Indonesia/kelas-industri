@php use Carbon\Carbon; @endphp
@extends('dashboard.user.layouts.app')

@section('css')
    <style>
        .carousel-indicators {
            align-items: center;
        }

        .carousel-indicators button {
            width: 10px !important;
            height: 10px !important;
            border-radius: 100%;
            background-color: rgba(255, 255, 255, 0.507) !important;
        }

        .carousel-indicators button.active {
            width: 15px !important;
            height: 15px !important;
            border-radius: 100%;
            background-color: white !important;
        }

        .carousel-item img {
            height: 300px;
            object-fit: cover;
            border-radius: 1rem !important;
        }

        .carousel-item .follow-event-btn {
            z-index: 100;
        }

        .carousel-item:after {
            position: absolute;
            content: "";
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(to bottom, rgba(255, 0, 0, 0), rgba(0, 0, 0, 0.65) 100%);
        }
    </style>
@endsection
@section('content')
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
                            <div class="page-title d-flex flex-column justify-content-start gap-1 me-3 row d-flex">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Beranda
                                </h1>

                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>Selamat Datang, {{ auth()->user()->name }} (@if (auth()->user()->roles->pluck('name')[0] == 'student')
                                    Siswa
                                @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                    Mentor
                                @else
                                    Guru
                                @endif)</h1>
                        </div>

                        @if (auth()->user()->roles->pluck('name')[0] != 'student')
                            <div class="col text-end">
                                <span class="fs-5 pe-4">Gaji Anda bulan ini</span>
                                <span class="fs-3">Rp. {{ $salary }}</span>
                            </div>
                        @endif
                    </div>
                    @if (auth()->user()->roles->pluck('name')[0] == 'student')
                        @if (count($events) > 0)
                            <div id="carouselExampleIndicators" class="carousel slide rounded my-5">
                                <div class="carousel-indicators">
                                    @foreach ($events as $index => $event)
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"
                                            aria-current="true" aria-label="Slide 1"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner rounded-3">
                                    @foreach ($events as $index => $event)
                                        <div class="carousel-item rounded-3 {{ $index == 0 ? 'active' : '' }}">

                                            <div class="bg-white w-290px h-100 position-relative"></div>

                                            <img src="{{ asset('storage/' . $event->photo) }}"
                                                class="d-block w-100 rounded-3" alt="...">


                                            <div class="carousel-caption position-absolute d-none mb-7 d-md-block"
                                                style="z-index: 10;">
                                                <h5>First slide label</h5>
                                                <p>Some representative placeholder content for the first slide.</p>
                                                @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                                    <a href="{{ route('student.events.show', $event->id) }}"
                                                        class="btn btn-primary follow-event-btn shadow-sm"
                                                        data-title="{{ $event->title }}" data-event="{{ $event->id }}"
                                                        style="right: -15%;">Selengkapnya</a>
                                                @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                    <a href="{{ route('teacher.events.show', $event->id) }}"
                                                        class="btn btn-primary follow-event-btn shadow-sm"
                                                        data-title="{{ $event->title }}" data-event="{{ $event->id }}"
                                                        style="right: -15%;">Selengkapnya</a>
                                                @endif
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        @endif
                    @endif
                    @if (auth()->user()->roles->pluck('name')[0] == 'student')
                        <div class="covercard row gap-2 mt-4">
                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">
                                    <span class="w-4 h-4 my-auto fs-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m19 2l-5 4.5v11l5-4.5V2M6.5 5C4.55 5 2.45 5.4 1 6.5v14.66c0 .25.25.5.5.5c.1 0 .15-.07.25-.07c1.35-.65 3.3-1.09 4.75-1.09c1.95 0 4.05.4 5.5 1.5c1.35-.85 3.8-1.5 5.5-1.5c1.65 0 3.35.31 4.75 1.06c.1.05.15.03.25.03c.25 0 .5-.25.5-.5V6.5c-.6-.45-1.25-.75-2-1V19c-1.1-.35-2.3-.5-3.5-.5c-1.7 0-4.15.65-5.5 1.5V6.5C10.55 5.4 8.45 5 6.5 5Z" />
                                        </svg>
                                    </span>

                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        Jumlah Tugas {{ $assignment }}
                                    </span>
                                </div>
                            </a>
                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">
                                    <span class="w-4 h-4 my-auto fs-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M20.5 11H19V7a2 2 0 0 0-2-2h-4V3.5A2.5 2.5 0 0 0 10.5 1A2.5 2.5 0 0 0 8 3.5V5H4a2 2 0 0 0-2 2v3.8h1.5c1.5 0 2.7 1.2 2.7 2.7c0 1.5-1.2 2.7-2.7 2.7H2V20a2 2 0 0 0 2 2h3.8v-1.5c0-1.5 1.2-2.7 2.7-2.7c1.5 0 2.7 1.2 2.7 2.7V22H17a2 2 0 0 0 2-2v-4h1.5a2.5 2.5 0 0 0 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5Z" />
                                        </svg>
                                    </span>

                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        Jumlah Tantangan {{ $challenge }}
                                    </span>
                                </div>
                            </a>
                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">
                                    <span class="w-4 h-4 my-auto fs-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m3 14l.5.07L8.07 9.5a1.95 1.95 0 0 1 .52-1.91c.78-.79 2.04-.79 2.82 0c.53.52.7 1.26.52 1.91l2.57 2.57l.5-.07c.18 0 .35 0 .5.07l3.57-3.57C19 8.35 19 8.18 19 8a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2c-.18 0-.35 0-.5-.07l-3.57 3.57c.07.15.07.32.07.5a2 2 0 0 1-2 2a2 2 0 0 1-2-2l.07-.5l-2.57-2.57c-.32.07-.68.07-1 0L4.93 15.5L5 16a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2Z" />
                                        </svg>
                                    </span>

                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        @if ($point)
                                            Jumlah Point {{ $point->point }}
                                        @else
                                            Jumlah Point 0
                                        @endif

                                    </span>
                                </div>
                            </a>
                        </div>
                        @if (!$schoolPayment)
                            <div class="covercard row gap-2 mt-4">
                                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                    <div class="card-body d-flex align-items">
                                        <span class="w-4 h-4 my-auto fs-1">
                                            <svg width="32" height="32" viewBox="0 0 37 38" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.5002 20.8629C16.8647 20.8629 15.2961 21.5126 14.1397 22.669C12.9832 23.8255 12.3335 25.394 12.3335 27.0295C12.3335 28.665 12.9832 30.2335 14.1397 31.39C15.2961 32.5465 16.8647 33.1962 18.5002 33.1962C20.1357 33.1962 21.7042 32.5465 22.8607 31.39C24.0171 30.2335 24.6668 28.665 24.6668 27.0295C24.6668 25.394 24.0171 23.8255 22.8607 22.669C21.7042 21.5126 20.1357 20.8629 18.5002 20.8629ZM15.8573 27.0295C15.8573 26.3286 16.1357 25.6564 16.6314 25.1607C17.127 24.6651 17.7992 24.3867 18.5002 24.3867C19.2011 24.3867 19.8733 24.6651 20.3689 25.1607C20.8646 25.6564 21.143 26.3286 21.143 27.0295C21.143 27.7304 20.8646 28.4027 20.3689 28.8983C19.8733 29.3939 19.2011 29.6724 18.5002 29.6724C17.7992 29.6724 17.127 29.3939 16.6314 28.8983C16.1357 28.4027 15.8573 27.7304 15.8573 27.0295Z"
                                                    fill="#009EF7" />
                                                <path
                                                    d="M28.2363 7.85281L22.6352 0L2.04029 16.4527L0.898571 16.4403V16.458H0V37.6008H37V16.458H35.305L31.9328 6.59305L28.2363 7.85281ZM31.5821 16.458H13.9138L27.0734 11.9721L29.755 11.1141L31.5821 16.458ZM24.7548 9.04033L11.1705 13.6706L21.9287 5.07605L24.7548 9.04033ZM3.52381 30.851V23.2043C4.26715 22.9409 4.94233 22.5149 5.50013 21.9574C6.05793 21.3999 6.48428 20.725 6.7481 19.9818H30.2519C30.5156 20.7252 30.9419 21.4005 31.4997 21.9583C32.0575 22.5161 32.7327 22.9423 33.4762 23.206V30.8527C32.7327 31.1164 32.0575 31.5427 31.4997 32.1005C30.9419 32.6583 30.5156 33.3335 30.2519 34.077H6.75162C6.48766 33.3329 6.06089 32.6571 5.50246 32.099C4.94404 31.5409 4.26804 31.1145 3.52381 30.851Z"
                                                    fill="#009EF7" />
                                            </svg>
                                        </span>

                                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                            Total Tanggungan Semester Ini
                                            <div>
                                                <span
                                                    class="text-primary fw-bolder fs-2">{{ 'Rp ' . number_format($totalPayment, 0, ',', '.') }}</span>
                                            </div>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <div class="row mt-5">
                            @if ($zoom)
                                <a href="{{ $zoom->link }}" target="blank"
                                    class="card hover-elevate-up col shadow-sm parent-hover">
                                    <div class="card-body d-flex align-items">
                                        <span class="w-4 h-4 my-auto fs-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M17 10.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.5l4 4v-11l-4 4Z" />
                                            </svg>
                                        </span>
                                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                            Zoom Yang Akan Datang : {{ $zoom->title }}
                                        </span>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="row mt-5">
                            <div class="card card-flush h-xl-100">
                                <!--begin::Heading-->
                                <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                                    style="background-image:url('{{ asset('app-assets/media/svg/shapes/wave-bg-purple.svg') }}"
                                    data-bs-theme="light">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column text-gray-700 fw-bolder pt-15">
                                        <span class="fw-bold fs-2x mb-3">Tugas dan Tantangan</span>

                                        <div class="fs-4">
                                            <span class="opacity-75">Kamu Memiliki</span>
                                        </div>
                                    </h3>
                                    <!--end::Title-->
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Heading-->

                                <!--begin::Body-->
                                <div class="card-body mt-n20">
                                    <!--begin::Stats-->
                                    <div class="mt-n20 position-relative">
                                        <!--begin::Row-->
                                        <div class="row g-3 g-lg-6">
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <!--begin::Items-->
                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-30px me-5 mb-8 text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M4 7v14h14v2H4c-1.1 0-2-.9-2-2V7h2m8.8 8.35l-3.3-3.3l1.4-1.4l1.9 1.9l4.3-4.3l1.4 1.4l-5.7 5.7M20 3c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H8c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h3.18C11.6 1.84 12.7 1 14 1c1.3 0 2.4.84 2.82 2H20m-6 0c-.55 0-1 .45-1 1s.45 1 1 1s1-.45 1-1s-.45-1-1-1m-4 4V5H8v12h12V5h-2v2h-8Z" />
                                                        </svg>
                                                    </div>
                                                    <!--end::Symbol-->

                                                    <!--begin::Stats-->
                                                    <div class="m-0">
                                                        <!--begin::Number-->
                                                        <span
                                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $sudah }}</span>
                                                        <!--end::Number-->

                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">Tugas Sudah
                                                            Dikerjakan</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <!--begin::Items-->
                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-30px me-5 mb-8 text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M21 11.11V5a2 2 0 0 0-2-2h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14a2 2 0 0 0 2 2h6.11c1.26 1.24 2.98 2 4.89 2c3.87 0 7-3.13 7-7c0-1.91-.76-3.63-2-4.89M12 3c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1M5 19V5h2v2h10V5h2v4.68c-.91-.43-1.92-.68-3-.68H7v2h4.1c-.6.57-1.06 1.25-1.42 2H7v2h2.08c-.05.33-.08.66-.08 1c0 1.08.25 2.09.68 3H5m11 2c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5m.5-4.75l2.86 1.69l-.75 1.22L15 17v-5h1.5v4.25Z" />
                                                        </svg>
                                                    </div>
                                                    <!--end::Symbol-->

                                                    <!--begin::Stats-->
                                                    <div class="m-0">
                                                        <!--begin::Number-->
                                                        <span
                                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $belum }}</span>
                                                        <!--end::Number-->

                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">Tugas Belum
                                                            Dikerjakan</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                            <!--end::Col-->
                                            <div class="col-4">
                                                <!--begin::Items-->
                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-30px me-5 mb-8 text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M17 7V5h2v10.8l2 2V5a2 2 0 0 0-2-2h-4.18C14.25 1.44 12.53.64 11 1.2c-.86.3-1.5.96-1.82 1.8H6.2l4 4H17m-5-4c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1m2.2 8l-2-2H17v2h-2.8M2.39 1.73L1.11 3L3 4.9V19a2 2 0 0 0 2 2h14.1l1.74 1.73l1.27-1.27L2.39 1.73M5 19V6.89L7.11 9H7v2h2.11l2 2H7v2h6.11l4 4H5Z" />
                                                        </svg>
                                                    </div>
                                                    <!--end::Symbol-->

                                                    <!--begin::Stats-->
                                                    <div class="m-0">
                                                        <!--begin::Number-->
                                                        <span
                                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $tidak }}</span>
                                                        <!--end::Number-->

                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">Tugas Yang Tidak
                                                            Dikerjakan</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <!--begin::Items-->
                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-30px me-5 mb-8 text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="m23.5 17l-5 5l-3.5-3.5l1.5-1.5l2 2l3.5-3.5l1.5 1.5m-3-6a2.5 2.5 0 0 1 2.5 2.5c0 .31-.06.61-.16.89C21.8 13.5 20.46 13 19 13c-3.31 0-6 2.69-6 6v.54c-.36-1.04-1.35-1.74-2.5-1.74c-1.5 0-2.7 1.2-2.7 2.7V22H4c-1.1 0-2-.9-2-2v-3.8h1.5c1.5 0 2.7-1.2 2.7-2.7S5 10.8 3.5 10.8H2V7a2 2 0 0 1 2-2h4V3.5C8 2.12 9.12.998 10.5.998S13 2.12 13 3.5V5h4a2 2 0 0 1 2 2v4h1.5" />
                                                        </svg>
                                                    </div>
                                                    <!--end::Symbol-->

                                                    <!--begin::Stats-->
                                                    <div class="m-0">
                                                        <!--begin::Number-->
                                                        <span
                                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $sudahChallenge }}</span>
                                                        <!--end::Number-->

                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">Challenge Sudah
                                                            Dikerjakan</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <!--begin::Items-->
                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-30px me-5 mb-8 text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M13.04 19.61a2.682 2.682 0 0 0-2.54-1.81c-1.5 0-2.7 1.2-2.7 2.7V22H4a2 2 0 0 1-2-2v-3.8h1.5c1.5 0 2.7-1.2 2.7-2.7S5 10.8 3.5 10.8H2V7c0-1.1.9-2 2-2h4V3.5a2.5 2.5 0 0 1 5 0V5h4a2 2 0 0 1 2 2v4h1.5a2.5 2.5 0 0 1 2.5 2.5c0 .32-.06.62-.17.89A5.991 5.991 0 0 0 19 13c-3.31 0-6 2.69-6 6c0 .2 0 .41.04.61M15 18v2h8v-2h-8Z" />
                                                        </svg>
                                                    </div>
                                                    <!--end::Symbol-->

                                                    <!--begin::Stats-->
                                                    <div class="m-0">
                                                        <!--begin::Number-->
                                                        <span
                                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $belumChallenge }}</span>
                                                        <!--end::Number-->

                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">Challenge Belum
                                                            Dikerjakan</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <!--begin::Items-->
                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-30px me-5 mb-8 text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M13.04 19.61a2.682 2.682 0 0 0-2.54-1.81c-1.5 0-2.7 1.2-2.7 2.7V22H4a2 2 0 0 1-2-2v-3.8h1.5c1.5 0 2.7-1.2 2.7-2.7S5 10.8 3.5 10.8H2V7c0-1.1.9-2 2-2h4V3.5a2.5 2.5 0 0 1 5 0V5h4a2 2 0 0 1 2 2v4h1.5a2.5 2.5 0 0 1 2.5 2.5c0 .32-.06.62-.17.89A5.991 5.991 0 0 0 19 13c-3.31 0-6 2.69-6 6c0 .2 0 .41.04.61m8.08-4.15L19 17.59l-2.12-2.13l-1.41 1.42L17.59 19l-2.12 2.12l1.41 1.42L19 20.41l2.12 2.13l1.42-1.42L20.41 19l2.13-2.12l-1.42-1.42Z" />
                                                        </svg>
                                                    </div>
                                                    <!--end::Symbol-->

                                                    <!--begin::Stats-->
                                                    <div class="m-0">
                                                        <!--begin::Number-->
                                                        <span
                                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $tidakChallenge }}</span>
                                                        <!--end::Number-->

                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">Challenge Yang
                                                            Tidak
                                                            Dikerjakan</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                        <div class="covercard row gap-2 mt-4">
                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">
                                    <span class="w-4 h-4 my-auto fs-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20v16M10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16c1.3 0 2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71Z" />
                                        </svg>
                                    </span>

                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        {{ $classroom }} Kelas Yang Anda Ajar
                                    </span>
                                </div>
                            </a>

                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">
                                    <span class="w-4 h-4 my-auto fs-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M18 22a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6v7L9.5 7.5L7 9V2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12Z" />
                                        </svg>
                                    </span>

                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        {{ $jurnal }} Jurnal Yang Anda Buat
                                    </span>
                                </div>
                            </a>
                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">
                                    <span class="w-4 h-4 my-auto fs-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M20.5 11H19V7a2 2 0 0 0-2-2h-4V3.5A2.5 2.5 0 0 0 10.5 1A2.5 2.5 0 0 0 8 3.5V5H4a2 2 0 0 0-2 2v3.8h1.5c1.5 0 2.7 1.2 2.7 2.7c0 1.5-1.2 2.7-2.7 2.7H2V20a2 2 0 0 0 2 2h3.8v-1.5c0-1.5 1.2-2.7 2.7-2.7c1.5 0 2.7 1.2 2.7 2.7V22H17a2 2 0 0 0 2-2v-4h1.5a2.5 2.5 0 0 0 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5Z" />
                                        </svg>
                                    </span>

                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        {{ $challenge }} Tantangan Yang Anda Buat
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="row mt-5">
                            @if ($zoom)
                                <a href="{{ $zoom->link }}" target="blank"
                                    class="card hover-elevate-up col shadow-sm parent-hover">
                                    <div class="card-body d-flex align-items">
                                        <span class="w-4 h-4 my-auto fs-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M17 10.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.5l4 4v-11l-4 4Z" />
                                            </svg>
                                        </span>
                                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                            Zoom Yang Akan Datang : {{ $zoom->title }}
                                        </span>
                                    </div>
                                </a>
                            @endif
                        </div>

                        <div class="row mt-5 ">
                            <div class="col p-0">
                                <div class="card card-flush h-md-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Tantangan Sedang
                                                Berlangsung</span>
                                        </h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <a href="{{ route('teacher.challenges.index') }}"
                                                class="btn btn-sm btn-light">Lihat</a>
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        @if (count($lastestChallenge) > 0)
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                            <th class="p-0 pb-3 min-w-175px text-start">Nama</th>
                                                            <th class="p-0 pb-3 min-w-100px text-center">PENGUMPULAN</th>
                                                            <th class="p-0 pb-3 min-w-100px text-center">STATUS</th>
                                                            <th class="p-0 pb-3 min-w-175px text-center pe-12">DITUTUP</th>
                                                            <th class="p-0 pb-3 w-50px text-end">AKSI</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->

                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        @foreach ($lastestChallenge as $challenge)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="symbol symbol-50px me-3">
                                                                            <div
                                                                                class="symbol-label fs-2 fw-semibold bg-primary text-inverse-danger">
                                                                                {{ ucfirst(substr($challenge->title, 0, 1)) }}
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="d-flex justify-content-start flex-column">
                                                                            <a href="#"
                                                                                class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $challenge->title }}</a>
                                                                            {{-- <span
                                                                        class="text-gray-500 fw-semibold d-block fs-7">Jane
                                                                        Cooper</span> --}}
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center pe-0">
                                                                    <span
                                                                        class="text-gray-600 fw-bold fs-6">{{ $challenge->student_challenge_count }}</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (Carbon::parse($challenge->end_date)->locale('id')->isPast())
                                                                        <span
                                                                            class="badge py-3 px-4 fs-7 badge-light-danger">Ditutup</span>
                                                                    @elseif (!Carbon::parse($challenge->start_date)->locale('id') < now())
                                                                        <span
                                                                            class="badge py-3 px-4 fs-7 badge-light-success">Berlangsung</span>
                                                                    @else
                                                                        <span
                                                                            class="badge py-3 px-4 fs-7 badge-light-warning">Belum
                                                                            Dimulai</span>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center pe-12">
                                                                    <!--begin::Label-->
                                                                    <span class="badge badge-light-danger fs-base">
                                                                        <i
                                                                            class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span></i>
                                                                        {{ Carbon::parse($challenge->end_date)->locale('id')->isoFormat('DD-MM-Y HH:mm') }}
                                                                    </span>
                                                                    <!--end::Label-->

                                                                </td>

                                                                <td class="text-end">
                                                                    <a href="{{ route('teacher.challenges.show', $challenge->id) }}"
                                                                        class="btn btn-sm btn-icon btn-bg-light btn-active-color-warning w-30px h-30px">
                                                                        <i class="bi bi-eye"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>

                                            <!--end::Table-->
                                        @else
                                            <x-empty-component title="tantangan berlangsung" />
                                        @endif
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                            </div>
                        </div>

                        {{-- mentor page --}}
                    @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                        <div class="covercard row gap-2 mt-4">
                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">
                                    <span class="w-4 h-4 my-auto fs-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20v16M10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16c1.3 0 2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71Z" />
                                        </svg>
                                    </span>

                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        {{ $classroom }} Kelas Yang Anda Ajar
                                    </span>
                                </div>
                            </a>

                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">
                                    <span class="w-4 h-4 my-auto fs-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M18 22a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6v7L9.5 7.5L7 9V2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12Z" />
                                        </svg>
                                    </span>

                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        {{ $jurnal }} Jurnal Yang Anda Buat
                                    </span>
                                </div>
                            </a>
                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">
                                    <span class="w-4 h-4 my-auto fs-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M20.5 11H19V7a2 2 0 0 0-2-2h-4V3.5A2.5 2.5 0 0 0 10.5 1A2.5 2.5 0 0 0 8 3.5V5H4a2 2 0 0 0-2 2v3.8h1.5c1.5 0 2.7 1.2 2.7 2.7c0 1.5-1.2 2.7-2.7 2.7H2V20a2 2 0 0 0 2 2h3.8v-1.5c0-1.5 1.2-2.7 2.7-2.7c1.5 0 2.7 1.2 2.7 2.7V22H17a2 2 0 0 0 2-2v-4h1.5a2.5 2.5 0 0 0 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5Z" />
                                        </svg>
                                    </span>

                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        {{ $challenge }} Tantangan Yang Anda Buat
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="row mt-5">
                            @if ($zoom)
                                <a href="{{ $zoom->link }}" target="blank"
                                    class="card hover-elevate-up col shadow-sm parent-hover">
                                    <div class="card-body d-flex align-items">
                                        <span class="w-4 h-4 my-auto fs-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M17 10.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.5l4 4v-11l-4 4Z" />
                                            </svg>
                                        </span>
                                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                            Zoom Yang Akan Datang : {{ $zoom->title }}
                                        </span>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="row mt-5 ">
                            <div class="col col-md-4 ps-0">
                                <div class="card h-xl-100">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-900">Jadwal zoom presentasi
                                                project</span>
                                        </h3>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="card-body pt-6 mt-7">
                                        @if (count($presentationZoom) > 0)
                                            @foreach ($presentationZoom as $presentation)
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-4">
                                                        <div
                                                            class="symbol-label fs-2 fw-semibold bg-primary text-inverse-danger p-6">
                                                            Z
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->

                                                    <!--begin::Section-->
                                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                        <!--begin:Author-->
                                                        <div class="flex-grow-1 me-2">
                                                            <span href="/metronic8/demo1/pages/user-profile/overview.html"
                                                                class="text-gray-800 fs-5 fw-bold">{{ $presentation->name }}</span>
                                                            <span
                                                                class="text-muted fw-semibold d-block fs-7">{{ $presentation->date }}</span>
                                                        </div>
                                                        <!--end:Author-->

                                                        <!--begin::Actions-->
                                                        <a href="https://us05web.zoom.us/j/89475402083?pwd=qpM8RxdJN7ZYTqZy9btmRWLvoGsLoC.1 "
                                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                            <i class="bi bi-arrow-right-short fs-1"></i>
                                                        </a>
                                                        <!--begin::Actions-->
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Item-->

                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed my-4"></div>
                                                <!--end::Separator-->
                                            @endforeach
                                        @else
                                            <x-empty-component title="jadwal zoom" />
                                        @endif

                                    </div>
                                    <!--end::Body-->
                                </div>
                            </div>
                            <div class="col col-md-8 pe-0">
                                <div class="card card-flush h-md-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Tantangan Sedang
                                                Berlangsung</span>
                                        </h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <a href="{{ route('teacher.challenges.index') }}"
                                                class="btn btn-sm btn-light">Lihat</a>
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        @if (count($lastestChallenge) > 0)
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                            <th class="p-0 pb-3 min-w-175px text-start">Nama</th>
                                                            <th class="p-0 pb-3 min-w-100px text-center">PENGUMPULAN</th>
                                                            <th class="p-0 pb-3 min-w-100px text-center">STATUS</th>
                                                            <th class="p-0 pb-3 min-w-175px text-center pe-12">DITUTUP</th>
                                                            <th class="p-0 pb-3 w-50px text-end">AKSI</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->

                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        @foreach ($lastestChallenge as $challenge)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="symbol symbol-50px me-3">
                                                                            <div
                                                                                class="symbol-label fs-2 fw-semibold bg-primary text-inverse-danger">
                                                                                {{ ucfirst(substr($challenge->title, 0, 1)) }}
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="d-flex justify-content-start flex-column">
                                                                            <a href="#"
                                                                                class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $challenge->title }}</a>
                                                                            {{-- <span
                                                                        class="text-gray-500 fw-semibold d-block fs-7">Jane
                                                                        Cooper</span> --}}
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center pe-0">
                                                                    <span
                                                                        class="text-gray-600 fw-bold fs-6">{{ $challenge->student_challenge_count }}</span>
                                                                </td>

                                                                <td class="text-center">
                                                                    {{-- @if (Carbon::parse($challenge->end_date)->locale('id') < now())
                                                                        <span
                                                                            class="badge py-3 px-4 fs-7 badge-light-danger">Ditutup</span>
                                                                    @elseif (!Carbon::parse($challenge->start_date)->locale('id') < now())
                                                                        <span
                                                                            class="badge py-3 px-4 fs-7 badge-light-success">Berlangsung</span>
                                                                            @else
                                                                            <span
                                                                            class="badge py-3 px-4 fs-7 badge-light-warning">Belum
                                                                            Dimulai</span>
                                                                            @endif --}}
                                                                    <span
                                                                        class="badge py-3 px-4 fs-7 badge-light-success">Berlangsung</span>
                                                                </td>

                                                                <td class="text-center pe-12">
                                                                    <!--begin::Label-->
                                                                    <span class="badge badge-light-danger fs-base">
                                                                        <i
                                                                            class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span></i>
                                                                        {{ Carbon::parse($challenge->end_date)->locale('id')->isoFormat('DD-MM-Y HH:mm') }}
                                                                    </span>
                                                                    <!--end::Label-->

                                                                </td>

                                                                <td class="text-end">
                                                                    <a href="{{ route('mentor.challenges.show', $challenge->id) }}"
                                                                        class="btn btn-sm btn-icon btn-bg-light btn-active-color-warning w-30px h-30px">
                                                                        <i class="bi bi-eye"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>

                                            <!--end::Table-->
                                        @else
                                            <x-empty-component title="tantangan berlangsung" />
                                        @endif
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                            </div>
                        </div>
                    @endif



                </div>

                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->


        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer ">
            <!--begin::Footer container-->
            <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">{{ Carbon::now()->format('Y') }}©</span>
                    <a href="#" class="text-gray-800 text-hover-primary">Kelas
                        Industri</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item"><a href="#" class="menu-link px-2">Tentang
                            Kami</a></li>

                    <li class="menu-item"><a href="#" class="menu-link px-2">Syarat
                            & Ketentuan</a></li>

                    <li class="menu-item"><a href="#" class="menu-link px-2">Kebijakan Privasi</a></li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
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
        var options = {
            series: [44, 55, 41, 17, 15],
            chart: {
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#kt_attendance"), options);
        chart.render();
    </script>
@endsection
