@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.admin.layouts.app')

@section('css')
    <style>
        .card .card-img {
            height: 130px;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Event
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List event yang terdaftar di kelas industri.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="{{ route('admin.events.create') }}" class="btn btn-dark fw-bold">
                Tambah </a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <!--begin::Card-->
                <div class="card mb-7">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Compact form-->
                        <div class="searching align-items-center row">
                            <!--begin::Input group-->
                            <div class="col-lg-10 col-md-8 col-6">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span
                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                        </rect>
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" class="form-control form-control-solid ps-10" name="search"
                                    value="{{ $parameters['search'] ?? '' }}" placeholder="Search">
                            </div>
                            <div class="col-lg-2 col-md-4 col-6">
                                <button class="btn btn-primary" id="btn-search">Cari</button>
                                <a href="{{ route('admin.schools.index') }}" type="button"
                                    class="btn btn-light text-light ms-2"><i class="fonticon-repeat"></i></a>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Compact form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
        </div>
        <div class="row">
            @forelse($events as $index => $event)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-5 mb-5">

                    <!--begin::Card-->

                    <div class="card card-custom gutter-b card-stretch position-relative">
                        <div class="card-toolbar position-absolute end-0 mb-7 text-end">

                        </div>
                        <img src="{{ asset("storage/$event->thumnail") }}" alt=""
                            class="card-img rounded-top-1 rounded-bottom-0" />

                        <!--begin::Body-->

                        <div class="card-body text-center">

                            <!--begin::Section-->

                            <!--end::Section-->

                            <a href="" class="card-title text-hover-primary fw-bolder font-size-h5 text-dark mb-1">
                                {{ $event->title }}
                            </a>
                            <div class="card-title fw-normal fs-8 text-dark mb-1">
                                {{ Carbon::parse($event->start_date)->locale('id')->format('d-m-Y') }} -
                                {{ Carbon::parse($event->end_date)->locale('id')->format('d-m-Y') }}
                            </div>

                            <!--begin::Content-->

                            <!--begin::Progress-->

                            <div class="d-flex justify-content-evenly mt-7 ">

                                <div class="mb-1 col-4 text-center">

                                    <span class="d-block font-weight-bold mb-3">

                                        Peserta

                                    </span>
                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">
                                        {{ $event->participants_count }}
                                    </span>

                                </div>

                                <div class="mb-1 col-4 text-center">

                                    <span class="d-block font-weight-bold mb-3">

                                        Status

                                    </span>

                                    <span class="btn btn-light-success btn-sm font-weight-bold btn-upper btn-text">
                                        Aktif
                                    </span>

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

                                    <button type="submit" class="btn btn-sm text-danger text-end"
                                        data-id="{{ $event->id }}" title="Hapus" data-toggle="modal"
                                        data-target="#hapus{{ $index }}">

                                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/abstract/abs012.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                        </svg>
                                        <!--end::Svg Icon-->

                                    </button>
                                    <a href="{{ route('admin.events.edit', $event->id) }}"
                                        class="fw-bold text-primary ms-2">
                                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen055.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->

                                    </a>

                                </div>


                            </div>

                            <a href="{{ route('admin.events.show', $event->id) }}"
                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-2 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">detail</a>

                        </div>

                        <!--end::Footer-->

                    </div>


                    <!--end:: Card-->

                </div>
            @empty
                <x-empty-component title="event" />
            @endforelse
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-pagination-component :paginator="$events" :parameters="$parameters" route="admin.events.index" />
            </div>
        </div>
        <x-delete-modal-component />
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $('.btn-delete').click(function() {
                const url = "{{ route('admin.events.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })

            $('#btn-search').click(function() {
                window.location.href = "{{ route('admin.schools.index', 'search=' . ':id') }}".replace(
                    ':id', $("input[name='search']").val())
            })
        });
    </script>
@endsection
@section('css')
    <Style>
        @media (max-width:639px) {
            .position-relative {
                margin-bottom: 10px;
            }
        }

        @media (min-width:640px) {
            .searching {
                display: flex;
            }
        }
    </Style>
@endsection
