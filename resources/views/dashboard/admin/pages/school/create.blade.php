@php
    use App\Enums\SubMaterialExamTypeEnum;
@endphp
@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Sekolah
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman tambah sekolah
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

        </div>
        <!--end::Actions-->
    </div>
    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form action="{{ route('admin.schools.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Sekolah

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                <a href="{{ route('admin.schools.index') }}"
                                    class="btn btn-light-primary font-weight-bolder me-2">

                                    <i class="ki ki-long-arrow-back icon-sm"></i>

                                    Kembali

                                </a>

                                <div class="btn-group">

                                    <button type="submit" class="btn btn-primary font-weight-bolder">

                                        <i class="ki ki-check icon-sm"></i>

                                        Simpan

                                    </button>

                                </div>

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="name"
                                            type="text" value="{{ old('name') }}" placeholder="SMK INDUSTRI 1"
                                            required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama Kepala Sekolah</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="headmaster"
                                            type="text" value="{{ old('headmaster') }}"
                                            placeholder="Afrizal Himawan, S.Kom" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Alamat</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <textarea class="form-control form-control-solid form-control-lg" name="address" type="text"
                                            placeholder="Jl. Ramah Tamah Ngijo Karangploso Malang" required="">{{ old('address') }}</textarea>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Telepon</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="phone_number"
                                            type="text" value="{{ old('phone_number') }}" placeholder="083000000000"
                                            required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="email"
                                            type="text" value="{{ old('email') }}" placeholder="smkindustri1@gmail.com"
                                            required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <div class="fv-row" data-kt-password-meter="true">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Kata Sandi</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="position-relative">
                                                    <input class="form-control form-control-lg form-control-solid"
                                                        type="password" placeholder="Kata Sandi" name="password"
                                                        autocomplete="off" />

                                                    <!--begin::Visibility toggle-->
                                                    <span
                                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                        data-kt-password-meter-control="visibility">
                                                        <i class="fa-solid fa-eye-slash fs-3"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span><span class="path4"></span></i>
                                                        <i class="fa-solid fa-eye d-none fs-3"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span></i>

                                                    </span>
                                                    <!--end::Visibility toggle-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <div class="fv-row" data-kt-password-meter="true">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Konfirmasi Kata Sandi</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="position-relative">
                                                    <input class="form-control form-control-lg form-control-solid"
                                                        type="password" placeholder="Konfirmasi Kata Sandi"
                                                        name="password_confirmation" autocomplete="off" required="" />

                                                    <!--begin::Visibility toggle-->
                                                    <span
                                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                        data-kt-password-meter-control="visibility">
                                                        <i class="fa-solid fa-eye-slash fs-3"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span><span class="path4"></span></i>
                                                        <i class="fa-solid fa-eye d-none fs-3"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span></i>

                                                    </span>
                                                    <!--end::Visibility toggle-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Logo</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="photo"
                                            type="file" value="" placeholder="password" required="">

                                    </div>

                                </div>
                                <div class="form-check form-switch col-6">
                                    <input class="form-check-input cheating_detector_switch" name="regristation_exam"
                                        value="0" type="checkbox" role="switch" id="regristation-exam-toggle">
                                    @error('cheating_detector')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="d-flex">
                                        <label class="form-check-label @error('cheating_detector') is-invalid @enderror"
                                            for="flexSwitchCheckDefault">Ujian Seleksi</label>
                                        <div data-bs-toggle="tooltip" class="ms-2 mb-2" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip"
                                            data-bs-title="*Jika ditambahkan ujan untuk seleksi siswa">
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

                                <div class="d-none" id="regristation-exam">
                                    <div class="my-10">
                                        <hr>
                                    </div>
                                    <h3 class="my-5">Ujian Seleksi</h3>
                                    <input type="hidden" name="type"
                                        value="{{ SubMaterialExamTypeEnum::REGISTER->value }}">
                                    <div class="row gap-3">
                                        <div class="col w-100 border-end">
                                            <div class="mb-3">
                                                <label
                                                    class="required form-label @error('sub_material_id') is-invalid @enderror mb-3">Materi
                                                    Ujian</label>
                                                <select
                                                    class="form-select form-select-solid mb-3 @error('material_id') is-invalid @enderror"
                                                    data-control="select2" data-placeholder="Pilih Materi"
                                                    data-type="add" id="select-material-add">
                                                </select>
                                                @error('material_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <select
                                                    class="form-select form-select-solid select-sub-material @error('material_id') is-invalid @enderror"
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
                                                <label class="required form-label mb-3">Tanggal
                                                    Mulai Ujian</label>
                                                <div class="input-group" id="kt_td_picker_simple"
                                                    data-td-target-input="nearest" data-td-target-toggle="nearest">
                                                    <input id="kt_td_picker_basic_2" name="start_at" type="text"
                                                        class="form-control  @error('start_at') is-invalid @enderror "
                                                        data-td-target="#kt_td_picker_basic"
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
                                                <label class="required form-label mb-3">Tanggal
                                                    Selesai Ujian</label>
                                                <div class="input-group" id="kt_td_picker_simple"
                                                    data-td-target-input="nearest" data-td-target-toggle="nearest">
                                                    <input id="kt_td_picker_basic_1" name="end_at" type="text"
                                                        class="form-control  @error('end_at') is-invalid @enderror "
                                                        data-td-target="#kt_td_picker_basic"
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
                                        <div class="col row mb-3">
                                            <div class="col-6">
                                                <label
                                                    class="required form-label @error('time') is-invalid @enderror mb-3">Waktu
                                                    pengerjaan (Menit)</label>
                                                <input type="number" name="time"
                                                    class="form-control form-control-solid mb-3" id="" value="{{ old('time') }}">
                                                @error('time')
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
                                                    class="form-control form-control-solid mb-3" id="" value="{{ old('total_multiple_choice') }}">
                                                @error('total_multiple_choice')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label
                                                    class="required form-label @error('total_multiple_choice') is-invalid @enderror mb-3">Total
                                                    Peserta</label>
                                                <input type="number" name="total_student"
                                                    class="form-control form-control-solid mb-3" id="" value="{{ old('total_student') }}">
                                                @error('total_multiple_choice')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col row">
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
                                                        <label
                                                            class="form-check-label @error('last_submit') is-invalid @enderror"
                                                            for="flexSwitchCheckDefault">Pengumpulan
                                                            Ujian</label>
                                                        <div data-bs-toggle="tooltip" class="ms-2 mb-2"
                                                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                            data-bs-title="*Jika aktif maka siswa hanya bisa mengumpulan 5 menit sebelum ujian berakhir">
                                                            <span class="svg-icon svg-icon-muted"><svg width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.3" x="2" y="2" width="20"
                                                                        height="20" rx="10"
                                                                        fill="currentColor" />
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
                                                        name="cheating_detector" value="0" type="checkbox"
                                                        role="switch" id="cheating_detector_switch">
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
                                                        <div data-bs-toggle="tooltip" class="ms-2 mb-2"
                                                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                            data-bs-title="*Jika Aktif siswa tidak bisa membukan tab lain">
                                                            <span class="svg-icon svg-icon-muted"><svg width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.3" x="2" y="2" width="20"
                                                                        height="20" rx="10"
                                                                        fill="currentColor" />
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
                                </div>
                            </div>
                        </div>
                        <!--end::Actions-->

                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#regristation-exam-toggle').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#regristation-exam').removeClass('d-none');
                    console.log(true);
                } else {
                    $('#regristation-exam').addClass('d-none');
                    console.log(false);
                }
            });
        });
    </script>
    <script>
        $('.btn-plus').click(function() {
            $('#kt_modal_create_campaign').modal('show')
        })

        $(document).ready(function() {
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            const datepicker1 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_1"));
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            datepicker1.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
        })
    </script>
    <script>
        $(document).ready(function() {
            getMaterial($('#select-material-add'));

            $('#select-material-add').change(function() {
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
    </script>
@endsection
