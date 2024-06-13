@php
    use Carbon\Carbon;
@endphp
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
                                    Penilaian Soal Essay Pada Ujian
                                </h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="#" class="text-muted text-hover-primary">
                                            List Penilaian Soal Essay Pada Ujian</a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->


                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <div class="d-flex align-items-center">
                                    <a href="http://127.0.0.1:8000/classrooms"
                                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                        <i class="bi bi-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                        <div id="kt_app_toolbar_container">
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade active show" id="kt_vtab_pane_1"
                                                        role="tabpanel">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="fw-bold fs-4">
                                                                Soal Essay
                                                            </div>
                                                            <div class="">
                                                                <input type="number" name="" placeholder="Nilai"
                                                                    class="form-control form-control-solid" id="">
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 fw-semibold fs-6">
                                                            Lorem ipsum Dolor Sit Amet Lorem ipsum Dolor Sit Amet
                                                        </div>
                                                        <div class="mt-3 fw-bold fs-4">
                                                            Jawaban
                                                        </div>
                                                        <div class="mt-3 fw-semibold fs-6">
                                                            Lorem ipsum Dolor Sit Amet Lorem ipsum Dolor Sit Amet, Lorem
                                                            ipsum Dolor Sit Amet Lorem ipsum Dolor Sit Amet,
                                                            Lorem ipsum Dolor Sit Amet Lorem ipsum Dolor Sit Amet, Lorem
                                                            ipsum Dolor Sit Amet Lorem ipsum Dolor Sit Amet,
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th class="">
                                                                    <span class="dt-column-title fw-bold">No</span>
                                                                </th>
                                                                <th class="">
                                                                    <span class="dt-column-title fw-bold">Nama</span>
                                                                </th>
                                                                <th class="">
                                                                    <span class="dt-column-title fw-bold">Kelas</span>
                                                                </th>
                                                                <th class="">
                                                                    <span class="dt-column-title fw-bold">Opsi</span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="fw-semibold">
                                                            <tr>
                                                                <td class="">
                                                                    1
                                                                </td>
                                                                <td class="">
                                                                    Alfian Fahrul Himawan S. Tr. Kom
                                                                </td>
                                                                <td class="">
                                                                    X RPL A
                                                                </td>
                                                                <td class="">
                                                                    <a class="nav-link active btn-sm btn-light-primary btn"
                                                                        data-bs-toggle="tab" href="#kt_vtab_pane_1"
                                                                        aria-selected="true" role="tab">Pilih</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="">
                                                                    2
                                                                </td>
                                                                <td class="">
                                                                    Alfian Fahrul Himawan S. Tr. Kom
                                                                </td>
                                                                <td class="">
                                                                    X RPL A
                                                                </td>
                                                                <td class="">
                                                                    <a class="nav-link btn-sm btn-light-primary btn"
                                                                        data-bs-toggle="tab" href="#kt_vtab_pane_2"
                                                                        aria-selected="true" role="tab">Pilih</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                    </div>
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer ">
                        <!--begin::Footer container-->
                        <div
                            class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">{{ Carbon::now()->format('Y') }}©</span>
                                <a href="#"class="text-gray-800 text-hover-primary">Kelas
                                    Industri</a>
                            </div>
                            <!--end::Copyright-->

                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item"><a href="#" class="menu-link px-2">Tentang
                                        Kami</a></li>

                                <li class="menu-item"><a href="#" class="menu-link px-2">Syarat & Ketentuan</a></li>

                                <li class="menu-item"><a href="#" class="menu-link px-2">Kebijakan Privasi</a></li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
            </div>
        @endsection
