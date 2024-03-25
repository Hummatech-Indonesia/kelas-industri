@extends('dashboard.finance.layout.app')

@section('css')
    <style>
        .card-pack {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: end;
            width: 400px;
        }

        .img-pack {
            border-radius: 15px;
            width: 100px;
            height: 80px;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Paket Kelas Industri
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Paket pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <!--end::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <button class="btn btn-dark btn-plus fw-bold h-40px fs-7">
                Tambah
            </button>
        </div>
    </div>
    <div class="content" id="kt_content">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 mb-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-50px">No</th>
                                <th class="min-w-150px">Nama </th>
                                <th class="min-w-200px">Harga</th>
                                <th class="min-w-150px">Deskripsi</th>
                                <th class="min-w-150px">Foto</th>
                                <th class="min-w-100px">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($packages as $package)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold fs-7">{{ $loop->iteration + ($packages->perPage() * ($packages->currentPage()-1)) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold fs-7">{{ $package->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold fs-7">Rp
                                                    {{ number_format($package->price, 0, ',', '.') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold fs-7">{{ $package->description }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                @if ($package->image)
                                                    <img src="{{ asset('storage/' . $package->image) }}"
                                                        alt="{{ $package->name }}" class="img-pack">
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex ">
                                            <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-detail btn-sm me-1"
                                            data-id="{{ $package->id }}"
                                            data-name="{{ $package->name }}"
                                            data-price="{{ $package->price }}"
                                            data-description="{{ $package->description }}"
                                            data-image="{{ $package->image }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip" data-bs-title="Lihat Detail">
                                                <i class="fa fa-eye fs-3 text-primary"></i>
                                            </button>
    
                                            <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-edit me-1"
                                            data-id="{{ $package->id }}"
                                                data-name="{{ $package->name }}"
                                                data-price="{{ $package->price }}"
                                                data-description="{{ $package->description }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data">
                                                <i class="fa-regular fa-pen-to-square fs-3 text-warning"></i> </button>
    
                                            <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete"
                                                data-id="{{ $package->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Data">
                                                <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6">
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
                                            anda belum memiliki Paket untuk saat ini.
                                        </span>
                                        <!--end::Desctiption-->
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $packages->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-delete-modal-component />
    <div class="modal fade" tabindex="-1" id="modal_plus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Paket</h3>

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
                <div class="modal-body">
                    @if ($errors->any())
                        <x-errors-component />
                    @endif
                    <form action="{{ route('administration.package.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <label for="name" class="form-label mb-3">Nama Paket</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Masukkan Nama Paket">
                        </div>
                        <div class="my-4">
                            <label for="price" class="form-label mb-3">Harga Paket</label>
                            <input type="number" class="form-control" name="price" id="price"
                                placeholder="Masukkan Harga Paket">
                        </div>
                        <div class="my-4">
                            <label for="description" class="form-label mb-3">Deskripsi Paket</label>
                            <textarea type="text" class="form-control" name="description" id="description"
                                placeholder="Masukkan Deskripsi Paket"></textarea>
                        </div>
                        <div class="my-4">
                            <label for="image" class="form-label mb-3">Gambar Paket</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Paket</h3>

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
                    @if ($errors->any())
                        <x-errors-component />
                    @endif
                    <form id="form_edit" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nameEdit" class="form-label mb-3">Nama Paket</label>
                            <input type="text" class="form-control" name="name" id="nameEdit"
                                placeholder="Masukkan Nama Paket">
                        </div>
                        <div class="my-4">
                            <label for="priceEdit" class="form-label mb-3">Harga Paket</label>
                            <input type="number" class="form-control" name="price" id="priceEdit"
                                placeholder="Masukkan Harga Paket">
                        </div>
                        <div class="my-4">
                            <label for="descriptionEdit" class="form-label mb-3">Deskripsi Paket</label>
                            <textarea type="text" class="form-control" name="description" id="descriptionEdit"
                                placeholder="Masukkan Deskripsi Paket"></textarea>
                        </div>
                        <div class="my-4">
                            <label for="image" class="form-label mb-3">Gambar Paket</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.btn-delete').click(function() {
            const id = $(this).data('id')
            const url = "{{ route('administration.package.destroy', ':id') }}".replace(':id', id)
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })
        $('.btn-plus').click(function() {
            $('#modal_plus').modal('show')
        })
        $('.btn-edit').click(function() {
            var id = $(this).data('id')
            var name = $(this).data('name')
            var price = $(this).data('price')
            var description = $(this).data('description')
            $('#form_edit').attr('action', "{{ route('administration.package.update', ':id') }}".replace(':id',
                id))
            $('#nameEdit').val(name)
            $('#priceEdit').val(price)
            $('#descriptionEdit').val(description)
            $('#modal_edit').modal('show')
        })

        function showDetail() {
            var detail = document.getElementById('detail');
            var elipsis = document.getElementById('elipsis');

            if (detail.classList.contains('text-truncate')) {
                detail.classList.remove('text-truncate');
                elipsis.textContent = "Lihat Lebih Sedikit";
            } else {
                detail.classList.add('text-truncate');
                elipsis.textContent = "Lihat Selengkapnya";
            }
        }
    </script>
@endsection
