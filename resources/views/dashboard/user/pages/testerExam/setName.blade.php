@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.exam.layouts.app')
@section('content')
    <div class="container mt-10 mx-auto w-80 w-md-75 w-lg-50">
        <div class="card">
            <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span class="fw-bolder fs-5 text-white"> Anda Akan Mengerjakan
                    Ujian Seleksi
                </span>
            </div>

            <form action="{{ route('tester.exam-update-name', $subMaterialExam->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center">
                        <div class="mb-5 w-100">
                            <div class="content fs-3">
                                <label for="" class="fomr-label">Inputkan Nama Anda</label>
                                <input class="form-control" type="text" name="name" id="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-50">Lanjut</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
