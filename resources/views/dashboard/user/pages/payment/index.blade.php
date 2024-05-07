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
                                    Pembayaran
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        List Tanggungan Pembayaran anda pada kelas industri.
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_content" class="app-container  container-fluid ">
                    <ul class="nav nav-pills nav-pills-custom" role="tablist">
                        @foreach ($dependents as $index => $li)
                            <!--begin::Item-->
                            <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                <!--begin::Link-->
                                <a class="nav-link d-flex {{ $index === 0 ? 'show active' : '' }} justify-content-between flex-column flex-center overflow-hidden py-4"
                                    data-bs-toggle="pill" href="#kt_stats_widget_2_tab_{{ $li->id }}"
                                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}" role="tab" tabindex="-1"
                                    data-semester="{{ $li->semester }}" data-user="{{ Auth::user()->id }}">
                                    <!--begin::Subtitle-->
                                    <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                        Semester {{ $li->semester }}
                                    </span>
                                    <!--end::Subtitle-->
                                    <!--begin::Bullet-->
                                    <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                    <!--end::Bullet-->
                                </a>
                                <!--end::Link-->
                            </li>
                            <!--end::Item-->
                        @endforeach

                    </ul>

                    <div class="row d-flex">
                        <div class="col-6">
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active"
                                            id="kt_stats_widget_2_tab_c045ef40-0c2b-3338-b645-932b147dce1a" role="tabpanel">

                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table
                                                    class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="fw-bold text-muted">
                                                            <th class="min-w-50px">No</th>
                                                            <th class="min-w-150px">Nominal</th>
                                                            <th class="min-w-150px">Waktu Pembayaran</th>

                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->

                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex justify-content-start flex-column">
                                                                        <div class="text-gray-900 fw-bold fs-7">
                                                                            1
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="text-overflow: ellipsis;overflow: hidden ;max-width: 200px ;white-space: nowrap">
                                                                <span class="text-gray-900 fw-bold fs-7">Rp.
                                                                    50.000</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex justify-content-start flex-column">
                                                                        <div class="text-gray-900 fw-bold fs-7">
                                                                            06 Mei 2024
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->


                                            </div>
                                            <!--end::Table container-->
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Body-->
                            </div>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('student.request-transaction') }}" method="post">
                                @csrf
                                @method('POST')
                                <!--begin::Pos order-->
                                <div class="card card-flush bg-body " id="kt_pos_form">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <div class="card-title fw-bold text-gray-800 fs-1">Pembayaran</div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Summary-->
                                        <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                                            <!--begin::Content-->
                                            <div class="fs-6 fw-bold text-white">
                                                <span class="d-block lh-1 mb-2">Pembayaran semester ini</span>
                                                <span class="d-block mb-2">Tanggungan semester ini</span>
                                                <span class="d-block mb-9">Biaya Layanan</span>
                                                <span class="d-block fs-1 lh-1">Total Tanggungan</span>
                                            </div>
                                            <!--end::Content-->

                                            <!--begin::Content-->
                                            <div class="fs-6 fw-bold text-white text-end">
                                                <span class="d-block lh-1 mb-2" data-kt-pos-element="total"
                                                    id="total_bayar"></span>
                                                <span class="d-block mb-2" data-kt-pos-element="discount"
                                                    id="tanggungan_pembayaran"></span>
                                                <span class="d-block mb-9" data-kt-pos-element="tax"
                                                    id="biaya-layanan"></span>
                                                <span class="d-block fs-1 lh-1" data-kt-pos-element="grant-total"
                                                    id="total_sisa"></span>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Summary-->

                                        <!--begin::Payment Method-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <h2 class="fw-bold text-gray-800 mb-5">Metode Pembayaran</h1>
                                                <!--end::Title-->

                                                <!--begin::Radio group-->
                                                <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-12"
                                                    data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]"
                                                    data-kt-initialized="1">
                                                    <input type="hidden" name="nominal" id="nominal" value="">
                                                    <!--begin::Radio-->
                                                    @foreach ($channels as $channel)
                                                        <label
                                                            class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 {{ $loop->first ? 'active' : '' }}"
                                                            data-kt-button="true">
                                                            <!--begin::Input-->
                                                            <input class="btn-check"
                                                                data-fee="{{ $channel->total_fee->flat }}" type="radio"
                                                                name="method" value="{{ $channel->code }}"
                                                                {{ $loop->first ? 'checked' : '' }}>
                                                            <!--end::Input-->

                                                            <!--begin::Icon-->
                                                            <img src="https://assets.tripay.co.id/upload/payment-icon/n22Qsh8jMa1583433577.png"
                                                                alt="" class="img-fluid mb-2" style="height: 35px;">
                                                            <!--end::Icon-->

                                                            <!--begin::Title-->
                                                            <span class="fs-7 fw-bold d-block">{{ $channel->name }}
                                                                {{ $channel->maximum_fee }}</span>
                                                            <!--end::Title-->
                                                        </label>
                                                    @endforeach


                                                    <!--end::Radio-->
                                                </div>
                                                <!--end::Radio group-->

                                                <!--begin::Actions-->
                                                <button type="submit"
                                                    class="btn btn-primary fs-1 w-100 py-4">Bayar</button>
                                                <!--end::Actions-->
                                        </div>
                                        <!--end::Payment Method-->
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                                <!--end::Pos order-->

                            </form>
                        </div>

                    </div>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Fungsi untuk memformat angka ke format rupiah
            function numberFormat(angka) {
                var rupiah = '';
                var angkarev = angka.toString().split('').reverse().join('');
                for (var i = 0; i < angkarev.length; i++)
                    if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
            }
            var currentFee = $('.btn-check:checked').data('fee');

            $('#biaya-layanan').html(numberFormat(currentFee));

            function fetchData() {
                var semester = $('a[data-semester]').first().data('semester');
                var userId = $('a[data-semester]').first().data('user');
                if (semester && userId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('student.total.dependent', ['semester' => ':semester', 'user' => ':user']) }}"
                            .replace(':semester', semester).replace(':user', userId),
                        success: function(response) {
                            $('#total_bayar').html(numberFormat(response.totalBayar));
                            $('#tanggungan_pembayaran').html(numberFormat(response.nominal.nominal));
                            $('#total_sisa').html(numberFormat(response.nominal.nominal - response
                                .totalBayar + currentFee));
                            const nominal = response.nominal.nominal - response
                                .totalBayar;
                                $('#nominal').val(nominal);
                        }
                    });
                }
            }

            fetchData();

            $('.btn-check').click(function() {
                var fee = $(this).data('fee');
                currentFee = fee;
                $('#biaya-layanan').html(numberFormat(fee));
                $('.btn').removeClass('active');
                $(this).parent().addClass('active');

                fetchData();
            });
        });
    </script>
@endsection
