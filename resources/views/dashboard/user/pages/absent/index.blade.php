@php use Carbon\Carbon; @endphp
@extends('dashboard.user.layouts.app')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">


            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-8 ">

                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Absensi
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        @role('mentor')
                                            <a href="{{ route('mentor.attendance.index') }}" class="text-muted text-hover-primary">
                                                Absensi </a>
                                        @endrole
                                        @role('admin')
                                            <a href="{{ route('admin.attendance.index') }}" class="text-muted text-hover-primary">
                                                Absensi </a>
                                        @endrole

                                    </li>
                                    <!--end::Item-->


                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <a href="/mentor/attendance/create" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
                                    Buat Absensi
                                </a>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_content" class="app-container  container-fluid ">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <!--begin::Card body-->
                                <div class="card-body pt-0">

                                    <!--begin::Table-->
                                    @if ($attendances->count() > 0)
                                        <table id="kt_datatable_responsive"
                                            class="table table-striped border rounded gy-5 gs-7">
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th data-priority="1">No</th>
                                                    <th data-priority="2">Judul</th>
                                                    <th data-priority="3">Tanggal</th>
                                                    <th data-priority="4">Link</th>
                                                    <th data-priority="5">Status</th>
                                                    <th data-priority="6" class="text-center ">Aksi</th>

                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                @foreach ($attendances as $attendance)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $attendance->title }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($attendance->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                                                        </td>
                                                        <td>
                                                            <svg fill="#474761" class=" clipboard-link"
                                                                data-link="/{{ $attendance->id }}"
                                                                xmlns="http://www.w3.org/2000/svg" height="24"
                                                                viewBox="0 -960 960 960" width="48">
                                                                <path
                                                                    d="M180-81q-24 0-42-18t-18-42v-603h60v603h474v60H180Zm120-120q-24 0-42-18t-18-42v-560q0-24 18-42t42-18h440q24 0 42 18t18 42v560q0 24-18 42t-42 18H300Zm0-60h440v-560H300v560Zm0 0v-560 560Z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            @if ($attendance->status == 'open')
                                                                <span
                                                                    class="badge badge-light-success">{{ $attendance->status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-light-danger">{{ $attendance->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                @if ($attendance->status == 'open')
                                                                    <button class="btn btn-default btn-update btn-sm p-1"
                                                                        data-id="{{ $attendance->id }}">
                                                                        <i class="text-warning fs-3 bi bi-slash-circle"></i>
                                                                    </button>
                                                                @endif
                                                                <button class="btn btn-default btn-sm p-1 btn-delete"
                                                                    data-id="{{ $attendance->id }}">
                                                                    <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                                                </button>
                                                                <a
                                                                    href="{{ route('mentor.attendance.show', [$attendance->id]) }}">
                                                                    <button class="btn btn-default btn-sm p-1">
                                                                        <i class=" fa fa-eye fs-3 text-primary "></i>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    @else
                                        <x-empty-component title="Absen" />
                                    @endif
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->


        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer ">
            <!--begin::Footer container-->
            <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">{{ Carbon::now()->format('Y') }}©</span>
                    <a href="#" class="text-gray-800 text-hover-primary">Kelas
                        Industri</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item"><a href="#" class="menu-link px-2">Tentang
                            Kami</a></li>

                    <li class="menu-item"><a href="#" class="menu-link px-2">Syarat & Ketentuan</a></li>

                    <li class="menu-item"><a href="#" class="menu-link px-2">Kebijakan Privasi</a></li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
    <x-delete-modal-component />
    {{--    Update Status --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tutup Absen</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="form-update" action="" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menutup absen? siswa tidak akan dapat absen lagi</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Tutup Absen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    end Update Statusl --}}
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $('.btn-delete').click(function() {
            const url = "{{ route('mentor.attendance.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })
        $('.btn-update').click(function() {
            const url = "{{ route('mentor.attendance.update', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-update').attr('action', url)

            $('#kt_modal_update').modal('show')
        })

        $(document).ready(function() {
            $('.clipboard-link').click(function() {
                var link = $(this).attr('data-link');
                var currentURL = window.location.href;
                var baseURL = window.location.protocol + "//" + window.location.hostname;
                const link_absen = baseURL + '/student/absen' + link
                var tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(link_absen).select();
                document.execCommand('copy');
                tempInput.remove();
                Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text: 'Tautan Berhasil Disalin ke clipboard'
                })
                console.log(link_absen)
            });
        });
    </script>
@endsection
