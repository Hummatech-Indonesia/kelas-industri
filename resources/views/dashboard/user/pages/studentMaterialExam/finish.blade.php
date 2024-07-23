@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.exam.layouts.app')
@section('content')
    <div class="container mt-10 mx-auto w-80 w-md-75 w-lg-50">
        <div class="card">
            <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span class="fw-bolder fs-5 text-white"> Terimakasih Sudah Melaksanakan Ujan
                </span>
            </div>

            <div class="card-body">
                <div class="icon mb-7">
                    <img src="{{ asset('user-assets/media/icons/duotune/ecommerce/Group 1318.png') }}" alt=""
                        class="d-block m-auto mb-5" style="width: 150px;">
                    <h1 class="title text-center fs-1">{{ $materialExam->title }}</h1>
                </div>
                <div class="content fs-3">
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Mulai Ujian</div>
                        <div class="col col-sm-9"><span
                                class="me-1">:</span><span class="fs-5">{{ Carbon::parse($studentMaterialExam->created_at)->format('H:i') }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Selesai Ujian</div>
                        <div class="col col-sm-9"><span
                                class="me-1">:</span><span class="fs-5">{{ Carbon::parse($studentMaterialExam->finished_exam)->format('H:i') }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Total Soal</div>
                        <div class="col col-sm-9"><span
                                class="me-1">:</span><span class="fs-5">{{ $materialExam->total_multiple_choice + $materialExam->total_essay }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Pilihan Ganda Benar</div>
                        <div class="col col-sm-9"><span class="me-1">:</span><span class="fs-5">{{ $studentMaterialExam->true_answer }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Nilai</div>
                        <div class="col col-sm-9"><span class="me-1">:</span>
                            @if ($essayGraded)
                                <span class="fs-5">{{ $studentMaterialExam->score }}</span>
                            @else
                                <div class="badge badge-light-warning">Proses</div>
                            @endif
                        </div>
                    </div>
                    <a href= "{{ route('student.materials', auth()->user()->studentSchool->studentClassroom->classroom->id) }}" class="btn btn-primary w-100 py-3 mt-5">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
