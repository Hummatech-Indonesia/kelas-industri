@extends('dashboard.user.layouts.app')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">


            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-8 ">

                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    {{ $classroom->name }}
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        @role('student')
                                            <a href="{{ route('student.classrooms') }}" class="text-muted text-hover-primary">
                                                Kelas </a>
                                        @else
                                            <a href="{{ route('common.classrooms') }}" class="text-muted text-hover-primary">
                                                Kelas </a>
                                        @endrole

                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        @role('student')
                                            <a href="{{ route('student.showClassrooms', request()->classroom->id) }}"
                                                class="text-muted text-hover-primary">
                                                Detail </a>
                                        @else
                                            <a href="{{ route('common.showClassrooms', request()->classroom->id) }}"
                                                class="text-muted text-hover-primary">
                                                Detail </a>
                                        @endrole

                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                @role('student')
                                    <a href="{{ route('student.classrooms') }}"
                                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                        <i class="bi bi-arrow-left me-2"></i> Kembali
                                    </a>
                                @else
                                    <a href="{{ route('common.classrooms') }}"
                                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                        <i class="bi bi-arrow-left me-2"></i> Kembali
                                    </a>
                                @endrole


                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">

                    <div class="row">
                        @if ($errors->any())
                            <div class="col-12">
                                <x-errors-component />
                            </div>
                        @endif
                        <div class="col col-md-8">
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
                                            <div class="col-lg-6">
                                                <form action="" class="d-flex gap-2">
                                                    <input type="text" class="form-control" placeholder="Cari" name="name">
                                                    <button class="btn btn-primary">Cari</button>
                                                </form>
                                            </div>
                                            {{-- <div class="col-lg-6 d-flex justify-content-end">
                                                <button class="btn btn-light-primary h-40px fs-7" data-bs-toggle="modal"
                                                        data-bs-target="#modal-add">Tambah
                                                </button>
                                            </div> --}}
                                            <!--end::Title-->
                                        </div>
                                        <div class="card-body">

                                            @if (count($students) > 0)
                                                <table id="kt_datatable_responsive"
                                                    class="table table-striped border rounded gy-5 gs-7">
                                                    <thead>
                                                        <tr class="fw-semibold fs-6 text-gray-800">
                                                            <th data-priority="1">No</th>
                                                            <th class="min-w-50px" data-priority="2">Nama</th>
                                                            <th data-priority="3">Email</th>
                                                            <th data-priority="4">No Telepon</th>
                                                            <th class="min-w-50px" data-priority="5">Alamat</th>

                                                            @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                                <th>Aksi</th>
                                                            @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                                <th>Aksi</th>
                                                            @else
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @dd($students) --}}
                                                        @foreach ($students as $studentSchool)
                                                            <tr>

                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $studentSchool->student->name }}</td>
                                                                <td>{{ $studentSchool->student->email }}</td>
                                                                <td>{{ $studentSchool->student->phone_number }}
                                                                </td>
                                                                <td>{{ $studentSchool->student->address }}</td>
                                                                @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                                    <td>
                                                                        <a href="{{ route('teacher.showStudentDetail', [$studentSchool->student->id, $studentSchool->studentClassroom->classroom->generation_id]) }}"
                                                                            class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Detail</a>
                                                                    </td>
                                                                @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                                    <td>
                                                                        <a href="{{ route('mentor.showStudentDetail', [$studentSchool->student->id, $studentSchool->studentClassroom->classroom->generation_id]) }}"
                                                                            class="btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Detail</a>
                                                                        <form
                                                                            action="{{ route('mentor.add.point', $studentSchool->student->id) }}"
                                                                            method="POST"
                                                                            class="btn btn-sm btn-color-primary text-uppercase mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <input
                                                                                class="btn border btn-sm text-uppercase mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto"
                                                                                style="width: 70px" type="text"
                                                                                name="point">
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm text-uppercase mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor" class="bi bi-floppy"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path d="M11 2H9v3h2z" />
                                                                                    <path
                                                                                        d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                                                                </svg>
                                                                            </button>
                                                                        </form>
                                                                        {{-- <form action=""
                                                                            class="btn d-flex btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto"
                                                                            method="post">
                                                                            <input class="form-control" style="width: 50px; margin-right:2px" type="text"
                                                                                name="poin" id="">
                                                                            <button class="btn btn-primary"
                                                                                type="submit"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor" class="bi bi-floppy"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path d="M11 2H9v3h2z" />
                                                                                    <path
                                                                                        d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                                                                </svg></button>
                                                                        </form> --}}
                                                                    </td>
                                                                @else
                                                                @endif
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
                        <div class="col col-md-4">
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
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
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
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->


        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer ">
            <!--begin::Footer container-->
            <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">{{ \Carbon\Carbon::now()->format('Y') }}©</span>
                    <a href="#" class="text-gray-800 text-hover-primary">Kelas
                        Industri</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item"><a href="#" class="menu-link px-2">Tentang
                            Kami</a></li>

                    <li class="menu-item"><a href="#" class="menu-link px-2">Syarat & Ketentuan</a></li>

                    <li class="menu-item"><a href="#" class="menu-link px-2">Kebijakan Privasi</a></li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
@endsection
