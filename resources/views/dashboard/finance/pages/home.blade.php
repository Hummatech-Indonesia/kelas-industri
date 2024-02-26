@extends('dashboard.finance.layout.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Beranda
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Halaman beranda.
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">


        </div>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-md-3">
                <h3>Selamat datang, 
                    {{-- {{ auth()->user()->name }} --}}
                </h3>
            </div>

        </div>
        {{-- @elseif (auth()->user()->roles->pluck('name')[0] == 'admin') --}}
            <div class="covercard row gap-2 mt-4">
                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 3c2.21 0 4 1.79 4 4s-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4m4 10.54c0 1.06-.28 3.53-2.19 6.29L13 15l.94-1.88c-.62-.07-1.27-.12-1.94-.12s-1.32.05-1.94.12L11 15l-.81 4.83C8.28 17.07 8 14.6 8 13.54c-2.39.7-4 1.96-4 3.46v4h16v-4c0-1.5-1.6-2.76-4-3.46Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah Mentor 
                            {{-- {{ $mentor }} --}}
                        </span>
                    </div>
                </a>
                <a href="#" class="card hover-elevate-up col shadow-sm parent-hover">
                    <div class="card-body d-flex align-items">
                        <span class="w-4 h-4 my-auto fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z" />
                            </svg>
                        </span>

                        <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold my-auto">
                            Jumlah Guru 
                            {{-- {{ $student }} --}}
                        </span>
                    </div>
                </a>
            </div>
        {{-- @endif --}}

    </div>
@endsection
@section('css')
    <Style>
        @media (max-width:639px) {
            .covercard {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:640px) {
            .searching {
                display: flex;
            }
        }
    </Style>
@endsection
