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
                <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-2 ">

                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-fluid ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper ">

                            <div class="d-flex justify-content-between mb-5">
                                <div class="page-title flex-column gap-1 me-3">
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
                                <div class="">
                                    @if ($payment->invoice_status == 'UNPAID')
                                        <button id="check-status-btn" class="btn btn-sm btn-primary">
                                            Cek Status <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M3.75 17L8 12.75V16h10v-4.5l2-2V16a2 2 0 0 1-2 2H8v3.25L3.75 17m16.5-10L16 11.25V8H6v4.5l-2 2V8a2 2 0 0 1 2-2h10V2.75L20.25 7z"
                                                    fill="currentColor" />
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            Belum Terbayar <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M3 16.74L7.76 12L3 7.26L7.26 3L12 7.76L16.74 3L21 7.26L16.24 12L21 16.74L16.74 21L12 16.24L7.26 21zm9-3.33l4.74 4.75l1.42-1.42L13.41 12l4.75-4.74l-1.42-1.42L12 10.59L7.26 5.84L5.84 7.26L10.59 12l-4.75 4.74l1.42 1.42z"/></svg>
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-success">
                                            Terbayar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19.78 2.2L24 6.42L8.44 22L0 13.55l4.22-4.22l4.22 4.22zm0 2.8L8.44 16.36l-4.22-4.17l-1.41 1.36l5.63 5.62L21.19 6.42z"/></svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <!--begin::Page title-->
                            <div class="alert alert-danger d-flex align-items-center p-4">
                                <!--begin::Icon-->
                                <span class="svg-icon svg-icon-2hx svg-icon-primary">
                                    <span class="svg-icon svg-icon-2hx svg-icon-danger"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                fill="currentColor" />
                                            <rect x="11" y="14" width="7" height="2" rx="1"
                                                transform="rotate(-90 11 14)" fill="currentColor" />
                                            <rect x="11" y="17" width="2" height="2" rx="1"
                                                transform="rotate(-90 11 17)" fill="currentColor" />
                                        </svg>
                                    </span>
                                </span>
                                <!--end::Icon-->

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column">
                                    <!--begin::Title-->
                                    <h4 class="mb-1 text-danger">Informasi</h4>
                                    <!--end::Title-->
                                    <!--begin::Content-->
                                    <ul>
                                        <li>
                                            <h6>
                                                Jangan keluar dari halaman ini sebelum menyelesaikan pembayaran, karena
                                                halaman ini tidak bisa diakses lagi nantinya
                                            </h6>
                                        </li>
                                        <li>
                                            <h6>
                                                untuk cek status pembayaran silahkan klik button CEK
                                                STATUS
                                            </h6>
                                        </li>
                                        <li>
                                            <h6>
                                                Jika status terbayar akan muncul button selesai, jika diklik akan
                                                mengarah kehalaman invoice pembayaran
                                            </h6>
                                        </li>
                                    </ul>

                                    <!--end::Content-->

                                </div>
                                <!--end::Wrapper-->
                            </div>

                            <!--end::Tab content-->
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <div id="kt_content" class="app-container  container-fluid ">
                    <div class="row">
                        <div class="col-7">
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-header justify-content-center bg-primary text-center"
                                    style="min-height:50px;border-radius:10px">
                                    <h3 class="card-title text-white">Rincian Pembayaran
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
                                        <div class=" fw-bold fs-6 me-2">Pembayaran Paket</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">

                                            <!--begin::Number-->
                                            <span class="text-primary fw-bolder fs-5">Rp.
                                                {{ number_format($detailPayment->amount) }}</span>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-solid my-3"></div>
                                    <!--end::Separator-->

                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="fw-bold fs-6 me-2">Biaya Layanan</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">
                                            <span class="text-primary fw-bolder fs-5">Rp.
                                                {{ number_format($detailPayment->fee_merchant) }}</span>


                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-solid my-3"></div>
                                    <!--end::Separator-->

                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="fw-bold fs-6 me-2">Total Pembayaran</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">

                                            <!--begin::Number-->
                                            <span class="text-primary fw-bolder fs-5">Rp.
                                                {{ number_format($detailPayment->amount + $detailPayment->fee_merchant) }}</span>
                                            <!--end::Number-->


                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--begin::Separator-->
                                    <div class="separator separator-solid my-3"></div>
                                    <!--end::Separator-->

                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="fw-bold fs-6 me-2">Kode Transaksi</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">

                                            <!--begin::Number-->
                                            <span class="text-primary fw-bolder fs-5">{{ $detailPayment->reference }}</span>
                                            <!--end::Number-->


                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--begin::Separator-->
                                    <div class="separator separator-solid my-3"></div>
                                    <!--end::Separator-->

                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="fw-bold fs-6 me-2">Bayar Sebelum Tanggal</div>
                                        <!--end::Section-->

                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-senter">

                                            <!--begin::Number-->
                                            <span
                                                class="text-primary fw-bolder fs-5">{{ Carbon::parse($detailPayment->expired_time)->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                                            <!--end::Number-->


                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--end::Item-->
                                    <div class="separator separator-solid my-3"></div>


                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ $payment->icon_url }}" alt="" class="img-fluid me-2"
                                                style="height: 25px;">
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold fs-5 me-2">
                                                {{ $detailPayment->payment_method }}</div>
                                            <div class="separator separator-solid my-3"></div>
                                        </div>
                                    </div>

                                    <!--begin::Section-->
                                    <div class="row">
                                        <div class="col-2">

                                        </div>
                                        <div class="col d-flex justify-content-between">
                                            <div class="">
                                                <div class="fw-bold fs-5 me-2">Kode Pembayaran</div>
                                                <div class="text-primary fw-bold fs-3 me-2">{{ $detailPayment->pay_code }}
                                                </div>
                                            </div>
                                            @if ($payment->invoice_status == 'PAID')
                                                <div class="">
                                                    <a href="{{ route('student.detail-payment', $payment->id) }}"
                                                        class="btn btn-primary btn-md">Selesai</a>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Section-->

                                    </div>

                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-header justify-content-center bg-primary text-center"
                                    style="min-height:50px;border-radius:10px">
                                    <h3 class="card-title text-white">Instruksi Pembayaran
                                    </h3>
                                </div>
                                {{-- <div class="card-body"> --}}
                                @php $index = 0; @endphp
                                @foreach ($detailPayment->instructions as $instruction)
                                    <div class="card-header collapsible cursor-pointer rotate collapsed"
                                        style="min-height: 50px;" data-bs-toggle="collapse"
                                        data-bs-target="#kt_docs_card_collapsible{{ $index }}">
                                        <h3 class="card-title">{{ $instruction->title }}</h3>
                                        <div class="card-toolbar rotate-180">
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="22"
                                                    height="22" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="kt_docs_card_collapsible{{ $index }}" class="collapse">
                                        <div class="card-body">
                                            @foreach ($instruction->steps as $step)
                                                {!! $step !!}
                                            @endforeach
                                        </div>
                                    </div>
                                    @php $index++; @endphp
                                @endforeach

                                {{-- </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.querySelectorAll('[data-kt-button]').forEach(button => {
            button.addEventListener('click', function() {
                const parentDiv = this.closest('div[data-kt-buttons]');
                parentDiv.querySelectorAll('.btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
    <script>
        document.getElementById('check-status-btn').addEventListener('click', function() {
            location.reload();
        });
    </script>
@endsection
