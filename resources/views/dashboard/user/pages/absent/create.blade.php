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
                        <div id="kt_app_content_container" class="app-container  container-fluid ">
                            @if ($errors->any())
                                <x-errors-component />
                            @endif
                            <div class="row">
                                <form action="{{ route('mentor.attendance.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="col-12">
                                        <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                                            <div class="card-header" style="">

                                                <div class="card-title">

                                                    <h3 class="card-label">

                                                        Silakan Isi Data Absensi

                                                    </h3>

                                                </div>

                                                <div class="card-toolbar">
                                                    @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                        <a href="{{ route('teacher.challenges.index') }}"
                                                            class="btn btn-light-primary font-weight-bolder me-2">

                                                            <i class="ki ki-long-arrow-back icon-sm"></i>

                                                            Kembali

                                                        </a>
                                                    @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                        <a href="{{ route('mentor.attendance.index') }}"
                                                            class="btn btn-light-primary font-weight-bolder me-2">

                                                            <i class="ki ki-long-arrow-back icon-sm"></i>

                                                            Kembali

                                                        </a>
                                                    @endif

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

                                                        <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>

                                                        <div class="col-lg-9 col-xl-9">

                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="title" type="text" value="{{ old('title') }}"
                                                                placeholder="Masukkan Judul" required="">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
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
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
@endsection
