@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Nilai Ujian
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman tambah nilai ujian
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
        @if ($errors->any())
            <x-errors-component />
        @endif
        <div class="row">
            <form action="{{ route('admin.exam.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Nilai Ujian

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                <a href="#" class="btn btn-light-primary font-weight-bolder me-2">

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

                                {{-- <input type="hidden" name="student_classroom_id"
                                    value="{{ $student->studentSchool->studentClassroom->id }}">

                                <input type="hidden" name="classroom_id" value="{{$student->studentSchool->studentClassroom->classroom_id}}"> --}}

                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Tipe Ujian</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="exam_type" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="">
                                            <option value="uts">
                                                UTS
                                            </option>
                                            <option value="uas">
                                                UAS
                                            </option>
                                        </select>

                                    </div>

                                </div>

                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Level Tugas</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="task_level" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="">
                                            <option value="easy">
                                                Easy
                                            </option>
                                            <option value="medium">
                                                Medium
                                            </option>
                                            <option value="advance">
                                                Advance
                                            </option>
                                        </select>

                                    </div>

                                </div>

                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Kompleksitas</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="complexity"
                                            type="number" value="{{ old('complexity') }}" placeholder="" required="">

                                    </div>

                                </div>

                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Kerapian Kode</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg"
                                            name="code_cleanliness" type="number" value="{{ old('code_cleanliness') }}"
                                            placeholder="" required="">

                                    </div>

                                </div>

                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Desain</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="design"
                                            type="number" value="{{ old('design') }}" placeholder="" required="">

                                    </div>

                                </div>

                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Presentasi</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="presentation"
                                            type="number" value="{{ old('presentation') }}" placeholder="" required="">

                                    </div>

                                </div>

                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Pemahaman</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="understanding"
                                            type="number" value="{{ old('understanding') }}" placeholder="" required="">

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
