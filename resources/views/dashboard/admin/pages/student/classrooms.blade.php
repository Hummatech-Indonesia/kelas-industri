@if(count($data->classrooms) > 0)
    @foreach($data->classrooms as $classroom)
        <a href="{{ route('school.classrooms.show', $classroom->classroom->id) }}">
            <span
                class="badge badge-light-success me-3">{{ $classroom->classroom->name . " - " . $classroom->classroom->generation->schoolYear->school_year }}</span>
        </a>
    @endforeach
@else
    <span class="badge badge-light-danger">Tidak ada kelas
    </span>
@endif
