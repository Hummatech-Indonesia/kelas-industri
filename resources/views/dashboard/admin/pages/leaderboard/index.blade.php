@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-lg-7" id="kt_toolbar">
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                Peringkat
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="#x`" class="text-muted text-hover-primary">
                        daftar siswa dengan nilai
                        terbaik. </a>
                </li>
                <!--end::Item-->
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        {{-- @if (auth()->user()->roles->pluck('name')[0] == 'admin')
            <form id="form-search" action="{{ route('admin.rankings') }}">
                <!--begin::Actions-->
                <div class="d-flex align-items-center py-2 py-md-1">
                    @if ($rankings->count() > 0)
                        <select name="filter" class="form-select form-select-solid" placeholder="Select an option"
                            data-control="select2">
                            <option value="">Semua Sekolah</option>
                            @foreach ($schools as $school)
                                <option {{ $filter == $school->id ? 'selected' : '' }} value="{{ $school->id }}">
                                    {{ $school->name }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <select name="" id="" class="form-select form-select-solid" data-control="select2" >
                            <option value="">Data Kosong</option>
                        </select>
                    @endif
                    <!--begin::school year-->

                    <!--end::school yeaer-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary ms-3">Cari</button>
                    <!--end::Button-->
            </form>
        @elseif(auth()->user()->roles->pluck('name')[0] == 'school')
            <form id="form-search" action="{{ route('school.rankings') }}">
                <!--begin::Actions-->
                <div class="d-flex align-items-center py-2 py-md-1">
                    <!--begin::school year-->
                    @if ($rankings->count() > 0)
                        <select name="filter" class="form-select form-select-solid" placeholder="Select an option"
                            data-control="select2">
                            <option value="">Semua Sekolah</option>
                            @foreach ($schools as $school)
                                <option {{ $filter == $school->id ? 'selected' : '' }} value="{{ $school->id }}">
                                    {{ $school->name }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <select name="" id="" class="form-select form-select-solid" data-control="select2" placeholder="Select an option">
                            <option value="">Data Kosong</option>
                        </select>
                    @endif
                    <!--end::school yeaer-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <!--end::Button-->
            </form>
        @endif --}}
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                <form id="form-search" action="{{ route('admin.rankings') }}">
                @else
                    <form id="form-search" action="{{ route('school.rankings') }}">
            @endif
            <!--begin::Card-->
            <div class="card mb-7">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Compact form-->
                    <div class="d-flex align-items-center">
                        <!--begin::Input group-->
                        <div class="position-relative col-lg-10 col-md-12 me-3">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <!--end::Svg Icon-->
                                <select name="filter" class="form-select form-select-solid" placeholder="Select an option"
                                    data-control="select2">
                                    <option value="">Semua Sekolah</option>
                                    @foreach ($schools as $school)
                                        <option {{ $filter == $school->id ? 'selected' : '' }} value="{{ $school->id }}">
                                            {{ $school->name }}
                                        </option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-lg-2 col-md-12 ms-3">
                            <button type="submit" class="btn btn-primary">Cari</button>
                            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                <a href="{{ route('admin.rankings') }}" type="button"
                                    class="btn btn-light text-light ms-2"><i class="fonticon-repeat"></i></a>
                            @else
                                <a href="{{ route('school.rankings') }}" type="button"
                                    class="btn btn-light text-light ms-2"><i class="fonticon-repeat"></i></a>
                            @endif
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
                        @if ($rankings->count() > 0)
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
                                                <td><img width="50px"
                                                        src="{{ asset('app-assets/medal_file/gold-medal.png') }}"
                                                        alt=""></td>
                                            @elseif ($key == 1)
                                                <td><img width="50px"
                                                        src="{{ asset('app-assets/medal_file/silver-medal.png') }}"
                                                        alt=""></td>
                                            @elseif ($key == 2)
                                                <td><img width="50px"
                                                        src="{{ asset('app-assets/medal_file/bronze-medal.png') }}"
                                                        alt=""></td>
                                            @else
                                                <td>
                                                    <div class="d-flex justify-content-center items-center"
                                                        style="width:50px; height:50px; ">
                                                        <p>{{ $loop->iteration }}</p>
                                                    </div>
                                                </td>
                                            @endif
                                            <td>{{ $ranking->student->name }}</td>
                                            <td>{{ $ranking->student->studentSchool->school->name }}</td>
                                            <td>{{ $ranking->point }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <x-empty-component title="ranking" />
                        @endif
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
