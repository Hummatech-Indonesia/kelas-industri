@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-lg-7" id="kt_toolbar">
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1
                class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                Peringkat
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="../../index-2.html" class="text-muted text-hover-primary">
                        daftar siswa dengan nilai
                        terbaik. </a>
                </li>
                <!--end::Item-->
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        @if (auth()->user()->roles->pluck('name')[0] == 'admin')
        <form id="form-search" action="{{ route('admin.rankings') }}">
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-2 py-md-1">

                <!--begin::school year-->
                <select name="filter" class="form-select form-select-solid me-5" placeholder="Select an option"
                    data-control="select">
                    <option value="">Semua Sekolah</option>
                    @foreach ($schools as $school)
                        <option {{ $filter == $school->id ? 'selected' : '' }} value="{{ $school->id }}">
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
                <!--end::school yeaer-->
                <!--begin::Button-->
                <button type="submit" class="btn btn-primary">Cari</button>
                <!--end::Button-->
        </form>
        @else
        <form id="form-search" action="{{ route('school.rankings') }}">
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-2 py-md-1">

                <!--begin::school year-->
                <select name="filter" class="form-select form-select-solid me-5" placeholder="Select an option"
                    data-control="select">
                    <option value="">Semua Sekolah</option>
                    @foreach ($schools as $school)
                        <option {{ $filter == $school->id ? 'selected' : '' }} value="{{ $school->id }}">
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
                <!--end::school yeaer-->
                <!--begin::Button-->
                <button type="submit" class="btn btn-primary">Cari</button>
                <!--end::Button-->
        </form>
        @endif
    </div>
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
                                @foreach ($rankings as $key => $ranking)
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
