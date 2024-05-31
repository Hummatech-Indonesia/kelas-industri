@extends('dashboard.user.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container">
        <div class="p-5">
            <h4>Event</h4>
            <h1 class="fw-bold">Selamat Datang, {{ auth()->user()->name }}</h1>

            <div class="col-12 mt-5">
                <div class="row g-2">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card p-3">
                                <img src="https://kodelisensi.com/storage/sliders//slider-kodelisensi-2024-04-05-09-55-44.jpg"
                                    alt="Slider Image" class="img-fluid rounded shadow">
                                <div class="d-flex gap-2 ms-2 align-items-center my-2">
                                    <img alt="Logo" src="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}"
                                        class="h-50px" />
                                    <h5 class="text-primary">
                                        KELAS INDUSTRI HUMMATECH
                                    </h5>
                                </div>
                                <div class="ms-1">
                                    <h6 class="text-hover-primary fw-bold mb-2">Lorem ipsum dolor sit amet consectetur. sit
                                        amet
                                        consectetur.
                                    </h6>
                                    <p>Lorem ipsum dolor sit amet consectetur. sit amet consectetur. Lorem ipsum dolor sit
                                        amet
                                        consectetur. sit amet consectetur. Lorem ipsum dolor sit amet consectetur. sit amet
                                        consectetur. Lorem ipsum dolor sit amet consectetur. sit amet consectetur. Lorem...
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
