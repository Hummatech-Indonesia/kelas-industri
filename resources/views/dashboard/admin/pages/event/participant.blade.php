@extends('dashboard.admin.layouts.app')
@section('css')
    <style>
        .form-check-input {
            border: 2px solid rgb(200, 200, 200);
        }
    </style>
@endsection
@section('content')
    {{-- @dd($event->participants) --}}
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Daftar Peserta - {{ $event->title }}
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <p class="text-muted">

            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        <!--end::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ url()->previous() }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
            <button class="btn btn-flex btn-primary h-40px fs-7 fw-bold" id="set-certificate-btn">Simpan</button>
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row gap-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Daftar semua peserta</h3>
                    </div>

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->

                        <table id="kt_datatable_all" class="table table-striped border rounded gy-5 gs-7">
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Asal Sekolah</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    <th>
                                        <div class="d-flex gap-3 justify-content-center">
                                            Sertifkat
                                            <div class="form-check">
                                                <input class="form-check-input check-all" type="checkbox" value=""
                                                    id="flexCheckDefault" id="check-all" />
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($event->participants as $participant)
                                    @if ($participant->get_cetificate != 1)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $participant->user->name }}</td>
                                            <td>{{ $participant->user->studentSchool->school->name }}</td>
                                            <td>{{ $participant->user->email }}</td>
                                            <td>{{ $participant->user->phone_number }}</td>
                                            <td>
                                                <div class="form-check m-auto" style="width: fit-content;">
                                                    <input class="form-check-input check-certificate" type="checkbox"
                                                        value="" id="flexCheckDefault"
                                                        data-participant="{{ $participant->id }}" />
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Daftar peserta yang mendapat sertifikat </h3>
                    </div>

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->

                        <table id="kt_datatable_participat" class="table table-striped border rounded gy-5 gs-7">
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Asal Sekolah</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    {{-- <th>
                                        <div class="d-flex gap-3 justify-content-center">
                                            Sertifkat
                                            <div class="form-check">
                                                <input class="form-check-input check-all" type="checkbox" value=""
                                                    id="flexCheckDefault" id="check-all" />
                                            </div>
                                        </div>
                                    </th> --}}
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($event->participants as $participant)
                                    @if ($participant->get_cetificate == 1)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $participant->user->name }}</td>
                                            <td>{{ $participant->user->studentSchool->school->name }}</td>
                                            <td>{{ $participant->user->email }}</td>
                                            <td>{{ $participant->user->phone_number }}</td>
                                            {{-- <td>
                                                <div class="form-check m-auto" style="width: fit-content;">
                                                    <input class="form-check-input check-certificate" type="checkbox"
                                                        value="" id="flexCheckDefault"
                                                        data-participant="{{ $participant->id }}" />
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endif
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
        <x-delete-modal-component />
    </div>
@endsection
@section('script')
    <script>
        $("#kt_datatable_all").DataTable({
            responsive: true
        });
        $("#kt_datatable_participat").DataTable({
            responsive: true
        });
    </script>

    <script>
        // $(document).ready(function() {
        let ids = [];
        $('.check-all').change(function() {
            if (this.checked) {
                $('.check-certificate').attr('checked', true);
                ids = [
                    @foreach ($event->participants as $participant)
                        {{ $participant->id }},
                    @endforeach
                ]
            } else {
                ids = [];
                $('.check-certificate').attr('checked', false);
            }
        })

        $('.check-certificate').change(function() {
            const id = parseInt($(this).data('participant'))
            if (this.checked) {
                ids.push(id);
            } else {
                ids.splice(ids.indexOf(id), 1);
            }
        })

        $('#set-certificate-btn').click(function() {
            $.ajax({
                type: "PUT",
                url: "{{ route('admin.eventsParticipant.setCertificate', $event->id) }}",
                data: {
                    'id': ids,
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        location.reload();
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Terjadi kesalahan saat memperbarui sertifikat: ' + error);
                }
            });
        });
    </script>
@endsection
