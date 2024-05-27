@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                Multiple choisce
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    multiple cose
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row gap-2">
            <div class="card col-7">
                <div class="card-body">
                    <div class="fs-5 fw-bold mb-3">
                        Tambahkan Soal
                    </div>
                    <textarea id="kt_docs_ckeditor_classic" rows="5" name="description" type="text" placeholder="deskripsi tugas">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="card col-4">
                <!--begin::Header-->
                <div class="card-header">
                    <h3 class="card-title fw-bold">Kunci Jawaban</h3>
                    <div class="fw-semibold">
                        Bisa memilih lebih dari satu jawaban
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="flexRadioLg" />
                        <label class="form-check-label" for="flexRadioLg">
                            Jawaban A
                        </label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="flexRadioLg" />
                        <label class="form-check-label" for="flexRadioLg">
                            Jawaban B
                        </label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="flexRadioLg" />
                        <label class="form-check-label" for="flexRadioLg">
                            Jawaban C
                        </label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="flexRadioLg" />
                        <label class="form-check-label" for="flexRadioLg">
                            Jawaban D
                        </label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid form-check-sm mb-5">
                        <input class="form-check-input" type="checkbox" value="" id="flexRadioLg" />
                        <label class="form-check-label" for="flexRadioLg">
                            Jawaban E
                        </label>
                    </div>

                    <div class="row">
                        <div class="btn btn-primary btn-sm col-12">
                            Buat Soal
                        </div>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="fs-5 fw-bold mb-3">
                                Jawaban A
                            </div>
                            <textarea id="kt_docs_ckeditor_classic_1" rows="5" name="description" type="text"
                                placeholder="deskripsi tugas">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-6">
                            <div class="fs-5 fw-bold mb-3">
                                Jawaban B
                            </div>
                            <textarea id="kt_docs_ckeditor_classic_2" rows="5" name="description" type="text"
                                placeholder="deskripsi tugas">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="fs-5 fw-bold mb-3">
                                Jawaban C
                            </div>
                            <textarea id="kt_docs_ckeditor_classic_3" rows="5" name="description" type="text"
                                placeholder="deskripsi tugas">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-6">
                            <div class="fs-5 fw-bold mb-3">
                                Jawaban D
                            </div>
                            <textarea id="kt_docs_ckeditor_classic_4" rows="5" name="description" type="text"
                                placeholder="deskripsi tugas">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="fs-5 fw-bold mb-3">
                                Jawaban E
                            </div>
                            <textarea id="kt_docs_ckeditor_classic_5" rows="5" name="description" type="text"
                                placeholder="deskripsi tugas">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('app-assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
@section('script')
    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic_1'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic_2'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic_3'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic_4'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic_5'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        })
    </script>
@endsection
