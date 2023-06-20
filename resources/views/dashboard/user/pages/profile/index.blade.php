@php use Carbon\Carbon; @endphp
@extends('dashboard.user.layouts.app')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">


            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_toolbar" class="app-toolbar py-4 py-lg-8 ">


                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack flex-wrap ">
                        <!--begin::Toolbar wrapper-->
                        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                            <!--begin::Page title-->
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    <div class="row">
                        @if ($errors->any())
                            <div class="col-12">
                                <x-errors-component />
                            </div>
                        @endif
                        <div class="col-12">
                            <div class="card">
                                <form id="kt_account_profile_details_form"
                                    action="{{ route('profile.update', auth()->id()) }}" method="POST" class="form"
                                    enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Photo</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline {{ !$user->photo ? 'image-input-empty' : '' }}"
                                                    data-kt-image-input="true"
                                                    style="background-image: url({{ asset('app-assets/media/svg/avatars/blank.svg') }})">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: {{ $user->photo ? 'url(' . asset('storage/' . $user->photo) . ')' : 'none' }}">
                                                    </div>
                                                    <!--end::Preview existing avatar-->

                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>

                                                        <!--begin::Inputs-->
                                                        <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->

                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->

                                                <!--begin::Hint-->
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Col-->
                                        </div>

                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-12 fv-row">
                                                        <input type="text" name="name"
                                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                            placeholder="John Doe" value="{{ $user->name }}" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="email" name="email"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="johndoe@gmail.com" value="{{ $user->email }}" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nomor
                                                Telepon</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="phone_number"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="083848xxxxxx" value="{{ $user->phone_number }}" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Alamat</label>
                                            <!--end::Label-->

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <textarea class="form-control form-control-lg form-control-solid" name="address" placeholder="Jl. Soekarno Hatta No 9">{{ $user->address }}</textarea>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->

                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_1">
                                            Ganti Password
                                        </button>
                                        <button type="submit" class="btn btn-primary"
                                            id="kt_account_profile_details_submit">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>

                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <form action="{{ route('profile.updatePassword', auth()->id()) }}" method="POST" class="form">
            @method('PATCH')
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Ganti Password</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="form-group row mb-3">

                            <label class="col-form-label required fw-semibold fs-6">Password Lama</label>

                            <div class="col-lg-12 col-xl-12">

                                <input class="form-control form-control-solid form-control-lg" name="current_password"
                                    type="password" value="{{ old('title') }}" placeholder="Password Lama"
                                    required="">

                            </div>

                        </div>
                        <div class="form-group row mb-3">

                            <label class="col-form-label required fw-semibold fs-6">Password Baru</label>

                            <div class="col-lg-12 col-xl-12">

                                <input class="form-control form-control-solid form-control-lg" name="new_password"
                                    type="password" value="{{ old('title') }}" placeholder="Masukkan Password Baru"
                                    required="">

                            </div>

                        </div>
                        <div class="form-group row mb-3 ">

                            <label class="col-form-label required fw-semibold fs-6">Konfirmasi Password</label>

                            <div class="col-lg-12 col-xl-12">

                                <input class="form-control form-control-solid form-control-lg"
                                    name="new_password_confirmation" type="password" value="{{ old('title') }}"
                                    placeholder="Konfirmasi Password" required="">

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer ">
        <!--begin::Footer container-->
        <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">{{ Carbon::now()->format('Y') }}©</span>
                <a href="https://keenthemes.com/" target="_blank" class="text-gray-800 text-hover-primary">Kelas
                    Industri</a>
            </div>
            <!--end::Copyright-->

            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item"><a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">Tentang
                        Kami</a></li>

                <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank"
                        class="menu-link px-2">Syarat & Ketentuan</a></li>

                <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank"
                        class="menu-link px-2">Kebijakan Privasi</a></li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
    </div>
    <x-delete-modal-component />
    {{--    end Update Statusl --}}
@endsection
