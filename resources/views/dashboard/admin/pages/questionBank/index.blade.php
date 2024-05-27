@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                {{ $material->title }} - (Bank Soal)
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    {{ count($material->subMaterials) }} Bab
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form action="#">
                <!--begin::Card-->
                <div class="card mb-7">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Compact form-->
                        <div class="searching align-items-center">
                            <!--begin::Input group-->
                            <div class="position-relative col-lg-10 col-md-12">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span
                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                        </rect>
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" class="form-control form-control-solid ps-10" name="search"
                                    value="" placeholder="Search">
                            </div>
                            <div class="col-lg-2 col-md-12 ms-3">
                                <button type="submit" class="btn btn-primary me-2">Cari</button>
                                <a href="{{ route('admin.materials.show', $material->id) }}" type="button"
                                    class="btn btn-light text-light" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Muat Ulang"><i
                                        class="fonticon-repeat"></i>
                                </a>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Compact form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </form>
        </div>
        <div class="row">
            @forelse($subMaterials as $subMaterial)
                <div class="col-xl-4 mb-3">

                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Section-->

                            <div class="d-flex align-items-center">

                                <!--begin::Pic-->

                                <div class="flex-shrink-0 mr-4 symbol symbol-65 symbol-circle me-5">

                                    <span
                                        class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($subMaterial->title, 0, 1) }}</span>



                                </div>

                                <!--end::Pic-->

                                <!--begin::Info-->

                                <div class="d-flex flex-column me-auto">

                                    <!--begin: Title-->

                                    <a href="{{ route('admin.submaterials.show', $subMaterial->id) }}"
                                        class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1"
                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 130px ;white-space: nowrap">

                                        {{ $subMaterial->title }}
                                    </a>



                                    <span class="text-muted font-weight-bold"
                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 150px ;white-space: nowrap">

                                        {{ $material->title }}
                                    </span>

                                    <!--end::Title-->

                                </div>

                                <!--end::Info-->

                            </div>

                            <!--end::Section-->

                            <!--begin::Content-->



                            <!--end::Content-->

                            <!--begin::Text-->
                            <div class="mb-3 mt-5">

                                <span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                        <path
                                            d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.2C9.7 3 10.2 3.20001 10.4 3.60001ZM16 12H13V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V12H8C7.4 12 7 12.4 7 13C7 13.6 7.4 14 8 14H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V14H16C16.6 14 17 13.6 17 13C17 12.4 16.6 12 16 12Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M11 14H8C7.4 14 7 13.6 7 13C7 12.4 7.4 12 8 12H11V14ZM16 12H13V14H16C16.6 14 17 13.6 17 13C17 12.4 16.6 12 16 12Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                Total Seluruh Soal
                            </div>
                            <div class="mt-3">
                                <span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                        <path opacity="0.3" d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z"
                                            fill="currentColor" />
                                        <path
                                            d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                Soal anda inputkan
                            </div>


                            <!--end::Text-->
                        </div>

                        <!--end::Body-->

                        <!--begin::Footer-->

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('admin.submaterials.show', $subMaterial->id) }}"
                                        class="btn btn-primary btn-sm text-uppercase font-weight-bolder">Lihat
                                        Soal</a>
                                </div>
                                <div class="col-6">
                                    <a type="button"
                                        class="btn btn-warning btn-sm text-uppercase font-weight-bolder btn-create"
                                        data-bs-toggle="modal" data-sumaterialid={{ $subMaterial->id }}
                                        data-bs-target="#kt_modal_create">Tambah
                                        Soal</a>
                                </div>
                            </div>
                        </div>

                        <!--end::Footer-->

                    </div>

                    <!--end::Card-->

                </div>
            @empty
                <x-empty-component title="bab" />
            @endforelse
        </div>
        <div class="row">
            <x-pagination-component :paginator="$subMaterials" route="admin.materials.show" :parameters="$parameters" />
        </div>
        <x-delete-modal-component />
    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Pilih Tipe Soal</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="d-flex justify-content-center">
                    <img width="50%" src="{{ asset('app-assets/media/illustrations/sigma-1/17-dark.png') }}"
                        alt="" srcset="">
                </div>
                <div class="text-center mt-3 mb-3 fs-4 fw-semibold">Pilih Salah satu tipe soal yang ingin ditambahkan</div>
                <div class="d-flex justify-content-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="" id="flexCheckDefault1"
                            name="radio2">
                        <label class="form-check-label fw-bold" for="flexCheckDefault1">
                            Pilihan Ganda
                        </label>
                    </div>
                    <div class="ms-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="" id="flexCheckChecked1"
                                name="radio2">
                            <label class="form-check-label fw-bold" for="flexCheckChecked1">
                                Pilihan Essay
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer row d-flex justify-content-center">
                    <button type="button" class="btn btn-danger col-5" data-bs-dismiss="modal">Batal</button>
                    <a href="#" type="button" class="btn btn-primary col-5">Pilih</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const multipleChoiceRadio = document.getElementById('flexCheckDefault1');
        const essayRadio = document.getElementById('flexCheckChecked1');
        const pilihButton = document.querySelector('.modal-footer a');
        let sumaterialid;
        $('.btn-create').click(function() {
            sumaterialid = $(this).data('sumaterialid');
        })

        multipleChoiceRadio.addEventListener('change', function() {
            if (this.checked) {
                pilihButton.href = `{{ route('admin.question-bank-multiplechoice', '') }}/${sumaterialid}`;
            }
        });

        essayRadio.addEventListener('change', function() {
            if (this.checked) {
                pilihButton.href = `{{ route('admin.question-bank-essay', '') }}/${sumaterialid}`;
            }
        });
    </script>
@endsection
@section('css')
    <Style>
        @media (max-width:639px) {
            .position-relative {
                margin-bottom: 10px;
            }
        }

        @media (min-width:640px) {
            .searching {
                display: flex;
            }
        }
    </Style>
@endsection
