@php
    use App\Models\StudentSubmaterialExam;
    if (Auth::check() && auth()->user()->roles->pluck('name')[0] == 'tester') {
        $exam = StudentSubmaterialExam::whereRelation('subMaterialExam', function ($q) {
            $q->where('school_id', auth()->user()->studentSchool->school_id);
        })->first();
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 May 2023 15:13:07 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:description" content="Improve your skill with hummatech internship.">
    <meta property="og:image" content="https://i.postimg.cc/J0TFcfkC/Logo-Kelas-Industri.png" style="width: 50%;">
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
    <Style>
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
    </Style>
</head>

<body>
    <div class="content-wrapper">
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
                            @if (auth()->user()->roles->pluck('name')[0] == 'tester')
                                @if ($exam)
                                    <li class="nav-item d-none d-lg-block pl-0"><a
                                            href="{{ route('tester.exam', $exam->sub_material_exam_id) }}"
                                            class="btn btn-default m-0">Masuk</a></li>
                                @endif
                            @else
                                <li class="nav-item d-none d-lg-block pl-0"><a href="{{ route('home') }}"
                                        class="btn btn-default m-0">Beranda</a></li>
                            @endif
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
                        <a href=""><img id="logo-2"
                                src="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}" srcset=""
                                alt="" /></a>
                        <button class="plain offcanvas-close offcanvas-nav-close"><i class="jam jam-close"></i></button>
                    </div>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="">Beranda</a>
                            <!--/.dropdown-menu -->
                        </li>
                        <li class="dropdown">
                            <a class="nav-link" data-bs-spy="scroll" data-bs-target="#navbar-example2"
                                href="#scrollspyHeading1">Kerjasama</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#3">Informasi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#4">Fasilitas</a>
                            <!--/.dropdown-menu -->
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#5">LMS</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#6">Daftar<a>
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
            <a href=""><img src="#"
                    srcset="style/images/logo-light.png 1x, style/images/logo-light@2x.png 2x" alt="" /></a>
            <div class="space30"></div>
            <p>Snowlake is a multi-concept and powerful site template contains rich layouts with possibility of
                unlimited
                combinations & beautiful elements.</p>
            <div class="space20"></div>
            <div class="widget">
                <h5 class="widget-title">Contact Info</h5>
                <address> Moonshine St. 14/05 <br /> Light City, London <div class="space20"></div>
                    <a href="https://demos.elemisthemes.com/cdn-cgi/l/email-protection#22444b5051560c4e43515662474f434b4e0c414d4f"
                        class="nocolor"><span class="__cf_email__"
                            data-cfemail="d7beb9b1b897b2bab6bebbf9b4b8ba">[email&#160;protected]</span></a><br /> +00
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
        <!-- /.offcanvas-info -->
        <div class="wrapper bg-opacity-default">
            <div class="rev_slider_wrapper fullwidth-container dark-spinner">
                <div id="slider7" class="rev_slider fullwidthbanner" data-version="5.4.7">
                    <ul>
                        <li data-transition="fade" data-thumb=""><img
                                src="{{ asset('landing_kelas_industri/style/images/dummy.png') }}"
                                style="background:transparent" alt="" />
                            <div class="tp-caption" data-x="['center','center','center','center']"
                                data-y="['bottom','bottom','bottom','bottom']" data-hoffset="['0','0','0','0']"
                                data-voffset="['-2','-2','-2','-2']"
                                data-frames='[{"delay":0,"speed":1200,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                data-visibility="['on','on','on','on']" data-width="none" data-height="none"
                                data-type="image" data-responsive="on" data-responsive_offset="on"
                                data-basealign="slide" style="z-index: 5;"><img data-lazyload=""
                                    src="{{ asset('landing_kelas_industri/style/images/art/rocket1.png') }}"
                                    data-ww="['100%','100%','100%','100%']" data-hh="auto" alt="" />
                            </div>
                            <!-- /.tp-caption -->
                            <div class="tp-caption" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-hoffset="['260','260','260','260']" data-voffset="['60','60','60','60']"
                                data-frames='[{"delay":600,"speed":1200,"frame":"0","from":"y:bottom;rX:90deg;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-visibility="['on','on','on','off']" data-width="none" data-height="none"
                                data-type="image" data-responsive="on" data-responsive_offset="on"
                                data-basealign="slide" style="z-index: 5;"><img data-lazyload=""
                                    src="{{ asset('landing_kelas_industri/style/images/art/rocket2.png') }} "
                                    data-ww="['220','220','220','220']" data-hh="auto" alt="" />
                            </div>
                            <!-- /.tp-caption -->
                            <div class="tp-caption" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-hoffset="['260','260','260','260']" data-voffset="['-170','-170','-170','-170']"
                                data-frames='[{"delay":0,"speed":1200,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                data-visibility="['on','on','on','off']" data-width="none" data-height="none"
                                data-type="image" data-responsive="on" data-responsive_offset="on"
                                data-basealign="slide" style="z-index: 6;"><img data-lazyload=""
                                    src="{{ asset('landing_kelas_industri/style/images/art/rocket3.png') }}"
                                    data-ww="['380','380','380','380']" data-hh="auto" alt="" />
                            </div>
                            <!-- /.tp-caption -->
                            <div class="tp-caption" data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-hoffset="['300','300','300','300']" data-voffset="['70','70','70','70']"
                                data-frames='[{"delay":0,"speed":1200,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                data-visibility="['on','on','on','off']" data-width="none" data-height="none"
                                data-type="image" data-responsive="on" data-responsive_offset="on"
                                data-basealign="slide" style="z-index: 5;"><img data-lazyload=""
                                    src="{{ asset('landing_kelas_industri/style/images/art/rocket4.png') }}"
                                    data-ww="['480','480','480','480']" data-hh="auto" alt="" />
                            </div>
                            <!-- /.tp-caption -->
                            <div class="tp-caption font-weight-500 color-dark"
                                data-x="['left','left','left','center']" data-y="middle"
                                data-hoffset="['50','30','30','0']" data-voffset="['-125','-125','-125','-105']"
                                data-fontsize="['40','40','34','36']" data-lineheight="['50','50','44','46']"
                                data-width="['500','500','420','340']"
                                data-textAlign="['left','left','left','center']"
                                data-whitespace="['normal','normal','normal','normal']"
                                data-frames='[{"delay":1000,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                data-responsive="on" data-responsive_offset="on" style="z-index: 9;">Selamat Datang
                                di Kelas Industri Hummatech
                            </div>
                            <!-- /.tp-caption -->
                            <div class="tp-caption font-weight-300 color-dark"
                                data-x="['left','left','left','center']" data-y="middle"
                                data-hoffset="['50','30','30','0']" data-voffset="['-20','-20','-20','30']"
                                data-fontsize="['26','26','22','24']" data-lineheight="['36','36','32','34']"
                                data-width="['500','500','420','340']"
                                data-textAlign="['left','left','left','center']"
                                data-whitespace="['normal','normal','normal','normal']"
                                data-frames='[{"delay":1500,"speed":1200,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                data-responsive="on" data-responsive_offset="on" style="z-index: 9;">Meningkatkan
                                skill guru dan siswa dengan program kelas berbasis Industri.

                            </div>
                            <!-- /.tp-caption -->
                            @auth
                                @if (auth()->user()->roles->pluck('name')[0] == 'tester')
                                    @if ($exam)
                                        <a class="tp-caption btn btn-l btn-default"
                                            data-x="['left','left','left','center']" data-y="middle"
                                            data-hoffset="['50','30','30','0']" data-voffset="['75','75','75','135']"
                                            data-width="['auto','auto','auto','auto']"
                                            data-textAlign="['left','left','left','center']"
                                            data-frames='[{"delay":2000,"speed":1200,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-responsive="on" data-responsive_offset="on" style="z-index: 9;"
                                            href="{{ route('tester.exam', $exam->sub_material_exam_id) }}">Masuk
                                        </a>
                                    @endif
                                @else
                                    <a class="tp-caption btn btn-l btn-default" data-x="['left','left','left','center']"
                                        data-y="middle" data-hoffset="['50','30','30','0']"
                                        data-voffset="['75','75','75','135']" data-width="['auto','auto','auto','auto']"
                                        data-textAlign="['left','left','left','center']"
                                        data-frames='[{"delay":2000,"speed":1200,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                        data-responsive="on" data-responsive_offset="on" style="z-index: 9;"
                                        href="{{ route('home') }}">Beranda
                                    </a>
                                @endif
                            @else
                                <a class="tp-caption btn btn-l btn-default" data-x="['left','left','left','center']"
                                    data-y="middle" data-hoffset="['50','30','30','0']"
                                    data-voffset="['75','75','75','135']" data-width="['auto','auto','auto','auto']"
                                    data-textAlign="['left','left','left','center']"
                                    data-frames='[{"delay":2000,"speed":1200,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-responsive="on" data-responsive_offset="on" style="z-index: 9;"
                                    href="{{ route('login') }}">Masuk
                                </a>
                            @endauth

                            <!-- /.tp-caption -->
                        </li>
                    </ul>
                    <div class="tp-bannertimer tp-bottom"></div>
                </div>
                <!-- /.rev_slider -->
            </div>
            <!-- /.rev_slider_wrapper -->
        </div>
        <!-- /.wrapper -->
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
            data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
            <div class="wrapper white-wrapper" id="scrollspyHeading1">
                <div class="container inner pt-100">
                    <h2 class="title-color color-gray text-center"> Kelas Industri Hummatech</h2>
                    <h2 class="display-3 text-center">Statistik Program Kelas industri </h2>
                    <div class="space40"></div>
                    <div class="row text-center gutter-60 ">
                        <div class="col-md-6 col-lg-3">
                            <div class="icon icon-blob icon-blob-rose color-rose mb-20"> <i
                                    class="icofont-university"></i>
                            </div>
                            <h5>Sekolah</h5>
                            <p>Total <span
                                    style="font-weight: 600; color:black; font-size:16px;">{{ $school }}</span>
                                Sekolah Yang Tergabung Dalam Kelas Industri
                            </p>
                        </div>
                        <!--/column -->
                        <div class="col-md-6 col-lg-3">
                            <div class="icon icon-blob icon-blob-blue color-blue mb-20"> <i
                                    class="icofont-book-alt
                                "></i>
                            </div>
                            <h5>Materi</h5>
                            <p>Terdapat <span
                                    style="font-weight: 600; color:black; font-size:16px;">{{ $material }}</span>
                                Materi Yang Tersedia Pada Kelas Industri
                            </p>
                        </div>
                        <!--/column -->
                        <div class="space30 d-none d-md-block d-lg-none"></div>
                        <div class="col-md-6 col-lg-3">
                            <div class="icon icon-blob icon-blob-green color-green mb-20"> <i
                                    class="icofont-black-board"></i> </div>
                            <h5>Kelas</h5>
                            <p>Ada <span
                                    style="font-weight: 600; color:black; font-size:16px;">{{ $classroom }}</span>
                                Kelas Yang Terdaftar Pada Kelas Industri.
                            </p>
                        </div>
                        <!--/column -->
                        <div class="col-md-6 col-lg-3">
                            <div class="icon icon-blob icon-blob-purple color-purple mb-20"><i
                                    class="icofont-group-students"></i> </div>
                            <h5>Siswa</h5>
                            <p>Total <span
                                    style="font-weight: 600; color:black; font-size:16px;">{{ $student }}</span>
                                Siswa Yang Telah Bergabung Dalam Kelas Industri
                            </p>
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                    <div class="space140" id="3"></div>
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <figure><img src="#"
                                    srcset="{{ asset('landing_kelas_industri/style/images/concept/concept8.png') }}"
                                    alt="" /></figure>
                        </div>
                        <!--/column -->
                        <div class="space20 d-md-none"></div>
                        <div class="space50 d-none d-md-block d-lg-none"></div>
                        <div class="col-lg-6 pl-60 pl-md-15">
                            <h2 class="title-color color-gray">Manfaat Kelas Industri?</h2>
                            <h3 class="display-3">Program Kelas industri didesain untuk meningkatkan kemampuan siswa
                            </h3>
                            <div class="space20"></div>
                            <p>Materi Kelas industri akan di pelajari selama 3 tahun , dan diawali dengan kelas x dan xi
                                dan xxi dengan ini materi akan lebih maksimal diterima. adapun Kelas Industri yang telah
                                tersedia saat ini adalah</p>
                            <ul class="icon-list bullet-default">
                                <li><i class="icofont-verification-check"></i>PPLG (Pengembangan Perangkat Lunak dan
                                    Game)</li>
                                <li><i class="icofont-verification-check"></i>DKV (Desain Komunikasi Visual).</li>
                                <li><i class="icofont-verification-check"></i>GAME (Pengembangan Game).</li>
                                <li><i class="icofont-verification-check"></i>TJKT (Teknik Jaringan Komputer dan
                                    Telekomunikasi).</li>
                            </ul>
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                    <div class="space140" id="4"></div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-lg-2">
                            <figure><img src="#"
                                    srcset="{{ asset('landing_kelas_industri/style/images/concept/concept1.png') }}"
                                    alt="" /></figure>
                        </div>
                        <!--/column -->
                        <div class="space20 d-md-none"></div>
                        <div class="space50 d-none d-md-block d-lg-none"></div>
                        <div class="col-lg-6 pr-60 pr-md-15">
                            <h2 class="title-color color-gray">Manfaat Sekolah</h2>
                            <h3 class="display-3">Manfaat yang akan didapatkan sekolah ketika mengikuti kelas industri.
                            </h3>
                            <div class="space30"></div>
                            <div class="d-flex flex-row justify-content-center">
                                <div>
                                    <span class="icon icon-blob icon-blob-blue color-blue mr-25"><i
                                            class="jam jam-lightbulb"></i><span class="step bg-blue">1</span></span>
                                </div>
                                <div>
                                    <h5>Mitra Industri</h5>
                                    <p class="mb-0">Memiliki kerjasama dengan CV. Hummatech Technology dan menjadikan
                                        mitra industri.</p>
                                </div>
                            </div>
                            <div class="space30"></div>
                            <div class="d-flex flex-row justify-content-center">
                                <div>
                                    <span class="icon icon-blob icon-blob-teal color-teal mr-25"><i
                                            class="jam jam-search-folder"></i><span
                                            class="step bg-teal">2</span></span>
                                </div>
                                <div>
                                    <h5>Business Center</h5>
                                    <p class="mb-0">Mengaktifkan Bussiness Center Sekolah dibidang pengembangan
                                        perangkat lunak.</p>
                                </div>
                            </div>
                            <div class="space30"></div>
                            <div class="d-flex flex-row justify-content-left">
                                <div>
                                    <span class="icon icon-blob icon-blob-yellow color-yellow mr-25"><i
                                            class="jam jam-heart"></i><span class="step bg-yellow">3</span></span>
                                </div>
                                <div>
                                    <h5>Akreditasi</h5>
                                    <p class="mb-0">Menambah poin akreditasi sekolah.</p>
                                </div>
                            </div>
                            <div class="space30"></div>
                            <div class="d-flex flex-row justify-content-left">
                                <div>
                                    <span class="icon icon-blob icon-blob-green color-green mr-25"><i
                                            class="icofont-black-board"></i><span
                                            class="step bg-yellow">4</span></span>
                                </div>
                                <div>
                                    <h5>Kerja</h5>
                                    <p class="mb-0">Peningkatan keterserapan lulusan sesuai kebutuhan industri.</p>
                                </div>
                            </div>
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                    <div class="space140" id="5"></div>
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <figure><img src="#"
                                    srcset="{{ asset('landing_kelas_industri/style/images/concept/concept3.png') }}"
                                    alt="" /></figure>
                        </div>
                        <!--/column -->
                        <div class="space20 d-md-none"></div>
                        <div class="space50 d-none d-md-block d-lg-none"></div>
                        <div class="col-lg-6 pl-60 pl-md-15 order-lg-2">
                            <h2 class="title-color color-gray">Teknologi</h2>
                            <h3 class="display-3">Kelas Industri meggunakan sistem LMS sendiri</h3>
                            <div class="space20"></div>
                            <p>Menggunakan smart classroom sebagai pendukung dalam meningkatkan daya serap dalam proses
                                kegiatan belajar mengajar (KBM)..</p>
                            <ul class="icon-list bullet-default">
                                <li><i class="icofont-verification-check"></i>Melakukan sinkronisasi kurikulum berbasis
                                    industri.</li>
                                <li><i class="icofont-verification-check"></i>Menerima guru magang.</li>
                                <li><i class="icofont-verification-check"></i>Menerima siswa magang / Praktik Kerja
                                    Lapangan (PKL).</li>
                                <li><i class="icofont-verification-check"></i>Mengadakan rekruitmen kerja untuk lulusan
                                    SMK jurusan rekayasa perangkat lunak.</li>
                            </ul>
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.wrapper -->
            <div class="wrapper light-wrapper" id="6">
                <div class="container inner">
                    <h2 class="title-color color-gray text-center">Kerjasama Kelas Industri</h2>
                    <h3 class="display-3 text-center">MOU Dengan Sekolah</h3>
                    <div class="space20"></div>
                    <div class="grid-view">
                        <div class="wrapper light-wrapper">
                            <div class="carousel owl-carousel clients" data-margin="30" data-loop="true"
                                data-dots="false" data-autoplay="true" data-autoplay-timeout="3000"
                                data-responsive='{"0":{"items": "2"}, "768":{"items": "4"}, "992":{"items": "5"}, "1140":{"items": "6"}}'>
                                @forelse ($MOUS as $MOU)
                                    <div class="item pl-15 pr-15"><img src="{{ asset('storage/' . $MOU->photo) }}"
                                            alt="" /></div>
                                @empty
                                @endforelse
                            </div>
                            <!-- /.owl-carousel -->
                        </div>
                        <!-- /.grid-view -->
                        <div class="space160"></div>
                        <div class="row">
                            <div class="col-lg-5 pr-50 pr-md-15">
                                <h2 class="title-color color-gray">Join Kelas industri?</h2>
                                <h3 class="display-3">Kami membuka kerja sama kelas industri kepada sekolah yang
                                    membutuhkan.</h3>
                                <div class="space20"></div>
                                <p>Untuk Paket Kelas inudstri ada 2 paket yaitu paket basic dan profesional yang dimana
                                    tiap paket kelas industri sudah disesuaikan dengan kebutuhan dari siswa sampai
                                    dengan materi yang disampaikan.</p>
                            </div>
                            <!--/column -->
                            <div class="space70 d-none d-md-block d-lg-none"></div>
                            <div class="space20 d-md-none"></div>
                            <div class="col-lg-7">
                                <div class="pricing-wrapper">
                                    <div class="row no-gutters">
                                        <div class="col-md-6 popular">
                                            <div class="pricing panel box bg-white shadow">
                                                <div class="panel-heading">

                                                    <h4 class="panel-title mb-0">Paket Basic</h4>
                                                </div>
                                                <!--/.panel-heading -->
                                                <div class="panel-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td><strong>20</strong> Minimum peserta </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sertifikat Kelas Industri </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gratis LMS </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Materi Sesuai Industri</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Kelas Tambahan</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Guru Tersertifikasi</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Label Lab Menarik</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Kunjungan awal dan akhir Semester.</td>
                                                        </tr>
                                                        <tr>
                                                            <td> 7/24 <strong>Konsultasi</strong></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--/.panel-body -->
                                                <div class="panel-footer"> <a href="https://wa.me/6282132560566"
                                                        class="btn" role="button">Hubungi Kami</a></div>
                                            </div>
                                            <!--/.pricing -->
                                        </div>
                                        <!--/column -->
                                        <div class="col-md-6">
                                            <div class="pricing panel box bg-white shadow">
                                                <div class="panel-heading">

                                                    <h4 class="panel-title mb-0">Paket Profesiional</h4>
                                                </div>
                                                <!--/.panel-heading -->
                                                <div class="panel-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td><strong>20</strong> Minimum peserta </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sertifikat Kelas Industri </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gratis LMS </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Materi Sesuai Industri</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Kelas Tambahan</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Guru Tersertifikasi</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Akses modul pembelajaran</td>
                                                        </tr>
                                                        <tr>
                                                            <td> gadget penunjang (laptop/hp)</td>
                                                        </tr>
                                                        <tr>
                                                            <td> modul dan pelatihan coding tambahan</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Kunjungan di akhir bulan.</td>
                                                        </tr>
                                                        <tr>
                                                            <td> 7/24 <strong>Konsultasi</strong></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--/.panel-body -->
                                                <div class="panel-footer"> <a href="https://wa.me/6282132560566"
                                                        class="btn" role="button">Hubungi Kami</a></div>
                                            </div>
                                            <!--/.pricing -->
                                        </div>
                                        <!--/column -->
                                    </div>
                                    <!--/.row -->
                                </div>
                                <!--/.pricing-wrapper -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                        <div class="space140"></div>
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <figure><img src="#"
                                        srcset="{{ asset('landing_kelas_industri/style/images/concept/concept12.png') }}"
                                        alt="" />
                                </figure>
                            </div>
                            <!--/column -->
                            <div class="space50 d-none d-md-block d-lg-none"></div>
                            <div class="space10 d-md-none"></div>
                            <div class="col-lg-6 pl-60 pl-md-15">
                                <h2 class="title-color color-gray">Ingin tahu lebih banyak?</h2>
                                <h3 class="display-3">Butuh informasi lebih banyak dan proposal lengkap dari kelas
                                    industri?</h3>
                                <div class="space20"></div>
                                <p>Silahkan Hubungi kami pada nomor yang tertera dan undang kami kesekolah anda untuk
                                    menjelaskan program kelas industri kami disekolah anda, akan kami jelaskan secara
                                    detail.</p>
                                <div class="space10"></div>
                                <a href="https://wa.me/6282132560566" class="btn btn-default">Hubungi kami</a>
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.wrapper -->
                <div class="wrapper bg-opacity-default">
                    <div class="container inner">
                        <div class="row text-center">
                            <div class="col-lg-8 offset-lg-2">
                                <h2 class="title-color color-gray">KELAS INDUSTRI HUMMATECH</h2>
                                <h3 class="display-3">Upgrade Materi dan Skill Di Industri untuk meningkatkan
                                    Persentase kerja anak didik anda<br class="d-none d-xl-block" /> Sejatinya
                                    Teknologi IT Terus Berkembang.</h3>
                            </div>
                            <!-- /column -->
                        </div>
                        <!-- /.row
                        <div class="space30"></div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <form class="fields-white">
                                    <div class="input-group">
                                        <input type="email" value="" name="EMAIL"
                                            class="email form-control mb-0 mr-2 mb-sm-0" placeholder="Email Address"
                                            required>
                                        <button type="submit"
                                            class="btn btn-rounded btn-default mr-0 mb-0 pull-right">Analyze</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        row -->
                    </div>
                    <!-- /.container -->
                    <figure style="margin-bottom:-3px;"><img
                            src="{{ asset('landing_kelas_industri/style/images/art/rocket1.png') }}"
                            alt="" />
                    </figure>
                </div>
                <!-- /.wrapper -->
                <footer class="white-wrapper">
                    <div class="container inner">
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
                                        <li><a href="https://hummasoft.com/" class="nocolor">Hummatech</a></li>
                                        <li><a href="https://hummasoft.com/kelas-industri/" class="nocolor">Kelas
                                                Industri</a></li>
                                        <li><a href="https://hummasoft.com/course-category/web-development/"
                                                class="nocolor">E Learning</a></li>
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
                                        <li><a href="https://wa.me/6282132560566" class="nocolor">Kerjasama
                                                Industri</a></li>
                                        <li><a href="https://wa.me/6282132560566" class="nocolor">Hubungi Kami</a>
                                        </li>
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
        </div>

        <!-- /.content-wrapper -->
        <div id="options-nav"></div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<!-- Mirrored from/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 May 2023 15:13:12 GMT -->

</html>
