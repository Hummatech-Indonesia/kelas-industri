@extends('dashboard.user.layouts.app')
@section('css')
    <style>
        .kt_docs_sweetalert_html {
            display: none;
        }
    </style>
@endsection
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

                                    Latihan {{ $challenge->title }}

                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        Detail Tantangan
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                    @if (count($student) > 0)
                                        <a href="{{ Route('mentor.downloadAllFile', ['challenge' => $challenge->id]) }}"
                                            class="btn btn-dark fw-bold btn-sm">
                                            <span class="svg-icon svg-icon-muted svg-icon-1"><svg width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            Download File Semua Siswa
                                        </a>
                                    @else
                                    @endif
                                    <a href="{{ route('mentor.challenges.index') }}"
                                        class="btn btn-light-primary font-weight-bolder me-2">
                                        <i class="bi bi-arrow-left me-2"></i>
                                        Kembali
                                    </a>
                                @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                    @if (count($student) > 0)
                                        <a href="{{ Route('teacher.downloadAllFile', ['challenge' => $challenge->id]) }}"
                                            class="btn btn-dark fw-bold btn-sm">
                                            <span class="svg-icon svg-icon-muted svg-icon-1"><svg width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            Download File Semua Siswa
                                        </a>
                                    @else
                                    @endif
                                    <a href="{{ route('teacher.challenges.index') }}"
                                        class="btn btn-light-primary font-weight-bolder me-1">
                                        <i class="bi bi-arrow-left me-2"></i>
                                        Kembali
                                    </a>
                                @else
                                    <a href="{{ route('student.challenges.index') }}"
                                        class="btn btn-light-primary font-weight-bolder me-2">
                                        <i class="bi bi-arrow-left me-2"></i>
                                        Kembali
                                    </a>
                                @endif
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">

                    <div class="row">
                        <div class="col-12">

                            <div class="card card-custom gutter-b">

                                <div class="card-body">

                                    <div class="d-flex">

                                        <!--begin: Pic-->

                                        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3 me-5">


                                            <div class="symbol symbol-50 symbol-lg-120 symbol-primary ">

                                                <span
                                                    class="font-size-h3 symbol-label font-weight-boldest">{{ substr($challenge->title, 0, 1) }}</span>

                                            </div>

                                        </div>

                                        <!--end: Pic-->


                                        <!--begin: Info-->

                                        <div class="flex-grow-1">

                                            <!--begin: Title-->

                                            <div class="d-flex align-items-center justify-content-between flex-wrap">

                                                <div class="mr-3">

                                                    <!--begin::Name-->

                                                    <span
                                                        class="d-flex align-items-center text-dark h4 font-weight-bold mr-3">

                                                        {{ $challenge->title }}

                                                    </span>
                                                </div>
                                            </div>

                                            <!--end: Title-->


                                            <!--begin: Content-->

                                            <div class="d-flex align-items-center flex-wrap justify-content-between">

                                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">

                                                    <div style="width: 45vw">

                                                        {!! $challenge->description !!}
                                                    </div>

                                                </div>

                                            </div>

                                            <!--end: Content-->

                                        </div>

                                        <!--end: Info-->

                                    </div>


                                </div>

                            </div>

                        </div>
                        @if (auth()->user()->roles->pluck('name')[0] == 'student')

                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-header pt-7">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Pengumpulan Tantangan</span>
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">submit tantangan yang telah
                                                anda
                                                selesaikan dibawah ini.</span>
                                        </h3>
                                        <!--end::Title-->
                                    </div>
                                    <div class="card-body">
                                        <table id="kt_datatable_responsive"
                                            class="table table-striped border rounded gy-5 gs-7">
                                            <thead>
                                                <tr class="fw-semibold fs-6 text-gray-800">
                                                    <th class="min-w-300px" data-priority="1">Judul</th>
                                                    <th class="min-w-300px">Deskripsi</th>
                                                    <th class="min-w-100px"data-priority="2">Dimulai</th>
                                                    <th class="min-w-100px"data-priority="3">Berakhir</th>
                                                    <th class="min-w-100px"data-priority="4">Status</th>
                                                    <th class="min-w-100px"data-priority="5">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{ $challenge->title }}
                                                    </td>
                                                    <td>
                                                        {!! $challenge->description !!}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-primary">
                                                            {{ \Carbon\Carbon::parse($challenge->start_date)->locale('id')->isoFormat('D MMMM YYYY HH:mm') }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-danger">
                                                            {{ \Carbon\Carbon::parse($challenge->end_date)->locale('id')->isoFormat('D MMMM YYYY HH:mm') }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($tanggal < $challenge->start_date)
                                                            <span class="badge badge-light-warning">Akan dibuka</span>
                                                        @elseif($tanggal < $challenge->end_date)
                                                            <span class="badge badge-light-success">Tersedia</span>
                                                        @else
                                                            <span class="badge badge-light-danger">Ditutup</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if ($tanggal < $challenge->start_date)
                                                            <button
                                                                class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">-</button>
                                                        @elseif ($tanggal < $challenge->end_date)
                                                            @if ($challenge->studentSubmitChallenge)
                                                                @if ($challenge->studentSubmitChallenge->is_valid == 'valid')
                                                                    <button
                                                                        class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">-</button>
                                                                @elseif ($challenge->studentSubmitChallenge->is_valid == 'not_valid')
                                                                    <a href="{{ route('student.submitChallenge', ['challenge' => $challenge->id]) }}"
                                                                        class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Edit
                                                                        Challenge</a>
                                                                @endif
                                                            @else
                                                                <a href="{{ route('student.submitChallenge', ['challenge' => $challenge->id]) }}"
                                                                    class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Kumpulkan</a>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('student.submitChallenge', ['challenge' => $challenge->id]) }}"
                                                                class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Lihat</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-header pt-7">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Pengumpulan Tantangan</span>
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Siswa Yang Telah Mengumpulkan
                                                Tantangan.</span>
                                        </h3>
                                        <button type="submit"
                                            class="btn btn-sm btn-primary kt_docs_sweetalert_html btn-mentor mb-2"
                                            id="{{ count($student) > 0 ? $student[0]->challenge_id : '' }}">
                                            Nilai
                                        </button>
                                        <!--end::Title-->
                                    </div>
                                    <div class="card-body">
                                        <table id="kt_datatable_responsive"
                                            class="table table-striped border rounded gy-5 gs-7">
                                            <thead>
                                                <tr class="fw-semibold fs-6 text-gray-800">
                                                    <th><input type="checkbox" name="" id="checkAll"
                                                            onClick="toggle(this)"></th>
                                                    <th>No</th>
                                                    <th class="min-w-200px" data-priority="1">Nama Siswa</th>
                                                    <th data-priority="2">File</th>
                                                    <th class="min-w-100px" data-priority="3">Status</th>
                                                    <th class="min-w-100px" data-priority="4">Point</th>
                                                </tr>
                                            </thead>
                                            @foreach ($student as $students)
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            @if ($students->is_valid == 'not_valid')
                                                                <input type="checkbox" class="checked" name="checkAll"
                                                                    id="{{ $students->id }}">
                                                            @endif
                                                        </td>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            {{ $students->studentSchool->student->name }}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $filePath = explode('/', $students->file);
                                                                $fileName = end($filePath);
                                                                $fileExtension = pathinfo(
                                                                    $fileName,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                            @endphp
                                                            @if (in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg']))
                                                                <button class="btn btn-primary btn-sm btn-img"
                                                                    data-file="{{ asset('storage/' . $students->file) }}">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-4"><svg
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3"
                                                                                d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z"
                                                                                fill="currentColor" />
                                                                            <path
                                                                                d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </span> Gambar</button>
                                                            @else
                                                                <a href="{{ Route('teacher.downloadAssignment', ['submitAssignment' => $student->submitAssignment->id]) }}"
                                                                    target="_blank"
                                                                    class="btn btn-danger btn-sm btn-download">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-4">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3"
                                                                                d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                                                fill="currentColor" />
                                                                            <path opacity="0.3"
                                                                                d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z"
                                                                                fill="currentColor" />
                                                                            <path
                                                                                d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    Download </a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($students->is_valid == 'not_valid')
                                                                <span class="badge badge-light-danger">Belum di
                                                                    Nilai</span>
                                                            @else
                                                                <span class="badge badge-light-success">Sudah
                                                                    diNilai</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($students->is_valid == 'not_valid')
                                                                <select name="persen"
                                                                    class="form-select form-select-solid"
                                                                    id="point-{{ $students->id }}">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>

                                                                </select>
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                        @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-header pt-7">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Pengumpulan Tantangan</span>
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Siswa Yang Telah Mengumpulkan
                                                Tantangan.</span>
                                        </h3>
                                        <button type="submit"
                                            class="btn btn-sm btn-primary kt_docs_sweetalert_html btn-teacher mb-2"
                                            id="{{ count($student) > 0 ? $student[0]->challenge_id : '' }}">
                                            Nilai
                                        </button>
                                        <!--end::Title-->
                                    </div>
                                    <div class="card-body">
                                        <table id="kt_datatable_responsive"
                                            class="table table-striped border rounded gy-5 gs-7">
                                            <thead>
                                                <tr class="fw-semibold fs-6 text-gray-800">
                                                    <th><input type="checkbox" name="" id="checkAll"
                                                            onClick="toggle(this)"></th>
                                                    <th>No</th>
                                                    <th class="min-w-200px" data-priority="1">Nama Siswa</th>
                                                    <th data-priority="2">File</th>
                                                    <th class="min-w-100px" data-priority="3">Status</th>
                                                    <th class="min-w-100px" data-priority="4">Point</th>
                                                </tr>
                                            </thead>
                                            @foreach ($student as $students)
                                                {{-- {{ dd($students) }} --}}
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            @if ($students->is_valid == 'not_valid')
                                                                <input type="checkbox" class="checked" name="checkAll"
                                                                    id="{{ $students->id }}">
                                                            @endif
                                                        </td>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            {{ $students->studentSchool->student->name }}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $filePath = explode('/', $students->file);
                                                                $fileName = end($filePath);
                                                                $fileExtension = pathinfo(
                                                                    $fileName,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                            @endphp
                                                            @if (in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg']))
                                                                <button class="btn btn-primary btn-sm btn-img"
                                                                    data-file="{{ asset('storage/' . $students->file) }}">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-4"><svg
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3"
                                                                                d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z"
                                                                                fill="currentColor" />
                                                                            <path
                                                                                d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </span> Gambar</button>
                                                            @else
                                                                <a href="{{ Route('teacher.downloadAssignment', ['submitAssignment' => $student->submitAssignment->id]) }}"
                                                                    target="_blank"
                                                                    class="btn btn-danger btn-sm btn-download">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-4">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3"
                                                                                d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                                                fill="currentColor" />
                                                                            <path opacity="0.3"
                                                                                d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z"
                                                                                fill="currentColor" />
                                                                            <path
                                                                                d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    Download </a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($students->is_valid == 'not_valid')
                                                                <span class="badge badge-light-danger">Belum di
                                                                    Nilai</span>
                                                            @else
                                                                <span class="badge badge-light-success">Sudah
                                                                    diNilai</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($students->is_valid == 'not_valid')
                                                                <select name="persen"
                                                                    class="form-select form-select-solid"
                                                                    id="point-{{ $students->id }}">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>

                                                                </select>
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif

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
                                class="menu-link px-2">Tentang Kami</a></li>

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
        <div class="modal fade" tabindex="-1" id="kt_modal_photo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Detail Jawaban</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30"
                                viewBox="0 -960 960 960" width="30">
                                <path
                                    d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                            </svg>
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body row">
                        <img src="" id="photo" class="col-12" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script>
            $("#kt_datatable_responsive").DataTable({
                responsive: true
            });
        </script>
        <script>
            let ids = [];

            if ($('.checked').length == 0) {
                $('#checkAll').css("display", "none")
            }

            $('[id^=point]').change(function(e) {
                const id = parseInt(this.id.split('-')[1]);
                if (ids.length != 0) {
                    const submiteChallenge = ids.find(function(item) {
                        return item.id === id;
                    });
                    ids[ids.indexOf(submiteChallenge)].point = this.value;
                }
            })
            $('.checked').change(function() {
                if (this.checked) {
                    const id = parseInt(this.id)
                    const point = $('#point-' + this.id).val()
                    ids.push({
                        id: id,
                        point: point
                    });
                } else {
                    ids.splice(ids.indexOf(parseInt(this.id)), 1)
                }
            })

            $('#checkAll').change(function() {
                ids = [];
                if (this.checked) {
                    $('.checked').each(function(i, val) {
                        const id = parseInt(val.id)
                        const point = $('#point-' + val.id).val()
                        ids.push({
                            id: id,
                            point: point
                        });
                    })
                }
            })
            $('.btn-teacher').click(function() {
                var id = this.id;
                Swal.fire({
                    html: "Apakah anda yakin ingin menilai siswa - siwa yang anda ceklist ",
                    icon: "info",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Iya, Benar!",
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/teacher/validChallengeTeacher/",
                            type: 'POST',
                            data: {
                                ids: ids,
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data Berhasil Dinilai',
                                    text: 'Berhasil Mengvalidasi Challenge',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    window.location.reload();
                                });
                            }
                        });
                    }
                });
            })

            $('.btn-mentor').click(function(e) {
                var id = this.id;
                Swal.fire({
                    html: "Apakah anda yakin ingin menilai siswa - siwa yang anda ceklist ",
                    icon: "info",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Iya, Benar!",
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/mentor/validChallenge/",
                            type: 'POST',
                            data: {
                                ids: ids,
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data Berhasil Dinilai',
                                    text: 'Berhasil Mengvalidasi Challenge',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    window.location.reload();
                                });
                            }
                        });
                    }
                });
            });

            function toggle(source) {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                var nilaiButton = document.querySelector('.kt_docs_sweetalert_html');

                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i] !== source) {
                        checkboxes[i].checked = source.checked;
                    }
                }

                if (source.checked) {
                    nilaiButton.style.display = 'block';
                } else {
                    nilaiButton.style.display = 'none';
                }
            }

            var checkbox = document.querySelector('.checked');
            var button = document.querySelector('.kt_docs_sweetalert_html');

            if (checkbox) {

                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        button.style.display = 'block';
                    } else {
                        button.style.display = 'none';
                    }
                });
            }

            var hasPhoto = $(".btn-img").length > 0;
            var hasFiles = $(".btn-file").length > 0;

            if (!hasPhoto && !hasFiles) {
                $("#btn-download-all").remove();
            }

            $('.btn-img').click(function() {
                var photo = $(this).data('file');
                $('#photo').attr('src', photo);
                $('#kt_modal_photo').modal('show');
            });
        </script>
    @endsection
