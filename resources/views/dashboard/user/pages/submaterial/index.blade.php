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
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    {{ $material->title }}
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        {{ count($material->subMaterials) }} Bab
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <a href="{{ url()->previous() }}"
                                    class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
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
                        <form action="{{route('common.showMaterial',['material' => $material, 'classroom' => $classroom])}}">
                            <!--begin::Card-->
                            <div class="card mb-7">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Compact form-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Input group-->
                                        <div class="position-relative col-10">
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
                                                   name="search" value="{{$search}}" placeholder="Cari">
                                        </div>
                                        <div class="col-lg-2 col-md-12 ms-3">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                            <a href="{{route('common.showMaterial',['material' => $material, 'classroom' => $classroom])}}" type="button"
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
                    </div>


                    <div class="row">
                        @forelse($subMaterials as $subMaterial)
                            <div class="col-xl-4 mb-3">

                                <!--begin::Card-->

                                <div class="card card-custom gutter-b card-stretch">

                                    <!--begin::Body-->

                                    <div class="card-body">

                                        <!--begin::Section-->

                                        <div class="d-flex align-items-center">

                                            <!--begin::Pic-->

                                            <div class="flex-shrink-0 mr-4 symbol symbol-65 symbol-circle me-5">

                                                <span
                                                    class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($subMaterial->title, 0, 1) }}</span>


                                            </div>

                                            <!--end::Pic-->

                                            <!--begin::Info-->

                                            <div class="d-flex flex-column me-auto">

                                                <!--begin: Title-->

                                                <a href="https://class.hummasoft.com/siswa/materi/11/4"
                                                   class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1">

                                                    {{ $subMaterial->title }}
                                                </a>


                                                <span class="text-muted font-weight-bold">

                                                    {{ $material->title }}
                                                </span>

                                                <!--end::Title-->

                                            </div>

                                            <!--end::Info-->

                                        </div>

                                        <!--end::Section-->

                                        <!--begin::Content-->


                                        <!--end::Content-->

                                        <!--begin::Text-->

                                        <p class="mb-7 mt-5" style="text-overflow: ellipsis;overflow: hidden ;max-width: 300px ;white-space: nowrap">

                                            {{ $subMaterial->description }}
                                        </p>

                                        <!--end::Text-->


                                    </div>

                                    <!--end::Body-->

                                    <!--begin::Footer-->

                                    <div class="card-footer d-flex flex-row justify-content-between">

                                        <div class="d-flex">

                                            <div class="d-flex align-items-center me-5">
                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen028.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24"
                                                                                                        height="24"
                                                                                                        viewBox="0 0 24 24"
                                                                                                        fill="none"
                                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="7" y="2" width="14"
                                                              height="16" rx="3" fill="currentColor"/>
                                                        <rect x="3" y="6" width="14" height="16"
                                                              rx="3" fill="currentColor"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <a href="https://class.hummasoft.com/siswa/materi/11/4"
                                                   class="fw-bold text-info ml-2">{{ count($subMaterial->assignments) }}
                                                    Tugas</a>


                                            </div>


                                        </div>

                                        <a href="{{ route('common.showSubMaterial', ['classroom' => $classroom->id, 'submaterial' => $subMaterial->id]) }}"
                                           class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>

                                    </div>

                                    <!--end::Footer-->

                                </div>

                                <!--end::Card-->

                            </div>
                        @empty
                            <x-empty-component title="bab"/>
                        @endforelse
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
