@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Angkatan
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                halaman angkatan di setiap tahun ajaran
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::school year-->
            <select name="school_year_id" id="year" class="form-select form-select-solid me-5" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                @foreach($schoolYears as $schoolYear)
                    <option {{ ($selectedSchoolYear == $schoolYear->id) ? 'selected' : '' }} value="{{ $schoolYear->id }}">{{ $schoolYear->school_year }}</option>
                @endforeach
            </select>
            <!--end::school yeaer-->
            <!--begin::Button-->
            <button class="btn btn-dark fw-bold ms-5"  data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                Tambah            </button>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>

{{--    delete modal --}}
<x-delete-modal-component></x-delete-modal-component>
{{--    end modal --}}

{{--    add modal --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Angkatan</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('admin.generations.store') }}" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label class="mb-3" for="">Angkatan</label>
                            <input type="text" class="form-control" name="generation" placeholder="Angkatan 11">
                        </div>
                        <div class="col-12 mt-5">
                            <label class="mb-3" for="">Tahun Ajaran</label>
                            <select name="school_year_id" class="form-select" data-control="select2" data-placeholder="Select an option">
                                @foreach($schoolYears as $schoolYear)
                                    <option value="{{ $schoolYear->id }}">{{ $schoolYear->school_year }}</option>
                                @endforeach
                            </select>
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
{{--    end modal --}}

{{--    end modal --}}
<div class="modal fade" tabindex="-1" id="kt_modal_update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Tahun Ajaran</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>
            <form action="" id="form-update" method="POST">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label class="mb-3" for="">Angkatan</label>
                            <input type="text" class="form-control" id="edit-generation" name="generation" placeholder="Angkatan 11">
                        </div>
                        <div class="col-12 mt-5">
                            <label class="mb-3" for="">Tahun Ajaran</label>
                            <select name="school_year_id" id="select-school-year" class="form-select" data-control="select2" data-placeholder="Select an option">
                                @foreach($schoolYears as $schoolYear)
                                    <option value="{{ $schoolYear->id }}">{{ $schoolYear->school_year }}</option>
                                @endforeach
                            </select>
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
{{--    end modal --}}

    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            @forelse($generations as $generation)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-5">

                <!--begin::Card-->

                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Body-->

                    <div class="card-body">


                        <!--begin::Section-->

                        <div class="d-flex align-items-center">

                            <!--begin::Info-->

                            <div class="d-flex flex-column mr-auto">

                                <!--begin: Title-->

                                <h5 class="card-title text-hover-primary fw-bolder font-size-h5 text-dark mb-1">

                                    {{ $generation->generation }}
                                </h5>

                                <!--end::Title-->

                            </div>

                            <!--end::Info-->

                        </div>

                        <!--end::Section-->




                    </div>

                    <!--end::Body-->

                    <!--begin::Footer-->

                    <div class="card-footer d-flex align-items-center flex-row justify-content-between">

                        <div class="d-flex">

                            <div class="d-flex align-items-center">

                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/general/gen055.svg-->
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
<path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
<path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
</svg>
</span>
                                <!--end::Svg Icon-->

                                <a href="#" data-item="{{ $generation }}" class="fw-bold text-primary ms-2 btn-update">Edit</a>

                            </div>



                        </div>

                        <div class="d-flex">

                            <div class="d-flex align-items-center">

                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-30-131017/core/html/src/media/icons/duotune/general/gen040.svg-->
                                <span class="svg-icon svg-icon-danger svg-icon-2x"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor"/>
<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor"/>
</svg>
</span>
                                <!--end::Svg Icon-->

                                <a href="#" class="fw-bold text-danger ms-2 btn-delete" data-id="{{ $generation->id }}">Hapus</a>

                            </div>



                        </div>

                    </div>

                    <!--end::Footer-->

                </div>



                <!--end:: Card-->

            </div>
            @empty
                <x-empty-component title="angkatan"></x-empty-component>
            @endforelse
        </div>

        <x-pagination-component :paginator="$generations" route="admin.generations.index"></x-pagination-component>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $('select:not(.normal)').each(function () {
                $(this).select2({
                    dropdownParent: $(this).parent()
                });
            });

            $('#year').change(function() {
                window.location.href = "{{ route('admin.generations.index', 'search=' . ':id') }}".replace(':id', $(this).val())
            })

            $('.btn-delete').click(function() {
                const url = "{{ route('admin.generations.destroy', ':id') }}".replace(':id', $(this).data('id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })

            $('.btn-update').click(function() {
                const item = $(this).data('item')
                $('#edit-generation').val(item.generation)
                $('#select-school-year').val(item.school_year_id)
                $('#select-school-year').trigger('change')

                const url = "{{ route('admin.generations.update', ':id') }}".replace(':id', item.id)
                $('#form-update').attr('action', url)


                $('#kt_modal_update').modal('show')
            })
        });

        @if(\Illuminate\Support\Facades\Session::has('success'))
        Swal.fire({
            text: "{{ Session::get('success') }}",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        @endif
    </script>
@endsection
