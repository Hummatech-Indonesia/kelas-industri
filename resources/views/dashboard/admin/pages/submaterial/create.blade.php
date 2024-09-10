@php
    use App\Enums\SubMaterialExamTypeEnum;
@endphp
@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Sub Materi
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman tambah submateri
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
            <form action="{{ route('admin.submaterials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    {{ $material->title }}

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                <a href="{{ route('admin.materials.show', $material->id) }}"
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
                                <input type="hidden" name="material_id" value="{{ $material->id }}">
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="title"
                                            type="text" value="{{ old('title') }}"
                                            placeholder="Konsep Algoritma Pemrograman" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Deskripsi</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <textarea class="form-control form-control-solid form-control-lg" rows="5" name="description" type="text"
                                            placeholder="deskripsi sub materi" required="">{{ old('description') }}</textarea>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">File Guru</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="teacher_file"
                                            type="file" value="" placeholder="password" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">File Siswa</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="student_file"
                                            type="file" value="" placeholder="password" required="">

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card card-custom card-sticky mt-5">
                        <div class="card-header">
                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Quiz Pada Submateri ini

                                </h3>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group row mb-3">
                                    <input type="hidden" name="type" value="{{ SubMaterialExamTypeEnum::QUIZ->value }}">
                                    <label class="required form-label @error('time') is-invalid @enderror mb-3">Waktu
                                        pengerjaan (Menit)</label>
                                    <input type="number" name="time" class="form-control form-control-solid mb-3" value="{{ old('time') }}"
                                        id="">
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-6">
                                        <label class="required form-label  mb-3">Bobot
                                            Nilai Pilihan Ganda</label>
                                        <input type="number" name="multiple_choice_value"
                                            class="form-control form-control-solid mb-3 @error('multiple_choice_value') is-invalid @enderror" value="{{ old('multiple_choice_value') }}"
                                            id="">
                                        @error('multiple_choice_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label
                                            class="required form-label @error('essay_value') is-invalid @enderror mb-3">Bobot
                                            Nilai Essay</label>
                                        <input type="number" name="essay_value" value="{{ old('essay_value') }}"
                                            class="form-control form-control-solid mb-3" id="">
                                        @error('essay_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-6">
                                        <label
                                            class="required form-label @error('total_multiple_choice') is-invalid @enderror mb-3">Total
                                            Soal Pilihan Ganda</label>
                                        <input type="number" name="total_multiple_choice" value="{{ old('total_multiple_choice') }}"
                                            class="form-control form-control-solid mb-3" id="">
                                        @error('total_multiple_choice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label
                                            class="required form-label @error('total_essay') is-invalid @enderror mb-3">Total
                                            Soal Essay</label>
                                        <input type="number" name="total_essay" value="{{ old('total_essay') }}"
                                            class="form-control form-control-solid mb-3" id="">
                                        @error('total_essay')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">

                                    <div class="form-check form-switch col-6">
                                        <input class="form-check-input last_submit_switch" name="last_submit"
                                            value="" type="checkbox" role="switch" id="last_submit_switch-add">
                                        @error('last_submit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="d-flex">
                                            <label class="form-check-label @error('last_submit') is-invalid @enderror"
                                                for="flexSwitchCheckDefault">Pengumpulan
                                                Quiz</label>
                                            <div data-bs-toggle="tooltip" class="ms-2 mb-2" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="*Jika aktif maka siswa hanya bisa mengumpulan 5 menit sebelum quiz berakhir">
                                                <span class="svg-icon svg-icon-muted"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                            rx="10" fill="currentColor" />
                                                        <path
                                                            d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch col-6">
                                        <input class="form-check-input cheating_detector_switch" name="cheating_detector"
                                            value="" type="checkbox" role="switch" id="cheating_detector_switch">
                                        @error('cheating_detector')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="d-flex">
                                            <label
                                                class="form-check-label @error('cheating_detector') is-invalid @enderror"
                                                for="flexSwitchCheckDefault">Sistem
                                                Kecurangan</label>
                                            <div data-bs-toggle="tooltip" class="ms-2 mb-2" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="*Jika Aktif siswa tidak bisa membukan tab lain">
                                                <span class="svg-icon svg-icon-muted"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                            rx="10" fill="currentColor" />
                                                        <path
                                                            d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
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
@section('script')
    <script>
        $('.last_submit_switch').change(function() {
            $(this).val(this.checked ? '1' : '0');
        });
        $('.cheating_detector_switch').change(function() {
            $(this).val(this.checked ? '1' : '0');
        });
    </script>
@endsection
