<div class="modal fade" id="kt_modal_bidding" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                        width="30">
                        <path
                            d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                    </svg>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="form-submit" action="" method="POST">
                    @method('POST')
                    @csrf
                    {{-- <input type="hidden" name="reward_id" id="reward_id" value=""> --}}
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Form Kirim Hadiah</h1>
                        <!--end::Title-->

                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5">
                            Masukkan data yang valid agar dapat mengirim hadiah sampai kerumah kalian
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Input group-->

                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">No Hp</span>
                        </label>
                        <!--end::Label-->

                        <!--begin::Select2-->
                        <input type="number" class="form-select form-select-solid" name="phone_number"
                            placeholder="083000000000">
                        <!--end::Select2-->
                    </div>
                    <!--end::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Alamat</span>
                        </label>
                        <!--end::Label-->

                        <!--begin::Select2-->
                        <textarea class="form-control form-control-solid form-control-lg" name="address" type="text"
                            placeholder="Jl. Ramah Tamah Ngijo Karangploso Malang" required="">{{ old('address') }}</textarea>
                        <!--end::Select2-->
                    </div>
                    <!--end::Notice-->


                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel"
                            data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
