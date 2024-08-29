@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.exam.layouts.app')
@section('content')
    <div class="container mt-10 mx-auto w-80 w-md-75 w-lg-50">
        <div class="card">
            <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span class="fw-bolder fs-5 text-white"> Ujian Telah Selesai
                    Diselesaikan
                </span>
            </div>

            <div class="card-body">
                <div class="icon mb-7">
                    <img src="{{ asset('user-assets/media/icons/duotune/ecommerce/Group 1318.png') }}" alt=""
                        class="d-block m-auto mb-5" style="width: 150px;">
                    <h1 class="title text-center fs-1">{{ $subMaterialExam->title }}</h1>
                </div>
                <div class="content fs-3">
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Tanggal Ujian</div>
                        <div class="col col-sm-9"><span class="me-1">:
                                </span><span class="fs-5">{{ Carbon::parse($subMaterialExam->start_at)->locale('id')->isoFormat('dddd, DD MMMM YYYY, HH:ss') }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Mulai Ujian</div>
                        <div class="col col-sm-9"><span
                                class="me-1">:</span><span class="fs-5">{{ Carbon::parse($studentSubmaterialExam->created_at)->format('H:i') }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Selesai Ujian</div>
                        <div class="col col-sm-9"><span
                                class="me-1">:</span><span class="fs-5">{{ Carbon::parse($studentSubmaterialExam->finished_exam)->format('H:i') }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Total Soal</div>
                        <div class="col col-sm-9"><span
                                class="me-1">:</span><span class="fs-5">{{ $subMaterialExam->total_multiple_choice + $subMaterialExam->total_essay }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Pilihan Ganda Benar</div>
                        <div class="col col-sm-9"><span class="me-1">:</span><span class="fs-5">{{ $studentSubmaterialExam->true_answer }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bolder fs-5">Nilai</div>
                        <div class="col col-sm-9"><span class="me-1">:</span>
                            @if ($essayGraded)
                                <span class="fs-5">{{number_format($studentSubmaterialExam->score, 0) }}</span>
                            @else
                                <div class="badge badge-light-warning">Proses</div>
                            @endif
                        </div>
                    </div>

                    @role('student')
                    <a href=
                    "{{ route('student.showSubMaterial', ['classroom' => auth()->user()->studentSchool->studentClassroom->classroom->id, 'material' => $subMaterialExam->subMaterial->material_id, 'submaterial' => $subMaterialExam->sub_material_id]) }}"
                        class="btn btn-primary w-100 py-3 mt-5">Kembali</a>
                    @else
                    <a href=
                    "{{ route('common.showSubMaterial', ['classroom' => auth()->user()->studentSchool->studentClassroom->classroom->id, 'material' => $subMaterialExam->subMaterial->material_id, 'submaterial' => $subMaterialExam->sub_material_id]) }}"
                        class="btn btn-primary w-100 py-3 mt-5">Kembali</a>
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection
