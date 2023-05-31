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
                                <a href="{{ url()->previous() }}"
                                    class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </a>
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



                                            <div class="symbol symbol-50 symbol-lg-120  symbol-danger ">



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
                                                        class="d-flex align-items-center text-dark text-hover-primary font-size-h5 fw-bold mr-3">

                                                        Detail {{ $challenge->title }}

                                                    </span>

                                                    <!--end::Name-->







                                                </div>

                                                <div class="my-lg-0 my-1">

                                                    <a href="https://class.hummasoft.com/siswa/challenge/9/file"
                                                        class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-2">File
                                                        Tambahan</a>


                                                </div>

                                            </div>

                                            <!--end: Title-->



                                            <!--begin: Content-->

                                            <div class="d-flex align-items-center flex-wrap justify-content-between">

                                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">

                                                    {{ $challenge->description }}

                                                </div>



                                                <div class="d-flex flex-wrap align-items-center py-2">

                                                    <div class="d-flex align-items-center me-10">

                                                        <div class="me-5">

                                                            <div class="font-weight-bold mb-2">Dimulai</div>

                                                            <span
                                                                class="badge badge-light-primary text-uppercase font-weight-bold">


                                                                {{ $challenge->start_date }}

                                                            </span>

                                                        </div>

                                                        <div class="">

                                                            <div class="font-weight-bold mb-2">Berakhir</div>

                                                            <span
                                                                class="badge badge-light-danger text-uppercase font-weight-bold">


                                                                {{ $challenge->end_date }}

                                                            </span>
                                                        </div>

                                                    </div>

                                                    <div class="flex-grow-1 flex-shrink-0 w-150px w-xl-300px mt-4 mt-sm-0">



                                                    </div>

                                                </div>



                                            </div>

                                            <!--end: Content-->

                                        </div>

                                        <!--end: Info-->

                                    </div>



                                    <div class="separator separator-solid my-7"></div>





                                    <!--begin: Items-->

                                    <div class="d-flex align-items-center flex-wrap">

                                        <!--begin: Item-->

                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">

                                            <span class="me-4">

                                                <i class="las la-coins text-muted fs-3x"></i>

                                            </span>

                                            <div class="d-flex flex-column text-dark-75">

                                                <span class="font-size-sm">Poin</span>

                                                <span class="fw-bold font-size-h5"><span
                                                        class="text-dark-50 font-weight-bold"></span>

                                                    {{ $challenge->point }} poin

                                                </span>

                                            </div>

                                        </div>


                                        <!--begin: Item-->

                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">

                                            <span class="me-4">
                                                <i class="las la-fire-alt text-muted fs-3x"></i>

                                            </span>

                                            <div class="d-flex flex-column text-dark-75">

                                                <span class="font-weight-bolder font-size-sm">Kesulitan</span>

                                                <span class="fw-bold font-size-h5"><span
                                                        class="text-dark-50 font-weight-bold"></span>

                                                    {{ $challenge->difficulty }}

                                                </span>

                                            </div>

                                        </div>

                                        <!--end: Item-->



                                        <!--begin: Item-->

                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">

                                            @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                                <span class="me-4">
                                                    <i class="las la-info-circle text-muted fs-3x"></i>

                                                </span>

                                                <div class="d-flex flex-column flex-lg-fill">

                                                    <span class="font-weight-bolder font-size-sm">status</span>
                                                    @if ($challenge->studentSubmitChallenge)
                                                        <span class="fw-bold text-success font-size-h5">Sudah
                                                            Dikerjakan</span>
                                                    @else
                                                        <span class="fw-bold text-danger font-size-h5">Belum
                                                            Dikerjakan</span>
                                                    @endif


                                                </div>
                                            @endif


                                        </div>

                                        <!--end: Item-->

                                    </div>

                                    <!--begin: Items-->

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

                                                    <th class="min-w-200px" data-priority="1">Judul</th>
                                                    <th class="min-w-300px">Deskripsi</th>

                                                    <th class="min-w-100px" data-priority="2">Tenggat</th>
                                                    <th class="min-w-100px" data-priority="3">Status</th>
                                                    <th class="min-w-100px" data-priority="4">Aksi</th>



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

                                                    <td><span class="badge badge-light-danger">

                                                            {{ $challenge->end_date }}

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

                                        @if (count($student) > 0)
                                            <a href="{{ Route('mentor.downloadAllFile', ['challenge' => $challenge->id]) }}"
                                                class="btn btn-success btn-sm mb-5"><i class="fas fa-file-excel"></i>
                                                Download File Semua Siswa
                                            </a>
                                        @else
                                        @endif

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
                                                                target="_blank" class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-file-pdf"></i>Download</a>
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
                                                                        action="{{ route('teacher.validChallengeTeacher', ['submitChallenge' => $students]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit"
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
                                        @if (count($student) > 0)
                                            <a href="{{ Route('teacher.downloadAllFile', ['challenge' => $challenge->id]) }}"
                                                class="btn btn-success btn-sm mb-5"><i class="fas fa-file-excel"></i>
                                                Download File Semua Siswa
                                            @else
                                        @endif
                                        </a>
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
                                                                target="_blank" class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-file-pdf"></i>Download</a>
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
                                                                        action="{{ route('teacher.validChallengeTeacher', ['submitChallenge' => $students]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit"
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
    @endsection
