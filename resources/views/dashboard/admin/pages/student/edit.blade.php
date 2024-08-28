@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Edit Siswa
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman edit siswa
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
            <form action="{{ route('admin.students.update', [$student->id, $school->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Siswa

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                @if (auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.schools.show', request()->school->id) }}" @else <a
                                        href="{{ route('school.students.index') }}" @endif
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

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="name"
                                            type="text" value="{{ $student->name }}" placeholder="John Doe"
                                            required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="email"
                                            type="email" value="{{ $student->email }}" placeholder="johndoe@gmail.com"
                                            required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nomor Telepon</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="phone_number"
                                            type="text" value="{{ $student->phone_number }}" placeholder="087xxxxxxxxx"
                                            required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Alamat</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <textarea class="form-control form-control-solid form-control-lg" name="address" type="text"
                                            placeholder="Jl. Soekarno Hatta No 9" required="">{{ $student->address }}</textarea>

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
