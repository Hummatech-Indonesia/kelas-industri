@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.exam.layouts.app')
@section('content')
    <div class="container mt-10 mx-auto w-80 w-md-75 w-lg-50">
        <!--begin::Alert-->
        <div class="alert alert-warning d-flex align-items-center p-5">
            <!--begin::Icon-->
            <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span
                    class="path2"></span></i>
            <!--end::Icon-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-column">
                <!--begin::Title-->
                <h4 class="mb-1 text-warning">Penting!</h4>
                <!--end::Title-->

                <!--begin::Content-->
                <ul>
                    <li>Pastikan anda benar-benar memahami peraturan ujian</li>
                </ul>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Alert-->

        <div class="card">
            <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span class="fw-bolder fs-5 text-white"> Peraturan
                </span>
            </div>

            <div class="card-body fs-5">
                <ol>
                    <li>Waktu Pengerjaan {{ $subMaterialExam->time }} menit</li>
                    <li>Tidak boleh meninggalkan halaman ujian sebelum diselesaikan</li>
                    <li>Hal yang dianggap kecurangan:
                        <br>
                        <ul>
                            <li>Membuka aplikasi lain</li>
                            <li>Membuka Tab Lain</li>
                            <li>Berinteraksi dengan hal-hal lain diluar halaman ujian</li>
                            <li>Semua Shortcut laptop yang berpotensi membuka/memunculkan tab ke layar</li>
                        </ul>
                    </li>
                    <li>Jika lebih dari 3 kali, ujian anda akan otomatis di submit</li>
                    <li>Mohon Tidak Keluar dari mode fullscreen</li>
                    <li>Mohon notifikasi yang muncul dari Handphone & Laptop</li>
                </ol>

            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('tester.exam-setname', $subMaterialExam->id) }}" class="btn btn-sm btn-primary px-10 mt-3 ms-100">Lanjut</a>
        </div>
    </div>
@endsection
