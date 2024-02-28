@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Akun Keuangan
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Akun Keuangan pada kelas industri.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="{{ route('admin.administrations.create') }}" class="btn btn-dark fw-bold">
                Tambah </a>
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
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            
                            <!--begin::Table body-->
                            @forelse ($akun as $administration)
                            <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">{{ $loop->iteration }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">{{ $administration->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">{{ $administration->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">{{ $administration->phone_number }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">{{ $administration->address }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">
                                                        <a href="{{ route('admin.administrations.edit', $administration->id) }}"
                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data">
                                                        <i class="fonticon-setting fs-2 text-warning"></i> </a>
            
                                                    <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete delete"
                                                        data-id="{{ $administration->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Data">
                                                        <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <x-empty-component title="akun" />
                                @endforelse

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
    <div class="modal fade" tabindex="-1" id="kt_modal_photo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Detail Berita</h3>

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
                    <div class="mb-2" id="date">

                    </div>
                    <div class="text-gray-900 fw-bold fs-3 mb-3" id="title">

                    </div>
                    <p id="description" style="word-break: break-word;">

                    </p>
                    <img src="" id="photo" class="col-12" alt="">
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
    </script>
@endsection
