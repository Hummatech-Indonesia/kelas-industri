@extends('dashboard.admin.layouts.app')
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
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <div class="d-flex flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">1</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">ljno</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">
                                                        <button
                                                        class="btn btn-icon btn-bg-light btn-edit btn-active-color-primary btn-sm me-1"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data">
                                                        <i class="fa-regular fa-pen-to-square fs-3 text-warning"></i> </button>

                                                    <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete delete"
                                                        data-id="" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Data">
                                                        <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
                    <h3 class="modal-title">Tambah Devisi</h3>

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
                    <form action="{{route('admin.devisions.store')}}" method="post">
                        @csrf
                        <label for="name">Nama Devisi</label>
                        <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukkan Nama Devisi" required>
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
                    <h3 class="modal-title">Edit Devisi</h3>

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
                    <form action="">
                        <label for="name">Nama Devisi</label>
                        <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukkan Nama Devisi" required>
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
                const url = "{{ route('admin.administrations.destroy', ':id') }}".replace(':id', $(this).data('id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })
        });

        $('.btn-plus').click(function() {
            $('#kt_modal_plus').modal('show')
        })
        $('.btn-edit').click(function() {
            $('#kt_modal_edit').modal('show')
        })
    </script>
@endsection
