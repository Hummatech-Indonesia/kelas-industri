@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Overview
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                    <a href="../../index-2.html" class="text-gray-600 text-hover-primary">
                        Home </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                    User Profile </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-500">
                    Overview </li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        {{-- <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="#" class="btn btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"
                id="kt_toolbar_primary_button">
                Tambah </a>
            <!--end::Button-->
        </div> --}}
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Peringkat</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Daftar siswa dengan nilai terbaik di kelas
                                industri.</span>
                        </h3>
                        <!--end::Title-->
                    </div>
                    <div class="card-body">

                        <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Sekolah</th>
                                    <th>Point</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rankings as $key=>$ranking)
                                    <tr>
                                        @if ($key == 0)
                                            <td><img width="50px" src="{{ asset('storage/medal_file/gold-medal.png') }}"
                                                    alt=""></td>
                                        @elseif ($key == 1)
                                            <td><img width="50px" src="{{ asset('storage/medal_file/silver-medal.png') }}"
                                                    alt=""></td>
                                        @elseif ($key == 2)
                                            <td><img width="50px" src="{{ asset('storage/medal_file/bronze-medal.png') }}"
                                                    alt=""></td>
                                        @else
                                            <td>{{ $key == 3 ? $loop->iteration : $loop->iteration + $key - 3 }}</td>
                                        @endif
                                        <td>{{ $ranking->student->name }}</td>
                                        <td>{{ $ranking->student->studentSchool->school->name }}</td>
                                        <td>{{ $ranking->point }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
