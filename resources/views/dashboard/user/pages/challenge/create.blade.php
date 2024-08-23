@extends('dashboard.user.layouts.app')
<style>
        .ck-content * {
            color: black !important
        }
    </style>
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">


            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-8 ">

                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Tantangan
                                </h1>
                                <!--end::Title-->

                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->

                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->

                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    @if ($errors->any())
                        <x-errors-component />
                    @endif
                    <div class="row">
                        @if (auth()->user()->roles->pluck('name')[0] == 'teacher')

                        <form action="{{ route('teacher.challenges.store') }}" method="POST" enctype="multipart/form-data">

                        @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')

                        <form action="{{ route('mentor.challenges.store') }}" method="POST" enctype="multipart/form-data">
                        @endif

                            @csrf
                            <div class="col-12">
                                <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                                    <div class="card-header" style="">

                                        <div class="card-title">

                                            <h3 class="card-label">

                                                Silakan Isi Data Tantangan

                                            </h3>

                                        </div>

                                        <div class="card-toolbar">
                                            @if (auth()->user()->roles->pluck('name')[0] == 'teacher')

                                            <a href="{{ route('teacher.challenges.index') }}"
                                                class="btn btn-light-primary font-weight-bolder me-2">

                                                <i class="ki ki-long-arrow-back icon-sm"></i>

                                                Kembali

                                            </a>

                                            @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')

                                            <a href="{{ route('mentor.challenges.index') }}"
                                            class="btn btn-light-primary font-weight-bolder me-2">

                                            <i class="ki ki-long-arrow-back icon-sm"></i>

                                            Kembali

                                        </a>

                                            @endif

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

                                            @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                            <div class="form-group row mb-3">

                                                <label class="col-xl-3 col-lg-3 col-form-label">Kelas</label>

                                                <div class="col-lg-9 col-xl-9">

                                                    <select name="classroom_id" class="form-select form-select-solid me-5"
                                                        data-control="select2" data-placeholder="Pilih Kelas">
                                                        @foreach ($classrooms as $classroom)

                                                            <option value="{{ $classroom->classroom->id }}">
                                                                {{ $classroom->classroom->name }} - {{ $classroom->classroom->school->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>
                                            @endif

                                            <div class="form-group row mb-3">

                                                <label class="col-xl-3 col-lg-3 col-form-label">Tingkat Kesulitan</label>

                                                <div class="col-lg-9 col-xl-9">

                                                    <select name="difficulty" class="form-select form-select-solid me-5"
                                                        data-control="select2" data-placeholder="Pilih Kesulitan">

                                                        <option value="sulit">
                                                            Sulit
                                                        </option>
                                                        <option value="sedang">
                                                            Sedang
                                                        </option>
                                                        <option value="mudah">
                                                            Mudah
                                                        </option>

                                                    </select>

                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>

                                                <div class="col-lg-9 col-xl-9">

                                                    <input class="form-control form-control-solid form-control-lg"
                                                        name="title" type="text" value="{{ old('title') }}"
                                                        placeholder="judul tantangan" required="">

                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <label class="col-xl-3 col-lg-3 col-form-label">Deskripsi</label>

                                                <div class="col-lg-9 col-xl-9">

                                                    <textarea id="kt_docs_ckeditor_classic" rows="5"
                                                              name="description" type="text" placeholder="deskripsi tantangan">{{ old('description') }}</textarea>

                                                </div>

                                            </div>

                                            <div class="form-group row mb-3">

                                                <label class="col-xl-3 col-lg-3 col-form-label">Tanggal Mulai</label>

                                                <div class="col-lg-9 col-xl-9">

                                                    <div class="input-group" id="kt_td_picker_simple"
                                                        data-td-target-input="nearest" data-td-target-toggle="nearest">
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

                                                <label class="col-xl-3 col-lg-3 col-form-label">Tenggat</label>

                                                <div class="col-lg-9 col-xl-9">

                                                    <div class="input-group" id="kt_td_picker_simple"
                                                        data-td-target-input="nearest" data-td-target-toggle="nearest">
                                                        <input id="kt_td_picker_basic_2" name="end_date" type="text"
                                                            class="form-control" data-td-target="#kt_td_picker_basic"
                                                            placeholder="04/03/2023, 14.00" autocomplete="off" />
                                                        <span class="input-group-text"
                                                            data-td-target="#kt_td_picker_basic"
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
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->


        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer ">
            <!--begin::Footer container-->
            <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">{{ \Carbon\Carbon::now()->format('Y') }}©</span>
                    <a href="https://keenthemes.com/" target="_blank" class="text-gray-800 text-hover-primary">Kelas
                        Industri</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item"><a href="https://keenthemes.com/" target="_blank"
                            class="menu-link px-2">Tentang
                            Kami</a></li>

                    <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank"
                            class="menu-link px-2">Syarat & Ketentuan</a></li>

                    <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank"
                            class="menu-link px-2">Kebijakan Privasi</a></li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
<script src="{{ asset('app-assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
@section('script')
    <script>
        ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });

        $(document).ready(function() {
            const datepicker = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"));
            datepicker.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
        })
    </script>
@endsection
