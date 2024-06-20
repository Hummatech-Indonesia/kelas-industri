@php use App\Enums\BatchStatusEnum;@endphp
<span
    class="badge {{ $data->status == BatchStatusEnum::SUCCESS->value ? 'badge-soft-success' : 'badge-soft-danger' }}  me-2">{{ $data->status }}</span>
