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
                List jurnal guru dan mentor pada
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <!--end::Actions-->
        @if (auth()->user()->roles->pluck('name')[0] == 'admin')
        <form id="form-search" action="{{ route('admin.journal.index') }}">
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-2 py-md-1">

                <!--begin::school year-->
                <select name="filter" class="form-select form-select-solid me-5" placeholder="Select an option"
                    data-control="select">
                    <option value="">Semua Sekolah</option>
                    @foreach ($schools as $school)
                        <option {{ $filter == $school->id ? 'selected' : '' }} value="{{ $school->id }}">
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
                <!--end::school yeaer-->
                <!--begin::Button-->
                <button type="submit" class="btn btn-primary">Cari</button>
                <!--end::Button-->
            </div>
        </form>
        @else
        
        @endif
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
                                        @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                            <th>Sekolah</th>
                                        @endif
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Kelas</th>
                                        <th>Deskripsi</th>
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
                                            @if (auth()->user()->roles->pluck('name')[0] == 'admin')
                                                <td>{{ $journal->classroom->school->name }}</td>
                                            @endif
                                            <td>{{ $journal->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($journal->date)->locale('id')->isoFormat('D MMMM YYYY') }}
                                            </td>
                                            <td>{{ $journal->classroom->name }}</td>
                                            <td>
                                                <svg fill="#474761" type="button"
                                                    data-description="{{ $journal->description }}" class="btn-description"
                                                    xmlns="http://www.w3.org/2000/svg" height="30"
                                                    viewBox="0 -960 960 960" width="30">
                                                    <path
                                                        d="M319-250h322v-60H319v60Zm0-170h322v-60H319v60ZM220-80q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm331-554h189L551-820v186Z" />
                                                </svg>
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
    <div class="modal fade" tabindex="-1" id="kt_modal_description">
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
                <div class="modal-body" id="description">
                    <h5></h5>
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
            $('#description').html(description)
            $('#kt_modal_description').modal('show')
        });
    </script>
@endsection
