@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Ujian
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Pilih kelas yang ingin diuji
            </p>
            <!--end::Breadcrumb-->
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{route('admin.exam.index')}}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row mb-5">
            <div class="col">
                <form id="form-search" action="{{ route('admin.showClassroom', [$schools]) }}">
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
                                    <a href="{{ route('admin.showClassroom',  [$schools]) }}" type="button"
                                        class="btn btn-light text-light ms-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Muat Ulang Data"><i class="fonticon-repeat"></i></a>
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
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        @if ($classrooms->count() > 0)
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th data-priority="1">No</th>
                                        <th data-priority="2">Kelas</th>
                                        <th data-priority="3">Details</th>
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
                                            <a href="{{route('admin.showStudent', [$classroom->id])}}">
                                                    <button class="btn btn-default btn-sm p-1">
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
                            <x-empty-component title="report" />
                        @endif
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
        <x-delete-modal-component />
    </div>

    <!--end::Page title-->

    <!--begin::Actions-->
    <!--end::Actions-->

@endsection
@section('script')
    <script>

        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
@endsection
