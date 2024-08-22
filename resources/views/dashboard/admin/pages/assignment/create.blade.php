@extends('dashboard.admin.layouts.app')
<style>
    .ck-content * {
        color: black !important
    }
</style>
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Tugas
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman tambah tugas
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
            <form action="{{ route('admin.assignments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    {{ $submaterial->title }}

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                <a href="{{ route('admin.submaterials.show', $submaterial->id) }}"
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
                            <input type="hidden" name="sub_material_id" value="{{ $submaterial->id }}">
                            <div class="row">
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="title"
                                            type="text" value="{{ old('title') }}" placeholder="Studi Kasus Bank"
                                            required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Deskripsi</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <textarea id="kt_docs_ckeditor_classic" rows="5" name="description" type="text" placeholder="deskripsi tugas">{{ old('description') }}</textarea>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Tanggal Mulai</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <div class="input-group" id="kt_td_picker_simple" data-td-target-input="nearest"
                                            data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_basic" name="start_date" type="text"
                                                class="form-control" data-td-target="#kt_td_picker_basic"
                                                placeholder="28/02/2023, 14.00" autocomplete="off" />
                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic"
                                                data-td-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Tanggal Selesai</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <div class="input-group" id="kt_td_picker_simple" data-td-target-input="nearest"
                                            data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_basic_2" name="end_date" type="text"
                                                class="form-control" data-td-target="#kt_td_picker_basic"
                                                placeholder="04/03/2023, 14.00" autocomplete="off" />
                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic"
                                                data-td-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i>
                                            </span>
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
<script src="{{ asset('app-assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
@section('script')
    <script>
        $(document).ready(function() {
            const datepicker = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"));
            datepicker.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
        })
    </script>
    <script>
        class MyUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            // Memulai proses upload.
            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        const data = new FormData();
                        data.append('upload', file);

                        axios.post('{{ route('admin.ckeditor-upload') }}', data)
                            .then(response => {
                                resolve({
                                    default: response.data.url
                                });
                            })
                            .catch(error => {
                                reject(error);
                            });
                    }));
            }

            // Membatalkan proses upload.
            abort() {
                // Implementasikan logika pembatalan jika perlu.
            }
        }

        function MyCustomUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new MyUploadAdapter(loader);
            };
        }

        ClassicEditor
            .create(document.querySelector('#editor'), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
            })
            .catch(error => {
                console.error(error);
            });

        function MyCustomUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new MyUploadAdapter(loader);
            };
        }



        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic'), {
                    extraPlugins: [MyCustomUploadAdapterPlugin]
                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        const editorData = editor.getData();
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(editorData, 'text/html');
                        const images = doc.querySelectorAll('img');


                        const imageSources = Array.from(images).map(img => img.getAttribute('src'));

                        if (window.previousImageSources) {
                            const removedImages = window.previousImageSources.filter(src => !
                                imageSources.includes(src));

                            removedImages.forEach(src => {
                                // Send a request to delete the image
                                axios.post('{{ route('admin.ckeditor-delete') }}', {
                                        src: src
                                    })
                                    .then(response => {
                                        console.log('Image deleted:', src);
                                    })
                                    .catch(error => {
                                        console.error('Error deleting image:', error);
                                    });
                            });
                        }

                        // Update the previous state
                        window.previousImageSources = imageSources;
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        })
    </script>
@endsection
