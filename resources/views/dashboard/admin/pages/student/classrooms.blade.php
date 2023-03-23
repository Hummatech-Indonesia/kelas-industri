@if(count($data->classrooms) > 0)
    @foreach($data->classrooms as $classroom)
        <span
            class="badge badge-light-success me-3">{{ $classroom->classroom->name . " - " . $classroom->classroom->generation->schoolYear->school_year }}</span>
    @endforeach
@else
    <span class="badge badge-light-danger">Tidak ada kelas
    </span>
@endif