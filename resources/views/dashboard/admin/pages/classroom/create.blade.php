@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Kelas
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman tambah kelas
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
            <form action="{{ route('admin.classrooms.store', $school->id) }}" method="POST">
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header d-flex">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Kelas

                                </h3>

                            </div>

                            <div class="card-toolbar ml-auto">

                                <a href="{{ route('admin.schools.show', ['school' => $school->id]) }}"
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
                                            type="text" value="{{ old('name') }}" placeholder="X RPL 1" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Devisi</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="devision_id" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="Select an option">
                                            @foreach ($devisions as $devision)
                                                <option {{ old('devision_id') == $devision->id ? 'selected' : '' }}
                                                    value="{{ $devision->id }}">
                                                    {{ $devision->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Angkatan</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="generation_id" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="Select an option">
                                            @foreach ($generations as $generation)
                                                <option {{ old('generation_id') == $generation->id ? 'selected' : '' }}
                                                    value="{{ $generation->id }}">
                                                    {{ $generation->generation . ' - ' . $generation->schoolYear->school_year }}
                                                </option>
                                            @endforeach
                                        </select>

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
