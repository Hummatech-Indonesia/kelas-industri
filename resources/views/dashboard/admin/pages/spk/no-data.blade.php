@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="row justify-content-end mb-4">
        <form action="" class="col-4 d-flex g-2">
            <select name="batch" class="form-select mr-2" id="">
                <option value="">Bacth Terakhir</option>
            </select>
            <button type="submit" class="btn btn-primary mr-2">
                Cari
            </button>
        </form>
    </div>
    <div class="row" style="min-height: 450px">
        Belum Ada Batch dibuat
    </div>
@endsection
