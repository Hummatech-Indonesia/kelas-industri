@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column justify-content-between">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Sertifikasi
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Tambah Ujian pada kelas industri
            </p>
            <!--end::Breadcrumb-->

        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <div class="btn btn-flex btn-primary h-40px fs-7 fw-bold btn-plus">
                Tambah Ujian
            </div>
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

                            <div class="d-flex align-items-center">

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

                                    <a href=""
                                        class="card-title text-hover-primary font-weight-bolder fs-3 fw-semibold text-dark mb-4">
                                        {{ $exam->title }}
                                    </a>

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
                                <div class="btn btn-danger btn-sm me-2 btn-delete" data-id="{{ $exam->id }}">
                                    Hapus
                                </div>
                                <div class="btn btn-warning btn-sm me-2 btn-edit" data-id="{{ $exam->id }}"
                                    data-title="{{ $exam->title }}" data-start_at="{{ $exam->start_at }}"
                                    data-end_at="{{ $exam->end_at }}"
                                    data-material_id="{{ $exam->submaterial->material->id }}"
                                    data-submaterial_id ="{{ $exam->sub_material_id }}" data-time="{{ $exam->time }}"
                                    data-multiple_choice_value="{{ $exam->multiple_choice_value }}"
                                    data-essay_value="{{ $exam->essay_value }}"
                                    data-total_multiple_choice="{{ $exam->total_multiple_choice }}"
                                    data-total_essay="{{ $exam->total_essay }}"
                                    data-cheating_detector="{{ $exam->cheating_detector }}"
                                    data-last_submit="{{ $exam->last_submit }}">
                                    Edit
                                </div>
                                <a href="{{ route('admin.exam-question', $exam->id) }}" class="btn btn-primary btn-sm">
                                    Lihat Soal
                                </a>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Body-->

                    </div>

                    <!--end::Card-->

                </div>
            @empty
            <x-empty-component title="ujian"/>
            @endforelse

        </div>
    </div>

    <div class="modal fade" id="kt_modal_create_campaign" tabindex="-1" aria-modal="true" role="dialog">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-md">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Tambah Ujian</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_campaign_stepper"
                        data-kt-stepper="true">
                        <!--begin::Nav-->
                        <div class="stepper-nav justify-content-center">
                            <!--begin::Step 1-->
                            <div class="stepper-item me-4 current" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">
                                    Informasi Umum
                                </h3>
                            </div>
                            <!--end::Step 1-->


                            <!--begin::Step 5-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">
                                    Detail
                                </h3>
                            </div>
                            <!--end::Step 5-->
                        </div>
                        <!--end::Nav-->

                        <!--begin::Form-->
                        <form action="{{ route('admin.sub-material-exam.store') }}" method="POST">
                            <!--begin::Step 1-->
                            <div class="current" data-kt-stepper-element="content">
                                @csrf
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <div class="mb-3">
                                        <label class="required form-label @error('title') is-invalid @enderror mb-3">Judul
                                            Ujian</label>
                                        <input type="text" name="title" class="form-control form-control-solid"
                                            id="">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="required form-label @error('sub_material_id') is-invalid @enderror mb-3">Materi
                                            Ujian</label>
                                        <select class="form-select form-select-solid mb-3 @error('material_id') is-invalid @enderror" data-control="select2"
                                            data-placeholder="Pilih Materi" data-type="add" id="select-material-add">
                                        </select>
                                        @error('material_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <select class="form-select form-select-solid select-sub-material @error('material_id') is-invalid @enderror"
                                            data-control="select2" data-placeholder="Pilih Submateri"
                                            name="sub_material_id" id="select-sub-material-add">

                                        </select>
                                        @error('sub_material_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="required form-label mb-3">Tanggal
                                            Mulai Ujian</label>
                                        <div class="input-group" id="kt_td_picker_simple" data-td-target-input="nearest"
                                            data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_basic_2" name="start_at" type="text"
                                                class="form-control  @error('start_at') is-invalid @enderror " data-td-target="#kt_td_picker_basic"
                                                placeholder="04/03/2023, 14.00" autocomplete="off" />
                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic"
                                                data-td-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                            @error('start_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="required form-label mb-3">Tanggl
                                            Selesai Ujian</label>
                                        <div class="input-group" id="kt_td_picker_simple" data-td-target-input="nearest"
                                            data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_basic_1" name="end_at" type="text"
                                                class="form-control  @error('end_at') is-invalid @enderror " data-td-target="#kt_td_picker_basic"
                                                placeholder="04/03/2023, 14.00" autocomplete="off" />
                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic"
                                                data-td-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                            @error('end_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 1-->

                            <!--begin::Step 5-->
                            <div data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <div class="mb-3">
                                        <label class="required form-label @error('time') is-invalid @enderror mb-3">Waktu
                                            pengerjaan (Menit)</label>
                                        <input type="number" name="time" class="form-control form-control-solid mb-3"
                                            id="">
                                        @error('time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label
                                                class="required form-label  mb-3">Bobot
                                                Nilai Pilihan Ganda</label>
                                            <input type="number" name="multiple_choice_value"
                                                class="form-control form-control-solid mb-3 @error('multiple_choice_value') is-invalid @enderror" id="">
                                            @error('multiple_choice_value')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label
                                                class="required form-label @error('essay_value') is-invalid @enderror mb-3">Bobot
                                                Nilai Essay</label>
                                            <input type="number" name="essay_value"
                                                class="form-control form-control-solid mb-3" id="">
                                            @error('essay_value')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label
                                                class="required form-label @error('total_multiple_choice') is-invalid @enderror mb-3">Total
                                                Soal Pilihan Ganda</label>
                                            <input type="number" name="total_multiple_choice"
                                                class="form-control form-control-solid mb-3" id="">
                                            @error('total_multiple_choice')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label
                                                class="required form-label @error('total_essay') is-invalid @enderror mb-3">Total
                                                Soal Essay</label>
                                            <input type="number" name="total_essay"
                                                class="form-control form-control-solid mb-3" id="">
                                            @error('total_essay')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-check form-switch col-6">
                                            <input class="form-check-input last_submit_switch" name="last_submit"
                                                value="0" type="checkbox" role="switch"
                                                id="last_submit_switch-add">
                                            @error('last_submit')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="d-flex">
                                                <label class="form-check-label @error('last_submit') is-invalid @enderror"
                                                    for="flexSwitchCheckDefault">Pengumpulan
                                                    Ujian</label>
                                                <div data-bs-toggle="tooltip" class="ms-2 mb-2" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="*Jika aktif maka siswa hanya bisa mengumpulan 5 menit sebelum ujian berakhir">
                                                    <span class="svg-icon svg-icon-muted"><svg width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch col-6">
                                            <input class="form-check-input cheating_detector_switch"
                                                name="cheating_detector" value="0" type="checkbox" role="switch"
                                                id="cheating_detector_switch">
                                            @error('cheating_detector')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="d-flex">
                                                <label
                                                    class="form-check-label @error('cheating_detector') is-invalid @enderror"
                                                    for="flexSwitchCheckDefault">Sistem
                                                    Kecurangan</label>
                                                <div data-bs-toggle="tooltip" class="ms-2 mb-2" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="*Jika Aktif siswa tidak bisa membukan tab lain">
                                                    <span class="svg-icon svg-icon-muted"><svg width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Step 5-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-3">
                                <!--begin::Wrapper-->
                                <div class="me-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3"
                                        data-kt-stepper-action="previous" data-kt-stepper-state="hide-on-last-step">
                                        <span class="svg-icon svg-icon-muted icon-size-1"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="5" fill="currentColor" />
                                                <path
                                                    d="M12.0657 12.5657L14.463 14.963C14.7733 15.2733 14.8151 15.7619 14.5621 16.1204C14.2384 16.5789 13.5789 16.6334 13.1844 16.2342L9.69464 12.7029C9.30968 12.3134 9.30968 11.6866 9.69464 11.2971L13.1844 7.76582C13.5789 7.3666 14.2384 7.42107 14.5621 7.87962C14.8151 8.23809 14.7733 8.72669 14.463 9.03696L12.0657 11.4343C11.7533 11.7467 11.7533 12.2533 12.0657 12.5657Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span> Kembali
                                    </button>
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Wrapper-->
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        Kirim
                                    </button>
                                    <button type="button" class="btn btn-lg btn-light-primary"
                                        data-kt-stepper-action="next">
                                        Selanjutnya
                                        <span class="svg-icon svg-icon-muted icon-size-1"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="5" fill="currentColor" />
                                                <path
                                                    d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span> </button>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--begin::Modal body-->
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_edit" tabindex="-1" aria-modal="true" role="dialog">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-md">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Edit Ujian</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                {{--
                @if ($errors->any())
                    @dd($errors->messages)
                @endif --}}
                <!--begin::Modal body-->
                <div class="modal-body">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_edit_campaign_stepper"
                        data-kt-stepper="true">
                        <!--begin::Nav-->
                        <div class="stepper-nav justify-content-center">
                            <!--begin::Step 1-->
                            <div class="stepper-item me-4 current" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">
                                    Informasi Umum
                                </h3>
                            </div>
                            <!--end::Step 1-->


                            <!--begin::Step 5-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">
                                    Detail
                                </h3>
                            </div>
                            <!--end::Step 5-->
                        </div>
                        <!--end::Nav-->

                        <!--begin::Form-->
                        <form action="" id="form_edit" method="POST">
                            <!--begin::Step 1-->
                            <div class="current" data-kt-stepper-element="content">
                                @method('PUT')
                                @csrf
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <div class="mb-3">
                                        <label class="required form-label @error('title') is-invalid @enderror mb-3">Judul
                                            Ujian</label>
                                        <input type="text" name="title" class="form-control form-control-solid"
                                            id="title-edit">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="required form-label  mb-3">Materi
                                            Ujian</label>
                                        <select class="form-select form-select-solid mb-3 @error('sub_material_id') is-invalid @enderror" data-control="select2"
                                            data-placeholder="Pilih Materi" data-type="edit" id="select-material-edit">
                                        </select>
                                        <select class="form-select form-select-solid select-sub-material"
                                            data-control="select2" data-placeholder="Pilih Submateri"
                                            name="sub_material_id" id="select-sub-material-edit">

                                        </select>
                                        @error('sub_material_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="required form-label @error('start_at') is-invalid @enderror mb-3">Tanggal
                                            Mulai Ujian</label>
                                        <div class="input-group" id="kt_td_picker_simple" data-td-target-input="nearest"
                                            data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_basic_3" name="start_at" type="text"
                                                class="form-control start_at-edit" data-td-target="#kt_td_picker_basic"
                                                placeholder="04/03/2023, 14.00" autocomplete="off" />
                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic"
                                                data-td-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                            @error('start_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="required form-label @error('end_at') is-invalid @enderror mb-3">Tanggl
                                            Selesai Ujian</label>
                                        <div class="input-group" id="kt_td_picker_simple" data-td-target-input="nearest"
                                            data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_basic_4" name="end_at" type="text"
                                                class="form-control end_at-edit" data-td-target="#kt_td_picker_basic"
                                                placeholder="04/03/2023, 14.00" autocomplete="off" />
                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic"
                                                data-td-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                            @error('end_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 1-->

                            <!--begin::Step 5-->
                            <div data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <div class="mb-3">
                                        <label
                                            class="required form-label @error('end_at') is-invalid @enderror mb-3">Waktu
                                            pengerjaan (Menit)</label>
                                        <input type="number" name="time" class="form-control form-control-solid mb-3"
                                            id="time-edit">
                                        @error('end_at')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label
                                                class="required form-label @error('end_at') is-invalid @enderror mb-3">Bobot
                                                Nilai Pilihan Ganda</label>
                                            <input type="number" name="multiple_choice_value"
                                                class="form-control form-control-solid mb-3"
                                                id="multiple_choice_value_edit">
                                            @error('end_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label
                                                class="required form-label @error('essay_value') is-invalid @enderror mb-3">Bobot
                                                Nilai Essay</label>
                                            <input type="number" name="essay_value"
                                                class="form-control form-control-solid mb-3" id="essay_value_edit">
                                            @error('essay_value')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label
                                                class="required form-label @error('total_multiple_choice') is-invalid @enderror mb-3">Total
                                                Soal Pilihan Ganda</label>
                                            <input type="number" name="total_multiple_choice"
                                                class="form-control form-control-solid mb-3"
                                                id="total_multiple_choice_edit">
                                            @error('total_multiple_choice')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label
                                                class="required form-label @error('total_essay') is-invalid @enderror mb-3">Total
                                                Soal Essay</label>
                                            <input type="number" name="total_essay"
                                                class="form-control form-control-solid mb-3" id="total_essay_edit">
                                            @error('total_essay')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-check form-switch col-6">
                                            <input class="form-check-input last_submit_switch" name="last_submit"
                                                value="0" type="checkbox" role="switch"
                                                id="last_submit_switch-edit">
                                            @error('last_submit')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="d-flex">
                                                <label class="form-check-label @error('last_submit') is-invalid @enderror"
                                                    for="flexSwitchCheckDefault">Pengumpulan
                                                    Ujian</label>
                                                <div data-bs-toggle="tooltip" class="ms-2 mb-2" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="*Jika aktif maka siswa hanya bisa mengumpulan 5 menit sebelum ujian berakhir">
                                                    <span class="svg-icon svg-icon-muted"><svg width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch col-6">
                                            <input class="form-check-input cheating_detector_switch"
                                                name="cheating_detector" value="0" type="checkbox" role="switch"
                                                id="cheating_detector_switch-edit">
                                            @error('cheating_detector')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="d-flex">
                                                <label
                                                    class="form-check-label @error('cheating_detector') is-invalid @enderror"
                                                    for="flexSwitchCheckDefault">Sistem
                                                    Kecurangan</label>
                                                <div data-bs-toggle="tooltip" class="ms-2 mb-2" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="*Jika Aktif siswa tidak bisa membukan tab lain">
                                                    <span class="svg-icon svg-icon-muted"><svg width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="currentColor" />
                                                            <path
                                                                d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Step 5-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-3">
                                <!--begin::Wrapper-->
                                <div class="me-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3"
                                        data-kt-stepper-action="previous" data-kt-stepper-state="hide-on-last-step">
                                        <span class="svg-icon svg-icon-muted icon-size-1"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="5" fill="currentColor" />
                                                <path
                                                    d="M12.0657 12.5657L14.463 14.963C14.7733 15.2733 14.8151 15.7619 14.5621 16.1204C14.2384 16.5789 13.5789 16.6334 13.1844 16.2342L9.69464 12.7029C9.30968 12.3134 9.30968 11.6866 9.69464 11.2971L13.1844 7.76582C13.5789 7.3666 14.2384 7.42107 14.5621 7.87962C14.8151 8.23809 14.7733 8.72669 14.463 9.03696L12.0657 11.4343C11.7533 11.7467 11.7533 12.2533 12.0657 12.5657Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span> Kembali
                                    </button>
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Wrapper-->
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        Kirim
                                    </button>

                                    <button type="button" class="btn btn-lg btn-light-primary"
                                        data-kt-stepper-action="next">
                                        Selanjutnya
                                        <span class="svg-icon svg-icon-muted icon-size-1"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="5" fill="currentColor" />
                                                <path
                                                    d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span> </button>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--begin::Modal body-->
            </div>
        </div>
    </div>

    {{--    delete modal --}}
    <x-delete-modal-component></x-delete-modal-component>
    {{--    end modal --}}
@endsection
@section('script')
    <script>
        $('.btn-plus').click(function() {
            $('#kt_modal_create_campaign').modal('show')
        })

        $(document).ready(function() {
            const datepicker4 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_4"));
            const datepicker3 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_3"));
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            const datepicker1 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_1"));
            datepicker4.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            datepicker3.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            datepicker1.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
        })

        document.addEventListener("DOMContentLoaded", () => {

            $('.btn-delete').click(function() {
                const url = "{{ route('admin.sub-material-exam.destroy', ':id') }}".replace(':id', $(this)
                    .data(
                        'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Stepper lement
            var element = document.querySelector("#kt_modal_edit_campaign_stepper");

            // Initialize Stepper
            var stepper = new KTStepper(element);

            // Handle next step
            stepper.on("kt.stepper.next", function(stepper) {
                stepper.goNext(); // go next step
            });

            // Handle previous step
            stepper.on("kt.stepper.previous", function(stepper) {
                stepper.goPrevious(); // go previous step
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            getMaterial($('#select-material-edit'));
            getMaterial($('#select-material-add'));

            $('#select-material-add, #select-material-edit').change(function() {

                getSubMaterial($(this));
            });

            function getMaterial(select) {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.sub-material-exam.index') }}",
                    success: function(response) {
                        $.each(response, function(index, item) {
                            var option = '<option value="' + item.id + '">' + item.title +
                                '</option>';
                            select.append(option);
                        });
                        getSubMaterial(select);
                    },
                });
            }

            function getSubMaterial(select) {
                $.ajax({
                    url: "{{ route('admin.showSubMaterial') }}",
                    type: 'GET',
                    data: {
                        materialId: select.val()
                    },
                    success: function(response) {
                        $('#select-sub-material-' + select.data('type')).html('');
                        $.each(response, function(index, item) {
                            var option = '<option value="' + item.id + '">' + item.title +
                                '</option>';

                            $('#select-sub-material-' + select.data('type')).append(option);
                        });
                    }
                });
            }
        });

        $('.last_submit_switch').change(function() {
            $(this).val(this.checked ? '1' : '0');
        });
        $('.cheating_detector_switch').change(function() {
            $(this).val(this.checked ? '1' : '0');
        });

        $('.btn-edit').click(function() {

            var id = $(this).data('id')
            var title = $(this).data('title')
            var start_at = $(this).data('start_at')
            var end_at = $(this).data('end_at')
            var material_id = $(this).data('material_id')
            var time = $(this).data('time')
            var total_essay = $(this).data('total_essay')
            var total_multiple_choice = $(this).data('total_multiple_choice')
            var multiple_choice_value = $(this).data('multiple_choice_value')
            var essay_value = $(this).data('essay_value')
            var cheating_detector = $(this).data('cheating_detector')
            var last_submit = $(this).data('last_submit')
            var cheating_detector = $(this).data('cheating_detector')
            $('#title-edit').val(title)
            $('#select-material-edit').val(material_id).trigger('change');
            $('.start_at-edit').val(start_at)
            $('.end_at-edit').val(end_at)
            $('#time-edit').val(time)
            $('#total_multiple_choice_edit').val(total_multiple_choice)
            $('#multiple_choice_value_edit').val(multiple_choice_value)
            $('#essay_value_edit').val(essay_value)
            $('#total_essay_edit').val(total_essay)
            $('#total_essay_edit').val(total_essay)
            $('#form_edit').attr('action', "{{ route('admin.sub-material-exam.update', ':id') }}".replace(':id',
                id))
            $('#kt_modal_edit').modal('show')

            if (last_submit) {
                $('#last_submit_switch-edit').attr('checked', true)
            } else {
                $('#last_submit_switch-edit').attr('checked', false)
            }
            if (cheating_detector) {
                $('#cheating_detector_switch-edit').attr('checked', true)
            } else {
                $('#cheating_detector_switch-edit').attr('checked', false)
            }
        })
    </script>
@endsection
