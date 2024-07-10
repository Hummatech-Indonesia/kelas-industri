@php
use App\Enums\SubMaterialExamTypeEnum; @endphp
@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Hasil Ujian
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List siswa ujian
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="row align-items-center py-2 py-md-1">
            <div class="col">

                <a href="{{ route('admin.exportStudentRegristationExam', $exam->school_id) }}"
                    class="btn btn-sm btn-success w-150px">
                    <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/arrows/arr044.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-1hx"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill"
                            viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    Export Excel
                </a>
            </div>

            <div class="col">
                <form action="{{ route('admin.regristationExam-delete', $exam->school_id) }}" method="post"
                    id="delete-user-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-danger w-100" id="btn-delete-user"
                        data-id="{{ $exam->school_id }}">
                        <span class="svg-icon svg-icon-white svg-icon-1x m-0"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" class="bi bi-trash-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0">
                                </path>
                            </svg>
                        </span>Akun Test</button>
                </form>
            </div>
        </div>
        <!--end::Actions-->
    </div>
    <div class="content row flex-column-fluid" id="kt_content">
        <div class="card card-p-0 card-flush">
            <div class="card-body">
                <table class="display" id="kt_datatable_example">
                    <thead>
                        <!--begin::Table row -->
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                            <th class="min-w-100px">Nama</th>
                            <th class="min-w-100px">Nilai</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @forelse ($exam->studentSubmaterialExams as $student)
                            <tr>
                                <td>{{ $student->student->name }}</td>
                                <td>{{ $student->score }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            $("#kt_datatable_example").DataTable();
        </script>
    @endsection
