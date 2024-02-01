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
                Approval data siswa
            </p>
            <!--end::Breadcrumb-->
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
                        @if ($users->count() > 0)
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Sekolah</th>
                                        <th>NISN</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Motivasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                {{ $user->studentSchool->school->name }}
                                            </td>
                                            <td>
                                                {{ $user->national_student_id }}
                                            </td>
                                            <td>
                                                {{ $user->gender == 'male' ? 'Laki - laki' : 'Perempuan' }}
                                            </td>
                                            <td>
                                                {{ Carbon::parse($user->date_birth)->locale('id')->isoFormat('D MMMM YYYY') }}
                                            </td>
                                            <td>
                                                {{ $user->address }}
                                            </td>
                                            <td>
                                                {{ $user->motivation }}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <span data-id="{{ $user->id }}" class="svg-icon btn-approve svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="#008000" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#008000"/>
                                                        <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="#008000"/>
                                                        </svg>
                                                        </span>
                                                        <span data-id="{{ $user->id }}" class="svg-icon svg-icon-muted btn-reject svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="#FF0000" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="#FF0000"/>
                                                            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="#FF0000"/>
                                                            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="#FF0000"/>
                                                            </svg>
                                                            </span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

@endsection
@section('script')
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
    </script>
@endsection
