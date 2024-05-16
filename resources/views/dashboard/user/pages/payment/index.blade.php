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
                                    <span class="nav-text text-gray-700 fw-bold fs-6 lh-1"
                                        id="tab-semester-{{ $li->semester }}" data-semester="semester-{{ $li->semester }}">
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
                                    @foreach ($dependents as $index => $tabContent)
                                        <div class="tab-content">
                                            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                                id="kt_stats_widget_2_tab_{{ $tabContent->id }}" role="tabpanel">

                                                <!--begin::Table container-->
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table
                                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                                        <!--begin::Table head-->
                                                        <thead>
                                                            <tr class="fw-bold text-muted">
                                                                <th class="min-w-50px">No</th>
                                                                <th class="min-w-100px">Nominal</th>
                                                                <th class="min-w-100px">Waktu Pembayaran</th>
                                                                <th class="min-w-50px">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <!--end::Table head-->

                                                        <!--begin::Table body-->
                                                        <tbody>
                                                            @php
                                                                $counter = 1;
                                                            @endphp
                                                            @forelse ($trackings->where('semester', $tabContent->semester) as $index => $tracking)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div
                                                                                class="d-flex justify-content-start flex-column">
                                                                                <div class="text-gray-900 fw-bold fs-7">
                                                                                    {{ $counter++ }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                    <td
                                                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 200px ;white-space: nowrap">
                                                                        <span class="text-gray-900 fw-bold fs-7">Rp
                                                                            {{ number_format($tracking->total_pay), 0, ',', '.' }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div
                                                                                class="d-flex justify-content-start flex-column">
                                                                                <div class="text-gray-900 fw-bold fs-7">
                                                                                    {{ Carbon::parse($tracking->payment_date)->locale('id')->isoFormat('D MMMM YYYY') }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('student.detail-payment', $tracking->id) }}"
                                                                            class="btn btn-primary btn-sm">
                                                                            Detail
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <x-empty-component title="transaksi" />
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                        <!--end::Table body-->
                                                    </table>
                                                    <!--end::Table-->


                                                </div>
                                                <!--end::Table container-->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!--begin::Body-->
                            </div>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('student.request-transaction') }}" method="post" id="payment_form">
                                @csrf
                                @method('POST')
                                <!--begin::Pos order-->
                                <input type="hidden" name="nominal" id="nominal" value="">

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
                                                <span class="d-block mb-2">Metode Pembayaran</span>
                                                <span class="d-block mb-9"></span>
                                                <span class="d-block fs-1 lh-1">Total Tanggungan</span>
                                            </div>


                                            <!--begin::Content-->
                                            <div class="fs-6 fw-bold text-white text-end">
                                                <span class="d-block lh-1 mb-2 total_bayar"
                                                    data-kt-pos-element="total"></span>
                                                <span class="d-block lh-1 mb-2 metode" data-kt-pos-element="method"></span>
                                                <span class="d-block mb-2 tanggungan_pembayaran"
                                                    data-kt-pos-element="discount"></span>
                                                <span class="d-block mb-9" data-kt-pos-element="tax"></span>
                                                <span class="d-block fs-1 lh-1 total_sisa"
                                                    data-kt-pos-element="grant-total"></span>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Summary-->
                                        <div class="mb-5">
                                            <label for="flexCheckDefault" class="form-label">Pilih Semester</label>
                                            <select name="semester" class="form-select form-select-solid" id="">
                                                @foreach ($dependents as $dependet)
                                                    <option value="{{ $dependet->semester }}"
                                                        id="semester-{{ $dependet->semester }}">Semester
                                                        {{ $dependet->semester }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Content-->
                                        <div class="mb-5">
                                            <div class="form-check">
                                                <input class="form-check-input" name="installment" type="checkbox"
                                                    value="" id="installmentCheckbox" />
                                                <label for="flexCheckDefault" class="form-label">Ingin Menyicil
                                                    Terlebih
                                                    Dahulu?</label>
                                            </div>
                                            <div class="" id="div-installment" style="display: none">
                                                <label for="installment_payment" class="form-label">Inputkan Nominal Yang
                                                    Ingin Anda
                                                    Bayarkan</label>
                                                <input type="number" name="installment_payment"
                                                    class="form-control form-control-solid" placeholder="Rp. 50.000"
                                                    id="">
                                            </div>
                                        </div>
                                        <!--begin::Payment Method-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <h2 class="fw-bold text-gray-800 mb-5">Pilih Metode Pembayaran</h2>
                                            <!--end::Title-->
                                            <div class="card shadow-sm mb-5">
                                                <div class="card-header collapsible cursor-pointer"
                                                    data-bs-toggle="collapse" data-bs-target="#virtualAccountCollapsible">
                                                    <h3 class="card-title">Virtual Account</h3>
                                                    <div class="card-toolbar">
                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="virtualAccountCollapsible" class="collapse">
                                                    <div class="card-body">
                                                        <div class="row d-flex flex-equal" data-kt-buttons="true"
                                                            data-kt-buttons-target="[data-kt-button]">
                                                            @foreach ($channels as $channel)
                                                                @if ($channel->group == 'Virtual Account')
                                                                    <input type="hidden" name="icon_url"
                                                                        value="{{ $channel->icon_url }}">
                                                                    <div class="col-4 mb-5">
                                                                        <label
                                                                            class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 {{ $loop->first ? 'active' : '' }}"
                                                                            data-kt-button="true">
                                                                            <!--begin::Input-->
                                                                            <input class="btn-check" type="radio"
                                                                                name="method"
                                                                                value="{{ $channel->code }}"
                                                                                {{ $loop->first ? 'checked' : '' }}>
                                                                            <!--end::Input-->

                                                                            <!--begin::Icon-->
                                                                            <img src="{{ $channel->icon_url }}"
                                                                                alt="" class="img-fluid mb-2"
                                                                                style="height: 35px;">
                                                                            <!--end::Icon-->

                                                                            <!--begin::Title-->
                                                                            <span
                                                                                class="fs-7 fw-bold d-block">{{ $channel->name }}</span>
                                                                            <!--end::Title-->
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow-sm mb-5">
                                                <div class="card-header collapsible cursor-pointer"
                                                    data-bs-toggle="collapse" data-bs-target="#eWalletCollapsible">
                                                    <h3 class="card-title">E-wallet</h3>
                                                    <div class="card-toolbar">
                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="eWalletCollapsible" class="collapse">
                                                    <div class="card-body">
                                                        <div class="row d-flex flex-equal" data-kt-buttons="true"
                                                            data-kt-buttons-target="[data-kt-button]">
                                                            @foreach ($channels as $channel)
                                                                @if ($channel->group == 'E-Wallet')
                                                                    <input type="hidden" name="icon_url"
                                                                        value="{{ $channel->icon_url }}">
                                                                    <div class="col-4 mb-5">
                                                                        <label
                                                                            class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 {{ $loop->first ? 'active' : '' }}"
                                                                            data-kt-button="true">
                                                                            <!--begin::Input-->
                                                                            <input class="btn-check" type="radio"
                                                                                name="method"
                                                                                value="{{ $channel->code }}"
                                                                                {{ $loop->first ? 'checked' : '' }}>
                                                                            <!--end::Input-->

                                                                            <!--begin::Icon-->
                                                                            <img src="https://assets.tripay.co.id/upload/payment-icon/n22Qsh8jMa1583433577.png"
                                                                                alt="" class="img-fluid mb-2"
                                                                                style="height: 35px;">
                                                                            <!--end::Icon-->

                                                                            <!--begin::Title-->
                                                                            <span
                                                                                class="fs-7 fw-bold d-block">{{ $channel->name }}</span>
                                                                            <!--end::Title-->
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow-sm mb-5">
                                                <div class="card-header collapsible cursor-pointer"
                                                    data-bs-toggle="collapse" data-bs-target="#retailOutletCollapsible">
                                                    <h3 class="card-title">Retail Outlet</h3>
                                                    <div class="card-toolbar">
                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="retailOutletCollapsible" class="collapse">
                                                    <div class="card-body">
                                                        <div class="row d-flex flex-equal" data-kt-buttons="true"
                                                            data-kt-buttons-target="[data-kt-button]">
                                                            @foreach ($channels as $channel)
                                                                <input type="hidden" name="icon_url"
                                                                    value="{{ $channel->icon_url }}">
                                                                @if ($channel->group == 'Convenience Store')
                                                                    <div class="col-4 mb-5">
                                                                        <label
                                                                            class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 {{ $loop->first ? 'active' : '' }}"
                                                                            data-kt-button="true">
                                                                            <!--begin::Input-->
                                                                            <input class="btn-check" type="radio"
                                                                                name="method"
                                                                                value="{{ $channel->code }}"
                                                                                {{ $loop->first ? 'checked' : '' }}>
                                                                            <!--end::Input-->

                                                                            <!--begin::Icon-->
                                                                            <img src="https://assets.tripay.co.id/upload/payment-icon/n22Qsh8jMa1583433577.png"
                                                                                alt="" class="img-fluid mb-2"
                                                                                style="height: 35px;">
                                                                            <!--end::Icon-->

                                                                            <!--begin::Title-->
                                                                            <span
                                                                                class="fs-7 fw-bold d-block">{{ $channel->name }}</span>
                                                                            <!--end::Title-->
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--begin::Actions-->
                                            <button type="button" class="btn btn-primary fs-1 w-100 py-4"
                                                id="confirmation_btn" data-bs-toggle="modal"
                                                data-bs-target="#confirmation_modal">Bayar</button>
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

                <div class="modal fade" tabindex="-1" id="confirmation_modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Anda yakin ingin melakukan pembayaran?</h3>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>

                            <div class="modal-body">
                                <div class="d-flex flex-stack rounded-3 p-6 mb-11">
                                    <!--begin::Content-->
                                    <div class="fs-6 fw-bold text-black">
                                        <span class="d-block mb-2">Tanggungan semester ini</span>
                                        <span class="d-block mb-2"></span>
                                        <span class="d-block mb-9"></span>
                                        <span class="d-block fs-1 h-5">Total Pembayaran</span>
                                    </div>


                                    <!--begin::Content-->
                                    <div class="fs-6 fw-bold text-black text-end">
                                        <span class="d-block mb-2 tanggungan_pembayaran"
                                            data-kt-pos-element="discount">Rp. 10.000</span>
                                        <span class="d-block mb-9" data-kt-pos-element="tax"></span>
                                        <span class="d-block fs-1 lh-1 total_sisa" data-kt-pos-element="grant-total">Rp.
                                            10.000</span>
                                    </div>
                                    <!--end::Content-->
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="submit_payment">Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var semester = $('a[data-semester]').first().data('semester');
            var userId = $('a[data-semester]').first().data('user');
            if (semester && userId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('student.total.dependent', ['semester' => ':semester', 'user' => ':user']) }}"
                        .replace(':semester', semester).replace(':user', userId),
                    success: function(response) {
                        $('.total_bayar').html(numberFormat(response.totalBayar));
                        $('.tanggungan_pembayaran').html(numberFormat(response.nominal.nominal));
                        $('.total_sisa').html(numberFormat(response.nominal.nominal - response
                            .totalBayar));
                        $('#nominal').val(response.nominal.nominal -
                            response.totalBayar);

                        function numberFormat(angka) {
                            var rupiah = '';
                            var angkarev = angka.toString().split('').reverse().join('');
                            for (var i = 0; i < angkarev.length; i++)
                                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                            return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                        }

                    }
                });
            }
        });

        $(document).ready(function() {
            // Fungsi untuk memformat angka ke format rupiah
            function numberFormat(angka) {
                var rupiah = '';
                var angkarev = angka.toString().split('').reverse().join('');
                for (var i = 0; i < angkarev.length; i++)
                    if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
            }

            $('.nav-link').click(function() {
                var semester = $(this).data('semester');
                var userId = $(this).data('user');

                const options = $('option[id^="semester-"]');
                const option = $('#semester-' + semester);

                options.each((i, e) => {
                    e.removeAttribute("selected");
                    console.log(e);
                })
                option.attr("selected", "selected");

                if (semester && userId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('student.total.dependent', ['semester' => ':semester', 'user' => ':user']) }}"
                            .replace(':semester', semester).replace(':user', userId),
                        success: function(response) {
                            $('.total_bayar').html(numberFormat(response.totalBayar));
                            $('.tanggungan_pembayaran').html(numberFormat(response.nominal
                                .nominal));
                            $('.total_sisa').html(numberFormat(response.nominal.nominal -
                                response.totalBayar));
                            $('#nominal').val(response.nominal.nominal -
                                response.totalBayar);
                        }
                    });
                }
            });

            $('.btn-check').click(function() {
                $('.btn').removeClass('active');
                $(this).parent().addClass('active');
            });
        });

        $(document).ready(function() {
            $('input[name="installment"]').click(function() {
                if ($(this).is(':checked')) {
                    $('#installmentCheckbox').val('checked');
                    $('#div-installment').show();
                } else {
                    $('#installmentCheckbox').val('');
                    $('#div-installment').hide();
                }
            });
        })

        $('#submit_payment').click(function() {
            $('#payment_form').submit();
        })
    </script>

    <script>
        document.querySelectorAll('[data-kt-button]').forEach(button => {
            button.addEventListener('click', function() {
                const parentDiv = this.closest('div[data-kt-buttons]');
                parentDiv.querySelectorAll('.btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
@endsection
