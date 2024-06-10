@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-lg-7" id="kt_toolbar">
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                View Tugas
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">
                        Halaman view tugas
                    </a>
                </li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th data-priority="1">No</th>
                                    <th data-priority="2">Sekolah</th>
                                    <th data-priority="3">Detail</th>
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
                                            <a href="{{ route('admin.teacher.statistic.show', [$school->id]) }}">
                                                <button class="btn btn-default btn-sm p-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Detail Data">
                                                    <i class="fa fa-eye fs-3 text-muted"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>


                        {{-- <div class="text-center">
                            <x-empty-component title="peringkat" />
                        </div> --}}
                    </div>
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
    </script>
@endsection
