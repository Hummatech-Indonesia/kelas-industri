@php
    use App\Enums\MaterialExamTypeEnum;
@endphp
@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column justify-content-between">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Test Materi
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Test untuk materi
            </p>
            <!--end::Breadcrumb-->

        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">

        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            @forelse ($exams as $exam)
                <div class="col-xl-4 mb-5">

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
                                        style="width:60px;height:60px;">{{ substr($exam->material->title, 0, 1) }}</span>
                                </div>

                                <!--end::Pic-->

                                <!--begin::Info-->

                                <div class="d-flex flex-column me-auto mb-3">

                                    <!--begin: Title-->

                                    <a href=""
                                        class="card-title text-hover-primary font-weight-bolder fs-3 fw-semibold text-dark mb-4">
                                        {{ $exam->material->title }}
                                    </a>


                                    <span class="text-black fw-semibold d-flex fs-6 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" class="me-2" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22q-1.875 0-3.512-.712t-2.85-1.925t-1.925-2.85T3 13t.713-3.512t1.924-2.85t2.85-1.925T12 4t3.513.713t2.85 1.925t1.925 2.85T21 13t-.712 3.513t-1.925 2.85t-2.85 1.925T12 22m2.8-4.8l1.4-1.4l-3.2-3.2V8h-2v5.4zM5.6 2.35L7 3.75L2.75 8l-1.4-1.4zm12.8 0l4.25 4.25l-1.4 1.4L17 3.75zM12 20q2.925 0 4.963-2.037T19 13t-2.037-4.962T12 6T7.038 8.038T5 13t2.038 4.963T12 20"/></svg>
                                        {{ $exam->time }} Menit
                                    </span>

                                    <span class="text-black fw-semibold d-flex fs-6">
                                        <svg width="19" height="19" class="me-2" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.25 6C5.25 5.80109 5.32902 5.61032 5.46967 5.46967C5.61032 5.32902 5.80109 5.25 6 5.25H12C12.1989 5.25 12.3897 5.32902 12.5303 5.46967C12.671 5.61032 12.75 5.80109 12.75 6C12.75 6.19891 12.671 6.38968 12.5303 6.53033C12.3897 6.67098 12.1989 6.75 12 6.75H6C5.80109 6.75 5.61032 6.67098 5.46967 6.53033C5.32902 6.38968 5.25 6.19891 5.25 6ZM6 9.75H12C12.1989 9.75 12.3897 9.67098 12.5303 9.53033C12.671 9.38967 12.75 9.19891 12.75 9C12.75 8.80108 12.671 8.61032 12.5303 8.46967C12.3897 8.32901 12.1989 8.25 12 8.25H6C5.80109 8.25 5.61032 8.32901 5.46967 8.46967C5.32902 8.61032 5.25 8.80108 5.25 9C5.25 9.19891 5.32902 9.38967 5.46967 9.53033C5.61032 9.67098 5.80109 9.75 6 9.75ZM9 11.25H6C5.80109 11.25 5.61032 11.329 5.46967 11.4697C5.32902 11.6103 5.25 11.8011 5.25 12C5.25 12.1989 5.32902 12.3897 5.46967 12.5303C5.61032 12.671 5.80109 12.75 6 12.75H9C9.19891 12.75 9.38967 12.671 9.53033 12.5303C9.67098 12.3897 9.75 12.1989 9.75 12C9.75 11.8011 9.67098 11.6103 9.53033 11.4697C9.38967 11.329 9.19891 11.25 9 11.25ZM18 1.5V11.6897C18.0006 11.8867 17.9621 12.082 17.8866 12.264C17.8111 12.446 17.7002 12.6112 17.5603 12.75L12.75 17.5603C12.6112 17.7002 12.446 17.8111 12.264 17.8866C12.082 17.9621 11.8867 18.0006 11.6897 18H1.5C1.10217 18 0.720644 17.842 0.43934 17.5607C0.158035 17.2793 0 16.8978 0 16.5V1.5C0 1.10217 0.158035 0.720644 0.43934 0.43934C0.720644 0.158035 1.10217 0 1.5 0H16.5C16.8978 0 17.2793 0.158035 17.5607 0.43934C17.842 0.720644 18 1.10217 18 1.5ZM1.5 16.5H11.25V12C11.25 11.8011 11.329 11.6103 11.4697 11.4697C11.6103 11.329 11.8011 11.25 12 11.25H16.5V1.5H1.5V16.5ZM12.75 12.75V15.4406L15.4397 12.75H12.75Z"
                                                fill="black" />
                                        </svg>
                                        {{ count($exam->materialExamQuestions) }} dari
                                        {{ $exam->total_multiple_choice + $exam->total_essay }} Soal
                                    </span>

                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                                <div class="card-toolbar" style="margin-bottom: 25%;">
                                    <!--begin::Menu-->
                                    <button
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                        <span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="4" fill="currentColor" />
                                                <rect x="11" y="11" width="2.6" height="2.6" rx="1.3"
                                                    fill="currentColor" />
                                                <rect x="15" y="11" width="2.6" height="2.6" rx="1.3"
                                                    fill="currentColor" />
                                                <rect x="7" y="11" width="2.6" height="2.6" rx="1.3"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true" style="">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                Aksi</div>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.materialExam-question', $exam->id) }}"
                                                class="menu-link px-3">
                                                Lihat Soal
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="" class="menu-link px-3">
                                                Lihat Hasil
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                    </div>


                                    <!--begin::Menu 2-->

                                    <!--end::Menu 2-->

                                    <!--end::Menu-->
                                </div>

                            </div>
                            <div class="d-flex justify-content-md-end flex-wrap gap-2">
                                <div class="btn btn-danger btn-sm btn-delete" data-bs-toggle="tooltip" class="ms-2 mb-2"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Data"
                                    data-id="{{ $exam->id }}">
                                    <span class="svg-icon svg-icon-white svg-icon-1x m-0"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="btn btn-warning btn-sm btn-edit" data-bs-toggle="tooltip" class="ms-2 mb-2"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data"
                                    data-id="{{ $exam->id }}" data-title="{{ $exam->title }}"
                                    data-start_at="{{ $exam->start_at }}" data-end_at="{{ $exam->end_at }}"
                                    data-material_id="{{ $exam->material->id }}"
                                    data-material_id ="{{ $exam->sub_material_id }}" data-time="{{ $exam->time }}"
                                    data-multiple_choice_value="{{ $exam->multiple_choice_value }}"
                                    data-essay_value="{{ $exam->essay_value }}"
                                    data-total_multiple_choice="{{ $exam->total_multiple_choice }}"
                                    data-total_essay="{{ $exam->total_essay }}"
                                    data-cheating_detector="{{ $exam->cheating_detector }}"
                                    data-last_submit="{{ $exam->last_submit }}">
                                    <span class="svg-icon svg-icon-white svg-icon-1x m-0"><svg width="24"
                                            height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                                fill="currentColor" />
                                            <path
                                                d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                                fill="currentColor" />
                                            <path
                                                d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Body-->

                    </div>

                    <!--end::Card-->

                </div>
            @empty
                <x-empty-component title="ujian" />
            @endforelse

        </div>
    </div>

    <div class="modal fade" id="kt_modal_edit" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Test</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="" id="form_edit" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="w-100">
                            <div class="mb-3">
                                <label class="required form-label @error('end_at') is-invalid @enderror mb-3">Waktu
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
                                    <label class="required form-label @error('end_at') is-invalid @enderror mb-3">Bobot
                                        Nilai Pilihan Ganda</label>
                                    <input type="number" name="multiple_choice_value"
                                        class="form-control form-control-solid mb-3" id="multiple_choice_value_edit">
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
                                    <input type="number" name="essay_value" class="form-control form-control-solid mb-3"
                                        id="essay_value_edit">
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
                                        class="form-control form-control-solid mb-3" id="total_multiple_choice_edit">
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
                                    <input type="number" name="total_essay" class="form-control form-control-solid mb-3"
                                        id="total_essay_edit">
                                    @error('total_essay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-check form-switch col-6">
                                    <input class="form-check-input last_submit_switch" name="last_submit" value="0"
                                        type="checkbox" role="switch" id="last_submit_switch-edit">
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
                                            <span class="svg-icon svg-icon-muted"><svg width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                        rx="10" fill="currentColor" />
                                                    <path
                                                        d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check form-switch col-6">
                                    <input class="form-check-input cheating_detector_switch" name="cheating_detector"
                                        value="0" type="checkbox" role="switch"
                                        id="cheating_detector_switch-edit">
                                    @error('cheating_detector')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="d-flex">
                                        <label class="form-check-label @error('cheating_detector') is-invalid @enderror"
                                            for="flexSwitchCheckDefault">Sistem
                                            Kecurangan</label>
                                        <div data-bs-toggle="tooltip" class="ms-2 mb-2" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip"
                                            data-bs-title="*Jika Aktif siswa tidak bisa membukan tab lain">
                                            <span class="svg-icon svg-icon-muted"><svg width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                        rx="10" fill="currentColor" />
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{--    delete modal --}}
    <x-delete-modal-component></x-delete-modal-component>
    {{--    end modal --}}
@endsection
@section('script')
    <script>
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
                const url = "{{ route('admin.material-exam.destroy', ':id') }}".replace(':id', $(this)
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

                getmaterial($(this));
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
                        getmaterial(select);
                    },
                });
            }

            function getmaterial(select) {
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
            $('#form_edit').attr('action', "{{ route('admin.material-exam.update', ':id') }}".replace(':id',
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
