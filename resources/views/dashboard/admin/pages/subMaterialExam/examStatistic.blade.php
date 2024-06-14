@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column justify-content-between">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Statistik Ujian Selesai
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Daftar Statistik Sertifikasi Yang Sudah Selesai
            </p>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="covercard row gap-2">
            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                <div class="card-body d-flex align-items">
                    <span class="w-4 h-4 my-auto fs-1">
                        <svg width="30" height="30" viewBox="0 0 37 37" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.08333 37C3.08333 37 0 37 0 33.9167C0 30.8333 3.08333 21.5833 18.5 21.5833C33.9167 21.5833 37 30.8333 37 33.9167C37 37 33.9167 37 33.9167 37H3.08333ZM18.5 18.5C20.9533 18.5 23.306 17.5254 25.0407 15.7907C26.7754 14.056 27.75 11.7033 27.75 9.25C27.75 6.79675 26.7754 4.44397 25.0407 2.70926C23.306 0.974551 20.9533 0 18.5 0C16.0467 0 13.694 0.974551 11.9593 2.70926C10.2246 4.44397 9.25 6.79675 9.25 9.25C9.25 11.7033 10.2246 14.056 11.9593 15.7907C13.694 17.5254 16.0467 18.5 18.5 18.5Z"
                                fill="#009EF7" />
                        </svg>
                    </span>

                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                        Siswa Mengerjakan 2
                    </span>
                </div>
            </a>
            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                <div class="card-body d-flex align-items">
                    <span class="w-4 h-4 my-auto fs-1">
                        <svg width="30" height="30" viewBox="0 0 41 38" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.37012 7.48148C6.11086 10.2222 10.222 11.5926 14.3331 7.48148H26.6664C30.7775 11.5926 34.8886 10.2222 37.6294 7.48148M20.4997 2V34.8889M11.5923 36.2593H29.4072"
                                stroke="#009EF7" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M33.5185 10.2227L28.037 23.9264C29.4074 26.6671 37.6296 26.6671 39 23.9264L33.5185 10.2227ZM7.48148 10.2227L2 23.9264C3.37037 26.6671 11.5926 26.6671 12.963 23.9264L7.48148 10.2227Z"
                                stroke="#009EF7" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </span>

                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                        Rata-Rata Nilai 1
                    </span>
                </div>
            </a>
            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                <div class="card-body d-flex align-items">
                    <span class="w-4 h-4 my-auto fs-1">
                        <svg width="30" height="30" viewBox="0 0 37 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_848_51)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.8488 6.53893C21.8488 6.14529 22.0042 5.76776 22.2809 5.48941C22.5575 5.21106 22.9327 5.05469 23.324 5.05469H35.1257C35.517 5.05469 35.8922 5.21106 36.1689 5.48941C36.4455 5.76776 36.6009 6.14529 36.6009 6.53893V18.4129C36.6009 18.8066 36.4455 19.1841 36.1689 19.4624C35.8922 19.7408 35.517 19.8972 35.1257 19.8972C34.7345 19.8972 34.3592 19.7408 34.0826 19.4624C33.8059 19.1841 33.6505 18.8066 33.6505 18.4129V10.6948L22.9906 23.8067C22.8601 23.9669 22.6977 24.0979 22.5139 24.1912C22.33 24.2845 22.1288 24.3381 21.9231 24.3484C21.7175 24.3588 21.5119 24.3257 21.3198 24.2513C21.1276 24.1769 20.953 24.0629 20.8073 23.9165L13.1745 16.237L2.38774 31.1596C2.15177 31.4615 1.80868 31.6596 1.43057 31.7123C1.05246 31.765 0.668766 31.6682 0.36012 31.4422C0.0514734 31.2162 -0.158093 30.8787 -0.224542 30.5005C-0.29099 30.1223 -0.209146 29.7329 0.00379053 29.4142L11.8055 13.0874C11.9308 12.9138 12.092 12.7696 12.278 12.6647C12.464 12.5598 12.6704 12.4967 12.8829 12.4798C13.0955 12.4628 13.3092 12.4925 13.5093 12.5666C13.7094 12.6408 13.8911 12.7577 14.0419 12.9093L21.7396 20.6571L32.013 8.02318H23.324C22.9327 8.02318 22.5575 7.86681 22.2809 7.58846C22.0042 7.31011 21.8488 6.93258 21.8488 6.53893Z"
                                    fill="#009EF7" />
                            </g>
                            <defs>
                                <clipPath id="clip0_848_51">
                                    <rect width="37" height="35.9429" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>


                    </span>

                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                        Nilai Tertinggi 1
                    </span>
                </div>
            </a>
            <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                <div class="card-body d-flex align-items">
                    <span class="w-4 h-4 my-auto fs-1">
                        <svg width="30" height="30" viewBox="0 0 37 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_848_53)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.8493 29.4044C21.8493 29.7981 22.0047 30.1756 22.2814 30.4539C22.558 30.7323 22.9332 30.8887 23.3245 30.8887H35.1262C35.5175 30.8887 35.8927 30.7323 36.1693 30.4539C36.446 30.1756 36.6014 29.7981 36.6014 29.4044V17.5304C36.6014 17.1368 36.446 16.7593 36.1693 16.4809C35.8927 16.2026 35.5175 16.0462 35.1262 16.0462C34.735 16.0462 34.3597 16.2026 34.0831 16.4809C33.8064 16.7593 33.651 17.1368 33.651 17.5304V25.2485L22.9911 12.1367C22.8606 11.9764 22.6982 11.8454 22.5143 11.7521C22.3305 11.6588 22.1293 11.6053 21.9236 11.5949C21.718 11.5846 21.5124 11.6177 21.3203 11.6921C21.1281 11.7665 20.9535 11.8805 20.8078 12.0269L13.175 19.7064L2.38823 4.78373C2.15226 4.48184 1.80917 4.28373 1.43106 4.23103C1.05295 4.17833 0.669254 4.27515 0.360608 4.50113C0.0519617 4.72712 -0.157605 5.06468 -0.224054 5.44287C-0.290502 5.82107 -0.208658 6.21045 0.00427881 6.5292L11.806 22.8559C11.9313 23.0295 12.0925 23.1738 12.2785 23.2787C12.4645 23.3836 12.6708 23.4467 12.8834 23.4636C13.096 23.4805 13.3097 23.4509 13.5098 23.3767C13.7098 23.3026 13.8916 23.1857 14.0424 23.034L21.7401 15.2863L32.0135 27.9202H23.3245C22.9332 27.9202 22.558 28.0766 22.2814 28.3549C22.0047 28.6333 21.8493 29.0108 21.8493 29.4044Z"
                                    fill="#009EF7" />
                            </g>
                            <defs>
                                <clipPath id="clip0_848_53">
                                    <rect width="37" height="35.9429" fill="white"
                                        transform="matrix(1 0 0 -1 0 35.9434)" />
                                </clipPath>
                            </defs>
                        </svg>

                    </span>

                    <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                        Nilai Terendah 1.5

                    </span>
                </div>
            </a>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <div class="card">
                    <!--begin::Header-->
                    <div class="card-header justify-content-center bg-primary text-center"
                        style="min-height:50px;border-radius:10px">
                        <h3 class="card-title text-white">5 Rangking Kelas Nilai Tertinggi
                        </h3>
                    </div>
                    <!--begin::Title-->

                    <!--end::Title-->
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Item-->
                        <div id="rangking">
                            <div class="d-flex justify-content-between mt-2">
                                <div class="d-flex justify-content-header">
                                    <div class="">
                                        <div
                                            class="p-3 bg-light-info rounded-2 d-flex align-items-center justify-content-center me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                viewBox="0 0 44 44" fill="none">
                                                <path
                                                    d="M28.6031 13.1996C28.6031 16.8447 25.6482 19.7996 22.0031 19.7996C18.358 19.7996 15.4031 16.8447 15.4031 13.1996C15.4031 9.55453 18.358 6.59961 22.0031 6.59961C25.6482 6.59961 28.6031 9.55453 28.6031 13.1996Z"
                                                    fill="#5D87FF"></path>
                                                <path
                                                    d="M39.6031 17.5996C39.6031 20.0297 37.6332 21.9996 35.2031 21.9996C32.7731 21.9996 30.8031 20.0297 30.8031 17.5996C30.8031 15.1696 32.7731 13.1996 35.2031 13.1996C37.6332 13.1996 39.6031 15.1696 39.6031 17.5996Z"
                                                    fill="#5D87FF"></path>
                                                <path
                                                    d="M30.8031 32.9996C30.8031 28.1395 26.8632 24.1996 22.0031 24.1996C17.143 24.1996 13.2031 28.1395 13.2031 32.9996V39.5996H30.8031V32.9996Z"
                                                    fill="#5D87FF"></path>
                                                <path
                                                    d="M13.2031 17.5996C13.2031 20.0297 11.2332 21.9996 8.80312 21.9996C6.37307 21.9996 4.40312 20.0297 4.40312 17.5996C4.40312 15.1696 6.37307 13.1996 8.80312 13.1996C11.2332 13.1996 13.2031 15.1696 13.2031 17.5996Z"
                                                    fill="#5D87FF"></path>
                                                <path
                                                    d="M35.2031 39.5996V32.9996C35.2031 30.6805 34.6051 28.5011 33.5547 26.6071C34.0816 26.4717 34.634 26.3996 35.2031 26.3996C38.8482 26.3996 41.8031 29.3545 41.8031 32.9996V39.5996H35.2031Z"
                                                    fill="#5D87FF"></path>
                                                <path
                                                    d="M10.4515 26.6071C9.40119 28.5011 8.80312 30.6805 8.80312 32.9996V39.5996H2.20312V32.9996C2.20312 29.3545 5.15805 26.3996 8.80312 26.3996C9.37229 26.3996 9.92462 26.4717 10.4515 26.6071Z"
                                                    fill="#5D87FF"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="fs-4 text-dark" style="font-weight: 600;">
                                            X RPL 1
                                        </div>
                                        <span class="fs-6 fw-semibold">SMKN 1 Kepanjen</span>
                                    </div>
                                </div>
                                <div
                                    class="p-2 px-4 bg-light-info rounded-2 d-flex align-items-center justify-content-center">
                                    <h4 class="text-info mb-0 fs-5" style="font-weight: 900">
                                        0
                                    </h4>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <!--begin::Header-->
                    <div class="card-header justify-content-center bg-primary text-center"
                        style="min-height:50px;border-radius:10px">
                        <h3 class="card-title text-white">Data Siswa Ujian Nilai Tertinggi
                        </h3>
                    </div>
                    <!--begin::Title-->

                    <!--end::Title-->
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Item-->
                        <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable">
                            <thead>
                                <tr>
                                    <th class="min-w-50px text-center">
                                        <span class="dt-column-title fw-bold">Rank</span>
                                    </th>
                                    <th class="min-w-200px text-center">
                                        <span class="dt-column-title fw-bold">Nama</span>
                                    </th>
                                    <th class="min-w-50px text-center">
                                        <span class="dt-column-title fw-bold">Nilai</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold">
                                <tr>
                                    <td class="text-center">
                                        <img width="30px" src="{{ asset('app-assets/medal_file/gold-medal.png') }}"
                                            alt="">
                                    </td>
                                    <td class="text-center">
                                        Alfian Fahrul Himawan S. Tr. Kom
                                        <div class="">
                                            <span class="fw-semibold" style="font-size: 12px;">X RPL A - SMKN 1 Kepanjen</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">90</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12">
                                <a class="btn w-100 btn-md btn-primary" href="{{ route('admin.exam-detail-student') }}">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>
    </div>
@endsection
