@extends('dashboard.finance.layout.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Guru
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Guru pada kelas industri.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex justify-content-end me-4">
                        <form class="d-flex mt-5" style="width: 300px;" role="search" method="GET">
                            <input class="form-control me-2" type="text" name="search" placeholder="Cari Guru"
                                aria-label="Search" value="{{ request('search') }}">
                            <button class="btn btn-dark fw-bold" id="search">Cari</button>
                        </form>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" >
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>No Rekening</th>
                                    <th>Bank</th>
                                    <th>Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->phone_number }}</td>
                                        <td>{{ $teacher->account_number }}</td>
                                        <td>{{ $teacher->bank }}</td>
                                        <td>
                                            <a href="{{ route('administration.teacher.show', $teacher->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-detail btn-sm me-1"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip" data-bs-title="Lihat Detail">
                                                <i class="fa fa-eye fs-3 text-primary"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        {{ $teachers->links('pagination::bootstrap-5') }}
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>

        </div>
        <x-delete-modal-component />
    </div>
@endsection
@section('script')
@endsection
