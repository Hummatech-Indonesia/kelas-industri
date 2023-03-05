@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                {{ $subMaterial->title }}
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    {{ count($subMaterial->assignments) }} Tugas
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.materials.show', $subMaterial->material_id) }}"
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

                        <div class="d-flex">

                            <!--begin: Pic-->

                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3 me-5">


                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary ">

                                    <span class="font-size-h3 symbol-label font-weight-boldest">MA</span>

                                </div>

                            </div>

                            <!--end: Pic-->


                            <!--begin: Info-->

                            <div class="flex-grow-1">

                                <!--begin: Title-->

                                <div class="d-flex align-items-center justify-content-between flex-wrap">

                                    <div class="mr-3">

                                        <!--begin::Name-->

                                        <span class="d-flex align-items-center text-dark h4 font-weight-bold mr-3">

                                        {{ $subMaterial->title }}

                                    </span>

                                        <!--end::Name-->


                                    </div>

                                    <div class="my-lg-0 my-1">

                                        <button type="button"
                                                class="btn btn-sm btn-danger font-weight-bolder text-uppercase"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_1">Lihat
                                            Materi
                                        </button>

                                        {{--                                        modal materi --}}
                                        <div class="modal fade" tabindex="-1" id="kt_modal_1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Materi {{ $subMaterial->title }}</h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                             data-bs-dismiss="modal" aria-label="Close">
                                                            <span class="svg-icon svg-icon-1"></span>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <a href="{{ route('admin.submaterials.viewMaterial', [$subMaterial->id, 'teacher']) }}"
                                                           class="btn btn-primary me-3">Materi Guru
                                                        </a>
                                                        <a href="{{ route('admin.submaterials.viewMaterial', [$subMaterial->id, 'student']) }}"
                                                           class="btn btn-danger">Materi Siswa
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                        end modal materi--}}
                                    </div>

                                </div>

                                <!--end: Title-->


                                <!--begin: Content-->

                                <div class="d-flex align-items-center flex-wrap justify-content-between">

                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">

                                        <div style="width: 45vw">

                                            {{ $subMaterial->description }}
                                        </div>

                                    </div>

                                </div>

                                <!--end: Content-->

                            </div>

                            <!--end: Info-->

                        </div>


                    </div>

                </div>

            </div>
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Tugas</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">list tugas anda.</span>
                        </h3>

                        <div class="my-lg-0 my-1">

                            <a href="{{ route('admin.submaterials.createAssignment', ['submaterial' => $subMaterial->id]) }}"
                               class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Tambah Tugas</a>

                        </div>
                        <!--end::Title-->
                    </div>
                    <div class="card-body">

                        <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                            <thead>
                            <tr class="fw-semibold fs-6 text-gray-800">
                                <th class="min-w-300px" data-priority="1">Judul</th>
                                <th class="min-w-300px">Deskripsi</th>
                                <th class="min-w-100px" data-priority="2">Mulai</th>
                                <th class="min-w-100px" data-priority="3">Tenggat</th>
                                <th class="min-w-100px" data-priority="4">Status</th>
                                <th class="min-w-100px" data-priority="5">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($subMaterial->assignments as $assignment)
                                <tr>
                                    <td>{{ $assignment->title }}</td>
                                    <td>{{ $assignment->description }}</td>
                                    <td><span class="badge badge-light-primary">{{ $assignment->start_date }}</span>
                                    </td>
                                    <td><span class="badge badge-light-danger">{{ $assignment->end_date }}</span></td>
                                    <td>
                                        @if(strtotime(now()) <= strtotime($assignment->end_date))
                                            <span class="badge badge-light-success">Tersedia</span>
                                        @else
                                            <span class="badge badge-light-danger">Ditutup</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.assignments.edit', $assignment->id) }}"
                                               class="btn btn-default btn-sm p-1"><i
                                                    class="fonticon-setting fs-2 text-warning"></i></a>
                                            <button class="btn btn-default btn-sm p-1 btn-delete"
                                                    data-id="{{ $assignment->id }}"><i
                                                    class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <x-empty-component title="tugas"/>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal-component/>
    </div>
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
        $('.btn-delete').click(function () {
            const url = "{{ route('admin.assignments.destroy', ':id') }}".replace(':id', $(this).data('id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })
    </script>
@endsection
