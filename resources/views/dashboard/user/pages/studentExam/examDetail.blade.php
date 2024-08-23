@php
    use App\Enums\MaterialExamTypeEnum;
    use Carbon\Carbon;
@endphp
@extends('dashboard.user.layouts.app')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-8 ">

                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Ujian
                                </h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="#" class="text-muted text-hover-primary">
                                            List Ujian Pada Kelas Yang Anda Ajar </a>
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
                                    @role('mentor')
                                        <a href="{{ route('mentor.materialExam.index') }}"
                                            class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                            <i class="bi bi-arrow-left me-2"></i> Kembali
                                        </a>
                                    @endrole
                                    @role('teacher')
                                        <a href="{{ route('teacher.materialExam.index') }}"
                                            class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                            <i class="bi bi-arrow-left me-2"></i> Kembali
                                        </a>
                                    @endrole
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>

                <div id="kt_app_toolbar_container" class="app-container container-fluid">
                    <form action="" class="mb-4" method="get">
                        <div class="row">
                            <div class="col-2">
                                <select name="type" class="form-select me-2">
                                    <option value="pre_test" {{ request()->type == 'pre_test' ? 'selected' : '' }}>Pre Test
                                    </option>
                                    <option value="post_test" {{ request()->type == 'post_test' ? 'selected' : '' }}>Post
                                        Test</option>
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
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 mb-0">
                            <div class="card border-bottom border-success px-4 mb-5">
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="mt-1">
                                        <p class="fs-4 text-dark fw-semibold">
                                            Total Siswa
                                        </p>
                                    </div>
                                    <div class="">
                                        <span class="svg-icon svg-icon-success svg-icon-2hx"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                                    fill="currentColor" />
                                                <rect opacity="0.3" x="14" y="4" width="4" height="4"
                                                    rx="2" fill="currentColor" />
                                                <path
                                                    d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                                    fill="currentColor" />
                                                <rect opacity="0.3" x="6" y="5" width="6" height="6"
                                                    rx="3" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="">
                                    <p class="fs-4 text-info mb-4 all-student" style="font-weight: 1000;">
                                        {{ count($students) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-0">
                            <div class="card border-bottom border-warning px-4 mb-5">
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="mt-1">
                                        <p class="fs-4 text-dark fw-semibold">
                                            Nilai Tertinggi
                                        </p>
                                    </div>
                                    <div class="">
                                        <span class="svg-icon svg-icon-warning svg-icon-2hx"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.8 8.79999L13 13.6L9.7 10.3C9.3 9.89999 8.7 9.89999 8.3 10.3L2.3 16.3C1.9 16.7 1.9 17.3 2.3 17.7C2.5 17.9 2.7 18 3 18C3.3 18 3.5 17.9 3.7 17.7L9 12.4L12.3 15.7C12.7 16.1 13.3 16.1 13.7 15.7L19.2 10.2L17.8 8.79999Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3" d="M22 13.1V7C22 6.4 21.6 6 21 6H14.9L22 13.1Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="">
                                    <p class="fs-4 text-info mb-4 high-grade" style="font-weight: 1000;">{{ $highValue }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-0">
                            <div class="card border-bottom border-info px-4 mb-5">
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="mt-1">
                                        <p class="fs-4 text-dark fw-semibold">
                                            Nilai Rata-Rata
                                        </p>
                                    </div>
                                    <span class="svg-icon svg-icon-info svg-icon-2hx"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5"
                                                fill="currentColor" />
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14"
                                                rx="1.5" fill="currentColor" />
                                            <rect x="18" y="11" width="3" height="8" rx="1.5"
                                                fill="currentColor" />
                                            <rect x="3" y="13" width="3" height="6" rx="1.5"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="">
                                    <p class="fs-4 text-info mb-4 mid-grade" style="font-weight: 1000;">
                                        {{ $averageValue }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-0">
                            <div class="card border-bottom border-danger px-4 mb-5">
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="mt-1">
                                        <p class="fs-4 text-dark fw-semibold">
                                            Nilai Terendah
                                        </p>
                                    </div>
                                    <div class="">
                                        <span class="svg-icon svg-icon-danger svg-icon-2hx"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.2 13.8L13.7 8.3C13.3 7.9 12.7 7.9 12.3 8.3L9 11.6L3.7 6.3C3.3 5.9 2.7 5.9 2.3 6.3C1.9 6.7 1.9 7.3 2.3 7.7L8.3 13.7C8.7 14.1 9.3 14.1 9.7 13.7L13 10.4L17.8 15.2L19.2 13.8Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3" d="M22 10.9V17C22 17.6 21.6 18 21 18H14.9L22 10.9Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="">
                                    <p class="fs-4 text-info mb-4 low-grade" style="font-weight: 1000;">
                                        {{ $lowValue }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-header justify-content-center bg-primary text-center"
                                    style="min-height:50px;border-radius:10px">
                                    <h3 class="card-title text-white">Daftar siswa pada ujian
                                    </h3>
                                </div>
                                <!--begin::Title-->

                                <!--end::Title-->
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Item-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable">
                                        <thead>
                                            <tr>
                                                <th class="min-w-150px text-center">
                                                    <span class="dt-column-title fw-bold">No</span>
                                                </th>
                                                <th class="min-w-150px text-center">
                                                    <span class="dt-column-title fw-bold">Nama</span>
                                                </th>
                                                <th class="min-w-50px text-center">
                                                    <span class="dt-column-title fw-bold">Kelas</span>
                                                </th>
                                                <th class="min-w-50px text-center">
                                                    <span class="dt-column-title fw-bold">Soal Benar</span>
                                                </th>
                                                <th class="min-w-50px text-center">
                                                    <span class="dt-column-title fw-bold">Soal Salah</span>
                                                </th>
                                                <th class="min-w-50px text-center">
                                                    <span class="dt-column-title fw-bold">Status</span>
                                                </th>
                                                <th class="min-w-50px text-center">
                                                    <span class="dt-column-title fw-bold">Nilai Soal</span>
                                                </th>
                                                @role('mentor')
                                                    <th class="min-w-50px text-center">
                                                        <span class="dt-column-title fw-bold">Aksi</span>
                                                    </th>
                                                @endrole
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold">
                                            @forelse ($students as $student)
                                                @php
                                                    $checkExampAnswer = $student->studentMaterialExamAnswers;
                                                    $checkStudentAnswer = $checkExampAnswer
                                                        ->where('student_exam_id', $student->id)
                                                        ->first();
                                                @endphp
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-start">
                                                        {{ $student->student->name }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $student->student->studentSchool->studentClassroom->classroom->name }}
                                                    </td>
                                                    <td class="text-center">
                                                        <span
                                                            class="badge py-3 px-4 fs-7 badge-light-success">{{ $student->true_answer + count($checkExampAnswer->where('answer_value', '!=', null)) }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span
                                                            class="badge py-3 px-4 fs-7 badge-light-danger">{{ $student->materialExam->total_multiple_choice - $student->true_answer }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        {{-- @dd($student->materialExam->studentMaterialExams->where('type', MaterialExamTypeEnum::PRETEST->value)->where('student_id', auth()->user()->id)->first()->finished_exam) --}}
                                                        {{-- @dd($student->finished_exam) --}}
                                                        @if ($student->materialExam->studentMaterialExams == null)
                                                            <span class="badge py-3 px-4 fs-7 badge-light-danger">Belum
                                                                Ujian</span>
                                                        @elseif (is_null($student->finished_exam))
                                                            <span class="badge py-3 px-4 fs-7 badge-light-danger">Sedang
                                                                Mengerjakan</span>
                                                        @elseif ($checkExampAnswer->first() == null && $student->materialExam == null)
                                                            <span class="badge py-3 px-4 fs-7 badge-light-warning">Belum
                                                                Dinilai</span>
                                                        @elseif ($checkStudentAnswer && $checkStudentAnswer?->answer_value == null)
                                                            <span class="badge py-3 px-4 fs-7 badge-light-warning">Belum
                                                                Dinilai</span>
                                                        @else
                                                            <span class="badge py-3 px-4 fs-7 badge-light-success">Sudah
                                                                Dinilai</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <span
                                                            class="badge py-3 px-4 fs-7 badge-light-primary">{{ $student->score }}</span>
                                                    </td>
                                                    @role('mentor')
                                                        <th>
                                                            <form
                                                                action="{{ route('mentor.materialExam.reset', $student->id) }}"
                                                                method="POST" class="reset-form"
                                                                data-student-name="{{ $student->student->name }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn m-auto btn-danger btn-reset-test">
                                                                    Reset
                                                                </button>
                                                            </form>
                                                        </th>
                                                    @endrole
                                                </tr>
                                            @empty
                                            @endforelse

                                        </tbody>
                                    </table>

                                </div>
                                <!--end::Body-->
                            </div>
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
@endsection
@section('script')
    <script>
        $('.reset-form').submit(function(e) {
            let studentName = $(this).data('student-name');
            let form = this;

            e.preventDefault();
            Swal.fire({
                    html: `Apakah anda yakin ingin mereset test untuk ${studentName}? `,
                    icon: "question",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Iya",
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
