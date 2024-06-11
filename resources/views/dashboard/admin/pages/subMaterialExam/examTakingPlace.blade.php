@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column justify-content-between">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Ujian Berlangsung
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Daftar List Sertifikasi Yang Berlangsung
            </p>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            @forelse ($exams as $exam)
                <div class="col-xl-6 mb-5">

                    <!--begin::Card-->

                    <div class="card card-custom gutter-b card-stretch">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Section-->

                            <div class="d-flex">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 symbol symbol-65 symbol-circle me-5" style="margin-bottom: 15%;">
                                    <span
                                        class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest"
                                        style="width:60px;height:60px;">{{ substr($exam->title, 0, 1) }}</span>
                                </div>
                                <!--end::Pic-->

                                <!--begin::Info-->

                                <div class="d-flex flex-column me-auto">
                                    <!--begin: Title-->
                                    <div class="mb-4 justify-content-beetween">
                                        <div class="text-hover-primary font-weight-bolder fs-3 fw-semibold text-dark">{{ $exam->title }}</div>
                                        <div class="">
                                            <span class="badge text-bg-warning">Ujian Sedang Berlangsung</span>
                                        </div>
                                    </div>

                                    <span class="text-black fw-semibold d-flex fs-6 mb-3">
                                        <svg class="me-2" width="19" height="19" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 19C14.9706 19 19 14.9706 19 10C19 5.02944 14.9706 1 10 1C5.02944 1 1 5.02944 1 10C1 14.9706 5.02944 19 10 19Z"
                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M10 4.59961V9.99961L13.6 11.7996" stroke="black" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        (Mulai)
                                        {{ \Carbon\Carbon::parse($exam->start_at)->locale('id')->isoFormat('D MMMM YYYY HH:mm') }}
                                    </span>

                                    <span class="text-black fw-semibold d-flex fs-6 mb-3">
                                        <svg width="19" height="19" class="me-2" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.0526 9.52632C18.0526 7.83997 17.5526 6.1915 16.6157 4.78935C15.6788 3.38721 14.3472 2.29437 12.7892 1.64903C11.2312 1.00369 9.51686 0.834845 7.86292 1.16383C6.20897 1.49282 4.68973 2.30488 3.4973 3.4973C2.30488 4.68973 1.49282 6.20897 1.16383 7.86292C0.834845 9.51686 1.00369 11.2312 1.64903 12.7892C2.29437 14.3472 3.38721 15.6788 4.78935 16.6157C6.1915 17.5526 7.83997 18.0526 9.52632 18.0526"
                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M9.52539 4.78906V9.5259L11.4201 11.4206M13.3149 13.3154H18.9991V18.9996H13.3149V13.3154Z"
                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        (Selesai)
                                        {{ \Carbon\Carbon::parse($exam->end_at)->locale('id')->isoFormat('D MMMM YYYY HH:mm') }}
                                    </span>

                                    <span class="text-black fw-semibold d-flex fs-6 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 21.5c-1.35-.85-3.8-1.5-5.5-1.5c-1.65 0-3.35.3-4.75 1.05c-.1.05-.15.05-.25.05c-.25 0-.5-.25-.5-.5V6c.6-.45 1.25-.75 2-1c1.11-.35 2.33-.5 3.5-.5c1.95 0 4.05.4 5.5 1.5c1.45-1.1 3.55-1.5 5.5-1.5c1.17 0 2.39.15 3.5.5c.75.25 1.4.55 2 1v14.6c0 .25-.25.5-.5.5c-.1 0-.15 0-.25-.05c-1.4-.75-3.1-1.05-4.75-1.05c-1.7 0-4.15.65-5.5 1.5m-1-14c-1.36-.6-3.16-1-4.5-1c-1.2 0-2.4.15-3.5.5v11.5c1.1-.35 2.3-.5 3.5-.5c1.34 0 3.14.4 4.5 1zM13 19c1.36-.6 3.16-1 4.5-1c1.2 0 2.4.15 3.5.5V7c-1.1-.35-2.3-.5-3.5-.5c-1.34 0-3.14.4-4.5 1zm1-2.65c.96-.35 2.12-.52 3.5-.52c1.04 0 1.88.08 2.5.24v-1.5a13.9 13.9 0 0 0-6 .19zm0-2.66c.96-.35 2.12-.53 3.5-.53c1.04 0 1.88.08 2.5.24v-1.5c-.87-.16-1.71-.23-2.5-.23c-1.28 0-2.45.15-3.5.45zM14 11c.96-.33 2.12-.5 3.5-.5c.91 0 1.76.09 2.5.28V9.23c-.87-.15-1.71-.23-2.5-.23c-1.32 0-2.5.15-3.5.46z" />
                                        </svg>
                                        {{ $exam->subMaterial->title }}
                                    </span>

                                    <span class="text-black fw-semibold d-flex fs-6">
                                        <svg width="19" height="19" class="me-2" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.25 6C5.25 5.80109 5.32902 5.61032 5.46967 5.46967C5.61032 5.32902 5.80109 5.25 6 5.25H12C12.1989 5.25 12.3897 5.32902 12.5303 5.46967C12.671 5.61032 12.75 5.80109 12.75 6C12.75 6.19891 12.671 6.38968 12.5303 6.53033C12.3897 6.67098 12.1989 6.75 12 6.75H6C5.80109 6.75 5.61032 6.67098 5.46967 6.53033C5.32902 6.38968 5.25 6.19891 5.25 6ZM6 9.75H12C12.1989 9.75 12.3897 9.67098 12.5303 9.53033C12.671 9.38967 12.75 9.19891 12.75 9C12.75 8.80108 12.671 8.61032 12.5303 8.46967C12.3897 8.32901 12.1989 8.25 12 8.25H6C5.80109 8.25 5.61032 8.32901 5.46967 8.46967C5.32902 8.61032 5.25 8.80108 5.25 9C5.25 9.19891 5.32902 9.38967 5.46967 9.53033C5.61032 9.67098 5.80109 9.75 6 9.75ZM9 11.25H6C5.80109 11.25 5.61032 11.329 5.46967 11.4697C5.32902 11.6103 5.25 11.8011 5.25 12C5.25 12.1989 5.32902 12.3897 5.46967 12.5303C5.61032 12.671 5.80109 12.75 6 12.75H9C9.19891 12.75 9.38967 12.671 9.53033 12.5303C9.67098 12.3897 9.75 12.1989 9.75 12C9.75 11.8011 9.67098 11.6103 9.53033 11.4697C9.38967 11.329 9.19891 11.25 9 11.25ZM18 1.5V11.6897C18.0006 11.8867 17.9621 12.082 17.8866 12.264C17.8111 12.446 17.7002 12.6112 17.5603 12.75L12.75 17.5603C12.6112 17.7002 12.446 17.8111 12.264 17.8866C12.082 17.9621 11.8867 18.0006 11.6897 18H1.5C1.10217 18 0.720644 17.842 0.43934 17.5607C0.158035 17.2793 0 16.8978 0 16.5V1.5C0 1.10217 0.158035 0.720644 0.43934 0.43934C0.720644 0.158035 1.10217 0 1.5 0H16.5C16.8978 0 17.2793 0.158035 17.5607 0.43934C17.842 0.720644 18 1.10217 18 1.5ZM1.5 16.5H11.25V12C11.25 11.8011 11.329 11.6103 11.4697 11.4697C11.6103 11.329 11.8011 11.25 12 11.25H16.5V1.5H1.5V16.5ZM12.75 12.75V15.4406L15.4397 12.75H12.75Z"
                                                fill="black" />
                                        </svg>
                                        {{ count($exam->subMaterialExamQuestions) }} dari
                                        {{ $exam->total_multiple_choice + $exam->total_essay }} Soal
                                    </span>

                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->

                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.exam-question', $exam->id) }}" class="btn btn-primary btn-sm">
                                    Lihat Siswa
                                </a>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Body-->

                    </div>

                    <!--end::Card-->

                </div>
            @empty
                <div class="col-lg-12 text-center">
                    <img src="{{ asset('user-assets/media/misc/no-data.png') }}" style="width: 300px;" alt="" />
                    <h4>Belum ada Ujian yang berlangsung</h4>
                </div>
            @endforelse
            {{ $exams->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
