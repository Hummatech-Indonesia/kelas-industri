@php use Carbon\Carbon; @endphp
@if($data->date < Carbon::now())
    <span class="badge badge-light-danger">{{ $data->date }}</span>
@else
    <span class="badge badge-light-success">{{ $data->date }}</span>
@endif
