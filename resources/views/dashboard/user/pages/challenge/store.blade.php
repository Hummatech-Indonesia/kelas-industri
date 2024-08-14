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
                                    Tantangan
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="#" class="text-muted text-hover-primary">
                                            Tantangan </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('student.challenges.show', request()->challenge->id) }}" class="text-muted text-hover-primary">
                                            {{ request()->challenge->title }} </a>
                                    </li>
                                    
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="#" class="text-muted text-hover-primary">
                                            Kumpulkan </a>
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                @if ($submitChallenge)
                                    <a href="{{ Route('student.downloadChallenge', ['submitChallenge' => $submitChallenge->id]) }}"
                                        class="btn btn-dark fw-bold btn-sm">
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
                                        Download File Challenge Anda
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

                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    @if ($errors->any())
                        <x-errors-component />
                    @endif
                    <div class="row">

                        <form action="" id="form-store" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="col-12">

                                <input type="hidden" name="challenge_id" value="{{ $challenge->id }}">

                                <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                                    <div class="card-header" style="">

                                        <div class="card-title">

                                            <h3 class="card-label">

                                                Silakan Isi Tantangan

                                            </h3>

                                        </div>

                                        <div class="card-toolbar">

                                            <a href="{{ route('student.challenges.show', ['challenge' => $challenge]) }}"
                                                class="btn btn-light-primary font-weight-bolder me-2">

                                                <i class="ki ki-long-arrow-back icon-sm"></i>

                                                Kembali

                                            </a>

                                            @if ($challenge->end_date > now())
                                                <div class="btn-group">

                                                    <button type="submit" class="btn btn-primary font-weight-bolder">

                                                        <i class="ki ki-check icon-sm"></i>

                                                        Simpan

                                                    </button>

                                                </div>
                                            @endif

                                        </div>

                                    </div>

                                    <div class="card-body">

                                        <div class="row">
                                            @if ($challenge->end_date > now())
                                                <div class="form-grup row mb-3">

                                                    <div class="alert alert-danger d-flex align-items-center p-5">
                                                        <!--begin::Icon-->
                                                        <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                                                            <span class="svg-icon svg-icon-2hx svg-icon-danger me-4"><svg
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.3" x="2" y="2" width="20"
                                                                        height="20" rx="10" fill="currentColor" />
                                                                    <rect x="11" y="14" width="7" height="2"
                                                                        rx="1" transform="rotate(-90 11 14)"
                                                                        fill="currentColor" />
                                                                    <rect x="11" y="17" width="2" height="2"
                                                                        rx="1" transform="rotate(-90 11 17)"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        </span>
                                                        <!--end::Icon-->

                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-column">
                                                            <!--begin::Title-->
                                                            <h4 class="mb-1 text-dark">Peringatan</h4>
                                                            <!--end::Title-->
                                                            <!--begin::Content-->
                                                            <ul>
                                                                <li>
                                                                    Pastikan Challenge Anda Sudah Ada Dengan MenDownloadnya
                                                                    Jika Sudah Ada Maka Bisa DiDownload Jika Tidak Maka
                                                                    Inputkan Kembali Challenge Anda
                                                                </li>
                                                            </ul>
                                                            <!--end::Content-->

                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                </div>
                                                <div class="form-grup row mb-3">
                                                    <div class="alert alert-warning d-flex align-items-center p-5">
                                                        <!--begin::Icon-->
                                                        <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                                                            <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                                <li>Jika anda mengupload file tantangan baru maka file
                                                                    tantangan
                                                                    lama akan terhapus.
                                                                </li>
                                                                <li>File yang tersedia adalah file yang telah dikirim.</li>
                                                                <li>Jika file belum tersedia maka anda belum mengumpulkan
                                                                    tantangan.</li>
                                                                <li>File yang diinputkan harus ekstensi rar/zip atau png,
                                                                    jpg, jpeg.</li>
                                                                <li>Kolom link diisi dengan link repository github tugas anda (opsional)</li>
                                                            </ul>
                                                            <!--end::Content-->

                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">

                                                    <label class="col-xl-3 col-lg-3 col-form-label">File Tugas : </label>

                                                    <div class="col-lg-9 col-xl-9">

                                                        <input class="form-control form-control-solid form-control-lg"
                                                            name="file" type="file" value=""
                                                            placeholder="password" required="">

                                                    </div>

                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                        role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 0%"></div>
                                                </div>
                                            @else
                                                <div class="col-12 text-center">
                                                    <!--begin::Illustration-->
                                                    <img src="{{ asset('user-assets/media/misc/watch.svg') }}"
                                                        class="h-150px" alt="" />
                                                    <!--end::Illustration-->

                                                    <!--begin::Title-->
                                                    <h4 class="fw-bold text-gray-900 my-4">Ups ! Challenge Sudah Ditutup
                                                    </h4>
                                                    <!--end::Title-->

                                                    <!--begin::Desctiption-->
                                                    <span class="fw-semibold text-gray-700 mb-4 d-block">
                                                        Challenge sudah ditutup, anda bisa download tugas anda jika
                                                        tersedia, jika tidak berarti anda belum mengumpulkan
                                                    </span>
                                                    <!--end::Desctiption-->
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </form>
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
                    <span class="text-muted fw-semibold me-1">{{ \Carbon\Carbon::now()->format('Y') }}©</span>
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
@endsection
@section('script')
    <script>
        function updateProgressBar(percentage, colorClass) {
            const progressBar = $(".progress-bar");
            progressBar.attr("aria-valuenow", percentage);
            progressBar.css("width", percentage + "%");
            progressBar.removeClass("bg-success bg-danger");
            progressBar.addClass(colorClass);
        }

        $('#form-store').submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                url: "/student/storeChallenge",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: function() {
                    const xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            const percentComplete = (evt.loaded / evt.total) * 100;
                            updateProgressBar(percentComplete, "bg-info");
                        }
                    }, false);
                    return xhr;
                },
                success: function(response) {
                    updateProgressBar(100, "bg-success");
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        text: 'Berhasil Mengirim Challenge',

                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(response) {
                    updateProgressBar(100, "bg-danger");
                    Swal.fire({
                        title: 'Error!',
                        icon: 'error',
                        text: 'Data tidak cocok!',
                    }).then(function() {
                        location.reload();
                    });
                }
            });
        });
    </script>
@endsection
