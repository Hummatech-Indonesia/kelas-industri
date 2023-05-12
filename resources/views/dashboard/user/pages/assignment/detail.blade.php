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
                                    Tugas
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
                                        Utilities </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        Search </li>
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
                    @if ($errors->any())
                        <x-errors-component />
                    @endif
                    <div class="row">

                        <form
                            action="{{ route('student.storeassignment', ['classroom' => $classroom, 'submaterial' => $subMaterial]) }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="col-12">

                                <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">

                                <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                                    <div class="card-header" style="">

                                        <div class="card-title">

                                            <h3 class="card-label">

                                                Silakan Isi Tugas

                                            </h3>

                                        </div>

                                        <div class="card-toolbar">

                                            <a href="{{ url()->previous() }}"
                                                class="btn btn-light-primary font-weight-bolder me-2">

                                                <i class="ki ki-long-arrow-back icon-sm"></i>

                                                Kembali

                                            </a>

                                            <div class="btn-group">

                                                <button type="submit" class="btn btn-primary font-weight-bolder">

                                                    <i class="ki ki-check icon-sm"></i>

                                                    Simpan

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-body">

                                        <div class="row">


                                            <div class="form-group row mb-3">

                                                <label class="col-xl-3 col-lg-3 col-form-label">File Tugas : </label>

                                                <div class="col-lg-9 col-xl-9">

                                                    <input class="form-control form-control-solid form-control-lg"
                                                        name="file" type="file" value="" placeholder="password"
                                                        required="">

                                                </div>

                                            </div>
                                            @if ($submitAssignment)
                                                <div class="form-group row mb-3">

                                                    <label class="col-xl-3 col-lg-3 col-form-label"></label>

                                                    <div class="col-lg-9 col-xl-9">

                                                        <a href="{{ asset($submitAssignment->file) }}" class="btn btn-success btn-sm mt-2"><i
                                                class="fas fa-file-excel"></i>File tugas yang sudah anda kirim</a>

                                                    </div>

                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </form>
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
