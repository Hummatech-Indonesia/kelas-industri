@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Overview
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                    <a href="../../index-2.html" class="text-gray-600 text-hover-primary">
                        Home                            </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                    User Profile                                            </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-500">
                    Overview                    </li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="#" class="btn btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
                Tambah            </a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form action="#">
                <!--begin::Card-->
                <div class="card mb-7">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Compact form-->
                        <div class="d-flex align-items-center">
                            <!--begin::Input group-->
                            <div class="position-relative col-12">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
</svg>
</span>
                                <!--end::Svg Icon-->
                                <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search">
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Compact form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </form>
        </div>
<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-5">

        <!--begin::Card-->

        <div class="card card-custom gutter-b card-stretch">

            <!--begin::Body-->

            <div class="card-body">

                <!--begin::Section-->

                <div class="d-flex align-items-center">

                    <!--begin::Pic-->

                    <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle display-2">

                        <img src="https://class.hummasoft.com/public/assets/media/sekolah/20220726214620.png" alt="kanesa">

                    </div>

                    <!--end::Pic-->

                    <!--begin::Info-->

                    <div class="d-flex flex-column mr-auto">

                        <!--begin: Title-->

                        <a href="https://class.hummasoft.com/admin/sekolah/1" class="card-title text-hover-primary fw-bolder font-size-h5 text-dark mb-1">

                            SMKN 1 Kepanjen
                        </a>

                        <span class="text-muted font-weight-bold">

                                                Jl, Ngadiluwih, Kedungpedaringan, Kec. Kepanjen, Kabupaten Malang, Jawa Timur 65163
                                            </span>

                        <!--end::Title-->

                    </div>

                    <!--end::Info-->

                    <div class="card-toolbar mb-7">

                        <!--begin::Modal Hapus-->

                        <div class="modal fade" id="hapus1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">

                            <div class="modal-dialog" role="document">

                                <form action="https://class.hummasoft.com/admin/sekolah/1" method="POST">

                                    <input type="hidden" name="_token" value="1JhD3sheJ9sfg2h2q3aWmi2VCGuQfsz8SACaZQe0">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title" id="exampleModalLabel1">Hapus Sekolah</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <i aria-hidden="true" class="ki ki-close"></i>

                                            </button>

                                        </div>

                                        <div class="modal-body">

                                            <ul id="kt_datatable_fetch_display2" hidden=""></ul>

                                            Apakah Anda yakin untuk menghapus sekolah SMKN 1 Kepanjen?

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>

                                            <button type="submit" class="btn btn-danger font-weight-bold">Hapus</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                        <!--end::Modal-->

                        <button type="submit" class="btn btn-sm" title="Hapus" data-toggle="modal" data-target="#hapus1">

                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/abstract/abs012.svg-->
                            <span class="svg-icon svg-icon-danger svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="currentColor"/>
<path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="currentColor"/>
</svg>
</span>
                            <!--end::Svg Icon-->

                        </button>

                    </div>



                </div>

                <!--end::Section-->

                <!--begin::Content-->

                <!--begin::Progress-->

                <div class="d-flex mt-3 ">

                    <div class="mb-1 col-3 text-center">

                                            <span class="d-block font-weight-bold">

                                                MATERI

                                            </span>

                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">6</span>

                    </div>

                    <div class="mb-1 col-3 text-center">

                                            <span class="d-block font-weight-bold">

                                                SISWA

                                            </span>

                        <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">73</span>

                    </div>

                    <div class="mb-1 col-3 text-center">

                                            <span class="d-block font-weight-bold">

                                                GURU

                                            </span>

                        <span class="btn btn-light-warning btn-sm font-weight-bold btn-upper btn-text">3</span>

                    </div>

                    <div class="mb-1 col-3 text-center">

                                            <span class="d-block font-weight-bold">

                                                KELAS

                                            </span>

                        <span class="btn btn-light-success btn-sm font-weight-bold btn-upper btn-text">2</span>

                    </div>

                </div>

                <!--end::Progress-->

                <!--end::Content-->



            </div>

            <!--end::Body-->

            <!--begin::Footer-->

            <div class="card-footer d-flex align-items-center flex-row justify-content-between">

                <div class="d-flex">

                    <div class="d-flex align-items-center">

                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen055.svg-->
                        <span class="svg-icon svg-icon-primary svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
<path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
<path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
</svg>
</span>
                        <!--end::Svg Icon-->

                        <a href="https://class.hummasoft.com/admin/sekolah/1/edit" class="fw-bold text-primary ms-2">Edit</a>

                    </div>



                </div>

                <a href="https://class.hummasoft.com/admin/sekolah/1" class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-2 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">detail</a>

            </div>

            <!--end::Footer-->

        </div>



        <!--end:: Card-->

    </div>
</div>
    </div>
@endsection
