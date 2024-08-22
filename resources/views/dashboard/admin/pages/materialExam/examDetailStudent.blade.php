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
                <div class="mb-3 d-flex justify-content-between">
                    <div class=""></div>
                    <a
                        href="{{ route('admin.download.score.student', ['materialExam' => $materialExam, 'type' => $type]) }}">
                        <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                <path
                                    d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z" />
                            </svg> Download Nilai</button>
                    </a>
                </div>
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
                            {{-- <th class="min-w-50px text-center">
                                <span class="dt-column-title fw-bold">Tertinggi</span>
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody class="fw-semibold">
                        @forelse ($studentSubMaterialExams as $index => $student)
                            <tr>
                                <td class="text-center">
                                    @if ($index == 0)
                                        <img width="30px" src="{{ asset('app-assets/medal_file/gold-medal.png') }}"
                                            alt="">
                                    @elseif($index == 1)
                                        <img width="30px" src="{{ asset('app-assets/medal_file/silver-medal.png') }}"
                                            alt="">
                                    @elseif($index == 2)
                                        <img width="30px" src="{{ asset('app-assets/medal_file/bronze-medal.png') }}"
                                            alt="">
                                    @else
                                        {{ $index + 1 }}
                                    @endif
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
                                        <span
                                            class="badge py-3 px-4 fs-7 badge-light-primary">{{ $student->score }}</span>
                                    @endif
                                </td>
                                {{-- <td class="text-center">
                                    @if ($student->score < 75)
                                        <span
                                            class="badge py-3 px-4 fs-7 badge-light-danger">{{ $student->higest_score }}</span>
                                    @else
                                        <span
                                            class="badge py-3 px-4 fs-7 badge-light-primary">{{ $student->higest_score }}</span>
                                    @endif
                                </td> --}}
                            </tr>
                        @empty
                            <x-empty-component title="siswa" />
                        @endforelse
                    </tbody>
                </table>
                {{ $studentSubMaterialExams->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#schools').change(function() {
            $.ajax({
                method: 'GET',
                url: '{{ route('admin.zoom-schedules.create') }}',
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
