'schools' => $this->userService->handleGetAllSchool(),
@extends('dashboard.admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">
@endsection
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Event
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman tambah event
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.events.index') }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <!--end::Actions-->
    </div>

    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="card-body p-lg-17">
            <!--begin::About-->
            <div class="mb-18">
                <!--begin::Wrapper-->
                <div class="mb-10">
                    <!--begin::Overlay-->
                    <div class="overlay">
                        <!--begin::Image-->
                        <img class="w-100 card-rounded" src="{{ asset('storage/' . $event->photo) }}" alt="">
                        <!--end::Image-->

                        <!--begin::Links-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25" data-event="{{ $event->id }}">
                            @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                <form action="{{ route('student.events.follow', $event->id) }}" method="POST"
                                    id="form-follow">
                                    @csrf
                                    <button type="button"
                                        class="btn btn-light-primary ms-3 follow-event-btn">Daftar</button>
                                </form>
                            @endif
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Description-->
                <div class="fs-5 fw-semibold text-gray-600">

                    <h1 class="mb-4">{{ $event->title }}</h1>
                    <!--begin::Text-->
                    <div class="mb-8">
                        {!! $event->description !!}
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Description-->
            </div>
            <!--end::About-->

            <!--begin::Section-->
            <div class="mb-16">
                <!--begin::Top-->
                <div class="text-center mb-12">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-gray-900 mb-5">Dokumentasi Event</h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_documentattion">Tambah
                        Dokumentasi</button>
                    <!--end::Title-->

                    <!--begin::Text-->
                    {{-- <div class="fs-5 text-muted fw-semibold">
                        Dokumentasi hasil foto
                    </div> --}}
                    <!--end::Text-->
                </div>
                <!--end::Top-->

                <!--begin::Row-->
                {{-- <div class="row g-10">
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Publications post-->
                        <div class="card-xl-stretch me-md-6">
                            <!--begin::Overlay-->
                            <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales"
                                href="https://preview.keenthemes.com//metronic8/demo1/assets/media/stock/600x400/img-73.jpg">
                                <!--begin::Image-->
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                    style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/stock/600x400/img-73.jpg')">
                                </div>
                                <!--end::Image-->

                                <!--begin::Action-->
                                <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-2x text-white"></i>
                                </div>
                                <!--end::Action-->
                            </a>
                            <!--end::Overlay-->

                            <!--begin::Body-->
                            <div class="m-0">
                                <!--begin::Title-->
                                <a href="https://preview.keenthemes.com//metronic8/demo1/pages/user-profile/overview.html"
                                    class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">
                                    Admin Panel - How To Started the Dashboard Tutorial </a>
                                <!--end::Title-->

                                <!--begin::Text-->
                                <div class="fw-semibold fs-5 text-gray-600 text-gray-900 mt-3 mb-5">

                                    We’ve been focused on making a the from also not been
                                    afraid to and step away been focused create eye
                                </div>
                                <!--end::Text-->

                                <!--begin::Content-->
                                <div class="fs-6 fw-bold">
                                    <!--begin::Author-->
                                    <a href="https://preview.keenthemes.com//metronic8/demo1/apps/projects/users.html"
                                        class="text-gray-700 text-hover-primary">Jane Miller</a>
                                    <!--end::Author-->

                                    <!--begin::Date-->
                                    <span class="text-muted">on Mar 21 2021</span>
                                    <!--end::Date-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Publications post-->



                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Publications post-->
                        <div class="card-xl-stretch mx-md-3">
                            <!--begin::Overlay-->
                            <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales"
                                href="https://preview.keenthemes.com//metronic8/demo1/assets/media/stock/600x400/img-74.jpg">
                                <!--begin::Image-->
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                    style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/stock/600x400/img-74.jpg')">
                                </div>
                                <!--end::Image-->

                                <!--begin::Action-->
                                <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-2x text-white"></i>
                                </div>
                                <!--end::Action-->
                            </a>
                            <!--end::Overlay-->

                            <!--begin::Body-->
                            <div class="m-0">
                                <!--begin::Title-->
                                <a href="https://preview.keenthemes.com//metronic8/demo1/pages/user-profile/overview.html"
                                    class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">
                                    Admin Panel - How To Started the Dashboard Tutorial </a>
                                <!--end::Title-->

                                <!--begin::Text-->
                                <div class="fw-semibold fs-5 text-gray-600 text-gray-900 mt-3 mb-5">

                                    We’ve been focused on making the from v4 to v5 but we
                                    have also not been afraid to step away been focused
                                </div>
                                <!--end::Text-->

                                <!--begin::Content-->
                                <div class="fs-6 fw-bold">
                                    <!--begin::Author-->
                                    <a href="https://preview.keenthemes.com//metronic8/demo1/apps/projects/users.html"
                                        class="text-gray-700 text-hover-primary">Cris Morgan</a>
                                    <!--end::Author-->

                                    <!--begin::Date-->
                                    <span class="text-muted">on Apr 14 2021</span>
                                    <!--end::Date-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Publications post-->



                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Publications post-->
                        <div class="card-xl-stretch ms-md-6">
                            <!--begin::Overlay-->
                            <a class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales"
                                href="https://preview.keenthemes.com//metronic8/demo1/assets/media/stock/600x400/img-47.jpg">
                                <!--begin::Image-->
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                    style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/stock/600x400/img-47.jpg')">
                                </div>
                                <!--end::Image-->

                                <!--begin::Action-->
                                <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                    <i class="ki-duotone ki-eye fs-2x text-white"></i>
                                </div>
                                <!--end::Action-->
                            </a>
                            <!--end::Overlay-->

                            <!--begin::Body-->
                            <div class="m-0">
                                <!--begin::Title-->
                                <a href="https://preview.keenthemes.com//metronic8/demo1/pages/user-profile/overview.html"
                                    class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">
                                    Admin Panel - How To Started the Dashboard Tutorial </a>
                                <!--end::Title-->

                                <!--begin::Text-->
                                <div class="fw-semibold fs-5 text-gray-600 text-gray-900 mt-3 mb-5">

                                    We’ve been focused on making the from v4 to v5
                                    but we’ve also not been afraid to step away been focused
                                </div>
                                <!--end::Text-->

                                <!--begin::Content-->
                                <div class="fs-6 fw-bold">
                                    <!--begin::Author-->
                                    <a href="https://preview.keenthemes.com//metronic8/demo1/apps/projects/users.html"
                                        class="text-gray-700 text-hover-primary">Carles Nilson</a>
                                    <!--end::Author-->

                                    <!--begin::Date-->
                                    <span class="text-muted">on May 14 2021</span>
                                    <!--end::Date-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Publications post-->



                    </div>
                    <!--end::Col-->
                </div> --}}

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 gap-3">
                    @foreach ($event->documentations as $documentation)
                        {{-- <div class="col"> --}}
                            <img src="{{ asset('storage/' . $documentation->media) }}" alt=""
                                class="documentation_image col w-300px m-auto"
                                data-image="{{ asset('storage/' . $documentation->media) }}">
                        {{-- </div> --}}
                    @endforeach
                </div>
                <!--end::Row-->
            </div>
            <!--end::Section-->



            <!--begin::Team-->
            {{-- <div class="mb-18">
                <!--begin::Heading-->
                <div class="text-center mb-12">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-gray-900 mb-5">Our Great Team</h3>
                    <!--end::Title-->

                    <!--begin::Sub-title-->
                    <div class="fs-5 text-muted fw-semibold">
                        It’s no doubt that when a development takes longer to complete, additional costs to<br>
                        integrate and test each extra feature creeps up and haunts most of us.
                    </div>
                    <!--end::Sub-title--->
                </div>
                <!--end::Heading-->

                <!--begin::Slider-->
                <div class="tns tns-default mb-10 tns-initiazlied">
                    <!--begin::Wrapper-->
                    <div class="tns-outer" id="tns1-ow">
                        <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">
                            slide
                            <span class="current">13 to 15</span> of 7
                        </div>
                        <div id="tns1-mw" class="tns-ovh">
                            <div class="tns-inner" id="tns1-iw">
                                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false"
                                    data-tns-speed="2000" data-tns-autoplay="true"
                                    data-tns-autoplay-timeout="18000" data-tns-controls="true"
                                    data-tns-nav="false" data-tns-items="1" data-tns-center="false"
                                    data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev"
                                    data-tns-next-button="#kt_team_slider_next"
                                    data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}"
                                    class="  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                    id="tns1" data-kt-initialized="1"
                                    style="transform: translate3d(-80%, 0px, 0px);">
                                    <div class="text-center tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-20.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Anne
                                                Clarc</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Project Manager</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <div class="text-center tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-23.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Ricky
                                                Hunt</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Art Director</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <div class="text-center tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-12.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Alice
                                                Wayde</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Marketing Manager</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <div class="text-center tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-9.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Carles
                                                Puyol</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">QA Managers</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>

                                    <!--begin::Item-->
                                    <div class="text-center tns-item" id="tns1-item0" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-1.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Paul
                                                Miles</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Development Lead</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center tns-item" id="tns1-item1" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-2.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Melisa
                                                Marcus</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Creative Director</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center tns-item" id="tns1-item2" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-5.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">David
                                                Nilson</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Python Expert</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center tns-item" id="tns1-item3" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-20.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Anne
                                                Clarc</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Project Manager</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center tns-item" id="tns1-item4" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-23.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Ricky
                                                Hunt</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Art Director</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center tns-item" id="tns1-item5" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-12.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Alice
                                                Wayde</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Marketing Manager</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="text-center tns-item" id="tns1-item6" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-9.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Carles
                                                Puyol</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">QA Managers</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->

                                    <div class="text-center tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-1.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Paul
                                                Miles</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Development Lead</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <div class="text-center tns-item tns-slide-cloned tns-slide-active">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-2.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Melisa
                                                Marcus</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Creative Director</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <div class="text-center tns-item tns-slide-cloned tns-slide-active">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-5.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">David
                                                Nilson</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Python Expert</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <div class="text-center tns-item tns-slide-cloned tns-slide-active">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('https://preview.keenthemes.com//metronic8/demo1/assets/media/avatars/300-20.jpg')">
                                        </div>
                                        <!--end::Photo-->

                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="text-gray-900 fw-bold text-hover-primary fs-3">Anne
                                                Clarc</a>
                                            <!--end::Name-->

                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold mt-1">Project Manager</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Button-->
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev"
                        aria-controls="tns1" tabindex="-1" data-controls="prev">
                        <i class="ki-duotone ki-left fs-3x"></i> </button>
                    <!--end::Button-->

                    <!--begin::Button-->
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next"
                        aria-controls="tns1" tabindex="-1" data-controls="next">
                        <i class="ki-duotone ki-right fs-3x"></i> </button>
                    <!--end::Button-->
                </div>
                <!--end::Slider-->
            </div> --}}
            <!--end::Team-->



            <!--begin::Card-->
            {{-- <div class="card mb-4 bg-light text-center ">
                <!--begin::Body-->
                <div class="card-body py-12">
                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="https://preview.keenthemes.com//metronic8/demo1/assets/media/svg/brand-logos/facebook-4.svg"
                            class="h-30px my-2" alt="">
                    </a>
                    <!--end::Icon-->

                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="https://preview.keenthemes.com//metronic8/demo1/assets/media/svg/brand-logos/instagram-2-1.svg"
                            class="h-30px my-2" alt="">
                    </a>
                    <!--end::Icon-->

                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="https://preview.keenthemes.com//metronic8/demo1/assets/media/svg/brand-logos/github.svg"
                            class="h-30px my-2" alt="">
                    </a>
                    <!--end::Icon-->

                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="https://preview.keenthemes.com//metronic8/demo1/assets/media/svg/brand-logos/behance.svg"
                            class="h-30px my-2" alt="">
                    </a>
                    <!--end::Icon-->

                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="https://preview.keenthemes.com//metronic8/demo1/assets/media/svg/brand-logos/pinterest-p.svg"
                            class="h-30px my-2" alt="">
                    </a>
                    <!--end::Icon-->

                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="https://preview.keenthemes.com//metronic8/demo1/assets/media/svg/brand-logos/twitter.svg"
                            class="h-30px my-2" alt="">
                    </a>
                    <!--end::Icon-->

                    <!--begin::Icon-->
                    <a href="#" class="mx-4">
                        <img src="https://preview.keenthemes.com//metronic8/demo1/assets/media/svg/brand-logos/dribbble-icon-1.svg"
                            class="h-30px my-2" alt="">
                    </a>
                    <!--end::Icon-->
                </div>
                <!--end::Body-->
            </div> --}}
            <!--end::Card-->
        </div>
    </div>

    <div class="modal" tabindex="-1" id="show_image">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <img src="" alt="">
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="add_documentattion">
        <form action="{{ route('admin.eventDocumentation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title border-0">Modal title</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Foto Dokumentasi</label>
                            <input type="file" class="form-control" name="photo" id="photo" />
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-delete-modal-component />
    @php
        $documentation_count = count($event->documentations);
    @endphp
@endsection
@section('script')
    <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>

    {{-- <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: {{ $documentation_count > 3 ? 4 : $documentation_count }},
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                fixedWidth: 300,
                autoWidth: false,
                center: true,
            });
        });
    </script> --}}

    <script>
        $(document).on('click', '.delete', function() {
            const url = "{{ route('admin.rollingMentor.deleteRollingMentor', ':id') }}".replace(':id', $(this)
                .data(
                    'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $(document).ready(function() {
            const datepicker = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"));
            datepicker.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
        })

        $('.documentation_image').click(function() {
            $('#show_image img').attr('src', $(this).data('image'))
            $('#show_image').modal('show')
        })
    </script>
@endsection
