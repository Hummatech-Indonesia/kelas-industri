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
                    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Ujian
                                </h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="#" class="text-muted text-hover-primary">
                                            List Ujian Pada Kelas Yang Anda Ajar </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->


                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('common.classrooms') }}"
                                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                        <i class="bi bi-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
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
                        {{-- <form action="{{ route('common.materials', ['classroom' => $classroom]) }}"> --}}
                        <!--begin::Card-->
                        <div class="card mb-7">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Compact form-->
                                <div class="searching align-items-center">
                                    <!--begin::Input group-->
                                    <div class="position-relative col-lg-10 col-md-12">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span
                                            class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                    rx="1" transform="rotate(45 17.0365 15.1223)"
                                                    fill="currentColor"></rect>
                                                <path
                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" class="form-control form-control-solid ps-10" name="search"
                                            value="" placeholder="cari">
                                    </div>
                                    <div class="col-lg-2 col-md-12 ms-3">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                        {{-- <a href="{{ route('common.materials', ['classroom' => $classroom]) }}"
                                                type="button" class="btn btn-light text-light" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip" data-bs-title="Muat Ulang Data"><i
                                                    class="fonticon-repeat"></i></a> --}}
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Compact form-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        {{-- </form> --}}
                    </div>

                    <div class="row">
                        @forelse ($subMaterialExams as $subMaterialExam)
                            <div class="col-sm-6 col-xl-4">
                                <!--begin::Card-->
                                <div class="card h-100 ">
                                    <!--begin::Card header-->
                                    <div class="card-header flex-nowrap border-0 pt-9">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <!--begin::Icon-->
                                            <div class="symbol bg-primary symbol-45px w-45px me-3">
                                                <div class="p-3 text-white text-center">
                                                    {{ substr($subMaterialExam->title, 0, 1) }}
                                                </div>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-semibold text-hover-primary text-black m-0">
                                                {{ $subMaterialExam->title }}</a>
                                            <!--end::Title-->
                                        </div>

                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button
                                                class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary justify-content-end"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-overflow="true">
                                                <span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                            rx="4" fill="currentColor" />
                                                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3"
                                                            fill="currentColor" />
                                                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3"
                                                            fill="currentColor" />
                                                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                data-kt-menu="true" style="">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Ujian
                                                        Siswa
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('mentor.detailSubMaterialExam') }}"
                                                        class="menu-link px-3">
                                                        Detail Ujian
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('mentor.examSubMaterialAssessment') }}"
                                                        class="menu-link px-3">
                                                        Penilaian Soal Essay
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                            </div>


                                            <!--begin::Menu 2-->

                                            <!--end::Menu 2-->

                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                        <!--begin::Heading-->
                                        <div class="fs-4 fw-bold">
                                            <span class="text-black fw-semibold d-flex fs-6 mb-3">
                                                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 19C14.9706 19 19 14.9706 19 10C19 5.02944 14.9706 1 10 1C5.02944 1 1 5.02944 1 10C1 14.9706 5.02944 19 10 19Z"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 4.59961V9.99961L13.6 11.7996" stroke="black"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                (Mulai) {{ Carbon::parse($subMaterialExam->start_at)->isoFormat('dddd, D-M-Y') }}
                                            </span>
                                        </div>
                                        <div class="fs-4 fw-bold">
                                            <span class="text-black fw-semibold d-flex fs-6 mb-3">
                                                <svg width="20" height="20" class="me-2" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.0526 9.52632C18.0526 7.83997 17.5526 6.1915 16.6157 4.78935C15.6788 3.38721 14.3472 2.29437 12.7892 1.64903C11.2312 1.00369 9.51686 0.834845 7.86292 1.16383C6.20897 1.49282 4.68973 2.30488 3.4973 3.4973C2.30488 4.68973 1.49282 6.20897 1.16383 7.86292C0.834845 9.51686 1.00369 11.2312 1.64903 12.7892C2.29437 14.3472 3.38721 15.6788 4.78935 16.6157C6.1915 17.5526 7.83997 18.0526 9.52632 18.0526"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M9.52539 4.78906V9.5259L11.4201 11.4206M13.3149 13.3154H18.9991V18.9996H13.3149V13.3154Z"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                (Selesai) {{ Carbon::parse($subMaterialExam->start_at)->isoFormat('dddd, D-M-Y') }}

                                            </span>
                                        </div>
                                        <div class="fs-4 fw-bold">
                                            <span class="text-black fw-semibold d-flex fs-6 mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="22"
                                                    height="22" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M12 21.5c-1.35-.85-3.8-1.5-5.5-1.5c-1.65 0-3.35.3-4.75 1.05c-.1.05-.15.05-.25.05c-.25 0-.5-.25-.5-.5V6c.6-.45 1.25-.75 2-1c1.11-.35 2.33-.5 3.5-.5c1.95 0 4.05.4 5.5 1.5c1.45-1.1 3.55-1.5 5.5-1.5c1.17 0 2.39.15 3.5.5c.75.25 1.4.55 2 1v14.6c0 .25-.25.5-.5.5c-.1 0-.15 0-.25-.05c-1.4-.75-3.1-1.05-4.75-1.05c-1.7 0-4.15.65-5.5 1.5m-1-14c-1.36-.6-3.16-1-4.5-1c-1.2 0-2.4.15-3.5.5v11.5c1.1-.35 2.3-.5 3.5-.5c1.34 0 3.14.4 4.5 1zM13 19c1.36-.6 3.16-1 4.5-1c1.2 0 2.4.15 3.5.5V7c-1.1-.35-2.3-.5-3.5-.5c-1.34 0-3.14.4-4.5 1zm1-2.65c.96-.35 2.12-.52 3.5-.52c1.04 0 1.88.08 2.5.24v-1.5a13.9 13.9 0 0 0-6 .19zm0-2.66c.96-.35 2.12-.53 3.5-.53c1.04 0 1.88.08 2.5.24v-1.5c-.87-.16-1.71-.23-2.5-.23c-1.28 0-2.45.15-3.5.45zM14 11c.96-.33 2.12-.5 3.5-.5c.91 0 1.76.09 2.5.28V9.23c-.87-.15-1.71-.23-2.5-.23c-1.32 0-2.5.15-3.5.46z" />
                                                </svg>
                                                {{ $subMaterialExam->subMaterial->title }}
                                            </span>
                                        </div>
                                        <div class="fs-4 fw-semibold d-flex">
                                            <span class="text-black fw-semibold d-flex fs-6 mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M10.54 14.53L8.41 12.4l-1.06 1.06l3.18 3.18l6-6l-1.06-1.06zM12 20a7 7 0 0 1-7-7a7 7 0 0 1 7-7a7 7 0 0 1 7 7a7 7 0 0 1-7 7m0-16a9 9 0 0 0-9 9a9 9 0 0 0 9 9a9 9 0 0 0 9-9a9 9 0 0 0-9-9m-4.12-.61L6.6 1.86L2 5.71l1.29 1.53zM22 5.72l-4.6-3.86l-1.29 1.53l4.6 3.86z" />
                                                </svg>
                                                {{ $subMaterialExam->time }} Menit
                                            </span>
                                        </div>
                                        <div class="fs-4 fw-semibold d-flex">
                                            <span class="text-black fw-semibold d-flex fs-6 mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="24"
                                                    height="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M10 21H5c-1.11 0-2-.89-2-2V5c0-1.11.89-2 2-2h14c1.11 0 2 .89 2 2v5.33c-.3-.12-.63-.19-.96-.19c-.37 0-.72.08-1.04.23V5H5v14h5.11l-.11.11zM7 9h10V7H7zm0 8h5.11L14 15.12V15H7zm0-4h9.12l.88-.88V11H7zm14.7.58l-1.28-1.28a.55.55 0 0 0-.77 0l-1 1l2.05 2.05l1-1a.55.55 0 0 0 0-.77M12 22h2.06l6.05-6.07l-2.05-2.05L12 19.94z" />
                                                </svg>
                                                {{ $subMaterialExam->total_essay + $subMaterialExam->total_multiple_choice }} Soal
                                            </span>
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>

                        @empty
                            <x-empty-component title="ujian" />
                        @endforelse
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
                        <a href="#"class="text-gray-800 text-hover-primary">Kelas
                            Industri</a>
                    </div>
                    <!--end::Copyright-->

                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item"><a href="#" class="menu-link px-2">Tentang
                                Kami</a></li>

                        <li class="menu-item"><a href="#" class="menu-link px-2">Syarat & Ketentuan</a></li>

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
                .position-relative {
                    margin-bottom: 10px;
                }
            }

            @media (min-width:640px) {
                .searching {
                    display: flex;
                }
            }
        </Style>
    @endsection
