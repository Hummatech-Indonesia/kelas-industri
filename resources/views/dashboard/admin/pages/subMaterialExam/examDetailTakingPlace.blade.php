@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column justify-content-between">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Ujian Berlangsung
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Daftar List Siswa Yang Membuka Tab
            </p>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="card">
                <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable">
                    <thead>
                        <tr>
                            <th class="min-w-50px text-center">
                                <span class="dt-column-title fw-bold">No</span>
                            </th>
                            <th class="min-w-200px text-center">
                                <span class="dt-column-title fw-bold">Nama Siswa</span>
                            </th>
                            <th class="min-w-200px text-center">
                                <span class="dt-column-title fw-bold">Kelas</span>
                            </th>
                            <th class="min-w-50px text-center">
                                <span class="dt-column-title fw-bold">Membuka Tab</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold">
                        @forelse ($submaterialExam->studentSubmaterialExams as $studentSubamaterialExam)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    {{ $studentSubamaterialExam->student->name }}
                                </td>
                                <td class="text-center">
                                    {{ $studentSubamaterialExam->student->studentSchool->studentClassroom->classroom->name }}
                                </td>
                                <td class="text-center">
                                    <span class="badge py-3 px-4 fs-7 badge-light-danger">10</span>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <x-empty-component title="siswa" />     
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
