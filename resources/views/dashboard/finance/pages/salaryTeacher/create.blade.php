@extends('dashboard.finance.layout.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Bukti Gaji
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Bukti Gaji
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

        </div>
        <!--end::Actions-->
    </div>
    {{-- @if($errors->any())
        <x-errors-component/>
    @endif --}}
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <form action="{{ route('admin.storeSaleriesTeacher') }}" method="POST" enctype="multipart/form-data">
                @method("POST")
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Bukti Gaji

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                <a href="{{ route('administration.salaryTeacher.index') }}"
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
                                <div class="form-group row">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama Sekolah</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="school_id" class="form-select form-select-solid me-5 mt-3"
                                                data-control="select2" data-placeholder="Select an option" id="schools">
                                            <option value=""></option>
                                            {{-- @foreach($schools as $school)
                                                <option
                                                    {{ (old('school_id') == $school->id) ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach --}}
                                        </select>


                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama Guru</label>

                                    <div class="col-lg-9 col-xl-9">
                                        <select name="user_id" class="form-select form-select-solid me-5 mt-3"
                                                data-control="select2" data-placeholder="Select an option"
                                                id="teachers">
                                            <option value=""></option>
                                        </select>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Jumlah Gaji</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="salary_amount"
                                               type="number" value="{{ old('salary_amount') }}" placeholder="10000"
                                               required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Bulan</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="payday"
                                               type="date" value="{{ old('payday') }}" placeholder="johndoe@gmail.com"
                                               required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Bukti Gaji</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="photo"
                                               type="file" value="{{ old('photo') }}" placeholder="johndoe@gmail.com"
                                               required="">

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    function handleGetTeachers() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: '{{ route("admin.getTeacherBySchool") }}',
                data: {schoolId: $('#schools').val()},
                success: function (teachers) {
                    let html = ''

                    teachers.map((teahcer) => {
                        html += `<option value="${teahcer.teacher.id}">${teahcer.teacher.name}</option>`
                    })

                    $('#teachers').html(html)
                }
            })
        }

        $('#schools').change(function () {
            handleGetTeachers()
        })
</script>
@endsection
