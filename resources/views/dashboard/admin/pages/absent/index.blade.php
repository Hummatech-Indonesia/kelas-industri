@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Absent
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <p class="text-muted">
                daftar absent pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        @if ($attendances->count() > 0)
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Pembuat</th>
                                        <th>Details</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $attendance->title }}</td>
                                            <td>
                                                @if ($attendance->status == 'open')
                                                    <span class="badge badge-light-success">{{ $attendance->status }}</span>
                                                @else
                                                    <span class="badge badge-light-danger">{{ $attendance->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $attendance->mentor->name }}</td>
                                            <td><a href="{{route('admin.showAbsent', [$attendance->id]) }}"
                                                class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Detail</a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <!--end::Table body-->
                            </table>
                        @else
                            <x-empty-component title="absent" />
                        @endif
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>

        </div>
        <x-delete-modal-component />
    </div>
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
@endsection
