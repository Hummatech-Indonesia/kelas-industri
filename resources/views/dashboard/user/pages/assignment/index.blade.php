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
                    <div id="kt_app_toolbar_container"
                         class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    {{ 'aa' }}
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        {{ 'aa' }} Tugasg
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
                                            <th data-priority="1">No</th>
                                            <th class="min-w-200px" data-priority="2">Nama</th>
                                            <th class="min-w-200px" data-priority="3">File</th>
                                            <th data-priority="4">Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->name }}</td>
                                                @if($student->submitAssignment)
                                                    <td>{{ $student->submitAssignment->file }}</td>
                                                    @if($student->submitAssignment->point)
                                                        <td>{{ $student->submitAssignment->point }}</td>
                                                        <td>-</td>
                                                    @else
                                                        <td>-</td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm">Nilai</button>
                                                        </td>
                                                    @endif
                                                @else
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                @endif

                                            </tr>
                                        @empty
                                            <x-empty-component title="tugas"/>
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