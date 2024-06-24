@extends('dashboard.admin.layouts.app')
@section('content')
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
            <select class="form-select form-select-solid" name="classroom_id" aria-label="Select example"
                value="{{ old('classroom_id') }}" id="select-classroom">
                <option value="">Pilih Kelas</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>

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
                                    <th>Kelas</th>
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

            // Datatables Responsive
            $("#select-classroom").on('change', function() {
                var selectedClassroom = $(this).val();
                var url = "{{ route('school.students.index') }}";

                $("#datatables-responsive").DataTable().ajax.url(url).load();
            });

            $("#datatables-responsive").DataTable({
                paging: true,
                pageLength: 10,
                responsive: true,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: {
                    url: "{{ route('school.students.index') }}",
                    data: function(d) {
                        d.classroom_id = $('#select-classroom').val();
                    }
                },
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
                        data: 'student_classroom.classroom.name',
                        name: 'student_classroom.classroom.name',
                        render: function(data, type, row) {
                            if (row.student_classroom) {
                                return data;
                            } else {
                                return '-';
                            }
                        }
                    }
                ]
            });

        });
    </script>
@endsection
