@extends('dashboard.user.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/global/plugins.bundle.css') }}" type="text/css">
@endsection

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
                                    <img class="mw-50px mw-lg-100px"
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
                                                            data-message=" {{ $project->message }}" type="button"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                        {{ $project && $project->start != null? \Carbon\Carbon::parse($project->start)->locale('id')->isoFormat('D MMMM YYYY'): '-' }}
                                                            {{-- {{ $project->start != null? \Carbon\Carbon::parse($project->start)->locale('id')->isoFormat('D MMMM YYYY'): '-' }} --}}
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
                                        @if ($tasks == [])
                                            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Proyek ini 0% selesai">
                                                <div class="bg-primary rounded h-4px" role="progressbar" style="width: 0%"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        @else
                                            @php
                                                $totalTasks = $tasks->where('project_id', $project->id)->count();

                                                $finishedTasks = $tasks
                                                    ->where('project_id', $project->id)
                                                    ->where('status', 'finished')
                                                    ->count();

                                                $progressPercentage =
                                                    $totalTasks > 0 ? ($finishedTasks / $totalTasks) * 100 : 0;
                                            @endphp

                                            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Proyek ini {{ number_format($progressPercentage) }}% selesai">
                                                <div class="bg-primary rounded h-4px" role="progressbar"
                                                    style="width: {{ number_format($progressPercentage) }}%"
                                                    aria-valuenow="{{ number_format($progressPercentage) }}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        @endif
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
                                        Catatan Revisi</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6 " data-bs-toggle="tab"
                                        href="#kt_tab_pane_3">
                                        Presentasi </a>
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
                        @if ($project)
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                <div class="d-flex flex-wrap flex-stack pt-5 pb-5 mb-5">
                                    <!--begin::Heading-->
                                    <h3 class="fw-bold my-2">
                                        List Tugas
                                        <span class="fs-6 text-gray-500 fw-semibold ms-1">Daftar tugas yang anda buat
                                            ↓</span>
                                    </h3>
                                    <!--end::Heading-->
                                </div>
                                <div style="overflow-x: auto; width: 100%">
                                    <div class="d-flex flex-nowrap" style="min-width: 100%">
                                        <!-- Ubah class row menjadi d-flex dan tambahkan flex-nowrap -->
                                        <div class="col-md-3 col-lg-12 col-xl-3 me-5">
                                            <!--begin::Col header-->
                                            <div class="mb-9">
                                                <div class="d-flex flex-stack">
                                                    @php
                                                        $statusToCount = 'new_task';
                                                        $statusDone = 'done';
                                                        $statusFinished = 'finished';
                                                        $statusRevised = 'revised';

                                                        $newTasks = $tasks->filter(function ($task) use (
                                                            $statusToCount,
                                                        ) {
                                                            return $task->status === $statusToCount &&
                                                                $task->deadline > now();
                                                        });
                                                        $doneTasks = $tasks->filter(function ($task) use ($statusDone) {
                                                            return $task->status === $statusDone &&
                                                                $task->deadline > now();
                                                        });
                                                        $finishedTasks = $tasks->filter(function ($task) use (
                                                            $statusFinished,
                                                        ) {
                                                            return $task->status === $statusFinished;
                                                        });
                                                        $notFinishedTasks = $tasks->filter(function ($task) use (
                                                            $statusToCount,
                                                            $statusDone,
                                                            $statusRevised,
                                                        ) {
                                                            return ($task->status === $statusToCount ||
                                                                $task->status === $statusDone ||
                                                                $task->status === $statusRevised) &&
                                                                $task->deadline < now();
                                                        });
                                                        $revisedTasks = $tasks->filter(function ($task) use (
                                                            $statusRevised,
                                                        ) {
                                                            return $task->status === $statusRevised &&
                                                                $task->deadline > now();
                                                        });

                                                        $countNewTasks = $newTasks->count();
                                                        $countDoneTasks = $doneTasks->count();
                                                        $countFinishedTasks = $finishedTasks->count();
                                                        $countNotFinishedTasks = $notFinishedTasks->count();
                                                        $countRevisedTasks = $revisedTasks->count();
                                                    @endphp
                                                    <div class="fw-bold fs-4">
                                                        Tugas Baru
                                                        <span class="fs-6 text-gray-500 ms-2">{{ $countNewTasks }}</span>
                                                    </div>

                                                </div>

                                                <div class="h-3px w-100 bg-warning"></div>
                                            </div>
                                            <div style="overflow-y: auto; max-height: 550px;">
                                                @foreach ($tasks as $task)
                                                    @if ($task->status == 'new_task' && $task->deadline > now())
                                                        @php
                                                            $badgeClass = '';
                                                            $description = '';
                                                            switch ($task->priority) {
                                                                case 'urgent':
                                                                    $badgeClass = 'badge-danger';
                                                                    $description = 'Mendesak';
                                                                    break;
                                                                case 'important':
                                                                    $badgeClass = 'badge-warning';
                                                                    $description = 'Penting';
                                                                    break;
                                                                case 'regular':
                                                                    $badgeClass = 'badge-primary';
                                                                    $description = 'Biasa';
                                                                    break;
                                                                case 'additional':
                                                                    $badgeClass = 'badge-info';
                                                                    $description = 'Tambahan';
                                                                    break;
                                                                case 'optional':
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Opsional';
                                                                    break;
                                                                default:
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Tidak dikenal';
                                                            }
                                                        @endphp
                                                        <div class="card mb-2 mb-xl-7 draggable-zone">
                                                            <!--begin::Card body-->
                                                            <div class="card-body">
                                                                <!--begin::Header-->
                                                                <div class="d-flex flex-stack mb-3">
                                                                    <!--begin::Badge-->
                                                                    <div class="badge {{ $badgeClass }}">
                                                                        {{ ucwords($description) }}
                                                                    </div>

                                                                    <!--end::Badge-->

                                                                    <!--begin::Menu-->
                                                                    <div>
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary"
                                                                            data-kt-menu-trigger="click"
                                                                            data-kt-menu-placement="bottom-end">
                                                                            <span
                                                                                class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20"
                                                                                        rx="4"
                                                                                        fill="currentColor" />
                                                                                    <rect x="11" y="11" width="2.6"
                                                                                        height="2.6" rx="1.3"
                                                                                        fill="currentColor" />
                                                                                    <rect x="15" y="11" width="2.6"
                                                                                        height="2.6" rx="1.3"
                                                                                        fill="currentColor" />
                                                                                    <rect x="7" y="11" width="2.6"
                                                                                        height="2.6" rx="1.3"
                                                                                        fill="currentColor" />
                                                                                </svg>
                                                                            </span>
                                                                        </button>

                                                                        <!--begin::Menu 3-->
                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                            data-kt-menu="true">
                                                                            <!--begin::Heading-->
                                                                            <div class="menu-item px-3">
                                                                                <div
                                                                                    class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                                                    Aksi
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Heading-->

                                                                            <!--begin::Menu item-->
                                                                            <div class="menu-item px-3">
                                                                                <div class="menu-link px-3 btn-edit-task"
                                                                                    data-id="{{ $task->id }}"
                                                                                    data-name="{{ $task->name }}"
                                                                                    data-description="{{ $task->description }}"
                                                                                    data-deadline="{{ $task->deadline }}"
                                                                                    data-status="{{ $task->status }}"
                                                                                    data-priority="{{ $task->priority }}">
                                                                                    Edit
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Menu item-->

                                                                            <!--begin::Menu item-->
                                                                            <div class="menu-item px-3">
                                                                                <a href="#"
                                                                                    class="menu-link flex-stack px-3 btn-delete-task"
                                                                                    data-id="{{ $task->id }}">
                                                                                    Delete
                                                                                </a>
                                                                            </div>
                                                                            <!--end::Menu item-->
                                                                        </div>
                                                                        <!--end::Menu 3-->
                                                                    </div>
                                                                    <!--end::Menu-->
                                                                </div>
                                                                <!--end::Header-->

                                                                <!--begin::Title-->
                                                                <div class="mb-2">
                                                                    <a href="#"
                                                                        class="fs-4 fw-bold mb-1 text-gray-900 text-hover-primary">{{ $task->name }}</a>
                                                                </div>
                                                                <!--end::Title-->

                                                                <!--begin::Content-->
                                                                <div class="fs-6 fw-semibold text-gray-600 mb-5">
                                                                    {{ $task->description }}</div>
                                                                <!--end::Content-->

                                                                <!--begin::Footer-->
                                                                <div
                                                                    class="d-flex flex-stack flex-wrapr justify-content-end">
                                                                    <!--begin::Stats-->
                                                                    <div class="d-flex my-1">
                                                                        @php
                                                                            $deadline = \Carbon\Carbon::parse(
                                                                                $task->deadline,
                                                                            );
                                                                            $now = \Carbon\Carbon::now();
                                                                            $daysUntilDeadline = $deadline->diffInDays(
                                                                                $now,
                                                                                false,
                                                                            );
                                                                        @endphp
                                                                        <!--begin::Stat-->
                                                                        <div
                                                                            class="border border-dashed border-gray-300 d-flex align-items-center rounded py-2 px-3 ms-3">
                                                                            <span class="ms-1 fs-7 fw-bold text-gray-600">
                                                                                @if ($daysUntilDeadline > 0)
                                                                                    {{ $daysUntilDeadline }} hari akan
                                                                                    datang
                                                                                @else
                                                                                    Hari ini adalah batas waktu
                                                                                @endif
                                                                            </span>
                                                                        </div>
                                                                        <!--end::Stat-->
                                                                    </div>
                                                                    <!--end::Stats-->
                                                                </div>
                                                                <!--end::Footer-->
                                                            </div>
                                                            <!--end::Card body-->
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <a href="#" class="btn btn-primary er w-100 fs-6 px-8 py-4"
                                                data-bs-toggle="modal" data-bs-target="#{{ in_array($project->status, ['not_approved', 'pending'])? 'disabled': 'kt_modal_new_project'}}">Buat Tugas
                                                Baru</a>
                                        </div>
                                        <div class="col-md-3 col-lg-12 col-xl-3 me-5">
                                            <!--begin::Col header-->
                                            <div class="mb-9">
                                                <div class="d-flex flex-stack">
                                                    <div class="fw-bold fs-4">
                                                        Dikerjakan
                                                        <span class="fs-6 text-gray-500 ms-2">{{ $countDoneTasks }}</span>
                                                    </div>

                                                </div>

                                                <div class="h-3px w-100 bg-primary"></div>
                                            </div>
                                            <div style="overflow-y: auto; max-height: 600px;">
                                                @foreach ($tasks as $task)
                                                    @if ($task->status == 'done' && $task->deadline > now())
                                                        @php
                                                            $badgeClass = '';
                                                            $description = '';
                                                            switch ($task->priority) {
                                                                case 'urgent':
                                                                    $badgeClass = 'badge-danger';
                                                                    $description = 'Mendesak';
                                                                    break;
                                                                case 'important':
                                                                    $badgeClass = 'badge-warning';
                                                                    $description = 'Penting';
                                                                    break;
                                                                case 'regular':
                                                                    $badgeClass = 'badge-primary';
                                                                    $description = 'Biasa';
                                                                    break;
                                                                case 'additional':
                                                                    $badgeClass = 'badge-info';
                                                                    $description = 'Tambahan';
                                                                    break;
                                                                case 'optional':
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Opsional';
                                                                    break;
                                                                default:
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Tidak dikenal';
                                                            }
                                                        @endphp
                                                        <div class="card mb-2 mb-xl-7 draggable-zone">
                                                            <!--begin::Card body-->
                                                            <div class="card-body">
                                                                <!--begin::Header-->
                                                                <div class="d-flex flex-stack mb-3">
                                                                    <!--begin::Badge-->
                                                                    <div class="badge {{ $badgeClass }}">
                                                                        {{ ucwords($description) }}
                                                                    </div>

                                                                    <!--end::Badge-->

                                                                    <!--begin::Menu-->
                                                                    <div>
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary"
                                                                            data-kt-menu-trigger="click"
                                                                            data-kt-menu-placement="bottom-end">
                                                                            <span
                                                                                class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20"
                                                                                        rx="4"
                                                                                        fill="currentColor" />
                                                                                    <rect x="11" y="11" width="2.6"
                                                                                        height="2.6" rx="1.3"
                                                                                        fill="currentColor" />
                                                                                    <rect x="15" y="11" width="2.6"
                                                                                        height="2.6" rx="1.3"
                                                                                        fill="currentColor" />
                                                                                    <rect x="7" y="11" width="2.6"
                                                                                        height="2.6" rx="1.3"
                                                                                        fill="currentColor" />
                                                                                </svg>
                                                                            </span>
                                                                        </button>

                                                                        <!--begin::Menu 3-->
                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                            data-kt-menu="true">
                                                                            <!--begin::Heading-->
                                                                            <div class="menu-item px-3">
                                                                                <div
                                                                                    class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                                                    Aksi
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Heading-->

                                                                            <!--begin::Menu item-->
                                                                            <div class="menu-item px-3">
                                                                                <div class="menu-link px-3 btn-edit-task"
                                                                                    data-id="{{ $task->id }}"
                                                                                    data-name="{{ $task->name }}"
                                                                                    data-description="{{ $task->description }}"
                                                                                    data-deadline="{{ $task->deadline }}"
                                                                                    data-status="{{ $task->status }}"
                                                                                    data-priority="{{ $task->priority }}">
                                                                                    Edit
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Menu item-->

                                                                            <!--begin::Menu item-->
                                                                            <div class="menu-item px-3">
                                                                                <a href="#"
                                                                                    class="menu-link flex-stack px-3 btn-delete-task"
                                                                                    data-id="{{ $task->id }}">
                                                                                    Delete
                                                                                </a>
                                                                            </div>
                                                                            <!--end::Menu item-->
                                                                        </div>
                                                                        <!--end::Menu 3-->
                                                                    </div>
                                                                    <!--end::Menu-->
                                                                </div>
                                                                <!--end::Header-->

                                                                <!--begin::Title-->
                                                                <div class="mb-2">
                                                                    <a href="#"
                                                                        class="fs-4 fw-bold mb-1 text-gray-900 text-hover-primary">{{ $task->name }}</a>
                                                                </div>
                                                                <!--end::Title-->

                                                                <!--begin::Content-->
                                                                <div class="fs-6 fw-semibold text-gray-600 mb-5">
                                                                    {{ $task->description }}</div>
                                                                <!--end::Content-->

                                                                <!--begin::Footer-->
                                                                <div
                                                                    class="d-flex flex-stack flex-wrapr justify-content-end">
                                                                    <!--begin::Stats-->
                                                                    <div class="d-flex my-1">
                                                                        @php
                                                                            $deadline = \Carbon\Carbon::parse(
                                                                                $task->deadline,
                                                                            );
                                                                            $now = \Carbon\Carbon::now();
                                                                            $daysUntilDeadline = $deadline->diffInDays(
                                                                                $now,
                                                                                false,
                                                                            );
                                                                        @endphp
                                                                        <!--begin::Stat-->
                                                                        <div
                                                                            class="border border-dashed border-gray-300 d-flex align-items-center rounded py-2 px-3 ms-3">
                                                                            <span class="ms-1 fs-7 fw-bold text-gray-600">
                                                                                @if ($daysUntilDeadline > 0)
                                                                                    {{ $daysUntilDeadline }} hari akan
                                                                                    datang
                                                                                @else
                                                                                    Hari ini adalah batas waktu
                                                                                @endif
                                                                            </span>
                                                                        </div>
                                                                        <!--end::Stat-->
                                                                    </div>
                                                                    <!--end::Stats-->
                                                                </div>
                                                                <!--end::Footer-->
                                                            </div>
                                                            <!--end::Card body-->
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-12 col-xl-3 me-5">
                                            <div class="mb-9">
                                                <div class="d-flex flex-stack">
                                                    <div class="fw-bold fs-4">
                                                        Revisi
                                                        <span
                                                            class="fs-6 text-gray-500 ms-2">{{ $countRevisedTasks }}</span>
                                                    </div>
                                                </div>
                                                <div class="h-3px w-100 bg-info"></div>
                                            </div>
                                            <div style="overflow-y: auto; max-height: 600px;">
                                                @foreach ($tasks as $task)
                                                    @if ($task->status == 'revised' && $task->deadline > now())
                                                        @php
                                                            $badgeClass = '';
                                                            $description = '';
                                                            switch ($task->priority) {
                                                                case 'urgent':
                                                                    $badgeClass = 'badge-danger';
                                                                    $description = 'Mendesak';
                                                                    break;
                                                                case 'important':
                                                                    $badgeClass = 'badge-warning';
                                                                    $description = 'Penting';
                                                                    break;
                                                                case 'regular':
                                                                    $badgeClass = 'badge-primary';
                                                                    $description = 'Biasa';
                                                                    break;
                                                                case 'additional':
                                                                    $badgeClass = 'badge-info';
                                                                    $description = 'Tambahan';
                                                                    break;
                                                                case 'optional':
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Opsional';
                                                                    break;
                                                                default:
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Tidak dikenal';
                                                            }
                                                        @endphp
                                                        <div class="card mb-2 mb-xl-7 draggable-zone">
                                                            <!--begin::Card body-->
                                                            <div class="card-body">
                                                                <!--begin::Header-->
                                                                <div class="d-flex flex-stack mb-3">
                                                                    <!--begin::Badge-->
                                                                    <div class="badge {{ $badgeClass }}">
                                                                        {{ ucwords($description) }}
                                                                    </div>

                                                                    <!--end::Badge-->

                                                                    <!--begin::Menu-->
                                                                    <div>
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary"
                                                                            data-kt-menu-trigger="click"
                                                                            data-kt-menu-placement="bottom-end">
                                                                            <span
                                                                                class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20"
                                                                                        rx="4"
                                                                                        fill="currentColor" />
                                                                                    <rect x="11" y="11" width="2.6"
                                                                                        height="2.6" rx="1.3"
                                                                                        fill="currentColor" />
                                                                                    <rect x="15" y="11" width="2.6"
                                                                                        height="2.6" rx="1.3"
                                                                                        fill="currentColor" />
                                                                                    <rect x="7" y="11" width="2.6"
                                                                                        height="2.6" rx="1.3"
                                                                                        fill="currentColor" />
                                                                                </svg>
                                                                            </span>
                                                                        </button>

                                                                        <!--begin::Menu 3-->
                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                                            data-kt-menu="true">
                                                                            <!--begin::Heading-->
                                                                            <div class="menu-item px-3">
                                                                                <div
                                                                                    class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                                                    Aksi
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Heading-->

                                                                            <!--begin::Menu item-->
                                                                            <div class="menu-item px-3">
                                                                                <div class="menu-link px-3 btn-edit-task"
                                                                                    data-id="{{ $task->id }}"
                                                                                    data-name="{{ $task->name }}"
                                                                                    data-description="{{ $task->description }}"
                                                                                    data-deadline="{{ $task->deadline }}"
                                                                                    data-status="{{ $task->status }}"
                                                                                    data-priority="{{ $task->priority }}">
                                                                                    Edit
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Menu item-->

                                                                            <!--begin::Menu item-->
                                                                            <div class="menu-item px-3">
                                                                                <a href="#"
                                                                                    class="menu-link flex-stack px-3 btn-delete-task"
                                                                                    data-id="{{ $task->id }}">
                                                                                    Delete
                                                                                </a>
                                                                            </div>
                                                                            <!--end::Menu item-->
                                                                        </div>
                                                                        <!--end::Menu 3-->
                                                                    </div>
                                                                    <!--end::Menu-->
                                                                </div>
                                                                <!--end::Header-->

                                                                <!--begin::Title-->
                                                                <div class="mb-2">
                                                                    <a href="#"
                                                                        class="fs-4 fw-bold mb-1 text-gray-900 text-hover-primary">{{ $task->name }}</a>
                                                                </div>
                                                                <!--end::Title-->

                                                                <!--begin::Content-->
                                                                <div class="fs-6 fw-semibold text-gray-600 mb-5">
                                                                    {{ $task->description }}</div>
                                                                <!--end::Content-->

                                                                <!--begin::Footer-->
                                                                <div
                                                                    class="d-flex flex-stack flex-wrapr justify-content-end">
                                                                    <!--begin::Stats-->
                                                                    <div class="d-flex my-1">
                                                                        @php
                                                                            $deadline = \Carbon\Carbon::parse(
                                                                                $task->deadline,
                                                                            );
                                                                            $now = \Carbon\Carbon::now();
                                                                            $daysUntilDeadline = $deadline->diffInDays(
                                                                                $now,
                                                                                false,
                                                                            );
                                                                        @endphp
                                                                        <!--begin::Stat-->
                                                                        <div
                                                                            class="border border-dashed border-gray-300 d-flex align-items-center rounded py-2 px-3 ms-3">
                                                                            <span class="ms-1 fs-7 fw-bold text-gray-600">
                                                                                @if ($daysUntilDeadline > 0)
                                                                                    {{ $daysUntilDeadline }} hari akan
                                                                                    datang
                                                                                @else
                                                                                    Hari ini adalah batas waktu
                                                                                @endif
                                                                            </span>
                                                                        </div>
                                                                        <!--end::Stat-->
                                                                    </div>
                                                                    <!--end::Stats-->
                                                                </div>
                                                                <!--end::Footer-->
                                                            </div>
                                                            <!--end::Card body-->
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-12 col-xl-3 me-5">
                                            <!--begin::Col header-->
                                            <div class="mb-9">
                                                <div class="d-flex flex-stack">
                                                    <div class="fw-bold fs-4">
                                                        Selesai
                                                        <span
                                                            class="fs-6 text-gray-500 ms-2">{{ $countFinishedTasks }}</span>
                                                    </div>

                                                </div>

                                                <div class="h-3px w-100 bg-success"></div>
                                            </div>
                                            <div style="overflow-y: auto; max-height: 600px;">
                                                @foreach ($tasks as $task)
                                                    @if ($task->status == 'finished')
                                                        @php
                                                            $badgeClass = '';
                                                            $description = '';
                                                            switch ($task->priority) {
                                                                case 'urgent':
                                                                    $badgeClass = 'badge-danger';
                                                                    $description = 'Mendesak';
                                                                    break;
                                                                case 'important':
                                                                    $badgeClass = 'badge-warning';
                                                                    $description = 'Penting';
                                                                    break;
                                                                case 'regular':
                                                                    $badgeClass = 'badge-primary';
                                                                    $description = 'Biasa';
                                                                    break;
                                                                case 'additional':
                                                                    $badgeClass = 'badge-info';
                                                                    $description = 'Tambahan';
                                                                    break;
                                                                case 'optional':
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Opsional';
                                                                    break;
                                                                default:
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Tidak dikenal';
                                                            }
                                                        @endphp
                                                        <div class="card mb-2 mb-xl-7 draggable-zone">
                                                            <!--begin::Card body-->
                                                            <div class="card-body">
                                                                <!--begin::Header-->
                                                                <div class="d-flex flex-stack mb-3">
                                                                    <!--begin::Badge-->
                                                                    <div class="badge {{ $badgeClass }}">
                                                                        {{ ucwords($description) }}
                                                                    </div>
                                                                    <!--end::Badge-->
                                                                </div>
                                                                <!--end::Header-->

                                                                <!--begin::Title-->
                                                                <div class="mb-2">
                                                                    <a href="#"
                                                                        class="fs-4 fw-bold mb-1 text-gray-900 text-hover-primary">{{ $task->name }}</a>
                                                                </div>
                                                                <!--end::Title-->

                                                                <!--begin::Content-->
                                                                <div class="fs-6 fw-semibold text-gray-600 mb-5">
                                                                    {{ $task->description }}</div>
                                                                <!--end::Content-->
                                                                <div
                                                                    class="d-flex flex-stack flex-wrapr justify-content-end">
                                                                    <!--begin::Stats-->
                                                                    <div class="d-flex my-1">

                                                                        <!--begin::Stat-->
                                                                        <div
                                                                            class="border border-dashed border-gray-300 d-flex align-items-center rounded py-2 px-3 ms-3">
                                                                            <span class="ms-1 fs-7 fw-bold text-gray-600">
                                                                                Selesai
                                                                                {{ \Carbon\Carbon::parse($task->upated_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                                                                            </span>
                                                                        </div>
                                                                        <!--end::Stat-->
                                                                    </div>
                                                                    <!--end::Stats-->
                                                                </div>
                                                                <!--end::Footer-->
                                                            </div>
                                                            <!--end::Card body-->
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-12 col-xl-3">
                                            <!--begin::Col header-->
                                            <div class="mb-9">
                                                <div class="d-flex flex-stack">
                                                    <div class="fw-bold fs-4">
                                                        Tidak Selesai
                                                        <span
                                                            class="fs-6 text-gray-500 ms-2">{{ $countNotFinishedTasks }}</span>
                                                    </div>

                                                </div>

                                                <div class="h-3px w-100 bg-danger"></div>
                                            </div>
                                            <div style="overflow-y: auto; max-height: 600px;">
                                                @foreach ($tasks as $task)
                                                    @if ($task->deadline < now() && ($task->status == 'new_task' || $task->status == 'done' || $task->status == 'revised'))
                                                        @php
                                                            $badgeClass = '';
                                                            $description = '';
                                                            switch ($task->priority) {
                                                                case 'urgent':
                                                                    $badgeClass = 'badge-danger';
                                                                    $description = 'Mendesak';
                                                                    break;
                                                                case 'important':
                                                                    $badgeClass = 'badge-warning';
                                                                    $description = 'Penting';
                                                                    break;
                                                                case 'regular':
                                                                    $badgeClass = 'badge-primary';
                                                                    $description = 'Biasa';
                                                                    break;
                                                                case 'additional':
                                                                    $badgeClass = 'badge-info';
                                                                    $description = 'Tambahan';
                                                                    break;
                                                                case 'optional':
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Opsional';
                                                                    break;
                                                                default:
                                                                    $badgeClass = 'badge-secondary';
                                                                    $description = 'Tidak dikenal';
                                                            }
                                                        @endphp
                                                        <div class="card mb-2 mb-xl-7 draggable-zone">
                                                            <!--begin::Card body-->
                                                            <div class="card-body">
                                                                <!--begin::Header-->
                                                                <div class="d-flex flex-stack mb-3">
                                                                    <!--begin::Badge-->
                                                                    <div class="badge {{ $badgeClass }}">
                                                                        {{ ucwords($description) }}
                                                                    </div>
                                                                    <!--end::Badge-->
                                                                </div>
                                                                <!--end::Header-->

                                                                <!--begin::Title-->
                                                                <div class="mb-2">
                                                                    <a href="#"
                                                                        class="fs-4 fw-bold mb-1 text-gray-900 text-hover-primary">{{ $task->name }}</a>
                                                                </div>
                                                                <!--end::Title-->

                                                                <!--begin::Content-->
                                                                <div class="fs-6 fw-semibold text-gray-600 mb-5">
                                                                    {{ $task->description }}</div>
                                                                <!--end::Content-->
                                                                <div
                                                                    class="d-flex flex-stack flex-wrapr justify-content-end">
                                                                    <!--begin::Stats-->
                                                                    <div class="d-flex my-1">

                                                                        <!--begin::Stat-->
                                                                        <div
                                                                            class="border border-dashed border-gray-300 d-flex align-items-center rounded py-2 px-3 ms-3">
                                                                            <span class="ms-1 fs-7 fw-bold text-gray-600">
                                                                                Tenggat
                                                                                {{ \Carbon\Carbon::parse($task->deadline)->locale('id')->isoFormat('D MMMM YYYY') }}
                                                                            </span>
                                                                        </div>
                                                                        <!--end::Stat-->
                                                                    </div>
                                                                    <!--end::Stats-->
                                                                </div>
                                                                <!--end::Footer-->
                                                            </div>
                                                            <!--end::Card body-->
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="card mb-5">
                                            <div class="card-header d-flex justify-content-between pt-7">
                                                <!--begin::Title-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-gray-800">Catatan</span>
                                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">list catatan
                                                        anda.</span>
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-striped border rounded gy-5 gs-7">
                                                    <thead>
                                                        <tr class="fw-semibold fs-6 text-gray-800">
                                                            <th class="min-w-100px" data-priority="1">No</th>
                                                            <th class="min-w-100px" data-priority="2">Judul</th>
                                                            <th class="min-w-100px" data-priority="3">Tanggal</th>
                                                            <th class="min-w-100px" data-priority="4">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($notes as $note)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $note->name }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($note->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex ">
                                                                        <button
                                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-detail-note btn-sm me-1"
                                                                            data-id="{{ $note->id }}"
                                                                            data-name="{{ $note->name }}"
                                                                            data-description="{{ $note->description }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            data-bs-custom-class="custom-tooltip"
                                                                            data-bs-title="Lihat Detail">
                                                                            <i class="fa fa-eye fs-3 text-primary"></i>
                                                                        </button>

                                                                        <button
                                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-edit-note me-1"
                                                                            data-id="{{ $note->id }}"
                                                                            data-project_id="{{ $note->project_id }}"
                                                                            data-name="{{ $note->name }}"
                                                                            data-description="{{ $note->description }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            data-bs-custom-class="custom-tooltip"
                                                                            data-bs-title="Edit Data">
                                                                            <i
                                                                                class="fa-regular fa-pen-to-square fs-3 text-warning"></i>
                                                                        </button>

                                                                        <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete-note"
                                                                            data-id="{{ $note->id }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            data-bs-custom-class="custom-tooltip"
                                                                            data-bs-title="Hapus Data">
                                                                            <i
                                                                                class="fonticon-trash-bin fs-2 text-danger"></i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="col-12 text-center">
                                                                        <!--begin::Illustration-->
                                                                        <img src="{{ asset('user-assets/media/misc/watch.svg') }}"
                                                                            class="h-150px" alt="" />
                                                                        <!--end::Illustration-->

                                                                        <!--begin::Title-->
                                                                        <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih
                                                                            Kosong</h4>
                                                                        <!--end::Title-->

                                                                        <!--begin::Desctiption-->
                                                                        <span
                                                                            class="fw-semibold text-gray-700 mb-4 d-block">
                                                                            anda belum memiliki presentasi untuk saat ini.
                                                                        </span>
                                                                        <!--end::Desctiption-->
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <!--begin::Repeater-->
                                        <div id="kt_docs_repeater_basic">
                                            <!--begin::Form group-->
                                            <div class="form-group row">
                                                <form action="{{ route('student.notes.store') }}" method="post">
                                                    <div class="d-flex justify-content-between mb-5">
                                                        <!--begin::Title-->
                                                        <h3 class="card-title align-items-start flex-column">
                                                            <span class="card-label fw-bold text-gray-800">Catatan</span>
                                                        </h3>
                                                        <!--end::Title-->

                                                        <!--begin::Toolbar-->
                                                        <div class="card-toolbar">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success" {{ in_array($project->status, ['not_approved', 'pending'])? 'disabled': ''}}>Simpan</button>
                                                        </div>
                                                        <!--end::Toolbar-->
                                                    </div>
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="project_id"
                                                        value="{{ $project ? $project->id : '' }}">
                                                    <div class="col-md-12 mb-5">
                                                        <label class="form-label">Judul Catatan :</label>
                                                        <input type="text" name="name"
                                                            class="form-control mb-2 mb-md-0"
                                                            placeholder="Masukkan judul catatan" />
                                                    </div>
                                                    <div data-repeater-list="description">
                                                        <div data-repeater-item>
                                                            <div class="form-group row mb-5">
                                                                <div class="col-md-10">
                                                                    <label class="form-label">Catatan :</label>
                                                                    <input type="description[]" name=""
                                                                        class="form-control mb-2 mb-md-0"
                                                                        placeholder="Masukkan catatan" />
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a href="javascript:;" data-repeater-delete
                                                                        class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                        <span
                                                                            class="svg-icon svg-icon-muted svg-icon-3"><svg
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                                    fill="currentColor" />
                                                                                <path opacity="0.5"
                                                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                                    fill="currentColor" />
                                                                                <path opacity="0.5"
                                                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        </span>

                                                                        Hapus
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--end::Form group-->

                                            <!--begin::Form group-->
                                            <div class="form-group mt-5">
                                                <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                                    <span class="svg-icon svg-icon-muted svg-icon-3"><svg width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="5" fill="currentColor" />
                                                            <rect x="10.8891" y="17.8033" width="12" height="2"
                                                                rx="1" transform="rotate(-90 10.8891 17.8033)"
                                                                fill="currentColor" />
                                                            <rect x="6.01041" y="10.9247" width="12" height="2"
                                                                rx="1" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    Tambah
                                                </a>
                                            </div>
                                            <!--end::Form group-->
                                        </div>
                                        <!--end::Repeater-->
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="card mb-5">
                                            <div class="card-header d-flex justify-content-between pt-7">
                                                <!--begin::Title-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-gray-800">Presentasi</span>
                                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">list presentasi
                                                        anda.</span>
                                                </h3>

                                                <div class="btn btn-sm btn-primary mb-5" data-bs-toggle="modal"
                                                    data-bs-target="#{{ in_array($project->status, ['not_approved', 'pending'])? '': 'kt_modal_new_project'}}">
                                                    Ajukan Presentasi
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-striped border rounded gy-5 gs-7">
                                                    <thead>
                                                        <tr class="fw-semibold fs-6 text-gray-800">
                                                            <th class="min-w-100px" data-priority="1">Judul</th>
                                                            <th class="min-w-100px" data-priority="2">Deskripsi</th>
                                                            <th class="min-w-100px" data-priority="3">Tanggal</th>
                                                            <th class="min-w-100px" data-priority="4">List Presentasi</th>
                                                            <th class="min-w-100px" data-priority="5">Status Presentasi</th>
                                                            <th class="min-w-100px" data-priority="5">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($presentations as $presentation)
                                                            <tr>
                                                                <td>{{ $presentation->name }}</td>
                                                                <td>{{ $presentation->description }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($presentation->date)->locale('id')->isoFormat('D MMMM YYYY HH:mm') }}
                                                                </td>
                                                                <td>
                                                                    @if ($presentation->presentation_status == 'design')
                                                                        Presentasi Rancangan
                                                                    @elseif($presentation->presentation_status == 'beginning')
                                                                        Presentasi Awal Project
                                                                    @elseif($presentation->presentation_status == 'progress')
                                                                        Presentasi Progres Project
                                                                    @elseif($presentation->presentation_status == 'finalization')
                                                                        Presentasi Finalisasi Project
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    <span
                                                                        class="badge
                                                    @if ($presentation->status == 'pending') badge-light-warning
                                                    @elseif($presentation->status == 'approved') badge-light-success
                                                    @elseif($presentation->status == 'not_approved') badge-light-danger @endif fw-bold me-auto px-4 py-3">
                                                                        @if ($presentation->status == 'pending')
                                                                            Menunggu
                                                                        @elseif($presentation->status == 'approved')
                                                                            Diterima
                                                                        @elseif($presentation->status == 'not_approved')
                                                                            Tidak Diterima
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    @if($presentation->status == 'not_approved')
                                                                    <span class="badge badge-primary px-4 py-3" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#kt_modal_new_project">
                                                                        Ajukan Lagi
                                                                    </span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6">
                                                                    <div class="col-12 text-center">
                                                                        <!--begin::Illustration-->
                                                                        <img src="{{ asset('user-assets/media/misc/watch.svg') }}"
                                                                            class="h-150px" alt="" />
                                                                        <!--end::Illustration-->

                                                                        <!--begin::Title-->
                                                                        <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih
                                                                            Kosong</h4>
                                                                        <!--end::Title-->

                                                                        <!--begin::Desctiption-->
                                                                        <span
                                                                            class="fw-semibold text-gray-700 mb-4 d-block">
                                                                            anda belum memiliki presentasi untuk saat ini.
                                                                        </span>
                                                                        <!--end::Desctiption-->
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="card card-flush h-lg-100">
                                            <!--begin::Card header-->
                                            <div class="card-header mt-6">
                                                <!--begin::Card title-->
                                                <div class="card-title flex-column">
                                                    <h3 class="fw-bold mb-1">List Presentasi</h3>

                                                    <div class="fs-6 text-gray-500">Silahkan ceklist jika sudah selesai
                                                        presentasi
                                                    </div>
                                                </div>
                                                <!--end::Card title-->
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body d-flex flex-column mb-9 p-9 pt-3">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center position-relative mb-7">
                                                    <!--begin::Label-->
                                                    <div
                                                        class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                                    </div>
                                                    <!--end::Label-->

                                                    <!--begin::Checkbox-->
                                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                        <input class="form-check-input" type="checkbox"
                                                        disabled
                                                        {{ isset($presentationFinishes[0]) && $presentationFinishes[0]->presentation? 'checked': ''}}>
                                                    </div>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Details-->
                                                    <div class="fw-semibold">
                                                        <a href="#"
                                                            class="fs-6 fw-bold text-gray-900 text-hover-primary">Presentasi
                                                            Rancangan</a>

                                                        <!--begin::Info-->
                                                        {{-- <div class="text-gray-500">
                                                            Due in 1 day <a href="#">Karina Clark</a>
                                                        </div> --}}
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Details-->

                                                    <!--begin::Menu-->
                                                    <button type="button"
                                                        class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                                        <i class="ki-outline ki-element-plus fs-3"></i> </button>



                                                    <!--begin::Menu 1-->
                                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                        data-kt-menu="true" id="kt_menu_660e26c165891">
                                                        <!--begin::Header-->
                                                        <div class="px-7 py-5">
                                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                                        </div>
                                                        <!--end::Header-->

                                                        <!--begin::Menu separator-->
                                                        <div class="separator border-gray-200"></div>
                                                        <!--end::Menu separator-->


                                                        <!--begin::Form-->
                                                        <div class="px-7 py-5">
                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label class="form-label fw-semibold">Status:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <div>
                                                                    <select
                                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                                        multiple="" data-kt-select2="true"
                                                                        data-close-on-select="false"
                                                                        data-placeholder="Select option"
                                                                        data-dropdown-parent="#kt_menu_660e26c165891"
                                                                        data-allow-clear="true"
                                                                        data-select2-id="select2-data-21-vqqw"
                                                                        tabindex="-1" aria-hidden="true"
                                                                        data-kt-initialized="1">
                                                                        <option></option>
                                                                        <option value="1">Approved</option>
                                                                        <option value="2">Pending</option>
                                                                        <option value="2">In Process</option>
                                                                        <option value="2">Rejected</option>
                                                                    </select><span
                                                                        class="select2 select2-container select2-container--bootstrap5"
                                                                        dir="ltr"
                                                                        data-select2-id="select2-data-22-shq5"
                                                                        style="width: 100%;"><span class="selection"><span
                                                                                class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                                role="combobox" aria-haspopup="true"
                                                                                aria-expanded="false" tabindex="-1"
                                                                                aria-disabled="false">
                                                                                <ul class="select2-selection__rendered"
                                                                                    id="select2-bbj2-container"></ul><span
                                                                                    class="select2-search select2-search--inline">
                                                                                    <textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none"
                                                                                        spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search"
                                                                                        aria-describedby="select2-bbj2-container" placeholder="Select option" style="width: 100%;"></textarea>
                                                                                </span>
                                                                            </span></span><span class="dropdown-wrapper"
                                                                            aria-hidden="true"></span></span>
                                                                </div>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label class="form-label fw-semibold">Member Type:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Options-->
                                                                <div class="d-flex">
                                                                    <!--begin::Options-->
                                                                    <label
                                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1">
                                                                        <span class="form-check-label">
                                                                            Author
                                                                        </span>
                                                                    </label>
                                                                    <!--end::Options-->

                                                                    <!--begin::Options-->
                                                                    <label
                                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="2" checked="checked">
                                                                        <span class="form-check-label">
                                                                            Customer
                                                                        </span>
                                                                    </label>
                                                                    <!--end::Options-->
                                                                </div>
                                                                <!--end::Options-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="form-label fw-semibold">Notifications:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Switch-->
                                                                <div
                                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" name="notifications"
                                                                        checked="">
                                                                    <label class="form-check-label">
                                                                        Enabled
                                                                    </label>
                                                                </div>
                                                                <!--end::Switch-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Actions-->
                                                            <div class="d-flex justify-content-end">
                                                                <button type="reset"
                                                                    class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                                    data-kt-menu-dismiss="true">Reset</button>

                                                                <button type="submit" class="btn btn-sm btn-primary"
                                                                    data-kt-menu-dismiss="true">Apply</button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Menu 1--> <!--end::Menu-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center position-relative mb-7">
                                                    <!--begin::Label-->
                                                    <div
                                                        class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                                    </div>
                                                    <!--end::Label-->

                                                    <!--begin::Checkbox-->
                                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                        <input class="form-check-input" type="checkbox"
                                                        disabled
                                                        {{ isset($presentationFinishes[1]) && $presentationFinishes[1]->presentation? 'checked': ''}}
                                                        >
                                                        </div>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Details-->
                                                    <div class="fw-semibold">
                                                        <a href="#"
                                                            class="fs-6 fw-bold text-gray-900 text-hover-primary">Presentasi
                                                            Awal Project</a>

                                                        <!--begin::Info-->

                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Details-->

                                                    <!--begin::Menu-->
                                                    <button type="button"
                                                        class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                                        <i class="ki-outline ki-element-plus fs-3"></i> </button>



                                                    <!--begin::Menu 1-->
                                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                        data-kt-menu="true" id="kt_menu_660e26c16589e">
                                                        <!--begin::Header-->
                                                        <div class="px-7 py-5">
                                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                                        </div>
                                                        <!--end::Header-->

                                                        <!--begin::Menu separator-->
                                                        <div class="separator border-gray-200"></div>
                                                        <!--end::Menu separator-->


                                                        <!--begin::Form-->
                                                        <div class="px-7 py-5">
                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label class="form-label fw-semibold">Status:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <div>
                                                                    <select
                                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                                        multiple="" data-kt-select2="true"
                                                                        data-close-on-select="false"
                                                                        data-placeholder="Select option"
                                                                        data-dropdown-parent="#kt_menu_660e26c16589e"
                                                                        data-allow-clear="true"
                                                                        data-select2-id="select2-data-23-1ba2"
                                                                        tabindex="-1" aria-hidden="true"
                                                                        data-kt-initialized="1">
                                                                        <option></option>
                                                                        <option value="1">Approved</option>
                                                                        <option value="2">Pending</option>
                                                                        <option value="2">In Process</option>
                                                                        <option value="2">Rejected</option>
                                                                    </select><span
                                                                        class="select2 select2-container select2-container--bootstrap5"
                                                                        dir="ltr"
                                                                        data-select2-id="select2-data-24-jims"
                                                                        style="width: 100%;"><span class="selection"><span
                                                                                class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                                role="combobox" aria-haspopup="true"
                                                                                aria-expanded="false" tabindex="-1"
                                                                                aria-disabled="false">
                                                                                <ul class="select2-selection__rendered"
                                                                                    id="select2-4czt-container"></ul><span
                                                                                    class="select2-search select2-search--inline">
                                                                                    <textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none"
                                                                                        spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search"
                                                                                        aria-describedby="select2-4czt-container" placeholder="Select option" style="width: 100%;"></textarea>
                                                                                </span>
                                                                            </span></span><span class="dropdown-wrapper"
                                                                            aria-hidden="true"></span></span>
                                                                </div>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label class="form-label fw-semibold">Member Type:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Options-->
                                                                <div class="d-flex">
                                                                    <!--begin::Options-->
                                                                    <label
                                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1">
                                                                        <span class="form-check-label">
                                                                            Author
                                                                        </span>
                                                                    </label>
                                                                    <!--end::Options-->

                                                                    <!--begin::Options-->
                                                                    <label
                                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="2" checked="checked">
                                                                        <span class="form-check-label">
                                                                            Customer
                                                                        </span>
                                                                    </label>
                                                                    <!--end::Options-->
                                                                </div>
                                                                <!--end::Options-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="form-label fw-semibold">Notifications:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Switch-->
                                                                <div
                                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" name="notifications"
                                                                        checked="">
                                                                    <label class="form-check-label">
                                                                        Enabled
                                                                    </label>
                                                                </div>
                                                                <!--end::Switch-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Actions-->
                                                            <div class="d-flex justify-content-end">
                                                                <button type="reset"
                                                                    class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                                    data-kt-menu-dismiss="true">Reset</button>

                                                                <button type="submit" class="btn btn-sm btn-primary"
                                                                    data-kt-menu-dismiss="true">Apply</button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Menu 1--> <!--end::Menu-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center position-relative mb-7">
                                                    <!--begin::Label-->
                                                    <div
                                                        class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                                    </div>
                                                    <!--end::Label-->

                                                    <!--begin::Checkbox-->
                                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                        <input class="form-check-input" type="checkbox" value="true"
                                                        disabled
                                                        {{ isset($presentationFinishes[2]) && $presentationFinishes[2]->presentation? 'checked': ''}}>
                                                    </div>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Details-->
                                                    <div class="fw-semibold">
                                                        <a href="#"
                                                            class="fs-6 fw-bold text-gray-900 text-hover-primary">Presentasi
                                                            Progres
                                                            Project </a>

                                                        <!--begin::Info-->

                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Details-->

                                                    <!--begin::Menu-->
                                                    <button type="button"
                                                        class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                                        <i class="ki-outline ki-element-plus fs-3"></i> </button>



                                                    <!--begin::Menu 1-->
                                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                        data-kt-menu="true" id="kt_menu_660e26c1658ab">
                                                        <!--begin::Header-->
                                                        <div class="px-7 py-5">
                                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                                        </div>
                                                        <!--end::Header-->

                                                        <!--begin::Menu separator-->
                                                        <div class="separator border-gray-200"></div>
                                                        <!--end::Menu separator-->


                                                        <!--begin::Form-->
                                                        <div class="px-7 py-5">
                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label class="form-label fw-semibold">Status:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <div>
                                                                    <select
                                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                                        multiple="" data-kt-select2="true"
                                                                        data-close-on-select="false"
                                                                        data-placeholder="Select option"
                                                                        data-dropdown-parent="#kt_menu_660e26c1658ab"
                                                                        data-allow-clear="true"
                                                                        data-select2-id="select2-data-25-4bu7"
                                                                        tabindex="-1" aria-hidden="true"
                                                                        data-kt-initialized="1">
                                                                        <option></option>
                                                                        <option value="1">Approved</option>
                                                                        <option value="2">Pending</option>
                                                                        <option value="2">In Process</option>
                                                                        <option value="2">Rejected</option>
                                                                    </select><span
                                                                        class="select2 select2-container select2-container--bootstrap5"
                                                                        dir="ltr"
                                                                        data-select2-id="select2-data-26-9ks3"
                                                                        style="width: 100%;"><span class="selection"><span
                                                                                class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                                role="combobox" aria-haspopup="true"
                                                                                aria-expanded="false" tabindex="-1"
                                                                                aria-disabled="false">
                                                                                <ul class="select2-selection__rendered"
                                                                                    id="select2-izye-container"></ul><span
                                                                                    class="select2-search select2-search--inline">
                                                                                    <textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none"
                                                                                        spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search"
                                                                                        aria-describedby="select2-izye-container" placeholder="Select option" style="width: 100%;"></textarea>
                                                                                </span>
                                                                            </span></span><span class="dropdown-wrapper"
                                                                            aria-hidden="true"></span></span>
                                                                </div>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label class="form-label fw-semibold">Member Type:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Options-->
                                                                <div class="d-flex">
                                                                    <!--begin::Options-->
                                                                    <label
                                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1">
                                                                        <span class="form-check-label">
                                                                            Author
                                                                        </span>
                                                                    </label>
                                                                    <!--end::Options-->

                                                                    <!--begin::Options-->
                                                                    <label
                                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="2" checked="checked">
                                                                        <span class="form-check-label">
                                                                            Customer
                                                                        </span>
                                                                    </label>
                                                                    <!--end::Options-->
                                                                </div>
                                                                <!--end::Options-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="form-label fw-semibold">Notifications:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Switch-->
                                                                <div
                                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" name="notifications"
                                                                        checked="">
                                                                    <label class="form-check-label">
                                                                        Enabled
                                                                    </label>
                                                                </div>
                                                                <!--end::Switch-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Actions-->
                                                            <div class="d-flex justify-content-end">
                                                                <button type="reset"
                                                                    class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                                    data-kt-menu-dismiss="true">Reset</button>

                                                                <button type="submit" class="btn btn-sm btn-primary"
                                                                    data-kt-menu-dismiss="true">Apply</button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Menu 1--> <!--end::Menu-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center position-relative mb-7">
                                                    <!--begin::Label-->
                                                    <div
                                                        class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                                    </div>
                                                    <!--end::Label-->

                                                    <!--begin::Checkbox-->
                                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                                        <input class="form-check-input" type="checkbox"
                                                        disabled
                                                        {{ isset($presentationFinishes[3]) && $presentationFinishes[3]->presentation? 'checked': ''}}
                                                        >
                                                    </div>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Details-->
                                                    <div class="fw-semibold">
                                                        <a href="#"
                                                            class="fs-6 fw-bold text-gray-900 text-hover-primary">Presentasi
                                                            Finalisasi
                                                            Project</a>

                                                        <!--begin::Info-->

                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Details-->

                                                    <!--begin::Menu-->
                                                    <button type="button"
                                                        class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                                        <i class="ki-outline ki-element-plus fs-3"></i> </button>



                                                    <!--begin::Menu 1-->
                                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                        data-kt-menu="true" id="kt_menu_660e26c1658b7">
                                                        <!--begin::Header-->
                                                        <div class="px-7 py-5">
                                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                                        </div>
                                                        <!--end::Header-->

                                                        <!--begin::Menu separator-->
                                                        <div class="separator border-gray-200"></div>
                                                        <!--end::Menu separator-->


                                                        <!--begin::Form-->
                                                        <div class="px-7 py-5">
                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label class="form-label fw-semibold">Status:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <div>
                                                                    <select
                                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                                        multiple="" data-kt-select2="true"
                                                                        data-close-on-select="false"
                                                                        data-placeholder="Select option"
                                                                        data-dropdown-parent="#kt_menu_660e26c1658b7"
                                                                        data-allow-clear="true"
                                                                        data-select2-id="select2-data-27-1wnd"
                                                                        tabindex="-1" aria-hidden="true"
                                                                        data-kt-initialized="1">
                                                                        <option></option>
                                                                        <option value="1">Approved</option>
                                                                        <option value="2">Pending</option>
                                                                        <option value="2">In Process</option>
                                                                        <option value="2">Rejected</option>
                                                                    </select><span
                                                                        class="select2 select2-container select2-container--bootstrap5"
                                                                        dir="ltr"
                                                                        data-select2-id="select2-data-28-dvux"
                                                                        style="width: 100%;"><span class="selection"><span
                                                                                class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                                role="combobox" aria-haspopup="true"
                                                                                aria-expanded="false" tabindex="-1"
                                                                                aria-disabled="false">
                                                                                <ul class="select2-selection__rendered"
                                                                                    id="select2-1vdq-container"></ul><span
                                                                                    class="select2-search select2-search--inline">
                                                                                    <textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none"
                                                                                        spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search"
                                                                                        aria-describedby="select2-1vdq-container" placeholder="Select option" style="width: 100%;"></textarea>
                                                                                </span>
                                                                            </span></span><span class="dropdown-wrapper"
                                                                            aria-hidden="true"></span></span>
                                                                </div>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label class="form-label fw-semibold">Member Type:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Options-->
                                                                <div class="d-flex">
                                                                    <!--begin::Options-->
                                                                    <label
                                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1">
                                                                        <span class="form-check-label">
                                                                            Author
                                                                        </span>
                                                                    </label>
                                                                    <!--end::Options-->

                                                                    <!--begin::Options-->
                                                                    <label
                                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="2" checked="checked">
                                                                        <span class="form-check-label">
                                                                            Customer
                                                                        </span>
                                                                    </label>
                                                                    <!--end::Options-->
                                                                </div>
                                                                <!--end::Options-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="form-label fw-semibold">Notifications:</label>
                                                                <!--end::Label-->

                                                                <!--begin::Switch-->
                                                                <div
                                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" name="notifications"
                                                                        checked="">
                                                                    <label class="form-check-label">
                                                                        Enabled
                                                                    </label>
                                                                </div>
                                                                <!--end::Switch-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Actions-->
                                                            <div class="d-flex justify-content-end">
                                                                <button type="reset"
                                                                    class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                                    data-kt-menu-dismiss="true">Reset</button>

                                                                <button type="submit" class="btn btn-sm btn-primary"
                                                                    data-kt-menu-dismiss="true">Apply</button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Menu 1--> <!--end::Menu-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="card card-flush h-lg-100">
                                            <!--begin::Card header-->
                                            <div class="card-header mt-6">
                                                <!--begin::Card title-->
                                                <div class="card-title flex-column">
                                                    <h3 class="fw-bold mb-1">Jadwal Presentasi</h3>

                                                    <div class="fs-6 text-gray-500">Silahkan masuk kezoom jika sudah
                                                        waktunya
                                                        presentasi</div>
                                                </div>
                                                <!--end::Card title-->
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body p-9 pt-4">
                                                <!--begin::Dates-->
                                                <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2"
                                                    role="tablist">

                                                    <!--begin::Date-->
                                                    @forelse ($approvedPresentations as $index => $approvedPresentation)
                                                        <li class="nav-item me-1" role="presentation">
                                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary {{ $index === 0 ? 'active' : '' }}"
                                                                data-bs-toggle="pill"
                                                                href="#kt_schedule_day_{{ $approvedPresentation->id }}"
                                                                aria-selected="true" role="tab">

                                                                <span class="opacity-50 fs-7 fw-semibold">
                                                                    {{ \Carbon\Carbon::parse($approvedPresentation->date)->locale('id')->isoFormat('dddd') }}
                                                                </span>
                                                                <span class="fs-6 fw-bold">
                                                                    {{ \Carbon\Carbon::parse($approvedPresentation->date)->locale('id')->isoFormat('DD MMMM') }}
                                                                </span>



                                                            </a>
                                                        </li>
                                                    @empty
                                                        <div class="col-12 text-center">
                                                            <!--begin::Illustration-->
                                                            <img src="{{ asset('user-assets/media/misc/watch.svg') }}"
                                                                class="h-150px" alt="" />
                                                            <!--end::Illustration-->

                                                            <!--begin::Title-->
                                                            <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih
                                                                Kosong</h4>
                                                            <!--end::Title-->

                                                            <!--begin::Desctiption-->
                                                            <span class="fw-semibold text-gray-700 mb-4 d-block">
                                                                belum ada presentasi yang diterima untuk saat ini.
                                                            </span>
                                                            <!--end::Desctiption-->
                                                        </div>
                                                    @endforelse
                                                    <!--end::Date-->
                                                </ul>
                                                <!--end::Dates-->

                                                <!--begin::Tab Content-->
                                                <div class="tab-content">
                                                    <!--begin::Day-->
                                                    @foreach ($approvedPresentations as $index => $approvedPresentation)
                                                        <div id="kt_schedule_day_{{ $approvedPresentation->id }}"
                                                            class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                                            role="tabpanel">
                                                            <!--begin::Time-->
                                                            <div class="d-flex flex-stack position-relative mt-8">
                                                                <!--begin::Bar-->
                                                                <div
                                                                    class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                                </div>
                                                                <!--end::Bar-->

                                                                <!--begin::Info-->
                                                                <div class="fw-semibold ms-5 text-gray-600">
                                                                    <!--begin::Time-->
                                                                    <div class="fs-5">
                                                                        Jam
                                                                        {{ \Carbon\Carbon::parse($approvedPresentation->date)->locale('id')->format('H:i') }}
                                                                    </div>
                                                                    <!--end::Time-->

                                                                    <!--begin::Title-->
                                                                    <a href="#"
                                                                        class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                                                        {{ $approvedPresentation->name }} </a>
                                                                    <!--end::Title-->

                                                                    <!--begin::User-->
                                                                    <div class="text-gray-500">
                                                                        Presentasi dengan mentor <a
                                                                            href="#">{{ auth()->user()->mentorClassrooms->first() ? auth()->user()->mentorClassrooms->first()->mentor->name : 'Belum ada mentor' }}</a>
                                                                    </div>


                                                                    <!--end::User-->
                                                                </div>
                                                                <!--end::Info-->

                                                                <!--begin::Action-->
                                                                <a href="https://us05web.zoom.us/j/89475402083?pwd=qpM8RxdJN7ZYTqZy9btmRWLvoGsLoC.1"
                                                                    class="btn btn-bg-light btn-active-color-primary btn-sm"
                                                                    target="_blank">Zoom</a>
                                                                <!--end::Action-->
                                                            </div>
                                                            <!--end::Time-->
                                                        </div>
                                                    @endforeach
                                                    <!--end::Day-->
                                                </div>
                                                <!--end::Tab Content-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div>
                                </div>
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
                        @else
                        @endif
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
                        <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30"
                            viewBox="0 -960 960 960" width="30">
                            <path
                                d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body row">
                    <form action="{{ route('student.projects.store') }}" method="POST"
                        enctype="multipart/form-data">
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
                            <input type="date" class="form-control"
                                value="{{ $project ? $project->deadline : '' }}" name="deadline">
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
                    <h5 id="message"></h5>
                    <h6>Jika ingin mengajukan Project lagi silahkan Upload Project Kembali!</h6>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form class="form" action="{{ route('student.tasks.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Tugas Baru</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <input type="hidden" name="project_id" value="{{ $project ? $project->id : '' }}">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Nama Tugas</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Specify a target name for future usage and reference">
                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span> </label>
                            <!--end::Label-->

                            <input type="text" class="form-control form-control-solid" placeholder="Tugas 1"
                                name="name" />
                        </div>

                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Prioritas
                                </label>

                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select a Team Member" name="priority">
                                    <option value="urgent">Mendesak</option>
                                    <option value="important">Penting</option>
                                    <option value="regular">Biasa</option>
                                    <option value="additional">Tambahan</option>
                                    <option value="optional">Optional</option>
                                </select>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tenggat Tugas</label>

                                <!--begin::Input-->
                                <div class="position-relative d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i> <!--end::Icon-->

                                    <!--begin::Datepicker-->
                                    <input class="form-control form-control-solid" name="deadline"
                                        placeholder="Tenggat Tugas" id="kt_datepicker_3" />
                                    <!--end::Datepicker-->
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Deskripsi Tugas</label>

                            <textarea class="form-control form-control-solid" rows="3" name="description"
                                placeholder="Deskripsi Tugas">
                            </textarea>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">
                                Cancel
                            </button>

                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Submit
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    <div class="modal fade" id="kt_modal_new_project" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form class="form" action="{{ route('student.presentation.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Ajukan Presentasi</h1>
                            <!--end::Title-->

                        </div>
                        <!--end::Heading-->
                        <input type="hidden" name="project_id" value="{{ $project ? $project->id : '' }}">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-3 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Judul Presentasi</span>


                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Specify a target name for future usage and reference">
                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span> </label>
                            <!--end::Label-->

                            <input type="text" class="form-control form-control-solid"
                                placeholder="Masukkan judul presentasi" name="name" />
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-3">
                            <label class="fs-6 fw-semibold mb-2">Deskripsi Presentasi</label>

                            <textarea name="description" class="form-control form-control-solid" placeholder="Masukkan deskripsi presentasi"
                                id="" cols="30" rows="3"></textarea>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Tanggal Presentasi</span>


                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Specify a target priorty">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>
                                    </label>
                                    <!--end::Label-->

                                    <input class="form-control form-control-solid" name="date"
                                        placeholder="Tanggal Presentasi" id="kt_datepicker_1" />
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Status Presentasi</span>

                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Specify a target priorty">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span> </label>
                                    <!--end::Label-->

                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Select a Team Member"
                                        name="presentation_status">
                                        <option value="design">Rancangan</option>
                                        <option value="beginning">Awal Project</option>
                                        <option value="progress">Progres Project</option>
                                        <option value="finalization">Finalisasi Project</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">
                                Cancel
                            </button>

                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Submit
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    <div class="modal fade" tabindex="-1" id="detail_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Detail Catatan Revisi</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30"
                            viewBox="0 -960 960 960" width="30">
                            <path
                                d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body row">
                    <!--begin::Heading-->
                    <div class="mb-4 text-center">
                        <!--begin::Title-->
                        <h3 id="note-title"></h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <div id="note-detail-container">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_edit">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Catatan</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30"
                            viewBox="0 -960 960 960" width="30">
                            <path
                                d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body row">
                    <form id="form_edit_note" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="project_id" id="project_id">
                        <label for="name)edit">Nama Catatan</label>
                        <input type="text" name="name" id="name_note" class="form-control "
                            placeholder="Masukkan Nama Devisi" required>
                        <div data-repeater-list="description" class="mt-3">
                            <div data-repeater-item>
                                <div id="notes-container" class="form-group row mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <a href="javascript:;" data-repeater-create-2="" class="btn btn-light-primary">
                                <span class="svg-icon svg-icon-muted svg-icon-3"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                            rx="5" fill="currentColor"></rect>
                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                            transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                            fill="currentColor"></rect>
                                    </svg>
                                </span>
                                Tambah
                            </a>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_edit-task">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Tugas</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30"
                            viewBox="0 -960 960 960" width="30">
                            <path
                                d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body row">
                    <form id="form-edit-task" method="POST">
                        @csrf
                        @method('PUT')
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <input type="hidden" name="project_id" value="{{ $project ? $project->id : '' }}">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Nama Tugas</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Specify a target name for future usage and reference">
                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span> </label>
                            <!--end::Label-->

                            <input type="text" class="form-control form-control-solid" id="name_task"
                                placeholder="Tugas 1" name="name" />
                        </div>

                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Prioritas
                                </label>

                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select a Team Member" name="priority">
                                    <option value="urgent">Mendesak</option>
                                    <option value="important">Penting</option>
                                    <option value="regular">Biasa</option>
                                    <option value="additional">Tambahan</option>
                                    <option value="optional">Optional</option>
                                </select>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tenggat Tugas</label>

                                <!--begin::Input-->
                                <div class="position-relative d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i> <!--end::Icon-->

                                    <!--begin::Datepicker-->
                                    <input class="form-control form-control-solid" name="deadline"
                                        placeholder="Tenggat Tugas" id="kt_datepicker_2" />
                                    <!--end::Datepicker-->
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <div class="row g-9 mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Status
                                </label>

                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" data-placeholder="Pilih Status" name="status">
                                    <option value="done">Dikerjakan</option>
                                    <option value="revised">Revisi</option>
                                    <option value="finished">Selesai</option>
                                </select>
                            </div>
                        </div>

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Deskripsi Tugas</label>

                            <textarea class="form-control form-control-solid" id="description_task" rows="3" name="description"
                                placeholder="Deskripsi Tugas">
                            </textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/custom/draggable/draggable.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom/documentation/general/draggable/multiple-containers.js') }}"></script>
    <script>
        $("#kt_datepicker_3").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d",
        });

        $("#kt_datepicker_2").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d",
        });

        $("#kt_datepicker_1").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        $('#kt_docs_repeater_basic').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>
    <script>
        $('.btn-plus').click(function() {
            $('#create_modal').modal('show');
        });

        $('.btn-reject').click(function() {
            const message = $(this).data('message');
            $('#message').html(message);
            $('#kt_modal_reject').modal('show');
        });

        $('.btn-detail-note').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var descriptions = $(this).data('description');

            $('#note-title').html(name);

            $('#note-detail-container').empty();

            var descriptionArray = descriptions.split(',');

            descriptionArray.forEach(function(description) {
                var noteDetail = $('<div>').attr('id', 'note-detail').addClass('mb-3');
                var noteSection = $('<div>').addClass('d-flex flex-stack');
                var noteText = $('<div>').addClass('text-gray-700 fw-semibold fs-6 me-2').text(description);

                noteSection.append(noteText);
                noteDetail.append(noteSection);
                noteDetail.append('<div class="separator separator-dashed my-3"></div>');

                $('#note-detail-container').append(noteDetail);
            });

            $('#detail_modal').modal('show');
        });

        function initializeDeleteButtons() {
            $('a[data-repeater-delete]').off('click').on('click', function(e) {
                e.preventDefault();
                $(this).closest('div[data-repeater-item]').remove();
            });
        }

        function addNewNoteInput(description = '') {
            var $container = $('#notes-container');
            var newItem = `
        <div data-repeater-item class="form-group row mb-3">
            <div class="col-md-10">
                <label class="form-label">Catatan:</label>
                <input type="text" name="description[]" class="form-control mb-2 mb-md-0" placeholder="Masukkan catatan" value="${description}">
            </div>
            <div class="col-md-2">
                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                    <span class="svg-icon svg-icon-muted svg-icon-3"><svg
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                                fill="currentColor" />
                                                                            <path opacity="0.5"
                                                                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                                fill="currentColor" />
                                                                            <path opacity="0.5"
                                                                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </span>Hapus
                </a>
            </div>
        </div>
    `;
            $container.append(newItem);
            initializeDeleteButtons();
        }

        $('.btn-edit-note').click(function() {
            var descriptions = $(this).data('description').split(',');
            var $container = $('#notes-container');
            var name = $(this).data('name');
            var project_id = $(this).data('project_id');
            $container.empty();

            descriptions.forEach(function(description) {
                addNewNoteInput(description.trim());
            });

            $('#name_note').val(name);
            $('#project_id').val(project_id);
            const url = "{{ route('student.notes.update', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form_edit_note').attr('action', url)

            $('#kt_modal_edit').modal('show');
        });

        $('#kt_modal_edit').on('shown.bs.modal', function() {
            $('a[data-repeater-create-2]').off('click').on('click', function(e) {
                e.preventDefault();
                addNewNoteInput();
            });
        });

        $('.btn-delete-note').click(function() {
            const url = "{{ route('student.notes.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('.btn-edit-task').click(function() {
            var name = $(this).data('name');
            var description = $(this).data('description');
            var priority = $(this).data('priority');
            var status = $(this).data('status');
            var deadline = $(this).data('deadline');

            $('#name_task').val(name);
            $('#description_task').val(description);
            $('select[name="priority"]').val(priority).trigger('change');
            $('select[name="status"]').val(status).trigger('change');

            var datepickerInstance = $("#kt_datepicker_2").flatpickr();
            datepickerInstance.setDate(deadline);

            const url = "{{ route('student.tasks.update', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-edit-task').attr('action', url)

            $('#kt_modal_edit-task').modal('show');
        });


        $('.btn-delete-task').click(function() {
            const url = "{{ route('student.tasks.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })
    </script>
@endsection
