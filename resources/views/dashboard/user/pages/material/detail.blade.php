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
                                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Berkenalan Dengan HTML
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        5 Tugas
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <a href="{{ url()->previous() }}" class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->        </div>
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

                                                <span class="font-size-h3 symbol-label font-weight-boldest">MA</span>

                                            </div>

                                        </div>

                                        <!--end: Pic-->



                                        <!--begin: Info-->

                                        <div class="flex-grow-1">

                                            <!--begin: Title-->

                                            <div class="d-flex align-items-center justify-content-between flex-wrap">

                                                <div class="mr-3">

                                                    <!--begin::Name-->

                                                    <span class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">

                                        Materi 1 - Berkenalan Dengan HTML

                                    </span>

                                                    <!--end::Name-->





                                                </div>

                                                <div class="my-lg-0 my-1">

                                                    <a href="https://class.hummasoft.com/siswa/view/materi-siswa/11" class="btn btn-sm btn-danger font-weight-bolder text-uppercase">Lihat Materi</a>

                                                </div>

                                            </div>

                                            <!--end: Title-->



                                            <!--begin: Content-->

                                            <div class="d-flex align-items-center flex-wrap justify-content-between">

                                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">

                                                    <div style="width: 45vw">

                                                        Mengenal HTML Dasar
                                                    </div>

                                                </div>



                                                <div class="d-flex flex-wrap align-items-center py-2">

                                                    <div class="d-flex align-items-center me-10">

                                                        <div class="me-6">

                                                            <div class="font-weight-bold mb-2">Tugas Selesai</div>

                                                            <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">0</span>

                                                        </div>

                                                        <div class="">

                                                            <div class="font-weight-bold mb-2">Tugas Belum</div>

                                                            <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">0</span>

                                                        </div>

                                                    </div>

                                                    <div class="flex-grow-1 flex-shrink-0 w-150px w-xl-300px mt-4 mt-sm-0">

                                                        <span class="font-weight-bold">Progress</span>

                                                        <div class="progress progress-xs mt-2 mb-2">


                                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>


                                                        </div>

                                                        <span class="ml-3 font-weight-bolder">0%</span>

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

                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14 18V16H10V18L9 20H15L14 18Z" fill="currentColor"/>
                                                <path opacity="0.3" d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z" fill="currentColor"/>
                                                </svg>
                                                </span>

                                            </span>

                                            <div class="d-flex flex-column text-dark-75">

                                                <span class="font-weight-bolder font-size-sm">Rata-rata nilai</span>

                                                <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>0</span>

                                            </div>

                                        </div>

                                        <!--end: Item-->

                                        <!--begin: Item-->

                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">

                                            <span class="me-4">

                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M10.3 14.3L11 13.6L7.70002 10.3C7.30002 9.9 6.7 9.9 6.3 10.3C5.9 10.7 5.9 11.3 6.3 11.7L10.3 15.7C9.9 15.3 9.9 14.7 10.3 14.3Z" fill="currentColor"/>
                                                <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM11.7 15.7L17.7 9.70001C18.1 9.30001 18.1 8.69999 17.7 8.29999C17.3 7.89999 16.7 7.89999 16.3 8.29999L11 13.6L7.70001 10.3C7.30001 9.89999 6.69999 9.89999 6.29999 10.3C5.89999 10.7 5.89999 11.3 6.29999 11.7L10.3 15.7C10.5 15.9 10.8 16 11 16C11.2 16 11.5 15.9 11.7 15.7Z" fill="currentColor"/>
                                                </svg>
                                                </span>

                                            </span>

                                            <div class="d-flex flex-column text-dark-75">

                                                <span class="font-weight-bolder font-size-sm">Dinilai</span>

                                                <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>0</span>

                                            </div>

                                        </div>

                                        <!--end: Item-->



                                        <!--begin: Item-->

                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">

                                            <span class="me-4">

                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M12 10.6L14.8 7.8C15.2 7.4 15.8 7.4 16.2 7.8C16.6 8.2 16.6 8.80002 16.2 9.20002L13.4 12L12 10.6ZM10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 8.99999 16.4 9.19999 16.2L12 13.4L10.6 12Z" fill="currentColor"/>
                                                <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM13.4 12L16.2 9.20001C16.6 8.80001 16.6 8.19999 16.2 7.79999C15.8 7.39999 15.2 7.39999 14.8 7.79999L12 10.6L9.2 7.79999C8.8 7.39999 8.2 7.39999 7.8 7.79999C7.4 8.19999 7.4 8.80001 7.8 9.20001L10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 9 16.4 9.2 16.2L12 13.4L14.8 16.2C15 16.4 15.3 16.5 15.5 16.5C15.7 16.5 16 16.4 16.2 16.2C16.6 15.8 16.6 15.2 16.2 14.8L13.4 12Z" fill="currentColor"/>
                                                </svg>
                                                </span>

                                            </span>

                                            <div class="d-flex flex-column flex-lg-fill">

                                                <span class="font-weight-bolder font-size-sm">Belum Dinilai</span>

                                                <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold"></span>0</span>

                                            </div>

                                        </div>

                                        <!--end: Item-->





                                    </div>

                                    <!--begin: Items-->

                                </div>

                            </div>

                        </div>
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-header pt-7">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-800">Tugas</span>
                                        <span class="text-gray-400 mt-1 fw-semibold fs-6">list tugas anda.</span>
                                    </h3>
                                    <!--end::Title-->
                                </div>
                                <div class="card-body">

                                    <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                        <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800">
                                            <th class="min-w-300px" data-priority="1">Judul</th>
                                            <th class="min-w-300px">Deskripsi</th>
                                            <th class="min-w-100px" data-priority="2">Nilai</th>
                                            <th class="min-w-100px" data-priority="3">Tenggat</th>
                                            <th class="min-w-100px" data-priority="4">Status</th>
                                            <th class="min-w-100px" data-priority="5">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td><span class="badge badge-light-danger">2011/04/25</span></td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Accountant</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium adipisci, assumenda at dignissimos doloribus, est eveniet illum iusto libero magni quae quaerat quam quia tempore! Consequuntur corporis dolor temporibus!</td>
                                            <td>63</td>
                                            <td><span class="badge badge-light-danger">2011/04/25</span></td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
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
                    <span class="text-muted fw-semibold me-1">{{ \Carbon\Carbon::now()->format('Y') }}©</span>
                    <a href="https://keenthemes.com/" target="_blank" class="text-gray-800 text-hover-primary">Kelas Industri</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item"><a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">Tentang Kami</a></li>

                    <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank" class="menu-link px-2">Syarat & Ketentuan</a></li>

                    <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Kebijakan Privasi</a></li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
@endsection
