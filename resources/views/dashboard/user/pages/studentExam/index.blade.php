@extends('dashboard.exam.layouts.app')

@section('css')
    <style>
        .card .badge {
            width: 30px;
            height: 30px;
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-10">
        <div class="row gap-3">
            <div class="col col-md-8 card p-0">
                <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span class="fw-bold text-white">1/4 (Pilihan Ganda)</span>
                </div>
                <div class="card-body">
                    <div class="question mb-9">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit tempore voluptates commodi et
                            dolor, sint doloribus aut animi facere sapiente consequuntur nulla reiciendis, deserunt
                            reprehenderit, sit minus hic alias? Consequatur?</p>
                        <img src="{{ asset('storage/school-logo/Mask group.png') }}" alt="">
                    </div>
                    <div class="answer">
                        <div class="mt-3">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" value="" id="flexRadioDefault" />
                                <label class="form-check-label" for="flexRadioDefault">
                                    Default radio
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" value="" id="flexRadioDefault" />
                                <label class="form-check-label" for="flexRadioDefault">
                                    Default radio
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" value="" id="flexRadioDefault" />
                                <label class="form-check-label" for="flexRadioDefault">
                                    Default radio
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" value="" id="flexRadioDefault" />
                                <label class="form-check-label" for="flexRadioDefault">
                                    Default radio
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-5 mt-5">
                    <div class="d-flex justify-content-end">
                        <div class="d-flex justify-content-evenly" style="width: 120px">
                            <span class="d-flex justify-content-center align-items-center rounded bg-warning text-light"
                                style="width: 32.5px; height: 32.5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-flag-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
                                </svg>
                            </span>
                            <span class="svg-icon svg-icon-light svg-icon-2hx bg-primary rounded"><svg width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.33.o3g/2000/svg">
                                    <path
                                        d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <span class="svg-icon svg-icon-light svg-icon-2hx bg-primary rounded"><svg width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.33.o3g/2000/svg">
                                    <path
                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col card p-0">
                <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span class="fw-bold text-white">Nomor Soal</span>
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="m-3 d-flex flex-column align-items-center text-warning fw-bolder bg-warning-subtle rounded"
                        style="width: 200px; height: fit-content;">
                        <span>Siswa Waktu</span>
                        <span class="fs-3">00:00:00</span>
                    </div>
                    <p class="w-100 mt-4 text-start">Pilihan Ganda</p>
                    <ul class="nav nav-tabs nav-line-tabs mb-5 p-0 pb-4 fs-6 row row-cols-5 gap-3 w-100">
                        @foreach (range(0, 20) as $i)
                            <div class="col p-0 m-0 h-50px w-50px">
                                <li class="nav-item border rounded d-flex justify-content-center p-0 m-0 h-100 w-100">
                                    <a class="nav-link d-flex align-items-center justify-content-center m-0 p-0 w-100 "
                                        data-bs-toggle="tab" href="#kt_tab_pane_{{ $i }}">{{ $i }}</a>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                    <p class="w-100 text-start">Esai</p>
                    <ul class="nav nav-tabs nav-line-tabs mb-5 p-0 pb-4 fs-6 row row-cols-5 gap-3 w-100">
                        @foreach (range(1,5) as $i)
                            <div class="col p-0 m-0 h-50px w-50px">
                                <li class="nav-item border rounded d-flex justify-content-center p-0 m-0 h-100 w-100">
                                    <a class="nav-link d-flex align-items-center justify-content-center m-0 p-0 w-100 "
                                        data-bs-toggle="tab" href="#kt_tab_pane_{{ $i }}">{{ $i }}</a>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                    <button class="btn btn-primary w-100">Selesai Ujian</button>
                </div>

            </div>
        </div>
    </div>
@endsection
