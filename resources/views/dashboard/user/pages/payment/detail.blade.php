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
                                    Detail Pembayaran
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        Detail Tanggungan Pembayaran anda pada kelas industri.
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <a href="{{ route('student.student-payment') }}"
                                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                <i class="bi bi-arrow-left me-2"></i> Kembali
                            </a>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <div id="kt_content" class="app-container  container-fluid ">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-header justify-content-center bg-primary text-center"
                                    style="min-height:50px;border-radius:10px">
                                    <h3 class="card-title text-white">Status Pembayaran
                                    </h3>
                                </div>
                                <!--begin::Title-->

                                <!--end::Title-->
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Item-->
                                    <img src="{{ asset('app-assets/media/illustrations/payment_success.png') }}"
                                        style="width: 100%;" alt="" srcset="">
                                    <div class="text-center text-black fs-2 fw-bold">
                                        Pembayaran Berhasil
                                    </div>

                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-header justify-content-center bg-primary text-center"
                                    style="min-height:50px;border-radius:10px">
                                    <h3 class="card-title text-white">Detail Pembayaran
                                    </h3>
                                </div>
                                <!--begin::Title-->

                                <!--end::Title-->
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class=" fw-bold fw-bold fs-5 me-2">Paket Siswa Semester
                                            {{ $payment->semester }}</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">

                                            <!--begin::Number-->
                                            `
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-solid my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class=" fw-bold fw-bold fs-5 me-2">Total Pembayaran</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">

                                            <!--begin::Number-->
                                            <span class="text-primary fw-bolder fs-5">Rp.
                                                {{ number_format($payment->total_pay), 0, ',', '.' }}
                                            </span>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-solid my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class=" fw-bold fw-bold fs-5 me-2">Metode Pembayaran</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">

                                            <!--begin::Number-->
                                            <span class="text-primary fw-bolder fs-5">{{ $payment->via }}
                                            </span>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-solid my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class=" fw-bold fw-bold fs-5 me-2">Tagihan Dibuat</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">

                                            <!--begin::Number-->
                                            <span
                                                class="text-black fw-semibold fs-5">{{ Carbon::parse($payment->created_at)->locale('id')->isoFormat('D MMMM YYYY, H:m') }}
                                            </span>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class=" fw-bold fw-bold fs-5 me-2">Tagihan Dibayar</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">

                                            <!--begin::Number-->
                                            <span
                                                class="text-black fw-semibold fs-5">{{ Carbon::parse($payment->updated_at)->locale('id')->isoFormat('D MMMM YYYY, H:m') }}
                                            </span>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-solid my-3"></div>
                                    <a href="{{ route('student.print.transaction', $payment->id) }}"
                                        class="text-primary text-center justify-content-center d-flex fw-bold fw-bold fs-3 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 15.575q-.2 0-.375-.062T11.3 15.3l-3.6-3.6q-.3-.3-.288-.7t.288-.7q.3-.3.713-.312t.712.287L11 12.15V5q0-.425.288-.712T12 4t.713.288T13 5v7.15l1.875-1.875q.3-.3.713-.288t.712.313q.275.3.288.7t-.288.7l-3.6 3.6q-.15.15-.325.213t-.375.062M6 20q-.825 0-1.412-.587T4 18v-2q0-.425.288-.712T5 15t.713.288T6 16v2h12v-2q0-.425.288-.712T19 15t.713.288T20 16v2q0 .825-.587 1.413T18 20z" />
                                        </svg> Simpan Invoice</a>
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
