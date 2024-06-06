@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-lg-7" id="kt_toolbar">
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                View Tugas
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">
                        Halaman view tugas
                    </a>
                </li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form id="form-search" action="#">
                <!--begin::Card-->
                <div class="card mb-7">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Compact form-->
                        <div class="d-flex align-items-center">
                            <!--begin::Input group-->
                            <div class="position-relative col-lg-10 col-md-12 me-3">
                                <select name="filter" class="form-select form-select-solid" placeholder="Select an option"
                                    data-control="select2">
                                    <option value="">Semua Sekolah</option>
                                    <option value="1">Sekolah A</option>
                                    <option value="2">Sekolah B</option>
                                    <option value="3">Sekolah C</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-12 ms-3">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <a href="#" type="button" class="btn btn-light text-light ms-2"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Muat Ulang">
                                    <i class="fonticon-repeat"></i>
                                </a>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Compact form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="kt_datatable_responsive" class="table border rounded gy-5 gs-7">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Guru</th>
                                    <th class="text-center">Jurnal</th>
                                    <th class="text-center">Tugas Dikoreksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teachers as $teacher)
                                {{-- @dd($teacher->teacher->journals->count()) --}}
                                {{-- @dd($teacher->teacherschool) --}}
                                    <tr>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">{{ $teacher->name }}</td>
                                        <td class="text-center align-middle">{{ $teacher->teacher->journals_count }}</td>
                                        {{-- <td class="text-center align-middle">{{ $teacher->teacherschool->submit_assignments_count }}</td> --}}


                                    </tr>
                                    @empty
                                    <x-empty-component title="guru"/>
                                @endif

                            </tbody>
                        </table>


                        {{-- <div class="text-center">
                            <x-empty-component title="peringkat" />
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
@endsection
