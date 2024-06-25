@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Jurnal
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List jurnal guru dan mentor pada Kelas Industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ url()->previous() }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Pembuat</th>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Detail</th>
                                    <th>Absensi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($journals as $journal)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $journal->user->name }}</td>
                                        <td>
                                            <svg type="button" class="btn-photo"
                                                data-photo="{{ asset('storage/' . $journal->photo) }}"
                                                xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.5 13.498l2.5 3.006l3.5-4.506l4.5 6H5m16 1v-14a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2z"
                                                    fill="#474761" />
                                            </svg>
                                        </td>
                                        <td>{{ $journal->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($journal->date)->locale('id')->isoFormat('D MMMM YYYY') }}
                                        </td>
                                        <td>
                                            <svg fill="#474761" type="button"
                                                data-description="{{ $journal->description }}" class="btn-description"
                                                xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                                                width="30">
                                                <path
                                                    d="M319-250h322v-60H319v60Zm0-170h322v-60H319v60ZM220-80q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm331-554h189L551-820v186Z" />
                                            </svg>
                                        </td>
                                        <td>
                                            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                <a href="{{ route('admin.journal.attendance', ['classroom' => $journal->classroom, 'journal' => $journal->id]) }}"
                                                    class="btn-absent btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Absensi</a>
                                            @elseif (auth()->user()->roles->pluck('name')[0] == 'school')
                                                <a href="{{ route('school.journal.attendance', ['classroom' => $journal->classroom, 'journal' => $journal->id]) }}"
                                                    class="btn-absent btn btn-bg-light btn-sm btn-color-primary text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Absensi</a>
                                            @endif
                                        </td>
                                    </tr>
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
    {{-- <div class="modal fade" tabindex="-1" id="kt_modal_absent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Absensi</h3>
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
                <div class="modal-body" id="description">
                    <h5></h5>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_description">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Detail </h3>
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
                <div class="modal-body" id="description">
                    <h5></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal_photo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Foto Jurnal</h3>

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
                    <img id="photo" alt="" width="100%" srcset="">
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
            const url = "{{ route('mentor.journal.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('.btn-description').click(function() {
            var description = $(this).data('description')
            $('#description').text(description)
            $('#kt_modal_description').modal('show')
        });

        $('.btn-photo').click(function() {
            var photo = $(this).data('photo')
            $('#photo').attr('src', photo);
            $('#modal_photo').modal('show')
        });
    </script>
@endsection
