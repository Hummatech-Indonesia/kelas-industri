@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Jadwal Zoom
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman tambah jadwal zoom
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
            <form action="{{ route('admin.standart-operation-producer.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Silakan Isi Data Jadwal Zoom

                                </h3>

                            </div>

                            <div class="card-toolbar">

                                <a href="{{ route('admin.zoom-schedules.index') }}"
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

                                    <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="title"
                                            type="text" value="{{ old('title') }}"
                                            placeholder="Jadwal Zoom SMKN 1 Kepanjen" required="">

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Sekolah</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="generation_id" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="Select an option" id="schools">
                                            <option value=""></option>
                                            @foreach ($schools as $school)
                                                <option {{ old('school_id') == $school->id ? 'selected' : '' }}
                                                    value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Kelas</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="classroom_id" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="Select an option" id="classrooms">
                                        </select>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Mentor</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <select name="mentor_id" class="form-select form-select-solid me-5"
                                            data-control="select2" data-placeholder="Select an option">
                                            @foreach ($mentors as $mentor)
                                                <option {{ old('mentor_id') == $mentor->id ? 'selected' : '' }}
                                                    value="{{ $mentor->id }}">{{ $mentor->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Tanggal</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <div class="input-group" id="kt_td_picker_simple" data-td-target-input="nearest"
                                            data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_basic_2" name="date" type="text"
                                                class="form-control" data-td-target="#kt_td_picker_basic"
                                                placeholder="04/03/2023, 14.00" autocomplete="off" />
                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic"
                                                data-td-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group row mb-3">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Link</label>

                                    <div class="col-lg-9 col-xl-9">

                                        <input class="form-control form-control-solid form-control-lg" name="link"
                                            type="text" value="{{ old('link') }}"
                                            placeholder="https://zoom.us/j/96417985873?pwd=a2txVnQ5RnZacFMvOTNPT3duall6UT09"
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
        $(document).ready(function() {
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')

            $('#schools').change(function() {
                $.ajax({
                    method: 'GET',
                    url: '{{ route('admin.zoom-schedules.create') }}',
                    data: {
                        school_id: $(this).val()
                    },
                    success: function(classrooms) {
                        $('#classrooms').html('')
                        console.log(classrooms)
                        let html = ''

                        classrooms.map(classroom => {
                            html +=
                                `<option
                                    (old('classsroom_id') == ${classroom.id}) ? 'selected' : '' value="${classroom.id}">${classroom.name} - ${classroom.generation.school_year.school_year} </option>`
                        })

                        $('#classrooms').html(html)
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                })
            })
        })
    </script>
@endsection
