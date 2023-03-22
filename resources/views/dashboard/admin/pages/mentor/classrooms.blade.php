@if(count($data->mentorClassrooms) > 0)
    @foreach($data->mentorClassrooms as $classroom)
        <span
            class="badge badge-light-success me-3">{{ $classroom->classroom->name . " - " . $classroom->classroom->generation->schoolYear->school_year }}</span>
    @endforeach
@else
    <span class="badge badge-light-danger">Tidak ada kelas
    </span>
@endif
