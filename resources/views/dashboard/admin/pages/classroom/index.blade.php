@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Kelas
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List kelas di sekolah anda.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form id="form-search" action="{{ route('school.classrooms.index') }}">
                <div class="col-12">
                    <!--begin::Card-->
                    <div class="card mb-7">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Compact form-->
                            <div class="searching align-items-center">
                                <!--begin::Input group-->
                                <div class="position-relative col-lg-6 col-md-12 me-3">
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
                                        value="{{ $search }}" placeholder="Search">
                                </div>
                                <div class="position-relative col-lg-2 col-md-12 me-3">
                                    <select name="filter" class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Select an option" id="schoolYear">
                                        @foreach ($school_years as $school_year)
                                            <option {{ $filter == $school_year->id ? 'selected' : '' }}
                                                value="{{ $school_year->id }}">
                                                {{ $school_year->school_year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="position-relative col-lg-2 col-md-12 me-3">
                                    <select name="generation_id" class="form-select form-select-solid me-5"
                                        data-control="select2" data-placeholder="Select an option" id="generations">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <button class="btn btn-primary" id="btn-search">Cari</button>
                                    <a href="{{ route('school.classrooms.index') }}" type="button"
                                        class="btn btn-light text-light"><i class="fonticon-repeat"></i></a>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Compact form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
            </form>
        </div>
        <div class="row">
            @forelse($classrooms as $classroom)
                <div class="col-xl-4 mb-3">

                    <!--begin::Card-->

                    <div class="card card-custom gutter-b card-stretch">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Section-->

                            <div class="d-flex align-items-center">

                                <!--begin::Pic-->

                                <div class="flex-shrink-0 me-4 symbol symbol-65 symbol-circle me-5">

                                    <span
                                        class="font-size-h5 symbol-label bg-primary text-inverse-primary h1 font-weight-boldest">{{ substr($classroom->name, 0, 1) }}</span>
                                </div>

                                <!--end::Pic-->

                                <!--begin::Info-->

                                <div class="d-flex flex-column me-auto">

                                    <!--begin: Title-->

                                    <a href="https://class.hummasoft.com/siswa/materi/11/4"
                                        class="card-title text-hover-primary font-weight-bolder font-size-h6 text-dark mb-1">

                                        {{ $classroom->name }}
                                    </a>


                                    <span class="text-muted font-weight-bold">
                                        {{ $classroom->name }}
                                    </span>

                                    <span class="text-muted font-weight-bold">
                                        {{ $classroom->generation->generation }}
                                        ({{ $classroom->generation->schoolYear->school_year }})
                                    </span>

                                    <!--end::Title-->

                                </div>

                                <!--end::Info-->

                            </div>

                            <!--end::Section-->

                            <!--begin::Content-->


                            <!--end::Content-->

                            <!--begin::Text-->

                            <p class="mb-7 mt-5">

                                {{ $classroom->description }}
                            </p>

                            <!--end::Text-->


                        </div>

                        <!--end::Body-->

                        <!--begin::Footer-->

                        <div class="card-footer d-flex flex-row justify-content-between">

                            <div class="d-flex">

                                <div class="d-flex align-items-center me-5">
                                    <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/communication/com014.svg-->
                                    <span class="svg-icon svg-icon-muted svg-icon-2x"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                                fill="currentColor" />
                                            <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2"
                                                fill="currentColor" />
                                            <path
                                                d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                                fill="currentColor" />
                                            <rect opacity="0.3" x="6" y="5" width="6" height="6"
                                                rx="3" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <a href="{{ route('school.classrooms.show', $classroom->id) }}"
                                        class="fw-bold text-info ml-2">{{ $classroom->students()->whereHas('studentSchool', function ($q) {
                                                $q->whereHas('student', function ($q) {
                                                    $q->where('status', 'active');
                                                });
                                            })->count() }}
                                        Siswa</a>


                                </div>


                            </div>

                            <a href="{{ route('school.classrooms.show', $classroom->id) }}"
                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>

                        </div>

                        <!--end::Footer-->

                    </div>

                    <!--end::Card-->

                </div>
            @empty
                <x-empty-component title="kelas" />
            @endforelse
        </div>
        <div class="row">
            {{ $classrooms->appends(request()->query())->links() }}
        </div>
        <x-delete-modal-component />
    </div>
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
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $('.btn-delete').click(function() {
                const url = "{{ route('school.classrooms.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })

            $('#btn-search').click(function() {
                window.location.href = "{{ route('school.classrooms.index', 'search=' . ':id') }}".replace(
                    ':id', $("input[name='search']").val())
            })
        });

        getGenertation($('#schoolYear').val())
        
        function getGenertation(schoolYear) {
            $.ajax({
                method: 'GET',
                url: '{{ route('school.classrooms.index') }}',
                data: {
                    school_year_id: schoolYear
                },
                success: function(generations) {
                    $('#generations').html('')
                    console.log(generations)
                    let html = '<option value=""></option>'

                    generations.map(generation => {
                        if (generation.id == "{{ request()->generation_id }}") {
                            html +=
                                `<option selected value="${generation.id}">${generation.generation}</option>`
                        } else {
                            html +=
                                `<option value="${generation.id}">${generation.generation}</option>`
                        }
                    })

                    $('#generations').html(html)
                },
                error: function(response) {
                    console.log(response.responseText)
                }
            })
        }

        $('#schoolYear').change(function() {
            getGenertation($(this).val())
        })
    </script>
@endsection
