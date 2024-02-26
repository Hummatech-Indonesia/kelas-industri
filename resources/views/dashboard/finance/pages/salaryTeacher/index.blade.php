@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.finance.layout.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Bukti Gaji Guru
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List gaji guru pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <!--end::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('administration.salaryTeacher.create') }}" class="btn btn-dark fw-bold h-40px fs-7">
                Tambah
            </a>
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-4">

                        <!--begin::Table-->

                        {{-- @if ($salarys->count() > 0) --}}
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Bulan</th>
                                    <th>Jumlah Gaji</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                {{-- @foreach ($salarys as $salary) --}}
                                <tr>
                                    <td>1</td>
                                    <td>nama</td>
                                    <td>
                                        {{-- {{ Carbon::parse($salary->payday)->locale('id')->isoFormat('MMMM YYYY') }} --}}
                                    </td>
                                    <td>Rp
                                        {{-- {{ number_format(floatval($salary->salary_amount), 0, ',', '.') }} --}}
                                    </td>
                                    <td>
                                        <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30"
                                            viewBox="0 0 24 24"
                                            data-photo="
                                            {{-- {{asset('storage/'.$salary->photo)}} --}}
                                            "
                                            class="btn-photo">
                                            <path
                                                d="M8.5 13.498l2.5 3.006l3.5-4.506l4.5 6H5m16 1v-14a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2z"
                                                fill="currentColor" />
                                        </svg>
                                    </td>
                                    <td><a href="
                                        {{route('administration.salaryTeacher.edit')}}
                                        " class="btn btn-default btn-sm p-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Edit Gaji"><i
                                                class="fonticon-setting fs-2 text-warning"></i></a>
                                        <button class="btn btn-default btn-sm p-1 btn-delete"
                                            data-id="
                                        {{-- {{$salary->id}} --}}
                                        " data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Hapus Gaji">
                                            <i class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        {{-- @else --}}
                        {{-- <x-empty-component title="gaji" /> --}}
                        {{--  @endif --}}
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>

        </div>
        <x-delete-modal-component />
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_photo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Deskripsi</h3>

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
                    <img src="" id="photo" class="col-12" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $('.btn-delete').click(function() {
            const url = "{{ route('admin.deleteSaleriesTeacher', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('.btn-photo').click(function() {
            var photo = $(this).data('photo');
            $('#photo').attr('src', photo);
            $('#kt_modal_photo').modal('show');
        });
    </script>
@endsection
