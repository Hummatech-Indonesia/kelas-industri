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
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    {{ $subMaterial->title }}
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        {{ count($subMaterial->assignments) }} Tugas
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


                                            <div class="symbol symbol-50 symbol-lg-120 symbol-primary ">

                                                <span
                                                    class="font-size-h3 symbol-label font-weight-boldest">{{ substr($subMaterial->title, 0, 1) }}</span>

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

                                                        {{ $subMaterial->title }}

                                                    </span>

                                                    <!--end::Name-->

                                                </div>

                                                <div class="my-lg-0 my-1">
                                                    @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                                        <a href="{{ route('common.showDocument', [$subMaterial->id, 'student']) }}"
                                                            class="btn btn-danger btn-sm">Materi
                                                        </a>
                                                    @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                        <a href="{{ route('common.showDocument', [$subMaterial->id, 'mentor']) }}"
                                                            class="btn btn-danger btn-sm">Materi
                                                        </a>
                                                    @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                        <a href="{{ route('common.showDocument', [$subMaterial->id, 'teacher']) }}"
                                                            class="btn btn-danger btn-sm">Materi
                                                        </a>
                                                    @endif

                                                </div>

                                            </div>

                                            <!--end: Title-->


                                            <!--begin: Content-->

                                            <div class="d-flex align-items-center flex-wrap justify-content-between">

                                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">

                                                    <div style="width: 45vw">

                                                        {{ $subMaterial->description }}
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
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pt-7">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-800">Tugas</span>
                                        <span class="text-gray-400 mt-1 fw-semibold fs-6">list tugas anda.</span>
                                    </h3>

                                    {{-- <div class="my-lg-0 my-1">

                                        <a href="{{ route('admin.submaterials.createAssignment', ['submaterial' => $subMaterial->id]) }}"
                                           class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Tambah Tugas</a>

                                    </div> --}}
                                    <!--end::Title-->
                                </div>
                                <div class="card-body">

                                    <table id="kt_datatable_responsive"
                                        class="table table-striped border rounded gy-5 gs-7">
                                        <thead>
                                            <tr class="fw-semibold fs-6 text-gray-800">
                                                <th class="min-w-300px" data-priority="1">Judul</th>
                                                <th class="min-w-300px">Deskripsi</th>
                                                <th class="min-w-100px" data-priority="2">Mulai</th>
                                                <th class="min-w-100px" data-priority="3">Tenggat</th>
                                                <th class="min-w-100px" data-priority="4">Status</th>
                                                <th class="min-w-100px" data-priority="5">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($subMaterial->assignments as $assignment)
                                                <tr>
                                                    <td>{{ $assignment->title }}</td>
                                                    <td>{{ $assignment->description }}</td>
                                                    <td><span
                                                            class="badge badge-light-primary">{{ $assignment->start_date }}</span>
                                                    </td>
                                                    <td><span
                                                            class="badge badge-light-danger">{{ $assignment->end_date }}</span>
                                                    </td>
                                                    <td>
                                                        @if (strtotime(now()) <= strtotime($assignment->end_date))
                                                            <span class="badge badge-light-success">Tersedia</span>
                                                        @else
                                                            <span class="badge badge-light-danger">Ditutup</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (strtotime(now()) <= strtotime($assignment->end_date))
                                                            @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                                                <a href="#"
                                                                    class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Kumpulkan</a>
                                                            @else
                                                                <a href="{{ route('teacher.showAssignment', ['classroom' => $classroom->id, 'assignment' => $assignment->id]) }}"
                                                                    class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Lihat</a>
                                                            @endif
                                                    </td>
                                                    <td>
                                                        @if (strtotime(now()) <= strtotime($assignment->end_date))
                                                            <a href="{{ route('', $assignment->id) }}"
                                                                class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Kumpulkan</a>
                                                        @else
                                                            <span class="badge badge-light-danger">Ditutup</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.assignments.edit', $assignment->id) }}"
                                                           class="btn btn-default btn-sm p-1"><i
                                                                class="fonticon-setting fs-2 text-warning"></i></a>
                                                        <button class="btn btn-default btn-sm p-1 btn-delete"
                                                                data-id="{{ $assignment->id }}"><i
                                                                class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                                    </div>
                                                </td> --}}
                                                </tr>
                                            @empty
                                                <x-empty-component title="tugas" />
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
