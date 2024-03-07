@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                {{ $classroom->name }}
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    {{ count($classroom->students) }} Siswa
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('school.classrooms.index') }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <!--end::Actions-->
    </div>



    {{--    modal add student --}}
    <div class="modal fade" tabindex="-1" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Siswa</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('school.rollingStudent.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                    <div class="modal-body">
                        <div class="col-12">
                            <label for="">Siswa <span class="text-danger">*</span></label>
                            <select name="students[]" class="form-select form-select-solid me-5 mt-3" data-control="select2"
                                data-placeholder="Select an option" multiple="multiple">
                                @foreach ($students as $student)
                                    <option
                                        {{ in_array($student->id, $classroom->students->pluck('student_school_id')->toArray()) ? 'selected' : '' }}
                                        value="{{ $student->id }}">{{ $student->student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    end modal add student --}}

    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            @if ($errors->any())
                <div class="col-12">
                    <x-errors-component />
                </div>
            @endif
            <div class="col-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <div class="col-lg-6">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-800">Siswa</span>
                                        <span class="text-gray-400 mt-1 fw-semibold fs-6">daftar siswa di kelas
                                            {{ $classroom->name }}.</span>
                                    </h3>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end">
                                    <button class="btn btn-light-primary h-40px fs-7" data-bs-toggle="modal"
                                        data-bs-target="#modal-add">Tambah
                                    </button>
                                </div>
                                <!--end::Title-->
                            </div>
                            <div class="card-body">

                                @if (count($studentClassroom) > 0)
                                    <table id="kt_datatable_responsive"
                                        class="table table-striped border rounded gy-5 gs-7">
                                        <thead>
                                            <tr class="fw-semibold fs-6 text-gray-800">
                                                <th data-priority="1">No</th>
                                                <th class="min-w-200px" data-priority="2">Nama</th>
                                                <th class="min-w-200px" data-priority="3">Email</th>
                                                <th data-priority="4">No Telepon</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($studentClassroom as $student)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $student->student->name }}</td>
                                                    <td>{{ $student->student->email }}</td>
                                                    <td>{{ $student->student->phone_number }}</td>
                                                    <td>{{ $student->student->address }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <x-empty-component title="siswa" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body">
                        @if ($classroom->teacherClassroom)
                            <!--begin::Summary-->


                            <!--begin::User Info-->
                            <div class="d-flex flex-center flex-column py-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{ $classroom->teacherClassroom->teacherSchool->teacher->photo ? asset('storage/' . $classroom->teacherClassroom->teacherSchool->teacher->photo) : asset('app-assets/media/svg/avatars/blank.svg') }}"
                                    alt="image" />
                                </div>
                                <!--end::Avatar-->

                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                    {{ $classroom->teacherClassroom->teacherSchool->teacher->name }} </a>
                                <!--end::Name-->

                                <!--begin::Position-->
                                <div class="mb-9">
                                    <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline">Guru</div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Position-->

                                <!--begin::Info-->
                            </div>
                            <!--end::User Info-->
                            <!--end::Summary-->

                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                    href="#kt_user_view_details" role="button" aria-expanded="false"
                                    aria-controls="kt_user_view_details">
                                    Detail
                                    <span class="ms-2 rotate-180">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                            </div>
                            <!--end::Details toggle-->

                            <div class="separator"></div>

                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Nomor Rekening</div>
                                    <div class="text-gray-600">
                                        {{ $classroom->teacherClassroom->teacherSchool->teacher->account_number ? $classroom->teacherClassroom->teacherSchool->teacher->account_number : '-' }}
                                        (
                                        {{ $classroom->teacherClassroom->teacherSchool->teacher->bank ? $classroom->teacherClassroom->teacherSchool->teacher->bank : '-' }}
                                        )
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-600"><a href="#"
                                            class="text-gray-600 text-hover-primary">{{ $classroom->teacherClassroom->teacherSchool->teacher->email ? $classroom->teacherClassroom->teacherSchool->teacher->email : '-' }}</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">No Telepon</div>
                                    <div class="text-gray-600">
                                        {{ $classroom->teacherClassroom->teacherSchool->teacher->phone_number ? $classroom->teacherClassroom->teacherSchool->teacher->phone_number : '-' }}
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Alamat</div>
                                    <div class="text-gray-600">
                                        {{ $classroom->teacherClassroom->teacherSchool->teacher->address ? $classroom->teacherClassroom->teacherSchool->teacher->address : '-' }}
                                    </div>
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        @else
                            <x-empty-component title="guru" />
                        @endif
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>

    <x-delete-modal-component />
@endsection
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $('.btn-edit').click(function() {
            const data = $(this).data('student')
            $('#studentName').val(data.name)
            $('#studentEmail').val(data.email)
            $('#studentPhone').val(data.phone_number)
            $('#studentAddress').val(data.address)

            const url = "{{ route('school.students.update', ':id') }}".replace(':id', data.id)
            $('#formStudentEdit').attr('action', url)
        })

        $('.btn-delete').click(function() {
            const url = "{{ route('school.students.destroy', ':id') }}".replace(':id', $(this).data('id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })
    </script>
@endsection
