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
                Bukti Gaji Guru
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List gaji guru pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <!--end::Actions-->
        {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('administration.salaryTeacher.create') }}" class="btn btn-dark fw-bold h-40px fs-7">
                Tambah
            </a>
        </div> --}}
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-4">

                        <!--begin::Table-->
                        <form action="{{ route('administration.salaryTeacher.index') }}" method="get">
                            @csrf
                            <select name="school_id" id="">
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}"
                                        {{ request('school_id') == $school->id ? 'selected' : '' }}>{{ $school->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" name="getSchool" class="btn btn-dark fw-bold h-40px fs-7">get
                                school</button>
                        </form>
                        {{-- @if ($salarys->count() > 0) --}}
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Angkatan</th>
                                    <th>Jumlah Gaji</th>
                                    <th>Bukti Pembayaran</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                <form action="{{ route('administration.salary-mentor.create') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <input type="text" class="form-control" name="user_id[]" value="{{ $teacher->teacher->id }}" hidden>
                                                {{ $teacher->teacher->name }}
                                            </td>
                                            <td>
                                                <select name="generation_id[]" id="">
                                                    @foreach ($generations as $generation)
                                                        <option value="{{ $generation->id }}">{{ $generation->generation }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="salary_amount[]"
                                                    placeholder="50000">
                                            </td>
                                            <td>
                                                <input type="file" class="form-control" name="photo[]" />
                                            </td>
                                        </tr>
                                    @endforeach
                                    <button type="submit">gaji guru</button>
                                </form>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        {{-- @else --}}
                        {{-- <x-empty-component title="gaji" /> --}}
                        {{--  @endif --}}
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>

        </div>
    </div>
@endsection
