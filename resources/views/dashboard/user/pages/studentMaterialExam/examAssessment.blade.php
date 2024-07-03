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

                                    <div class="d-flex">
                                        <div data-bs-toggle="tooltip" class="me-3" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip"
                                            data-bs-title="*Maksimal Nilai Yang Bisa di Masukkan ke Soal Essay Persiswanya Adalah {{ $subMaterialExam->essay_value }} Dari Semua soal"><svg width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                        rx="10" fill="currentColor" />
                                                    <path
                                                        d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
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
                                                                ->where('student_exam_id', $studentExam->id)
                                                                ->first();
                                                            $value = StudentSubmaterialExamAnswer::query()
                                                                ->where(
                                                                    'student_question_number',
                                                                    $question->question_number,
                                                                )
                                                                ->where(
                                                                    'student_exam_id',
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
                                                                        @if ($answer->answer)
                                                                            {{ $answer->answer }}
                                                                        @else
                                                                            <span class="badge badge-danger">Tidak dijawab</span>
                                                                        @endif
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
