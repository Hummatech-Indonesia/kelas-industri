@extends('dashboard.admin.layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Berita Kelas Industri
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Berita pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <!--end::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.standart-operation-producer.create') }}" class="btn btn-primary fw-bold h-40px fs-7">
                Tambah
            </a>
        </div>
    </div>
    @foreach ($sops as $sop)
        <div class="card mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body py-3">
                <div class="d-flex justify-content-between">
                    <div class="col">
                        <p> {!! $sop->sop !!}</p>
                        @if ($sop->for_user == 'student')
                            <p class="fw-bold">Sop untuk Siswa</p>
                        @elseif ($sop->for_user == 'teacher')
                            <p class="fw-bold">Sop untuk Guru</p>
                        @else
                            <p class="fw-bold">Sop untuk {{ $sop->for_user }}</p>
                        @endif
                    </div>

                    <div class="d-flex flex-column gap-2" style="width: fit-content;">
                        <a href="{{ route('admin.standart-operation-producer.edit', $sop->id) }}"
                            class="fw-bold btn btn-sm btn-warning px-3 ms-2 text-center">

                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen055.svg-->
                            <span class="svg-icon svg-icon-white svg-icon-1x m-0"><svg width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->

                        </a>
                        <div type="submit" class="btn btn-sm btn-danger btn-delete px-3 ms-2 text-center" title="Hapus" data-toggle="modal" data-id="{{ $sop->id }}">

                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/abstract/abs012.svg-->
                            <span class="svg-icon svg-icon-white svg-icon-1x m-0"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" class="bi bi-trash-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0">
                                    </path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->

                        </div>
                    </div>
                </div>

            </div>
            <!--begin::Body-->
        </div>
    @endforeach
    <x-delete-modal-component />
    <div class="modal fade" tabindex="-1" id="kt_modal_photo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Detail Berita</h3>

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
                <div class="modal-body row">
                    <div class="mb-2" id="date">

                    </div>
                    <div class="text-gray-900 fw-bold fs-3 mb-3" id="title">

                    </div>
                    <p id="description" style="word-break: break-word;">

                    </p>
                    <img src="" id="photo" class="col-12" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.btn-delete').click(function() {
            const url = "{{ route('admin.standart-operation-producer.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })
    </script>
@endsection
