@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column justify-content-between">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Daftar Siswa Pada Ujian
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Siswa Pada Ujian Yang Sudah Selesai
            </p>
            <!--end::Breadcrumb-->
        </div>
        <div class="d-flex flex-stack pt-3">
            <!--begin::Wrapper-->
            <a href="{{ url()->previous() }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
            <!--end::Wrapper-->
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="card">
            <div class="card-body">
                <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable">
                    <thead>
                        <tr>
                            <th class="min-w-50px text-center">
                                <span class="dt-column-title fw-bold">No</span>
                            </th>
                            <th class="min-w-200px text-center">
                                <span class="dt-column-title fw-bold">Nama</span>
                            </th>
                            <th class="min-w-50px text-center">
                                <span class="dt-column-title fw-bold">Kelas</span>
                            </th>
                            <th class="min-w-50px text-center">
                                <span class="dt-column-title fw-bold">Mulai Ujian</span>
                            </th>
                            <th class="min-w-50px text-center">
                                <span class="dt-column-title fw-bold">Selesai Ujian</span>
                            </th>
                            <th class="min-w-50px text-center">
                                <span class="dt-column-title fw-bold">Nilai</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold">
                        <tr>
                            <td class="text-center">
                                <img width="30px" src="{{ asset('app-assets/medal_file/gold-medal.png') }}"
                                    alt="">
                            </td>
                            <td class="text-center">
                                Alfian Fahrul Himawan S. Tr. Kom
                            </td>
                            <td class="text-center">
                                X RPL A
                            </td>
                            <td class="text-center">
                                17 Mei 2024
                            </td>
                            <td class="text-center">
                                18 Mei 2024
                            </td>
                            <td class="text-center">
                                <span class="badge py-3 px-4 fs-7 badge-light-primary">90</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
