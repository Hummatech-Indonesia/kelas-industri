@extends('dashboard.finance.layout.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Riwayat Gaji Guru
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List riwayat gaji guru pada kelas industri.
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
                            <button class="btn btn-dark fw-bold" type="submit" id="search">Cari</button>
                        </form>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-4">

                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gaji</th>
                                    <th>Bukti</th>
                                    <th>Tanggal</th>
                                    <th>Angkatan</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td>Testing</td>
                                        <td>Testing</td>
                                        <td>Testing</td>
                                        <td>Testing</td>
                                        <td>Testing</td>
                                        <td>Testing</td>
                                    </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        {{-- {{$mentors->links('pagination::bootstrap-5')}} --}}
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>

        </div>
        <x-delete-modal-component />
    </div>
@endsection
