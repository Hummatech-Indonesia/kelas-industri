@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Sekolah
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List sekolah yang terdaftar di kelas industri.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="{{ route('admin.schools.create') }}" class="btn btn-dark fw-bold">
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
            @forelse($schools as $school)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-5 mb-5">

                    <!--begin::Card-->

                    <div class="card card-custom gutter-b card-stretch">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Section-->

                            <div class="d-flex align-items-center justify-content-between">

                                <!--begin::Pic-->

                                <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle display-5">

                                    @if ($school->photo)
                                        <img src="{{ asset('storage/' . $school->photo) }}" alt="kanesa">
                                    @else
                                        <div class="symbol-label fs-2 fw-semibold bg-primary text-inverse-danger">
                                            {{ substr($school->name, 0, 1) }}</div>
                                    @endif

                                </div>

                                <!--end::Pic-->

                                <!--begin::Info-->

                                <div class="d-flex flex-column mr-auto">

                                    <!--begin: Title-->

                                    <a href="{{ route('admin.schools.show', $school->id) }}"
                                        class="card-title text-hover-primary fw-bolder font-size-h5 text-dark mb-1">
                                        {{ $school->name }}
                                    </a>

                                    <span class="text-muted font-weight-bold"
                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 150px ;white-space: nowrap">
                                        {{ $school->address }}
                                    </span>

                                    <!--end::Title-->

                                </div>

                                <!--end::Info-->
                                <div class="card-toolbar mb-7 text-end">

                                    <!--begin::Menu-->
                                    <button
                                        class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="hover" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                        <span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="4" fill="currentColor" />
                                                <rect x="11" y="11" width="2.6" height="2.6" rx="1.3"
                                                    fill="currentColor" />
                                                <rect x="15" y="11" width="2.6" height="2.6" rx="1.3"
                                                    fill="currentColor" />
                                                <rect x="7" y="11" width="2.6" height="2.6" rx="1.3"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </button>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true" style="">
                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.schools.edit', $school->id) }}" class="menu-link px-3">
                                                edit
                                            </a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a type="submit" class="btn-delete menu-link" data-id="{{ $school->id }}"
                                                title="Hapus" data-toggle="modal" data-target="#hapus1">
                                                Hapus
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>

                                </div>

                            </div>

                            <!--end::Section-->

                            <!--begin::Content-->

                            <!--begin::Progress-->

                            <div class="d-flex mt-3 ">

                                <div class="mb-1 col-4 text-center">

                                    <span class="d-block font-weight-bold mb-3">

                                        SISWA

                                    </span>

                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">
                                        {{ $countStudents[$school->id] }}
                                    </span>

                                </div>

                                <div class="mb-1 col-4 text-center">

                                    <span class="d-block font-weight-bold mb-3">

                                        GURU

                                    </span>

                                    <span class="btn btn-light-warning btn-sm font-weight-bold btn-upper btn-text">
                                        {{ count($school->teachers) }}
                                    </span>

                                </div>

                                <div class="mb-1 col-4 text-center">

                                    <span class="d-block font-weight-bold mb-3">

                                        KELAS

                                    </span>

                                    <span class="btn btn-light-success btn-sm font-weight-bold btn-upper btn-text">
                                        {{ count($school->classrooms) }}
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
                            </div>

                            <a href="{{ route('admin.schools.show', $school->id) }}"
                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-2 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">detail</a>

                        </div>

                        <!--end::Footer-->

                    </div>


                    <!--end:: Card-->

                </div>
            @empty
                <x-empty-component title="sekolah" />
            @endforelse
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-pagination-component :paginator="$schools" :parameters="$parameters" route="admin.schools.index" />
            </div>
        </div>
        <x-delete-modal-component />
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $('.btn-delete').click(function() {
                const url = "{{ route('admin.schools.destroy', ':id') }}".replace(':id', $(this).data(
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
