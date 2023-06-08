@php use Carbon\Carbon; @endphp
@extends('dashboard.user.layouts.app')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">


            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-8 ">

                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container"
                         class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Beranda
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="../../index-2.html" class="text-muted text-hover-primary">
                                            Home </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        Utilities
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        Search
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->        </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Selamat Datang, {{ auth()->user()->name }}
                                ({{ auth()->user()->roles->pluck('name')[0] }}
                                )</h1>
                        </div>
                    </div>
                    @if (auth()->user()->roles->pluck('name')[0] == 'student')
                    <div class="row gap-2 mt-4">
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m19 2l-5 4.5v11l5-4.5V2M6.5 5C4.55 5 2.45 5.4 1 6.5v14.66c0 .25.25.5.5.5c.1 0 .15-.07.25-.07c1.35-.65 3.3-1.09 4.75-1.09c1.95 0 4.05.4 5.5 1.5c1.35-.85 3.8-1.5 5.5-1.5c1.65 0 3.35.31 4.75 1.06c.1.05.15.03.25.03c.25 0 .5-.25.5-.5V6.5c-.6-.45-1.25-.75-2-1V19c-1.1-.35-2.3-.5-3.5-.5c-1.7 0-4.15.65-5.5 1.5V6.5C10.55 5.4 8.45 5 6.5 5Z"/>
                                    </svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    Jumlah Tugas {{$assignment}}
                                </span>
                            </div>
                        </a>
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M20.5 11H19V7a2 2 0 0 0-2-2h-4V3.5A2.5 2.5 0 0 0 10.5 1A2.5 2.5 0 0 0 8 3.5V5H4a2 2 0 0 0-2 2v3.8h1.5c1.5 0 2.7 1.2 2.7 2.7c0 1.5-1.2 2.7-2.7 2.7H2V20a2 2 0 0 0 2 2h3.8v-1.5c0-1.5 1.2-2.7 2.7-2.7c1.5 0 2.7 1.2 2.7 2.7V22H17a2 2 0 0 0 2-2v-4h1.5a2.5 2.5 0 0 0 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    Jumlah Tantangan {{$challenge}}
                                </span>
                            </div>
                        </a>
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M9 3v15h3V3H9m3 2l4 13l3-1l-4-13l-3 1M5 5v13h3V5H5M3 19v2h18v-2H3Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    Jumlah Materi {{$material}}
                                </span>
                            </div>
                        </a>
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m3 14l.5.07L8.07 9.5a1.95 1.95 0 0 1 .52-1.91c.78-.79 2.04-.79 2.82 0c.53.52.7 1.26.52 1.91l2.57 2.57l.5-.07c.18 0 .35 0 .5.07l3.57-3.57C19 8.35 19 8.18 19 8a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2c-.18 0-.35 0-.5-.07l-3.57 3.57c.07.15.07.32.07.5a2 2 0 0 1-2 2a2 2 0 0 1-2-2l.07-.5l-2.57-2.57c-.32.07-.68.07-1 0L4.93 15.5L5 16a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    Jumlah Point {{$point->point}}
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="row mt-5">
                        <a href="{{$zoom->link}}" target="blank" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M17 10.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.5l4 4v-11l-4 4Z"/></svg>
                                </span>
                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    Zoom Yang Akan Datang : {{$zoom->title}}
                                </span>

                            </div>
                        </a>
                    </div>
                    @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                    <div class="row gap-2 mt-4">
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20v16M10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16c1.3 0 2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    {{$classroom}} Kelas Yang Anda Ajar
                                </span>
                            </div>
                        </a>

                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M9 3v15h3V3H9m3 2l4 13l3-1l-4-13l-3 1M5 5v13h3V5H5M3 19v2h18v-2H3Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    Jumlah Materi {{$material}}
                                </span>
                            </div>
                        </a>
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M18 22a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6v7L9.5 7.5L7 9V2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    {{$jurnal}} Jurnal Yang Anda Buat
                                </span>
                            </div>
                        </a>
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M20.5 11H19V7a2 2 0 0 0-2-2h-4V3.5A2.5 2.5 0 0 0 10.5 1A2.5 2.5 0 0 0 8 3.5V5H4a2 2 0 0 0-2 2v3.8h1.5c1.5 0 2.7 1.2 2.7 2.7c0 1.5-1.2 2.7-2.7 2.7H2V20a2 2 0 0 0 2 2h3.8v-1.5c0-1.5 1.2-2.7 2.7-2.7c1.5 0 2.7 1.2 2.7 2.7V22H17a2 2 0 0 0 2-2v-4h1.5a2.5 2.5 0 0 0 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    {{$challenge}} Tantangan Yang Anda Buat
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="row mt-5">
                        <a href="{{$zoom->link}}" target="blank" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M17 10.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.5l4 4v-11l-4 4Z"/></svg>
                                </span>
                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    Zoom Yang Akan Datang : {{$zoom->title}}
                                </span>
                            </div>
                        </a>
                </div>
                    @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                    <div class="row gap-2 mt-4">
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20v16M10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16c1.3 0 2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    {{$classroom}} Kelas Yang Anda Ajar
                                </span>
                            </div>
                        </a>

                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M9 3v15h3V3H9m3 2l4 13l3-1l-4-13l-3 1M5 5v13h3V5H5M3 19v2h18v-2H3Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    Jumlah Materi {{$material}}
                                </span>
                            </div>
                        </a>
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M18 22a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6v7L9.5 7.5L7 9V2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    {{$jurnal}} Jurnal Yang Anda Buat
                                </span>
                            </div>
                        </a>
                        <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M20.5 11H19V7a2 2 0 0 0-2-2h-4V3.5A2.5 2.5 0 0 0 10.5 1A2.5 2.5 0 0 0 8 3.5V5H4a2 2 0 0 0-2 2v3.8h1.5c1.5 0 2.7 1.2 2.7 2.7c0 1.5-1.2 2.7-2.7 2.7H2V20a2 2 0 0 0 2 2h3.8v-1.5c0-1.5 1.2-2.7 2.7-2.7c1.5 0 2.7 1.2 2.7 2.7V22H17a2 2 0 0 0 2-2v-4h1.5a2.5 2.5 0 0 0 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5Z"/></svg>
                                </span>

                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    {{$challenge}} Tantangan Yang Anda Buat
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="row mt-5">
                        <a href="{{$zoom->link}}" target="blank" class="card hover-elevate-up col shadow-sm parent-hover">
                            <div class="card-body d-flex align-items">
                                <span class="w-4 h-4 my-auto fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M17 10.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.5l4 4v-11l-4 4Z"/></svg>
                                </span>
                                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                    Zoom Yang Akan Datang : {{$zoom->title}}
                                </span>
                            </div>
                        </a>
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
                    <a href="https://keenthemes.com/" target="_blank" class="text-gray-800 text-hover-primary">Kelas
                        Industri</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item"><a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">Tentang
                            Kami</a></li>

                    <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank" class="menu-link px-2">Syarat
                            & Ketentuan</a></li>

                    <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank"
                                             class="menu-link px-2">Kebijakan Privasi</a></li>
                </ul>
                <!--end::Menu-->        </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
