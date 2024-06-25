@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Perhitungan
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Tambah Perhitungan
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

        </div>
        <!--end::Actions-->
    </div>
    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.spk.batch.store') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                            <div class="card-header" style="">

                                <div class="card-toolbar">

                                    <a href="{{ route('admin.spk.criteria.index') }}"
                                        class="btn btn-light-primary font-weight-bolder me-2">

                                        <i class="ki ki-long-arrow-back icon-sm"></i>

                                        Kembali

                                    </a>

                                    <div class="btn-group">

                                        <button type="submit" class="btn btn-primary font-weight-bolder">

                                            <i class="ki ki-check icon-sm"></i>

                                            Simpan

                                        </button>

                                    </div>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <input class="form-control form-control-solid form-control-lg" name="name"
                                                type="text" value="{{ old('name') }}" placeholder="Nama Batch"
                                                required>

                                        </div>

                                    </div>
                                    <div class="form-group row mb-3">
                                        @if(auth()->user()->roles->pluck('name')[0] == 'admin')
                                        <label class="col-xl-3 col-lg-3 col-form-label">Sekolah</label>

                                        <div class="col-lg-9 col-xl-9 mb-3">
                                            <select name="school_id" id="school_id"
                                                class="form-select rounded-start-0" data-control="select2"
                                                data-placeholder="Pilih Sekolah">
                                                <option></option>
                                                @foreach ($schools as $school)
                                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="col-xl-3 col-lg-3 col-form-label">Kelas</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <select name="classroom_id" id="classroom_id"
                                                class="form-select rounded-start-0" data-control="select2"
                                                data-placeholder="Pilih Kelas">
                                                <option></option>

                                            </select>
                                        </div>
                                        @else
                                        <label class="col-xl-3 col-lg-3 col-form-label">Kelas</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <select name="classroom_id" id="classroom_id"
                                                class="form-select rounded-start-0" data-control="select2"
                                                data-placeholder="Pilih Kelas">
                                                <option></option>
                                                @foreach (auth()->user()->classrooms as $classroom)
                                                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Nilai Ujian Yang Diambil</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <select name="exam_type" id="exam_type"
                                                class="form-select rounded-start-0" data-control="select2"
                                                data-placeholder="Pilih Ujian">
                                                <option></option>
                                                <option value="all">Semua</option>
                                                <option value="uts">UTS</option>
                                                <option value="uas">UAS</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Nilai Semester Yang Diambil</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <select name="semester" id="semester"
                                                class="form-select rounded-start-0" data-control="select2"
                                                data-placeholder="Pilih Semester">
                                                <option></option>
                                                <option value="all">Semua</option>
                                                <option value="ganjil">Ganjil</option>
                                                <option value="genap">Genap</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>

    $('#school_id').change(function(){
        console.log('tes')
        $.ajax({
            url: '{{Route("classroomBySchool")}}'+'?schoolId='+$(this).val(),
            success:function(response){
                $('#classroom_id').html('')
                $.each(response,function(index,item){
                    $('#classroom_id').append(`<option value="${item.id}"> ${item.name} </option>`)
                })
            }
        })
    })
</script>
@endsection
