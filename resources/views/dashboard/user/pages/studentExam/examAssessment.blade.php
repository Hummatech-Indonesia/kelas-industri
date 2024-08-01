@php
    use App\Models\StudentMaterialExam;
    use App\Models\MaterialExamQuestion;
    use App\Models\StudentMaterialExamAnswer;
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
                                    Penilaian Soal Essay Pada Test {{ $materialExam->material->title }}
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
                                    <a href="{{ route('mentor.materialExam.index') }}"
                                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                        <i class="bi bi-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                        <div id="kt_content" class="container">
                            <form action="" class="mt-4" method="get">
                                <div class="row">
                                    <div class="col-2">
                                        <select name="type" class="form-select me-2">
                                            <option value="pre_test" {{ request()->type == 'pre_test' ? 'selected' : '' }}>
                                                Pre Test
                                            </option>
                                            <option value="post_test"
                                                {{ request()->type == 'post_test' ? 'selected' : '' }}>Post
                                                Test</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select name="answer_value" class="form-select me-2">
                                            <option value="">Filter Penilaian</option>
                                            <option value="not_null"
                                                {{ request()->answer_value == 'not_null' ? 'selected' : '' }}>Sudah Dinilai
                                            </option>
                                            <option value="null"
                                                {{ request()->answer_value == 'null' ? 'selected' : '' }}>Belum
                                                dinilai</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select name="classroom_id" class="form-select me-2">
                                            <option value="">Kelas</option>
                                            @foreach ($classrooms as $classroom)
                                                <option value="{{ $classroom->classroom_id }}"
                                                    {{ request()->classroom_id == $classroom->classroom_id ? 'selected' : '' }}>
                                                    {{ $classroom->classroom->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-light-primary btn-md">
                                            <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                </div>
                            </form>

                            <div class="bg-light-warning rounded border border-warning mt-4">
                                <div class="mt-3 ms-3 mb-3 me-3 fw-semibold fs-7">
                                    <span class="svg-icon svg-icon-warning svg-icon-2x"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                fill="currentColor" />
                                            <rect x="11" y="14" width="7" height="2" rx="1"
                                                transform="rotate(-90 11 14)" fill="currentColor" />
                                            <rect x="11" y="17" width="2" height="2" rx="1"
                                                transform="rotate(-90 11 17)" fill="currentColor" />
                                        </svg>
                                    </span>
                                    Maksimal Nilai Yang Bisa di Masukkan ke Soal Essay Persiswanya Adalah
                                    {{ $materialExam->essay_value }} Dari Semua soal
                                </div>
                            </div>

                            <form action="{{ route('mentor.studentMaterialExamEssayScore', $materialExam->id) }}"
                                method="post">
                                @csrf
                                @php
                                    $questionNumberArry = [];
                                    foreach ($answers as $answer) {
                                        array_push($questionNumberArry, $answer->student_question_number);
                                    }
                                    $questions = MaterialExamQuestion::query()
                                        ->with('questionBank')
                                        ->where('material_exam_id', $materialExam->id)
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
                                                    $studentExam = StudentMaterialExam::find($index);
                                                @endphp
                                                {{-- @dd($studentExam->student->id); --}}
                                                <div class="tab-pane fade
                                                @if ($first) @php
                                                    $first = false
                                                @endphp
                                                active show @endif"
                                                    id="kt_vtab_pane_{{ $studentExam->id }}" role="tabpanel">
                                                    @foreach ($questions as $question)
                                                        @php
                                                            $answer = $answer
                                                                ->where(
                                                                    'student_question_number',
                                                                    $question->question_number,
                                                                )
                                                                ->where('student_exam_id', $studentExam->id)
                                                                ->first();
                                                            $value = StudentMaterialExamAnswer::query()
                                                                ->where(
                                                                    'student_question_number',
                                                                    $question->question_number,
                                                                )
                                                                ->where(
                                                                    'student_exam_id',
                                                                    $answer->studentMaterialExam->id,
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
                                                                                name="student_material_exam_answer_id[]"
                                                                                value="{{ $answer->studentMaterialExam->id }}">
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
                                                                            <span class="badge badge-danger">Tidak
                                                                                dijawab</span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            @empty
                                                <div class="card">
                                                    <div class="text-center">
                                                        <img src="{{ asset('user-assets/media/misc/watch.svg') }}"
                                                            class="h-150px" alt="" />
                                                        <!--end::Illustration-->

                                                        <!--begin::Title-->
                                                        <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih Kosong</h4>
                                                        <!--end::Title-->

                                                        <!--begin::Desctiption-->
                                                        <span class="fw-semibold text-gray-700 mb-4 d-block">
                                                            belum ada soal untuk saat ini.
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card" role="tablist">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-end  ">
                                                    <button type="submit" class="btn btn-primary btn-md ">
                                                        Simpan
                                                    </button>
                                                </div>
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
                                                                        href="#kt_vtab_pane_{{ $student->id }}"
                                                                        aria-selected="true" role="tab">Pilih</a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="text-center">
                                                                        <img src="{{ asset('user-assets/media/misc/watch.svg') }}"
                                                                            class="h-150px" alt="" />
                                                                        <!--end::Illustration-->

                                                                        <!--begin::Title-->
                                                                        <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih
                                                                            Kosong</h4>
                                                                        <!--end::Title-->

                                                                        <!--begin::Desctiption-->
                                                                        <span
                                                                            class="fw-semibold text-gray-700 mb-4 d-block">
                                                                            belum ada siswa untuk saat ini.
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
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
