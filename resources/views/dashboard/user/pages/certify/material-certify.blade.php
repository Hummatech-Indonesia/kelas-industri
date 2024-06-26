@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.user.layouts.certify.app')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->

            <div id="kt_app_content" class="app-content position-relative flex-column-fluid ">
                <div class="container">
                    <div class="card bg-white bg-opacity-50">
                        <div class="card-header justify-content-center border-0">
                            <h1 class="card-title fw-bold mt-5" style="font-size: 2.5rem;">Verifikasi Sertifikasi</h1>
                        </div>
                        <div class="card-body">
                            <div class="wraper ms-20">
                                <div class="row align-items-center row-gap-5 fw-bolder fs-5 text-gray-800">
                                    <div class="col-3">Nama Penerima</div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <div class="w-100 py-3 ps-8 border border-2 rounded">{{ $user->name }}</div>
                                    </div>
                                    <div class="col-3">Pemberi</div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <div class="w-100 py-3 ps-8 border border-2 rounded">PT Humma Teknologi Indonesia
                                        </div>
                                    </div>
                                    <div class="col-3">Nomor Sertifikat</div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <div class="w-100 py-3 ps-8 border border-2 rounded">{{ $number }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="preview mt-16">
                                <img src="{{ $image }}" alt="" class="d-block m-auto" id="preview">
                            </div>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('certificate/bg-sertifikat/materi/bottom-left.png') }}" alt=""
                    class="border-img bottom left">
                <img src="{{ asset('certificate/bg-sertifikat/materi/bottom-right.png') }}" alt=""
                    class="border-img bottom right">
                <img src="{{ asset('certificate/bg-sertifikat/materi/top-left.png') }}" alt=""
                    class="border-img top-left">
                <img src="{{ asset('certificate/bg-sertifikat/materi/top-right.png') }}" alt=""
                    class="border-img top-right">
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        @media only screen and (max-width: 600px) {

            .card .wraper {
                max-width: 100% !important;
                margin: 0 !important;
            }

            #preview {
                width: 100% !important;
            }

            #logo {
                width: 110px !important;
            }

            .border-img.bottom {
                width: 100px !important;
            }

            .border-img.bottom.left {
                left: 0;
            }

            .border-img.bottom.right {
                right: 0;
            }

            .border-img.top-left {
                left: 10px !important;
                top: 90px !important;
                width: 50px !important;
            }

            .border-img.top-right {
                right: 40px !important;
                top: 80px !important;
                width: 50px !important;
            }
        }

        #logo {
            width: 250px !important;
        }

        .card .wraper {
            max-width: 60%;
        }

        #preview {
            width: 60%;
        }

        .border-img {
            position: absolute;
            z-index: -1;

        }

        .border-img.bottom {
            width: 400px;
            bottom: 0;
        }

        .border-img.bottom.left {
            left: 0;
        }

        .border-img.bottom.right {
            right: 0;
        }

        .border-img.top-left {
            left: 120px;
            top: 80px;
            width: 150px;
        }

        .border-img.top-right {
            right: 120px;
            top: 50px;
            width: 150px;
        }
    </style>
@endsection
