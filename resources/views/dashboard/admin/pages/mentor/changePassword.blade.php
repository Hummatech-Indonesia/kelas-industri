@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Ganti Password Mentor
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman ganti password mentor
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

        </div>
        <!--end::Actions-->
    </div>
    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form action="{{ route('admin.updatePasswordMentor', [$mentor->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Password Mentor

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                <a href="{{ route('admin.mentors.index') }}"
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
                                <div class="fv-row" data-kt-password-meter="true">
                                    <div class="form-group row mb-3">
                                        <label class="col-xl-2 col-lg-2 col-form-label">Password Baru</label>
                                        <div class="col-lg-10 col-xl-10">
                                            <div class="position-relative mb-3">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="password" placeholder="" name="password" autocomplete="off" />

                                                <!--begin::Visibility toggle-->
                                                <span
                                                    class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                    data-kt-password-meter-control="visibility">
                                                    <i class="fa-solid fa-eye-slash fs-3"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span></i>
                                                    <i class="fa-solid fa-eye d-none fs-3"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>

                                                </span>
                                                <!--end::Visibility toggle-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
