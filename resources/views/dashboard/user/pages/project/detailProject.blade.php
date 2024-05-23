@php
    use App\Models\Task;
@endphp
@extends('dashboard.user.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/global/plugins.bundle.css') }}" type="text/css">
@endsection

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
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
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <div class="card mb-6 mb-xl-9">
                        <div class="card-body pt-9 pb-0">
                            <!-- Details -->
                            <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                                <!-- Image -->
                                <div
                                    class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                                    <img class="mw-50px mw-lg-100px"
                                        src="{{ $project ? asset('storage/' . $project->photo) : asset('app-assets/media/svg/avatars/blank.svg') }}"
                                        alt="image">
                                </div>
                                <!-- Wrapper -->
                                <div class="flex-grow-1">
                                    <!-- Head -->
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <!-- Details -->
                                        <div class="d-flex flex-column">
                                            <!-- Status -->
                                            <div class="d-flex align-items-center mb-1">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">
                                                    {{ $project ? $project->name : 'Project Kosong' }}
                                                </a>
                                                <span class="badge {{ $project->status_class }} fw-bold me-auto px-4 py-3">
                                                    {{ $project->status_text }}
                                                </span>
                                            </div>
                                            <!-- Description -->
                                            <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">
                                                {{ $project ? $project->description : 'Deskripsi Project' }}
                                            </div>
                                        </div>
                                    </div>
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
                                                        @if ($project->start)
                                                            {{ \Carbon\Carbon::parse($project->start)->locale('id')->isoFormat('D MMMM YYYY') }}
                                                        @else
                                                            -
                                                        @endif
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
                                        @php
                                            $totalTasks = Task::query()
                                                ->where('project_id', $project->id)
                                                ->count();

                                            $finishedTasks = Task::query()
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
                                                aria-valuenow="{{ number_format($progressPercentage) }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <!--end::Users-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!-- Nav -->
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6 active" data-bs-toggle="tab"
                                        href="#kt_tab_pane_1">Tugas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab"
                                        href="#kt_tab_pane_2">Catatan Revisi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab"
                                        href="#kt_tab_pane_3">Presentasi</a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Details-->
                    </div>
                    <!-- Tab content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Tab pane -->
                        <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                            <div class="d-flex flex-wrap flex-stack pt-5 pb-5 mb-5">
                                <!--begin::Heading-->
                                <h3 class="fw-bold my-2">
                                    List Tugas
                                    <span class="fs-6 text-gray-500 fw-semibold ms-1">Daftar tugas yang anda buat ↓</span>
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

                                                    $newTasks = $tasks->filter(function ($task) use ($statusToCount) {
                                                        return $task->status === $statusToCount &&
                                                            $task->deadline > now();
                                                    });
                                                    $doneTasks = $tasks->filter(function ($task) use ($statusDone) {
                                                        return $task->status === $statusDone && $task->deadline > now();
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
                                        <div style="overflow-y: auto; max-height: 600px;">
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
                                                            <div class="d-flex flex-stack flex-wrapr justify-content-end">
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
                                                                                {{ $daysUntilDeadline }} hari akan datang
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
                                                            <div class="d-flex flex-stack flex-wrapr justify-content-end">
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
                                                                                {{ $daysUntilDeadline }} hari akan datang
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
                                                    <span class="fs-6 text-gray-500 ms-2">{{ $countRevisedTasks }}</span>
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
                                                            <div class="d-flex flex-stack flex-wrapr justify-content-end">
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
                                                                                {{ $daysUntilDeadline }} hari akan datang
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
                                                    <span class="fs-6 text-gray-500 ms-2">{{ $countFinishedTasks }}</span>
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
                                                            <div class="d-flex flex-stack flex-wrapr justify-content-end">
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
                                                            <div class="d-flex flex-stack flex-wrapr justify-content-end">
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
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">list catatan anda.</span>
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
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        data-bs-custom-class="custom-tooltip"
                                                                        data-bs-title="Lihat Detail">
                                                                        <i class="fa fa-eye fs-3 text-primary"></i>
                                                                    </button>
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
                                                                    <span class="fw-semibold text-gray-700 mb-4 d-block">
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
                                                        <th class="min-w-100px" data-priority="6">Aksi</th>
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
                                                                <div class="d-flex ">
                                                                    @if ($presentation->status == 'pending')
                                                                        <button
                                                                            class="btn btn-icon btn-bg-light btn-active-color-success btn-accept btn-sm me-1"
                                                                            data-id="{{ $presentation->id }}"
                                                                            data-name="{{ $presentation->name }}"
                                                                            data-student="{{ $presentation->project->user->name }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            data-bs-custom-class="custom-tooltip"
                                                                            data-bs-title="Terima Presentasi">
                                                                            <span
                                                                                class="svg-icon svg-icon-2hx svg-icon-success"><svg
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20"
                                                                                        rx="5"
                                                                                        fill="currentColor" />
                                                                                    <path
                                                                                        d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                        fill="currentColor" />
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-icon btn-bg-light btn-active-color-danger btn-detail-note btn-sm me-1"
                                                                            {{-- data-bs-toggle="tooltip" --}} data-bs-toggle="modal"
                                                                            data-bs-target="#kt_modal_reject"
                                                                            data-bs-placement="top"
                                                                            data-bs-custom-class="custom-tooltip"
                                                                            data-bs-title="Tolak Presentasi">
                                                                            <span
                                                                                class="svg-icon svg-icon-2hx svg-icon-danger"><svg
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20"
                                                                                        rx="5"
                                                                                        fill="currentColor" />
                                                                                    <rect x="7" y="15.3137" width="12"
                                                                                        height="2" rx="1"
                                                                                        transform="rotate(-45 7 15.3137)"
                                                                                        fill="currentColor" />
                                                                                    <rect x="8.41422" y="7" width="12"
                                                                                        height="2" rx="1"
                                                                                        transform="rotate(45 8.41422 7)"
                                                                                        fill="currentColor" />
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                        {{--    reject modal --}}
                                                                        <div class="modal fade" tabindex="-1"
                                                                            id="kt_modal_reject">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h3 class="modal-title">Tolak
                                                                                            Presentasi</h3>

                                                                                        <!--begin::Close-->
                                                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                class="svg-icon svg-icon-1"></span>
                                                                                        </div>
                                                                                        <!--end::Close-->
                                                                                    </div>
                                                                                    <form id="form-reject"
                                                                                        action="{{ route('mentor.rejectPresentation', $presentation->id) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        <div class="modal-body">
                                                                                            <p class="text-p"></p>
                                                                                            <textarea name="message" id="" cols="30" rows="5" class="form-control form-control-solid"
                                                                                                placeholder="Masukkan alasan ditolak"></textarea>
                                                                                            <div class="mt-3">

                                                                                                <label
                                                                                                    class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                                                                    <span
                                                                                                        class="">Tanggal
                                                                                                        Presentasi
                                                                                                        (Opsional)
                                                                                                    </span>


                                                                                                    <span class="ms-1"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        title="Specify a target priorty">
                                                                                                        <i
                                                                                                            class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>
                                                                                                </label>
                                                                                                <!--end::Label-->

                                                                                                <input
                                                                                                    class="form-control form-control-solid"
                                                                                                    type="date"
                                                                                                    name="pending_date"
                                                                                                    placeholder="Tanggal Presentasi"
                                                                                                    id="kt_datepicker_1" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-light"
                                                                                                data-bs-dismiss="modal">Tutup</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger">Tolak</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{--    end modal --}}
                                                                    @elseif($presentation->status == 'approved')
                                                                        <button
                                                                            class="btn btn-icon btn-bg-light btn-sm me-1"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            data-bs-custom-class="custom-tooltip"
                                                                            data-bs-title="TIdak ada aksi">
                                                                            <span
                                                                                class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20"
                                                                                        rx="5"
                                                                                        fill="currentColor" />
                                                                                    <rect x="6.0104" y="10.9247"
                                                                                        width="12" height="2"
                                                                                        rx="1"
                                                                                        fill="currentColor" />
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                    @else
                                                                        <button
                                                                            class="btn btn-icon btn-bg-light btn-active-color-success btn-accept btn-sm me-1"
                                                                            data-id="{{ $presentation->id }}"
                                                                            data-name="{{ $presentation->name }}"
                                                                            data-student="{{ $presentation->project->user->name }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            data-bs-custom-class="custom-tooltip"
                                                                            data-bs-title="Terima Presentasi">
                                                                            <span
                                                                                class="svg-icon svg-icon-2hx svg-icon-success"><svg
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2"
                                                                                        width="20" height="20"
                                                                                        rx="5"
                                                                                        fill="currentColor" />
                                                                                    <path
                                                                                        d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                        fill="currentColor" />
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7">
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

                                {{-- Presentation Progress --}}
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <form action="{{ route('mentor.presentationFinish', $project->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
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

                                                <!--begin::Card toolbar-->
                                                <div class="card-toolbar">
                                                    <button type="submit"
                                                        class="btn btn-bg-light btn-sm btn-success">Simpan</button>
                                                </div>
                                                <!--end::Card toolbar-->
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
                                                            {{ isset($presentationFinishes[0]) && $presentationFinishes[0]->presentation ? 'checked disabled' : 'name=design' }}>
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
                                                        <input class="form-check-input" type="checkbox" value="true"
                                                            {{ isset($presentationFinishes[1]) && $presentationFinishes[1]->presentation ? 'checked disabled' : 'name=beginning' }}>
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
                                                            {{ isset($presentationFinishes[2]) && $presentationFinishes[2]->presentation ? 'checked disabled' : 'name=progress' }}>
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
                                                        <input class="form-check-input" type="checkbox" value="true"
                                                            {{ isset($presentationFinishes[3]) && $presentationFinishes[3]->presentation ? 'checked disabled' : 'name=finalization' }}>
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
                                    </form>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="card card-flush h-lg-100">
                                        <!--begin::Card header-->
                                        <div class="card-header mt-6">
                                            <!--begin::Card title-->
                                            <div class="card-title flex-column">
                                                <h3 class="fw-bold mb-1">Jadwal Presentasi</h3>

                                                <div class="fs-6 text-gray-500">Silahkan masuk kezoom jika sudah waktunya
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
                                                    @if (!$approvedPresentation->finish)
                                                        <li class="nav-item me-1" role="presentation">
                                                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary {{ $index === 0 ? 'active' : '' }}"
                                                                data-bs-toggle="tab"
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
                                                    @endif
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
                                                @if (!$approvedPresentation->finish)
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
                                                                    {{ $approvedPresentation->description }}
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
                                                    @endif
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
                    </div>
                    <!--end::Tab Content-->

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="detail_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Detail Catatan Revisi</h3>

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

    <div class="modal fade" tabindex="-1" id="kt_modal_accept">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Terima Project</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="form-approval" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="text-p"></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Terima</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
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

        $('.btn-accept').click(function() {
            const url = "{{ route('mentor.approvalPresentation', ':id') }}".replace(':id', $(this).data(
                'id'))
            const name = $(this).data('name');
            const student = $(this).data('student');

            $('.text-p').html('Apakah anda yakin ingin menerima presentasi ' + name + '? dari siswa ' + student);
            $('#form-approval').attr('action', url)
            $('#kt_modal_accept').modal('show')
        })
    </script>
@endsection
