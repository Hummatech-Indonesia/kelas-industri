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
                                    Jurnal
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->

                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">

                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        List jurnal pada kelas industri.
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->

                                    <!--end::Item-->

                                    <!--begin::Item-->

                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                    <a href="{{ route('mentor.journal.create') }}"
                                        class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
                                        Buat Jurnal
                                    </a>
                                @else
                                    <a href="{{ route('teacher.journal.create') }}"
                                        class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
                                        Buat Jurnal
                                    </a>
                                @endif

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
                                    @if ($journals->count() > 0)
                                        <table id="kt_datatable_responsive"
                                            class="table table-striped border rounded gy-5 gs-7">
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th data-priority="1">No</th>
                                                    <th data-priority="2">Judul</th>
                                                    <th data-priority="3">Tanggal</th>
                                                    <th data-priority="4">Kelas</th>
                                                    <th data-priority="5">Deskripsi</th>
                                                    <th data-priority="6">Aksi</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                @foreach ($journals as $journal)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $journal->title }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($journal->date)->locale('id')->isoFormat('D MMMM YYYY') }}
                                                        </td>
                                                        <td>{{ $journal->classroom->name }}</td>
                                                        <td>
                                                            <svg fill="#474761" type="button"
                                                                data-description="{{ $journal->description }}"
                                                                class="btn-description" xmlns="http://www.w3.org/2000/svg"
                                                                height="30" viewBox="0 -960 960 960" width="30">
                                                                <path
                                                                    d="M319-250h322v-60H319v60Zm0-170h322v-60H319v60ZM220-80q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm331-554h189L551-820v186Z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                                <a href="{{ Route('mentor.journal.edit', [$journal->id]) }}"
                                                                    class="btn btn-default btn-update btn-sm p-1">
                                                                    <i class="fonticon-setting fs-2 text-warning"></i>
                                                                </a>
                                                                <button class="btn btn-default btn-sm p-1 btn-delete"
                                                                    data-id="{{ $journal->id }}">
                                                                    <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                                                </button>
                                                            @else
                                                                <a href="{{ Route('teacher.journal.edit', [$journal->id]) }}"
                                                                    class="btn btn-default btn-update btn-sm p-1">
                                                                    <i class="fonticon-setting fs-2 text-warning"></i>
                                                                </a>
                                                                <button
                                                                    class="btn btn-default btn-sm p-1 btn-delete-teacher"
                                                                    data-id="{{ $journal->id }}">
                                                                    <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    @else
                                        <x-empty-component title="jurnal" />
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
                    <a href="https://keenthemes.com/" target="_blank" class="text-gray-800 text-hover-primary">Kelas
                        Industri</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item"><a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">Tentang
                            Kami</a></li>

                    <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank"
                            class="menu-link px-2">Syarat & Ketentuan</a></li>

                    <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank"
                            class="menu-link px-2">Kebijakan Privasi</a></li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_scrollable_2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Deskripsi</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                            width="30">
                            <path
                                d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body" id="description">
                    <h5></h5>
                </div>
            </div>
        </div>
    </div>
    <x-delete-modal-component />
    {{--    Update Status --}}
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
            const url = "{{ route('mentor.journal.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('.btn-delete-teacher').click(function() {
            const url = "{{ route('teacher.journal.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('.btn-description').click(function() {
            var description = $(this).data('description')
            $('#description').html(description)
            $('#kt_modal_scrollable_2').modal('show')
        });
    </script>
@endsection
