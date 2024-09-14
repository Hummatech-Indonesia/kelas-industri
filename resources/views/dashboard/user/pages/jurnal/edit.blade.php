@php use Carbon\Carbon; @endphp
@extends('dashboard.user.layouts.app')
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
                        <div id="kt_app_content_container" class="app-container  container-fluid ">
                            @if ($errors->any())
                                <x-errors-component />
                            @endif
                            <div class="row">
                                @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                    <form action="{{ route('mentor.journal.update', [$journal->id]) }}" method="post"
                                        enctype="multipart/form-data">
                                    @elseif(auth()->user()->roles->pluck('name')[0] == 'teacher')
                                        <form action="{{ route('teacher.journal.update', [$journal->id]) }}" method="post"
                                            enctype="multipart/form-data">
                                @endif
                                @method('PUT')
                                @csrf
                                <div class="col-12">
                                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                                        <div class="card-header" style="">

                                            <div class="card-title">

                                                <h3 class="card-label">

                                                    Edit Isi Data Jurnal

                                                </h3>

                                            </div>

                                            <div class="card-toolbar">

                                                @role('teacher')
                                                    <a href="{{ route('teacher.journal.index') }}"
                                                        class="btn btn-light-primary font-weight-bolder me-2">

                                                        <i class="ki ki-long-arrow-back icon-sm"></i>

                                                        Kembali

                                                    </a>
                                                @endrole
                                                @role('mentor')
                                                    <a href="{{ route('mentor.journal.index') }}"
                                                        class="btn btn-light-primary font-weight-bolder me-2">

                                                        <i class="ki ki-long-arrow-back icon-sm"></i>

                                                        Kembali

                                                    </a>
                                                @endrole


                                                <div class="btn-group">

                                                    <button type="submit" class="btn btn-primary font-weight-bolder">

                                                        <i class="ki ki-check icon-sm"></i>

                                                        Simpan

                                                    </button>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="card-body">

                                            <input type="hidden" name="created_by" value="{{ auth()->id() }}">

                                            <div class="row">
                                                <div class="form-group row mb-3">

                                                    <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>

                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg"
                                                            name="title" type="text" value="{{ $journal->title }}"
                                                            placeholder="Masukkan Judul" required="">

                                                    </div>

                                                </div>
                                                <div class="form-group row mb-3">
                                                    <div class="col-xl-3 col-lg-3"></div>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <img src="{{ asset('storage/' . $journal->photo) }}" alt=""
                                                            srcset="" style="width: 260px">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Foto</label>
                                                    <div class="col-lg-9 col-xl-9">

                                                        <input class="form-control form-control-solid form-control-lg"
                                                            name="photo" type="file" placeholder="Masukkan Foto">

                                                    </div>

                                                </div>
                                                <div class="form-group row mb-3">

                                                    <label class="col-xl-3 col-lg-3 col-form-label">Kelas</label>

                                                    <div class="col-lg-9 col-xl-9">

                                                        <select name="classroom_id" id="classroom"
                                                            class="form-select form-select-solid" data-control="select2"
                                                            data-placeholder="Select an option">
                                                            @foreach ($classrooms as $classroom)
                                                                <option
                                                                    {{ $journal->classroom_id == $classroom->classroom_id ? 'selected' : '' }}
                                                                    value="{{ $classroom->classroom_id }}">
                                                                    {{ $classroom->classroom->name }} -
                                                                    {{ $classroom->classroom->school->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="form-group row mb-3">

                                                    <label class="col-xl-3 col-lg-3 col-form-label">Tanggal</label>

                                                    <div class="col-lg-9 col-xl-9">

                                                        <input class="form-control form-control-solid form-control-lg"
                                                            type="date" name="date" value="{{ $journal->date }}">
                                                        </span>
                                                    </div>

                                                </div>

                                                <div class="form-group row mb-3">

                                                    <label class="col-xl-3 col-lg-3 col-form-label">Deskripsi</label>

                                                    <div class="col-lg-9 col-xl-9">

                                                        <textarea class="form-control form-control-solid form-control-lg" rows="5" name="description" type="text"
                                                            placeholder="deskripsi Jurnal" required="">{{ $journal->description }}</textarea>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                    @include('dashboard.user.pages.jurnal.widgets.edit-attendance-list')
                                @endif
                            </div>
                            </form>
                        </div>

                    </div>
                    <!--end::Toolbar wrapper-->
                </div>
                <!--end::Toolbar container-->
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
                <span class="text-muted fw-semibold me-1">{{ Carbon::now()->format('Y') }}©</span>
                <a href="https://keenthemes.com/" target="_blank" class="text-gray-800 text-hover-primary">Kelas
                    Industri</a>
            </div>
            <!--end::Copyright-->

            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item"><a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">Tentang
                        Kami</a></li>

                <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank"
                        class="menu-link px-2">Syarat &
                        Ketentuan</a></li>

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
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $('#classroom').val('{{ $journal->classroom_id }}').trigger('change');
    </script>
@endsection
