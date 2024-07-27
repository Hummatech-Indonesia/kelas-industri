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
                                <div class="col-12">
                                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                                        <div class="card-header" style="">

                                            <div class="card-title">

                                                <h3 class="card-label">

                                                    Silakan Isi Data Jurnal

                                                </h3>

                                            </div>

                                            <div class="card-toolbar">

                                                <a href="{{ route('teacher.journal.index') }}"
                                                    class="btn btn-light-primary font-weight-bolder me-2">

                                                    <i class="ki ki-long-arrow-back icon-sm"></i>

                                                    Kembali

                                                </a>


                                            </div>

                                        </div>

                                        <div class="card-body">

                                            <input type="hidden" name="created_by" value="{{ auth()->id() }}">

                                            <div class="row">
                                                <div class="form-group row mb-3">

                                                    <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>

                                                    <div class="col-lg-9 col-xl-9">

                                                        <p>{{ $journal->title }}</p>

                                                    </div>

                                                </div>
                                                <div class="form-group row mb-3">

                                                    <label class="col-xl-3 col-lg-3 col-form-label">Foto</label>

                                                    <div class="col-lg-9 col-xl-9">

                                                        <img src="{{ asset('storage/' . $journal->photo) }}" alt="" class="w-100">

                                                    </div>

                                                </div>

                                                @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                    <div class="form-group row mb-3">

                                                        <label class="col-xl-3 col-lg-3 col-form-label">Kelas</label>

                                                        <div class="col-lg-9 col-xl-9">

                                                            <select name="classroom_id"
                                                                class="form-select form-select-solid" data-control="select2"
                                                                data-placeholder="Pilih kelas">

                                                                @foreach ($classrooms as $classroom)
                                                                    <option
                                                                        {{ old('classroom_id') == $classroom->classroom_id ? 'selected' : '' }}
                                                                        value="{{ $classroom->classroom_id }}">
                                                                        {{ $classroom->classroom->name }} -
                                                                        {{ $classroom->classroom->school->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>

                                                    </div>
                                                @endif

                                                <div class="form-group row mb-3">

                                                    <label class="col-xl-3 col-lg-3 col-form-label">Deskripsi</label>

                                                    <div class="col-lg-9 col-xl-9">

                                                        <p>{{ $journal->description }}</p>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                    <div class="col-12 mt-5">
                                        <div class="card card-custom card-sticky">
                                            <div class="card-header" style="">

                                                <div class="card-title">

                                                    <h3 class="card-label">

                                                        Silakan Isi Data Absensi Siswa

                                                    </h3>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table gs-7 gy-7 gx-7">
                                                        <thead>
                                                            <tr
                                                                class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                                                <th>Nama</th>
                                                                <th>Kelas</th>
                                                                <th class="text-center">Kehadiran</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($journal->attendances as $attendance)
                                                                @php
                                                                    $student = $attendance->studentClassroom;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{ $student->studentSchool->student->name }}</td>
                                                                    <td>{{ $student->classroom->name }}</td>
                                                                    <td class="text-center">
                                                                        <div
                                                                            class="fs-7 badge
                                                                        @if ($attendance->attendance == 'hadir') badge-success
                                                                        @elseif($attendance->attendance == 'ijin')badge-warning
                                                                        @elseif($attendance->attendance == 'sakit')badge-primary
                                                                        @elseif($attendance->attendance == 'alfa')badge-danger @endif
                                                                        ">
                                                                            {{ ucfirst($attendance->attendance) }}
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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

        $(document).ready(function() {
            const datepicker = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"));
            datepicker.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
        })
    </script>
@endsection
