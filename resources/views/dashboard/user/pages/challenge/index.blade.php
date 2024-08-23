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
                            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                                    Tantangan
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        @role('student')
                                            <a href="{{ route('student.challenges.index') }}"
                                                class="text-muted text-hover-primary">
                                                Tantangan </a>
                                        @endrole
                                        @role('teacher')
                                            <a href="{{ route('teacher.challenges.index') }}"
                                                class="text-muted text-hover-primary">
                                                Tantangan </a>
                                        @endrole
                                        @role('mentor')
                                            <a href="{{ route('mentor.challenges.index') }}"
                                                class="text-muted text-hover-primary">
                                                Tantangan </a>
                                        @endrole
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-2 py-md-1">

                                <!--begin::Button-->
                                @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                    <a href="{{ route('teacher.challenges.create') }}" class="btn btn-dark fw-bold">
                                        Tambah </a>
                                @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                    <a href="{{ route('mentor.challenges.create') }}" class="btn btn-dark fw-bold">
                                        Tambah </a>
                                @endif
                                <!--end::Button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-fluid ">

                    <div class="row">
                        @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                            <form id="form-search" action="{{ route('mentor.challenges.index') }}">
                                <!--begin::Card-->
                                <div class="card mb-7">
                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <!--begin::Compact form-->
                                        <div class="searching align-items-center">
                                            <!--begin::Input group-->
                                            <div class="position-relative col-md-12 col-lg-10 me-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                <span
                                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                            height="2" rx="1"
                                                            transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                                        </rect>
                                                        <path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <input type="text" class="form-control form-control-solid ps-10"
                                                    name="search" value="{{ $search }}" placeholder="Search">
                                            </div>
                                            <div class="col-lg-2 col-md-12">
                                                <button type="submit" class="btn btn-primary">Cari</button>
                                                <a href="{{ route('mentor.challenges.index') }}" type="button"
                                                    class="btn btn-light text-light" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Muat Ulang Data"><i class="fonticon-repeat"></i></a>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Compact form-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </form>
                        @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                            <form id="form-search" action="{{ route('teacher.challenges.index') }}">
                                <!--begin::Card-->
                                <div class="card mb-7">
                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <!--begin::Compact form-->
                                        <div class="searching align-items-center">
                                            <!--begin::Input group-->
                                            <div class="position-relative col-md-12 col-lg-10 me-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                <span
                                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                            height="2" rx="1"
                                                            transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                                        </rect>
                                                        <path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <input type="text" class="form-control form-control-solid ps-10"
                                                    name="search" value="{{ $search }}" placeholder="Search">
                                            </div>
                                            <div class="col-lg-2 col-md-12">
                                                <button type="submit" class="btn btn-primary">Cari</button>
                                                <a href="{{ route('teacher.challenges.index') }}" type="button"
                                                    class="btn btn-light text-light" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Muat Ulang Data"><i class="fonticon-repeat"></i></a>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Compact form-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </form>
                        @elseif (auth()->user()->roles->pluck('name')[0] == 'student')
                            <form id="form-search" action="{{ route('student.challenges.index') }}">
                                <!--begin::Card-->
                                <div class="card mb-7">
                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <!--begin::Compact form-->
                                        <div class="searching align-items-center">
                                            <!--begin::Input group-->
                                            <div class="position-relative col-lg-5 col-md-12 me-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                <span
                                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6"><svg
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                            height="2" rx="1"
                                                            transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                                        </rect>
                                                        <path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <input type="text" class="form-control form-control-solid ps-10"
                                                    name="search" value="{{ $search }}" placeholder="Search">
                                            </div>
                                            <div class="position-relative col-lg-3 col-md-12 me-2">
                                                <select name="status" class="form-select form-select-solid me-5"
                                                    data-control="select2" data-placeholder="Status">
                                                    <option value="-1" {{ $status == '-1' ? 'selected' : '' }}>Semua
                                                        Status</option>
                                                    <option value="Sudah" {{ $status == 'Sudah' ? 'selected' : '' }}>
                                                        Sudah Dikerjakan</option>
                                                    <option value="Belum" {{ $status == 'Belum' ? 'selected' : '' }}>
                                                        Belum Dikerjakan</option>
                                                </select>
                                            </div>
                                            <div class="position-relative col-lg-2 col-md-12 me-2">
                                                <select name="difficulty" class="form-select form-select-solid me-5"
                                                    data-control="select2" data-placeholder="Status">
                                                    <option value="-1" {{ $difficulty == '-1' ? 'selected' : '' }}>
                                                        Semua Kesulitan</option>
                                                    <option value="mudah" {{ $difficulty == 'mudah' ? 'selected' : '' }}>
                                                        Mudah</option>
                                                    <option value="sedang"
                                                        {{ $difficulty == 'sedang' ? 'selected' : '' }}>Sedang</option>
                                                    <option value="sulit" {{ $difficulty == 'sulit' ? 'selected' : '' }}>
                                                        Sulit</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-md-12">
                                                <button type="submit" class="btn btn-primary">Cari</button>
                                                <a href="{{ route('student.challenges.index') }}" type="button"
                                                    class="btn btn-light text-light" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Muat Ulang Data"><i class="fonticon-repeat"></i></a>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Compact form-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </form>
                        @endif
                    </div>

                    <div class="row">
                        @forelse($challenges as $challenge)
                            <div class="col-xl-4 mb-5">

                                <!--begin::Card-->

                                <div class="card card-custom gutter-b card-stretch">

                                    <!--begin::Body-->

                                    <div class="card-body">


                                        <!--begin::Data-->

                                        <div class="d-flex justify-content-between mb-5">

                                            <div class="d-flex align-items-center mr-7">

                                                <span class="badge badge-light-danger font-weight-bold btn-upper btn-text">

                                                    Batas :

                                                    {{ \Carbon\Carbon::parse($challenge->end_date)->locale('id')->isoFormat('D MMMM YYYY HH:mm') }}
                                                </span>

                                            </div>
                                            @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                <div class="d-flex">
                                                    <a href="{{ route('teacher.challenges.edit', $challenge->id) }}"
                                                        class="btn btn-default btn-sm p-1"><i
                                                            class="fonticon-setting fs-2 text-warning"></i></a>
                                                    <button class="btn btn-default btn-sm p-1 btn-delete"
                                                        data-id="{{ $challenge->id }}"><i
                                                            class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                                </div>
                                            @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                <div class="d-flex">
                                                    <a href="{{ route('mentor.challenges.edit', $challenge->id) }}"
                                                        class="btn btn-default btn-sm p-1"><i
                                                            class="fonticon-setting fs-2 text-warning"></i></a>
                                                    <button class="btn btn-default btn-sm p-1 btn-delete-mentor"
                                                        data-id="{{ $challenge->id }}"><i
                                                            class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                                </div>
                                            @endif


                                        </div>

                                        <!--end::Data-->


                                        <!--begin::Info-->

                                        <div class="d-flex align-items-center">

                                            <!--begin::Pic-->


                                            <div
                                                class="flex-shrink-0 mr-4 symbol symbol-60 symbol-circle  symbol-danger me-3">

                                                <span
                                                    class="font-size-h5 symbol-label font-weight-boldest">{{ substr($challenge->title, 0, 1) }}</span>

                                            </div>


                                            <!--end::Pic-->

                                            <!--begin::Info-->

                                            <div class="d-flex flex-column mr-auto">

                                                <!--begin: Title-->

                                                <div class="d-flex flex-column mr-auto">

                                                    @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                                        <a href="{{ route('student.challenges.show', $challenge->id) }}"
                                                            class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">
                                                            {{ $challenge->title }}
                                                        </a>
                                                    @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                        <a href="{{ route('teacher.challenges.show', $challenge->id) }}"
                                                            class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">
                                                            {{ $challenge->title }}
                                                        </a>
                                                    @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                        <a href="{{ route('mentor.challenges.show', $challenge->id) }}"
                                                            class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">
                                                            {{ $challenge->title }}
                                                        </a>
                                                    @endif

                                                </div>

                                                <!--end::Title-->

                                            </div>

                                            <!--end::Info-->

                                        </div>

                                        <!--end::Info-->
                                        <div class="mt-3 font-weight-bold">
                                            @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                {{ $challenge->classroom->name }} -
                                                {{ $challenge->classroom->school->name }}
                                            @endif
                                        </div>
                                        <!--begin::Description-->

                                        <div class="mb-10 mt-5 font-weight-bold"
                                            style="text-overflow: ellipsis;overflow: hidden ;max-width: 300px ;white-space: nowrap">
                                            {!! Str::limit($challenge->description, 20, '...') !!}
                                        </div>

                                        <!--end::Description-->


                                        @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                            <div class="d-flex justify-content-between align-items-center mb-3">

                                                <span class="text-dark-75 font-weight-bolder mr-2">Kesulitan :
                                                    @if ($challenge->difficulty == 'sulit')
                                                        <span
                                                            class="badge badge-light-danger font-weight-bold btn-upper btn-text">
                                                            Sulit</span>
                                                    @elseif ($challenge->difficulty == 'sedang')
                                                        <span
                                                            class="badge badge-light-warning font-weight-bold btn-upper btn-text">
                                                            Sedang</span>
                                                    @else
                                                        <span
                                                            class="badge badge-light-success font-weight-bold btn-upper btn-text">
                                                            Mudah</span>
                                                    @endif
                                                </span>
                                                {{-- @dd($challenge->StudentSubmitChallenge) --}}

                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">

                                                <span class="text-dark-75 font-weight-bolder mr-2">Status :
                                                    @if ($challenge->studentSubmitChallenge)
                                                        <span
                                                            class="badge badge-light-success font-weight-bold btn-upper btn-text">Sudah
                                                            Dikerjakan</span>
                                                    @else
                                                        <span
                                                            class="badge badge-light-danger font-weight-bold btn-upper btn-text">Belum
                                                            Dikerjakan</span>
                                                    @endif
                                                </span>
                                                {{-- @dd($challenge->StudentSubmitChallenge) --}}

                                            </div>
                                        @endif


                                    </div>

                                    <!--end::Body-->

                                    <!--begin::Footer-->

                                    <div class="card-footer">
                                        @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                            <div class="d-grid gap-2">

                                                <a href="{{ route('teacher.challenges.show', $challenge->id) }}"
                                                    class="btn btn-primary btn-sm" type="button">Selengkapnya</a>

                                            </div>
                                        @elseif (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                            <div class="d-grid gap-2">

                                                <a href="{{ route('mentor.challenges.show', $challenge->id) }}"
                                                    class="btn btn-primary btn-sm" type="button">Selengkapnya</a>

                                            </div>
                                        @elseif (auth()->user()->roles->pluck('name')[0] == 'student')
                                            <div class="d-grid gap-2">

                                                <a href="{{ route('student.challenges.show', $challenge->id) }}"
                                                    class="btn btn-primary btn-sm" type="button">Selengkapnya</a>

                                            </div>
                                        @endif

                                        <!--end::Footer-->

                                    </div>

                                    <!--end:: Card-->

                                </div>
                            </div>
                        @empty
                            <x-empty-component title="Tantangan" />
                        @endforelse
                    </div>
                </div>
                <!--end::Content container-->
            </div>
            <div class="row">
                {{ $challenges->appends(request()->query())->links() }}
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->

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
                    <li class="menu-item"><a href="https://keenthemes.com/" target="_blank"
                            class="menu-link px-2">Tentang
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


        <x-delete-modal-component />
        <!--end::Footer-->
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
                const url = "{{ route('teacher.challenges.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })

            $('.btn-delete-mentor').click(function() {
                const url = "{{ route('mentor.challenges.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })

            $('#btn-search').click(function() {
                window.location.href = "{{ route('teacher.challenges.index', 'search=' . ':id') }}"
                    .replace(
                        ':id', $("input[name='search']").val())
            })


        });
    </script>
@endsection
