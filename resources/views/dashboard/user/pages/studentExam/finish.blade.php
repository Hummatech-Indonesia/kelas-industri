@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.exam.layouts.app')
@section('content')
    <div class="container mt-10 mx-auto w-50">
        <div class="card">
            <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span class="fw-bolder fs-5 text-white"> Ujian Telah Selesai
                    Diselesaikan
                </span>
            </div>

            <div class="card-body">
                <div class="icon mb-7">
                    <img src="{{ asset('user-assets/media/icons/duotune/ecommerce/Group 1318.png') }}" alt=""
                        class="d-block m-auto mb-5">
                    <h1 class="title text-center fs-1">{{ $subMaterialExam->title }}</h1>
                </div>
                <div class="content fs-3">
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bold">Tanggal Ujian</div>
                        <div class="col col-sm-9"><spanclass="me-1">:
                                </span>{{ Carbon::parse($subMaterialExam->start_at)->locale('id')->isoFormat('dddd, DD MMMM YYYY, HH:ss') }}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bold">Mulai Ujian</div>
                        <div class="col col-sm-9"><span
                                class="me-1">:</span>{{ Carbon::parse($studentSubmaterialExam->created_at)->format('H:i') }}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bold">Selesai Ujian</div>
                        <div class="col col-sm-9"><span
                                class="me-1">:</span>{{ Carbon::parse($studentSubmaterialExam->finished_exam)->format('H:i') }}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bold">Total Soal</div>
                        <div class="col col-sm-9"><span
                                class="me-1">:</span>{{ $subMaterialExam->total_multiple_choice + $subMaterialExam->total_essay }}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bold">Pilihan Ganda Benar</div>
                        <div class="col col-sm-9"><span class="me-1">:</span>{{ $studentSubmaterialExam->true_answer }}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5 col-sm-3 fw-bold">Nilai</div>
                        <div class="col col-sm-9"><span class="me-1">:</span>
                            @if ($studentSubmaterialExam->submaterialExam->total_essay == 0)
                                {{ $studentSubmaterialExam->score }}
                            @else
                                <div class="badge badge-light-warning">Proses</div>
                            @endif
                        </div>
                    </div>

                    <a href=
                    "{{ route('common.showSubMaterial', ['classroom' => auth()->user()->studentSchool->studentClassroom->classroom->id, 'material' => $subMaterialExam->subMaterial->material_id, 'submaterial' => $subMaterialExam->sub_material_id]) }}"
                        class="btn btn-primary w-100 py-3 mt-5">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
