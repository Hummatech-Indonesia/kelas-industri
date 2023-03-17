@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Kelas
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List kelas di sekolah anda.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="{{ route('school.classrooms.create') }}" class="btn btn-dark fw-bold">
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
                        <div class="d-flex align-items-center">
                            <!--begin::Input group-->
                            <div class="position-relative col-11">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span
                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
      fill="currentColor"></rect>
<path
    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
    fill="currentColor"></path>
</svg>
</span>
                                <!--end::Svg Icon-->
                                <input type="text" class="form-control form-control-solid ps-10" name="search"
                                       value="{{ $parameters['search'] ?? '' }}" placeholder="Search">
                            </div>
                            <div class="col-1">
                                <button class="btn btn-primary ms-3" id="btn-search">Cari</button>
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
            @forelse($classrooms as $classroom)
                <div class="col-xl-4 mb-3">

                    <!--begin::Card-->

                    <div class="card card-custom gutter-b card-stretch">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Section-->

                            <div class="d-flex align-items-center">

                                <!--begin::Pic-->

                                <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">

                                    <span
                                        class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($classroom->name, 0, 1) }}</span>


                                </div>

                                <!--end::Pic-->

                                <!--begin::Info-->

                                <div class="d-flex flex-column me-auto">

                                    <!--begin: Title-->

                                    <a href="https://class.hummasoft.com/siswa/materi/11/4"
                                       class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1">

                                        {{ $classroom->name }}
                                    </a>


                                    <span class="text-muted font-weight-bold">
                                            {{ $classroom->name }}
                                    </span>

                                    <!--end::Title-->

                                </div>

                                <!--end::Info-->

                                <div class="d-flex">
                                    <a href="{{ route('school.classrooms.edit', $classroom->id) }}"
                                       class="btn btn-default btn-sm p-1"><i
                                            class="fonticon-setting fs-2 text-warning"></i></a>
                                    <button class="btn btn-default btn-sm p-1 btn-delete"
                                            data-id="{{ $classroom->id }}">
                                        <i class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                </div>

                            </div>

                            <!--end::Section-->

                            <!--begin::Content-->


                            <!--end::Content-->

                            <!--begin::Text-->

                            <p class="mb-7 mt-5">

                                {{ $classroom->description }}
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
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
    <rect opacity="0.5" x="7" y="2" width="14" height="16" rx="3" fill="currentColor"/>
    <rect x="3" y="6" width="14" height="16" rx="3" fill="currentColor"/>
</svg>
</span>
                                    <!--end::Svg Icon-->
                                    <a href="{{ route('admin.materials.show', $classroom->id) }}"
                                       class="fw-bold text-info ml-2">{{ 2 }} Bab</a>


                                </div>


                            </div>

                            <a href="{{ route('school.classrooms.show', $classroom->id) }}"
                               class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>

                        </div>

                        <!--end::Footer-->

                    </div>

                    <!--end::Card-->

                </div>
            @empty
                <x-empty-component title="kelas"/>
            @endforelse
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-pagination-component :paginator="$classrooms" :parameters="$parameters"
                                        route="school.classrooms.index"/>
            </div>
        </div>
        <x-delete-modal-component/>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $('.btn-delete').click(function () {
                const url = "{{ route('school.classrooms.destroy', ':id') }}".replace(':id', $(this).data('id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })

            $('#btn-search').click(function () {
                window.location.href = "{{ route('school.classrooms.index', 'search=' . ':id') }}".replace(':id', $("input[name='search']").val())
            })
        });
    </script>
@endsection
