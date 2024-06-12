<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}">
    <title>Kelas Industri</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('landing_kelas_industri/style/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing_kelas_industri/style/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('landing_kelas_industri/style/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing_kelas_industri/style/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('landing_kelas_industri/style/revolution/css/navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing_kelas_industri/style/type/type.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing_kelas_industri/style/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing_kelas_industri/style/css/color/blue.css') }}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    @php
        use Carbon\Carbon;
    @endphp
    <style>
        @import url('https://fonts.cdnfonts.com/css/fontawesome');

        .tz-gallery {
            padding: 40px;
        }

        /* Override bootstrap column paddings */
        .tz-gallery .row>div {
            padding: 2px;
        }

        .tz-gallery .lightbox img {
            width: 100%;
            border-radius: 0;
            position: relative;
        }

        .tz-gallery .lightbox:before {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -13px;
            margin-left: -13px;
            opacity: 0;
            color: #fff;
            font-size: 26px;
            /* font-family: 'inherit'; */
            font-family: 'FontAwesome', sans-serif;
            content: "\f002";
            pointer-events: none;
            z-index: 9000;
            transition: 0.4s;
        }


        .tz-gallery .lightbox:after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            background-color: rgba(46, 132, 206, 0.7);
            content: 'test';
            transition: 0.4s;
        }

        .display-3 {
            margin-top: 60px;
        }

        .tz-gallery .lightbox:hover:after,
        .tz-gallery .lightbox:hover:before {
            opacity: 1;
        }

        .baguetteBox-button {
            background-color: transparent !important;
        }

        @media(max-width: 768px) {
            body {
                padding: 0;
            }
        }

        @media (max-width:639px) {
            #logo {
                width: 60px;
            }

            #logo-2 {
                width: 90px;
            }
        }

        @media (min-width:640px) {
            #logo {
                width: 80px;
            }
        }

        body>div.content-wrapper.white-wrapper>div.wrapper.light-wrapper>div.container.inner>nav>div.d-none.flex-sm-fill.d-sm-flex.align-items-sm-center.justify-content-sm-between>div:nth-child(2)>ul {
            display: flex !important;
        }

        .overlay.overlay1 {
            width: auto;
            height: 220px;
            margin-bottom: 2px;
        }

        .img-figure {
            height: 220px;
            object-fit: cover;
        }

        .post-title {
            word-wrap: break-word;
            height: 60px;
        }

        .box {
            height: 400px;
            margin-bottom: 30px;
        }

        .berita-utama {
            margin-bottom: 30px;
        }

        .img-figure-utama {
            height: 800px;
        }

        .short-description {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            /* Batasi teks ke 2 baris */
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="content-wrapper white-wrapper">
        <nav class="navbar absolute transparent navbar-expand-lg nav-uppercase" id="navbar-example2">
            <div class="container flex-row justify-content-center">
                <div class="navbar-brand"><a href="/"> <img id="logo"
                            src="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}" alt="" /></a>
                </div>
                <div class="navbar-other ml-auto order-lg-3">
                    <ul class="navbar-nav flex-row align-items-center" data-sm-skip="true">
                        <li class="nav-item">
                            <div class="navbar-hamburger d-lg-none d-xl-none ml-auto"><button
                                    class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button>
                            </div>
                        </li>
                        @auth
                            <li class="nav-item d-none d-lg-block pl-0"><a href="{{ route('home') }}"
                                    class="btn btn-default m-0">Beranda</a></li>
                        @else
                            <li class="nav-item d-none d-lg-block pl-0"><a href="{{ route('login') }}"
                                    class="btn btn-default m-0">Masuk</a></li>
                        @endauth
                    </ul>
                    <!-- /.navbar-nav -->
                </div>
                <!-- /.navbar-other -->
                <div class="navbar-collapse offcanvas-nav">
                    <div class="offcanvas-header d-lg-none d-xl-none">
                        <a href="/"><img id="logo-2"
                                src="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}" srcset=""
                                alt="" /></a>
                        <button class="plain offcanvas-close offcanvas-nav-close"><i class="jam jam-close"></i></button>
                    </div>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('landingPage') }}">Beranda</a>
                            <!--/.dropdown-menu -->
                        </li>
                        <li class="dropdown">
                            <a class="nav-link" data-bs-spy="scroll" data-bs-target="#navbar-example2"
                                href="{{ route('landingPage', '#scrollspyHeading1') }}">Kerjasama</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('landingPage', '#3') }}">Informasi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('landingPage', '#4') }}">Fasilitas</a>
                            <!--/.dropdown-menu -->
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                href="{{ route('landingPage', '#5') }}">LMS</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                href="{{ route('landingPage', '#6') }}">Daftar</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                href="{{ route('event') }}">Event</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                href="{{ route('news') }}">Berita</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                href="{{ route('gallery') }}">Galeri</a>
                        </li>
                    </ul>
                    <!-- /.navbar-nav -->
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- /.navbar -->
        <div class="offcanvas-info inverse-text">
            <button class="plain offcanvas-close offcanvas-info-close"><i class="jam jam-close"></i></button>
            <a href="/"><img src="#"
                    srcset="style/images/logo-light.png 1x, style/images/logo-light@2x.png 2x" alt="" /></a>
            <div class="space30"></div>
            <p>Snowlake is a multi-concept and powerful site template contains rich layouts with possibility of
                unlimited combinations & beautiful elements.</p>
            <div class="space20"></div>
            <div class="widget">
                <h5 class="widget-title">Contact Info</h5>
                <address> Moonshine St. 14/05 <br /> Light City, London <div class="space20"></div>
                    <a href="/cdn-cgi/l/email-protection#a7c1ced5d4d389cbc6d4d3e7c2cac6cecb89c4c8ca"
                        class="nocolor"><span class="__cf_email__"
                            data-cfemail="6d04030b022d08000c0401430e0200">[email&#160;protected]</span></a><br /> +00
                    (123) 456 78 90
                </address>
            </div>
            <!-- /.widget -->
            <div class="widget">
                <h3 class="widget-title">Learn More</h3>
                <ul class="list-unstyled">
                    <li><a href="#" class="nocolor">Our Story</a></li>
                    <li><a href="#" class="nocolor">Terms of Use</a></li>
                    <li><a href="#" class="nocolor">Privacy Policy</a></li>
                    <li><a href="#" class="nocolor">Contact Us</a></li>
                </ul>
            </div>
            <!-- /.widget -->
            <div class="widget">
                <h3 class="widget-title">Follow Us</h3>
                <ul class="social social-mute social-s ml-auto">
                    <li><a href="#"><i class="jam jam-twitter"></i></a></li>
                    <li><a href="#"><i class="jam jam-facebook"></i></a></li>
                    <li><a href="#"><i class="jam jam-instagram"></i></a></li>
                    <li><a href="#"><i class="jam jam-vimeo"></i></a></li>
                    <li><a href="#"><i class="jam jam-youtube"></i></a></li>
                </ul>
            </div>
            <!-- /.widget -->
        </div>
        <!--/.modal -->
        <div class="wrapper light-wrapper">
            <div class="container inner pb-10">
                <div class="d-flex justify-content-center">
                    <h1 class="title">Event Kelas Industri Hummatech</h1>
                </div>

            </div>
            <div class="col-12 mt-5">
                <div class="row">
                    <!-- detail -->
                    <div class="col">
                        {{-- <div class="card-body"> --}}
                        <!--begin::About-->
                        <div class="mb-18">
                            <!--begin::Wrapper-->
                            <div class="mb-10">
                                <!--begin::Overlay-->
                                <div class="overlay">
                                    <!--begin::Image-->
                                    <img class="w-100 h-500px card-rounded"
                                        src="{{ asset('storage/' . $event->photo) }}" alt="" style="">
                                    <!--end::Image-->
                                    <!--begin::Links-->
                                    {{-- <div class="overlay-layer card-rounded bg-dark bg-opacity-25" data-event="{{ $event->id }}">
                                @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                    <form action="{{ route('student.events.follow', $event->id) }}" method="POST"
                                        id="form-follow">
                                        @csrf
                                        <button type="button"
                                            class="btn btn-light-primary ms-3 follow-event-btn">Daftar</button>
                                    </form>
                                @endif
                            </div> --}}
                                    <!--end::Links-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Description-->
                            <div class="fs-5 fw-semibold text-gray-600">
                                <h1 class="mb-4">{{ $event->title }}</h1>
                                <!--begin::Text-->
                                <div class="mb-8 fs-20">
                                    {!! $event->description !!}
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::About-->
                        @if ($event->start_date >= Carbon::now())
                            <!--begin::Section-->
                            <div class="mb-16">
                                <!--begin::Top-->
                                <div class="text-center mb-12">
                                    <!--begin::Title-->
                                    <h3 class="fs-2hx text-gray-900 mb-5">Dokumentasi Event</h3>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    {{-- <div class="fs-5 text-muted fw-semibold">
                            Dokumentasi hasil foto
                        </div> --}}
                                    <!--end::Text-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Row-->
                                <div class="owl-carousel">
                                    @foreach ($event->documentations as $documentation)
                                        <div>
                                            <img src="{{ asset('storage/' . $documentation->media) }}" alt=""
                                                class="documentation_image col w-300px m-auto rounded"
                                                data-image="{{ asset('storage/' . $documentation->media) }}">
                                        </div>
                                    @endforeach
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Section-->
                        @endif
                        <!--begin::Team-->
                        <!--end::Team-->
                        <div class="mb-7">
                            <div class="row">
                                <div class="col-1">
                                    <p>Acara</p>
                                </div>
                                <div class="col">: {{ $event->title }}</div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <p>Tanggal</p>
                                </div>
                                <div class="col">:
                                    {{ Carbon::parse($event->start_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <p>Waktu</p>
                                </div>
                                <div class="col">: {{ Carbon::parse($event->start_date)->format('H:m') }}</div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <p>Tempat</p>
                                </div>
                                <div class="col">: {{ $event->location }}</div>
                            </div>
                        </div>

                        {{-- @dd($event->start_date) --}}
                        {{-- @if ($participant && $participant['following'])
                                @if ($event->start_date > now())
                                    <form action="{{ route('student.events.unfollow', $event->id) }}" method="POST"
                                        class="text-end pb-16" id="unfollow-form">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger py-2" id="unfollow-btn">Batal
                                            Mengikuti</button>
                                    </form>
                                @else
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-light-primary py-2">Telah Mengikuti</button>
                                    </div>
                                @endif
                            @elseif($event->start_date > Carbon::now()->locale('id'))
                                <form action="{{ route('student.events.follow', $event->id) }}" method="POST"
                                    class="text-end pb-16" id="follow-form">
                                    @csrf
                                    <button type="button" class="btn btn-primary py-2" id="follow-btn">Ikuti</button>
                                </form>
                            @else
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-light-warning py-2">Telah Dimulai</button>
                                </div>
                            @endif --}}
                        <!--end::Card-->
                        {{-- </div> --}}
                    </div>
                    <!-- other event -->
                    <div class="col col-sm-4 px-4">
                        <div class="row">
                            @foreach ($events as $event)
                                <div class="col p-0 border-bottom">
                                    <div class="card pb-3 border-0 bg-transparent" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset("storage/$event->photo") }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body p-0">
                                                    <a href="{{ route('detail-events', $event->id) }}"
                                                        class="card-title text-dark">
                                                        {{ $event->title }}
                                                    </a>
                                                    <p class="card-text fs-14 short-description">
                                                        {{ $event->description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/column -->
        <div class="space30 d-none d-md-block d-lg-none"></div>
        <!-- /.container -->
        <figure style="margin-bottom:-3px;"><img
                src="{{ asset('landing_kelas_industri/style/images/art/rocket1.png') }}" alt="" />
        </figure>
        <!-- /.wrapper -->
        <footer class="white-wrapper">
            <div class="container">
                <div class="visible-print text-center">
                    {!! QrCode::size(100)->generate('https://class.hummatech.com/') !!}

                    <p>Scan me to return to the original page.</p>
                </div>
                <div class="row">

                    <!-- /column -->
                    <div class="col-md-6 col-lg-3">
                        <!-- /.widget -->
                        <div class="widget">
                            <h3 class="widget-title">Sosial Media</h3>
                            <ul class="social social-mute social-s ml-auto">
                                <li><a href="#"><i class="jam jam-twitter"></i></a></li>
                                <li><a href="#"><i class="jam jam-facebook"></i></a></li>
                                <li><a href="#"><i class="jam jam-instagram"></i></a></li>
                                <li><a href="#"><i class="jam jam-vimeo"></i></a></li>
                                <li><a href="#"><i class="jam jam-youtube"></i></a></li>
                            </ul>
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="widget">
                            <h3 class="widget-title">Alamat Kantor</h3>
                            <address>Perum permata regency 1 blok 10 no 28 ngijo karangploso</address>
                            +62 821 3256 0566

                        </div>

                    </div>
                    <!-- /column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="widget">
                            <h3 class="widget-title">Tentang Perusahaan</h3>
                            <ul class="list-unstyled">
                                <li><a href="https://hummasoft.com/" class="nocolor">Hummasoft</a></li>
                                <li><a href="https://hummasoft.com/kelas-industri/" class="nocolor">Kelas
                                        Industri</a>
                                </li>
                                <li><a href="https://hummasoft.com/course-category/web-development/" class="nocolor">E
                                        Learning</a></li>
                                <li><a href="https://hummasoft.com/pkl/" class="nocolor">Magang / PKL</a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- /column -->

                    <!-- /column -->
                    <div class="col-md-6 col-lg-3">

                        <!-- /.widget -->
                        <div class="widget">
                            <h3 class="widget-title">Butuh Bantuan?</h3>
                            <ul class="list-unstyled">
                                <li><a href="https://wa.me/6282132560566" class="nocolor">Proposal</a></li>
                                <li><a href="https://wa.me/6282132560566" class="nocolor">Kerjasama Industri</a>
                                </li>
                                <li><a href="https://wa.me/6282132560566" class="nocolor">Hubungi Kami</a></li>
                            </ul>
                        </div>
                        <!-- /.widget -->
                    </div>
                    <!-- /column -->
                </div>
                <!--/.row -->
                <div class="space50"></div>
                <p class="text-center">© 2023 Kelas Industri. All rights reserved.</p>
            </div>
            <!-- /.container -->
        </footer>
    </div>

    <!-- /.content-wrapper -->
    <div id="options-nav"></div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script data-cfasync="false"
        src="{{ asset('landing_kelas_industri/demos.elemisthemes.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">
    </script>
    <script src="{{ asset('landing_kelas_industri/style/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing_kelas_industri/style/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing_kelas_industri/style/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing_kelas_industri/style/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('landing_kelas_industri/style/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('landing_kelas_industri/style/revolution/js/extensions/revolution.extension.actions.min.js') }}">
    </script>
    <script
        src="{{ asset('landing_kelas_industri/style/revolution/js/extensions/revolution.extension.carousel.min.js') }}">
    </script>
    <script src="{{ asset('landing_kelas_industri/style/revolution/js/extensions/revolution.extension.kenburn.min.js') }}">
    </script>
    <script
        src="{{ asset('landing_kelas_industri/style/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script
        src="{{ asset('landing_kelas_industri/style/revolution/js/extensions/revolution.extension.migration.min.js') }}">
    </script>
    <script
        src="{{ asset('landing_kelas_industri/style/revolution/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script
        src="{{ asset('landing_kelas_industri/style/revolution/js/extensions/revolution.extension.parallax.min.js') }}">
    </script>
    <script
        src="{{ asset('landing_kelas_industri/style/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script src="{{ asset('landing_kelas_industri/style/revolution/js/extensions/revolution.extension.video.min.js') }}">
    </script>
    <script src="{{ asset('landing_kelas_industri/style/js/plugins.js') }}"></script>
    <script src="{{ asset('landing_kelas_industri/style/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery', {
            captions: function(element) {
                return element.getElementsByTagName('img')[0].alt;
            }
        });
    </script>
</body>

</html>
