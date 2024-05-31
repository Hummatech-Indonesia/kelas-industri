@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Jurnal
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List jurnal guru dan mentor pada Kelas Industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        @if (auth()->user()->roles->pluck('name')[0] == 'school')
            <div class="row mb-5">
                <div class="col">
                    <form id="form-search" action="{{ route('school.journal.index') }}">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Compact form-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Input group-->
                                    <div class="position-relative col-lg-10 col-md-12 me-2">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <select name="school_year" class="form-select form-select-solid me-5 mt-3"
                                            data-control="select2" data-placeholder="Tahun Ajaran">
                                            @foreach ($schoolYear as $year)
                                                <option {{ $schoolYearFilter == $year->id ? 'selected' : '' }}
                                                    value="{{ $year->id }}">
                                                    {{ $year->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-12 ms-3">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                        <a href="{{ route('school.journal.index') }}" type="button"
                                            class="btn btn-light text-light ms-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Muat Ulang"><i class="fonticon-repeat"></i></a>
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

            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                            @if ($schools->count() > 0)
                                <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>No</th>
                                            <th>Sekolah</th>
                                            <th>Detail</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($schools as $school)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $school->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.journal.show', [$school->id]) }}">
                                                        <button class="btn btn-default btn-sm p-1"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip" data-bs-title="Detail Data">
                                                            <i class="fa fa-eye fs-3 text-muted"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            @else
                                <x-empty-component title="jurnal" />
                            @endif
                        @else
                            @if ($classrooms->count() > 0)
                                <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Detail</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($classrooms as $classroom)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $classroom->name }}</td>
                                                <td>
                                                    <a href="{{ route('school.detailJurnal', [$classroom->id]) }}">
                                                        <button class="btn btn-default btn-sm p-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Detail Data">
                                                            <i class="fa fa-eye fs-3 text-muted"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            @else
                                <x-empty-component title="jurnal" />
                            @endif
                        @endif
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>

        </div>
        <x-delete-modal-component />
    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_description">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Deskripsi</h3>

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
                <div class="modal-body" id="description">
                    <h5></h5>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $('.btn-delete').click(function() {
            const url = "{{ route('mentor.journal.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('.btn-description').click(function() {
            var description = $(this).data('description')
            $('#description').html(description)
            $('#kt_modal_description').modal('show')
        });
    </script>
@endsection
