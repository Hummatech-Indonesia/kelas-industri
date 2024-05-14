@extends('dashboard.finance.layout.app')
@section('content')
    <div class="toolbar" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Status paket sekolah kelas industri
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List status paket sekolah kelas industri
                pada kelas industri
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
    <div class="alert alert-warning d-flex align-items-center p-5 w-100">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
            <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg width="24" height="24" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor">
                    </rect>
                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                        fill="currentColor"></rect>
                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                        fill="currentColor"></rect>
                </svg>
            </span>
        </span>
        <!--end::Icon-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column">
            <!--begin::Title-->
            <h4 class="mb-1 text-dark">Informasi</h4>
            <!--end::Title-->
            <!--begin::Content-->
            <ul>
                <li>
                    Pastikan anda menambah paket sekolah setiap awal semester
                </li>
                <li>Menambahkan paket baru pada sekolah yang ada akan mengganti paket yang lama
                </li>
            </ul>
            <!--end::Content-->

        </div>
        <!--end::Wrapper-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex row ms-4 mt-4 gap-2">
                        <form action="" method="GET" class="d-flex gap-2">
                            <div class="col-3">
                                <select name="school_id" class="form-select form-select-solid me-5" data-control="select2"
                                    data-placeholder="select an option">
                                    <option value="all">Semua Sekolah
                                    </option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}"
                                            {{ request('school_id') == $school->id ? 'selected' : '' }}>
                                            {{ $school->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="status" class="form-select form-select-solid me-5" data-control="select2"
                                    data-placeholder="select an option">
                                    <option value="all">Semua Status
                                    </option>
                                    <option value="not_yet_paid"
                                        {{ request('status') == 'not_yet_paid' ? 'selected' : '' }}>
                                        Belum Dibayar
                                    </option>
                                    <option value="debt" {{ request('status') == 'debt' ? 'selected' : '' }}>
                                        Piutang
                                    </option>
                                    <option value="already_paid"
                                        {{ request('status') == 'already_paid' ? 'selected' : '' }}>
                                        Sudah Dibayar
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary fw-bold">Cari</button>
                            <a href="{{ route('administration.schoolPackage.index') }}"
                                class="btn btn-light text-light ms-2"><i class="fonticon-repeat"></i></a>
                        </form>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Sekolah</th>
                                    <th>Paket</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @forelse ($schoolPackages as $schoolPackage)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $schoolPackage->school->name }}</td>
                                        <td>{{ $schoolPackage->package_name }}</td>
                                        <td>{{ 'Rp ' . number_format($schoolPackage->price, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($schoolPackage->status == 'not_yet_paid')
                                                <span class="badge badge-light-danger rounded border border-danger">Belum
                                                    Dibayar</span>
                                            @elseif($schoolPackage->status == 'already_paid')
                                                <span class="badge badge-light-success rounded border border-success">Sudah
                                                    Dibayar</span>
                                            @else
                                                <span
                                                    class="badge badge-light-warning rounded border border-warning">Piutang</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($schoolPackage->status == 'not_yet_paid' || $schoolPackage->status == 'debt')
                                                <button
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-status me-1"
                                                    data-bs-toggle="tooltip" data-id="{{ $schoolPackage->id }}"
                                                    data-status="{{ $schoolPackage->status }}" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip" data-bs-title="Edit Status">
                                                    <span class="svg-icon svg-icon-2 svg-icon-primary"><svg width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.3"
                                                                d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </button>
                                                <button
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-edit me-1"
                                                    data-bs-toggle="tooltip" data-id="{{ $schoolPackage->id }}"
                                                    data-package_name="{{ $schoolPackage->package_name }}"
                                                    data-price="{{ $schoolPackage->price }}" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data">
                                                    <i class="fa-regular fa-pen-to-square fs-3 text-warning"></i>
                                                </button>
                                                <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete"
                                                    data-id="{{ $schoolPackage->id }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Hapus Data">
                                                    <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                                </div>
                                            @else
                                                <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete"
                                                    data-id="{{ $schoolPackage->id }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Hapus Data">
                                                    <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                                </div>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="col-12 text-center">
                                                <!--begin::Illustration-->
                                                <img src="{{ asset('user-assets/media/misc/watch.svg') }}"
                                                    class="h-150px" alt="" />
                                                <!--end::Illustration-->

                                                <!--begin::Title-->
                                                <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih Kosong</h4>
                                                <!--end::Title-->

                                                <!--begin::Desctiption-->
                                                <span class="fw-semibold text-gray-700 mb-4 d-block">
                                                    anda belum memiliki status paket sekolah untuk saat ini.
                                                </span>
                                                <!--end::Desctiption-->
                                            </div>

                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        {{ $schoolPackages->links('pagination::bootstrap-5') }}
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>

        </div>

    </div>
    {{-- Modal --}}
    <div class="modal fade" tabindex="-1" id="modal_plus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Paket Sekolah</h3>

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
                    <form action="{{ route('administration.schoolPackage.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="my-4">
                            <label for="exampleFormControlInput1"
                                class="form-label @error('school_id') is-invalid @enderror">Sekolah</label>
                            <select class="form-select form-select-solid" name="school_id"
                                value="{{ old('school_id') }}" data-control="select2"
                                data-placeholder="Select an option">
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-4">
                            <label for="status" class="form-label mb-3">Nama Paket</label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="masukkan nama paket" name="package_name" id="">
                        </div>
                        <div class="my-4">
                            <label for="status" class="form-label mb-3">Harga Paket </label>
                            <input type="text" placeholder="Rp. 5,000,000" class="form-control form-control-solid"
                                name="price" id="">
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
                    <h3 class="modal-title">Edit status paket sekolah</h3>

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
                    <form id="form_edit" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nameEdit" class="form-label mb-3">Nama Paket</label>
                            <input type="text" class="form-control" name="package_name" id="nameEdit"
                                placeholder="Masukkan Nama Paket">
                        </div>
                        <div class="my-4">
                            <label for="priceEdit" class="form-label mb-3">Harga Paket</label>
                            <input type="number" class="form-control" name="price" id="priceEdit"
                                placeholder="Masukkan Harga Paket">
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modal_status">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Status Pembayaran</h3>

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
                    <form id="form_status" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nameEdit" class="form-label mb-3">Status</label>
                            <select name="status" id="statusEdit" class="form-select form-select-solid">
                            </select>
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-plus').click(function() {
            $('#modal_plus').modal('show');
        })

        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var package_name = $(this).data('package_name');
            var price = $(this).data('price');

            $('#form_edit').attr('action', "{{ route('administration.schoolPackage.update', ':id') }}".replace(
                ':id',
                id));
            $('#nameEdit').val(package_name);
            $('#priceEdit').val(price);

            $('#modal_edit').modal('show');
        });

        $('.btn-status').click(function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            $('#form_status').attr('action', "{{ route('administration.schoolPackage.update', ':id') }}".replace(
                ':id',
                id));
            $('#statusEdit').empty();
            $('#statusEdit').append('<option value="not_yet_paid">Belum Dibayar</option>');
            $('#statusEdit').append('<option value="already_paid">Sudah Dibayar</option>');
            $('#statusEdit').append('<option value="debt">Piutang</option>');
            $('#statusEdit').val(status);

            $('#modal_status').modal('show');
        })

        $('.btn-delete').click(function() {
            const id = $(this).data('id')
            const url = "{{ route('administration.schoolPackage.destroy', ':id') }}".replace(':id', id)
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp ' + ribuan;
        }

        $(document).ready(function() {
            getPackage();

            $('#select-status').change(function() {
                getPackage();
            });

            function getPackage() {
                $.ajax({
                    url: "{{ route('administration.schoolPackage.index') }}",
                    type: 'GET',
                    data: {
                        status: $('#select-status').val()
                    },
                    success: function(response) {
                        $('#select-package').html('');
                        $.each(response, function(index, item) {
                            var option = '<option value="' + item.id + '">' + item.name +
                                ' ( Harga ' + formatRupiah(item.price) + ' )' +
                                '</option>';
                            $('#select-package').append(option);
                        });
                    }
                });
            }
        });
    </script>
@endsection
