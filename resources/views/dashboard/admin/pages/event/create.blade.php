@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Event
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman tambah event
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.events.index') }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <!--end::Actions-->
    </div>

    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Event

                                </h3>

                            </div>

                            <div class="card-toolbar">
                                <div class="btn-group">

                                    <button type="submit" class="btn btn-primary font-weight-bolder">

                                        <i class="ki ki-check icon-sm"></i>

                                        Simpan

                                    </button>

                                </div>

                            </div>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rollingMentor.actionRollingMentor') }}" method="POST"
                                enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="row">

                                    {{-- <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Sekolah</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <select name="school_id" class="form-select form-select-solid me-5"
                                                data-control="select2" data-placeholder="Pilih Sekolah (Opsional)">
                                                <option value=""></option>

                                                @foreach ($schools as $school)
                                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                    </div> --}}

                                    <div class="form-group row mb-3">
                                        <div class="preview w-100 my-3">
                                            <img src="" alt="" class="thumbnail-preview d-none rounded">
                                        </div>

                                        <label class="col-xl-3 col-lg-3 col-form-label">Thumbnail</label>

                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-solid form-control-lg" name="thumnail"
                                                type="file" id="input-thumbnail" placeholder="Masukkan Foto Thumnail">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <input class="form-control form-control-solid form-control-lg" name="title"
                                                type="text" value="{{ old('title') }}" placeholder="Judul event"
                                                required="">

                                        </div>

                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="preview  my-3">
                                            <img src="" alt="" class="photo-preview d-none rounded">
                                        </div>

                                        <label class="col-xl-3 col-lg-3 col-form-label">Foto</label>

                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-solid form-control-lg" name="photo"
                                                type="file" id="input-photo" placeholder="Masukkan Foto">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Deskripsi</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <textarea rows="5" name="description" type="text" class="form-control form-control-solid"
                                                placeholder="Deskripsi tantangan" id="kt_docs_ckeditor_classic">{{ old('description') }}</textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Lokasi</label>

                                        <div class="col-lg-9 col-xl-9">
                                            <textarea class="form-control form-control-solid form-control-lg" name="location" placeholder="Lokasi" min="1"
                                                value="{{ old('limit_participant') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Batas Jumlah Peserta</label>

                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-solid form-control-lg"
                                                name="limit_participant" type="number"
                                                placeholder="Batas peserta (opsional)" min="1"
                                                value="{{ old('limit_participant') }}">
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

                                        <label class="col-xl-3 col-lg-3 col-form-label">Tanggal Berakhir</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <div class="input-group" id="kt_td_picker_simple"
                                                data-td-target-input="nearest" data-td-target-toggle="nearest">
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
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-delete-modal-component />
@endsection
@section('css')
    <style>
        .preview img {
            width: 400px;
        }

        .thumbnail-preview {
            aspect-ratio: 2.5/1;
        }
    </style>
@endsection
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        // handleGetMentorClassrooms()

        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });


        $(document).on('click', '.delete', function() {
            const url = "{{ route('admin.rollingMentor.deleteRollingMentor', ':id') }}".replace(':id', $(this)
                .data(
                    'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $(document).ready(function() {
            const datepicker = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"));
            datepicker.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
        })


        $('#input-thumbnail').change(function() {
            var file = $(this)[0].files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                $('.thumbnail-preview').attr('src', reader.result);
                $('.thumbnail-preview').removeClass('d-none');
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                $('.thumbnail-preview').attr('src', '');
            }
        });
        $('#input-photo').change(function() {
            var file = $(this)[0].files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                $('.photo-preview').attr('src', reader.result);
                $('.photo-preview').removeClass('d-none');
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                $('.photo-preview').attr('src', '');
            }
        });
    </script>
@endsection
