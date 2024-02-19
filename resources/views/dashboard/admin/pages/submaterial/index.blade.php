@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                {{ $material->title }}
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    {{ count($material->subMaterials) }} Bab
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ url()->previous() }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
            <a href="{{ route('admin.materials.createSubmaterial', $material->id) }}"
                class="btn btn-dark fw-bold h-40px fs-7">
                Tambah
            </a>
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
                        <div class="searching align-items-center">
                            <!--begin::Input group-->
                            <div class="position-relative col-lg-10 col-md-12">
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
                                    value="" placeholder="Search">
                            </div>
                            <div class="col-lg-2 col-md-12 ms-3">
                                <button type="submit" class="btn btn-primary me-2">Cari</button>
                                <a href="{{ route('admin.materials.show', $material->id) }}" type="button"
                                    class="btn btn-light text-light" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Muat Ulang"><i class="fonticon-repeat"></i>
                                </a>
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
            @forelse($subMaterials as $subMaterial)
                <div class="col-xl-4 mb-3">

                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Section-->

                            <div class="d-flex align-items-center">

                                <!--begin::Pic-->

                                <div class="flex-shrink-0 mr-4 symbol symbol-65 symbol-circle me-5">

                                    <span
                                        class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($subMaterial->title, 0, 1) }}</span>



                                </div>

                                <!--end::Pic-->

                                <!--begin::Info-->

                                <div class="d-flex flex-column me-auto">

                                    <!--begin: Title-->

                                    <a href="{{ route('admin.submaterials.show', $subMaterial->id) }}"
                                        class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1" style="text-overflow: ellipsis;overflow: hidden ;max-width: 130px ;white-space: nowrap">

                                        {{ $subMaterial->title }}
                                    </a>



                                    <span class="text-muted font-weight-bold" style="text-overflow: ellipsis;overflow: hidden ;max-width: 150px ;white-space: nowrap">

                                        {{ $material->title }}
                                    </span>

                                    <!--end::Title-->

                                </div>

                                <!--end::Info-->

                                <div class="d-flex">
                                    <a href="{{ route('admin.materials.editSubmaterial', ['material' => $material->id, 'subMaterial' => $subMaterial->id]) }}"
                                        class="btn btn-default btn-sm p-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data"><i
                                            class="fonticon-setting fs-2 text-warning"></i></a>
                                    <button class="btn btn-default btn-sm p-1 btn-delete"
                                        data-id="{{ $subMaterial->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Data"><i
                                            class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                </div>

                            </div>

                            <!--end::Section-->

                            <!--begin::Content-->



                            <!--end::Content-->

                            <!--begin::Text-->

                            <p class="mb-7 mt-5" style="text-overflow: ellipsis;overflow: hidden ;max-width: 300px ;white-space: nowrap">

                                {{ $subMaterial->description }}
                            </p>

                            <!--end::Text-->



                        </div>

                        <!--end::Body-->

                        <!--begin::Footer-->

                        <div class="card-footer d-flex flex-row justify-content-between">

                            <div class="d-flex">

                                <div class="d-flex align-items-center me-5">
                                    <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen028.svg-->
                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="7" y="2" width="14" height="16"
                                                rx="3" fill="currentColor" />
                                            <rect x="3" y="6" width="14" height="16" rx="3"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <a href="{{ route('admin.submaterials.show', $subMaterial->id) }}"
                                        class="fw-bold text-info ml-2">{{ count($subMaterial->assignments) }} Tugas</a>



                                </div>



                            </div>

                            <a href="{{ route('admin.submaterials.show', $subMaterial->id) }}"
                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>

                        </div>

                        <!--end::Footer-->

                    </div>

                    <!--end::Card-->

                </div>
            @empty
                <x-empty-component title="bab" />
            @endforelse
        </div>
        <div class="row">
            <x-pagination-component :paginator="$subMaterials" route="admin.materials.show" :parameters="$parameters" />
        </div>
        <x-delete-modal-component />
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $('.btn-delete').click(function() {
                const url = "{{ route('admin.submaterials.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })
        });
    </script>
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
