@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Rolling Teacher
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman rolling teacher
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.rollingTeacher.index', $school) }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <!--end::Actions-->
    </div>
    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-6">
                <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                    <div class="card-header" style="">

                        <div class="card-title">

                            <h3 class="card-label">

                                Kelas

                            </h3>

                        </div>

                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.rollingTeacher.actionRollingTeacher') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <label for="">Kelas</label>
                                        <select name="classroom_id" class="form-select form-select-solid me-5 mt-3"
                                            data-control="select2" data-placeholder="Select an option">
                                            <option value=""></option>
                                            @foreach ($classrooms as $classroom)
                                                <option {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}
                                                    value="{{ $classroom->id }}">{{ $classroom->name }} -
                                                    {{ $classroom->generation->schoolYear->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="teacher_school_id"
                                        value="{{ $teacher->teacherSchool->id }}">
                                    <div class="mt-7 text-end">
                                        <button type="submit" class="btn btn-primary btn-sm" id="add">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-6">
                <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                    <div class="card-header" style="">

                        <div class="card-title">

                            <h3 class="card-label">

                                Kelas Dipilih

                            </h3>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row">
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7 mt-3">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800">
                                        <th data-priority="1">Nama</th>
                                        <th>Sekolah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="t-classrooms">
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        handleGetTeacherClassrooms()

        $(document).on('click', '.delete', function() {
            const url = "{{ route('admin.rollingTeacher.deleteRollingTeacher', ':id') }}".replace(':id', $(this)
                .data('id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        function handleGetTeacherClassrooms() {
            $.ajax({
                method: 'GET',
                url: '{{ route('admin.rollingTeacher.add', $teacher->id) }}',
                success: function(classrooms) {
                    let html = ''

                    classrooms.map(classroom => {
                        html += `<tr>
                                    <td>${classroom.classroom.name} - ${classroom.classroom.generation.school_year.school_year}</td>
                                    <td>${classroom.classroom.school.name}</td>
                                    <td>
                                        <button data-id="${classroom.id}" class="btn btn-light-danger btn-sm delete"><i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>`
                    })

                    $('#t-classrooms').html(html)
                }
            })
        }

        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $('#schools').change(function() {
            handleGetClassrooms()
        })
    </script>
@endsection
