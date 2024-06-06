@php
use Carbon\Carbon;
@endphp
@extends('dashboard.user.layouts.certify.app')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->

            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div class="container">
                    <div class="card">
                        <div class="card-header justify-content-center border-0">
                            <h1 class="card-title fw-bold mt-5" style="font-size: 2.5rem;">Verifikasi Sertifikasi</h1>
                        </div>
                        <div class="card-body">
                            <div class="wraper ms-20">
                                <div class="row align-items-center row-gap-5 fw-bolder fs-5 text-gray-600">
                                    <div class="col-3">Nama Penerima</div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <div class="w-100 py-3 ps-8 border border-2 rounded">{{ $participant->user->name }}</div>
                                    </div>
                                    <div class="col-3">Pemberi</div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <div class="w-100 py-3 ps-8 border border-2 rounded">Hummatech</div>
                                    </div>
                                    <div class="col-3">Tanggal Diberikan</div>
                                    <div class="col-1">
                                        <span>:</span>
                                    </div>
                                    <div class="col-8">
                                        <div class="w-100 py-3 ps-8 border border-2 rounded">{{ Carbon::parse($participant->updated_at)->isoFormat('DD-mm-Y') }}</div>
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
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .card .wraper{
            max-width: 60%;
        }

        #preview{
            width: 60%;
        }
    </style>
@endsection
