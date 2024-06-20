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
                daftar nilai ujian siswa pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                @if (isset($students[0]))
                    <a href="{{ route('admin.showClassroom', [$students[0]->studentSchool->school_id]) }}"
                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                        <i class="bi bi-arrow-left me-2"></i> Kembali
                    </a>
                    <a href="{{ route('admin.createExam', $classroom->id) }}" class="btn btn-dark fw-bold">
                        Tambah </a>
                @else
                    <a href="{{ url()->previous() }}"
                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                        <i class="bi bi-arrow-left me-2"></i> Kembali
                    </a>
                @endif
            @else
                <a href="{{ route('school.exam.index') }}"
                    class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                    <i class="bi bi-arrow-left me-2"></i> Kembali
                </a>
            @endif



        </div>

    </div>
     <!--begin::Content container-->
     <div id="kt_content" class="app-container  container-fluid ">
        <div class="row">
            <div class="card ">
                <div class="card-header card-header-stretch">
                    <h3 class="card-title">Ujian UAS Dan UTS</h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_uts_ganjil">UTS Semester Ganjil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_uts_genap">UTS Semester Genap</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_uas_ganjil">UAS Semester Ganjil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_uas_genap">UAS Semester Genap</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_pane_uts_ganjil" role="tabpanel">
                            @if ($exams->where('exam_type','uts')->where('semester','ganjil')->count() > 0)
                                <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th data-priority="1">No</th>
                                            <th data-priority="2">Nama</th>
                                            <th data-priority="3">Tingkat Kesulitan</th>
                                            @foreach ($classroom->devision->criterias()->where('is_default',0)->get() as $criteria) 
                                              <th data-priority="{{ $loop->iteration + 3}}">{{ $criteria->name }}</th>
                                            @endforeach
                                            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                <th>Aksi</th>
                                            @endif
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($exams->where('exam_type','uts')->where('semester','ganjil') as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->studentClassroom->studentSchool->student->name }}</td>
                                                <td>{{ $exam->task_level }}</td>
                                                @foreach ($exam->examCriterias as $criteria)
                                                   <td>{{ $criteria->score }}</td> 
                                                @endforeach
                                                @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                    <td>
                                                        <a href="{{ route('admin.exam.show', [$exam->id]) }}">
                                                            <button class="btn btn-default btn-sm p-1">
                                                                <i class="fonticon-setting fs-3 text-warning"></i>
                                                            </button>
                                                        </a>
                                                        <button class="btn btn-default btn-sm p-1 btn-delete" data-id="{{$exam->id}}">
                                                            <i class="fonticon-trash-bin fs-2 text-danger"></i></button>
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
                        </div>
                        <div class="tab-pane fade show" id="kt_tab_pane_uts_genap" role="tabpanel">
                            @if ($exams->where('exam_type','uts')->where('semester','genap')->count() > 0)
                                <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th data-priority="1">No</th>
                                            <th data-priority="2">Nama</th>
                                            <th data-priority="3">Tingkat Kesulitan</th>
                                            @foreach ($classroom->devision->criterias()->where('is_default',0)->get() as $criteria) 
                                              <th data-priority="{{ $loop->iteration + 3}}">{{ $criteria->name }}</th>
                                            @endforeach
                                            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                <th>Aksi</th>
                                            @endif
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($exams->where('exam_type','uts')->where('semester','genap') as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->studentClassroom->studentSchool->student->name }}</td>
                                                <td>{{ $exam->task_level }}</td>
                                                @foreach ($exam->examCriterias as $criteria)
                                                   <td>{{ $criteria->score }}</td> 
                                                @endforeach
                                                @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                    <td>
                                                        <a href="{{ route('admin.exam.show', [$exam->id]) }}">
                                                            <button class="btn btn-default btn-sm p-1">
                                                                <i class="fonticon-setting fs-3 text-warning"></i>
                                                            </button>
                                                        </a>
                                                        <button class="btn btn-default btn-sm p-1 btn-delete" data-id="{{$exam->id}}">
                                                            <i class="fonticon-trash-bin fs-2 text-danger"></i></button>
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
                        </div>
                        <div class="tab-pane fade show" id="kt_tab_pane_uas_ganjil" role="tabpanel">
                            @if ($exams->where('exam_type','uas')->where('semester','ganjil')->count() > 0)
                                <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th data-priority="1">No</th>
                                            <th data-priority="2">Nama</th>
                                            <th data-priority="3">Tingkat Kesulitan</th>
                                            @foreach ($classroom->devision->criterias()->where('is_default',0)->get() as $criteria) 
                                              <th data-priority="{{ $loop->iteration + 3}}">{{ $criteria->name }}</th>
                                            @endforeach
                                            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                <th>Aksi</th>
                                            @endif
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($exams->where('exam_type','uas')->where('semester','ganjil') as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->studentClassroom->studentSchool->student->name }}</td>
                                                <td>{{ $exam->task_level }}</td>
                                                @foreach ($exam->examCriterias as $criteria)
                                                   <td>{{ $criteria->score }}</td> 
                                                @endforeach
                                                @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                    <td>
                                                        <a href="{{ route('admin.exam.show', [$exam->id]) }}">
                                                            <button class="btn btn-default btn-sm p-1">
                                                                <i class="fonticon-setting fs-3 text-warning"></i>
                                                            </button>
                                                        </a>
                                                        <button class="btn btn-default btn-sm p-1 btn-delete" data-id="{{$exam->id}}">
                                                            <i class="fonticon-trash-bin fs-2 text-danger"></i></button>
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
                        </div>
                        <div class="tab-pane fade show" id="kt_tab_pane_uas_genap" role="tabpanel">
                            @if ($exams->where('exam_type','uas')->where('semester','genap')->count() > 0)
                                <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th data-priority="1">No</th>
                                            <th data-priority="2">Nama</th>
                                            <th data-priority="3">Tingkat Kesulitan</th>
                                            @foreach ($classroom->devision->criterias()->where('is_default',0)->get() as $criteria) 
                                              <th data-priority="{{ $loop->iteration + 3}}">{{ $criteria->name }}</th>
                                            @endforeach
                                            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                <th>Aksi</th>
                                            @endif
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($exams->where('exam_type','uas')->where('semester','genap') as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->studentClassroom->studentSchool->student->name }}</td>
                                                <td>{{ $exam->task_level }}</td>
                                                @foreach ($exam->examCriterias as $criteria)
                                                   <td>{{ $criteria->score }}</td> 
                                                @endforeach
                                                @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                    <td>
                                                        <a href="{{ route('admin.exam.show', [$exam->id]) }}">
                                                            <button class="btn btn-default btn-sm p-1">
                                                                <i class="fonticon-setting fs-3 text-warning"></i>
                                                            </button>
                                                        </a>
                                                        <button class="btn btn-default btn-sm p-1 btn-delete" data-id="{{$exam->id}}">
                                                            <i class="fonticon-trash-bin fs-2 text-danger"></i></button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal-component />
    </div>
    <!--end::Content container-->

    <!--end::Page title-->

    <!--begin::Actions-->
    <!--end::Actions-->

@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $("#kt_datatable").DataTable({
            responsive: true
        });


        $('.btn-delete').click(function() {
            const url = "{{ route('admin.exam.destroy', ':id') }}".replace(':id', $(this).data('id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })
    </script>
@endsection
