@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.exam.layouts.app')
@section('content')
    <div class="container mt-10 mx-auto w-80 w-md-75 w-lg-50">
        <div class="card">
            <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span class="fw-bolder fs-5 text-white"> Anda Akan mengerjakan
                    ujian seleksi
                </span>
            </div>

            <form action="{{ route('student.exam') }}">
                <div class="card-body">
                    <div class="icon mb-7">
                        <img src="{{ asset('user-assets/media/icons/duotune/ecommerce/Group 1318.png') }}" alt=""
                            class="d-block m-auto mb-5" style="width: 150px;">
                        <h1 class="title text-center fs-1">{{ $subMaterialExam->title }}</h1>
                    </div>
                    <div class="content fs-3">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
