<div id="kt_app_sidebar" class="app-sidebar "
     data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
>

    <!--begin::Sidebar primary-->
    <div class="app-sidebar-primary "
    >

        <!--begin::Header-->
        <div class="d-flex flex-column flex-center fs-6 fw-bold px-2 mb-5" id="kt_app_sidebar_primary_header">
            Pintasan
        </div>
        <!--end::Header-->
        <!--begin::Sidebar navbar-->
        <div
            class="app-sidebar-nav flex-grow-1 hover-scroll-overlay-y px-5 pt-2"
            id="kt_app_sidebar_primary_nav"

            data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_header, #kt_app_sidebar_primary_header, #kt_app_sidebar_primary_footer"
            data-kt-scroll-wrappers="#kt_app_content, #kt_app_sidebar_primary_nav"
            data-kt-scroll-offset="5px"
        >
            <!--begin::Nav-->
            <ul class="nav">
                @if(auth()->user()->roles->pluck('name')[0] == 'student')
                <!--begin::Navbar item-->
                
                <li class="nav-item py-1">
                    <!--begin::Navbar link-->
                    <a data-bs-toggle="tab" href="#kt_app_sidebar_assignment" class="nav-link py-4 px-1 btn active">
                        <i class="bi bi-list-task fs-1"></i>

                        <span class="pt-2 fs-9 fs-lg-7 fw-bold">Tugas</span>
                    </a>
                    <!--end::Navbar link-->
                </li>
                
                <!--end::Navbar item-->

                <!--begin::Navbar item-->
                <li class="nav-item py-1">
                    <!--begin::Navbar link-->
                    <a data-bs-toggle="tab" href="#kt_app_sidebar_challenge" class="nav-link py-4 px-1 btn">
                        <i class="bi bi-bookmark-star fs-1"></i>

                        <span class="pt-2 fs-9 fs-lg-7 fw-bold">Tantangan</span>
                    </a>
                    <!--end::Navbar link-->
                </li>
                
                <!--end::Navbar item-->
                @endif

                <!--begin::Navbar item-->
                <li class="nav-item py-1">
                    <!--begin::Navbar link-->
                    <a data-bs-toggle="tab" href="#kt_app_sidebar_leaderboard" class="nav-link py-4 px-1 btn {{auth()->user()->roles->pluck('name')[0] == 'mentor' ? 'active' : ''}}">
                        <i class="bi bi-bar-chart-fill fs-1"></i>

                        <span class="pt-2 fs-9 fs-lg-7 fw-bold">Peringkat</span>
                    </a>
                    <!--end::Navbar link-->
                </li>
                <!--end::Navbar item-->
                

                <!--begin::Navbar item-->
                <li class="nav-item py-1">
                    <!--begin::Navbar link-->
                    <a data-bs-toggle="tab" href="#kt_app_sidebar_schedule" class="nav-link py-4 px-1 btn">
                        <i class="bi bi-calendar3 fs-1"></i>

                        <span class="pt-2 fs-9 fs-lg-7 fw-bold">Jadwal</span>
                    </a>
                    <!--end::Navbar link-->
                </li>
                <!--end::Navbar item-->

            </ul>
            <!--end::Nav-->
        </div>
        <!--end::Sidebar navbar-->
    </div>
    <!--end::Sidebar primary-->

    <!--begin::Sidebar secondary-->
    <div class="app-sidebar-secondary "
    >

        <!--begin::Sidebar menu-->
        <div
            id="kt_app_sidebar_secondary_wrapper"
            class="hover-scroll-y"
            data-kt-scroll="true"
            data-kt-scroll-activate="{default: true, lg: true}"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependecies="#kt_app_header"
            data-kt-scroll-wrappers="#kt_app_content"
            data-kt-scroll-offset="5px"
        >

        @if(auth()->user()->roles->pluck('name')[0] == 'student')
            <!--begin::Tab content-->
            <div class="tab-content px-5 px-lg-10">
                <!--begin::Tab pane-->
                <div class="tab-pane fade show active" id="kt_app_sidebar_assignment" role="tabpanel">
                    <!--begin::Collections-->
                    <div class="card card-reset card-p-0">
                        <div class="card-header pt-7 mb-5">
                            <!--begin::Title-->
                            <h3 class="card-title fw-bold text-gray-800">
                                Tugas
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body text-center">
                            @forelse ($SidebarAssignment as $assignment)
                            <div class="d-flex mb-3 flex-stack">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">C</div>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Section-->
                                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                    <!--begin:Author-->
                                    <div class="flex-grow-1 me-2">
                                        <a href="../../pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">{{$assignment->title}}</a>

                                        <span class="text-muted fw-semibold d-block fs-7">{{$assignment->submaterial->title}}</span>
                                    </div>
                                    <!--end:Author-->
                                </div>
                                <!--end::Section-->
                            </div>
                            @empty
                                <!--begin::Illustration-->
                                <img src="{{ asset('user-assets/media/misc/watch.svg') }}" class="h-150px" alt=""/>
                                <!--end::Illustration-->

                                <!--begin::Title-->
                                <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih Kosong</h4>
                                <!--end::Title-->

                                <!--begin::Desctiption-->
                                <span class="fw-semibold text-gray-700 mb-4 d-block">
                                            anda belum memiliki tugas untuk saat ini.
                                </span>
                                <!--end::Desctiption-->
                            @endforelse  
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Collections-->
                </div>
                <!--end::Tab pane-->
            </div>
            <!--end::Tab content-->
            
            <!--begin::Tab content-->
            <div class="tab-content px-5 px-lg-10">
                <!--begin::Tab pane-->
                <div class="tab-pane fade" id="kt_app_sidebar_challenge" role="tabpanel">
                    <!--begin::Collections-->
                    <div class="card card-reset card-p-0">
                        <div class="card-header pt-7 mb-5">
                            <!--begin::Title-->
                            <h3 class="card-title fw-bold text-gray-800">
                                Tantangan
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body text-center">
                            @forelse ($SidebarChallenge as $challenge)
                            <div class="d-flex mb-3 flex-stack">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">C</div>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Section-->
                                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                    <!--begin:Author-->
                                    <div class="flex-grow-1 me-2">
                                        <a href="../../pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">{{$challenge->title}}</a>

                                        <span class="text-muted fw-semibold d-block fs-7">{{$challenge->difficulty}}</span>
                                    </div>
                                    <!--end:Author-->
                                </div>
                                <!--end::Section-->
                            </div>
                            @empty
                                <!--begin::Illustration-->
                                <img src="{{ asset('user-assets/media/misc/watch.svg') }}" class="h-150px" alt=""/>
                                <!--end::Illustration-->

                                <!--begin::Title-->
                                <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih Kosong</h4>
                                <!--end::Title-->

                                <!--begin::Desctiption-->
                                <span class="fw-semibold text-gray-700 mb-4 d-block">
                                            anda belum memiliki challenge untuk saat ini.
                                </span>
                                <!--end::Desctiption-->
                            @endforelse
                            <div class="separator separator-dashed my-4"></div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Collections-->
                </div>
                <!--end::Tab pane-->
            </div>
            <!--end::Tab content-->
            @endif
        
            <!--begin::Tab content-->
            <div class="tab-content px-5 px-lg-10">
                <!--begin::Tab pane-->
                <div class="tab-pane fade {{auth()->user()->roles->pluck('name')[0] == 'mentor' ? 'show active' : ''}}" id="kt_app_sidebar_leaderboard" role="tabpanel">
                    <!--begin::Collections-->
                    <div class="card card-reset card-p-0">
                        <div class="card-header pt-7 mb-5">
                            <!--begin::Title-->
                            <h3 class="card-title fw-bold text-gray-800">
                                Peringkat
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body text-center">
                            @forelse ($SidebarRank as $rank)
                                <div class="d-flex mb-3 flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">C</div>
                                    </div>
                                    <!--end::Symbol-->

                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">{{$rank->student->name}}</a>

                                            <span class="text-muted fw-semibold d-block fs-7">{{$rank->point}}</span>
                                        </div>
                                        <!--end:Author-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                            @empty
                                <!--begin::Illustration-->
                                <img src="{{ asset('user-assets/media/misc/watch.svg') }}" class="h-150px" alt=""/>
                                <!--end::Illustration-->

                                <!--begin::Title-->
                                <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih Kosong</h4>
                                <!--end::Title-->

                                <!--begin::Desctiption-->
                                <span class="fw-semibold text-gray-700 mb-4 d-block">
                                            belum ada rank untuk saat ini.
                                </span>
                                <!--end::Desctiption-->
                            @endforelse
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Collections-->
                </div>
                <!--end::Tab pane-->
            </div>
            <!--end::Tab content-->
            <!--begin::Tab content-->
            <div class="tab-content px-5 px-lg-10">
                <!--begin::Tab pane-->
                <div class="tab-pane fade" id="kt_app_sidebar_schedule" role="tabpanel">
                    <!--begin::Collections-->
                    <div class="card card-reset card-p-0">
                        <div class="card-header pt-7 mb-5">
                            <!--begin::Title-->
                            <h3 class="card-title fw-bold text-gray-800">
                                Jadwal
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body text-center">
                            @forelse ($SidebarSchedule as $schedule)
                            <div class="d-flex mb-3 flex-stack">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">C</div>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Section-->
                                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                    <!--begin:Author-->
                                    <div class="flex-grow-1 me-2">
                                        <a href="../../pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">{{$schedule->title}}</a>

                                        <span class="text-muted fw-semibold d-block fs-7">{{$schedule->date}}</span>
                                    </div>
                                    <!--end:Author-->
                                </div>
                                <!--end::Section-->
                            </div>
                            @empty
                              <!--begin::Illustration-->
                              <img src="{{ asset('user-assets/media/misc/watch.svg') }}" class="h-150px" alt=""/>
                              <!--end::Illustration-->

                              <!--begin::Title-->
                              <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih Kosong</h4>
                              <!--end::Title-->

                              <!--begin::Desctiption-->
                              <span class="fw-semibold text-gray-700 mb-4 d-block">
                                          anda belum memiliki jadwal zoom untuk saat ini.
                              </span>
                              <!--end::Desctiption-->  
                            @endforelse
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Collections-->
                </div>
                <!--end::Tab pane-->
            </div>
            <!--end::Tab content-->
        </div>
        <!--end::Sidebar menu-->            '
    </div>
    <!--end::Sidebar secondary-->


</div>
