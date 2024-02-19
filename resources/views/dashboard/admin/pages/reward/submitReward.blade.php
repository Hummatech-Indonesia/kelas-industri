@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Hadiah
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List hadiah yang sudah ditukar pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                            @if ($submitRewards->count() > 0)
                        <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Status</th>
                                    <th>Nama Hadiah</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($submitRewards as $reward)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$reward->user->name}}</td>
                                        @if ($reward->status == 'active')
                                        <td><span class="badge badge-light-success">Sudah Kirim</span>
                                        </td>
                                        @else
                                        <td><span class="badge badge-light-danger">Belum Dikrim</span>
                                        </td>
                                        @endif
                                        <td>{{$reward->reward->reward_name}}</td>
                                        <td>{{$reward->phone_number}}</td>
                                        <td>{{$reward->address}}</td>
                                        <td>
                                            @if ($reward->status == 'not_active')
                                            <form id="form-validate" action="{{route('admin.validStatus', $reward->id)}}" method="post">
                                                @method('PATCH')
                                                @csrf
                                                <span type="button" id="kt_docs_sweetalert_html" class="svg-icon svg-icon-2hx svg-icon-success" data-nama="{{$reward->user->name}}"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"/>
                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/>
                                                    </svg>
                                                    </span>
                                            </form>
                                            @else
                                            <span class="svg-icon svg-icon-2hx svg-icon-danger"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"/>
                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>
                                                </svg>
                                                </span>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        @else
                                <x-empty-component title="Hadiah" />
                            @endif
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>

        </div>
        <x-delete-modal-component />
    </div>
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

            $('#kt_docs_sweetalert_html').click(function(e) {
                e.preventDefault();
                var nama = $(this).attr('data-nama');

                Swal.fire({
                    html: "Apakah Anda Yakin Hadiah Dari Siswa " + nama + " Sudah Terkirim",
                    icon: "info",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Iya, Benar!",
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed)
                        $('#form-validate').submit()
                });
            })

    </script>
@endsection
