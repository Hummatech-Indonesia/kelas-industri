@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

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
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{route('admin.showClassroom', [$students[0]->studentSchool->school_id])}}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        @if ($students->count() > 0)
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th data-priority="1">No</th>
                                        <th data-priority="2">Nama</th>
                                        <th>Tipe Ujian</th>
                                        <th>Level Tugas</th>
                                        <th>Kompleksitas</th>
                                        <th>Kerapian Kode</th>
                                        <th>Desain</th>
                                        <th>Presentasi</th>
                                        <th>Pemahaman</th>
                                        @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->studentSchool->student->name }}</td>
                                            <td>{{ $student->exam ? $student->exam->exam_type : '-' }}</td>
                                            <td>{{ $student->exam ? $student->exam->task_level : '-' }}</td>
                                            <td>{{ $student->exam ? $student->exam->complexity : '-' }}</td>
                                            <td>{{ $student->exam ? $student->exam->code_cleanliness : '-' }}</td>
                                            <td>{{ $student->exam ? $student->exam->design : '-' }}</td>
                                            <td>{{ $student->exam ? $student->exam->presentation : '-' }}</td>
                                            <td>{{ $student->exam ? $student->exam->understanding : '-' }}</td>
                                            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                <td>
                                                    @if (!$student->exam)
                                                        <a
                                                            href="{{ route('admin.showEvaluation', [$student->studentSchool->student->id]) }}">
                                                            <button class="btn btn-default btn-sm p-1">
                                                                <i class="fa-solid fa-pen-to-square fs-3 text-primary"></i>
                                                            </button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admin.exam.show', [$student->exam->id]) }}">
                                                            <button class="btn btn-default btn-sm p-1">
                                                                <i class="fonticon-setting fs-3 text-warning"></i>
                                                            </button>
                                                        </a>
                                                    @endif

                                                </td>
                                            @endif
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
