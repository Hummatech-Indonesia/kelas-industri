<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Kelas Industri</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="
            The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo,
            Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions.
            Grab your copy now and get life-time updates for free.
        " />
    <meta name="keywords"
        content="
            metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js,
            Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates,
            free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button,
            bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon
        " />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8/demo1/index.html" />
    <link rel="shortcut icon" href="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->



    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('user-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('user-assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    {{--    Plugin Stylesheets --}}
    <link href="{{ asset('user-assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Google tag-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');
    </script>
    <!--end::Google tag-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('/metronic8/demo1/assets/media/auth/bg10.jpeg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('/metronic8/demo1/assets/media/auth/bg10-dark.jpeg');
            }
        </style>
        <!--end::Page bg image-->

        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <!--begin::Image-->
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ asset('app-assets/media/auth/agency.png') }}" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ asset('app-assets/media/auth/agency-dark.png') }}" alt="" />
                    <!--end::Image-->

                    <!--begin::Title-->
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                        Kelas Industri Hummatech
                    </h1>
                    <!--end::Title-->

                    <!--begin::Text-->
                    <div class="text-gray-600 fs-base text-center fw-semibold">
                        Meningkatkan skill guru dan siswa dengan program kelas berbasis industri
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->

            <!--begin::Body-->
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <!--begin::Wrapper-->
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-450px">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                            <!--begin::Form-->
                            <form class="form w-100" action="{{ route('register') }}" method="POST">
                                @csrf
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h1 class="text-gray-900 fw-bolder mb-3">
                                        Register
                                    </h1>
                                    <!--end::Title-->

                                    <!--begin::Subtitle-->
                                    <div class="text-gray-500 fw-semibold fs-6">
                                        Daftar Sebagai Siswa Kelas Indutri Hummatech
                                    </div>
                                    <!--end::Subtitle--->
                                </div>
                                <!--begin::Heading-->
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-5">
                                            <label for="exampleFormControlInput1"
                                                class="required form-label">Nama</label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control form-control-solid @error('name') is-invalid @enderror"
                                                placeholder="Masukkan nama" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-5">
                                            <!--begin::Email-->
                                            <label for="exampleFormControlInput1"
                                                class="required form-label">Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control form-control-solid @error('email') is-invalid @enderror"
                                                placeholder="Masukkan Email" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <!--end::Email-->
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Input group--->
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-5">
                                            <label for="exampleFormControlInput1"
                                                class="required form-label">NISN</label>
                                            <input type="number" name="national_student_id"
                                                value="{{ old('national_student_id') }}"
                                                class="form-control form-control-solid @error('national_student_id') is-invalid @enderror"
                                                placeholder="Masukkan NISN" />
                                            @error('national_student_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-5">
                                            <label for="exampleFormControlInput1" class="required form-label">Tanggal
                                                Lahir</label>
                                            <input type="date" name="date_birth" value="{{ old('date_birth') }}"
                                                class="form-control form-control-solid @error('date_birth') is-invalid @enderror"
                                                placeholder="Example input" />
                                            @error('date_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <label for="exampleFormControlInput1" class="required form-label">Jenis
                                        Kelamin</label>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="male"
                                            id="flexCheckDefault1" name="gender">
                                        <label class="form-check-label @error('gender') is-invalid @enderror"
                                            for="flexCheckDefault1">
                                            Laki - Laki
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="female"
                                            id="flexCheckChecked1" name="gender">
                                        <label class="form-check-label @error('gender') is-invalid @enderror"
                                            for="flexCheckChecked1">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>

                                <div class="form-floating mb-5">
                                    <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Leave a comment here"
                                        id="floatingTextarea2" name="address" style="height: 100px">{{ old('address') }}</textarea>
                                    <label for="floatingTextarea2">Alamat</label>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <label for="exampleFormControlInput1"
                                        class="required form-label @error('school_id') is-invalid @enderror">Sekolah</label>
                                    <select class="form-select form-select-solid" name="school_id"
                                        value="{{ old('school_id') }}" data-control="select2" id="select-school"
                                        data-placeholder="Select an option">
                                    </select>
                                    @error('school_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <label for="exampleFormControlInput1"
                                        class="required form-label @error('classroom_id') is-invalid @enderror">Kelas</label>
                                    <select class="form-select form-select-solid" name="classroom_id"
                                        value="{{ old('classroom_id') }}" data-control="select2"
                                        id="select-classroom" data-placeholder="Select an option">
                                    </select>
                                    @error('classroom_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-10">
                                    <textarea class="form-control @error('motivation') is-invalid @enderror" placeholder="Leave a comment here"
                                        id="floatingTextarea2" name="motivation" style="height: 100px">{{ old('motivation') }}</textarea>
                                    <label for="floatingTextarea2">Motivasi Mengikuti Kelas Industri</label>
                                    @error('motivation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">

                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">
                                            Daftar</span>
                                        <!--end::Indicator label-->

                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">
                                            Please wait... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                        <!--end::Indicator progress--> </button>
                                </div>
                                <!--end::Submit button-->

                                <!--begin::Sign up-->
                                <div class="text-gray-500 text-center fw-semibold fs-6">
                                    Sudah Mempunyai Akun?

                                    <a href="{{ route('login') }}" class="link-primary">
                                        Masuk
                                    </a>
                                </div>
                                <!--end::Sign up-->
                            </form>
                            <!--end::Form-->

                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('user-assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('user-assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('app-assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->

    {{-- Plugin Javascript --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Registrasi berhasil, Silahkan Mungunggu Untuk Mendapat Persetujuan Admin. Terima kasih!!',
            }).then((result) => {
                if (result.isConfirmed || result.isDismissed) {
                    window.location.href = '{{ route('login') }}';
                }
            });
        </script>
    @endif

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
                            var option = '<option value="' + item.id + '">' + item.name +
                                '</option>';
                            $('#select-school').append(option);
                        });
                        getClassroom();
                    },
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
                        $('#select-classroom').html('');
                        $.each(response, function(index, item) {
                            var option = '<option value="' + item.id + '">' + item.name +
                                '</option>';
                            $('#select-classroom').append(option);
                        });
                    }
                });
            }
        });
    </script>

    <!--begin::Javascript-->
    <script src="{{ asset('app-assets/js/scripts.bundle.js') }}"></script>
    <script>
        var hostUrl = "../../../assets/index.html";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="../../../assets/plugins/global/plugins.bundle.js"></script>
    <script src="../../../assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->


    <!--begin::Custom Javascript(used for this page only)-->
    <script src="../../../assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
