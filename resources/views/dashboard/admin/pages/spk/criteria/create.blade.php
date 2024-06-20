@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Kriteria
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Tambah Kriteria
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
            <div class="col-12">
                <form action="{{ route('admin.spk.criteria.store') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                            <div class="card-header" style="">

                                <div class="card-title">

                                    <h3 class="card-label">

                                        Silakan Isi Kriteria

                                    </h3>

                                </div>

                                <div class="card-toolbar">

                                    <a href="{{ route('admin.spk.criteria.index') }}"
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
                                                type="text" value="{{ old('name') }}"
                                                placeholder="Produktifitas" required>

                                        </div>

                                    </div>
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Tipe</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <select name="type" class="form-select form-select-solid me-5"
                                                data-control="select2" data-placeholder="-Pilih-" id="type">
                                                <option value="">-Pilih-</option>
                                                <option value="BENEFIT">BENEFIT</option>
                                                <option value="COST">COST</option>
                                            </select>

                                        </div>

                                    </div>
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Bobot</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <input class="form-control form-control-solid form-control-lg" name="weight"
                                                type="number" value="{{ old('weight') }}"
                                                placeholder="10" required>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                                <div class="card-body d-flex align-items">  
                                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                                        Total Bobot {{ $criterias->sum('weight') }} dari keseluruhan
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

