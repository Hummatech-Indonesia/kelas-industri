@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Jadwal Zoom
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Tambah Jadwal Zoom
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
            <form action="{{ route('admin.zoom-schedules.store') }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                        <div class="card-header" style="">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Silakan Isi Jadwal Zoom
                                </h3>
                            </div>

                            <div class="card-toolbar">
                                <a href="{{ route('admin.zoom-schedules.index') }}"
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
                                <div class="form-group row mb-5">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input type="text" name="title" class="form-control" placeholder="Isi Judul"
                                            id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row mb-5">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Pengguna</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <select name="for_user" class="form-control" id="">
                                            <option value="">Pilih Pengguna</option>
                                            <option value="student">Siswa</option>
                                            <option value="mentor">Mentor</option>
                                            <option value="teacher">Guru</option>
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
        })
    </script>
@endsection
