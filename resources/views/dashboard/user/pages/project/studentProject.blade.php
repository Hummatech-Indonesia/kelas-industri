@php
    use App\Models\Task;
@endphp
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

                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">

                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        List Porject siswa anda pada kelas industri.
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->

                                    <!--end::Item-->

                                    <!--begin::Item-->

                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_content" class="app-container container-fluid ">
                    <form id="form-search" action="">
                        <!--begin::Card-->
                        <div class="card mb-7">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Compact form-->
                                <div class="row d-flex searching align-items-center">
                                    <!--begin::Input group-->
                                    <div class="position-relative col-lg-7 col-md-12">
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
                                            value="{{ request()->search }}" placeholder="Search">
                                    </div>
                                    <div class="position-relative col-lg-3 col-md-12">
                                        <select name="status" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="Select an option" id="status">
                                            <option value="pending" {{ request()->status == 'pending' ? 'selected' : '' }}>
                                                Menunggu</option>
                                            <option value="approved"
                                                {{ request()->status == 'approved' ? 'selected' : '' }}>Terima</option>
                                            <option value="in_progress"
                                                {{ request()->status == 'in_progress' ? 'selected' : '' }}>Progress</option>
                                            <option value="not_approved"
                                                {{ request()->status == 'not_approved' ? 'selected' : '' }}>Tolak</option>
                                            <option value="not_finished"
                                                {{ request()->status == 'not_finished' ? 'selected' : '' }}>Tidak Selesai
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                        <a href="" type="button" class="btn btn-light text-light ms-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Muat Ulang"
                                            data-kt-initialized="1"><i class="fonticon-repeat"></i></a>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Compact form-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </form>
                    <div class="row g-6 g-xl-9">
                        @forelse ($projects as $project)
                            <div class="col-md-6 col-xxl-4">
                                <div class="card">
                                    <div class="border-hover-primary ">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0 pt-9 justify-content-between d-flex">
                                            <!--begin::Card Title-->
                                            <div class="card-title m-0">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px w-50px bg-light">
                                                    <img src="{{ asset('storage/' . $project->photo) }}" alt="image"
                                                        class="p-1">
                                                </div>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::Car Title-->

                                            <!--begin::Avatar-->
                                            <div class="card-toolbar">
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
                                            </div>

                                            <!--begin::Card toolbar-->

                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end:: Card header-->

                                        <!--begin:: Card body-->
                                        <div class="card-body p-9">
                                            <!--begin::Name-->
                                            <div class="fs-3 fw-bold text-gray-900">
                                                {{ $project->name }} </div>
                                            <!--end::Name-->

                                            <!--begin::Description-->
                                            <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                                                {{ $project->description }}</p>
                                            <!--end::Description-->

                                            <!--begin::Info-->
                                            <div class="d-flex mb-5">
                                                <!--begin::Due-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                                    <div class="fs-6 text-gray-800 fw-bold">
                                                        {{ $project->start != null? \Carbon\Carbon::parse($project->start)->locale('id')->isoFormat('D MMMM YYYY'): '-' }}
                                                    </div>
                                                    <div class="fw-semibold text-gray-500">Project Mulai</div>
                                                </div>
                                                <!--end::Due-->

                                                <!--begin::Budget-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                                    <div class="fs-6 text-gray-800 fw-bold">
                                                        {{ \Carbon\Carbon::parse($project->deadline)->locale('id')->isoFormat('D MMMM YYYY') }}
                                                    </div>
                                                    <div class="fw-semibold text-gray-500">Tenggat Project</div>
                                                </div>
                                                <!--end::Budget-->
                                            </div>
                                            <!--end::Info-->
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
                                            <!--begin::Progress-->
                                            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Project  {{ number_format($progressPercentage) }}% selesai">
                                                <div class="bg-primary rounded h-4px" role="progressbar"
                                                    style="width:  {{ number_format($progressPercentage) }}%"
                                                    aria-valuenow=" {{ number_format($progressPercentage) }}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <!--end::Progress-->

                                            <!--begin::Users-->
                                            <div class="symbol-group symbol-hover d-flex justify-content-between">
                                                <!--begin::User-->
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="{{ $project->user->name }}">
                                                    <img src="{{ $project->user->photo ? asset('storage/' . $project->user->photo) : asset('app-assets/media/svg/avatars/blank.svg') }}"
                                                        alt="image" />
                                                </div>
                                                <!--begin::User-->
                                                @if ($project->status == 'pending' || $project->status == 'not_approved')
                                                    <div class="">
                                                        <button class="btn btn-light-success btn-sm btn-approval"
                                                            data-id="{{ $project->id }}"
                                                            data-name="{{ $project->name }}"
                                                            data-student="{{ $project->user->name }}"
                                                            type="submit">Terima</button>

                                                        <button class="btn btn-light-danger btn-sm btn-reject"
                                                            data-id="{{ $project->id }}"
                                                            data-name="{{ $project->name }}"
                                                            data-student="{{ $project->user->name }}">Tolak</button>
                                                    </div>
                                                @else
                                                    <a href="{{ route('common.detail-student-project', ['project' => $project->id]) }}"
                                                        class="btn btn-light-primary btn-sm" type="button">Detail</a>
                                                @endif
                                            </div>

                                            <!--end::Users-->
                                        </div>
                                        <!--end:: Card body-->

                                    </div>
                                </div>
                            </div>

                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    approval modal --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_approval">
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
    {{--    end modal --}}
    {{--    reject modal --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_reject">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tolak Project</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="form-reject" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="text-p"></p>
                        <textarea name="message" id="" cols="30" rows="5" class="form-control form-control-solid"
                            placeholder="Masukkan alasan ditolak"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    end modal --}}
@endsection
@section('script')
    <script>
        $('.btn-approval').click(function() {
            const url = "{{ route('mentor.approvalProject', ':id') }}".replace(':id', $(this).data('id'))
            const name = $(this).data('name');
            const student = $(this).data('student');
            $('#form-approval').attr('action', url)
            $('.text-p').html('Apakah anda yakin ingin menerima project ' + name + '? dari siswa ' + student);
            $('#kt_modal_approval').modal('show')
        })

        $('.btn-reject').click(function() {
            const url = "{{ route('mentor.rejectProject', ':id') }}".replace(':id', $(this).data('id'))
            const name = $(this).data('name');
            const student = $(this).data('student');
            $('#form-reject').attr('action', url)
            $('.text-p').html('Apakah anda yakin ingin menolak project ' + name + '? dari siswa ' + student);
            $('#kt_modal_reject').modal('show')
        })
    </script>
@endsection
