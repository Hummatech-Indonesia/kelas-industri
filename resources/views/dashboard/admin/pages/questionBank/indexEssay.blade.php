@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                Essay
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    Buat soal Essay untuk Submateri {{ $submaterial->title }}
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form action="{{ route('admin.questionBank.storeEssay') }}" method="post">
                @csrf
                @method('POST')
                <input type="hidden" name="sub_material_id" value="{{ $submaterial->id }}">
                <input type="hidden" name="type" value="{{ $submaterial->id }}">
                <div class="card col-12">
                    <div class="card-body">
                        <div class="fs-5 fw-bold mb-3">
                            Tambahkan Soal Essay
                        </div>
                        <textarea id="kt_docs_ckeditor_classic" rows="5" name="question" type="text" placeholder="deskripsi tugas">{{ old('description') }}</textarea>
                        <button class="btn btn-primary btn-sm mt-3" type="submit">
                            Buat Soal
                        </button>
                    </div>
                </div>
            </form>
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
        });
    </script>
@endsection
