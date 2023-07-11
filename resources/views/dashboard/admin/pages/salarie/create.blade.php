@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Bukti Gaji
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Bukti Gaji
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
        <x-errors-component/>
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form action="{{ route('admin.saleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Bukti Gaji

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                <a href="{{ route('admin.saleries.index') }}"
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

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama Mentor</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="user_id" class="form-select form-select-solid me-5"
                                                data-control="select2" data-placeholder="Select an option">
                                            @foreach($mentors as $mentor)
                                                <option
                                                    {{ (old('user_id') == $mentor->id) ? 'selected' : '' }} value="{{ $mentor->id }}">{{ $mentor->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Jumlah Gaji</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="salary_amount"
                                               type="number" value="{{ old('salary_amount') }}" placeholder="10000"
                                               required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Bulan</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="payday"
                                               type="date" value="{{ old('payday') }}" placeholder="johndoe@gmail.com"
                                               required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Bukti Gaji</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="photo"
                                               type="file" value="{{ old('photo') }}" placeholder="johndoe@gmail.com"
                                               required="">

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
