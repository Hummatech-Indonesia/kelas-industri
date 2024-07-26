@php
    use Carbon\Carbon;
@endphp

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
        <div class="row">
            <form id="form-search" action="">
                <!--begin::Card-->
                <div class="card mb-7">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Compact form-->
                        <div class="searching row align-items-center">
                            <!--begin::Input group-->
                            <div class="col row">
                                <div class="position-relative col-lg-5 col-md-12 me-3">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span
                                        class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                            </rect>
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" class="form-control form-control-solid ps-10" name="search"
                                        value="{{ $search }}" placeholder="Search">
                                </div>
                                <div class="position-relative col-lg-3 col-md-12 me-3">
                                    <select name="school_id" class="form-select form-select-solid me-5"
                                        data-control="select2" data-placeholder="Semua Sekolah" id="schools">
                                        <option value=""></option>
                                        @forelse ($schools as $school)
                                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="position-relative col-lg-3 col-md-12 me-3">
                                    <select name="classroom_id" class="form-select form-select-solid me-5"
                                        data-control="select2" data-placeholder="Semua Kelas" id="classrooms">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-12 d-flex">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <a href="{{ route('admin.materials.index') }}" type="button"
                                    class="btn btn-light text-light ms-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Muat Ulang"><i
                                        class="fonticon-repeat"></i></a>
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
                            <th class="min-w-50px text-center">
                                <span class="dt-column-title fw-bold">Tertinggi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold">
                        @forelse ($studentSubMaterialExams as $student)
                            <tr>
                                <td class="text-center">
                                    <img width="30px" src="{{ asset('app-assets/medal_file/gold-medal.png') }}"
                                        alt="">
                                </td>
                                <td class="text-center">
                                    {{ $student->student->name }}
                                </td>
                                <td class="text-center">
                                    {{ $student->student->studentSchool->studentClassroom->classroom->name }}
                                </td>
                                <td class="text-center">
                                    {{ Carbon::parse($student->created_at)->isoFormat('DD-MM-YYYY HH:mm') }}
                                </td>
                                <td class="text-center">
                                    {{ Carbon::parse($student->finished_exam)->isoFormat('DD-MM-YYYY HH:mm') }}
                                </td>
                                <td class="text-center">
                                    @if ($student->score < 75)
                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">{{ $student->score }}</span>
                                    @else
                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">{{ $student->score }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($student->score < 75)
                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">{{ $student->higest_score }}</span>
                                    @else
                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">{{ $student->higest_score }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <x-empty-component title="siswa" />
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#schools').change(function() {
            $.ajax({
                method: 'GET',
                url: '{{ route('admin.zoomSchedules.create') }}',
                data: {
                    school_id: $(this).val()
                },
                success: function(classrooms) {
                    $('#classrooms').html('')
                    console.log(classrooms)
                    let html = '<option value="">semua kelas</option>'

                    classrooms.map(classroom => {
                        html +=
                            `<option
                        (old('classsroom_id') == ${classroom.id}) ? 'selected' : '' value="${classroom.id}">${classroom.name} - ${classroom.generation.school_year.school_year} </option>`
                    })

                    $('#classrooms').html(html)
                },
                error: function(response) {
                    console.log(response.responseText)
                }
            })
        })
    </script>
@endsection
