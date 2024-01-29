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
                                    Nilai Ujian
                                </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                    <!--begin::Item-->

                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">

                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        pilih kelas yang ingin anda nilai.
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->

                                    <!--end::Item-->

                                    <!--begin::Item-->

                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--begin::Content container-->
                <div id="kt_content" class="app-container  container-fluid ">
                    <div class="row">
                        @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                        <form action="{{ route('mentor.exam.index') }}">
                        @elseif(auth()->user()->roles->pluck('name')[0] == 'teacher')
                        <form action="{{ route('teacher.exam.index') }}">
                        @endif
                            <!--begin::Card-->
                            <div class="card mb-7">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Compact form-->
                                    <div class="searching align-items-center">
                                        <!--begin::Input group-->
                                        <div class="position-relative col-lg-10 col-md-12 me-2">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <select name="school_year" class="form-select form-select-solid"
                                                data-control="select2" data-placeholder="Tahun Ajaran">
                                                @foreach ($schoolYear as $year)
                                                    <option {{ $schoolYearFilter == $year->id ? 'selected' : '' }}
                                                        value="{{ $year->id }}">
                                                        {{ $year->school_year }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                            @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                            <a href="{{ route('mentor.exam.index') }}" type="button"
                                                class="btn btn-light text-light"><i class="fonticon-repeat"></i></a>
                                            @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                            <a href="{{ route('teacher.exam.index') }}" type="button"
                                                class="btn btn-light text-light"><i class="fonticon-repeat"></i></a>
                                            @endif
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
                        <div class="col-12">
                            <div class="card">

                                <!--begin::Card body-->
                                <div class="card-body pt-0">

                                    <!--begin::Table-->
                                    @if ($classrooms->count() > 0)
                                        <table id="kt_datatable_responsive"
                                            class="table table-striped border rounded gy-5 gs-7">
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th data-priority="1">No</th>
                                                    <th data-priority="2">Kelas</th>
                                                    @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                    <th data-priority="3">Sekolah</th>
                                                    @endif
                                                    <th data-priority="4">Detail</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                @foreach ($classrooms as $classroom)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $classroom->classroom->name }}</td>
                                                        @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                        <td>{{ $classroom->classroom->school->name }}</td>
                                                        @endif
                                                        <td>
                                                            @if (auth()->user()->roles->pluck('name')[0] == 'mentor')
                                                            <a href="{{ route('mentor.showStudent', [$classroom->classroom->id]) }}">
                                                                <button class="btn btn-default btn-sm p-1">
                                                                    <i class="fa fa-eye fs-3 text-muted"></i>
                                                                </button>
                                                            </a>
                                                            @elseif (auth()->user()->roles->pluck('name')[0] == 'teacher')
                                                            <a href="{{ route('teacher.showStudent', [$classroom->classroom->id]) }}">
                                                                <button class="btn btn-default btn-sm p-1">
                                                                    <i class="fa fa-eye fs-3 text-muted"></i>
                                                                </button>
                                                            </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    @else
                                        <x-empty-component title="ujian" />
                                    @endif
                                    <!--end::Table-->
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
    {{--    Update Status --}}
    {{--    end Update Statusl --}}
@endsection
@section('css')
        <Style>
            @media (max-width:639px){
                .position-relative{
                    margin-bottom: 10px;
                }
            }
            @media (min-width:640px){
                .searching{
                    display: flex;
                }
            }
        </Style>
    @endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });
    </script>
@endsection
