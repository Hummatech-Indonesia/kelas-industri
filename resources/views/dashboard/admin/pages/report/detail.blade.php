@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Laporan
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                daftar nilai rata-rata siswa pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ url()->previous() }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        @if ($reports->count() > 0)
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th data-priority="1">No</th>
                                        <th data-priority="2">Nama</th>
                                        <th data-priority="3">Nilai Tugas</th>
                                        <th data-priority="4">Point Tantangan</th>
                                        <th data-priority="5">Nilai UAS</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($reports as $report)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $report->student->name }}</td>
                                                @php
                                                $point = $report->point / $totalAssignment[array_search($report->student->studentSchool->studentClassroom->classroom->generation_id, $totalAssignment->pluck('id')->toArray())]->total_assignments;
                                            @endphp
                                            <td>{{ round($point, 1) }}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        @else
                            <x-empty-component title="laporan" />
                        @endif
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
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
