@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Report
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                daftar nilai rata-rata siswa pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

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
                        @if ($reports->count() > 0)
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Sekolah</th>
                                        <th>Angkatan</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Nilai</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($reports as $report)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$report->student->name}}</td>
                                        <td>{{$report->student->studentSchool->studentClassroom->classroom->name}}</td>
                                        <td>{{$report->student->studentSchool->school->name}}</td>
                                        <td>{{$report->student->studentSchool->studentClassroom->classroom->generation->generation}}</td>
                                        <td>{{$report->student->studentSchool->studentClassroom->classroom->generation->schoolYear->school_year}}</td>
                                        @php
                                            $point = ( $report->point / $totalAssignment[array_search($report->student->studentSchool->studentClassroom->classroom->generation_id,$totalAssignment->pluck('id')->toArray())]->total_assignments)
                                        @endphp
                                        <td>{{$point}}</td>
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
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
@endsection
