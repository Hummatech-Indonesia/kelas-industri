@extends('dashboard.user.layouts.app')

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
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Pengenalan HTML
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        5 Bab
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <a href="{{ url()->previous() }}" class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">

                    <div class="row">
                        <form action="#">
                            <!--begin::Card-->
                            <div class="card mb-7">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Compact form-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Input group-->
                                        <div class="position-relative col-12">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
</svg>
</span>
                                            <!--end::Svg Icon-->
                                            <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search">
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Compact form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </form>
                    </div>

                    <div class="row">
                        <div class="col-xl-4">

                            <!--begin::Card-->

                            <div class="card card-custom gutter-b card-stretch">

                                <!--begin::Body-->

                                <div class="card-body">

                                    <!--begin::Info-->

                                    <div class="d-flex align-items-center">

                                        <!--begin::Pic-->

                                        <div class="flex-shrink-0 mr-4 symbol symbol-80 symbol-circle symbol-danger me-3">

                                            <span class="font-size-h3 symbol-label font-weight-boldest">MA</span>

                                        </div>

                                        <!--end::Pic-->

                                        <!--begin::Info-->

                                        <div class="d-flex flex-column me-auto">

                                            <!--begin: Title-->

                                            <div class="d-flex flex-column mr-auto">

                                                <a href="https://class.hummasoft.com/siswa/materi/11/4/11" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">

                                                    Materi 1 - Berkenalan Dengan HTML
                                                </a>



                                            </div>

                                            <!--end::Title-->

                                        </div>

                                        <!--end::Info-->



                                    </div>

                                    <!--end::Info-->

                                    <!--begin::Description-->

                                    <div class="mb-10 mt-5 font-weight-bold ">

                                        Mengenal HTML Dasar
                                    </div>

                                    <!--end::Description-->



                                    <!--begin::Data-->

                                    <div class="d-flex flex-row justify-content-between mb-5">

                                        <div class="d-flex align-items-center">

                                            <span class="font-weight-bold mr-4">

                                                Tugas Selesai

                                            </span>

                                            <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">0</span>

                                        </div>

                                        <div class="d-flex align-items-center">

                                        <span class="font-weight-bold mr-4">

                                            Tugas Belum

                                        </span>

                                            <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">0</span>

                                        </div>

                                    </div>

                                    <!--end::Data-->

                                    <!--begin::Progress-->

                                    <div class="d-flex mb-5 align-items-center">

                                        <span class="d-block font-weight-bold me-5">Progress</span>

                                        <div class="d-flex flex-row-fluid align-items-center">

                                            <div class="progress progress-xs mt-2 mb-2 w-100">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            <span class="ml-3 font-weight-bolder">0%</span>

                                        </div>

                                    </div>

                                    <!--ebd::Progress-->

                                </div>

                                <!--end::Body-->



                                <!--begin::Footer-->

                                <div class="card-footer d-flex align-items-center">

                                    <a href="{{ route('student.submaterial-detail') }}" class="btn btn-danger btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>

                                </div>

                                <!--end::Footer-->

                            </div>

                            <!--end:: Card-->

                        </div>
                    </div>
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
                    <span class="text-muted fw-semibold me-1">{{ \Carbon\Carbon::now()->format('Y') }}©</span>
                    <a href="https://keenthemes.com/" target="_blank" class="text-gray-800 text-hover-primary">Kelas Industri</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item"><a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">Tentang Kami</a></li>

                    <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank" class="menu-link px-2">Syarat & Ketentuan</a></li>

                    <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Kebijakan Privasi</a></li>
                </ul>
                <!--end::Menu-->        </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
