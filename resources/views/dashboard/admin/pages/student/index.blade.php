@extends('dashboard.admin.layouts.app')
@section('content')
    {{--    modal import --}}
    <div class="modal fade" tabindex="-1" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Import Siswa</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('school.importStudents') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!--begin::Alert-->
                        <div class="alert alert-warning d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                                <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                            fill="currentColor"></path>
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
                                    <li>Jika siswa tidak terimport maka kemungkinan email siswa tersebut telah
                                        digunakan.
                                    </li>
                                    <li>File yang dapat diunggah berupa file excel berekstensi xls, xlsx.</li>
                                    <li>Password siswa secara default adalah <b>password</b></li>
                                    <li>Format pengisian file excel seperti dibawah ini.</li>
                                    <li>
                                        <a href="{{ asset('data-siswa.xlsx') }}" class="btn btn-success btn-sm"><i
                                                class="fas fa-file-excel"></i> Download
                                            Format Excel
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Content-->

                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->

                        <div class="col-12">
                            <label for="">File Excel <span class="text-danger">*</span></label>
                            <input type="file" class="form-control mt-3" name="file">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    end modal import --}}

    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Siswa
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List siswa pada {{ auth()->user()->name }}.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">
            <!--begin::Button-->
            <a href="#" type="button" class="btn btn-success fw-bold me-3" data-bs-toggle="modal"
                data-bs-target="#modal-import">
                Import </a>
            <!--end::Button-->
            <!--begin::Button-->
            <a href="{{ route('school.students.create') }}" class="btn btn-dark fw-bold">
                Tambah </a>
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
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatables-responsive">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
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
    {{--    <script src="{{ asset('app-assets/js/custom/apps/customers/list/export.js') }}"></script> --}}
    <script src="{{ asset('app-assets/js/custom/apps/customers/list/list.js') }}"></script>
    {{--    <script src="{{ asset('app-assets/js/custom/apps/customers/add.js') }}"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $(document).on('click', '.delete', function() {
                const url = "{{ route('school.students.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })

            // Datatables Responsive
            $("#datatables-responsive").DataTable({
                // scrollX: false,
                // sScrollX: false,
                // scrollY: false,
                // scrollCollapse: false,
                paging: true,
                pageLength: 10,
                responsive: true,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: "{{ route('school.students.index') }}",
                oLanguage: {
                    sProcessing: 'loading...'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'student.name',
                        name: 'student.name'
                    },
                    {
                        data: 'student.email',
                        name: 'student.email'
                    },
                    {
                        data: 'student.phone_number',
                        name: 'student.phone_number'
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
