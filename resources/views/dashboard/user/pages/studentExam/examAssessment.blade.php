@php
    use App\Models\StudentSubmaterialExam;
    use App\Models\StudentSubmaterialExamAnswer;
    use App\Models\SubMaterialExamQuestion;
    use Carbon\Carbon;
    use App\Enums\QuestionTypeEnum;
@endphp
@extends('dashboard.user.layouts.app')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-8 ">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Penilaian Soal Essay Pada Ujian
                                </h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="#" class="text-muted text-hover-primary">
                                            List Penilaian Soal Essay Pada Ujian</a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->


                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('mentor.submaterialExam.index') }}"
                                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                        <i class="bi bi-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                        <div id="kt_content" class="container">
                            @csrf
                            <div class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <form action="" method="get">
                                        <div class="d-flex">
                                            <select name="classroom_id" class="form-select me-2">
                                                @foreach ($classrooms as $classroom)
                                                    <option value="{{ $classroom->classroom_id }}">
                                                        {{ $classroom->classroom->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-light-primary btn-md">
                                                <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.3"
                                                            d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </form>

                                    <div class="">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('mentor.studentSubMaterialExamEssayScore', $subMaterialExam->id) }}"
                                method="post">
                                @php
                                    $questionNumberArry = [];
                                    foreach ($answers as $answer) {
                                        array_push($questionNumberArry, $answer->student_question_number);
                                    }
                                    $questions = SubMaterialExamQuestion::query()
                                        ->with('questionBank')
                                        ->where('sub_material_exam_id', $subMaterialExam->id)
                                        ->whereIn('question_number', $questionNumberArry)
                                        ->whereRelation('questionBank', 'type', QuestionTypeEnum::ESSAY->value)
                                        ->get();
                                @endphp

                                <div class="row mt-5">
                                    <div class="col-6">
                                        <div class="tab-content" id="myTabContent">
                                            @php
                                                $first = true;
                                            @endphp
                                            @forelse ($studentAnswers as $index => $answer)
                                                @php
                                                    $studentExam = StudentSubmaterialExam::find($index);
                                                @endphp
                                                <div class="tab-pane fade
                                                @if ($first) @php
                                                    $first = false
                                                @endphp
                                                active show @endif"
                                                    id="kt_vtab_pane_{{ $studentExam->student->id }}" role="tabpanel">
                                                    @foreach ($questions as $question)
                                                        @php
                                                            $answer = $answer
                                                                ->where(
                                                                    'student_question_number',
                                                                    $question->question_number,
                                                                )
                                                                ->where('student_submaterial_exam_id', $studentExam->id)
                                                                ->first();
                                                            $value = StudentSubmaterialExamAnswer::query()
                                                                ->where(
                                                                    'student_question_number',
                                                                    $question->question_number,
                                                                )
                                                                ->where(
                                                                    'student_submaterial_exam_id',
                                                                    $answer->studentSubmaterialExam->id,
                                                                )
                                                                ->select('answer_value')
                                                                ->first();
                                                        @endphp
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="fw-bold fs-4">
                                                                            Soal Essay
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="number"
                                                                                value="{{ $value ? $value->answer_value : '' }}"
                                                                                name="answer_value[]" placeholder="Nilai"
                                                                                class="form-control form-control-solid @error('answer_value[]') is-invalid @enderror"
                                                                                id="">
                                                                            @error('answer_value[]')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                            <input type="hidden"
                                                                                name="student_submaterial_exam_answer_id[]"
                                                                                value="{{ $answer->studentSubmaterialExam->id }}">
                                                                            <input type="hidden"
                                                                                name="student_question_number[]"
                                                                                value="{{ $answer->student_question_number }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 fw-semibold fs-6">
                                                                        {!! $question->questionBank->question !!}
                                                                    </div>
                                                                    <div class="mt-3 fw-bold fs-4">
                                                                        Jawaban
                                                                    </div>
                                                                    <div class="mt-3 fw-semibold fs-6">
                                                                        {{ $answer->answer }}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card" role="tablist">
                                            <div class="card-body">
                                                <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="">
                                                                <span class="dt-column-title fw-bold">No</span>
                                                            </th>
                                                            <th class="">
                                                                <span class="dt-column-title fw-bold">Nama</span>
                                                            </th>
                                                            <th class="">
                                                                <span class="dt-column-title fw-bold">Kelas</span>
                                                            </th>
                                                            <th class="">
                                                                <span class="dt-column-title fw-bold">Opsi</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fw-semibold">
                                                        @forelse ($students as $index => $student)
                                                            <tr>
                                                                <td class="">
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td class="">
                                                                    {{ $student->student->name }}
                                                                </td>
                                                                <td class="">
                                                                    {{ $student->student->studentSchool->studentClassroom->classroom->name }}
                                                                </td>
                                                                <td class="">
                                                                    <a class="nav-link {{ $index == 0 ? 'active' : '' }} btn-sm btn-light-primary btn"
                                                                        data-bs-toggle="tab"
                                                                        href="#kt_vtab_pane_{{ $student->student->id }}"
                                                                        aria-selected="true" role="tab">Pilih</a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Toolbar container-->
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Footer-->
            <div id="kt_app_footer" class="app-footer ">
                <!--begin::Footer container-->
                <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-semibold me-1">{{ Carbon::now()->format('Y') }}©</span>
                        <a href="#"class="text-gray-800 text-hover-primary">Kelas
                            Industri</a>
                    </div>
                    <!--end::Copyright-->

                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item"><a href="#" class="menu-link px-2">Tentang
                                Kami</a></li>

                        <li class="menu-item"><a href="#" class="menu-link px-2">Syarat & Ketentuan</a></li>

                        <li class="menu-item"><a href="#" class="menu-link px-2">Kebijakan Privasi</a></li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Footer container-->
            </div>
            <!--end::Footer-->
        </div>
    </div>
    </div>
@endsection
