@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                Detail Sekolah
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    Detail Halaman Dari {{ $school->name }}
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.schools.index') }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom gutter-b">

                    <div class="card-body">

                        <!--begin::Details-->

                        <div class="d-flex mb-9">

                            <!--begin: Pic-->

                            <div class="flex-shrink-0 me-7 mt-lg-0 mt-3">

                                <div class="symbol symbol-50 symbol-lg-120">
                                    @if ($school->photo)
                                        <img src="{{ asset('storage/' . $school->photo) }}" alt="kanesa">
                                    @else
                                        <div class="symbol-label fs-2 fw-semibold bg-primary text-inverse-danger">
                                            {{ substr($school->name, 0, 1) }}</div>
                                    @endif
                                </div>
                                {{-- <div class="symbol symbol-50px">
                                    <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger"></div>
                                </div> --}}

                            </div>

                            <!--end::Pic-->



                            <!--begin::Info-->

                            <div class="flex-grow-1">

                                <!--begin::Title-->

                                <div class="d-flex justify-content-between flex-wrap mt-1">

                                    <div class="d-flex flex-row align-items-center me-3">

                                        <p class="fw-bolder text-hover-primary h5 font-weight-bold mb-0 me-3">
                                            {{ $school->name }}
                                        </p>

                                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen026.svg-->
                                        <span class="svg-icon svg-icon-success svg-icon-2x"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                    fill="white" />
                                            </svg></span>
                                        <!--end::Svg Icon-->

                                    </div>

                                </div>

                                <!--end::Title-->



                                <!--begin::Content-->

                                <div class="d-flex flex-wrap justify-content-between mt-1">

                                    <div class="d-flex flex-column flex-grow-1 pr-8">

                                        <div class="d-flex flex-wrap mb-1">

                                            <p
                                                class="text-muted text-hover-dark font-weight-bold me-lg-8 me-5 mb-lg-0 mb-2">
                                                <i class="las la-user-tie me-2 fs-3"></i>{{ $school->headmaster }}
                                            </p>

                                        </div>

                                        <div class="d-flex flex-wrap mb-1">
                                            <p
                                                class="text-muted text-hover-dark font-weight-bold me-lg-8 me-5 mb-lg-0 mb-2">
                                                <i class="las la-envelope me-2 fs-3"></i>{{ $school->email }}
                                            </p>
                                        </div>

                                        <div class="d-flex flex-wrap mb-1">

                                            <p
                                                class="text-muted text-hover-dark font-weight-bold me-lg-8 me-5 mb-lg-0 mb-2">
                                                <i class="las la-phone me-2 fs-3"></i>{{ $school->phone_number }}
                                            </p>

                                        </div>

                                        <div class="d-flex flex-wrap mb-4">

                                            <p
                                                class="text-muted text-hover-dark font-weight-bold me-lg-8 me-5 mb-lg-0 mb-2">
                                                <i class="las la-map-marker-alt me-2 fs-3"></i>{{ $school->address }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <!--end::Content-->

                            </div>

                            <!--end::Info-->
                            <div class="row">
                                @if ($hasExam)
                                    <div class="col"><a href="{{ route('admin.exportUser', $school->id) }}"
                                            class="btn btn-sm btn-primary w-150px">
                                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/arrows/arr044.svg-->
                                            <span class="svg-icon svg-icon-muted svg-icon-1hx"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-earmark-arrow-down-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            Akun Tes
                                        </a></div>
                                    @if (count($studentExams) > 0)
                                        <div class="col"><a
                                                href="{{ route('admin.exportStudentRegristationExam', $school->id) }}"
                                                class="btn btn-sm btn-success w-150px">
                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/arrows/arr044.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-1hx"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-arrow-down-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                Hasil Tes
                                            </a></div>
                                        <div class="col">
                                            <form action="{{ route('admin.regristationExam-delete', $school->id) }}"
                                                method="post" id="delete-user-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger w-150px"
                                                    id="btn-delete-user" data-id="{{ $school->id }}">
                                                    <span class="svg-icon svg-icon-white svg-icon-1x m-0"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="currentColor" class="bi bi-trash-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0">
                                                            </path>
                                                        </svg>
                                                    </span>Akun Test</button>
                                            </form>
                                        </div>
                                    @endif
                                @endif
                            </div>

                        </div>

                        <!--end::Details-->



                        <div class="separator separator-solid"></div>



                        <!--begin::Items-->

                        <div class="flex-wrap mt-8"
                            style="width: auto; display: flex; justify-content: space-around; align-items: center;">

                            <!--begin::Item-->

                            <div class="d-flex justify-content-center align-items-center flex-lg-fill mr-5 mb-2">

                                <span class="me-4">

                                    <i class="las la-chalkboard-teacher text-muted fs-3x"></i>

                                </span>

                                <div class="d-flex flex-column text-dark-75">

                                    <span class="fw-bolder font-size-sm">{{ count($school->teachers) }} Guru</span>


                                </div>

                            </div>

                            <!--end::Item-->



                            <!--begin::Item-->

                            <div class="d-flex justify-content-center align-items-center flex-lg-fill mr-5 mb-2">

                                <span class="me-4">

                                    <i class="las la-user-friends text-muted fs-3x"></i>

                                </span>

                                <div class="d-flex flex-column text-dark-75">

                                    <span class="fw-bolder font-size-sm">{{ $countAllStudent }} Siswa</span>

                                </div>

                            </div>

                            <!--end::Item-->



                            <!--begin::Item-->

                            <div class="d-flex justify-content-center align-items-center flex-lg-fill mr-5 mb-2">

                                <span class="me-4">

                                    <i class="las la-university text-muted fs-3x"></i>

                                </span>

                                <div class="d-flex flex-column text-dark-75">

                                    <span class="fw-bolder font-size-sm">{{ count($school->classrooms) }} Kelas</span>


                                </div>

                            </div>

                            <!--end::Item-->

                        </div>

                        <!--begin::Items-->

                    </div>

                </div>
            </div>
            <div class="col-12 mt-7">
                <div class="card">
                    <div class="card-header pt-7 d-flex justify-content-between">
                        <!--begin::Title-->
                        <div class="">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Guru</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">daftar guru di
                                    {{ $school->name }}.</span>
                            </h3>
                        </div>

                        <div>
                            <a href="{{ route('admin.rollingTeacher.index', [$school->id]) }}"
                                class="btn btn-dark fw-bold mb-2">
                                Rooling Guru </a>
                            <a href="{{ route('admin.teachers.create', [$school->id]) }}"
                                class="btn btn-primary fw-bold mb-2">
                                Tambah </a>
                        </div>
                        <!--end::Title-->
                    </div>
                    <div class="card-body">

                        <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>No Rekening</th>
                                    <th>Bank</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($school->teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $teacher->teacher->name }}</td>
                                        <td>{{ $teacher->teacher->email }}</td>
                                        <td>{{ $teacher->teacher->phone_number }}</td>
                                        <td>{{ $teacher->teacher->account_number }}</td>
                                        <td>{{ $teacher->teacher->bank }}</td>
                                        <td>
                                            <a href="{{ route('admin.teachers.edit', [$teacher->teacher->id, $school->id]) }}"
                                                class="btn btn-default btn-sm p-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Edit"><i
                                                    class="fa-regular fa-pen-to-square fs-3 text-warning"></i></a>
                                            <button class="btn btn-default btn-sm p-1 btn-delete-teahcer"
                                                data-id="{{ $teacher->teacher->id }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Hapus Data">
                                                <i class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="toolbar mt-7 mb-lg-7 justify-content-between d-flex" id="kt_toolbar">

                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        List Kelas
                    </h1>
                    <!--end::Title-->

                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            list kelas {{ $school->name }}
                        </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <a href="{{ route('admin.classrooms.create', ['school' => $school->id]) }}"
                    class="btn btn-primary fw-bold">
                    Tambah </a>

                <!--end::Actions-->
            </div>
            <form id="form-search" action="" method="GET">
                <div class="col-12">
                    <!--begin::Card-->
                    <div class="card mb-7">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Compact form-->
                            <div class="searching align-items-center row">
                                <!--begin::Input group-->
                                <div class="position-relative col-lg-6 col-md-12">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span
                                        class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="currentColor">
                                            </rect>
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" class="form-control form-control-solid ps-10" name="search"
                                        value="" placeholder="Search">
                                </div>
                                <div class="position-relative col-lg-2 col-md-12">
                                    <select name="school_year_id" class="form-select form-select-solid"
                                        data-control="select2" data-placeholder="Select an option" id="schoolYear">
                                        @foreach ($schoolyears as $schoolYear)
                                            <option value="{{ $schoolYear->id }}">{{ $schoolYear->school_year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="position-relative col-lg-2 col-md-12">
                                    <select name="generation_id" class="form-select form-select-solid me-5"
                                        data-control="select2" data-placeholder="Select an option" id="generations">
                                        @foreach ($generations as $generation)
                                            <option value="{{ $generation->id }}">{{ $generation->generation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="position-relative col-lg-2 col-md-12">
                                    <button class="btn btn-primary" id="btn-search">Cari</button>
                                    <a href="{{ route('admin.schools.show', $school->id) }}" type="button"
                                        class="btn btn-light text-light"><i class="fonticon-repeat"></i></a>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Compact form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
            </form>
            <div class="col-12 mt-3">
                <!--begin::Body-->
                <div class="row">
                    @forelse ($schools as $classroom)
                        @forelse ($classroom->classrooms as $class)
                            <div class="col-xl-4 mb-3">

                                <!--begin::Card-->

                                <div class="card card-custom gutter-b card-stretch">

                                    <!--begin::Body-->

                                    <div class="card-body">

                                        <!--begin::Section-->

                                        <div class="d-flex align-items-center">

                                            <!--begin::Pic-->

                                            <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">

                                                <span
                                                    class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($class->name, 0, 1) }}</span>


                                            </div>

                                            <!--end::Pic-->

                                            <!--begin::Info-->

                                            <div class="d-flex flex-column me-auto">

                                                <!--begin: Title-->

                                                <a href="https://class.hummasoft.com/siswa/materi/11/4"
                                                    class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1">

                                                    {{ $class->name }}
                                                </a>

                                                <span class="text-muted font-weight-bold">
                                                    Devisi {{ $class->devision->name }}
                                                </span>

                                                <span class="text-muted font-weight-bold">
                                                    {{ $class->generation->generation }}
                                                    ({{ $class->generation->schoolYear->school_year }})
                                                </span>
                                                <!--end::Title-->
                                            </div>

                                            <div class="d-flex">
                                                <a href="{{ route('admin.classrooms.edit', [$class->id, $school->id]) }}"
                                                    class="btn btn-default btn-sm p-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Edit"><i
                                                        class="fa-regular fa-pen-to-square fs-3 text-warning"></i></a>
                                                <button class="btn btn-default btn-sm p-1 btn-delete"
                                                    data-id="{{ $class->id }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Hapus Data">
                                                    <i class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                            </div>
                                            <!--end::Info-->

                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--begin::Footer-->

                                    <div class="card-footer d-flex flex-row justify-content-between">

                                        <div class="d-flex">

                                            <div class="d-flex align-items-center me-5">
                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/communication/com014.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                                            fill="currentColor" />
                                                        <rect opacity="0.3" x="14" y="4" width="4" height="4"
                                                            rx="2" fill="currentColor" />
                                                        <path
                                                            d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                                            fill="currentColor" />
                                                        <rect opacity="0.3" x="6" y="5" width="6" height="6"
                                                            rx="3" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <a href="{{ route('admin.classrooms.show', $class->id) }}"
                                                    class="fw-bold text-info ml-2">{{ $countStudents[$class->id] }}
                                                    Siswa</a>
                                            </div>


                                        </div>

                                        <a href="{{ route('admin.classrooms.show', $class->id) }}"
                                            class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>

                                    </div>

                                    <!--end::Footer-->

                                </div>

                                <!--end::Card-->

                            </div>
                        @empty
                            <x-empty-component title="kelas" />
                        @endforelse
                    @empty
                        <x-empty-component title="kelas" />
                    @endforelse
                </div>

                <!--end::Body-->

                <!--begin::Footer-->

                <!--end::Footer-->
            </div>
            <div class="toolbar mt-7 mb-lg-7 justify-content-between d-flex" id="kt_toolbar">

                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        Siswa
                    </h1>
                    <!--end::Title-->

                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            List siswa pada {{ $school->name }}
                        </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-flex">
                    <input type="text" class="form-control" placeholder="name" name="name" id="name">
                    <select class="form-select form-select-solid me-4" name="classroom_id" aria-label="Select example"
                        value="{{ old('classroom_id') }}" id="select-classroom">
                        <option value="">Pilih Kelas</option>
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>

                    <a href="#" type="button" class="btn btn-success fw-bold me-3" data-bs-toggle="modal"
                        data-bs-target="#modal-import">
                        Import </a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <a href="{{ route('admin.students.create', $school->id) }}" class="btn btn-primary fw-bold">
                        Tambah </a>
                </div>

                <!--end::Actions-->
            </div>
            <div class="content flex-column-fluid" id="kt_content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!--begin::Card body-->
                            <div class="card-body pt-0">

                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatables-responsive">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No Telepon</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-delete-modal-component />
    {{--    modal import --}}
    <div class="modal fade" tabindex="-1" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Import Siswa</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('admin.importStudents', $school->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!--begin::Alert-->
                        <div class="alert alert-warning d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                                <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg width="24"
                                        height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </span>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Title-->
                                <h4 class="mb-1 text-dark">Informasi</h4>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <ul>
                                    <li>Jika siswa tidak terimport maka kemungkinan email siswa tersebut telah
                                        digunakan.
                                    </li>
                                    <li>File yang dapat diunggah berupa file excel berekstensi xls, xlsx.</li>
                                    <li>Password siswa secara default adalah <b>password</b></li>
                                    <li>Format pengisian file excel seperti dibawah ini.</li>
                                    <li>
                                        <a href="{{ asset('data-siswa.xlsx') }}" class="btn btn-success btn-sm"><i
                                                class="fas fa-file-excel"></i> Download
                                            Format Excel
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Content-->

                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->

                        <div class="col-12">
                            <label for="">File Excel <span class="text-danger">*</span></label>
                            <input type="file" class="form-control mt-3" name="file">
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
    {{--    end modal import --}}
@endsection
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom/apps/customers/list/list.js') }}"></script>
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $('.btn-delete').click(function() {
                const url = "{{ route('admin.classrooms.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })

            $(document).on('click', '.delete', function() {
                const url = "{{ route('admin.students.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })

            // Datatables Responsive
            $("#select-classroom").on('change', function() {
                var selectedClassroom = $(this).val();
                var url = "{{ route('admin.students.all', ['school' => $school->id]) }}";

                $("#datatables-responsive").DataTable().ajax.url(url).load();
            });

            $("#name").on('change', function() {
                var name = $(this).val();
                var url = "{{ route('admin.students.all', ['school' => $school->id]) }}";

                $("#datatables-responsive").DataTable().ajax.url(url).load();
            });

            $("#datatables-responsive").DataTable({
                paging: true,
                pageLength: 10,
                responsive: true,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: {
                    url: "{{ route('admin.students.all', ['school' => $school->id]) }}",
                    data: function(d) {
                        d.classroom_id = $('#select-classroom').val();
                        d.name = $('#name').val();
                    }
                },
                oLanguage: {
                    sProcessing: 'loading...'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'student.name',
                        name: 'student.name'
                    },
                    {
                        data: 'student.email',
                        name: 'student.email'
                    },
                    {
                        data: 'student.phone_number',
                        name: 'student.phone_number'
                    },
                    {
                        data: 'student_classroom',
                        name: 'student_classroom',
                        render: function(data, type, row) {
                            if (data != null) {
                                return data.classroom.name;
                            } else {
                                return '-';
                            }
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $('.btn-delete-teahcer').click(function() {
                const url = "{{ route('admin.teachers.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)
                $('#kt_modal_delete').modal('show')
            })

            $('#btn-delete-user').click(function() {
                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Anda akan menghapus semua akun untuk tes!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#delete-user-form').submit();
                    }
                });
            })
        });
    </script>
@endsection
