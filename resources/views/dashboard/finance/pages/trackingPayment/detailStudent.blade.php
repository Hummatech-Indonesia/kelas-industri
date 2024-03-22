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
                List transaksi siswa pada kelas industri - semester
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            {{-- @foreach ($dependents as $dependent)
                @if ($dependent->nominal - $trackings->sum('total_pay') == 0)
                    <div class="fw-semibold fs-7"
                        style="background-color: #4eb443; color: white; border-radius: 5px; padding: 5px ">
                        Lunas
                    </div>
                @else
                    <div class="fw-semibold fs-7"
                        style="background-color: #b44343; color: white; border-radius: 5px; padding: 5px ">
                        Belum Lunas
                    </div>
                @endif
            @endforeach --}}
            <a href="{{ url()->previous() }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <!--end::Actions-->
    </div>
    <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">
        @foreach ($dependents as $index => $li)
            <!--begin::Item-->
            <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                <!--begin::Link-->
                <a class="nav-link d-flex {{ $index === 0 ? 'show active' : '' }} justify-content-between flex-column flex-center overflow-hidden py-4"
                    data-bs-toggle="pill" href="#kt_stats_widget_2_tab_{{ $li->id }}"
                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}" role="tab" tabindex="-1"
                    data-semester="{{ $li->semester }}" data-user="{{ $user }}">
                    <!--begin::Subtitle-->
                    <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                        Semester {{ $li->semester }}
                    </span>
                    <!--end::Subtitle-->
                    <!--begin::Bullet-->
                    <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                    <!--end::Bullet-->
                </a>
                <!--end::Link-->
            </li>
            <!--end::Item-->
        @endforeach

    </ul>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body py-3">
                @foreach ($dependents as $index => $tabContent)
                    <div class="tab-content">
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                            id="kt_stats_widget_2_tab_{{ $tabContent->id }}" role="tabpanel">
                            <div class="d-flex">
                                @if ($tabContent->semester)
                                    <button class="btn btn-dark ms-auto fw-bold h-40px fs-7 btn-plus"
                                        data-semester="{{ $tabContent->semester }}"
                                        data-semester_tanggungan="{{ $tabContent->nominal }}"
                                        data-total_pay="{{ $trackings->where('semester', $tabContent->semester)->sum('total_pay') }}">
                                        Tambah
                                    </button>
                                @endif
                            </div>
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
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @forelse ($trackings->where('semester', $tabContent->semester) as $index => $tracking)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <div class="text-gray-900 fw-bold fs-7">
                                                                {{ $counter++ }}
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
                                                    <button class="btn btn-icon btn-bg-light btn-edit btn-active-color-primary btn-sm me-1"
                                                        data-id="{{ $tracking->id }}" data-user="{{ $tracking->user_id }}"
                                                        data-total="{{ $tracking->total_pay }}"
                                                        data-payment="{{ $tracking->payment_date }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data"
                                                        data-kt-initialized="1">
                                                        <i class="fa-regular fa-pen-to-square fs-3 text-warning"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">
                                                    <x-empty-component title="transaksi" />
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                                {{-- {{ $newss->links('pagination::bootstrap-5') }} --}}

                            </div>
                            <!--end::Table container-->
                        </div>
                    </div>
                @endforeach
            </div>
            <!--begin::Body-->
        </div>
        <x-delete-modal-component />

        <h4 class="fw-bolder fs-1 mb-4">Rincian Pembayaran</h4>
        <div class="card shadow mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-gray-900 fw-medium fs-5">Total Pembayaran Anda pada semester ini</div>
                    <div class="text-gray-900 fw-bolder fs-5" id="total_bayar"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-gray-900 fw-medium fs-5">Tanggungan pembayaran pada semester ini</div>
                    <div class="text-gray-900 fw-bolder fs-5" id="tanggungan_pembayaran"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-5">
                    <div class="text-primary fw-bolder fs-1">Total Tanggungan</div>
                    <div class="text-primary fw-bolder fs-1" id="total_sisa"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="create_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title"></h3>

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
                        <input type="hidden" name="semester_tanggungan" id="semester_tanggungan">
                        <input type="hidden" name="total" id="total_pay_semester">
                        <div class="mb-3">
                            <label for="total_pay">Nominal Uang</label>
                            <input type="number" class="form-control" name="total_pay" id="total_pay">
                        </div>
                        <div class="mb-5">
                            <label for="payment_date">tanggal</label>
                            <input type="date" class="form-control" name="payment_date" id="payment_date">
                        </div>
                        <input type="hidden" id="semester" name="semester">
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
                        <input type="hidden" name="user_id" id="user-edit">
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
        $(document).ready(function() {
            var semester = $('a[data-semester]').first().data('semester');
            var userId = $('a[data-semester]').first().data('user');
            if (semester && userId) {
                console.log(semester, userId);
                $.ajax({
                    type: "GET",
                    url: "{{ route('administration.total.dependent', ['semester' => ':semester', 'user' => ':user']) }}"
                        .replace(':semester', semester).replace(':user', userId),
                    success: function(response) {
                        console.log(response);
                        $('#total_bayar').html(numberFormat(response.totalBayar));
                        $('#tanggungan_pembayaran').html(numberFormat(response.nominal.nominal));
                        $('#total_sisa').html(numberFormat(response.nominal.nominal - response
                            .totalBayar));

                        function numberFormat(angka) {
                            var rupiah = '';
                            var angkarev = angka.toString().split('').reverse().join('');
                            for (var i = 0; i < angkarev.length; i++)
                                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                            return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                        }

                    }
                });
            }
        });

        $('.nav-link').click(function() {
            var semester = $(this).data('semester');
            var userId = $(this).data('user');
            console.log(semester, userId);
            $.ajax({
                type: "GET",
                url: "/administration/get-total-dependent/" + semester + "/" + userId,
                success: function(response) {
                    console.log(response);
                    $('#total_bayar').html(numberFormat(response.totalBayar));
                    $('#tanggungan_pembayaran').html(numberFormat(response.nominal.nominal));
                    $('#total_sisa').html(numberFormat(response.nominal.nominal - response.totalBayar));

                    function numberFormat(angka) {
                        var rupiah = '';
                        var angkarev = angka.toString().split('').reverse().join('');
                        for (var i = 0; i < angkarev.length; i++)
                            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                    }
                }
            });
        });
    </script>


    <script>
        $('.btn-delete').click(function() {
            const url = "{{ route('admin.news.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('.btn-plus').click(function() {
            var semester = $(this).data('semester');
            $('#semester').val(semester);
            var semester_tanggungan = $(this).data('semester_tanggungan');
            $('#semester_tanggungan').val(semester_tanggungan);
            var total_pay = $(this).data('total_pay');
            $('#total_pay_semester').val(total_pay);
            $('#modal-title').html('Tambah Pembayaran Semester ' + semester);
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
