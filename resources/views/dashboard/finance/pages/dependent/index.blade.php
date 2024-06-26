@extends('dashboard.finance.layout.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                List Daftar Tanggungan Persemester
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Daftar Tanggungan {{ $school->name }}.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1 gap-3">
            <!--begin::Button-->
            <button class="btn btn-dark btn-plus fw-bold">
                Tambah </button>
            <a href="{{ route('administration.tracking.index') }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body pt-5">
                        <!--begin::Table-->
                        <div class="d-flex justify-content-start">
                            <div class="d-flex w-25 gap-3">
                                <select class="form-select form-select-solid" name="classroom_id" data-control="select2"
                                    data-placeholder="Select an option">
                                    @foreach ($classrooms as $classroom)
                                        <option {{ request()->classroom_id == $classroom->id ? 'selected' : '' }}
                                            value="{{ $classroom->id }}">{{ $classroom->name }} -
                                            {{ $classroom->devision->name }} -
                                            {{ $classroom->generation->schoolYear->school_year }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-dark fw-bold" type="submit">
                                    Cari</button>
                                <a href="{{ route('administration.dependent.index', $school->id) }}" type="button"
                                    class="btn btn-light text-light"><i class="fonticon-repeat"></i></a>
                            </div>
                        </div>
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">No</th>
                                    <th class="text-start">Kelas</th>
                                    <th class="text-start">Devisi</th>
                                    <th class="text-start">Tahun Ajaran</th>
                                    <th class="text-start">Semester</th>
                                    <th class="text-start">Nominal</th>
                                    <th class="text-start">Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($dependents as $dependent)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dependent->classroom->name }}</td>
                                        <td>{{ $dependent->classroom->devision->name }}</td>
                                        <td>{{ $dependent->classroom->generation->schoolYear->school_year }}</td>
                                        <td>Semester {{ $dependent->semester }}</td>
                                        <td>{{ 'Rp ' . number_format($dependent->nominal, 0, ',', '.') }}</td>
                                        <td>
                                            <button
                                                class="btn btn-icon btn-bg-light btn-edit btn-active-color-primary btn-sm me-1"
                                                data-id="{{ $dependent->id }}" data-semester="{{ $dependent->semester }}"
                                                data-classroom="{{ $dependent->classroom_id }}"
                                                data-nominal="{{ $dependent->nominal }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Edit Data">
                                                <i class="fa-regular fa-pen-to-square fs-3 text-warning"></i> </button>
                                        </td>
                                    </tr>
                                @endforeach
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
    <x-delete-modal-component />
    <div class="modal fade" tabindex="-1" id="kt_modal_plus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Tanggungan</h3>
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
                    <form action="{{ route('administration.dependent.store') }}" method="post">
                        @csrf
                        <label class="form-label">Pilih Semester</label>
                        <select class="form-select " name="semester" value="{{ old('semester') }}"
                            data-placeholder="Select an option">
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                        </select>

                        <label class="form-label mt-3" for="classroom_id">Pilih Kelas</label>
                        <select name="classroom_id[]" id="classroom_id" class="form-select form-select-md form-select-solid" data-control="select2" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }} -
                                    {{ $classroom->devision->name }} -
                                    {{ $classroom->generation->schoolYear->school_year }}</option>
                            @endforeach
                        </select>

                        <label class="form-label mt-3" for="nominal">Nominal</label>
                        <input type="number" name="nominal" placeholder="100000" id="nominal" class="form-control mt-2">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Tanggungan</h3>

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
                    <form id="form_edit" method="post">
                        @csrf
                        @method('PUT')
                        <label class="form-label" for="semester">Pilih Semester</label>
                        <select name="semester" id="semesterEdit" class="form-select" required>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                        </select>
                        <label class="form-label mt-3" for="nominal">Nominal</label>
                        <input type="number" name="nominal" id="nominalEdit" class="form-control mt-2">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--    <script src="{{ asset('app-assets/js/custom/apps/customers/list/export.js') }}"></script> --}}
    <script src="{{ asset('app-assets/js/custom/apps/customers/list/list.js') }}"></script>
    {{--    <script src="{{ asset('app-assets/js/custom/apps/customers/add.js') }}"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $(document).on('click', '.delete', function() {
                const url = "{{ route('admin.devisions.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })
        });

        $('.btn-plus').click(function() {
            $('#kt_modal_plus').modal('show')
        })
        $('.btn-edit').click(function() {
            var id = $(this).data('id')
            var semester = $(this).data('semester')
            var classroom = $(this).data('classroom')
            var nominal = $(this).data('nominal')
            $('#semesterEdit').val(semester)
            $('#classroomEdit').val(classroom)
            $('#nominalEdit').val(nominal)
            $('#form_edit').attr('action', "{{ route('administration.dependent.update', ':id') }}".replace(':id',
                id))
            $('#kt_modal_edit').modal('show')
        })
    </script>
@endsection
