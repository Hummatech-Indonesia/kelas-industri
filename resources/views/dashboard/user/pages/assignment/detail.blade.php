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

                                            <div class="form-grup row mb-3">
                                                <div class="alert alert-warning d-flex align-items-center p-5">
                                                    <!--begin::Icon-->
                                                    <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                                                        <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3"
                                                                    d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                                    fill="currentColor"></path>
                                                                <path
                                                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <!--end::Icon-->

                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-column">
                                                        <!--begin::Title-->
                                                        <h4 class="mb-1 text-dark">Informasi</h4>
                                                        <!--end::Title-->
                                                        <!--begin::Content-->
                                                        <ul>
                                                            <li>Jika anda mengupload file tugas baru maka file tugas lama akan terhapus.
                                                            </li>
                                                            <li>File yang tersedia adalah filyang telah dikirim.</li>
                                                            <li>Jika file belum tersedia maka anda belum mengumpulkan tugas.</li>
                                                        </ul>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                            </div>

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

                                                        <a href="{{ asset($submitAssignment->file) }}" class="btn btn-danger btn-sm mt-2"><i
                                                class="fas fa-file-pdf"></i>File tugas yang sudah anda kirim</a>

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
