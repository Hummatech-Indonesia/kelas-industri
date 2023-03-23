@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Rolling Mentor
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman rolling mentor
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

        </div>
        <!--end::Actions-->
    </div>
    @if($errors->any())
        <x-errors-component/>
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
                        <form action="{{ route('admin.rollingMentor.actionRollingMentor') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <label for="">Sekolah</label>
                                        <select name="generation_id" class="form-select form-select-solid me-5 mt-3"
                                                data-control="select2" data-placeholder="Select an option" id="schools">
                                            <option value=""></option>
                                            @foreach($schools as $school)
                                                <option
                                                    {{ (old('school_id') == $school->id) ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">
                                    <div class="mt-3">
                                        <label for="">Kelas</label>
                                        <select name="classroom_id" class="form-select form-select-solid me-5 mt-3"
                                                data-control="select2" data-placeholder="Select an option"
                                                id="classrooms">
                                            <option value=""></option>
                                        </select>
                                    </div>
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
                            <table id="kt_datatable_responsive"
                                   class="table table-striped border rounded gy-5 gs-7 mt-3">
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
    <x-delete-modal-component/>
@endsection
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        handleGetMentorClassrooms()

        $(document).on('click', '.delete', function () {
            const url = "{{ route('admin.rollingMentor.deleteRollingMentor', ':id') }}".replace(':id', $(this).data('id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        function handleGetMentorClassrooms() {
            $.ajax({
                method: 'GET',
                url: '{{ route('admin.rollingMentor.add', $mentor->id) }}',
                success: function (classrooms) {
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

        function handleGetClassrooms() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: '{{ route("admin.rollingMentor.getClassrooms") }}',
                data: {schoolId: $('#schools').val()},
                success: function (classrooms) {
                    let html = ''

                    classrooms.map((classroom) => {
                        html += `<option value="${classroom.id}">${classroom.name}</option>`
                    })

                    $('#classrooms').html(html)
                }
            })
        }

        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $('#schools').change(function () {
            handleGetClassrooms()
        })
    </script>
@endsection
