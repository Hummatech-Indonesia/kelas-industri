@php use App\Enums\BatchStatusEnum; @endphp

@if($data->status == BatchStatusEnum::PENDING->value)
    <button href="#" data-id="{{ $data->id }}" class="btn btn-danger delete mb-3">Hapus</button>
@else
    {{-- <a target="_blank" href="{{ route('batch.export-pdf', $data->id) }}" class="btn btn-success">Export Pdf</a> --}}
    <a href="{{ route('admin.spk.batch-results.show', $data->id) }}" class="btn btn-primary mb-3">History SPK</a>
    <a href="{{ route('admin.spk.statistic', $data->id) }}" class="btn btn-primary mb-3">Statistik</a>
    <button href="#" data-id="{{ $data->id }}" class="btn btn-danger delete mb-3">Hapus</button>
@endif


