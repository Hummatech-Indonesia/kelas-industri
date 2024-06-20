@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                List Kriteria
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Kriteria pada Devisi {{ $devision->name }}.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 py-2 py-md-1">
            <a href="{{ route('admin.devisions.index') }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
            <!--begin::Button-->
            <button class="btn btn-dark btn-plus fw-bold">
                Tambah </button>
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
                    <div class="card-body pt-12">

                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head-->
                            Total bobot spk adalah {{ $devision->criterias()->sum('weight') }}
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tipe</th>
                                    <th class="text-center">Bobot</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                    @forelse ($devision->criterias()->where('status',1)->get() as $criteria)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <div class="d-flex flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">{{ $criteria->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7"><span class="badge {{ $criteria->type == "BENEFIT" ? "bg-success text-light-success" : "bg-danger text-light-danger"}}">{{ $criteria->type }}</span> </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">{{ $criteria->weight }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-gray-900 fw-bold fs-7">
                                                        <button
                                                        class="btn btn-icon btn-bg-light btn-edit btn-active-color-primary btn-sm me-1"
                                                        data-id="{{ $criteria->id }}"
                                                        data-name="{{ $criteria->name }}"
                                                        data-type="{{ $criteria->type }}"
                                                        data-weight="{{ $criteria->weight }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data">
                                                        <i class="fa-regular fa-pen-to-square fs-3 text-warning"></i> </button>

                                                        @if(!$criteria->is_default)
                                                        <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete delete"
                                                            data-id="{{ $criteria->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Data">
                                                            <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">
                                            <div class="col-12 text-center">
                                                <!--begin::Illustration-->
                                                <img src="{{ asset('user-assets/media/misc/watch.svg') }}" class="h-150px"
                                                    alt="" />
                                                <!--end::Illustration-->
        
                                                <!--begin::Title-->
                                                <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih Kosong</h4>
                                                <!--end::Title-->
        
                                                <!--begin::Desctiption-->
                                                <span class="fw-semibold text-gray-700 mb-4 d-block">
                                                    anda belum memiliki Devisi untuk saat ini.
                                                </span>
                                                <!--end::Desctiption-->
                                            </div>
                                        </td>
                                    </tr>
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
    <div class="modal fade" tabindex="-1" id="kt_modal_plus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Kriteria</h3>

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
                    <form action="{{route('admin.criterias.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="devision_id" value="{{$devision->id}}">
                            <div class="form-group row mb-3">

                                <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>

                                <div class="col-lg-9 col-xl-9">

                                    <input class="form-control form-control-solid form-control-lg" name="name"
                                        type="text" value="{{ old('name') }}"
                                        placeholder="Produktifitas" required>

                                </div>

                            </div>
                            <div class="form-group row mb-3">

                                <label class="col-xl-3 col-lg-3 col-form-label">Tipe</label>

                                <div class="col-lg-9 col-xl-9">

                                    <select name="type" class="form-select form-select-solid me-5"
                                        data-control="select2" data-placeholder="-Pilih-" id="type">
                                        <option value="">-Pilih-</option>
                                        <option value="BENEFIT">BENEFIT</option>
                                        <option value="COST">COST</option>
                                    </select>

                                </div>

                            </div>
                            <div class="form-group row mb-3">

                                <label class="col-xl-3 col-lg-3 col-form-label">Bobot</label>

                                <div class="col-lg-9 col-xl-9">

                                    <input class="form-control form-control-solid form-control-lg" name="weight"
                                        type="number" value="{{ old('weight') }}"
                                        placeholder="10" required>

                                </div>

                            </div>
                        </div>
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
                    <form id="form_edit" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id_edit">
                        <label for="name)edit">Nama Devisi</label>
                        <input type="text" name="name" id="name_edit" class="form-control mt-2" placeholder="Masukkan Nama Devisi" required>
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
                const url = "{{ route('admin.criterias.destroy', ':id') }}".replace(':id', $(this).data('id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })
        });

        $('.btn-plus').click(function() {
            $('#kt_modal_plus').modal('show')
        })
        $('.btn-edit').click(function() {
            var id = $(this).data('id')
            var name = $(this).data('name')
            $('#name_edit').val(name)
            $('#form_edit').attr('action', "{{ route('admin.devisions.update', ':id') }}".replace(':id', id))
            $('#kt_modal_edit').modal('show')
        })
    </script>
@endsection
