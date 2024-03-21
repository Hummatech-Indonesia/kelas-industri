@if (auth()->user()->hasRole('admin'))
    <td>
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">Opsi
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item"
                    href="{{ route('admin.students.edit', ['student' => $data->student->id, 'school' => $data->school->id]) }}">Edit</a>
                <a class="dropdown-item" href="{{ route('admin.gantiPassword', ['student' => $data->student->id, 'school' => $data->school->id]) }}">Ganti Password</a>
                <a type="button" data-id='{{ $data->student->id }}' class="dropdown-item delete">Hapus</a>
            </div>
        </div>
    </td>
@endif
