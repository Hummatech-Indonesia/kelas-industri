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

                                <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder me-2">

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

                                    <input type="hidden" name="classroom_id" value="{{$classroom->id}}">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama Siswa</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="student_classroom_id" class="form-select form-select-solid me-5"
                                                data-control="select2" data-placeholder="Select an option">
                                            @foreach($students as $student)
                                                <option
                                                    {{ (old('student_classroom_id') == $student->id) ? 'selected' : '' }} value="{{ $student->id }}">{{ $student->studentSchool->student->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>

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

                                    <label class="col-xl-3 col-lg-3 col-form-label">Semester</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="semester" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="">
                                            <option value="ganjil">
                                                Ganjil
                                            </option>
                                            <option value="genap">
                                                Genap
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

                                @foreach ($classroom->devision->criterias()->where('is_default',0)->get() as $criteria)
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ $criteria->name }}</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="{{$criteria->id}}"
                                            type="number" value="{{ old($criteria->id) }}" placeholder="" required="">

                                    </div>

                                </div>
                                @endforeach
                                
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
