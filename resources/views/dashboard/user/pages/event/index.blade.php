@php
    use Carbon\Carbon;
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
@endphp
@extends('dashboard.user.layouts.app')
@section('css')
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
                                    Tantangan
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <p class="fw-semibold fs-7 my-0 text-muted">List
                                    tantangan {{ auth()->user()->name }}</p>
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
                    <div class="col-12 mt-5">
                        <div class="row g-2">
                            @forelse ($events as $event)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card p-3 shadow">
                                        <img src="{{ asset("storage/$event->thumnail") }}" alt="Slider Image"
                                            class="img-fluid rounded">
                                        <div class="d-flex gap-2 ms-2 align-items-center my-2">
                                            <img alt="Logo"
                                                src="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}"
                                                class="h-30px" />
                                            <div class="text-primary h6 m-0">
                                                KELAS INDUSTRI HUMMATECH
                                            </div>
                                        </div>
                                        <div class="ms-1">
                                            <div class="d-flex justify-content-between  mt-3 mb-2">
                                                <a href="{{ route('student.events.show', $event->id) }}"
                                                    class="text-hover-primary fw-bolder h6 mb-2">{{ $event->title }}
                                                </a>
                                                <div class="badge badge-light-primary">Diikuti</div>
                                            </div>
                                            <p class="short-description">{{ $event->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <x-empty-component title="Event" />
                            @endif
                        </div>
                    </div>
                    <div class="col mt-5">
                        {{ $events->links('pagination::bootstrap-5') }}
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
