@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                Buat Soal Multiple choisce
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    Buat soal Multiple Choisce untuk Submateri {{ $submaterial->title }}
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="{{ route('admin.questionBank', $submaterial->material_id) }}" class="btn btn-dark fw-bold">
                Kembali </a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
        <!--end::Page title-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        @if ($errors->any())
            <x-errors-component />
        @endif
        <form action="{{ route('admin.question-bank.store') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="sub_material_id" value="{{ $submaterial->id }}">
            <div class="row gap-2">
                <div class="card col-7">
                    <div class="card-body">
                        <div class="fs-5 fw-bold mb-3">
                            Tambahkan Soal
                        </div>
                        <textarea id="kt_docs_ckeditor_classic" rows="5" name="question" type="text" placeholder="Masukkan Soal">{{ old('question') }}</textarea>
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
                            <input class="form-check-input" type="checkbox" name="answer[]" value="option1"
                                id="option1" />
                            <label class="form-check-label" for="option1">
                                Jawaban A
                            </label>
                        </div>
                        <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                            <input class="form-check-input" type="checkbox" name="answer[]" value="option2"
                                id="option2" />
                            <label class="form-check-label" for="option2">
                                Jawaban B
                            </label>
                        </div>
                        <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                            <input class="form-check-input" type="checkbox" name="answer[]" value="option3"
                                id="option3" />
                            <label class="form-check-label" for="option3">
                                Jawaban C
                            </label>
                        </div>
                        <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                            <input class="form-check-input" type="checkbox" name="answer[]" value="option4"
                                id="option4" />
                            <label class="form-check-label" for="option4">
                                Jawaban D
                            </label>
                        </div>
                        <div class="form-check form-check-custom form-check-solid form-check-sm mb-5">
                            <input class="form-check-input" type="checkbox" name="answer[]" value="option5"
                                id="option5" />
                            <label class="form-check-label" for="option5">
                                Jawaban E
                            </label>
                        </div>

                        <div class="row">
                            <button class="btn btn-primary btn-sm col-12" type="submit">
                                Buat Soal
                            </button>
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
                                <textarea id="kt_docs_ckeditor_classic_1" rows="5" name="option1" type="text" placeholder="deskripsi tugas">{{ old('option1') }}</textarea>
                            </div>
                            <div class="col-6">
                                <div class="fs-5 fw-bold mb-3">
                                    Jawaban B
                                </div>
                                <textarea id="kt_docs_ckeditor_classic_2" rows="5" name="option2" type="text" placeholder="deskripsi tugas">{{ old('option2') }}</textarea>
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
                                <textarea id="kt_docs_ckeditor_classic_3" rows="5" name="option3" type="text" placeholder="deskripsi tugas">{{ old('option3') }}</textarea>
                            </div>
                            <div class="col-6">
                                <div class="fs-5 fw-bold mb-3">
                                    Jawaban D
                                </div>
                                <textarea id="kt_docs_ckeditor_classic_4" rows="5" name="option4" type="text"
                                    placeholder="deskripsi tugas">{{ old('option4') }}</textarea>
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
                                <textarea id="kt_docs_ckeditor_classic_5" rows="5" name="option5" type="text"
                                    placeholder="deskripsi tugas">{{ old('option5') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
<script src="{{ asset('app-assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
@section('script')
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

                        axios.post('{{ route("admin.ckeditor-upload") }}', data)
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
