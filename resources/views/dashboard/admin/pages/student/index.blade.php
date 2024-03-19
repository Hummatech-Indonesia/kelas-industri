@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Siswa
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List siswa pada {{ auth()->user()->name }}.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1 gap-4">
            <div>
                <form action="{{ route('school.filterStudent') }}" class="d-flex gap-4" method="GET">
                    <select class="form-select" data-placeholder="Select option" name="classroom_id"
                        id="classroom_id">
                        <option selected disabled>Nama Kelas</option>
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" {{ request('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                {{ $classroom->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
            <div>
                <!--begin::Button-->
                <a href="{{ route('school.students.index') }}" type="button" class="btn btn-primary fw-bold">Reset</a>
                <!--end::Button-->
            </div>
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
                                <tr class="fw-bold text-muted">
                                    <th class="min-w-50px text-center">No</th>
                                    <th class="min-w-150px text-center">Nama</th>
                                    <th class="min-w-200px text-center">Email</th>
                                    <th class="min-w-150px text-center">No Telepon</th>
                                    <th class="min-w-150px text-center">Kelas</th>+
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">
                                                        {{ $loop->index + 1 + ($students->perPage() * ($students->currentPage() - 1)) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">
                                                        {{ $student->student->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">
                                                        {{ $student->student->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">
                                                        {{ $student->student->phone_number ?? ' - ' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">
                                                        {{ $student->studentClassroom ? $student->studentClassroom->classroom->name : '-' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                        {{ $students->links('pagination::bootstrap-5') }}
                    </div>
                    <!--end::Card body-->
                </div>
            </div>

        </div>
        <x-delete-modal-component />
    </div>
@endsection
@section('script')
    {{--    <script src="{{ asset('app-assets/js/custom/apps/customers/list/export.js') }}"></script> --}}
    <script src="{{ asset('app-assets/js/custom/apps/customers/list/list.js') }}"></script>
    {{--    <script src="{{ asset('app-assets/js/custom/apps/customers/add.js') }}"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $(document).on('click', '.delete', function() {
                const url = "{{ route('school.students.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })
        });
    </script>
@endsection
