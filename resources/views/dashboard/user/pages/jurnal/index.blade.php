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
                                    Jurnal
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->

                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">

                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        List jurnal pada kelas industri.
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->

                                    <!--end::Item-->

                                    <!--begin::Item-->

                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <a href="{{ route('mentor.jurnal.create') }}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
                                    Buat Jurnal
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
                            <div class="card">

                                <!--begin::Card body-->
                                <div class="card-body pt-0">

                                    <!--begin::Table-->
                                    @if($journals->count() > 0)
                                    <table id="kt_datatable_responsive"
                                        class="table table-striped border rounded gy-5 gs-7">
                                        <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Kelas</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->

                                        <!--begin::Table body-->
                                        <tbody class="fw-semibold text-gray-600">
                                        @foreach ($journals as $journal)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$journal->title}}</td>
                                            <td>{{ \Carbon\Carbon::parse($journal->date)->locale('id')->isoFormat('D MMMM YYYY') }}
                                            </td>
                                            <td>{{$journal->classroom->name}}</td>
                                            <td>{{$journal->description}}</td>
                                            <td>
                                                <button class="btn btn-default btn-update btn-sm p-1">
                                                    <i class="fonticon-setting fs-2 text-warning"></i>
                                                </button>
                                                <button class="btn btn-default btn-sm p-1 btn-delete">
                                                    <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                                </button></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    @else
                                    <x-empty-component title="jurnal"/>
                                    @endif
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
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
    <x-delete-modal-component />
    {{--    Update Status --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tutup Absen</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="form-update" action="" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menutup absen? siswa tidak akan dapat absen lagi</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Tutup Absen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    end Update Statusl --}}
@endsection
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
@endsection
