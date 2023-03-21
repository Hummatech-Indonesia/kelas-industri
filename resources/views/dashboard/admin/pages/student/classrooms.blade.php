@if(count($data->classrooms) > 0)
    @foreach($data->classrooms as $classroom)
        <span class="badge badge-light-success mx-3">{{ $classroom->classroom->name }}</span>
    @endforeach
@else
    <span class="badge badge-light-danger">Tidak ada kelas
    </span>
@endif
