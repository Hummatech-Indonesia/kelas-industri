@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.finance.layout.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Bukti Gaji Mentor
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List gaji mentor pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body pt-4">

                        <form action="{{ route('administration.salary-mentor.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-end" style="width: 100%">
                                <button type="submit" class="btn btn-dark fw-bold">Gaji</button>
                            </div>
                        <!--begin::Table-->

                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Absen</th>
                                    <th>Jumlah Gaji</th>
                                    <th>Bukti Pembayaran</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach($attendances as $attendance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <input type="text" class="form-control" name="user_id[]"
                                                    value="{{ $attendance->mentor->id }}" hidden>
                                                {{ $attendance->mentor->name }}
                                            </td>
                                            <td>
                                                {{ $attendance->count }}
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="salary_amount[]"
                                                    value="{{ $attendance->count * 50000 }}" hidden>
                                                {{ $attendance->count * 50000 }}
                                            </td>
                                            <td>
                                                <input type="file" class="form-control" name="photo[]" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </form>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        {{-- @else
                            <x-empty-component title="gaji" />
                        @endif --}}
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>
@endsection
