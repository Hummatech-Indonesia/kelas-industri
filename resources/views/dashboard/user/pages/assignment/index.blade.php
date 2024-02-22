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
                                    Tugas {{ $assignment->title }}
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        Tugas
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>


                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                    <a href="{{ Route('teacher.downloadAll', ['classroom' => $classroom->id, 'assignment' => $assignment->id]) }}"
                                        class="btn-flex btn btn-dark fw-bold btn-sm" id="btn-download-all">
                                        <span class="svg-icon svg-icon-muted svg-icon-1"><svg width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        Download Semua File
                                    </a>
                                @endif
                                <a href="{{ url()->previous() }}"
                                    class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </a>

                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                    <div class="app-container  container-fluid ">
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
                                    <li>Jika anda ingin mengedit nilai siswa, anda bisa langsung mengedit diinputan kolom
                                        yang sudah anda berinilai sebelumnya.
                                    </li>
                                    <li>Setelah selesai edit diinputan anda bisa tekan tombol simpan nilai lagi</li>
                                </ul>
                                <!--end::Content-->

                            </div>
                            <!--end::Wrapper-->
                        </div>
                    </div>
                @endif
                <!--begin::Content container-->

                <div id="kt_app_content_container" class="app-container  container-fluid ">

                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pt-7">
                                    <!--begin::Title-->

                                    <h3 class="card-title align-items-start flex-column">
                                        @if (auth()->user()->roles->pluck('name')[0] == 'teacher' || auth()->user()->roles->pluck('name')[0] == 'mentor')
                                            <span class="card-label fw-bold text-gray-800">Tugas</span>
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Nilai tugas siswa
                                                anda.</span>
                                        @else
                                            <span class="card-label fw-bold text-gray-800">Tugas</span>
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">list tugas anda.</span>
                                        @endif

                                    </h3>

                                    @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                        @if ($status == true)
                                            <div class="my-lg-0 my-1">
                                                <button onclick="BeriNilai()" id="kt_docs_sweetalert_html"
                                                    class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Simpan
                                                    Nilai
                                                </button>
                                            </div>
                                        @endif
                                    @else
                                        <a href="{{ Route('mentor.downloadAll', ['classroom' => $classroom->id, 'assignment' => $assignment->id]) }}"
                                            class="btn-flex btn btn-dark fw-bold btn-sm" id="btn-download-all">
                                            <span class="svg-icon svg-icon-muted svg-icon-1"><svg width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            Download Semua File
                                        </a>
                                    @endif
                                    <!--end::Title-->
                                </div>
                                <div class="card-body">
                                    <form
                                        action="{{ route('teacher.showAssignment', ['classroom' => $classroom->id, 'assignment' => $assignment->id]) }}"
                                        method="get" class="row g-3 align-items-center mb-3">
                                        <div class="col-auto">
                                            <select name="filterShowing" id="filterShowing"
                                                class="form-select form-select-sm">
                                                <option value="10" {{ request('filterShowing') == 10 ? 'selected' : ''}}>10</option>
                                                <option value="15" {{ request('filterShowing') == 15 ? 'selected' : ''}}>15</option>
                                                <option value="35" {{ request('filterShowing') == 35 ? 'selected' : ''}}>35</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-primary btn-sm" type="submit" id="filterShowing">
                                                Filter
                                            </button>
                                        </div>
                                        <div class="col-auto ms-auto">
                                            <input type="text" class="form-control form-control-solid form-control-sm"
                                                name="search" placeholder="Cari siswa...." value="{{ request('search') }}">
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-primary btn-sm" type="submit" id="btn-search">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <table id="" class="table table-striped border rounded gy-5 gs-7">
                                        <thead>
                                            <tr class="fw-semibold fs-6 text-gray-800">
                                                <th data-priority="1">No</th>
                                                <th class="min-w-200px" data-priority="2">Nama</th>
                                                <th class="min-w-100px" data-priority="3">File</th>
                                                <th data-priority="4">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($students as $student)
                                                <tr>
                                                    <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}
                                                    </td>
                                                    <td>{{ $student->name }}</td>
                                                    @if ($student->submitAssignment)
                                                        <td>
                                                            @php
                                                                $filePath = explode('/', $student->submitAssignment->file);
                                                                $fileName = end($filePath);
                                                                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                                                            @endphp
                                                            @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                                @if (in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg']))
                                                                    <button class="btn btn-primary btn-sm btn-img"
                                                                        data-file="{{ asset('storage/' . $student->submitAssignment->file) }}">
                                                                        <span
                                                                            class="svg-icon svg-icon-muted svg-icon-4"><svg
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.3"
                                                                                    d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z"
                                                                                    fill="currentColor" />
                                                                                <path
                                                                                    d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        </span> Gambar</button>
                                                                @else
                                                                    <a href="{{ Route('teacher.downloadAssignment', ['submitAssignment' => $student->submitAssignment->id]) }}"
                                                                        target="_blank"
                                                                        class="btn btn-danger btn-sm btn-download">
                                                                        <span class="svg-icon svg-icon-muted svg-icon-4">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.3"
                                                                                    d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                                                    fill="currentColor" />
                                                                                <path opacity="0.3"
                                                                                    d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z"
                                                                                    fill="currentColor" />
                                                                                <path
                                                                                    d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                        Download </a>
                                                                @endif
                                                            @else
                                                                @if (in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg']))
                                                                    <button class="btn btn-primary btn-sm btn-img"
                                                                        data-file="{{ asset('storage/' . $student->submitAssignment->file) }}">
                                                                        <span
                                                                            class="svg-icon svg-icon-muted svg-icon-4"><svg
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.3"
                                                                                    d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z"
                                                                                    fill="currentColor" />
                                                                                <path
                                                                                    d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        </span> Gambar</button>
                                                                @else
                                                                    <a href="{{ Route('mentor.downloadAssignment', ['submitAssignment' => $student->submitAssignment->id]) }}"
                                                                        target="_blank"
                                                                        class="btn btn-danger btn-sm btn-download">
                                                                        <span class="svg-icon svg-icon-muted svg-icon-4">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.3"
                                                                                    d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                                                    fill="currentColor" />
                                                                                <path opacity="0.3"
                                                                                    d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z"
                                                                                    fill="currentColor" />
                                                                                <path
                                                                                    d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        </span> Download </a>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                            @if ($student->submitAssignment->point)
                                                                <td>
                                                                    <input type="text"
                                                                        data-id="{{ $student->submitAssignment->id }}"
                                                                        value="{{ $student->submitAssignment->point }}"
                                                                        class="form-control form-control-solid input-nilai form-control-lg"
                                                                        placeholder="Nilai">
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <input type="text"
                                                                        data-id="{{ $student->submitAssignment->id }}"
                                                                        value=""
                                                                        class="form-control form-control-solid input-nilai form-control-lg"
                                                                        placeholder="Nilai">
                                                                </td>
                                                            @endif
                                                        @else
                                                            @if ($student->submitAssignment->point)
                                                                <td>{{ $student->submitAssignment->point }}</td>
                                                            @else
                                                                <td>
                                                                    -
                                                                </td>
                                                            @endif
                                                        @endif
                                                    @else
                                                        <td>-</td>
                                                        <td>-</td>
                                                    @endif

                                                </tr>
                                            @empty
                                                <x-empty-component title="tugas" />
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{-- paginate --}}
                                    {{ $students->links('pagination::bootstrap-5') }}
                                    {{-- endpaginate --}}
                                </div>
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
                    <li class="menu-item"><a href="https://keenthemes.com/" target="_blank"
                            class="menu-link px-2">Tentang
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
    <div class="modal fade" tabindex="-1" id="kt_modal_photo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Detail Jawaban</h3>

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
                <div class="modal-body row">
                    <img src="" id="photo" class="col-12" alt="">
                </div>
            </div>
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
        function BeriNilai() {
            var arr_nilai = [];
            var arr_id = [];
            var isAnyFilled = false; // Flag to track if any input is filled

            $('.input-nilai').each(function() {
                var nilai = $(this).val();
                var id = $(this).data('id');
                if (nilai !== '') {
                    arr_nilai.push(nilai);
                    arr_id.push(id);
                    isAnyFilled = true; // Set flag if any input is filled
                }
            });

            if (!isAnyFilled) {
                Swal.fire({
                    title: 'Peringatan!',
                    icon: 'warning',
                    text: 'Minimal satu input nilai harus diisi.'
                });
                return; // Stop execution if no input is filled
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/teacher/storepoint',
                type: 'POST',
                data: {
                    nilai: arr_nilai,
                    id: arr_id,
                },

                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        text: 'Berhasil Memberikan Nilai!'
                    }).then(function() {
                        window.location.reload()
                    })

                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'gagal',
                        icon: 'error',
                        text: xhr.responseText
                    })
                }
            });
        }

        var hasPhoto = $(".btn-img").length > 0;
        var hasFiles = $(".btn-file").length > 0;

        if (!hasPhoto && !hasFiles) {
            $("#btn-download-all").remove();
        }

        $('.btn-img').click(function() {
            var photo = $(this).data('file');
            $('#photo').attr('src', photo);
            $('#kt_modal_photo').modal('show');
        });
    </script>
@endsection
