@php
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
                                    <a href="{{ route('mentor.submaterialExam.index') }}"
                                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                        <i class="bi bi-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <div id="kt_app_toolbar_container" class="app-container container-fluid">
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
                                        <img src="http://127.0.0.1:8632/infogreen.svg" width="30px" alt="">
                                    </div>
                                </div>
                                <div class="">
                                    <p class="fs-4 text-info mb-4 all-student" style="font-weight: 1000;">{{ count($students) }}</p>
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
                                        <img src="https://teacher.mischool.online/infowarning.svg" width="30px"
                                            alt="">
                                    </div>
                                </div>
                                <div class="">
                                    <p class="fs-4 text-info mb-4 high-grade" style="font-weight: 1000;">{{ $highValue }}</p>
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
                                    <div class="">
                                        <img src="https://teacher.mischool.online/info.svg" width="30px" alt="">
                                    </div>
                                </div>
                                <div class="">
                                    <p class="fs-4 text-info mb-4 mid-grade" style="font-weight: 1000;">{{$averageValue}}</p>
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
                                        <img src="https://teacher.mischool.online/infodanger.svg" width="30px"
                                            alt="">
                                    </div>
                                </div>
                                <div class="">
                                    <p class="fs-4 text-info mb-4 low-grade" style="font-weight: 1000;">{{ $lowValue }}</p>
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
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold">
                                            @forelse ($students as $student)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $student->student->name }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $student->student->studentSchool->studentClassroom->classroom->name }}
                                                    </td>
                                                    <td class="text-center">
                                                        <span
                                                            class="badge py-3 px-4 fs-7 badge-light-success">{{ $student->true_answer }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span
                                                            class="badge py-3 px-4 fs-7 badge-light-danger">{{ $student->subMaterialExam->total_multiple_choice - $student->true_answer }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($student->subMaterialExam->studentSubmaterialExams == null)
                                                            <span class="badge py-3 px-4 fs-7 badge-light-danger">Belum Ujian</span>
                                                            @elseif ($student->studentSubMaterialExamAnswers[0]->answer_value == null)
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
