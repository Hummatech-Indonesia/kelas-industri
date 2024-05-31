@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Jurnal
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                daftar absensi
            </p>
            <!--end::Breadcrumb-->
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.detailJurnal', $classroom) }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>

    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card card-custom card-sticky">
                    <div class="card-header" style="">

                        <div class="card-title">

                            <h3 class="card-label">

                                Data Absensi Siswa

                            </h3>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table gs-7 gy-7 gx-7">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th class="text-center">Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        @php
                                            $student = $attendance->studentClassroom;
                                        @endphp
                                        <tr>
                                            <td>{{ $student->studentSchool->student->name }}</td>
                                            <td>{{ $student->classroom->name }}</td>
                                            <td class="text-center">
                                                <div
                                                    class="fs-7 badge
                                                            @if ($attendance->attendance == 'hadir') badge badge-light-success
                                                            @elseif($attendance->attendance == 'ijin')badge-light-warning
                                                            @elseif($attendance->attendance == 'sakit')badge badge-light-primary p-3
                                                            @elseif($attendance->attendance == 'alfa')badge-light-danger @endif
                                                            ">
                                                    {{ ucfirst($attendance->attendance) }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <x-delete-modal-component />
    </div>

    <!--end::Page title-->

    <!--begin::Actions-->
    <!--end::Actions-->
@endsection
@section('script')
    <script>
        function handleGetClassrooms() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
                url: '{{ route('admin.report') }}',
                data: {
                    schoolId: $('#schools').val()
                },
                success: function(classrooms) {
                    console.log(classrooms);
                    let html = '';
                    classrooms.map((classroom) => {
                        html +=
                            `<option ${classroom == classroom.id ? 'selected' : ''} value="${classroom.id}">${classroom.name}</option>`;
                    });
                    $('#classrooms').html(html);
                },

            });
        }



        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $('#schools').change(function() {
            handleGetClassrooms()
        })
    </script>
@endsection
