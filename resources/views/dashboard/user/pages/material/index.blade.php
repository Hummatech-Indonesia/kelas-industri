@php
    use App\Enums\MaterialExamTypeEnum;
use Carbon\Carbon; @endphp
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
                                    Materi
                                </h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="#" class="text-muted text-hover-primary">
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
                            <div class="d-flex justify-content-end">
                                <div class="d-flex align-items-center">
                                    @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                        <form class="me-3"
                                            action="{{ route('certifyCompetenceTest', ['classroom' => $classroom->id]) }}"
                                            method="get">
                                            <button class="btn btn-primary h-40px fs-7 fw-bold">
                                                Download Sertifikat Uji Kompetensi
                                            </button>
                                        </form>
                                    @endif

                                    <a href="{{ route('common.classrooms') }}"
                                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                        <i class="bi bi-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <!--end::Actions-->
                            <div class="alert alert-warning d-flex align-items-center p-5 w-100 mt-5">
                                <!--begin::Icon-->
                                <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                                    <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg width="40"
                                            height="40" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                fill="currentColor"></rect>
                                            <rect x="11" y="14" width="7" height="2" rx="1"
                                                transform="rotate(-90 11 14)" fill="currentColor"></rect>
                                            <rect x="11" y="17" width="2" height="2" rx="1"
                                                transform="rotate(-90 11 17)" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                </span>
                                <!--end::Icon-->

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column">
                                    <!--begin::Title-->
                                    <h4 class="mb-1 text-warning">Informasi</h4>
                                    <!--end::Title-->
                                    <!--begin::Content-->
                                    <ul class="ps-4">
                                        <li>
                                            Kamu harus mengerjakan test terlebih dahulu sebelum membuka materi untuk pertama
                                            kali
                                        </li>
                                        <li>
                                            Jika kamu tidak bisa memilih materi yang ingin kamu pelajari kerjakanlah materi
                                            sebelumnya agar dapat membuka materi yang ingin anda pilih
                                        </li>
                                        <li>Selesaikan semua tugas dari materi sebelumnya agar dapat membuka materi
                                            selanjutnya.
                                        </li>
                                    </ul>
                                    <!--end::Content-->

                                </div>
                                <!--end::Wrapper-->
                            </div>
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->

                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">

                    <div class="row">
                        <form action="{{ route('common.materials', ['classroom' => $classroom]) }}">
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
                                                name="search" value="{{ $search }}" placeholder="cari">
                                        </div>
                                        <div class="col-lg-2 col-md-12 ms-3">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                            <a href="{{ route('common.materials', ['classroom' => $classroom]) }}"
                                                type="button" class="btn btn-light text-light" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Muat Ulang Data"><i class="fonticon-repeat"></i></a>
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
                        <div class="row">
                            @if (auth()->user()->roles->pluck('name')[0] == 'student')
                            {{-- @dd($materialInfos) --}}
                            @forelse ($materialInfos as $infos)
                                    @if ($infos['isFirst'] == true)
                                        <div class="col-xl-4 mb-5">

                                            <!--begin::Card-->

                                            <div class="card card-custom gutter-b card-stretch">

                                                <!--begin::Body-->

                                                <div class="card-body">

                                                    <!--begin::Section-->

                                                    <div class="d-flex align-items-center">

                                                        <!--begin::Pic-->

                                                        <div
                                                            class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">

                                                            <span
                                                                class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($infos['material']->title, 0, 1) }}</span>


                                                        </div>

                                                        <!--end::Pic-->

                                                        <!--begin::Info-->

                                                        <div class="d-flex flex-column me-auto">

                                                            <!--begin: Title-->

                                                            <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1">

                                                                {{ $infos['material']->title }}
                                                            </a>


                                                            <span class="text-muted font-weight-bold">
                                                                {{ $infos['material']->generation->generation }}
                                                            </span>

                                                            <!--end::Title-->

                                                        </div>

                                                        <!--end::Info-->


                                                    </div>

                                                    <!--end::Section-->

                                                    <!--begin::Content-->


                                                    <!--end::Content-->

                                                    <!--begin::Text-->
                                                    @if ($infos['material']->materialExam->studentMaterialExams->isEmpty())
                                                    <p class="mb-7 mt-5"
                                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 300px ;white-space: nowrap">

                                                        {{ $infos['material']->description }}
                                                    </p>
                                                    @else
                                                    <p class="mb-7 mt-5"
                                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 300px ;white-space: nowrap">

                                                        {{ $infos['material']->description }}
                                                    </p>
                                                    @endif

                                                    <!--end::Text-->


                                                </div>

                                                <!--end::Body-->

                                                <!--begin::Footer-->

                                                <div class="card-footer d-flex flex-row justify-content-between">

                                                    <div class="d-flex">

                                                        <div class="d-flex align-items-center me-5">
                                                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen028.svg-->
                                                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="7" y="2" width="14"
                                                                        height="16" rx="3"
                                                                        fill="currentColor" />
                                                                    <rect x="3" y="6" width="14" height="16"
                                                                        rx="3" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                class="fw-bold text-info ml-2">{{ count($infos['material']->subMaterials) }}
                                                                Bab</a>


                                                        </div>


                                                    </div>
                                                    @if (!$infos['material']->exam->studentMaterialExam)
                                                        <a href="{{ route('student.material-exam', ['materialExam' => $infos['material']->exam->id, 'type' => MaterialExamTypeEnum::PRETEST->value]) }}"
                                                            class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto"
                                                            id="start-test"
                                                            data-type="{{ MaterialExamTypeEnum::PRETEST->value }}">Mulai
                                                            Test</a>
                                                    @elseif ($infos['material']->exam->studentMaterialExam->finished_exam)
                                                        <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                            class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>
                                                    @else
                                                        <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                            class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">-</a>
                                                    @endif
                                                </div>

                                                <!--end::Footer-->

                                            </div>

                                            <!--end::Card-->

                                        </div>
                                    @elseif ($infos['isFirst'] == false)
                                        @if ($infos['complateExam'] != null)
                                            <div class="col-xl-4 mb-5">

                                                <!--begin::Card-->

                                                <div class="card card-custom gutter-b card-stretch">

                                                    <!--begin::Body-->

                                                    <div class="card-body">

                                                        <!--begin::Section-->

                                                        <div class="d-flex align-items-center">

                                                            <!--begin::Pic-->

                                                            <div
                                                                class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">

                                                                <span
                                                                    class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($infos['material']->title, 0, 1) }}</span>


                                                            </div>

                                                            <!--end::Pic-->

                                                            <!--begin::Info-->

                                                            <div class="d-flex flex-column me-auto">

                                                                <!--begin: Title-->

                                                                <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                    class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1">

                                                                    {{ $infos['material']->title }}
                                                                </a>


                                                                <span class="text-muted font-weight-bold">
                                                                    {{ $infos['material']->generation->generation }}
                                                                </span>

                                                                <!--end::Title-->

                                                            </div>

                                                            <!--end::Info-->


                                                        </div>

                                                        <!--end::Section-->

                                                        <!--begin::Content-->


                                                        <!--end::Content-->

                                                        <!--begin::Text-->

                                                        <p class="mb-7 mt-5"
                                                            style="text-overflow: ellipsis;overflow: hidden ;max-width: 300px ;white-space: nowrap">

                                                            {{ $infos['material']->description }}
                                                        </p>

                                                        <!--end::Text-->


                                                    </div>

                                                    <!--end::Body-->

                                                    <!--begin::Footer-->

                                                    <div class="card-footer d-flex flex-row justify-content-between">

                                                        <div class="d-flex">

                                                            <div class="d-flex align-items-center me-5">
                                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen028.svg-->
                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect opacity="0.5" x="7" y="2" width="14"
                                                                            height="16" rx="3"
                                                                            fill="currentColor" />
                                                                        <rect x="3" y="6" width="14" height="16"
                                                                            rx="3" fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                    class="fw-bold text-info ml-2">{{ count($infos['material']->subMaterials) }}
                                                                    Bab</a>


                                                            </div>


                                                        </div>
                                                        @if (!$infos['material']->exam->studentMaterialExam->finished_exam)
                                                            <a href="{{ route('student.material-exam', ['materialExam' => $infos['material']->exam->id, 'type' => MaterialExamTypeEnum::PRETEST->value]) }}"
                                                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto"
                                                                id="start-test"
                                                                data-type="{{ MaterialExamTypeEnum::PRETEST->value }}">Mulai
                                                                Test</a>
                                                        @elseif ($infos['material']->exam->studentMaterialExam->finished_exam)
                                                            <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>
                                                        @else
                                                            <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">-</a>
                                                        @endif
                                                    </div>

                                                    <!--end::Footer-->

                                                </div>

                                                <!--end::Card-->

                                            </div>
                                        @else
                                            <div class="col-xl-4 mb-5 card-disabled">

                                                <!--begin::Card-->

                                                <div class="card card-custom gutter-b card-stretch">

                                                    <!--begin::Body-->

                                                    <div class="card-body">

                                                        <!--begin::Section-->

                                                        <div class="d-flex align-items-center">

                                                            <!--begin::Pic-->

                                                            <div
                                                                class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">

                                                                <span
                                                                    class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($infos['material']->title, 0, 1) }}</span>


                                                            </div>

                                                            <!--end::Pic-->

                                                            <!--begin::Info-->

                                                            <div class="d-flex flex-column me-auto">

                                                                <!--begin: Title-->

                                                                <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                    class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1">

                                                                    {{ $infos['material']->title }}
                                                                </a>


                                                                <span class="text-muted font-weight-bold">
                                                                    {{ $infos['material']->generation->generation }}
                                                                </span>

                                                                <!--end::Title-->

                                                            </div>

                                                            <!--end::Info-->


                                                        </div>

                                                        <!--end::Section-->

                                                        <!--begin::Content-->


                                                        <!--end::Content-->

                                                        <!--begin::Text-->

                                                        <p class="mb-7 mt-5"
                                                            style="text-overflow: ellipsis;overflow: hidden ;max-width: 300px ;white-space: nowrap">

                                                            {{ $infos['material']->description }}
                                                        </p>

                                                        <!--end::Text-->


                                                    </div>

                                                    <!--end::Body-->

                                                    <!--begin::Footer-->

                                                    <div class="card-footer d-flex flex-row justify-content-between">

                                                        <div class="d-flex">

                                                            <div class="d-flex align-items-center me-5">
                                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen028.svg-->
                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect opacity="0.5" x="7" y="2" width="14"
                                                                            height="16" rx="3"
                                                                            fill="currentColor" />
                                                                        <rect x="3" y="6" width="14" height="16"
                                                                            rx="3" fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                    class="fw-bold text-info ml-2">{{ count($infos['material']->subMaterials) }}
                                                                    Bab</a>


                                                            </div>


                                                        </div>
                                                        @if ($infos['material']->exam->studentMaterialExams->isEmpty())
                                                            <a disabled
                                                                href="{{ route('student.material-exam', ['materialExam' => $infos['material']->exam->id, 'type' => MaterialExamTypeEnum::PRETEST->value]) }}"
                                                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto"
                                                                id="start-test"
                                                                data-type="{{ MaterialExamTypeEnum::PRETEST->value }}">Mulai
                                                                Test</a>
                                                        @elseif ($infos['material']->exam->studentMaterialExams->where('student_id', auth()->user()->id)->where('type', 'pre_test')->first())
                                                            <a disabled
                                                                href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>
                                                        @else
                                                            <a disabled
                                                                href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $infos['material']->id]) }}"
                                                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">-</a>
                                                        @endif
                                                    </div>

                                                    <!--end::Footer-->

                                                </div>

                                                <!--end::Card-->

                                            </div>
                                        @endif
                                    @endif
                                @empty
                                    <x-empty-component title="materi" />
                                @endforelse
                            @else
                                @forelse($materials as $material)
                                    <div class="col-xl-4 mb-5">

                                        <!--begin::Card-->

                                        <div class="card card-custom gutter-b card-stretch">

                                            <!--begin::Body-->

                                            <div class="card-body">

                                                <!--begin::Section-->

                                                <div class="d-flex align-items-center">

                                                    <!--begin::Pic-->

                                                    <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">

                                                        <span
                                                            class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($material->title, 0, 1) }}</span>


                                                    </div>

                                                    <!--end::Pic-->

                                                    <!--begin::Info-->

                                                    <div class="d-flex flex-column me-auto">

                                                        <!--begin: Title-->

                                                        <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $material->id]) }}"
                                                            class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1">

                                                            {{ $material->title }}
                                                        </a>


                                                        <span class="text-muted font-weight-bold">
                                                            {{ $material->generation->generation }}
                                                        </span>

                                                        <!--end::Title-->

                                                    </div>

                                                    <!--end::Info-->


                                                </div>

                                                <!--end::Section-->

                                                <!--begin::Content-->


                                                <!--end::Content-->

                                                <!--begin::Text-->

                                                <p class="mb-7 mt-5"
                                                    style="text-overflow: ellipsis;overflow: hidden ;max-width: 300px ;white-space: nowrap">

                                                    {{ $material->description }}
                                                </p>

                                                <!--end::Text-->


                                            </div>

                                            <!--end::Body-->

                                            <!--begin::Footer-->

                                            <div class="card-footer d-flex flex-row justify-content-between">

                                                <div class="d-flex">

                                                    <div class="d-flex align-items-center me-5">
                                                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen028.svg-->
                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="7" y="2" width="14"
                                                                    height="16" rx="3" fill="currentColor" />
                                                                <rect x="3" y="6" width="14" height="16"
                                                                    rx="3" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $material->id]) }}"
                                                            class="fw-bold text-info ml-2">{{ count($material->subMaterials) }}
                                                            Bab</a>


                                                    </div>


                                                </div>

                                                <a href="{{ route('common.showMaterial', ['classroom' => $classroom->id, 'material' => $material->id]) }}"
                                                    class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>
                                            </div>

                                            <!--end::Footer-->

                                        </div>

                                        <!--end::Card-->

                                    </div>
                                @empty
                                    <x-empty-component title="materi" />
                                @endforelse
                            @endif
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

        .card-disabled {
            opacity: 0.5;
            /* Reduce opacity for disabled appearance */
            pointer-events: none;
            /* Disable pointer events */
            /* Add any other styles to visually indicate the card is disabled */
        }
    </Style>
@endsection
