@extends('dashboard.finance.layout.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                List Devisi
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Devisi pada kelas industri.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <button class="btn btn-dark btn-plus fw-bold">
                Tambah </button>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-12">

                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">No</th>
                                    <th class="text-start">semester</th>
                                    <th class="text-start">kelas</th>
                                    <th class="text-start">nominal</th>
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
                                        <td>semester {{ $dependent->semester }}</td>
                                        <td>{{ $dependent->classroom->name }}</td>
                                        <td>{{ $dependent->nominal }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-edit" data-id="{{ $dependent->id }}"
                                                data-semester="{{ $dependent->semester }}"
                                                data-classroom="{{ $dependent->classroom_id }}"
                                                data-nominal="{{ $dependent->nominal }}">Ubah</button>
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
                    <h3 class="modal-title">Tambah tanggungan</h3>
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
                        <label for="semester">pilih semester</label>
                        <select name="semester" id="semester" class="form-select" required>
                            <option value="" disabled selected>pilih semester</option>
                            <option value="1">semester 1</option>
                            <option value="2">semester 2</option>
                            <option value="3">semester 3</option>
                            <option value="4">semester 4</option>
                            <option value="5">semester 5</option>
                            <option value="6">semester 6</option>
                        </select>
                        <label for="classroom_id">pilih kelas</label>
                        <select name="classroom_id" id="classroom_id" class="form-select" required>
                            <option value="" disabled selected>pilih kelas</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        <label for="nominal">nominal</label>
                        <input type="number" name="nominal" id="nominal" class="form-control mt-2">
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
                    <h3 class="modal-title">Edit tanggungan</h3>

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
                        <label for="semester">pilih semester</label>
                        <select name="semester" id="semesterEdit" class="form-select" required>
                            <option value="" disabled selected>pilih semester</option>
                            <option value="1">semester 1</option>
                            <option value="2">semester 2</option>
                            <option value="3">semester 3</option>
                            <option value="4">semester 4</option>
                            <option value="5">semester 5</option>
                            <option value="6">semester 6</option>
                        </select>
                        <label for="classroom_id">pilih kelas</label>
                        <select name="classroom_id" id="classroomEdit" class="form-select" required>
                            <option value="" disabled selected>pilih kelas</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        <label for="nominal">nominal</label>
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
            $('#form_edit').attr('action', "{{ route('administration.dependent.update', ':id') }}".replace(':id', id))
            $('#kt_modal_edit').modal('show')
        })
    </script>
@endsection
