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
                                        List hadiah anda pada kelas industri.
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Actions-->

                            <a href="{{ route('student.rewards.index') }}"
                                            class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                            <i class="bi bi-arrow-left me-2"></i> Kembali
                                        </a>
                            
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_content" class="app-container  container-fluid ">
                    <div class="row">
                        <form action="{{ route('student.historyReward') }}">
                            <!--begin::Card-->
                            <div class="card mb-7">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Compact form-->
                                    <div class="searching align-items-center">
                                        <!--begin::Input group-->
                                        <div class="position-relative col-lg-10 col-md-12">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span
                                                class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                        height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                        fill="currentColor"></rect>
                                                    <path
                                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" class="form-control form-control-solid ps-10"
                                                name="search" value="{{$search}}" placeholder="cari">
                                        </div>
                                        <div class="col-lg-2 col-md-12 ms-3">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                            <a href="{{ route('student.historyReward')}}"
                                                type="button" class="btn btn-light text-light"><i
                                                    class="fonticon-repeat"></i></a>
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
                                                style="height: 266px;background-image:url('{{ asset('storage/' . $reward->reward->photo) }}')">
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
                                                    class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{ $reward->reward->reward_name }}</span>
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
                                        @if ($reward->status == 'active')
                                        <span class="btn btn-sm btn-success flex-shrink-0 me-2">Sudah Kirim</span>
                                        @else
                                        <span class="btn btn-sm btn-danger flex-shrink-0 me-2">Belum Dikrim</span>

                                        @endif
                                        <!--end::Link-->

                                        <!--begin::Link-->
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
                    <div class="row">
                        {{ $rewards->appends(request()->query())->links() }}
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
    <x-submit-reward-modal-component />

    {{--    Update Status --}}
    {{--    end Update Statusl --}}
@endsection
@section('script')
    <script>
        $('.btn-tukar').click(function() {
            const url = "{{ route('student.submitReward', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-submit').attr('action', url)

            $('#kt_modal_bidding').modal('show')
        })

    </script>
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection
@section('css')
        <Style>
            @media (max-width:639px){
                .position-relative{
                    margin-bottom: 10px;
                }
            }
            @media (min-width:640px){
                .searching{
                    display: flex;
                }
            }
        </Style>
    @endsection
