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
                                                        {{ $challenge->description }}
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
                                                        @if (strtotime(now()) <= strtotime($challenge->end_date))
                                                            <span class="badge badge-light-success">Tersedia</span>
                                                        @else
                                                            <span class="badge badge-light-danger">Ditutup</span>
                                                        @endif
                                                    </td>
                                                    <td>

                                                        @if (strtotime(now()) <= strtotime($challenge->end_date))
                                                            @if ($challenge->studentSubmitChallenge)
                                                                @if ($challenge->studentSubmitChallenge->is_valid == 'valid')
                                                                    <button
                                                                        class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">-</button>
                                                                @elseif ($challenge->studentSubmitChallenge->is_valid == 'not_valid')
                                                                    <a href="{{ route('student.submitChallenge', ['challenge' => $challenge->id]) }}"
                                                                        class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Kumpulkan</a>
                                                                @endif
                                                            @else
                                                                <a href="{{ route('student.submitChallenge', ['challenge' => $challenge->id]) }}"
                                                                    class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Kumpulkan</a>
                                                            @endif
                                                        @else
                                                            <span class="badge badge-light-danger">Ditutup</span>
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
                                        <!--end::Title-->
                                    </div>


                                    <div class="card-body">
                                        <table id="kt_datatable_responsive"
                                            class="table table-striped border rounded gy-5 gs-7">
                                            <thead>
                                                <tr class="fw-semibold fs-6 text-gray-800">

                                                    <th>No</th>
                                                    <th class="min-w-200px" data-priority="1">Nama Siswa</th>
                                                    <th class="min-w-100px" data-priority="2">File</th>
                                                    <th class="min-w-100px" data-priority="3">Status</th>
                                                    <th class="min-w-100px" data-priority="4">Aksi</th>

                                                </tr>
                                            </thead>
                                            @foreach ($student as $students)
                                                <tbody>
                                                    <tr>

                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            {{ $students->studentSchool->student->name }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ Route('mentor.downloadFileChallenge', ['submitChallenge' => $students->id]) }}"
                                                                target="_blank" class="btn btn-danger btn-sm">
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
                                                                </span>Download</a>
                                                        </td>
                                                        <td>
                                                            @if ($students->is_valid == 'not_valid')
                                                                <span class="badge badge-light-danger">Not Valid</span>
                                                            @else
                                                                <span class="badge badge-light-success">Valid</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($challenge->created_by == auth()->user()->id)
                                                                @if ($students->is_valid == 'not_valid')
                                                                    <form
                                                                        action="{{ route('mentor.validChallenge', ['submitChallenge' => $students->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            id="kt_docs_sweetalert_html"
                                                                            data-nama="{{ $students->studentSchool->student->name }}"
                                                                            class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">
                                                                            Valid
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    -
                                                                @endif
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
                                        <!--end::Title-->
                                    </div>
                                    <div class="card-body">

                                        <table id="kt_datatable_responsive"
                                            class="table table-striped border rounded gy-5 gs-7">
                                            <thead>
                                                <tr class="fw-semibold fs-6 text-gray-800">
                                                    <th>No</th>
                                                    <th class="min-w-200px" data-priority="1">Nama Siswa</th>
                                                    <th class="min-w-100px" data-priority="2">File</th>
                                                    <th class="min-w-100px" data-priority="3">Status</th>
                                                    <th class="min-w-100px" data-priority="4">Aksi</th>


                                                </tr>
                                            </thead>
                                            @foreach ($student as $students)
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            {{ $students->studentSchool->student->name }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ Route('teacher.downloadFileChallenge', ['submitChallenge' => $students->id]) }}"
                                                                target="_blank" class="btn btn-danger btn-sm">
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
                                                                </span>Download</a>
                                                        </td>

                                                        <td>
                                                            @if ($students->is_valid == 'not_valid')
                                                                <span class="badge badge-light-danger">Not Valid</span>
                                                            @else
                                                                <span class="badge badge-light-success">Valid</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($challenge->created_by == auth()->user()->id)
                                                                @if ($students->is_valid == 'not_valid')
                                                                    <form id="form-validate"
                                                                        action="{{ route('teacher.validChallengeTeacher', ['submitChallenge' => $students]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="button"
                                                                            id="kt_docs_sweetalert_html"
                                                                            data-nama="{{ $students->studentSchool->student->name }}"
                                                                            class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">
                                                                            Valid
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    -
                                                                @endif
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
    @endsection
    @section('script')
        <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script>
            $("#kt_datatable_responsive").DataTable({
                responsive: true
            });
        </script>
        <script>
            $('#kt_docs_sweetalert_html').click(function(e) {
                e.preventDefault();
                var nama = $(this).attr('data-nama');

                Swal.fire({
                    html: "Apakah Anda Yakin Challenge Dari Siswa " + nama + "",
                    icon: "info",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Ok, got it!",
                    cancelButtonText: 'Nope, cancel it',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed)
                        $('#form-validate').submit()
                });
            })
        </script>
    @endsection
