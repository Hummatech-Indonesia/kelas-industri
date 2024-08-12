@extends('dashboard.admin.layouts.app')

@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Mentor
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List mentor pada kelas industri.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">
            <!--begin::Button-->
            <a href="{{ route('admin.mentors.create') }}" class="btn btn-primary fw-bold">
                Tambah
            </a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatables-responsive">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>No Rekening</th>
                                        <th>Bank</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
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
    <script src="{{ asset('app-assets/js/custom/apps/customers/list/list.js') }}"></script>
    <script src="{{ asset('app-assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/datatables.responsive.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $(document).on('click', '.delete', function() {
                const url = "{{ route('admin.mentors.destroy', ':id') }}".replace(':id', $(this).data(
                'id'));
                $('#form-delete').attr('action', url);
                $('#kt_modal_delete').modal('show');
            });

            // Initialize DataTables
            $("#datatables-responsive").DataTable({
                paging: true,
                pageLength: 10,
                responsive: true,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: "{{ route('admin.mentors.index') }}",
                oLanguage: {
                    sProcessing: 'loading...'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'account_number',
                        name: 'account_number'
                    },
                    {
                        data: 'bank',
                        name: 'bank'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
