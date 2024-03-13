@extends('dashboard.admin.layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Pendaftaran Siswa
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Penerimaan data siswa
            </p>
            <!--end::Breadcrumb-->
        </div>
        <div class="d-flex justify-content-end mb-2">
            <button class="btn btn-primary btn-sm" id="btn-accept-siswa">
                Terima data siswa yang anda pilih
            </button>
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
                    <div class="card-body">
                        <!--begin::Table-->
                        <!--begin::Search Form-->
                        <div class="row">
                            <div class="col-12">
                                <form id="form-search" action="{{ route('admin.studentRegistration') }}" method="GET"
                                    class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" class="form-control form-control-solid form-control-sm"
                                            name="search" placeholder="Cari berdasarkan nama"
                                            value="{{ request('search') }}">
                                    </div>
                                    <div class="col-auto me-auto">
                                        <button class="btn btn-primary btn-sm" type="submit" id="btn-search">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{route('admin.wrongInput')}}" class="btn btn-primary btn-sm" type="submit" id="btn-search">
                                            Ganti Sekolah
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select form-select-solid form-select-sm" name="school_id"
                                            data-control="select2" id="select-school" data-placeholder="Pilih sekolah">
                                            {{-- Options will be populated by Ajax --}}
                                            <option value="null" selected>Semua sekolah</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select form-select-solid form-select-sm" name="classroom_id"
                                            data-control="select2" id="select-classroom" data-placeholder="Pilih kelas">
                                            {{-- Options will be populated by Ajax --}}
                                            <option value="null" selected>Semua kelas</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('admin.studentRegistration') }}"
                                            class="btn btn-primary btn-sm">Reset</a>
                                    </div>
                                </form>
                            </div>
                            <!--end::Search Form-->
                            @if ($users->count() > 0)
                                <table class="table table-striped border rounded gy-5 gs-7" id="table">
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>
                                                <input type="checkbox" class="select-all" id="select-all">
                                            </th>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Sekolah</th>
                                            <th>Kelas</th>
                                            <th>NISN</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="select" name="status[]"
                                                        value="{{ $user->id }}">
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    {{ $user->studentSchool->school->name }}
                                                </td>
                                                <td>
                                                    {{ $user->studentSchool->studentClassroom ? $user->studentSchool->studentClassroom->classroom->name : '-' }}
                                                </td>
                                                <td>
                                                    {{ $user->national_student_id }}
                                                </td>
                                                <td>
                                                    <span type="button"
                                                        class="svg-icon svg-icon-muted svg-icon-2hx btn-detail"
                                                        data-id="{{ $user->id }}" id="btn-detail-{{ $user->id }}"
                                                        data-name="{{ $user->name }}"
                                                        data-school="{{ $user->studentSchool->school->name }}"
                                                        data-classroom="{{ $user->studentSchool->studentClassroom ? $user->studentSchool->studentClassroom->classroom->name : '-' }}"
                                                        data-nisn = "{{ $user->national_student_id }}"
                                                        data-date_birth="{{ \Carbon\Carbon::parse($user->date_birth)->locale('id')->isoFormat('D MMMM YYYY') }}"
                                                        data-gender = "{{ $user->gender == 'male' ? 'Laki - laki' : 'Perempuan' }}"
                                                        data-address = "{{ $user->address }}"
                                                        data-motivation = "{{ $user->motivation }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Detail Data"><svg width="20" height="20"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z"
                                                                fill="currentColor" />
                                                            <path opacity="0.3"
                                                                d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </td>
                                                <td>

                                                    <div class="d-flex">
                                                        <span type="button" data-id="{{ $user->id }}"
                                                            class="svg-icon btn-approve svg-icon-muted svg-icon-2hx"><svg
                                                                width="20" height="20" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                                    height="20" rx="10" fill="currentColor" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                {{ $users->links('pagination::bootstrap-5') }}
                            @else
                                <x-empty-component title="Data Siswa Mendaftar" />
                            @endif
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>

            </div>
            <x-delete-modal-component />
        </div>
        <div class="modal fade" id="modal-approve" tabindex="-1" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-sm" role="document">
                <form id="form-approve" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="exampleModalLabel1">
                                Verifikasi Akun
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Apakah anda yakin ingin menyetujui verifikasi akun ini?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                                data-bs-dismiss="modal">
                                Tutup
                            </button>
                            <button style="background-color: #1B3061" type="submit" class="btn text-white btn-create">
                                Yakin
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" id="modal-detail">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Data Siswa</h4>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="fs-4 fw-bold text-gray-900">Nama</div>
                                <div class="text-gray-800 fw-semibold fs-5 mt-1 mb-2" id="detail-name"></div>
                                <div class="fs-4 fw-bold text-gray-900">Sekolah</div>
                                <div class="text-gray-800 fw-semibold fs-5 mt-1 mb-2" id="detail-school"></div>
                                <div class="fs-4 fw-bold text-gray-900">Kelas</div>
                                <div class="text-gray-800 fw-semibold fs-5 mt-1 mb-2" id="detail-classroom"></div>
                            </div>
                            <div class="col">
                                <div class="fs-4 fw-bold text-gray-900">NISN</div>
                                <div class="text-gray-800 fw-semibold fs-5 mt-1 mb-2" id="detail-nisn"></div>
                                <div class="fs-4 fw-bold text-gray-900">Jenis Kelamin</div>
                                <div class="text-gray-800 fw-semibold fs-5 mt-1 mb-2" id="detail-gender"></div>
                                <div class="fs-4 fw-bold text-gray-900">Tanggal Lahir</div>
                                <div class="text-gray-800 fw-semibold fs-5 mt-1 mb-2" id="detail-date_birth"></div>
                            </div>
                            <div class="fs-4 fw-bold text-gray-900">Alamat</div>
                            <div class="text-gray-800 fw-semibold fs-5 mt-1 mb-2" id="detail-address"></div>
                            <div class="fs-4 fw-bold text-gray-900">Motivasi</div>
                            <div class="text-gray-800 fw-semibold fs-5 mt-1 mb-2" id="detail-motivation"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                var selectedValues = [];

                $(".select").change(function() {
                    selectedValues = [];
                    $(".select:checked").each(function() {
                        selectedValues.push($(this).val());
                    });
                });

                $("#btn-accept-siswa").click(function() {
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: 'Anda akan menerima semua siswa. Tindakan ini tidak bisa dibatalkan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Iya!',
                        cancelButtonText: 'Tidak, batal!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: '{{ route('admin.approveStudentAll') }}',
                                method: 'PATCH',
                                data: {
                                    select: selectedValues,
                                },
                                success: function(response) {
                                    window.location.reload();
                                }
                            });
                            window.location.href = '{{ route('admin.studentRegistration') }}';
                        }
                    });
                });

                // Trigger change event of individual checkboxes when "Select All" is clicked
                $("#select-all").change(function() {
                    $(".select").prop("checked", $(this).prop("checked")).change();
                });

                $(".select").change(function() {
                    if (!$(this).prop("checked")) {
                        $("#select-all").prop("checked", false);
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                getSchool();

                $('#select-school').change(function() {
                    getClassroom();
                });

                function getSchool() {
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('all-school') }}",
                        success: function(response) {
                            $.each(response, function(index, item) {
                                var selectedSchoolId = new URLSearchParams(window.location.search)
                                    .get('school_id');
                                var option = '<option value="' + item.id + '"' + (item.id ===
                                        selectedSchoolId ? ' selected' : '') + '>' + item.name +
                                    '</option>';
                                $('#select-school').append(option);
                            });
                            getClassroom();
                        }
                    });
                }

                function getClassroom() {
                    $.ajax({
                        url: "{{ route('classroomBySchool') }}",
                        type: 'GET',
                        data: {
                            schoolId: $('#select-school').val()
                        },
                        success: function(response) {
                            $.each(response, function(index, item) {
                                var selectedSchoolId = new URLSearchParams(window.location.search)
                                    .get('classroom_id');
                                var option =
                                    '<option value="' + item
                                    .id + '"' + (item.id ===
                                        selectedSchoolId ? ' selected' : '') + '>' + item.name +
                                    '</option>';
                                $('#select-classroom').append(option);
                            });
                        }
                    });
                }
            });
        </script>
        <script>
            $("#kt_datatable_responsive").DataTable({
                responsive: true
            });
        </script>
        <script>
            $('.btn-approve').click(function() {
                id = $(this).data('id')
                var actionUrl = `approve-student/${id}`;
                $('#form-approve').attr('action', actionUrl);
                $('#modal-approve').modal('show')
            })

            $('.btn-detail').click(function() {
                const data = getDataAttributes($(this).attr('id'))
                handleDetail(data)
                $('#modal-detail').modal('show')
            })
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectAllCheckbox = document.querySelector('.select-all');
                selectAllCheckbox.addEventListener('click', function(e) {
                    const allCheckboxes = document.querySelectorAll('tbody .select');
                    allCheckboxes.forEach(function(checkbox) {
                        checkbox.checked = e.target.checked;
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Check if any checkboxes are selected and toggle the button visibility
                function toggleAcceptButton() {
                    let selectedCheckboxes = $(".select:checked").length;
                    if (selectedCheckboxes > 0) {
                        $("#btn-accept-siswa").show();
                    } else {
                        $("#btn-accept-siswa").hide();
                    }
                }

                // Initial check to set the correct visibility of the button
                toggleAcceptButton();

                // Event listener to toggle the button visibility on checkbox change
                $(".select").change(toggleAcceptButton);
            });
        </script>
    @endsection
