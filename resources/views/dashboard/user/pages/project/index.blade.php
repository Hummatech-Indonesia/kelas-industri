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
                                    Project
                                </h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="#" class="text-muted text-hover-primary">
                                            Home </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        Utilities
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        Search
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('common.classrooms') }}"
                                        class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                        <i class="bi bi-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    <div class="card mb-6 mb-xl-9">
                        <div class="card-body pt-9 pb-0">
                            <!--begin::Details-->
                            <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                                <!--begin::Image-->
                                <div
                                    class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                                    <img class="mw-50px mw-lg-150px"
                                        src="{{ $project ? asset('storage/' . $project->photo) : asset('app-assets/media/svg/avatars/blank.svg') }}"
                                        alt="image">
                                </div>
                                <!--end::Image-->

                                <!--begin::Wrapper-->
                                <div class="flex-grow-1">
                                    <!--begin::Head-->
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Status-->
                                            <div class="d-flex align-items-center mb-1">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">
                                                    {{ $project ? $project->name : 'Project Kosong' }}
                                                </a>
                                                @if ($project)
                                                    <span
                                                        class="badge
                                                @if ($project->status == 'pending') badge-light-warning
                                                @elseif($project->status == 'approved') badge-light-success
                                                @elseif($project->status == 'not_approved') badge-light-danger @endif fw-bold me-auto px-4 py-3">
                                                        @if ($project->status == 'pending')
                                                            Menunggu
                                                        @elseif($project->status == 'approved')
                                                            Diterima
                                                        @elseif($project->status == 'not_approved')
                                                            Tidak Diterima
                                                        @endif
                                                    </span>
                                                    @if ($project->status == 'not_approved')
                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx btn-reject"
                                                            type="button"><svg width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="#F1416C" />
                                                                <rect x="11" y="17" width="7" height="2"
                                                                    rx="1" transform="rotate(-90 11 17)"
                                                                    fill="#F1416C" />
                                                                <rect x="11" y="9" width="2" height="2"
                                                                    rx="1" transform="rotate(-90 11 9)"
                                                                    fill="#F1416C" />
                                                            </svg>
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="badge badge-light-danger me-auto"> - </span>
                                                @endif
                                            </div>

                                            <!--end::Status-->

                                            <!--begin::Description-->
                                            <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">
                                                {{ $project ? $project->description : 'Deskripsi Project' }}
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Actions-->
                                        @if ($project == null || $project->status == 'pending' || $project->status == 'not_approved')
                                            <div class="d-flex mb-4 btn btn-sm btn-primary me-3 btn-plus">
                                                Upload
                                                Project
                                            </div>
                                        @endif
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Head-->

                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap justify-content-start">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-4 fw-bold">
                                                        {{ $project->start != null ? \Carbon\Carbon::parse($project->start)->locale('id')->isoFormat('D MMMM YYYY'): '-' }}
                                                    </div>
                                                </div>
                                                <!--end::Number-->

                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-500">Project Mulai</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->

                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-4 fw-bold">
                                                        {{ $project? \Carbon\Carbon::parse($project->deadline)->locale('id')->isoFormat('D MMMM YYYY'): '-' }}
                                                    </div>
                                                </div>
                                                <!--end::Number-->

                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-500">Tenggat Project</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                        </div>
                                        <!--end::Stats-->

                                        <!--begin::Users-->
                                        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                            data-bs-title="This project {{ $project ? $project->progress : '0' }}% completed">
                                            <div class="bg-primary rounded h-4px" role="progressbar"
                                                style="width: {{ $project ? $project->progress : '0' }}%"
                                                aria-valuenow="{{ $project ? $project->progress : '0' }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <!--end::Users-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Details-->

                            <div class="separator"></div>

                            <!--begin::Nav-->
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6 active" data-bs-toggle="tab"
                                        href="#kt_tab_pane_1">
                                        Tugas </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab"
                                        href="#kt_tab_pane_2">
                                        Catatan </a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6 " data-bs-toggle="tab"
                                        href="#kt_tab_pane_3">
                                        Zoom </a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6 " data-bs-toggle="tab"
                                        href="#kt_tab_pane_4">
                                        Settings </a>
                                </li>
                                <!--end::Nav item-->
                            </ul>
                            <!--end::Nav-->
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                            <h1>tol</h1>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                            <h1>Kon</h1>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                            <h1>tes</h1>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title fs-3 fw-bold">Project Settings</div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Form-->
                                <form id="kt_project_settings_form"
                                    class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Row-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Project Logo</div>
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline {{ !$project ? 'image-input-empty' : '' }}"
                                                    data-kt-image-input="true"
                                                    style="background-image: url({{ asset('app-assets/media/svg/avatars/blank.svg') }})">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: {{ $project ? 'url(' . asset('storage/' . $project->photo) . ')' : 'none' }}">
                                                    </div>
                                                    <!--end::Preview existing avatar-->

                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>

                                                        <!--begin::Inputs-->
                                                        <input type="file" name="photo"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->

                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->

                                                <!--begin::Hint-->
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Row-->
                                        <div class="row mb-3">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Project Name</div>
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                                <input type="text" class="form-control form-control-solid"
                                                    name="name" value="{{ $project ? $project->name : '' }}">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Row-->
                                        <div class="row mb-3">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Project Description</div>
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                                <textarea name="description" class="form-control form-control-solid h-100px">{{ $project ? $project->description : '' }}
                                                </textarea>
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <!--begin::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Row-->
                                        <div class="row mb-3">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Deadline Project</div>
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                                <div class="position-relative d-flex align-items-center">
                                                    <input type="date" name="deadline"
                                                        value="{{ $project ? $project->deadline : '' }}"
                                                        class="form-control form-control-solid" id="">
                                                </div>
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <!--begin::Col-->
                                        </div>
                                        <!--end::Row-->

                                    </div>
                                    <!--end::Card body-->

                                    <!--begin::Card footer-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary me-2">Discard</button>

                                        <button type="submit" class="btn btn-primary"
                                            id="kt_project_settings_submit">Save Changes</button>
                                    </div>
                                    <!--end::Card footer-->
                                    <input type="hidden">
                                </form>
                                <!--end:Form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="create_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Upload Project</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                            width="30">
                            <path
                                d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body row">
                    <form action="{{ route('student.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="total_pay" class="mb-2">Nama Project</label>
                            <input type="text" value="{{ $project ? $project->name : '' }}"
                                placeholder="Masukkan nama project" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="total_pay" class="mb-2">Foto Project</label>
                            <input type="file" name="photo" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="total_pay" class="mb-2">Deskripsi Project</label>
                            <textarea name="description" class="form-control" id="" cols="30"
                                placeholder="Masukkan deskripsi project" rows="5">{{ $project ? $project->description : '' }}</textarea>
                        </div>
                        <div class="mb-5">
                            <label for="payment_date" class="mb-2">Tenggat Project</label>
                            <input type="date" class="form-control" value="{{ $project ? $project->deadline : '' }}"
                                name="deadline">
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_reject">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Alasan Project ditolak</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <p></p>
                    <h5>Jika ingin mengajukan Project lagi silahkan Upload Project Kembali</h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.btn-plus').click(function() {
            $('#create_modal').modal('show');
        });

        $('.btn-reject').click(function() {
            $('#kt_modal_reject').modal('show');
        });
    </script>
@endsection
