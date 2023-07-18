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
                                    Kelas
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
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">

                    <div class="row">
                        @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                        <form id="form-search" action="{{ route('common.classrooms') }}">
                            <!--begin::Card-->
                            <div class="card mb-7">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Compact form-->
                                    <div class="searching align-items-center">
                                        <!--begin::Input group-->
                                        <div class="position-relative col-lg-10 col-md-12 me-2">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span
                                                class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                        height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                        fill="currentColor"></rect>
                                                    <path
                                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" class="form-control form-control-solid ps-10"
                                                name="search" value="{{$search}}" placeholder="Search">
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                            <a href="{{ route('common.classrooms') }}" type="button"
                                                class="btn btn-light text-light"><i class="fonticon-repeat"></i></a>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Compact form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </form>
                        @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                        <form id="form-search" action="{{ route('common.classrooms') }}">
                            <!--begin::Card-->
                            <div class="card mb-7">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Compact form-->
                                    <div class="searching align-items-center">
                                        <!--begin::Input group-->
                                        <div class="position-relative col-lg-10 col-md-12 me-2">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span
                                                class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                        height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                        fill="currentColor"></rect>
                                                    <path
                                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" class="form-control form-control-solid ps-10"
                                                name="search" value="{{ $search }}" placeholder="Search">
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                            <a href="{{ route('common.classrooms') }}" type="button"
                                                class="btn btn-light text-light"><i class="fonticon-repeat"></i></a>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Compact form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </form>
                        @elseif (auth()->user()->roles->pluck('name')[0] == 'student')
                        <form id="form-search" action="{{ route('common.classrooms') }}">
                            <!--begin::Card-->
                            <div class="card mb-7">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Compact form-->
                                    <div class="searching align-items-center">
                                        <!--begin::Input group-->
                                        <div class="position-relative col-lg-10 col-md-12 me-2">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span
                                                class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                        height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                        fill="currentColor"></rect>
                                                    <path
                                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" class="form-control form-control-solid ps-10"
                                                name="search" value="{{ $search}}" placeholder="Search">
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                            <a href="{{ route('common.classrooms') }}" type="button"
                                                class="btn btn-light text-light"><i class="fonticon-repeat"></i></a>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Compact form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </form>
                        @endif
                    </div>

                    <div class="row">
                        @foreach ($classrooms as $classroom)
                            <div class="col-xl-4 mb-3">

                                <!--begin::Card-->

                                <div class="card card-custom gutter-b card-stretch">

                                    <!--begin::Body-->

                                    <div class="card-body">

                                        <!--begin::Section-->

                                        <div class="d-flex align-items-center">

                                            <!--begin::Pic-->

                                            <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">

                                                <span
                                                    class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($classroom->classroom->name, 0, 1) }}</span>


                                            </div>

                                            <!--end::Pic-->

                                            <!--begin::Info-->

                                            <div class="d-flex flex-column me-auto">

                                                <!--begin: Title-->

                                                <a href="https://class.hummasoft.com/siswa/materi/11/4"
                                                    class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1">

                                                    {{ $classroom->classroom->name }}
                                                </a>

                                                <span class="text-muted font-weight-bold">
                                                    {{ $classroom->classroom->generation->generation }}
                                                    ({{ $classroom->classroom->generation->schoolYear->school_year }})
                                                </span>
                                                <span class="text-muted font-weight-bold">
                                                    @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                        {{ $classroom->classroom->school->name }}
                                                    @endif
                                                </span>

                                                <!--end::Title-->

                                            </div>

                                            <!--end::Info-->
                                        </div>

                                        <!--end::Section-->

                                        <!--begin::Content-->


                                        <!--end::Content-->

                                        <!--begin::Text-->


                                        <!--end::Text-->


                                    </div>

                                    <!--end::Body-->

                                    <!--begin::Footer-->

                                    <div class="card-footer d-flex flex-row justify-content-between">

                                        <div class="d-flex">
                                            {{-- masih salah --}}
                                            <a href="{{ route('common.showClassrooms', $classroom->classroom->id)}}"
                                                class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>

                                        </div>

                                        <a href="{{ route('common.materials', $classroom->classroom->id) }}"
                                            class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">materi</a>

                                    </div>

                                    <!--end::Footer-->

                                </div>

                                <!--end::Card-->

                            </div>
                        @endforeach

                    </div>
                </div>
                <!--end::Content container-->
            </div>
            <div class="row">
                {{ $classrooms->appends(request()->query())->links() }}
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

                    <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank"
                            class="menu-link px-2">Syarat & Ketentuan</a></li>

                    <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank"
                            class="menu-link px-2">Kebijakan Privasi</a></li>
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
            @media (max-width:639px){
                .position-relative{
                    margin-bottom: 10px;
                }
            }
            @media (min-width:640px){
                .searching{
                    display: flex;
                }
            }
        </Style>
    @endsection
