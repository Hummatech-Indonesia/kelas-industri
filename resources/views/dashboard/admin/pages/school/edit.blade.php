@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Edit Sekolah
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman edit sekolah
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

        </div>
        <!--end::Actions-->
    </div>
    @if($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form action="{{ route('admin.schools.update', $school->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Sekolah

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                <a href="{{ route('admin.schools.index') }}" class="btn btn-light-primary font-weight-bolder me-2">

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

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="name" type="text" value="{{ $school->name }}" placeholder="SMK INDUSTRI 1" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama Kepala Sekolah</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="headmaster" type="text" value="{{ $school->headmaster }}" placeholder="Afrizal Himawan, S.Kom" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Alamat</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <textarea class="form-control form-control-solid form-control-lg" name="address" type="text" placeholder="Jl. Ramah Tamah Ngijo Karangploso Malang" required="">{{ $school->address }}</textarea>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Telepon</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="phone_number" type="text" value="{{ $school->phone_number }}" placeholder="083000000000" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="email" type="text" value="{{ $school->email }}" placeholder="smkindustri1@gmail.com" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <div class="fv-row" data-kt-password-meter="true">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Password Baru</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="position-relative">
                                                    <input class="form-control form-control-lg form-control-solid"
                                                        type="password" placeholder="password" name="password" autocomplete="off" />

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
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Konfirmasi Password</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="password_confirmation" type="password" value="" placeholder="password" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Logo</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="photo" type="file" value="" placeholder="password" >

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
