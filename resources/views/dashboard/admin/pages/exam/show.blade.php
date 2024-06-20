@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Edit Ujian
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Edit Nilai Ujian
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
            <form action="{{ route('admin.exam.update' , $exam->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
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

                                <input type="hidden" name="student_classroom_id"
                                    value="{{ $exam->studentClassroom->id }}">

                                <input type="hidden" name="classroom_id" value="{{ $exam->studentClassroom->classroom_id}}">

                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Tipe Ujian</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="exam_type" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="">
                                            <option value="uts" {{ $exam->exam_type == 'uts' ? 'selected' : ''}}>
                                                UTS
                                            </option>
                                            <option value="uas" {{ $exam->exam_type == 'uas' ? 'selected' : ''}}>
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
                                            <option value="ganjil" {{ $exam->semester == 'ganjil' ? 'selected' : ''}}>
                                                Ganjil
                                            </option>
                                            <option value="genap" {{ $exam->semester == 'genap' ? 'selected' : ''}}>
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
                                            <option value="easy" {{ $exam->task_level == 'easy' ? 'selected' : ''}}>
                                                Easy
                                            </option>
                                            <option value="medium" {{ $exam->task_level == 'medium' ? 'selected' : ''}}>
                                                Medium
                                            </option>
                                            <option value="advance" {{ $exam->task_level == 'advance' ? 'selected' : ''}}>
                                                Advance
                                            </option>
                                        </select>

                                    </div>

                                </div>

                                @foreach ($exam->studentClassroom->classroom->devision->criterias()->where('is_default',0)->get() as $criteria)
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">{{ $criteria->name }}</label>

                                    <div class="col-lg-9 col-xl-9">
                                        @php
                                            $examCriteria = $exam->examCriterias()->where('criteria_id',$criteria->id)->first()
                                        @endphp
                                        <input class="form-control form-control-solid form-control-lg" name="{{$criteria->id}}"
                                            type="number" value="{{ $examCriteria->score}}" placeholder="" required="">

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
