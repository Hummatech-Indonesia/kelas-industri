@extends('dashboard.finance.layout.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                {{ $student->name }} - {{ $student->studentSchool->studentClassroom->classroom->name }} -
                {{ $student->studentSchool->school->name }}
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List transaksi siswa pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ url()->previous() }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
            <button class="btn btn-dark fw-bold h-40px fs-7 btn-plus">
                Tambah
            </button>
        </div>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-8">

            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-50px">No</th>
                                <th class="min-w-150px">Nominal</th>
                                <th class="min-w-150px">Waktu Pembayaran</th>
                                <th class="min-w-100px">Aksi</th>

                            </tr>
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody>
                            @forelse ($trackings as $tracking)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold fs-7">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 200px ;white-space: nowrap">
                                        <span class="text-gray-900 fw-bold fs-7">Rp.
                                            {{ number_format($tracking->total_pay, 0, ',', '.') }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold fs-7">
                                                    {{ Carbon::parse($tracking->payment_date)->translatedFormat('d F Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-edit" data-id="{{ $tracking->id }}"
                                            data-user="{{ $tracking->user_id }}"
                                            data-total="{{ $tracking->total_pay }}"
                                            data-payment="{{ $tracking->payment_date }}">Edit</button>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    <x-empty-component title="transaksi" />
                                </td>
                            </tr>
                            @endforelse
                            {{-- @empty
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
                                            anda belum memiliki berita untuk saat ini.
                                        </span>
                                        <!--end::Desctiption-->
                                    </div>
                                </td>
                            </tr>
                        @endforelse --}}
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    {{-- {{ $newss->links('pagination::bootstrap-5') }} --}}
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
    </div>
    <x-delete-modal-component />
    <div class="modal fade" tabindex="-1" id="create_modal">
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
                    <form action="{{ route('administration.tracking.detailStudent.store', $student->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $student->id }}">
                        <div class="mb-3">
                            <label for="total_pay">Nominal Uang</label>
                            <input type="number" class="form-control" name="total_pay" id="total_pay">
                        </div>
                        <div class="mb-5">
                            <label for="payment_date">tanggal</label>
                            <input type="date" class="form-control" name="payment_date" id="payment_date" now>
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="edit_modal">
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
                    <form method="POST" id="form_edit">
                        @csrf
                        @method('PUT')
                        <input type="text" name="user_id" id="user-edit">
                        <div class="mb-3">
                            <label for="total_pay">Nominal Uang</label>
                            <input type="number" class="form-control" name="total_pay" id="total-edit">
                        </div>
                        <div class="mb-5">
                            <label for="payment_date">tanggal</label>
                            <input type="date" class="form-control" name="payment_date" id="payment-edit">
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
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
            const url = "{{ route('admin.news.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('.btn-plus').click(function() {
            $('#create_modal').modal('show');
        });
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var user = $(this).data('user');
            var totalPay = $(this).data('total');
            var paymentDate = $(this).data('payment');
            $('#user-edit').val(user);
            $('#payment-edit').val(paymentDate);
            $('#total-edit').val(totalPay);
            $('#form_edit').attr('action', "{{ route('administration.tracking.detailStudent.update', ':id') }}"
                .replace(':id', id))
            $('#edit_modal').modal('show');
        });
    </script>
@endsection
