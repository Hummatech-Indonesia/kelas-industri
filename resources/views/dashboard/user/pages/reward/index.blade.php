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
                                    Hadiah
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
                                        List hadiah pada kelas industri.
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
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_content" class="app-container  container-fluid ">
                    <div class="row">
                        @forelse($rewards as $reward)
                            <div class="col-4">
                                <div class="card card-flush h-xl-100">
                                    <!--begin::Body-->
                                    <div class="card-body text-center pb-5">
                                        <!--begin::Overlay-->
                                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                            href="/metronic8/demo1/assets/media/stock/600x600/img-39.jpg">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7"
                                                style="height: 266px;background-image:url('{{ asset('storage/' . $reward->photo) }}')">
                                            </div>

                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Overlay-->
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-end flex-stack mb-1">
                                            <!--begin::Title-->
                                            <div class="text-start">
                                                <span
                                                    class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{ $reward->reward_name }}</span>
                                                <span class="text-gray-400 mt-1 fw-bold fs-6">Jumlah Point :
                                                    {{ $reward->point }}</span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Total-->
                                            <!--end::Total-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <div class="card-footer d-flex flex-stack pt-0">
                                        <!--begin::Link-->
                                        {{-- <input type="hidden" name="" id="reward" value="{{ $reward->id }}"> --}}
                                        {{-- {{ (Auth::user()->point < $reward->point) ? "" : "btn-tukar" }} --}}
                                        <a class="btn btn-sm btn-primary flex-shrink-0 me-2 btn-tukar" type="button"
                                            data-id="{{ $reward->id }}">
                                            Tukar </a>
                                        <!--end::Link-->

                                        <!--begin::Link-->
                                        <a class="btn btn-sm btn-light flex-shrink-0"
                                            href="/metronic8/demo1/../demo1/apps/ecommerce/sales/listing.html">
                                            View Item </a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Footer-->
                                </div>
                            </div>
                        @empty
                            <x-empty-component title="reward" />
                        @endforelse
                        <!--end::Body-->
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
    <div class="modal fade" id="kt_modal_bidding" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                            width="30">
                            <path
                                d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form action="{{ route('student.submitRewards.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="reward_id" id="reward_id" value="">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Form Kirim Hadiah</h1>
                            <!--end::Title-->

                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">
                                Masukkan data yang valid agar dapat mengirim hadiah sampai kerumah kalian
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Input group-->

                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">No Hp</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Select2-->
                            <input type="number" class="form-select form-select-solid" name="phone_number"
                                placeholder="083000000000">
                            <!--end::Select2-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Alamat</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Select2-->
                            <textarea class="form-control form-control-solid form-control-lg" name="address" type="text"
                                placeholder="Jl. Ramah Tamah Ngijo Karangploso Malang" required="">{{ old('address') }}</textarea>
                            <!--end::Select2-->
                        </div>
                        <!--end::Notice-->


                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel"
                                data-bs-dismiss="modal" aria-label="Close">
                                Cancel
                            </button>

                            <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                                <span class="indicator-label">
                                    Submit
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    {{--    Update Status --}}
    {{--    end Update Statusl --}}
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btn-tukar').click(function() {
            var reward = $(this).attr('data-id');
            $('#kt_modal_bidding').modal('show')

            $('#reward_id').val(reward);

        });
    </script>
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection
